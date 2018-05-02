'use strict';

/* Directives */


angular.module('app.directives', []).
    directive('myDateTimePicker',
	      ['$parse',
	       function($parse) {
		   return {
		       restrict: "A",
		       replace: false,
		       transclude: false,
		       compile: function (element, attrs) {
			   var modelAccessor = $parse(attrs.ngModel);

			   return function (scope, element, attrs, controller) {
			       var m_names =  new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
			       var formatDate = function(unformattedDate){
				   var date =  unformattedDate.split('-')[0];
				   var month = unformattedDate.split('-')[1];
				   var yearAndTime = unformattedDate.split('-')[2];
				   month = m_names[month - 1];
				   if(month != undefined)
				       return(date + '-' + month + '-' + yearAndTime);
			       }
					element.datetimepicker({
					  datepicker:true,
					  format:'d-m-Y H:i',
					  maxDate:'0'
					});
			       
			       element.next().click(function(){
				   var unformattedDate = element[0].value;
				   var formattedDate = formatDate(unformattedDate);
				   if(formattedDate != undefined){
				       element[0].value = formattedDate;
				       scope.$apply(function (scope) {
					   // Change bound variable
					   modelAccessor.assign(scope, formattedDate);
				       });
				   }
			       });
			   };
		       }
		   };
	       }])
    .directive('myExpandableDiv',
	      ['$parse',
	       function($parse) {
		   return {
		       restrict: "A",
		       replace: false,
		       transclude: false,
		       compile: function (element, attrs) {
			   return function (scope, element, attrs, controller) {
			       element.find('.expand').click(function(){
				   $(element).removeClass("sectionBoxContainer").addClass("absolute-full-height");
				   $(element).find('.smallContent').css("height", "83.5%");
				   $(element).find('.expand').hide();
				   $(element).find('.shrink').show();
			       });
			       element.find('.shrink').click(function(){
				   $(element).removeClass("absolute-full-height").addClass("sectionBoxContainer");
				   $(element).find('.smallContent').css("height", "66.3%");
				   $(element).find('.expand').show();
				   $(element).find('.shrink').hide();
			       });
			   };
		       }
		   };
	       }])
    .directive('ngEnter', function () {
	return function (scope, element, attrs) {
            element.bind("keydown keypress", function (event) {
		if(event.which === 13) {
                    scope.$apply(function (){
			scope.$eval(attrs.ngEnter);
                    });
		    
                    event.preventDefault();
		}
            });
	};
    }).directive('customAutofocus', function() {
			  return{
					 restrict: 'A',

					 link: function(scope, element, attrs){
					   scope.$watch(function(){
						 return scope.$eval(attrs.customAutofocus);
						 },function (newValue){
							$(element[0]).css('background-color','rgb(223, 223, 223)');
							$(element[0]).animate({'background-color': '#fff'}, 'slow');
							//setTimeout(function(){$(element[0]).css('background-color','#fff');}, 2000);
					   });
					 }
				 };
			}).directive('ngFileDrop', ['$fileUploader', function ($fileUploader) {
    'use strict';

    return {
        // don't use drag-n-drop files in IE9, because not File API support
        link: !$fileUploader.isHTML5 ? angular.noop : function (scope, element, attributes) {
            element
                .bind('drop', function (event) {
                    var dataTransfer = event.dataTransfer ?
                        event.dataTransfer :
                        event.originalEvent.dataTransfer; // jQuery fix;
                    if (!dataTransfer) return;
                    event.preventDefault();
                    event.stopPropagation();
                    scope.$broadcast('file:removeoverclass');
                    scope.$emit('file:add', dataTransfer.files, scope.$eval(attributes.ngFileDrop));
                })
                .bind('dragover', function (event) {
                    var dataTransfer = event.dataTransfer ?
                        event.dataTransfer :
                        event.originalEvent.dataTransfer; // jQuery fix;

                    event.preventDefault();
                    event.stopPropagation();
                    dataTransfer.dropEffect = 'copy';
                    scope.$broadcast('file:addoverclass');
                })
                .bind('dragleave', function (event) {
                    if (event.target === element[0]) {
                        scope.$broadcast('file:removeoverclass');
                    }
                });
        }
    };
}]).directive('ngFileOver', function () {
    'use strict';

    return {
        link: function (scope, element, attributes) {
            scope.$on('file:addoverclass', function () {
                element.addClass(attributes.ngFileOver || 'ng-file-over');
            });
            scope.$on('file:removeoverclass', function () {
                element.removeClass(attributes.ngFileOver || 'ng-file-over');
            });
        }
    };
}).directive('ngFileSelect', ['$fileUploader', function($fileUploader) {
    'use strict';

    return {
        link: function(scope, element, attributes) {
            if(!$fileUploader.isHTML5) {
                element.removeAttr('multiple');
            }

            element.bind('change', function() {
                var data = $fileUploader.isHTML5 ? this.files : this;
                var options = scope.$eval(attributes.ngFileSelect);

                scope.$emit('file:add', data, options);

                if($fileUploader.isHTML5 && element.attr('multiple')) {
                    element.prop('value', null);
                }
            });

            element.prop('value', null); // FF fix
        }
    };
}]) .directive('onFinishRender', function ($timeout) {
    return {
        restrict: 'A',
        link: function (scope, element, attr) {
		
            if (scope.$last === true) {
                $timeout(function () {
						var footableTable = element.parents('table');
						
						if( !scope.$last ) {
						  return false;
						}

						if (! footableTable.hasClass('footable-loaded')) {
						  footableTable.footable();
						}
						 scope.$emit('ngRepeatFinished');
					});
            }
        }
    }
}).directive('datepickerahead', function() {
	return {
restrict: 'A',
		require : 'ngModel',
		link : function (scope, element, attrs, ngModelCtrl) {
			$(function(){
				element.datepicker({
yearRange: "0:+100",minDate: '1',changeYear: true,changeMonth: true,  dateFormat: 'dd M yy',
onSelect:function (date) {
						ngModelCtrl.$setViewValue(date);
						scope.$apply();
					}
				});
				
			});
		}
	}
})
;
