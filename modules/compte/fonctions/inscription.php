<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
$prepare_verif_user = $db_realmd->prepare("SELECT `id` FROM `account` WHERE `username` = ? LIMIT 1");
$prepare_inscription_user = $db_realmd->prepare("INSERT INTO `account`(`id`,`username`,`sha_pass_hash`,`email`,`expansion`) VALUES('',:username,:pass,:email,:extension)");
/////////////////////////////////////////////////////
//	Liste des fonctions de la page inscription.php //
/////////////////////////////////////////////////////
function verifEmptyRow()
{
	if(empty($_POST['utilisateur']) || empty($_POST['pass']) || empty($_POST['pass2']) || empty($_POST['email']) || empty($_POST['version']) || empty($_POST['asa'])) die("<div align=\"center\"><font color=\"red\">Vous n'avez pas rempli tous les champs !</font></div>");
}
function verifEmail()
{
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { die("<div align=\"center\"><font color=\"red\">L'adresse email rentré n'a pas le bon format !</font></div>"); }
}
function verifMdp()
{
	if($_POST['pass'] != $_POST['pass2']) { die("<div align=\"center\"><font color=\"red\">Vous n'avez pas rentré de mots de passe identiques !</font></div>"); }
}
function verifUser()
{
	global $prepare_verif_user;
	try
	{
		$prepare_verif_user->execute(array($_POST['utilisateur']));
		if($prepare_verif_user->rowCount() > '0') { die("<div align=\"center\"><font color=\"red\">Le nom d'utilisateur entré est déjà pris !<br />Veuillez en choisir un autre !</font></div>"); }
	}
	catch(Exception $e)
	{
		die("<div align=\"center\"><font color=\"red\">Erreur lors de la requête de vérification de l'utilisateur<br />Message d'erreur : ".$e->getMessage()."</font></div>");
	}
}

/*
	Script antispam créé le 2 novembre 2006 par Byc
	http://www.ovidea.com/
	All Rights Reserved
*/
function antispam_check()
{
	if((isset($_POST["asa"]) && isset($_POST["asb"])) || (isset($_GET["asa"]) && isset($_GET["asb"])))
	{
		if(isset($_POST["asa"]))
		{
			$asa = $_POST["asa"];
			$asb = $_POST["asb"];
		}
		else
		{
			$asa = $_GET["asa"];
			$asb = $_GET["asb"];
		}
		
		$asc = explode("_", $asb);
		
		if(((($asc[0] + $asc[2]) == $asa && $asc[1] == 0) || (($asc[0] - $asc[2]) == $asa && $asc[1] == 1)) && strlen($asa) != 0)
		{
			return true;
		}
		else
		{
			return exit("<div align=\"center\"><font color=\"red\">Le captcha rentré est faux ! </font></div>");
		}
	}
	else
	{
		return exit("<div align=\"center\"><font color=\"red\">Le captcha rentré est faux ! </font></div>");;
	}
}

function antispam_ins()
{	
	$operateur = array("+", "-");
	$alpha = rand(1, 10);
	$op = rand(0, 1);
	$beta = rand(1, 10);
	return $alpha."&nbsp;".$operateur[$op]."&nbsp;".$beta."&nbsp;&nbsp;<br /><input type='hidden' name='asb' value='".$alpha."_".$op."_".$beta."' />";
}


function inscription()
{
	global $prepare_inscription_user;
	try
	{
		$sha_pass = SHA1((strtoupper($_POST['utilisateur'])).':'.(strtoupper($_POST['pass'])));
		$prepare_inscription_user->execute(array(':username'=>$_POST['utilisateur'],':pass'=>$sha_pass,':email'=>$_POST['email'],':extension'=>$_POST['version']));
	}
	catch(Extension $e)
	{
		die("<div align=\"center\"><font color=\"red\">Erreur lors de la requête pour l'inscription !<br />Message d'erreur : ".$e->getMessage()."</font></div>");
	}	
}
?>