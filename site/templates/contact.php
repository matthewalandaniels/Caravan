<?php snippet('header') ?>
<?php snippet('menu') ?>

    <section id="intro">
      <div class="wrapper">
        <h1><?php echo html($page->introtitle()) ?></h1>
        <p><?php echo html($page->introtext()) ?></p>
        <div id="contactSocialLinks">
          <a href="https://twitter.com/MadeByCaravan" class="twitter"><span></span></a>
          <a href="http://www.facebook.com/WeAreCaravan" class="facebook"><span></span></a>
          <a href="http://vimeo.com/wearecaravan" class="vimeo"><span></span></a>
          <a href="http://instagram.com/wearecaravan" class="instagram"><span></span></a>
        </div>
      </div>
    </section>
    
    <section id="contactDetails">
      <div id="contactDetailsContainer">
        <div id="contactPhone"><div class="icon"></div><?php echo html($site->contactphone()) ?></div>
        <a href="mailto:<?php echo html($site->contactemail()) ?>" id="contactEmail"><div class="icon"></div><?php echo $site->contactemail() ?></a>
        <a href="<?php echo $site->googlemapsurl() ?>" id="contactLocation"><p><div class="icon"></div><?php echo $site->contactaddressl1() ?></p><p><?php echo $site->contactaddressl2() ?></p>
        </a>
      </div>
    </section>

    <section id="contactQuotes">
      <h1>Flattering Comments</h1>
      <div class="row">
        <p class="quote">“<?php echo html($page->quotetext1) ?>”
        <span class="name">- <?php echo $page->quotename1 ?></span>
        </p>
        <p class="quote">“<?php echo html($page->quotetext2) ?>”
        <span class="name">- <?php echo $page->quotename2 ?></span>
        </p>
      </div>
      <div class="row" id="last">
        <p class="quote">“<?php echo html($page->quotetext3) ?>”
        <span class="name">- <?php echo html($page->quotename3) ?></span>
        </p>
        <p class="quote">“<?php echo html($page->quotetext4) ?>”
        <span class="name">- <?php echo html($page->quotename4) ?></span>
        </p>
      </div>
    </section>

    <section id="weddingCallout">
      <a href="/weddings" class="button">Looking For Wedding Info?<span></span></a>
    </section>    

<?php snippet('footer') ?>