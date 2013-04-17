<?php snippet('header') ?>
<?php snippet('menu') ?>


    <section id="intro">
      <div class="wrapper">
        <h2><?php echo html($page->introtitle()) ?></h2>
        <p><?php echo html($page->introtext()) ?>
        </p>
      </div>
    </section>
    
    <section id="work" class="clearfix">
      <div class="wrapper" .class="clearfix">        
      
        <?php foreach($page->children()->visible() as $p): ?>

      		<?php if ( hasCategory('work', $p->categories()) ): ?>

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

    </section>

<?php snippet('footer') ?>