angular.module('app.controllers')
    .controller('ipdservicesctrl',
        ['$scope','$http','$routeParams','$route','xmppService','ipdpatientsService',
        function($scope,$http,$routeParams,$route,xmppService,ipdpatientsService){
            xmppService.initializeXmpp(servername, user_id, xmpp_pass);
             $scope.presence = xmppService.getPresence();
             $scope.$on("update_presence", function(){
                $scope.presence = xmppService.getPresence();
                $scope.$apply();
             });
              $scope.$on("response", function(){
                var response = xmppService.getResponse();
               // console.log(response);
                //console.log('got response');
                //responseHandler(response['val'], response['id']);
             });
             $scope.sendxmppmessage = function(jid,message){
                xmppService.sendMessage(jid,message);
             }

            $scope.tempmodel={};
            $scope.patientsid = $routeParams.patientsid;
            $scope.wardid = $routeParams.wardid;
            $scope.refid = $routeParams.refid;
            $scope.referer = "/ayushman/ccashierdashboard/viewbill?id="+$scope.patientsid+"&caseno="+$scope.refid;
            $scope.qtyno =1;

            ipdpatientsService.getipdOrder($scope.wardid).then(function(data){
                $scope.service = data.orderipdservices;
                       //console.log($scope.service);
             });

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
                        test['quantity']=1;
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
            $scope.rate={};
            $scope.rateObject=[];

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
                                               // console.log($scope.selection[qtykey].quantity);

                                }

                            } 
                                                                //Create array for details of each parameter attached to report
                        }
            
                    }
                    if($scope.rate)
                    {
                        var key;
                        for(key in $scope.rate)
                        {
                             for(var qtykey in $scope.selection)
                            {
                                 if($scope.selection[qtykey].id==key)
                                {
                                    // if($scope.selection[qtykey].rate==""){
                                    //     window.alert("Please enter Date");
                                    //    // $("#orderdate").focus();
                                    //              return false;
                                    // }
                                    // else{
                                   $scope.selection[qtykey].rate=$scope.rate[key];
                                    //}
                                                // console.log($scope.selection[qtykey].rate);

                                }

                            } 
                                                                //Create array for details of each parameter attached to report
                        }
            
                    }

            var temp={tests:$scope.selection};
            var acceptdate = document.getElementById('orderdate').value;
           
            if (confirm("Do you Really want to accept?") == true)
             {
                $.ajax({
                type: "get",
                data:temp,
               // url: '/ayushman/ccashierdashboard/saveorder?test='+JSON.stringify(addtest)+'&testcharges='+$('#labtesttotalfees').text()+'&servicecharges='+<?= $servicecharges;?>+'&wardid='+wardid+'&patid='+patid+'&caseno='+caseno,

                url: "/ayushman/ccashierdashboard/saveorder?patid="+$scope.patid+"&wardid="+$scope.wardid+"&caseno="+$scope.refid+"&testarray="+JSON.stringify(temp)+"&acceptdate="+acceptdate,
                
                success:function( data ){
              console.log("Order Placed.",data);
                    showNotification('300','20','Save data','Order Placed.','notification','timernotification',2000);
                    window.location.href="/ayushman/ccashierdashboard/viewbill?id="+$scope.patid+"&caseno="+$scope.refid;
                 //                  console.log($scope.referer);

                 }
            });
            } 
            
         }
            
    }

}]);