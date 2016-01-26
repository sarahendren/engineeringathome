<?php snippet('header') ?>
<?php 
  function plural( $amount, $singular = '', $plural = 's' ) {
      if ( $amount == 1 )
          return $singular;
      else
          return $plural;
  }
 ?>
<div class="container">
  <main class="main" role="main">
    <article role="article">
      <div class="row" id="studio">
        <div class="col-sm-6 col-md-4">
          <h1><?php echo $page->title()->html() ?></h1>
          <div class="lead"><?php echo $page->intro()->kirbytext() ?></div>
          <nav>
            <h2>contents</h2>
            <ul>
              <li><?php echo $studio->count() . ' × Studio Photo' . plural( $studio->count() ); ?> <span class="visible-sm-inline visible-md-inline visible-lg-inline visible-xl-inline">(Right)</span><span class="visible-xs-inline">(Below)</span></li>
              <?php if ($inuse->count() > 0): ?><li><a href="#inuse"><?php echo $inuse->count() . ' × In Situ Photo' . plural( $inuse->count() ); ?></a></li><?php endif ?>
              <li><a href="#description">Description</a></li>
              <?php if ($diagram->count() > 0): ?><li><a href="#diagram"><?php echo $diagram->count() . ' × Schematic' . plural( $diagram->count() ); ?></a></li><?php endif ?>
              <li><a href="#related">Related adaptations</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-6 col-md-8">
          <?php if ($studio->count() > 1): ?>

            <div id="carousel-example-generic" class="carousel slide">
              <ol class="carousel-indicators">
                <?php $index = 0; foreach($studio as $image): $first = $studio->first(); ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" <?php if($image == $first) echo ' class="active"' ?>></li>
                <?php $index++; endforeach ?>
              </ol>
              <div class="carousel-inner photoswipe" role="listbox">
                <?php foreach($studio as $image): $first = $studio->first(); ?>
                <figure class="item<?php if($image == $first) echo ' active' ?>">
                  <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(749, 535)->url() ?>" srcset="<?php echo kirby_get_srcset($image) ?>" sizes="<?php echo kirby_get_sizes($image) ?>" alt="<?php echo $image->caption() ?>"></a>
                </figure>
                <?php endforeach ?>
              </div>

              <!-- Controls -->
              <button class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <button class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          <?php else: ?>
              <?php foreach($studio as $image): ?>
              <figure><img src="<?php echo $image->resize(749, 535)->url() ?>" srcset="<?php echo kirby_get_srcset($image) ?>" sizes="<?php echo kirby_get_sizes($image) ?>" alt="<?php echo $image->caption() ?>"></figure>
              <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>

      <?php if ($inuse->count() > 0): ?>
        <hr>

        <div class="row" id="inuse">
          <h2 class="col-xs-12">In Situ</h2>
          <div class="photoswipe">
          <?php foreach($inuse as $image): ?>
            <?php if ($inuse->count() == 1): ?>
            <figure class="col-sm-6 col-sm-offset-3">
              <?php if ($image->extension() == 'gif'): ?>
                <img src="<?php echo $image->url() ?>" alt="<?php echo $image->caption() ?>">
              <?php else: ?>              
                <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
              <?php endif ?>
            </figure>
            <?php elseif ($inuse->count() == 2): ?>
            <figure class="col-xs-6">
              <?php if ($image->extension() == 'gif'): ?>
                <img src="<?php echo $image->url() ?>" alt="<?php echo $image->caption() ?>">
              <?php else: ?>              
                <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
              <?php endif ?>
            </figure>
            <?php elseif ($inuse->count() == 3): ?>
            <figure class="col-xs-6 col-sm-4">
              <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
            </figure>
            <?php elseif ($inuse->count() == 4): ?>
            <figure class="col-xs-6 col-sm-3">
              <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
            </figure>
            <?php elseif ($inuse->count() == 5): ?>
            <figure class="col-xs-4 col-sm-2">
              <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
            </figure>
            <?php elseif ($inuse->count() >= 6): ?>
            <figure class="col-sm-2">
              <a href="<?php echo $image->url() ?>" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(555)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
            </figure>
            <?php endif ?>
          <?php endforeach ?>
          </div>
        </div>
      <?php endif ?>

      <hr>

      <div class="row" id="description">
        <h2 class="col-sm-3">Description</h2>
        <div class="text col-sm-6">
          <?php echo $page->text()->kirbytext() ?>
        </div>
      </div>

      <?php if ($diagram->count() > 0): ?>
      <hr>
      <div class="row" id="diagram">
        <h2 class="col-xs-12">Schematics</h2>
          <div class="photoswipe">
            <?php foreach($diagram as $image): ?>
              <figure class="col-sm-6">
                <a href="<?php echo $image->url() ?>" data-pswp-uid="3" data-size="<?php echo $image->width() ?>x<?php echo $image->height() ?>"><img src="<?php echo $image->resize(600)->url() ?>" alt="<?php echo $image->caption() ?>"></a>
              </figure>
            <?php endforeach ?>
          </div>
      </div>
      <?php endif ?>
    </article>
    <hr>
    <?php $Options = array('startURI' => '/adaptations', 'searchField' => 'Verbs');
    $relpages = relatedpages($Options); ?>
    <?php if($relpages->count() > 0): ?>
      <div class="row" id="related">
        <h2 class="col-xs-12">Related Adaptations</h2>
        <div class="grid">
          <?php foreach($relpages->shuffle()->limit(3) as $adaptation): ?>
          <div class="col-xs-6 col-sm-4 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
            <a href="<?php echo $adaptation->url() ?>">
              <?php if($adaptation->images()->find('thumbnail.gif')): ?>
              <img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
              <?php else: ?>
                <div class="responsive-sprites">
                  <img src="/assets/adaptations-sprite.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
                </div>
            <?php endif ?>
              <h2><?php echo $adaptation->title()->widont() ?></h2>
            </a>
          </div>
          <?php endforeach ?>
          <div class="col-xs-6 col-sm-4 col-md-3 element-item">
            <a href="/adaptations" class="back-button">
              <img src="/assets/spacer.png">
              <h2>Browse all Adaptations</h2>
            </a>
          </div>
        </div>
      </div>
    <?php elseif($relpages->count == 0): ?>
      <div class="row" id="related">
        <h2 class="col-xs-12">More Adaptations</h2>
        <div class="grid">
          <?php foreach(page('adaptations')->children()->shuffle()->limit(3) as $adaptation):?>
          <div class="col-xs-6 col-md-3 element-item <?php foreach($adaptation->verbs()->split(',') as $verb): echo $verb . ' '; endforeach; ?>">
            <a href="<?php echo $adaptation->url() ?>">
              <?php if($adaptation->images()->find('thumbnail.gif')): ?>
              <img src="<?php echo $adaptation->images()->find('thumbnail.gif')->url() ?>" class="<?php echo $adaptation->slug() ?> gif" alt="<?php echo $adaptation->title()->html() ?>">
              <?php else: ?>
                <div class="responsive-sprites">
                  <img src="/assets/adaptations-sprite.png" class="<?php echo $adaptation->slug() ?>" alt="<?php echo $adaptation->title()->html() ?>">
                </div>
            <?php endif ?>
              <h2><?php echo $adaptation->title()->widont() ?></h2>
            </a>
          </div>
          <?php endforeach ?>
          <div class="col-xs-6 col-md-3 element-item">
            <a href="/adaptations" class="back-button">
              <img src="/assets/spacer.png">
              <h2>Browse all Adaptations</h2>
            </a>
          </div>
        </div>
      </div>      
    <?php endif ?>
  </main>
  <!-- Root element of PhotoSwipe. Must have class pswp. --> <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"> <!-- Background of PhotoSwipe. It's a separate element, as animating opacity is faster than rgba(). --> <div class="pswp__bg"></div> <!-- Slides wrapper with overflow:hidden. --> <div class="pswp__scroll-wrap"> <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. --> <div class="pswp__container"> <!-- don't modify these 3 pswp__item elements, data is added later on --> <div class="pswp__item"></div> <div class="pswp__item"></div> <div class="pswp__item"></div> </div> <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. --> <div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <!--  Controls are self-explanatory. Order can be changed. --> <div class="pswp__counter"></div> <button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR --> <!-- element will get class pswp__preloader--active when preloader is running --> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div> </div> </div> </div> </div> <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"> </button> <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"> </button> <div class="pswp__caption"> <div class="pswp__caption__center"></div> </div> </div> </div> </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- Core CSS file -->
<link rel="stylesheet" href="/assets/css/photoswipe.css"> 

<!-- Skin CSS file (styling of UI - buttons, caption, etc.)
     In the folder of skin CSS file there are also:
     - .png and .svg icons sprite, 
     - preloader.gif (for browsers that do not support CSS animations) -->
<link rel="stylesheet" href="/assets/css/default-skin.css"> 

<!-- Core JS file -->
<script src="/assets/js/photoswipe.min.js"></script> 

<!-- UI JS file -->
<script src="/assets/js/photoswipe-ui-default.min.js"></script> 
<script>
var initPhotoSwipeFromDOM = function(gallerySelector) {

    // parse slide data (url, title, size ...) from DOM elements 
    // (children of gallerySelector)
    var parseThumbnailElements = function(el) {
        var thumbElements = el.childNodes,
            numNodes = thumbElements.length,
            items = [],
            figureEl,
            linkEl,
            size,
            item;

        for(var i = 0; i < numNodes; i++) {

            figureEl = thumbElements[i]; // <figure> element

            // include only element nodes 
            if(figureEl.nodeType !== 1) {
                continue;
            }

            linkEl = figureEl.children[0]; // <a> element

            size = linkEl.getAttribute('data-size').split('x');

            // create slide object
            item = {
                src: linkEl.getAttribute('href'),
                w: parseInt(size[0], 10),
                h: parseInt(size[1], 10)
            };



            if(figureEl.children.length > 1) {
                // <figcaption> content
                item.title = figureEl.children[1].innerHTML; 
            }

            if(linkEl.children.length > 0) {
                // <img> thumbnail element, retrieving thumbnail url
                item.msrc = linkEl.children[0].getAttribute('src');
            } 

            item.el = figureEl; // save link to element for getThumbBoundsFn
            items.push(item);
        }

        return items;
    };

    // find nearest parent element
    var closest = function closest(el, fn) {
        return el && ( fn(el) ? el : closest(el.parentNode, fn) );
    };

    // triggers when user clicks on thumbnail
    var onThumbnailsClick = function(e) {
        e = e || window.event;
        e.preventDefault ? e.preventDefault() : e.returnValue = false;

        var eTarget = e.target || e.srcElement;

        // find root element of slide
        var clickedListItem = closest(eTarget, function(el) {
            return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
        });

        if(!clickedListItem) {
            return;
        }

        // find index of clicked item by looping through all child nodes
        // alternatively, you may define index via data- attribute
        var clickedGallery = clickedListItem.parentNode,
            childNodes = clickedListItem.parentNode.childNodes,
            numChildNodes = childNodes.length,
            nodeIndex = 0,
            index;

        for (var i = 0; i < numChildNodes; i++) {
            if(childNodes[i].nodeType !== 1) { 
                continue; 
            }

            if(childNodes[i] === clickedListItem) {
                index = nodeIndex;
                break;
            }
            nodeIndex++;
        }



        if(index >= 0) {
            // open PhotoSwipe if valid index found
            openPhotoSwipe( index, clickedGallery );
        }
        return false;
    };

    // parse picture index and gallery index from URL (#&pid=1&gid=2)
    var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
        params = {};

        if(hash.length < 5) {
            return params;
        }

        var vars = hash.split('&');
        for (var i = 0; i < vars.length; i++) {
            if(!vars[i]) {
                continue;
            }
            var pair = vars[i].split('=');  
            if(pair.length < 2) {
                continue;
            }           
            params[pair[0]] = pair[1];
        }

        if(params.gid) {
            params.gid = parseInt(params.gid, 10);
        }

        return params;
    };

    var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
        var pswpElement = document.querySelectorAll('.pswp')[0],
            gallery,
            options,
            items;

        items = parseThumbnailElements(galleryElement);

        // define options (if needed)
        options = {

            // define gallery index (for URL)
            galleryUID: galleryElement.getAttribute('data-pswp-uid'),

            getThumbBoundsFn: function(index) {
                // See Options -> getThumbBoundsFn section of documentation for more info
                var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                    pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                    rect = thumbnail.getBoundingClientRect(); 

                return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
            }

        };

        // PhotoSwipe opened from URL
        if(fromURL) {
            if(options.galleryPIDs) {
                // parse real index when custom PIDs are used 
                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                for(var j = 0; j < items.length; j++) {
                    if(items[j].pid == index) {
                        options.index = j;
                        break;
                    }
                }
            } else {
                // in URL indexes start from 1
                options.index = parseInt(index, 10) - 1;
            }
        } else {
            options.index = parseInt(index, 10);
        }

        // exit if index not found
        if( isNaN(options.index) ) {
            return;
        }

        if(disableAnimation) {
            options.showAnimationDuration = 0;
        }

        // Pass data to PhotoSwipe and initialize it
        gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
        gallery.init();
    };

    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll( gallerySelector );

    for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
    }

    // Parse URL and open gallery if it contains #&pid=3&gid=1
    var hashData = photoswipeParseHash();
    if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
    }
};

// execute above function
initPhotoSwipeFromDOM('.photoswipe');

$('.carousel').carousel();

$('.grid a').hover(
  function(myClass){ $(this).find('img').addClass('silhouette') },
  function(myClass){ $(this).find('img').removeClass('silhouette') }
);

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
<?php snippet('footer') ?>