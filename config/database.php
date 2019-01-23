
<?php
defined('BASE_PATH') or exit('No direct script access allowed');


/** Parametri per connessione a database */
$dbconf = (object) [
   'main' => [
      'host'     => 'localhost',
      'username' => 'fepcom',
      'password' => 'fepcompwd',
      'dbname'   => 'pax_interventions', // Nome del database
   ]
];
