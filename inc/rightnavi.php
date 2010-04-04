<!-- /**
* Project Name: FrozenBlade V2 Enhanced"
* Date: 25.07.2008 inital version
* Coded by: Furt
* Template by: Kitten - wowps forums
* Email: *****
* License: GNU General Public License (GPL)
* Traduit par NoCMS
  */ -->

<td width="144" valign="top">

<div class="stats"></div><font class="style30"><center>


			<!-- Serveur en ligne / hors ligne  -->

					<?php    

					
							if (!$sock = @fsockopen($config['ip'], $config['port'], $num, $error, 5))
								echo "Statut : <b><font color=\"red\">Hors ligne</font></b>";
							else{
								echo "Statut : <b><font color=\"green\">En ligne</font></b>";
								fclose($sock);
								}      
            		?>



</center>
&nbsp;				Realmlist: <b><?php echo getRealmlist();?></b>
</center><br/>

</font></td>