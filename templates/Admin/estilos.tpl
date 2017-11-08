{include file="header.tpl"}

</div>
  </div>

  <a href="nuevoEstilo">Agregar Estilo</a> |
  <a href="adminList">Ver Lista de Cervezas</a> |
  <a href="mostrarUsuario">Ver lista de usuarios</a>

  {include file="obtenerEstilosHeader.tpl"}


        {foreach from=$estilos item=estilo}

        <tr>

          {include file="obtenerEstilos.tpl"}

          <td>
            <a href="eliminarEstilo/{$estilo['id_estilo']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="updateEstilo/{$estilo['id_estilo']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>
        </tr>

      {/foreach}

    </table>
  </div>

{include file="footer.tpl"}
