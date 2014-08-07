var desk = angular.module('desk', []);

 desk.controller('MainCtrl', function ($scope, $http) {

  $scope.tabs = [
    {'name': 'files',
     'snippet': 'Fast just got faster with Nexus S.'},
    {'name': 'worksheets',
     'snippet': 'The Next, Next Generation tablet.'},
    {'name': 'navigation',
     'snippet': 'The Next, Next Generation tablet.'}
  ];

  $http({method: 'GET', url: 'includes/filesObj.php'}).success(function(data) {
    $scope.files = angular.fromJson(data);
  });

  $http({method: 'GET', url: 'includes/worksheetsObj.php'}).success(function(data) {
    $scope.worksheets = angular.fromJson(data);
    console.log(data);
  });

 });
