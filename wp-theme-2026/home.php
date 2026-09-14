<?php
/**
 * @package epfl
 */
init_globals();
get_header();

global $containerClasses;
global $mainClasses;

get_template_part( 'template-parts/breadcrumb');
?>

<div class="<?php echo $containerClasses ?>">
    <?php get_sidebar(); ?>
	<div class="w-100">
		<main id="content" role="main" class="content <?php echo $mainClasses ?>">

      <div class="container-full px-5 px-xxl-6 mt-5">
        <?php single_post_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
      </div>

      <div class="container-full px-5 px-xxl-6 mt-5">
        <div class="row" style="flex-direction: row-reverse;">
          <div class="col-lg-3">
            <?php get_template_part( 'template-parts/blog', 'filters' ) ?>
          </div>
          <div class="col-lg-9">
            <?php get_template_part( 'template-parts/blog', 'list' ) ?>
            <div class="mt-3">
              <?php get_template_part( 'template-parts/pagination' ) ?>
            </div>
          </div>
        </div>
      </div>

		</main><!-- #main -->
	</div> <!-- w-100 -->
</div> <!-- nav-toggle-layout -->

</div> <!-- main-container -->

<?php
get_footer();
