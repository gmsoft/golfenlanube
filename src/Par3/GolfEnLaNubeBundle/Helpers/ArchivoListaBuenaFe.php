<?php

namespace Par3\GolfEnLaNubeBundle\Helpers;

class ArchivoListaBuenaFe extends ParserArchivo
{

	const SIMPLE = 'SIMPLE'; 
	const CON_EQUIPOS = 'CON_EQUIPOS';

	public $formatos = array (
			'SIMPLE' => array(
					'tipo'  => 'separadores',
					'permite_campos_extra' => true,
					'separador' => ',',
					'campos' => array(
							'matricula' 		=> array('indice' => 0, 'largo' => 6),
							'codigoClub' 		=> array('indice' => 1, 'largo' => 3),
					)
			),
			'CON_EQUIPOS' => array(
					'tipo'  => 'separadores',
					'permite_campos_extra' => true,
					'separador' => ';',
					'campos' => array(
							'matricula' 		=> array('indice' => 0, 'largo' => 6),
							'codigoClub' 		=> array('indice' => 1, 'largo' => 3),
							'equipo' 			=> array('indice' => 2, 'largo' => 3, 'no_invalida_linea' => true),
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

	protected function  validaCodigoClub($club)
	{
		return ($this->validaNumeroNatural($club, 1000) );
	}

	protected function  validaNombreClub($nombre)
	{
		return ($this->validaString($nombre, 30));
	}

	protected function  validaEquipo($equipo)
	{
		return ($this->validaString($equipo, null));
	}
	
}
