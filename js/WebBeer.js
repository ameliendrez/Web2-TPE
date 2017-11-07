$(document).ready(function() {
  "use strict";

  EjecutarInicio();

  function mostrarContenido(data, textStatus, jqXHR) {
    $(".contenedor").html(data);
    $(".navegador").on("click", function (event) {
      event.preventDefault();
      let dirNueva = $(this).attr("href")
      $.ajax({
        "url" : dirNueva,
        "method" : "GET",
        "data-type" : "HTML",
        "success" : mostrarContenido,
        "error": handleError
      });
    });
    $(".filtrar").on("click", function () {
      let dirNueva;
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
        "url" : dirNueva,
        "method" : "GET",
        "data-type" : "HTML",
        "success" : filtrar,
        "error": handleError
      });
    });

    $(".filtrarPorEstilo").on("click", function () {
      let dirNueva = "getCervezasOrdenadas";

      $.ajax({
        "url" : dirNueva,
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
      "url" : dirNueva,
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
