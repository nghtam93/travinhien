<?php
/**
 * The template for displaying archive pages
 *
 * @package    WordPress
 * @subpackage Dntheme
 * @version 1.0
 */

get_header();
$term = get_queried_object();
$term_id = $term->term_id;
$term_parent_id = $term->parent;
?>

<div class="wrap__page">
        <div class="container">
          <header class="page__header sc__header d-flex">
            <h1 class="entry-title sc__header__title"><img src="<?php echo get_theme_file_uri('assets/img/home-new-icon-01.png') ?>" width="32" height="32" alt=""> <?php echo single_term_title() ?></h1>

              <?php
                $categories_list_id = $term_id;
                if($term_parent_id){
                  $categories_list_id =  $term_parent_id;
                }
                $categories=get_categories(
                    array(
                      'parent' => $categories_list_id,
                      'hide_empty'      => false
                  )
                );
                if($categories):
                  ?>
                  <div class="ms-auto">
                    <ul class="ist-cat">
                      <li>
                        <a href="<?php echo get_category_link($categories_list_id) ?>" class="<?php echo ($term->parent == 0)?'active': ''; ?>"><?php _e('Tất cả','dntheme'); ?></a>
                      </li>
                      <?php
                      foreach ($categories as $category) {
                        $class_active = ($category->name == $term->name) ? 'active' : '';
                        ?>
                        <li>
                          <a href="<?php echo get_category_link($category) ?>" class="<?php echo $class_active ?>"><?php echo $category->name; ?></a>
                        </li>
                        <?php
                      } ?>
                    </ul>
                  </div>
                  <?php
                endif;
              ?>
          </header>
          <div class="archive__content pb-5">
            <?php
            if ( have_posts() ) : //$i=0;
                echo '<div class="row">';
                while ( have_posts() ) : the_post(); //$i++;
                  // if($i>=2){
                  ?>
                    <div class="col-md-6">
                        <?php get_template_part( 'template-parts/content','archive'); ?>
                    </div>
                <?php
                  // }
                endwhile;
                echo '</div>';
                dntheme_paging_nav();
            else :
                  get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
          </div>
        </div>
      </div>
<?php get_footer();
