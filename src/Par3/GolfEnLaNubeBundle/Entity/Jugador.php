<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
use Doctrine\Common\Util\Debug;

/**
 * @ORM\Table(name="jugador")
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\JugadorRepository")
 *
 */
class Jugador
{
	
	/**
	 * 
	 * El id del jugador es su numero de matricula en la AAG 
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id", type="integer", unique=true, nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="NONE")
	 */
	private $id; 
	
	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_persona", type="integer", nullable=true)
	 */
	private $id_persona; 
	
	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_club", type="integer", nullable=true)
	 */
	private $id_club; 

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_par3", type="smallint", nullable=false)
	 */
	private $handicap_par3 = 25;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="handicap_estandar", type="smallint", nullable=false)
	 */
	private $handicap_estandar = 36; 
	
	
	// relaciones
	
	/**
	 * 
	 * @ORM\OneToOne(targetEntity="Persona", inversedBy="jugador", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
	 */
	private $persona; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Club")
	 * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
	 */
	private $club;

	/**
	 * 
	 * @ORM\OneToMany(targetEntity="TorneoFechaJugador", mappedBy="jugador")
	 */
	private $torneo_fechas; 

	/**
	 *
	 * @ORM\OneToMany(targetEntity="TemporadaClubJugador", mappedBy="jugador")
	 */
	private $temporada_club_jugadores;
	
	/**
	 *
	 * @ORM\OneToMany(targetEntity="JugadorActualizacion", mappedBy="jugador", cascade={"persist"})
	 */
	private $actualizaciones;
	
	public function __construct()
	{
		$this->torneo_fechas = new ArrayCollection();
		$this->actualizaciones = new ArrayCollection();
	}

	public function __toString()
	{
		return $this->getId() .  ' - ' . $this->getPersona()->getNombreCompleto();
	}
	
	public function totalTarjetasPar3()
	{
		$total = 0 ;
		foreach ($this->getActualizaciones() as $actualizacion)
		{
			$total += $actualizacion->getTarjetasPar3() ;
		}
		return $total ;
	}
	
	public function totalTarjetasEstandar()
	{
		$total = 0 ;
		foreach ($this->getActualizaciones() as $actualizacion)
		{
			$total += $actualizacion->getTarjetasEstandar() ;
		}
		return $total ;
	}
	
	public function totalPar3Ultimos12Meses()
	{
		$total = 0 ; 

		foreach ( $this->actualizacionesNMesesAnterioresAFecha(new \DateTime(), 12 ) as $actualizacion)
		{
			   $total += $actualizacion->getTarjetasPar3() ;
		} 
		return $total ;
	}
	
	public function totalEstandarUltimos12Meses()
	{
		$total = 0 ; 

		foreach ( $this->actualizacionesNMesesAnterioresAFecha(new \DateTime(), 12 ) as $actualizacion)
		{
		   $total += $actualizacion->getTarjetasEstandar() ;
		} 
		return $total ;
	}

	public function cumpleTarjetas()
	{
		return (	$this->actualizacionesNMesesAnterioresAFecha(new \DateTime(), 12 )->count() > 0   &&  
						($this->totalPar3Ultimos12Meses() + $this->totalEstandarUltimos12Meses())  >= 12 );
	}

	public function cumpleTarjetasPar3()
	{
		return ($this->totalPar3Ultimos12Meses() >= 12);
	}
	
	public $tabla_equivalencia = array(
			'+3' => '+3',
			'+2' => '+3',
			'+1' => '+3',
			0 => '+3',
			1 => '+2',
			2 => '+1',
			3 => 0,
			4 => 1,
			5 => 2,
			6 => 2,
			7 => 3,
			8 => 4,
			9 => 5,
			10 => 7,
			11 => 8,
			12 => 8,
			13 => 9,
			14 => 10,
			15 => 11,
			16 => 11,
			17 => 12,
			18 => 13,
			19 => 13,
			20 => 14,
			21 => 15,
			22 => 15,
			23 => 16,
			24 => 17,
			25 => 18,
			26 => 18,
			27 => 19,
			28 => 20,
			29 => 20,
			30 => 21,
			31 => 22,
			32 => 22,
			33 => 23,
			34 => 24,
			35 => 25,
			36 => 25
		);
	
	
	
	
	
	/**
	 * Denota el handicap a utilizar en un Torneo del Circuito Par3 de acuerdo a si cumple o no con la cantidad 
	 * de tarjetas necesarias en los ultimos 12 meses utilizando la tabla de equivalencias provista por el reglamento 
	 * de juego del Circuito Par3.
	 * PRECONDICION: Se asume que el jugador cumple con la cantidad de tarjetas requeridas entre par3 y std
	 *
	 * @return number|Ambigous <multitype:string number , number>
	 */
	public function handicapDeJuego()
	{
		return $this->handicapDeJuegoParaFecha(new \DateTime());
	}

	public function hayActualizacionEnMesDeFecha(\DateTime $fecha)
	{
		foreach ($this->getActualizacionesOrderByVigenciaDesc() as $actualizacion)
		{
			if ($actualizacion->getVigencia()->format('m') == $fecha->format('m') && $actualizacion->getVigencia()->format('Y') == $fecha->format('Y'))
			{
				return true;
			}
		}
		return false; 
	}
	
	/**
	 * 
	 * @param \DateTime $fecha
	 * @return \Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion
	 */
	public function actualizacionEnMesDeFecha(\DateTime $fecha)
	{
		foreach ($this->getActualizacionesOrderByVigenciaDesc() as $actualizacion)
		{
			if ($actualizacion->getVigencia()->format('m') == $fecha->format('m') && $actualizacion->getVigencia()->format('Y') == $fecha->format('Y'))
			{
				return ($actualizacion);
			}
		}
	}

	/**
	 * 
	 * @param \DateTime $fecha
	 * @param number $n
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function actualizacionesNMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
	{
		$ret = new ArrayCollection();

		$inicio = clone $fecha;
		$inicio->modify('first day of -' . $n . ' month');
		
		$actualizaciones = $this->getActualizacionesOrderByVigenciaDesc();
		foreach ($actualizaciones as $actualizacion)
		{
			if ( $fecha >= $actualizacion->getVigencia()   && $actualizacion->getVigencia() >= $inicio ) 
			{
				$ret->add($actualizacion);
			}
		}
		
		return $ret;
		
	}

	/**
	 * 
	 * @param \DateTime $fecha
	 * @param number $n
	 * @return number
	 */
	public function totalPar3NMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
	{
		$total = 0 ;
		
		foreach ( $this->actualizacionesNMesesAnterioresAFecha($fecha, 12) as $actualizacion)
		{
			$total += $actualizacion->getTarjetasPar3() ;
		}
		return $total ;
		
	}
	
	/**
	 * 
	 * @param \DateTime $fecha
	 * @param number $n
	 * @return number
	 */
	public function totalEstandarNMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
	{
		$total = 0 ;
		
		foreach ( $this->actualizacionesNMesesAnterioresAFecha($fecha, 12) as $actualizacion)
		{
			$total += $actualizacion->getTarjetasEstandar() ;
		}
		return $total ;
		
	}

	/**
	 * 
	 * @param \Datetime $fecha
	 * @return boolean
	 */
	public function cumpleTarjetasPar3ParaFecha(\Datetime $fecha)
	{
		return ($this->totalPar3NMesesAnterioresAFecha($fecha, 12) >= 12);
	}
	
	/**
	 * 
	 * @param \Datetime $fecha
	 * @return boolean
	 */
	public function cumpleTarjetasParaFecha(\Datetime $fecha)
	{
		return (($this->totalPar3NMesesAnterioresAFecha($fecha, 12) + $this->totalEstandarNMesesAnterioresAFecha($fecha, 12)) >= 12);
	}
	
	/**
	 * 
	 * @param \DateTime $fecha
	 * @return JugadorActualizacion|NULL
	 */
	public function actualizacionMasProximaAFecha(\DateTime $fecha)
	{
		foreach ($this->getActualizacionesOrderByVigenciaDesc() as $actualizacion)
		{
			if ($actualizacion->getVigencia() < $fecha) return $actualizacion;
		}
		return null;
	}
	
	public function handicapDeJuegoParaFechaActual()
	{
		$fecha = new \DateTime();
		return $this->handicapDeJuegoParaFecha($fecha);
	}
	
	/**
	 * 
	 * @param \DateTime $fecha
	 * @return number|Ambigous <multitype:string number , number>
	 */
	public function handicapDeJuegoParaFecha(\DateTime $fecha)
	{
		if ( $this->hayActualizacionEnMesDeFecha($fecha) && $this->actualizacionEnMesDeFecha($fecha)->getVigencia() < $fecha) 
		{
			$fecha_referencia = clone $this->actualizacionEnMesDeFecha($fecha)->getVigencia();
		} else {
			$fecha_referencia = clone $fecha;
			$fecha_referencia->modify('last day of -1 month');
			$fecha_referencia->setTime(23,59,59);
		}
		
		$actualizacion_mas_reciente = $this->actualizacionesNMesesAnterioresAFecha($fecha_referencia, 12)->first();
		
		if ($this->cumpleTarjetasPar3ParaFecha($fecha_referencia))
		{
			return $actualizacion_mas_reciente->getHandicapPar3();
		} else {
			return ( $actualizacion_mas_reciente->getHandicapPar3() < $this->tabla_equivalencia[ $actualizacion_mas_reciente->getHandicapEstandar() ] ) ?
					$actualizacion_mas_reciente->getHandicapPar3() :
					$this->tabla_equivalencia[ $actualizacion_mas_reciente->getHandicapEstandar() ];
					
		}
	}
	
	public static function crearUsuarioJugador($matricula, Club $club = null, $nombre_completo = null, $sexo = 'M', $email = null)
	{
		if ( is_null($email)) $email = $matricula . '@golfenlanube.com';
		$user = new User();
		$user->setUsername($matricula);
		$user->setPlainPassword($matricula);
		if ( !is_null($club))	$user->setInstitucion($club->getInstitucion());
		$user->setEmail($email);
		$user->setEnabled(true);

		$persona = new Persona();
		$persona->setNombreCompleto($nombre_completo);
		$persona->setSexo($sexo);
		$persona->setUsuario($user);
		if ( is_null($nombre_completo)) $persona->setPendienteActualizacion(true);

		$jugador = new Jugador();
		$jugador->setClub($club);
		$jugador->setPersona($persona);
		$jugador->setMatriculaAag($matricula);

		return $jugador; 
	}

	public function actualizarHandicapsAUltimoVigente()
	{
		$ultima_actualizacion = $this->getActualizacionesOrderByVigenciaDesc()->first();

		if ( ! is_null($ultima_actualizacion))
		{
			$this->setHandicapEstandar($ultima_actualizacion->getHandicapEstandar());
			$this->setHandicapPar3($ultima_actualizacion->getHandicapPar3());
		}
	}
	
	/**
	 * 
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function getActualizacionesOrderByVigenciaDesc()
	{
		$a = $this->getActualizaciones()->toArray();
		usort($a, array($this, 'algoritmoOrderActualizacionesByVigenciaDesc'));
 
		$ret = new ArrayCollection();
		foreach($a as $actualizacion) $ret->add($actualizacion);

		return $ret;		
	}
	
	private function algoritmoOrderActualizacionesByVigenciaDesc(JugadorActualizacion $a, JugadorActualizacion $b)
	{
		if ($a->getVigencia() == $b->getVigencia())
		{
			return 0;
		} 
		return ($a->getVigencia() > $b->getVigencia()) ? -1 : 1;
	}
	
    /**
     * Get usuario
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->getPersona()->getUsuario();
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
     * Set id_persona
     *
     * @param integer $idPersona
     * @return Jugador
     */
    public function setIdPersona($idPersona)
    {
        $this->id_persona = $idPersona;
    
        return $this;
    }

    /**
     * Get id_persona
     *
     * @return integer 
     */
    public function getIdPersona()
    {
        return $this->id_persona;
    }

    /**
     * Set id_club
     *
     * @param integer $idClub
     * @return Jugador
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
     * Set matricula_aag
     *
     * @param integer $matriculaAag
     * @return Jugador
     */
    public function setMatriculaAag($matriculaAag)
    {
        $this->setId($matriculaAag);
    
        return $this;
    }

    /**
     * Get matricula_aag
     *
     * @return integer 
     */
    public function getMatriculaAag()
    {
        return $this->getId();
    }

    /**
     * Set handicap_par3
     *
     * @param integer $handicapPar3
     * @return Jugador
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
     * @return Jugador
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
     * Set persona
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Persona $persona
     * @return Jugador
     */
    public function setPersona(\Par3\GolfEnLaNubeBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;
    
        return $this;
    }

    /**
     * Get persona
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $club
     * @return Jugador
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
     * Add torneo_fechas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas
     * @return Jugador
     */
    public function addTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas)
    {
        $this->torneo_fechas[] = $torneoFechas;
    
        return $this;
    }

    /**
     * Remove torneo_fechas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas
     */
    public function removeTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas)
    {
        $this->torneo_fechas->removeElement($torneoFechas);
    }

    /**
     * Get torneo_fechas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTorneoFechas()
    {
        return $this->torneo_fechas;
    }

    /**
     * Add actualizaciones
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones
     * @return Jugador
     */
    public function addActualizacione(\Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones)
    {
    	$actualizaciones->setJugador($this);
        $this->actualizaciones[] = $actualizaciones;
    
        return $this;
    }

    /**
     * Remove actualizaciones
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones
     */
    public function removeActualizacione(\Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones)
    {
        $this->actualizaciones->removeElement($actualizaciones);
    }

    /**
     * Get actualizaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActualizaciones()
    {
        return $this->actualizaciones;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Jugador
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Add temporada_club_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores
     * @return Jugador
     */
    public function addTemporadaClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores)
    {
        $this->temporada_club_jugadores[] = $temporadaClubJugadores;
    
        return $this;
    }

    /**
     * Remove temporada_club_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores
     */
    public function removeTemporadaClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores)
    {
        $this->temporada_club_jugadores->removeElement($temporadaClubJugadores);
    }

    /**
     * Get temporada_club_jugadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTemporadaClubJugadores()
    {
        return $this->temporada_club_jugadores;
    }
}