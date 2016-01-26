<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->intro() ?>">
  <meta name="keywords" content="<?php echo $site->keywords() ?>">
  <meta property="og:title" content="<?php if($page->slug() != 'home'): ?><?php echo $page->title()->html() ?> | <?php endif ?><?php echo $site->title()->html() ?>" />
  <?php if ($page->intro()): ?><meta property="og:description" content="<?php echo $page->intro() ?>" /><?php endif ?>
  <meta property="og:site_name" content="<?php echo $site->title() ?>" />
  <meta property="og:url" content="<?php echo $page->url() ?>" />
  <?php if ($page->images()->count() > 0): ?><meta property="og:image" content="<?php echo $page->images()->first()->url() ?>" /><?php endif ?>
  <?php if ($page->images()->count() > 0): ?><meta property="og:image:width" content="<?php echo $page->images()->first()->width() ?>" /><?php endif ?>
  <?php if ($page->images()->count() > 0): ?><meta property="og:image:height" content="<?php echo $page->images()->first()->height() ?>" /><?php endif ?>
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@unlikelyengineering" />
  <meta name="twitter:title" content="<?php if($page->slug() != 'home'): ?><?php echo $page->title()->html() ?> | <?php endif ?><?php echo $site->title()->html() ?>" />
  <?php if ($page->description()): ?><meta name="twitter:description" content="<?php echo $page->intro() ?>" /><?php endif ?>
  <?php if ($page->images()->count() > 0): ?><meta name="twitter:image" content="<?php echo $page->images()->first()->url() ?>" /><?php endif ?>
  <script>document.documentElement.className += ' wf-loading';</script>
  <?php echo css('/assets/css/default.css') ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="/assets/js/app.min.js"></script>
<body id="<?php echo $page->slug() ?>" <?php if($page->template() != $page->slug()): ?>class="<?php echo $page->template() ?>"<?php endif ?>>
<header role="banner">
  <?php snippet('menu') ?>
</header>