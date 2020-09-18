<?php
// Default GET, POST, PUT
$router->Set('/', 'App/Http/Controller/Homepage', 'Index');

// Only POST request
$router->Set('/home/{id}', 'App/Http/Controller/Homepage', 'Index', ['POST']);

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