<?php
    $title = $page->title();
    $articles = $page->children()->first();
    $profile = $page->children()->second();
    $profilePage = "http://localhost/home/profil";
?>
<h1><?= $title ?></h1>
<ul>
    <li>
        Artikel
        <ul>
            <?php foreach ( $articles->children() as $key => $article ) : ?>
                <li>
                    <a href="<?= $article->url() ?>"><?= $article->title() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <li>
        <a href="<?= $profilePage ?>">Profil</a>
    </li>
</ul>
