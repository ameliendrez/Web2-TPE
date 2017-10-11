<table class="table">

  {include file="tablaCervezasHeader.tpl"}

    {foreach from=$cervezas item=cerveza}
    
    <tr>

      {include file="obtenerCervezas.tpl"}

    </tr>

  {/foreach}

</table>
