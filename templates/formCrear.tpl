{include file="header.tpl"}

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
        <label for="ibu">Ibu</label>
        <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Ibu">
      </div>
      <div class="form-group">
        <label for="alc">%alcohol</label>
        <input type="text" class="form-control" id="alc" name="alc" placeholder="Porcentaje de alcohol">
      </div>
      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea id="descripcion" name="descripcion" rows="8" cols="76" placeholder="Descripcion"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>
{include file="footer.tpl"}
