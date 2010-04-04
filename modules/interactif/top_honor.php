<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

include('./modules/interactif/fonctions/top_honor.php');

if(!$array = $cache->get_cache('top_honor'))
{
	$html = '<table width="100%"><tr><th>Rang</th><th>Nom</th><th>Race</th><th>Classe</th><th>Honneur</th></tr>';
	$i = 1;
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><img src="./images/char/rank/rank'.$i.'.gif" alt="Rang" /></div></td><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center"><img src="./images/char/race/'.$array2[1].'-'.$array2[2].'.gif" alt="Race" /></div></td><td><div align="center"><img src="./images/char/class/'.$array2[3].'.gif" alt="Classe" /></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td></tr>';
		$i++;
	}
	$html .= '</table>';
	$cache->create_cache('top_honor',$html);
}
elseif(!$cache->verifTime('top_honor'))
{
	$cache->destroy_cache('top_honor');
	$html = '<table width="100%"><tr><th>Rang</th><th>Nom</th><th>Race</th><th>Classe</th><th>Honneur</th></tr>';
	$i = 1;
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><img src="./images/char/rank/rank'.$i.'.gif" alt="Rang" /></div></td><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center"><img src="./images/char/race/'.$array2[1].'-'.$array2[2].'.gif" alt="Race" /></div></td><td><div align="center"><img src="./images/char/class/'.$array2[3].'.gif" alt="Classe" /></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td></tr>';
		$i++;
	}
	$html .= '</table>';
	$cache->create_cache('top_honor',$html);
}
else
{
	$html = $cache->get_cache('top_honor');
}
include('./modules/interactif/html/top_honor.php');
?>