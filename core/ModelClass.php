<?php namespace System\Model;
Class Model {
   protected $params;

   final function __construct(){
      include './config/database.php';
      $this->params = $dbconf->main;
      \ORM::configure(array(
         'connection_string' => 'mysql:host='.$this->params['host'].';dbname='.$this->params['dbname'],
         'username' => $this->params['username'],
         'password' => $this->params['password'],
         'logging' => true
      ));
   }
}