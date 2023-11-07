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
    <div class="top">
        <div class="container">

        </div>
    </div>
    <div class="bottom py-5">
        <div class="container">
            <h4 class="mb-4">
                Kleanbus model assumptions
            </h4>
            <form id="calculator">
                <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="annual_mileage">Annual mileage (km)</label>
                            <input type="text" class="form-control" id="annual_mileage" name="annual_mileage">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="remaining_life">Remaining life (Yrs)</label>
                            <input type="text" class="form-control" id="remaining_life" name="remaining_life">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="no_of_buses_converted">No of buses converted</label>
                            <input type="text" class="form-control" id="no_of_buses_converted" name="no_of_buses_converted">
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label for="est_annual_op_cost">Estimated annual operational costs for existing bus</label>
                            <input type="text" class="form-control" id="est_annual_op_cost" name="est_annual_op_cost">
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php the_content() ?>
<?php get_footer() ?>