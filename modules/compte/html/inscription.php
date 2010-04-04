<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

///////////////////////////////////////////////
//		Vue de la page inscription.php 		 //
///////////////////////////////////////////////
?>
<div class="story-top2"><div align="center">
<br/><br/><br/><br/><br/><br/><img src="./images/text/account.png" alt="Création de compte" />
</div></div><div class="story2"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <br /><br /><br />
  <!-- script start -->
<?php
if(isset($_POST['bouton']))
{
?>
	<small>Votre inscription a bien été prise en compte !<br />Vous pouvez désormais vous connecter avec votre nom d'utilisateur et votre mot de passe !<br /><br /><a href="./index.php">Retourner à l'accueil</a></small>
<?php
}
else
{
?>
		<small>Bienvenue sur la page d'inscription du serveur.<br />Pour vous inscrire, vous devez remplir le formulaire ci-dessous.<br /><br /></small>
		<form method="post" action="">
			<label for="utilisateur"><small>Nom d'utilisateur : </small></label><input type="text" size="12" name="utilisateur" /><br />
			<label for="pass"><small>Mot de passe : </small></label><input type="password" size="12" name="pass" /><br />
			<label for="pass2"><small>Répéter le mot de passe : </small></label><input type="password" size="12" name="pass2" /><br />
			<label for="email"><small>Adresse email : </small></label><input type="text" name="email" /><br />
			<label for="version"><small>Version du compte : </small></label><select name="version"><option value="0">World Of Warcraft</option><option value="1">The Burning Crusade</option><option value="2" selected="selected">Wrath Of The Lich King</option></select><br />
			<label for="captcha"><small>Combien font : <?php echo $captcha;?></small></label><input type="text" name="asa" /><br />
			<div align="center"><input type="submit" value="Envoyer" name="bouton" /></div>
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
<div class="story-bot2" align="center">
</div>
</td>

