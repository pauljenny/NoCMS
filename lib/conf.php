<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
$array_db = array(
							"hote"		=> "127.0.0.1",			// Hôte MySQL
							"port"		=> "3306",				// Port MySQL
							"user"		=> "test",				// Nom d'utilisateur MySQL
							"pass"		=> "test",				// Mot de passe de l'utilisateur MySQL
							"mangos"	=> "mangos",			// Nom de la base de données du monde
							"characters"=> "characters",		// Nom de la base de données des personnages
							"realmd"	=> "realmd",			// Nom de la base de données des comptes
							"site"		=> "nocms",				// Nom de la base de données du site
						);
$array_site	=	array(
							"nom"			=> "NoCMS",
							"lien_forum"	=> "http://nextgenemu.fr",// Lien vers le forum de votre serveur
							"realmlist"		=> "127.0.0.1",			// Realmlist de votre serveur (sans le port)
							"players_max"	=> "200",				// Nombre de joueurs maximum sur votre serveur
							"smtp"			=> "localhost",			// Adresse de votre serveur SMTP pour Windows seulement !
							"smtp_port"		=> "25",				// Port de votre serveur SMTP pour Windows seulement !
							"email"			=> "polo455@hotmail.fr", //Adresse email indiqué lors de l'envoi d'un email
							"point_par_vote"=> "3",					// Points par vote
							"niveau_admin"  => "3",					// Niveau de sécurité minimum pour accéder à la partie administration du site
							"niveau_mj"		=> "2",					// Niveau de sécurité minimum pour accéder à la partie maître du jeu du site
					);
$array_serveur = array(
							"version"		=> "3.3.3a",			//Version du serveur
						);
						
/* Configuration des votes 
Vous pouvez rajouter d'autres sites de vote en ajoutant une ligne comme celles ci-dessous puis en continuant les site_1 , site_2 ,etc
Cela correspond aux codes que les sites de vote vous donnent */
$array_vote = array(
							"site_1"		=> '<a href="http://nextgenemu.fr"><img src="http://www.gowonda.com/vote.gif" alt="GoWonda"/></a>',
							"site_2"		=> '<a href="http://nextgenemu.fr"><img src="http://www.rpg-paradize.com/vote.gif" alt="Rpg Paradize"/></a>',
					);
						
?>