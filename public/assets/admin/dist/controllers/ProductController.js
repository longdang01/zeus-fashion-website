app.controller('ProductController', function($rootScope, $scope, $http, $timeout) {
    // $('#color-modal').modal('show');
    const SIZE_TABLE_UPLOAD = $('#size-table-upload');
    const SIZE_TABLE_IMAGE = $('#size-table-image');

    /** pagination */ 
    $scope.currentPage = 1;
    $scope.pageSize = 10;
    $scope.confirmDelete = false;


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

        $scope.actionColor(0);

        $scope.color = {};
        $scope.title = (id == 0) ? 'Thêm sản phẩm' : 'Cập nhật sản phẩm';
        $scope.action = (id == 0) ? 0 : 1;

        if(id == 0) { 
            $scope.product = {};
            $scope.product.product_code = $scope.generateCode($scope.products);
            $scope.resetSTB();
        } 
        else {
            const apiGetProduct = `http://localhost:8000/api/products/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetProduct
                }
            ).then((res) => {
                $scope.product = res.data;
                $scope.getColorsByProduct($scope.product.id);

                if(!$scope.product.size_table) $scope.resetSTB();
                if($scope.product.size_table) { 
                    SIZE_TABLE_IMAGE.attr('src', `/uploads/products/${$scope.product.id}/${$scope.product.size_table}`);
                    SIZE_TABLE_UPLOAD.val(null);
                } 

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
        SIZE_TABLE_UPLOAD.val(null); 
        SIZE_TABLE_IMAGE.attr('src', null); 
    }

    SIZE_TABLE_UPLOAD.change(function () {
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

        $scope.product.size_table = (SIZE_TABLE_UPLOAD[0].files[0]) ? SIZE_TABLE_UPLOAD[0].files[0]['name'] : null;

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

    /** api/get-colors-by-product/{id} */
    $scope.getColorsByProduct = (id) => {

        const apiGetColorsByProduct = `http://localhost:8000/api/get-colors-by-product/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetColorsByProduct
            }
        ).then((res) => {
            $scope.colors = res.data[0];

        }, (err) => console.log(err))
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
            $scope.getSizesByColor($scope.color.id);
            
            if(index == 1) {
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
            $scope.colors.push(res.data);
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

            const index = $scope.colors.findIndex(item => item.id == $scope.color.id);
            $scope.colors[index] = $scope.color;
            
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

            const index = $scope.colors.findIndex(item => item.id == $scope.color.id);
            $scope.colors.splice(index, 1);

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
    
            $http({
                method: 'PUT',
                url: apiUpdatePrice,
                data: $scope.color.price,
                "content-Type": "application/json"
            }).then((res) => {
                const index = $scope.colors.findIndex(item => item.id == $scope.color.id);
                $scope.colors[index] = $scope.color;
                $('#success-modal-preview').modal('show');
            }, (err) => console.log(err));
        }
        /** api/prices/create */
        else {
            const apiCreatePrice = `http://localhost:8000/api/prices/`;
            $scope.color.price.color_id = $scope.color.id;
            $scope.color.price.is_active = 1;
    
            $http({
                method: 'POST',
                url: apiCreatePrice,
                data: $scope.color.price,
                "content-Type": "application/json"
            }).then((res) => {
                $scope.color.price = res.data;
                const index = $scope.colors.findIndex(item => item.id == $scope.color.id);
                $scope.colors[index] = $scope.color;
                $('#success-modal-preview').modal('show');
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
                const index = $scope.colors.findIndex(item => item.id == $scope.color.id);
                $scope.colors[index] = $scope.color;
            });
        }
    }

    /** api/get-sizes-by-color/{id} */
    $scope.getSizesByColor = (id) => {

        const apiGetSizesByColor = `http://localhost:8000/api/get-sizes-by-color/${id}`;
        $http(
            {
                method: 'GET',
                url: apiGetSizesByColor
            }
        ).then((res) => {
            $scope.sizes = res.data[0];

        }, (err) => console.log(err))
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
            $scope.sizes.push(res.data);
            $scope.actionSize(0);


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

            const index = $scope.sizes.findIndex(item => item.id == $scope.size.id);
            $scope.sizes[index] = $scope.size;
            
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

            const index = $scope.sizes.findIndex(item => item.id == $scope.size.id);
            $scope.sizes.splice(index, 1);

            $scope.actionSize(0);
        });
    }

    /** client button color */
    $scope.actionSize = (action) => {
        const btnCreateSize = $('.btn__create-size');
        const btnUpdateSize = $('.btn__update-size');
        const tableSizes = $('.table__sizes');

        if(action == 0) {
            btnUpdateSize.attr('disabled', true);
            btnCreateSize.attr('disabled', false);
            tableSizes.find('tr').removeClass('active');
            $scope.size = {};
        }

        if(action == 1) {
            btnCreateSize.attr('disabled', true);
            btnUpdateSize.attr('disabled', false);
        }
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const product = JSON.stringify($scope.product);
        const color = JSON.stringify($scope.color);
        const price = JSON.stringify($scope.color.price);
        const size = JSON.stringify($scope.size);

        switch(isDeleted) {
            case product: $scope.deleteProduct($scope.product.id); break;
            case color: $scope.deleteColor($scope.color.id); break;
            case price: $scope.deletePrice($scope.color.price.id); break;
            case size: $scope.deleteSize($scope.size.id); break;
        }
        $('#delete-modal').modal('hide');
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