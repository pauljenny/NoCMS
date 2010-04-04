<div class="story-top5"><div align="center">
<br/><br/><br/><br/><br/><br/><img src="./images/text/admin.png" alt="Administration des news" />
</div></div><div class="story2"><center><div style="width:300px; text-align:left">
      <div align="center">
	  <br /><br /><br />
  <!-- script start -->
			<?php
				if(!isset($_GET['act']))
				{
					echo '<table width="100%"><tr><th><div align="center">#</div></th><th><div align="center">Titre</div></th><th><div align="center">Auteur</div></th><th><div align="center">Date</div></th><th><div align="center">Actions</div></th></tr>';
					foreach($fetch as $value)
					{
						if($value['id'] != NULL) echo '<tr><td><small>'.$value['id'].'</small><td><small>'.$value['titre'].'</small></td><td><small>'.getNameByAuthor($value['auteur']).'</small></td><td><small>'.date('d-m-Y',$value['timestamp']).'</small></td><td><div align="center"><a href="index.php?mod=admin_news&act=modify&id='.$value['id'].'"><img src="./images/buttons/modify.png" alt="Modifier" /></a><a href="index.php?mod=admin_news&act=delete&id='.$value['id'].'"><img src="./images/buttons/delete.png" alt="Supprimer" /></a></div></td></tr>';
					}
					echo '</table><br /><br /><div align="center"><small><a href="index.php?mod=admin_news&act=add"><em>Ajouter une news</em></a></small></div>';
				}
				elseif(isset($_GET['act']) && isset($_GET['id']) && is_numeric($_GET['id'])) 
				{
					if($_GET['act'] == 'modify')
					{
						if(isset($_POST['bouton']))
						{
							echo 'Votre news a été modifié avec succès !';
						}
						else
						{
						?>
							<form method="post" value="">
								<label for="titre"><small>Titre de la news : </small></label><input type="text" value="<?php echo $fetch[0];?>" name="titre" id="titre"/><br />
								<label for="corps"><small>Contenu de la news : </small></label><textarea cols="30" rows="10" name="corps" id="corps"><?php echo $fetch[1];?></textarea><br />
								<input type="submit" value="Envoyer" name="bouton" />
							</form>
				<?php
						}
					}
					elseif($_GET['act'] == 'delete')
					{
						if(isset($_POST['bouton']))
						{
							echo 'Votre news a été supprimé avec succès !';
						}
						else
						{
						?>
							<small>Vous allez supprimer la news s'appelant <em><?php echo $fetch[0];?></em><br />Valider ?
							<form method="post" action="">
								<input type="submit" value="Supprimer" name="bouton" />
							</form>
				<?php
						}
					}
				}
				elseif(isset($_GET['act']))
				{
					if($_GET['act'] == 'add' && !isset($_GET['id']))
					{
						if(isset($_POST['bouton']))
						{
							echo '<small>Votre news a bien été ajoutée avec succès</small>';
						}
						else
						{
				?>
						<small>Vous allez ajouter une news.</small><br />
						<form method="post" action="">
						<label for="titre"><small>Titre de la news : </small></label><input type="text" name="titre" id="titre" size="15"/><br />
						<label for="corps"><small>Contenu de la news : </small></label><textarea name="corps" id="corps" cols="30" rows="10"></textarea><br />
						<div align="center"><input type="submit" value="Envoyer" name="bouton" /></div>
						</form>
				<?php
						}
					}
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