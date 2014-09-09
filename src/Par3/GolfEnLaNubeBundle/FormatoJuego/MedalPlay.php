<?php
namespace Par3\GolfEnLaNubeBundle\FormatoJuego;

use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;


class MedalPlay implements FormatoJuegoHandlerInterface
{
	public function actualizarScoresTotalesTarjeta(Tarjeta $tarjeta)
	{
		$gross = 0 ;
		$neto = 0 ;
		foreach ($tarjeta->getHoyos() as $hoyo)
		{
			$gross += $hoyo->getGolpes();
		}

		if ($gross > 0) 
		{	
			$neto = $gross - $tarjeta->getTorneoFechaJugador()->getHandicapDeJuego();
		} else {
			$gross  = $neto = null; 
		}

		$tarjeta->setScoreGross($gross);
		$tarjeta->setScoreNeto($neto);
	}

	
}