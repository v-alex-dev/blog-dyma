<?php
    const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
    const ERROR_CONTENT_TOO_SHORT = 'L\'article est trop court';
    const ERROR_TITLE_TOO_SHORT = 'Le titre est trop court';
    const ERROR_IMAGE_URL = 'L\'image doit être une url valide';

    $filename = __DIR__ . '/data/articles.json';

    $errors = [
            'title' => '',
            'image' => '',
            'category' => '',
            'content' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if (file_exists($filename)){
            $articles = json_decode(file_get_contents($filename), true) ?? [];
        }

        $_POST = filter_input_array(INPUT_POST, [
                'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'image' => FILTER_SANITIZE_URL,
                'category' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'content' => [
                        'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        'flags' => FILTER_FLAG_NO_ENCODE_QUOTES
                ]
        ]);

        $title = $_POST['title'] ?? '';
	    $image = $_POST['image'] ?? '';
	    $category = $_POST['category'] ?? '';
	    $content = $_POST['content'] ?? '';

        if(!$title){
            $errors['title'] = ERROR_REQUIRED;
        } elseif(mb_strlen($title < 5)){
            $errors['title'] = ERROR_TITLE_TOO_SHORT;
        }

	    if(!$image){
		    $errors['image'] = ERROR_REQUIRED;
	    } elseif(!filter_var($image, FILTER_VALIDATE_URL)){
		    $errors['image'] = ERROR_IMAGE_URL;
	    }

	    if(!$category){
		    $errors['category'] = ERROR_REQUIRED;
	    }


        if(!$content){
            $errors['content'] = ERROR_REQUIRED;
        } elseif (mb_strlen($content) < 50) {
            $errors['content'] = ERROR_CONTENT_TOO_SHORT;
        }

        if(!count(array_filter($errors, fn($e) => $e !== ''))){
            if(isset($articles)){
	            $articles = [...$articles, [
		            'title' => $title,
		            'image' => $image,
		            'category' => $category,
		            'content' => $content
	            ]];
	            file_put_contents($filename, json_encode($articles));
            }
        }
    }
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
                    <?php if($errors['title']) :  ?>
                        <p class='text-error'> <?= $errors['title']?></p>
                    <?php endif; ?>
                </div>
                <div class="form-control">
                    <label for='image'>Image</label>
                    <input type="text" name="image" id="image">
	                <?php if($errors['image']) :  ?>
                      <p class='text-error'> <?= $errors['image']?></p>
	                <?php endif; ?>
                </div>
                <div class="form-control">
                    <label for="category">Catégorie</label>
                    <input type="text" name="category" id="category">
                    <select name="category" id="category">
                        <option value="technology">Technologie</option>
                        <option value="nature">Nature</option>
                        <option value="politic">Politique</option>
                    </select>
	                <?php if($errors['category']) :  ?>
                      <p class='text-error'> <?= $errors['category']?></p>
	                <?php endif; ?>
                </div>
                <div class="form-control">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" ></textarea>
                </div>
	            <?php if($errors['content']) :  ?>
                  <p class='text-error'> <?= $errors['content']?></p>
	            <?php endif; ?>
                <div class="form-action">
                    <a href="/" class="btn btn-secondary">Annuler</a>
                    <button class="btn btn-primary" type="submit">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
</body>
</html>