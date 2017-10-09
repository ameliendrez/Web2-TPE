

<h1>Estamos en el PEDIDO</h1>

<div class="row">

  <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-3">

    <div class="alert alert-info" role="alert">
      <label for="Cervezas">¿Que cerveza te interesa comprar?</label>
      <select class="seleccionCerveza btn btn-default btn-md" name="Cervezas">
        <option></option>
        <option>Weizenbock</option>
        <option>India pale ale</option>
        <option>Brown porter</option>
        <option>Sweet stout	</option>
        <option>German pilsner</option>
        <option>American lite</option>
        <option>Doppelbock</option>
        <option>Barleywine</option>
        <option>Scotch ale</option>
      </select>
      <label for="unidades">¿Que cantidad?</label>
      <input class="cantidadDeseada btn btn-default btn-md" type="number" name="unidades" min="1" max=250 >
      <label for="Recipiente">¿En que recipiente?</label>
      <select name="Recipiente" class="tipoRecipiente btn btn-default btn-md">
        <option>Botellas de Litro</option>
        <option>Porron (250ml)</option>
        <option>Latitas</option>
        <option>Barriles</option>
      </select>

      <button type="button" class="agregarCerveza btn btn-default btn-md" name="button">Agregar Pedido al carro</button>



   </div>

   <div id="alertaFaltaCompletar" class="alert alert-danger" role="alert">

   </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">


    <div class="alert alert-info" role="alert">
      <p class="verPedido">Para ver el pedido realizado, haga click aqui:</p>
      <button class="verPedido btn btn-default btn-lg" id="boton-pedido" type="button" name="button">Ver pedido Realizado</button>
    </div>

      <div class="ContenidodelRest">

      </div>

      <div class="table-responsive">
        <table class="table " id="agregaralatabla">
          <thead>
            <tr  class=" active">
              <td>Nombre de la cerveza</td>
              <td>Cantidad de unidades</td>
              <td>Envase Elegido</td>
              <td>Costo del pedido</td>
              <td>Modificar / Eliminar pedido</td>
            </tr>
          </thead>

          <tbody class="bodytable">

          </tbody>
        </table>
        <div class="PieTabla">

        </div>

      </div>

      <form>
        <div class="form-group">
          <label for="Nombre">Apellido y Nombre</label>
          <input type="text" class="form-control" id="Nombre" placeholder="Meliendrez Agustin">
        </div>
        <div class="form-group">
          <label for="ingresarEmail">Email</label>
          <input type="email" class="form-control" id="ingresarEmail" placeholder="ameliendrez@gmail.com">
        </div>

        <button type="submit" class="btn btn-primary" id="enviarPedido">Enviar</button>

      </form>


  </div>
</div>
