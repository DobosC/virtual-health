<?php
$uniqueID = uniqid('google-maps-');
if (!empty($layoutVH['content'])) {
    $index = $layoutVH['content'];
    $mapLocation = $index['map_content']['maps'];
}

$isFullWidth = $index['display_type'] === 'full-width';
$isTextRight = $index['map_content']['text_side'] === 'right';

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

<?php function renderMapLocation($mapLocation = null, $details = null)
{
    if ($mapLocation): ?>
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo esc_attr($mapLocation['lat']); ?>"
                 data-lng="<?php echo esc_attr($mapLocation['lng']); ?>">
                <div class="acf-map__details">
                    <h4 class="acf-map__name"><?php echo $details['location_name']; ?></h4>
                    <p class="acf-map__address"><?php echo $mapLocation['address']; ?></p>
                    <p><a href="tel:<?php echo $details['location_phone_number']; ?>"
                          class="acf-map__phone">Call <?php echo $details['location_phone_number']; ?></a></p>
                    <p><a class="acf-map__direction"
                          href="https://www.google.com/maps/dir/<?php echo $mapLocation['lat'] . ',' . $mapLocation['lng']; ?>"
                          target="_blank">Get
                            Directions</a></p>
                </div>
            </div>
        </div>
    <?php endif;
}

function renderMapDetails($details = [])
{
    echo !empty($details['text']) ? $details['text'] : '';
}

?>

<section id="<?php echo $uniqueID; ?>" class="vh-google-maps">
    <?php if ($isFullWidth): ?>
        <div class="col-md-6 vh-google-maps__content">
            <h1 class="vh-google-maps__title"><?php echo $index['map_content']['title']; ?></h1>
            <?php renderMapDetails($index['map_content']); ?>
        </div>
        <div>
            <?php renderMapLocation($mapLocation ?? null, $index['map_content']) ?>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row <?php echo $isTextRight ? 'flex-row-reverse' : '' ?>">
                <div class="col-md-6">
                    <?php renderMapDetails($index['map_content']); ?>
                </div>
                <div class="col-md-6">
                    <?php renderMapLocation($mapLocation ?? null, $index['map_content']) ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>

<?php include get_stylesheet_directory() . '/virtual-health/google-maps-script.php'; ?>
