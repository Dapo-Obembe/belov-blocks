<?php
/**
 * France Gallery Block Template.
 *
 * @package @belovdigital
 */

// Support custom "anchor" values.
$custom_id = 'france' . $block['id'];

if ( ! empty( $block['anchor'] ) ) {
	$custom_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'france';
if ( ! empty( $block['class_name'] ) ) {
	$class_name .= ' ' . $block['class_name'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$block_title = get_field( 'block_title' );
if ( empty( $block_title ) ) {
	$block_title = 'Add a title here';
}

$background_color = get_field( 'background_color' ); // Let user change to background.
if ( empty( $background_color ) ) {
	$background_color = 'Pick a background color that matches';
}

// The item subfields are in the row block.
$all_items = get_field( 'france_items' );

?>

<section id="<?php echo esc_attr( $custom_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>"  style="background-color: <?php the_field( 'background_color' ); ?>">  
	<div class="container">
		<div class="container__row">
			<div class="container__row--col-one col">
					<?php if ( ! empty( $block_title ) ) { ?>
							<h2><?php echo esc_attr( $block_title ); ?></h2>
					<?php } ?>
			</div>
			<div class="container__row--col-two col">
					<?php if ( have_rows( 'france_items' ) ) : ?>
						<?php
						while ( have_rows( 'france_items' ) ) :
							the_row();

							// Variable to get the project image.
							$image            = get_sub_field( 'image' );
							$button_link      = get_sub_field( 'item_link' );
							$item_title       = get_sub_field( 'item_title' );
							$item_description = get_sub_field( 'item_description' );

							?>
							<div class="single-item">
								<?php echo wp_get_attachment_image( $image['id'] ); ?>
								<?php if ( ! empty( $item_title ) ) : ?>
									<h3><?php echo esc_html( $item_title ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $item_description ) ) : ?>
									<p><?php echo esc_html( $item_description ); ?></p>
								<?php endif; ?>			
								<?php if ( ! empty( $button_link ) ) : ?>
									<button><a href="<?php echo esc_html( $button_link ); ?>">CTA BUTTON</a></button>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
</section>
