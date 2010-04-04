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
	include('./modules/compte/fonctions/modify.php');
	$email_actuel = getEmail();
	if(isset($_POST['bouton']))
	{
		traiter();
	}
	include('./modules/compte/html/modify.php');
}
?>