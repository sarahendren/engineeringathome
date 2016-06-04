<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">
	<header>
		<div class="row">
		    <h1 class="col-xs-12">adaptations</h1>
	    </div>
	    <section id="filters">
		    <div class="row">
			    <div class="col-xs-12 text-center lead"><?php echo $page->text()->kt() ?></div>
			</div>
	    </section>
	</header>
	<div class="row">
		<ol class="list-view nav nav-pills nav-stacked col-xs-12">
		  <?php foreach(page('adaptations')->children() as $adaptation):?>
			  <li>
			    <a class="row" href="<?php echo $adaptation->url() ?>">
			    	<div class="col-xs-4 col-sm-2"><div class="responsive-sprites"><img src="/assets/adaptations-sprite-min.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>"></div></div>
				    <h2 class="col-xs-8 col-sm-10"><?php echo $adaptation->title()->html() ?></h2>
			    </a>
			  </li>
		  <?php endforeach ?>
		</ul>
	</div>
  </main>
</div>
<?php snippet('footer') ?>
