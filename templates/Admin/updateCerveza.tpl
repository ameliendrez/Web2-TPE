
{include file="header.tpl"}
</div>
  </div>
    <a href="adminList">Volver a lista de Cervezas</a> |
    <a href="mostrarEstilo">Ver Lista de Estilos</a>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="../modificarCerveza" method="post">

          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la cerveza">
          </div>

          <div class="form-group">

            <label for="estilo">Estilo</label>

            <select class="btn btn-default btn-md" name="estilo" id="estilo">
              <option></option>
              {foreach from=$estilos item=estilo}
                <option>{$estilo['nombre']}</option>
              {/foreach}
            </select>
          </div>

          <div class="form-group">
            <label for="alc">% alcohol</label>
            <input type="number" class="form-control" id="alc" name="alc" placeholder="Porcentaje de alcohol">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92" placeholder="Descripcion"></textarea>
          </div>
          <button type="submit" name="id" value="{{$id}}" class="btn btn-primary">Modificar Cerveza</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
