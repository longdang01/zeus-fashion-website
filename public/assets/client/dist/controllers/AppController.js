var app = angular.module('App',
['angularUtils.directives.dirPagination']);

app.controller('AppController', function($rootScope, $scope, $http, $timeout, $location) {
  $rootScope.keyword = '';

})


const success = () => {
  const toastSuccess = document.getElementById('toastSuccess');
  toastSuccess.toast('show')
  // const toast = new bootstrap.Toast(toastSuccess);

  // toast.show();
}

const error = () => {
  const toastErr = document.getElementById('toastErr');
  const toast = new bootstrap.Toast(toastErr);

  toast.show();
}

const UrlFriendly = () => {
  return function string_to_slug(str, sep) {
    sep = sep || '-';
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
    
    // remove accents, swap ñ for n, etc
    var from = "àáäâầèéëêệìíïîòóöôùúüûụñç·/_,:;";
    var to   = "aaaaaeeeeeiiiioooouuuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
  
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, sep) // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes
  
    return str;
  }
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

app.filter('UrlFriendly', UrlFriendly );

app.run(function($rootScope) {
  $('[ng-app]').on('click', 'a', function() {
      window.location.href = $(this).attr('href');
  });
});

// app.config(function($locationProvider) {
//   $locationProvider.html5Mode({  
//     enabled: true,
//     requireBase: false
//   }); });