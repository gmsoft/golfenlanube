<?php
namespace Par3\GolfEnLaNubeBundle\ReglamentoCircuito;


use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Doctrine\Common\Util\Debug;


interface ReglamentoCircuitoInterface
{
	/*
	 * Mas alla de que este es el contrato que debe cumplir cualquier reglamento de un circuito o club, debe llamarse a los mensajes en el orden en el que 
	 * aparecen aquí ya que los datos que se actualizan dependen unos de otros (scores -> posiciones -> puntajes) 
	 * @param Equipo $equipo
	 */
	
	public function actualizarScoresTotalesEquipo(Equipo $equipo);
	
	public function actualizarPosicionesEquiposEnTorneoFecha(TorneoFecha $torneo_fecha);
	
	public function actualizarPosicionesJugadoresEnTorneoFecha(TorneoFecha $torneo_fecha);
	
	public function actualizarPuntajesEquiposEnTorneoFecha(TorneoFecha $torneo_fecha);

	public function actualizarPuntajesTotalesEnTorneoFecha(TorneoFecha $torneo_fecha);
	
	public function actualizarPuntosPorPosicionEnTorneoFecha(TorneoFecha $torneo_fecha);
	
	public function actualizarPuntajeTotalDeEquipo(Equipo $equipo);
}