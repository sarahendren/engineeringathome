<?php snippet('header') ?>

<div class="container">

	<main class="main" role="main">

		<h1><?php echo $page->title()->html() ?></h1>

		<form action="<?php echo $page->url()?>#form" method="post">
			<div class="form-group">
				<label for="name" class="required">Name</label>
				<input<?php e($form->hasError('name'), ' class="has-warning"')?> type="text" name="name" id="name" placeholder="Jane Doe" value="<?php $form->echoValue('name') ?>" class="form-control" required/>
			</div>
			<label for="email" class="required">E-Mail</label>
			<input<?php e($form->hasError('_from'), ' class="has-warning"')?> type="email" name="_from" id="email" placeholder="jane.doe@example.com" value="<?php $form->echoValue('_from') ?>" class="form-control" required/>

			<label for="message">Message</label>
			<textarea name="message" id="message" class="form-control" placeholder="Your message here..."><?php $form->echoValue('message') ?></textarea>

			<label class="uniform__potty" for="website">Please leave this field blank</label>
			<input type="text" name="website" id="website" class="uniform__potty" />

			<a name="form"></a>
			<?php if ($form->hasMessage()): ?>
			<div class="message <?php e($form->successful(), 'success' , 'error')?>">
			<?php $form->echoMessage() ?>
			</div>
			<?php endif; ?>

			<button type="submit" class="btn btn-default" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>

		</form>
	</main>

<?php snippet('footer') ?>
