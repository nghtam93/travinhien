<?php
/**
 * Template Name: Page About
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
$pagefront_ID = get_option('page_on_front');
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="wrap__page -single">
  <div class="dn__breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
      <div class="container container-1200">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
      </div>
    </div>

    <main class="site-main" role="main">
      <div class="container container-1200">
      <?php
        get_template_part( 'template-parts/content', 'page' );
      ?>
      </div>
    </main>

    <?php
    if( have_rows('mission_items') ):?>
      <section class="about__mission">
        <div class="container container-1200">
          <div class="row">
            <?php while( have_rows('mission_items') ) : the_row();
              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $excerpt = get_sub_field('excerpt');
              ?>
              <div class="col-md-6 d-flex wow fadeInUp">
                <div class="el__item">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb -contain">
                      <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                    </div>
                  </div>
                  <div class="el__item__meta">
                    <h3 class="el__item__title"><?php echo $title ?></h3>
                    <div class="el__item__excerpt"><?php echo $excerpt ?></div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </section>
    <?php
    endif;
    ?>

    <?php
    $gallery = get_field('gallery', $pagefront_ID);
    if( $gallery ): $i=0; ?>
        <section class="box__gallery">
          <div class="container container-1200">
            <div class="box__gallery row g-3">
            <?php foreach( $gallery as $image_id ): $i++;
              ?>
              <div class="<?php echo ($i == 2) ? 'col-md-6 col-12 order-4' : 'col-md-3 col-6'; ?> order-md-<?= $i ?>">
                 <div class="el__item <?php echo ($i == 2) ? '-large' : ''; ?> wow fadeInLeft">
                  <div class="el__item__thumb">
                    <div class="dnfix__thumb"><?php echo wp_get_attachment_image( $image_id, 'large' ); ?></div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php endif; ?>

</div>
<?php endwhile; ?>
<?php get_footer();