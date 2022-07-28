<?php
    echo ( css ( [
        'assets/css/resets.css',
        'assets/css/global.css',
        '@auto'
    ] ) );

    $title = $page->title();
    $base_price = $page->price()->value();
    $stock = $page->stock();
    $description = $page->description();

    if ( $page->discount()->value() !== NULL ) {
        $discount = number_format( $page->discount()->value(), 2 );
        $reduced_price = number_format( $base_price - round ( ( $base_price * $discount ) / 100 ), 2 );
    } else {
        $discount = "";
    }

    if ( $page->images()->first() !== NULL ) {
        $image_base = $page->images()->first()->url();
        $image_s = $page->images()->first()->resize(480)->url();
        $image_m = $page->images()->first()->resize(800)->url();
        $image_l = $page->images()->first()->resize(1100)->url();
    } else {
        $image_base = "";
    }
?>
<?php snippet('header') ?>
<main class="article-container flex">
    <section class="article flex">
        <?php if ( $image_base !== "" ) : ?>
            <picture class="article-image">
                <source media="(max-width: 480px)" srcset="<?= $image_s ?>"> 
                <source media="(max-width: 800px)" srcset="<?= $image_m ?>"> 
                <source media="(max-width: 1100px)" srcset="<?= $image_l ?>">
                <img src="<?= $image_base ?>">
            </picture>
        <?php endif; ?>
        <section class="article-info">
            <h1 class="article-name"><?= $title ?></h1>
            <p class="article-description"><?= $description ?></p>
        </section>
    </section>
    <section class="value flex">
        <section class="bestand">
            <p class="in-stock">Im Bestand:</p>
            <p class="stock"><?= $stock ?></p>
        </section>
        <section class="preis">
            <p class="<?= ( $discount !== "" ) ? "old-price" : "normal-price" ?>"><?= $base_price ?> €</p>
            <?php if ( $discount !== "" ) : ?>
                <p class="price"><?= $reduced_price ?> €</p>
                <p class="reduced">Reduzierter Preis !!!</p>
            <?php endif; ?>
        </section>
    </section>
    
    
    
    
</main>