<?php snippet('header') ?>

<main>

   <section class="images<?php e($page->images()->count() == 1,' single')?>">

      <article id="product-carousel" class="carousel-main" 
         data-flickity='{ 
            "wrapAround": true,
            "autoPlay": false,
            "setGallerySize": false,
            "fullscreen": true
         }'>
         <?php foreach($page->images()->sortBy('sort') as $img):?>   
            <div class="cell">
               <?=$img->resize(1200,1200,80)?>
            </div>
         <?php endforeach ?>
      </article>

      <?php if($page->images()->count() > 1):?>
         <nav class="carousel-nav" 
            data-flickity='{
               "asNavFor": ".carousel-main",
               "cellAlign": "left",
               "wrapAround": false,
               "contain": true,
               "prevNextButtons": false,
               "pageDots": false
            }'>
            <?php foreach($page->images()->sortBy('sort') as $img):?>   
               <div class="thumbnail">
                  <?=$img->crop(200,200,80)?>
               </div>
            <?php endforeach ?>
         </nav>
      <?php endif ?>

   </section>

   <aside class="product-details thumb-hidden">
      <h1 class="product-title"><?= $page->title() ?></h1>
      <p class="product-subtitle">
         <span class="product-type"><?= $page->type() ?></span>
      </p>
      
      <?php if(!$page->availability()->bool()):?>
         <div class="status">Sold out</div>
      <?php else:?>
         <div class="cta-block">
            <span>
               <?= $page->images()->sort('sort')->first()->crop(180,180,80)?>

               <span class="price">
                  <?= price($page->price()) ?>
               </span>
            </span>

            <button class="buy-button">
               Add to bag
            </button>
            
         </div>
      <?php endif;?>



      <ul class="highlights">
         <li><?= $page->width() ?>"W x <?= $page->height() ?>"H</li>

         <?php 
         $unique = $page->highlights()->toStructure();
         $global = $page->parent()->highlights()->toStructure();
         $highlights = $unique->add($global);
         foreach ($highlights as $highlight): ?>
            <li><?= $highlight->highlight()->html() ?></li>
         <?php endforeach ?>

      </ul>

      <h2>Description</h2>
      <div class="description">
         <?=$page->description()->kirbytext()?>
      </div>

   </aside>


</main>

<div class="pivot">
   <h3 class="pivot-title">You might also like</h3>
   <div class="grid">
      <?php 
         foreach($page->siblings()->listed()->filterBy('availability', 'true')->shuffle()->remove($page)->limit(4) as $product):?>
         <a class="product" href="<?= $product->url()?>">
            <div class="frame<?php e($page->parent()->frames()->bool(),' frame-active')?>">
               <?= $product->images()->sort('sort')->first()->resize(500,null,80)?>   
            </div>
            <span class="product-title"><?= $product->title()?></span>
            <span class="price"><?= price($product->price())?></span>
         </a>
      <?php endforeach ?>
   </div>
</div>



<script>
// Carousel In View
var onExit = function (elem) {
   var distance = elem.getBoundingClientRect();
	return (
    distance.bottom > 0
	);
};

var product = document.querySelector('#product-carousel');

window.addEventListener('scroll', function (event) {
  var productDetails = document.querySelector('.product-details');
	if (onExit(product)) {
    productDetails.classList.add('thumb-hidden');
	} else {
    productDetails.classList.remove('thumb-hidden');
  }
}, false);
</script>



<?php snippet('footer') ?>