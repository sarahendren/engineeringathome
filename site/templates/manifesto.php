<?php snippet('header') ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-4 header-content">
			<?php echo $page->header()->kirbytext() ?>
		</div>
		<figure class="col-sm-8">
          <img src="<?php echo $page->images()->first()->resize(1170, 780)->url() ?>" srcset="<?php echo kirby_get_srcset($page->images()->first()) ?>" sizes="<?php echo kirby_get_sizes($page->images()->first()) ?>" alt="<?php echo $page->images()->first()->caption() ?>">
		</figure>
	</div>
	<main class="main" role="main">
		<div class="text">
			<?php echo $page->text()->footnotes()->kirbytext() ?>
		</div>
	</main>

<?php snippet('footer') ?>