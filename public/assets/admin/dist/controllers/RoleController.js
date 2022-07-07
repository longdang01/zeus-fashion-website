app.controller('RoleController', function($rootScope, $scope, $http, $timeout) {

    const DELETE_MODAL = $('#delete-modal');
    const SAVE_ROLE_MODAL = $('#save-modal-role');

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

    /** api/roles/get */
    const apiGetRoles = `http://localhost:8000/api/roles`;
    $scope.getRoles = () => {
        $http(
            {
                method: 'GET',
                url: apiGetRoles
            }
        ).then((res) => {
            $scope.roles = res.data[0];

            console.log($scope.roles);
        }, (err) => console.log(err))
    }

    $scope.getRoles();
    
    /** api/roles/get-by-id/{id} */
    $scope.getRole = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm vai trò' : 'Cập nhật vai trò';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.role = {};
        else {
            const apiGetRole = `http://localhost:8000/api/roles/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetRole
                }
            ).then((res) => {
                $scope.actionPosition(0);
                $scope.role = res.data;

                if(index) { 
                    $scope.isDeleted = $scope.role;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_ROLE_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save role */
    $scope.saveRole = () => {

        /** api/roles/create */
        if($scope.action == 0) {
            const apiCreateRole = `http://localhost:8000/api/roles`;

            $http({
                method: 'POST',
                url: apiCreateRole,
                data: $scope.role,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.roles.push(res.data);

                SAVE_ROLE_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/roles/update */
        if($scope.action == 1) {
            const apiUpdateRole = `http://localhost:8000/api/roles/${$scope.role.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateRole,
                data: $scope.role,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.roles.findIndex(item => item.id == $scope.role.id);
                $scope.roles[index] = $scope.role;

                SAVE_ROLE_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/roles/delete/{id} */
    $scope.deleteRole = (id) => {
        const apiDeleteRole = `http://localhost:8000/api/roles/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteRole
        }).then((res) => {

            const index = $scope.roles.findIndex(item => item.id == $scope.role.id);
            $scope.roles.splice(index, 1);
        });
    }

    /** api/positions/get-by-id/{id} */
    $scope.getPosition = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionPosition(1);

        const apiGetPosition = `http://localhost:8000/api/positions/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetPosition
            }
        ).then((res) => {
            $scope.position = res.data;
            
            if(index == -1) { 
                $scope.isDeleted = $scope.position;
                $('#delete-modal').modal('show');
            }
        }, (err) => console.log(err))
    }

    /** api/positions/create */
    $scope.addPosition = () => {
        $scope.position.role_id = $scope.role.id;

        const apiCreatePosition = `http://localhost:8000/api/positions`;
        $http({
            method: 'POST',
            url: apiCreatePosition,
            data: $scope.position,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.role.positions.push(res.data);
            $scope.actionPosition(0);


        }, (err) => console.log(err));
    }

    /** api/positions/update */
    $scope.updatePosition = () => {
        const apiUpdatePosition = `http://localhost:8000/api/positions/${$scope.position.id}`;

        $http({
            method: 'PUT',
            url: apiUpdatePosition,
            data: $scope.position,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.role.positions.findIndex(item => item.id == $scope.position.id);
            $scope.role.positions[index] = $scope.position;
            
            $scope.actionPosition(0);
        }, (err) => console.log(err));
    }

    /** api/positions/delete/{id} */
    $scope.deletePosition = (id) => {
        const apiDeletePosition = `http://localhost:8000/api/positions/${id}`;
        $http({
            method: "DELETE",
            url: apiDeletePosition
        }).then((res) => {

            const index = $scope.role.positions.findIndex(item => item.id == $scope.position.id);
            $scope.role.positions.splice(index, 1);

            $scope.actionPosition(0);
        });
    }

    /** client button position */
    $scope.actionPosition = (action) => {
        const btnCreatePosition = $('.btn__create-position');
        const btnUpdatePosition = $('.btn__update-position');

        if(action == 0) {
            btnUpdatePosition.attr('disabled', true);
            btnCreatePosition.attr('disabled', false);
            btnCreatePosition.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');
            $scope.position = {};
        }

        if(action == 1) {
            btnCreatePosition.attr('disabled', true);
            btnUpdatePosition.attr('disabled', false);
        }
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const role = JSON.stringify($scope.role);
        const position = JSON.stringify($scope.position);

        switch(isDeleted) {
            case role: $scope.deleteRole($scope.role.id); break;
            case position: $scope.deletePosition($scope.position.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})