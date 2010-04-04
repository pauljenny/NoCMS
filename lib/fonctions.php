<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

////////////////////////////////////////
////	Fonctions globales du site	////
////////////////////////////////////////
function getRealmlist()
{
	global $db_realmd;
	try
	{
		$realmlist = $db_realmd->query("SELECT `address`,`port` FROM `realmlist` WHERE `id` = '1' LIMIT 1");
	}
	catch(Exception $e)
	{
		die("Erreur lors de la recherche du realmlist !<br />Message d'erreur : ".$e->getMessage()."");
		return false;
	}
	$result = $realmlist->fetch(PDO::FETCH_NUM);
	$resultt = $result[0].':'.$result[1];
	return $resultt;
}
function getPlayersOnline()
{
	global $db_characters,$array_site;
	$player = $db_characters->query("SELECT * FROM `characters` WHERE `online` = '1'");
	$pourcent = ( 100 / $array_site['players_max']) * $player->rowCount(); 
	$array_player = array("nbr" => $player->rowCount(),"pourcent" => $pourcent);
	return $array_player; 
}
function getSecurityLevel($id)
{
	global $db_realmd;
	$query = $db_realmd->query("SELECT `gmlevel` FROM `account` WHERE `id` = '".$id."' LIMIT 1");
	$fetch = $query->fetch(PDO::FETCH_NUM);
	return $fetch[0];
}
function verifTimeVote($id)
{
	global $db_realmd;
	$query = $db_realmd->query("SELECT `date_vote` FROM `votes` WHERE `aid` = '".$id."'");
	$fetch = $query->fetch(PDO::FETCH_NUM);
	if(!$fetch) return true;
	elseif($fetch[0] + 7200 > time()) return false; // 7200 secondes = 2 heures
	else return true;
}
function getNameByAuthor($id)
{
	global $db_realmd;
	$query = $db_realmd->query("SELECT `username` FROM `account` WHERE `id` = '".$id."' LIMIT 1");
	$fetch = $query->fetch(PDO::FETCH_NUM);
	return $fetch[0];
}
?>