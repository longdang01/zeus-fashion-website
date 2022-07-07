var app = angular.module('App',
['angularUtils.directives.dirPagination', 'ckeditor']);

app.controller('AppController', function($rootScope, $scope, $http, $timeout, $location) {

  $rootScope.groupImport = ['/admin/products', '/admin/categories', '/admin/brands', '/admin/suppliers'];
  $rootScope.groupSell = ['/admin/orders', '/admin/payments', '/admin/transport'];
  $rootScope.groupUsers = ['/admin/staffs', '/admin/roles'];
  $rootScope.groupUtilities = ['/admin/news'];
  $rootScope.groupAdmin = ['admin'];
  
  $rootScope.getClass = (path, group) => {
      const tmp = $location.absUrl().split('/');
      const name = `/${tmp[tmp.length - 2]}/${tmp[tmp.length - 1]}`;

      // if(group) {
      //   const index = group.findIndex(item => item == '/admin/dashboards');
      //   group.splice(index, 1);
      // }

      return (path) ? 
      ((name === path) ? 'side-menu--active' : '')
      : ((group.indexOf(name) > -1) ? 'side-menu--active' : '');
  };


})

const success = () => {
  const toastSuccess = document.getElementById('toastSuccess');
  const toast = new bootstrap.Toast(toastSuccess);

  toast.show();
}

const error = () => {
  const toastErr = document.getElementById('toastErr');
  const toast = new bootstrap.Toast(toastErr);

  toast.show();
  console.clear();
}

/** remove scroll of body */
const removeScrollOfBody = () => {
    $('body').addClass('modal-open');
    $('body').attr('data-bs-overflow', 'hidden');
    $('body').attr('data-bs-padding-right', '49px');
}

const formatDate = () => {
    let date = new Date(document.getElementById("dateOrdersStatus").value);
    day = date.getDate();
    month = date.getMonth();
    month++;
    year = date.getFullYear();
    return `${year}-${month}-${day}`;
}

app.directive('dateFormat', function() {
    return {
      require: 'ngModel',
      link: function(scope, element, attr, ngModelCtrl) {
        //Angular 1.3 insert a formater that force to set model to date object, otherwise throw exception.
        //Reset default angular formatters/parsers
        ngModelCtrl.$formatters.length = 0;
        ngModelCtrl.$parsers.length = 0;
      }
    };
  });

// const resetUrl = () => {
//   $('.size__table-picture').attr('src', '');
//   $('.size__table-upload').val('');
// } 

// const success = () => {
//   console.log(1);
//   $('#success-modal-preview').addClass('show');
// }

// //directives
// app.directive("selectNgFiles", function() {
//     return {
//       require: "ngModel",
//       link: function postLink(scope,elem,attrs,ngModel) {
//         elem.on("change", function(e) {
//           var files = elem[0].files;
//           ngModel.$setViewValue(files);
//         })
//       }
//     }
//   });

// // app.controller('AppController', function($rootScope, $scope, $http, $timeout) {

// //     const color = JSON.parse(sessionStorage.getItem('colorTheme'));
// //     $scope.colorTheme = (!color) ? 'light theme-0' : color;

// //     $('.color__scheme, .dark-mode-switcher').on('click', function() {
// //         $scope.colorTheme = $('html').attr('class');
// //         sessionStorage.setItem('colorTheme', JSON.stringify($scope.colorTheme));
// //     })

// // })