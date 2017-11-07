
    <div class="alert alert-info" role="alert">

      <form  method="post">

      <label for="estilo">¿Que estilo preferis?</label>
      <select class="seleccionEstilo btn btn-default btn-md" name="estilo" id="estilo">
        <option></option>
        {foreach from=$estilos item=estilo}
          <option>{$estilo['nombre_estilo']}</option>
        {/foreach}

      </select>

      <label for="cervezas">¿Que cerveza te interesa conocer mas?</label>
      <select class="seleccionCerveza btn btn-default btn-md" name="cervezas" id="cervezas">
        <option></option>
        {foreach from=$cervezas item=cerveza}
          <option value="{$cerveza['id_cerveza']}">{$cerveza['nombre_cerveza']}</option>
        {/foreach}

      </select>

      <button type="button" class="filtrar btn btn-default btn-md" name="button">Filtrar</button>
    </form>

   </div>
