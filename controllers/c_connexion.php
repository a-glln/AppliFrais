<!-- 
  Created by PhpStorm.
  User: adamg
-->
<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
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
            $utilisateur = $pdo->getInfosVisiteur($nom_utilisateur, $mot_de_passe);
            if (!is_array($utilisateur)) {
                ajouterErreur("Login ou mot de passe incorrect");
                include("views/v_erreurs.php");
                include("views/v_connexion.php");
            } else {
                $id = $utilisateur['id'];
                $nom = $utilisateur['nom'];
                $prenom = $utilisateur['prenom'];
                $role_id = $utilisateur['role_id'];
                connecter($id, $nom, $prenom, $role_id);
                if ($role_id == "1") {
                    include("views/v_sommaire.php");
                    include("views/v_accueil.php");
                }
                else if ($role_id == "2") {
                    include("views/v_menuComptable.php");
                    include("views/v_accueil.php");
                }
                else if ($role_id == "3") {
                    include("views/v_menuAdmin.php");
                    include("views/v_accueil.php");
                }
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