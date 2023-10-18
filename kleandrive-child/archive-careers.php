<?php

/**
 * The template for displaying any archive page.
 */
get_header();

$terms = _get_terms_details('careers-category');

?>
<main id="main">
	<?php get_template_part('template-parts/archive/archive', 'banner') ?>
	<section class="careers-archive background-light">
		<div class="container container wide w-960">
			<div class="filter-wrapper justify-space-between align--center">
				<div class="inner">
					<h2 class="m-0">Open positions</h2>
				</div>
				<div class="inner">
					<select id="location" name="location" class="nice-select-js nice-select-style-1 nice-select-transparent">
						<option value=""> All Locations </option>
						<?php if ($terms) { ?>
							<?php foreach ($terms as $key => $term) { ?>
								<?php
								if ($main_query->term_id == $key) {
									$selected = 'selected';
								} else {
									$selected = '';
								}
								?>
								<option <?= $selected ?> value="<?= $key ?>"> <?= $term['name'] ?> </option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
			</div>
			<div id="results">
				<div class="results-holder">
					<div class="career-wrapper">
						<?php
						while (have_posts()) {
							the_post(); ?>
							<?php
							$postterms = get_the_terms(get_the_ID(), 'location');
							$salary = carbon_get_the_post_meta('salary');
							$accordion = carbon_get_the_post_meta('accordion');
							?>

							<div class="career-holder background-white post-item">
								<div class="inner">
									<div class="header justify-space-between">
										<div class="career-title align-center">
											<h3><?php the_title() ?></h3>
											<span class="salary">£ <?= $salary ?></span>
										</div>
										<div class="location align-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="10.908" height="15.583" viewBox="0 0 10.908 15.583">
												<path id="Icon_material-location-on" data-name="Icon material-location-on" d="M12.954,3A5.45,5.45,0,0,0,7.5,8.454c0,4.091,5.454,10.129,5.454,10.129s5.454-6.038,5.454-10.129A5.45,5.45,0,0,0,12.954,3Zm0,7.4A1.948,1.948,0,1,1,14.9,8.454,1.949,1.949,0,0,1,12.954,10.4Z" transform="translate(-7.5 -3)" fill="#001f2b" />
											</svg>
											<span>
												<?php foreach ($postterms as $postterm) { ?>
													<span><?= $postterm->name ?></span>
												<?php } ?>
											</span>
										</div>
									</div>
									<div class="body">
										<div class="career-description d-none d-sm-block">
											<?php the_content() ?>
										</div>
										<?php if ($accordion) { ?>
											<div class="accordion-holder accordion-style-1">
												<div class="accordion" id="accordion-<?= get_the_ID() ?>">
													<div class="accordion-item d-block d-sm-none">
														<h2 class="accordion-header" id="heading<?= get_the_ID() . '-description'  ?>">
															<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= get_the_ID() . '-description'  ?>" aria-expanded="false" aria-controls="collapse<?= get_the_ID() . '-description'  ?>">
																<i class="fa-solid fa-plus"></i>
																<i class="fa-solid fa-minus"></i>
																<span> Job Description </span>
															</button>
														</h2>
														<div id="collapse<?= get_the_ID() . '-description'  ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= get_the_ID() . '-description'  ?>" data-bs-parent="#accordion-<?= get_the_ID() ?>">
															<div class="accordion-body">
																<?php the_content() ?>
															</div>
														</div>
													</div>
													<?php foreach ($accordion as $key => $acc) { ?>
														<div class="accordion-item">
															<h2 class="accordion-header" id="heading<?= get_the_ID() . '-' . $key ?>">
																<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= get_the_ID() . '-' . $key ?>" aria-expanded="false" aria-controls="collapse<?= get_the_ID() . '-' . $key ?>">
																	<i class="fa-solid fa-plus"></i>
																	<i class="fa-solid fa-minus"></i>
																	<span> <?= $acc['accordion_title'] ?></span>
																</button>
															</h2>
															<div id="collapse<?= get_the_ID() . '-' . $key ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= get_the_ID() . '-' . $key ?>" data-bs-parent="#accordion-<?= get_the_ID() ?>">
																<div class="accordion-body">
																	<?= wpautop($acc['accordion_content']) ?>
																</div>
															</div>
														</div>
													<?php } ?>

												</div>
											</div>
										<?php } ?>
									</div>
									<div class="footer">
										<div class="sc_item_button sc_button_wrap">
											<button data-title="<?php the_title() ?>" data-bs-toggle="modal" data-bs-target="#applyModal" class="sc_button sc_button_bordered sc_button_size_normal sc_button_icon_left color_style_link3">
												<span class="sc_button_text"><span class="sc_button_title">Apply Now</span></span>
											</button>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="load-more text-center">
				<a href="#" id="load-more-careers" class="d-none underline-link">
					<span>Load more</span>
					<i class="fa-solid fa-spinner"></i>
				</a>
			</div>
		</div>
	</section>
	<!-- Modal -->
	<div class="modal right fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
		<div class="modal-dialog align-center">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="applyModalLabel">Apply for our <span></span> position</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body contact-form-v2">
					<?= do_shortcode(carbon_get_theme_option('careers_contact_form')) ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>

<script>
	jQuery(document).ready(function($) {
		jQuery('#location').change();

		jQuery(document).on("click", '.apply-button', function(event) {
			$title = jQuery(this).attr('data-title');
			jQuery('input[name="position"]').val($title);
			jQuery('.modal-title span').text($title);
		});

		jQuery('.select-file').click(function(event) {
			jQuery('input[name="CV"]').click();
		});

		jQuery('input[name="CV"]').change(function(event) {
			jQuery('.fake-input').text(jQuery(this).val().replace(/C:\\fakepath\\/i, ''));
			jQuery('.form-file').addClass('focused');
		});
	});

	jQuery('#applyModal').on('show.bs.modal', function(e) {
		jQuery('html').addClass('overflow-hidden');
	})
	jQuery('#applyModal').on('hide.bs.modal', function(e) {
		jQuery('html').removeClass('overflow-hidden');
	})
</script>