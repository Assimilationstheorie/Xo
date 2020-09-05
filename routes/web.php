<?php

$router->Set('/','App/Http/Controller/Homepage','Index');

$router->Set('/phpversion', function(){
    echo phpversion();
});

$router->ErrorPage();