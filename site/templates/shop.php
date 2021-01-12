<?php snippet('header') ?>

   <main>
            
      <?php
      $shopifyProducts = $site->index()->filterBy('template', 'shopify.products')->children();

      $filteredProducts = $shopifyProducts->filterBy('shopifyType', 'in', $page->categories()->split(','));

      $inStock =  $filteredProducts->filterBy('inventory_quantity', '>', '0');
      $outOfStock =  $filteredProducts->filterBy('inventory_quantity', '<', '1');
      $allProducts = $inStock->add($outOfStock);
      
      foreach($allProducts as $product):?>
         <a class="product" href="<?= $product->url()?>">
            
            <div class="frame<?php e($product->shopifyType() == "Linoleum Block Print",' frame-active')?>">
               <img src="<?= $product->shopifyFeaturedImage()->toStructure()->first()->src()->img_url('800x800')?>">
            </div>   
            
            <span class="product-title"><?= $product->shopifyTitle() ?></span>
            
            <?php if($product->inventory_quantity() < 1):?>
               <div class="status">Sold out</div>
            <?php else:?>
               <span class="price">
                  $<?= $product->shopifyPrice() ?>   
               </span>
            <?php endif ?>
         </a>
      <?php endforeach ?>

   </main>

<?php snippet('footer') ?>