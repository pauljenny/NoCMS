<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page unstuck.php		//
/////////////////////////////////////////////////////
function getAccountPlayers()
{
	global $db_characters;
	$id = $_SESSION['id'];
	$perso = array();
	$query = $db_characters->query("SELECT `guid`,`name` FROM `characters` WHERE `account` = '".$id."' LIMIT 8");
	while($data = $query->fetch(PDO::FETCH_NUM))
	{
		$perso[] = $data;
	}
	return $perso;
}
function teleHome()
{
	global $db_characters;
	$guid = $_POST['perso'];
	$query = $db_characters->query("SELECT `map`,`zone`,`position_x`,`position_y`,`position_z` FROM `character_homebind` WHERE `guid` = '".$guid."' LIMIT 1");
	$fetch = $query->fetch(PDO::FETCH_NUM);
	$query2 = $db_characters->query("UPDATE `characters` SET `map` = '".$fetch[0]."',`zone` = '".$fetch[1]."',`position_x` = '".$fetch[2]."',`position_y` = '".$fetch[3]."',`position_z` = '".$fetch[4]."' WHERE `guid` = '".$guid."'");
}
?>