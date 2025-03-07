<?php
    $filename = __DIR__ . '/data/articles.json';
    $articles = [];

    if(file_exists($filename)){
        $articles = json_decode(file_get_contents($filename), true) ?? [];

    }
?>

<!--
=== HTML DISPLAY ===
-->
<!doctype html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Blog</title>
</head>
<body class="container">
    <?php require_once 'includes/header.php' ?>
    <div class="content">

    </div>
<?php require_once 'includes/footer.php' ?>
</body>
</html>