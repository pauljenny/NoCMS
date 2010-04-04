<div class="story-top"><div align="center">
<br/><br/><br/><br/><br/><br/><img src="./images/text/fps.png" alt="Mot de passe oublie" />
</div></div><div class="story"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <br /><br /><br />
<?php
if(isset($_POST['bouton']))
{
?>
		<small>Votre mot de passe a été réinitialisé avec succès !<br />Vous allez le recevoir d'ici quelques instants dans la boîte de votre adresse email<br /><a href="index.php">Retour à l'accueil</a></small>
<?php
}
else
{
?>
		<!-- script start -->
		<small>Bienvenue sur le gestionnaire de réinitialisation de mot de passe. Vous devez rentrer l'adresse email et le nom du compte qui doit être réinitialisé.</small><br />
			<form method="post" action="">
				<label for="user"><small>Nom de compte : </small><input type="text" size="12" name="user" /><br />
				<label for="email"><small>Adresse email : </small><input type="text" name="email" /><br />
				<div align="center"><input type="submit" value="Envoyer" name="bouton" /></div>
          <!-- script stop -->
<?php
}
?>
          <center><br/>
        </div>
      </div>
      <div align="center">
        </center>
      </div>
</div>
<div class="story-bot" align="center"><br/>

</div>

<br /></td>