<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

?>


	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="news link-trapeze-vertical">
		<div class="news-container">
			<div class="news-thumbnail">
				<?php if(has_post_thumbnail( get_the_ID() )): ?>
					<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
				<?php endif; ?>
			</div>

			<div class="news-content">
					<p class="h5"><?php the_title(); ?></p>
					<p>
						<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><span class="sr-only">Published:</span><?php the_date('d.m.Y'); ?></time>
						<span class="text-muted">— <?php the_author() ?></span>
						<?php the_excerpt(); ?>
					</p>
			</div>
		</div>
	</a>

