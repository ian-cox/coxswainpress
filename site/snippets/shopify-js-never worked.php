<script>
(function () {
  var shopifyOptions = {
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
    "cart": {
      "contents": {
        "button": true
      },
      "styles": {
        "button": {
          "background-color": "#1a1a1a",
          ":hover": {
            "background-color": "#2c2c2c"
          },
          ":focus": {
            "background-color": "#2c2c2c"
          }
        },
        "footer": {
          "background-color": "#ffffff"
        }
      }
    },
    "modalProduct": {
      "contents": {
        "img": false,
        "imgWithCarousel": true,
        "variantTitle": false,
        "buttonWithQuantity": true,
        "button": false,
        "quantity": false
      },
      "styles": {
        "product": {
          "@media (min-width: 601px)": {
            "max-width": "100%",
            "margin-left": "0px",
            "margin-bottom": "0px"
          }
        },
        "button": {
          "background-color": "#1a1a1a",
          ":hover": {
            "background-color": "#2c2c2c"
          },
          ":focus": {
            "background-color": "#2c2c2c"
          }
        },
        "variantTitle": {
          "font-family": "Montserrat, sans-serif",
          "font-weight": "normal"
        },
        "title": {
          "font-family": "Montserrat, sans-serif",
          "font-weight": "normal"
        },
        "description": {
          "font-family": "Montserrat, sans-serif",
          "font-weight": "normal"
        },
        "price": {
          "font-family": "Montserrat, sans-serif",
          "font-weight": "normal"
        },
        "compareAt": {
          "font-family": "Montserrat, sans-serif",
          "font-weight": "normal"
        }
      },
      "googleFonts": [
        "Montserrat",
        "Montserrat",
        "Montserrat",
        "Montserrat",
        "Montserrat"
      ]
    },
    "toggle": {
      "styles": {
        "toggle": {
          "background-color": "#1a1a1a",
          ":hover": {
            "background-color": "#2c2c2c"
          },
          ":focus": {
            "background-color": "#2c2c2c"
          }
        }
      }
    },
    "option": {
      "styles": {
        "label": {
          "font-family": "Montserrat, sans-serif"
        },
        "select": {
          "font-family": "Montserrat, sans-serif"
        }
      },
      "googleFonts": [
        "Montserrat",
        "Montserrat"
      ]
    },
    "productSet": {
      "styles": {
        "products": {
          "@media (min-width: 601px)": {
            "margin-left": "-20px"
          }
        }
      }
    }
  };

  var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

  function loadScript() {
    var script = document.createElement('script');
    script.async = true;
    script.src=scriptURL;
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
    script.onload = ShopifyBuyInit;
  }

  function ShopifyBuyInit() {
    var client = ShopifyBuy.buildClient({
      domain: 'coxswain-press.myshopify.com',
      storefrontAccessToken: '1f905f6b1e1df5e784a4a9168cda5dac',
    });

    ShopifyBuy.UI.onReady(client).then(function (ui) {
      if (document.getElementById('buy')) {
        ui.createComponent('product', {
          id: appSettings.shopifyProductEmbedCode,
          node: document.getElementById('buy'),
          moneyFormat: '%24%7B%7Bamount%7D%7D',
          options: shopifyOptions
        });
      } else {
        ui.createComponent('cart', {
          node: document.getElementById('cart'),
          options: shopifyOptions
        });
      }
    });
  }

  if (window.ShopifyBuy) {
    if (window.ShopifyBuy.UI) {
      ShopifyBuyInit();
    } else {
      loadScript();
    }
  } else {
    loadScript();
  }
})();
</script>

<script src="https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js"></script>