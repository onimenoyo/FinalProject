$(document).ready(function() {
    $("#menu").click(function() {
        if ($("#menu").hasClass('open')) {
            $("#menu").removeClass('open');
            $(".options").html('');
            $('.options').append('<a href="#"><div class="button option">Attaquer</div></a>');
            $('.options').append('<a href="#"><div class="button option">Se Soigner</div></a>');
            $('.options').append('<a href="#"><div class="button option">Fuir !</div></a>');
        } else {
            $("#menu").addClass('open');
            $("#Character").removeClass('open');
            $("#inventaire").removeClass('open');
            $(".options").html('');
            $('.options').append('<a href="#"><div class="button option">Déconnexion</div></a>');
            $('.options').append('<a href="#"><div class="button option">Sauvegarder</div></a>');
            $('.options').append('<a href="#"><div class="button option">Profil</div></a>');
        }
    });

    $("#inventaire").click(function() {
        if ($("#inventaire").hasClass('open')) {
            $("#inventaire").removeClass('open');
            $(".options").html('');
            $('.options').append('<a href="#"><div class="button option">Attaquer</div></a>');
            $('.options').append('<a href="#"><div class="button option">Se Soigner</div></a>');
            $('.options').append('<a href="#"><div class="button option">Fuir !</div></a>');
        } else {
            $("#inventaire").addClass('open');
            $("#Character").removeClass('open');
            $("#menu").removeClass('open');
            $(".options").html('');
            $('.options').append('<div class="contenu slot"><img src="img/armes/Pistol2.png" alt="Pistol2" /><span>$q</span></div>');
            $('.options').append('<div class="contenu slot"><img src="img/armes/Pistol3.png" alt="Pistol3" /><span>$q</span></div>');
            $('.options').append('<div class="contenu slot"><img src="img/armes/Pistol2.png" alt="Pistol3" /><span>$q</span></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu slot"></div>');
            $('.options').append('<div class="contenu">Credit : 0$</div>');
        }
    });



    $("#Character").click(function() {
        if ($("#Character").hasClass('open')) {
            $("#Character").removeClass('open');
            $(".options").html('');
            $('.options').append('<a href="#"><div class="button option">Attaquer</div></a>');
            $('.options').append('<a href="#"><div class="button option">Se Soigner</div></a>');
            $('.options').append('<a href="#"><div class="button option">Fuir !</div></a>');
        } else {
            $("#Character").addClass('open');
            $("#menu").removeClass('open');
            $("#inventaire").removeClass('open');
            $(".options").html('');
            $('.options').append('<div class="infos">');
            $('.options').append('<div class="info"><strong>Nom : </strong>$player->get_name()</div>');
            $('.options').append('<div class="info"><strong>Lvl : </strong>$player->get_lvl()</div>');
            $('.options').append('<div class="info"><strong>Vie : </strong>$player->get_life()</div>');
            $('.options').append('<div class="info"><strong>Energie : </strong>$player->get_spirit()</div>');
            $('.options').append('<div class="info"><strong>Armure : </strong>$player->get_ca()</div>');
            $('.options').append('</div>');
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
    var close = document.getElementsByClassName("close")[0];
    // Pour fermer la modal en cliquant sur la croix
    close.onclick = function() {
        modal.style.display = "none";
    }
    // Quand on clique a l'extérieur de la modal ca la ferme
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});
