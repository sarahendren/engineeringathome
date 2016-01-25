<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">
	<header>
		<div class="row">
		    <h1 class="col-xs-12">adaptations</h1>
	    </div>
	    <section id="filters">
		    <div class="row">
			    <div class="col-xs-12"><p class="text-center lead"><em>Filter adaptations by selecting an action&nbsp;below.</em></p></div>
			</div>
			<?php $tagcloud = tagcloud(page('adaptations'), array('field' => 'verbs', 'param' => 'verb')) ?>
 			<div class="row">
				<div class="col-xs-12">
					<select id="filter-select" class="form-control">
							<option value="*">All actions</option>
						<?php foreach($tagcloud as $tag): ?>
							<option value=".<?php echo $tag->name() ?>"><?php echo $tag->name() ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="filter-button-group">
					<div class="filters hidden-xs">
						<?php foreach($tagcloud as $tag): ?>
							<div class="col-xs-3 col-sm-3 col-md-2">
								<button class="<?php echo $tag->name() ?>" data-filter=".<?php echo $tag->name() ?>"><?php echo $tag->name() ?>
									<div class="responsive-sprites">
								    	<img src="/assets/handwriting-sprite-min.png" class="<?php echo $tag->name() ?>" alt="<?php echo $tag->name() ?>">
									</div>
								</button>
							</div>
						<?php endforeach ?>
					</div>
					<h2 class="col-xs-12 text-center" id="adaptationsgrid"><strong class="filter-status"></strong> <a href="#filter=*" data-filter="*" class="clear-button" style="display:none">(clear filter)</a></h2>
				</div>
			</div>
	    </section>
	</header>
	<div class="row">
		<div class="col-xs-12 grid">
		  <?php foreach(page('adaptations')->children() as $adaptation):?>
			  <div class="col-xs-4 col-sm-4 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
			    <a href="<?php echo $adaptation->url() ?>">
				  	<?php if($adaptation->images()->find('thumbnail.gif')): ?>
						<img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
				  	<?php else: ?>
					    <div class="responsive-sprites">
					    	<img src="/assets/adaptations-sprite-min.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
					    </div>
					<?php endif ?>
			    	<h2><?php echo $adaptation->title() ?></h2>
			    </a>
			  </div>
		  <?php endforeach ?>
		</div>
	</div>
  </main>
</div>
	<script type="text/javascript">
	$('.grid a').hover(
		function(myClass){ $(this).find('img').addClass('silhouette') },
		function(myClass){ $(this).find('img').removeClass('silhouette') }
	);
	function getHashFilter() {
	  var matches = location.hash.match( /filter=([^&]+)/i );
	  var hashFilter = matches && matches[1];
	  return hashFilter && decodeURIComponent( hashFilter );
	}

	$( function() {

	  var $grid = $('.grid');
	  var $filters = $('.filters');

	  var $filterButtonGroup = $('.filter-button-group');
	  var $filterSelect = $('#filter-select');

	  $filterButtonGroup.on( 'mouseenter', 'button', function() {
		$('.filter-status').text('adaptations to ' + $( this ).attr('data-filter').substr(1));
		$grid.find('.element-item').removeClass('col-md-6');
	    $grid.isotope({
	      itemSelector: '.element-item',
	      layoutMode: 'fitRows',
	      filter: $( this ).attr('data-filter')
	    })
	  });

	  $filterButtonGroup.on( 'click', 'button', function() {
	    var filterAttr = $( this ).attr('data-filter');
	    location.hash = 'filter=' + encodeURIComponent( filterAttr );
        $('html,body').animate({
          scrollTop: $("#adaptationsgrid").offset().top
        }, 1000);
	  });

	  $filterButtonGroup.on( 'mouseleave', 'button', function() {
	    if ( getHashFilter() == null ) {
		    location.hash = 'filter=*';
		    return
		}
	    if ( getHashFilter() == '*' ) {
		    location.hash = 'filter=*';
			onHashchange();
		    return
		}
	    if ( getHashFilter() != '*' ) {
		    location.hash = 'filter=' + getHashFilter();
			onHashchange();
		    return
		}
	  });

	  $filterSelect.on( 'change', function(e) {
	    var filterAttr = $("option:selected", this).attr('value');
	    location.hash = 'filter=' + encodeURIComponent( filterAttr );
	  });

	  var isIsotopeInit = false;

	  function onHashchange() {
	    var hashFilter = getHashFilter();
	    if ( !hashFilter && isIsotopeInit ) {
	      return;
	    }
	    isIsotopeInit = true;
	    // set selected class on button
	    if ( hashFilter ) {
			$grid.find('.element-item').addClass('col-xs-6 col-md-4');
		    $filterButtonGroup.find('.active').removeClass('active');
		    $filterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('active');
			$filterSelect.val(hashFilter);
			$('.filter-status').text('adaptations to ' + hashFilter.substr(1));
			$('.clear-button').show();	
	    }
	    if (hashFilter == '*') {
			$grid.find('.element-item').removeClass('col-xs-6 col-md-4');
			$('.filter-status').text('');	
			$('.clear-button').hide();
			$filterSelect.val('*');
	    }
	    $grid.isotope({
	      itemSelector: '.element-item',
	      layoutMode: 'fitRows',
	      filter: hashFilter
	    })
	    $filters.isotope();
	  }

	  $(window).on( 'hashchange', onHashchange );
		var $container = $('.grid');
		var $filters = $('.filters');
		$container.imagesLoaded(function () {
			onHashchange();
		});
		$filters.imagesLoaded(function () {
			onHashchange();
		});
	});
	</script>
<script type="text/javascript">
function formatAction (action) {
  if (!action.id) { return action.text; }
  var $action = $(
	'<div class="responsive-sprites"><img src="/assets/handwriting-sprite-min.png" class="' + action.element.value + '"></div>'
  );
  return $action;
};
</script>
<?php snippet('footer') ?>