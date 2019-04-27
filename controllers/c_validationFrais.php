<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_menuComptable.php");
$action = $_REQUEST['action'];

switch ($action) {
    case 'selectParamValidation' :
        {
            $users = $pdo->getLesUsersComptable();
            $lesMois = $pdo->getLesMoisComptable();
            include("views/v_listeValidation.php");
            break;
        }
    case 'validationFrais' :
        {
            $idVisiteur = $_REQUEST['lstUser'];
            $mois = $_REQUEST['lstMois'];
			$ficheId = $pdo->getIdFicheParMois($mois);
			$ficheFraisId = $ficheId['idFiche'];
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $ficheFraisId);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $ficheFraisId);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFraisComptable($idVisiteur, $ficheFraisId);
			$lesMontants = $pdo->getLesMontants();
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            include("views/v_validationFrais.php");
            break;
        }
    case 'updateFrais' :
        {
            $idVisiteur = $_REQUEST['utilisateur'];
            $mois = $_REQUEST['mois'];
            $montantValide = $_REQUEST['montantValide'];

			 if (nbErreurs() != 0) {
                include("views/v_erreurs.php");
            } else {
                $pdo->majLesInfosFicheFrais($idVisiteur, $mois, $montantValide);
                echo("<script>alert ('Fiche frais mise a jour  !') ;</script>");
            }
        

			$ficheId = $pdo->getIdFicheParMois($mois);
			$ficheFraisId = $ficheId['idFiche'];
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $ficheFraisId);
            $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $ficheFraisId);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFraisComptable($idVisiteur, $ficheFraisId);
			$lesMontants = $pdo->getLesMontants();
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $montantValide = $lesInfosFicheFrais['montantValide'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            include("views/v_validationFrais.php");
            break;

        }
    case 'supprimerFraisHF' :
        {
		$idFrais = $_REQUEST['idFrais'];
            $pdo->refuserFraisHF($idFrais);
			 echo("<script>alert ('Frais refusé') ;</script>");

			include("views/v_accueil.php");
            break;
        }

	case 'validerFraisHF' :
        {
			$idFrais = $_REQUEST['idFrais'];
            $pdo->validerFraisHF($idFrais);
			 echo("<script>alert ('Frais valider') ;</script>");
			include("views/v_accueil.php");
            break;
        }

}