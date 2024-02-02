<?php

require 'loader/autoloader.php';


$router = new Router([
  
    new Route(
        '/',
        function ($context) {
           
            return Viewer::view('app/view/index.php', $context);
        }
    ),


    // *********************GENERAL ROUTES ***********************
    new Route(
        '/apis/login',
        function ($context) {
            
            return Viewer::view('app/apis/v1/auth.php', $context);
        }
    ),


    new Route(
        '/app/newpassword',
        function ($context) {
            
            return Viewer::view('app/view/change-password.php', $context);
        }
    ),

    


]);

$router->launch();