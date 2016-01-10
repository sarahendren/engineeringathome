<?php snippet('header') ?>

<div class="container">

	<main class="main col-sm-8 col-sm-offset-2" role="main">
		<div class="row">
			<h1 class="col-xs-12"><?php echo $page->title()->html() ?></h1>
		</div>			
		<div class="row">
			<?php if ($form->hasMessage()): ?>
			<div class="col-sm-8 col-sm-offset-2 alert <?php e($form->successful(), 'alert-success' , 'alert-danger')?>" role="alert">
				<?php $form->echoMessage() ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="row">
			<form action="<?php echo $page->url()?>#form" method="post">
				<div class="form-group col-md-6">
					<label for="name" class="required">Your Name</label>
					<input<?php e($form->hasError('name'), ' class="has-warning"')?> type="text" name="name" id="name" placeholder="Jane Doe" value="<?php $form->echoValue('name') ?>" class="form-control" required/>
				</div>

					<div class="form-group col-md-6">
					<label for="email" class="required">Your Email Address</label>
					<input<?php e($form->hasError('_from'), ' class="has-warning"')?> type="email" name="_from" id="email" placeholder="jane.doe@example.com" value="<?php $form->echoValue('_from') ?>" class="form-control" required/>
					</div>
					
					<div class="form-group col-xs-12">
					<label for="message">Message</label>
					<textarea rows="8" name="message" id="message" class="form-control" placeholder="Your message here..."><?php $form->echoValue('message') ?></textarea>
					</div>

				<label class="uniform__potty" for="website">Please leave this field blank</label>
				<input type="text" name="website" id="website" class="uniform__potty" />

				<div class="form-group col-xs-12">
					<button type="submit" class="btn btn-default pull-right" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Send Message</button>
				</div>
			</form>		
		</div>
	</main>
</div>
<?php snippet('footer') ?>
