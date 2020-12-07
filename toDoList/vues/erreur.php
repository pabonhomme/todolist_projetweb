<html>
<head><title>Erreur</title>
</head>

<body>

<?php
if (isset($Vueerreur)) {
    foreach ($Vueerreur as $value) {
        echo $value;
    }
}

if (isset($erreur)) {
    var_dump($erreur);
    foreach ($erreur as $value) {
        echo $value;
    }
}

?>

</body>
</html>