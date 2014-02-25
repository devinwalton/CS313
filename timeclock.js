angular.module('timeclock', [])
    .controller('TimeclockCtrl', function($scope, $http) {
    $scope.url = 'timeclock.php'; // The url of our search
         
  
    // The function that will be executed on button click (ng-click="search()")
    $scope.timeclock = function() {
         
        $http.post($scope.url, { "searchBy" : $scope.type}).
        success(function(data, status) {
            $scope.status = "You have successfully logged your time.";
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