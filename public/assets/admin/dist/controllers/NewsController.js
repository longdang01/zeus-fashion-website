app.controller('NewsController', function($rootScope, $scope, $http, $timeout) {

    const NEWS_UPLOAD = $('#news-upload');
    const NEWS_IMAGE = $('#news-image');
    const DELETE_MODAL = $('#delete-modal')

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

    /** api/news/get */
    const apiGetNewsList = `http://localhost:8000/api/news`;
    $scope.getNewsList = () => {
        $http(
            {
                method: 'GET',
                url: apiGetNewsList
            }
        ).then((res) => {
            $scope.newsList = res.data[0];

            console.log($scope.newsList);
        }, (err) => console.log(err))
    }

    $scope.getNewsList();
    
    /** api/news/get-by-id/{id} */
    $scope.getNews = (id, index) => {

        $scope.title = (id == 0) ? 'Thêm tin tức' : 'Cập nhật tin tức';
        $scope.action = (id == 0) ? 0 : 1;
        console.log($scope.news);
        if(id == 0) { 
            $scope.news = {};
            $scope.news.staff_id = $rootScope.staffID;
            $scope.resetPicture();
        } 
        else {
            $scope.news.staff_id = $rootScope.staffID;
            const apiGetNews = `http://localhost:8000/api/news/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetNews
                }
            ).then((res) => {
                $scope.news = res.data;

                if(!$scope.news.picture) $scope.resetPicture();
                if($scope.news.picture) { 
                    NEWS_IMAGE.css('display', 'block');
                    NEWS_IMAGE.attr('src', `/uploads/news/${$scope.news.id}/${$scope.news.picture}`);
                    NEWS_UPLOAD.val('');
                } 

                if(index) { 
                    $scope.isDeleted = $scope.news;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    $('#save-modal-news').modal('show')
                };
            }, (err) => console.log(err))
        }
    }

    /** handle image */
    $scope.setUpload = (fileData, element, object) => {
        var reader = new FileReader(); 

        reader.onload = function(e) {
            $(element).attr('src', e.target.result); 
        }
        reader.readAsDataURL(fileData);

        if(object == 'news') {
            $scope.postNews = new FormData();
            $scope.postNews.append('file', fileData);
            $scope.postNews.append('object', 'news');
        }
    }

    $scope.resetPicture = () => {
        NEWS_UPLOAD.val(''); 
        NEWS_IMAGE.attr('src', ''); 
        NEWS_IMAGE.css('display', 'none');
        $scope.news.picture = null;
        
    }

    NEWS_UPLOAD.change(function () {
        NEWS_IMAGE.css('display', 'block');
        $scope.setUpload(this.files[0], '#news-image', 'news');
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

    /** save news */
    $scope.saveNews = () => {

        $scope.news.picture = (NEWS_UPLOAD[0].files[0]) ? NEWS_UPLOAD[0].files[0]['name'] : $scope.news.picture;

        /** api/news/create */
        if($scope.action == 0) {
            const apiCreateNews = `http://localhost:8000/api/news`;

            $http({
                method: 'POST',
                url: apiCreateNews,
                data: $scope.news,
                "content-Type": "application/json"
            }).then((res) => {

                $scope.newsList.unshift(res.data);

                $scope.afterSaveNews(res.data.id);
            }, (err) => console.log(err));
        } 

        /** api/news/update */
        if($scope.action == 1) {
            const apiUpdateNews = `http://localhost:8000/api/news/${$scope.news.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateNews,
                data: $scope.news,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.newsList.findIndex(item => item.id == $scope.news.id);
                $scope.newsList[index] = $scope.news;

                $scope.afterSaveNews($scope.news.id);
            }, (err) => console.log(err));
        }
    }

    $scope.afterSaveNews = (id) => {
        if($scope.postNews) {

            $scope.postNews.append('id', id);
            $scope.upload($scope.postNews);
        }
        $('#save-modal-news').modal('hide');
    }

    /** api/news/delete/{id} */
    $scope.deleteNews = (id) => {
        const apiDeleteNews = `http://localhost:8000/api/news/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteNews
        }).then((res) => {
            console.log(1);
            const index = $scope.newsList.findIndex(item => item.id == $scope.news.id);
            $scope.newsList.splice(index, 1);
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const news = JSON.stringify($scope.news);
        console.log(isDeleted == news);
        console.log(isDeleted);
        console.log(news);

        switch(isDeleted) {
            case news: $scope.deleteNews($scope.news.id); break;
        }
        // $('#delete-modal').modal('hide');
    }
})