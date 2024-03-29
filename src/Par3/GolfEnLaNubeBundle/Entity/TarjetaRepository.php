<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ClassesWithParents\A;

/**
 * TarjetaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TarjetaRepository extends EntityRepository
{
	/**
	 * 
	 * @param integer $id_torneo_fecha
	 * @param string $orden el nombre de una columna de la tabla tarjeta 
	 * @return Ambigous <\Doctrine\ORM\mixed, \Doctrine\DBAL\Driver\Statement, \Doctrine\ORM\Internal\Hydration\mixed, \Doctrine\Common\Cache\mixed>
	 */
	public function resultadoDeTorneoFechaOrdenadosPor($id_torneo_fecha, $orden = 'tfj.posicion_por_neto')
	{
		return $this->getEntityManager()->createQueryBuilder()
				->select("t, tfj")
				->from("GolfEnLaNubeBundle:Tarjeta", "t")
				->innerJoin("t.torneo_fecha_jugador", "tfj")
				->where("tfj.id_torneo_fecha = :id_torneo_fecha")
				->orderBy($orden, 'ASC')
					->setParameter('id_torneo_fecha', $id_torneo_fecha)
					->getQuery()
					->execute();
	}
	
	
}
