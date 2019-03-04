<?php
/**
 * Created by PhpStorm.
 * User: adamg
 */
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else {
            $id = $visiteur['id'];
            $nom = $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            $groupe = $visiteur['groupe'];
            connecter($id, $nom, $prenom, $groupe);
            if ($groupe == "visiteur") {

                include("vues/v_sommaire.php");
                include("vues/v_accueil.php");
            }
            else if ($groupe == "comptable") {
                include("vues/v_menuComptable.php");
                include("vues/v_accueil.php");
            }
            else if ($groupe == "administrateur") {
                include("vues/v_menuAdmin.php");
                include("vues/v_accueil.php");
            }
        }

		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>