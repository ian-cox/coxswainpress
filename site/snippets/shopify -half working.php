<script>
   let App = function(productId = null, productPrice = null) {

// Launch the shopify library
if (window.ShopifyBuy && window.ShopifyBuy.UI) {
  ShopifyBuyInit();
}

// Initialize the buy button
function ShopifyBuyInit() {
  var client = ShopifyBuy.buildClient({
    domain: 'coxswain-press.myshopify.com',
    storefrontAccessToken: '1f905f6b1e1df5e784a4a9168cda5dac',
  });

  // Set up the button
  ShopifyBuy.UI.onReady(client).then(function(ui) {

    // Configurations
    var Config = {

      // Product button
      "product": {
        "iframe": false,
        "variantId": "all",
        "width": "full",
        "contents": {
          "button": false,
          "img": false,
          "imgWithCarousel": false,
          "title": false,
          "variantTitle": false,
          "price": true,
          "description": false,
          "buttonWithQuantity": true,
          "quantity": false
        },
        "text": {
          button: 'Add to bag',
          outOfStock: 'Out of stock',
          unavailable: 'Unavailable',
        },
      },

      // Cart Config
      "cart": {
        "iframe": true,
        "popup": false,
        "styles": {
          "button": {
            "font-family": "Arial, sans-serif",
            "font-size": "16px",
            "padding-top": "16px",
            "padding-bottom": "16px",
            ":hover": {
              "background-color": "#ac9981"
            },
            "background-color": "#bfaa8f",
            ":focus": {
              "background-color": "#ac9981"
            },
            "border-radius": "4px"
          }
        },
        "contents": {
          "button": true,
          "img": true,
          "note": true
        },
        "text": {
          "title": 'Cart',
          "empty": 'Your cart is empty.',
          "button": 'Checkout',
          "notice": 'Shipping and discount codes are added at checkout.',
          "noteDescription": 'Special instructions for seller',
          "total": "Subtotal",
          "button": "Checkout"
        }
      },

      // Cart toggle button
      "toggle": {

        // Don't use iframes
        "iframe": false,

        // What items do we need?
        "order": [
          'icon',
        ],
      },

      // Cart Product config
      "lineItem": {
        "contents": {
          "image": true
        },
      },
    };

    // set the button price

    if (productId != null) {

      // Instantiate the components
      ui.createComponent('product', {

        id: [productId],
        node: document.getElementById('buy'),
        moneyFormat: '%24%7B%7Bamount%7D%7D',

        // Components Options
        options: {
          "product": Config.product,
          "cart": Config.cart,
          "lineItem": Config.lineItem,
          "toggle": Config.toggle
        }
      });
    }
  });
}
};
</script>

<script src="https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js"></script>
