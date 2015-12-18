<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <div class="main-gallery js-flickity" data-flickity-options='{ "imagesLoaded": true, "lazyLoad": true}'>
    <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
    <div class="gallery-cell"><img src="<?php echo $image->resize(800,800)->url() ?>" alt="<?php echo $page->title()->html() ?>"></div>
    <?php endforeach ?>
    </div>


    <div class="text">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <ul class="meta cf">
      <li><b>Tags:</b> <?php echo $page->tags() ?></li>
    </ul>

  </main>

<?php snippet('footer') ?>