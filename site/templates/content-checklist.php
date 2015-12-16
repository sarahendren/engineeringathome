<?php snippet('header') ?>

 	<main class="main" role="main">
 	<h2>Content</h2>
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
		<hr>
		<h2>Images</h2>
		<table>
			<tr>
				<th>Type</th>
				<th>Thumb</th>
				<th>Filename</th>
				<th>Photo Edit Comments</th>
				<th>Caption</th>
			</tr>
		<?php foreach(page('adaptations')->children() as $adaptation): ?>
			<?php foreach($adaptation->images()->sortBy('sort', 'asc') as $image): ?>
			<tr>
				<td><?php echo $image->kind() ?></td>
				<td><img src="<?php echo $image->resize(100,100)->url() ?>" ></td>
				<td><?php echo $image->filename() ?></td>
				<td><?php echo $image->photoedits() ?></td>
			</tr>
			<?php endforeach ?>
		<?php endforeach ?>
		</table>
 	</main>

<?php snippet('footer') ?>