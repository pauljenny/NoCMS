<?php
//Si l'internaute est déjà connecté, inutile qu'il vienne sur cette page
if(isset($_SESSION['connect'])) 
{
	include('./modules/error.php');
}
else
{
	//On inclut les fonctions de la page
	include('./modules/compte/fonctions/inscription.php');

	if(isset($_POST['bouton']))
	{
		//On va vérifier qu'aucun champ est vide
		verifEmptyRow();
		//On va vérifier que le captcha est bon
		antispam_check();
		//On va maintenant vérifier les deux mots de passe
		verifMdp();
		//On va vérifier que l'adresse email rentré est correcte
		verifEmail();
		//On va vérifier que le nom d'utilisateur n'est pas déjà pris
		verifUser();	
		//On a fait tous les tests de vérification, on peut lancer la requête d'inscription
		inscription();
		$_SESSION['connect'] = true; // On active la variable de connexion
		$_SESSION['id'] = $db_realmd->lastInsertId();
	}
	else
	{
		//On génère le captcha
		$captcha = antispam_ins();
	}
	//On inclut maintenant le HTML de la page
	include('./modules/compte/html/inscription.php');

	//On n'inclut pas le menu de gauche car on utilise un autre type de vue
}
?>