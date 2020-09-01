<?php get_header();

get_template_part( 'content/archive-header' );

?>
	<div id="loop-container" class="loop-container">
		<?php
		$args = array(
			'post_type' => 'portfolio',
		  );
		  $portfolio = new WP_Query( $args );
		  if( $portfolio->have_posts() ) {
			while( $portfolio->have_posts() ) {
			  $portfolio->the_post();?>
			  <div class="portfolio-entry">
				<div class="portfolio-thumbnail">
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
					</div>
				<?php endif; ?>
				<div class="portfolio-text">
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class='content'>
						<?php the_content() ?>
					</div>
				</div>
				</div>
			  <?php
			}
		  }
		  else {
			echo 'No portfolio items!';
		  }
		?>
	</div>


<?php

the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous', 'author' ),
    'next_text' => esc_html__( 'Next', 'author' )
) );

get_footer();