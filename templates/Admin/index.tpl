{include file="header.tpl"}

</div>
  </div>


  <a href="nuevaCerveza">Agregar Cerveza</a> |
  <a href="mostrarEstilo">Ver Lista de Estilos</a>

  <div class="table-responsive">
    <table class="table">

      {include file="../tablaCervezasHeader.tpl"}


        {foreach from=$cervezas item=cerveza}
        <tr>
          {include file="../obtenerCervezas.tpl"}
          <td>
            <a href="eliminarCerveza/{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="updateCerveza/{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>

        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
