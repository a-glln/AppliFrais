<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_sommaire.php");
//Menu appelé directement
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
    case 'selectionnerMois':
        {
			//get les mois dispo pour cet utilisateurs
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            include("views/v_listeMois.php");
            break;
        }
    case 'voirEtatFrais':
        {
			//On recupere le mois choisie du formulaire
            $leMois = $_REQUEST['lstMois'];
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            include("views/v_listeMois.php");
			//Recuperation des frais forfait et HF
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);           
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
			$lesIdFrais = $pdo->getLesIdFrais();
			//declaration des variable supplementaire sur la fiche
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