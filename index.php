<?php
require_once("models/fct.inc.php");
require_once ("models/class.pdogsb.inc.php");
include("views/v_entete.php") ;
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controllers/c_connexion.php");break;
	}
	case 'gererFrais' :{
		include("controllers/c_gererFrais.php");break;
	}
	case 'etatFrais' :{
		include("controllers/c_etatFrais.php");break; 
	}
    case 'listeUser' :{
        include("controllers/c_listeUser.php");break;
    }
    case 'suiviFrais' :{
        include("controllers/c_suiviFrais.php");break;
    }
    case 'validFrais' :{
        include("controllers/c_validationFrais.php");break;
    }
}
include("views/v_pied.php") ;
?>

