app.controller('ProductController', function($rootScope, $scope, $http, $timeout, $location, $window) {


    /** pagination */ 
    $scope.currentPage = 1;
    $scope.pageSize = 9;

    // sort
    $scope.sortColumn = '';
    $scope.reverse = true;
    $scope.direct = ''; 

    $scope.sortBy = () => {
        const value = $scope.valueSort.split('|');
        $scope.sortColumn = value[0];
        $scope.direct = value[1];
        if ($scope.direct === 'Ascending') {
            $scope.reverse = false;
            $scope.direct = 'Descending';
        }
        else {
            $scope.reverse = true;
            $scope.direct = 'Ascending';
        }
    }

    const apiGetNew = 'http://localhost:8000/api/product/get-new';
    $http(
    {
        method: 'GET',
        url: apiGetNew,
    }
    ).then((res) => {
        $rootScope.productsNew = res.data;

    }, (err) => console.log(err))

    const apiGetBestSeller = 'http://localhost:8000/api/product/get-best-seller';
    $http(
    {
        method: 'GET',
        url: apiGetBestSeller,
    }
    ).then((res) => {
        $rootScope.productsBestSeller = res.data;
            
    }, (err) => console.log(err))

    const apiGetSale = 'http://localhost:8000/api/product/get-sale';
    $http(
    {
        method: 'GET',
        url: apiGetSale,
    }
    ).then((res) => {
        $rootScope.productsSale = res.data;
        console.log(res.data);
            
    }, (err) => console.log(err))

    /** api/products/get */
    const apiGetProducts = `http://localhost:8000/api/product/get-products`;
    $scope.getProducts = () => {
        $scope.category_id = $('#categoryID').val();
        $scope.sub_category_id = $('#subCategoryID').val();
        $scope.keyword = $('#keyword').val();

        $http(
            {
                method: 'GET',
                url: apiGetProducts,
                params: {
                    product_name: $scope.keyword,
                    category_id: $scope.category_id,
                    sub_category_id: $scope.sub_category_id
                }
            }
        ).then((res) => {
            $scope.products = res.data[0];
            $scope.categories = res.data.categories;
            $scope.brands = res.data.brands;
            $scope.suppliers = res.data.suppliers;

            console.log($scope.products);
        }, (err) => console.log(err))
    }

    $scope.getProducts();

    $scope.getClass = (category, sub_category_id) => {

        let arr = category.sub_categories.filter(item => item.id == sub_category_id);
        return (arr.length) ? 'show' : '';
    }


    /** goDetail() */

    $scope.addCart = (product) => {
        const customerID = JSON.parse(sessionStorage.getItem('customerID'));

        $scope.product = product;
        $scope.selectedColor = product.colors[0];
        $scope.selectedSize = product.colors[0].sizes[0];
        const qty = 1;

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
                        quantity: 1,
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
    
    $scope.hoverInColor = ($event, color) => {
        const imgHover = $($event.currentTarget).parents('.product').find('.product__img-hover');
        const imgItem = $($event.currentTarget).parents('.product').find('.product__img-item');
        $(imgHover[0]).attr('src', `/uploads/products/${color.product_id}/${color.images[0].picture}`);
        $(imgItem[0]).css('display', 'none');
        $(imgHover[0]).css('display', 'block');
    }

    //not use
    $scope.activeCategory = (element) => {
        $(".nav-link.nav-link-sub").removeClass("active");

		$(element).addClass("active");
    }

    //not use
    $scope.hoverOutColor = ($event, color) => {
        // const imgHover = $($event.currentTarget).parents('.product').find('.product__img-hover');
        // const imgItem = $($event.currentTarget).parents('.product').find('.product__img-item');
        // $(imgItem[0]).css('display', 'block');
        // $(imgHover[0]).css('display', 'none');
    }

    

   
})