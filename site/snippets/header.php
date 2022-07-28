<?php
    $user = $kirby->user();
    $page_title = $site -> content() -> title();

    if ( $user !== NULL ) {
        $user_avatar = $user -> avatar() -> url();
    } else {
        $user_avatar = "http://localhost/media/utils/user.png";
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Landing Page" content="<? $site->description() ?>">
        <title>
            <?= $page -> title() ?> | <?= $site -> title() ?>
        </title>
    </head>
    <body>
        <header class="head_container">
            <button class="head_page" onClick="location.href = '/';">
                <?= $page_title ?>
            </button>
            <a href="http://localhost/home/profil" class="profile-tab flex">
                <picture class="profile-picture">
                    <img src="<?= $user_avatar ?>" class="profile-image">
                </picture>
            </a>
        </header>