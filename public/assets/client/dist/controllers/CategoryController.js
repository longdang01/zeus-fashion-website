app.controller('CategoryController', function($rootScope, $scope, $http, $timeout, $location) {

    /** api/categories/get */
    const apiGetCategories = `http://localhost:8000/api/categories`;
    $scope.getCategories = () => {
        $http(
            {
                method: 'GET',
                url: apiGetCategories
            }
        ).then((res) => {
            $scope.categories = res.data[0];
            
        }, (err) => console.log(err))
    }

    $scope.getCategories();

})