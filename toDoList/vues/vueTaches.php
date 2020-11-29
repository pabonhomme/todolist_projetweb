<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ToDoList</title>
</head>
<body>
<?php
echo "Nombre de tache : " . $i . "</br>";

foreach ($tabTache as $t)
{
echo "Tache n°" . $t->getIdTache() . " nommée " . $t->getNom() . "</br>";
}
?>
</body>
</html>