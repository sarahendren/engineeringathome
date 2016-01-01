<?php snippet('header') ?>
<style>
	* {
	}
	body {
		height:10000px;
	}
	.navbar {
		margin:0;
	}
	.moss {
		background-image: url(/assets/asfalt-light.png);
		background-position: center;
	}
	#collage {
		margin-top: 75vh;
		position: relative;
		display: block;
	}
	#collage a {
		z-index: 1000;
		display: block;
		background-repeat: no-repeat;
		background-size: contain;
		background-position: center;
		padding:0;
	}
	#collage a img {
		opacity: 0;
		display: block;
		margin: auto;
	}
	#collage a:hover img {
		opacity: 1!important;
	}
	#objects section {
		display: block;
		height: 100vh;
		text-align: center;
	}
	#objects h1 {
		position: relative;
		top: 40%;
		left: -50%;
		transform: translateY(-60%), translateX(-50%);
		color: #fff;
		font-size: 5em;
	}
	.more {
		display:block;
		text-align: center;
		padding: 125px 0!important;
		color: #fff;
	}
<?php foreach($page->images() as $adaptation): ?>
<?php if(!strpos($adaptation->name(), '-hover') !== false): ?>
#a-<?php echo $adaptation->name() ?>-hover {background-image: url('/content/home/<?php echo $adaptation->name() ?>.png');}
<?php endif ?>
<?php endforeach ?>
</style>
<div class="moss" data-top="background-color:rgb(80,96,71);" data-bottom="background-color:rgb(159,185,100);">
	<div class="container">
		<section id="collage">
			<div class="row" id="objects" data-anchor-target="#collage" data-start="position:fixed;left:50%;opacity:1;" data-200-start="opacity:0;" data-100p-bottom="position:absolute;bottom:0;opacity:0;">
				<section class="col-xs-12">
					<h1><strong>Engineering With</strong> Unlikely Objects<br><br>☟</h1>
				</section>
			</div>
			<?php foreach($page->images()->filterBy('filename', '*=', '-hover') as $adaptation): ?>
				<div class="row">
					<a id="a-<?php echo $adaptation->name() ?>" href="/adaptations/<?php echo $adaptation->name() ?>">
						<img src="<?php echo $adaptation->url() ?>" alt="Pen Holder" data-top-top="opacity:1;" data-center-bottom="opacity:1;" data-center-top="opacity:1;" data-bottom-bottom="opacity:0;">
					</a>
				</div>
			<?php endforeach ?>
			<div class="row">
				<a class="col-xs-4 more" href="/adaptations/">Browse All Adaptations &rarr;</a>
			</div>
		</section>
	</div>
</div>
<div class="container">
	<div class="text">
		<?php echo $page->text()->footnotes()->kirbytext() ?>
	</div>
	
	<script type="text/javascript">
	var s = skrollr.init();
	</script>
	<?php snippet('footer') ?>