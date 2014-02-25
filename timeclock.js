angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
         
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
          $scope.values = ["0"];
          $scope.labels = ["Everyone"];
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
            
            for(var i = 0; i < data.length; i++)
            {
              $scope.components = data.split("=>");
              console.log(data);
              console.log(components);
              if (i % 2 == 0)
                $scope.values.push(components[i]);
              else
                $scope.labels.push(components[i]);
            }
          
            $scope.data = data;
            $scope.result = data; 
        })
        .
        error(function(data, status) {
            $scope.data = data || "Request failed";       
        });
    };
});