<?php

require_once "models/DB.php";

$db = new DB();
var_dump($db);

$connection = mysqli_connect("localhost","root", "", "php23");

$data = $connection->query("SELECT * FROM images");

?>

<html>

    <head>

    </head>

    <body>
        <?php foreach($data as $image): ?>
            <img width="100px" height="auto" src="uploads/<?= $image['image'] ?>" />
        <?php endforeach; ?>
    </body>

</html>