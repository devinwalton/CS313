angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
    $scope.valid = false;
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
          $scope.values = ["0"];
          $scope.labels = ["Everyone"];
          $scope.component;
          $scope.selector;
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
          var j = 0;
            
            $scope.component = data.split("\"");
            for(var i = 0; i < $scope.component.length; i++)
            {
              console.log(data);
              console.log($scope.component);
              if (i % 2 == 0){}
              else
              {
                if (j % 2 == 0)
                  $scope.values.push($scope.component[i]);
                else
                  $scope.labels.push($scope.component[i]);
                j++;
              }
                
            }

            for(var i = 0; i < $scope.values.length; i++)
            {
              $scope.selector.push( "label" : $scope.labels[i],
                                    "value" : $scope.values[i]
                );
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