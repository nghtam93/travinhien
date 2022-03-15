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
    <footer class="footer">
      <div class="container">
        <div class="footer-info">
          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo site_url(); ?>" class="footer-info__logo">
                <?php echo wp_get_attachment_image( $logo_img, 'full' ); ?>
              </a>
              <div class="footer-info__txt"><?php the_field('footer_text') ?></div>
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
                    <li><a href="<?php the_field('facebook', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/facebook.svg') ?>" width="24" height="24" alt=""></a></li>
                    <li><a href="<?php the_field('youtube', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/youtube.svg') ?>" width="24" height="24" alt=""></a></li>
                    <li><a href="<?php the_field('twitter', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/twitter.svg') ?>" width="24" height="24" alt=""></a></li>
                    <li><a href="<?php the_field('zalo', 'option') ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/zalo.svg') ?>" width="24" height="24" alt=""></a></li>
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

  </div> <!-- .wrapper -->
<?php wp_footer(); ?>


<script id='wc-add-to-cart-js-extra'>
var wc_add_to_cart_params = {"ajax_url":"\/wp\/travinhien\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/travinhien\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/localhost\/wp\/travinhien\/gio-hang\/","is_cart":"","cart_redirect_after_add":"no"};
</script>
<script src='http://localhost/wp/travinhien/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=6.2.1' id='wc-add-to-cart-js'></script>
<script src='http://localhost/wp/travinhien/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.6.2.1' id='js-cookie-js'></script>
<script id='woocommerce-js-extra'>
var woocommerce_params = {"ajax_url":"\/wp\/travinhien\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/travinhien\/?wc-ajax=%%endpoint%%"};
</script>
<script src='http://localhost/wp/travinhien/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=6.2.1' id='woocommerce-js'></script>
<script id='wc-cart-fragments-js-extra'>
var wc_cart_fragments_params = {"ajax_url":"\/wp\/travinhien\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/wp\/travinhien\/?wc-ajax=%%endpoint%%","cart_hash_key":"wc_cart_hash_35d20dde0574c336b0939f0a1f949068","fragment_name":"wc_fragments_35d20dde0574c336b0939f0a1f949068","request_timeout":"5000"};
</script>
<script src='http://localhost/wp/travinhien/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=6.2.1' id='wc-cart-fragments-js'></script>

</body>
</html>
