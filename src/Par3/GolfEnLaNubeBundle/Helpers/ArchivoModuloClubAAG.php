<?php

namespace Par3\GolfEnLaNubeBundle\Helpers;

class ArchivoModuloClubAAG extends ParserArchivo
{
	const JUGA_HCP  = 'INI_JUGA_HCP';
	const JUGADORES  = 'INI_JUGADORES';
	const CANCHAS  = 'INI_CANCHAS';
	const CLUBES  = 'INI_CLUBES';

	public $formatos = array (
			'INI_JUGADORES' => array(
					'tipo'  => 'ancho_fijo', 
					'largo' => 230,
					'campos' => array(
							'matricula' 		=> array('inicio' => 0, 'largo' => 6),
							'nombreCompleto' 	=> array('inicio' => 6, 'largo' => 30),
							'sexo' 				=> array('inicio' => 36, 'largo' => 1),
							'estado' 			=> array('inicio' => 176, 'largo' => 1),
					)
			),
			'INI_JUGA_HCP' => array(
					'tipo'  => 'ancho_fijo',
					'largo' => 83,
					'campos' => array(
							'matricula' 		=> array('inicio' => 0, 'largo' => 6 ),
							'nombreCompleto' 	=> array('inicio' => 25, 'largo' => 30, 'no_invalida_linea' => true, 'utf8_encode' => true),
							'sexo' 				=> array('inicio' => 55, 'largo' => 1, 'no_invalida_linea' => true),
							'estado' 			=> array('inicio' => 64, 'largo' => 1, 'no_invalida_linea' => true),
							'handicapStd' 		=> array('inicio' => 14, 'largo' => 4),
							'handicapPar3' 		=> array('inicio' => 18, 'largo' => 4),
							'codigoClub'   		=> array('inicio' => 22, 'largo' => 3, 'no_invalida_linea' => true),
							'fechaVigencia'		=> array('inicio' => 6, 'largo' => 8)
					)
			),
			'INI_CLUBES' => array(
					'tipo'  => 'ancho_fijo',
					'largo' => 33,
					'campos' => array(
							'codigoClub' 		=> array('inicio' => 0, 'largo' => 3 ),
							'nombreClub' 		=> array('inicio' => 3, 'largo' => 30, 'utf8_encode', 'no_invalida_linea' => true)
					)
			),
			'INI_CANCHAS' => array(
					'tipo'  => 'ancho_fijo',
					'largo' => 9,
					'campos' => array(
							'codigoClub' 		=> array('inicio' => 0, 'largo' => 3 ),
							'numeroCancha' 		=> array('inicio' => 3, 'largo' => 1),
							'numeroTee' 		=> array('inicio' => 4, 'largo' => 1),
							'calificacionTee' 	=> array('inicio' => 5, 'largo' => 4)
					)
			),
	);
	
	protected function  validaMatricula($matricula)
	{
		return ($this->validaNumeroNatural($matricula, 999999) );
	}
	
	protected function  validaNombreCompleto($nombreCompleto)
	{
		return ($this->validaString($nombreCompleto, 30) && trim($nombreCompleto != ''));
	}

	protected function  validaSexo($sexo)
	{
		return ($sexo == 'M' || $sexo == 'F'); 
	}

	protected function  validaEstado($estado)
	{
		return ($estado == 'A' || $estado == 'B');
	}

	protected function  validaHandicap($handicap, $max)
	{
		return ($this->validaStringNumerico($handicap) && $handicap <= $max);
	}

	protected function  validaHandicapPar3($handicap)
	{
		return ($this->validaHandicap($handicap, 9999));
	}

	protected function  validaHandicapStd($handicap)
	{
		return ($this->validaHandicap($handicap, 9999));
	}

	protected function  validaCodigoClub($club)
	{
		return ($this->validaNumeroNatural($club, 1000) );
	}

	protected function  validaNombreClub($nombre)
	{
		return ($this->validaString($nombre, 30)); 
	}

	protected function  validaFechaVigencia($fecha)
	{
		return ( $this->validaFecha($fecha, 'dmY') );
	}
	
	protected function  validaNumeroCancha($numero)
	{
		return ($this->validaNumeroNatural($numero, 9));
	}

	protected function  validaNumeroTee($numero)
	{
		return ($this->validaNumeroNatural($numero, 9));
	}
	
	protected function  validaCalificacionTee($numero)
	{
		return (true);
	}

}
