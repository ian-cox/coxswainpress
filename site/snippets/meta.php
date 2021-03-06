   <title><?php e($page->isHomePage(), $site->title(), $page->title()." - ".$site->title())?></title>
   <meta property="og:title" content="<?php e($page->isHomePage(), $site->title(), $page->title()." - ".$site->title())?>" />
   
   <link rel="icon" type="image/svg+xml" href="<?= $site->faviconSVG()->toFile()->url()?>">
   <link rel="alternate icon" href="<?= $site->favicon()->toFile()->crop(32)->url()?>">

   <meta name="Description" CONTENT="<?=$site->siteDescription()?>">
   <meta property="og:description" content="<?=$site->siteDescription()?>"/>

   <meta
      property="og:image"
      <?php if($page->template() == 'shopify.product'):?>
      content="<?=$page->shopifyFeaturedImage()->toStructure()->first()->src()->img_url('600x600')?>"
      <?php else:?>
      content="<?=$site->socialImage()->toFile()->resize(600)->url()?>"
      <?php endif?>
   />