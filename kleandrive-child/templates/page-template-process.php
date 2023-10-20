<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Our Process
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php $process = carbon_get_the_post_meta('process') ?>
<section class="page-heading">
    <div class="container">
        <h1><?php the_title() ?></h1>
    </div>
</section>
<?php if ($process) { ?>
    <section class="our-process-page">
        <div class="container">
            <div class="process-holder">
                <?php foreach ($process as $key => $proc) { ?>
                    <div class="row position-relative">
                        <div class="col-lg-6">
                            <div class="column-holder">
                                <div class="image-box">
                                    <img src="<?= wp_get_attachment_image_url($proc['image'], 'large') ?>" alt="<?= esc_html($proc['heading']) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 position-relative">
                            <div class="column-holder column-text">
                                <div class="circle  <?= $key == 0 ? 'active' : '' ?>"></div>
                                <div class="stage text-uppercase">
                                    <?= $proc['stage'] ?>
                                </div>
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
        </div>
    </section>
<?php } ?>
<?php the_content() ?>
<?php get_footer() ?>