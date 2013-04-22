<?php snippet('header') ?>
<?php snippet('menu') ?>

	<!-- Facebook like button script -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!--============================-->
	
	<!-- Twitter button Script -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<!--============================-->


<?php 
$images = $page->images();

$heroImages = array();
$productionImages = array();

foreach ($images as $image) {
  
  // get our hero images
  if (preg_match('/hero/i', $image->filename()) == 1) {
    
    $heroImages[] = $image->url();
    
  // get our production images
  } else if (preg_match('/thumb/i', $image->filename()) == 0) {
    
    $productionImages[] = $image;
    
  }
  
  // randomize our hero image if there is more than one
  if (!empty($heroImages)) shuffle($heroImages);
  if (!empty($productionImages)) shuffle($productionImages);
  
}
?>

    <div class="projectHero">
      <p id="workTitle"><?php echo $page->title() ?></p>
      <a href="<?php echo html($page->videolink()) ?>" class="fancybox-media playButton" title="<?php echo $page->title() ?>">Play</a>
      <?php if ( $heroImages ): ?>
        <img src="<?php echo $heroImages[0]; ?>" id="projectHeroImage" style=""/>
      <?php endif ?>
    </div>
    
    <section id="projectDetails" class="clearfix">
      <div class=wrapper>
        <div class="description">
          <p class="title">Description</p>
          <p class="text"><?php echo kirbytext($page->description()) ?></p>
          
          <div id="likeLinks">
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="200" data-show-faces="true" data-font="lucida grande"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a>
            <a data-pin-config="none" href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
          </div>

        </div>
        <div class="credits">
          <p class="title">Credits</p>
          <p class="text"><?php echo kirbytext($page->credits()) ?>
          </p>
        </div>
      </div>
    </section>

    <section id="productionImages" class="clearfix">
      
      <?php if ( $page->additionalvideotitle() != '' && $page->additionalvideolink() != '' ): ?>
      <h1><?php echo $page->additionalvideotitle() ?></h1>
      <iframe src="<?php echo html($page->additionalvideolink()) ?>" width="796" height="447" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	  <?php endif ?>      
	  
      <h1>Production Images</h1>
      <div id="container">
			<?php foreach ($productionImages as $productionImage): ?>
				<a href="<?php echo thumb($productionImage, array('width' => 960), false) ?>" class="fancybox productionThumb" rel="thumbs">
				  <?php echo thumb($productionImage, array('width' => 320)) ?>
				  <div class="overlay">
  					<span class="more"></span>
				  </div>
				</a>
			<? endforeach ?>
      </div>
      <script src="<?php echo url('assets/javascript/masonry.min.js') ?>"></script>
    </section>

    <?php
        // if this is a wedding, display only weddings ('weddings')
        if (hasCategory('weddings', $page->categories())) {
            $prev = getPrevMatchCategory($pages, 'weddings');
        }elseif (hasCategory('work', $page->categories())) { // else, if this is a commercial work, try to find next commercial project
            $prev = getPrevMatchCategory($pages, 'work');
        }
    ?>
    <?php if ($prev): ?>
    	<a href="<?php echo $prev->url() ?>" id="projButtonPrev">Previous Project<span></span></a>
    <?php endif ?>

    <?php
    // if this is a wedding display only weddings ('weddings')
    if (hasCategory('weddings', $page->categories())) {
        $next = getNextMatchCategory($pages, 'weddings');
    }elseif (hasCategory('work', $page->categories())) { // if this is a commercial work, find next commercial project
        $next = getNextMatchCategory($pages, 'work');
    }
    ?>

    <?php if ($next): ?>
        <a href="<?php echo $next->url() ?>" id="projButtonNext"><span></span>Next Project</a>
    <?php endif ?>

    <script>
      window.onload = function() {
        var wall = new Masonry( document.getElementById('container'), {
        });
      };
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox();
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('.fancybox-media').fancybox({
          openEffect  : 'none',
          closeEffect : 'none',
          helpers : {
            media : {}
          }
        });
    });
    </script>

    <!-- <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script> -->        

<?php snippet('footer') ?>
