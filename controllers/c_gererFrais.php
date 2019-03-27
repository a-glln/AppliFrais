<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
$mois = getMois(date("d/m/Y"));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = $_REQUEST['action'];
switch ($action) {
    case 'saisirFrais':
        {
            if ($pdo->estPremierFraisMois($idVisiteur, $mois)) {
                $pdo->creeNouvellesLignesFrais($idVisiteur, $mois);
            }
            break;
        }
    case 'validerMajFraisForfait':
        {
            $lesFrais = $_REQUEST['lesFrais'];
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
                echo("<script>alert ('Frais Forfait mis a jour !') ;</script>");
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("views/v_erreurs.php");
            }
            break;
        }
    case 'validerCreationFrais':
        {
            $dateFrais = $_REQUEST['dateFrais'];
            $libelle = $_REQUEST['libelle'];
            $montant = $_REQUEST['montant'];
            valideInfosFrais($dateFrais, $libelle, $montant);
            if (nbErreurs() != 0) {
                include("views/v_erreurs.php");
            } else {
                $pdo->creeNouveauFraisHorsForfait($idVisiteur, $mois, $libelle, $dateFrais, $montant);
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
$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
include("views/v_listeFraisForfait.php");
include("views/v_listeFraisHorsForfait.php");


?>