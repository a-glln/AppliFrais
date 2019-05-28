<!-- 
  Created by PhpStorm.
  User: adamg
-->
<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
	// Si aucun appelle d'une action est recue -> demande de connexion'
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexion':
        {
            include("views/v_connexion.php");
            break;
        }
    case 'valideConnexion':
        {
            $nom_utilisateur = $_REQUEST['nom_utilisateur'];
            $mot_de_passe = $_REQUEST['mot_de_passe'];
			//On recupere le login et le mdp rentrer dans le formulaire
            $utilisateur = $pdo->getInfosVisiteur($nom_utilisateur, $mot_de_passe);
			//on recupere toute les infos sur un visiteur
            if (!is_array($utilisateur)) {
                ajouterErreur("Login ou mot de passe incorrect");
                include("views/v_erreurs.php");
                include("views/v_connexion.php");
				//si l'utilisateur n'existe pas dans le tableaux retourné on affiche erreur
            } else {
                $id = $utilisateur['id'];
                $nom = $utilisateur['nom'];
                $prenom = $utilisateur['prenom'];
                $role_id = $utilisateur['role_id'];
                connecter($id, $nom, $prenom, $role_id);
				//function connecter fixe les valeur de la session : nom prenom login et role
                if ($role_id == "1") {
                    include("views/v_sommaire.php");
                    include("views/v_accueil.php");
                } else if ($role_id == "2") {
                    include("views/v_menuComptable.php");
                    include("views/v_accueil.php");
                } else if ($role_id == "3") {
                    include("views/v_menuAdmin.php");
                    include("views/v_accueil.php");
                }
				//role 1 -> visiteur
				//role 2 -> comptable
				//role 3 -> admin
            }

            break;
        }
    default :
        {
            include("views/v_connexion.php");
            break;
        }
}
?>