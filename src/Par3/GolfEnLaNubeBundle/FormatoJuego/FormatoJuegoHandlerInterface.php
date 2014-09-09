<?php
namespace Par3\GolfEnLaNubeBundle\FormatoJuego;

use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;

interface FormatoJuegoHandlerInterface
{
	public function actualizarScoresTotalesTarjeta(Tarjeta $tarjeta);
}