<?php snippet('header') ?>

<div class="container">
	<main class="main col-sm-8 col-sm-offset-2" role="main">
	<header>
		<div class="row">
		    <h1 class="col-xs-12"><?php echo $page->title() ?></h1>
	    </div>
    </header>
    <div class="text lead">
      <?php echo $page->text()->footnotes()->kirbytext() ?>
    </div>

  </main>
</div>
<?php snippet('footer') ?>