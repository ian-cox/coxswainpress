<?php snippet('header') ?>

<main>

   <section class="images<?php e($page->shopifyImages()->toStructure()->count() < 2,' single')?>">

      <article id="product-carousel" class="carousel-main" 
         data-flickity='{ 
            "wrapAround": true,
            "autoPlay": false,
            "setGallerySize": false,
            "fullscreen": true
         }'>
         <?php foreach($page->shopifyImages()->toStructure() as $img):?>   
            <div class="cell">
               <img src="<?= $img->src()?>">
            </div>
         <?php endforeach ?>
      </article>

      <?php if($page->shopifyImages()->toStructure()->count() > 1):?>
         <nav class="carousel-nav" 
            data-flickity='{
               "asNavFor": ".carousel-main",
               "cellAlign": "left",
               "wrapAround": false,
               "contain": true,
               "prevNextButtons": false,
               "pageDots": false
            }'>
            <?php foreach($page->shopifyImages()->toStructure() as $img):?>   
               <div class="thumbnail">
                  <img src="<?= $img->src()->img_url('250x250')?>">
               </div>
            <?php endforeach ?>
         </nav>
      <?php endif ?>

   </section>

   <aside class="product-details thumb-hidden">
      <h1 class="product-title"><?= $page->shopifyTitle() ?></h1>
      <p class="product-subtitle">
         <span class="product-type"><?= $page->shopifyType() ?></span>
      </p>
      
      <?php if($page->inventory_quantity() < 1):?>
         <div class="status">Sold out</div>
      <?php else:?>
         <div class="cta-block">
            <div class="product-buy-btn" id="buy"></div>
         </div>
      <?php endif;?>
      
      <?php if($page->shopifyDescriptionHTML()->isNotEmpty()):?>
         <h2>Description</h2>
         <div class="description">
         <?= $page->shopifyDescriptionHTML() ?>
         </div>
      <?php endif ?>

   </aside>


</main>

<div class="pivot">
   <h3 class="pivot-title">You might also like</h3>
   <div class="grid">
      <?php 
         foreach($page->siblings()->filterBy('inventory_quantity', '>', '0')->shuffle()->remove($page)->limit(4) as $product):?>
         <a class="product" href="<?= $product->url()?>">
            <div class="frame<?php e($product->shopifyType() == "Linoleum Block Print",' frame-active')?>">
               <img src="<?= $product->shopifyFeaturedImage()->toStructure()->first()->src()->img_url('500x500')?>">
            </div>
            <span class="product-title"><?= $product->shopifyTitle() ?></span>
            <span class="price">$<?= $product->shopifyPrice() ?></span>
         </a>
      <?php endforeach ?>
   </div>
</div>


<?php snippet('footer') ?>