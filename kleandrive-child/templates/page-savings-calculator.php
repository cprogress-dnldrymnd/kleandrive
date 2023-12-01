<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Savings Calculator
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php
$process = carbon_get_the_post_meta('process');
$description = carbon_get_the_post_meta('description');
function slider_range($label, $measurement, $id)
{
    ob_start();
    $description = carbon_get_theme_option($id . '_desc');
    $min = carbon_get_theme_option($id . '_min');
    $max = carbon_get_theme_option($id . '_max');
?>
    <div class="slider-input-holder">
        <div class="label">
            <label for="<?= $id ?>" class="form-label"><?= $label ?></label>
        </div>
        <div class="slider-input mb-3">
            <input type="text" class="" id="<?= $id ?>" name="<?= $id ?>">
            <?= $measurement ?>
        </div>
        <div class="row justify-content-space-between">
            <div class="min col-auto"><?= $min ?> <?= $measurement ?></div>
            <div class="col range-holder">
                <div class="slider-handles" id="slider-range-<?= $id ?>" min="<?= $min ?>" max="<?= $max ?>" start="0"></div>
            </div>
            <div class="max col-auto"><?= $max ?> <?= $measurement ?></div>
        </div>

        <?php if ($description) { ?>
            <div class="description mt-3">
                <p>
                    <?= $description ?>
                </p>
            </div>
        <?php } ?>
    </div>
<?php
    return ob_get_clean();
}
?>
<section>
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
    <div class="results-holder">
        <div class="container">
            <?php the_content() ?>
        </div>
    </div>

    <div class="tab-holder">
        <div class="container">
            <div class="heading-box mb-5">
                <h4>
                    Kleanbus model assumptions
                </h4>
            </div>
            <div class="row g-5">
                <input type="hidden" name="NOxRoadTransport" value="17892.6280819244">
                <input type="hidden" name="ParticulateMatterRoadTransport" value="130884.092045588">
                <input type="hidden" name="BlendedaverageCO2saving" value="1311.648328125">
                <input type="hidden" name="BlendedaverageNOxsaving" value="4.9216236328125">
                <input type="hidden" name="BlendedaveragePMsaving" value="0.03670732421875">
                <input type="hidden" name="IncrementalCO2benefitvsNewBEV" value="227.7">
                <input type="hidden" name="Incrementalcaptialcostsavings" value="350000">
                <div class="col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link text-start active" id="v-pills-number-of-buses-converted-tab" data-bs-toggle="pill" data-bs-target="#v-pills-number-of-buses-converted" type="button" role="tab" aria-controls="v-pills-number-of-buses-converted" aria-selected="true">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/bus.png' ?>"></span>
                                <span class="text">Number of buses to be Repowered</span>
                            </button>
                            <button class="nav-link text-start " id="v-pills-annual-mileage-tab" data-bs-toggle="pill" data-bs-target="#v-pills-annual-mileage" type="button" role="tab" aria-controls="v-pills-annual-mileage" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/distance.png' ?>"></span>
                                <span class="text">Annual average distance travelled per bus</span>
                            </button>
                            <button class="nav-link text-start" id="v-pills-remaining-life-tab" data-bs-toggle="pill" data-bs-target="#v-pills-remaining-life" type="button" role="tab" aria-controls="v-pills-remaining-life" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/calendar.png' ?>"></span>
                                <span class="text">Average remaining life of the vehicles</span>
                            </button>
                            <button class="nav-link text-start" id="v-pills-Estimated-annual-operational-costs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Estimated-annual-operational-costs" type="button" role="tab" aria-controls="v-pills-Estimated-annual-operational-costs" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/pound.png' ?>"></span>
                                <span class="text"> Existing annual diesel vehicle service and maintenance cost </span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8" id="calculator-slider">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-number-of-buses-converted" role="tabpanel" aria-labelledby="v-pills-number-of-buses-converted-tab">
                            <?= slider_range('Number of buses to be Repowered', 'buses', 'num_of_buses') ?>
                            <div class="label mt-5">
                                <label for="num_of_buses" class="form-label">Are they single or double deck buses</label>
                            </div>
                            <select name="single_or_double" id="single_or_double">
                                <option value="single"> Single </option>
                                <option value="double"> Double </option>
                            </select>
                        </div>
                        <div class="tab-pane fade" id="v-pills-annual-mileage" role="tabpanel" aria-labelledby="v-pills-annual-mileage-tab">
                            <?= slider_range('Annual average distance travelled per bus', 'km', 'annual_average_distance_travel', '0', '100000') ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-remaining-life" role="tabpanel" aria-labelledby="v-pills-remaining-life-tab">
                            <?= slider_range('Average remaining life of the vehicles', 'years', 'average_remaining_life') ?>
                        </div>

                        <div class="tab-pane fade" id="v-pills-Estimated-annual-operational-costs" role="tabpanel" aria-labelledby="v-pills-Estimated-annual-operational-costs-tab">
                            <?= slider_range('Existing annual diesel vehicle service and maintenance cost', '£', 'existing_vehicle_service_and_maintenance_cost') ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="calculator">
        <div class="form-part form-result">
            <div class="container">
                <div class="holder py-5">
                    <h4 class="mb-5">Summary outputs</h4>

                    <div class="col-lg-4">
                        <div class="column-holder">
                            <div class="icon-box">
                                <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                            </div>
                            <div class="result-heading">
                                <strong><span>Total NOx damage cost savings (£): </span></strong>
                                <span id="TotalParticulateMatterdamagecostsavings"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="column-holder">
                            <div class="icon-box">
                                <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                            </div>
                            <div class="result-heading">
                                <strong><span>Total Particulate Matter damage cost savings (£): </span></strong>
                                <span id="TotalParticulateMatterdamagecostsavings"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="column-holder">
                            <div class="icon-box">
                                <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                            </div>
                            <div class="result-heading">
                                <strong><span>Operational cost savings (£):</span></strong>
                                <span id="Operationalcostsavings"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="column-holder">
                            <div class="icon-box">
                                <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                            </div>
                            <div class="result-heading">
                                <strong><span>Capital cost savings over buying new electric buses (£):</span></strong>
                                <span id="Capitalcostsavingsoverbuyingnewelectricbuses"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
            $annual_average_distance_travel = input_value(parseFloat(jQuery('input[name="annual_average_distance_travel"]').val()));
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


            $TotalCO2savings = Math.round(($BlendedaverageCO2saving + $IncrementalCO2benefitvsNewBEV) * $no_of_buses_converted * $remaining_life * $annual_average_distance_travel / 1000000);
            $TotalNOxdamagecostsavings = Math.round($annual_average_distance_travel * $remaining_life * $no_of_buses_converted * $NOxRoadTransport * $BlendedaverageNOxsaving / 1000000);
            $TotalParticulateMatterdamagecostsavings = Math.round($annual_average_distance_travel * $remaining_life * $no_of_buses_converted * $ParticulateMatterRoadTransport * $BlendedaveragePMsaving / 1000000);
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

<script>
    jQuery(document).ready(function() {
        range_slider('slider-range-annual_average_distance_travel', 'annual_average_distance_travel');
        range_slider('slider-range-num_of_buses', 'num_of_buses');
        range_slider('slider-range-average_remaining_life', 'average_remaining_life');
        range_slider('slider-range-existing_vehicle_service_and_maintenance_cost', 'existing_vehicle_service_and_maintenance_cost');

        function range_slider($range_id, $input_id) {
            var rangeSlider = document.getElementById($range_id);
            start = parseInt(rangeSlider.getAttribute("start"));
            min = parseInt(rangeSlider.getAttribute("min"));
            max = parseInt(rangeSlider.getAttribute("max"));
            noUiSlider.create(rangeSlider, {
                start: [start],
                connect: 'lower',
                range: {
                    'min': [min],
                    'max': [max]
                },
                format: {
                    // 'to' the formatted value. Receives a number.
                    to: function(value) {
                        return Math.round(value);
                    },
                    // 'from' the formatted value.
                    // Receives a string, should return a number.
                    from: function(value) {
                        return Number(Math.round(value));
                    }
                }
            });

            var inputFormat = document.getElementById($input_id);
            rangeSlider.noUiSlider.on('update', function(values, handle) {
                inputFormat.value = values[handle];
            });

            inputFormat.addEventListener('change', function() {
                rangeSlider.noUiSlider.set(this.value);
            });

        }

    });
</script>