<?php
$dbserv = "localhost";
$db = "breezelogin";
$dbuser = "root";
$dbpass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$dbserv;dbname=$db;charset=$charset";
$options = array(
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);
try { 
  $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
}
catch(\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


