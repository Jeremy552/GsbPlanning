<?php

class PdoGSB
{   		
	private $dsn = "mysql:dbname=gsb_ppe2016;host=localhost";
    private $user = "root";
    private $password = "root";
    private $cnx;
    //Get/Set
    
    
    public function __construct() {
        try{
            $this->cnx = new PDO($this->dsn,$this->user,$this->password);
        } catch (Exception $e) {
            echo"Connexion échouées : " .$e->getMessage();
        }    
    } 


public function connexionAdmin($login, $mdp)
{
	$req = "select count(*) as nb from Admin where login='".$login."' and mdp='".$mdp."'";
	$res = $this->cnx->query($req);
	$LaLigne = $res->fetch();
	$nombre = $LaLigne['nb'];
	if ($nombre == 1)
	{
		$_SESSION["login"] = $_POST["login"];
		return true;
	}
	else
	{
		return false;
	}
}


 public function creationEvenement($nomEvenement,$descriptionEvenement,$dateDebutEvenement,$dateFinEvenement){
      $sql = "INSERT INTO Evenement (nomEvenement,descriptionEvenement,dateDebutEvenement,dateFinEvenement) VALUES ('".$nomEvenement."','".$descriptionEvenement."','".$dateDebutEvenement."','".$dateFinEvenement."')";
      $this->cnx->query($sql);
    }

 public function getEvenement($nomEvenement,$descriptionEvenement,$dateDebutEvenement,$dateFinEvenement)
	{
		$sql = "SELECT * from Evenement WHERE nomEvenement = '".$nomEvenement."' and descriptionEvenement = '".$descriptionEvenement."' and dateDebutEvenement =  '".$dateDebutEvenement."' and dateFinEvenement  = '".$dateFinEvenement."' ";
		return $this->cnx->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	}

public function getAllEvenement()
	{
		$sql = "SELECT * from Evenement";
		return $this->cnx->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}


public function supprimerEvenement($idEvenement){
        $sql="DELETE FROM Evenement WHERE id = ".$idEvenement."; ";
        return $this->cnx->query($sql);
    }

public function getParticipant($idEvenement)
	{
		$sql =  "SELECT * FROM ParticipantEvenement
				INNER JOIN Employe
				ON Employe.id = ParticipantEvenement.idEmploye
				Where idEvenement = ".$idEvenement." ;";
		return $this->cnx->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	}

public function getEmploye()
	{
		$sql =  "SELECT id, nom from Employe";
		return $this->cnx->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	}

public function supprimerParticipantEvenement($idEvenement,$idEmploye){
        $sql="DELETE FROM ParticipantEvenement WHERE idEvenement = ".$idEvenement." AND idEmploye = ".$idEmploye."; ";
        return $this->cnx->query($sql);
    }

public function ajouterParticipantEvenement($idEvenement,$idEmploye){
        $sql="INSERT INTO ParticipantEvenement (idEvenement,idEmploye) VALUES (".$idEvenement.",".$idEmploye.");";
        return $this->cnx->query($sql);
    }


	

}
?>