<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page top_vote.php   //
/////////////////////////////////////////////////////
function getPlayers()
{
	global $db_realmd;
	try
	{									//	0		1		2		3		4
		$fetch = $db_realmd->query("SELECT c.username, v.points votes FROM account c LEFT JOIN votes v ON v.aid = c.id GROUP BY c.id ORDER BY votes DESC;");
	}
	catch(Exception $e)
	{
		exit($e->getMessage());
	}
	return $fetch;
}
?>