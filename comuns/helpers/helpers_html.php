<?php

class HelpersHTML extends Helpers {

  private $html_helper;

  public function __construct () { }

  public function set_param_input ( $name, $value ) {
    if ( $name ) $this -> $name = $value;
  }
  
   public function clean_params ( ) {
    // TODO
  }

  public function input ( $input_type ) {
    
    $disabled = $readonly = '';
    if ( $this -> disabled ) $disabled = 'disabled';
    if ( $this -> readonly ) $readonly = 'readonly';

    if ( $input_type == 'text' ) { // TEXT
	   $this -> html_helper .= '<input type="text" class="span4 '.$this -> classe.' '.$disabled.' '.$readonly.'" id="'.$this -> id.'" name="'.$this -> name.'" value="'.$this -> value.'" '.$readonly.' '.$disabled.'>';
    }
    elseif ( $input_type == 'textarea' ) { // TEXTAREA
	   $this -> html_helper .= '<textarea class="span4 '.$disabled.'" id="'.$this -> id.'" name="'.$this -> name.'" '.$disabled.'>'.$this -> value.'</textarea>';
    }
    elseif ( $input_type == 'radio' || $input_type == 'radiobutton' ) { // RADIOBUTTON
	   $this -> html_helper .= '<input type="radio"  name="'.$name.'"> '.$label;
    }
    elseif ( $input_type == 'check' || $input_type == 'checkbox' ) { // CHECKBOX
	   $this -> html_helper .= '<input type="checkbox"> '.$label;
    }
    elseif ( $input_type == 'select' ) {

  	   $this -> html_helper .= '
    	  <select class="">
    	    <option value="1">la la la</option>
    	    <option value="2">la la la</option>
    	    <option value="3">la la la</option>
    	    <option value="4">la la la</option>
    	  </select>';
    }
    elseif ( $input_type == 'button' ) { // BUTTON
    	$this -> html_helper .= '
    	  <button class="btn btn-inverse btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-group btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-info btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-success btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-danger btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-warning btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>
    	  <button class="btn btn-primary btn-large" name="'.$name.'" id="'.$id.'" type="button">'.$label.'</button>';
    }

    if ( $this -> help_block ) {
     $this -> html_helper .= '<p class="help-block">'.$this -> help_block.'</p>';
    }
    return $this -> html_helper;
  }



  public function PanelHeadAcces ( $url, $title, $icon, $options = array() ) {
      if ( isset($options) ) {
        // target - blank:
        $page_blank = ( isset($options['target_blank']) and $options['target_blank'] == true ) ? 'target="_blank"' : '';
      }

      $html = '
        <div class="panel-head-acces">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="glyphicon '.$icon.'"></i>
              </div>
              <div class="col-xs-9 text-right"><div>'.$title.'</div></div>
            </div>
          </div>
          <a href="#" '.$page_blank.'>
            <div class="panel-footer">
              <span class="pull-left">Acceder</span>
              <span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>';
      return $html;
  }
}

