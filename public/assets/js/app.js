$(document).ready(function(){
  // $.ajax({
  //   method: "GET", // GET permet de LISTER les produits
  //   url:"http://storeapi.skalv-studio.fr/app.php/products",// URL de l'api
  //   success : function(products) { //callback appelé en cas de succes, la liste des produits est passé en paramètre
  //     console.log(products);
  //   },
  //   error: function(err){ // callback appelé en cas d'erreur de la requête
  //     console.log(err);
  //   }
  // })
  //
  // //Ajouter un produit
  // var testvalues = {
  // "name" : "Stars",
  // "award" : "Me",
  // "category" : "dvd",
  // "logo" : "https://pixabay.com/static/uploads/photo/2015/10/01/21/39/background-image-967820_960_720.jpg",
  // "productID" : "654321",
  // };
  //
  // $.ajax({
  //   method: "POST",
  //   url:"http://storeapi.skalv-studio.fr/app.php/products",// URL de l'api
  //   data: JSON.stringify(testvalues),
  //   contentType: "application/json",
  //   success: function(product){
  //     console.log("new product : ", product);
  //   },
  //   error: function(err){ // callback appelé en cas d'erreur de la requête
  //     console.log(err);
  //   }
  // })
  $(".menuBurger").click(function() {
    if ($(".burgerDropDown").hasClass("hide")){
      $(".burgerDropDown").removeClass("hide");
      $('section').css('background-color', '#333');
    } else {
      $(".burgerDropDown").addClass("hide");
      $('section').css('background-color', '#666');
    }
  });

})
