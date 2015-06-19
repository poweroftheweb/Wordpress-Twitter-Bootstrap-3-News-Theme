<?php get_header(); ?>
<div id="content" class="clearfix row">
  <h1 class="col-md-12 page-title"><span>
    <?php _e("Search Results for","potw"); ?>
    :</span> <?php echo esc_attr(get_search_query()); ?></h1>
  <div id="main" class="col col-md-9 clearfix" role="main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
      <header>
        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h3>
        <div class="entry-meta">
          <?php posted_on(); ?>
        </div>
        <!-- .entry-meta -->
      </header>
      <!-- end article header -->
      <section class="post_content">
        <?php the_excerpt('<span class="read-more">' . __("Read more on","potw") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
      </section>
      <!-- end article section -->
      <footer> </footer>
      <!-- end article footer -->
    </article>
    <!-- end article -->
    <?php endwhile; ?>
    <?php content_nav( 'nav-below' ); ?>
    <?php else : ?>
    <!-- this area shows up if there are no results -->
    <article id="post-not-found">
      <header>
        <h1>
          <?php _e("Not Found", "potw"); ?>
        </h1>
      </header>
      <section class="post_content">
        <p>
          <?php _e("Sorry, but the requested resource was not found on this site.", "potw"); ?>
        </p>
      </section>
      <footer> </footer>
    </article>
    <?php endif; ?>
  </div>
  <!-- end #main -->
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end .row -->
<?php get_footer(); ?>
