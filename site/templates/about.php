<?php snippet('header') ?>

<div class="container">
	<main class="main" role="main">
		<header class="row">
			<h1 class="col-sm-2 left-heading"><?php echo $page->title() ?></h1>
		</header>
		<div class="row">
			<section style="col-sm-8">
				<h2 class="col-sm-2 left-heading">Cindy's Story</h2>
				<section class="content col-sm-6">
					<?php echo $page->cindy()->kirbytext() ?>		
				</section>
			</section>
			<figure class="col-sm-4">
				<img src="<?php echo $page->images()->first()->resize(360,540)->url() ?>" alt="Cindy">				
			</figure>
		</div>
		<div class="row">
			<h2 class="col-sm-2 left-heading">About the Project</h2>
			<section class="content col-sm-6">
				<?php echo $page->about()->kirbytext() ?>		
			</section>
			<section class="col-sm-4 right-col">
				<h2>Creators</h2>
				<section class="content">
					<?php echo $page->creators()->kirbytext() ?>
				</section>
				<h2>Acknowledgments</h2>
				<section class="content">
					<?php echo $page->acknowledgments()->kirbytext() ?>
				</section>
			</section>
		</div>
	</main>
</div>
<?php snippet('footer') ?>