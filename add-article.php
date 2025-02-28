<?php
    const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
    const ERROR_CONTENT_TOO_SHORT = 'L\'article est trop court';
    const ERROR_TITLE_TOO_SHORT = 'Le titre est trop court';

    const ERROR_IMAGE_URL = 'L\'image doit être une url valide';



?>


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
        <div class="block form-container">
            <h1>Ecrire un article</h1>
            <form action="/add-article.php" method="post">
                <div class="form-control">
                    <label for="title">Titre</label>
                    <input type="text" name="title" id="title">
                    <!-- <p class='text-error'></p> -->
                </div>
                <div class="form-control">
                    <label for='image'>Image</label>
                    <input type="text" name="image" id="image">
                    <!-- <p class='text-error'></p> -->
                </div>
                <div class="form-control">
                    <label for="category">Catégorie</label>
                    <input type="text" name="category" id="category">
                    <select name="category" id="category">
                        <option value="technology">Technologie</option>
                        <option value="nature">Nature</option>
                        <option value="politic">Politique</option>
                    </select>
                    <!-- <p class='text-error'></p> -->
                </div>
                <div class="form-control">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" ></textarea>
                </div>
                <!-- <p class='text-error'></p> -->
                <div class="form-action">
                    <a href="/" class="btn btn-secondary">Annuler</a>
                    <button class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
</body>
</html>