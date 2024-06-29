<?php
   $dsn = 'mysql:host=HackTheBoxOffice;dbname=HackTheBoxOffice';
   $username = 'Hackers';
   $password = '1234';
  
   try {
       $db = new PDO($dsn, $username, $password);
   } catch (PDOException $e) {
       $error_message = $e->getMessage();
       echo 'Error Message ' . $error_message;
       exit();
   }
?>