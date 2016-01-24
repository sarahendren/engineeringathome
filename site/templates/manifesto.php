<?php snippet('header') ?>

<div class="container">
    <article role="article">
		<div class="row">
			<div class="col-xs-12 col-sm-4 header-content">
				<?php echo $page->header()->kirbytext() ?>
			</div>
			<figure class="col-sm-8">
	          <img src="<?php echo $page->images()->first()->resize(1170, 780)->url() ?>" srcset="<?php echo kirby_get_srcset($page->images()->first()) ?>" sizes="<?php echo kirby_get_sizes($page->images()->first()) ?>" alt="<?php echo $page->images()->first()->caption() ?>">
			</figure>
		</div>
		<main class="main" role="main">
			<div class="row">
				<h2 class="col-sm-2 left-heading">engineering with unlikely people</h2>
				<section class="content col-sm-10">
					<div class="row">
						<?php echo $page->unlikelypeople()->kirbytext() ?>
					</div>	
				</section>
			</div>
			<div class="row">
				<h2 class="col-sm-2 left-heading">engineering with unlikely things</h2>
				<section class="content col-sm-10">
					<div class="row">
						<?php echo $page->unlikelythings()->kirbytext() ?>		
					</div>	
				</section>
			</div>
			<div class="row">
				<h2 class="col-sm-2 left-heading">engineering with an expansive view</h2>
				<section class="content col-sm-10">
					<div class="row">
						<?php echo $page->expansiveview()->kirbytext() ?>		
					</div>	
				</section>
			</div>
			<div class="row">
				<h2 class="col-sm-2 left-heading">this counts too</h2>
				<section class="content col-sm-10">
					<div class="row">
						<?php echo $page->thiscountstoo()->kirbytext() ?>		
					</div>	
				</section>
			</div>
		</main>
	</article>
</div>
<script>
	$('main').sidenotes;
</script>
<?php snippet('footer') ?>