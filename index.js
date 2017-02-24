var express = require('express');

var bodyParser = require('body-parser');

var cookieParser = require('cookie-parser');

var mongoose = require('mongoose');

var morgan = require('morgan');

var methodOverride = require('method-override');

var timeout = require('connect-timeout');

var session  =  require('express-session'); 

var app = express();

app.use(session({
  secret: 'keyboard cat',
  resave: false,
  saveUninitialized: true,
   unset: 'destroy'
}));

var sess;

app.use(bodyParser.json());

app.use(bodyParser.urlencoded({ extended: true   }));

app.use(bodyParser.raw());

app.use(bodyParser.text());

app.use(methodOverride());

app.use(express.static(__dirname + "/public"));

app.use(morgan('dev'));

mongoose.connect('mongodb://arpit:arpit@ds129459.mlab.com:29459/pizza',{
 server: {
    socketOptions: {
      socketTimeoutMS: 300000,
      connectionTimeout: 300000
    }
 }
  });



var Schema = mongoose.Schema;

var cart  = new Schema({
    pizza_name : String,
    user_name : String,
    date_booking : String,
    time : String
});

var pizza_details = new Schema({
name : String,
img : String,
price : Number ,
quantity : Number,
desc : String,
veg : String
});

var users = new Schema({
    name : String,
    address : String,
    mobile : Number , 
    password : String 
});

var Pizza = mongoose.model('Pizza' , pizza_details);

var Cart = mongoose.model('Cart' , cart );

var User = mongoose.model('User' , users);


app.post('/signup' , function(req , res){

    User.create({
        
       name : req.body.name,
       address : req.body.add,
       mobile : req.body.mobile,
       password : req.body.pass,
        done:false
    } , function(err , piz){
        if(err){
            res.send(err);
        }else{
            res.send('Successfully Registered ! Login');
        }
    });
});
app.post('/cart/post' , function(req , res){
    Cart.create({
        pizza_name : req.body.pizza_name,
        user_name  : req.body.user_name,
        date_booking :req.body.date,
        time : req.body.time,
        done : false
    } , function(err , piz){
        if(err){
        res.send(err);
        }else{
           res.send('Product added'); 
        }
        
    });
});

app.get('/login/details' , function(req , res){
   var sess  = req.session;
   var mobile = req.query.mobile;
   var pass = req.query.pass;
   console.log(mobile + "-" + pass);
   User.findOne({
       'mobile' : mobile , 
       'password' : pass
   } , function(err , pizz){
       if(err){
           console.log(err);
       }else{
           //console.log(pizz._id);
           sess.pizza_id = pizz ._id;
           sess.pizza_name = pizz.name;  
           res.json(JSON.stringify(pizz));
           console.log(sess);
       }
   });
});


app.post('/admin' , function(req , res){

    Pizza.create({
        name : req.body.name,
        img : req.body.img,
        price : req.body.price,
        quantity : req.body.quantity,
        desc : req.body.desc,
        veg : req.body.veg,
        done:false
    } , function(err , piz){
        if(err){
            res.send(err);
        }else{
            res.send('Successfully inserted');
        }
    });
});

app.get('/home/details' , function(req , res){
    
    Pizza.find(function(err , pizz){
        if(err){
            console.log('Error'  + err);
        }else{
            res.json(pizz);
        }
    });
});

app.get('/admin-update/details' , function(req , res){
    Pizza.find(function(err , pizz){
        if(err){
            console.log('Error'  + err);
        }else{
            res.json(pizz);
            console.log(pizz);
        }
    });
});
app.delete('/admin-update/details/:id' , function(req , res){
		Pizza.remove({
			_id : req.params.id
		} , function(err , todo){
			if(err)
				res.send(err);
			Pizza.find(function(err , todos){
			if(err)
				res.send(err);
			res.json(todos);
			});
		});
	});

app.get('/main' , function(req , res){
    var sess = req.session;
   
    if(sess.pizza_name){
        sess.temp = 1;
        res.json(sess);
    }else{
        res.json(0);
    }
});

app.get('/cart/det' , function(req , res){
   var sess = req.session;
   var id = sess.pizza_id;
   Cart.find({
       'user_name' : id,
   } , function(err , piz){
       if(err){
           console.log(err);
       }else{
           res.json(piz);
       }
   })
   
});
app.post('/cart/deta' , function(req , res){
       Pizza.findOne({
       '_id' : req.body.pizza_name
   } , function(err , pizz){
       if(err){
           console.log(err);
       }else{
           res.json(JSON.stringify(pizz));
           console.log(pizz);
       }
   });  
});

app.get('/cart/details' , function(req , res){
     var sess = req.session;
     
    if(sess.pizza_name){
        sess.temp = 1;
        res.json(sess);
    }else{
        sess.temp = 0
        res.json(sess);
    }
});

app.get('/logout' , function(req , res){
  req.session.destroy(function(err) {
  if(err) {
    console.log(err);
  } else {
    res.json('Logout Done');
  }
});
});
app.listen(3000 , function(){
console.log('App is working perfectly on PORT-3000');
});