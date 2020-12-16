<?php require("vueHeader.php") ?>

<div class="container">
    <div class="AjoutListe">
        <h2>Ajout d'une liste publique</h2>
        <form method='post' action="index.php?action=AjouterDescription">
            <input type="text" name="nomListe" placeholder="Nom de la liste..." value="">
            <input type="submit" class="AddBtn" value="Ajouter la liste">
        </form>
    </div>
</div>

<div class="row align-items-start">

    <?php

    foreach ($tabListeTaches

             as $liste) {
        ?>
        <div class="col-12 col-md-6 col-lg-6 text-center">
            <figcaption class="ListePublique">
                <h2><?php echo $liste->getNom();
                    $i = 0; ?></h2>
                <ul>
                    <?php foreach ($liste->getListeTaches() as $tache) {
                        if (!$tache->getTerminee() && $i <= $tacheMax) { ?>
                            <li><?php echo $tache->getNom();
                                $i++ ?></li>
                        <?php }
                    } ?>
                    <li>etc ...</li>
                </ul>
                <form method='post' action="index.php?action=AfficherDetailListe">
                    <input type="hidden" name="idListeTaches" value="<?php echo $liste->getIdListeTaches(); ?>">
                    <button type="submit" class="btn btn-outline-primary">Cliquez pour voir plus de tâches</button>
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