<?php if(!$site->user()) go('/panel') ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
<!--  <script>document.documentElement.className += ' wf-loading';</script>-->
  <?php echo css('/assets/css/default.css') ?>
  <script src="/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body id="<?php echo $page->slug() ?>">
<div class="container">
  <header class="navbar-fixed-top">
    <?php snippet('menu') ?>
  </header>
 	<main class="main" role="main">
 	<h1>Content Checklist</h1>
 	<hr id="adaptations">
		<table>
			<thead>
		 	<tr><th colspan="5"><h2>Adaptations Overview</h2></th></tr>
			<tr>
				<th>Thumb</th>
				<th>Title</th>
				<th>Text Length</th>
				<th>Tags</th>
				<th>Image Count</th>
			</tr>
			</thead>
			<?php foreach(page('adaptations')->children() as $adaptation): ?>
			<tr>
				<td>
					<?php if($image = $adaptation->images()->sortBy('sort', 'asc')->first()): ?>
						
						<img class="img-circle" src="<?php echo $image->crop(50,50)->url() ?>" alt="<?php echo $adaptation->title()->html() ?>" width="50" height="50" >
					<?php endif ?>
				</td>
				<td><a href="<?php echo $adaptation->url() ?>"><?php echo $adaptation->title() ?></a></td>
				<td><?php echo $adaptation->text()->length() ?></td>
				<td><?php echo $adaptation->verbs() ?></td>
				<td><?php echo $adaptation->files()->count() ?></td>
			</tr>
			<?php endforeach ?>

		</table>
		<hr id="image-edits">
		<table>
			<thead>
			<tr><th colspan="5"><h2>Image Edits</h2></th></tr>
			<tr>
				<th>Type</th>
				<th>Thumb</th>
				<th>Filename</th>
				<th>Photo Edit Notes</th>
				<th>Caption</th>
			</tr>
			</thead>
		<?php foreach(page('adaptations')->children() as $adaptation): ?>
			<?php foreach($adaptation->images()->sortBy('sort', 'asc') as $image): ?>
			<tr>
				<td><?php echo $image->kind() ?></td>
				<td style="min-height:200px;min-width:200px;"><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(200,200)->url() ?>" ></a></td>
				<td><?php echo $image->filename() ?></td>
				<td><?php echo $image->photoedits() ?></td>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
		</table>
		<hr id="image-kinds">
		<table class="images">
		<thead>
			<tr><th colspan="7"><h2>Image Kind Overview</h2></th></tr>
			<tr>
				<th>Adaptation</th>
				<th>Studio</th>
				<th>Closeup</th>
				<th>In Use</th>
				<th>In Situ</th>
				<th>Sequence</th>
				<th>Diagram</th>
			</tr>
		</thead>
		<?php foreach(page('adaptations')->children() as $adaptation):
		$studio = $adaptation->images()->filterBy('kind', 'studio'); 
		$closeup = $adaptation->images()->filterBy('kind', 'closeup'); 
		$inuse = $adaptation->images()->filterBy('kind', 'inuse'); 
		$insitu = $adaptation->images()->filterBy('kind', 'insitu'); 
		$sequence = $adaptation->images()->filterBy('kind', 'sequence'); 
		$diagram = $adaptation->images()->filterBy('kind', 'diagram'); 
		$uncategorized = $adaptation->images()->filterBy('kind', ''); 
		?>
			<tr>
				<td><?php echo $adaptation->title() ?></td>
				<td><?php foreach($studio->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?><?php foreach($uncategorized->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
				<td><?php foreach($closeup->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
				<td><?php foreach($inuse->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
				<td><?php foreach($insitu->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
				<td><?php foreach($sequence->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
				<td><?php foreach($diagram->sortBy('sort', 'asc') as $image): ?><a href="<?php echo $image->url() ?>"><img src="<?php echo $image->resize(100,100)->url() ?>" ></a><?php endforeach ?></td>
			</tr>
		<?php endforeach ?>
		</table>
 	</main>
</div>
<link type="text/css" href="/node_modules/fluidbox/dist/css/fluidbox.min.css" media="all" rel="stylesheet" />
<script type="text/javascript" src="/assets/jquery.ba-throttle-debounce.min.js"></script>
<script src="/node_modules/fluidbox/dist/js/jquery.fluidbox.min.js"></script>
<script src="/node_modules/floatthead/lib/jquery.floatThead.min.js"></script>
<script>
	var $table = $('table');
	$table.floatThead({
		top: 98
	});
	$(function () {
	    $("a").fluidbox();
	});
</script>
<?php snippet('footer') ?>