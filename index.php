<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
session_start();
$temps_debut = microtime(true);
include('lib/class.cache.php');
//On va créer le système de cache
$cache = new systemCache();

include('lib/conf.php');
include('lib/fonctions.php');
try
{
	$db_characters = new PDO('mysql:host='.$array_db['hote'].';port='.$array_db['port'].';dbname='.$array_db['characters'], $array_db['user'], $array_db['pass']);
	$db_realmd = new PDO('mysql:host='.$array_db['hote'].';port='.$array_db['port'].';dbname='.$array_db['realmd'], $array_db['user'], $array_db['pass']);
	$db_mangos = new PDO('mysql:host='.$array_db['hote'].';port='.$array_db['port'].';dbname='.$array_db['mangos'], $array_db['user'], $array_db['pass']);
	$db_site = new PDO('mysql:host='.$array_db['hote'].';port='.$array_db['port'].';dbname='.$array_db['site'], $array_db['user'], $array_db['pass']);
}
catch(Exception $e)
{
	die("<font color=\"red\">Erreur lors de l'accès aux bases de données !<br />Message d'erreur : ".$e->getMessage()."</font>");
}
include('inc/header.php');
if(isset($_SESSION['connect']) && verifTimeVote($_SESSION['id']) || !isset($_SESSION['connect'])){
	echo('<a href="index.php?mod=menu_vote"><img style="position: absolute; left: 10px; top: 200px" src="./images/temp/votez.png" alt="Votez"></a>');
}
if(isset($_SESSION['connect'])) 
	include('./inc/user.php');
else include ('./inc/guest.php');
if(isset($_GET['mod']))
{
		$explode = explode('_',(htmlentities($_GET['mod'])),2);
		if(isset($explode[0]) && @!empty($explode[0])) { $url = './modules/'.$explode[0].'/'; }
		if(isset($explode[1]) && @!empty($explode[1])) { $url .= $explode[1].'.php'; }
		if(file_exists($url)) include ($url);
		else include ('./modules/error.php');
}
else include ('./modules/accueil.php');
include('./inc/footer.php');

unset ($db_characters);
unset ($db_realmd);
unset ($db_mangos);

$temps_fin = microtime(true);
echo '<br /><font class="style30">Temps d\'execution : '.round($temps_fin - $temps_debut, 4).' sec</font>';
?>
