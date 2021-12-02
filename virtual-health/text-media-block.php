<?php
$uniqueID = uniqid('text-media-block-');
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
<style>
    #
    <?php echo $uniqueID; ?>
    .button {
        background-color: <?php echo $index['cta']['button_colour'] ?>;
        border-color: <?php echo $index['cta']['button_colour'] ?>;
    }

    #
    <?php echo $uniqueID; ?>
    .button:hover {
        background-color: <?php echo $index['cta']['button_hover_colour'] ?>;
        border-color: <?php echo $index['cta']['button_hover_colour'] ?>;
    }
</style>
<section id="<?php echo $uniqueID; ?>"
         class="vh-text-media">
    <div class="container">
        <?php if (!empty($index['title'])) : ?>
            <h1 class="vh-text-media__title"><?php echo $index['title']; ?></h1>
        <?php endif ?>
        <div class="row <?php echo $index['align_media'] === 'left' ? 'flex-row-reverse' : '' ?>">
            <div class="<?php echo $index['two_columns'] === true ? 'col-md-6 default-type' : 'col-md-12 full-width' ?>">
                <?php if (!empty($index['text_area'])) : ?>
                    <?php echo $index['text_area']; ?>
                <?php endif ?>

                <?php if (!empty($index['cta']['button_link']['url'])): ?>
                    <a class="button" href="<?php echo $index['cta']['button_link']['url'] ?>"
                       target="<?php echo $index['cta']['button_link']['target'] ?: '_self' ?>">
                        <?php echo $index['cta']['button_text'] ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ($index['two_columns'] === true): ?>

                <?php if ($index['content_group']['media_type'] === 'image'): ?>
                    <div class="col-md-6 image-type">
                        <?php if (!wp_is_mobile()) : ?>
                            <?php
                            if (!empty($index['content_group']['desktop_image'])) {
                                $image = wp_get_attachment_image($index['content_group']['desktop_image']['ID'], [300]);
                                echo $image;
                            }
                            ?>
                        <?php else : ?>
                            <?php
                            if (!empty($index['content_group']['mobile_image'])) {
                                $image = wp_get_attachment_image($index['content_group']['mobile_image']['ID']);
                                echo $image;
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($index['content_group']['video']) && $index['content_group']['media_type'] === 'video' && $index['two_columns'] === true) : ?>
                    <div class="col-md-6 video-type">
                        <div class="video-wrapper">
                            <?php echo $index['content_group']['video']; ?>
                        </div>
                    </div>
                <?php endif ?>

                <?php if (!empty($index['content_group']['text_area']) && $index['content_group']['media_type'] === 'text' && $index['two_columns'] === true) : ?>
                    <div class="col-md-6 text-type">
                        <?php echo $index['content_group']['text_area']; ?>
                    </div>
                <?php endif ?>

            <?php endif; ?>
        </div>
    </div>
</section>