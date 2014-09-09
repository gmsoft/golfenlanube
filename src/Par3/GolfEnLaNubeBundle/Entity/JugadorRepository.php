<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ClassesWithParents\A;
use Doctrine\Common\Util\Debug;

/**
 * CanchaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JugadorRepository extends EntityRepository
{
	public function todosJugadoresDeClubHabilitadosParaFechaEnTemporada( $id_club, $id_temporada, \DateTime $fecha)
	{
		$ret = array(); 
		$rs = $this->getEntityManager()->createQueryBuilder()
			->select('j') 
				->from('GolfEnLaNubeBundle:Jugador', 'j')
				->innerJoin('j.temporada_club_jugadores', 'tcj') 
				->innerJoin('tcj.temporada_club', 'tc') 
				->where('tc.id_club = :id_club')
				->andWhere('tc.id_temporada = :id_temporada')
				->orderBy('j.id', 'ASC')
				->setParameter('id_club', $id_club)
				->setParameter('id_temporada', $id_temporada)
		->getQuery()
		->execute();

		foreach ($rs as $jugador)
		{
			if ( $jugador->cumpleTarjetasParaFecha($fecha)) $ret[] = $jugador;
		}
		return $ret;
	}

	public function todosJugadoresDeTemporadaClubHabilitadosParaFecha( $id_temporada_club, \DateTime $fecha)
	{
		$ret = array();
		$rs = $this->getEntityManager()->createQueryBuilder()
		->select('j')
		->from('GolfEnLaNubeBundle:Jugador', 'j')
		->innerJoin('j.temporada_club_jugadores', 'tcj')
		->innerJoin('tcj.temporada_club', 'tc')
		->where('tc.id = :id_temporada_club')
		->orderBy('j.id', 'ASC')
		->setParameter('id_temporada_club', $id_temporada_club)
		->getQuery()
		->execute();
	
		foreach ($rs as $jugador)
		{
			if ( $jugador->cumpleTarjetasParaFecha($fecha)) $ret[] = $jugador;
		}
		return $ret;
	}
	
	public function todosJugadoresDeClub($id_club)
	{
		return $this->getEntityManager()->createQueryBuilder()
			->select('j')
				->from('GolfEnLaNubeBundle:Jugador', 'j')
				->where('j.id_club = :id_club')
				->orderBy('j.id', 'ASC')
				->setParameter('id_club', $id_club)
		->getQuery()
		->execute();
	}
	
	public function jugadoresDeClubNoEnTemporadaClub(TemporadaClub $temporada_club)
	{
		
		$subquery = $this->createQueryBuilder('ju')
			->select('ju')
			->innerJoin('ju.temporada_club_jugadores', 'tcj')
			->innerJoin('tcj.temporada_club', 'tc')
			->where('ju.id = j.id')
			->orderBy('ju.id', 'ASC')
			;

		$qb = $this->getEntityManager()->createQueryBuilder();
		$query = $this	->createQueryBuilder('j')
					->orderBy('j.id')
					->where( $qb->expr()->not( $qb->expr()->exists( $subquery->getDQL() ) ) )
					->andWhere( 'j.id_club = :club')->setParameter('club', $temporada_club->getIdClub() );

		return $query->getQuery()->execute();
	}

	public function jugadoresDeClubNoEnTemporadaClubParaChoices(TemporadaClub $temporada_club)
	{
		$ret = array();
		$jugadores = $this->jugadoresDeClubNoEnTemporadaClub($temporada_club);
		foreach ($jugadores as $jugador)
		{
			$ret[$jugador->getId()] = $jugador->__toString() . ' (' . $jugador->getClub()->getNombre() . ')';
		}
		return $ret; 
	}
	
}