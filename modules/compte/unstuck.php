<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
if(!isset($_SESSION['connect']))
{
	include('./modules/error.php');
}
else
{
	include('./modules/compte/fonctions/unstuck.php');
	if(isset($_POST['bouton']))
	{
		teleHome();
	}
	else
	{
	$persos = getAccountPlayers();
	}
	include('./modules/compte/html/unstuck.php');
}
?>