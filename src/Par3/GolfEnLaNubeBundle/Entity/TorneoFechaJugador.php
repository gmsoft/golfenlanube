<?php

namespace Par3\GolfEnLaNubeBundle\Entity; 

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TorneoJugador
 * 
 * @ORM\Table(name="torneo_fecha_jugador")
 * @ORM\Entity
 */
class TorneoFechaJugador
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
	 * @ORM\Column(name="id_torneo_fecha", type="integer", nullable=false)
	 */
	private $id_torneo_fecha;

	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_jugador", type="integer", nullable=true)
	 */
	private $id_jugador; 

	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_equipo", type="integer", nullable=true)
	 */
	private $id_equipo; 

	/**
	 * 
	 * @var boolean
	 * 
	 * @ORM\Column(name="capitan_equipo", type="boolean", nullable=true)
	 */
	private $capitan_equipo = false; 

	/**
	 * 
	 * @var boolean
	 * 
	 * @ORM\Column(name="titular", type="boolean", nullable=true)
	 */
	private $titular; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_club", type="integer", nullable=true)
	 */
	private $id_club; // club al que pertenece actualmente 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_par3", type="smallint", nullable=true)
	 */
	private $handicap_par3; // handicap par3 actual

	/**
	 * 
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_estandar", type="smallint", nullable=true)
	 */
	private $handicap_estandar; // handicap estandar actual

	/**
	 *
	 * Handicap de juego es el handicap que le contará al jugador en esta fecha en particular
	 * de acuerdo al reglamento establecido por el circuito
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_de_juego", type="smallint", nullable=true)
	 */	
	private $handicap_de_juego;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="posicion_por_neto", type="smallint", nullable=true)
	 */
	private $posicion_por_neto;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="posicion_por_gross", type="smallint", nullable=true)
	 */
	private $posicion_por_gross;
	
	// relaciones
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="TorneoFecha", inversedBy="torneo_fecha_jugadores")
	 * @ORM\JoinColumn(name="id_torneo_fecha", referencedColumnName="id")
	 */
	private $torneo_fecha;
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="torneo_fechas")
	 * @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
	 */
	private $jugador;
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Equipo", inversedBy="torneo_fecha_jugadores")
	 * @ORM\JoinColumn(name="id_equipo", referencedColumnName="id")
	 */
	private $equipo; 

	/**
	 * @ORM\ManyToOne(targetEntity="Club")
	 * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
	 */
	private $club;	

	/**
	 *
	 * @ORM\OneToOne(targetEntity="Tarjeta", mappedBy="torneo_fecha_jugador", cascade={"persist"})
	 */
	private $tarjeta;

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
     * @return TorneoFechaJugador
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
     * Set id_jugador
     *
     * @param integer $idJugador
     * @return TorneoFechaJugador
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
     * Set id_equipo
     *
     * @param integer $idEquipo
     * @return TorneoFechaJugador
     */
    public function setIdEquipo($idEquipo)
    {
        $this->id_equipo = $idEquipo;
    
        return $this;
    }

    /**
     * Get id_equipo
     *
     * @return integer 
     */
    public function getIdEquipo()
    {
        return $this->id_equipo;
    }

    /**
     * Set capitan_equipo
     *
     * @param boolean $capitanEquipo
     * @return TorneoFechaJugador
     */
    public function setCapitanEquipo($capitanEquipo)
    {
        $this->capitan_equipo = $capitanEquipo;
    
        return $this;
    }

    /**
     * Get capitan_equipo
     *
     * @return boolean 
     */
    public function getCapitanEquipo()
    {
        return $this->capitan_equipo;
    }

    /**
     * Set titular
     *
     * @param boolean $titular
     * @return TorneoFechaJugador
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;
    
        return $this;
    }

    /**
     * Get titular
     *
     * @return boolean 
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set id_club
     *
     * @param integer $idClub
     * @return TorneoFechaJugador
     */
    public function setIdClub($idClub)
    {
        $this->id_club = $idClub;
    
        return $this;
    }

    /**
     * Get id_club
     *
     * @return integer 
     */
    public function getIdClub()
    {
        return $this->id_club;
    }

    /**
     * Set handicap_par3
     *
     * @param integer $handicapPar3
     * @return TorneoFechaJugador
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
     * Set handicap_estandar
     *
     * @param integer $handicapEstandar
     * @return TorneoFechaJugador
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
     * Set torneo_fecha
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $torneoFecha
     * @return TorneoFechaJugador
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

    /**
     * Set jugador
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador
     * @return TorneoFechaJugador
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
     * Set equipo
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Equipo $equipo
     * @return TorneoFechaJugador
     */
    public function setEquipo(\Par3\GolfEnLaNubeBundle\Entity\Equipo $equipo = null)
    {
        $this->equipo = $equipo;
    
        return $this;
    }

    /**
     * Get equipo
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Equipo 
     */
    public function getEquipo()
    {
        return $this->equipo;
    }

    /**
     * Set club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $club
     * @return TorneoFechaJugador
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

    /**
     * Set handicap_de_juego
     *
     * @param integer $handicapDeJuego
     * @return TorneoFechaJugador
     */
    public function setHandicapDeJuego($handicapDeJuego)
    {
        $this->handicap_de_juego = $handicapDeJuego;
    
        return $this;
    }

    /**
     * Get handicap_de_juego
     *
     * @return integer 
     */
    public function getHandicapDeJuego()
    {
        return $this->handicap_de_juego;
    }

    /**
     * Set tarjeta
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Tarjeta $tarjeta
     * @return TorneoFechaJugador
     */
    public function setTarjeta(\Par3\GolfEnLaNubeBundle\Entity\Tarjeta $tarjeta = null)
    {
        $this->tarjeta = $tarjeta;
    
        return $this;
    }

    /**
     * Get tarjeta
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Tarjeta 
     */
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set posicion_por_neto
     *
     * @param integer $posicionPorNeto
     * @return TorneoFechaJugador
     */
    public function setPosicionPorNeto($posicionPorNeto)
    {
        $this->posicion_por_neto = $posicionPorNeto;
    
        return $this;
    }

    /**
     * Get posicion_por_neto
     *
     * @return integer 
     */
    public function getPosicionPorNeto()
    {
        return $this->posicion_por_neto;
    }

    /**
     * Set posicion_por_gross
     *
     * @param integer $posicionPorGross
     * @return TorneoFechaJugador
     */
    public function setPosicionPorGross($posicionPorGross)
    {
        $this->posicion_por_gross = $posicionPorGross;
    
        return $this;
    }

    /**
     * Get posicion_por_gross
     *
     * @return integer 
     */
    public function getPosicionPorGross()
    {
        return $this->posicion_por_gross;
    }
}