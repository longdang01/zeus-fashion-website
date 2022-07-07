app.controller('BrandController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_BRAND_MODAL = $('#save-modal-brand');

    /** search */
    $scope.keySearch = "";

    /** pagination */ 
    $scope.currentPage = 1;
    $scope.pageSize = 10;

    /** ckeditor */ 
    $scope.options = {  
        language: 'en',
        allowedContent: true,
        entities: false,
        extraPlugins: 'divarea'
    };

    /** api/brands/get */
    const apiGetBrands = `http://localhost:8000/api/brands`;
    $scope.getBrands = () => {
        $http(
            {
                method: 'GET',
                url: apiGetBrands
            }
        ).then((res) => {
            $scope.brands = res.data[0];

            console.log($scope.brands);
        }, (err) => console.log(err))
    }

    $scope.getBrands();
    
    /** api/brands/get-by-id/{id} */
    $scope.getBrand = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm thương hiệu' : 'Cập nhật thương hiệu';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.brand = {};
        else {
            const apiGetBrand = `http://localhost:8000/api/brands/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetBrand
                }
            ).then((res) => {
                $scope.brand = res.data;

                if(index) { 
                    $scope.isDeleted = $scope.brand;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_BRAND_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save brand */
    $scope.saveBrand = () => {

        /** api/brands/create */
        if($scope.action == 0) {
            const apiCreateBrand = `http://localhost:8000/api/brands`;

            $http({
                method: 'POST',
                url: apiCreateBrand,
                data: $scope.brand,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.brands.push(res.data);

                SAVE_BRAND_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/brands/update */
        if($scope.action == 1) {
            const apiUpdateBrand = `http://localhost:8000/api/brands/${$scope.brand.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateBrand,
                data: $scope.brand,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.brands.findIndex(item => item.id == $scope.brand.id);
                $scope.brands[index] = $scope.brand;

                SAVE_BRAND_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/brands/delete/{id} */
    $scope.deleteBrand = (id) => {
        const apiDeleteBrand = `http://localhost:8000/api/brands/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteBrand
        }).then((res) => {

            const index = $scope.brands.findIndex(item => item.id == $scope.brand.id);
            $scope.brands.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const brand = JSON.stringify($scope.brand);

        switch(isDeleted) {
            case brand: $scope.deleteBrand($scope.brand.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})