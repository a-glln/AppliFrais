<?php
/**
 * Created by PhpStorm.
 * User: adamg
 * Date: 05/02/2019
 * Time: 16:59
 */
include("views/v_menuAdmin.php");
$action = $_REQUEST['action'];

switch($action){

    case 'afficherListe':
	{
		$allUsers=$pdo->getLesUsersAdmin();
        include("views/v_listeUser.php");
        break;
    }

    case 'supprUser':
	{

        $idUser = $_REQUEST['idUser'];
        $pdo->supprimerUser($idUser);
        echo ("<script>alert ('Utilisateur supprimé!') ;</script>");
	    $allUsers=$pdo->getLesUsersAdmin();
        include("views/v_listeUser.php");
        break;
    }

    case 'ajoutUser':
        {
            $nom = $_REQUEST['nom'];
            $prenom = $_REQUEST['prenom'];
			$nom_utilisateur = $_REQUEST['nom_utilisateur'];
            $mot_de_passe = $_REQUEST['mot_de_passe'];
            $role_id = $_REQUEST['role_id'];
            $adresse = $_REQUEST['adresse'];
            $code_postal = $_REQUEST['code_postal'];
            $ville = $_REQUEST['ville'];
            $date_embauche = $_REQUEST['date_embauche'];
            $pdo->addUnUser($nom, $prenom, $nom_utilisateur, $mot_de_passe, $role_id, $adresse, $code_postal, $ville, $date_embauche );
            echo ("<script>alert ('Utilisateur créer !') ;</script>");
            $allUsers=$pdo->getLesUsersAdmin();
            include("views/v_listeUser.php");
            break;
        }
}

?>