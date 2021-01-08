<?php

return [
   'debug' => true,
   'cache.api' => true,
   'thumbs' => [
     'driver' => 'im'
   ]
 ];


// Helpers

function price($price){
   if(strpos( $price, '.' ) !== false):
      return "$".number_format($price->toFloat(),2);
   else:
      return "$".$price;
   endif;
}