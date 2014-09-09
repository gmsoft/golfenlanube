<?php

namespace Par3\GolfEnLaNubeBundle\Entity; 

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="torneo_fecha_categoria")
 * @ORM\Entity
 *
 */
class TorneoFechaCategoria
{
	
	const MASCULINO = 'm'; 
	const FEMENINO  = 'f'; 
	const UNISEX    = 'u'; 
	
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
	 * @ORM\Column(name="id_torneo_fecha", type="integer", nullable=false)
	 */
	private $id_torneo_fecha; 
	
	/**
	 * Valores válidos  TorneoFechaCategoria::MASCULINO, TorneoFechaCategoria::FEMENINO, TorneoFechaCategoria::UNISEX 
	 * @var string
	 *
	 * @ORM\Column(name="sexo", type="string", length=1, nullable=false)
	 */
	private $sexo;
	
	/**
	 *  
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_min", type="smallint", nullable=true)
	 */
	private $handicap_min;
	
	/**
	 *  
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_max", type="smallint", nullable=true)
	 */
	private $handicap_max; 
	
	/**
	 *  
	 * @var integer
	 *
	 * @ORM\Column(name="jugadores_min", type="smallint", nullable=true)
	 */
	private $jugadores_min; 
	
	
	// relaciones 
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="TorneoFecha", inversedBy="categorias")
	 * @ORM\JoinColumn(name="id_torneo_fecha", referencedColumnName="id")
	 */
	private $torneo_fecha;


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
     * Set id_torneo_fecha
     *
     * @param integer $idTorneoFecha
     * @return TorneoFechaCategoria
     */
    public function setIdTorneoFecha($idTorneoFecha)
    {
        $this->id_torneo_fecha = $idTorneoFecha;
    
        return $this;
    }

    /**
     * Get id_torneo_fecha
     *
     * @return integer 
     */
    public function getIdTorneoFecha()
    {
        return $this->id_torneo_fecha;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return TorneoFechaCategoria
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set handicap_min
     *
     * @param integer $handicapMin
     * @return TorneoFechaCategoria
     */
    public function setHandicapMin($handicapMin)
    {
        $this->handicap_min = $handicapMin;
    
        return $this;
    }

    /**
     * Get handicap_min
     *
     * @return integer 
     */
    public function getHandicapMin()
    {
        return $this->handicap_min;
    }

    /**
     * Set handicap_max
     *
     * @param integer $handicapMax
     * @return TorneoFechaCategoria
     */
    public function setHandicapMax($handicapMax)
    {
        $this->handicap_max = $handicapMax;
    
        return $this;
    }

    /**
     * Get handicap_max
     *
     * @return integer 
     */
    public function getHandicapMax()
    {
        return $this->handicap_max;
    }

    /**
     * Set jugadores_min
     *
     * @param integer $jugadoresMin
     * @return TorneoFechaCategoria
     */
    public function setJugadoresMin($jugadoresMin)
    {
        $this->jugadores_min = $jugadoresMin;
    
        return $this;
    }

    /**
     * Get jugadores_min
     *
     * @return integer 
     */
    public function getJugadoresMin()
    {
        return $this->jugadores_min;
    }

    /**
     * Set torneo_fecha
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $torneoFecha
     * @return TorneoFechaCategoria
     */
    public function setTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $torneoFecha = null)
    {
        $this->torneo_fecha = $torneoFecha;
    
        return $this;
    }

    /**
     * Get torneo_fecha
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha 
     */
    public function getTorneoFecha()
    {
        return $this->torneo_fecha;
    }
}