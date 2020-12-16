<?php require("vueHeader.php") ?>

<div id="VoirPlusTache" class="container">

    <h2><?php echo $listetaches->getNom() ?></h2>

    <ul>
        <?php foreach ($listetaches->getListeTaches() as $tache) {
            if (!$tache->getTerminee()) { ?>
                <li><?php echo $tache->getNom() ?>
                    <form method="post" action="index.php?action=SupprimerTache">
                        <input type="hidden" name="idTache" value="<?php echo $tache->getIdTache() ?>">
                        <button class="btn btn-outline-primary" type="submit"> Supprimer Tache</button>
                    </form>
                </li>
            <?php }
        } ?>
    </ul>

    <h4>Description de la liste de tâches : </h4>
    <article><?php echo $listetaches->getDescription() ?></article>
</div>

<div class="container">
    <div id="AjoutTache">
        <h2>Ajouter une tâche</h2>
        <form method="post" action="index.php?action=AjouterTache">
            <input type="hidden" name="idListeTaches" value="<?php echo $listetaches->getIdListeTaches() ?>">
            <input id="BoutonAjoutTache" name="NomTache" type="text" placeholder="Entrez le nom de la tâche">
            <input type="submit" class="AddBtn mb-5" value="Ajouter la tâche">
        </form>
    </div>
</div>

<div class="container">


    <form method="post" action="index.php?action=SupprimerListeTaches" style="width: 35%; margin-bottom: 50">
        <input type="hidden" name="idListeTaches" value="<?php echo $listetaches->getIdListeTaches()?>">
        <button class="btn btn-outline-primary" type="submit"> Supprimer Liste Taches</button>
    </form>

</div>
</body>