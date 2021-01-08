<?php snippet('header') ?>

<div class="home-carousel" 
   data-flickity='{ 
      "wrapAround": true,
      "autoPlay": true,
      "lazyLoad": true,
      "setGallerySize": false,
      "arrowShape": "M16.4931 67L0.179903 50.59L16.4932 34.1799L19.3299 37L7.80831 48.59L100 48.59L100 52.59L7.80831 52.59L19.3299 64.1799L16.4931 67Z"
   }'>
<?php foreach($page->images() as $image):?>
   <div class="cell">
      <img data-flickity-lazyload="<?= $image->resize(4000,2000,80)->url() ?>" />
   </div>
<?php endforeach; ?>
</div>


<div class="pivot">
   <h3 class="pivot-title">Featured Prints</h3>
   <div class="grid">
      <?php 
         foreach($page->featured()->toPages() as $product):?>
         <a class="product" href="<?= $product->url()?>">
            <div class="frame frame-active">
               <img src="<?= $product->shopifyFeaturedImage()->toStructure()->first()->src()->img_url('500x500')?>">
            </div>
            <span class="product-title"><?= $product->shopifyTitle() ?></span>
            <span class="price">$<?= $product->shopifyPrice() ?></span>
         </a>
      <?php endforeach ?>
   </div>
</div>


<?php snippet('footer') ?>