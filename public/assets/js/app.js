$(document).ready(function() {
    $("#menu").click(function() {
      if ($(".menuConnexion").hasClass('hide') && $(".menuAttack").hasClass('hide')) {
        $(".menuConnexion").removeClass('hide');
        $(".menuInventory").addClass('hide');
      }
      if ($(".menuConnexion").hasClass('hide') || $(".menuAttack").hasClass('hide')) {
        if ($(".menuConnexion").hasClass('hide')) {
          $(".menuConnexion").removeClass('hide');
          $(".menuAttack").addClass('hide');
          if ($("#playerResponsive").hasClass('hide')) {}
          else {$("#playerResponsive").addClass('hide');}
        } else if ($(".menuAttack").hasClass('hide')) {
          $(".menuAttack").removeClass('hide');
          $(".menuConnexion").addClass('hide');
          if ($("#playerResponsive").hasClass('hide')) {}
          else {$("#playerResponsive").addClass('hide');}
        }
      }

    });


    $("#inventaire").click(function() {
        if ($(".menuInventory").hasClass('hide')) {
            $(".menuInventory").removeClass('hide');
            if ($(".menuAttack").hasClass('hide')) {}
            else {$(".menuAttack").addClass('hide');}
            if ($(".menuConnexion").hasClass('hide')) {}
            else {$(".menuConnexion").addClass('hide');}
            if ($("#playerResponsive").hasClass('hide')) {}
            else {$("#playerResponsive").addClass('hide');}
        } else {
          $(".menuConnexion").removeClass('hide');
          $(".menuInventory").addClass('hide');
        }
    });

    $("#Character").click(function() {
        if ($("#playerResponsive").hasClass('hide')) {
            $("#playerResponsive").removeClass('hide');
            if ($(".menuAttack").hasClass('hide')) {}
            else {$(".menuAttack").addClass('hide');}
            if ($(".menuConnexion").hasClass('hide')) {}
            else {$(".menuConnexion").addClass('hide');}
            if ($(".menuInventory").hasClass('hide')) {}
            else {$(".menuInventory").addClass('hide');}
        } else {
          $("#playerResponsive").addClass('hide');
          $(".menuConnexion").removeClass('hide')
        }
    });

    var modal = document.getElementById('myModal');
      $(".menuBurger").click(function() {
        if ($(".burgerDropDown").hasClass("hide")){
          $(".burgerDropDown").removeClass("hide");
          $('section').css('background-color', '#333');
        } else {
          $(".burgerDropDown").addClass("hide");
          $('section').css('background-color', '#666');
        }
      });

      $("#myBtn").click(function() {
        console.log("myBtn");
        if ($("#myModal").hasClass("hide")){
          console.log('pas hide');
          modal.style.display = "block";
          // $("#myModal").removeClass("hide");
        } else {
          console.log('hide');
          modal.style.display = "none";
          // $("#myModal").addClass("hide");
        }
      });


      $("#myBtnBurger").click(function() {
        if ($("#myModal").hasClass("hide")){
          modal.style.display = "block";
        } else {
          $("#myModal").addClass("hide");
        }
      });
      //Pour fermer la modal en cliquant sur le menu burger
      $(".menuBurger").click(function() {
        console.log('burger');
        if (!$("#myModal").hasClass("hide")){
        }else{
          modal.style.display = "none";
        }
      });

    // On définit la croix de la modal dans une variable
    // var close = document.getElementsByClassName("close")[0];
    // Pour fermer la modal en cliquant sur la croix
    // close.onclick = function() {
    //     modal.style.display = "none";
    // }
    // Quand on clique a l'extérieur de la modal ca la ferme
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }

});
