<?php $uniqueID = uniqid('media-block-'); ?>
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
<section id="<?php echo $uniqueID; ?>" class="vh-media-block">
    <div class="container">
        <div class="vh-media-block__content">
            <?php if (!empty($index['title'])) : ?>
                <h1 class="vh-media-block__title"><?php echo $index['title']; ?></h1>
            <?php endif ?>

            <?php if (!empty($index['text'])) : ?>
                <?php echo $index['text']; ?>
            <?php endif ?>

            <?php if ($index['media_type'] === 'image') : ?>
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
            <?php endif; ?>

            <?php if (!empty($index['video']) && $index['media_type'] === 'video') : ?>
                <div class="video-wrapper">
                    <?php echo $index['video']; ?>
                </div>
            <?php endif ?>

        </div>
    </div>
</section>
