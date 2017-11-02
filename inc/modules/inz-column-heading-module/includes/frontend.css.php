.fl-node-<?php echo $id; ?>.fl-module-inz-column-heading-module .fl-heading {
	margin: 0;
	text-align: <?php echo $settings->alignment; ?>;
	<?php if ( 'custom' == $settings->font_size ) : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
	<?php if ( 'custom' == $settings->line_height ) : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if ( 'custom' == $settings->letter_spacing ) : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
}
<?php if ( ! empty( $settings->color ) ) : ?>
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading a,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text *,
.fl-row .fl-col .fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>
<?php if ( ! empty( $settings->font ) && 'Default' != $settings->font['family'] ) : ?>
.fl-node-<?php echo $id; ?> .fl-heading .fl-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>

<?php if ( ! empty( $settings->background_color ) && 'color' === $settings->background_type ) : ?>
.fl-node-<?php echo $id; ?> {
	background-color: #<?php echo $settings->background_color; ?>;
}
<?php endif; ?>

<?php if ( 'gradient' === $settings->background_type ) : ?>
.fl-node-<?php echo $id; ?> {
	background: linear-gradient(<?php echo $settings->deg; ?>deg, #<?php echo $settings->end_color; ?>, #<?php echo $settings->start_color; ?>);
}
<?php endif; ?>


<?php if ( $global_settings->responsive_enabled && ( 'custom' == $settings->r_font_size || 'custom' == $settings->r_alignment || 'custom' == $settings->r_line_height || 'custom' == $settings->r_letter_spacing ) ) : ?>
@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {

	<?php if ( 'custom' == $settings->r_font_size ) : ?>
	.fl-node-<?php echo $id; ?>.fl-module-inz-column-heading-module .fl-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>

	<?php if ( 'custom' == $settings->r_alignment ) : ?>
	.fl-node-<?php echo $id; ?>.fl-module-inz-column-heading-module .fl-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if ( 'custom' == $settings->r_line_height ) : ?>
	.fl-node-<?php echo $id; ?>.fl-module-inz-column-heading-module .fl-heading {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if ( 'custom' == $settings->r_letter_spacing ) : ?>
	.fl-node-<?php echo $id; ?>.fl-module-inz-column-heading-module .fl-heading {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}
<?php endif; ?>
