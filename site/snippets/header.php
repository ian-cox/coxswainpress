<html>

<head prefix="og: https://ogp.me/ns#">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
   <?php snippet('meta') ?>
   <?= css('/assets/css/screen.css')?>
   <?php snippet('shopify-js') ?>
</head>

<body class="template-<?= $page->template() ?>">

<header class="site-header">

   <div class="banner" role="banner">
      <span class="nav-toggle">
         <img class="icon hamburger" src="/assets/img/menu.svg">
         <img class="icon close" src="/assets/img/close.svg">
      </span>

      <a class="logo" href="/">
         <img src="/assets/img/logo.svg">
         <span class="wordmark" href="/"><?= $site->title() ?></span>
      </a>
      
      <span></span>
      <!-- <a class="cart-icon" id="cart" href="#/cart">
         <img class="icon" src="/assets/img/bag.svg">
         <span class="cart-items-count">0</span>
      </a> -->
      
   </div>
   
   <nav>
      <ul>
      <?php foreach($site->pages()->listed() as $subpage):?>
         <li>
            <a href="<?=$subpage->url()?>">
            <?=$subpage->title()?>
            </a>
         </li>
      <?php endforeach ?>
      </ul>
   </nav>

</header>   