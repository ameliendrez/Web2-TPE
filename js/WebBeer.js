$(document).ready(function() {
  "use strict"

  EjecutarInicio();

  function mostrarContenido(data, textStatus, jqXHR) {
    $(".contenedor").html(data);
    $(".filtrar").on("click", function () {
      let dirNueva ;
      if($(".seleccionEstilo").val() != "") {
        dirNueva = "obtenerCervezasPorEstilo/"+$(".seleccionEstilo").val();
      }
      else if ($(".seleccionCerveza").val() != ""){
          dirNueva = "obtenerCerveza/"+$(".seleccionCerveza").val();
      }
      else{
        dirNueva = 'obtenerCervezas';
      }
      $.ajax({
        "url" : document.location.href+"/"+dirNueva,
        "method" : "GET",
        "data-type" : "HTML",
        "success" : filtrar,
        "error": handleError
      });
    });

  }

  function handleError(xmlhr, r, error) {
    console.log(error);
  }

  function filtrar(data, textStatus, jqXHR) {
      $(".table-responsive").html(data);
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
