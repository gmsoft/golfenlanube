<?php

namespace Par3\GolfEnLaNubeBundle\Helpers;

class ParserArchivo
{
	private $formato ; 

	const TIPO_ANCHO_FIJO = 'ancho_fijo';
	const TIPO_SEPARADORES = 'separadores';

	/**
	 * Ejemplo de formato del array $this->formatos
	 *  
		public $formatos = array (
				'INI_JUGADORES' => array(
						'tipo'  => self::TIPO_ANCHO_FIJO, 
						'largo' => 230,
						'campos' => array(
								'matricula' 		=> array('inicio' => 0, 'largo' => 6),
								'nombreCompleto' 	=> array('inicio' => 6, 'largo' => 30),
								'sexo' 				=> array('inicio' => 36, 'largo' => 1),
								'estado' 			=> array('inicio' => 176, 'largo' => 1),
						)
				),
				'LISTA_BUENA_FE' => array(
						'tipo'  => self::TIPO_SEPARADORES, 
						'permite_campos_extra' => false,
						'separador' => ';',
						'campos' => array(
								'matricula' 		=> array('indice' => 0, 'largo' => 6),
								'club' 				=> array('indice' => 1, 'largo' => 3),
								'nombreCompleto'	=> array('indice' => 2, 'largo' => 3, 'no_invalida_linea' => true), 
						)
				),
		);
	* 
	*/
	public $formatos = array(); 
	
	public function __construct($formato)
	{
		if ( ! in_array($formato, array_keys($this->formatos)) )
		{
			throw new \InvalidArgumentException($formato . " no es un argumento de valido para este parametro .");
		}
		$this->formato = $formato; 
	}

	protected function validaFecha($fecha, $formato='Y-m-d')
	{
		return ( false !== \DateTime::createFromFormat($formato, $fecha));
	}
	
	protected function validaString($string, $largo)
	{
		return (is_string($string) && ( is_null($largo) || strlen($string) == $largo) );
	}
	
	protected function validaStringNumerico($numero)
	{
		return (is_numeric($numero));
	}
	
	protected function validaNumeroNatural($numero, $max = null)
	{
		return ($this->validaStringNumerico($numero) && (int)$numero >= 0 && ( is_null($max) || (int)$numero <= $max) );
	}


	public function validaCampo($nombre, $valor)
	{
		$nombre = ucfirst($nombre);
		return call_user_func(array($this, 'valida' . $nombre), $valor);
	}
	

	public function obtenerCampoDeLinea($linea, $nombreCampo)
	{
		$config = $this->formatos[$this->formato]['campos'][$nombreCampo];
		switch ($this->formatos[$this->formato]['tipo'])
		{
			case self::TIPO_ANCHO_FIJO: 
					return  substr($linea, $config['inicio'], $config['largo']);
				break;
			case self::TIPO_SEPARADORES:
					$arr = explode( $this->formatos[$this->formato]['separador'], $linea);
					return $arr[ $config['indice'] ];
				break;
		} 
	}

	public function debeCodificarCampoUtf8($nombreCampo)
	{
		$f = $this->formatos[$this->formato];
		return (isset($f['campos'][$nombreCampo]['utf8_encode']) && $f['campos'][$nombreCampo]['utf8_encode'] == true);
	}
	
	public function campoNoInvalidaLinea($nombreCampo)
	{
		$f = $this->formatos[$this->formato];
		return (isset($f['campos'][$nombreCampo]['no_invalida_linea']) && $f['campos'][$nombreCampo]['no_invalida_linea'] == true); 
	}
	
	public function cantidadDeCamposEsValida($linea)
	{
		$f = $this->formatos[$this->formato];
		
		return	(	count(explode($f['separador'], $linea)) == count($f['campos']) ||
					( $f['permite_campos_extra'] == true && count(explode($f['separador'], $linea)) > count($f['campos']) )		);
	}
	
	public function largoDeLineaEsValido($linea)
	{
		$f = $this->formatos[$this->formato];

		return (strlen(trim($linea, "\r\n\0")) ==  $f['largo'] || 
				strlen(trim(utf8_decode(utf8_decode($linea)), "\r\n\0")) == $f['largo']); 
		/* FIXME: 	algunos archivos que manda la AAG tienen mal la codificación de algunas lineas y los largos se calculan mal, por eso la segunda linea de esta 
		 			condicion */
	}
	
	public function esLineaArchivoValida($linea)
	{
		$f = $this->formatos[$this->formato]; 
		
		if ( $f['tipo'] == self::TIPO_ANCHO_FIJO )			$v = $this->largoDeLineaEsValido($linea) ;

		else if ( $f['tipo'] == self::TIPO_SEPARADORES ) 	$v = $this->cantidadDeCamposEsValida($linea) ;

		foreach (array_keys($f['campos']) as $nombre)
		{
			if ( $this->campoNoInvalidaLinea($nombre) ) continue; 
			$v = $this->validaCampo($nombre, $this->obtenerCampoDeLinea($linea, $nombre)) && $v; 
			if ( $v === false ) { return false; } 
		}

		return $v; 
	}
	
	public function parseLineaArchivo($linea)
	{
		$valores = array();
		$f = $this->formatos[$this->formato]; 
		foreach (array_keys($f['campos']) as $nombre)
		{
			$valores[$nombre] = $this->obtenerCampoDeLinea($linea, $nombre);
		}
		return $valores; 
	}
}
