<div class="story-top3"><div align="center">
<br/><br/><br/><br/><br/><br/><img src="./images/text/unstucker.png" alt="Déblocage" />
</div></div><div class="story2"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <br /><br /><br />
<?php
	if(isset($_POST['bouton']))
	{
?>
		<small>Votre personnage a bien été téléporté à sa pierre de foyer.<br /><a href="index.php">Retour à l'accueil</a></small>
<?php
	}
	else
	{
?>
  <!-- script start -->
  <small>Bienvenue sur le gestionnaire de déblocage de personnage. Ce script vous permettra de <br />vous téléporter à votre pierre de foyer.<br /></small>
		<form method="post" action="">
			<label for="perso"><small>Vos personnages : </small></label><select name="perso" id="perso">
			<?php
				foreach($persos as $n)
				{
			?>
					<option value="<?php echo $n[0];?>"><small><?php echo $n[1];?></small></option>
			<?php
				}
			?>
			<br />
			<div align="center"><font color="red">Vous devez avoir déconnecté votre personange</font><br /><input type="submit" value="Envoyer" name="bouton" /></div>
		</form>
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
<div class="story-bot2" align="center"><br/>
</div>

<br /></td>