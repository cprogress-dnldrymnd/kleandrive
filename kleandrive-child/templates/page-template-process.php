<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Our Process
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php $process = carbon_get_the_post_meta('process') ?>

<?php if ($process) { ?>
    <section class="our-process-page">

    </section>
<?php } ?>

<?php the_content() ?>
<?php get_footer() ?>