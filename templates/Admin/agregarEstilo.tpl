{include file="header.tpl"}
</div>
  </div>
    <a href="mostrarEstilo">Volver a Lista de Estilos</a> |
    <a href="adminList">Ver Lista de Cervezas</a> |
    <a href="mostrarUsuario">Ver lista de usuarios</a> |
    <a href="">Volver a pagina de inicio</a>


    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="guardarEstilo" method="post">
          <div class="form-group">
            <label for="nombre">Nombre del Estilo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del estilo" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92" placeholder="Descripcion" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
