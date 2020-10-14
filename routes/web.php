<?php
// Redirect (delete line below)
$router->Redirect('/','/demo');

// Default methods GET, POST, PUT
$router->Set('/demo', 'App/Http/Controller/Demo', 'Index');

// Authenticate
$router->Set('/login', 'App/Http/Controller/Login', 'Index');
$router->Set('/register', 'App/Http/Controller/Login', 'Register');
$router->Set('/resetpass', 'App/Http/Controller/Login', 'Reset');
$router->Set('/activation/{id}', 'App/Http/Controller/Login', 'Activation');

// Only POST request
$router->Set('/home/{id}', 'App/Http/Controller/Demo', 'Index', ['POST']);

// Function
$router->Set('/phpversion', function(){
    echo phpversion();
});

/* API */

// Login user and create user token
$router->Set('/api/auth', 'App/Http/Controller/Api/ApiAuth', 'Index', ['POST']);
// Logged user info
$router->Set('/api/user/info', 'App/Http/Controller/Api/User/ApiUserInfo', 'Index', ['POST', 'GET']);

// User info with {id}
$router->Set('/api/user/info/id', 'App/Http/Controller/Api/User/ApiUserInfo', 'Id', ['POST']);
// User info with {alias}
$router->Set('/api/user/info/alias', 'App/Http/Controller/Api/User/ApiUserInfo', 'Alias', ['POST']);
// User info with {email}
$router->Set('/api/user/info/email', 'App/Http/Controller/Api/User/ApiUserInfo', 'Email', ['POST']);

/* Custom error page */

// Show error page
$router->ErrorPage();