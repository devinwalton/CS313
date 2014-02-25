
angular.module('timeclock', [])
    .controller('AddTimeCtrl', function($scope, $http) {
    $scope.url = 'addTime.php'; // The url of our search
         
  $scope.hoursWorked = [0,1,2,3,4,5,6,7,8];
  $scope.minsWorked = [0,15,30,45];
    // The function that will be executed on button click (ng-click="search()")
    $scope.addTime = function() {
         
         $scope.request = [$scope.hour, $scope.min];
        $http.post($scope.url, { "hour" : $scope.hour, 
        							"min" : $scope.min,
        							"name" : $scope.studentName,
        	 						"job" : $scope.jobName, 
        	 						"task" : $scope.task}).
        success(function(data, status) {
            $scope.status = status;
            $scope.data = data;
            $scope.result = data; // Show result from server in our <pre></pre> element
        })
        .
        error(function(data, status) {
            $scope.data = data || "Request failed";
            $scope.status = status;         
        });
    };
});