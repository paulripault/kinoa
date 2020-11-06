<?php

//récupère le mot clé du film présent dans l'url
//$_GET contient les paramètres d'URL
if (!empty($_GET['keyword'])) {

    $search = $_GET['keyword'];

    //écrire ma requête SQL pour récupérer les films possédants ce mot clé
    $sql = "SELECT *
                FROM movies 
                WHERE title = :search";

    //envoyer la requête à Mysql
    $stmt = $pdo->prepare($sql);

    //exécuter la requête
    $stmt->execute([":search" => $search]);

    //récupérer le résultat avec ->fetch()
    $movie = $stmt->fetch();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Kinoa</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Films <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Liens</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
</nav>
</body>

</html>
