application.controller('Login', ['$scope', '$auth', function($scope, $auth) {
   $scope.user = {};

   $scope.authenticate = function(provider) {
      $scope.public.busy = true;
      $scope.user.authenticated = false;
      $auth.authenticate(provider).then(function(response) {
         $scope.user = response.data.user;
         $scope.user.authenticated = true;
         $scope.public.busy = false;
      }).catch(function(response) {
         $scope.public.busy = false;
      });
   };
}]);
