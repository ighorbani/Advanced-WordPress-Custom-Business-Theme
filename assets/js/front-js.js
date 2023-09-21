// Search with ajax functionality
jQuery(document).ready(function ($) {
  var searchInput = $("#search-input");
  var suggestionsContainer = $("#search-suggestions");
  var backdrop = $("#backdrop");

  searchInput.on("input", function () {
    var searchTerm = searchInput.val();

    if (searchTerm.length >= 2) {
      $.ajax({
        url: ajax_object.ajax_url,
        type: "POST",
        data: {
          action: "search_products",
          term: searchTerm,
        },
        success: function (response) {
          suggestionsContainer.html(response);
          suggestionsContainer.slideDown();
          backdrop.fadeIn();
        },
      });
    } else {
      suggestionsContainer.empty();
      suggestionsContainer.slideUp();
      backdrop.fadeOut();
    }
  });

  backdrop.on("click", function () {
    suggestionsContainer.slideUp();
    backdrop.fadeOut();
  });

  // Mobile Burger menu
  var burgerButton = $("#burgerButton");
  var burgerMenu = $("#burgerMenu");

  // Click event for burger button
  burgerButton.on("click", function () {
    if (backdrop.is(":visible")) {
      burgerMenu.removeClass("open");
      backdrop.fadeOut();
    } else {
      burgerMenu.addClass("open");
      backdrop.fadeIn();
    }
  });

  // Click event for backdrop (to close the menu)
  backdrop.on("click", function () {
    burgerMenu.removeClass("open");
    backdrop.fadeOut();
  });
});
