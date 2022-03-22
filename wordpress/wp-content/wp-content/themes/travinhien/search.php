<?php
/**
 * The template for displaying search results pages
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

	<section class="page__headerc sc__header">
      <div class="container">
        <?php if ( have_posts() ) : ?>
			<h1 class="sc__header__title"><?php printf( __( 'Tìm kiếm với từ khóa: %s', 'dntheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php else : ?>
			<h1 class="sc__header__title"><?php _e( 'Nothing Found', 'dntheme' ); ?></h1>
		<?php endif; ?>
      </div>
    </section>

	<div class="page__content sc__wrap">

		<div class="archive__content">
			<div class="container">
				<?php
				if ( have_posts() ) :
					echo ' <div class="row g-2 g-sm-3">';
                    while ( have_posts() ) : the_post(); ?>
                         <div class="col-md-3 col-6 col-xl-20">
                            <?php wc_get_template_part( 'content', 'product' );; ?>
                        </div>
                    <?php
                    endwhile;
                    echo '</div>';
                    dntheme_paging_nav();
				else : ?>
					<div class="box-search">
						<p class="mb-3 text-center"><?php _e( 'Rất tiếc, nhưng không có gì phù hợp với cụm từ tìm kiếm của bạn. Vui lòng thử lại với một số từ khóa khác nhau.', 'dntheme' ); ?></p>

						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!-- .wrap -->
</div>
<?php get_footer();