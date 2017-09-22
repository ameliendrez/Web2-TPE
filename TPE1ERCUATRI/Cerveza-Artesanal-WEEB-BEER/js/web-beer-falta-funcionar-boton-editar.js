$(document).ready(function() {
  "use strict"

  EjecutaralIniciar()

  function EjecutaralIniciar() {
    $.ajax({

      "url" : "http://localhost/proyectos/Cerveza-Artesanal-WEEB-BEER/html/home.html",
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido,
      "error": handleError
    });
  };

  function handleError(xmlhr, r, error ) {
    console.log(error);
  };

  function enviarPedido(event) {
    event.preventDefault();

    $.ajax({

      "url" : "http://localhost/proyectos/Cerveza-Artesanal-WEEB-BEER//html/pedidorealizado.html",
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido2,
      "error": handleError


    });

    $(".contenedor").html("cargando...");
    }

  function cargarPedidoenTabla(){

   let grupo=7;

    $.ajax({

       "url": "https://web-unicen.herokuapp.com/api/thing/group/" + grupo,
       "method": "GET",
       "dataType": 'JSON',
       "success": verPedidoRealizado,
       "error" : handleError,
    });


   }





  function verPedidoRealizado(resultData) {


      //al ser tipo JSON resultData es un objeto listo para usar
      let html = "";



      for (let i = 0; i < resultData.information.length; i++) {

        let boton1 = crearBoton1(resultData.information[i]._id);
        let boton2 = crearBoton2(resultData.information[i]._id);
        let cerveza = resultData.information[i].thing.cerveza;
        let stockPedido = resultData.information[i].thing.cantidad;
        let tipoenvase = resultData.information[i].thing.envase;
        let valor = valordelPedido(tipoenvase, stockPedido);

        html += "<tr class='active' data-id='"+ resultData.information[i]._id +"'>" + "<td>" + cerveza + "</td>";
        html += "<td>" +  stockPedido + "</td>";
        html += "<td>" +  tipoenvase + "</td>";
        html += "<td>" + "$" + valor + "</td>";
        html += "<td>" + boton1.outerHTML + " - " + boton2.outerHTML +"</td>" + "</tr>";



      };
      $(".bodytable").html(html);
      $(".eliminar").on("click", function (){eliminarDatos($(this).attr("name"));});





      //$(".editar").on("click", editarDatos);

  };

  function eliminarDatos(id) {

          $.ajax({
            "method": "DELETE",
            "dataType": 'JSON',
            //si la info va en la URL o se pasa por "data" depende del servicio
            "url": "https://web-unicen.herokuapp.com/api/thing/" + id,
            "success": function() {
              $("tr[data-id='"+ id +"']").remove();

            },
            "error": handleError,

        });
    }



  function GuardadodelPedido(data) {

    console.log(data);
    cargarPedidoenTabla(data);

  };

  function valordelPedido(tipoenvase, stockPedido) {

    if (tipoenvase == "Botellas de Litro") {

      return (stockPedido * 60)

    }

    else if (tipoenvase == "Porron (250ml)"){

      return (stockPedido * 45)
    }

    else if (tipoenvase == "Latitas"){

      return (stockPedido * 35)
    }

    else if (tipoenvase == "Barriles"){

      return (stockPedido * 100)
    }


  };


  function crearBoton1(id) {

    let tabla = $("#agregaralatabla");
    let boton = document.createElement("button");
    let span = document.createElement("span");
    boton.name = id;
    boton.innerText = "";


    boton.classList.add("btn");
    boton.classList.add("btn-default");
    span.name="estilospan";
    boton.classList.add("glyphicon-pencil");
    boton.classList.add("glyphicon");
    boton.appendChild(span);

    return boton;

  }

  function crearBoton2(id) {

    let tabla = $("#agregaralatabla");
    let boton = document.createElement("button");
    let span = document.createElement("span");
    boton.name = id;
    boton.innerText = " ";

    boton.classList.add("btn");
    boton.classList.add("btn-default");
    boton.classList.add("eliminar");
    span.name="estilospan";
    boton.classList.add("glyphicon-remove");
    boton.classList.add("glyphicon");
    boton.appendChild(span);

    return boton;

  }


  function mostrarContenido2(data, textStatus, jqXHR) {

      $(".contenedor").html(data);
  };

  function mostrarContenido(data, textStatus, jqXHR) {

      $(".contenedor").html(data);

      $("#alertaFaltaCompletar").hide();


      //Aca comienza para hacer el pedido (boton)

      $(".btn-primary").on("click", enviarPedido);

        //Aca termina el pedido Realizado

        //Aca comienza para ver la tabla


        $(".verPedido").on("click", cargarPedidoenTabla);
          //Aca termino la tabla

        //aca comienza llenar la tabla


      $(".agregarCerveza").on("click", function() {
        let numGrupo=7;
        let cervezaElegida= $(".seleccionCerveza").val();
        let cantidadCervezas= $(".cantidadDeseada").val();
        let recipienteElegido= $(".tipoRecipiente").val();
        let pedidoCompleto = {

            "group" : numGrupo,
            "thing" :
                        { "cerveza" : cervezaElegida,
                          "cantidad" : cantidadCervezas,
                          "envase" : recipienteElegido,
                        },


        };
        if (numGrupo && cervezaElegida && cantidadCervezas && recipienteElegido) {
        $.ajax({


          "url": "https://web-unicen.herokuapp.com/api/thing",
          "method" : "POST",
          "contentType":"application/json; charset=utf-8",
          "data-type" : "JSON",
          "data" : JSON.stringify(pedidoCompleto),
          "success" : GuardadodelPedido,
          "error": handleError


        });
        $("#alertaFaltaCompletar").hide();

      }

      else {
        $("#alertaFaltaCompletar").html("<h2>" + "¡PEDIDO NO REALIZADO: Faltan rellenar algunos de los campos requeridos!" + "</h2>")
        $("#alertaFaltaCompletar").show();
      }
      });




        // aca termina el llenado de la tabla
  };




  $(".navegador").on("click", function (event) {

    let dirNueva = $(this).attr("href")
    event.preventDefault();

    //Esto recarga el navegador

    $.ajax({

      "url" : "http://localhost/proyectos/Cerveza-Artesanal-WEEB-BEER/"+dirNueva,
      "method" : "GET",
      "data-type" : "HTML",
      "success" : mostrarContenido,
      "error": handleError


    });

    $(".contenedor").html("cargando...");

  });





  });
