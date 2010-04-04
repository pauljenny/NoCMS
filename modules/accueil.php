<?php
$retour = $db_site->query('SELECT * FROM news ORDER BY id DESC LIMIT 0,5') or die (mysql_error());
while ($donnees = $retour->fetch())
{
?>
<div class="story-top"><br/><br/><br/><br/><center><img src="images/text/annonce.png">	
</div>
<div class="story">

<!--En réalisation -->
<center>
<div class="titre"><b><?php echo $donnees['titre'] ?></b></div>
    <br><br><?php
    // On enlève les éventuels antislash PUIS on crée les entrées en HTML (<br />)
    $contenu = nl2br(stripslashes($donnees['contenu']));
    echo '<small>'.$contenu.'</small>';
    ?><br>
<div class="temps"><br><br><em>Le <?php echo date('d-m-Y',$donnees['timestamp']) ?> par <?php echo getNameByAuthor($donnees['auteur']);?></div>
</center>
</div>
<div class="story-bot"></div>

<?php
}
echo '<br /></td>';
include ('./inc/rightnavi.php');
?>
