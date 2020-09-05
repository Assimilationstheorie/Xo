<?php
require __DIR__.'/../boot/app.php';

use Xo\Route\Router;

try
{
   $router = new Router();

   require __DIR__.'/../routes/web.php';
}
catch(Exception $e)
{
    echo json_encode(["errorMsg" => $e->getMessage(), "errorCode" => $e->getCode()]);
}
?>