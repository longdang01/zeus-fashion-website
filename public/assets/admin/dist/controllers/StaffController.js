app.controller('StaffController', function($rootScope, $scope, $http, $timeout) {
    const PICTURE_UPLOAD = $('#picture-upload');
    const PICTURE_IMAGE = $('#picture-image');
    const DELETE_MODAL = $('#delete-modal');
    const SAVE_STAFF_MODAL = $('#save-modal-staff');

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

    /** api/staffs/get */
    const apiGetStaffs = `http://localhost:8000/api/staffs`;
    $scope.getStaffs = () => {
        $http(
            {
                method: 'GET',
                url: apiGetStaffs
            }
        ).then((res) => {
            $scope.staffs = res.data[0];
            $scope.roles = res.data.roles;
            $scope.positionList = res.data.positions;

            console.log($scope.staffs);
        }, (err) => console.log(err))
    }

    $scope.getStaffs();
    
    /** api/staffs/get-by-id/{id} */
    $scope.getStaff = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm nhân viên' : 'Cập nhật nhân viên';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) { 
            $('#username').attr('readonly', false);
            $scope.staff = {};
            $scope.users = {}; 
            $scope.resetPicture();
            $scope.positions = [];
        } else {
            $('#username').attr('readonly', true);
            // $('#password').attr('readonly', true);

            const apiGetStaff = `http://localhost:8000/api/staffs/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetStaff
                }
            ).then((res) => {
                $scope.staff = res.data;
                $scope.positions = $scope.positionList.filter
                (position => position.role_id == $scope.staff.position.role_id);
                
                if(!$scope.staff.picture) $scope.resetPicture();
                if($scope.staff.picture) { 
                    PICTURE_IMAGE.css('display', 'block');
                    PICTURE_IMAGE.attr('src', `/uploads/staffs/${$scope.staff.id}/${$scope.staff.picture}`);
                    PICTURE_UPLOAD.val('');
                } 

                if(index) { 
                    $scope.isDeleted = $scope.staff;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_STAFF_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    $scope.changeRole = () => {
        $scope.positions = $scope.positionList.filter(
            position => position.role_id == $scope.staff.position.role_id)
    }

    /** handle image */
    $scope.setUpload = (fileData, element, object) => {
        var reader = new FileReader(); 

        reader.onload = function(e) {
            $(element).attr('src', e.target.result); 
        }
        reader.readAsDataURL(fileData);

        if(object == 'staffs') {
            $scope.postStaff = new FormData();
            $scope.postStaff.append('file', fileData);
            $scope.postStaff.append('object', 'staffs');
        }
    }

    $scope.resetPicture = () => {
        PICTURE_UPLOAD.val(''); 
        PICTURE_IMAGE.attr('src', '');
        PICTURE_IMAGE.css('display', 'none');
        $scope.staff.picture = null;
    }

    PICTURE_UPLOAD.change(function () {
        PICTURE_IMAGE.css('display', 'block');
        $scope.setUpload(this.files[0], '#picture-image', 'staffs');
    });

    /** api/upload */
    $scope.upload = (data) => {
        const apiUpload = `http://localhost:8000/api/upload`;

        $.ajax({
            headers: { 'X-CSRF-Token': $('meta[name=csrf_token]').attr('content') },
            async: true,
            type: 'post',
            contentType: false,
            processData: false,
            url: apiUpload,
            data: data,
            success: (res) => {},
            error: (err) => console.log(err)
        });
    }

    /** save staff */
    $scope.addStaff = () => {
        const apiCreateStaff = `http://localhost:8000/api/staffs`;
        $scope.staff.users_id = $scope.users.id;
        $http({
            method: 'POST',
            url: apiCreateStaff,
            data: $scope.staff,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.staffs.push(res.data);

            $scope.afterSaveStaff(res.data.id);

        }, (err) => console.log(err));
    }

    $scope.saveStaff = () => {
        $scope.staff.picture = (PICTURE_UPLOAD[0].files[0]) ? PICTURE_UPLOAD[0].files[0]['name'] : $scope.staff.picture;

        /** api/staffs/create */
        if($scope.action == 0) {
            const apiCreateUsers = `http://localhost:8000/api/users`;
            
            $scope.users.username = $scope.staff.users.username;
            $scope.users.password = $scope.staff.users.password;

            $http({
                method: 'POST',
                url: apiCreateUsers,
                data: $scope.users,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.users = res.data[0];

                $scope.addStaff();
            }, (err) => error());
        } 

        /** api/staffs/update */
        if($scope.action == 1) {
            const apiUpdateStaff = `http://localhost:8000/api/staffs/${$scope.staff.id}`;

            console.log($scope.staff.position_id);
            $http({
                method: 'PUT',
                url: apiUpdateStaff,
                data: $scope.staff,
                "content-Type": "application/json"
            }).then((res) => {
                const index = $scope.staffs.findIndex(item => item.id == $scope.staff.id);
                $scope.staffs[index] = res.data;

                $scope.afterSaveStaff($scope.staff.id);

            }, (err) => console.log(err));
        }
    }

    $scope.afterSaveStaff = (id) => {
        if($scope.postStaff) {

            $scope.postStaff.append('id', id);
            $scope.upload($scope.postStaff);
        }
        SAVE_STAFF_MODAL.modal('hide');
    }

    /** api/staffs/delete/{id} */
    $scope.deleteStaff = (id) => {
        const apiDeleteStaff = `http://localhost:8000/api/staffs/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteStaff
        }).then((res) => {

            const index = $scope.staffs.findIndex(item => item.id == $scope.staff.id);
            $scope.staffs.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const staff = JSON.stringify($scope.staff);

        switch(isDeleted) {
            case staff: $scope.deleteStaff($scope.staff.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})