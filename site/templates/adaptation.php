<?php snippet('header') ?>
<?php 
  function plural( $amount, $singular = '', $plural = 's' ) {
      if ( $amount == 1 )
          return $singular;
      else
          return $plural;
  }
 ?>
<div class="container">
  <main class="main" role="main">

    <div class="row" id="studio">
      <div class="col-sm-6 col-md-4">
        <h1><?php echo $page->title()->html() ?></h1>
        <div class="lead"><?php echo $page->intro()->kirbytext() ?></div>
        <hr>
        <h2>Page Contents</h2>
        <ul>
          <li><?php echo $studio->count() . ' × Studio Photo' . plural( $studio->count() ); ?> <span class="visible-sm-inline visible-md-inline visible-lg-inline visible-xl-inline">(Right)</span><span class="visible-xs-inline">(Below)</span></li>
          <?php if ($inuse->count() > 0): ?><li><a href="#inuse"><?php echo $inuse->count() . ' × In Situ Photo' . plural( $inuse->count() ); ?></a></li><?php endif ?>
          <li><a href="#description">Description</a></li>
          <?php if ($diagram->count() > 0): ?><li><a href="#diagram"><?php echo $diagram->count() . ' × Schematic' . plural( $diagram->count() ); ?></a></li><?php endif ?>
          <li><a href="#related">Related adaptations</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-8">
        <div class="main-gallery js-flickity" data-flickity-options='{ "imagesLoaded": true, "lazyLoad": 3, "pageDots": false}'>
          <?php foreach($studio as $image): ?>
          <div class="gallery-cell"><figure><img src="<?php echo $image->resize(1170, 780)->url() ?>" srcset="<?php echo kirby_get_srcset($image) ?>" sizes="<?php echo kirby_get_sizes($image) ?>" alt="<?php echo $image->caption() ?>"></figure></div>
          <?php endforeach ?>
        </div>
        <div class="gallery gallery-nav js-flickity"
          data-flickity-options='{ "asNavFor": ".main-gallery", "pageDots": false, "setGallerySize": true, "contain": true, "prevNextButtons": false, "imagesLoaded": true }'>
          <?php foreach($studio as $image): ?>
            <div class="gallery-cell"><img src="<?php echo $image->crop(100,100)->url() ?>" alt="<?php echo $page->title()->html() ?>"></div>
          <?php endforeach ?>
        </div>
      </div>
    </div>

    <?php if ($inuse->count() > 0): ?>
      <hr>

      <div class="row" id="inuse">
        <h2 class="col-xs-12">In Situ</h2>
        <?php foreach($inuse as $image): ?>
          <?php if ($inuse->count() == 1): ?>
          <figure class="col-sm-6 col-sm-offset-3">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(748)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php elseif ($inuse->count() == 2): ?>
          <figure class="col-xs-6">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php elseif ($inuse->count() == 3): ?>
          <figure class="col-xs-6 col-sm-4">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php elseif ($inuse->count() == 4): ?>
          <figure class="col-xs-6 col-sm-3">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php elseif ($inuse->count() == 5): ?>
          <figure class="col-xs-4 col-sm-2">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php elseif ($inuse->count() == 6): ?>
          <figure class="col-sm-2">
            <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
          </figure>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    <?php endif ?>

    <hr>

    <div class="row" id="description">
      <h2 class="col-sm-3">Description</h2>
      <div class="text col-sm-6">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </div>

    <?php if ($diagram->count() > 0): ?>
    <hr>
    <div class="row" id="diagram">
      <h2 class="col-xs-12">Schematic</h2>
          <?php foreach($diagram as $image): ?>
            <figure class="col-sm-6">
              <a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
            </figure>
          <?php endforeach ?>
    </div>
    <?php endif ?>

    <hr>

    <div class="row" id="related">
      <h2 class="col-xs-12">Related Adaptations</h2>
      <?php $Options = array('startURI' => '/adaptations', 'searchField' => 'Verbs');
      $relpages = relatedpages($Options); ?>

      <div class="grid">
        <?php foreach($relpages->shuffle()->limit(3) as $adaptation): ?>
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
  </main>
<link type="text/css" href="/node_modules/fluidbox/dist/css/fluidbox.min.css" media="all" rel="stylesheet" />
<script type="text/javascript" src="/assets/jquery.ba-throttle-debounce.min.js"></script>
<script src="/node_modules/fluidbox/dist/js/jquery.fluidbox.min.js"></script>
<script>
// Initialize Fluidbox
$('figure a').fluidbox();

// Call public methods
$(window).scroll(function() {
  $('figure a').fluidbox('close');
});

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