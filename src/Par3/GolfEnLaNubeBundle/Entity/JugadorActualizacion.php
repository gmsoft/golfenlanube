<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @ORM\Table(name="jugador_actualizacion")
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacionRepository")
 * 
 */
class JugadorActualizacion
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
	 * @ORM\Column(name="id_jugador", type="integer", nullable=false)
	 */
	private $id_jugador; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_club_opcion", type="integer", nullable=true)
	 */
	private $id_club_opcion;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="vigencia", type="date", nullable=true)
	 */
	private $vigencia;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_estandar", type="integer", nullable=true)
	 */
	private $handicap_estandar; 
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_par3", type="integer", nullable=true)
	 */
	private $handicap_par3;


	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="tarjetas_estandar", type="integer", nullable=true)
	 */
	private $tarjetas_estandar;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="tarjetas_par3", type="integer", nullable=true)
	 */
	private $tarjetas_par3;
	
	
	// relaciones 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Jugador")
	 * @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
	 */
	private $jugador; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Club")
	 * @ORM\JoinColumn(name="id_club_opcion", referencedColumnName="id")
	 */
	private $club_opcion;

	// Devuelve la fecha en que finaliza la vigencia de esta actualización
	// Según el cronograma de la AAG , el primer lunes de cada mes toma vigencia cada actualizacion asi que es un día antes
	public function vigenciaHasta()
	{
		$hasta = clone $this->getVigencia();
		$hasta->modify('first monday of next month')->modify('-1 day');
		return $hasta; 
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
     * Set id_jugador
     *
     * @param integer $idJugador
     * @return JugadorActualizacion
     */
    public function setIdJugador($idJugador)
    {
        $this->id_jugador = $idJugador;
    
        return $this;
    }

    /**
     * Get id_jugador
     *
     * @return integer 
     */
    public function getIdJugador()
    {
        return $this->id_jugador;
    }

    /**
     * Set vigencia
     *
     * @param \DateTime $vigencia
     * @return JugadorActualizacion
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;
    
        return $this;
    }

    /**
     * Get vigencia
     *
     * @return \DateTime 
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Set handicap_estandar
     *
     * @param integer $handicapEstandar
     * @return JugadorActualizacion
     */
    public function setHandicapEstandar($handicapEstandar)
    {
        $this->handicap_estandar = $handicapEstandar;
    
        return $this;
    }

    /**
     * Get handicap_estandar
     *
     * @return integer 
     */
    public function getHandicapEstandar()
    {
        return $this->handicap_estandar;
    }

    /**
     * Set handicap_par3
     *
     * @param integer $handicapPar3
     * @return JugadorActualizacion
     */
    public function setHandicapPar3($handicapPar3)
    {
        $this->handicap_par3 = $handicapPar3;
    
        return $this;
    }

    /**
     * Get handicap_par3
     *
     * @return integer 
     */
    public function getHandicapPar3()
    {
        return $this->handicap_par3;
    }

    /**
     * Set tarjetas_estandar
     *
     * @param integer $tarjetasEstandar
     * @return JugadorActualizacion
     */
    public function setTarjetasEstandar($tarjetasEstandar)
    {
        $this->tarjetas_estandar = $tarjetasEstandar;
    
        return $this;
    }

    /**
     * Get tarjetas_estandar
     *
     * @return integer 
     */
    public function getTarjetasEstandar()
    {
        return $this->tarjetas_estandar;
    }

    /**
     * Set tarjetas_par3
     *
     * @param integer $tarjetasPar3
     * @return JugadorActualizacion
     */
    public function setTarjetasPar3($tarjetasPar3)
    {
        $this->tarjetas_par3 = $tarjetasPar3;
    
        return $this;
    }

    /**
     * Get tarjetas_par3
     *
     * @return integer 
     */
    public function getTarjetasPar3()
    {
        return $this->tarjetas_par3;
    }

    /**
     * Set jugador
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador
     * @return JugadorActualizacion
     */
    public function setJugador(\Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador = null)
    {
        $this->jugador = $jugador;
    
        return $this;
    }

    /**
     * Get jugador
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Jugador 
     */
    public function getJugador()
    {
        return $this->jugador;
    }


    /**
     * Set id_club_opcion
     *
     * @param integer $idClubOpcion
     * @return JugadorActualizacion
     */
    public function setIdClubOpcion($idClubOpcion)
    {
        $this->id_club_opcion = $idClubOpcion;
    
        return $this;
    }

    /**
     * Get id_club_opcion
     *
     * @return integer 
     */
    public function getIdClubOpcion()
    {
        return $this->id_club_opcion;
    }

    /**
     * Set club_opcion
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $clubOpcion
     * @return JugadorActualizacion
     */
    public function setClubOpcion(\Par3\GolfEnLaNubeBundle\Entity\Club $clubOpcion = null)
    {
        $this->club_opcion = $clubOpcion;
    
        return $this;
    }

    /**
     * Get club_opcion
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Club 
     */
    public function getClubOpcion()
    {
        return $this->club_opcion;
    }
}