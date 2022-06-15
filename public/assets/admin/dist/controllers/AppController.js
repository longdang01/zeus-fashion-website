var app = angular.module('App',
['angularUtils.directives.dirPagination', 'ckeditor']);

const success = () => {
    const toastSuccess = document.getElementById('toastSuccess');
    const toast = new bootstrap.Toast(toastSuccess);

    toast.show();
}

const err = () => {
    
}
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