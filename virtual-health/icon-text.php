<?php $uniqueID = uniqid('icon-text-'); ?>

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
<section id="<?php echo $uniqueID; ?>" class="vh-icon-text">
    <?php if (!empty($index['icon_and_text'])) : ?>
    <div class="vh-icon-text__container">
        <div class="row">
            <?php foreach ($index['icon_and_text'] as $block) : ?>
            <div class="col-md-4 vh-icon-text__col">
                <?php if (!empty($block['content_link']['url'])): ?>
                <a class="vh-icon-text__item" href="<?php echo $block['content_link']['url']; ?>">
                    <?php else: ?>
                    <div class="vh-icon-text__item">
                        <?php endif ?>
                        <?php
                        if (!empty($block['icon'])) {
                            $image = wp_get_attachment_image($block['icon']['ID']);
                            echo $image;
                        }
                        ?>
                        <?php if (!empty($block['text'])) : ?>
                            <span>
                                    <?php echo $block['text']; ?>
                                </span>
                        <?php endif ?>
                        <?php echo !empty($block['content_link']['url']) ? '</a>' : '</div>' ?>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
        <?php endif ?>
</section>