<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Savings Calculator
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header() ?>

<?php
$description = carbon_get_the_post_meta('description');
function slider_range($label, $measurement, $id)
{
    ob_start();
    $description = carbon_get_theme_option($id . '_desc');
    $min = carbon_get_theme_option($id . '_min');
    $max = carbon_get_theme_option($id . '_max');
    $start = carbon_get_theme_option($id . '_start');
?>
    <div class="slider-input-holder">
        <div class="label">
            <label for="<?= $id ?>" class="form-label"><?= $label ?></label>
        </div>
        <div class="slider-input mb-3">
            <input type="text" class="calculation-input" id="<?= $id ?>" name="<?= $id ?>">
            <?= $measurement ?>
        </div>
        <div class="row justify-content-space-between">
            <div class="min col-auto"><?= $min ?> <?= $measurement ?></div>
            <div class="col range-holder">
                <div class="slider-handles" id="slider-range-<?= $id ?>" min="<?= $min ?>" max="<?= $max ?>" start="<?= $start ? $start : 0 ?>"></div>
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
                            <button class="nav-link text-start" id="v-pills-fuel-costs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fuel-costs" type="button" role="tab" aria-controls="v-pills-fuel-costs" aria-selected="false">
                                <span class="icon"><img src="<?= get_stylesheet_directory_uri() . '/assets/images/pound.png' ?>"></span>
                                <span class="text"> Fuel Costs </span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8" id="calculator-slider">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-number-of-buses-converted" role="tabpanel" aria-labelledby="v-pills-number-of-buses-converted-tab">
                            <?= slider_range('Number of buses to be Repowered', 'buses', 'num_of_buses') ?>
                            <div class="slider-input-holder">
                                <div class="label mt-5">
                                    <label for="num_of_buses" class="form-label">Are they single or double deck buses</label>
                                </div>
                                <select name="single_or_double" id="single_or_double">
                                    <option value="single"> Single </option>
                                    <option value="double" selected> Double </option>
                                </select>
                                <div class="description mt-3">
                                    <p>Double deckers are generally heavier and have worst fuel consumption so our calculator accounts for this difference. Plus new vehicles and repowering costs varying with this distinction.</p>
                                </div>
                            </div>
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
                        <div class="tab-pane fade" id="v-pills-fuel-costs" role="tabpanel" aria-labelledby="v-pills-fuel-costs-tab">
                            <?php
                            $diesel = carbon_get_theme_option('diesel');
                            $electricity = carbon_get_theme_option('electricity');
                            ?>
                            <div class="slider-input-holder">
                                <div class="label">
                                    <label for="cost_of_diesel" class="form-label">Current cost of diesel £/litre</label>
                                </div>
                                <div class="slider-input mb-3">
                                    <input type="text" class="calculation-input fill_inited" id="cost_of_diesel" name="Wholesale price of diesel (Large Fleet Operator)" value="<?= $diesel ?>">
                                    £
                                </div>
                                <div class="description mt-3">
                                    <p>
                                        By accurately knowing what you are paying for diesel, we can refine our model accuracy.
                                    </p>
                                </div>
                            </div>
                            <div class="slider-input-holder">
                                <div class="label">
                                    <label for="cost_of_electricity" class="form-label">Cost of electricity £/kWh</label>
                                </div>
                                <div class="slider-input mb-3">
                                    <input type="text" class="calculation-input fill_inited" id="cost_of_electricity" name="Cost of electricity per kWh" value="<?= $electricity ?>">
                                    £
                                </div>
                                <div class="description mt-3">
                                    <p>
                                        Our KleanDrive partners can typically arrange Power Purchase Agreements (PPA) at only £0.11 p/kWh, however, if you are locked into a PPA today, please tell us the rate to refine our model assumptions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="calculator">

        <?php

        $elegible_for_bsog = carbon_get_theme_option('elegible_for_bsog');
        $elegible_for_nsg = carbon_get_theme_option('elegible_for_nsg');
        $bsog_nsg_rate = carbon_get_theme_option('bsog_nsg_rate');
        $bsog_nsg_rate_repowered = carbon_get_theme_option('bsog_nsg_rate_repowered');
        ?>

        <!--- Damage cost assumptions --->
        <input type="hidden" name="NOx Road Transport / tonne (£2022)" value="17892.6280819244">
        <input type="hidden" name="Particulate Matter Road Transport PM2.5/ tonne (£2002)" value="130884.092045588">

        <!--- Other assumptions Double --->
        <input type="hidden" name="Blended average CO2 saving per 1 DD vehicle/ km (g)" value="1548.869578125">
        <input type="hidden" name="Blended average NOx saving per 1 DD vehicle/ km (g)" value="5.08163528645833">
        <input type="hidden" name="Blended average PM saving per 1 DD vehicle/ km (g)" value="0.0335630859375">
        <input type="hidden" name="Incremental CO2 benefit vs New DD BEV per 1 vehicle/ km (g)" value="277.2">
        <input type="hidden" name="Incremental double capital cost savings (new bev cost - repower)" value="325000">


        <!--- Other assumptions Single --->
        <input type="hidden" name="Blended average CO2 saving per 1 SD vehicle/ km (g)" value="1074.427078125">
        <input type="hidden" name="Blended average NOx saving per 1 SD vehicle/ km (g)" value=" 4.76161197916667">
        <input type="hidden" name="Blended average PM saving per 1 SD vehicle/ km (g)" value="0.0398515625">
        <input type="hidden" name="Incremental CO2 benefit vs New SD BEV per 1 vehicle/ km (g)" value="178.2">
        <input type="hidden" name="Incremental single captial cost savings (new bev cost - repower)" value="185000">


        <!--- Assumptions DIESEL--->
        <input type="hidden" name="Double Deck Bus – 6 MPG (47.1 litres/100km)" value="0.471">
        <input type="hidden" name="Single Deck Bus – 8 MPG (47.1 litres/100km)" value="0.353">
        <input type="hidden" name="Cost per km" value="">


        <!--- Assumptions ELECTRIC--->
        <input type="hidden" name="DD Battery Electric Energy Consumption (kWh/km)" value="1.15">
        <input type="hidden" name="SD Battery Electric Energy Consumption (kWh/km)" value="1.05">
        <input type="hidden" name="Cost per km Electric" value="">


        <input type="hidden" name="BSOG rate England Diesel" value="<?= $bsog_nsg_rate ?>">
        <input type="hidden" name="BSOG rate England Electric" value="<?= $bsog_nsg_rate_repowered ?>">




        <div class="form-part form-result">
            <div class="container">
                <div class="holder py-5">
                    <h4 class="mb-5">Estimated Impacts</h4>
                    <div class="results-box mb-4">
                        <h5>Capital & Lifetime Operational Savings</h5>
                        <div class="row g3">
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span> Capital cost savings over buying new electric buses </span></b>
                                        <span result="Capital cost savings over buying new electric buses"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span>Total Lifetime operational cost savings</span></b>
                                        <span result="Total Lifetime operational cost savings"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="results-box mb-4">
                        <h5>Annual Operational Savings</h5>
                        <div class="row g3">

                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span> Fuel savings </span></b>
                                        <span result="Fuel savings"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span> Maintenance saving </span></b>
                                        <span result="Maintenance saving"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder column-bosg-holder text-center">
                                    <div class="column-bosg ">
                                        <div class="result-icon">
                                            <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                        </div>
                                        <div class="result-heading">
                                            <b><span> Grant (BSOG/NSG) savings </span></b>
                                            <span result="Grant (BSOG/NSG) savings"></span>
                                        </div>

                                    </div>
                                    <div class="bosg-toggle">
                                        <!-- Rounded switch -->
                                        <p>
                                            Certified KleanDrive repowers attract increased BSOG payments in the UK. Click here if you're eligible.
                                            <label class="switch">
                                                <input type="checkbox" class="calculation-input" name="Grant (BSOG/NSG) savings">
                                                <span class="slider round"></span>
                                            </label>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span>Total Annual operational cost savings</span></b>
                                        <span result="Total Annual operational cost savings"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="results-box mb-4">
                        <h5>Environmental Impact</h5>
                        <div class="row g-3">
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span> Total CO2 saved </span></b>
                                        <span result="Total CO2 saved"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span>Total NOx damage costs saved</span></b>
                                        <span result="Total NOx damage costs saved"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="column-holder text-center">
                                    <div class="result-icon">
                                        <img src="https://kleandrive.earth/wp-content/themes/kleandrive-child/assets/images/bus.png">
                                    </div>
                                    <div class="result-heading">
                                        <b><span>Total Particulate Matter damage costs saved</span></b>
                                        <span result="Total Particulate Matter damage costs saved"></span>
                                    </div>
                                </div>
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

        jQuery('#calculate').click(function(e) {
            $annual_average_distance_travel = input_value(input_value(parseFloat(jQuery('input[name="annual_average_distance_travel"]').val())));




            //jQuery('#Capitalcostsavingsoverbuyingnewelectricbuses').text($Capitalcostsavingsoverbuyingnewelectricbuses.toLocaleString('en-US'));



            e.preventDefault();

        });
    });
</script>
<?php get_footer() ?>

<script>
    jQuery(document).ready(function() {
        range_slider('slider-range-annual_average_distance_travel', 'annual_average_distance_travel', false);
        range_slider('slider-range-num_of_buses', 'num_of_buses', false);
        range_slider('slider-range-average_remaining_life', 'average_remaining_life', true);
        range_slider('slider-range-existing_vehicle_service_and_maintenance_cost', 'existing_vehicle_service_and_maintenance_cost', false);

        function range_slider($range_id, $input_id, $allow_decimal = false) {
            var rangeSlider = document.getElementById($range_id);
            start = parseFloat(rangeSlider.getAttribute("start"));
            min = parseFloat(rangeSlider.getAttribute("min"));
            max = parseFloat(rangeSlider.getAttribute("max"));
            if ($allow_decimal) {
                noUiSlider.create(rangeSlider, {
                    start: [start],
                    connect: 'lower',
                    step: 0.5,
                    range: {
                        'min': [min],
                        'max': [max]
                    },
                    format: {
                        // 'to' the formatted value. Receives a number.
                        to: function(value) {
                            return parseFloat(value).toFixed(1);
                        },
                        // 'from' the formatted value.
                        // Receives a string, should return a number.
                        from: function(value) {
                            return Number(parseFloat(value).toFixed(1));
                        }
                    }
                });
            } else {
                noUiSlider.create(rangeSlider, {
                    start: [start],
                    connect: 'lower',
                    step: 1,
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
            }


            var inputFormat = document.getElementById($input_id);
            rangeSlider.noUiSlider.on('update', function(values, handle) {
                inputFormat.value = values[handle];

                calculate();

            });

            inputFormat.addEventListener('change', function() {
                rangeSlider.noUiSlider.set(this.value);
            });
        }

    });

    jQuery('#single_or_double').change(function(e) {
        calculate();
    });

    jQuery('.calculation-input').change(function(e) {
        calculate();
    });

    jQuery('.calculation-input').keyup(function(e) {
        calculate();
    });

    function input_value($input) {
        if ($input) {
            return $input;
        } else {
            return 0;
        }
    }

    function calculate() {
        num_of_buses = input_value(parseFloat(jQuery('input[name="num_of_buses"]').val()));
        annual_average_distance_travel = input_value(parseFloat(jQuery('input[name="annual_average_distance_travel"]').val()));
        average_remaining_life = input_value(parseFloat(jQuery('input[name="average_remaining_life"]').val()));
        existing_vehicle_service_and_maintenance_cost = input_value(parseFloat(jQuery('input[name="existing_vehicle_service_and_maintenance_cost"]').val()));

        Wholesale_price_of_diesel = input_value(parseFloat(jQuery('input[name="Wholesale price of diesel (Large Fleet Operator)"]').val()));
        Double_Deck_Bus_6_MPG = input_value(parseFloat(jQuery('input[name="Double Deck Bus – 6 MPG (47.1 litres/100km)"]').val()));
        Single_Deck_Bus_8_MPG = input_value(parseFloat(jQuery('input[name="Single Deck Bus – 8 MPG (47.1 litres/100km)"]').val()));
        Cost_of_electricity_per_kWh = input_value(parseFloat(jQuery('input[name="Cost of electricity per kWh"]').val()));
        NOx_Road_Transport = input_value(parseFloat(jQuery('input[name="NOx Road Transport / tonne (£2022)"]').val()));
        Particulate_Matter_Road_Transport = input_value(parseFloat(jQuery('input[name="Particulate Matter Road Transport PM2.5/ tonne (£2002)"]').val()));
        Cost_per_km = input_value(parseFloat(jQuery('input[name="Cost per km"]').val()));
        Cost_per_km_electric = input_value(parseFloat(jQuery('input[name="Cost per km Electric"]').val()));
        Current_Rate_of_BSOG = input_value(parseFloat(jQuery('input[name="Current Rate of BSOG"]').val()));

        DD_Battery_Electric_Energy_Consumption = input_value(parseFloat(jQuery('input[name="DD Battery Electric Energy Consumption (kWh/km)"]').val()));
        SD_Battery_Electric_Energy_Consumption = input_value(parseFloat(jQuery('input[name="SD Battery Electric Energy Consumption (kWh/km)"]').val()));

        Blended_average_CO2_saving_per_1_DD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average CO2 saving per 1 DD vehicle/ km (g)"]').val()));
        Blended_average_CO2_saving_per_1_SD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average CO2 saving per 1 SD vehicle/ km (g)"]').val()));

        Blended_average_PM_saving_per_1_DD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average PM saving per 1 DD vehicle/ km (g)"]').val()));
        Blended_average_PM_saving_per_1_SD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average PM saving per 1 SD vehicle/ km (g)"]').val()));

        Blended_average_NOx_saving_per_1_SD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average NOx saving per 1 SD vehicle/ km (g)"]').val()));
        Blended_average_NOx_saving_per_1_DD_vehicle = input_value(parseFloat(jQuery('input[name="Blended average NOx saving per 1 DD vehicle/ km (g)"]').val()));

        Incremental_CO2_benefit_vs_New_SD_BEV_per_1_vehicle = input_value(parseFloat(jQuery('input[name="Incremental CO2 benefit vs New SD BEV per 1 vehicle/ km (g)"]').val()));
        Incremental_CO2_benefit_vs_New_DD_BEV_per_1_vehicle = input_value(parseFloat(jQuery('input[name="Incremental CO2 benefit vs New DD BEV per 1 vehicle/ km (g)"]').val()));

        Incremental_single_captial_cost_savings = input_value(parseFloat(jQuery('input[name="Incremental single captial cost savings (new bev cost - repower)"]').val()));
        Incremental_double_captial_cost_savings = input_value(parseFloat(jQuery('input[name="Incremental double capital cost savings (new bev cost - repower)"]').val()));

        BSOG_rate_England_Diesel = input_value(parseFloat(jQuery('input[name="BSOG rate England Diesel"]').val()))
        BSOG_rate_England_Electric = input_value(parseFloat(jQuery('input[name="BSOG rate England Electric"]').val()))





        single_or_double = jQuery('#single_or_double').val();
        Grant_BSOG_NSG_savings_toggle = jQuery('input[name="Grant (BSOG/NSG) savings"]');

        //Compute Cost per km
        Cost_per_km_val = Wholesale_price_of_diesel * Double_Deck_Bus_6_MPG;
        jQuery('input[name="Cost per km"]').val(Cost_per_km_val);

        //Compute Cost per km Electric
        //Compute Total CO2 saved
        if (single_or_double == 'double') {
            Cost_per_km_val = Cost_of_electricity_per_kWh * DD_Battery_Electric_Energy_Consumption;
        } else {
            Cost_per_km_val = Cost_of_electricity_per_kWh * SD_Battery_Electric_Energy_Consumption;
        }
        jQuery('input[name="Cost per km Electric"]').val(Cost_per_km_val);

        //Compute Total CO2 saved
        if (single_or_double == 'double') {
            total_co2_saved_val = (Blended_average_CO2_saving_per_1_DD_vehicle + Incremental_CO2_benefit_vs_New_DD_BEV_per_1_vehicle) * num_of_buses * average_remaining_life * annual_average_distance_travel / 1000000;
        } else {
            total_co2_saved_val = (Blended_average_CO2_saving_per_1_SD_vehicle + Incremental_CO2_benefit_vs_New_SD_BEV_per_1_vehicle) * num_of_buses * average_remaining_life * annual_average_distance_travel / 1000000;
        }

        jQuery('span[result="Total CO2 saved"]').html(parseFloat(total_co2_saved_val).toLocaleString('en-US') + '<div class="type">tonnes</div>');


        //Compute Total NOx damage costs saved
        if (single_or_double == 'double') {
            Total_NOx_damage_costs_saved = annual_average_distance_travel * average_remaining_life * num_of_buses * NOx_Road_Transport * Blended_average_NOx_saving_per_1_DD_vehicle / 1000000;
        } else {
            Total_NOx_damage_costs_saved = annual_average_distance_travel * average_remaining_life * num_of_buses * NOx_Road_Transport * Blended_average_NOx_saving_per_1_SD_vehicle / 1000000;
        }
        jQuery('span[result="Total NOx damage costs saved"]').html('£' + parseFloat(Total_NOx_damage_costs_saved).toLocaleString('en-US'));

        //Compute Total Particulate Matter damage costs saved

        if (single_or_double == 'double') {
            Total_Particulate_Matter_damage_costs_saved = num_of_buses * average_remaining_life * annual_average_distance_travel * Blended_average_PM_saving_per_1_DD_vehicle * Particulate_Matter_Road_Transport / 1000000;
        } else {
            Total_Particulate_Matter_damage_costs_saved = num_of_buses * average_remaining_life * annual_average_distance_travel * Blended_average_PM_saving_per_1_SD_vehicle * Particulate_Matter_Road_Transport / 1000000;
        }
        jQuery('span[result="Total Particulate Matter damage costs saved"]').html('£' + parseFloat(Total_Particulate_Matter_damage_costs_saved).toLocaleString('en-US'));


        //Compute Grant (BSOG/NSG) savings
        Grant_BSOG_NSG_savings = (BSOG_rate_England_Electric - BSOG_rate_England_Diesel) * annual_average_distance_travel * num_of_buses * average_remaining_life;
        jQuery('span[result="Grant (BSOG/NSG) savings"]').html('£' + parseFloat(Grant_BSOG_NSG_savings).toLocaleString('en-US'));

        //Compute Fuel savings
        if (single_or_double == 'double') {
            Fuel_savings = annual_average_distance_travel * (((Wholesale_price_of_diesel * Double_Deck_Bus_6_MPG) - (Cost_of_electricity_per_kWh * DD_Battery_Electric_Energy_Consumption))) * average_remaining_life * num_of_buses;
        } else {
            Fuel_savings = annual_average_distance_travel * (((Wholesale_price_of_diesel * Single_Deck_Bus_8_MPG) - (Cost_of_electricity_per_kWh * SD_Battery_Electric_Energy_Consumption))) * average_remaining_life * num_of_buses;
        }
        jQuery('span[result="Fuel savings"]').html('£' + parseFloat(Fuel_savings).toLocaleString('en-US'));

        //Compute Maintenance saving
        Maintenance_saving = (existing_vehicle_service_and_maintenance_cost - 2750) * average_remaining_life * num_of_buses;
        jQuery('span[result="Maintenance saving"]').html('£' + parseFloat(Maintenance_saving).toLocaleString('en-US'));

        //Compute Total Lifetime operational cost savings 
        if (Grant_BSOG_NSG_savings_toggle.is(":checked")) {
            Total_Annual_operational_cost_savings = Fuel_savings + Maintenance_saving + Grant_BSOG_NSG_savings;
            jQuery('.column-bosg').addClass('active');
        } else {
            Total_Annual_operational_cost_savings = Fuel_savings + Maintenance_saving;
            jQuery('.column-bosg').removeClass('active');
        }
        jQuery('span[result="Total Annual operational cost savings"]').html('£' + parseFloat(Total_Annual_operational_cost_savings).toLocaleString('en-US'));


        //Compute Total Lifetime operational cost savings
        Total_Lifetime_operational_cost_savings = Total_Annual_operational_cost_savings * num_of_buses;
        jQuery('span[result="Total Lifetime operational cost savings').html('£' + parseFloat(Total_Lifetime_operational_cost_savings).toLocaleString('en-US'));

        //Compute Capital cost savings over buying new electric buses - DONE
        if (single_or_double == 'double') {
            Capital_cost_savings_over_buying_new_electric_buses = num_of_buses * Incremental_double_captial_cost_savings;
        } else {
            Capital_cost_savings_over_buying_new_electric_buses = num_of_buses * Incremental_single_captial_cost_savings;
        }
        jQuery('span[result="Capital cost savings over buying new electric buses"]').html('£' + parseFloat(Capital_cost_savings_over_buying_new_electric_buses).toLocaleString('en-US'));


    }
</script>