<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$pageID = get_option('page_on_front');
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php if(is_shop()): ?>
<div class="wrap__page">
    <section class="home-tea -archive">
    <div class="home-tea__bg" style="background-image: url(<?= get_theme_file_uri('assets/img/home-tea-bg.jpg') ?>);"></div>
    <div class="container">
      <div class="sc__header text-center">
        <h2 class="sc__header__title wow fadeInLeft"><i class="icon-tea-cup"></i><?php the_field('gproduct_title',$pageID) ?></h2>
        <div class="sc__header__sub wow fadeInRight"><?php the_field('gproduct_sub',$pageID) ?></div>
      </div>
      <!-- sc__header -->
      <?php
      if( have_rows('gproduct_items',$pageID) ):?>
        <div class="el__list">
            <?php
            $i=0;
            while( have_rows('gproduct_items',$pageID) ) : the_row(); $i++;
            $image_attributes = wp_get_attachment_image_src( get_sub_field('image') );
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $link = get_sub_field('link');
            $class = ($i == 1 || $i == 2) ? 'fadeInRight' : 'fadeInLeft';
              ?>
              <div class="el__item <?php echo ($i== 1 || $i==4) ? '-large' : ''; ?> wow <?= $class ?>" style="background-image: url(<?= $image_attributes[0]; ?>);">
                <h3 class="el__item__title"><?php echo $title ?></h3>
                <div class="el__item__detail"><?php echo $content ?></div>
                <div class="el__item__info d-flex align-items-center">
                  <a href="<?php the_permalink($link) ?>" class="btn btn-primary">Xem thông tin</a>
                  <!-- <a href="#" class="-cart"><i class="icon-cart-plus"></i></a> -->
                </div>
              </div>
            <?php endwhile; ?>
        </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>

    </div>
  </section>

  <section class="home-odd-tea -archive">
    <div class="container">
      <div class="sc__header text-center">
        <h2 class="sc__header__title wow fadeInLeft"><i class="icon-tea-cup"></i><?php the_field('trale_title',$pageID) ?></h2>
        <div class="sc__header__sub wow fadeInRight"><?php the_field('trale_sub',$pageID) ?></div>
      </div>
      <?php
      $post_type = "product";
      $taxonomy = $post_type.'_cat';
      $trale_cat = get_field('trale_cat',$pageID);
      $args = array(
          'post_type' => $post_type,
          'posts_per_page' =>50,
          'tax_query' => array(
              array(
                  'taxonomy' => $taxonomy,
                  'field'    => 'term_id',
                  'terms'    =>$trale_cat,
              ),
          ),
      );
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) : ?>
          <div class="row el__product row-cols-2 row-cols-md-4 row-cols-xl-5 mb-5 g-2 g-sm-3 justify-content-center">

              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col wow fadeInUp">
                  <?php wc_get_template_part( 'content', 'product' );; ?>
                </div>
              <?php endwhile; ?>
          </div>
          <?php wp_reset_postdata(); ?>
      <?php else :
          get_template_part( 'template-parts/content', 'none' );
      endif; ?>
    </div>
  </section>
  <!-- end setion home-odd-tea -->

</div>

<?php else: ?>
  <div class="wrap__page -single">
  	<div class="dn__breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
  	  <div class="container">
  	    <?php if(function_exists('bcn_display'))
  	    {
  	        bcn_display();
  	    }?>
  	  </div>
  	</div>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-12 col-lg-12 order-lg-2">
  				<div class="archive__content">
  					<header class="woocommerce-products-header sc__header text-center">
  						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
  							<h1 class="woocommerce-products-header__title page-title sc__header__title"><span><?php woocommerce_page_title(); ?></span></h1>
  						<?php endif; ?>

  						<?php
  						/**
  						 * Hook: woocommerce_archive_description.
  						 *
  						 * @hooked woocommerce_taxonomy_archive_description - 10
  						 * @hooked woocommerce_product_archive_description - 10
  						 */
  						//do_action( 'woocommerce_archive_description' );
  						?>
  					</header>

  					<?php
  						if ( woocommerce_product_loop() ) {
  							echo '<div class="wrap__archive--product g-2 g-sm-3">';
  							/**
  							 * Hook: woocommerce_before_shop_loop.
  							 *
  							 * @hooked wc_print_notices - 10
  							 * @hooked woocommerce_result_count - 20
  							 * @hooked woocommerce_catalog_ordering - 30
  							 */
  							do_action( 'woocommerce_before_shop_loop' );
  							echo '</div>';

  							woocommerce_product_loop_start();

  							if ( wc_get_loop_prop( 'total' ) ) {
  								while ( have_posts() ) {
  									the_post();

  									/**
  									 * Hook: woocommerce_shop_loop.
  									 *
  									 * @hooked WC_Structured_Data::generate_product_data() - 10
  									 */
  									do_action( 'woocommerce_shop_loop' );

  									echo '<div class="col-md-3 col-6 col-xl-20">';
  										wc_get_template_part( 'content', 'product' );
  									echo '</div>';
  								}
  							}

  							woocommerce_product_loop_end();
  							/**
  							 * Hook: woocommerce_after_shop_loop.
  							 *
  							 * @hooked woocommerce_pagination - 10
  							 */
  							do_action( 'woocommerce_after_shop_loop' );
  						} else {
  							/**
  							 * Hook: woocommerce_no_products_found.
  							 *
  							 * @hooked wc_no_products_found - 10
  							 */
  							do_action( 'woocommerce_no_products_found' );
  						}
  					?>
  				</div>
  			</div><!-- end col-md-9 -->

  		</div>
  	</div>
  </div>
<?php endif; ?>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
