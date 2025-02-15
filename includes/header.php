<?php
/*
    === LOGIC ===
 */


?>

<header>
    <a href="/"><div class="logo">Dyma blog</div></a>
    <ul class="header-menu">
        <li class=<?= $_SERVER['REQUEST_URI'] === '/add-article.php' ? 'active' : '' ?>>
            <a href="/add-article.php">New Article</a>
        </li>
    </ul>
</header>