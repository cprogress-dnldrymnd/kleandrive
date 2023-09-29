<div class="front_page_section front_page_section_testimonials<?php
	$planty_scheme = planty_get_theme_option( 'front_page_testimonials_scheme' );
	if ( ! empty( $planty_scheme ) && ! planty_is_inherit( $planty_scheme ) ) {
		echo ' scheme_' . esc_attr( $planty_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( planty_get_theme_option( 'front_page_testimonials_paddings' ) );
	if ( planty_get_theme_option( 'front_page_testimonials_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$planty_css      = '';
		$planty_bg_image = planty_get_theme_option( 'front_page_testimonials_bg_image' );
		if ( ! empty( $planty_bg_image ) ) {
			$planty_css .= 'background-image: url(' . esc_url( planty_get_attachment_url( $planty_bg_image ) ) . ');';
		}
		if ( ! empty( $planty_css ) ) {
			echo ' style="' . esc_attr( $planty_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$planty_anchor_icon = planty_get_theme_option( 'front_page_testimonials_anchor_icon' );
	$planty_anchor_text = planty_get_theme_option( 'front_page_testimonials_anchor_text' );
if ( ( ! empty( $planty_anchor_icon ) || ! empty( $planty_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_testimonials"'
									. ( ! empty( $planty_anchor_icon ) ? ' icon="' . esc_attr( $planty_anchor_icon ) . '"' : '' )
									. ( ! empty( $planty_anchor_text ) ? ' title="' . esc_attr( $planty_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_testimonials_inner
	<?php
	if ( planty_get_theme_option( 'front_page_testimonials_fullheight' ) ) {
		echo ' planty-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$planty_css      = '';
			$planty_bg_mask  = planty_get_theme_option( 'front_page_testimonials_bg_mask' );
			$planty_bg_color_type = planty_get_theme_option( 'front_page_testimonials_bg_color_type' );
			if ( 'custom' == $planty_bg_color_type ) {
				$planty_bg_color = planty_get_theme_option( 'front_page_testimonials_bg_color' );
			} elseif ( 'scheme_bg_color' == $planty_bg_color_type ) {
				$planty_bg_color = planty_get_scheme_color( 'bg_color', $planty_scheme );
			} else {
				$planty_bg_color = '';
			}
			if ( ! empty( $planty_bg_color ) && $planty_bg_mask > 0 ) {
				$planty_css .= 'background-color: ' . esc_attr(
					1 == $planty_bg_mask ? $planty_bg_color : planty_hex2rgba( $planty_bg_color, $planty_bg_mask )
				) . ';';
			}
			if ( ! empty( $planty_css ) ) {
				echo ' style="' . esc_attr( $planty_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_testimonials_content_wrap content_wrap">
			<?php
			// Caption
			$planty_caption = planty_get_theme_option( 'front_page_testimonials_caption' );
			if ( ! empty( $planty_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_testimonials_caption front_page_block_<?php echo ! empty( $planty_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $planty_caption, 'planty_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$planty_description = planty_get_theme_option( 'front_page_testimonials_description' );
			if ( ! empty( $planty_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_testimonials_description front_page_block_<?php echo ! empty( $planty_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $planty_description ), 'planty_kses_content' ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_testimonials_output">
				<?php
				if ( is_active_sidebar( 'front_page_testimonials_widgets' ) ) {
					dynamic_sidebar( 'front_page_testimonials_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! planty_exists_trx_addons() ) {
						planty_customizer_need_trx_addons_message();
					} else {
						planty_customizer_need_widgets_message( 'front_page_testimonials_caption', 'ThemeREX Addons - Testimonials' );
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
