<?php snippet('header') ?>
<section id="unlikelyengineering" data-bottom-top="background-position: center 90%" data-top-bottom="background-position: center -25%">
	<div class="container">
		<div class="row">
			<div class="col-xs-12" data-anchor-target="#unlikelyengineering" data-bottom-top="transform: translateY(0%)" data-top-bottom="transform: translateY(100%)">
				<h1>unlikely<strong>.engineering</strong></h1>
			</div>
		</div>
	</div>
</section>
<section id="unlikelyobjects">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> Unlikely Objects</h1>
			</div>
		</div>
	</div>
	<div class="conveyor grid" data-anchor-target="#unlikelyobjects" data-bottom-top="transform:translateX(1%)" data-top-bottom="transform:translateX(-25%)">
	  <?php foreach(page('adaptations')->children()->limit(7) as $adaptation):?>
		  <div class="adaptation <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
		    <a href="<?php echo $adaptation->url() ?>">
			  	<?php if($adaptation->images()->find('thumbnail.gif')): ?>
					<img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
			  	<?php else: ?>
				    <div class="responsive-sprites">
				    	<img src="/assets/adaptations-sprite.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
				    </div>
				<?php endif ?>
		    	<h2><?php echo $adaptation->title()->widont() ?></h2>
		    </a>
		  </div>
	  <?php endforeach ?>
	</div>
	<div class="conveyor grid last" data-anchor-target="#unlikelyobjects" data-bottom-center="transform:translateX(-25%)" data-top-bottom="transform:translateX(1%)">
	  <?php foreach(page('adaptations')->children()->slice(7, 7) as $adaptation):?>
		  <div class="adaptation <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
		    <a href="<?php echo $adaptation->url() ?>">
			  	<?php if($adaptation->images()->find('thumbnail.gif')): ?>
					<img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
			  	<?php else: ?>
				    <div class="responsive-sprites">
				    	<img src="/assets/adaptations-sprite.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
				    </div>
				<?php endif ?>
		    	<h2><?php echo $adaptation->title()->widont() ?></h2>
		    </a>
		  </div>
	  <?php endforeach ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<a class="readmore" href="/adaptations">Browse all <strong>adaptations</strong></a>
			</div>
		</div>
	</div>
</section>
<section id="unlikelypeople" data-bottom-top="background-position: right 75%" data-top-bottom="background-position: right -25%">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> Unlikely People</h1>
				<a class="readmore" href="/about">Read <strong>about</strong> the project and Cindy's story</a>
			</div>
		</div>
	</div>
</section>
<section id="expansiveview" data-bottom-top="background-position: center 75%" data-top-bottom="background-position: center 25%">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><strong>Engineering With</strong> An Expansive View</h1>
				<a class="readmore" href="/manifesto">Read the unlikely engineering <strong>manifesto</strong></a>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
$('.grid a').hover(
	function(myClass){ $(this).find('img').addClass('silhouette') },
	function(myClass){ $(this).find('img').removeClass('silhouette') }
);
if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
    skrollr.init({
        forceHeight: false
    });
}
</script>
<?php snippet('footer') ?>