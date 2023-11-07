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
    <form id="calculator">
        <div class="form-part py-5">
            <div class="container">
                <div class="holder">
                    <h4 class="mb-4">
                        Kleanbus model assumptions
                    </h4>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="annual_mileage">Annual mileage (km)</label>
                                <input type="number" class="form-control" id="annual_mileage" name="annual_mileage">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="remaining_life">Remaining life (Yrs)</label>
                                <input type="number" class="form-control" id="remaining_life" name="remaining_life">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_of_buses_converted">No of buses converted</label>
                                <input type="number" class="form-control" id="no_of_buses_converted" name="no_of_buses_converted">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="est_annual_op_cost">Estimated annual operational costs for existing bus</label>
                                <input type="number" class="form-control" id="est_annual_op_cost" name="est_annual_op_cost">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-part py-5">
            <div class="container">
                <div class="holder">
                    <figure class="wp-block-table">
                        <table>
                            <tbody>
                                <tr>
                                    <td>NOx Road Transport / tonne (£2022)</td>
                                    <td>£17,893</td>
                                    <td>Air Quality damage cost update 2023 – FINAL Report Report for Defra ECM_61369</td>
                                </tr>
                                <tr>
                                    <td>Particulate Matter Road Transport PM2.5/ tonne (£2002)</td>
                                    <td>£130,884</td>
                                    <td>Air Quality damage cost update 2023 – FINAL Report Report for Defra ECM_61369</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Other assumptions:</td>
                                    <td></td>
                                    <td>Greenhouse gas reporting: conversion factors 2021 - GOV.UK (www.gov.uk)</td>
                                </tr>
                                <tr>
                                    <td>Blended average CO2 saving per 1 vehicle/ km (g)</td>
                                    <td>1,312</td>
                                    <td>Refer to 'Zemo assumptions' sheet for detailed breakdown</td>
                                </tr>
                                <tr>
                                    <td>Blended average NOx saving per 1 vehicle/ km (g)</td>
                                    <td>4.921623633</td>
                                    <td>Refer to 'Zemo assumptions' sheet for detailed breakdown</td>
                                </tr>
                                <tr>
                                    <td>Blended average PM saving per 1 vehicle/ km (g)</td>
                                    <td>0.03670732422</td>
                                    <td>Refer to 'Zemo assumptions' sheet for detailed breakdown</td>
                                </tr>
                                <tr>
                                    <td>Incremental CO2 benefit vs New BEV per 1 vehicle/ km (g)</td>
                                    <td>227.7</td>
                                    <td>"40 to 80 percent of life cycle impacts of battery electric bus are in it's manufacture'' 1</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>NB. Adjusted down by a third to exclude battery and powertrain</td>
                                </tr>
                                <tr>
                                    <td>Incremental captial cost savings (new bev cost - repower)</td>
                                    <td>£ 350,000.00</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Assumed opertational costs?</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </figure>
                </div>
            </div>
        </div>
    </form>

</section>
<?php the_content() ?>
<?php get_footer() ?>