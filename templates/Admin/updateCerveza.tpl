
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
        <form action="guardarCerveza" method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la cerveza">
          </div>
          <div class="form-group">
            <label for="estilo">Estilo</label>
            <input type="number" class="form-control" id="estilo" name="estilo" placeholder="estilo">
          </div>
          <div class="form-group">
            <label for="alc">% alcohol</label>
            <input type="number" class="form-control" id="alc" name="alc" placeholder="Porcentaje de alcohol">
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92" placeholder="Descripcion"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
