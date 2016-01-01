<?php snippet('header') ?>

<?php if($page->images()->count() > 0): ?>
	<header class="image">
		<div class="container">
			<img src="<?php echo $page->images()->first()->url() ?>">
		</div>
	</header>
	<header>
		<div class="container">
			<div class="col-xs-12 header-content">
				<?php echo $page->header()->kirbytext() ?>
			</div>
		</div>
	</header>
<?php endif ?>

<div class="container">
  <main class="main" role="main">
    <div class="text">
      <?php echo $page->text()->footnotes()->kirbytext() ?>
    </div>

  </main>

<?php snippet('footer') ?>