<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/

include('./modules/interactif/fonctions/top_vote.php');

if(!$array = $cache->get_cache('top_vote'))
{
	$html = '<table width="100%"><tr><th>Nom</th><th>Points</th></tr>';
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td>';
		if($array2[1] == 0) $html .='<td><div align="center"><small>0</small></div></td>';
		else $html .='<td><div align="center"><small>'.$array2[1].'</small></div></td>';
	}
		$html .='</tr>';
	$html .= '</table>';
	$cache->create_cache('top_vote',$html);
}
elseif(!$cache->verifTime('top_vote'))
{
	$cache->destroy_cache('top_vote');
	$html = '<table width="100%"><tr><th>Nom</th><th>Points</th></tr>';
	$fetch = getPlayers();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td>';
		if($array2[1] == 0) $html .='<td><div align="center"><small>0</small></div></td>';
		else $html .='<td><div align="center"><small>'.$array2[1].'</small></div></td>';
	}
		$html .='</tr>';
	$html .= '</table>';
	$cache->create_cache('top_vote',$html);
}
else
{
	$html = $cache->get_cache('top_vote');
}
include('./modules/interactif/html/top_vote.php');
?>