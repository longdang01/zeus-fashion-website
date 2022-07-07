app.controller('TransportController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_TRANSPORT_MODAL = $('#save-modal-transport');

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

    /** api/transports/get */
    const apiGetTransports = `http://localhost:8000/api/transports`;
    $scope.getTransports = () => {
        $http(
            {
                method: 'GET',
                url: apiGetTransports
            }
        ).then((res) => {
            $scope.transports = res.data[0];

            console.log($scope.transports);
        }, (err) => console.log(err))
    }

    $scope.getTransports();
    
    /** api/transports/get-by-id/{id} */
    $scope.getTransport = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm hình thức vận chuyển' : 'Cập nhật hình thức vận chuyển';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.transport = {};
        else {
            const apiGetTransport = `http://localhost:8000/api/transports/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetTransport
                }
            ).then((res) => {
                $scope.transport = res.data;

                if(index) { 
                    $scope.isDeleted = $scope.transport;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_TRANSPORT_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save transport */
    $scope.saveTransport = () => {

        /** api/transports/create */
        if($scope.action == 0) {
            const apiCreateTransport = `http://localhost:8000/api/transports`;

            $http({
                method: 'POST',
                url: apiCreateTransport,
                data: $scope.transport,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.transports.push(res.data);

                SAVE_TRANSPORT_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/transports/update */
        if($scope.action == 1) {
            const apiUpdateTransport = `http://localhost:8000/api/transports/${$scope.transport.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateTransport,
                data: $scope.transport,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.transports.findIndex(item => item.id == $scope.transport.id);
                $scope.transports[index] = $scope.transport;

                SAVE_TRANSPORT_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/transports/delete/{id} */
    $scope.deleteTransport = (id) => {
        const apiDeleteTransport = `http://localhost:8000/api/transports/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteTransport
        }).then((res) => {

            const index = $scope.transports.findIndex(item => item.id == $scope.transport.id);
            $scope.transports.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const transport = JSON.stringify($scope.transport);

        switch(isDeleted) {
            case transport: $scope.deleteTransport($scope.transport.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})