<?php
$db = $app->db->main;

ORM::configure(array(
   'connection_string' => 'mysql:host='.$db['host'].';dbname='.$db['dbname'],
   'username' => $db['user'],
   'password' => $db['pwd'],
   'logging' => true
));

