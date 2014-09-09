<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\EntityRepository;
use ClassesWithParents\A;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
/*
	public function getCandidatosACapitan($id_temporada_club)
	{
		$res = array(); 
		$query = $this->createQueryBuilder('u')
					->select('u')
					->distinct()
					->innerJoin('u.persona', 'p')
					->innerJoin('p.jugador', 'j')
					->innerJoin('j.temporada_club_jugadores', 'tcj')
					->where('tcj.id_temporada_club = :temporada_club')
					->setParameter('temporada_club', $id_temporada_club)
					->orderBy('u.id','ASC')
				->getQuery()
				->execute();
		foreach ($query as $user)
			$res[$user->getId()] = $user->getPersona()->getJugador()->getId() . ' - '  . $user->getPersona()->getNombreCompleto();
		
		return $res;
	}
	*/
	
	public function getCandidatosACapitan($id_club)
	{
		$res = array();
		$query = $this->createQueryBuilder('u')
		->select('u')
		->distinct()
		->innerJoin('u.persona', 'p')
		->innerJoin('p.jugador', 'j')
		->innerJoin('j.temporada_club_jugadores', 'tcj')
		->innerJoin('tcj.temporada_club', 'tc')
		->where('tc.id_club = :club')
		->setParameter('club', $id_club)
		->orderBy('u.id','ASC')
		->getQuery()
		->execute();
		foreach ($query as $user)
			$res[$user->getId()] = $user->getPersona()->getJugador()->getId() . ' - '  . $user->getPersona()->getNombreCompleto();
	
		return $res;
	}
	
	
	public function existeUsuario(User $usuario)
	{
		return ($this->createQueryBuilder('u')
				->select('u')
				//->from('GolfEnLaNubeBundle:User', 'u')
			->where('u.username = :usuario')
			->orWhere('u.email = :correo')
			->setParameter('usuario', strtolower($usuario->getUsername()))
			->setParameter('correo', strtolower($usuario->getEmail()))
			->setMaxResults(1)
			->getQuery()->execute() );
		 
	}
}
