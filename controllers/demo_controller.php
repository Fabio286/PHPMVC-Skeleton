<?php
defined('BASE_PATH') or exit('No direct script access allowed');

$klein->respond('GET', '/demo', function ($request, $response, $service, $app) {
   $service->title = 'Demo Page';
   $service->content = 'Hello World!';

   $service->render('views/demo_view.phtml');
});
