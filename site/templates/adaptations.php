<?php snippet('header') ?>

<div class="container">
  <main class="main" role="main">
	<header>
		<div class="row">
		    <h1><?php echo $page->title()->html() ?></h1>
	    </div>
	    <div class="row">
		    <div class="lead col-md-6 col-md-offset-3"><?php echo $page->text()->kirbytext() ?></div>
		</div>
	</header>

    <hr>

    <?php snippet('adaptations') ?>
	
	<hr>

	<h2>Things That Don't Work (Yet)</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </main>

<?php snippet('footer') ?>