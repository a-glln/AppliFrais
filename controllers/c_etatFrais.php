<?php
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
            include("views/v_listeMois.php");
            break;
        }
    case 'voirEtatFrais':
        {
            $leMois = $_REQUEST['lstMois'];
            $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
            include("views/v_listeMois.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);           
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
			$lesIdFrais = $pdo->getLesIdFrais();
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