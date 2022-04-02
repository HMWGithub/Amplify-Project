<?php

if (isset($_POST['login'])){
  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  //Login function 
  $result = $account->login($username, $password);

  if($result){
    header("Location: index.php");
  }
}

?>