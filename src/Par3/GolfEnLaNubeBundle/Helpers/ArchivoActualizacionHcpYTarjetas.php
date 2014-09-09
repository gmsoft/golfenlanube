<?php

namespace Par3\GolfEnLaNubeBundle\Helpers;

class ArchivoActualizacionHcpYTarjetas extends ParserArchivo
{

	const SIMPLE = 'SIMPLE'; 

	public $formatos = array (
		'SIMPLE' => array(
			'tipo'  => 'separadores',
			'permite_campos_extra' => true,
			'separador' => ';',
			'campos' => array(
				'matricula' 		=> array('indice' => 0, 'largo' => 6),
				'fechaVigencia'		=> array('indice' => 1, 'largo' => 10),
				'codigoClub'		=> array('indice' => 2, 'largo' => 3, 'no_invalida_linea' => true),
				'handicapStd' 		=> array('indice' => 3, 'largo' => 4, 'no_invalida_linea' => true),
				'handicapPar3' 		=> array('indice' => 4, 'largo' => 4, 'no_invalida_linea' => true),
				'tarjetasStd' 		=> array('indice' => 5, 'largo' => 3),
				'tarjetasPar3' 		=> array('indice' => 6, 'largo' => 3),
			)
		),
	);

	protected function  validaCodigoClub($club)
	{
		return ($this->validaNumeroNatural($club, 1000) );
	}
	
	protected function validaFechaVigencia($fecha)
	{
		return ( $this->validaFecha($fecha) );
	}

	protected function  validaMatricula($matricula)
	{
		return ( $this->validaNumeroNatural($matricula, 999999) );
	}

	protected function  validaHandicap($handicap, $max)
	{
		return ( $this->validaStringNumerico($handicap) && $handicap <= $max );
	}

	protected function  validaHandicapPar3($handicap)
	{
		return ( $this->validaHandicap($handicap, 9999) );
	}

	protected function  validaHandicapStd($handicap)
	{
		return ( $this->validaHandicap($handicap, 9999) );
	}

	protected function  validaTarjetasStd($tarjetas)
	{
		return ( $this->validaStringNumerico($tarjetas) );
	}

	protected function  validaTarjetasPar3($tarjetas)
	{
		return ( $this->validaStringNumerico($tarjetas) );
	}

}
