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


    <div class="tab-holder mb-5">
        <div class="container">
            <div class="heading-box mb-5">
                <h4>
                    Kleanbus model assumptions
                </h4>
            </div>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-start active" id="v-pills-annual-mileage-tab" data-bs-toggle="pill" data-bs-target="#v-pills-annual-mileage" type="button" role="tab" aria-controls="v-pills-annual-mileage" aria-selected="true">
                        <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/distance.png' ?>"></span>
                        <span class="text">Annual mileage (km)</span>
                    </button>
                    <button class="nav-link text-start" id="v-pills-remaining-life-tab" data-bs-toggle="pill" data-bs-target="#v-pills-remaining-life" type="button" role="tab" aria-controls="v-pills-remaining-life" aria-selected="false">
                        <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/calendar.png' ?>"></span>
                        <span class="text">Remaining life (Yrs)</span>
                    </button>
                    <button class="nav-link text-start" id="v-pills-number-of-buses-converted-tab" data-bs-toggle="pill" data-bs-target="#v-pills-number-of-buses-converted" type="button" role="tab" aria-controls="v-pills-number-of-buses-converted" aria-selected="false">
                        <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/bus.png' ?>"></span>
                        <span class="text">No of buses converted</span>
                    </button>
                    <button class="nav-link text-start" id="v-pills-Estimated-annual-operational-costs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Estimated-annual-operational-costs" type="button" role="tab" aria-controls="v-pills-Estimated-annual-operational-costs" aria-selected="false">
                        <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/pound.png' ?>"></span>
                        <span class="text">Estimated annual operational costs for existing bus</span>
                    </button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-annual-mileage" role="tabpanel" aria-labelledby="v-pills-annual-mileage-tab">

                    </div>
                    <div class="tab-pane fade" id="v-pills-remaining-life" role="tabpanel" aria-labelledby="v-pills-remaining-life-tab">

                    </div>
                    <div class="tab-pane fade" id="v-pills-number-of-buses-converted" role="tabpanel" aria-labelledby="v-pills-number-of-buses-converted-tab">

                    </div>
                    <div class="tab-pane fade" id="v-pills-Estimated-annual-operational-costs" role="tabpanel" aria-labelledby="v-pills-Estimated-annual-operational-costs-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="calculator">



        <input type="hidden" name="NOxRoadTransport" value="17892.6280819244">
        <input type="hidden" name="ParticulateMatterRoadTransport" value="130884.092045588">
        <input type="hidden" name="BlendedaverageCO2saving" value="1311.648328125">
        <input type="hidden" name="BlendedaverageNOxsaving" value="4.9216236328125">
        <input type="hidden" name="BlendedaveragePMsaving" value="0.03670732421875">
        <input type="hidden" name="IncrementalCO2benefitvsNewBEV" value="227.7">
        <input type="hidden" name="Incrementalcaptialcostsavings" value="350000">
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
                                <input type="number" class="form-control" id="annual_mileage" name="annual_mileage" value="80000">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="remaining_life">Remaining life (Yrs)</label>
                                <input type="number" class="form-control" id="remaining_life" name="remaining_life" value="13.5">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_of_buses_converted">No of buses converted</label>
                                <input type="number" class="form-control" id="no_of_buses_converted" name="no_of_buses_converted" value="1000">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label for="est_annual_op_cost">Estimated annual operational costs for existing bus</label>
                                <input type="number" class="form-control" id="est_annual_op_cost" name="est_annual_op_cost" value="0">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button id="calculate" type="submit" class="btn btn-secondary">Calculate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-part form-result">
            <div class="container">
                <div class="holder py-5">
                    <h4 class="mb-4">Summary outputs</h4>
                    <ul class="list-inline">
                        <li>
                            <span>Total CO2 savings (tonnes): </span>
                            <span id="TotalCO2savings"></span>
                        </li>
                        <li>
                            <span>Total NOx damage cost savings (£): </span>
                            <span id="TotalNOxdamagecostsavings"></span>
                        </li>
                        <li>
                            <th>Total Particulate Matter damage cost savings (£): </span>
                                <span id="TotalParticulateMatterdamagecostsavings"></span>
                        </li>
                        <li>
                            <span>Operational cost savings (£): </span>
                            <span id="Operationalcostsavings"></span>
                        </li>
                        <li>
                            <th>Capital cost savings over buying new electric buses (£): </span>
                                <span id="Capitalcostsavingsoverbuyingnewelectricbuses"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</section>

<section class="bottom py-5">
    <div class="container">
        <div class="holder">
            <div class="form-part ">
                <div class="container">
                    <div class="holder" id="assumptions">
                        <div class="table-holder mb-4">
                            <h4>Damage cost assumptions</h4>
                            <table>
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
                            </table>
                        </div>

                        <div class="table-holder">
                            <h4>Other assumptions</h4>
                            <p>
                                Greenhouse gas reporting: conversion factors 2021 - GOV.UK (www.gov.uk)
                            </p>
                            <table>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>x
</section>



<script>
    jQuery(document).ready(function() {

        function input_value($input) {
            if ($input) {
                return $input;
            } else {
                return 0;
            }
        }

        jQuery('#calculate').click(function(e) {
            $annual_mileage = input_value(parseFloat(jQuery('input[name="annual_mileage"]').val()));
            $remaining_life = input_value(parseFloat(jQuery('input[name="remaining_life"]').val()));
            $no_of_buses_converted = input_value(parseFloat(jQuery('input[name="no_of_buses_converted"]').val()));
            $est_annual_op_cost = input_value(parseFloat(jQuery('input[name="est_annual_op_cost"]').val()));

            $NOxRoadTransport = input_value(parseFloat(jQuery('input[name="NOxRoadTransport"]').val()));
            $ParticulateMatterRoadTransport = input_value(parseFloat(jQuery('input[name="ParticulateMatterRoadTransport"]').val()));
            $BlendedaverageCO2saving = input_value(parseFloat(jQuery('input[name="BlendedaverageCO2saving"]').val()));
            $BlendedaverageNOxsaving = input_value(parseFloat(jQuery('input[name="BlendedaverageNOxsaving"]').val()));
            $BlendedaveragePMsaving = input_value(parseFloat(jQuery('input[name="BlendedaveragePMsaving"]').val()));
            $IncrementalCO2benefitvsNewBEV = input_value(parseFloat(jQuery('input[name="IncrementalCO2benefitvsNewBEV"]').val()));
            $Incrementalcaptialcostsavings = input_value(parseFloat(jQuery('input[name="Incrementalcaptialcostsavings"]').val()));


            $TotalCO2savings = Math.round(($BlendedaverageCO2saving + $IncrementalCO2benefitvsNewBEV) * $no_of_buses_converted * $remaining_life * $annual_mileage / 1000000);
            $TotalNOxdamagecostsavings = Math.round($annual_mileage * $remaining_life * $no_of_buses_converted * $NOxRoadTransport * $BlendedaverageNOxsaving / 1000000);
            $TotalParticulateMatterdamagecostsavings = Math.round($annual_mileage * $remaining_life * $no_of_buses_converted * $ParticulateMatterRoadTransport * $BlendedaveragePMsaving / 1000000);
            $Operationalcostsavings = Math.round(($est_annual_op_cost * $no_of_buses_converted * $remaining_life) / 3);
            $Capitalcostsavingsoverbuyingnewelectricbuses = Math.round($no_of_buses_converted * $Incrementalcaptialcostsavings);

            jQuery('#TotalCO2savings').text($TotalCO2savings.toLocaleString('en-US'));
            jQuery('#TotalNOxdamagecostsavings').text($TotalNOxdamagecostsavings.toLocaleString('en-US'));
            jQuery('#TotalParticulateMatterdamagecostsavings').text($TotalParticulateMatterdamagecostsavings.toLocaleString('en-US'));
            jQuery('#Operationalcostsavings').text($Operationalcostsavings.toLocaleString('en-US'));
            jQuery('#Capitalcostsavingsoverbuyingnewelectricbuses').text($Capitalcostsavingsoverbuyingnewelectricbuses.toLocaleString('en-US'));



            e.preventDefault();

        });
    });
</script>
<?php get_footer() ?>