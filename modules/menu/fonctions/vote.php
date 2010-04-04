<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
//////////////////////////////////////////////
///		Fonctions de la page vote.php		//
//////////////////////////////////////////////
global $db_realmd;
$prepare_query_traiter1 = $db_realmd->prepare("SELECT `id` FROM `account` WHERE `username` = ? LIMIT 1");
function traiterInfos1()
{
	if(!isset($_POST['compte']) || empty($_POST['compte'])) { exit ("<font color=\"red\">Vous n'avez pas indiqué de nom de compte !</font>"); return false;}
	global $prepare_query_traiter1;
	$prepare_query_traiter1->execute(array($_POST['compte']));
	if($prepare_query_traiter1->rowCount() <= '0') { exit("<font color=\"red\">Vous avez indiqué un compte qui n'existe pas !</font>"); return false;}
	$fetch = $prepare_query_traiter1->fetch(PDO::FETCH_NUM);
	return $fetch[0];
}
function addPoints($id)
{
	global $db_realmd;
	try
	{
		$query = $db_realmd->query("SELECT `points` FROM `votes` WHERE `aid` = '".$id."' LIMIT 1");
	}
	catch(Exception $e)
	{
		exit($e->getMessage());
	}
	$fetch = $query->fetch(PDO::FETCH_NUM);
	global $array_site;
	if(!$fetch || $fetch[0] <= '0') { $db_realmd->query("INSERT INTO `votes` VALUES ('".$id."','".$array_site['point_par_vote']."','".time()."')"); }
	else 
	{
		$points = $fetch[0] + $array_site['point_par_vote'];
		$db_realmd->query("UPDATE `votes` SET `points` = '".$points."',`date_vote` = '".time()."' WHERE `aid` = '".$id."'");
	}
}
?>