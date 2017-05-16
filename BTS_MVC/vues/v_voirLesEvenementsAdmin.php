<center><h3>
	Evènements :
</h3></center>

<?php 	
echo "<table>";
?>
  <tr>
  	<th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Début</th>
    <th>Fin</th>
    <th>Supprimer</th>
    <th>Ajouter</th>
    <th>Participants</th>
  </tr>
<?php 
foreach ($lesEvenements as $evenement) {
	echo "<tr>";
	echo "<td>".$evenement['id']."</td>";
	echo "<td>".$evenement['nomEvenement']."</td>";
	echo "<td>".$evenement['descriptionEvenement']."</td>";
	echo "<td>".$evenement['dateDebutEvenement']."</td>";
	echo "<td>".$evenement['dateFinEvenement']."</td>";
	echo '<td>
				<form action="" method="post">
					<input type="submit" name="supprimerEvenement" value="Supprimer">
					<input type="hidden" name="idEvenement" value="'.$evenement['id'].'">
				</form> </td>'; 
	$participants = $pdo->getParticipant($evenement['id']);
	$employes = $pdo->getEmploye($evenement['id']);
	echo '<td>
				<form action="" method="post">
					 <select name="idEmploye">';
					 foreach ($employes as $employe) {
					 	echo  "<option value=".$employe['id'].">".$employe['nom']."</option>";
					 }
	echo '			</select> 
					<input type="hidden" name="idEvenement" value="'.$evenement['id'].'">
					<input type="submit" class="btn btn-success" name="ajouterParticipantEvenement" value="Ajouter">
				</form> </td>'; 

	echo "<td>";
	echo "<table>";
	echo "<tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Supprimer</th>
  	</tr> ";
	foreach ($participants as $participant ) {
	echo "<tr>"; 
	echo "<td>".$participant['nom']."</td>";
	echo "<td>".$participant['prenom']."</td>";
	echo '<td>
				<form action="" method="post">
					<input type="submit" name="supprimerParticipantEvenement" value="Supprimer">
					<input type="hidden" name="idEmploye" value="'.$participant['idEmploye'].'">
					<input type="hidden" name="idEvenement" value="'.$participant['idEvenement'].'">
				</form> </td>'; 
	echo "</tr>";
	}
	
	echo "</table>";
	echo "</td>";  
	echo "</tr>";



}

if (isset($_POST['supprimerEvenement'])){
	$idEvenement = $_POST["idEvenement"];
	$pdo->supprimerEvenement($idEvenement);
	echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['supprimerParticipantEvenement'])){
	$idEvenement = $_POST["idEvenement"];
	$idEmploye = $_POST["idEmploye"];
	$pdo->supprimerParticipantEvenement($idEvenement,$idEmploye);
	echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['ajouterParticipantEvenement'])){
	$idEvenement = $_POST["idEvenement"];
	$idEmploye = $_POST["idEmploye"];
	$pdo->ajouterParticipantEvenement($idEvenement,$idEmploye);
	echo "<meta http-equiv='refresh' content='0'>";}
?>
</table>