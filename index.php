<?php get_header(); ?>
<div class="se-pre-con"></div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div id="content" class="clearfix row">
    <?php
	query_posts('posts_per_page=1');
		while(have_posts()) : the_post(); ?>
    <div class = "jumbotron">
      <h2><a href = "<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></h2>
      <p>
        <?php the_excerpt(); ?>
      </p>
    </div>
    <?php endwhile; wp_reset_query(); ?>
    <div class = "panel panel-default panel-body">
      <div class = "row">
        <div class = "col-md-2">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-sidebar') ) : ?>
          <?php endif; ?>
        </div>
        <div class = "col-md-10">
          <?php while(have_posts()) : the_post(); ?>
          <div class = "row">
            <div class="col-xs-6 col-md-3"> <a class="thumbnail" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('post'); ?>
              </a> </div>
            <div class="col-xs-6 col-md-9">
              <h3><a href = "<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h3>
              <p>
                <?php the_excerpt(); ?>
              </p>
            </div>
          </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div> 
  <!-- .row -->
</div> 
<!-- .container -->
</article>
<?php get_footer(); ?>