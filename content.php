<?php // Styling Tip!

// Want to wrap for example the post content in blog listings with a thin outline in Bootstrap style?
// Just add the class "panel" to the article tag here that starts below.
// Simply replace post_class() with post_class('panel') and check your site!
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <h1 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h1>
    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <?php posted_on(); ?>
    </div>
    <!-- .entry-meta -->
    <?php endif; ?>
  </header>
  <!-- .entry-header -->
  <?php if ( is_search() || is_archive() ) : // Only display Excerpts for Search and Archive Pages ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  <?php else : ?>
  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_potw' ) ); ?>
    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_potw' ),
				'after'  => '</div>',
			) );
		?>
  </div>
  <!-- .entry-content -->
  <?php endif; ?>
</article>
<!-- #post-## -->
