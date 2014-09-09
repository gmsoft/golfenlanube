<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="institucion")
 * @ORM\Entity
 *
 */
class Institucion
{
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id; 
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre;
	
	/**
	 *
	 * @ORM\OneToOne(targetEntity="Club", mappedBy="institucion", cascade={"persist"})
	 */
	private $club;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Institucion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $club
     * @return Institucion
     */
    public function setClub(\Par3\GolfEnLaNubeBundle\Entity\Club $club = null)
    {
        $this->club = $club;
    
        return $this;
    }

    /**
     * Get club
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }
    
    public function __toString()
    {
    	return $this->getNombre();
    }
}