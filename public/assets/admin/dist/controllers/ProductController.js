app.controller('ProductController', function($rootScope, $scope, $http, $timeout) {
    const SIZE_TABLE_UPLOAD = $('#size-table-upload');
    const SIZE_TABLE_IMAGE = $('#size-table-image');
    const COLOR_UPLOAD = $('#color-upload');
    const COLOR_IMAGE = $('#color-image');
    const SUCCESS_MODAL = $('#success-modal')

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

    /** api/products/get */
    const apiGetProducts = `http://localhost:8000/api/products`;
    $scope.getProducts = () => {
        $http(
            {
                method: 'GET',
                url: apiGetProducts
            }
        ).then((res) => {
            $scope.products = res.data[0];
            $scope.categories = res.data.categories;
            $scope.brands = res.data.brands;
            $scope.suppliers = res.data.suppliers;

            //get remaining stock 
            $scope.getRemainingStock($scope.products);

            console.log($scope.products);
        }, (err) => console.log(err))
    }

    $scope.getProducts();
    
    /** api/products/get-by-id/{id} */
    $scope.getProduct = (id, index) => {


        $scope.color = {};
        $scope.title = (id == 0) ? 'Thêm sản phẩm' : 'Cập nhật sản phẩm';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) { 
            $scope.product = {};
            $scope.product.product_code = $scope.generateCode($scope.products);
            $scope.resetSTB();
        } 
        else {
            // $scope.actionColor(0);
            const apiGetProduct = `http://localhost:8000/api/products/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetProduct
                }
            ).then((res) => {
                $scope.actionColor(0);

                $scope.product = res.data;

                if(!$scope.product.size_table) $scope.resetSTB();
                if($scope.product.size_table) { 
                    SIZE_TABLE_IMAGE.css('display', 'block');
                    SIZE_TABLE_IMAGE.attr('src', `/uploads/products/${$scope.product.id}/${$scope.product.size_table}`);
                    SIZE_TABLE_UPLOAD.val('');
                } 
                console.log($scope.product);

                if(index) { 
                    $scope.isDeleted = $scope.product;
                    $('#delete-modal').modal('show');
                }
                if(!index) {
                    $('#save-modal-product').modal('show')
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

        if(object == 'products') {
            $scope.postProduct = new FormData();
            $scope.postProduct.append('file', fileData);
            $scope.postProduct.append('object', 'products');
        }
    }

    $scope.resetSTB = () => {
        SIZE_TABLE_UPLOAD.val(''); 
        SIZE_TABLE_IMAGE.attr('src', ''); 
        SIZE_TABLE_IMAGE.css('display', 'none');
        $scope.product.size_table = null;
    }

    SIZE_TABLE_UPLOAD.change(function () {
        SIZE_TABLE_IMAGE.css('display', 'block');
        $scope.setUpload(this.files[0], '#size-table-image', 'products');
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

    /** save product */
    $scope.saveProduct = () => {
        
        $scope.product.size_table = (SIZE_TABLE_UPLOAD[0].files[0]) ? SIZE_TABLE_UPLOAD[0].files[0]['name'] : $scope.product.size_table;
        console.log($scope.product.size_table);
        /** api/products/create */
        if($scope.action == 0) {
            const apiCreateProduct = `http://localhost:8000/api/products`;

            $http({
                method: 'POST',
                url: apiCreateProduct,
                data: $scope.product,
                "content-Type": "application/json"
            }).then((res) => {

                $scope.products.unshift(res.data);

                $scope.getRemainingStock($scope.products);
                
                $scope.afterSaveProduct(res.data.id);
            }, (err) => console.log(err));
        } 

        /** api/products/update */
        if($scope.action == 1) {
            const apiUpdateProduct = `http://localhost:8000/api/products/${$scope.product.id}`;
            console.log($scope.product);

            $http({
                method: 'PUT',
                url: apiUpdateProduct,
                data: $scope.product,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.products.findIndex(item => item.id == $scope.product.id);
                $scope.products[index] = $scope.product;

                $scope.getRemainingStock($scope.products);

                $scope.afterSaveProduct($scope.product.id);
            }, (err) => console.log(err));
        }
    }

    $scope.afterSaveProduct = (id) => {
        if($scope.postProduct) {

            $scope.postProduct.append('id', id);
            $scope.upload($scope.postProduct);
        }
        $('#save-modal-product').modal('hide');
    }

    /** api/products/delete/{id} */
    $scope.deleteProduct = (id) => {
        const apiDeleteProduct = `http://localhost:8000/api/products/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteProduct
        }).then((res) => {

            const index = $scope.products.findIndex(item => item.id == $scope.product.id);
            $scope.products.splice(index, 1);
        });
    }

    /** api/colors/get-by-id/{id} */
    $scope.getColor = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionColor(1);

        const apiGetColor = `http://localhost:8000/api/colors/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetColor
            }
        ).then((res) => {
            $scope.color = res.data;
            
            if(index == 1) {
                $scope.actionPrice(-1);
                $scope.actionSize(0);
                $scope.actionDiscount(0);
                $scope.actionImage(0);
                $('#color-modal').modal('show');
            }

            if(index == -1) { 
                $scope.isDeleted = $scope.color;
                $('#delete-modal').modal('show');
            }
        }, (err) => console.log(err))
    }

    /** api/colors/create */
    $scope.addColor = () => {
        $scope.color.product_id = $scope.product.id;

        const apiCreateColor = `http://localhost:8000/api/colors`;
        $http({
            method: 'POST',
            url: apiCreateColor,
            data: $scope.color,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.product.colors.push(res.data);
            $scope.actionColor(0);


        }, (err) => console.log(err));
    }

    /** api/colors/update */
    $scope.updateColor = () => {
        const apiUpdateColor = `http://localhost:8000/api/colors/${$scope.color.id}`;

        $http({
            method: 'PUT',
            url: apiUpdateColor,
            data: $scope.color,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.product.colors.findIndex(item => item.id == $scope.color.id);
            $scope.product.colors[index] = $scope.color;
            
            $scope.actionColor(0);
        }, (err) => console.log(err));
    }

    /** api/colors/delete/{id} */
    $scope.deleteColor = (id) => {
        const apiDeleteColor = `http://localhost:8000/api/colors/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteColor
        }).then((res) => {

            const index = $scope.product.colors.findIndex(item => item.id == $scope.color.id);
            $scope.product.colors.splice(index, 1);

            $scope.actionColor(0);
        });
    }

    /** client button color */
    $scope.actionColor = (action) => {
        const btnCreateColor = $('.btn__create-color');
        const btnUpdateColor = $('.btn__update-color');
        const tableColors = $('.table__colors');

        if(action == 0) {
            btnUpdateColor.attr('disabled', true);
            btnCreateColor.attr('disabled', false);
            tableColors.find('tr').removeClass('active');
            $scope.color = {};
        }

        if(action == 1) {
            btnCreateColor.attr('disabled', true);
            btnUpdateColor.attr('disabled', false);
        }
    }

    /** save price */
    $scope.savePrice = () => {
        
        /** api/prices/update */
        if($scope.color.price.id) {
            const apiUpdatePrice = `http://localhost:8000/api/prices/${$scope.color.price.id}`;
    
            console.log($scope.color.price);
            if($scope.color.price.price == '') {
                $scope.deletePrice($scope.color.price.id);
            }
            $http({
                method: 'PUT',
                url: apiUpdatePrice,
                data: $scope.color.price,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $scope.product.colors.findIndex(item => item.id == $scope.color.id);
                $scope.product.colors[index] = $scope.color;
                $scope.actionPrice(-1);
                SUCCESS_MODAL.modal('show');
                SUCCESS_MODAL.on('hidden.bs.modal', function () {
                    removeScrollOfBody();
                })
            }, (err) => console.log(err));
        }
        /** api/prices/create */
        else {
            const apiCreatePrice = `http://localhost:8000/api/prices/`;
            $scope.color.price.color_id = $scope.color.id;
    
            $http({
                method: 'POST',
                url: apiCreatePrice,
                data: $scope.color.price,
                "content-Type": "application/json"
            }).then((res) => {
                const index = $scope.product.colors.findIndex(item => item.id == $scope.color.id);
                $scope.product.colors[index] = $scope.color;

                $scope.actionPrice(-1);
                SUCCESS_MODAL.modal('show');
                SUCCESS_MODAL.on('hidden.bs.modal', function () {
                    removeScrollOfBody();
                })
            }, (err) => console.log(err));
        }
    }

    /** api/prices/delete/{id} */
    $scope.deletePrice = (id, index) => {
        if(index) {
            $('#delete-modal').modal('show');
            $scope.isDeleted = $scope.color.price;
        } else {
            const apiDeletePrice = `http://localhost:8000/api/prices/${id}`;
            $http({
                method: "DELETE",
                url: apiDeletePrice
            }).then((res) => {
    
                $scope.color.price.price = null;
                const index = $scope.product.colors.findIndex(item => item.id == $scope.color.id);
                $scope.product.colors[index] = $scope.color;
                $scope.actionPrice(-1);
                removeScrollOfBody();
            });
        }
    }

    /** client button color */
    $scope.actionPrice = (action) => {
        const btnDeletePrice = $('.btn__delete-price');

        if(action == -1) {
            if($scope.color.price == null || $scope.color.price.price == null) {
                btnDeletePrice.attr('disabled', true);
            }else {
                btnDeletePrice.attr('disabled', false);
            }
        }
    }

    /** api/sizes/get-by-id/{id} */
    $scope.getSize = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionSize(1);

        const apiGetSize = `http://localhost:8000/api/sizes/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetSize
            }
        ).then((res) => {
            $scope.size = res.data;

            if(index == -1) { 
                $scope.isDeleted = $scope.size;
                $('#delete-modal').modal('show');

                $('#delete-modal').on('hidden.bs.modal', function () {
                    removeScrollOfBody();
                })
            }
        }, (err) => console.log(err))
    }

    /** api/sizes/create */
    $scope.addSize = () => {
        $scope.size.color_id = $scope.color.id;

        const apiCreateSize = `http://localhost:8000/api/sizes`;
        $http({
            method: 'POST',
            url: apiCreateSize,
            data: $scope.size,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.color.sizes.push(res.data);
            $scope.actionSize(0);

            $scope.getProducts();

        }, (err) => console.log(err));
    }

    /** api/sizes/update */
    $scope.updateSize = () => {
        const apiUpdateSize = `http://localhost:8000/api/sizes/${$scope.size.id}`;

        $http({
            method: 'PUT',
            url: apiUpdateSize,
            data: $scope.size,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.color.sizes.findIndex(item => item.id == $scope.size.id);
            $scope.color.sizes[index] = $scope.size;

            $scope.getProducts();
            
            $scope.actionSize(0);
        }, (err) => console.log(err));
    }

    /** api/sizes/delete/{id} */
    $scope.deleteSize = (id) => {
        const apiDeleteSize = `http://localhost:8000/api/sizes/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteSize
        }).then((res) => {

            const index = $scope.color.sizes.findIndex(item => item.id == $scope.size.id);
            $scope.color.sizes.splice(index, 1);

            $scope.getProducts();

            $scope.actionSize(0);
            removeScrollOfBody();
        });
    }

    /** client button size */
    $scope.actionSize = (action) => {
        const btnCreateSize = $('.btn__create-size');
        const btnUpdateSize = $('.btn__update-size');

        if(action == 0) {
            btnUpdateSize.attr('disabled', true);
            btnCreateSize.attr('disabled', false);
            btnCreateSize.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');
            $scope.size = {};
        }

        if(action == 1) {
            btnCreateSize.attr('disabled', true);
            btnUpdateSize.attr('disabled', false);
        }
    }

    /** api/discounts/get-by-id/{id} */
    $scope.getDiscount = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionDiscount(1);

        const apiGetDiscount = `http://localhost:8000/api/discounts/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetDiscount
            }
        ).then((res) => {
            $scope.discount = res.data;

            if(index == -1) { 
                $scope.isDeleted = $scope.discount;
                $('#delete-modal').modal('show');
                $('#delete-modal').on('hidden.bs.modal', function () {
                    removeScrollOfBody();
                })
            }
        }, (err) => console.log(err))
    }

    /** api/discounts/create */
    $scope.addDiscount = () => {
        $scope.discount.color_id = $scope.color.id;

        const apiCreateDiscount = `http://localhost:8000/api/discounts`;
        $http({
            method: 'POST',
            url: apiCreateDiscount,
            data: $scope.discount,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.color.discounts.push(res.data);
            $scope.actionDiscount(0);

        }, (err) => console.log(err));
    }

    /** api/discounts/update */
    $scope.updateDiscount = () => {
        const apiUpdateDiscount = `http://localhost:8000/api/discounts/${$scope.discount.id}`;

        $http({
            method: 'PUT',
            url: apiUpdateDiscount,
            data: $scope.discount,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.color.discounts.findIndex(item => item.id == $scope.discount.id);
            $scope.color.discounts[index] = $scope.discount;

            $scope.actionDiscount(0);
        }, (err) => console.log(err));
    }

    /** api/discounts/delete/{id} */
    $scope.deleteDiscount = (id) => {
        const apiDeleteDiscount = `http://localhost:8000/api/discounts/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteDiscount
        }).then((res) => {
            const index = $scope.color.discounts.findIndex(item => item.id == $scope.discount.id);
            $scope.color.discounts.splice(index, 1);
            
            $scope.actionDiscount(0);
            removeScrollOfBody();
        });
    }

    /** client button discount */
    $scope.actionDiscount = (action) => {
        const btnCreateDiscount = $('.btn__create-discount');
        const btnUpdateDiscount = $('.btn__update-discount');        

        if(action == 0) {
            btnUpdateDiscount.attr('disabled', true);
            btnCreateDiscount.attr('disabled', false);            
            btnCreateDiscount.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');

            $scope.discount = {};
        }

        if(action == 1) {
            btnCreateDiscount.attr('disabled', true);
            btnUpdateDiscount.attr('disabled', false);
        }
    }

    /** handle color image upload */
    COLOR_UPLOAD.change(function () {
        COLOR_IMAGE.css('display', 'block');
        $scope.setUpload(this.files[0], '#color-image', 'products');
    });

    /** api/images/get-by-id/{id} */
    $scope.getImage = (id, event, index) => {
        $(event.target).parents('tr').addClass('active').siblings().removeClass('active');
        $scope.actionImage(1);

        const apiGetImage = `http://localhost:8000/api/images/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetImage
            }
        ).then((res) => {
            $scope.image = res.data;
            COLOR_IMAGE.css('display', 'block');
            COLOR_IMAGE.attr('src', `/uploads/products/${$scope.product.id}/${$scope.image.picture}`)

            if(index == -1) { 
                $scope.isDeleted = $scope.image;
                $('#delete-modal').modal('show');
                $('#delete-modal').on('hidden.bs.modal', function () {
                    removeScrollOfBody();
                })
            }
        }, (err) => console.log(err))
    }

    /** api/images/create */
    $scope.addImage = () => {
        $scope.image.color_id = $scope.color.id;
        $scope.image.picture = (COLOR_UPLOAD[0].files[0]) ? COLOR_UPLOAD[0].files[0]['name'] : $scope.image.picture;

        const apiCreateImage = `http://localhost:8000/api/images`;
        $http({
            method: 'POST',
            url: apiCreateImage,
            data: $scope.image,
            "content-Type": "application/json"
        }).then((res) => {
            $scope.color.images.push(res.data);

            $scope.afterSaveImage($scope.product.id);
            $scope.actionImage(0);
        }, (err) => console.log(err));
    }

    /** api/images/update */
    $scope.updateImage = () => {
        const apiUpdateImage = `http://localhost:8000/api/images/${$scope.image.id}`;
        $scope.image.picture = (COLOR_UPLOAD[0].files[0]) ? COLOR_UPLOAD[0].files[0]['name'] : $scope.image.picture;
        
        $http({
            method: 'PUT',
            url: apiUpdateImage,
            data: $scope.image,
            "content-Type": "application/json"
        }).then((res) => {

            const index = $scope.color.images.findIndex(item => item.id == $scope.image.id);
            $scope.color.images[index] = $scope.image;

            $scope.afterSaveImage($scope.product.id);
            $scope.actionImage(0);
        }, (err) => console.log(err));
    }

    $scope.afterSaveImage = (id) => {
        if($scope.postProduct) {

            $scope.postProduct.append('id', id);
            $scope.upload($scope.postProduct);
        }
    }

    /** api/images/delete/{id} */
    $scope.deleteImage = (id) => {
        const apiDeleteImage = `http://localhost:8000/api/images/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteImage
        }).then((res) => {
            const index = $scope.color.images.findIndex(item => item.id == $scope.image.id);
            $scope.color.images.splice(index, 1);
            
            $scope.actionImage(0);
            removeScrollOfBody();
        });
    }

    /** client button image */
    $scope.actionImage = (action) => {
        const btnCreateImage = $('.btn__create-image');
        const btnUpdateImage = $('.btn__update-image');

        if(action == 0) {
            btnUpdateImage.attr('disabled', true);
            btnCreateImage.attr('disabled', false);
            btnCreateImage.parents('.grid').siblings('.table__colors').find('tr').removeClass('active');
            COLOR_IMAGE.attr('src', '')
            COLOR_UPLOAD.val('')
            COLOR_IMAGE.css('display', 'none');

            $scope.image = {};
        }

        if(action == 1) {
            btnCreateImage.attr('disabled', true);
            btnUpdateImage.attr('disabled', false);
        }
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const product = JSON.stringify($scope.product);
        const color = JSON.stringify($scope.color);
        const price = JSON.stringify($scope.color.price);
        const size = JSON.stringify($scope.size);
        const discount = JSON.stringify($scope.discount);
        const image = JSON.stringify($scope.image);

        switch(isDeleted) {
            case product: $scope.deleteProduct($scope.product.id); break;
            case color: $scope.deleteColor($scope.color.id); break;
            case price: $scope.deletePrice($scope.color.price.id); break;
            case size: $scope.deleteSize($scope.size.id); break;
            case discount: $scope.deleteDiscount($scope.discount.id); break;
            case image: $scope.deleteImage($scope.image.id); break;
        }
        // $('#delete-modal').modal('hide');
    }

    /** get remaining stock */
    $scope.getRemainingStock = (products) => {
        products.forEach((item, index) => {
            $scope.sizes = [];
            $scope.remainingStock = 0;  

            item.colors.forEach((item, index) => {
                $scope.sizes.push(item.sizes);
            })

            $scope.sizes = [].concat.apply([], $scope.sizes);
    
            $scope.sizes.forEach((item, index) => {
                $scope.remainingStock += item.quantity;
            })

            item['remaining_stock'] = $scope.remainingStock;
        })
    }

    /** random product code */
    $scope.generateCode = (list) => {
        let maximum = 99999999;
        let minimum = 10000000;

        let random = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;

        list.forEach((item, index) => {
            if(item.product_code === random) {
                random = Math.floor(Math.random() * (maximum - minimum + 1)) + minimum;
            }
        })
        return random.toString();
    }
})