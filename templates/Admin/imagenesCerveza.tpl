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
    <!-- <div id="Imagenes" class="carousel slide carrusel-proceso" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#Imagenes" data-slide-to="0" class="active"></li>
        <li data-target="#Imagenes" data-slide-to="1"></li>
        <li data-target="#Imagenes" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner carrusel-proceso" role="listbox">
      <div class="item active thumbnail">
        <img class="img-responsive carrusel" src="{$imagenes[0]['ruta']}" width="375" height="300">
      </div>

        <div class="item thumbnail">
          <img class="img-responsive carrusel" src="{$imagen['ruta']}" width="375" height="300">
        </div> -->
      {foreach from = $imagenes item = imagen}

      <tr>
        <td><img class="img-responsive" src="{$imagen['ruta']}" width="375" height="300"></td>
        <td>
          <a href="eliminarImagen/{$imagen['id_imagen']}/{$cerveza['id_cerveza']}" >Borrar Imagen</a>
        </td>
      </tr>
      {/foreach}
      <!-- </div>
    </div> -->
    {/if}

</table>

{include file="footer.tpl"}
