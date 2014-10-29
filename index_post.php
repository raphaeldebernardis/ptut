<?php
    try {                                                                       //on se connecte à la base de données
        $bdd = new PDO('mysql:host=localhost;dbname=edt', 'root', '');          //PDO('mysql:host="nom_hôte";dbname="nom_database"', 'user', 'password');
    } catch (Exception $e) {                                                   
        die('Erreur');                                                         //si on n'arrive pas à se connecter message d'erreur
    }

    $req = $bdd->prepare('INSERT INTO matiere(id_mat, nom_mat) VALUES(?,?)');  //$req contient la requête 
    $req->execute(array($_POST['id_mat'], $_POST['nom_mat']));		        //on exécute $req et on range dans les cases du tableau
    header ("Refresh: 1.5;URL=index.html");			               //on est redirigé sur la page d'administration des matières au bout de 1.5 sec
    echo 'Mati&egrave;re ajout&eacute;e avec succ&egrave;s !';                 //on affiche un message de réussite d'ajout
