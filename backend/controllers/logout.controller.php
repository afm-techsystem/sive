<?php

session_start();

if(!is_null($_SESSION['mail'])){
  session_unset();
  session_destroy();
}

header('Location: /index.php');
