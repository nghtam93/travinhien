<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<header class="header__title">
	            <div class="box__title">
	                <h2 class="title__box"><span><?php echo esc_html( $heading ); ?></span></h2>
	            </div>
	        </header>
		<?php endif; ?>
		
		<div class="flickity" data-flickity='{ "wrapAround": true, "cellAlign": "left", "pageDots": true, "prevNextButtons": false}'>
			<?php foreach ( $related_products as $related_product ) : ?>
				<div class="slider__item__wrap col-6 col-md-3 col-lg-20">
					<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

<?php endif;

wp_reset_postdata();
