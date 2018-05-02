'use strict';


// Declare app level module which depends on filters, and services
angular.module('app.controllers', []);
angular.module('app.services', ['ngGrid']);
angular.module('app', [
  'ngRoute','ngCookies', 'ngResource', 'ngAnimate',
  'ui.bootstrap',
  'app.services',
  'app.directives',
  'app.controllers',
  'fundoo.services'
]).
config(['$routeProvider', function($routeProvider) {
    $routeProvider
	.when('/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/landing.html',
		  controller: 'landingCtrl'
	      })
	.when('/dashboard/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/doctordashboard.html',
		  controller: 'dashboardCtrl'
	      })
	.when('/staff/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/staffdirectory.html',
		  controller: 'staffdirectoryCtrl'
	      })
	.when('/inactivedashboard/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/inactivedashboard.html',
		  controller: 'uploadPrescriptionCtrl'
	      })
	.when('/Statements/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/accountstatements.html',
		  controller: 'statementCtrl'
	      })
	.when('/bills/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/accountbills.html',
		  controller: 'accountbillsCtrl'
	      })
	.when('/mypatients/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/mypatientslist.html',
		  controller: 'mypatientsCtrl'
	      })
	.when('/mydoctors/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/mydoctorslist.html',
		  controller: 'mydoctorsCtrl'
	      })
	
	.when('/myprofile/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/docprofile.html',
		  controller: 'myprofileCtrl'
	      })
	.when('/doctorprofile/:docid',
	      {
		  templateUrl: '/ayushman/assets/app/partials/doctorprofile.html',
		  controller: 'doctorprofileCtrl'
	      })
	.when('/recommend/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/recommendus.html',
		  controller: 'inviteCtrl'
	      })	  
	.when('/personalization/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/personalization.html',
		  controller: 'personalizationCtrl'
	      })
	.when('/changepass/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/changepass.html',
		  controller: 'mypasswordCtrl'
	      })
	/*.when('/feemanager/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/feemanager.html',
		  controller: 'templateCtrl'
	      })*/
	.when('/feemanager/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/directoryofservices.html',
		  controller: 'servicedirectoryCtrl'
		  })		  
	.when('/mypackages/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/mypackages.html',
		   controller: 'mypackagesCtrl'
	      })
		  .when('/myschedule/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/viewschedule.html',
		   //controller: 'mypackagesCtrl'
	      })
		  
	.when('/dashboard/docpastapp/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/doctorpastappointment.html',
		  controller: 'docpastappointment'
	      })
	.when('/patientemr/:patient_id',
	      {
		  templateUrl: '/ayushman/assets/app/partials/patientemr.html',
		  controller: 'emrCtrl'
	})
	.when('/emr/:patient_id',
	      {
		  templateUrl: '/ayushman/assets/app/partials/patientemr.html',
		  controller: 'emrCtrl'
	})
	.when('/examination/:appointment_id',
	      {
		  templateUrl: '/ayushman/assets/app/partials/examination.html',
		  controller: 'examCtrl'
	      })
		  .when('/followup/',
	      {
		  templateUrl: '/ayushman/assets/app/partials/followup.html',
		  controller: 'followupCtrl'
	      })
	.when('/tracker/:appointment_id',
	      {
		  templateUrl: '/ayushman/assets/app/partials/tracker.html',
		  controller: 'trackerCtrl'
	      })
	.when('/patienttracker/:patient_id',
	      {
		  templateUrl: '/ayushman/assets/app/partials/patienttracker.html',
		  controller: 'patienttrackerCtrl'
	      })
		  .when('/chemists/',
	      {
			  templateUrl: '/ayushman/assets/app/partials/chemistnetwork.html',
			  controller: 'chemistnetworkCtrl'
	      })
		   .when('/dc/',
	      {
			  templateUrl: '/ayushman/assets/app/partials/dcnetwork.html',
			  controller: 'dcnetworkCtrl'
	      })
	.otherwise({redirectTo: '/'});
}])
.config(['$httpProvider', function($httpProvider, Configuration) {
    //delete $httpProvider.defaults.headers.common["X-Requested-With"];
    $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $httpProvider.defaults.transformRequest.unshift(function (data, headersGetter) {
	var key, result = [];
	for (key in data) {
	    if (data.hasOwnProperty(key)) {
		result.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
	    }
	}
	
	return result.join("&");
    });
}]);
