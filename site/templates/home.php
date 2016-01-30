<?php snippet('header') ?>
<section id="whatcounts">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-7">
					<h1>What Counts<br> as  Engineering?</h1>
					<h2>Things you do with <a href="/adaptations/cable-ties">cable ties</a>? <a href="/adaptations/cosmetic-sponges">Cosmetic sponges</a>? How about <a href="/adaptations/adhesive-wall-hooks">peel-and-stick hooks</a>?</h2>
				</div>
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
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="contact col-sm-4">
					<h2>Contact <i class="fa fa-envelope"></i></h2>
					<hr>
					<?php echo $site->contact()->kt() ?>
				</div>
				<div class="social col-sm-4">
					<h2>Connect <i class="fa fa-facebook"></i></h2>
					<hr>
					<?php echo $site->social()->kt() ?>
				</div>
				<div class="copyright col-sm-4">
					<h2>Re-use <i class="fa fa-creative-commons"></i></h2>
					<hr>
					<?php echo $site->copyright()->kt() ?>
				</div>	
			</div>
		</div>
	</footer>
	<script>
	$(function() {
		FastClick.attach(document.body);
	});
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-72234537-1', 'auto');
	ga('send', 'pageview');
	</script>
</body>
</html>