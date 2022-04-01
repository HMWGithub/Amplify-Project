<?php
  class Account {
    private $errorArray;

    public function __construct(){
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
      $this->validateUsername($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this->validateEmail($em, $em2);
      $this->validatePassword($pw, $pw2);

      return empty($this->errorArray) ? true : false;
    }

    public function getError($error){
      if(!in_array($error, $this->errorArray)){
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }
    
    private function validateUsername($un) {
      // Check username length
      if (strlen($un) > 25 || strlen($un) < 5){
        array_push($this->errorArray, "Your username must be between 5 and 25 characters");
        return;
      }

      // TODO: Check if username exists a;ready
      
    }

    private function validateFirstName($fn) {
      if (strlen($fn) > 25 || strlen($fn) < 2){
        array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
        return;
      }
    }

    private function validateLastName($ln) {
      if (strlen($ln) > 25 || strlen($ln) < 2){
        array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
        return;
      }
    }

    private function validateEmail($em, $em2) {
      if ($em != $em2){
        array_push($this->errorArray, "Your emails do not match");
        return;
      }
      if (!filter_var($em, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, "Your email is invalid");
        return;
      }
      
      // TODO: Check if emails exists already
    }

    private function validatePassword($pw, $pw2) {
      if($pw != $pw2){
        array_push($this->errorArray, "Your passwords do not match");
        return;
      }
      if (preg_match('/[^A-Za-z0-9]/', $pw)){
        array_push($this->errorArray, "Your password can only contain numbers and letters");
        return;
      }
      if (strlen($pw) > 30 || strlen($pw) < 8){
        array_push($this->errorArray, "Your password must be between 8 and 30 characters");
        return;
      }
    }

  }
?>