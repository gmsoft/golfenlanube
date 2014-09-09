<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ClassesWithParents\A;

/**
 * TorneoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TorneoRepository extends EntityRepository
{
	public function getQueryTorneosDeTemporada($id_temporada)
	{
		return $this->createQueryBuilder('t')->where('t.id_temporada = :temporada')->setParameter('temporada', $id_temporada);
	}

	public function findTorneosDeTemporadaOrderByFechasAsc($id_temporada)
	{
		return $this->getQueryTorneosDeTemporada($id_temporada)->innerJoin('t.fechas', 'tf')->orderBy('t.inicio', 'ASC')->addOrderBy('tf.fecha', 'ASC')->getQuery()->execute();
	}
}
