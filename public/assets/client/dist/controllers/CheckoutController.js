app.controller('CheckoutController', function($rootScope, $scope, $http, $timeout, $location, $window) {

    //get customer
    // const customerID = JSON.parse(localStorage.getItem('customer_id'));
    // if(customerID) {
    //     const apiGetCustomer = `http://localhost:8000/api/customers/${customerID}`
    //     $http(
    //         {
    //             method: 'GET',
    //             url: apiGetCustomer
    //         }
    //     ).then((res) => {
    //         $scope.customer = res.data;
    //         console.log($scope.customer);
    //     })
    // }

    //get payments
    const apiGetPayments = `http://localhost:8000/api/payments`;
    $http(
        {
            method: 'GET',
            url: apiGetPayments
        }
    ).then((res) => {
        $scope.payments = res.data[0];     

    }, (err) => console.log(err))

    //get transport
    const apiGetTransports = `http://localhost:8000/api/transports`;
    $http(
        {
            method: 'GET',
            url: apiGetTransports
        }
    ).then((res) => {
        $scope.transports = res.data[0]; 

    }, (err) => console.log(err))

    // select transport
    $scope.selectTransport = () => {
        const apiGetTransport = `http://localhost:8000/api/transports/${$scope.selectedTransport}`;
        
        $http(
            {
                method: 'GET',
                url: apiGetTransport
            }
        ).then((res) => {
            $rootScope.transport = res.data; 
            $rootScope.ship = $scope.transport.fee; 

        }, (err) => console.log(err))
    }

    // select payment
    $scope.selectPayment = () => {
        const apiGetPayment = `http://localhost:8000/api/payments/${$scope.selectedPayment}`;
        
        $http(
            {
                method: 'GET',
                url: apiGetPayment
            }
        ).then((res) => {
            $rootScope.payment = res.data; 

        }, (err) => console.log(err))
    }

    //purchase
    $scope.purchase = () => {
        const customerID = JSON.parse(sessionStorage.getItem('customerID'));
        const note = $('#note').val();
        const apiCreateOrders = `http://localhost:8000/api/orders`;
        if($rootScope.payment && $rootScope.transport) {
            $http({
                method: 'POST',
                url: apiCreateOrders,
                data: 
                { 
                    payment_id: $rootScope.payment.id,
                    transport_id: $rootScope.transport.id,        
                    customer_id: customerID,
                    delivery_address_id: $rootScope.activeAddress.id,
                    note: note,
                    //need change if has coupon function
                    total: $rootScope.totalPrice + $rootScope.ship,
                    cartDetails: $rootScope.cartsBuy
                },
                "content-Type": "application/json"
            }).then((res) => {
                let choice = confirm("Bạn đã đặt hàng thành công !");
                if (choice) {
                    window.open('/accounts', '_self');
                }
            });
        } else alert('Vui lòng chọn thông tin bắt buộc để được thanh toán!');
    }
})