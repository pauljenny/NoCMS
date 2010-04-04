<?php
/****************************************************************************/
/*             NoCMS est un projet de site web pour l'émulateur Mangos      */
/*            	Basé sur le kit graphique de Frozen Blade Enhanced          */
/*           				Codé par Polo                                   */
/****************************************************************************/
if(isset($_SESSION['connect'])) // Inutile d'accepter un internaute déjà connecté
{
	include('./modules/error.php');
}
else
{
	include('./modules/compte/fonctions/reset_mdp.php');

	if(isset($_POST['bouton']))
	{
		//On vérifie qu'aucun champ n'est vide
		verifEmptyRow();
		//On vérifie que les informations sont vraies
		verifInfos();
		//Tout est bon, on lance l'email,etc
		insert();
	}
	include('./modules/compte/html/reset_mdp.php');
	include('./inc/rightnavi.php');
}