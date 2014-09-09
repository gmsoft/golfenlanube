<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Torneo
 *
 * @ORM\Table(name="torneo")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TorneoRepository")
 */
class Torneo 
{
	const ABIERTO  = 'abierto'; 
	const SEMI_ABIERTO = 'semi_abierto';
	const SOLO_SOCIOS = 'solo_socios'; 

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
	 * @var string
	 * 
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
	 */
	private $nombre; 
	
	/**
	 * 
	 * @var date
	 * 
	 * @ORM\Column(name="inicio", type="date", nullable=true)
	 */
	private $inicio; 
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_institucion", type="integer", nullable=false)
	 */
	private $id_institucion;

	/**
	 * Si un torneo tiene seteado 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_temporada", type="integer", nullable=true)
	 */
	private $id_temporada; 

	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="dias", type="smallint", nullable=false)
	 */
	private $dias = 1; 

	/**
	 * 
	 * @var integer
	 * 
	 * @ORM\Column(name="id_formato_juego", type="integer", nullable=false)
	 */
	private $id_formato_juego; 
	
	/**
	 * 
	 * @var boolean
	 * 
	 * @ORM\Column(name="separa_sexos", type="boolean", nullable=true)
	 */
	private $separa_sexos; 
	
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
	 * Valores posibles son : Torneo::ABIERTO , Torneo::SEMI_ABIERTO, Torneo::SOLO_SOCIOS
	 * @var string 
	 * 
	 * @ORM\Column(name="tipo_torneo", type="string", length=15, nullable=false)
	 */
	private $tipo_torneo = 'solo_socios';
	
	/**
	 * Denota el máximo numero de invitados no-socios para un torneo semi-abierto (sa)
	 * @var integer
	 *
	 * @ORM\Column(name="sa_max_invitados", type="smallint", nullable=true)
	 */
	private $sa_max_invitados; 
	
	/**
	 * Denota, en un torneo semi-abierto, si los invitados de un socio juegan en la misma linea que el socio que los invitó o no, 
	 * @var boolean
	 * 
	 * @ORM\Column(name="sa_invitados_misma_linea", type="boolean", nullable=true)
	 */
	private $sa_invitados_misma_linea; 
	
	/**
	 * Denota, para los torneos abiertos, si se publica o no en GolfPlay
	 * @var boolean
	 * 
	 * @ORM\Column(name="ab_publica_en_golfplay", type="boolean", nullable=true)
	 */
	private $ab_publica_en_golfplay; 
	
	/**
	 *
	 * @var boolean
	 *
	 * @ORM\Column(name="incluir_en_ranking", type="boolean", nullable=false)
	 */
	private $incluir_en_ranking = false;

	/**
	 *
	 * @var int
	 *
	 * @ORM\Column(name="titulares_por_club", type="smallint", nullable=true)
	 */
	private $titulares_por_club = 1;
	
	/**
	 *
	 * @var int
	 *
	 * @ORM\Column(name="suplentes_por_club", type="smallint", nullable=true)
	 */
	private $suplentes_por_club = 0;
	
	// relaciones


	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Institucion")
	 * @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
	 */
	private $institucion;
	
	
	/**
	 * 
	 * @ORM\ManyToMany(targetEntity="Campeonato", inversedBy="torneos", cascade={"persist", "detach"})
	 * @ORM\JoinTable(name="torneo_campeonato",
     *      joinColumns={@ORM\JoinColumn(name="id_torneo", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_campeonato", referencedColumnName="id")}
     *      )
	 */
	private $campeonatos; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Temporada")
	 * @ORM\JoinColumn(name="id_temporada", referencedColumnName="id")
	 */
	private $temporada;
	
	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="FormatoJuego")
	 * @ORM\JoinColumn(name="id_formato_juego", referencedColumnName="id")
	 */	
	private $formato_juego; 
	
	/**
	 *
	 * @ORM\OneToMany(targetEntity="TorneoFecha", mappedBy="torneo", cascade={"persist", "remove"})
	 */
	private $fechas;

	public function __construct()
	{
		$this->fechas = new ArrayCollection();
		$this->jugadores = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Torneo
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
     * @return Torneo
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
     * Set id_institucion
     *
     * @param integer $idInstitucion
     * @return Torneo
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
     * Set dias
     *
     * @param integer $dias
     * @return Torneo
     */
    public function setDias($dias)
    {
        $this->dias = $dias;
    
        return $this;
    }

    /**
     * Get dias
     *
     * @return integer 
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set id_formato_juego
     *
     * @param integer $idFormatoJuego
     * @return Torneo
     */
    public function setIdFormatoJuego($idFormatoJuego)
    {
        $this->id_formato_juego = $idFormatoJuego;
    
        return $this;
    }

    /**
     * Get id_formato_juego
     *
     * @return integer 
     */
    public function getIdFormatoJuego()
    {
        return $this->id_formato_juego;
    }

    /**
     * Set separa_sexos
     *
     * @param boolean $separaSexos
     * @return Torneo
     */
    public function setSeparaSexos($separaSexos)
    {
        $this->separa_sexos = $separaSexos;
    
        return $this;
    }

    /**
     * Get separa_sexos
     *
     * @return boolean 
     */
    public function getSeparaSexos()
    {
        return $this->separa_sexos;
    }

    /**
     * Set apertura_inscripcion
     *
     * @param \DateTime $aperturaInscripcion
     * @return Torneo
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
     * @return Torneo
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
     * @return Torneo
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
     * @return Torneo
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

    /**
     * Set tipo_torneo
     *
     * @param string $tipoTorneo
     * @return Torneo
     */
    public function setTipoTorneo($tipoTorneo)
    {
        $this->tipo_torneo = $tipoTorneo;
    
        return $this;
    }

    /**
     * Get tipo_torneo
     *
     * @return string 
     */
    public function getTipoTorneo()
    {
        return $this->tipo_torneo;
    }

    /**
     * Set sa_max_invitados
     *
     * @param integer $saMaxInvitados
     * @return Torneo
     */
    public function setSaMaxInvitados($saMaxInvitados)
    {
        $this->sa_max_invitados = $saMaxInvitados;
    
        return $this;
    }

    /**
     * Get sa_max_invitados
     *
     * @return integer 
     */
    public function getSaMaxInvitados()
    {
        return $this->sa_max_invitados;
    }

    /**
     * Set sa_invitados_misma_linea
     *
     * @param boolean $saInvitadosMismaLinea
     * @return Torneo
     */
    public function setSaInvitadosMismaLinea($saInvitadosMismaLinea)
    {
        $this->sa_invitados_misma_linea = $saInvitadosMismaLinea;
    
        return $this;
    }

    /**
     * Get sa_invitados_misma_linea
     *
     * @return boolean 
     */
    public function getSaInvitadosMismaLinea()
    {
        return $this->sa_invitados_misma_linea;
    }

    /**
     * Set ab_publica_en_golfplay
     *
     * @param boolean $abPublicaEnGolfplay
     * @return Torneo
     */
    public function setAbPublicaEnGolfplay($abPublicaEnGolfplay)
    {
        $this->ab_publica_en_golfplay = $abPublicaEnGolfplay;
    
        return $this;
    }

    /**
     * Get ab_publica_en_golfplay
     *
     * @return boolean 
     */
    public function getAbPublicaEnGolfplay()
    {
        return $this->ab_publica_en_golfplay;
    }

    /**
     * Set incluir_en_ranking
     *
     * @param boolean $incluirEnRanking
     * @return Torneo
     */
    public function setIncluirEnRanking($incluirEnRanking)
    {
        $this->incluir_en_ranking = $incluirEnRanking;
    
        return $this;
    }

    /**
     * Get incluir_en_ranking
     *
     * @return boolean 
     */
    public function getIncluirEnRanking()
    {
        return $this->incluir_en_ranking;
    }

    /**
     * Set titulares_por_club
     *
     * @param integer $titularesPorClub
     * @return Torneo
     */
    public function setTitularesPorClub($titularesPorClub)
    {
        $this->titulares_por_club = $titularesPorClub;
    
        return $this;
    }

    /**
     * Get titulares_por_club
     *
     * @return integer 
     */
    public function getTitularesPorClub()
    {
        return $this->titulares_por_club;
    }

    /**
     * Set suplentes_por_club
     *
     * @param integer $suplentesPorClub
     * @return Torneo
     */
    public function setSuplentesPorClub($suplentesPorClub)
    {
        $this->suplentes_por_club = $suplentesPorClub;
    
        return $this;
    }

    /**
     * Get suplentes_por_club
     *
     * @return integer 
     */
    public function getSuplentesPorClub()
    {
        return $this->suplentes_por_club;
    }

    /**
     * Set institucion
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Institucion $institucion
     * @return Torneo
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
     * Set formato_juego
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\FormatoJuego $formatoJuego
     * @return Torneo
     */
    public function setFormatoJuego(\Par3\GolfEnLaNubeBundle\Entity\FormatoJuego $formatoJuego = null)
    {
        $this->formato_juego = $formatoJuego;
    
        return $this;
    }

    /**
     * Get formato_juego
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\FormatoJuego 
     */
    public function getFormatoJuego()
    {
        return $this->formato_juego;
    }

    /**
     * Add fechas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $fechas
     * @return Torneo
     */
    public function addFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $fechas)
    {
    	$fechas->setTorneo($this);
        $this->fechas[] = $fechas;
    
        return $this;
    }

    /**
     * Remove fechas
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $fechas
     */
    public function removeFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFecha $fechas)
    {
        $this->fechas->removeElement($fechas);
    }

    /**
     * Get fechas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFechas()
    {
        return $this->fechas;
    }

    /**
     * Set id_circuito
     *
     * @param integer $idCircuito
     * @return Torneo
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
     * Set id_temporada
     *
     * @param integer $idTemporada
     * @return Torneo
     */
    public function setIdTemporada($idTemporada)
    {
        $this->id_temporada = $idTemporada;
    
        return $this;
    }

    /**
     * Get id_temporada
     *
     * @return integer 
     */
    public function getIdTemporada()
    {
        return $this->id_temporada;
    }

    /**
     * Set temporada
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Temporada $temporada
     * @return Torneo
     */
    public function setTemporada(\Par3\GolfEnLaNubeBundle\Entity\Temporada $temporada = null)
    {
        $this->temporada = $temporada;
    
        return $this;
    }

    /**
     * Get temporada
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Temporada 
     */
    public function getTemporada()
    {
        return $this->temporada;
    }


    /**
     * Add campeonatos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos
     * @return Torneo
     */
    public function addCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos)
    {
        $this->campeonatos[] = $campeonatos;
    
        return $this;
    }

    /**
     * Remove campeonatos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos
     */
    public function removeCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos)
    {
        $this->campeonatos->removeElement($campeonatos);
    }

    /**
     * Get campeonatos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampeonatos()
    {
        return $this->campeonatos;
    }
}