//The main Javascript File to power the EHR Index Auth Page

var app = angular.module('ehr', ['ngRoute']);

app.controller('mrnSearch', ['$scope', '$log', '$http', '$httpParamSerializer', function($scope, $log, $http, $httpParamSerializer){
    $scope.mrn = '';
    $scope.msg = "You are yet to select a Patient for operation";

    //Execute on Submit
    $scope.setPatient = function(){
        $http({url: 'api/setMRN.php', data: $httpParamSerializer({mrn : $scope.mrn }), method: 'POST',
        headers : {'Content-Type' : 'application/x-www-form-urlencoded'} }).then(function(response){
            $scope.msg = response.data.message;
        });
    }

}])