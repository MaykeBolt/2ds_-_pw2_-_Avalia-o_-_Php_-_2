<?php

namespace App\Model;

class User {
     private $nome;
     private $sobrenome;
     private $idade;

     function __construct($nome,$sobrenome,$idade) {
        $this->name = $nome;
        $this->surname = $sobrenome;
        $this->age = $idade;
     }

     public function getName() {
        return $this->name;
     }

     public function getSurname() {
      return $this->surname;
   }

   public function getAge() {
      return $this->age;
   }
}


?>