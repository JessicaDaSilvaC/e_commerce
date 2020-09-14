<?php
   try{
    $pdo = new PDO("mysql:host=localhost;dbname=dashboard","root","");
   }
   catch(PDOException $e){
    echo $e->getMessage();
   }
?>