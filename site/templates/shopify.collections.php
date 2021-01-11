<?php snippet('header') ?>

   <main>
            
      <?php

      foreach($page->children()->sortBy('num', 'asc') as $collection):?>

         <a href="<?=$collection->url()?>"><?=$collection->title()?></a>

      <?php endforeach ?>

   </main>

<?php snippet('footer') ?>