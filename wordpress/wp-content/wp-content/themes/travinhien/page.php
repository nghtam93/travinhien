<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header(); ?>

<div class="wrap__page -single">

    <div class="dn__breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
      <div class="container">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
      </div>
    </div>

	<main class="site-main" role="main">
        <div class="container">
    		<?php
    		while ( have_posts() ) : the_post();

    			get_template_part( 'template-parts/content', 'page' );

    		endwhile; // End of the loop.
    		?>
        </div>
	</main>
</div>
<?php get_footer();
