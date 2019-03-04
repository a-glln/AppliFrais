<?php
/**
 * Created by PhpStorm.
 * User: adamg
 * Date: 05/02/2019
 * Time: 16:59
 */
include("vues/v_menuAdmin.php");
$action = $_REQUEST['action'];

switch($action){

    case 'afficherListe':
	{
		$allUsers=$pdo->getLesUsersAdmin();
        include("vues/v_listeUser.php");
        break;
    } 

    case 'ajoutUser':
        {
            $addUser=$pdo->addUnUser();
            include("vues/v_listeUser.php");
            break;
        }
}

?>