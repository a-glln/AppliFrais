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
			//appel de la fonction pour recuper les utilisateurs
            $users = $pdo->getLesUsersComptable();
            include("views/v_suiviFrais.php");
            break;
        }
    case 'voirFrais' :
        {
			//on recuepere l'id de l'utilisateur choisie
            $idVisiteur = $_REQUEST['lstUser'];
			//avec cette id on recupere sa derniere fiche
            $idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
			//l'id de la fiche correspondant a cette utilisateur'
			$ficheFraisId = $idFicheUser['idFicheUser'];
            include("views/v_suiviFrais.php");
			//recuperation de toutes less infos neccesaire a l'afficage de la fiche
            $lesIdFrais = $pdo->getLesIdFrais();
			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $ficheFraisId);
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