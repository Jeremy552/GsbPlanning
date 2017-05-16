<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>


  <center><h3>Ajouter un événement :</h3></center>
<form class="form-horizontal" action="index.php?uc=evenement&action=ajoutBase" method="POST">
<fieldset>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nomEvenement">Nom de l'événement :</label>  
  <div class="col-md-4">
  <input id="nomEvenement" name="nomEvenement" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="descriptionEvenement">Description :</label>  
  <div class="col-md-4">
  <input id="descriptionEvenement " name="descriptionEvenement" placeholder="" class="form-control input-md" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateDebutEvenement">Début de l'événement :</label>  
  <div class="col-md-4">
  <input id="dateDebutEvenement " name="dateDebutEvenement" placeholder="" class="form-control input-md" type="date">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dateFinEvenement">Fin de l'événement :</label>  
  <div class="col-md-4">
  <input id="dateFinEvenement"  name="dateFinEvenement" placeholder="" class="form-control input-md" type="date">
    
  </div>
</div>
<center><input type="submit" name="submitEventForm"></center>

</fieldset>
</form>





