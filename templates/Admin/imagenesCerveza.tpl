{include file="header.tpl"}

<table class="table">
  <tr>
    <td>Nombre de estilo</td>
    <td>Nombre de cerveza</td>
    <td>Porcentaje de alcohol</td>
  </tr>
  
  <tr>
    <td>{$cerveza['nombre_estilo']}</td>
    <td>{$cerveza['nombre_cerveza']}</td>
    <td>{$cerveza['alc']}</td>
  </tr>
</table>

<table class="table">

    {if isset($error)}
      <div class="alert alert-danger" role="alert">{$error}</div>
    {else}
      {foreach from = $imagenes item = imagen}
      <tr>
        <td><img class="img-responsive" src="{$imagen['ruta']}" width="375" height="300"></td>
        <td>
          <a href="eliminarImagen/{$imagen['id_imagen']}">Borrar Imagen</a>
        </td>
      </tr>
      {/foreach}
    {/if}

</table>

{include file="footer.tpl"}
