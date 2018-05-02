/**
 * Created by Clairvoyant User on 9/6/2015.
 */

angular.module('landingPage.controllers',['ngRoute'])
    .controller('landingPageController',['$scope',function($scope){

        $scope.patient = true; // setting the first div visible when the page loads
        $scope.doctor = false; // hidden
        $scope.corporate = false; // hidden
        $scope.dignosticCenter = false; // hidden

        $scope.patientServices = function() {
            $scope.patient = true;
            $scope.doctor = false;
            $scope.corporate = false;
            $scope.dignosticCenter = false;
        }

        $scope.doctorServices = function() {
            $scope.patient = false;
            $scope.doctor = true;
            $scope.corporate = false;
            $scope.dignosticCenter = false;
        }

        $scope.corporateServices = function() {
            $scope.patient = false;
            $scope.doctor = false;
            $scope.corporate = true;
            $scope.dignosticCenter = false;
        }

        $scope.dignosticCenterServices = function() {
            $scope.patient = false;
            $scope.doctor = false;
            $scope.corporate = false;
            $scope.dignosticCenter = true;
        }
		
		$scope.login_modal = function() {
			$('#loginbox').show(); 
			$('#signupbox').hide(); 
			$('#forgetbox').hide();
		}
		
		$scope.forgetpassword_modal = function() {
			$('#forgetbox').show();
			$('#loginbox').hide(); 
			$('#signupbox').hide();			
		}
		
		$scope.register_modal = function() {
			$('#signupbox').show();
			$('#loginbox').hide(); 			 
			$('#forgetbox').hide();
		}
		
		$scope.validation = {
		password: {required:true, minlength:8, maxlength:20}}
		 $scope.isd = "+91";
		 $scope.isdphonehome = "+91";
		 $scope.changeisd = function() {
			var country = $("#country_c").val();
            if(country == "IN") {
			  $scope.isd = "+91";
              $scope.isdphonehome = "+91";			  
			} else if(country == "SG") {
			  $scope.isd = "+65";
              $scope.isdphonehome = "+65";			  
			} else {
			  $scope.isd = "+91";
              $scope.isdphonehome = "+91";			  
			}
			
        };
		  $scope.OnAccounttypeChange = function(value)
			 {
			   switch(value)
			   {
				  case "chemist" : document.getElementById("rolelable").innerHTML = "<b>Chemist</b>"; break;
				  case "patient" : document.getElementById("rolelable").innerHTML = "<b>Consumer</b>"; break;
				  case "pathologist" : document.getElementById("rolelable").innerHTML = "<b>Diagnostic center</b>"; break;
				  case "doctor" : document.getElementById("rolelable").innerHTML = "<b>Doctor</b>"; break;	  
			   }
			 }
			 
			 $scope.OnCountryChange = function(value)
			 {
			   switch(value)
			   {
				  case "chemist" : document.getElementById("rolelable").innerHTML = "<b>Chemist</b>"; break;
				  case "patient" : document.getElementById("rolelable").innerHTML = "<b>Consumer</b>"; break;	  
			   }
			 }
			 

        $(window).scroll(function() {
            if ($(".navbar").offset().top > 50) {
                $(".navbar-fixed-top").addClass("top-nav-collapse");
            } else {
                $(".navbar-fixed-top").removeClass("top-nav-collapse");
            }
        });

        $(function() {
            $('.page-scroll a').bind('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        });
    }])
    .controller('validate', function($scope,$http) {
        $scope.filterValue = function($event){
            if(isNaN(String.fromCharCode($event.keyCode))){
                $event.preventDefault();
            }
        };
		
		$scope.newsletteradd = function(){
				console.log($scope.newsemailid);
				$http({
					method: 'POST',
					data: $.param({email: $scope.newsemailid}),
					url: '/ayushman/newsletter/addemailid',
					headers: {'Content-Type': 'application/x-www-form-urlencoded'}
				}).success(function(data) {
					console.log(data);
					$scope.customStyle = {};
					if(data == 1){
					   $scope.is_exists = 'Email already Exists.';
                       $scope.customStyle.colorClass = "danger";					   
					} else {
    				   $scope.is_exists = "Subscribe Successfully.";
					   $scope.customStyle.colorClass = "success";
					}
					
					//$scope.is_exists = "<div style='color:red;'>Email Already Exists.</div>";
				});
			};
			

    }).directive('nxEqual', function() {
        return {
            require: 'ngModel',
            link: function (scope, elem, attrs, model) {
                if (!attrs.nxEqual) {
                    console.error('nxEqual expects a model as an argument!');
                    return;
                }
                scope.$watch(attrs.nxEqual, function (value) {
                    model.$setValidity('nxEqual', value === model.$viewValue);
                });
                model.$parsers.push(function (value) {
                    var isValid = value === scope.$eval(attrs.nxEqual);
                    model.$setValidity('nxEqual', isValid);
                    return isValid ? value : undefined;
                });
            }
        };
    });