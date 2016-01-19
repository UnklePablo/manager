<?php
include 'comuns/schema/schema.php';

Schema::SetParam( 'module', 'administration' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'usuario' );
Schema::SetParam( 'title_pag', '' );

Schema::SetParam( 'submodule', 'noticies' ); // paràmetre opcional

Schema::SetParam( 'loadbd', true ); // paràmetre opcional - carregar bbdd => TRUE | FALSE
Schema::SetParam( 'loadmodalpanel', true ); // paràmetre opcional - carregar panel modal bootstrap => TRUE | FALSE
Schema::SetParam( 'permission', array('modul_admin', 'admin_noticies') ); // paràmetre opcional

Schema::SetFileJS('comuns/js/elements.js');
Schema::SetFileJS('comuns/js/elements2.js');
Schema::SetFileJS('comuns/js/elements3.js');

Schema::SchemaInit();
?>
<style>
.bs-glyphicons{margin:0 -10px 20px;overflow:hidden;}
.bs-glyphicons-list{padding-left:0;list-style:none}
.bs-glyphicons li{
	float:left;
	text-align:center;
	background-color:#f9f9f9;
}
.bs-glyphicons li a { display: block;padding:10px; border:1px solid #fff;height:115px;color:#222;font-size:14px !important;}
.bs-glyphicons .glyphicon{margin-top:5px;margin-bottom:10px;font-size:24px}
.bs-glyphicons .glyphicon-class{display:block;text-align:center;word-wrap:break-word}
.bs-glyphicons li a:hover{color:#fff;background-color:#594f8d; text-decoration: none;}

@media (min-width:768px){.bs-glyphicons{margin-right:0;margin-left:0}.bs-glyphicons li{width:12.5%;font-size:12px}}

.huge {
    font-size: 40px;
}
</style>

<div class="row">
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Nòmines i Pressupostos', 'glyphicon-tags'); ?>
    </div>
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Gestió d\'Estraescolars', 'glyphicon-pushpin'); ?>
    </div>
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Gestió de Menjador', 'glyphicon-cutlery'); ?>
    </div>
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Gestió del Transport', 'glyphicon-map-marker'); ?>
    </div>
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Tutories individualitzades', 'glyphicon-user'); ?>
    </div>
    <div class="col-lg-3 col-md-6">
	<?php echo Schema::$HelpersHTML -> PanelHeadAcces( '#a', 'Ventes i Activitats', 'glyphicon-shopping-cart'); ?>
    </div>
</div>




<?php 
Schema::SchemaEnd();
?>