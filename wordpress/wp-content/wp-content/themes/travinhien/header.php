<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$logo_img = (is_front_page() || is_shop()) ? get_field('logo', 'option') : get_field('logo2', 'option');
$logo_active_img = get_field('logo', 'option');

$body_class = (!is_front_page('product') && !is_shop()) ? '-bg' : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php wp_head(); ?>
</head>
<body <?php body_class($body_class); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">
  <div class="loading-page">
    <div class="loading-page__logo">
      <?php echo wp_get_attachment_image( $logo_img, 'medium' ); ?>
      <div class="text-center mt-3">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
  </div>

  <header class="header -fix">
    <div class="container d-flex align-items-center justify-content-between">
      <nav class="main__nav">
        <div class="menu-mb__btn d-lg-none">
          <span class="iconz-bar"></span>
          <span class="iconz-bar"></span>
          <span class="iconz-bar"></span>
        </div>
        <div class="main__nav__wrap d-none d-lg-block">
           <?php
            wp_nav_menu(
            array(
               'theme_location'  => 'primary',
               'container'       => 'ul',
               'container_class' => '',
               'menu_id'         => '',
               'menu_class'      => 'el__menu',
            ));
          ?>
        </div>
      </nav>
      <!-- main__nav -->
      <?php

      $taglogo = (is_home() || is_front_page()) ? 'h1' : 'p'; ?>
      <<?php echo $taglogo; ?> class="logo">
        <a href="<?php echo site_url(); ?>" class="" title="<?php bloginfo("name"); ?>">
          <?php echo wp_get_attachment_image( $logo_img, 'medium' ); ?>
          <?php echo wp_get_attachment_image( $logo_active_img, 'medium' ); ?>
        </a>
      </<?php echo $taglogo; ?>>

      <div class="action d-flex align-items-center justify-content-end">
        <div class="action__search js-toggle">
          <div class="search__btn d-lg-none js-toggle-btn"><i class="icon-search"></i></div>
          <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
          <form role="search" method="get" action="<?php echo esc_url( home_url( ) ); ?>" class="search__form js-toggle-show">
            <input type="text" id="<?php echo $unique_id; ?>" class="form-control" placeholder="Tìm kiếm" name="s">
            <button type="submit"><i class="icon-search"></i></button>
          </form>
        </div>
        <!-- action__search -->
        <div class="action__cart">
          <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-btn -cart"><i class="icon-cart"></i></a>
        </div>
      </div>
      <!-- action -->
    </div>
  </header>


<?php
// Woocommorece breadcrumbs page: Cart, Checkout, Thanks
if (function_exists('breadcrumbs_woo')) breadcrumbs_woo();?>