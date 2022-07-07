app.controller('SupplierController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_SUPPLIER_MODAL = $('#save-modal-supplier');

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

    /** api/suppliers/get */
    const apiGetSuppliers = `http://localhost:8000/api/suppliers`;
    $scope.getSuppliers = () => {
        $http(
            {
                method: 'GET',
                url: apiGetSuppliers
            }
        ).then((res) => {
            $scope.suppliers = res.data[0];

            console.log($scope.suppliers);
        }, (err) => console.log(err))
    }

    $scope.getSuppliers();
    
    /** api/suppliers/get-by-id/{id} */
    $scope.getSupplier = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm nhà cung cấp' : 'Cập nhật nhà cung cấp';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.supplier = {};
        else {
            const apiGetSupplier = `http://localhost:8000/api/suppliers/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetSupplier
                }
            ).then((res) => {
                $scope.supplier = res.data;

                if(index) { 
                    $scope.isDeleted = $scope.supplier;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_SUPPLIER_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save supplier */
    $scope.saveSupplier = () => {

        /** api/suppliers/create */
        if($scope.action == 0) {
            const apiCreateSupplier = `http://localhost:8000/api/suppliers`;

            $http({
                method: 'POST',
                url: apiCreateSupplier,
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.suppliers.push(res.data);

                SAVE_SUPPLIER_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/suppliers/update */
        if($scope.action == 1) {
            const apiUpdateSupplier = `http://localhost:8000/api/suppliers/${$scope.supplier.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateSupplier,
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.suppliers.findIndex(item => item.id == $scope.supplier.id);
                $scope.suppliers[index] = $scope.supplier;

                SAVE_SUPPLIER_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/suppliers/delete/{id} */
    $scope.deleteSupplier = (id) => {
        const apiDeleteSupplier = `http://localhost:8000/api/suppliers/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteSupplier
        }).then((res) => {

            const index = $scope.suppliers.findIndex(item => item.id == $scope.supplier.id);
            $scope.suppliers.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const supplier = JSON.stringify($scope.supplier);

        switch(isDeleted) {
            case supplier: $scope.deleteSupplier($scope.supplier.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})