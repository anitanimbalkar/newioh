/**
 * Created by Clairvoyant User on 9/5/2015.
 */

angular.module('landingPage',['ngRoute','landingPage.controllers'])
    .config(['$routeProvider', function($routeProvider) {
      $routeProvider.
          when('/home',{
              templateUrl : 'webapp/views/whoAreYou.html',
              controller : 'landingPageController'
          }).
          when('/patient-services',{
              templateUrl : 'views/patientServices.html',
              controller : 'landingPageController'
          }).
          when('/doctor-services',{
              templateUrl : 'views/doctorServices.html',
              controller : 'landingPageController'
          }).
          when('/corporate-services',{
              templateUrl : 'views/corporateServices.html',
              controller : 'landingPageController'
          }).
          when('/dignostic-services',{
              templateUrl : 'views/diagnosticCenterServices.html',
              controller : 'landingPageController'
          }).
          otherwise({
              redirectTo: '/home'
          });
    }]);