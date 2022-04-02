<?php
  class Account {
    private $connection;
    private $errorArray;

    public function __construct($connection){
      $this->connection = $connection;
      $this->errorArray = array();
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
      $this->validateUsername($un);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this->validateEmail($em, $em2);
      $this->validatePassword($pw, $pw2);

      return empty($this->errorArray) ? $this->insertUserDetails($un, $fn, $ln, $em, $pw) : false;
    }

    public function getError($error){
      if(!in_array($error, $this->errorArray)){
        $error = "";
      }
      return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw){
      $encryptedPw = md5($pw);
      $profilePic  = "assets/images/profile-pics/head_emerald.png";
      $date = date("Y-m-d");

      $result = mysqli_query($this->connection, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

      return $result;
    }
    
    private function validateUsername($un) {
      // Check username length
      if (strlen($un) > 25 || strlen($un) < 5){
        array_push($this->errorArray, Constants::$usernameInvalidLength);
        return;
      }

      $checkUsernameQuery = mysqli_query($this->connection, "SELECT username FROM users WHERE username='$un' LIMIT 1");
      if(mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$usernameTaken);
        return;
      }
      
    }

    private function validateFirstName($fn) {
      if (strlen($fn) > 25 || strlen($fn) < 2){
        array_push($this->errorArray, Constants::$firstNameInvalidLength);
        return;
      }
    }

    private function validateLastName($ln) {
      if (strlen($ln) > 25 || strlen($ln) < 2){
        array_push($this->errorArray, Constants::$lastNameInvalidLength);
        return;
      }
    }

    private function validateEmail($em, $em2) {
      if ($em != $em2){
        array_push($this->errorArray, Constants::$emailsDoNotMatch);
        return;
      }
      if (!filter_var($em, FILTER_VALIDATE_EMAIL)){
        array_push($this->errorArray, Constants::$emailInvalidFormat);
        return;
      }
      
      $checkUsernameQuery = mysqli_query($this->connection, "SELECT email FROM users WHERE email='$em' LIMIT 1");
      if(mysqli_num_rows($checkUsernameQuery) != 0) {
        array_push($this->errorArray, Constants::$emailTaken);
        return;
      }
    }

    private function validatePassword($pw, $pw2) {
      if($pw != $pw2){
        array_push($this->errorArray, Constants::$passwordsDoNotMatch);
        return;
      }
      if (preg_match('/[^A-Za-z0-9]/', $pw)){
        array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
        return;
      }
      if (strlen($pw) > 30 || strlen($pw) < 8){
        array_push($this->errorArray, Constants::$passwordInvalidLength);
        return;
      }
    }

  }
?>