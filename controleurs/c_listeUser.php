<?php
/**
 * Created by PhpStorm.
 * User: adamg
 * Date: 05/02/2019
 * Time: 16:59
 */
include("vues/v_menuAdmin.php");
$action = $_REQUEST['action'];

switch ($action) {

    case 'afficherListe':
        {
            $allUsers = $pdo->getLesUsersAdmin();
            include("vues/v_listeUser.php");
            break;
        }

    case 'supprUser':
        {

            $idUser = $_REQUEST['idUser'];
            $pdo->supprimerUser($idUser);
            $allUsers = $pdo->getLesUsersAdmin();
            include("vues/v_listeUser.php");
            break;
        }

    case 'ajoutUser':
        {
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
            $login = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            $groupe = $_REQUEST['groupe'];
            $adresse = $_REQUEST['adresse'];
            $cp = $_REQUEST['cp'];
            $ville = $_REQUEST['ville'];
            $dateEmbauche = $_REQUEST['dateEmbauche'];
            $pdo->addUnUser($nom, $prenom, $login, $mdp, $groupe, $adresse, $cp, $ville, $dateEmbauche);
            echo("<script>alert ('Utilisateur créer !') ;</script>");
            $allUsers = $pdo->getLesUsersAdmin();
            include("vues/v_listeUser.php");
            break;
        }
}

?>