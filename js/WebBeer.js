$(document).ready(function() {
  "use strict";

  EjecutarInicio();
  let id_cerveza;
  let templateComentario;
  $.ajax({ url: 'js/templates/comentarios.mst'})
    .done( template => templateComentario = template);

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
        dirNueva = "obtenerCervezasPorEstilo/" + $(".seleccionEstilo").val();
      }

      else if ($(".seleccionCerveza").val() != "") {
        id_cerveza = $(".seleccionCerveza").val();
        dirNueva = "obtenerCerveza/" + id_cerveza;
        cargarComentarios();
        $('#crearComentario').click(function(event) {
           event.preventDefault();
           crearComentario();
           setTimeout(function() {
             cargarComentarios();
           }, 2000);
       });
       $('body').on('click', 'a.borrar', function() {
        event.preventDefault();
        let idComentario = $(this).data('idcomentario');
        borrarComentario(idComentario);
        cargarComentarios();
      });
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

    $(".obtenerSoloEstilos").on("click", function () {
      let dirNueva = "getEstilos";

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
      "url" : "home",
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido,
      "error": handleError
    });
  }

    function cargarComentarios() {
      console.log("El id de cerveza es: "+id_cerveza);
      $.ajax("api/cervezas/" + id_cerveza)
        .done(function(comentarios) {
          $('#comentarios tr').remove();
          let rendered = Mustache.render(templateComentario, comentarios);
          $('#comentarios').append(rendered);
        })
         .fail(function() {
           $('#comentarios').append('<li>No hay comentarios disponibles para esta cerveza</li>');
         });
     }

     function crearComentario() {
      let comentario = {
        "comentario": $('#comentario').val(),
        "id_cerveza": "2",
        "id_usuario": "1"
      };

      $.ajax({
            method: "POST",
            url: "api/cervezas",
            data: JSON.stringify(comentario)
          })
         .done(function(data) {
          let rendered = Mustache.render(templateComentario, data);
          $('#comentarios').append(rendered);
         })
        .fail(function(data) {
             alert('Imposible crear el comentario');
        });
     }

     function borrarComentario(idComentario) {
       $.ajax({
          method: "DELETE",
          url: "api/cervezas/" + idComentario
          })
          .done(function() {
             $('#comentario'+idComentario).remove();
          })
          .fail(function() {
              alert('Error al borrar el comentario');
          });
        }

});
