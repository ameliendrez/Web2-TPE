
{include file="header.tpl"}
</div>
  </div>
    <a href="mostrarEstilo">Volver a lista de Estilos</a> |
    <a href="adminList">Ver lista de Cervezas</a>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="../modificarEstilo" method="post">

          <div class="form-group">

            <label for="nombre">Elija el estilo de la cerveza</label>

            <select class="btn btn-default btn-md" name="nombre" id="nombre">
              <option></option>
              {foreach from=$estilos item=estilo}
                <option>{$estilo['nombre']}</option>
              {/foreach}
            </select>
          </div>

          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92" placeholder="Descripcion"></textarea>
          </div>
          <button type="submit" name="id" value="{{$id}}" class="btn btn-primary">Modificar Estilo</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
