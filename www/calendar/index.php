<?php
include '../../comuns/schema/schema.php';

Schema::SetParam( 'module', 'calendar' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'calendar' );
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


/////////////////// BODY ////////////////////////////////////
// parameters:
$mode  = Helpers::filter_string('m', INPUT_GET);
$month = Helpers::filter_integer('month', INPUT_GET);
$year  = Helpers::filter_integer('year', INPUT_GET);
$day   = Helpers::filter_integer('day', INPUT_GET);

//control:
if ( !$mode )  $mode  = 'month';
if ( !$month ) $month = date('m');
if ( !$year )  $year  = date('Y');
if ( !$day )   $day   = date('d');

$class_mode[ $mode ] = 'active';

echo '
<div class="row">
	<div class="col-xs-12">
	<div class="btn-group margin-top-10 margin-bottom-10" role="group">
	  <a href="'.BASE_DIR.'/calendar/do-index/m-month/" class="btn btn-default '.$class_mode['month'].'"><i class="glyphicon glyphicon-th-large"></i> Calendario menual</a>
	  <a href="'.BASE_DIR.'/calendar/do-index/m-week/" class="btn btn-default '.$class_mode['week'].'"><i class="glyphicon glyphicon-th-list"></i> Calendario semanal</a>
	  <a href="'.BASE_DIR.'/calendar/do-index/m-day/" class="btn btn-default '.$class_mode['day'].'"><i class="glyphicon glyphicon-list"></i> Calendario diario</a>
	</div>';


\calendar::structureDayCalendar( $year, $month, $day );


switch ( $mode ) {
	default:
	case 'month': // visualización del calendario ESTILO MES:
		$htmlCalendar = \calendar::htmlMonthCalendar( $year, $month );
		break;
		
	case 'week': // visualización del calendario ESTILO SEMANA:
		$htmlCalendar = \calendar::htmlWeekCalendar( $year, $month, $day );
		break;
		
	case 'day': // visualización del calendario ESTILO DÍA:
		$htmlCalendar = \calendar::htmlDayCalendar( $year, $month, $day );
		break;
}
echo $htmlCalendar;

?>		
    </div>
</div>


<?php
Schema::SchemaEnd();
?>