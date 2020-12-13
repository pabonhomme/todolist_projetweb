<?php require("vueHeader.php") ?>

<div class="jumbotron jumbotron-fluid" id="Accroche">
    <div class="container-fluid">
        <h1 class="display-4 font-weight-bold">Bienvenue sur notre site de création de TO DO LIST !</h1>
        <p class="lead font-weight-bold">Rapide, Efficace, Simple.</p>
    </div>
</div>


<div id="VoirPlusTache" class="container">

    <h2><?php echo $listetaches->getNom() ?></h2>
    <ul>
        <?php foreach ($listetaches->getListeTaches() as $tache) {
            if (!$tache->getTerminee()) { ?>
                <li><?php echo $tache->getNom() ?></li>
            <?php }
        } ?>
    </ul>

    <h4>Description de la liste de tâches : </h4>
    <article><?php echo $listetaches->getDescription() ?></article>
</div>

<div class="container">
    <div id="AjoutTache">
        <h2>Ajouter une tâche</h2>
        <input type="text" placeholder="Entrez le nom de la tâche">
        <div class="AddBtn">ajouter la tâche</div>
    </div>
</div>


</body>
