<?php
        if(!isset($_REQUEST['action']))
	{
		$action = 'accueil';
	}
	else
	{
		$action = $_REQUEST['action'];
	} 
	
        switch($action)
        {
            case 'accueil':
            {
                include ('vues/v_corps.php');
                break;
            }
            case 'deconnexion':
            {
                session_destroy();
                echo "<script>document.location.replace('index.php');</script>";  
                break;
            }


        }
?>

