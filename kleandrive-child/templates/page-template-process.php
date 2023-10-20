<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Our Process
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php $process = carbon_get_the_post_meta('process') ?>

<?php if ($process) { ?>
    <section class="our-process-page">
        <div class="container">
            <?php foreach ($process as $proc) { ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="column-holder">
                            <div class="image-box">
                                <img src="<?= wp_get_attachment_image_url($proc['image'], 'large') ?>" alt="<?= $proc['heading'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="column-holder">
                            <div class="stage"><?= $proc['stage'] ?></div>
                            <div class="heading-box">
                                <h2><?= $proc['heading'] ?></h2>
                            </div>
                            <div class="description-box">
                                <?= wpautop($proc['description']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?php the_content() ?>
<?php get_footer() ?>