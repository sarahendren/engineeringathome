<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->intro() ?>">
  <meta name="keywords" content="<?php echo $site->keywords() ?>">
  <meta property="og:title" content="<?php echo $page->title() ?>" />
  <meta property="og:description" content="<?php echo $page->intro() ?>" />
  <meta property="og:site_name" content="<?php echo $site->title() ?>" />
  <meta property="og:url" content="<?php echo $page->url() ?>" />
  <meta property="og:image" content="<?php echo $page->images()->first()->url() ?>" />
  <script>document.documentElement.className += ' wf-loading';</script>
  <?php echo css('/assets/css/default.css') ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="/assets/js/app.min.js"></script>
<body id="<?php echo $page->slug() ?>" <?php if($page->template() != $page->slug()): ?>class="<?php echo $page->template() ?>"<?php endif ?>>
<header role="banner">
  <?php snippet('menu') ?>
</header>