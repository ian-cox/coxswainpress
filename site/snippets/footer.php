<footer>
   <a href="/"><?= $site->footerText()->kirbytext()?></a>

   <ul>
      <?php foreach($site->links()->toStructure() as $item):?>
       <li>
         <?php if($item->toggle()->toBool()):?>
            <a href="<?= $item->external()?>" target="_blank">
            <?=$item->icon()->toFile()?><?= $item->title()?>
            </a>
         <?php else:?>
            <a href="<?= $item->internal()->toPage()->url()?>">
            <?=$item->icon()->toFile()?><?= $item->title()?>
            </a>
         <?php endif?>
       </li>
      <?php endforeach ?> 
   </ul>
</footer>


<script>
// Mobile Navigation
document.querySelector('.nav-toggle').onclick = function (e) {
   var html = document.querySelector('html');
   html.classList.toggle('nav-active');
   e.preventDefault();
}
</script>


<!-- Flickity Carousel -->
<?= js('/assets/js/flickity.min.js')?>

<script>App('<?= $page->shopifyID() ?>');</script>





</body>