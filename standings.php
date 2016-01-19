<?php
include 'comuns/schema/schema.php';

Schema::SetParam( 'module', 'home' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'index' );
Schema::SetParam( 'title_pag', 'Titol de la pàgina: lorem ipsum' );

Schema::SetParam( 'submodule', 'noticies' ); // paràmetre opcional
Schema::SetParam( 'return', array('Home','Library','Data') ); // paràmetre opcional

Schema::SetParam( 'loadbd', true ); // paràmetre opcional - carregar bbdd => TRUE | FALSE
Schema::SetParam( 'loadmodalpanel', true ); // paràmetre opcional - carregar panel modal bootstrap => TRUE | FALSE
Schema::SetParam( 'permission', array('modul_admin', 'admin_noticies') ); // paràmetre opcional

Schema::SetFileJS('comuns/js/elements.js');
Schema::SetFileJS('comuns/js/elements2.js');
Schema::SetFileJS('comuns/js/elements3.js');

Schema::SchemaInit();
?>
<style>
.bold { font-weight: bold; }
</style>
<!-- <h2 class="sub-header">Standings <small>Group B</small></h2> -->
<div class="table-responsive panel">
  <div class="panel-body">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Pos.</th>
        <th>Team</th>
        <th>Won</th>
        <th>Draw</th>
        <th>Lost</th>
        <th>Total</th>
        <th>Goal Diff.</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td class="text-center">1</td>
        <td class="bold">FC Barcelona</td>
        <td class="text-center">5</td>
        <td class="text-center">0</td>
        <td class="text-center">0</td>
        <td class="text-center">5</td>
        <td class="text-center">10</td>
        <td class="text-center bold">15</td>
      </tr>
       <tr>
        <td class="text-center">2</td>
        <td class="bold">Valladolid</td>
        <td class="text-center">4</td>
        <td class="text-center">1</td>
        <td class="text-center">0</td>
        <td class="text-center">5</td>
        <td class="text-center">6</td>
        <td class="text-center bold">13</td>
      </tr>
       <tr>
        <td class="text-center">3</td>
        <td class="bold">Real Sociedad</td>
        <td class="text-center">4</td>
        <td class="text-center">1</td>
        <td class="text-center">0</td>
        <td class="text-center">5</td>
        <td class="text-center">3</td>
        <td class="text-center bold">13</td>
      </tr>
       <tr>
        <td class="text-center">4</td>
        <td class="bold">Madrid</td>
        <td class="text-center">4</td>
        <td class="text-center">0</td>
        <td class="text-center">1</td>
        <td class="text-center">5</td>
        <td class="text-center">8</td>
        <td class="text-center bold">12</td>
      </tr>
      <tr>
        <td class="text-center">5</td>
        <td class="bold">Getafe</td>
        <td class="text-center">3</td>
        <td class="text-center">0</td>
        <td class="text-center">2</td>
        <td class="text-center">5</td>
        <td class="text-center">2</td>
        <td class="text-center bold">9</td>
      </tr>
      <tr>
        <td class="text-center">6</td>
        <td class="bold">Betis</td>
        <td class="text-center">2</td>
        <td class="text-center">0</td>
        <td class="text-center">3</td>
        <td class="text-center">5</td>
        <td class="text-center">2</td>
        <td class="text-center bold">6</td>
      </tr>
      <tr class="warning">
        <td class="text-center">7</td>
        <td class="bold">Deportivo de la Coruña</td>
        <td class="text-center">1</td>
        <td class="text-center">1</td>
        <td class="text-center">3</td>
        <td class="text-center">5</td>
        <td class="text-center">-1</td>
        <td class="text-center bold">4</td>
      </tr>
      <tr class="danger">
        <td class="text-center">8</td>
        <td class="bold">Hospitalet del LLobregat FC</td>
        <td class="text-center">1</td>
        <td class="text-center">0</td>
        <td class="text-center">4</td>
        <td class="text-center">5</td>
        <td class="text-center">-5</td>
        <td class="text-center bold">3</td>
      </tr>
     
    </tbody>
  </table>
</div>
</div>



<div class="row">
  <div class="col-sm-6">
      asdsdasd SDSDASDASD

  </div>
  <div class="col-sm-6">
      Columna 2222

  </div>

</div>


<span class="label label-default">Default</span>
<span class="label label-default">Default</span>
<span class="label label-primary">Primary</span>
<span class="label label-success">Success</span>
<span class="label label-info">Info</span>
<span class="label label-warning">Warning</span>
<span class="label label-danger">Danger</span>

<?php 
Schema::SchemaEnd();
?>