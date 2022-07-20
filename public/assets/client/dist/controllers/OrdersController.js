app.controller('OrdersController', function($rootScope, $scope, $http, $timeout, $location, $window) {

    //get orders
    const customerID = JSON.parse(sessionStorage.getItem('customerID'));
    const apiGetOrders = `http://localhost:8000/api/orders/get-orders/${customerID}`
    $rootScope.getOrdersList = () => {
        $http(
            {
                method: 'GET',
                url: apiGetOrders,
            }
        ).then((res) => {
            $scope.orders = res.data; 
            console.log(res);
            console.log($scope.orders);
    
            $scope.orders0 = [];        
            $scope.orders1 = [];        
            $scope.orders2 = [];        
            $scope.orders3 = [];        
            $scope.orders4 = [];
            
            $scope.orders.forEach(item => {
                if(item.status === 0) $scope.orders0.push(item);
                else if (item.status === 1) $scope.orders1.push(item);
                else if (item.status === 2) $scope.orders2.push(item);
                else if (item.status === 3) $scope.orders3.push(item);
                else if (item.status === 4) $scope.orders4.push(item);
            })
        }, (err) => console.log(err))
    }

    $rootScope.getOrdersList();

    $scope.goDetail = (orders) => {
        $rootScope.ordersItem = orders;
        $scope.calcTotalItemsBuy($rootScope.ordersItem.orders_details);
    }
    
    $scope.calcTotalItemsBuy = (itemsBuy) => {
        $rootScope.totalOrdersBuy = 0;
        itemsBuy.forEach(item => {
            $rootScope.totalOrdersBuy+=Number(item.quantity);
        })
    }

    $scope.remove = (e, orders, action) => {
        let choice = confirm("Bạn có chắc chắn muốn hủy không?");
        const apiDeleteOrders = `http://localhost:8000/api/orders/${orders.id}`; 
        if (choice) {
            $http({
                method: "DELETE",
                url: apiDeleteOrders
            }).then((res) => {

                const index = $scope.orders.findIndex(item => item.id == orders.id);
                $scope.orders[index] = res.data;

                if(action == 0) {
                    const index0 = $scope.orders0.findIndex(item => item.id == orders.id);
                    $scope.orders0.splice(index0, 1);
                }

                if(action == 1) {
                    const index1 = $scope.orders1.findIndex(item => item.id == orders.id);
                    $scope.orders1.splice(index1, 1);
                }

                $scope.orders4.push(res.data);
            });
        }
    }

    $scope.revert = (e, orders) => {
        let choice = confirm("Bạn có chắc chắn muốn đặt lại không?");
        const apiRevertOrders = `http://localhost:8000/api/orders/revert/${orders.id}`;
        if (choice) {
            $http({
                method: 'PUT',
                url: apiRevertOrders,
                "content-Type": "application/json"
            }).then((res) => {

                const index4 = $scope.orders4.findIndex(item => item.id == orders.id);
                $scope.orders4.splice(index4, 1);

                $scope.orders0.push(res.data);

                const index = $scope.orders.findIndex(item => item.id == orders.id);
                $scope.orders[index] = res.data;
            }, (err) => console.log(err));
        
        }
    }
})