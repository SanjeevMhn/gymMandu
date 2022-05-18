<?php 

    ini_set('display_errors',1);
    $host = '127.0.0.1';
    $dbname = 'gymdb';
    $user = 'root';
    $password = '';
    $charset = 'utf8';
    $port = 3306;

    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

    $pdo = '';
    try{
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }
?>