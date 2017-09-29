<ul class="list-group">
  {foreach from=$tareas item=tarea}
    <li class="list-group-item">
      {if $tarea['Completada']}
        <s>{$tarea['Titulo']|truncate:15|upper}: {$tarea['Descripcion']}</s>
        <a href="borrarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a></span>
      {else}
        {$tarea['Titulo']|truncate:15|upper}: {$tarea['Descripcion']}
        <a href="borrarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a></span>
        <a href="finalizarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></a></span>
      {/if}
    </li>
  {/foreach}
</ul>


{*
  upper -> Lo que hace es poner todo en mayuscula
  truncate -> completa el valor (15) con 3 puntos suspensivos... para palabras muy largas, muestra como arranca
  Para realizar commentarios se usan llaves y asteriscos!!!

 *}
