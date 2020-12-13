<?php require("vueHeader.php") ?>


<div class="jumbotron jumbotron-fluid" id="Accroche">
    <div class="container-fluid">
        <h1 class="display-4 font-weight-bold">Bienvenue sur notre site de création de TO DO LIST !</h1>
        <p class="lead font-weight-bold">Rapide, Efficace, Simple.</p>
    </div>
</div>


<div class="row">
    <div class="col-sm">
        <div class="AjoutListe">
            <h2>Ajout d'une liste publique</h2>
            <input type="text" placeholder="Nom de la liste...">
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
            <form method='post' action="index.php?action=AfficherDetailListe">
                <input type="hidden" name="idListeTaches" value="<?php echo $liste->getIdListeTaches() ?>">
                <button type="submit" class="btn btn-outline-primary">Voir plus de tâches</button>
            </form>
        </figcaption>
    </div>
    <?php } ?>
</div>


<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/scroll-animate.js"></script>
</body>
</html>