<?php

$uniqueID = uniqid('hero-content-');
if (!empty($layoutVH['content'])) {
    $index = $layoutVH['content'];
    $image = wp_get_attachment_image($index['logo']['ID'],'medium');
}
$styles = applyVHStyles($layoutVH);
if (!empty($styles['desktop'])) : ?>
    <style>
        #<?php echo $uniqueID; ?>{<?php echo $styles['desktop']; ?>}
    </style>
<?php endif;
if (!empty($styles['desktop'])) : ?>
    <style>
        @media (max-width: 680px) {
            #<?php echo $uniqueID; ?>{<?php echo $styles['mobile']; ?>}
        }
    </style>
<?php endif; ?>

<header id="<?php echo $uniqueID; ?>" class="<?php if ($index['show_logo'] === false) {
    echo 'd-none';
} elseif ($index['show_logo'] === true) {
    echo 'd-flex align-items-center vh-logo-in-header';
} ?> ">
    <a class="main-logo" href="#" alt="<?php wp_title(); ?>"><?php echo $image; ?></a>
    <?php if (!empty($index['co_brand'])) : ?>
        <?php $image2 = wp_get_attachment_image($index['co_brand']['ID'], 'medium'); ?>
        <a class="co-brand-logo" href="#" alt="<?php wp_title(); ?>"><?php echo $image2; ?></a>
    <?php endif ?>
</header>