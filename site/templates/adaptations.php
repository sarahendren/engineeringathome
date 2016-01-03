<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">
	<header>
		<div class="row">
		    <h1>to date, <strong>cindy has engineered <?php echo $page->children()->count() ?> adaptations</strong>, built of things like cable ties, cosmetic sponges, peel-and-stick hooks, and more.</h1>
	    </div>
	    <section id="filters">
		    <div class="row">
			    <p class="text-center lead"><em>Filter adaptations by selecting a verb below.</em></p>
			</div>
			<div class="row">
				<?php $tagcloud = tagcloud(page('adaptations'), array('field' => 'verbs', 'param' => 'verb')) ?>
				<div class="filter-button-group">
					<?php foreach($tagcloud as $tag): ?>
						<button class="<?php echo $tag->name() ?>" data-filter=".<?php echo $tag->name() ?>"><?php echo $tag->name() ?></button>
					<?php endforeach ?>
				</div>
			</div>
	    </section>
	</header>
	<div class="row">
		<div class="col-xs-12 grid grid js-isotope">
		  <?php foreach(page('adaptations')->children() as $adaptation):?>
			  <div class="col-xs-6 col-sm-4 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
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
	</div>
	<script type="text/javascript">
	$('.grid a').hover(
		function(myClass){ $(this).find('img').addClass('silhouette') },
		function(myClass){ $(this).find('img').removeClass('silhouette') }
	);
	function getHashFilter() {
	  // get filter=filterName
	  var matches = location.hash.match( /filter=([^&]+)/i );
	  var hashFilter = matches && matches[1];
	  return hashFilter && decodeURIComponent( hashFilter );
	}

	$( function() {

	  var $grid = $('.grid');

	  // bind filter button click
	  var $filterButtonGroup = $('.filter-button-group');
	  $filterButtonGroup.on( 'click', 'button', function() {
	    var filterAttr = $( this ).attr('data-filter');
	    // set filter in hash
	    location.hash = 'filter=' + encodeURIComponent( filterAttr );
	  });

	  var isIsotopeInit = false;

	  function onHashchange() {
	    var hashFilter = getHashFilter();
	    if ( !hashFilter && isIsotopeInit ) {
	      return;
	    }
	    isIsotopeInit = true;
	    // filter isotope
	    $grid.isotope({
	      itemSelector: '.element-item',
	      layoutMode: 'fitRows',
	      filter: hashFilter
	    });
	    // set selected class on button
	    if ( hashFilter ) {
	      $filterButtonGroup.find('.active').removeClass('active');
	      $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('active');
	    }
	  }

	  $(window).on( 'hashchange', onHashchange );

	  // trigger event handler to init Isotope
		var $container = $('.grid');
		$container.imagesLoaded(function () {
			onHashchange();
		});

	});
	</script>

	<hr>

	<h2>Things That Don't Work (Yet)</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </main>

<?php snippet('footer') ?>