app.controller('CategoryController', function($rootScope, $scope, $http, $timeout) {
    
    const DELETE_MODAL = $('#delete-modal');
    const SAVE_CATEGORY_MODAL = $('#save-modal-category');

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

    /** api/categories/get */
    const apiGetCategories = `http://localhost:8000/api/categories`;
    $scope.getCategories = () => {
        $http(
            {
                method: 'GET',
                url: apiGetCategories
            }
        ).then((res) => {
            $scope.categories = res.data[0];

            console.log($scope.categories);
        }, (err) => console.log(err))
    }

    $scope.getCategories();
    
    /** api/categories/get-by-id/{id} */
    $scope.getCategory = (id, index) => {


        $scope.subCategory = {};
        $scope.title = (id == 0) ? 'Thêm danh mục' : 'Cập nhật danh mục';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) $scope.category = {};
        else {
            const apiGetCategory = `http://localhost:8000/api/categories/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetCategory
                }
            ).then((res) => {
                $scope.actionSubCategory(0);
                $scope.category = res.data;

                console.log($scope.category);
                if(index) { 
                    $scope.isDeleted = $scope.category;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_CATEGORY_MODAL.modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** save category */
    $scope.saveCategory = () => {

        /** api/categories/create */
        if($scope.action == 0) {
            const apiCreateCategory = `http://localhost:8000/api/categories`;

            $http({
                method: 'POST',
                url: apiCreateCategory,
                data: $scope.category,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.categories.push(res.data);

                SAVE_CATEGORY_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/categories/update */
        if($scope.action == 1) {
            const apiUpdateCategory = `http://localhost:8000/api/categories/${$scope.category.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateCategory,
                data: $scope.category,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.categories.findIndex(item => item.id == $scope.category.id);
                $scope.categories[index] = $scope.category;

                SAVE_CATEGORY_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/categories/delete/{id} */
    $scope.deleteCategory = (id) => {
        const apiDeleteCategory = `http://localhost:8000/api/categories/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteCategory
        }).then((res) => {

            const index = $scope.categories.findIndex(item => item.id == $scope.category.id);
            $scope.categories.splice(index, 1);
        });
    }

    /** api/subCategories/get-by-id/{id} */
    $scope.getSubCategory = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionSubCategory(1);

        const apiGetSubCategory = `http://localhost:8000/api/subCategories/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetSubCategory
            }
        ).then((res) => {
            $scope.subCategory = res.data;
            console.log($scope.subCategory);
            
            if(index == -1) { 
                $scope.isDeleted = $scope.subCategory;
                DELETE_MODAL.modal('show');
            }
        }, (err) => console.log(err))
    }

    /** api/subCategories/create */
    $scope.addSubCategory = () => {
        $scope.subCategory.category_id = $scope.category.id;

        const apiCreateSubCategory = `http://localhost:8000/api/subCategories`;
        $http({
            method: 'POST',
            url: apiCreateSubCategory,
            data: $scope.subCategory,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.category.sub_categories.push(res.data);
            $scope.actionSubCategory(0);

        }, (err) => console.log(err));
    }

    /** api/subCategories/update */
    $scope.updateSubCategory = () => {
        const apiUpdateSubCategory = `http://localhost:8000/api/subCategories/${$scope.subCategory.id}`;

        $http({
            method: 'PUT',
            url: apiUpdateSubCategory,
            data: $scope.subCategory,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.category.sub_categories.findIndex(item => item.id == $scope.subCategory.id);
            $scope.category.sub_categories[index] = $scope.subCategory;
            
            $scope.actionSubCategory(0);
        }, (err) => console.log(err));
    }

    /** api/subCategories/delete/{id} */
    $scope.deleteSubCategory = (id) => {
        const apiDeleteSubCategory = `http://localhost:8000/api/subCategories/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteSubCategory
        }).then((res) => {

            const index = $scope.category.sub_categories.findIndex(item => item.id == $scope.subCategory.id);
            $scope.category.sub_categories.splice(index, 1);

            $scope.actionSubCategory(0);
        });
    }

    /** client button subCategory */
    $scope.actionSubCategory = (action) => {
        const btnCreateSubCategory = $('.btn__create-subCategory');
        const btnUpdateSubCategory = $('.btn__update-subCategory');

        if(action == 0) {
            btnUpdateSubCategory.attr('disabled', true);
            btnCreateSubCategory.attr('disabled', false);
            btnCreateSubCategory.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');
            $scope.subCategory = {};
        }

        if(action == 1) {
            btnCreateSubCategory.attr('disabled', true);
            btnUpdateSubCategory.attr('disabled', false);
        }
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const category = JSON.stringify($scope.category);
        const subCategory = JSON.stringify($scope.subCategory);

        switch(isDeleted) {
            case category: $scope.deleteCategory($scope.category.id); break;
            case subCategory: $scope.deleteSubCategory($scope.subCategory.id); break;
        }

        
        // $('#delete-modal').modal('hide');
    }
})