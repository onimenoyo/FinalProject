$(document).ready(function(){

  $(".menuBurger").click(function() {
    if ($(".burgerDropDown").hasClass("hide")){
      $(".burgerDropDown").removeClass("hide");
      $('section').css('background-color', '#333');
    } else {
      $(".burgerDropDown").addClass("hide");
      $('section').css('background-color', '#666');
    }
  });

});
