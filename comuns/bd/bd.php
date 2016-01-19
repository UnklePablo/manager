<?php
define ( "DEFAULT_VALUE_RESULTTYPE", MYSQLI_ASSOC );
define ( "DEFAULT_VALUE_CONVERTARRAY", true );
define ( "DEFAULT_VALUE_DICCIONARI", true );
define ( "DEFAULT_VALUE_ELEMENTKEY", '' );
define ( "DEFAULT_VALUE_SHOWERRORS", true );
define ( "DEFAULT_VALUE_RETURNIDINSERTUPDATE", true );

class MysqlDB {
	private $host;
	private $user;
	private $pwd;
	private $port;
	private $db;
	
	private $resource;
	
	/* paràmetres *** */
	protected $resulttype   = DEFAULT_VALUE_RESULTTYPE;
	protected $convertarray = DEFAULT_VALUE_CONVERTARRAY;
	protected $diccionary   = DEFAULT_VALUE_DICCIONARI;
	protected $elementkey   = DEFAULT_VALUE_ELEMENTKEY;
	protected $showerrors   = DEFAULT_VALUE_SHOWERRORS;
	protected $returnid_insertupdate = DEFAULT_VALUE_RETURNIDINSERTUPDATE;

	private $count_querys = 0;


	public function __construct ( $host, $user, $pwd, $db, $port = null ) {

		$this -> host = $host;
		$this -> user = $user;
		$this -> pwd  = $pwd;
		$this -> db   = $db;
		$this -> port = $port;
		
		$this -> resource = new mysqli( $this -> host, $this -> user, $this -> pwd, $this -> db );
		if ( $this -> resource -> connect_errno ) {
			echo "Error de connexió a la Base de Dades [ERR-BD".date("d/m/Y")."] " . $this -> resource -> connect_error;
			exit();
		}
	}
	
	function __destruct ( ) {
		$this -> resource -> close();
	}

	function close_connection () {
	    $this -> resource -> close();
	}
	
	function get_count_querys () {
	    return $this -> count_querys;
	}

	// /////////////////////////////////////////PARÀMETRES//////////////////////////////////////////
	// /////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Carregar els paràmetres de les accions / funcions de query
	 * @param string $param_name
	 * @param string $param_value
	 */
	public function load_param ( $param_name, $param_value ) {
		$this -> $param_name = $param_value;
	}
	/**
	 * Re-Inicialitzem els paràmetres
	 */
	public function clean_params ( ) {
		$this -> resulttype   = DEFAULT_VALUE_RESULTTYPE;
		$this -> convertarray = DEFAULT_VALUE_CONVERTARRAY;
		$this -> diccionary   = DEFAULT_VALUE_DICCIONARI;
		$this -> elementkey   = DEFAULT_VALUE_ELEMENTKEY;
		$this -> showerrors   = DEFAULT_VALUE_SHOWERRORS;
		$this -> returnid_insertupdate = DEFAULT_VALUE_RETURNIDINSERTUPDATE;
	}
	// //////////////////////////////////////////////////////////////////////////////////////////////
	// //////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	// /////////////////////////////////////////QUERY///////////////////////////////////////////////
	// /////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * 
	 * @param string $sql SQL
	 * @return Ambigous $result Resultat de la query. Pot ser array o objecte, depenent els paràmetres
	 */
	public function query ( $sql ) {
		
		if ( DEBUG_PLATAFORM ) { $time_inici = explode(" ", microtime() ); $time_inici = $time_inici[1] + $time_inici[0]; }

		// Query -------
		$result_query = $this -> resource -> query ( $sql );
		
		if ( DEBUG_PLATAFORM ) { 
			$time_fi = explode(" ",microtime() );
			$time_fi = $time_fi[1] + $time_fi[0];
			$temps_exec = $time_fi - $time_inici;
			if ( $temps_exec > 0.004 ) {
			    echo '<div style="padding:7px; margin:10px; border: 1px solid #C0C0C0;">';
			      echo '<div style="background-color:#AF033B; color: #FEFEFE; padding: 5px 10px;"><em>La següent query s\'ha executat en un temps de '.$temps_exec.' seg.:</em></div>';
			      echo '<div>'.nl2br ( $sql ).'</div>';
			    echo '</div>';
			}
		}
		$result       = $this -> _after_query( $result_query );
		
		++$this -> count_querys;
		$result_query -> free();
		return $result;
	}
	
	public function execute ( $sql ) {
		$result_query = $this -> resource -> query ( $sql );
		$result_query -> free();
	}
	
	protected function _after_query ( $result ) {
		
		$result_after_query = array();
		
		if ( $this -> convertarray ) {
			// convertim el resultat de la query (objecte) en un array indexable que es pugui recòrrer:
			while( $fila = $result -> fetch_array( $this -> resulttype ) ) {
				if ( $this -> elementkey != '' ) {
					// indexem l'array retorn pel valor d'un dels elements de la consulta
					$element = '';
					foreach ( $fila as $name_element => $value_element ) {
						// busquem un camp que tingui de nom el valor de $elemenkey que hem pasat per paràmetre
						if ( $name_element == $this -> elementkey ) { $element = $value_element; break; }
					}
					$result_after_query[ $element ] = $fila;
				}
				else {
					// index autoincremental "natural". Sense tractament. Valors de la key 0, 1, 2, 3, ...
					$result_after_query[] = $fila;
				}
			}
		}
		else {
			// no volem cap tractament de l'objecte resultat de query per a obtenir el resultat.
			$result_after_query = $result;
		}
		return $result_after_query;
	}
	// ///////////////////////////////////////////////////////////////////////////////////////////////
	// //////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	// /////////////////////////////////////////INSERT///////////////////////////////////////////////
	// /////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Insert!
	 * @param string $table_name nom de la taula
	 * @param array multiple $values array multiple
	 */
	public function insert ( $table_name, $values ) {

		// noms dels camps ----------------
		$nom_camps  = array_keys( $values );
		// noms dels valors ---------------
		$str_values = $this -> _prepare_insert( $values );
		
		if ( $str_values and $nom_camps ) { // control de dades
			// muntatge final de la query
			$sql_insert = 'INSERT INTO '.$table_name.' ('.implode(',',$nom_camps ).') VALUES '.$str_values;
			//$resultat   = $this -> resource -> query ( $sql_insert );
			//$id         = $this -> resource -> insert_id;
		}
		if ( $this -> returnid_insertupdate ) return $id;
		echo $sql_insert;
	}
	
	/**
	 * 
	 * @param string $table_name
	 * @param array multiple $values array multiple
	 */
	public function insert_multiple ( $table_name, $values ) {
		$index      = 0;
		$str_values = $sep   = '';
		foreach ( $values as $linia_value ) {
			if ( $index == 0 ) {
				// noms dels camps ----------------
				$nom_camps  = array_keys( $linia_value );
			}
			$str_values .= $sep.'('.$this -> _prepare_insert( $linia_value ).')';
			$sep         = ', ';
			$index++;
		}
		
		if ( $str_values and $nom_camps ) { // control de dades
			// muntatge final de la query
			$sql_insert = 'INSERT INTO '.$table_name.' ('.implode(',',$nom_camps ).') VALUES '.$str_values;
			//$resultat   = $this -> resource -> query ( $sql_insert );
			//$id         = $this -> resource -> insert_id;
		}
		if ( $this -> returnid_insertupdate ) return $id;
		echo $sql_insert;
	}
	
	/**
	 * Tractament de l'array de valors
	 * @param array $line_value
	 * @return string
	 */
	protected function _prepare_insert ( $line_value ) {
		$array_values = array();
		foreach( $line_value as $nom_camp => $registre ) {
			if ( is_null( $registre ) )       $array_values[] = 'NULL';
			elseif ( is_string( $registre ) ) $array_values[] = '"'. $this -> resource -> real_escape_string ( $registre ).'"';
			else 				              $array_values[] = $registre;
		}
		if ( count ( $array_values ) > 0 ) $str_values = implode (',', $array_values );
		return $str_values;
	}
	// ///////////////////////////////////////////////////////////////////////////////////////////////
	// //////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	// /////////////////////////////////////////UPDATE///////////////////////////////////////////////
	// /////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * 
	 * @param string $table_name nom de la taula
	 * @param string $column_name_id nom de la columna que ha de servir
	 * @param array $values Array de valors a fer l'update
	 */
	public function update ( $table_name, $column_name_id, $values ) {
	
		// noms dels camps ----------------
		$nom_camps  = array_keys( $values );
		// noms dels valors ---------------
		$prepare_update = $this -> _prepare_update( $column_name_id, $values );
		$str_where      = $prepare_update['str_where'];
		$str_set        = $prepare_update['str_set'];
	
		if ( $str_set and $str_where ) { // control de dades
			// muntatge final de la query
			$sql_update = 'UPDATE '.$table_name.' SET '.$str_set.' WHERE '.$str_where;
			//$resultat   = $this -> resource -> query ( $sql_update );
			//$id         = $this -> resource -> insert_id;
		}
		if ( $this -> returnid_insertupdate ) return $id;
		echo $sql_update;
	}
	
	protected function _prepare_update ( $column_name_id, $line_value ) {
		$array_values = array();
		$str_where = $str_set = '';
		
		foreach( $line_value as $nom_camp => $registre ) {
			if ( trim ( $column_name_id ) == trim ( $nom_camp ) ) {
				$str_where =  $nom_camp.' = '.$registre;
			}
			else {
				if ( is_null( $registre ) )       $array_values[] = $nom_camp.' = NULL';
				elseif ( is_string( $registre ) ) $array_values[] = $nom_camp.' = "'. $this -> resource -> real_escape_string ( $registre ).'"';
				else 				              $array_values[] = $nom_camp.' = '.$registre; 
			}		
		}
		if ( count ( $array_values ) > 0 ) $str_set = implode (', ', $array_values );
		$array_retorn = array();
		$array_retorn['str_where'] = $str_where;
		$array_retorn['str_set']   = $str_set;
		return $array_retorn;
	}
	// ///////////////////////////////////////////////////////////////////////////////////////////////
	// //////////////////////////////////////////////////////////////////////////////////////////////
	
}
