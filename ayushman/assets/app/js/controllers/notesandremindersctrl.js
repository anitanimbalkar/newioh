angular.module('app.controllers')
    .controller('notesandremindersCtrl', 
		['$scope','$route','$routeParams','notesService',
		 function($scope,$route,$routeParams,notesService) {
		
			 $scope.notes = "";
			 $scope.allnotes = "";
			 $scope.editid = "";
			 $scope.reminderstartdate="";
			 $scope.templatecode="";
			 $scope.templatedesc="";
			 $scope.templatemailbody="";
			 $scope.templatevariables="";
			 $scope.variabledata = "";
			 $scope.smsflag = 1;
			 $scope.dbflag = 0;
			 $scope.emailflag = 1;
			 $scope.editreminderid = "";
			 $scope.allreminders ="";
			 $scope.frequency = "";
			 
			 $routeParams.patient_id = $('#patid').val();
				$('.ui-multiselect-menu').hide();
				var patient_id = $routeParams.patient_id;
				$scope.patient_id = patient_id;
				
				
			notesService.showNotes($routeParams.patient_id)
				.then(function(data){
				console.log(data.list);			    	
					$scope.allnotes = data.list;					
				});
			
						
			/*	$.ajax({ 
						url: "/ayushman/cnewtracksheet/getallnotes?patientid="+$scope.patient_id,
						success: function(data) {				
							$scope.allnotes = jQuery.parseJSON(data);
								console.log($scope.allnotes);
						},
						error : function(){showMessage('550','200','Error',"Could not retrieve data",'error','id');}
					}); */
			
			
			
    		
			// Functions added for notes and reminder 
			// functionality on tracker
			var settemplatedata= function(){
				$scope.templatevariables = "";
				$scope.templatemailbody = "";
				for(var index in $scope.remindertemplates){
					if ($scope.remindertemplates[index]['code']==$scope.templatecode)
  					{
						$scope.templatevariables = $scope.remindertemplates[index]['variable'];
						$scope.templatemailbody = $scope.remindertemplates[index]['mailbody'];
					}
				}
			}
			$scope.settemplatedata = settemplatedata;
			var getremindertemplates= function(){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/getremindertemplates",
					success: function(data) {
						$scope.remindertemplates=jQuery.parseJSON(data);
						console.log($scope.remindertemplates);
					} });
				};
			$scope.getremindertemplates =getremindertemplates;			
			$scope.getremindertemplates();
			
			var savereminder= function(){
				$scope.templatedesc = $scope.templatemailbody;
				if(($scope.smsflag == 0) && ($scope.emailflag == 0) && ($scope.dbflag == 0))
					showNotification('300','20','Set reminder','<h5>At least one option of messaging has to be selected </h5>','notification','timernotification',1000);	
				else if (($scope.templatecode== "") && ($scope.smsflag==1)) 
					showNotification('300','20','Set reminder','<h5>Select template</h5>','notification','timernotification',1000);						
				else if ($scope.reminderstartdate== "") 
					showNotification('300','20','Set reminder','<h5>Select start date for reminders</h5>','notification','timernotification',1000);										
				else if($scope.frequency== "")
					showNotification('300','20','Set reminder','<h5>Select frequency</h5>','notification','timernotification',1000);						
				else 
				{
					if ($scope.editreminderid=="")
					{
						$.ajax({ 
						url: "/ayushman/cnewtracksheet/savereminder?templatecode="+$scope.templatecode
							+"&templatedesc="+$scope.templatedesc+"&frequency="+$scope.frequency
							+"&smsflag="+$scope.smsflag+"&emailflag="+$scope.emailflag+"&dbflag="+$scope.dbflag
							+"&variabledata="+$scope.variabledata
							+"&reminderstartdate="+$scope.reminderstartdate+"&patientid="+patient_id,
						success: function() {
							showNotification('300','20','Set reminder','<h5>Reminder set </h5>','notification','timernotification',1000);															
							//$( "#allreminderslink" ).click();						
							getallreminders();
							$( "#allreminderslink" ).click();						
							//$route.reload();						
						} });
					}
					else
					{
						$.ajax({ 
						url: "/ayushman/cnewtracksheet/editreminder?templatecode="+$scope.templatecode
							+"&templatedesc="+$scope.templatedesc+"&frequency="+$scope.frequency
							+"&smsflag="+$scope.smsflag+"&emailflag="+$scope.emailflag+"&dbflag="+$scope.dbflag
							+"&variabledata="+$scope.variabledata
							+"&reminderstartdate="+$scope.reminderstartdate+"&patientid="+patient_id+"&editid="+$scope.editreminderid,
						success: function() {
							showNotification('300','20','Set reminder','<h5>Reminder set </h5>','notification','timernotification',1000);															
							//$( "#allreminderslink" ).click();						
							getallreminders();
							$( "#allreminderslink" ).click();						
					//$route.reload();						
						} });
						// Edit existing record
					}
					$scope.editreminderid = "";
					$scope.reminderstartdate="";
					$scope.templatecode="";
					$scope.templatedesc="";
					$scope.templatemailbody="";
					$scope.templatevariables="";
					$scope.variabledata= "";
					$scope.smsflag = 1;
					$scope.dbflag = 0;
					$scope.emailflag = 1;
					$scope.frequency = "";
				}
			};
			$scope.savereminder =savereminder;			
			var getallreminders= function(){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/getallreminders?patientid="+patient_id,
					success: function(data) {
						$scope.allreminders=jQuery.parseJSON(data);
					},
					error : function(){showMessage('550','200','Error',"Could not retrieve data",'error','id');}
					});
			};
			$scope.getallreminders =getallreminders;
			$scope.getallreminders();
			var deletereminder= function(id,index){
				$.ajax({ 
					url: "/ayushman/cnewtracksheet/deletereminder?id="+id,
					success: function(data) {
						showNotification('300','20','Delete reminder','<h5>Reminder deleted</h5>','notification','timernotification',1000);									
						getallreminders();
						$( "#allreminderslink" ).click();						
						//$route.reload();						
					},
					error : function(){showMessage('550','200','Error',"Could not delete",'error','id');}
					});
			};
			$scope.deletereminder =deletereminder;
			
			var editreminder= function(id,index){
				$scope.editreminderid = id;				
				$scope.reminderstartdate= $scope.allreminders[index].startdate;
				$scope.templatecode=$scope.allreminders[index].templatecode;
				$scope.templatedesc=$scope.allreminders[index].description;
				settemplatedata();
				$scope.templatemailbody= $scope.templatedesc;					
				$scope.variabledata=$scope.allreminders[index].variabledata ;
				$scope.smsflag = $scope.allreminders[index].smsflag;
				$scope.dbflag = $scope.allreminders[index].dbflag;
				$scope.emailflag = $scope.allreminders[index].emailflag;
				$scope.frequency = $scope.allreminders[index].frequencyvalue;				
				if($scope.smsflag == 1)
				{
					$("#mailbodyreadonly").show();
					$("#mailbodyeditable").hide();
					$("#mailbodyreadonly1").show();
					$("#mailbodyeditable1").hide();
				}
				else
				{
					$("#mailbodyreadonly").hide();
					$("#mailbodyeditable").show();	
					$("#mailbodyreadonly1").hide();
					$("#mailbodyeditable1").show();
				}
			};
			$scope.editreminder =editreminder;
			
			var addreminder= function(){
				$scope.editreminderid = "";
				$scope.reminderstartdate="";
				$scope.templatecode="";
				$scope.templatedesc="";
				$scope.templatemailbody="";
				$scope.templatevariables="";
				$scope.variabledata= "";
				$scope.smsflag = 1;
				$scope.dbflag = 0;
				$scope.emailflag = 1;
				$scope.frequency = "";		
				$("#mailbodyreadonly").show();
				$("#mailbodyeditable").hide();
				$("#mailbodyreadonly1").show();
				$("#mailbodyeditable1").hide();
			};
			$scope.addreminder = addreminder;
			
			var setsmsflag = function(){
				if ($("#smsflag").is(':checked'))
				{
					$scope.smsflag = 1;
					$("#mailbodyreadonly").show();
					$("#mailbodyeditable").hide();
					$("#mailbodyreadonly1").show();
					$("#mailbodyeditable1").hide();
					if($scope.templatecode!="")
						settemplatedata();
					showNotification('300','20','Notification','<h5>You cannot modify mail template.</h5>','notification','timernotification',2000);									
				}
				else
				{
					$scope.smsflag = 0;
					$("#mailbodyreadonly").hide();
					$("#mailbodyeditable").show();
					$("#mailbodyreadonly1").hide();
					$("#mailbodyeditable1").show();
					showNotification('300','20','Notification','<h5>You can modify mail template if required</h5>','notification','timernotification',2000);									
				}
			};
			$scope.setsmsflag =setsmsflag;	
			var setemailflag = function(){
				if ($("#emailflag").is(':checked'))
					$scope.emailflag = 1;
				else
					$scope.emailflag = 0;
				};
			$scope.setemailflag =setemailflag;			
			
			var setdbflag = function(){
				if ($("#dbflag").is(':checked'))
					$scope.dbflag = 1;
				else
					$scope.dbflag = 0;
				};
			$scope.setdbflag =setdbflag;			
			
			var savenotes = function(){
				if($scope.editid !="")
				{
					var patientid = patient_id;
					var notes = $scope.notes;
					var editid = $scope.editid;
					notesService.editNotes(patientid,notes,editid)
						.then(function(data){
						showNotification('300','20','Save notes','<h5>Notes saved</h5>','notification','timernotification',1000);
						getallnotes();					
					});					
					$scope.notes = "";
					$scope.editid = "";					
				}else if(($scope.notes!= " ") && ($scope.notes!= ""))
				{
					
					var patientid = patient_id;
					var notes = $scope.notes;
					notesService.saveNotes(patientid,notes)
						.then(function(data){
						showNotification('300','20','Save notes','<h5>Notes saved</h5>','notification','timernotification',1000);
						getallnotes();					
					});				
				
				$scope.notes = "";
				$scope.editid = "";
				}
				
			};
			$scope.savenotes =savenotes;
			var getallnotes = function(){		
			
				console.log($scope.allnotes);
				console.log(patient_id);
					notesService.showNotes(patient_id)
						.then(function(data){
						//console.log(data.list);			    	
							$scope.allnotes = data.list;	
						console.log($scope.allnotes);					
					});
			};
			$scope.getallnotes = getallnotes;
			var deletenote= function(id,index){
				
				var patientid = patient_id;
				
					notesService.deleteNotes(patientid,id)
						.then(function(data){
						showNotification('300','20','Delete notes','<h5>Notes deleted</h5>','notification','timernotification',1000);
						getallnotes();					
					});		
				
				
				
				
				
				/*$.ajax({ 
					url: "/ayushman/cnewtracksheet/deletenote?id="+id,
					success: function(data) {
						showNotification('300','20','Delete notes','<h5>Notes deleted</h5>','notification','timernotification',1000);									
						//$route.reload();						
						getallnotes();						
						$( "#allnoteslink" ).click();						
					},
					error : function(){showMessage('550','200','Error',"Could not delete",'error','id');}
					});*/
			};
			$scope.deletenote =deletenote;
			var editnote= function(id,editednotes){
				$scope.editid = id;
				$scope.notes = editednotes;
			};
			$scope.editnote =editnote;
			var addnote= function(){
				$scope.editid = "";
				$scope.notes = "";
			};
			$scope.addnote = addnote;		
			
 }])
 
.directive('notes',function() {
	return {
		restrict:'E',
		scope:{
			patient_id:'@',
			rescheduleappid:'@'
		},
		templateUrl: '/ayushman/assets/app/partials/notes.html',
		controller:'notesandremindersCtrl'		
	};
})
.directive('reminders',function() {
	return {
		restrict:'E',
		scope:{
			patient_id:'@',
			rescheduleappid:'@'
		},
		templateUrl: '/ayushman/assets/app/partials/reminders.html',
		controller:'notesandremindersCtrl'		
	};
})


		 

