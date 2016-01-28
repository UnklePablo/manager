<?php
include '../../comuns/schema/schema.php';

Schema::SetParam( 'module', 'home' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'index' );
Schema::SetParam( 'title_pag', 'Professor' );

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
<div class="row">
	<div class="col-xs-3">
		<div class="btn-block">
			<a class="btn btn-large btn-block btn-default" href=""><i class="glyphicon glyphicon-calendar"></i> Calendar</a>
		</div>
		<div class="btn-block">
			<a class="btn btn-large btn-block btn-default" href=""><i class="glyphicon glyphicon-heart"></i> My classes</a>
		</div>
		<div class="btn-block">
			<a class="btn btn-large btn-block btn-default" href=""><i class="glyphicon glyphicon-user"></i> My students</a>
		</div>
		<div class="btn-block">
			<a class="btn btn-large btn-block btn-default" href=""><i class="glyphicon glyphicon-bookmark"></i> Calendar</a>
		</div>
	</div>
	<div class="col-xs-9">
		
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="bold big"><i class="glyphicon glyphicon-check">	</i> Matemáticas</span>
					<div>Primero de primaria - Classe A</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				    <div class="pull-left">
						<a class="btn btn-xs tip big" data-tip="sessions" href=""><i class="glyphicon glyphicon-calendar"></i></a>
						<a class="btn btn-xs tip big" data-tip="students" href=""><i class="glyphicon glyphicon-user"></i></a>
						<a class="btn btn-xs tip big" data-tip="evaluate" href=""><i class="glyphicon glyphicon-ok"></i></a>
						<a class="btn btn-xs tip big" data-tip="contents" href=""><i class="glyphicon glyphicon-book"></i></a>
					</div>
					<div class="pull-right">
						<a class="btn btn-xs tip big" data-tip="students work" href=""><i class="glyphicon glyphicon-hand-up"></i></a>
						<a class="btn btn-xs tip big" data-tip="forums" href=""><i class="glyphicon glyphicon-comment"></i></a>
						<a class="btn btn-xs tip big" data-tip="notifications" href=""><i class="glyphicon glyphicon-volume-up"></i></a>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
	
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
				   <span class="bold big"><i class="glyphicon glyphicon-check">	</i> Ciencias físicas y de la naturaleza</span>
				   <div>Primero de primaria - Classe A</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				    <div class="pull-left">
						<a class="btn btn-xs tip big" data-tip="sessions" href=""><i class="glyphicon glyphicon-calendar"></i></a>
						<a class="btn btn-xs tip big" data-tip="students" href=""><i class="glyphicon glyphicon-user"></i></a>
						<a class="btn btn-xs tip big" data-tip="evaluate" href=""><i class="glyphicon glyphicon-ok"></i></a>
						<a class="btn btn-xs tip big" data-tip="contents" href=""><i class="glyphicon glyphicon-book"></i></a>
					</div>
					<div class="pull-right">
						<a class="btn btn-xs tip big" data-tip="students work" href=""><i class="glyphicon glyphicon-hand-up"></i></a>
						<a class="btn btn-xs tip big" data-tip="forums" href=""><i class="glyphicon glyphicon-comment"></i></a>
						<a class="btn btn-xs tip big" data-tip="notifications" href=""><i class="glyphicon glyphicon-volume-up"></i></a>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
		
		
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<span class="bold big"><i class="glyphicon glyphicon-check">	</i> Educación Física</span>
					<div>Primero de primaria - Classe A</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				    <div class="pull-left">
						<a class="btn btn-xs tip big" data-tip="sessions" href=""><i class="glyphicon glyphicon-calendar"></i></a>
						<a class="btn btn-xs tip big" data-tip="students" href=""><i class="glyphicon glyphicon-user"></i></a>
						<a class="btn btn-xs tip big" data-tip="evaluate" href=""><i class="glyphicon glyphicon-ok"></i></a>
						<a class="btn btn-xs tip big" data-tip="contents" href=""><i class="glyphicon glyphicon-book"></i></a>
					</div>
					<div class="pull-right">
						<a class="btn btn-xs tip big" data-tip="students work" href=""><i class="glyphicon glyphicon-hand-up"></i></a>
						<a class="btn btn-xs tip big" data-tip="forums" href=""><i class="glyphicon glyphicon-comment"></i></a>
						<a class="btn btn-xs tip big" data-tip="notifications" href=""><i class="glyphicon glyphicon-volume-up"></i></a>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
	
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
				   <span class="bold big"><i class="glyphicon glyphicon-check">	</i> Llengua catalana i literatura </span>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				    <div class="pull-left">
						<a class="btn btn-xs tip big" data-tip="sessions" href=""><i class="glyphicon glyphicon-calendar"></i></a>
						<a class="btn btn-xs tip big" data-tip="students" href=""><i class="glyphicon glyphicon-user"></i></a>
						<a class="btn btn-xs tip big" data-tip="evaluate" href=""><i class="glyphicon glyphicon-retweet"></i></a>
						<a class="btn btn-xs tip big" data-tip="contents" href=""><i class="glyphicon glyphicon-book"></i></a>
					</div>
					<div class="pull-right">
						<a class="btn btn-xs tip big" data-tip="students work" href=""><i class="glyphicon glyphicon-hand-up"></i></a>
						<a class="btn btn-xs tip big" data-tip="forums" href=""><i class="glyphicon glyphicon-font"></i></a>
						<a class="btn btn-xs tip big" data-tip="notifications" href=""><i class="glyphicon glyphicon-volume-up"></i></a>
					</div>
				</div>
				<!-- /.panel-body -->
			</div>
		</div>
		
		
		
	</div>

</div>





<?php
Schema::SchemaEnd();
?>