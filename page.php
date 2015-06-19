<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div id="content" class="clearfix row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="col-md-12 page-title">
      <?php the_title(); ?>
    </h1>
    <article class="page col-md-9" id="post-<?php the_ID(); ?>">
      <div class="entry">
        <p>
          <?php the_content(); ?>
        </p>
      </div>
    </article>
    <?php endwhile; else: ?>
    <article class="page col-md-9 not-found">
      <div class="entry">
        <p class="lead">
          <?php _e('Sorry, this page does not exist. Try searching for one.'); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
    </article>
    <?php endif; ?>
    <?php get_sidebar(); ?>
  </div>
  <!-- #content -->
</article>
</div>
<!-- .container -->
<?php get_footer(); ?>