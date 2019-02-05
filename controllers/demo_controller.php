<?php
defined('BASE_PATH') or exit('No direct script access allowed');

$klein->respond('GET', '/demo', function ($request, $response, $service, $app) {
   require_once  './models/demo_model.php';
   $model = new \System\Model\Demo_model;

   $users = $model->getUsers();

   $service->title = 'Demo Page';
   $service->content = 'Hello World!';
   $service->users = $users;

   $service->render('views/demo_view.phtml');
});
