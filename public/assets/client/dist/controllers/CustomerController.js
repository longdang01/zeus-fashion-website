app.controller('CustomerController', function($rootScope, $scope, $http, $timeout) {
    $scope.customer = {};
    $scope.users = {};
    $scope.confirmPassword = '';
    $scope.status = 0;

    //get customer
    const customerID = JSON.parse(sessionStorage.getItem('customerID'));
    if(customerID) {
        $scope.status = 1;
        const apiGetCustomer = `http://localhost:8000/api/customers/${customerID}`
        $http(
            {
                method: 'GET',
                url: apiGetCustomer
            }
        ).then((res) => {
            $scope.customer = res.data;
        })
    } else $scope.status = 0;

    /** api/login_check/ */
    const apiCheckLogin = `http://localhost:8000/api/login_check/`; 
    $scope.login = () => {

        $http(
            {
                method: 'POST',
                url: apiCheckLogin,
                params: {
                    username: $scope.users.username,
                    password: $scope.users.password
                }
            }
        ).then((res) => {
            console.log(res.data);
            $scope.customer = res.data.customer;

            if(res.data.customer) {
                sessionStorage.setItem('customerID', JSON.stringify($scope.customer.id));
                window.open('/', '_self');
            } else {
                alert('Thông tin đăng nhập chưa chính xác');
            }
        }, (err) => {console.log(err); })
    }

    
    /** save customer */
    $scope.addCustomer = () => {
        const apiCreateCustomer = `http://localhost:8000/api/customers`;
        $scope.customer.users_id = $scope.users.id;
        $http({
            method: 'POST',
            url: apiCreateCustomer,
            data: $scope.customer,
            "content-Type": "application/json"
        }).then((res) => {
            alert('Bạn đã đăng ký tài khoản thành công!');
            // $('#toastSuccess')
            // .find('.content')
            // .text('Đăng ký tài khoản thành công');
            // success();
            window.open('/login', '_self');
        }, (err) => console.log(err));
    }

    $scope.register = () => {

        const apiCreateUsers = `http://localhost:8000/api/users`;
        $scope.users.username = $scope.customer.users.username;
        $scope.users.password = $scope.customer.users.password;
        $scope.users.confirmPassword = $scope.customer.users.confirmPassword;
        if($scope.users.password == $scope.users.confirmPassword) {
            $http({
                method: 'POST',
                url: apiCreateUsers,
                data: $scope.users,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.users = res.data[0];
    
                $scope.addCustomer();
            }, (err) => {
                alert('Tên đăng nhập đã tồn tại');
                console.clear();
            });
        } else {
            alert('Nhập lại mật khẩu chưa chính xác!');
            // $('#toastErr')
            // .find('.content')
            // .text('Tên đăng đã tồn tại hoặc nhập lại mật khẩu chưa chính xác');
            // error();
        }
    }

    $scope.logOut = () => {
        sessionStorage.removeItem('customerID');
        window.open('/', '_self');
    }
})