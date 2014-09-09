<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @ORM\Table(name="temporada")
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TemporadaRepository")
 * 
 */
class Temporada
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
	 * @ORM\Column(name="id_circuito", type="integer", nullable=true)
	 */
	private $id_circuito;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
	 */
	private $nombre; 

	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="inicio", type="date", nullable=false)
	 */
	private $inicio;
	
	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="fin", type="date", nullable=false)
	 */
	private $fin; 

	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Circuito", inversedBy="temporadas")
	 * @ORM\JoinColumn(name="id_circuito", referencedColumnName="id")
	 */
	private $circuito;
	
	/**
	 * @ORM\OneToMany(targetEntity="TemporadaClub", mappedBy="temporada", cascade={"persist"})
	 */
	private $temporada_clubs;
	
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
     * Set id_circuito
     *
     * @param integer $idCircuito
     * @return Temporada
     */
    public function setIdCircuito($idCircuito)
    {
        $this->id_circuito = $idCircuito;
    
        return $this;
    }

    /**
     * Get id_circuito
     *
     * @return integer 
     */
    public function getIdCircuito()
    {
        return $this->id_circuito;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Temporada
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
     * Set inicio
     *
     * @param \DateTime $inicio
     * @return Temporada
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    
        return $this;
    }

    /**
     * Get inicio
     *
     * @return \DateTime 
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     * @return Temporada
     */
    public function setFin($fin)
    {
        $this->fin = $fin;
    
        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime 
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set circuito
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Circuito $circuito
     * @return Temporada
     */
    public function setCircuito(\Par3\GolfEnLaNubeBundle\Entity\Circuito $circuito = null)
    {
        $this->circuito = $circuito;
    
        return $this;
    }

    /**
     * Get circuito
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Circuito 
     */
    public function getCircuito()
    {
        return $this->circuito;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->temporada_clubs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add temporada_clubs
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs
     * @return Temporada
     */
    public function addTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs)
    {
    	$temporadaClubs->setTemporada($this);
        $this->temporada_clubs[] = $temporadaClubs;
    
        return $this;
    }

    /**
     * Remove temporada_clubs
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs
     */
    public function removeTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs)
    {
        $this->temporada_clubs->removeElement($temporadaClubs);
    }

    /**
     * Get temporada_clubs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTemporadaClubs()
    {
        return $this->temporada_clubs;
    }
}