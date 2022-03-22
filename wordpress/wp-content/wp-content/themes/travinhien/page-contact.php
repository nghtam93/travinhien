<?php
/**
 * Template Name: Page Contact
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

<div class="wrap__page -single -no-breadcrumb">
    <div class="dn__breadcrumb d-none" typeof="BreadcrumbList" vocab="https://schema.org/">
      <div class="container container-1200">
        <?php if(function_exists('bcn_display'))
        {
            bcn_display();
        }?>
      </div>
    </div>

    <main class="site-main" role="main">
      <div class="container container-1200">

        <div class="entry-content -custom mb-4">
          <?php the_content() ?>
        </div>

        <div class="row gx-lg-5 mb-5">
          <div class="col-md-6 col-lg-5">
            <div class="contact__form">
              <?= do_shortcode(get_field('form')) ?>
            </div>
          </div>
          <div class="col-md-6 col-lg-7">
            <div class="about__thumb">
              <div class="dnfix__thumb">
                <?php the_post_thumbnail('large',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </main>



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