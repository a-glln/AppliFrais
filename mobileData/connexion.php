<?php
header('Access-Control-Allow-Origin: *');
$host_name = 'localhost';
$database = 'gsb_frais';
$user_name = 'root';
$password = '';

$bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
$query = 'SELECT * FROM fichefrais';
$d = $bdd -> query($query);


echo json_encode($retour);