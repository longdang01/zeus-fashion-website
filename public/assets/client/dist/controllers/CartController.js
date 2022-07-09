app.controller('CartController', function($rootScope, $scope, $http, $timeout, $location, $window) {

    const customerID = JSON.parse(sessionStorage.getItem('customerID'));
    
    /** api/carts/get */
    const apiGetCarts = `http://localhost:8000/api/cart/get-carts/${customerID}`;
    console.log(apiGetCarts);
    $rootScope.getCarts = () => {
        $http(
            {
                method: 'GET',
                url: apiGetCarts
            }
        ).then((res) => {

            $rootScope.carts = res.data;
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
        });
    }

})
