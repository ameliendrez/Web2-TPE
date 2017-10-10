{include file="header.tpl"}

</div>
  </div>

  <a href="nuevoEstilo">Agregar Estilo</a> |
  <a href="adminList">Ver Lista de Cervezas</a>

  <div class="table-responsive">
    <table class="table">
      <tr  class="">
        <td>Nombre del estilo</td>
        <td>Descripción</td>
        <td></td>

      </tr>

        {foreach from=$estilos item=estilo}
        <tr class="">
          <td>{$estilo['nombre']}</td>
          <td>{$estilo['descripcion']}</td>

          <td>
            <a href="eliminarEstilo/{$estilo['id_estilo']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>


        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
