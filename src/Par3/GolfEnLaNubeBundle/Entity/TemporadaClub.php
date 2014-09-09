<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="temporada_club")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TemporadaClubRepository")
 */
class TemporadaClub
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
	 * @ORM\Column(name="id_temporada", type="integer", nullable=false)
	 */
	private $id_temporada;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id_club", type="integer", nullable=false)
	 */
	private $id_club;
	
	/**
	 *
	 * @var string 
	 * 
	 * @ORM\Column(name="equipo_intraclub", type="string", length=15, nullable=true)
	 */
	private $equipo_intraclub;
	
	// relaciones

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Club")
	 * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
	 */
	private $club;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Temporada", inversedBy="temporada_clubs", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_temporada", referencedColumnName="id")
	 */
	private $temporada;

	/**
	 *
	 * @ORM\OneToMany(targetEntity="TemporadaClubJugador", mappedBy="temporada_club", cascade={"persist", "remove"})
	 */
	private $club_jugadores;
	
	/**
	 * @ORM\OneToMany(targetEntity="Equipo", mappedBy="temporada_club", cascade={"detach"})
	 **/
	private $equipos;

	/**
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="capitan_temporada_clubs", cascade={"persist", "detach"})
	 **/
	private $capitanes; 

	public function __toString()
	{
		return $this->getClub()->getNombre() . 
				( ($this->getEquipoIntraclub() == '' ) ? '' 
				: ' "'. $this->getEquipoIntraclub() . '"') ;
	}
	
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->club_jugadores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->capitanes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function tieneJugadorConMatricula($matricula)
    {
    	foreach($this->club_jugadores as $club_jugador)
    	{
    		if ($club_jugador->getIdJugador() == $matricula) return true;
    	}
    	return false; 
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
     * Set id_temporada
     *
     * @param integer $idTemporada
     * @return TemporadaClub
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
     * Set id_club
     *
     * @param integer $idClub
     * @return TemporadaClub
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
     * Set club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Club $club
     * @return TemporadaClub
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
     * Set temporada
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Temporada $temporada
     * @return TemporadaClub
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
     * Add jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $jugadores
     * @return TemporadaClub
     */
    public function addJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $jugadores)
    {
        $this->jugadores[] = $jugadores;
    
        return $this;
    }

    /**
     * Remove jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $jugadores
     */
    public function removeJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $jugadores)
    {
        $this->jugadores->removeElement($jugadores);
    }

    /**
     * Get jugadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJugadores()
    {
        return $this->jugadores;
    }

    /**
     * Add club_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $clubJugadores
     * @return TemporadaClub
     */
    public function addClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $clubJugadores)
    {
    	$clubJugadores->setTemporadaClub($this);
        $this->club_jugadores[] = $clubJugadores;
    
        return $this;
    }

    /**
     * Remove club_jugadores
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $clubJugadores
     */
    public function removeClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $clubJugadores)
    {
        $this->club_jugadores->removeElement($clubJugadores);
    }

    /**
     * Get club_jugadores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClubJugadores()
    {
        return $this->club_jugadores;
    }


    /**
     * Add capitanes
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\User $capitanes
     * @return TemporadaClub
     */
    public function addCapitane(\Par3\GolfEnLaNubeBundle\Entity\User $capitanes)
    {
        $this->capitanes[] = $capitanes;
    
        return $this;
    }

    /**
     * Remove capitanes
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\User $capitanes
     */
    public function removeCapitane(\Par3\GolfEnLaNubeBundle\Entity\User $capitanes)
    {
        $this->capitanes->removeElement($capitanes);
    }

    /**
     * Get capitanes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCapitanes()
    {
        return $this->capitanes;
    }

    /**
     * Set equipo_intraclub
     *
     * @param string $equipoIntraclub
     * @return TemporadaClub
     */
    public function setEquipoIntraclub($equipoIntraclub)
    {
        $this->equipo_intraclub = $equipoIntraclub;
    
        return $this;
    }

    /**
     * Get equipo_intraclub
     *
     * @return string 
     */
    public function getEquipoIntraclub()
    {
        return $this->equipo_intraclub;
    }

    /**
     * Add equipos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Equipo $equipos
     * @return TemporadaClub
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
}