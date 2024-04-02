<?php 
function checkToken() {
  //echo "SESSION token : ".$_SESSION['token'].PHP_EOL;
  //echo "POST token : ".$_POST['token'].PHP_EOL;

  if((isset($_POST['token']) && $_POST['token'] != $_SESSION['token']) || !isset($_SESSION['token'])){
    die('Token de sécurité expiré ou erroné.');
  }
  

}

