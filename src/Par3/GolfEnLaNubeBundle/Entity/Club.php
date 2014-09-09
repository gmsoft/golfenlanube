<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyProject\Proxies\__CG__\OtherProject\Proxies\__CG__\stdClass;

/**
 *
 * @ORM\Table(name="club")
 * @ORM\Entity
 *
 */
class Club
{
	/**
	 *
	 * El Id del Club es el mismo que el codigo que interno con que los identifica la AAG
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	private $id;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_institucion", type="integer", nullable=false)
	 */
	private $id_institucion;


	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre;


	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="pendiente_actualizacion", type="boolean", nullable=true)
	 */
	private $pendiente_actualizacion ;
	
	// relaciones
	
	/**
	 * 
	 * @ORM\OneToOne(targetEntity="Institucion", inversedBy="club", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
	 */
	private $institucion; 

	/**
	 *
	 * @ORM\OneToMany(targetEntity="Cancha", mappedBy="club", cascade={"persist"})
	 */
	private $canchas;

	/**
	 * @ORM\OneToMany(targetEntity="TemporadaClub", mappedBy="club")
	 */
	private $temporada_clubs;
	
	
	public static function nuevoClub($codigo_aag, $nombre = null)
	{
		$institucion = new Institucion() ;
		
		$club = new Club();
		$club->setInstitucion($institucion);
		$club->setCodigoAag($codigo_aag);
		if ( ! $nombre ) $club->setPendienteActualizacion(true);
		else $club->setNombre($nombre);

		return ($club);
	}
	
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
     * Set id_institucion
     *
     * @param integer $idInstitucion
     * @return Club
     */
    public function setIdInstitucion($idInstitucion)
    {
        $this->id_institucion = $idInstitucion;
    
        return $this;
    }

    /**
     * Get id_institucion
     *
     * @return integer 
     */
    public function getIdInstitucion()
    {
        return $this->id_institucion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Club
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
     * Set institucion
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Institucion $institucion
     * @return Club
     */
    public function setInstitucion(\Par3\GolfEnLaNubeBundle\Entity\Institucion $institucion = null)
    {
        $this->institucion = $institucion;
    
        return $this;
    }

    /**
     * Get institucion
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Institucion 
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->canchas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->temporada_clubs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * 
     * @param string $linea
     * @return \Par3\GolfEnLaNubeBundle\Entity\Club
     */
    public static function crearDeFormatoAag($linea)
    {
    	$codigo_aag = substr($linea, 0, 3);
    	$nombre = utf8_encode(trim(substr($linea, 3, 30)));

    	$institucion = new Institucion();
 		   	$institucion->setNombre($nombre);
    	$club = new Club();
	    	$club->setCodigoAag($codigo_aag);
	    	$club->setNombre($nombre);
	    	$club->setInstitucion($institucion);
    	
    	return $club;
    }
    
    /**
     * Add canchas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Cancha $canchas
     * @return Club
     */
    public function addCancha(\Par3\GolfEnLaNubeBundle\Entity\Cancha $canchas)
    {
    	$canchas->setClub($this);
        $this->canchas[] = $canchas;

        return $this;
    }

    /**
     * Remove canchas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Cancha $canchas
     */
    public function removeCancha(\Par3\GolfEnLaNubeBundle\Entity\Cancha $canchas)
    {
        $this->canchas->removeElement($canchas);
    }

    /**
     * Get canchas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCanchas()
    {
        return $this->canchas;
    }
    
    public function tieneCanchaNumero($numero)
    {
    	foreach ($this->getCanchas() as $cancha)
    	{
    		if ($cancha->getNumero() == $numero) return true;
    	}
    	return false;
    }

    public function getCanchaNumero($numero)
    {
    	foreach ($this->getCanchas() as $cancha)
    	{
    		if ($cancha->getNumero() == $numero) return $cancha;
    	}
    	return null;
    }
    
    public function __toString()
    {
    	return $this->getId() . ' - ' . $this->getNombre();
    }

    /**
     * Set codigo_aag
     *
     * @param integer $codigoAag
     * @return Club
     */
    public function setCodigoAag($codigoAag)
    {
        $this->setId($codigoAag);
    
        return $this;
    }

    /**
     * Get codigo_aag
     *
     * @return integer 
     */
    public function getCodigoAag()
    {
        return $this->getId();
    }

    /**
     * Set pendiente_actualizacion
     *
     * @param boolean $pendienteActualizacion
     * @return Club
     */
    public function setPendienteActualizacion($pendienteActualizacion)
    {
        $this->pendiente_actualizacion = $pendienteActualizacion;
    
        return $this;
    }

    /**
     * Get pendiente_actualizacion
     *
     * @return boolean 
     */
    public function getPendienteActualizacion()
    {
        return $this->pendiente_actualizacion;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Club
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Add temporada_clubs
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs
     * @return Club
     */
    public function addTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClubs)
    {
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