<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On'); 
session_start();
include ('modeles/class.pdoGSB.inc.php');
$pdo = new PdoGSB();

// On verifie s'il la variable globale session admin existe

if(isset($_SESSION["admin"]))
{
	include ('vues/v_entete.php');
	include ('vues/v_menuAdmin.php');
}	
else
{
	include ('vues/v_entete.php');
	include ('vues/v_menu.php');
}

        // On verifie s'il existe bien une valeur à la variable uc récupérer dans l'URL
if(!isset($_REQUEST['uc']))
{
	$uc = 'accueil';
}
else
{
	$uc = $_REQUEST['uc'];
} 

	 // Action
if(!isset($_REQUEST['action']))
{
	$action = '';
}
else
{
	$action = $_REQUEST['action'];
} // End UC

	if(isset($erreur))
	{
		include ('vues/v_erreur.php');
	}

	switch ($uc)
	{
		case "accueil":
		include ('vues/v_corps.php');
		break;

		case "connexion":
		include ('controleurs/c_connexion.php');
		break;

		case "evenement":
		include ('controleurs/c_evenement.php');
		break;

		case "admin" :
		if(isset($_SESSION['admin']))
		{
			include ('controleurs/c_gestionAdmin.php');
			break;
		}
		else
		{
			echo "<script>document.location.replace('index.php');</script>";                         
		}
		
	}

	include ('vues/v_footer.php');
	?>