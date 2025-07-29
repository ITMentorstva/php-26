
<html>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>

    <body>

        <div class="upload-container">
            <h2>Upload Profile Images</h2>
            <form method="POST" action="upload.php" enctype="multipart/form-data">
                <input type="file" name="profileImage[]" multiple />
                <input type="submit" value="Upload" />
            </form>
        </div>

    </body>

</html>