<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("vues/v_menuComptable.php");
$action = $_REQUEST['action'];

switch ($action) {
    case 'selectParamValidation' :
        {
            $users = $pdo->getLesUsersComptable();
            $lesMois = $pdo->getLesMoisComptable();
            include("vues/v_listeValidation.php");
            break;
        }
    case 'validationFrais' :
        {
            $idVisiteur = $_REQUEST['lstUser'];
            $mois = $_REQUEST['lstMois'];

            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
            $numAnnee = substr($mois, 0, 4);
            $numMois = substr($mois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_validationFrais.php");
            break;
        }
    case 'updateFrais' :
        {
            $idVisiteur = $_REQUEST['utilisateur'];
            $mois = $_REQUEST['mois'];
            $montantValide = $_REQUEST['montantValide'];

            $pdo->majLesInfosFicheFrais($idVisiteur, $mois, $montantValide);

            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $mois);
            $numAnnee = substr($mois, 0, 4);
            $numMois = substr($mois, 4, 2);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $dateModif = dateAnglaisVersFrancais($dateModif);
            include("vues/v_updateFrais.php");

        }
    case 'gererFraisHF' :
        {

        }

}