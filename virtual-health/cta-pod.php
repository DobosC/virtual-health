<?php
$uniqueID = uniqid('hero-content-');
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

<section id="<?php echo $uniqueID; ?>" class="vh-cta-pod">
    <div class="container">
        <?php if (!empty($index['title'])) : ?>
            <?php echo $index['title']; ?>
        <?php endif ?>
        <div class="row">
            <?php foreach ($index['cta_column'] as $column) : ?>
                <div class="col-md-6 vh-cta-pod__item">
                    <?php
                    if (!empty($column['image'])) {
                        $image = wp_get_attachment_image($column['image']['ID'], [180]);
                        echo $image;
                    }
                    ?>
                    <div class="vh-cta-pod__content">
                        <?php if (!empty($column['text'])) : ?>
                            <?php echo $column['text']; ?>
                        <?php endif ?>
                        <?php if (!empty($column['cta']['button_text'])) : ?>
                            <a class="button small <?php echo $column['cta']['button_colour']; ?>"
                               href="<?php echo $column['cta']['linked_page'] ?>"
                               target="<?php echo $index['cta']['linked_page']['target'] ?: '_self' ?>"><?php echo $column['cta']['button_text'] ?>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>