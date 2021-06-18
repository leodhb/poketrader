<?php
    include_once '../app/autoload.php';
    use Libraries\Route;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKETRADER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php new Route(); ?>
    <script src="js/jquery.js"></script>
    <script src="js/helpers.js"></script>
    <script src="js/script.js"></script>
</body>
</html>