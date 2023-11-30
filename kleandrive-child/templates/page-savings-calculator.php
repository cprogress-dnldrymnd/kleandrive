<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Savings Calculator
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php
$process = carbon_get_the_post_meta('process');
$description = carbon_get_the_post_meta('description');

function slider_range($label, $measurement, $id, $min, $max, $start = 0)
{
    ob_start();
?>
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
            <div class="slider-handles" id="slider-range-<?= $id ?>" min="<?= $min ?>" max="<?= $max ?>" start="<?= $start ?>"></div>
        </div>
        <div class="max col-auto"><?= $max ?> <?= $measurement ?></div>
    </div>
<?php
    return ob_get_clean();
}
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
                                <span class="text">Annual mileage (km)</span>
                            </button>
                            <button class="nav-link text-start" id="v-pills-remaining-life-tab" data-bs-toggle="pill" data-bs-target="#v-pills-remaining-life" type="button" role="tab" aria-controls="v-pills-remaining-life" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/calendar.png' ?>"></span>
                                <span class="text">Remaining life (Yrs)</span>
                            </button>
                            <button class="nav-link text-start" id="v-pills-Estimated-annual-operational-costs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Estimated-annual-operational-costs" type="button" role="tab" aria-controls="v-pills-Estimated-annual-operational-costs" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/pound.png' ?>"></span>
                                <span class="text">Estimated annual operational costs for existing bus</span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8" id="calculator-slider">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-number-of-buses-converted" role="tabpanel" aria-labelledby="v-pills-number-of-buses-converted-tab">
                            <?= slider_range('Number of buses to be Repowered', 'buses', 'number_of_buses', '0', '100') ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-annual-mileage" role="tabpanel" aria-labelledby="v-pills-annual-mileage-tab">
                            <?= slider_range('Annual mileage (km)', 'km', 'annual_mileage', '0', '100000') ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-remaining-life" role="tabpanel" aria-labelledby="v-pills-remaining-life-tab">
                            <div class="label">
                                <label for="number_of_buses" class="form-label">Are they single or double deck buses</label>
                            </div>
                            <select name="single_or_double" id="single_or_double">
                                <option value="single"> Single </option>
                                <option value="double"> Double </option>
                            </select>
                        </div>

                        <div class="tab-pane fade" id="v-pills-Estimated-annual-operational-costs" role="tabpanel" aria-labelledby="v-pills-Estimated-annual-operational-costs-tab">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="calculator">
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
                    <h4 class="mb-5">Summary outputs</h4>
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

<script>
    jQuery(document).ready(function() {
        range_slider('slider-range-annual_mileage', 'annual_mileage');
        range_slider('slider-range-number_of_buses', 'number_of_buses');

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