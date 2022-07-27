<?php
    $user = $kirby->user();

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
            <h1>
                <?= $page -> title() ?>
            </h1>
            <a href="http://localhost/home/profil" class="profile-tab flex">
                <picture class="profile-picture">
                    <img src="<?= $user_avatar ?>" class="profile-image">
                </picture>
            </a>
        </header>