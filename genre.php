<?php
//connexion à la bdd 
include("db.php");

//récupérer le genre choisi qui est présent dans l'url
//la commande strip_tags permet de supprimer les infos HTML pour se protéger des attaques XSS
if (!empty(strip_tags($_GET['g']))) {

    $genres = strip_tags($_GET['g']);

    //ma requête sql pour récupérerles films d'un seul genre
    //pour l'instant, on ne fait que stocker la requête dans une chaîne
    $sql = "SELECT * 
            FROM movies
            WHERE genres LIKE :genre 
            ORDER BY RAND()";

    //envoie ma requête SQL au serveur MySQL
    $stmt = $pdo->prepare($sql);

    //demande à MySQL d'exécuter ma requête 
    //(les données sont toujours là-bas !)
    $stmt->execute([":genre" => "%$genres%"]);

    //récupère les films depuis le serveur MySQL
    // ->fetch() pour récupérer une seule ligne ! 
    $movies = $stmt->fetchAll();
}

//pour débugger, pour voir si j'ai bien récupérer des films
//var_dump($movies);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinoa</title>
    <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <?php include("navigation/navigate.php"); ?>
    <!-- la commande (?=) permet de remplacer la balise php + echo ( short echo tag )
        -->
    <h2><?= htmlentities($genres) ?></h2>
    <section class="movies-list">

        <!-- affiche les 30 films -->
        <?php

        foreach ($movies as $movie) {
            echo '<a href="detail.php?id=' . $movie['id'] . '" title="' . $movie['title'] . '">';
            echo '<img src="img/posters/' . $movie['image'] . '" alt="' . $movie['title'] . '">';
            echo '</a>';
        }

        ?>

    </section>
</body>

</html>