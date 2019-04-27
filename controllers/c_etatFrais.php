﻿<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
    case 'selectionnerMois':
        {
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            // Afin de sélectionner par défaut le dernier mois dans la zone de liste
            // on demande toutes les clés, et on prend la première,
            // les mois étant triés décroissants
            //$lesCles = array_keys($lesMois);
            //$moisASelectionner = $lesCles[0];
            include("views/v_listeMois.php");
            break;
        }
    case 'voirEtatFrais':
        {
            $leMois = $_REQUEST['lstMois'];
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
           // $moisASelectionner = $leMois;
            include("views/v_listeMois.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
            $lesIdFrais = $pdo->getLesIdFrais();
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
			$numAnnee = $lesInfosFicheFrais['annee'];
            $numMois = $lesInfosFicheFrais['mois'];
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif']; 
            include("views/v_etatFrais.php");
        }
}
?>