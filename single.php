<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div id="content" class="clearfix row">
    <h1 class="col-md-12 page-title">
      <?php the_title(); ?>
    </h1>
    <div class = "col-md-9">
      <?php while(have_posts()) : the_post(); ?>
      <?php the_post_thumbnail( $size, $attr ); ?>
      <p>
        <?php the_content(''); ?>
      </p>
      <div class="entry-meta">
        <?php posted_on(); ?>
      </div>
      <!-- .entry-meta -->
      <?php content_nav( 'nav-below' ); ?>
      <?php endwhile; wp_reset_query(); ?>
      <?php 
	   // only show edit button if user has permission to edit posts
	   if( $user_level > 0 ) { 
	   ?>
      <a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="fa fa-pencil"></i>
      <?php _e("Edit post","potw"); ?>
      </a>
      <?php } ?>
      <?php comments_template(); ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
  <!-- #content -->
</article>
</div>
<!-- .container -->
<?php get_footer(); ?>