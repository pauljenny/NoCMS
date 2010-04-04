<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page modify.php	   //
/////////////////////////////////////////////////////
global $db_realmd;
$prepare_query_mdp = $db_realmd->prepare("UPDATE `account` SET `sha_pass_hash` = ? WHERE `id` = ?");
$prepare_query_email = $db_realmd->prepare("UPDATE `account` SET `email` = ? WHERE `id` = ?");

function getEmail()
{
	global $db_realmd;
	$id = $_SESSION['id'];
	$query = $db_realmd->query("SELECT `email` FROM `account` WHERE `id` = '".$id."' LIMIT 1");
	$fetch = $query->fetch(PDO::FETCH_NUM);
	return $fetch[0];
}
function traiter()
{
	global $db_realmd;
	$id = $_SESSION['id'];
	if(empty($_POST['email']))
		die("Vous n'avez pas rentré d'adresse email !");
	
	$email = $_POST['email'];
	if(!empty($_POST['mdp']))
	{
		$mdp = $_POST['mdp'];
		$query = $db_realmd->query("SELECT `username` FROM `account` WHERE `id` = '".$id."' LIMIT 1");
		$fetch = $query->fetch(PDO::FETCH_NUM);
		$sha_pass = sha1((strtoupper($fetch[0])).':'.(strtoupper($mdp)));
		try
		{
			global $prepare_query_mdp;
			$prepare_query_mdp->execute(array($sha_pass,$id));
		}
		catch(Exception $e)
		{
			die("Erreur lors de la requête du mot de passe <br/>Erreur à communiquer : ".$e->getMessage());
		}
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { die("<div align=\"center\"><font color=\"red\">L'adresse email rentré n'a pas le bon format !</font></div>"); }
	if($email != getEmail())
	{
		global $prepare_query_email;
		$prepare_query_email->execute(array($email,$id));
	}
	return true;
}
?>