app.controller('PaymentController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_PAYMENT_MODAL = $('#save-modal-payment');

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

    /** api/payments/get */
    const apiGetPayments = `http://localhost:8000/api/payments`;
    $scope.getPayments = () => {
        $http(
            {
                method: 'GET',
                url: apiGetPayments
            }
        ).then((res) => {
            $scope.payments = res.data[0];

            console.log($scope.payments);
        }, (err) => console.log(err))
    }

    $scope.getPayments();
    
    /** api/payments/get-by-id/{id} */
    $scope.getPayment = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm hình thức thanh toán' : 'Cập nhật hình thức thanh toán';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.payment = {};
        else {
            const apiGetPayment = `http://localhost:8000/api/payments/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetPayment
                }
            ).then((res) => {
                $scope.payment = res.data;

                if(index) { 
                    $scope.isDeleted = $scope.payment;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_PAYMENT_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save payment */
    $scope.savePayment = () => {

        /** api/payments/create */
        if($scope.action == 0) {
            const apiCreatePayment = `http://localhost:8000/api/payments`;

            $http({
                method: 'POST',
                url: apiCreatePayment,
                data: $scope.payment,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.payments.push(res.data);

                SAVE_PAYMENT_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/payments/update */
        if($scope.action == 1) {
            const apiUpdatePayment = `http://localhost:8000/api/payments/${$scope.payment.id}`;

            $http({
                method: 'PUT',
                url: apiUpdatePayment,
                data: $scope.payment,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.payments.findIndex(item => item.id == $scope.payment.id);
                $scope.payments[index] = $scope.payment;

                SAVE_PAYMENT_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/payments/delete/{id} */
    $scope.deletePayment = (id) => {
        const apiDeletePayment = `http://localhost:8000/api/payments/${id}`;
        $http({
            method: "DELETE",
            url: apiDeletePayment
        }).then((res) => {

            const index = $scope.payments.findIndex(item => item.id == $scope.payment.id);
            $scope.payments.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const payment = JSON.stringify($scope.payment);

        switch(isDeleted) {
            case payment: $scope.deletePayment($scope.payment.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})