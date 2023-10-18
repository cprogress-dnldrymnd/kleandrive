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
					<div class="row">
						<?php
						if (have_posts()) {
							while (have_posts()) {
								the_post();
								$company_logo = carbon_get_the_post_meta('company_logo');
								if (get_post_type() == 'inthepress') {
									$permalink = carbon_get_the_post_meta('redirect_url');
									$target = 'target="_blank"';
								} else {
									$permalink = get_the_permalink();
									$target = '';
								}
						?>
								<div class="col-lg-4 col-md-6 post-item">
									<div class="column-holder post-holder">
										<article class="post post-<?= get_the_ID()  ?>">
											<a href="<?= $permalink ?>" class="post-image-link" <?= $target ?>>
												<?php
												$DisplayData->image(get_post_thumbnail_id(), 'large', false);
												?>
												<?php if ($post_type == 'post') { ?>
													<div class="date">
														<?= get_the_date('jS F Y') ?>
													</div>
												<?php } ?>
											</a>
											<div class="content-holder <?= $company_logo ? 'has-logo' : '' ?>">
												<?php get_template_part('template-parts/archive/archive', 'category') ?>

												<?php if ($company_logo) { ?>
													<?php $DisplayData->image(carbon_get_the_post_meta('company_logo'), 'medium', false, 'company-logo') ?>
												<?php } ?>

												<a href="<?= $permalink ?>" <?= $target ?>>
													<?php
													$DisplayData->heading(get_the_title(), 'h3', false, false)
													?>
												</a>
											</div>

											<a href="<?= $permalink ?>" class="arrow-con background-accent arrow-box" <?= $target ?>>
												<span class="arrow right"><span></span></span>
											</a>
										</article>
									</div>
								</div>
							<?php }
						} else {
							?>
							<h2>No Results Found</h2>
						<?php
						}
						?>
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