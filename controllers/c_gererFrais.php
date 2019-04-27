<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$mois = date("m");
$annee = date("Y");
$jour = date("d");

$action = $_REQUEST['action'];
switch ($action) {
    case 'saisirFrais':
        {
            if ($pdo->estPremierFraisMois($idVisiteur, $mois, $annee)) {
                $pdo->creeNouvellesFiche($idVisiteur, $mois, $annee);
                $lesIdFrais = array(1, 2, 3, 4);
                $idFiche = $pdo->derniereFicheSaisi($idVisiteur) ;
                $derniereFiche = $idFiche['derniereFiche'];
                $pdo->creeNouvellesLigneForfait($idVisiteur,$derniereFiche, $lesIdFrais);
            }

            break;
        }
     case 'validerMajFraisForfait':
        {
            $idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
            $ficheFraisId = $idFicheUser['idFicheUser'];
            $lesFrais = $_REQUEST['lesFrais'];
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($idVisiteur, $ficheFraisId, $lesFrais);
                echo("<script>alert ('Frais Forfait mis a jour !') ;</script>");
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("views/v_erreurs.php");
            }
            break;
        }
    case 'validerCreationFrais':
        {
			$idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
			$ficheFraisId = $idFicheUser['idFicheUser'];
            $dateFrais = $_REQUEST['dateFrais'];
			//$dateFrais = dateFrancaisVersAnglais($maDate);
            $libelle = $_REQUEST['libelle'];
            $montant = $_REQUEST['montant'];
            valideInfosFrais($libelle, $montant);
            if (nbErreurs() != 0) {
                include("views/v_erreurs.php");
            } else {
                $pdo->creeNouveauFraisHorsForfait($idVisiteur, $ficheFraisId, $libelle, $dateFrais, $montant);
                echo("<script>alert ('Frais Hors Forfait créer !') ;</script>");
            }
            break;
        }
    case 'supprimerFrais':
        {
            $idFrais = $_REQUEST['idFrais'];
            $pdo->supprimerFraisHorsForfait($idFrais);
            break;
        }
}
$idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
$ficheFraisId = $idFicheUser['idFicheUser'];
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $ficheFraisId);
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $ficheFraisId);

include("views/v_listeFraisForfait.php");
include("views/v_listeFraisHorsForfait.php");


?>