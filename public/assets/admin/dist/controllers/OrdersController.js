app.controller('OrdersController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_ORDERS_MODAL = $('#save-modal-orders');

    /** search */
    $scope.keySearch = "";
    $scope.searchOrd = "";

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

    /** api/orders/get */
    const apiGetOrders = `http://localhost:8000/api/orders`;
    $scope.getOrdersList = () => {
        $http(
            {
                method: 'GET',
                url: apiGetOrders
            }
        ).then((res) => {
            $scope.ordersList = res.data[0];

            $scope.ordersList.forEach(function(orders) {
                orders.status = `${orders.status}`;
            })
            console.log($scope.ordersList);
        }, (err) => console.log(err))
    }

    $scope.getOrdersList();

    /** api/orders/get-by-id/{id} */
    $scope.getOrders = (id, index) => {

        $scope.actionOrdersStatus(0);

        $scope.ordersStatus = {};
        $scope.title = 'Chi tiết đơn hàng';

        const apiGetOrders = `http://localhost:8000/api/orders/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetOrders
            }
        ).then((res) => {
            $scope.orders = res.data;
            $scope.orders.status = `${$scope.orders.status}` 

            SAVE_ORDERS_MODAL.modal('show')
        }, (err) => console.log(err))
    }

    /** api/orders/update */
    $scope.updateStatus = (id, orders) => {
        const apiUpdateOrders = `http://localhost:8000/api/orders/${id}`;
        
        $scope.orders = orders;
        $http({
            method: 'PUT',
            url: apiUpdateOrders,
            data: $scope.orders,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.ordersList.findIndex(item => item.id == $scope.orders.id);
            $scope.ordersList[index] = $scope.orders;

        }, (err) => console.log(err));
    }

    /** api/ordersStatus/get-by-id/{id} */
    $scope.getOrdersStatus = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionOrdersStatus(1);

        const apiGetOrdersStatus = `http://localhost:8000/api/ordersStatus/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetOrdersStatus
            }
        ).then((res) => {
            $scope.ordersStatus = res.data;
            
            if(index == -1) { 
                $scope.isDeleted = $scope.ordersStatus;
                DELETE_MODAL.modal('show');
            }
        }, (err) => console.log(err))
    }

    /** api/ordersStatus/create */
    $scope.addOrdersStatus = () => {
        $scope.ordersStatus.orders_id = $scope.orders.id;
        $scope.ordersStatus.date = formatDate();
        
        console.log($scope.ordersStatus);
        const apiCreateOrdersStatus = `http://localhost:8000/api/ordersStatus`;
        $http({
            method: 'POST',
            url: apiCreateOrdersStatus,
            data: $scope.ordersStatus,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.orders.orders_status.push(res.data);
            $scope.actionOrdersStatus(0);

        }, (err) => console.log(err));
    }

    /** api/ordersStatus/update */
    $scope.updateOrdersStatus = () => {
        const apiUpdateOrdersStatus = `http://localhost:8000/api/ordersStatus/${$scope.ordersStatus.id}`;
        // $scope.ordersStatus.date = formatDate();

        $http({
            method: 'PUT',
            url: apiUpdateOrdersStatus,
            data: $scope.ordersStatus,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.orders.orders_status.findIndex(item => item.id == $scope.ordersStatus.id);
            $scope.orders.orders_status[index] = $scope.ordersStatus;
            
            $scope.actionOrdersStatus(0);
        }, (err) => console.log(err));
    }

    /** api/ordersStatus/delete/{id} */
    $scope.deleteOrdersStatus = (id) => {
        const apiDeleteOrdersStatus = `http://localhost:8000/api/ordersStatus/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteOrdersStatus
        }).then((res) => {

            const index = $scope.orders.orders_status.findIndex(item => item.id == $scope.ordersStatus.id);
            $scope.orders.orders_status.splice(index, 1);

            $scope.actionOrdersStatus(0);
        });
    }

    /** client button orders status */
    $scope.actionOrdersStatus = (action) => {
        const btnCreateOrdersStatus = $('.btn__create-orders-status');
        const btnUpdateOrdersStatus = $('.btn__update-orders-status');

        if(action == 0) {
            btnUpdateOrdersStatus.attr('disabled', true);
            btnCreateOrdersStatus.attr('disabled', false);
            btnCreateOrdersStatus.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');
            $scope.ordersStatus = {};
        }

        if(action == 1) {
            btnCreateOrdersStatus.attr('disabled', true);
            btnUpdateOrdersStatus.attr('disabled', false);
        }
    }

    // /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const ordersStatus = JSON.stringify($scope.ordersStatus);

        console.log($scope.isDeleted);
        switch(isDeleted) {
            case ordersStatus: $scope.deleteOrdersStatus($scope.ordersStatus.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
    
})