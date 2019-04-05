<?php
header('Access-Control-Allow-Origin: *');
$host_name = 'localhost';
$database = 'gsb_frais';
$user_name = 'root';
$password = '';

$bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
$query = 'SELECT * FROM visiteur';
$v = $bdd -> query($query);
$visiteur = $v -> fetchAll();

$retour = [];
for ($i = 0; $i < count($visiteur); $i++){
    $retour[$i]['id'] = $visiteur[$i]['id'];
    $retour[$i]['nom'] = $visiteur[$i]['nom'];
    $retour[$i]['prenom'] = $visiteur[$i]['prenom'];
    $retour[$i]['login'] = $visiteur[$i]['login'];
    $retour[$i]['mdp'] = $visiteur[$i]['mdp'];
    $retour[$i]['groupe'] = $visiteur[$i]['groupe'];
    $retour[$i]['adresse'] = $visiteur[$i]['adresse'];
    $retour[$i]['cp'] = $visiteur[$i]['cp'];
    $retour[$i]['ville'] = $visiteur[$i]['ville'];
    $retour[$i]['dateEmbauche'] = $visiteur[$i]['dateEmbauche'];

}

echo json_encode($retour);