/**
 * Created by Clairvoyant User on 9/6/2015.
 */

angular.module('landingPage.controllers')
    .controller('landingPageController',['$scope','$rootScope',function($scope,$rootScope){

        $rootScope.doctorServices = function() {
            alert('success');
        }
    }]);