<?php
/**
 * Template part for displaying posts
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */
$categories = get_the_category(get_the_ID());
$cat_name = $categories[0]->name;
$cat_link = get_category_link($categories[0]);
?>
<div class="wrap__page wrap__single">
  <div class="container">
    <div class="mb-3">
      <div class="single__thumb">
        <div class="dnfix__thumb">
          <?php the_post_thumbnail('full',array( 'class' => 'img-fluid','alt'   => get_the_title() )); ?>
        </div>
      </div>
    </div>
    <div class="d-flex align-items-center mb-3">
      <div class="new__item__tax"><?php echo $cat_name ?></div>
      <div class="new__item__date"><?php echo get_the_time("d/m/Y"); ?></div>
    </div>

    <div class="page__header">
      <?php the_title( '<h1 class="entry-title single__title">', '</h1>' ); ?>
    </div>

    <div class="entry-content"><?php the_content() ?></div>

    <div class="single__share">
      <div class="single__share__title">Chia sẻ bài viết</div>
      <ul class="">
        <li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/facebook.svg') ?>" alt=""></a></li>
        <li><a href="https://telegram.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title() ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/telegram.svg') ?>" alt=""></a></li>
        <li><a href="https://twitter.com/intent/tweet?&url=<?php the_permalink() ?>" target="_blank"><img src="<?php echo get_theme_file_uri('assets/img/twitter.svg') ?>" alt=""></a></li>
      </ul>
    </div>

    <?php
        related_category_fix(
            array(
                'posts_per_page'    => 6,
                'related_title'     => __( 'Có thể bạn quan tâm', 'dntheme' ),
                'template_type'     => 'slider', // slider , widget
                'template'          => 'content-archive',
                'set_taxonomy'      => null,
                'class_item'        => 'item__wrap',
            )
        );
    ?>
  </div>

  <?php $ads1 = get_field('ads_left',"option");
  if($ads1):
  ?>
    <div class="ads--pc -left">
      <div class="ads2__items">
        <?php echo $ads1 ?>
      </div>
    </div>
  <?php endif; ?>

  <?php $ads2 = get_field('ads_right',"option");
  if($ads2):
  ?>
    <div class="ads--pc -right">
      <div class="ads2__items">
        <?php echo $ads2 ?>
      </div>
    </div>
  <?php endif; ?>
</div>