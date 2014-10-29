<?php header('Access-Control-Allow-Origin: *'); ?> //on autorise l'accès à cet affichage
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=edt', 'root', ''); //connexion à la base de données
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage()); //erreur si on n'arrive pas à se connecter
}

$reponse = $bdd->query('SELECT * FROM matiere'); //preparation et exécution de la requête pour afficher toutes les matières

$result = $reponse->fetchAll(PDO::FETCH_ASSOC); //on met tous les résultats dans $result à l'aide d'un curseur
$reponse->closeCursor();                        //on ferme le curseur

echo json_encode($result, JSON_PRETTY_PRINT);   //on retourne le résultat dans un tableau JSON

