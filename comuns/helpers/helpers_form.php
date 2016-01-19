<?php

class HelpersForm extends Helpers {

  private $html_helper;

  public function __construct () { }

  public function set_param_input ( $name, $value ) {
    if ( $name ) $this -> $name = $value;
  }
  
   public function clean_params ( ) {
    // TODO
  }

  /**
  * Helper HTML per a la creació d'un FORMULARI complert
  * Form
  * @param $action string URL del submit del formulari
  * @param $params array bidimensional amb tota la informació del formulari. Veure documentació
  */
  public function Form ( $action, $data_form ) {

      $num_columnes = count( $data_form['data']['columns'] );
      $longitut_columna = 12 / $num_columnes;

      // inici FORM ----------------
      $html = '<div class="row">
        <form class="Form form-horizontal '.$data_form['class'].'" data-toggle="validator"
             role="form" id="'.$data_form['id'].'" name="'.$data_form['name'].'">';

      foreach ( $data_form['data']['columns'] as $columna ) { // Bucle de columnes -----------

        // obertura -----------
        $html .= '<div class="col-xs-'.$longitut_columna.' '.$columna['class'].'" id="'.$columna['id'].'" name="'.$columna['name'].'">';

        $linies = $columna['lines'];
        foreach ( $linies as $linia ) {

            $type = $linia['type'];
            $nom  = $linia['nom'];

            if ( $type == 'header' ) {
              $html .= '<h3 class="sub-header">'.$nom.'</h3>';
            }
            else {

              $id       = $linia['id'];
              $value    = ( isset($linia['value']) ) ? $linia['value'] : NULL;
              $size     = ( isset($linia['size']) ) ? $linia['size'] : 9;
              $required = ( isset($linia['required']['state']) ) ? $linia['required']['state'] : false;
              $text_required = ( isset($linia['required']['text']) ) ? $linia['required']['text'] : NULL;

              $camp     = '';

              // camp requerit --------
              $mark_required = $span_required = $indicador_required = '';
              if ( $required ) {
                $indicador_required = 'required data-error="'.$text_required.'"';
                $mark_required = '<span class="required"> * </span>';
                $span_required = '<span class="help-block with-errors"></span>';
              }

              switch ( $type ) {
                  // TEXT -------------------------------
                  case 'text':
                    $camp = '<input type="text" class="form-control" id="'.$id.'" placeholder="'.$nom.'" value="'.$value.'" '.$indicador_required.'>';
                    break;

                  // NUM -------------------------------
                  case 'num':
                    $camp = '<input type="text" class="form-control text-right" id="'.$id.'" placeholder="'.$nom.'" value="'.$value.'" '.$indicador_required.'>';
                    break;

                  // TEXTAREA -----------------------------
                  case 'textarea':
                    $camp = '<textarea class="form-control" id="'.$id.'" 
                        placeholder="'.$nom.'" rows="3" '.$indicador_required.'>'.$value.'</textarea>';
                    break;
                  
                  // SELECT -------------------------------
                  case 'select':
                    $camp = '<select id="'.$id.'" class="form-control" '.$indicador_required.'>';
                    foreach ( $linia['options'] as $id_option => $option ) {

                        $type_option = $option['type'];
                        $name_option = $option['name'];

                        $sel = '';
                        if ( $value == $id_option ) $sel = 'SELECTED';

                        switch ( $type_option ) {
                            case 'option':
                              $camp .= '<option value="'.$id_option.'" '.$sel.'>'.$name_option.'</option>';
                              break;
                            case 'optgroup':
                              $camp .= '<optgroup label="'.$name_option.'" '.$sel.'></optgroup>';
                              break;
                        }
                    }
                    $camp .= '</select>';
                    break;

                  // CHECKBOX -------------------------------
                  case 'checkbox':
                    $camp = '
                      <div class="checkbox">
                      <label style="font-weight: bold;"><input type="checkbox" id="'.$id.'" name="'.$name.'" value="1">'.$nom.''. $mark_required.'</label>
                      </div>';
                    $nom = '';
                    $mark_required = '';
                    break;

                  // RADIOBUTTON ----------------------------
                  case 'radiobutton':
                     $camp = '
                      <div class="radio">
                      <label style="font-weight: bold;"><input type="radio" id="'.$id.'" name="'.$name.'" value="1">'.$nom.''. $mark_required.'</label>
                      </div>';
                    $nom = '';
                    $mark_required = '';
                    break;
              }

  
              // filera -----------------
              $size_final = 

              $html .= '
                <div class="form-group">
                  <label class="col-lg-3 control-label">'.$nom.''.$mark_required.'</label>
                  <div class="col-lg-'.$size.'">
                      '.$camp.'
                      '.$span_required.'
                  </div>
                </div>';
            }
        }
        $html .= '</div>'; // tancament columna -------------
      }
      $html .= '<div class="form-group"><button type="submit" class="btn btn-primary">Submit</button></div>
      </form></div>';
      return $html;
  }
}

