<?php snippet('header') ?>

 	<main class="main" role="main">

		<table>
			<tr>
				<th>Thumb</th>
				<th>Title</th>
				<th>Text Length</th>
				<th>Tags</th>
				<th>Image Count</th>
			</tr>
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

 	</main>

<?php snippet('footer') ?>