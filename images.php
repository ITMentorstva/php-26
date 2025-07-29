<?php
    require_once "models/Images.php";
    $img = new Images();

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<html>

    <head>
        <link rel="stylesheet" type="text/css" href="images.css" />
    </head>

    <body>
        <h1>Uploaded Images</h1>

        <?php if(isset($_SESSION['imageErrors'])): ?>

            <?php foreach($_SESSION['imageErrors'] as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>

            <?php unset($_SESSION['imageErrors']) ?>

        <?php endif; ?>

        <div class="gallery">
            <?php foreach($img->getAllImages() as $image): ?>
                <img src="uploads/<?= htmlspecialchars($image['image']) ?>" alt="Uploaded image">
            <?php endforeach; ?>
        </div>
    </body>

</html>