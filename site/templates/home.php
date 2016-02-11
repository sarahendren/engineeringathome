<?php snippet('header') ?>
<section id="whatcounts">
	<a href="/about">
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-7">
						<?php echo $page->text()->markdown() ?>
					</div>
				</div>
			</div>
		</div>
		<img src="/assets/collage.png" width="1170" height="704" alt="A collage of silhouetted adaptations." data-bottom-top="transform: translateY(10%)" data-top-bottom="transform: translateY(0)">
	</a>
</section>
<section id="unlikelyobjects">
	<a href="/adaptations">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><strong>Engineering With</strong> Unlikely Objects</h1>
				</div>
			</div>
		</div>
	</a>
	<div class="conveyor grid" data-anchor-target="#unlikelyobjects" data-bottom-top="transform:translateX(1%)" data-top-bottom="transform:translateX(-25%)">
	  <?php foreach(page('adaptations')->children()->limit(7) as $adaptation):?>
		  <div class="adaptation <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
		    <a href="<?php echo $adaptation->url() ?>">
			  	<?php if($adaptation->images()->find('thumbnail.gif')): ?>
					<img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
			  	<?php else: ?>
				    <div class="responsive-sprites">
				    	<img src="/assets/adaptations-sprite-min.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
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
				    	<img src="/assets/adaptations-sprite-min.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
				    </div>
				<?php endif ?>
		    	<h2><?php echo $adaptation->title()->widont() ?></h2>
		    </a>
		  </div>
	  <?php endforeach ?>
	</div>
	<a href="/adaptations">
		<div class="container">
			<div class="row hidden-sm hidden-md hidden-lg">
				<div class="col-xs-12">
					<figure><img src="/assets/adaptations/web/fork-holder.png" alt="Fork Holder"></figure>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<span class="readmore">Browse all <strong>adaptations</strong> »</span>
				</div>
			</div>
		</div>
	</a>
</section>
<section id="unlikelypeopleexpansiveview">
	<div class="container">
		<div class="row">
			<a href="/about" class="col-xs-12 col-lg-6" id="unlikelypeople">
				<h1><strong>Engineering With</strong> Unlikely People</h1>
				<span class="readmore">Read <strong>cindy's story</strong> »</span>
			</a>
			<a href="/manifesto" class="col-xs-12 col-lg-6" id="expansiveview">
				<h1><strong>Engineering With</strong> An Expansive View</h1>
				<span class="readmore">Read the unlikely engineering <strong>manifesto</strong> »</span>
			</a>
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
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
<?php snippet('footer') ?>