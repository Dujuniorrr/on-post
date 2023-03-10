<?php
    session_start();
    include_once("./../app/config.php");
    include_once("./../app/autoload.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6a5dd2730c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL ?>/public/css/style.css">
    <title><?= APP_NAME ?></title>
</head>
<body>
    
    <?php
        require_once("../app/view/header.php");
        Message::alert("user");
        $route = new Route();
        require_once("../app/view/footer.html");
    ?>

    <script src="<?= URL ?>/public/js/script.js"> </script>
    <script src="<?= URL ?>/public/js/jquery-3.6.3.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>