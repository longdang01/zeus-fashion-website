app.controller('DeliveryAddressController', function($rootScope, $scope, $http, $timeout, $location, $window) {
    const DELETE_MODAL = $('#delete-modal');
    const SAVE_DELIVERY_ADDRESS_MODAL = $('#delivery-address-modal');

    const customerID = JSON.parse(sessionStorage.getItem('customerID'));

    // Get all city of Viet Nam
    const apiCity = '/assets/client/dist/json/DataCity.json';
    $.getJSON(apiCity, function (data) {
        $scope.listProvinces = data;
    })

    // select address
    $scope.selectAddress = (type) => {
        if (type === 0)
            $scope.listProvinces.forEach(prov => {
                if (prov.Id === $scope.selectedProvince) {
                    $scope.listDistricts = prov.Districts;
                    $scope.listCommunes = [];
                    return;
                }
            })
        else
            $scope.listDistricts.forEach(dist => {
                if (dist.Id === $scope.selectedDistrict) {
                    $scope.listCommunes = dist.Wards;
                    return;
                }
            })
        console.log($scope.selectedProvince);
    }

    /** api/deliveryAddress/get */
    const apiGetDeliveryAddressList = `http://localhost:8000/api/deliveryAddress/get-deliveryAddress/${customerID}`;
    $rootScope.getGetDeliveryAddressList = () => {
        $http(
            {
                method: 'GET',
                url: apiGetDeliveryAddressList
            }
        ).then((res) => {

            $rootScope.deliveryAddressList = res.data.delivery_address;
            $rootScope.activeAddress = $rootScope.deliveryAddressList.filter(item => item.is_active == 1)[0];
            console.log($rootScope.deliveryAddressList);
        }, (err) => console.log(err))
    }

    $rootScope.getGetDeliveryAddressList();

    /** api/deliveryAddress/get-by-id/{id} */
    $scope.getDeliveryAddress = (id, index) => {

        $rootScope.title = (id == 0) ? 'Thêm địa chỉ' : 'Cập nhật địa chỉ';
        $rootScope.action = (id == 0) ? 0 : 1;
        $scope.resetAddress();
        
        console.log(1);
        if(id == 0) { 
            $rootScope.deliveryAddress = {};
            // $rootScope.deliveryAddress.delivery_address_name = ''
        }
        else {
            const apiGetDeliveryAddress = `http://localhost:8000/api/deliveryAddress/${id}`;
            $http(
                {
                    method: 'GET',
                    url: apiGetDeliveryAddress
                }
            ).then((res) => {
                $rootScope.deliveryAddress = res.data;
                const position = $rootScope.deliveryAddress.delivery_address_name.indexOf(','); 
                let pre = $rootScope.deliveryAddress.delivery_address_name.substring(0, position);
    
                $('#specific_address').val(pre);

                if(index) { 
                    $rootScope.isDeleted = $rootScope.deliveryAddress;
                    DELETE_MODAL.modal('show');
                }
                if(!index) {
                    SAVE_DELIVERY_ADDRESS_MODAL.modal('show');
                }
            }, (err) => console.log(err))
        }
    }

    $scope.resetAddress = () => {
        $('#specific_address').val('');
        $('#province').val('');
        $('#district').val('');
        $('#commune').val('');
    }

    /** save delivery address */
    $scope.saveDeliveryAddress = () => {
        const customerID = JSON.parse(sessionStorage.getItem('customerID'));
        const province = $('#province').find(":selected").text().trim();
        const district = $('#district').find(":selected").text().trim();
        const commune = $('#commune').find(":selected").text().trim();
        const specific_address = $('#specific_address').val().trim();
        const delivery_address = `${specific_address}, ${commune}, ${district}, ${province}`;
        
        $rootScope.deliveryAddress.customer_id = customerID;
        
        
        /** api/deliveryAddress/create */
        if($rootScope.action == 0) {
            $rootScope.deliveryAddress.delivery_address_name = delivery_address;
            
            const apiCreateDeliveryAddress = `http://localhost:8000/api/deliveryAddress`;
            $http({
                method: 'POST',
                url: apiCreateDeliveryAddress,
                data: $rootScope.deliveryAddress,
                "content-Type": "application/json"
            }).then((res) => {
                console.log(res.data);
                $rootScope.deliveryAddressList.push(res.data);

                SAVE_DELIVERY_ADDRESS_MODAL.modal('hide');
            }, (err) => console.log(err));
        } 

        /** api/deliveryAddress/update */
        if($rootScope.action == 1) {
            const check = $('#province').find(":selected").val();

            if(check) $rootScope.deliveryAddress.delivery_address_name = delivery_address;
            else {
                const position = $rootScope.deliveryAddress.delivery_address_name.indexOf(','); 
                let sub = $rootScope.deliveryAddress.delivery_address_name.substring(position);
                $rootScope.deliveryAddress.delivery_address_name = `${specific_address}${sub}`;
                console.log($rootScope.deliveryAddress.delivery_address_name);
            }
            const apiUpdateDeliveryAddress = `http://localhost:8000/api/deliveryAddress/${$rootScope.deliveryAddress.id}`;

            $http({
                method: 'PUT',
                url: apiUpdateDeliveryAddress,
                data: $rootScope.deliveryAddress,
                "content-Type": "application/json"
            }).then((res) => {

                const index = $rootScope.deliveryAddressList.findIndex(item => item.id == $rootScope.deliveryAddress.id);
                $rootScope.deliveryAddressList[index] = $rootScope.deliveryAddress;

                SAVE_DELIVERY_ADDRESS_MODAL.modal('hide');

            }, (err) => console.log(err));
        }
    }

    /** api/deliveryAddress/delete/{id} */
    $scope.deleteDeliveryAddress = (id) => {
        const apiDeleteDeliveryAddress = `http://localhost:8000/api/deliveryAddress/${id}`;
        $http({
            method: "DELETE",
            url: apiDeleteDeliveryAddress
        }).then((res) => {

            const index = $rootScope.deliveryAddressList.findIndex(item => item.id == $rootScope.deliveryAddress.id);
            $rootScope.deliveryAddressList.splice(index, 1);
            DELETE_MODAL.modal('hide');
        });
    }

    /** confirm delete */
    $scope.confirmDelete = () => {
        const isDeleted = JSON.stringify($scope.isDeleted);
        const deliveryAddress = JSON.stringify($rootScope.deliveryAddress);

        switch(isDeleted) {
            case deliveryAddress: $scope.deleteDeliveryAddress($rootScope.deliveryAddress.id); break;
        }
        // $('#delete-modal').modal('hide');
    }

    $scope.setDefault = (id) => {
        const apiUpdateSetDefault = `http://localhost:8000/api/deliveryAddress/set_default/${id}`;

            $http({
                method: 'PUT',
                url: apiUpdateSetDefault,
                data: id,
                "content-Type": "application/json"
            }).then((res) => {

                // const index = $rootScope.deliveryAddressList.findIndex(item => item.id == res.data.id);
                // $rootScope.deliveryAddressList[index] = res.data;
                $rootScope.getGetDeliveryAddressList();

                // SAVE_DELIVERY_ADDRESS_MODAL.modal('hide');

            }, (err) => console.log(err));
    }
})