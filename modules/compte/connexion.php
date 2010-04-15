<?php
//Si l'internaute est déjà connecté et que la variable pour activer la déconnexion, inutile qu'il vienne sur cette page
if(isset($_SESSION['connect'])) 
{
	if(isset($_GET['act']) && $_GET['act'] == 'disconnect')
	{
		$_SESSION = array();
		session_destroy();
		include('./modules/compte/html/deconnexion.php');
	}
	else
	{
		include('./modules/error.php');
	}
}
elseif(!isset($_SESSION['connect']))
{
	if(!isset($_GET['act']))
	{
		include('./modules/compte/fonctions/connexion.php');
		if(isset($_POST['bouton']))
		{
			$_SESSION['id'] = verif();
			$_SESSION['connect'] = true;
			header("Location: index.php?mod=compte_gerer");
		}
		else
		{
		//On inclut les fonctions
		//On inclut le HTML (la vue)
		include('./modules/compte/html/connexion.php');
		//On inclut le menu de droite car on utilise le menu de base
		include('./inc/rightnavi.php');
		}
	}
	else
	{
		//On va inclure la page d'erreur car tout est faux
		include('./modules/error.php');
	}
}
?>