<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = get_field('logo_footer', 'option');
?>
  <section class="home-thanks text-center">
    <div class="container">
      <h2 class="home-thanks__title fm-vanilla wow fadeInUp"><?php the_field('thank_title', 'option') ?></h2>
      <div class="home-thanks__content wow fadeInUp"><?php the_field('thank_content', 'option') ?></div>
    </div>
    <div class="leaf-img leaf-left wow fadeInLeft"><img src="<?= get_theme_file_uri('assets/img/leaf-img01.png') ?>" alt=""></div>
    <div class="leaf-img leaf-center wow fadeInUp"><img src="<?= get_theme_file_uri('assets/img/leaf-img02.png') ?>" alt=""></div>
    <div class="leaf-img leaf-top wow fadeInDown"><img src="<?= get_theme_file_uri('assets/img/leaf-img03.png') ?>" alt=""></div>
  </section>
  <!-- end section home-thanks -->

    <footer class="footer">
      <div class="container">
        <div class="footer-info">
          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo site_url(); ?>" class="footer-info__logo">
                <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
              </a>
              <div class="footer-info__txt"><?php the_field('footer_text', 'option') ?></div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-md-6">
              <div class="footer__item">
                <div class="footer__title">Hỗ trợ tư vấn</div>
                <div class="footer__support">Để lại email để nhận tin tức mới nhất của chúng tôi!</div>
                <form method="post" action="<?php echo site_url('?na=s') ?>" class="footer__form">
                  <input type="text" name="ne" class="form-control" placeholder="Nhập email" />
                  <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
                <div class="footer__social">
                  <p class="footer__social__title">Theo dõi chúng tôi tại:</p>
                  <ul class="-list">
                    <li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icon-youtube"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icon-zalo"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- footer-info -->
        <div class="footer-copyright text-center">
          <div class="copyright">
            <p><?php the_field('copyright', 'option'); ?></p>
          </div><!-- copyright -->
        </div><!-- footer-bottom -->
      </div>
    </footer>

    <!-- Call Phone -->
    <a href="tel:0345817226" class="call-now" rel="nofollow">
      <div class="dntheme-alo-phone">
        <div class="animated infinite zoomIn dntheme-alo-circle"></div>
        <div class="animated infinite pulse dntheme-alo-circle-fill"></div>
        <div class="animated infinite tada dntheme-alo-img-circle"></div>
        <span>0345 817 226</span>
      </div>
    </a><!--End Call Phone -->


    <nav id="menu__mobile" class="nav__mobile">
      <div class="nav__mobile__content">
        <div class="menu-mb__btn">
          <span class="iconz-bar"></span>
          <span class="iconz-bar"></span>
          <span class="iconz-bar"></span>
        </div>
        <?php
          wp_nav_menu(
          array(
             'theme_location'  => 'primary',
             'container'       => 'ul',
             'container_class' => '',
             'menu_id'         => '',
             'menu_class'      => 'nav__mobile--ul',
          ));
        ?>
      </div>
    </nav>

    <div class="back-to-top">
      <div class="back-to-top__wrap">
        <img src="<?php echo get_theme_file_uri('assets/img/arrow-top.png') ?>" alt="">
      </div>
    </div>

    <div class="widget__cart">
        <div class="sidebar__inner">
          <div class="widget__cart__close"><i class="icon-close"></i></div>
          <?php dynamic_sidebar( 'product' ); ?>
        </div>
    </div>
  </div> <!-- .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
