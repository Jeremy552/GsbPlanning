<center><h3>
	L'évènement a été ajouté avec succès !
</h3></center>

<?php 	
echo "<table>";
?>
  <tr>
    <th>Nom</th>
    <th>Description</th>
    <th>Début</th>
    <th>Fin</th>
  </tr>
<?php 
foreach ($evenement as $res) {
	echo "<tr>";
	echo "<td>".$res['nomEvenement']."</td>";
	echo "<td>".$res['descriptionEvenement']."</td>";
	echo "<td>".$res['dateDebutEvenement']."</td>";
	echo "<td>".$res['dateFinEvenement']."</td>";
	echo "</tr>";  
}
?>
</table>

<center><p>Redirection vers le formulaire d'ajout dans <span id="counter">5</span> secondes.</p></center>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'index.php?uc=evenement&action=formulaireAjout';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>

<center>
	<a href="index.php" class="button alt">Accueil</a>
	<a href="index.php?uc=evenement&action=voirLesEvenements" class="button alt">Voir les evènements</a>
	<a href="index.php?uc=evenement&action=formulaireAjout" class="button alt">Redirection immédiate</a>
</center>

	