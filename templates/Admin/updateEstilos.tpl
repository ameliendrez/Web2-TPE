
{include file="header.tpl"}
</div>
  </div>
    <a href="mostrarEstilo">Volver a lista de Estilos</a> |
    <a href="adminList">Ver lista de Cervezas</a> |
    <a href="mostrarUsuario">Ver lista de usuarios</a> |
    <a href="">Volver a pagina de inicio</a>


    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="modificarEstilo" method="post">

          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{$estilo['nombre_estilo']}">
          </div>

          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92">{$estilo['descripcion']}</textarea>
          </div>
          <button type="submit" name="id" value="{{$id}}" class="btn btn-primary">Modificar Estilo</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
