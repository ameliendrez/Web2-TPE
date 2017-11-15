{include file="header.tpl"}
</div>
  </div>
    <a href="adminList">Volver a lista de Cervezas</a> |
    <a href="mostrarEstilo">Ver Lista de Estilos</a> |
    <a href="mostrarUsuario">Ver lista de usuarios</a> |
    <a href="">Volver a vista de Usuario</a>


    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="guardarCerveza" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la cerveza" required>
          </div>
          <div class="form-group">

            <label for="estilo">Estilo</label>

            <select class="btn btn-default btn-md" name="estilo" id="estilo" required>
              <option></option>
              {foreach from=$estilos item=estilo}
                <option value="{$estilo['id_estilo']}">{$estilo['nombre_estilo']}</option>
              {/foreach}
            </select>

          </div>
          <div class="form-group">
            <label for="alc">% alcohol</label>
            <input type="number" class="form-control" id="alc" name="alc" placeholder="Porcentaje de alcohol" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="8" cols="92" placeholder="Descripcion" required></textarea>
          </div>
          <div class="form-group">
            <label for="imagenes">Subir una o varias imagenes</label>
            <input type="file" name="imagenes[]" id="imagenes" multiple>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
