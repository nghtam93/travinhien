<?php if( !is_cart() &&! is_checkout() &&! is_woocommerce() && !is_account_page() ): ?>
<article class="page__content">
	<header class="entry-header sc__header">
	        <?php the_title( '<h1 class="page-title sc__header__title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content -custom">
	    <?php the_content(); ?>
	</div>
</article>
<?php else: ?>
<article class="page__content">
	<div class="entry-content">
	    <?php the_content(); ?>
	</div>
</article>
<?php endif; ?>