<?php
    $title = $page->title();
    $user = $kirby->user();

    if ( $user !== NULL ) {
        $user_name = $user -> username();
        $user_avatar = $user -> avatar() -> url();
        $user_role = $user -> role() -> name();
    }
?>
<h1><?= $title ?></h1>

<?php if ( $user !== NULL ) : ?>
    <p><?= $user_name ?></p>
    <p><?= $user_role ?></p>
    <img src="<?= $user_avatar ?>" alt="Nutzeravatar"/>
<?php else : ?>
    <h2>Please Login as a valid User !!!</h2>
<?php endif; ?>