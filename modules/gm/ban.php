<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
if(!isset($_SESSION['connect']) || getSecurityLevel($_SESSION['id']) < $array_site['niveau_mj'])
{
	include('./modules/error.php');
}
include('./modules/gm/fonctions/ban.php');
if(!$array = $cache->get_cache('ban'))
{
	$html = '<table width="100%"><tr><th><small>Compte</small></th><th><small>Date de ban</small></th><th><small>Date de déban</small></th><th><small>Banni par</small></th><th><small>Raison</small></th></tr>';
	$fetch = getBan();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center">'.date('d-m-Y',$array2[1]).'</div></td><td><div align="center">'.date('d-m-Y',$array[2]).'</div></td><td><div align="center"><small>'.$array2[3].'</small></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td></tr>';
	}
	$html .= '</table>';
	$cache->create_cache('ban',$html);
}
elseif(!$cache->verifTime('ban'))
{
	$cache->destroy_cache('ban');
	$html = '<table width="100%"><tr><th><small>Compte</small></th><th><small>Date de ban</small></th><th><small>Date de déban</small></th><th><small>Banni par</small></th><th><small>Raison</small></th></tr>';
	$fetch = getBan();
	while($array2 = $fetch->fetch(PDO::FETCH_NUM))
	{
		$html.='<tr><td><div align="center"><small>'.$array2[0].'</small></div></td><td><div align="center">'.date('d-m-Y',$array2[1]).'</div></td><td><div align="center">'.date('d-m-Y',$array[2]).'</div></td><td><div align="center"><small>'.$array2[3].'</small></div></td><td><div align="center"><small>'.$array2[4].'</small></div></td></tr>';
	}
	$html .= '</table>';
	$cache->create_cache('ban',$html);
}
else
{
	$html = $cache->get_cache('ban');
}
include('./modules/gm/html/ban.php');
?>