

$('#hamburguer').click(function() {

  var navlist = $('.navbar ul');
  navlist.toggleClass("responsive");
  
});

$(window).resize(function () {
  if ($(window).width() < 800) {
    $('.navbar ul a').removeClass('btn');
  } else {
    $('.navbar ul a').addClass('btn'); 
  }
}).resize();