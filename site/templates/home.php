<?php snippet('header') ?>
<section id="whatcounts">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<a href="/about" class="col-sm-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-7">
					<?php echo $page->text()->markdown() ?>
				</a>
			</div>
		</div>
	</div>
	<img src="/assets/collage.png" width="1170" height="704" alt="A collage of silhouetted adaptations." data-bottom-top="transform: translateY(10%)" data-top-bottom="transform: translateY(0)">
</section>
<section id="unlikelyobjects">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><a href="/adaptations"><strong>Engineering With</strong> Unlikely Objects</a></h1>
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
	<div class="container">
		<div class="row hidden-sm hidden-md hidden-lg">
			<div class="col-xs-12">
				<figure><img src="/assets/adaptations/web/fork-holder.png" alt="Fork Holder"></figure>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<a class="readmore" href="/adaptations">Browse all <strong>adaptations</strong></a>
			</div>
		</div>
	</div>
</section>
<section id="unlikelypeopleexpansiveview">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-6" id="unlikelypeople">
				<h1><a href="/about"><strong>Engineering With</strong> Unlikely People</a></h1>
				<a class="readmore" href="/about">Read <strong>about</strong> the project and Cindy's story</a>
			</div>
			<div class="col-xs-12 col-lg-6" id="expansiveview">
				<h1><a href="/manifesto"><strong>Engineering With</strong> An Expansive View</a></h1>
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