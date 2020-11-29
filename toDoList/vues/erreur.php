<html>
<head><title>Erreur</title>
</head>

<body>

<?php
if (isset($dVueEreur)) {
    foreach ($dVueEreur as $value) {
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