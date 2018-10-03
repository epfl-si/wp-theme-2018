<?php
  $post_title         = get_query_var('epfl_share_post_title');
  $target_url     = get_query_var('epfl_share_target_url');
  $target_url_encoded = get_query_var('epfl_share_target_url_encoded');
?>

<div class="bg-gray-100 py-5">
  <div class="container">
    <div class="social-share-container social-share-light">
      <div class="social-share ">
        <div class="social-share-text">
          <?php esc_html_e('Share on', 'epfl');?>
        </div>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $target_url_encoded ?>" class="social-icon social-icon-facebook social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-facebook"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> Facebook.</span>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $target_url_encoded ?>&amp;text=<?php echo $post_title ?>&amp;hashtags=epfl" class="social-icon social-icon-twitter social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-twitter"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> Twitter.</span>
        </a>
        <?php /*
        <a href="#" class="social-icon social-icon-instagram social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-instagram"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> Instagram.</span>
        </a>
        */ ?>
        <?php /*
        <a href="#" class="social-icon social-icon-mail-plane social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-mail-plane"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> Mailplane.</span>
        </a>
        */ ?>
        <?php /*
        <a href="#" class="social-icon social-icon-whatsapp social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-whatsapp"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> WhatsApp.</span>
        </a>
        */ ?>
        <a href="https://plus.google.com/share?url=<?php echo $target_url_encoded ?>" class="social-icon social-icon-googleplus social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-googleplus"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> GooglePlus.</span>
        </a>
        <a href="https://www.linkedin.com/shareArticle?url=<?php echo $target_url_encoded ?>&amp;title=<?php echo $post_title ?>%20%23epfl" class="social-icon social-icon-linkedin social-icon-discrete" target="_blank">
          <svg class="icon" aria-hidden="true"><use xlink:href="#icon-linkedin"></use></svg>
          <span class="sr-only"><?php esc_html_e('Follow us on', 'epfl');?> LinkedIn.</span>
        </a>
      </div>
    </div>
  </div>
</div>
