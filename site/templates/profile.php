<?php

    echo ( css ( [
        'assets/css/resets.css',
        'assets/css/global.css',
        '@auto'
    ] ) );

    $title = $page->title();
    $user = $kirby->user();

    if ( $user !== NULL ) {
        $user_name = $user -> username();
        $user_avatar = $user -> avatar() -> url();
        $user_role = $user -> role() -> name();
    }
?>

<?php snippet('header') ?>
<h1><?= $title ?></h1>
<?php if ( $user !== NULL ) : ?>
    <main class="profile-container flex">
        <img class="user-image" src="<?= $user_avatar ?>" alt="Nutzeravatar"/>
        <p class="user-name"><?= $user_name ?></p>
        <p class="user-role">(<?= $user_role ?>)</p>
        <a class="logout" href="<?= url('logout') ?>">Logout</a>
    </main>
<?php else : ?>
    <main class="profile-container login flex">
        <form class="input-form flex" method="post" action="<?= $page->url() ?>">
            <div class="input flex">
                <label class="input-label" for="email"><?= $page->username()->html() ?></label>
                <input class="input-input" type="email" id="email" name="email" value="<?= get('email') ? esc(get('email'), 'attr') : '' ?>" placeholder="Emailadresse eingeben">
            </div>
            <div class="input flex">
                <label class="input-label" for="password"><?= $page->password()->html() ?></label>
                <input class="input-input" type="password" id="password" name="password" value="<?= get('password') ? esc(get('password'), 'attr') : '' ?>">
            </div>
            <div class="button-container">
                <input class="button" type="submit" name="login" value="<?= $page->button()->html() ?>">
            </div>
        </form>
        <?php if($error): ?>
            <div class="alert"><?= $page->alert()->html() ?></div>
        <?php endif ?>
    </main>
<?php endif; ?>