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

    $scope.addCart = () => {

    }

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