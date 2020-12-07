
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" href="../vues/style/accueil.css" rel="stylesheet" media="all" >
    <title>To Do List </title>
</head>


<body class="bg-dark">
<header>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand pl-5" href="accueil.php"><img src="img/TestLogoToDoList1.png" class="rounded float-left"
                                                             alt="logo To DO List"></a>
        <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="accueil.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Se Connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aide.php">Aide</a>
                </li>
            </ul>
        </div>
    </nav>
    <hr>
</header>

<div class="jumbotron jumbotron-fluid" id="Accroche">
    <div class="container-fluid">
        <h1 class="display-4 font-weight-bold">Bienvenue sur notre site de création de TO DO LIST !</h1>
        <p class="lead font-weight-bold">Rapide, Efficace, Simple.</p>
    </div>
</div>


<div class="row">
    <div class="col-sm">
        <div class="AjoutListe">
            <h2>Ajout To do List publique</h2>
            <input type="text" placeholder="Titre...">
            <span onclick="newElement()" class="AddBtn">Add</span>
        </div>
    </div>
    <!--    <div class="col-sm">-->
    <!--        <div class="AjoutListe">-->
    <!--            <h2>Ajout To do List privée</h2>-->
    <!--            <input type="text" placeholder="Titre...">-->
    <!--            <span onclick="newElement()" class="AddBtn">Add</span>-->
    <!--        </div>-->
    <!--    </div>-->
</div>


<div class="row">

    <?php

    foreach ($tabListeTaches as $liste) {
    ?>
    <div class="col-sm">
        <figcaption class="ListePublique">
            <h2><?php echo $liste->getNom(); ?></h2>
            <?php foreach ($liste->getListeTaches() as $tache) {
                if (!$tache->getTerminee()) { ?>
                    <ul>
                        <li><?php echo $tache->getNom() ?></li>
                    </ul>
                <?php }
            }
            } ?>
            <button type="submit" class="btn btn-outline-primary" href="ajoutTache.php">Voir plus de tâches</button>
        </figcaption>
    </div>


    <!--    <div class="col-sm">-->
    <!--        <figcaption class="ListePrivée">-->
    <!--            <h2>Construire une maison (privé)</h2>-->
    <!--            <ul>-->
    <!--                <li>Faire les plans</li>-->
    <!--                <li>Poser les fondations</li>-->
    <!--            </ul>-->
    <!--            <button type="submit" class="btn btn-outline-primary" href="ajoutTache.php">Voir plus de tâches</button>-->
    <!--        </figcaption>-->
    <!--    </div>-->
    <!---->
    <!--</div>-->


    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/scroll-animate.js"></script>
</body>
</html>