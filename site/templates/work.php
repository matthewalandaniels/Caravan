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

			<a href="<?php echo $p->url() ?>" class="workThumb">
			  <img src="<?php echo $p->children()->find('thumb_image')->files()->first()->url() ?>" alt=""/>
			  <div class="overlay">
				<div class="text">
				  <p class="client"><?php echo html($p->client()) ?></p>
				  <p class="title"><?php echo html($p->title()) ?></p>
				</div>
			  </div>
			</a>

        <?php endif ?>            
        <?php endforeach ?>
      </div>

    </section>    
    
    

<?php snippet('footer') ?>