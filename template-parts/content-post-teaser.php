<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

?>
	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="list-group-item list-group-teaser link-trapeze-vertical" >
		<div class="list-group-teaser-container">
			<div class="list-group-teaser-thumbnail">
				<?php if(has_post_thumbnail( get_the_ID() )): ?>
					<?php the_post_thumbnail('thumbnail_square_crop', ['class' => 'img-fluid']); ?>
				<?php endif; ?>
			</div>

			<div class="list-group-teaser-content">
					<p class="h5"><?php the_title(); ?></p>
					<p>
						<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><span class="sr-only"><?php esc_html__('Published:', 'epfl-shortcodes') ?></span><?php the_date('d.m.Y'); ?></time>
						<span class="text-muted">— <?php the_author() ?></span>
						<div class="text-muted"><?php echo get_the_excerpt(); ?></div>
					</p>
			</div>
		</div>
	</a>

