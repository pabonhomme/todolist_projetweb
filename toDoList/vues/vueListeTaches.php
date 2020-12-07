<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
</head>
<body>
<?php

foreach ($tabListeTaches as $liste) {
    echo "Liste : " . $liste->getNom() . "</br>";
    foreach ($liste->getListeTaches() as $tache) {
        if (!$tache->getTerminee()) {
            echo "Tache n°" . $tache->getIdTache() . " nommée " . $tache->getNom() . " de la liste n°" . $tache->getIdListeTaches() . "</br>";
        }
    }
}
?>
</body>
</html>