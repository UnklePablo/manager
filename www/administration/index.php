<?php
include '../../comuns/schema/schema.php';

Schema::SetParam( 'module', 'home' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'index' );
Schema::SetParam( 'title_pag', 'Administration' );

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
	<div class="col-xs-6">
		<div class="panel panel-default">
            <div class="panel-heading big">
                <i class="glyphicon glyphicon-user"></i> Users
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
				<a href="<?php echo BASE_DIR.'/administration/do-users/'; ?>" class="btn tip" data-tip="manage users"><i class="glyphicon glyphicon-user"></i></a>
				<a href="" class="btn tip" data-tip="users permission"><i class="glyphicon glyphicon-log-in"></i></a>
				
				<a href="" class="btn tip" data-tip="graellas"><i class="glyphicon glyphicon-th"></i></a>
				<a href="" class="btn tip" data-tip="users permission"><i class="glyphicon glyphicon-log-in"></i></a>
				
				<a href="" class="btn tip" data-tip="manage users"><i class="glyphicon glyphicon-user"></i></a>
				<a href="" class="btn tip" data-tip="users permission"><i class="glyphicon glyphicon-log-in"></i></a>
				
            </div>
            <!-- /.panel-body -->
        </div>
	</div>
	<div class="col-xs-6">
		<div class="panel panel-default">
            <div class="panel-heading big">
               <i class="glyphicon glyphicon-cog"></i> Academic
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
               
            </div>
            <!-- /.panel-body -->
        </div>

	</div>

</div>



<?php
Schema::SchemaEnd();
?>