<center><h3>
	Evènements :
</h3></center>

<?php 	
echo "<table>";
?>
  <tr>
  <th>id</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Début</th>
    <th>Fin</th>
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

	$participants = $pdo->getParticipant($evenement['id']);
	$employes = $pdo->getEmploye();

	echo "<td>";
	echo "<table>";
	echo "<tr>
    <th>Nom</th>
    <th>Prenom</th>
  	</tr> ";
	foreach ($participants as $participant ) {
	echo "<tr>"; 
	echo "<td>".$participant['nom']."</td>";
	echo "<td>".$participant['prenom']."</td>";
	echo "</tr>";
	}
	
	echo "</table>";
	echo "</td>";  
	echo "</tr>";



}


?>
</table>



	