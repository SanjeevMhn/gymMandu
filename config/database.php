<?php 

    $host = 'localhost';
    $dbname = 'gymdb';
    $user = 'root';
    $password = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    $pdo = new PDO($dsn,$user,$password);
?>