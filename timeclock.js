angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
    $scope.url2 = 'finalSearch.php'; // The url of our search
    $scope.validSearch = false;
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
          $scope.values = ["0"];
          $scope.labels = ["All"];
          $scope.component;
          $scope.selector = [];
          $scope.idSelector = {"id":""};
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
          $scope.validSearch = true;
          var j = 0;
            
            $scope.component = data.split("\"");
            for(var i = 0; i < $scope.component.length; i++)
            {
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
                var selction = {
                               label: $scope.labels[i],
                               value: $scope.values[i]
                            };

              $scope.selector.push(selction);
            }
          
            $scope.data = data;
            $scope.result = data; 
        })
        .
        error(function(data, status) {
            $scope.data = data || "Request failed";       
        });
    };

    $scope.calculateHours = function() {

      console.log($scope.idSelector.id);
      console.log($scope.type);

      $http.post($scope.url2, { "id" : $scope.idSelector.id, 
                                "searchBy" : $scope.type
                              }).
      success(function(data, status) {
        $scope.totalHours = data;
      });

    };

});