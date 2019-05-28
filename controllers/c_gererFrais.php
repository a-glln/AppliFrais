<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
include("views/v_sommaire.php");
$idVisiteur = $_SESSION['idVisiteur'];
//date actuelle
$mois = date("m");
$annee = date("Y");
$jour = date("d");

$action = $_REQUEST['action'];
switch ($action) {
    case 'saisirFrais':
        {
			//Si la date a depace le premier jour du mois on cree une nouvelle fiche pour cet user
            if ($pdo->estPremierFraisMois($idVisiteur, $mois, $annee)) {
                $pdo->creeNouvellesFiche($idVisiteur, $mois, $annee);
                $lesIdFrais = array(1, 2, 3, 4);
				//on recuper le dernier id de fiche cree par cet user (necessaire pr la requete)
                $idFiche = $pdo->derniereFicheSaisi($idVisiteur) ;
                $derniereFiche = $idFiche['derniereFiche'];
				//ajout de la ligne de frais forfait
                $pdo->creeNouvellesLigneForfait($idVisiteur,$derniereFiche, $lesIdFrais);
            }

            break;
        }
     case 'validerMajFraisForfait':
        {
			//on recupere le dernier mois saisie par user
            $idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
            $ficheFraisId = $idFicheUser['idFicheUser'];
            $lesFrais = $_REQUEST['lesFrais'];
			//si les valeur rentrer dans le formulaire sont valide ont met a jour la ligne de frais et on affiche un message
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($idVisiteur, $ficheFraisId, $lesFrais);
                echo("<script>alert ('Frais Forfait mis a jour !') ;</script>");
            } else {
			//ou on affiche une erreur
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("views/v_erreurs.php");
            }
            break;
        }
    case 'validerCreationFrais':
        {
			//On recupere les infos necessaire pour un frais hors forfait
			$idFicheUser = $pdo->derniereFicheSaisiMois($idVisiteur);
			$ficheFraisId = $idFicheUser['idFicheUser'];
            $dateFrais = $_REQUEST['dateFrais'];
            $libelle = $_REQUEST['libelle'];
            $montant = $_REQUEST['montant'];
            valideInfosFrais($libelle, $montant);
			//Si aucune erreur dans les montant ou le lib 
            if (nbErreurs() != 0) {
                include("views/v_erreurs.php");
            } else {
			//creer nouv frais HF
                $pdo->creeNouveauFraisHorsForfait($idVisiteur, $ficheFraisId, $libelle, $dateFrais, $montant);
                echo("<script>alert ('Frais Hors Forfait créer !') ;</script>");
            }
            break;
        }
    case 'supprimerFrais':
        {
			//On recupere l'id de la ligne voulue et on appelle la fonction
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