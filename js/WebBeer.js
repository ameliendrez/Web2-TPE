$(document).ready(function() {
  "use strict";

  EjecutarInicio();
  let id_cerveza;
  let id_usuario;
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
    console.log(idComentario);

    borrarComentario(idComentario);
  });
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
      $.ajax("api/cervezas/" + id_cerveza)
        .done(function(comentarios) {
          $('li').remove();
          for (var key in comentarios) {
            let rendered = Mustache.render(templateComentario, comentarios);
            $('#comentarios').append(rendered);
          }
          })
         .fail(function() {
           $('li').remove();
           $('#comentarios').append('<li>No hay comentarios disponibles para esta cerveza</li>');
         });
     }

     function crearComentario() {
      id_usuario = $("#formularioComentar").data('idusuario');
      let comentario = {
        "comentario": $('#comentario').val(),
        "id_cerveza": id_cerveza,
        "id_usuario": id_usuario

      };

      $.ajax({
            method: "POST",
            url: "api/cervezas",
            data: JSON.stringify(comentario)
          })
         .done(function(data) {
          let rendered = Mustache.render(templateComentario, data);
          $('#comentarios').append(rendered);
          limpiarFormulario();
         })
        .fail(function(data) {
             alert('Imposible crear el comentario');
             limpiarFormulario();
        });
     }

     function borrarComentario(idComentario) {
       $.ajax({
          method: "DELETE",
          url: "api/cervezas/" + idComentario
          })
          .done(function() {
             cargarComentarios();
          })
          .fail(function() {
              alert('Error al borrar el comentario');
          });
        }

        function limpiarFormulario() {
          $('textarea').val('')
        }

});
