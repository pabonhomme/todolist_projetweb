<?php require("vueHeader.php") ?>

<div id="container">

    <label>Description de la liste de tâches</label>

    <form method='post' action="index.php?action=AjouterListePublique">
        <textarea class="form-control" name="description" placeholder="Saisissez la description de la liste de tâche"
                  style="height: 30%"></textarea>
        <input type="hidden" name="nomListe" value="<?php echo $nomListe ?>">
        <button type="submit" class="btn btn-outline-primary">Ajouter la liste</button>
    </form>
</div>
</body>
