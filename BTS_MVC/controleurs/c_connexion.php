<?php
$action = $_REQUEST['action'];

switch($action)
{
    case 'connexionAdmin':
    if(isset($_POST['loginForm']))
    {
        $connexion = $pdo->connexionAdmin($_POST['login'],$_POST['mdp']);
        if($connexion) 
        {
            $_SESSION["admin"] = $_POST['login'];
            echo "<script>document.location.replace('index.php?uc=admin&action=accueil');</script>";   
        }
        else
        {
            /*echo "<script>alert('Attention mauvais identifiant');</script>";*/
            $erreur = "Erreur lors de la connexion. Veuillez verifier votre identifiant et/ou mot de passe";
            include ('vues/v_erreur.php');
            
        }
    }
        include ('vues/v_connexion.php');
        break;
}
    

