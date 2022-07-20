app.controller('DetailController', function($rootScope, $scope, $http, $timeout) {
    
    const QUICK_VIEW = $('#quickViewModal');
    $scope.selectedColor = {};
    $scope.selectedSize = {};

    /** api/products/get-by-id/{id} */
    $rootScope.getProduct = () => {
        let productID = 0;
        if($rootScope.page == 1) {
            productID = JSON.parse(sessionStorage.getItem('productID'));
        } else {
            productID = $('#productID').val();
        }

        let apiGetProduct = '';
        if(productID) apiGetProduct = `http://localhost:8000/api/products/${productID}`;
        
        $http(
            {
                method: 'GET',
                url: apiGetProduct,
            }
        ).then((res) => {
            $scope.product = res.data;
            if(res.data.id) {
                $scope.selectedColor = $scope.product.colors[0];
                $scope.selectedSize = $scope.product.colors[0].sizes[0];
            }

            if($rootScope.page == 1) {
                $('.qty').val(1);
                QUICK_VIEW.modal('show');
            }
            
            destroySlick();
            initSlick();
        }, (err) => console.log(err))
    }
    
    $rootScope.getProduct();

    $scope.addCart = (product) => {
        const customerID = JSON.parse(sessionStorage.getItem('customerID'));
        const qty = $('.qty').val();
        
        if(customerID) {

            if($scope.checkQuantity(qty)) {
                const apiAddCart = `http://127.0.0.1:8000/api/cartDetails`; 
                $http({
                    method: 'POST',
                    url: apiAddCart,
                    data: 
                    { 
                        customer_id: customerID,
                        product_id: product.id,
                        color_id: $scope.selectedColor.id,
                        size_id: $scope.selectedSize.id,
                        quantity: qty,
                    },
                    "content-Type": "application/json"
                }).then((res) => {
                    $rootScope.getCarts();
    
                }, (err) => console.log(err));
            }
        } else window.open('/login', '_self');
    }

    $scope.checkQuantity = (qty) => {
        const inCart = ($rootScope.carts.cart_details) ?
        $rootScope.carts.cart_details.filter(item => item.product_id = $scope.product.id &&
        item.color_id == $scope.selectedColor.id && item.size_id == $scope.selectedSize.id) : [];
        
        let totalInCart = (inCart[0]) ? Number(inCart[0].quantity) + Number(qty) : 0;

        if(qty <= 0 || qty > $scope.selectedSize.quantity) {
            alert(`Số lượng [1, ${$scope.selectedSize.quantity}]`);
            return false;
        } else if(totalInCart > $scope.selectedSize.quantity) {
            alert(`Đã có ${inCart[0].quantity} sản phẩm trong giỏ hàng - Số lượng [1, ${$scope.selectedSize.quantity}]`);
            return false;
            
        } else return true;
    }

    $scope.changeColor = (item, index) => {
        $scope.selectedColor = item;

        let found = false;
        $scope.selectedColor.sizes.forEach(item => {
            if(item.size_name.toLowerCase() == $scope.selectedSize.size_name.toLowerCase()) {
                $scope.selectedSize = item;
                found = true;
            }
        })

        if(!found) {
            $scope.selectedSize = $scope.selectedColor.sizes[0];
        }

        destroySlick();
        initSlick();
    };

    $scope.changeSize = (item, index) => {
        $scope.selectedSize = item;
    };

    const destroySlick = () => {
        const gallery = $('.quickview__gallery');
        const thumbs = $('.quickview__gallery-thumbs');

        gallery.filter('.slick-initialized').slick('unslick'); 
        gallery.find('.slick-list').remove(); 

        thumbs.filter('.slick-initialized').slick('unslick'); 
        thumbs.find('.slick-list').remove(); 

        gallery.addClass('hide');
        thumbs.addClass('hide');
    };

    const initSlick = () => {
        const gallery = $('.quickview__gallery');
        const thumbs = $('.quickview__gallery-thumbs');

        setTimeout(() => {
            thumbs.not('.slick-initialized').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                asNavFor: '.quickview__gallery',
                focusOnSelect: true,
                infinite: false,
            })
    
            gallery.not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                infinite: false,
                asNavFor: '.quickview__gallery-thumbs',
            })

            gallery.removeClass('hide');
            thumbs.removeClass('hide');
            $(window).resize();
        }, 300);
    }
})