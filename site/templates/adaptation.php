<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <div class="row">
      <div class="main-gallery js-flickity" data-flickity-options='{ "imagesLoaded": true, "lazyLoad": 3}'>
        <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
        <div class="gallery-cell <?php echo $image->kind() ?>"><figure><img src="<?php echo $image->resize(1170, 780)->url() ?>" srcset="<?php echo kirby_get_srcset($image) ?>" sizes="<?php echo kirby_get_sizes($image) ?>" alt="<?php echo $page->title()->html() ?>"></figure></div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="row">
      <div class="text col-md-6 col-md-offset-3">
        <?php echo $page->text()->kirbytext() ?>
      </div>
    </div>
    <div class="row">
      <?php $Options = array('startURI' => '/adaptations', 'searchField' => 'Verbs');
      $relpages = relatedpages($Options); ?>

      <div class="grid">
        <?php foreach($relpages->shuffle()->limit(3) as $adaptation): ?>
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
  </main>

<?php snippet('footer') ?>