


<!--
=== HTML DISPLAY ===
-->
<!doctype html>
<html lang="fr">
<head>
    <?php include_once 'includes/head.php' ?>
    <link rel="stylesheet" href="/public/css/add-article.css">
    <title>Créer un article</title>
</head>
<body class="container">
    <?php include_once 'includes/header.php'?>

    <div class="content">
        <h1>Ecrire un article</h1>
        <form action="/add-article.php" method="post">
            <div class="form-control">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
                <!-- <p class='text-error'></p> -->
                <label for='image'>Image</label>
                <input type="text" name="image" id="image">
                <!-- <p class='text-error'></p> -->
                <label for="category">Catégorie</label>
                <input type="text" name="category" id="category">
                <!-- <p class='text-error'></p> -->
                <label for="content">Content</label>
                <input type="text" name="content" id="content">
                <!-- <p class='text-error'></p> -->
            </div>
        </form>
    </div>
    <?php include_once 'includes/footer.php' ?>
</body>
</html>