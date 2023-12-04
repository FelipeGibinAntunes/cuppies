(function ($) {
    Drupal.behaviors.removeClassName = {
      attach: function (context, settings) {
        // Replace 'your-login' with the selector of the desired HTML login.
        var login = $('.login-popup-form', context);
        var register = $('.register-popup-form', context);
  
        // Replace 'your-class' with the name of the class you want to remove.
        var classToRemove = 'disabled';
  
        // Check if the login is found in the current context.
        if (login.length > 0) {
          // Remove the class from the login.
          login.removeClass(classToRemove);
        }
        // Check if the login is found in the current context.
        if (register.length > 0) {
          // Remove the class from the login.
          register.removeClass(classToRemove);
        }
      }
    };
  })(jQuery); 

  (function ($, Drupal, drupalSettings) {
    Drupal.behaviors.changeQuantity = {
      attach: function (context, settings) {
        once('change-quantity', '.quantity-plus, .quantity-minus', context).forEach(function(element){
          $(element).on('click', function () {
            var $quantityWrapper = $(this).closest('.group-wrapper');
            var $quantityInput = $quantityWrapper.find('.quantity-input');
            var $price = $quantityWrapper.siblings('.update-price');
            var currentQuantity = Number($quantityInput.val());
            if($('.cart-form').length > 0){
              var minQuantity = 0;
            }
            else {
              var minQuantity = 1;
            }
            var maxQuantity = 99;
    
            if ($(this).hasClass('quantity-plus') && currentQuantity < maxQuantity) {
              currentQuantity += 1;
            } else if ($(this).hasClass('quantity-minus') && currentQuantity > minQuantity) {
              currentQuantity -= 1;
            }
    
            $quantityInput.val(currentQuantity);
            var dataValue = parseFloat($price.attr('data'));
            var newValue = dataValue * currentQuantity;
            $price.text('$' + newValue.toFixed(2));
            $price.attr('value','$' + newValue.toFixed(2));
            var priceElements = $('.update-price');
            var totalSum = 0;
            priceElements.each(function () {
                var priceText = $(this).text().substring(1);
                totalSum += parseFloat(priceText);
            });
             $('.total-price').eq(0).text('Total Price: $' + totalSum.toFixed(2));
            
          });
        })
      }
    };
  })(jQuery, Drupal, drupalSettings);


  (function ($) {
    Drupal.behaviors.updateOnChange = {
      attach: function (context, settings) {
        console.log('attach');
        // Add a click event listener to the image with the ID "my-image".
        $('.quantity-input', context).on('change', function () {
          var $quantityWrapper = $(this).closest('.group-wrapper');
          var $quantityInput = $quantityWrapper.find('.quantity-input');
          var $price = $quantityWrapper.siblings('.update-price');
          var currentQuantity = Number($quantityInput.val());
  
          $quantityInput.val(currentQuantity);
          var dataValue = parseFloat($price.attr('data'));
          var newValue = dataValue * currentQuantity;
          $price.text('$' + newValue.toFixed(2));
          $price.attr('value','$' + newValue.toFixed(2));
          var priceElements = $('.update-price');
          var totalSum = 0;
          priceElements.each(function () {
              var priceText = $(this).text().substring(1);
              totalSum += parseFloat(priceText);
          });
           $('.total-price').eq(0).text('Total Price: $' + totalSum.toFixed(2));
        });
      }
    };
  })(jQuery);

  (function ($) {
    Drupal.behaviors.showOverlay = {
      attach: function (context, settings) {
        // Add a click event listener to the image with the ID "my-image".
        $('#hamburger-inactive', context).on('click', function () {
          // Toggle the display property of the element with the ID "target-element".
          $('.overlay').show();
        });
      }
    };
  })(jQuery);
  
  (function ($) {
    Drupal.behaviors.hideOverlay = {
      attach: function (context, settings) {
        // Add a click event listener to the image with the ID "my-image".
        $('#hamburger-active', context).on('click', function () {
          // Toggle the display property of the element with the ID "target-element".
          $('.overlay').hide();
        });
        $('.overlay', context).on('click', function () {
          if (event.target === this) {
            // Toggle the display property of the element with the ID "target-element".
            $('.overlay').hide();
          }
        });
      }
    };
  })(jQuery);

  (function ($) {
    Drupal.behaviors.hideMessage = {
      attach: function (context, settings) {
        // Add a click event listener to the image with the ID "my-image".
        $('.close-message', context).on('click', function () {
          // Toggle the display property of the element with the ID "target-element".
          $('.messages-class').hide();
        });
      }
    };
  })(jQuery);