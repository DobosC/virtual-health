<?php
$uniqueID = uniqid('expert-block-');
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

<section id="<?php echo $uniqueID; ?>" class="vh-expert">
    <div class="vh-expert__container">

        <?php foreach ($index['provider'] as $provider): ?>

            <?php if (!empty($provider['name'])): ?>
                <?php echo $provider['name']; ?>
            <?php endif; ?>

            <?php if (!empty($provider['provider_title'])): ?>
                <?php echo $provider['provider_title']; ?>
            <?php endif; ?>

            <?php if (!empty($provider['job_title'])): ?>
                <?php echo $provider['job_title']; ?>
            <?php endif; ?>

            <?php if (!empty($provider['profile_image'])): ?>
                <?php $image = wp_get_attachment_image($provider['profile_image']['ID']); ?>
                <?php echo $image; ?>
            <?php endif; ?>

            <?php if (!empty($provider['provider_description'])): ?>
                <?php echo $provider['provider_description']; ?>
            <?php endif; ?>

            <?php if (!empty($provider['team_title'])): ?>
                <?php echo $provider['team_title']; ?>
            <?php endif; ?>



            <?php foreach ($provider['team_member'] as $member): ?>

                <?php if (!empty($member['name'])): ?>
                    <?php echo $member['name']; ?>
                <?php endif; ?>

                <?php if (!empty($member['job_title'])): ?>
                    <?php echo $member['job_title']; ?>
                <?php endif; ?>

                <?php if (!empty($member['profile_image'])): ?>
                    <?php $image = wp_get_attachment_image($member['profile_image']['ID']); ?>
                    <?php echo $image; ?>
                <?php endif; ?>

                <?php if (!empty($member['description'])): ?>
                    <?php echo $member['description']; ?>
                <?php endif; ?>

            <?php endforeach; ?>

        <?php endforeach; ?>
    </div>
</section>


