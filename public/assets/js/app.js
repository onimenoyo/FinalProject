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
});
