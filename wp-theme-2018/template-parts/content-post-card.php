<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package epfl
 */

?>
	<a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="card link-trapeze-horizontal" >
    <?php if(has_post_thumbnail( get_the_ID() )): ?>
      <picture class="card-img-top">
        <?php the_post_thumbnail('thumbnail_16_9_large_40p', ['class' => 'img-fluid']); ?>
      </picture>
    <?php endif; ?>
    <div class="card-body">
      <h2 class="card-title h3" itemprop="name"><?php the_title(); ?></h2>
      <div class="card-info">
        <time class="card-info-date" itemprop="datePublished" datetime="<?php the_time('c') ?>"><?php echo get_the_date('Y-m-d'); ?></time>
        <span itemprop="about">
          <?php
            $categories = [];
            foreach((get_the_category(get_the_ID())) as $category) {
              $categories[] = $category->cat_name;
            }
            echo implode(', ', $categories);
          ?>
        </span>
      </div>
      <p itemprop="description"><?php the_excerpt(); ?></p>
    </div>
	</a>
