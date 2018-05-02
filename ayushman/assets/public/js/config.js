//Setting up route
window.app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
	.when('/',
	      {
		  templateUrl: '/ayushman/assets/public/views/landing.html',
		  controller: 'landingCtrl'
	      })
	.when('/emr/:appointment_id',
	      {
		  templateUrl: '/ayushman/assets/public/views/emr.html',
		  controller: 'emrCtrl'
	      })
	.when('/examination/:appointment_id',
	      {
		  templateUrl: '/ayushman/assets/public/views/new_examination.html',
		  controller: 'examCtrl'
	      })
	.when('/tracker/:appointment_id',
	      {
		  templateUrl: '/ayushman/assets/public/views/tracker.html',
		  controller: 'trackerCtrl'
	      })
	.otherwise({redirectTo: '/'});
}]);

//Removing tomcat unspported headers
window.app.config(['$httpProvider', function($httpProvider, Configuration) {
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

//Setting HTML5 Location Mode
window.app.config(['$locationProvider', function($locationProvider) {
    //$locationProvider.html5Mode(true);
    $locationProvider.hashPrefix("!");
}]);
