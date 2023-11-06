<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Our Process
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php
$process = carbon_get_the_post_meta('process');
$description = carbon_get_the_post_meta('description');
?>
<section class="page-heading">
    <div class="container">
        <h1><?php the_title() ?></h1>
        <div class="description-box">
            <?= wpautop($description) ?>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>

    </div>
</section>
<?php if ($process) { ?>
    <section class="our-process-page">
        <div class="container">
            <div class="process-holder">
                <?php foreach ($process as $key => $proc) { ?>
                    <div class="row position-relative">
                        <div class="col-md-6">
                            <div class="column-holder">
                                <div class="image-box position-relative <?= $image_overlay_text ? 'has-overlay' : '' ?>">
                                    <img src="<?= wp_get_attachment_image_url($proc['image'], 'large') ?>" alt="<?= esc_html($proc['heading']) ?>">
                                    <?php if ($image_overlay_text) { ?>
                                        <div class="hover-box">
                                            <?= wpautop($proc['image_overlay_text']) ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
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