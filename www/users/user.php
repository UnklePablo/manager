<?php
chdir('../');
include '../comuns/schema/schema.php';

Schema::SetParam( 'module', 'administration' );
Schema::SchemaStart();

Schema::SetParam( 'title_head', 'usuario' );
Schema::SetParam( 'title_pag', 'Editar usuario' );

Schema::SetParam( 'submodule', 'noticies' ); // paràmetre opcional

Schema::SetParam( 'loadbd', false ); // paràmetre opcional - carregar bbdd => TRUE | FALSE
Schema::SetParam( 'loadmodalpanel', true ); // paràmetre opcional - carregar panel modal bootstrap => TRUE | FALSE
Schema::SetParam( 'permission', array('modul_admin', 'admin_noticies') ); // paràmetre opcional

Schema::SetFileJS('comuns/js/elements.js');
Schema::SetFileJS('comuns/js/elements2.js');
Schema::SetFileJS('comuns/js/elements3.js');

Schema::SchemaInit();



Tools::pre_array( $_GET );
/*
$id     = Helpers::filter_integer('id', INPUT_GET);
if ( !$id ) {
	Helpers::redirect( 'AAA', 'http://www.google.cat');
}*/


$data_form = array();
$data_form['id']    = 'id'; // id del formulari
$data_form['name']  = 'name'; // name del formular
$data_form['class'] = 'class'; // class afegides

$data_form['data']['columns'][1]['name']   = '';
$data_form['data']['columns'][1]['id']     = '';
$data_form['data']['columns'][1]['class']  = '';
$data_form['data']['columns'][1]['lines'][0]['nom']   = _('Datos básicos');
$data_form['data']['columns'][1]['lines'][0]['type']  = 'header'; // header | text | email | select | checkbox | radiobutton | textarea | num

$data_form['data']['columns'][1]['lines'][1]['nom']   = _('Nombre');
$data_form['data']['columns'][1]['lines'][1]['type']  = 'text';
$data_form['data']['columns'][1]['lines'][1]['id']    = 'name';
$data_form['data']['columns'][1]['lines'][1]['size']  = '8'; //1 - 9
$data_form['data']['columns'][1]['lines'][1]['value'] = 'Olivia';
$data_form['data']['columns'][1]['lines'][1]['required']['state'] = true;
$data_form['data']['columns'][1]['lines'][1]['required']['text'] = 'Alerta! El campo nombre es requerido';

$data_form['data']['columns'][1]['lines'][2]['nom']   = _('Primer apellido');
$data_form['data']['columns'][1]['lines'][2]['type']  = 'text';
$data_form['data']['columns'][1]['lines'][2]['id']    = 'surname1';
$data_form['data']['columns'][1]['lines'][2]['size']  = '8'; //1 - 9
$data_form['data']['columns'][1]['lines'][2]['value'] = 'Muñoz';
$data_form['data']['columns'][1]['lines'][2]['required']['state'] = true;
$data_form['data']['columns'][1]['lines'][2]['required']['text'] = 'Alerta! El campo primer apellido es requerido';

$data_form['data']['columns'][1]['lines'][3]['nom']   = _('Segundo apellido');
$data_form['data']['columns'][1]['lines'][3]['type']  = 'text';
$data_form['data']['columns'][1]['lines'][3]['id']    = 'surname2';
$data_form['data']['columns'][1]['lines'][3]['size']  = '8'; //1 - 9
$data_form['data']['columns'][1]['lines'][3]['value'] = 'Dunham';

$data_form['data']['columns'][1]['lines'][4]['nom']   = _('Datos de usuario');
$data_form['data']['columns'][1]['lines'][4]['type']  = 'header'; // header | text | email | select | checkbox | radiobutton | textarea | num

$data_form['data']['columns'][1]['lines'][5]['nom']   = _('Usuario');
$data_form['data']['columns'][1]['lines'][5]['type']  = 'text';
$data_form['data']['columns'][1]['lines'][5]['id']    = 'username';
$data_form['data']['columns'][1]['lines'][5]['size']  = '8'; //1 - 9
$data_form['data']['columns'][1]['lines'][5]['value'] = 'Olivia';
$data_form['data']['columns'][1]['lines'][5]['required']['state'] = true;
$data_form['data']['columns'][1]['lines'][5]['required']['text'] = 'Alerta! El campo nombre es requerido';

$data_form['data']['columns'][1]['lines'][6]['nom']   = _('Contraseña');
$data_form['data']['columns'][1]['lines'][6]['type']  = 'text';
$data_form['data']['columns'][1]['lines'][6]['id']    = 'password';
$data_form['data']['columns'][1]['lines'][6]['size']  = '8'; //1 - 9
$data_form['data']['columns'][1]['lines'][6]['value'] = 'Muñoz';
$data_form['data']['columns'][1]['lines'][6]['required']['state'] = true;
$data_form['data']['columns'][1]['lines'][6]['required']['text'] = 'Alerta! El campo primer apellido es requerido';

$data_form['data']['columns'][1]['lines'][3]['nom']  = 'Curs';
$data_form['data']['columns'][1]['lines'][3]['type'] = 'select';
$data_form['data']['columns'][1]['lines'][3]['id']   = 'id_cursos';
$data_form['data']['columns'][1]['lines'][3]['options'] = array( 
  '' => '---', 
  1 => array( 'type' => 'optgroup', 'name' => 'OptGroup Name. 1'),
  2 => array( 'type' => 'option', 'name' => 'Opció 2'),
  3 => array( 'type' => 'option', 'name' => 'Opció 3')
  );
$data_form['data']['columns'][1]['lines'][3]['value'] = 2;

$data_form['data']['columns'][1]['lines'][4]['nom']   = 'Tipus';
$data_form['data']['columns'][1]['lines'][4]['type']  = 'textarea';
$data_form['data']['columns'][1]['lines'][4]['id']    = 'text';
$data_form['data']['columns'][1]['lines'][4]['value'] = 'Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.';


$data_form['data']['columns'][1]['lines'][5]['nom']   = 'Esto es un título';
$data_form['data']['columns'][1]['lines'][5]['type']  = 'header';
/*
$data_form['data']['columns'][1]['lines'][5]['nom']   = 'Esto es un radiobutton';
$data_form['data']['columns'][1]['lines'][5]['type']  = 'radiobutton';
$data_form['data']['columns'][1]['lines'][5]['id']    = 'text';
$data_form['data']['columns'][1]['lines'][5]['value'] = 2;
*/
$data_form['data']['columns'][1]['lines'][6]['nom']  = 'Curs';
$data_form['data']['columns'][1]['lines'][6]['type'] = 'text';
$data_form['data']['columns'][1]['lines'][6]['id']   = 'text';

$data_form['data']['columns'][1]['lines'][7]['nom']  = 'Tipus';
$data_form['data']['columns'][1]['lines'][7]['type'] = 'text';
$data_form['data']['columns'][1]['lines'][7]['id']   = 'text';
$data_form['data']['columns'][1]['lines'][7]['required']['state'] = true;
$data_form['data']['columns'][1]['lines'][7]['required']['text'] = 'Alerta! Este campo es requerido.';

$data_form['data']['columns'][1]['lines'][8]['nom']  = 'Codi oficial';
$data_form['data']['columns'][1]['lines'][8]['type'] = 'num';
$data_form['data']['columns'][1]['lines'][8]['id']   = 'text';
$data_form['data']['columns'][1]['lines'][8]['size'] = '2';

$data_form['data']['columns'][1]['lines'][9]['nom']  = 'Bla bla bla';
$data_form['data']['columns'][1]['lines'][9]['type'] = 'num';
$data_form['data']['columns'][1]['lines'][9]['id']   = 'text';
$data_form['data']['columns'][1]['lines'][9]['size'] = '4';


$data_form['data']['columns'][2]['name']   = '';
$data_form['data']['columns'][2]['id']     = '';
$data_form['data']['columns'][2]['class']  = '';



$data_form['data']['columns'][2]['lines'][0]['nom']   = 'Adreces <small>de l\'alumne</small>';
$data_form['data']['columns'][2]['lines'][0]['type']  = 'header'; // header | text | email | select | checkbox | radiobutton | textarea | num

$data_form['data']['columns'][2]['lines'][1]['nom']   = 'Nom';
$data_form['data']['columns'][2]['lines'][1]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][1]['id']    = 'v_nom';
$data_form['data']['columns'][2]['lines'][1]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][1]['value'] = 'Olivia';
$data_form['data']['columns'][2]['lines'][1]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][1]['required']['text'] = 'El campo nombre es requerido';

$data_form['data']['columns'][2]['lines'][2]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][2]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][2]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][2]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][2]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][2]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][2]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][3]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][3]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][3]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][3]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][3]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][3]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][3]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][4]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][4]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][4]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][4]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][4]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][4]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][4]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][5]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][5]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][5]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][5]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][5]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][5]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][5]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][6]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][6]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][6]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][6]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][6]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][6]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][6]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][7]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][7]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][7]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][7]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][7]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][7]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][7]['required']['text'] = 'El campo apellido 1 es requerido';

$data_form['data']['columns'][2]['lines'][8]['nom']   = 'Primer cognom';
$data_form['data']['columns'][2]['lines'][8]['type']  = 'text';
$data_form['data']['columns'][2]['lines'][8]['id']    = 'v_cognom1';
$data_form['data']['columns'][2]['lines'][8]['size']  = '9'; //1 - 10
$data_form['data']['columns'][2]['lines'][8]['value'] = 'Dunham';
$data_form['data']['columns'][2]['lines'][8]['required']['state'] = true;
$data_form['data']['columns'][2]['lines'][8]['required']['text'] = 'El campo apellido 1 es requerido';

echo Schema::$HelpersForm -> Form('action', $data_form);




Schema::SchemaEnd();
