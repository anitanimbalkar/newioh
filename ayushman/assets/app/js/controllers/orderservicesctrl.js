angular.module('app.controllers')
    .controller('orderservicesCtrl',
		['$scope','$http','$routeParams','ipdpatientsService',
 		function($scope,$http,$routeParams,ipdpatientsService){
            $scope.tempmodel={};
			$scope.patientsid = $routeParams.patientsid;
			$scope.wardid = $routeParams.wardid;
            $scope.refid = $routeParams.refid;

                        ipdpatientsService.getOrder($scope.wardid).then(function(data){
                            //console.log(data);
                            $scope.service = data.orderservices;
                            //console.log($scope.service);
                            });


						// $.ajax({
						// type: 'Get',
						// url: "/ayushman/cipdwardpatient/orderservices?patientsid="+$scope.patientsid+"&wardid="+$scope.wardid,
						// datatype: 'json',
						// success:function(data){
						// 		$scope.service = JSON.parse(data);
      //                            $scope.tempmodel=$scope.service;
						// 		//console.log($scope.service);

						// 		}
					 //       });

        $scope.service=[];
		$scope.selection=[];

        $scope.getIndexof=function getIndexof(testarray,testid){
            var arraylength=testarray.length;
            for(var k=0;k<arraylength;k++){
                if(testarray[k].id==testid){
                    return k;
                }
            }
            return(-1);
        }

		$scope.toggleSelection = function toggleSelection(testName,id,rate) {

	       var idx = $scope.selection.indexOf(id);
	               if (idx > -1) 
                   {
	                       $scope.selection.splice(idx, 1);

	                }

                    if(document.getElementById(id).checked)
                    {
                        var test={};
                        test['id']=id;
                        test['testname']=testName;
                        test['rate']=rate;
                        test['quantity']=0;

                    $scope.selection.push(test);
                            
                     }
                    else{

                        var arrInd = $scope.getIndexof($scope.selection,id);
                            
                            if (arrInd > -1)
                             {
                                  $scope.selection.splice(arrInd,1);
                            }

                       }
                 

        	  }
            
            
            $scope.quantity={};
	        $scope.quantityObject=[];
$scope.acceptorder=function (testname,orderdate)
    {
         if(orderdate =="")
        {
            window.alert("Please enter Date");
            $("#orderdate").focus();
            return false;
        }

     if($scope.selection =="") 
        {
            window.alert('Please Select Service');
            return false;
        }

        else{

            $scope.patid = $scope.patientsid;
            $scope.wardid = $scope.wardid;
            
                 if($scope.quantity)
                    {
                        var key;
                        for(key in $scope.quantity)
                        {
                             for(var qtykey in $scope.selection)
                            {
                                 if($scope.selection[qtykey].id==key)
                                {
                                    // if($scope.selection[qtykey].quantity==""){
                                    //     window.alert("Please enter Date");
                                    //    // $("#orderdate").focus();
                                    //              return false;
                                    // }
                                    // else{
                                   $scope.selection[qtykey].quantity=$scope.quantity[key];
                                    //}
                                                console.log($scope.selection[qtykey].quantity);

                                }

                            } 
                                                                //Create array for details of each parameter attached to report
                        }
            
                    }

            var temp={tests:$scope.selection};
            //console.log(temp);
            var acceptdate = document.getElementById('orderdate').value;
           
            if (confirm("Do you Really want to accept?") == true)
             {
                $.ajax({
                type: "get",
                data:temp,
                url: "/ayushman/corderservices/saveorder?patid="+$scope.patid+"&wardid="+$scope.wardid+"&refid="+$scope.refid+"&testarray="+JSON.stringify(temp)+"&acceptdate="+acceptdate,
                
                success:function( data ){
                //alert("Order Placed.");
                    showNotification('300','20','Save data','Order Placed.','notification','timernotification',2000);

                 window.location.reload();
                }
            });
            } 
            else {
                     window.location.reload();
                }
         }
            
    }

}]);