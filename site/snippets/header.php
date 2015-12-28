<?php if(!$site->user()) go('/panel') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <script>document.documentElement.className += ' wf-loading';</script>
  <?php echo css('/assets/css/default.css') ?>
  <script src="/assets/app.min.js"></script>
</head>
<body id="<?php echo $page->slug() ?>">
<header>
  <?php snippet('menu') ?>
</header>
<div class="container">
