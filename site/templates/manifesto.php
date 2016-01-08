<?php snippet('header') ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 header-content">
			<?php echo $page->header()->kirbytext() ?>
		</div>
		<figure class="col-sm-6">
			<img src="<?php echo $page->images()->first()->url() ?>">
		</figure>
	</div>
	<main class="main" role="main">
		<div class="text">
			<?php echo $page->text()->footnotes()->kirbytext() ?>
		</div>
	</main>

<?php snippet('footer') ?>