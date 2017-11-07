{include file="header.tpl"}

</div>
  </div>

  <a href="nuevaCerveza">Agregar Cerveza</a> |
  <a href="mostrarEstilo">Ver Lista de Estilos</a> |
  <a href="mostrarUsuario">Ver lista de usuarios</a>

  <div class="table-responsive">
    <table class="table">

      {include file="../tablaCervezasHeader.tpl"}

        {foreach from=$cervezas item=cerveza}

        <tr>
          <form method="post">

          {include file="../obtenerCervezas.tpl"}

          <td>
            <a href="eliminarCerveza/{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="updateCerveza/{$cerveza['id_cerveza']}"><span name="id" value="{$cerveza['id_cerveza']}" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>

        </form>

        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
