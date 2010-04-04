<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page reset_mdp.php //
/////////////////////////////////////////////////////
global $db_realmd;
$prepare_query_infos1 = $db_realmd->prepare("SELECT `id` FROM `account` WHERE `username` = :name AND `email` = :email LIMIT 1");
$prepare_query_insert = $db_realmd->prepare("UPDATE `account` SET `sha_pass_hash` = :pass WHERE `username`  = :name");
function verifEmptyRow()
{
	if(empty($_POST['user']) || empty($_POST['email'])) exit("<div align=\"center\"><font color=\"red\">Vous n'avez pas rempli tous les champs !</font></div>");
}
function verifInfos()
{
	global $prepare_query_infos1;
	try
	{
		$prepare_query_infos1->execute(array(":name"=>$_POST['user'],":email"=>$_POST['email']));
	}
	catch(Exception $e)
	{
		exit("<div align=\"center\"><font color=\"red\">Erreur lors de la requête pour la vérification des informations!<br />Message d'erreur : ".$e->getMessage()."</font></div>");
	}
	if($prepare_query_infos1->rowCount() <= 0) exit("<div align=\"center\"><font color=\"red\">Les informations entrées ne sont pas correctes !</font></div>");
}
function insert()
{
	global $prepare_query_insert;
	$pass = generatePassword();
	$sha_pass = SHA1((strtoupper($_POST['user'])).':'.(strtoupper($pass)));
	try
	{
		$prepare_query_insert->execute(array(':pass'=>$sha_pass,':name'=>$_POST['user']));
	}
	catch(Exception $e)
	{
		exit("<div align=\"center\"><font color=\"red\">Erreur lors de la requête pour la mise à jour !<br />Message d'erreur : ".$e->getMessage()."</font></div>");
	}
	
	$sujet = "Votre nouveau mot de passe";
	$corps = "Bonjour,\n,Suite à votre demande de réinitialisation de mot de passe,\nNous vous fournissons votre nouveau mot de passe :\n ".$pass." \nSi vous n'avez jamais demandé une réinitialisation de mot de passe, veuillez nous contacter au plus vite !\nCordialement,l'équipe du serveur.";
	global $array_site;
	$headers = "From: ".$array_site['email'];
	ini_set('SMTP',$array_site['smtp']);
	ini_set('smtp_port',$array_site['smtp_port']);
	
	if(mail($_POST['email'],$sujet,$corps,$headers))
	{
		return true;
	}
	else
	{
		exit("<div align=\"center\"><font color=\"red\">Erreur lors de l'envoi de l'email. Veuillez contacter l'administrateur</font></div>");
	}
}
function generatePassword($length=10,$level=2){

   list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

// Characters to allow within this Generator
   $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
   $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }
   }
// report messege output of the password to the website using the $error msg style.
//   return $error = '$password';
    return $password;
}
?>