<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Debug;
use Assetic\Cache\ArrayCache;

/**
 * 
 * @ORM\Table(name="equipo")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\EquipoRepository")
 * 
 */
class Equipo
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
	 * @ORM\Column(name="id_club", type="integer", nullable=false)
	 */
	private $id_club; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_temporada_club", type="integer", nullable=true)
	 */
	private $id_temporada_club;
	
	
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
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_posicionante", type="smallint", nullable=true)
	 */
	private $score_posicionante;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_desempate", type="smallint", nullable=true)
	 */
	private $score_desempate;
	
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_gross", type="smallint", nullable=true)
	 */
	private $score_gross;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_neto", type="smallint", nullable=true)
	 */
	private $score_neto;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="posicion", type="smallint", nullable=true)
	 */
	private $posicion; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="puntos_por_posicion", type="smallint", nullable=true)
	 */
	private $puntos_por_posicion;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="puntos_por_participacion", type="smallint", nullable=true)
	 */
	private $puntos_por_participacion;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="puntos_por_gross_individuales", type="smallint", nullable=true)
	 */
	private $puntos_por_gross_individuales;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="puntaje_total", type="smallint", nullable=true)
	 */
	private $puntaje_total;
	
	
	// relaciones 

	/**
	 *
	 * @ORM\OneToMany(targetEntity="TorneoFechaJugador", mappedBy="equipo", cascade={"persist", "remove"})
	 */
	private $torneo_fecha_jugadores; 
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Club")
	 * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
	 */
	private $club; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="TemporadaClub", inversedBy="equipos")
	 * @ORM\JoinColumn(name="id_temporada_club", referencedColumnName="id")
	 */
	private $temporada_club;
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="TorneoFecha", inversedBy="equipos", cascade={"persist", "detach"})
	 * @ORM\JoinColumn(name="id_torneo_fecha", referencedColumnName="id")
	 */
	private $torneo_fecha;

	public function __construct()
	{
		$this->torneo_fecha_jugadores = new ArrayCollection();
	}

	/**
	 * Denota si ya se llenarontodas las tarjetas de los jugadores que debían jugar en el equipo. 
	 * @return boolean
	 */
	public function tarjetasCompletas()
	{
		return ($this->getTorneoFechaJugadoresConTarjeta()->count() == $this->getTorneoFecha()->getTorneo()->getTitularesPorClub());
	}
	
	public function actualizarScoresTotales()
	{
		$reglamento = $this->getTemporadaClub()->getTemporada()->getCircuito()->getInstanciaReglamentoJuego();
		$reglamento->actualizarScoresTotalesEquipo($this);
	}

	/**
	 * 
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getTorneoFechaJugadoresConTarjeta()
	{
		$jugadores = new ArrayCollection();
		foreach ($this->getTorneoFechaJugadores() as $tfj)
		{
			if ( ! is_null($tfj->getTarjeta())) $jugadores->add($tfj);
		}
		return $jugadores;
	}

	public function getTorneoFechaJugadoresConTarjetaOk()
	{
		$jugadores = new ArrayCollection();
		foreach ($this->getTorneoFechaJugadores() as $tfj)
		{
			if ( ! is_null($tfj->getTarjeta()) && $tfj->getTarjeta()->getEstado() == 'OK') $jugadores->add($tfj);
		}
		return $jugadores;
	}

	private function algoritmoOrderTorneoFechaJugadoresByScoreNetoTarjetaAsc(TorneoFechaJugador $a, TorneoFechaJugador $b)
	{
		if ($a->getTarjeta()->getScoreNeto() == $b->getTarjeta()->getScoreNeto()) return 0; 
		return ($a->getTarjeta()->getScoreNeto() < $b->getTarjeta()->getScoreNeto()) ? -1 : 1; 
	}
	
	public function getTorneoFechaJugadoresOrderByScoreNetoAsc()
	{
		$tfjs = $this->getTorneoFechaJugadoresConTarjetaOk()->toArray();
		usort($tfjs, array($this, 'algoritmoOrderTorneoFechaJugadoresByScoreNetoTarjetaAsc'));

		$ret = new ArrayCollection();
		foreach ($tfjs as $tfj ) { $ret->add($tfj); }

		return $ret ; 
	}
	
		
	public function getScoresNetos()
	{
		$scores = array();
		foreach ($this->getTorneoFechaJugadoresConTarjeta() as $tfj)
		{
			$scores[] = $tfj->getTarjeta()->getScoreNeto();
		}
		sort($scores);
		return $scores;
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
     * Set id_club
     *
     * @param integer $idClub
     * @return Equipo
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
     * Set id_torneo_fecha
     *
     * @param integer $idTorneoFecha
     * @return Equipo
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
     * Set nombre
     *
     * @param string $nombre
     * @return Equipo
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
     * Add torneo_fecha_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores
     * @return Equipo
     */
    public function addTorneoFechaJugadore(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores)
    {
    	$torneoFechaJugadores->setEquipo($this);
        $this->torneo_fecha_jugadores[] = $torneoFechaJugadores;
    
        return $this;
    }

    /**
     * Remove torneo_fecha_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores
     */
    public function removeTorneoFechaJugadore(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores)
    {
        $this->torneo_fecha_jugadores->removeElement($torneoFechaJugadores);
    }

    /**
     * Get torneo_fecha_jugadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTorneoFechaJugadores()
    {
        return $this->torneo_fecha_jugadores;
    }

    public function getTorneoFechaJugadoresConJugadorInformado()
    {
    	$tfjs = new ArrayCollection(); 
    	foreach ($this->getTorneoFechaJugadores() as $tfj)
    	{
    		if ( ! is_null($tfj->getJugador())) $tfjs->add($tfj);
    	}
    	return $tfjs;
    }
    
    /**
     * Set club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $club
     * @return Equipo
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
     * Set torneo_fecha
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $torneo_fecha
     * @return Equipo
     */
    public function setTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $torneo_fecha = null)
    {
        $this->torneo_fecha = $torneo_fecha;
    
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
     * Set score_gross
     *
     * @param integer $scoreGross
     * @return Equipo
     */
    public function setScoreGross($scoreGross)
    {
        $this->score_gross = $scoreGross;
    
        return $this;
    }

    /**
     * Get score_gross
     *
     * @return integer 
     */
    public function getScoreGross()
    {
        return $this->score_gross;
    }

    /**
     * Set score_neto
     *
     * @param integer $scoreNeto
     * @return Equipo
     */
    public function setScoreNeto($scoreNeto)
    {
        $this->score_neto = $scoreNeto;
    
        return $this;
    }

    /**
     * Get score_neto
     *
     * @return integer 
     */
    public function getScoreNeto()
    {
        return $this->score_neto;
    }

    /**
     * Set score_posicionante
     *
     * @param integer $scorePosicionante
     * @return Equipo
     */
    public function setScorePosicionante($scorePosicionante)
    {
        $this->score_posicionante = $scorePosicionante;
    
        return $this;
    }

    /**
     * Get score_posicionante
     *
     * @return integer 
     */
    public function getScorePosicionante()
    {
        return $this->score_posicionante;
    }

    /**
     * Set posicion
     *
     * @param integer $posicion
     * @return Equipo
     */
    public function setPosicion($posicion)
    {
        $this->posicion = $posicion;
    
        return $this;
    }

    /**
     * Get posicion
     *
     * @return integer 
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Set puntaje
     *
     * @param integer $puntaje
     * @return Equipo
     */
    public function setPuntaje($puntaje)
    {
    	$this->puntaje = $puntaje;
    
    	return $this;
    }
    
    /**
     * Get puntaje
     *
     * @return integer
     */
    public function getPuntaje()
    {
    	return $this->puntaje;
    }

    
    

    /**
     * Set puntos_por_posicion
     *
     * @param integer $puntosPorPosicion
     * @return Equipo
     */
    public function setPuntosPorPosicion($puntosPorPosicion)
    {
        $this->puntos_por_posicion = $puntosPorPosicion;
    
        return $this;
    }

    /**
     * Get puntos_por_posicion
     *
     * @return integer 
     */
    public function getPuntosPorPosicion()
    {
        return $this->puntos_por_posicion;
    }

    /**
     * Set puntos_por_participacion
     *
     * @param integer $puntosPorParticipacion
     * @return Equipo
     */
    public function setPuntosPorParticipacion($puntosPorParticipacion)
    {
        $this->puntos_por_participacion = $puntosPorParticipacion;
    
        return $this;
    }

    /**
     * Get puntos_por_participacion
     *
     * @return integer 
     */
    public function getPuntosPorParticipacion()
    {
        return $this->puntos_por_participacion;
    }

    /**
     * Set puntos_por_gross_individuales
     *
     * @param integer $puntosPorGrossIndividuales
     * @return Equipo
     */
    public function setPuntosPorGrossIndividuales($puntosPorGrossIndividuales)
    {
        $this->puntos_por_gross_individuales = $puntosPorGrossIndividuales;
    
        return $this;
    }

    /**
     * Get puntos_por_gross_individuales
     *
     * @return integer 
     */
    public function getPuntosPorGrossIndividuales()
    {
        return $this->puntos_por_gross_individuales;
    }

    /**
     * Set puntaje_total
     *
     * @param integer $puntajeTotal
     * @return Equipo
     */
    public function setPuntajeTotal($puntajeTotal)
    {
        $this->puntaje_total = $puntajeTotal;
    
        return $this;
    }

    /**
     * Get puntaje_total
     *
     * @return integer 
     */
    public function getPuntajeTotal()
    {
        return $this->puntaje_total;
    }

    /**
     * Set id_temporada_club
     *
     * @param integer $idTemporadaClub
     * @return Equipo
     */
    public function setIdTemporadaClub($idTemporadaClub)
    {
        $this->id_temporada_club = $idTemporadaClub;
    
        return $this;
    }

    /**
     * Get id_temporada_club
     *
     * @return integer 
     */
    public function getIdTemporadaClub()
    {
        return $this->id_temporada_club;
    }

    /**
     * Set temporada_club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClub
     * @return Equipo
     */
    public function setTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClub = null)
    {
        $this->temporada_club = $temporadaClub;
    
        return $this;
    }

    /**
     * Get temporada_club
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub 
     */
    public function getTemporadaClub()
    {
        return $this->temporada_club;
    }

    /**
     * Set score_desempate
     *
     * @param integer $scoreDesempate
     * @return Equipo
     */
    public function setScoreDesempate($scoreDesempate)
    {
        $this->score_desempate = $scoreDesempate;
    
        return $this;
    }

    /**
     * Get score_desempate
     *
     * @return integer 
     */
    public function getScoreDesempate()
    {
        return $this->score_desempate;
    }
}