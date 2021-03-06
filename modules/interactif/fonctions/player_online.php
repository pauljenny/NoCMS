<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'�mulateur Mangos      */
/*            	Bas� sur le kit graphique de Frozen Blade Enhanced          */
/*           				Cod� par Polo                                   */
/****************************************************************************/

/////////////////////////////////////////////////////
//	Liste des fonctions de la page player_online.php   //
/////////////////////////////////////////////////////
function getPlayers()
{
	global $db_characters;				//	0		1		2		3		4		5
	$fetch = $db_characters->query("SELECT `name`,`race`,`gender`,`class`,`level`,`zone` FROM `characters` WHERE `online` = '1' ORDER BY `name` DESC LIMIT 10");
	return $fetch;
}
$array_zone = array(
'1' => 'Dun Morogh',
'3' => 'Terres ingrates',
'4' => 'Terres foudroy�es',
'8' => 'Marais des Chagrins',
'10' => 'Bois de la P�nombre',
'11' => 'Les Paluns',
'12' => 'For�t d\'Elwynn',
'14' => 'Durotar',
'15' => 'Mar�cage d\'�prefange',
'16' => 'Azshara',
'17' => 'Les Tarides',
'19' => 'Zul\'Gurub',
'25' => 'Mont Rochenoire',
'28' => 'Maleterres de l\'ouest',
'33' => 'Vall�e de Strangleronce',
'36' => 'Montagnes d\'Alterac',
'38' => 'Loch Modan',
'40' => 'Marche de l\'Ouest',
'41' => 'D�fil� de Deuillevent',
'44' => 'Les Carmines',
'45' => 'Hautes-terres d\'Arathi',
'46' => 'Steppes ardentes',
'47' => 'Les Hinterlands',
'51' => 'Gorge des Vents br�lants',
'65' => 'D�solation des dragons',
'66' => 'Zul\'Drak',
'67' => 'Les pics Foudroy�s',
'85' => 'Clairi�res de Tirisfal',
'130' => 'For�t des Pins argent�s',
'133' => 'Gnomeregan',
'139' => 'Maleterres de l\'est',
'141' => 'Teldrassil',
'148' => 'Sombrivage',
'206' => 'Donjon d\'Utgarde',
'209' => 'Donjon d\'Ombrecroc',
'210' => 'La Couronne de glace',
'215' => 'Mulgore',
'267' => 'Contreforts de Hautebrande',
'331' => 'Orneval',
'357' => 'F�ralas',
'361' => 'Gangrebois',
'394' => 'Les Grisonnes',
'400' => 'Mille pointes',
'405' => 'D�solace',
'406' => 'Les Serres-Rocheuses',
'440' => 'Tanaris',
'457' => 'La Mer voil�e',
'490' => 'Crat�re d\'Un\'Goro',
'491' => 'Kraal de Tranchebauge',
'493' => 'Reflet-de-Lune',
'495' => 'Fjord Hurlant',
'618' => 'Berceau de l\'Hiver',
'717' => 'La Prison',
'718' => 'Cavernes des lamentations',
'719' => 'Profondeurs de Brassenoire',
'722' => 'Souilles de Tranchebauge',
'796' => 'Monast�re �carlate',
'978' => 'Zul\'Farrak',
'1196' => 'Cime d\'Utgarde',
'1337' => 'Uldaman',
'1377' => 'Silithus',
'1417' => 'Temple englouti',
'1497' => 'Fossoyeuse',
'1519' => 'Hurlevent',
'1537' => 'Forgefer',
'1581' => 'Les Mortemines',
'1583' => 'Pic Rochenoire',
'1584' => 'Profondeurs de Rochenoire',
'1637' => 'Orgrimmar',
'1638' => 'Les Pitons du Tonnerre',
'1657' => 'Darnassus',
'2017' => 'Stratholme',
'2057' => 'Scholomance',
'2100' => 'Maraudon',
'2159' => 'Repaire d\'Onyxia',
'2257' => 'Tram des profondeurs',
'2366' => 'Le Noir Mar�cage',
'2367' => 'Contreforts de Hautebrande d\'antan',
'2437' => 'Gouffre de Ragefeu',
'2557' => 'Hache-tripes',
'2562' => 'Karazhan',
'2597' => 'Vall�e d\'Alterac',
'2677' => 'Repaire de l\'Aile noire',
'2717' => 'Coeur du Magma',
'2817' => 'For�t du Chant de cristal',
'3277' => 'Goulet des Chanteguerres',
'3358' => 'Bassin d\'Arathi',
'3428' => 'Temple d\'Ahn\'Qiraj',
'3429' => 'Ruines d\'Ahn\'Qiraj',
'3430' => 'Bois des Chants �ternels',
'3433' => 'Les Terres fant�mes',
'3456' => 'Naxxramas',
'3477' => 'Azjol-N�rub',
'3483' => 'P�ninsule des Flammes infernales',
'3487' => 'Lune-d\'argent',
'3518' => 'Nagrand',
'3519' => 'For�t de Terokkar',
'3520' => 'Vall�e d\'Ombrelune',
'3521' => 'Mar�cage de Zangar',
'3522' => 'Les Tranchantes',
'3523' => 'Raz-de-N�ant',
'3524' => '�le de Brume-azur',
'3525' => '�le de Brume-sang',
'3537' => 'Toundra Bor�enne',
'3557' => 'L\'Exodar',
'3562' => 'Remparts des Flammes infernales',
'3606' => 'Sommet d\'Hyjal',
'3607' => 'Caverne du sanctuaire du Serpent',
'3618' => 'Repaire de Gruul',
'3698' => 'Ar�ne de Nagrand',
'3702' => 'Ar�ne des Tranchantes',
'3703' => 'Shattrath',
'3711' => 'Bassin de Sholazar',
'3713' => 'La Fournaise du sang',
'3714' => 'Les Salles bris�es',
'3715' => 'Le Caveau de la vapeur',
'3716' => 'La Basse-tourbi�re',
'3717' => 'Les enclos aux esclaves',
'3789' => 'Labyrinthe des ombres',
'3790' => 'Cryptes Auchena�',
'3791' => 'Les salles des Sethekk',
'3792' => 'Tombes-mana',
'3805' => 'Zul\'Aman',
'3820' => 'L\'?il du cyclone',
'3836' => 'Le repaire de Magtheridon',
'3842' => 'L\'Oeil',
'3846' => 'L\'Arcatraz',
'3847' => 'La Botanica',
'3849' => 'Le M�chanar',
'3959' => 'Temple noir',
'3968' => 'Ruines de Lordaeron',
'4075' => 'Plateau du Puits de soleil',
'4080' => '�le de Quel\'Danas',
'4095' => 'Terrasse des Magist�res',
'4100' => 'L\'�puration de Stratholme',
'4120' => 'Le Nexus',
'4196' => 'Donjon de Drak\'Tharon',
'4197' => 'Joug-d\'hiver',
'4228' => 'L\'Oculus',
'4264' => 'Les salles de Pierre',
'4272' => 'Les salles de Foudre',
'4273' => 'Ulduar',
'4298' => 'Maleterres : l\'enclave �carlate',
'4375' => 'Gundrak',
'4378' => 'Ar�ne de Dalaran',
'4384' => 'Rivage des Anciens',
'4395' => 'Dalaran',
'4406' => 'L\'Ar�ne des valeureux',
'4415' => 'Le fort Pourpre',
'4493' => 'Le sanctum Obsidien',
'4494' => 'Ahn\'kahet : l\'Ancien royaume',
'4500' => 'L\'?il de l\'�ternit�',
'4603' => 'Caveau d\'Archavon',
'4710' => '�le des Conqu�rants',
'4722' => 'L\'�preuve du crois�',
'4723' => 'L\'�preuve du champion',
'4742' => 'Accostage de Hrothgar',
'4809' => 'La Forge des �mes',
'4812' => 'Citadelle de la Couronne de glace',
'4813' => 'Fosse de Saron',
'4820' => 'Salles des Reflets',
);
?>
