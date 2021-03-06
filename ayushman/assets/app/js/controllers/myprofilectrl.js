angular.module('app.controllers')
    .controller('myprofileCtrl',
		['$scope','$http',
				 function($scope,$http) {
					 var doclang={};
					 var i=1;
					 $scope.firstname;
					$scope.gender='Select';
					 $scope.middlename;
					$scope.lastname;
					$scope.tempmodel={};
					$scope.genderlist=[{'id':"0","value":"Select"},{'id':"1","value":"Male"},{"id":"2","value":"Female"}];
						var get_data = function(){
							var httpRequest = $http({
								method: 'POST',
								url: '/ayushman/cdoctorprofile/editdocprofile'
							}).success(function(data, status) {
								$scope.profiledata = data;
								$scope.firstname=$scope.profiledata[9].Firstname_c;
								$scope.middlename=$scope.profiledata[9].middlename_c;
								$scope.lastname=$scope.profiledata[9].lastname_c;
								$scope.tempmodel=$scope.profiledata[5];
								$scope.edumodel=$scope.profiledata[7];
								$scope.domainmodel=$scope.profiledata[6];
								$scope.langmodel=$scope.profiledata[8];
								$scope.summarymodel=$scope.profiledata[0].doctorprofile_c;
								$scope.gender=$scope.profiledata[9].gender_c;
								$scope.dob=$scope.profiledata[9].DOB_c;
								$scope.headerfootermodel=$scope.profiledata[0].headerfooterSysGenflag_c;  //headerfooterSysGenflag_c
								$scope.uid=$scope.profiledata[9].uid;
								$scope.practicesince=$scope.profiledata[0].practicesince_c;		
							});
			};
			$scope.getdata = get_data;
			$scope.getdata();
			
			var save_name= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedocname?Firstname_c="+$scope.firstname+"&middlename_c="+$scope.middlename+"&lastname_c="+$scope.lastname,
					success: function(data) {
								location.reload();
						}
				});
			}
			
			$scope.savename= save_name;
			var save_specs= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedocspecs?arrayDocSpecs="+JSON.stringify($scope.tempmodel),
					success: function(data) {
								$scope.hide('editspecialisation','specclose','specedit','specsave');
						}
				});
			}
			$scope.savespecs= save_specs;
			var save_summary= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedocsummary?summary="+$scope.summarymodel,
					success: function(data) {
								$scope.hide('editsummary','summaryclose','summaryopen','sumsave');$scope.show('sumdata');
						}
				});
			}
			$scope.savesummary= save_summary;
			var save_edu= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedocedu?arrayDocEdus="+JSON.stringify($scope.edumodel),
					success: function(data) {
								$scope.hide('editeducation','educlose','eduedit','edusave');
						}
				});
			}
			$scope.saveedu= save_edu;
			var save_dom= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedocdomains?arrayDocDomains="+JSON.stringify($scope.domainmodel),
					success: function(data) {
								$scope.hide('editdomain','domainclose','domainedit','domainsave');
						}
				});
			}
			$scope.savedom= save_dom;
			var save_lang= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/savedoclangs?arrayDocLangs="+JSON.stringify($scope.langmodel),
					success: function(data) {
								$scope.hide('editlanguage','langclose','langopen','langsave');
						}
				});
			}
			$scope.savelang= save_lang;
			var save_info= function(){
				// No check for UID 
				//if($scope.uid>99999999999)
				//	{				
						$.ajax({
						async: false,
						type: "GET",
						url: "/ayushman/cdoctorprofile/savepinfo?DOB_c="+$scope.dob+"&gender_c="+$scope.gender+"&practicesince_c="+$scope.practicesince+"&uid="+$scope.uid,
						success: function(data) {
								$scope.hide('editlanguage','langclose','langopen','langsave');
								location.reload();
						}
						});					
				//	}
			}
			$scope.saveinfo= save_info;
			//By Vijay

			var save_headerfooterflag= function(){
				$.ajax({
					async: false,
					type: "GET",
					url: "/ayushman/cdoctorprofile/saveheaderfooterflag?headerfooterSysGenflag_c="+$scope.headerfootermodel,
					success: function(data) {
								$scope.hide('editheaderfooter','headerfooterclose','headerfooteropen','headerfootersave');$scope.show('headerfooterdata');
						
						}
				});
			}
			$scope.saveheaderfooterflag= save_headerfooterflag;
			var find_value1=function(value,array)
			{
					
				for(data in array)
				 {
					 
					 if(array[data]==value)
					 {
						 
						 return true;
					 }
					 else
						 continue;
				 }
				  
			}
			$scope.findradio= find_value1;
			var save_checks= function(key,value,array)
			{
					var flag=0;
					tempjson=JSON.stringify($scope.tempmodel);
					
					if(!tempjson.length)
					{
						
						$scope.tempmodel[key]=value;
					}	
					else
					{
						
					for(data in $scope.tempmodel)
					{
						
						if($scope.tempmodel[data]==value )
						{
							flag=1;
							delete $scope.tempmodel[key];
							break;
						}
						else
						{
							flag=0;
						}
					}
					if(flag==0)
					{
						$scope.tempmodel[key]=value;
					}
					
					}
			}
			$scope.savechecks=save_checks;
			var save_educhecks= function(key,value,array)
			{
					var flag=0;
					tempjson=JSON.stringify($scope.edumodel);
					if(!tempjson.length)
					{
						
						$scope.edumodel[key]=value;
					}	
					else
					{
					for(data in $scope.edumodel)
					{
						
						if($scope.edumodel[data]==value)
						{
							flag=1;
							delete $scope.edumodel[key];
							break;
						}
						else
						{
							flag=0;
						}
					}
					if(flag==0)
					{
						$scope.edumodel[key]=value;
					}
					
					}
			}
			$scope.saveeduchecks=save_educhecks;
			var save_domainchecks= function(key,value,array)
			{
					var flag=0;
					tempjson=JSON.stringify($scope.domainmodel);
					if(!tempjson.length)		{
						
						$scope.domainmodel[key]=value;
					}	
					else
					{
					for(data in $scope.domainmodel)
					{
						
						if($scope.domainmodel[data]==value)
						{
							flag=1;
							delete $scope.domainmodel[key];
							break;
						}
						else
						{
							flag=0;
						}
					}
					if(flag==0)
					{
						$scope.domainmodel[key]=value;
					}
					}
			}
			$scope.savedomainchecks=save_domainchecks;
			var save_langchecks= function(key,value,array)
			{
					var flag=0;
					tempjson=JSON.stringify($scope.langmodel);
					if(!tempjson.length)							{
						
						$scope.langmodel[key]=value;
					}	
					else
					{
					for(data in $scope.langmodel)
					{
						
						if($scope.langmodel[data]==value)
						{
							flag=1;
							delete $scope.langmodel[key];
							break;
						}
						else
						{
							flag=0;
						}
					}
					if(flag==0)
					{
													$scope.langmodel[key]=value;
					}
					
					}
			}
			$scope.savelangchecks=save_langchecks;
			var find_value=function(value,array)
			{
					
				for(data in array)
				 {
					 
					 if(array[data]==value)
					 {
						 
						 return true;
					 }
					 else
						 continue;
				 }
				  
			}
			$scope.find= find_value;
			
			var show_div = function(id1,id2,id3,id4,id5){
				$('#'+id1).show();
				$('#'+id2).show();
				$('#'+id3).hide();
				$('#'+id4).show();
				$('#'+id5).show();
				
				
				
		    };
			$scope.show = show_div;
			
			var hide_div = function(id1,id2,id3,id4,id5){
				$('#'+id1).hide();
				$('#'+id2).hide();
				$('#'+id3).show();
				$('#'+id4).hide();
				$('#'+id5).hide();
		    };
			$scope.hide = hide_div;
			
			$scope.openuploader = function(){
				openDialog("/ayushman/cimagedisplay/uploadimage?userid="+$scope.profiledata[9].id,800,800,this);
			}
			
			$scope.openHeaderuploader = function(){
				openDialog("/ayushman/cimagedisplay/uploaddoctorheaderimage?userid="+$scope.profiledata[9].id,1000,800,this);
			}
			$scope.openFooteruploader = function(){
				openDialog("/ayushman/cimagedisplay/uploaddoctorfooterimage?userid="+$scope.profiledata[9].id,1000,800,this);
			}
			$scope.uploadDoctorSign = function(){
				openDialog("/ayushman/cimagedisplay/uploadsignimage?userid="+$scope.profiledata[9].id,1000,800,this);
			}
			$scope.openPreview = function(){
				openDialog("/ayushman/cpreviewdoctor/previewdoctortemplate?userid="+$scope.profiledata[9].id,700,500,this);
			}
			$scope.fancyboxclosed = function ()
			{
				setTimeout($scope.getdata,2250);
			}	
}])
.directive('openPreview',function(){
	return{
		templateUrl : '/ayushman/view/previewDoctor.php',
		controller : 'myprofileCtrl'
	};
})
.directive('uploadDoctorSign',function(){
	return{
		templateUrl : '/ayushman/assets/app/partials/uploadDoctorSign.html',
		controller : 'myprofileCtrl'
	};
})
.directive('openFooteruploader',function(){
	return{
		templateUrl : '/ayushman/assets/app/partials/uploadDoctorFooter.html',
		controller : 'myprofileCtrl'
	};
})
.directive('datepicker', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "-120:+0",maxDate: '0',changeYear: true,changeMonth: true,  dateFormat: 'dd M yy',
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
			});
		}
	}
});
		
	function openDialog(url, width, height,obj){
		 $.fancybox({
			'width': width,
			'height': height,
			'autoScale': false,
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'type': 'iframe',
			'href': url,
			'showCloseButton': true,
			'afterClose' : function(){
				if(obj != undefined){
					if(obj.fancyboxclosed != undefined){
						obj.fancyboxclosed(obj);
					}
				}
			}
		});
	}
	
