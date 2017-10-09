
  <h1>Tipos y caracteristicas de las cervezas disponibles en nuestro local</h1>
  <div class="table-responsive">
    <table class="table" id="agregaralatabla">
      <tr  class="">
        <td>Estilo de la cerveza</td>
        <td>Nombre de la cerveza</td>
        <td>%alc</td>
        <td>Descripción</td>
        <td></td>

      </tr>

        {foreach from=$estilos item=estilo}
        <tr class="">
          <td>{$estilo['id_estilo']}</td>
          <td>{$estilo['nombre']}</td>
          <td>{$estilo['%alc']}</td>
          <td>{$estilo['descripcion']}</td>
          <td>
            <a class ="borrarCerveza" href="eliminarCerveza/{$estilo['id_cerveza']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a></span>
          </td>


        </tr>

      {/foreach}

    </table>
  </div>









{*
  upper -> Lo que hace es poner todo en mayuscula
  truncate -> completa el valor (15) con 3 puntos suspensivos... para palabras muy largas, muestra como arranca
  Para realizar commentarios se usan llaves y asteriscos!!!

  {if $tarea['Completada']}
    <s>{$tarea['Titulo']|truncate:15|upper}: {$tarea['Descripcion']}</s>
    <a href="borrarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a></span>
  {else}
    {$tarea['Titulo']|truncate:15|upper}: {$tarea['Descripcion']}
    <a href="borrarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></a></span>
    <a href="finalizarTarea/{$tarea['IDTarea']}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></a></span>
  {/if}
</tr>
  <div class="row">
    <div class="tabla col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">

      <h1>Tipos y caracteristicas de las cervezas disponibles en nuestro local</h1>


      <div class="table-responsive">
        <table class="table" id="agregaralatabla">
          <tr  class="active encabezadoTabla">
            <td>Nombre de la cerveza</td>
            <td>Estilo de la cerveza</td>
            <td>Densidad inicial</td>
            <td>Densidad final</td>
            <td>%alc</td>
            <td>IBU</td>
            <td>SRM</td>
            <td>Descripción</td>
          </tr>
          <tr class="success contenidoTabla">
            <td>Weizenbock</td>
            <td>Wheat Beer</td>
            <td>1.066-1.080</td>
            <td>1.016-1.028</td>
            <td>6.5-9.6</td>
            <td>12-25</td>
            <td>10-30</td>
            <td>Elegante cerveza tradicional Alemana, oscura y aromática. Déjate envolver por el sabor de la mejor cebada malteada con una terminación levemente dulce en el paladar.</td>
          </tr>
          <tr class="warning contenidoTabla">
            <td>India pale ale</td>
            <td>Pale ale</td>
            <td>1.050-1.075</td>
            <td>1.012-1.018</td>
            <td>5.1-7.6</td>
            <td>40-60</td>
            <td>8- 14</td>
            <td>Cerveza de tradición inglesa que se caracteriza como una ale pálida y espumosa con un alto nivel del alcohol y de lúpulo.</td>
          </tr>
          <tr class="danger contenidoTabla">
            <td>Brown porter</td>
            <td>Porter</td>
            <td>1.040-1.050</td>
            <td>1.008-1.014</td>
            <td>3.8-5.2</td>
            <td>20-30</td>
            <td>20-35</td>
            <td>Estamos ante una cerveza de color marrón con un carácter moderadamente tostado y amargo. Además, incluye un abanico de sabores torrefactos, generalmente sin llegar al quemado, y a menudo tiene un perfil maltoso, caramelizado y a chocolate.</td>
          </tr>
          <tr  class="info contenidoTabla">
            <td>Sweet stout</td>
            <td>Stout</td>
            <td>1.035-1.066</td>
            <td>1.010-1.022</td>
            <td>3.2-6.4</td>
            <td>20-40</td>
            <td>40+</td>
            <td>Una cerveza muy rica, suave, cremosa y dulce. perfecta para tomar de postre si quieres algo oscuro, con sabor y cuerpo. A menudo tiene gusto tipo café express.</td>
          </tr>
          <tr  class="active contenidoTabla">
            <td>German pilsner</td>
            <td>Pilsner</td>
            <td>1.044-1.050</td>
            <td>1.006-1.012</td>
            <td>4.6-5.4</td>
            <td>25-45</td>
            <td>2-4</td>
            <td>cerveza fresca, límpida cuyas características prominentes son el amargor de los lúpulos alemanes acentuados por sulfatos del agua.</td>
          </tr>
          <tr class="success contenidoTabla">
            <td>American lite</td>
            <td>Lager</td>
            <td>1.024-1.040</td>
            <td>1.002-1.008</td>
            <td>2.9-4.5</td>
            <td>8-15</td>
            <td>2-4</td>
            <td>es una cerveza muy refrescante y con una caracteristicas diferenciadora de saciadora de la sed, careciendo de sabores fuertes, ya que se trata de una cerveza con menor nivel de calorías que el estándar lager y por lo tanto tiene menor densidad.</td>
          </tr>
          <tr class="warning contenidoTabla">
            <td>Doppelbock</td>
            <td>Bock</td>
            <td>1.074-1.080</td>
            <td>1.020-1.028</td>
            <td>6.6-7.9</td>
            <td>20-30</td>
            <td>12-30</td>
            <td>Una lager plena y muy fuerte. Una versión más fuerte que la traditional o helles bock. De un aroma a frutas secas y un color ambar o palido.</td>
          </tr>
          <tr class="danger contenidoTabla">
            <td >Barleywine</td>
            <td>Barleywine</td>
            <td>1.085-1.120</td>
            <td>1.024-1.032</td>
            <td>8.4-12.2</td>
            <td>50-100</td>
            <td>8- 17</td>
            <td>Toda una exhibición de complejidad maltosa y sabores intensos. Rica en cuerpo, con una sensación cálida procedente del alcohol y una interesante sensación afrutada o lupulizada, con ciertas notas a nueces.</td>
          </tr>
          <tr class="info contenidoTabla">
            <td>Scotch ale</td>
            <td>Strong ale</td>
            <td>1.072-1.085</td>
            <td>1.016-1.028</td>
            <td>6.0-9.0</td>
            <td>20-40</td>
            <td>10-40+</td>
            <td>Sabrosa, maltosa y usualmente dulce, lo cual puede sugerir un postre. Los sabores complejos secundarios previenen una impresion unidimensional. La fuerza y la maltosidad pueden variar.</td>
          </tr>

        </table>
      </div>



    </div>
  </div>
  *}
