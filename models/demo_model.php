<?php namespace System\Model;
Class Demo_model extends Model{

   public function getUsers(){
      $result = \ORM::for_table('user')
         ->find_many();

      return $result;
   }
}

