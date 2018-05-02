angular.module('app', ['angularFileUpload'])
.controller('MainCtrl', function($scope) {
  $scope.data = { 
    buzz:0, 
    Delicious:121,
    Facebook: 
    { 
      like_count: "6266",
      share_count: "20746"
    },
    GooglePlusOne:429,
    LinkedIn:820,
    Twitter:4074
  };
  
  $scope.typeOf = function(input) {
    return typeof input;
  }
  
})
;