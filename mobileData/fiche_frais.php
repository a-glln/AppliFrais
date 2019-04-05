<?php
header('Access-Control-Allow-Origin: *');
$host_name = 'localhost';
$database = 'gsb_frais';
$user_name = 'root';
$password = '';

$bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
$query = 'SELECT mois  FROM  fichefrais where idvisiteur = :idVisiteur 
		order by mois desc ';
$d = $bdd -> query($query);
$d->bindParam(':idVisiteur', $_POST['idVisiteur']);
$fiches = $d -> fetchAll();

$retour = [];
for ($i = 0; $i < count($fiches); $i++){
    // $retour[$i]['id'] = $fiches[$i]['id'];
    $retour[$i]['idVisiteur'] = $fiches[$i]['idVisiteur'];
    $retour[$i]['mois'] = $fiches[$i]['mois'];
    $retour[$i]['nbJustificatifs'] = $fiches[$i]['nbJustificatifs'];
    $retour[$i]['montantValide'] = $fiches[$i]['montantValide'];
    $retour[$i]['dateModif'] = $fiches[$i]['dateModif'];
    $retour[$i]['idEtat'] = $fiches[$i]['dateModif'];
    

}

echo json_encode($retour);