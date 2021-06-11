$(document).ready(function() {
  var animTime = 400,
    clickPolice = false;

  $(document).on('touchstart click', '.acc-btn', function() {
    if (!clickPolice) {
      clickPolice = true;

      var currIndex = $(this).index('.acc-btn'),
          isExpanded = $(this).find('h1').hasClass('selected'),
          targetHeight = isExpanded ? 0 : $('.acc-content-inner').eq(currIndex).outerHeight();

      $('.acc-btn h1').removeClass('selected');
      $(this).find('h1').toggleClass('selected', !isExpanded);

      $('.acc-content').stop().animate({
        height: 0
      }, animTime);
      $('.acc-content').eq(currIndex).stop().animate({
        height: targetHeight
      }, animTime);

      setTimeout(function() {
        clickPolice = false;
      }, animTime);
    }

  });

});