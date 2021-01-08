<?php snippet('header') ?>

   <main>

      <?php foreach($page->children()->listed()->sortBy('availability', 'desc', 'num', 'asc') as $product):?>
         <a class="product" href="<?= $product->url()?>">
            
            <div class="frame<?php e($page->frames()->bool(),' frame-active')?>">
               <?= $product->images()->sort('sort')->first()->resize(800,null,80)?>
            </div>   
            
            <span class="product-title"><?= $product->title()?></span>
            
            <?php if(!$product->availability()->bool()):?>
               <div class="status">Sold out</div>
            <?php else:?>
               <span class="price">
                  <?= price($product->price())?>   
               </span>
            <?php endif ?>
         </a>
      <?php endforeach ?>

   </main>

<?php snippet('footer') ?>