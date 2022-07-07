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

    $scope.goDetail = (id, index) => {
        sessionStorage.setItem('productID', JSON.stringify(id));

        $rootScope.page = (index) ? 1 : 0;
        $rootScope.getProduct();
    }

    $scope.addCart = () => {
        
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