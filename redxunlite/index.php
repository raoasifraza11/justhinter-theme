<?php
/**
 * Where it all begins.
 *
 */
get_header();
?>

<div class="container maininnercontent">

	<?php if ( get_theme_mod ( 'index_layout' ) == 'bothsidebars' ) { ?>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>


		<?php if ( get_theme_mod ( 'index_layout' ) == 'bothsidebars' ) { ?>
			<div class="col-sm-6" id="skippedtocontent">
		<?php }  else	if ( get_theme_mod ( 'index_layout' ) == 'rightsidebar' ) { ?>
			<div class="col-sm-9">
		<?php } else  { ?>
			<div class="narrowcontent">
		<?php } ?>

		<?php if ( have_posts() ) : ?>
			<div class="row">

				<?php if (is_paged()) {  ?>
					<div class="col-md-12">
						<div class="pageoftop" id="jumptopageof"><?php _paging_nav();?></div>
						<?php	the_posts_pagination( array(
							 'mid_size' => 2,
							 'prev_text' => __( '<span class="fa fa-angle-double-left"></span>', 'redxunlite' ),
							 'next_text' => __( '<span class="fa fa-angle-double-right"></span>', 'redxunlite' ),
						 ) );?>
						<div class="clearfix"></div>
					</div>
				<?php } ?>

				<div class="col-md-12">
					<?php wtn_ad_block_top_index (); ?>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php	get_template_part( 'partials/content', get_post_format() );	?>
				<?php endwhile; ?>

				<div class="col-md-12">
					<?php wtn_ad_block_bottom_index (); ?>
				</div>

			</div>

			<?php the_posts_pagination( array(
								 'mid_size' => 2,
								 'prev_text' => __( '<span class="fa fa-angle-double-left"></span>', 'redxunlite' ),
								 'next_text' => __( '<span class="fa fa-angle-double-right"></span>', 'redxunlite' ),
			 ) ); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</div>

 <?php if ( ( get_theme_mod  ( 'index_layout' ) == ('bothsidebars')  ) ||  ( get_theme_mod  ( 'index_layout' ) == ('rightsidebar')  ) ) { ?>
	<div class="col-sm-3">
		<?php get_sidebar('right'); ?>
	</div>
	<?php } ?>

	<?php get_template_part('partials/fixedbottom', 'nav'); ?>

</div>


<?php get_footer(); ?>
