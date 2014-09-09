<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ClassesWithParents\A;

/**
 * TorneoFechaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TorneoFechaRepository extends EntityRepository
{

	public function resultadosOrdenadosPorScoreEquipo($id_torneo_fecha)
	{
		return $this->getEntityManager()->createQuery(
					"select	tf, tfj, e
						from GolfEnLaNubeBundle:TorneoFecha tf
						inner join tf.equipos e			
						inner join e.torneo_fecha_jugadores tfj 
							 
							left join tfj.tarjeta t 
							left join e.club c 
						where tf.id = :id_torneo_fecha
						ORDER BY e.posicion ASC

				")
				->setParameter('id_torneo_fecha', $id_torneo_fecha)
				->execute();
	}

	public function getFechasEnTemporadaHastaFechaQuery($id_temporada, \DateTime $fecha)
	{
		$fecha_ultima_hora = clone $fecha;
		$fecha_ultima_hora->setTime(23, 59, 59);
		return $this->createQueryBuilder('tf')
					->innerJoin('tf.torneo', 't')
					->where('tf.fecha <= :fecha')->setParameter('fecha', $fecha_ultima_hora)
					->andWhere('t.id_temporada = :temporada')->setParameter('temporada', $id_temporada)
					->orderBy('tf.fecha', 'DESC');
	}

	public function getFechasEnTemporadaHastaFechaActualQuery($id_temporada)
	{
		$fecha = new \DateTime('now');
		return $this->getFechasEnTemporadaHastaFechaQuery($id_temporada, $fecha);
	}
	
	
	public function findFechasEnTemporadaParaConfigurarEquipo($id_temporada)
	{
		$hoy = new \DateTime();
		return $this->createQueryBuilder('tf')
			->innerJoin('tf.torneo', 't')
			->where('t.apertura_inscripcion <= :fecha')
			// TODO: FIXME: esta restricción se sacó temporalmente  para que se puedan cargar las fechas anteriores. 
			// ->andWhere('tf.fecha > :fecha')
			->andWhere('t.id_temporada = :temporada')
			->setParameter('temporada', $id_temporada)
			->setParameter('fecha', $hoy)
			->orderBy('t.inicio', 'ASC')
			->addOrderBy('tf.fecha', 'ASC')
			->getQuery()
			->execute();
	}

	public function getIdsTorneoFechasParaTorneo($id_torneo)
	{
                $ids = array();
                
                $entities = $this->getEntityManager()
                        ->getRepository('GolfEnLaNubeBundle:TorneoFecha')
                        ->findBy(array('id_torneo' => $id_torneo));
                
                foreach ($entities as $entity) {
                    $ids[] = $entity->getId(); 
                }
                
                return implode(',', $ids);
        }

}
