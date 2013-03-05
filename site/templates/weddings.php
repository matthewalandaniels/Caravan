<?php snippet('header') ?>
<?php snippet('menu') ?>

    <div id="weddingsHero">
      <p id="workTitle">Caravan Weddings</p>
      <a href="<?php echo html($page->weddingsreel()) ?>" class="fancybox-media playButton" title="Caravan Wedding Reel 2013">Play</a>
    </div>

    <section id="intro">
      <div class="wrapper">
        <h2><?php echo html($page->introtitle()) ?></h2>
        <p><?php echo multiline($page->introtext()) ?>
        </p>
      </div>
    </section>

    <section id="work" class="clearfix">

      <div class="wrapper" .class="clearfix">        
      
        <?php foreach($pages->find('work')->children()->visible() as $p): ?>
		<?php if ( hasCategory('weddings', $p->categories()) ): ?>
			
        <a href="<?php echo $p->url() ?>" class="workThumb">
          <img src="<?php echo $p->children()->find('thumb_image')->files()->first()->url() ?>" alt=""/>
          <div class="overlay">
              <p class="couple"><?php echo html($p->title()) ?></p>
          </div>
        </a>			
        <?php endif ?>
        <?php endforeach ?>
      </div>
    </section>

    <section id="bookingInfo">
      <h1>Booking Info</h1>
      <div class="wrapper">
        <div class="text">
          <p class="leadIn"><?php echo multiline( $page->leadin() ) ?></p>
          
        <?php echo kirbytext($page->bookinginfopitch()) ?>          
          
          <p>To ask about pricing, please fill out the form,<br>call us at <span class="important"><?php echo html($site->contactphone()) ?></span><br>or email us at <a href="mailto:hello@wearecaravan.com" class="important"><?php echo html($site->contactemail()) ?></a></p>
        </div>
        <form id="contactForm" method="post">
            <input type="text" name="name" placeholder="Name" />
            <input type="text" name="phone" placeholder="Phone Number" />
            <input type="text" name="email" placeholder="Email Address">
            <input type="text" name="weddingDate" placeholder="Wedding Date" />
            <textarea cols="40" rows="6" name="comments" placeholder="Comments or Questions"></textarea>
            <button type="submit" class="button" onclick="dosubmit();return false;">Send</button>
        </form>
      </div>
    </section>

    <section id="referral">
      <p>We’ll give you $100 for every wedding we book with your referral</p>
      <a href="/assets/download/referrals.pdf" class="button">Download this PDF For More Info<span></span></a>
    </section>

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
    
    <script type="text/javascript">
      function dosubmit() {
        var user_name = $("#contactForm input[name='name']").val();
        var user_phone = $("#contactForm input[name='phone']").val();
        var user_email = $("#contactForm input[name='email']").val();
        var user_weddate = $("#contactForm input[name='weddingDate']").val();
        var user_comments = $("#contactForm textarea[name='comments']").val();
        
		$.post("/ajax/docontact.php", 
           { name: user_name, 
             phone: user_phone,
             email: user_email,
             weddingDate: user_weddate,
             comments: user_comments 
		   }
		)
		.done(function(data) {
			$.fancybox(
				'<div class="submitMessage"><?php echo html(addslashes($page->contactsubmitmessage())) ?></div>',
				{
					'autoDimensions'	: true,
					'transitionIn'		: 'none',
					'transitionOut'		: 'none'
				}
			);
		});  
     }            
    </script>
<?php snippet('footer') ?>