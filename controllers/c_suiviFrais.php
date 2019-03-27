<?php
/**
 * Created by PhpStorm.
 * User: adamg
 * Date: 05/02/2019
 * Time: 16:59
 */

include("views/v_menuComptable.php");
$action = $_REQUEST['action'];

switch ($action) {
    case 'selectParam' :
        {
            $users = $pdo->getLesUsersComptable();
            include("views/v_suiviFrais.php");
            break;
        }
    case 'voirFrais' :
        {
            $idVisiteur = $_REQUEST['lstUser'];
            $mois = $pdo->dernierMoisSaisi($idVisiteur);
            include("views/v_suiviFrais.php");
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
            include("views/v_etatFrais.php");
            break;
        }
}