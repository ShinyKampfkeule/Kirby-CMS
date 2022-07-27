<?php
    $title = $page->title();
    $base_price = $page->price()->value();
    $stock = $page->stock();
    $description = $page->description();

    if ( $page->discount() !== NULL ) {
        $discount = $page->discount()->value();
        $reduced_price = $base_price - round ( ( $base_price * $discount ) / 100 );
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
<h1><?= $title ?></h1>
<p>Bais Preis: <?= $base_price ?></p>
<p>Bestand: <?= $stock ?></p>
<?php if ( $discount !== "" ) : ?>
    <p>Rabatt: <?= $discount ?>%</p>
    <p>Reduzierter Preis: <?= $reduced_price ?></p>
<?php endif; ?>
<p>Beschreibung: <?= $description ?></p>
<?php if ( $image_base !== "" ) : ?>
    <picture>
        <source media="(max-width: 480px)" srcset="<?= $image_s ?>"> 
        <source media="(max-width: 800px)" srcset="<?= $image_m ?>"> 
        <source media="(max-width: 1100px)" srcset="<?= $image_l ?>">
        <img src="<?= $image_base ?>" style="width:20%;">
    </picture>
<?php endif; ?>