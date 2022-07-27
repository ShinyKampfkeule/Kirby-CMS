<?php
    $articles = $page -> children() -> first();
    echo ( css ( [
        'assets/css/resets.css',
        'assets/css/global.css',
        '@auto'
    ] ) );
?>
<?php snippet('header') ?>
<main class="article-content flex">
    <?php foreach ( $articles -> children() as $key => $article ) : ?>
        <?php 
            $title =  $article -> title();
            $url = $article -> url();
            $base_price = $article->price()->value();
            $stock = $article->stock();

            if ( $article->discount() !== NULL ) {
                $discount = $article->discount()->value();
                $reduced_price = number_format( $base_price - round ( ( $base_price * $discount ) / 100 ), 2 );
            } else {
                $discount = "";
            }

            if ( $article->images()->first() !== NULL ) {
                $image_base = $article->images()->first()->url();
            } else {
                $image_base = "media/utils/food.jpg";
            }
        ?>
        <button type="button" onClick="location.href='<?= $url ?>'" class="article-button">
            <picture class='button-picture flex'>    
                <img src="<?= $image_base ?>">
            </picture>
            <h2 class='button-name-<?= ( strlen ( $title ) > 15 ) ? "small" : "big" ?>'><?= $title ?></h2>
            <p class='button-price'><?= ( $discount !== "" ) ? $reduced_price : $base_price ?> €</p>
        </button>
    <?php endforeach; ?>
</main>
