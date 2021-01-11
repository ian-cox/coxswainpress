<?php snippet('header') ?>

   <main>
      
      <?php      
      foreach($page->children() as $productID):
         $product = $site->find('shop')->children()->filterBy('shopifyID', $productID->shopifyID())->first();?>

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