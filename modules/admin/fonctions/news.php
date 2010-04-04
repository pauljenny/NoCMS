<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page news.php        //
/////////////////////////////////////////////////////
global $db_site;
$prepared_query_traitermod = $db_site->prepare("UPDATE `news` SET `titre` = ? , `contenu` = ? WHERE `id` = ?");
$prepare_query_add		   = $db_site->prepare("INSERT INTO `news` VALUES('',?,?,?,?)");
function getNews()
{
	global $db_site;
	$query = $db_site->query("SELECT * FROM `news` ORDER BY `id` DESC");
	return $query;
}
function getNewsById($id)
{
	global $db_site;
	$query = $db_site->query("SELECT `titre`,`contenu` FROM `news` WHERE `id` = '".$id."'");
	return $query;
}
function traiterInfosMod($id)
{
	if(empty($_POST['titre']) || empty($_POST['corps'])) exit("<font color=\"red\">Vous n'avez pas rempli tous les champs</font>");
	global $prepared_query_traitermod;
	$prepared_query_traitermod->execute(array($_POST['titre'],$_POST['corps'],$id));
}
function deleteNews($id)
{
	global $db_site;
	$db_site->query("DELETE FROM `news` WHERE `id` ='".$id."'");
}
function addNews()
{
	if(empty($_POST['titre']) || empty($_POST['corps'])) exit("<font color=\"red\">Vous n'avez pas rempli tous les champs</font>");
	global $prepare_query_add;
	$prepare_query_add->execute(array($_POST['titre'],$_POST['corps'],time(),$_SESSION['id']));
}
?>