
// JavaScript Document
jQuery("document").ready(function($){
  var nav = $('nav');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 136) {
      nav.addClass("f-nav");
    } else {
      nav.removeClass("f-nav");
    }
  });
});




$("#list").loadMore({
      selector: 'li',
      loadBtn: '#btn',
      limit: 3,
      load: 3,
      animate: true,
      animateIn: 'fadeInUp'
});


