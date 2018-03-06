<?php
  session_start();
  
  $dsn = 'mysql:host=localhost;dbname=npwincome';
  $username = 'boirokk';
  $password = '1OMMpXQz7x6bSlHqT2b1';

  try {
    $db = new PDO ($dsn, $username, $password);
  } catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
  }

 ?>
