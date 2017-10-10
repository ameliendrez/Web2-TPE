{include file="header.tpl"}
</div>
  </div>
    <a href="mostrarEstilo">Volver a Lista de Estilos</a> |
    <a href="adminList">Ver Lista de Cervezas</a>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="guardarEstilo" method="post">
          <div class="form-group">
            <label for="nombre">Nombre del Estilo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la cerveza">
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
