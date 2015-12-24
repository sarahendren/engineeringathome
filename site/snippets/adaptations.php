<div class="row">
	<?php $tagcloud = tagcloud(page('adaptations'), array('field' => 'verbs', 'param' => 'verb')) ?>
	<div class="col-md-3">
		<div class="list-group list-group button-group filter-button-group">
			<button data-filter="*" class="list-group-item active">Everything <span class="badge"><?php echo $page->children()->count() ?></span></button>
			<?php foreach($tagcloud as $tag): ?>
				<button class="list-group-item" data-filter=".<?php echo $tag->name() ?>"><?php echo $tag->name() ?> <span class="badge"><?php echo $tag->results() ?></span></button>
			<?php endforeach ?>
		</div>
	</div>
	<div class="col-md-9 grid grid js-isotope">
	  <?php foreach(page('adaptations')->children() as $adaptation):?>
	  <div class="col-xs-6 col-sm-4 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
	    <?php if($image = $adaptation->images()->sortBy('sort', 'asc')->first()): ?>
	    <a class="thumbnail" href="<?php echo $adaptation->url() ?>">
	      <img class="img-circle" src="<?php echo $image->crop(150,150)->url() ?>" alt="<?php echo $adaptation->title()->html() ?>" width="150" height="150">
	    	<h2><?php echo $adaptation->title() ?></h2>
	    </a>
	    <?php endif ?>
	  </div>
	  <?php endforeach ?>
	</div>
</div>
<script src="/node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript">
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