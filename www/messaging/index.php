<?php
include '../../comuns/schema/schema.php';

Schema::SetParam( 'module', 'home' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'index' );
Schema::SetParam( 'title_pag', 'Messaging' );

Schema::SetParam( 'submodule', 'noticies' ); // paràmetre opcional
Schema::SetParam( 'return', NULL ); // paràmetre opcional

Schema::SetParam( 'loadbd', true ); // paràmetre opcional - carregar bbdd => TRUE | FALSE
Schema::SetParam( 'loadmodalpanel', true ); // paràmetre opcional - carregar panel modal bootstrap => TRUE | FALSE
Schema::SetParam( 'permission', array('modul_admin', 'admin_noticies') ); // paràmetre opcional

Schema::SetFileJS('comuns/js/elements.js');
Schema::SetFileJS('comuns/js/elements2.js');
Schema::SetFileJS('comuns/js/elements3.js');

Schema::SchemaInit();

?>
<style>
.panel-mail {
	margin-top: 10px;
	padding: 10px;
	}
	.panel-mail:hover {
		background-color: #f7f8f9;
	}
	.new-mail {
		background-color: #f7f7f7;
		border: 1px solid #eaeaea;
	}
</style>

<div class="row">
	<div class="col-xs-2">
		<div class="panel panel-default">

            <!-- /.panel-heading -->
            <div class="panel-body">
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-plus"> </i> new message</a>
            	<hr>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-inbox"></i> Inbox</a>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-send"></i> Send</a>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-hdd"></i> Saved</a>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-trash"></i> Trash</a>
            	<hr>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-list-alt"></i> My folder 1</a>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-list-alt"></i> My folder 2</a>
            	<a href="" class="btn btn-default btn-block"><i class="glyphicon glyphicon-list-alt"></i> My folder 3</a>

            </div>
            <!-- /.panel-body -->
        </div>
	</div>
	<div class="col-xs-10">

		<div class="panel panel-default">

            <!-- /.panel-heading -->
            <div class="panel-body">


            	<div class="row">
            		<div class="col-xs-6 text-left">
						<div class="btn-group">
						  <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
						    Select <span class="caret"></span>
						  </button>

						  <ul class="dropdown-menu" role="menu">
						    <li ><a href="#">All</a></li>
						    <li ><a href="#">Read</a></li>
						    <li ><a href="#">Unread</a></li>
						    <li ><a href="#">None</a></li>
						  </ul>

						  
						</div>
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
						    Move to <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li ><a href="#"><i class="glyphicon glyphicon-hdd"></i> Saved</a></li>
						    <li ><a href="#"><i class="glyphicon glyphicon-trash"></i> Trash</a></li>
						    <li class="divider"></li>
						    <li ><a href="#">Unread</a></li>
						    <li ><a href="#">None</a></li>
						  </ul>

            		</div>
            		<div class="col-xs-6 text-right">
	            		<span class="small">Página 1 de 10</span>
		 				<div class="btn-group btn-group-sm" role="group">
			                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></button>
			                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></button>
			            </div>
			        </div>
            	</div>
            	


            	<!-- <div class="text-right">
            		<span class="small">Página 1 de 10</span>
	 				<div class="btn-group btn-group-xs" role="group">
		                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></button>
		                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></button>
		            </div>
		        </div> -->
		        <hr>


            	<div class="panel-mail new-mail">
            		<div class="row">
	            		<div class="col-xs-1 text-right" style="vertical-align: middle !important;">
	            			<div class="checkbox">
	            				<label><input type="checkbox"></label>
	            			</div>

	            		</div>
	            		<div class="col-xs-11">
	            			<div style="font-size:0.9em; color: #616262;" class="pull-left">From: <i>Pablo Muñoz</i></div>
	            			<div style="font-size:0.9em; color: #616262;" class="pull-right">Viernes 13/05/2015 12:51 pm</div>
	            			<br class="clearfix">
	            			<div style="font-size:1.1em; font-weight:bold;">
	            				Este es el título del mail 
	            				<i class="glyphicon glyphicon-star paddingLeft1"> </i>
	            				<i class="glyphicon glyphicon-paperclip paddingLeft1"> </i>
	            				
	            			</div>
	            			<div>
	            				<button type="button" class="btn btn-xs btn-warning"> new</button>
	            				<button type="button" class="btn btn-xs btn-info"> task</button>
	            				<button type="button" class="btn btn-xs btn-danger"> danger</button>
	            				Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet...
	            			</div>
	            		</div>
	            	</div>
            	</div>


            	<div class="panel-mail">
            		<div class="row">
	            		<div class="col-xs-1 text-right" style="vertical-align: middle !important;">
	            			<div class="checkbox">
	            				<label><input type="checkbox"></label>
	            			</div>

	            		</div>
	            		<div class="col-xs-11">
	            			<div style="font-size:0.9em; color: #616262;" class="pull-left">From: <i>Pablo Muñoz</i></div>
	            			<div style="font-size:0.9em; color: #616262;" class="pull-right">Viernes 13/05/2015 12:51 pm</div>
	            			<br class="clearfix">
	            			<div style="font-size:1.1em; font-weight:bold;">Este es el título del mail </div>
	            			<div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet...</div>
	            		</div>
	            	</div>
            	</div>

            	<div class="panel-mail">
            		<div class="row">
	            		<div class="col-xs-1 text-right" style="vertical-align: middle !important;">
	            			<div class="checkbox">
	            				<label><input type="checkbox"></label>
	            			</div>

	            		</div>
	            		<div class="col-xs-11">
	            			<div style="font-size:0.9em; color: #616262;" class="pull-left">From: <i>Pablo Muñoz</i></div>
	            			<div style="font-size:0.9em; color: #616262;" class="pull-right">Viernes 13/05/2015 12:51 pm</div>
	            			<br class="clearfix">
	            			<div style="font-size:1.1em; font-weight:bold;">Este es el título del mail </div>
	            			<div>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet...</div>
	            		</div>
	            	</div>
            	</div>


            	<div class="panel-mail">
            		<div class="row">
	            		<div class="col-xs-1 text-right" style="vertical-align: middle !important;">
	            			<div class="checkbox">
	            				<label><input type="checkbox"></label>
	            			</div>

	            		</div>
	            		<div class="col-xs-11">
	            			<div style="font-size:0.9em; color: #626262;" class="pull-left">From: <i>Pablo Muñoz</i></div>
	            			<div style="font-size:0.9em; color: #626262;" class="pull-right">Viernes 13/05/2015 12:51 pm</div>
	            			<br class="clearfix">
	            			<div style="font-size:1.1em; font-weight:bold;">Este es el título del mail </div>
	            			<div style="color:#626262;">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet...</div>
	            		</div>
	            	</div>
            	</div>

            </div>
            <!-- /.panel-body -->
        </div>

	</div>

</div>

<?php
Schema::SchemaEnd();
?>
