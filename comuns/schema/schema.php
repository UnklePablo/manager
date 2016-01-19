<?php
error_reporting(E_ALL);

define ( 'DEBUG_PLATAFORM', true );
define ( 'BASE_DIR', "http://server3/__currantes/pm/manager/" );

chdir ( 'D:\clickedu\__currantes\pm\manager' );

//include 'modules/module.php'; // moduls -
include 'comuns/config/config.php'; // config - 
include 'comuns/bd/bd.php'; // bbdd -
include 'comuns/tools/tools.php'; // tools - 
include 'comuns/helpers/helpers.php'; // helpers -


include (BASE_DIR.'/dist/inc/gettext.inc');
$lang        = "es_ES"; // Idioma
$text_domain = "clickedu_v3"; // Dominio
// Dependiendo de tu OS putenv/setlocale configurarán tu idioma.
putenv("LC_ALL=".$lang);
setlocale(LC_ALL, $lang);
T_setlocale(LC_MESSAGES, $lang);

bindtextdomain( $text_domain, BASE_DIR."comuns/lang" ); // La ruta a los archivos de traducción
bind_textdomain_codeset( $text_domain, 'UTF-8'); // codificación

textdomain($text_domain);



/*  *******************INI Carregador del mòdul********************** */
function my_loader_class($clase) {
    //echo 'DDDD'.$clase;
    include 'modules/controller/'.$clase.'.module.php';
}
spl_autoload_register('my_loader_class');
/*  ******************FI Carregador del mòdul************************ */

class Schema {

  protected static $title_head; // títol del head de la pàgina
  protected static $title_pag;  // títol de la pàgima
  protected static $module; // nom del mòdul actiu (aquesta variable també serveix per a carregar la class mòdul i l'idioma.
  protected static $submodule; // nom del submòdul actiu - opcional

  protected static $lang; // idioma: ca, es, en, fr

  //js
  private static $ContentJS;
  private static $FilesJS;

  protected static $loadbd     = true; // carregar la connexió a base de dades: true | false
  protected static $loadmodalpanel = true; // carregar el panell modal: true | false
  protected static $permission = array(); // array de permisos necessaris per accedir a la pàgina
  protected static $return = array(); // array de permisos necessaris per accedir a la pàgina

  protected static $load_diccio_basic  = true; // boolean que indica si carreguem el diccionari bàsic
  protected static $load_diccio_module = true; // boolean que indica si carreguem el diccionari bàsic

  public static $ObjModule;
  public static $MysqlDB;
  public static $Tools;
  public static $Helpers;
  //public static $HelpersHTML;
  public static $HelpersForm;

  // elements bàsics
  protected static $sidebar;
  protected static $topbar;

  // variables de debug
  protected static $init_time_load_page;
  protected static $end_time_load_page;

  /**
   * Mostrem un troç HTML
   */
  private function ElementSchemaHTML( $element ) {
      @include 'comuns/schema/view/'.$element.'.php';
  }

  public function SetParam( $param_name, $param_value ) {
     self::${$param_name} = $param_value;
  }

  public function GetParam( $param_name ) {
    return self::${$param_name};
  }

  /**
   * Realitzar una acció concreta
   */
  private function DoAction( $do ) {

      if ( $do == 'load::bd' && self::$loadbd ) { // Carreguem la class BBDD
	       self::$MysqlDB = new MysqlDB( BBDD_HOST, BBDD_USERNAME, BBDD_PASSWORD, BBDD_DB );
      }
      elseif ( $do == 'close:bd' && self::$loadbd ) { // Eliminem i tanquem la connexió a la bbdd
	       self:: $MysqlDB -> close_connection();
      }
      elseif ( $do == 'set::lang' ) { // Carreguem l'idioma
	       self::$lang = 'ca';
      }
      elseif ( $do == 'load::tools' ) { // Carreguem les eines de desenvolupament
	       self::$Tools = new Tools();
      }
      elseif ( $do == 'load::helpers' ) { // Carreguem els helpers
	       self::$Helpers     = new Helpers();
         //self::$HelpersHTML = new HelpersHTML();
	       self::$HelpersForm = new HelpersForm();
      }
      elseif ( $do == 'load::model' ) {
         include 'comuns/schema/model/structure.php'; // elements structure -
      }
      elseif ( $do == 'verify::permission' and count(self::$permission) > 0 ) { // permissos
    	  //TODO
    	 /* ?>
    	   <script type="text/javascript"> alert ( 'No disposses de permisos per accedir' ); window.location.href='index.php'; </script>
    	  <?php
    	  exit();*/
      }
      elseif ( $do == 'allow::memory' ) {
	       //TODO
       // unset ( self::$permission );
       // unset ( self::$Tools );
       // unset ( self::$Helpers );
       // unset ( self::$HelpersHTML );
      }
      elseif ( $do == 'start::session' ) { // Iniciem la session
    	  set_time_limit(1800);

    	  $cache_expire    = 65; // 65 minuts
    	  $cookie_lifetime = $cache_expire * 60; // 65 minuts, 3900 segons
    	  $gc_maxlifetime  = $cookie_lifetime + 300; // 70 minuts, 4200 segons

    	  $vars_sessio['session.gc_probability'][1] = 1;
    	  $vars_sessio['session.gc_divisor'][1]     = 100;
    	  $vars_sessio['session.gc_maxlifetime'][1] = $gc_maxlifetime;
    	  //Cache
    	  $vars_sessio['session.cache_expire'][1]  = $cache_expire;
    	  $vars_sessio['session.cache_limiter'][1] = 'private, must-revalidate';

    	  session_start(); // inici de la session
      }
  }

  /******** start de la pàgina ************* */
  public function SchemaStart() {

      self::DoAction('load::tools'); // carreguem les eines de desenvolupament
      self::DoAction('load::helpers'); // carreguem els helpers
      self::DoAction('load::model'); // carreguem el model

      self::DoAction('start::session'); // iniciem la sessión

      if ( DEBUG_PLATAFORM ) self::_init_debug();
      
      // accions ---------------------
      self::DoAction('load::bd'); // iniciem la connexió a bbdd
      self::DoAction('set::lang'); // busquem l'idioma de la plataforma
      self::DoAction('verify::permission'); // verifiquem que l'usuari en accés tingui els permisos adients

      self::ElementSchemaLang(); // diccionari

      // TMP
      //self::$ObjModule = new self::$module();
  }

  /******** inici de la pàgina ************* */
  public function SchemaInit() {

      self::ElementSchemaHTML('header'); // header <HTML> <HEAD>
      self::ElementSchemaHTML('menu');   // <ul><li> menú
      self::ElementSchemaHTML('init');   // div contenidors
  }

  /******** fi de la pàgina ************* */
  public function SchemaEnd() {

      if ( self::$loadmodalpanel ) self::ElementSchemaHTML('modal-panel'); // panel modal de help / altres usos.
      self::ElementSchemaHTML('closing'); // tancament div contenidors
      self::ElementSchemaJS();

      self::ElementSchemaHTML('footer'); // peu de pàgina

      if ( DEBUG_PLATAFORM ) self::_do_debug();
     
      self::DoAction('allow::memory'); // alliberem memòria en ús

      // accions ---------------------
      self::DoAction('close::bd'); // tancament i destrucció de la connexió a bbdd
  }


  /**
  *
  */
  public function SetFileJS( $url_file ) {
      self::$FilesJS[] = $url_file;
  }

  public function ElementSchemaJS() {
    $str = '';

    self::$ContentJS .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
    self::$ContentJS .= '<script src="'.BASE_DIR.'dist/js/bootstrap.min.js"></script>';
    self::$ContentJS .= '<link rel="stylesheet" type="text/css" href="'.BASE_DIR.'dist/js/tipr/tipr.css">';
    self::$ContentJS .= '<script src="'.BASE_DIR.'dist/js/tipr/tipr.min.js"></script>';
    self::$ContentJS .= '<script src="'.BASE_DIR.'dist/js/validator.min.js"></script>';
    self::$ContentJS .= '<script src="'.BASE_DIR.'dist/js/jquery-bootstrap-modal-steps.js"></script>';

    
    self::$ContentJS .= '<script src="'.BASE_DIR.'comuns/schema/view/js/javascript.js"></script>';
    if ( count( self::$FilesJS ) > 0 ) {
      	foreach ( self::$FilesJS as $file_js ) {
      	  self::$ContentJS .= '<script src="'.$file_js.'"></script>';
      	}
     }
  }



  

  public function GetSchemaJS() {
      return self::$ContentJS;
  }


  /**
   * Selecció de l'idioma - Idioma bàsic, idioma del mòdul i idioma del submòdul
   */
  public function ElementSchemaLang() {
  
     $lang_basic     = 'comuns/lang/basic_'.self::$lang.'.lang.php';
     $lang_module    = 'comuns/lang/modules/'.self::$module.'_'.self::$lang.'.lang.php';
     $lang_submodule = 'comuns/lang/submodules/'.self::$submodule.'_'.self::$lang.'.lang.php';

     if ( self::$load_diccio_basic && file_exists( $lang_basic ) ) {
	     // Carreguem el diccionari bàsic segons idioma
	     include $lang_basic;
     }
     if ( self::$module && self::$load_diccio_module && file_exists( $lang_module ) ) {
	     // carreguem el diccionari del mòdul segons idioma
	     include $lang_module;
     }
     if ( self::$submodule and file_exists( $lang_submodule ) ) {
	     include $lang_submodule;
     }
  }



  /* ********************************************************************** */
  /* ********************************************************************** */
  /* ************************************** funcions de debug ************* */
  private function _init_debug() {
      self::$init_time_load_page = self::$Tools -> microtime_float();
  }

  private function _do_debug() {
      self::$end_time_load_page =  self::$Tools -> microtime_float();
      $time_execution_page      = round( self::$end_time_load_page - self::$init_time_load_page, 5 );
      
      echo '<div style="padding:7px; margin:10px; width:50%; float:right; border: 1px solid #C0C0C0; font-size:10px;">';
    	 echo '<div style="background-color:#f7714d; color: #FEFEFE; padding: 5px 10px; font-weight: bold;">DEBUG:</div>';

       // Temps execució pàgina --------------------------------------
       $result = '<span class="glyphicon glyphicon-ok"></span>';
       if ( $time_execution_page >= 1 ) $result = '<span class="glyphicon glyphicon-remove"></span>';
	     echo '<div><strong>Temps Execució de la pàgina:</strong> '.$time_execution_page.' seg. '.$result.'</div>';

       // Querys --------------------------------------
       $result = '<span class="glyphicon glyphicon-ok"></span>';
       if ( self::$MysqlDB -> get_count_querys() >= 500 ) $result = '<span class="glyphicon glyphicon-remove"></span>';
       echo '<div><strong>Número de querys executades:</strong> '.self::$MysqlDB -> get_count_querys().' '.$result.'</div>';

      // Memòria --------------------------------------
       $result = '<span class="glyphicon glyphicon-ok"></span>';
       if ( memory_get_usage(true) >= 1000000 ) $result = '<span class="glyphicon glyphicon-remove"></span>';
	     echo '<div><strong>Memòria utilitzada: </strong>'. self::$Tools -> convert_size( memory_get_usage(true) ).' '.$result.'</div>';

      echo '</div>';




  }
}