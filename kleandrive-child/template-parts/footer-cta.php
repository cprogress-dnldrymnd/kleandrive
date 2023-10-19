<?php
$overwrite_footer_cta = carbon_get_the_post_meta('overwrite_footer_cta');
$heading = carbon_get_the_post_meta('heading');
$button_text = carbon_get_the_post_meta('button_text');
$button_url = carbon_get_the_post_meta('button_url');
?>

<section class="footer-cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="heading-box">
                    <h2>
                        <?php
                        if ($overwrite_footer_cta && $heading) {
                            echo $heading;
                        } else {
                            echo 'Find out how we can help you';
                        }
                        ?>
                        
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>