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
            $idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
			$ficheFraisId = $idFicheUser['idFicheUser'];
            include("views/v_suiviFrais.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $ficheFraisId);
            $lesIdFrais = $pdo->getLesIdFrais();
			$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $ficheFraisId);
            $idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
			$leMois = $idFicheUser['idFicheUser'];
			$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
			$numAnnee = $lesInfosFicheFrais['annee'];
            $numMois = $lesInfosFicheFrais['mois'];
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif']; 
            include("views/v_etatFrais.php");
            break;
        }
}