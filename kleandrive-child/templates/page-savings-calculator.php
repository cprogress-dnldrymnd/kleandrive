<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Savings Calculator
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
<section class="savings-calculator">
    <div class="container">
        <h4>
            Kleanbus model assumptions
        </h4>

        <form>
            <div class="form-group">
                <label for="annual_mileage">Annual mileage (km)</label>
                <input type="text" class="form-control" id="annual_mileage" aria-describedby="emailHelp" placeholder="Enter email" name="annual_mileage">
            </div>

            <div class="form-group">
                <label for="annual_mileage">Annual mileage (km)</label>
                <input type="text" class="form-control" id="annual_mileage" aria-describedby="emailHelp" placeholder="Enter email" name="annual_mileage">
            </div>
            <div class="form-group">
                <label for="annual_mileage">Annual mileage (km)</label>
                <input type="text" class="form-control" id="annual_mileage" aria-describedby="emailHelp" placeholder="Enter email" name="annual_mileage">
            </div>
            <div class="form-group">
                <label for="annual_mileage">Annual mileage (km)</label>
                <input type="text" class="form-control" id="annual_mileage" aria-describedby="emailHelp" placeholder="Enter email" name="annual_mileage">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>
<?php the_content() ?>
<?php get_footer() ?>