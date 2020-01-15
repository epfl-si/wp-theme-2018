<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<header class="entry-header mb-5">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta my-4">
				<p class="text-muted">
          <?php printf( __('Posted on <time class="entry-date published" datetime="%s">%s</time>', 'epfl'),  get_the_date( DATE_W3C ), get_the_date() ); ?>
        </p>
        <div class="post-categories">
          <p class="sr-only">Catégories:</p>
          <p>
            <?php
              $categories = get_categories();
              foreach($categories as $category) :
            ?>
            <a href="<?php echo get_category_link($category->cat_ID);?>" class="tag tag-primary"><?php echo $category->name ?></a>
            <?php
              endforeach;
            ?>
          </p>
        </div>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php // epfl_post_thumbnail(); ?>

	<div class="entry-content mb-5">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'epfl' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'epfl' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

  <footer class="post-footer pt-4">
    <h2 class="h5"><?php _e('Tags', 'epfl'); ?></h2>
    <p>
      <?php
        $tags = get_the_tags();
        foreach($tags as $tag) :
      ?>
      <a href="<?php echo get_tag_link($tag->term_id);?>" class="tag tag-primary"><?php echo $tag->name ?></a>
      <?php
        endforeach;
      ?>
    </p>
  </footer>
</article><!-- #post-<?php the_ID(); ?> -->
