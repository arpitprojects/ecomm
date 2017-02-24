pizza.controller('mainController' , ['$scope', '$http' , function($scope , $http){
$scope.title = "Online Pizza Delivery";

$scope.logout = function(){
    $http.get('/logout').then(function(data){
        console.log(data.data); 
        window.location.reload();
        window.location.href="#/home";
    } , function(data){
        console.log(data.data); 
    });
}

$http.get('/main').then(function(data){
    
   console.log(data.data);
   $scope.login = data.data.pizza_name || 'User';
   $scope.temp = data.data.temp || 0;
} , function(data){
   console.log(data.data); 
});

}]);

pizza.controller('adminUpdate' , ['$scope', '$http' , function($scope , $http){
$scope.title = "Pizzas";

$http.get('/admin-update/details').then(function(data){
//console.log(JSON.stringify(data));
$scope.home = {};
$scope.home = data.data;
} , function(data){
console.log('Error :'+data); 
}
);

$scope.del = function(id) {
$http.delete('/admin-update/details/'+id).then(function(data){
$scope.home = data.data;
} , function(data){
console.log(data.data); 
});
};

}]);

pizza.controller('cart' , ['$scope' , '$http' ,'$routeParams', function($scope , $http , $routeParams){
$scope.title = "Cart Update";
$scope.check = function(){
    alert('Order Done wait');
     window.location.href="#/home";
}
$http.get('/cart/det').then(function(data){
    var final = [];
    console.log(data.data);
    // $scope.home = data.data;
    // console.log(data.data.length);
    for(var i= 0 ; i < 3; i++){     
        var obj = {
            user_name : data.data[i].user_name,
            date : data.data[i].date_booking,
            time : data.data[i].time,
            pizza_name : data.data[i].pizza_name
        } ; 
        final.push(obj);
        console.log(final[i]);
        $http.post('/cart/deta' ,final[i]).then(function(data){
            console.log(data.data);
            $scope.home.name = data.data.name;
            
            $scope.home.img = data.data.img;
            $scope.home.price = data.data.price;
            $scope.home.quantity = data.data.quantity;
        } , function(data){
            console.log(data.data);
        });
        $scope.home = data.data;
    
        }
    } , function(data){
                console.log(data.data);
            });
}]);



pizza.controller('login' , ['$scope' , '$http' , function($scope , $http){
$scope.title = "Login";

$scope.login = function(){

console.log($scope.log);

$http.get('/login/details' , {params : {mobile : $scope.log.mobile , pass : $scope.log.pass}}).then(function(data){
    console.log(data.data);
    if(data.data == null){
        alert('Invalid mobile/password');
    }else{
        console.log('Session Set');
        window.location.reload();
        window.location.href="#/home";
    }
} , function(data){
    console.log(data.data);
});
//     $http.get('/main').then(function(data){
// console.log('Hi' + data.data);
// },function(data){
// console.log(data.data);
// })

};


}]);




pizza.controller('signup' , ['$scope'  , '$http', function($scope , $http){
$scope.title = "Signup";
$scope.submit   = function(){
$http.post('/signup' , $scope.sign).then(function(data){
alert(data.data); 
window.location.href = "#/login";
} , function(data){
alert(data.data); 
});
};
}]);





pizza.controller('home' , ['$scope' , '$http' , function($scope , $http){
$scope.title = "Online Pizza Delivery";

$scope.cart_added = function(id){
    console.log('Ok');
    $http.get('/cart/details').then(function(data){
         if(data.data.temp == 1){
              console.log(id);
              console.log(data.data.pizza_id); //This is the 
              //carting code here
              var arr = [];
              var temp_pizza = {};
              var d = new Date();
              temp_pizza.pizza_name = id;
              temp_pizza.user_name = data.data.pizza_id;
              temp_pizza.date =d.toDateString();
              temp_pizza.time = d.toTimeString();
              console.log(temp_pizza);
              $http.post('/cart/post' , temp_pizza).then(function(data){
                  console.log(data.data); 
              } , function(data){
                 console.log(data.data); 
              });
         }else{
             alert('You are not logged in!!');  
             return false;
         }
    } , function(data){
            alert(data.data);
    });
};

$http.get('/home/details').then(function(data){
//console.log(JSON.stringify(data));
$scope.home = {};
$scope.home = data.data;
//alert(data.data.pizza_id);
} , function(data){
console.log('Error :'+data); 
}
);

}]);

pizza.controller('admin' , ['$scope' , '$rootScope' , '$http' , function($scope , $rootScope , $http){
$scope.title = "Admin Panel";
$scope.create = function(){

$scope.form.img = $rootScope.img;


$http.post('/admin' , $scope.form).then(function(data){
//$scope.todos = data;
alert(data.data);
$scope.form.name == "";
$scope.form.price == "";
$scope.form.quantity == "";
$scope.form.img == "";
$scope.form.desc == "";
$scope.form.veg == "";

window.location.href = "/"; 
}
, function(data){
console.log('Error '+data);
}
); 
}; 
}]);

pizza.directive('fdInput', ['$rootScope' , function ($rootScope) {
return {
link: function (scope, element, attrs) {
element.on('change', function  (evt) {
var files = evt.target.files;
$rootScope.img  = files[0].name;

});
}
}   
}]);

pizza.controller('adminLogin' , ['$scope' , '$rootScope' , '$http' , function($scope , $rootScope , $http){
    $scope.title = "Admin Login";

    $scope.login = function(){
        if ($scope.log.mobile == "admin" && $scope.log.pass == "admin"){
            window.location.href="#/admin";
        } else{
            alert('Login Failed');
        }
    }

}]);
