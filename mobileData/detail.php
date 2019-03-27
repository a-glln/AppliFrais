<?php
header('Access-Control-Allow-Origin: *');
$host_name = 'localhost';
$database = 'gsb_frais';
$user_name = 'root';
$password = '';

$bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
$query = 'SELECT * FROM lignefraisforfait
			WHERE mois = :mois';
$d = $bdd -> query($query);
$d->bindParam(':mois', $_POST['mois']);
$d->execute();
$fiches = $d -> fetchAll();

$retour = [];
//for ($i = 0; $i < count($fiches); $i++){
    // $retour[$i]['id'] = $fiches[$i]['id'];
    $retour['idVisiteur'] = $fiches['idVisiteur'];
    $retour['mois'] = $fiches['mois'];
    $retour['idFraisForfait'] = $fiches['idFraisForfait'];
    $retour['quantite'] = $fiches['quantite'];
    



echo json_encode($retour);
