<?php
namespace Par3\GolfEnLaNubeBundle\ReglamentoCircuito;

use Par3\GolfEnLaNubeBundle\Entity\Temporada;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Doctrine\Common\Util\Debug;

class reglamentoCircuitopar3 extends reglamentoGenerico 
{
	/*
	 * Mediante la Temporada deberían venir las configuraciones disponibles para la temporada en curso
	public function __construct(Temporada $temporada)
	{
		
	}
	*/
	
	/*
	 * FIXME: TODO: tarde o temprano estas configuraciones por temporada hay que meterlas en el modelo de datos 
	 */
	private $puntos_por_tarjeta_confirmada = 3; 
	private $puntos_por_mejor_gross = 2; 
	private $puntos_por_2do_mejor_gross = 1; 
	private $cant_tarjetas_score_posicionante = 2;
	protected $puntos_por_posicion = array(
		1 => 15,
		2 => 12,
		3 => 10,
		4 => 8,
		5 => 7,
		6 => 6,
		7 => 5,
		8 => 4,
		9 => 3,
		10 => 2,
		11 => 1
	);
	
	public function getSumaScoresNetosNHoyosDeScoresComputables(Equipo $equipo , $hoyos)
	{
		$suma = 0 ; 
		for ($i = 0 ; $i < $this->cant_tarjetas_score_posicionante ; $i++)
		{
			$tfj = $equipo->getTorneoFechaJugadoresOrderByScoreNetoAsc()->get($i);
			if ($tfj) $suma += $tfj->getTarjeta()->getSumaUltimosNHoyosNeto($hoyos);
		}
		return $suma;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////// POSICIONAMIENTO DE EQUIPOS Y JUGADORES Y DESEMPATES

	
	
	
	public function calcularScorePosicionanteDeEquipo(Equipo $equipo)
	{
		$score = 0 ;
		$netos = array();
		foreach ($equipo->getTorneoFechaJugadoresConTarjetaOk() as $tfj)
		{
			 $netos[] = $tfj->getTarjeta()->getScoreNeto();
		}
	
		sort($netos);

		for ($i = 0 ; $i < $this->cant_tarjetas_score_posicionante ; $i ++ ) $score += ((isset($netos[$i]) && !is_null($netos[$i]))  ? $netos[$i] : 0);

		return ( ($score == 0 ) ? null : $score );
	}

	public function calcularScoreDesempateDeEquipo(Equipo $equipo)
	{
	
		$score = 0 ;
		$netos = array();
		foreach ($equipo->getTorneoFechaJugadoresConTarjetaOk() as $tfj)
		{
			$netos[] = $tfj->getTarjeta()->getScoreNeto();
		}
		sort($netos);

		return (isset($netos[$this->cant_tarjetas_score_posicionante ]) ) ? $netos[$this->cant_tarjetas_score_posicionante ] : null;
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
		
		if ($gross == 0) 
		{
			$equipo->setScoreGross(null);
			$equipo->setScoreNeto(null);
			$equipo->setScorePosicionante( null );
			$equipo->setScoreDesempate( null );
		} else {
			$equipo->setScoreGross($gross);
			$equipo->setScoreNeto($neto);
			$equipo->setScorePosicionante( $this->calcularScorePosicionanteDeEquipo($equipo) );
		}
	}
	
	public function actualizarPosicionesEquiposEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$torneo_fecha->limpiarPosicionesEquipos();
		$equipos = $torneo_fecha->getEquipos()->toArray();
		usort($equipos, array($this, 'algoritmoOrderEquiposByScorePosicionante') );
		$i = 1;
		foreach ($equipos as $equipo)
		{
			if ( !is_null($equipo->getScorePosicionante()))
			{
				$equipo->setPosicion( $i );
				$i++;
			}
		}
	}
	
	public function actualizarPosicionesJugadoresEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$torneo_fecha->limpiarPosicionesTorneoFechaJugadores() ; 
		// Dado que las posiciones por score gross se pueden compartir las agrupo por score y las ordeno por sus keys (ksort mas abajo)
		/*foreach ($torneo_fecha->getTorneoFechaJugadoresConTarjeta() as $jugador)
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
		}*/

		$jugadores = $torneo_fecha->getTorneoFechaJugadoresConTarjeta()->toArray();
		usort($jugadores, array($this, 'algoritmoOrderJugadoresByScoreGross') );
		
		foreach ($jugadores as $i => $jugador)
		{
			$jugador->setPosicionPorGross( ($i+1) );
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
		$this->actualizarPuntosPorParticipacionEnTorneoFecha($torneo_fecha);
		$this->actualizarPuntosPorGrossIndividualesEnTorneoFecha($torneo_fecha);
		$this->actualizarPuntajesTotalesEnTorneoFecha($torneo_fecha);
	}
	
	public function actualizarPuntosPorParticipacionEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		foreach ($torneo_fecha->getEquipos() as $equipo)
		{
			$equipo->setPuntosPorParticipacion( $this->puntosPorParticipacionDeEquipo($equipo) );
		}
	}
	
	private function puntosPorParticipacionDeEquipo(Equipo $equipo)
	{
		$puntos_por_tarjeta_confirmada = $this->puntos_por_tarjeta_confirmada;
	
		$puntos = 0;
		foreach ($equipo->getTorneoFechaJugadoresConTarjeta() as $tfj)
		{
			if ($tfj->getTarjeta()->getEstado() != 'NPT')
			{
				$puntos += $puntos_por_tarjeta_confirmada ;
			}
		}
		return $puntos;
	}
	
	public function actualizarPuntosPorGrossIndividualesEnTorneoFecha(TorneoFecha $torneo_fecha)
	{
		$puntos_por_mejor_gross = $this->puntos_por_mejor_gross ; 
		$puntos_por_2do_mejor_gross = $this->puntos_por_2do_mejor_gross ; 
	
		$jugadores_1er_puesto_gross = array(); 
		$jugadores_2do_puesto_gross = array(); 
		
		foreach ($torneo_fecha->getTorneoFechaJugadoresConTarjeta() as $jugador)
		{
			if ($jugador->getPosicionPorGross() == 1) $jugadores_1er_puesto_gross[] = $jugador;
			else if ($jugador->getPosicionPorGross() == 2) $jugadores_2do_puesto_gross[] = $jugador;
		}

		if (count($jugadores_2do_puesto_gross) == 1 && !is_null($jugadores_2do_puesto_gross[0]->getEquipo()) )
		{
			$jugadores_2do_puesto_gross[0]->getEquipo()->setPuntosPorGrossIndividuales($puntos_por_2do_mejor_gross);
		}

		if (count($jugadores_1er_puesto_gross) == 1 && !is_null($jugadores_1er_puesto_gross[0]->getEquipo()) )
		{
			$puntos_por_gross_individuales = (int) $jugadores_1er_puesto_gross[0]->getEquipo()->getPuntosPorGrossIndividuales();
			$jugadores_1er_puesto_gross[0]->getEquipo()->setPuntosPorGrossIndividuales($puntos_por_gross_individuales + $puntos_por_mejor_gross);
		}
	}
	
	public function actualizarPuntajeTotalDeEquipo(Equipo $equipo)
	{
		$equipo->setPuntajeTotal( $equipo->getPuntosPorGrossIndividuales() + $equipo->getPuntosPorParticipacion() + $equipo->getPuntosPorPosicion() );
	}
	
	
	////////////////////////////////////////////////////////////
	/////////////////// Altoritmos de ordenamiento para el usort

	/**
	 * Algoritmo de ordenamiento para posicionamiento de los equipos por score posicionante y luego por neto , de mayor a menor, claro.
	 *
	 * @param Equipo $a
	 * @param Equipo $b
	 * @return number
	 */
	private function algoritmoOrderEquiposByScorePosicionante(Equipo $a, Equipo $b)
	{
		if ( $a->getScorePosicionante() == $b->getScorePosicionante() )
		{
			if ($a->getTorneoFechaJugadoresConTarjeta()->count() ==  $b->getTorneoFechaJugadoresConTarjeta()->count())
			{
				if ( $this->calcularScoreDesempateDeEquipo($a) == $this->calcularScoreDesempateDeEquipo($b) )
				{
					if ( $this->getSumaScoresNetosNHoyosDeScoresComputables($a,9) == $this->getSumaScoresNetosNHoyosDeScoresComputables($b,9)) 
					{
						return 0 ;
					}
					return  ( $this->getSumaScoresNetosNHoyosDeScoresComputables($a, 9) < $this->getSumaScoresNetosNHoyosDeScoresComputables($b, 9)) ? -1 : 1;
				} else
				{ 
					$a->setScoreDesempate( $this->calcularScoreDesempateDeEquipo($a) );
					$b->setScoreDesempate( $this->calcularScoreDesempateDeEquipo($b) );
					return ($a->getScoreDesempate() < $b->getScoreDesempate() ) ? -1 : 1;
				}
			} else {
				$a->setScoreDesempate( null );
				$b->setScoreDesempate( null );
				return  ($a->getTorneoFechaJugadoresConTarjeta()->count() > $b->getTorneoFechaJugadoresConTarjeta()->count()) ? -1 : 1;
			}
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
			if ($a->getTarjeta()->getSumaUltimosNHoyosNeto(9) == $b->getTarjeta()->getSumaUltimosNHoyosNeto(9))
			{
				if ($a->getTarjeta()->getSumaUltimosNHoyosNeto(6) == $b->getTarjeta()->getSumaUltimosNHoyosNeto(6))
				{
					if ($a->getTarjeta()->getSumaUltimosNHoyosNeto(3) == $b->getTarjeta()->getSumaUltimosNHoyosNeto(3))
					{
						if ($a->getTarjeta()->getSumaUltimosNHoyosNeto(2) == $b->getTarjeta()->getSumaUltimosNHoyosNeto(2))
						{
							if ($a->getTarjeta()->getSumaUltimosNHoyosNeto(1) == $b->getTarjeta()->getSumaUltimosNHoyosNeto(1))
							{
								return 0;
							} else {
								return ($a->getTarjeta()->getSumaUltimosNHoyosNeto(1) < $b->getTarjeta()->getSumaUltimosNHoyosNeto(1)) ? -1 : 1;
							}
						} else {
							return ($a->getTarjeta()->getSumaUltimosNHoyosNeto(2) < $b->getTarjeta()->getSumaUltimosNHoyosNeto(2)) ? -1 : 1;
						}
					} else {
						return ($a->getTarjeta()->getSumaUltimosNHoyosNeto(3) < $b->getTarjeta()->getSumaUltimosNHoyosNeto(3)) ? -1 : 1;
					}
				} else {
					return ($a->getTarjeta()->getSumaUltimosNHoyosNeto(6) < $b->getTarjeta()->getSumaUltimosNHoyosNeto(6)) ? -1 : 1;
				}
			} else {
				return ($a->getTarjeta()->getSumaUltimosNHoyosNeto(9) < $b->getTarjeta()->getSumaUltimosNHoyosNeto(9)) ? -1 : 1;
			}
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
			if ($a->getTarjeta()->getSumaUltimosNHoyos(9) == $b->getTarjeta()->getSumaUltimosNHoyos(9))
			{
				if ($a->getTarjeta()->getSumaUltimosNHoyos(6) == $b->getTarjeta()->getSumaUltimosNHoyos(6))
				{
					if ($a->getTarjeta()->getSumaUltimosNHoyos(3) == $b->getTarjeta()->getSumaUltimosNHoyos(3))
					{
						if ($a->getTarjeta()->getSumaUltimosNHoyos(2) == $b->getTarjeta()->getSumaUltimosNHoyos(2))
						{
							if ($a->getTarjeta()->getSumaUltimosNHoyos(1) == $b->getTarjeta()->getSumaUltimosNHoyos(1))
							{
								return 0;
							} else {
								return ($a->getTarjeta()->getSumaUltimosNHoyos(1) < $b->getTarjeta()->getSumaUltimosNHoyos(1)) ? -1 : 1;
							}
						} else {
							return ($a->getTarjeta()->getSumaUltimosNHoyos(2) < $b->getTarjeta()->getSumaUltimosNHoyos(2)) ? -1 : 1;
						}
					} else {
						return ($a->getTarjeta()->getSumaUltimosNHoyos(3) < $b->getTarjeta()->getSumaUltimosNHoyos(3)) ? -1 : 1;
					}
				} else {
					return ($a->getTarjeta()->getSumaUltimosNHoyos(6) < $b->getTarjeta()->getSumaUltimosNHoyos(6)) ? -1 : 1;
				}
			} else {
				return ($a->getTarjeta()->getSumaUltimosNHoyos(9) < $b->getTarjeta()->getSumaUltimosNHoyos(9)) ? -1 : 1;
			}
		} else {
			return ($a->getTarjeta()->getScoreGross() < $b->getTarjeta()->getScoreGross()) ? -1 : 1;
		}

		/*
		if ( $a->getTarjeta()->getScoreGross() == $b->getTarjeta()->getScoreGross() )
		{
			return 0;
		}
		return ($a->getTarjeta()->getScoreGross() < $b->getTarjeta()->getScoreGross()) ? -1 : 1;
		*/
	}

}
