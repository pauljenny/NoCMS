<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
if(!isset($_SESSION['connect']) || getSecurityLevel($_SESSION['id']) < $array_site['niveau_admin'])
{
	include('./modules/error.php');
}
else
{
	include('./modules/admin/fonctions/news.php');
	if(!isset($_GET['act']))
	{
		$fetch = array();
		$query = getNews();
		while($fetch[] = $query->fetch(PDO::FETCH_ASSOC));
	}
	elseif($_GET['act'] == 'modify' && isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$query = getNewsById($_GET['id']);
		$fetch = $query->fetch(PDO::FETCH_NUM);
			if(isset($_POST['bouton']))
			{
				traiterInfosMod($_GET['id']);
			}
	}
	elseif($_GET['act'] == 'delete' && isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$query = getNewsById($_GET['id']);
		$fetch = $query->fetch(PDO::FETCH_NUM);
		if(isset($_POST['bouton'])) deleteNews($_GET['id']);
	}
	elseif($_GET['act'] == 'add' && !isset($_GET['id']))
	{
		if(isset($_POST['bouton'])) addNews();
	}
	include('./modules/admin/html/news.php');
}
?>