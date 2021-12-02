<?php
/**
 * Template Name: Virtual Health - Page Builder
 */
get_header('virtual-health');

while(have_posts()) :
    the_post();
    // Get the VH page data from ACF field using get_field();
    $vh_content = get_field('vh_page');

    // Check if $vh_page has layouts
    if (!empty($vh_content)) {
        foreach ($vh_content as $layoutVH) {
            // Switch the layout to get the correct template part
            if ($layoutVH['acf_fc_layout'] === 'logo_in_header') {
                include get_stylesheet_directory() . '/virtual-health/logo-in-header.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'hero_image_content') {
                include get_stylesheet_directory() . '/virtual-health/hero-image-content.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'hero_image_homepage') {
                include get_stylesheet_directory() . '/virtual-health/hero-image-homepage.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'image_text_overlay') {
                include get_stylesheet_directory() . '/virtual-health/image-text-overlay.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'media_block') {
                include get_stylesheet_directory() . '/virtual-health/media-block.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'media_carousel') {
                include get_stylesheet_directory() . '/virtual-health/media-carousel.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'text_media_block') {
                include get_stylesheet_directory() . '/virtual-health/text-media-block.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'cta_pod') {
                include get_stylesheet_directory() . '/virtual-health/cta-pod.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'expert_block') {
                include get_stylesheet_directory() . '/virtual-health/expert-block.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'icon_text') {
                include get_stylesheet_directory() . '/virtual-health/icon-text.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'google_maps') {
                include get_stylesheet_directory() . '/virtual-health/google-maps.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'faqs') {
                include get_stylesheet_directory() . '/virtual-health/faqs.php';
            } elseif ($layoutVH['acf_fc_layout'] === 'flower_footer') {
                include get_stylesheet_directory() . '/virtual-health/flower-footer.php';
            }elseif ($layoutVH['acf_fc_layout'] === 'form_module') {
                include get_stylesheet_directory() . '/virtual-health/form-module.php';
            }
        }
    }

endwhile;

get_footer('virtual-health');