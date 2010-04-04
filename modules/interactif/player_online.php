<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
include('./modules/interactif/fonctions/player_online.php');
if(!$array = $cache->get_cache('player_online'))
{
	$html = '<table width="100%"><tr><th>Nom</th><th>Race</th><th>Classe</th><th>Niveau</th><th>Localisation</th></tr>';
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center"><img src="./images/char/race/'.$array2[1].'-'.$array2[2].'.gif" alt="Race" /></div></td><td><div align="center"><img src="./images/char/class/'.$array2[3].'.gif" alt="Classe" /></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td><td><div align="center"><small>'.$array_zone[$array2[5]].'</small></div></td></tr>';
	}
	$html .= '</table>';
	$cache->create_cache('player_online',$html);
}
elseif(!$cache->verifTime('player_online'))
{
	$cache->destroy_cache('player_online');
	$html = '<table width="100%"><tr><th>Nom</th><th>Race</th><th>Classe</th><th>Niveau</th><th>Localisation</th></tr>';
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center"><img src="./images/char/race/'.$array2[1].'-'.$array2[2].'.gif" alt="Race" /></div></td><td><div align="center"><img src="./images/char/class/'.$array2[3].'.gif" alt="Classe" /></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td><td><div align="center"><small>'.$array_zone[$array2[5]].'</small></div></td></tr>';
	}
	$html .= '</table>';
	$cache->create_cache('player_online',$html);
}
else
{
	$html = $cache->get_cache('player_online');
}
include('./modules/interactif/html/player_online.php');
?>