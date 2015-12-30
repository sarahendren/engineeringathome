<?php snippet('header') ?>

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
      <ul>
        <?php foreach($relpages->shuffle()->limit(3) as $relpage): ?>
          <li><a href="<?php echo $relpage->url() ?>"><?php echo $relpage->title() ?></a></li>
        <?php endforeach ?>
      </ul>

    </div>
  </main>

<?php snippet('footer') ?>