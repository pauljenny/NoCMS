<div class="story-top5"><div align="center">
<br/><br/><br/><br/><br/><br/>
</div></div><div class="story2"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <img src="./images/text/pcs.png" alt="Changement les informations" />
	  <br /><br /><br />
  <!-- script start -->
<?php
	if(isset($_POST['bouton']))
	{
?>
			<small>Votre mot de passe et/ou adresse email a été modifié avec succès<br /><a href="index.php">Retour à l'accueil</a></small>
<?php
	}
	else
	{
?>
			<small>Cette page vous permettra de modifier les informations de votre compte :</small>
			<form method="post" action="">
				<label for="email"><small>Adresse email : </small></label> <input type="text" value="<?php echo htmlspecialchars($email_actuel);?>" name="email" id="email"/><br />
				<label for="mdp"><small>Mot de passe : </small></label> <input type="text" name="mdp" id="mdp" size="12"/><br />
				<div align="center"><input type="submit" value="Modifier" name="bouton" /><br /><em><small>Veuillez contacter l'administrateur système pour tout changement de nom de compte</small></em></div>
			</form>
<?php
	}
?>
				<!-- script stop -->
          <center><br/>
        </div>
      </div>
      <div align="center">
        </center>
      </div>
</div>
<div class="story-bot2" align="center"><br/>

</div>

<br /></td>