<?php

namespace Par3\GolfEnLaNubeBundle\ReglamentoCircuito;

use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Doctrine\Common\Util\Debug;

class reglamentoGenerico implements ReglamentoCircuitoInterface
{
	public function calcularScorePosicionanteDeEquipo(Equipo $equipo)
	{
		$score = 0 ;
		$netos = array();
		foreach ($equipo->getTorneoFechaJugadoresConTarjeta() as $tfj)
		{
			if ($tfj->getTarjeta()->getEstado() == 'OK') $netos[] = $tfj->getTarjeta()->getScoreNeto();
		}
	
		// Si acaso no se llenaron todas las tarjetas necesarias relleno con 0
		$netos = array_pad($netos, $equipo->getTorneoFecha()->getTorneo()->getTitularesPorClub(), 0);
	
		sort($netos);
		$score += array_sum(array_splice($netos,0, 2)); // TODO: FIXME: 2 es la cantidad de tarjetas a calcular  (las 2 menores) Debería paramatrizarse esto.
		return ($score);
	}
	
	public function actualizarScoresTotalesEquipo(Equipo $equipo)
	{
		$gross = 0 ;
		$neto = 0 ;
		foreach ($equipo->getTorneoFechaJugadoresConTarjeta() as $tfj)
		{
			$gross += $tfj->getTarjeta()->getScoreGross();
			$neto += $tfj->getTarjeta()->getScoreNeto();
		}
	
		$equipo->setScoreGross($gross);
		$equipo->setScoreNeto($neto);
	
		$equipo->setScorePosicionante( $this->calcularScorePosicionanteDeEquipo($equipo) );
	}
	
	
	public function actualizarPosicionesEquiposEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$equipos = $torneo_fecha->getEquipos()->toArray();
		usort($equipos, array($this, 'algoritmoOrderEquiposByScorePosicionante') );
		foreach ($equipos as $i => $equipo)
		{
			if (!$equipo->getTorneoFechaJugadoresConTarjeta()->isEmpty()) $equipo->setPosicion( ($i+1) );
			else $equipo->setPosicion(null); 
		}
	}
	
	public function actualizarPosicionesJugadoresEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		foreach ($torneo_fecha->getTorneoFechaJugadoresConTarjeta() as $jugador)
		{
			if ( $jugador->getTarjeta()->getEstado() == 'OK') $jugadores_por_gross[ $jugador->getTarjeta()->getScoreGross() ][] = $jugador;
			else  $jugadores_por_gross[ 999 ][] = $jugador;
		}
	
		ksort($jugadores_por_gross);

		$i = 1;
		foreach ($jugadores_por_gross as $jugadores)
		{
			foreach ($jugadores as $jugador)
			{
				$jugador->setPosicionPorGross($i);
			}
			++ $i ;
		}
	
		$jugadores = $torneo_fecha->getTorneoFechaJugadoresConTarjeta()->toArray();
		usort($jugadores, array($this, 'algoritmoOrderJugadoresByScoreNeto') );
	
		foreach ($jugadores as $i => $jugador)
		{
			$jugador->setPosicionPorNeto( ($i+1) );
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////// PUNTAJES
	
	

	public function actualizarPuntajesEquiposEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$torneo_fecha->limpiarPuntajesEquipos();
		$this->actualizarPuntosPorPosicionEnTorneoFecha($torneo_fecha);
		$this->actualizarPuntajesTotalesEnTorneoFecha($torneo_fecha);
	}
	
	// TODO: FIXME: puntos_por_posicion debe hacerse parametrizable
	protected $puntos_por_posicion = array(
			## formato:  __POSICION__ => __PUNTOS__
	);
	
	
	/**
	 * PRECONDICION: ya tuvo que haberse calculado previamente la posicion de cada equipo participante. 
	 * @see \Par3\GolfEnLaNubeBundle\ReglamentoCircuito\ReglamentoCircuitoInterface::actualizarPuntosPorPosicion()
	 */
	public function actualizarPuntosPorPosicionEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$equipos = $torneo_fecha->getEquipos()->toArray();

		foreach ($equipos as $equipo)
		{
			if ( !is_null( $equipo->getPosicion() ) )	
			{
				if (isset ($this->puntos_por_posicion[ $equipo->getPosicion() ] ))
					$equipo->setPuntosPorPosicion( $this->puntos_por_posicion[ $equipo->getPosicion() ] );
			} else {
				$equipo->setPuntosPorPosicion(0);
			}
		}
	}

	public function actualizarPuntajesTotalesEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		foreach ($torneo_fecha->getEquipos() as $equipo)
		{
			$this->actualizarPuntajeTotalDeEquipo($equipo);
		}
	}
	
	public function actualizarPuntajeTotalDeEquipo(Equipo $equipo)
	{
		$equipo->setPuntajeTotal( $equipo->getPuntosPorPosicion() );
	}
	
	
	////////////////////////////////////////////////////////////
	/////////////////// Altoritmos de ordenamiento para el usort
	
	private function algoritmoOrderEquiposByPosicionDesc(Equipo $a, Equipo $b)
	{
		if ( $a->getPosicion() == $b->getPosicion() )	return 0;
		return ($a->getPosicion() > $b->getPosicion()) ? -1 : 1;
	}
	
	/**
	 * Algoritmo de ordenamiento para posicionamiento de los equipos por score posicionante.
	 *
	 * @param Equipo $a
	 * @param Equipo $b
	 * @return number
	 */
	private function algoritmoOrderEquiposByScorePosicionante(Equipo $a, Equipo $b)
	{
	
		if ( $a->getScorePosicionante() == $b->getScorePosicionante() )
		{
			return 0;
		}
		return ($a->getScorePosicionante() < $b->getScorePosicionante()) ? -1 : 1;
	}
	
	/**
	 * Algoritmo de ordenamiento para posicionamiento de los jugadores por score neto.
	 * Si el score neto no define entonces definen los úlimos 9, 6, 3, 2, o 1 hoyos en ese orden
	 * @param TorneoFechaJugador $a
	 * @param TorneoFechaJugador $b
	 * @return number
	 */
	private function algoritmoOrderJugadoresByScoreNeto(TorneoFechaJugador $a, TorneoFechaJugador $b)
	{
		if ( $a->getTarjeta()->getEstado() != 'OK' && $b->getTarjeta()->getEstado() != 'OK')
		{
			return 0;
		} else if ($a->getTarjeta()->getEstado() == 'OK' && $b->getTarjeta()->getEstado() != 'OK') {
			return -1;
		} else if ($a->getTarjeta()->getEstado() != 'OK' && $b->getTarjeta()->getEstado() == 'OK') {
			return +1;
		}
	
	
		if ( $a->getTarjeta()->getScoreNeto() == $b->getTarjeta()->getScoreNeto() )
		{
			return 0;
		} else {
			return ($a->getTarjeta()->getScoreNeto() < $b->getTarjeta()->getScoreNeto()) ? -1 : 1;
		}
	}
	
	private function algoritmoOrderJugadoresByScoreGross(TorneoFechaJugador $a, TorneoFechaJugador $b)
	{
		if ( $a->getTarjeta()->getEstado() != 'OK' && $b->getTarjeta()->getEstado() != 'OK') return 0;
		else if ($a->getTarjeta()->getEstado() == 'OK' && $b->getTarjeta()->getEstado() != 'OK') return -1;
		else if ($a->getTarjeta()->getEstado() != 'OK' && $b->getTarjeta()->getEstado() == 'OK') return 1;
	
		if ( $a->getTarjeta()->getScoreGross() == $b->getTarjeta()->getScoreGross() )
		{
			return 0;
		}
		return ($a->getTarjeta()->getScoreGross() < $b->getTarjeta()->getScoreGross()) ? -1 : 1;
	}
	
}