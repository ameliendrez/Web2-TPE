$(document).ready(function() {
  "use strict"

  EjecutarInicio();

  function mostrarContenido(data, textStatus, jqXHR) {

    $(".contenedor").html(data);

  }

  function handleError(xmlhr, r, error) {
    console.log(error);
  }


  $(".navegador").on("click", function (event) {
    event.preventDefault();
    let dirNueva = $(this).attr("href")

    $.ajax({

      "url" : document.location.href+"/"+dirNueva,
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido,
      "error": handleError


    });


  });

  function EjecutarInicio() {
    $.ajax({

      "url" : document.location.href+"/home",
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido,
      "error": handleError


    });
  }

});
