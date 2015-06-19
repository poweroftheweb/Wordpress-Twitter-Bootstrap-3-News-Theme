<div class = "navbar navbar-default navbar-fixed-bottom">
  <div class = "container">
    <p class = "navbar-text pull-left"><a href="http://poweroftheweb.net" id="creditPOTW" title="Theme Built By Power Of The Web">Power Of The Web</a></p>
    <div class="navbar-text pull-right">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-copyright') ) : ?>
      <?php endif; ?>
      </p>
    </div>
  </div>
</div>
<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<?php wp_footer(); ?>
</body></html>