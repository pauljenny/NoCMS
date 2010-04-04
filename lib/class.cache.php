<?php
class systemCache
{
// met en cache une variable
	public function create_cache($nom_cache, $contenu)
	{
        // échappement les caractères spéciaux pour pouvoir mettre le tout entre quotes dans le futur fichier
        $contenu = str_replace('"','\"', $contenu);

        // création du code php à stocker dans le fichier    
			$contenu = '<?php $cache = "'.$contenu.'"; ?>';
        // écriture du code dans le fichier
        $fichier = fopen('./cache/' . $nom_cache . '.cache', 'w');
        $resultat = fwrite($fichier, $contenu);
        fclose($fichier);

        // renvoie true si l'écriture du fichier a réussi
        return $resultat;
	}
	// récupère une variable mise en cache
	public function get_cache($nom_cache)
	{
        // vérifie que le fichier de cache existe
        if(is_file('./cache/'.$nom_cache.'.cache'))
        {
                // le fichier existe, on l'exécute puis on retourne le contenu de $cache
                include('./cache/' . $nom_cache . '.cache');
                return $cache;
        }
        else
        {
                // le fichier de cache n'existe pas, on retourne false
                return false;
        }
	}
	// détruit un cache
	public function destroy_cache($nom_cache)
	{
        return @unlink('./cache/' . $nom_cache . '.cache');
	}
	public function verifTime($nom_cache)
	{
		return (filemtime('./cache/'.$nom_cache.'.cache') > (time()-1800)) ? true : false;
	}
};
?>
