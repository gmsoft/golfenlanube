<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Util\Debug;

/**
 * TorneoFecha
 * 
 * @ORM\Table(name="torneo_fecha")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TorneoFechaRepository")
 */
class TorneoFecha
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
	 * @ORM\Column(name="id_torneo", type="integer", nullable=false)
	 */
	private $id_torneo; 
	
	/**
	 * Cancha donde se va a disputar el torneo
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_cancha", type="integer", nullable=false)
	 */
	private $id_cancha;

	/**
	 * 
	 * Valor numérico del orden de la fecha.  
	 * 
	 * @ORM\Column(name="numero_fecha", type="smallint", nullable=false)
	 */
	private $numero_fecha = 1; 

	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="apertura_incripcion", type="date", nullable=true)
	 */
	private $apertura_inscripcion;
	
	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="cierre_incripcion", type="date", nullable=true)
	 */
	private $cierre_inscripcion;
	
	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="apertura_incripcion_no_socios", type="date", nullable=true)
	 */
	private $apertura_inscripcion_no_socios;
	
	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="cierre_inscripcion_no_socios", type="date", nullable=true)
	 */
	private $cierre_inscripcion_no_socios;
	
	/**
	 *
	 * La fecha en que se juega el torneo. 
	 *
	 * @var date
	 *
	 * @ORM\Column(name="fecha", type="date", nullable=false)
	 */
	private $fecha;

	/**
	 * Cantidad de hoyos que se juegan en esta fecha.
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="hoyos", type="smallint", nullable=false)
	 */
	private $hoyos ;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="categorias_masculinas", type="smallint", nullable=false)
	 */
	private $categorias_masculinas = 0; 
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="categorias_femeninas", type="smallint", nullable=false)
	 */
	private $categorias_femeninas = 0; 
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="jugadores_por_linea", type="smallint", nullable=true)
	 */
	private $jugadores_por_linea;
	
	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="salidas_simultaneas", type="boolean", nullable=true)
	 */
	private $salidas_simultaneas = false; 
	
	/**
	 *
	 * @var time
	 *
	 * @ORM\Column(name="ultima_salida", type="time", nullable=true)
	 */
	private $ultima_salida; 

	/**
	 * Denota la frecuencia de salida en minutos
	 * @var smallint
	 * 
	 * @ORM\Column(name="frecuencia_salida", type="smallint", nullable=true)
	 */
	private $frecuencia_salida;

	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="concluido", type="boolean", nullable=true)
	 */
	private $concluido = false; 

	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="habilitar_carga_resultados", type="boolean", nullable=true)
	 */
	private $habilitar_carga_resultados = true;

	
	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="suspendido", type="boolean", nullable=true)
	 */	
	private $suspendido = false; 
	
	
	// relaciones
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Torneo", inversedBy="fechas", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_torneo", referencedColumnName="id")
	 * 
	 * #@Assert\Type(type="GolfEnLaNube\Bundle\Entity\Torneo")
	 */
	private $torneo; 
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Cancha")
	 * @ORM\JoinColumn(name="id_cancha", referencedColumnName="id")
	 * 
	 * 
	 */
	private $cancha; 
	
	/**
	 * 
	 * @ORM\OneToMany(targetEntity="TorneoFechaCategoria", mappedBy="torneo_fecha", cascade={"persist"})
	 */
	private $categorias; 

	/**
	 *
	 * @ORM\OneToMany(targetEntity="Equipo", mappedBy="torneo_fecha", cascade={"persist"})
	 */
	private $equipos;
	
	/**
	 *  
	 * @ORM\OneToMany(targetEntity="TorneoFechaJugador", mappedBy="torneo_fecha", cascade={"persist"})
	 */
	private $torneo_fecha_jugadores;
	
	public function limpiarPosicionesTorneoFechaJugadores()
	{
		foreach ($this->getTorneoFechaJugadores() as $tfj )
		{
			$tfj->setPosicionPorGross(null);
			$tfj->setPosicionPorNeto(null);
		}
	}

	public function limpiarPosicionesEquipos()
	{
		foreach ($this->getEquipos() as $e )
		{
			$e->setPosicion(null);
			$e->setScoreDesempate(null);
		}
	}

	public function limpiarPuntajesEquipos()
	{
		foreach ($this->getEquipos() as $e )
		{
			$e->setPuntaje(null);
			$e->setPuntajeTotal(null);
			$e->setPuntosPorGrossIndividuales(null);
			$e->setPuntosPorParticipacion(null);
			$e->setPuntosPorPosicion(null);
		}
	}
	
	public function tieneEquipoDeTemporadaClub(TemporadaClub $tc) 
	{
		foreach ($this->getEquipos() as $e)
		{
			if ($e->getTemporadaClub()->getId() == $tc->getId()) return true;
		}
		return false; 
	}
	
	/**
	 * PRECONDICION: Se asume que el jugador de id = $id existe
	 * @param int $id
	 * @return \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador
	 */
	public function getTorneoFechaJugadorPorId($id)
	{
		foreach ($this->getTorneoFechaJugadores() as $tfj )
		{
			if ($tfj->getIdJugador() == $id)
			{
				return $tfj;
			}
		}
	}
	
	public function actualizarScoresPosicionesYPuntajes()
	{
		$this->actualizarScoresTotalesJugadores();
		$this->actualizarScoresTotalesEquipos();
		$this->actualizarPosicionesJugadores();
		$this->actualizarPosicionesEquipos();
		$this->actualizarPuntajesEquipos();
	}

	public function actualizarPuntajesEquipos()
	{
		$reglamento = $this->getTorneo()->getTemporada()->getCircuito()->getInstanciaReglamentoJuego();
		$reglamento->actualizarPuntajesEquiposEnTorneoFecha($this);
	}
	
	public function actualizarScoresTotalesJugadores()
	{
		foreach ($this->getTorneoFechaJugadoresConTarjeta() as $tfj)
		{
			$tfj->getTarjeta()->actualizarScoresTotales();
		}
	}
	
	public function actualizarScoresTotalesEquipos()
	{
		foreach ($this->getEquipos() as $equipo)
		{
			$equipo->actualizarScoresTotales();
		}
	}
	
	public function actualizarPosicionesEquipos()
	{
		$reglamento = $this->getTorneo()->getTemporada()->getCircuito()->getInstanciaReglamentoJuego();
		$reglamento->actualizarPosicionesEquiposEnTorneoFecha($this);
	}

	public function actualizarPosicionesJugadores()
	{
		$reglamento = $this->getTorneo()->getTemporada()->getCircuito()->getInstanciaReglamentoJuego();
		$reglamento->actualizarPosicionesJugadoresEnTorneoFecha($this);
	}

	public function __construct()
	{
		$this->categorias = new ArrayCollection();
		$this->tarjetas = new ArrayCollection();
		$this->equipos = new ArrayCollection();
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
     * Set id_torneo
     *
     * @param integer $idTorneo
     * @return TorneoFecha
     */
    public function setIdTorneo($idTorneo)
    {
        $this->id_torneo = $idTorneo;
    
        return $this;
    }

    /**
     * Get id_torneo
     *
     * @return integer 
     */
    public function getIdTorneo()
    {
        return $this->id_torneo;
    }

    /**
     * Set id_cancha
     *
     * @param integer $idCancha
     * @return TorneoFecha
     */
    public function setIdCancha($idCancha)
    {
        $this->id_cancha = $idCancha;
    
        return $this;
    }

    /**
     * Get id_cancha
     *
     * @return integer 
     */
    public function getIdCancha()
    {
        return $this->id_cancha;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return TorneoFecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set categorias_masculinas
     *
     * @param integer $categoriasMasculinas
     * @return TorneoFecha
     */
    public function setCategoriasMasculinas($categoriasMasculinas)
    {
        $this->categorias_masculinas = $categoriasMasculinas;
    
        return $this;
    }

    /**
     * Get categorias_masculinas
     *
     * @return integer 
     */
    public function getCategoriasMasculinas()
    {
        return $this->categorias_masculinas;
    }

    /**
     * Set categorias_femeninas
     *
     * @param integer $categoriasFemeninas
     * @return TorneoFecha
     */
    public function setCategoriasFemeninas($categoriasFemeninas)
    {
        $this->categorias_femeninas = $categoriasFemeninas;
    
        return $this;
    }

    /**
     * Get categorias_femeninas
     *
     * @return integer 
     */
    public function getCategoriasFemeninas()
    {
        return $this->categorias_femeninas;
    }

    /**
     * Set jugadores_por_linea
     *
     * @param integer $jugadoresPorLinea
     * @return TorneoFecha
     */
    public function setJugadoresPorLinea($jugadoresPorLinea)
    {
        $this->jugadores_por_linea = $jugadoresPorLinea;
    
        return $this;
    }

    /**
     * Get jugadores_por_linea
     *
     * @return integer 
     */
    public function getJugadoresPorLinea()
    {
        return $this->jugadores_por_linea;
    }

    /**
     * Set salidas_simultaneas
     *
     * @param boolean $salidasSimultaneas
     * @return TorneoFecha
     */
    public function setSalidasSimultaneas($salidasSimultaneas)
    {
        $this->salidas_simultaneas = $salidasSimultaneas;
    
        return $this;
    }

    /**
     * Get salidas_simultaneas
     *
     * @return boolean 
     */
    public function getSalidasSimultaneas()
    {
        return $this->salidas_simultaneas;
    }

    /**
     * Set ultima_salida
     *
     * @param \DateTime $ultimaSalida
     * @return TorneoFecha
     */
    public function setUltimaSalida($ultimaSalida)
    {
        $this->ultima_salida = $ultimaSalida;
    
        return $this;
    }

    /**
     * Get ultima_salida
     *
     * @return \DateTime 
     */
    public function getUltimaSalida()
    {
        return $this->ultima_salida;
    }

    /**
     * Set frecuencia_salida
     *
     * @param integer $frecuenciaSalida
     * @return TorneoFecha
     */
    public function setFrecuenciaSalida($frecuenciaSalida)
    {
        $this->frecuencia_salida = $frecuenciaSalida;
    
        return $this;
    }

    /**
     * Get frecuencia_salida
     *
     * @return integer 
     */
    public function getFrecuenciaSalida()
    {
        return $this->frecuencia_salida;
    }

    /**
     * Set suspendido
     *
     * @param boolean $suspendido
     * @return TorneoFecha
     */
    public function setSuspendido($suspendido)
    {
        $this->suspendido = $suspendido;
    
        return $this;
    }

    /**
     * Get suspendido
     *
     * @return boolean 
     */
    public function getSuspendido()
    {
        return $this->suspendido;
    }

    /**
     * Set torneo
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Torneo $torneo
     * @return TorneoFecha
     */
    public function setTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneo = null)
    {
        $this->torneo = $torneo;
    
        return $this;
    }

    /**
     * Get torneo
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Torneo 
     */
    public function getTorneo()
    {
        return $this->torneo;
    }

    /**
     * Set cancha
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Cancha $cancha
     * @return TorneoFecha
     */
    public function setCancha(\Par3\GolfEnLaNubeBundle\Entity\Cancha $cancha = null)
    {
        $this->cancha = $cancha;
    
        return $this;
    }

    /**
     * Get cancha
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Cancha 
     */
    public function getCancha()
    {
        return $this->cancha;
    }

    /**
     * Add categorias
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaCategoria $categorias
     * @return TorneoFecha
     */
    public function addCategoria(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaCategoria $categorias)
    {
        $this->categorias[] = $categorias;
    
        return $this;
    }

    /**
     * Remove categorias
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaCategoria $categorias
     */
    public function removeCategoria(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaCategoria $categorias)
    {
        $this->categorias->removeElement($categorias);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Add torneo_fecha_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores
     * @return TorneoFecha
     */
    public function addTorneoFechaJugadore(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugadores)
    {
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

    /**
     * Add equipos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Equipo $equipos
     * @return TorneoFecha
     */
    public function addEquipo(\Par3\GolfEnLaNubeBundle\Entity\Equipo $equipos)
    {
        $this->equipos[] = $equipos;
    
        return $this;
    }

    /**
     * Remove equipos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Equipo $equipos
     */
    public function removeEquipo(\Par3\GolfEnLaNubeBundle\Entity\Equipo $equipos)
    {
        $this->equipos->removeElement($equipos);
    }

    /**
     * Get equipos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipos()
    {
        return $this->equipos;
    }

    private function algoritmoOrderEquiposByPosicion(Equipo $a, Equipo $b)
    {
		return  ($a->getPosicion() < $b->getPosicion()) ? -1 : 1; 
    }

    private function algoritmoOrderEquiposByPuntosPorPosicion(Equipo $a, Equipo $b)
    {
    	return  ($a->getPuntosPorPosicion() > $b->getPuntosPorPosicion()) ? -1 : 1;
    }
    
    public function getEquiposOrderByPosicion()
    {
    	$res = new ArrayCollection();
    	$equipos = $this->getEquipos()->toArray();
    	usort($equipos, array($this,'algoritmoOrderEquiposByPosicion'));
    	foreach ($equipos as $e)
    	{
    		$res->add($e);
    	} 
    	return $res; 
    }
    
    public function getEquiposOrderByPuntosPorPosicion()
    {
    	$res = new ArrayCollection();
    	$equipos = $this->getEquipos()->toArray();
    	usort($equipos, array($this,'algoritmoOrderEquiposByPuntosPorPosicion'));
    	foreach ($equipos as $e)
    	{
    		$res->add($e);
    	}
    	return $res;
    }

    private function algoritmoOrderEquiposByPuntajeTotal(Equipo $a, Equipo $b)
    {
    	if ($a->getPuntajeTotal() == $b->getPuntajeTotal())
    	{
    		 return ($a->getPuntosPorPosicion() > $b->getPuntosPorPosicion()) ? -1 : 1; 
    	}
    	return  ($a->getPuntajeTotal() > $b->getPuntajeTotal()) ? -1 : 1;
    }
    
    public function getEquiposOrderByPuntosPorPuntajeTotal()
    {
    	$res = new ArrayCollection();
    	$equipos = $this->getEquipos()->toArray();
    	usort($equipos, array($this,'algoritmoOrderEquiposByPuntajeTotal'));
    	foreach ($equipos as $e)
    	{
    		$res->add($e);
    	}
    	return $res;
    }
    
    
    /**
     * Set concluido
     *
     * @param boolean $concluido
     * @return TorneoFecha
     */
    public function setConcluido($concluido)
    {
        $this->concluido = $concluido;
    
        return $this;
    }

    /**
     * Get concluido
     *
     * @return boolean 
     */
    public function getConcluido()
    {
        return $this->concluido;
    }

    /**
     * Set hoyos
     *
     * @param integer $hoyos
     * @return TorneoFecha
     */
    public function setHoyos($hoyos)
    {
        $this->hoyos = $hoyos;
    
        return $this;
    }

    /**
     * Get hoyos
     *
     * @return integer 
     */
    public function getHoyos()
    {
        return $this->hoyos;
    }

    /**
     * Set habilitar_carga_resultados
     *
     * @param boolean $habilitarCargaResultados
     * @return TorneoFecha
     */
    public function setHabilitarCargaResultados($habilitarCargaResultados)
    {
        $this->habilitar_carga_resultados = $habilitarCargaResultados;
    
        return $this;
    }

    /**
     * Get habilitar_carga_resultados
     *
     * @return boolean 
     */
    public function getHabilitarCargaResultados()
    {
        return $this->habilitar_carga_resultados;
    }

    /**
     * Set numero_fecha
     *
     * @param integer $numeroFecha
     * @return TorneoFecha
     */
    public function setNumeroFecha($numeroFecha)
    {
        $this->numero_fecha = $numeroFecha;
    
        return $this;
    }

    /**
     * Get numero_fecha
     *
     * @return integer 
     */
    public function getNumeroFecha()
    {
        return $this->numero_fecha;
    }

    /**
     * Set apertura_inscripcion
     *
     * @param \DateTime $aperturaInscripcion
     * @return TorneoFecha
     */
    public function setAperturaInscripcion($aperturaInscripcion)
    {
        $this->apertura_inscripcion = $aperturaInscripcion;
    
        return $this;
    }

    /**
     * Get apertura_inscripcion
     *
     * @return \DateTime 
     */
    public function getAperturaInscripcion()
    {
        return $this->apertura_inscripcion;
    }

    /**
     * Set cierre_inscripcion
     *
     * @param \DateTime $cierreInscripcion
     * @return TorneoFecha
     */
    public function setCierreInscripcion($cierreInscripcion)
    {
        $this->cierre_inscripcion = $cierreInscripcion;
    
        return $this;
    }

    /**
     * Get cierre_inscripcion
     *
     * @return \DateTime 
     */
    public function getCierreInscripcion()
    {
        return $this->cierre_inscripcion;
    }

    /**
     * Set apertura_inscripcion_no_socios
     *
     * @param \DateTime $aperturaInscripcionNoSocios
     * @return TorneoFecha
     */
    public function setAperturaInscripcionNoSocios($aperturaInscripcionNoSocios)
    {
        $this->apertura_inscripcion_no_socios = $aperturaInscripcionNoSocios;
    
        return $this;
    }

    /**
     * Get apertura_inscripcion_no_socios
     *
     * @return \DateTime 
     */
    public function getAperturaInscripcionNoSocios()
    {
        return $this->apertura_inscripcion_no_socios;
    }

    /**
     * Set cierre_inscripcion_no_socios
     *
     * @param \DateTime $cierreInscripcionNoSocios
     * @return TorneoFecha
     */
    public function setCierreInscripcionNoSocios($cierreInscripcionNoSocios)
    {
        $this->cierre_inscripcion_no_socios = $cierreInscripcionNoSocios;
    
        return $this;
    }

    /**
     * Get cierre_inscripcion_no_socios
     *
     * @return \DateTime 
     */
    public function getCierreInscripcionNoSocios()
    {
        return $this->cierre_inscripcion_no_socios;
    }
}