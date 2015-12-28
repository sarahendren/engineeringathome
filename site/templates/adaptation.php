<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <div class="row">
      <div class="main-gallery js-flickity" data-flickity-options='{ "imagesLoaded": true, "lazyLoad": 3}'>
        <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
        <div class="gallery-cell <?php echo $image->kind() ?>"><img data-flickity-lazyload="<?php echo $image->resize(1170, 780)->url() ?>" width="<?php echo $image->resize(1170, 780)->width() ?>" height="<?php echo $image->resize(1170, 780)->height() ?>" alt="<?php echo $page->title()->html() ?>"></div>
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
      <ul>
        <?php foreach($relpages->shuffle()->limit(3) as $relpage): ?>
          <li><a href="<?php echo $relpage->url() ?>"><?php echo $relpage->title() ?></a></li>
        <?php endforeach ?>
      </ul>

    </div>
  </main>

<?php snippet('footer') ?>