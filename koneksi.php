<?php 
   require_once realpath(__DIR__."/vendor/autoload.php");
   
   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
   $dotenv->load();

   $db = $_ENV['DB_CONNECTION'];
   $username = $_ENV["DB_USERNAME"];
   $pass = '';
   $dbName = $_ENV['DB_DATABASE'];


   $koneksi = mysqli_connect($db, $username, $pass, $dbName);
?>