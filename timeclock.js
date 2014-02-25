angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
         
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
          $scope.values = [0,"0"];
          $scope.labels = [0,"Everyone"];
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
          if(Array.isArray(data))
          {
            i = 0;
            foreach (string element in data)
            {
              if(i++ % 2 = 0)
                $scope.values.add(element);
              else
                $scope.labels.add(element);
            }
          }
            $scope.status = data;
            $scope.data = data;
            $scope.result = data; 
        })
        .
        error(function(data, status) {
            $scope.data = data || "Request failed";
            $scope.status = "Server Error";         
        });
    };
});