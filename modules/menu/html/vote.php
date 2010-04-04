<div class="story-top"><div align="center">
<br/><br/><br/><br/><br/><br/><img src="./images/text/vote.png" alt="Voter"/>
</div></div><div class="story"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <br /><br /><br />
  <!-- script start -->
<?php
if(!isset($_SESSION['connect']) && !isset($_POST['bouton']))
{
?>
		<small>Vous n'êtes pas connecté !<br />Vous pouvez aller sur la page de connexion du site ou bien rentrer votre nom de compte ci-dessous : <br />
		<form method="post" action="">
			<label for="compte"><small>Nom du compte : </small></label><input type="text" size="12" name="compte" id="compte" /><br />
			<div align="center"><input type="submit" value="Envoyer" name="bouton" /></div>
		</form>
<?php
}
elseif(isset($_POST['bouton']) || isset($_SESSION['connect']))
{
?>
		<small>Vous pouvez voter désormais en cliquant sur la(les) image(s) puis suivre les instructions du site de vote :<br />
		<?php 
					foreach($array_vote as $value)
					{
						echo $value;
						echo '<br />';
					}
		?>
		<em>Vos points seront ajoutés après le vote sur ces sites</em></small>
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
<div class="story-bot" align="center"><br/>

</div>

<br /></td>