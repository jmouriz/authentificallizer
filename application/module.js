var application = angular.module('Application', ['ngMaterial', 'ngMdIcons', 'satellizer']);

application.controller('Application', ['$scope', function($scope) {
   $scope.public = {};
}]);
