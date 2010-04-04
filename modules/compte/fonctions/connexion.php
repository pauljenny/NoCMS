<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
/////////////////////////////////////////////////////
//	Liste des fonctions de la page inscription.php //
/////////////////////////////////////////////////////
global $db_realmd;
$prepare_auth = $db_realmd->prepare("SELECT `id` FROM `account` WHERE `username` = :name AND `sha_pass_hash` = :pass LIMIT 1");

function verif()
{
	$sha_pass = SHA1((strtoupper($_POST['utilisateur'])).':'.(strtoupper($_POST['pass'])));
	global $prepare_auth;
	try
	{
		$prepare_auth->execute(array(':name'=>$_POST['utilisateur'],':pass'=>$sha_pass));
	}
	catch(Exception $e)
	{
		die("<div align=\"center\"><font color=\"red\">Erreur lors de la requête pour l'authentification !<br />Erreur : ".$e->getMessage()."</font></div>");
	}
	if($prepare_auth->rowCount() <= 0) die("<div align=\"center\"><font color=\"red\">Le nom d'utilisateur ou le mot de passe est faux !</font></div>");
	$fetch = $prepare_auth->fetch(PDO::FETCH_NUM);
	return $fetch[0];
}
?>