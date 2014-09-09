<?php
/*
namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

*/
/**
 *
 * #@#ORM\Table(name="tipo_campeonatos")
 * #@#ORM\Entity
 *
 */
class TipoCampeonato
{
	/**
	 *
	 * @var integer
	 *
	 * #@#ORM\Column(name="id", type="integer", nullable=false)
	 * #@#ORM\Id
	 * #@#ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id; 
	
	/**
	 *
	 * @var integer
	 *
	 * #@#ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre;
	
	/**
	 *
	 * #@#ORM\ManyToOne(targetEntity="Circuito", mappedBy="tipo_campeonatos")
	 */
	private $circuito;
	

	/**
	 *
	 * #@#ORM\OneToMany(targetEntity="Campeonato", inversedBy="tipo_campeonato")
	 */
	private $campeonatos;
}