<?php $uniqueID = uniqid('flower-footer-'); ?>
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


<div id="<?php echo $uniqueID; ?>" class="vh-footer">

    <?php
    if (!empty($index['image'])) {
        $image = wp_get_attachment_image($index['image']['ID'], '');
        echo $image;
    }
    ?>
</div>
