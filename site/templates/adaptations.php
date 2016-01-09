<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">
	<header>
		<div class="row">
		    <h1>to date, <strong>cindy has engineered <?php echo $page->children()->count() ?> adaptations</strong>, built of things like cable ties, cosmetic sponges, peel-and-stick hooks, and more.</h1>
	    </div>
	    <section id="filters">
		    <div class="row">
			    <div class="col-xs-12"><p class="text-center lead"><em>Filter adaptations by selecting an action&nbsp;below.</em></p></div>
			</div>
			<div class="row">
				<?php $tagcloud = tagcloud(page('adaptations'), array('field' => 'verbs', 'param' => 'verb')) ?>
				<div class="filter-button-group row">
					<div class="filters">
						<?php foreach($tagcloud as $tag): ?>
							<div class="col-xs-6 col-sm-4 col-md-3">
								<button class="<?php echo $tag->name() ?>" data-filter=".<?php echo $tag->name() ?>"><?php echo $tag->name() ?>
									<div class="responsive-sprites">
								    	<img src="/assets/handwriting-sprite.png" class="<?php echo $tag->name() ?>" alt="<?php echo $tag->name() ?>">
									</div>
								</button>
							</div>
						<?php endforeach ?>
					</div>
					<h2 class="col-xs-12 text-center">adaptations <strong class="filter-status"></strong> <a href="#filter=*" data-filter="*" class="clear-button" style="display:none">(clear filter)</a></h2>
				</div>
			</div>
	    </section>
	</header>
	<div class="row">
		<div class="col-xs-12 grid">
		  <?php foreach(page('adaptations')->children() as $adaptation):?>
			  <div class="col-xs-6 col-sm-4 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
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
	  var $filters = $('.filters');

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
	    })
	    $filters.isotope();
	    // set selected class on button
	    if ( hashFilter ) {
	      $filterButtonGroup.find('.active').removeClass('active');
	      $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('active');
				$('.filter-status').text(' to ' + hashFilter.substr(1));
				$('.clear-button').show();	
	    }
	    if (hashFilter == '*') {
				$('.filter-status').text('');	
				$('.clear-button').hide();	
	    }
	  }

	  $(window).on( 'hashchange', onHashchange );

	  // trigger event handler to init Isotope
		var $container = $('.grid');
		var $filters = $('.filters');
		$container.imagesLoaded(function () {
			onHashchange();
		});
		$filters.imagesLoaded(function () {
			onHashchange();
		});

		$grid

	});
	</script>

<?php snippet('footer') ?>