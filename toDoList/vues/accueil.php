<?php require("header.php") ?>


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
    <div class="col-sm">
        <div class="AjoutListe">
            <h2>Ajout To do List privée</h2>
            <input type="text" placeholder="Titre...">
            <span onclick="newElement()" class="AddBtn">Add</span>
        </div>
    </div>
</div>


<div class="row align-items-start">

    <?php

    foreach ($tabListeTaches

    as $liste) {
    ?>
    <div class="col-12 col-md-6 col-lg-6 text-center">
        <figcaption class="ListePublique">
            <h2><?php echo $liste->getNom(); ?></h2>
            <ul>
            <?php foreach ($liste->getListeTaches() as $tache) {
                if (!$tache->getTerminee()) { ?>
                        <li><?php echo $tache->getNom() ?></li>
                <?php }
            } ?>
            </ul>
            <button type="submit" class="btn btn-outline-primary" href="ajoutTache.php">Voir plus de tâches</button>
        </figcaption>
    </div>
    <?php } ?>
</div>

<!--<div class="col-sm">-->
<!--    <figcaption class="ListePrivée">-->
<!--        <h2>Construire une maison (privé)</h2>-->
<!--        <ul>-->
<!--            <li>Faire les plans</li>-->
<!--            <li>Poser les fondations</li>-->
<!--        </ul>-->
<!--        <button type="submit" class="btn btn-outline-primary" href="ajoutTache.php">Voir plus de tâches</button>-->
<!--    </figcaption>-->
<!--</div>-->
<!--<div class="col-sm">-->
<!--    <figcaption class="ListePrivée">-->
<!--        <h2>Construire une maison (privé)</h2>-->
<!--        <ul>-->
<!--            <li>Faire les plans</li>-->
<!--            <li>Poser les fondations</li>-->
<!--        </ul>-->
<!--        <button type="submit" class="btn btn-outline-primary" href="ajoutTache.php">Voir plus de tâches</button>-->
<!--    </figcaption>-->
<!--</div>-->


<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/scroll-animate.js"></script>
</body>
</html>