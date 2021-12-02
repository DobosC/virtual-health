<?php $uniqueID = uniqid('faqs-'); ?>

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

<section id="<?php echo $uniqueID; ?>" class="vh-faqs">
    <div class="container">
        <?php if (!empty($index['title'])): ?>
            <h3 class="title"><?php echo $index['title']; ?></h3>
        <?php endif; ?>

        <?php if (!empty($index['intro_text'])): ?>
            <div class="intro_text"><?php echo $index['intro_text']; ?></div>
        <?php endif; ?>

        <?php if (!empty($index['faqs_repeater'])): ?>
            <?php foreach ($index['faqs_repeater'] as $qna): ?>
                <div class="vh-faqs-single">

                    <?php if (!empty($qna['faqs_question'])): ?>
                        <div class="vh-faqs-single--question">
                            <p><?php echo $qna['faqs_question']; ?></p>
                            <img src='<?php echo get_template_directory_uri(); ?>/library/images/virtual-health/arrow-bottom-circle-blue.svg'
                                 class="vh-faqs-single--question-arrow"/>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($qna['faqs_answer'])): ?>
                        <div class="vh-faqs-single--answer">

                            <?php echo $qna['faqs_answer']; ?>

                            <?php if (!empty($qna['cta'])): ?>
                                <div class="vh-faqs-single--answer-cta">
                                    <a href="<?php echo $qna['cta']['url']; ?>" target="_blank"
                                       class="button"><?php echo $qna['cta']['title']; ?></a>
                                </div>
                            <?php endif; ?>

                            <?php if ($qna['image_and_video'] === 'video'): ?>
                                <?php if (!empty($qna['video'])): ?>
                                    <div class="video-wrapper">
                                       
                                        <?php echo $qna['video']; ?>

                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ($qna['image_and_video'] === 'image'): ?>
                                <?php if (!wp_is_mobile()) : ?>
                                    <?php
                                    if (!empty($qna['image']['desktop_image'])) {
                                        $image = wp_get_attachment_image($qna['image']['desktop_image']['ID'], '');
                                        echo $image;
                                    }
                                    ?>
                                <?php else : ?>
                                    <?php
                                    if (!empty($qna['image']['mobile_image'])) {
                                        $image = wp_get_attachment_image($qna['image']['mobile_image']['ID'], '');
                                        echo $image;
                                    }
                                    ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</section>