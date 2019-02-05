<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/constants.php';

$base  = dirname($_SERVER['PHP_SELF']);

// Update request when we have a subdirectory    
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$klein = new \Klein\Klein();

$klein->respond(function ($request, $response, $service, $app) use ($klein) {
   require_once __DIR__ . '/config/database.php';
   
   // Handle exceptions => flash the message and redirect to the referrer
   $klein->onError(function ($klein, $err_msg) {
       $klein->service()->flash($err_msg);
       //$klein->service()->back();
   });

   $service->escape = function ($str) {
      return htmlentities($str);
   };

   $app->db = $dbconf;

});

// Carica i componenti Core
foreach(glob('core/*.php') as $file) {
   require_once $file;
}

// Carica i Controller
foreach(glob('controllers/*.php') as $file) {
   include_once $file;
}

$klein->respond('GET', '/', function () {
   return 'INDEX';
});

// Gestione errori HTTP
$klein->onHttpError(function ($code, $router) {
   if ($code >= 400 && $code < 500) {
      $router->response()->body(
         'Oh no, a bad error happened that caused a '. $code
      );
   } elseif ($code >= 500 && $code <= 599) {
      error_log('uhhh, something bad happened');
   }
});

$klein->dispatch();