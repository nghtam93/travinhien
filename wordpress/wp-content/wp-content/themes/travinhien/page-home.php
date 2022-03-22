<?php
/**
 * Template Name: Page Home
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
<?php while ( have_posts() ) : the_post(); ?>

  <section class="home-banner" id="banner">
    <div class="home-banner__bg" style="background-image:url(<?= get_theme_file_uri('assets/img/home-banner.jpg') ?>);"></div>
    <div class="container container-xxl">
      <div class="el__content">
        <h2 class="-title fm-vanilla wow fadeInUp" data-wow-duration="1s"><?php the_field('banner_title') ?></h2>
        <div class="-info wow fadeInUp" data-wow-duration="1.7s"><?php the_field('banner_content') ?></div>
        <a href="<?php the_field('banner_link') ?>" class="btn btn-primary wow fadeInUp" data-wow-duration="2s">xem sản phẩm</a>
      </div>
      <div class="el__tea">
        <video class="video wow fadeIn" width="480" height="852" src="<?= get_theme_file_uri('assets/videos/smoke.mp4') ?>" muted autoplay loop></video>
        <img src="<?= get_theme_file_uri('assets/img/home-banner-img01.png') ?>" alt="" class="img-main wow fadeInUp">
        <img src="<?= get_theme_file_uri('assets/img/home-banner-img02.png') ?>" alt="" class="img-left wow fadeInLeft">
        <img src="<?= get_theme_file_uri('assets/img/home-banner-img03.png') ?>" alt="" class="img-right wow fadeInRight">
      </div>
    </div>
  </section>
  <!-- end section home-banner -->

  <section class="home-story" id="our-story">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-md-6">
          <h2 class="home-story__title wow fadeInLeft"><?php the_field('about_title') ?></h2>
          <div class="home-story__txt wow fadeInUp"><?php the_field('about_content') ?></div>
        </div>

        <div class="col-xl-6 offset-xl-1 col-md-6">
          <?php
          $about_images = get_field('about_images');
          if( $about_images ): $i=0; ?>
              <div class="home-story__gallery">
                  <?php foreach( $about_images as $image_id ): $i++;
                    $class = ($i==1) ? '-large fadeInDown' : ( ($i==2) ? '-medium fadeInRight' : '-small fadeInUp' );
                    ?>
                    <div class="el__item wow <?= $class ?>">
                      <div class="dnfix__thumb"><?php echo wp_get_attachment_image( $image_id, 'large' ); ?></div>
                    </div>
                  <?php endforeach; ?>
              </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="leaf-img leaf-left wow fadeInLeft"><img src="<?= get_theme_file_uri('assets/img/leaf-img01.png') ?>" alt=""></div>
    <div class="leaf-img leaf-center wow fadeInUp"><img src="<?= get_theme_file_uri('assets/img/leaf-img02.png') ?>" alt=""></div>
    <div class="leaf-img leaf-top wow fadeInDown"><img src="<?= get_theme_file_uri('assets/img/leaf-img03.png') ?>" alt=""></div>
  </section>
  <!-- end section home-story -->

  <section class="home-tea" id="tea-product">
    <div class="home-tea__bg" style="background-image: url(<?= get_theme_file_uri('assets/img/home-tea-bg.jpg') ?>);"></div>
    <div class="container">
      <div class="sc__header text-center">
        <h2 class="sc__header__title wow fadeInLeft"><i class="icon-tea-cup"></i><?php the_field('gproduct_title') ?></h2>
        <div class="sc__header__sub wow fadeInRight"><?php the_field('gproduct_sub') ?></div>
      </div>
      <!-- sc__header -->
      <?php
      if( have_rows('gproduct_items') ):?>
        <div class="el__list">
            <?php
            $i=0;
            while( have_rows('gproduct_items') ) : the_row(); $i++;
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

      <?php $thuongtra_img = get_field('thuongtra_img'); ?>
      <div class="el__mix d-block d-md-flex align-items-center">
        <?php if($thuongtra_img): ?>
          <div class="el__mix__thumb wow fadeInLeft">
            <div class="dnfix__thumb">
              <?php echo wp_get_attachment_image( $thuongtra_img, 'thuongtra_img' ); ?>
            </div>
          </div>
        <?php endif; ?>
        <!-- el__mix__thumb -->
        <div class="el__mix__content">
          <h3 class="-title fm-vanilla wow fadeInUp"><?php the_field('thuongtra_title') ?></h3>
          <div class="-info wow fadeInUp"><?php the_field('thuongtra_content') ?></div>
        </div>
        <!-- el__mix__content -->
      </div>
      <!-- el__mix -->
    </div>
  </section>

  <section class="home-odd-tea">
    <div class="container">
      <div class="sc__header text-center">
        <h2 class="sc__header__title wow fadeInLeft"><i class="icon-tea-cup"></i><?php the_field('trale_title') ?></h2>
        <div class="sc__header__sub wow fadeInRight"><?php the_field('trale_sub') ?></div>
      </div>
      <?php
      $post_type = "product";
      $taxonomy = $post_type.'_cat';
      $trale_cat = get_field('trale_cat');
      $taxonomy_link = get_term_link($trale_cat, $taxonomy);
      $args = array(
          'post_type' => $post_type,
          'posts_per_page' =>10,
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
              <div class="el__btn pt-3 wow fadeInUp"><a href="<?= $taxonomy_link ?>" class="btn btn-primary">Xem thêm</a></div>
          </div>
          <?php wp_reset_postdata(); ?>
      <?php else :
          get_template_part( 'template-parts/content', 'none' );
      endif; ?>

      <div class="el__box">
        <?php
          $logo1 = get_field('congnghe_logo1');
          $logo2 = get_field('congnghe_logo2');
        ?>
        <div class="el__tech wow fadeIn d-flex flex-wrap align-items-center">
          <div class="el__tech__content wow fadeInLeft">
            <h4 class="el__tech__title"><?php the_field('congnghe_title') ?></h4>
            <div class="el__tech__txt"><?php the_field('congnghe_content') ?></div>
          </div>
          <?php if($logo1 & $logo2): ?>
            <div class="el__tech__logo wow fadeInRight text-center">
              <?php echo wp_get_attachment_image( $logo1, 'medium', "", array( "class" => "d-none d-sm-block" ) ); ?>
              <?php echo wp_get_attachment_image( $logo2, 'medium', "", array( "class" => "d-sm-none" ) ); ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- el__tech -->

        <?php
        $gallery = get_field('gallery');
        if( $gallery ): $i=0; ?>
            <div class="el__gallery d-flex">
                <?php foreach( $gallery as $image_id ): $i++;
                  ?>
                  <div class="el__gallery__item wow fadeInUp">
                    <div class="dnfix__thumb"><?php echo wp_get_attachment_image( $image_id, 'large' ); ?></div>
                  </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

      </div>
      <!-- el__box -->
    </div>
  </section>
  <!-- end setion home-odd-tea -->

<?php endwhile; ?>
<?php get_footer();