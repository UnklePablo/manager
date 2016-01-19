<?php
include '../../comuns/schema/schema.php';

Schema::SetParam( 'module', 'home' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'index' );
Schema::SetParam( 'title_pag', 'Calendar' );

Schema::SetParam( 'submodule', 'noticies' ); // paràmetre opcional
Schema::SetParam( 'return', FALSE ); // paràmetre opcional

Schema::SetParam( 'loadbd', true ); // paràmetre opcional - carregar bbdd => TRUE | FALSE
Schema::SetParam( 'loadmodalpanel', true ); // paràmetre opcional - carregar panel modal bootstrap => TRUE | FALSE
Schema::SetParam( 'permission', array('modul_admin', 'admin_noticies') ); // paràmetre opcional

Schema::SetFileJS('comuns/js/elements.js');
Schema::SetFileJS('comuns/js/elements2.js');
Schema::SetFileJS('comuns/js/elements3.js');

Schema::SchemaInit();

?>
<style>
.table-calendar th {
	width:14.3%;
}
.table-calendar td {
	height: 100px;
}
.actual-day {
	background-color: #f7714d !important;
}
.calendar-event { 
  display: inline-block;
  min-width: 8px;
  padding: 8px 8px;
  font-weight: bold;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  background-color: #777;
  border-radius: 8px;
}
.calendar-event-grey { 	background-color: #eaeaea; }
.calendar-event-green { 	background-color: #95c53e; }
.calendar-event-purple { 	background-color: #a48ad4; }
.calendar-event-blue { 	background-color: #95c53e; }
</style>

<?php


$month = 12;
$year  = 2015;
$day   = 18;

  function _data_last_month_day( $year, $month ) { 
    $info = array();
  	$info['date']        = date("Y-m-d", mktime(0,0,0, $month+1, 0, $year));
	$info['year']        = $year;
	$info['month']       = $month;
	$info['day']         = date("d", mktime(0,0,0, $month+1, 0, $year));

	$num_day_of_week = date('w', mktime(0,0,0, $month+1, 0, $year));
	if ( $num_day_of_week == 0 ) $num_day_of_week = 7;

	$info['day_of_week'] = $num_day_of_week;
 
    return $info;
  };
 
  /** Actual month first day **/
  function _data_first_month_day( $year, $month ) {

  	$info = array();
  	$info['date']        = date('Y-m-d', mktime(0,0,0, $month, 1, $year));
	$info['year']        = $year;
	$info['month']       = $month;
	$info['day']         = 1;

	$num_day_of_week = date('w', mktime(0,0,0, $month, 1, $year));
	if ( $num_day_of_week == 0 ) $num_day_of_week = 7;

	$info['day_of_week'] = date('w', mktime(0,0,0, $month, 1, $year));
    
    return $info;
  }

$last_day_month  = _data_last_month_day( $year, $month );
$first_day_month = _data_first_month_day( $year, $month );

$initial_date = $first_day_month['date'];
$final_date   = $last_day_month['date'];

/*for ( $d = $initial_date; $d <= $final_date; $d++ ) {

	echo '<div>'.$d.'</div>';

}*/

print_r ( $last_day_month );
echo '<br>';
print_r ( $first_day_month );


?>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;">
            	<div class="pull-left">
					<button type="button" class="btn btn-default btn-xs ">
                           <i class="glyphicon glyphicon-chevron-left"></i>
                    </button>
            	</div>
            	<div class="pull-right">
					<button type="button" class="btn btn-default btn-xs ">
                           <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
            	</div>
            	Diciembre 2015
            </div>
            <div class="panel-body">
            	<table class="table table-bordered table-calendar">
            		<thead>
	            		<tr>
	            			<th>Lunes</th>
	            			<th>Martes</th>
	            			<th>Miércoles</th>
	            			<th>Jueves</th>
	            			<th>Viernes</th>
	            			<th>Sábado</th>
	            			<th>Domingo</th>
	            		</tr>
            		</thread>
            		<tbody>
            			<tr>
            				<td>
            					<div class="badge" style="font-weight:bold;">1</div>
            					
            					<div class="pull-right">
	            					<div class="calendar-event calendar-event-blue"></div>
	            					<div class="calendar-event calendar-event-green"></div>
	            					<div class="calendar-event calendar-event-purple"></div>
	            					<div class="calendar-event calendar-event-blue"></div>
	            					<div class="calendar-event calendar-event-green"></div>
	            					<div class="calendar-event calendar-event-purple"></div>
	            					<div class="calendar-event calendar-event-blue"></div>
	            					<div class="calendar-event calendar-event-green"></div>
	            					<div class="calendar-event calendar-event-purple"></div>
	            					<div class="calendar-event calendar-event-blue"></div>
	            					<div class="calendar-event calendar-event-green"></div>
	            					<div class="calendar-event calendar-event-purple"></div>
            					</div>
            				</td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            			</tr>
            			<tr>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td class="actual-day"></td>
            				<td></td>
            			</tr>
            			<tr>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            			</tr>
            			<tr>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            				<td></td>
            			</tr>
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
</div>


<?php
Schema::SchemaEnd();
?>