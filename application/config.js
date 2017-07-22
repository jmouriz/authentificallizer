application.config(['ngMdIconServiceProvider', function(ngMdIconServiceProvider) {
   ngMdIconServiceProvider.addShapes({
      'yahoo': '<path d="m 2.0000001,2 c 2.1630768,3.2592307 5.4786536,9.285193 6.6586536,11.322115 l 0,8.677885 c 0,0 0.8376922,-0.336538 1.3461533,-0.336538 0.563078,0 1.322116,0.336538 1.322116,0.336538 l 0,-8.677885 C 13.526154,9.464423 18.033654,2 18.033654,2 c -0.95,0.2153846 -1.985769,0.2230769 -2.836538,0 -0.75077,1.3976924 -3.430771,6.4323076 -5.192309,9.326924 C 8.2194229,8.3692307 6.0451923,4.4407693 4.6682692,2 3.5759617,2.2330769 3.09,2.2476923 2.0000001,2 z M 20.701923,2.072116 c -0.522857,0.0182 -1.078414,0.375 -1.370193,1.25 -0.666154,6.666923 -1.995193,14.687499 -1.995193,14.687499 0,0 0.991731,-0.665384 1.658655,0 0,0 3.004807,-11.972499 3.004807,-14.639422 8.34e-4,-0.7727886 -0.625833,-1.3214762 -1.298076,-1.298077 z m -2.692307,17.259615 c -0.83,0 -1.346155,0.642884 -1.346155,1.322114 0,0.803848 0.555385,1.346155 1.346155,1.346155 0.573076,0 1.322114,-0.400769 1.322114,-1.346155 0,-0.75846 -0.5275,-1.322114 -1.322114,-1.322114 z" />'
   });
}]);

application.config(function($authProvider) {
   $authProvider.oauth2({
      name: 'local',
      clientId: config['local-application-id'],
      url: config['local-authorization-provider-link'],
      redirectUri: config['local-authorization-provider'],
      authorizationEndpoint: config['authorization-endpoint'],
      scope: ['email', 'profile'],
      scopeDelimiter: ' ',
      requiredUrlParams: ['state', 'scope'],
      state: 'xyz'
   });
   $authProvider.facebook({
      clientId: config['facebook-application-id'],
      url: config['facebook-authorization-provider-link'],
      redirectUri: config['facebook-authorization-provider']
   });
   $authProvider.google({
      clientId: config['google-application-id'],
      url: config['google-authorization-provider-link'],
      redirectUri: config['google-authorization-provider']
   });
   $authProvider.yahoo({
      clientId: config['yahoo-application-id'],
      url: config['yahoo-authorization-provider-link'],
      redirectUri: config['yahoo-authorization-provider']
   });
   $authProvider.live({
      clientId: config['microsoft-application-id'],
      authorizationEndpoint: 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize',
      scope: ['openid', 'User.Read'],
      url: config['microsoft-authorization-provider-link'],
      redirectUri: config['microsoft-authorization-provider']
   });
});
