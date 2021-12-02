<?php $uniqueID = uniqid('form-module-'); ?>
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

<section id="<?php echo $uniqueID; ?>" class="vh-form">
    <div class="container">
        <?php if (!empty($index['title'])) : ?>
            <h1 class="title"><?php echo $index['title']; ?></h1>
        <?php endif ?>

        <?php if (!empty($index['intro_text'])) : ?>
            <div class="intro-text"><?php echo $index['intro_text']; ?></div>
        <?php endif ?>

        <?php if (!empty($index['html_code'])) : ?>
            <div class="vh-form--form">
                <?php echo $index['html_code']; ?>
            </div>
        <?php endif ?>
        <div class="vh-form--thank-you" id="vh-form--thank-you">
            <p>Thank you for signing up to be a part of&nbsp;<b>ChristianaCare Virtual Health</b>.</p>
            <p>Within one business day, you will receive a text message from your own <strong>Patient Digital Ambassador</strong>, or PDA for short, to get you started in this new way of care.</p>
            <p>If you have any questions, e-mail us at&nbsp;<a href="mailto:%20virtualhealth@christianacare.org">VirtualHealth@ChristianaCare.org&nbsp;</a>or call&nbsp;<a href="tel:1302-428-2400">1-302-428-2400</a>.</p>
            <p>Your friends at ChristianaCare Center for Virtual Health.</p>
        </div>
    </div>

</section>
