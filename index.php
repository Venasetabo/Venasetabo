<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?connexion">se connecter</a>
    <?php
    if (isset($_GET["connexion"])) {
        require_once "step0.php";
    }
    ?>
</body>
</html>