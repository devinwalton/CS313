angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
         
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
          $scope.values = [0,"0"];
          $scope.labels = [0,"Everyone"];
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
            
            for(var i = 0; i < data.length; i++)
            {
              if (i % 2 = 0)
                $scope.values.add(data[i]);
              else
                $scope.labels.add(data[i]);
            }
          }
        });
    };
});