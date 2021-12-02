<?php $uniqueID = uniqid('media-carousel-'); ?>
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

<section id="<?php echo $uniqueID; ?>" class="vh-media-carousel">
    <div class="container">
        <div class="vh-media-carousel__copy">
            <?php if (!empty($index['title'])) : ?>
                <h1 class="title"><?php echo $index['title']; ?></h1>
            <?php endif ?>

            <?php if (!empty($index['copy_text'])) : ?>
                <div class="copy-text">
                    <?php echo $index['copy_text']; ?>
                </div>
            <?php endif ?>
        </div>
        <?php $nr=0;?>
        <div class="vh-media-carousel--tabs" id="test">
            <?php foreach ($index['media_carousel'] as $layoutmedia): ?>
                <?php $nr++ ;?>
                <div class="vh-media-carousel--tabs-single <?php if($nr===1){ echo "active";}?> ">
                    <p><?php echo $layoutmedia['slide_title'] ?></p>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="vh-media-carousel--arrows">
            <div class="prev"><img
                        src="<?php echo get_template_directory_uri(); ?>/library/images/virtual-health/tabs-arrow.svg"/>
            </div>
            <div class="custom-slide-dots"></div>
            <div class="next"><img
                        src="<?php echo get_template_directory_uri(); ?>/library/images/virtual-health/tabs-arrow.svg"/>
            </div>
        </div>

        <div class="vh-media-carousel--content">
            <?php $nr2=0;?>
            <?php foreach ($index['media_carousel'] as $layoutmedia): ?>
                <?php $nr2++;?>
                <?php if ($layoutmedia['acf_fc_layout'] === 'slide'): ?>

                    <div class="vh-media-carousel--content-single <?php if($nr2===1){ echo "active";}?>">
                        <?php if ($layoutmedia['media_type'] === 'video'): ?>
                            <?php if (!empty($layoutmedia['video'])): ?>
                                <div class="video-wrapper">
                                    <?php echo $layoutmedia['video']; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($layoutmedia['media_type'] === 'image'): ?>
                            <div>
                                <?php if (!wp_is_mobile()) : ?>
                                    <?php
                                    if (!empty($layoutmedia['desktop_image'])) {
                                        $image = wp_get_attachment_image($layoutmedia['desktop_image']['ID'], '');
                                        echo $image;
                                    }
                                    ?>
                                <?php else : ?>
                                    <?php
                                    if (!empty($layoutmedia['mobile_image'])) {
                                        $image = wp_get_attachment_image($layoutmedia['mobile_image']['ID'], '');
                                        echo $image;
                                    }
                                    ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>


                        <?php if (!empty($layoutmedia['caption'])): ?>
                            <?php echo $layoutmedia['caption']; ?>
                        <?php endif; ?>

                        <?php if (!empty($layoutmedia['cta']['url'])): ?>
                            <div class="vh-media-carousel--content-cta"><a
                                        href="<?php echo $layoutmedia['cta']['url']; ?>"
                                        target="_blank"
                                        class="button"><?php echo $layoutmedia['cta']['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ($layoutmedia['acf_fc_layout'] === 'faq'): ?>
                    <div class="vh-media-carousel--content-single <?php if($nr2===1){ echo "active";}?> ">

                        <div class="vh-media-carousel--content-single-intro">
                            <?php if (!empty($layoutmedia['copy_text'])) : ?>
                                <?php echo $layoutmedia['copy_text']; ?>
                            <?php endif ?>
                        </div>
                        <div class="vh-media-carousel--faqs">
                            <?php foreach ($layoutmedia['faqs_repeater'] as $qna): ?>
                                <div class="vh-faqs-single">
                                    <div class="vh-faqs-single--question">
                                        <?php if (!empty($qna['faqs_question'])): ?>
                                            <p><?php echo $qna['faqs_question']; ?></p>
                                        <?php endif; ?>
                                        <img src='<?php echo get_template_directory_uri(); ?>/library/images/virtual-health/arrow-bottom-circle-blue.svg'
                                             class="vh-faqs-single--question-arrow"/>
                                    </div>
                                    <div class="vh-faqs-single--answer">
                                        <?php if (!empty($qna['faqs_question'])): ?>
                                            <?php echo $qna['faqs_answer']; ?>
                                        <?php endif; ?>

                                        <?php if (!empty($qna['cta']['url'])): ?>
                                            <div class="vh-media-carousel--content-cta"><a
                                                        href="<?php echo $qna['cta']['url']; ?>" target="_blank"
                                                        class="button"><?php echo $qna['cta']['title']; ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
</section>