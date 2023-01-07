<?php 
     
     $dbHost = 'localhost';
     $dbName = 'codepbxn_oubs';
     $dbUser = 'codepbxn_oubs';
     $dbPassword = 'DavLxQXuN-Tc';

     date_default_timezone_set("Asia/Dhaka");

     try {
          $pdo= new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUser,$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
     } catch (PDOException $e) {
          echo "Connection Error:".$e->getMessage();
     }
?>