<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php //snippet('submenu') ?>


    <div id="homeHero" <?php if ($page->hasImages()) {?>style="background-image: url('<?php echo $page->images()->shuffle()->first()->url() ?>')"<? } ?>>
      <p id="mainTitle"><?php echo html($page->herocaption()) ?></p>
      <a href="<?php echo $page->showreelvimeolink() ?>" class="fancybox-media bigButton" title="2013 Showreel"><span></span>2013 Showreel</a>
    </div>

    <section id="intro">
      <div class="wrapper">
        <h2><?php echo html($page->introtitle()) ?></h2>
        <p><?php echo html($page->introtext()) ?></p>
      </div>
    </section>

    <section id="featuredWork" class="clearfix">
      
      <h1>Featured Work</h1>
      
      <div class="wrapper" class="clearfix">

        <?php foreach($pages->find('work')->children()->visible() as $p): ?>
        
      		<?php if ( $p->featured() == 'on' ): ?>

            <?php 
            $images = $p->images();

            $projectThumb = null;
            $thumbImages = array();
            $productionImages = array();

            foreach ($images as $image) {
              
              // get our hero images
              if (preg_match('/thumb/i', $image->filename()) == 1) {
                
                $thumbImages[] = $image;
                
              // get our production images
              } else if (preg_match('/hero/i', $image->filename()) != 1) {
                
                $productionImages[] = $image;
                
              }
              
              // randomize our thumb image if there is more than one
              if (!empty($thumbImages)) {
                
                shuffle($thumbImages);
                $projectThumb = $thumbImages[0];
                
              } else {
                
                shuffle($productionImages);
                $projectThumb = $productionImages[0];
                
              }
              
            }
            ?>

            <?php if (!empty($projectThumb)) { ?>
        			<a href="<?php echo $p->url() ?>" class="workThumb">
                <?php echo thumb($projectThumb, array('width' => 320)) ?>
        			  <div class="overlay">
          				<div class="text">
          				  <p class="title"><?php echo html($p->title()) ?></p>
                    <p class="client"><?php echo html($p->client()) ?></p>
          				</div>
        			  </div>
        			</a>
            <?php } ?>

          <?php endif ?>
          
        <?php endforeach ?>
        
      </div>
      
      <a href="/work" class="button">See The Rest Of Our Work<span></span></a>

    </section>    
    
    <?php // ---------------------------- ?>    
    
    <section id="aboutCaravan" class="clearfix">
      <h1>About Caravan</h1>
      <div class="wrapper">
        <div class="profile">
          <img src="<?php echo url('assets/images/jacob.jpg') ?>">
          <p class="name">Jacob Lewis</p>
          <p class-"bio"><?php echo html($page->jacobbio()) ?></p>
        </div>

        <div class="profile">
          <img src="<?php echo url('assets/images/jon.jpg') ?>">
          <p class="name">Jon Muedder</p>
          <p class-"bio"><?php echo html($page->jonbio()) ?></p>
        </div>

        <div class="profile">
          <img src="<?php echo url('assets/images/bernardo.jpg') ?>">
          <p class="name">Bernardo Marentes</p>
          <p class-"bio"><?php echo html($page->bernardobio()) ?> </p>
        </div>
      </div>
    </section>

<?php snippet('socialfooter') ?>
<?php snippet('footer') ?>