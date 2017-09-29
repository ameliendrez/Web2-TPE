// $(document).ready(function() {
//   "use strict"
//
//
//   function mostrarContenido(data, textStatus, jqXHR) {
//
//     $(".contenedor").html(data);
//
//   }
//
//   function mostrarError(xmlhr, r, error) {
//     console.log(error);
//   }
//
//
//   $(".navegador").on("click", function (event) {
//
//     let dirNueva = $(this).attr("href")
//     event.preventDefault();
//
//     $.ajax({
//
//       "url" : "http://localhost/proyectos/Web2-TPE/"+dirNueva,
//       "method" : "GET",
//       "data-type" : "HTML",
//       "success" : mostrarContenido,
//       "error": handleError
//
//
//     });
//
//
//   });
//
// });
