<!-- /**
* Project Name: FrozenBlade V2 Enhanced"
* Date: 25.07.2008 inital version
* Coded by: Furt
* Template by: Kitten - wowps forums
* Email: *****
* License: GNU General Public License (GPL)
* Traduit par NoCMS
  */ -->
<td width="144" valign="top"><div id="links"><font class="style9">


<div class="menu"></div>
	
	
		<!-- Lien du menu -->
	
				<li><a href="index.php">Accueil</a></li><br/><br/>
				<li><a href="index.php?mod=menu_howto">Guide de connexion</a></li><br/><br/>

	
		<!-- --------- -->
		
			
<div class="account"></div>
	 
		
		<!-- Lien du compte-->
				<li><a href="index.php?mod=compte_gerer">Gérer le compte</a></li><br/><br/>
				<li><a href="index.php?mod=compte_connexion&act=disconnect">Déconnexion</a></li><br/><br/>
		
		<!-- --------- -->		
		
			
<div class="interactif"></div>
				
		
		<!-- Lien de la boutique -->
			
				<li><a href="index.php?mod=interactif_player_online">Les personnages en ligne</a></li><br/><br/>
				<li><a href="index.php?mod=interactif_top_honor">Top Honneur</a></li><br/><br/>
				<li><a href="index.php?mod=interactif_top_vote">Top des voteurs</a></li><br/><br/>

<?php
if(getSecurityLevel($_SESSION['id']) >= $array_site['niveau_mj'])
{
	echo '<div class="mj"></div>';
	echo '<li><a href="index.php?mod=gm_ban">Voir les bannissements</a></li>';
}
if(getSecurityLevel($_SESSION['id']) >= $array_site['niveau_admin'])
{
	echo '<div class="admin"></div>';
	echo '<li><a href="index.php?mod=admin_news">Administration des news</a></li>';

}
?>
		<!-- --------- -->
			
		
		<!-- --------- -->	
</font></div><br/></td>
<td width="420" valign="top">
