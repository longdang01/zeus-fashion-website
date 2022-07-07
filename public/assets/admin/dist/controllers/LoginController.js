app.controller('LoginController', function($rootScope, $scope, $http, $timeout, $location) {
    $scope.users = {};
    
    const staffID = JSON.parse(sessionStorage.getItem('staffID'));
    if(staffID) {
        const apiGetStaff = `http://localhost:8000/api/staffs/${staffID}`;
        $http(
            {
                method: 'GET',
                url: apiGetStaff
            }
        ).then((res) => {
            $scope.staff = res.data;
            $rootScope.staffID = $scope.staff.id; 
            $scope.permission = $scope.staff.position;

        }, (err) => console.log(err))
    }
    
    $scope.checkPermission = (permission, group) => {
        const per = ($scope.permission) ? $scope.permission.position_name.toLowerCase() : ''; 
        
        if(per == permission) {
            $scope.functions = group;
            $scope.checkUrl($scope.functions);
        }

        if($scope.permission) {
            return (permission.toLowerCase() == $scope.permission.position_name.toLowerCase())
            ? true : ($scope.permission.position_name.toLowerCase() == 'quản lý cửa hàng') ? true : false;
        }
    }

    $scope.checkUrl = (functions) => {
        const tmp = $location.absUrl().split('/');
        const name = `/${tmp[tmp.length - 2]}/${tmp[tmp.length - 1]}`;
        // $('.content > .main').html('Không tìm thấy trang');

        if(name != '/admin/dashboards') {
            if(functions && functions.indexOf(name) == -1) {
                $('.content > .main').html('Không tìm thấy trang');
            }
        }
    }

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
            $scope.staff = res.data.staff;

            if(res.data.staff) {
                sessionStorage.setItem('staffID', JSON.stringify($scope.staff.id));
                window.open('/admin/dashboards', '_self');
            } else {
                error();
            }
        }, (err) => {console.log(err); })
    }

    /** logout */
    $scope.logOut = () => {
        sessionStorage.removeItem('staffID');
        window.open('/admin/login', '_self');
    }
})