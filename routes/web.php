<?php
// Default GET, POST, PUT
$router->Set('/', 'App/Http/Controller/Homepage', 'Index');

// Only POST request
$router->Set('/home/{id}', 'App/Http/Controller/Homepage', 'Index', ['POST']);

// Function
$router->Set('/phpversion', function(){
    echo phpversion();
});

// Show error page
$router->ErrorPage();