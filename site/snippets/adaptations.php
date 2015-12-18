<ul class="list-inline">
  <?php foreach(page('adaptations')->children() as $adaptation): ?>
  <li>
    <?php if($image = $adaptation->images()->sortBy('sort', 'asc')->first()): ?>
    <a href="<?php echo $adaptation->url() ?>">
      <img class="img-circle" src="<?php echo $image->crop(100,100)->url() ?>" alt="<?php echo $adaptation->title()->html() ?>" width="100" height="100" >
    </a>
    <?php endif ?>
  </li>
  <?php endforeach ?>
</ul>
