<?php snippet('header') ?>
<style>
<?php foreach($page->images() as $adaptation): ?>
<?php if(!strpos($adaptation->name(), '-hover') !== false): ?>
#a-<?php echo $adaptation->name() ?>-hover {background-image: url('/content/home/<?php echo $adaptation->name() ?>.png');}
<?php endif ?>
<?php endforeach ?>
</style>
<section id="unlikelyengineering">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>unlikely.engineering</h1>
			</div>
		</div>
	</div>
</section>
<section id="unlikelyobjects">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> Unlikely Objects</h1>
				<a class="readmore" href="/adaptations">Browse all <strong>adaptations</strong></a>
			</div>
		</div>
	</div>
</section>
<section id="unlikelypeople">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> Unlikely People</h1>
				<a class="readmore" href="/about">Read <strong>about</strong> the project and Cindy's story</a>
			</div>
		</div>
	</div>
</section>
<section id="expansiveview">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> An Expansive View</h1>
				<a class="readmore" href="/manifesto">Ready the unlikely engineering <strong>manifesto</strong></a>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<?php snippet('footer') ?>