app.controller('CartController', function($rootScope, $scope, $http, $timeout, $location, $window) {

    const customerID = JSON.parse(sessionStorage.getItem('customerID'));
    $('#checkBuy').trigger('change');
    
    /** api/carts/get */
    const apiGetCarts = `http://localhost:8000/api/cart/get-carts/${customerID}`;
    $rootScope.getCarts = () => {
        $http(
            {
                method: 'GET',
                url: apiGetCarts
            }
        ).then((res) => {

            $rootScope.carts = res.data;
            $rootScope.cartsBuy = res.data.cart_details.filter(item => item.is_active == 1);
            $scope.calcTotalItems($rootScope.carts);
            $scope.calcTotalItemsBuy($rootScope.carts);
            $scope.calcTotalPrice($rootScope.carts);

            console.log($rootScope.carts);
        }, (err) => console.log(err))
    }

    $rootScope.getCarts();

    $scope.deleteProduct = (id) => {
        const apiDeleteProduct = `http://localhost:8000/api/cartDetails/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteProduct
        }).then((res) => {

            const index = $rootScope.carts.cart_details.findIndex(item => item.id == id);
            $rootScope.carts.cart_details.splice(index, 1);

            $scope.calcTotalItems($rootScope.carts);
            $scope.calcTotalItemsBuy($rootScope.carts);
            $scope.calcTotalPrice($rootScope.carts);
            $('#confirmDeleteCart').modal('hide');
        });
    }

    $scope.calcTotalItems = (carts) => {
        $rootScope.totalCarts = 0;
        if(carts) {
            carts.cart_details.forEach(item => {
                $rootScope.totalCarts+=Number(item.quantity);
            })
        }
    }

    $scope.calcTotalItemsBuy = (carts) => {
        $rootScope.totalItemsBuy = 0;
        const chooseBuy = (carts) ? carts.cart_details.filter(item => item.is_active == 1) : [];
        chooseBuy.forEach(item => {
            $rootScope.totalItemsBuy+=Number(item.quantity);
        })
    }

    $scope.calcTotalPrice = (carts) => {
        $rootScope.totalPrice = 0;
        const chooseBuy = (carts) ? carts.cart_details.filter(item => item.is_active == 1) : [];
        chooseBuy.forEach(item => {
            if(item.color.sale) {
                if(item.color.sale.symbol == 'K') {
                    $rootScope.totalPrice+=(item.color.price.price - item.color.sale.value) * Number(item.quantity);
                } else {
                    $rootScope.totalPrice+=(item.color.price.price * ((100 - item.color.sale.value)/100)) * Number(item.quantity);
                }
            } else {
                $rootScope.totalPrice+=item.color.price.price * Number(item.quantity);
            }
        })
    }

    $scope.updateCartDetail = (cartDetail, index) => {
        const apiUpdateCartDetail = `http://localhost:8000/api/cartDetails/${cartDetail.id}`;
        let qty;
        if(!index) {
            qty = $('.qty').val();
            cartDetail.quantity = $('.qty').val();
        }

        if(!$scope.checkExists(cartDetail, index)) {
            if($scope.checkQuantity(qty, index)) {
                $http({
                    method: 'PUT',
                    url: apiUpdateCartDetail,
                    data: cartDetail,
                    "content-Type": "application/json"
                }).then((res) => {
                    const index = $rootScope.carts.cart_details.findIndex(item => item.id == cartDetail.id);
                    $rootScope.carts.cart_details[index] = cartDetail;
        
                    $scope.calcTotalItems($rootScope.carts);
                    $scope.calcTotalItemsBuy($rootScope.carts);
                    $scope.calcTotalPrice($rootScope.carts);
                    $('#productClassify').modal('hide');
                }, (err) => console.log(err));
            }

        } else alert('Phân loại sản phẩm này đã có trong giỏ hàng');
    }

    $scope.getClassify = (id, index) => {
        const apiGetClassify = `http://localhost:8000/api/cartDetails/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetClassify
            }
        ).then((res) => {
            $scope.classify = res.data;
            $('.qty').val($scope.classify.quantity);
            if(!index) {
                $('#productClassify').modal('show');
            } else {
                $('#confirmDeleteCart').modal('show');
            }
        }, (err) => console.log(err))
    }

    $scope.changeColor = (item, index) => {
        $scope.classify.color = item;
        $scope.classify.color_id = item.id;

        let found = false;
        $scope.classify.color.sizes.forEach(item => {
            if(item.size_name.toLowerCase() ==  $scope.classify.size.size_name.toLowerCase()) {
                $scope.classify.size = item;
                $scope.classify.size_id = item.id;
                found = true;
            }
        })

        if(!found) {
            $scope.classify.size = $scope.classify.color.sizes[0];
            $scope.classify.size_id = $scope.classify.color.sizes[0].id;
        }
    };

    $scope.changeSize = (item, index) => {
        $scope.classify.size = item;
        $scope.classify.size_id = item.id;
    };
    
    $scope.checkQuantity = (qty, index) => {

        if(!index) {
            if(qty <= 0 || qty > $scope.classify.size.quantity) {
                alert(`Số lượng [1, ${$scope.classify.size.quantity}]`);
                return false;
            } else return true;
        } else {
            return true;
        }
    }

    $scope.checkExists = (cartDetail, index) => {
        if(index) return false;

        const exists = $rootScope.carts.cart_details.filter(item =>
        item.product_id == cartDetail.product_id &&
        item.color_id == cartDetail.color_id &&
        item.size_id == cartDetail.size_id &&
        item.id != cartDetail.id
        );
        return (exists[0]) ? true : false;
    }

    $scope.navigateToCheckout = () => {
        const arrBought = $rootScope.carts.cart_details.filter(item => item.is_active == 1);
        let check = 1;
        $scope.notifications = [];

        if(arrBought.length) {
            arrBought.forEach(item => {
                if(item.quantity > item.size.quantity) {
                    check = 2;
                    $scope.notifications.push(item);
                }
            })
        } else {
            check = 3;
        }

        if(check == 1) {
            window.open('/checkouts', '_self');
        } else if (check == 3) {
            alert('Vui lòng chọn sản phẩm cần mua !');
        } 
        else {
            $('#notificationCart').modal('show');
        }
    }

    // $scope.chooseAll = () => {
    //     const checkStatus = $rootScope.carts.cart_details.filter(item => item.is_active == 0 || item.is_active == false);
    //     if(checkStatus[0]) {
    //         console.log(3);
    //         checkStatus.forEach(item => {
    //             item.is_active = 1;
    //             $scope.updateCartDetail(item);
    //         })
    //     } else {
    //         console.log(2);
    //         $rootScope.carts.cart_details.forEach(item => {
    //             item.is_active = 0;
    //             $scope.updateCartDetail(item);
    //         })
    //     }
    // }

})
