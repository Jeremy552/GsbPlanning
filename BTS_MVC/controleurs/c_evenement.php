<?php
switch($action)
        {
            case 'formulaireAjout':
             if(isset($_SESSION['admin']))
                {
            include ('vues/v_ajouterEvenement.php');
                }
            else
            {
                echo "<script>document.location.replace('index.php');</script>";
            }
            break;

            case 'ajoutBase':
            if(isset($_SESSION['admin']))
                {
               if (isset($_POST['nomEvenement']) and $_POST['nomEvenement'] != '' and $_POST['dateDebutEvenement'] <= $_POST['dateFinEvenement'] ){
                $pdo->creationEvenement($_POST['nomEvenement'],$_POST['descriptionEvenement'],$_POST['dateDebutEvenement'],$_POST['dateFinEvenement']);
                $evenement = $pdo->getEvenement($_POST['nomEvenement'],$_POST['descriptionEvenement'],$_POST['dateDebutEvenement'],$_POST['dateFinEvenement']);
                include ('vues/v_ajouterEvenementRes.php');  
                }
                else {
                    if($_POST['dateDebutEvenement'] > $_POST['dateFinEvenement']){
                        $erreur = "Date incohérente";
                    }
                    else{
                        $erreur = "Un évenement doit au moins avoir un nom !";
                    }
                    include ('vues/v_erreur.php'); 
                    include ('vues/v_ajouterEvenement.php');
                }
                }
            else
            {
                echo "<script>document.location.replace('index.php');</script>";                         
            }
                
            break;

            case 'voirLesEvenements':
            if(isset($_SESSION['admin']))
            {
            $lesEvenements = $pdo->getAllEvenement();
            include ('vues/v_voirLesEvenementsAdmin.php');
                }
                else{
                    $lesEvenements = $pdo->getAllEvenement();
                    
                    include ('vues/v_voirLesEvenements.php');
                }

            break;
        }