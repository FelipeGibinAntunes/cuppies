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