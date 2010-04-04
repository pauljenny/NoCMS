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
//On inclut les fonctions de la page
include('./modules/compte/fonctions/gerer.php');

//On inclut maintenant le HTML de la page
include('./modules/compte/html/gerer.php');

include('./inc/rightnavi.php');
}
?>