<?php
include 'comuns/helpers/helpers_html.php';
include 'comuns/helpers/helpers_form.php';

class Helpers {

  public function __construct() { }

  /* ************************ Getters de POST / GET ******************************** */
  public static function filter_integer ( $name, $filter_type = INPUT_POST ) {
    return filter_input( $filter_type, $name, FILTER_SANITIZE_NUMBER_INT );
  }

  public static function filter_float ( $name, $filter_type = INPUT_POST ) {
    return filter_input( $filter_type, $name, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND );
  }

  public static function filter_string ( $name, $filter_type = INPUT_POST ) {
     return addslashes( filter_input( $filter_type, $name, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES) );
  }
  

  /* ************************ Redirects ******************************** */
  public static function redirect ( $msg, $url ) {
      ?>
      <script>
        <?php if ( $msg ) ?> alert ( "<?php echo $msg; ?>");
        window.location.href = "<?php echo $url; ?>";
      </script>
      <?php
      exit();
  }
}

  /*function _($string) {
    return $string;
  }*/
?>