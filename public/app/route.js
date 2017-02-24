pizza.config([ '$routeProvider' , '$locationProvider' ,  function($routeProvider , $locationProvider){
    $routeProvider
     .when('/home' , {
        templateUrl : 'home/index.html',
        controller : 'home'
    })    
      .when('/admin-update' , {
        templateUrl : 'admin/update.html',
        controller : 'adminUpdate'
    })  
    .when('/admin' , {
        templateUrl : 'admin/index.html',
        controller : 'admin'
    })
      .when('/admin-login' , {
        templateUrl : 'admin/login.html',
        controller : 'adminLogin'
    })    
    
      .when('/login' , {
        templateUrl : 'login/index.html',
        controller : 'login'
    }) 
     .when('/signup' , {
        templateUrl : 'signup/index.html',
        controller : 'signup'
    })    
     .when('/cart' , {
        templateUrl : 'cart/index.html',
        controller : 'cart'
    })
    .otherwise({
       redirectTo :  '/home'
    }); 
    
    $locationProvider.hashPrefix('');
}]);