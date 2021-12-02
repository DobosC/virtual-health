<?php $uniqueID = uniqid('image-text-overlay-'); ?>
<?php if (!empty($layoutVH['content'])) {
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

<section id="<?php echo $uniqueID; ?>"
         class="vh-image-text-overlay">
    <div class="vh-image-text-overlay__image object-cover">
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
    <div class="vh-image-text-overlay__content <?php if ($index['image_selector'] === 'full-width') {
        echo 'container-full';
    } elseif (($index['image_selector'] === 'center')) {
        echo 'container';
    } ?>">
        <div class="vh-image-text-overlay__text">
            <?php if (!empty($index['text_area']['text_field'])) : ?>
                <?php echo $index['text_area']['text_field']; ?>
            <?php endif ?>

            <?php if (!empty($index['text_area']['telephone_number'])) : ?>
                <p><?php echo $index['text_area']['telephone_number']; ?></p>
            <?php endif ?>
        </div>
    </div>
</section>