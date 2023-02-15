<?php

try {
  $dbserv = "localhost";
  $db = "breeze";
  $dbuser = "addison";  // Database Credentials
  $dbpass = "";
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$dbserv;dbname=$db;port=3306;charset=$charset";

  $options = [         //error options
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  $pdo = new PDO($dsn, $dbuser, $dbpass, $options); // connect

} catch (PDOException $e){
  echo "Error!: " . $e->getMessage() . "<br/>";
  die(); // throws error if connection unsuccessful
  }


?>
