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

  <?php $icon = get_field('icon'); ?>
  <section class="about-about">
    <div class="container">
      <header class="sc__header">
        <h1 class="sc__header__title"><?php echo wp_get_attachment_image( $icon, array('32', '32') ); ?><?php the_title(); ?></h1>
      </header>

      <?php
      if( have_rows('items') ): $i=0;?>
          <div class="row">
              <?php while( have_rows('items') ) : the_row(); $i++;
                $image = get_sub_field('image');
                $content = get_sub_field('content');
                ?>
                <?php if($i % 2 == 1 ): ?>
                  <div class="el__box -s1">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="el__box__thumb">
                          <div class="dnfix__thumb">
                            <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="el__box__meta"><?php echo $content ?></div>
                      </div>
                    </div>
                  </div>
                <?php else: ?>
                  <div class="el__box -s2">
                    <div class="row">
                      <div class="col-md-4 order-md-2">
                        <div class="el__box__thumb">
                          <div class="dnfix__thumb -contain">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="el__box__meta"><?php echo $content ?></div>
                      </div>

                    </div>
                  </div>
                <?php endif; ?>
              <?php endwhile; ?>
          </div>
      <?php else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
  </section>

  <section class="home-mission">
    <div class="container">
        <div class="el__text"><?php the_field('mission_sub',$pagefront_ID) ?></div>
        <?php
        if( have_rows('mission_items',$pagefront_ID) ):?>
            <div class="row">
                <?php while( have_rows('mission_items',$pagefront_ID) ) : the_row();
                  $image = get_sub_field('image');
                  $title = get_sub_field('title');
                  $content = get_sub_field('content');
                  ?>
                  <div class="col-md-6 d-flex">
                    <div class="el__item -s1">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                        <div class="el__item__excerpt"><?php echo $content ?></div>
                      </div>
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

  <section class="home-service">
    <div class="container">
      <header class="sc__header">
        <h2 class="sc__header__title">
          <?php
          $service_icon = get_field('service_icon',$pagefront_ID);
          if($service_icon) echo wp_get_attachment_image( $service_icon, array('32', '32') ); ?>
          <?php the_field('service_title',$pagefront_ID); ?></h2>
        <div class="sc__header__sub"><?php the_field('service_sub',$pagefront_ID); ?></div>
      </header>

      <?php
        $service_image = get_field('service_image',$pagefront_ID);
        if( have_rows('service_items',$pagefront_ID) ):?>
            <div class="row">
                <div class="el__col col-md-6 col-lg-3 mb-4">
                    <div class="el__thumb dnfix__thumb">
                        <?php echo wp_get_attachment_image( $service_image, 'thumbnail' ); ?>
                    </div>
                </div>
                <?php while( have_rows('service_items',$pagefront_ID) ) : the_row();
                  $image = get_sub_field('image');
                  $title = get_sub_field('title');
                  $content = get_sub_field('content');
                  ?>
                  <div class="el__col col-md-6 col-lg-3">
                    <div class="el__item">
                      <div class="el__item__header">
                        <div class="el__item__thumb dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                      </div>
                      <div class="el__item__excerpt"><?php echo $content ?></div>
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

  <?php
  $banner_1 = get_field('banner_1',$pagefront_ID);
  $banner_2 = get_field('banner_2',$pagefront_ID);
  if($banner_1 || $banner_2):
  ?>
    <section class="home-bannez">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="el__item__thumb -s1 ef--shine">
              <div class="dnfix__thumb">
                <?php echo wp_get_attachment_image( $banner_1, 'full' ); ?>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="el__item__thumb -s2 ef--shine">
              <div class="dnfix__thumb">
                <?php echo wp_get_attachment_image( $banner_2, 'full' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php $team_icon = get_field('team_icon'); ?>
  <section class="about-team">
    <div class="container">
      <div class="sc__content">
        <header class="sc__header text-center mb-lg-5">
          <div class="sc__header__thumb dnfix__thumb -contain mx-auto">
            <?php echo wp_get_attachment_image( $team_icon, array('68', '68') ); ?>
          </div>
          <h2 class="sc__header__title"><?php the_field('team_title') ?></h2>
        </header>
        <?php
        if( have_rows('team_items') ):?>
            <div class="row">
                <?php while( have_rows('team_items') ) : the_row();
                  $image = get_sub_field('image');
                  $title = get_sub_field('title');
                  $content = get_sub_field('content');
                  ?>
                  <div class="col-md-6">
                    <div class="el__item">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                      </div>
                      <div class="el__item__meta">
                        <h3 class="el__item__title"><?php echo $title ?></h3>
                        <div class="el__item__excerpt"><?php echo $content ?></div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
            </div>
        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>

      </div>
    </div>
  </section>

  <section class="about-partner">
    <div class="container">
      <div class="sc__content">
        <header class="sc__header text-center">
          <h2 class="sc__header__title"><?php the_field('partner_title') ?></h2>
          <div class="sc__header__sub"><?php the_field('partner_sub') ?></div>
        </header>
        <?php
        if( have_rows('partner_items') ):?>
            <div class="row">
                <?php while( have_rows('partner_items') ) : the_row();
                  $image = get_sub_field('image');
                  ?>
                  <div class="col-4 col-md-20">
                    <div class="el__item">
                      <div class="el__item__thumb">
                        <div class="dnfix__thumb -contain">
                          <?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
            </div>
        <?php else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();