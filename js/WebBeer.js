$(document).ready(function() {
  "use strict"

  EjecutarInicio();

  function mostrarContenido(data, textStatus, jqXHR) {
    $(".contenedor").html(data);
    $(".filtrar").on("click", function () {
      let dirNueva ;
      if($(".seleccionEstilo").val() != "") {
        dirNueva = "obtenerCervezasPorEstilo/";
        //dirNueva += $(".seleccionEstilo").val();
      }

      else if ($(".seleccionCerveza").val() != ""){
        dirNueva = $(".seleccionCerveza").val();
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

    let valor;

    if($(".seleccionEstilo").val() != "") {
    console.log($(".seleccionEstilo").val());  
      $(".table-responsive").html(data);
    }

    else if ($(".seleccionCerveza").val() != ""){
      valor = $(".seleccionCerveza").val();
      $(".table-responsive").html(valor);
    }
    else{
      $(".table-responsive").html(data);
    }
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
