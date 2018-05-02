'use strict';

function tracklistCtrl($scope){
  var track_list = new Array();
  for (var i in other_tracksheets){
    for(var j in other_tracksheets[i]){
      var x = {};
      x.is_owned = other_tracksheets[i][j]['is_owned'];
      x.id = other_tracksheets[i][j]['id'];
      x.name = other_tracksheets[i][j]['name'];
      track_list.push(x);
    }
  }
  $scope.other_tracklist = track_list;
}
function templatelistCtrl($scope){
  var template_info = new Array();
  for (var i in templates){
    var x = {};
    x.is_owned = true;
    x.id = templates[i]['id'];
    x.name = templates[i]['name'];
    template_info.push(x);
  }
  $scope.template_info = template_info;
}
