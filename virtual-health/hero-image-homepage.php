<?php
$uniqueID = uniqid('hero-homepage-');
if (!empty($layoutVH['content'])) {
    $index = $layoutVH['content'];
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
<section id="<?php echo $uniqueID; ?>" class="vh-hero-homepage">
    <div class="vh-hero-homepage__image object-cover">
        <?php if (!wp_is_mobile()) : ?>
            <?php
            if (!empty($index['desktop_image'])) {
                $image = wp_get_attachment_image($index['desktop_image']['ID'], '');
                echo $image;
            }
            ?>
        <?php else : ?>
            <?php
            if (!empty($index['mobile_image'])) {
                $image = wp_get_attachment_image($index['mobile_image']['ID'], '');
                echo $image;
            }
            ?>
        <?php endif; ?>
    </div>

    <div class="vh-hero-homepage__wrapper">
        <div class="vh-hero-homepage__content">
            <?php if (!empty($index['title'])) : ?>
                <h1><?php echo $index['title']; ?></h1>
            <?php endif ?>

            <?php if (!empty($index['wysiwyg_fields']['wysiwyg'])) : ?>
                <?php echo $index['wysiwyg_fields']['wysiwyg']; ?>
            <?php endif ?>
            <?php if (!empty($index['cta']['button_text'])) : ?>
                <p>
                    <a class="button <?php echo $index['cta']['button_colour'] ?>"
                       href="<?php echo $index['cta']['linked_page']['url'] ?>"
                       target="<?php echo $index['cta']['linked_page']['target'] ?: '_self' ?>">
                        <?php echo $index['cta']['button_text'] ?>
                    </a>
                </p>
            <?php endif ?>

            <?php if (!empty($index['wysiwyg_fields']['telephone_number'])) : ?>
                <div><?php echo $index['wysiwyg_fields']['telephone_number']; ?></div>
            <?php endif ?>
        </div>
    </div>

</section>
