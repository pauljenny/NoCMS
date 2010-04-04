<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
if(isset($_SESSION['connect']) && !verifTimeVote($_SESSION['id'])){ exit ("Vous avez déjà voté il y a moins de 2 heures");}
include('./modules/menu/fonctions/vote.php');
if(isset($_POST['bouton']) && !isset($_SESSION['connect'])) 
{
	$id = traiterInfos1();
	addPoints($id);
}
elseif(isset($_SESSION['connect']))
{
	addPoints($_SESSION['id']);
}
include('./modules/menu/html/vote.php');

include('./inc/rightnavi.php');
?>