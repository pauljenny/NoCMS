<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page ban.php         //
/////////////////////////////////////////////////////
function getBan()
{
	global $db_realmd;
	$query = $db_realmd->query("SELECT * FROM `account_banned` WHERE `active` = '1'");
	return $query;
}
	
?>