<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="temporada_club_jugador")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugadorRepository")
 *
 */
class TemporadaClubJugador
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
	 * @ORM\Column(name="id_temporada_club", type="integer", nullable=false)
	 */
	private $id_temporada_club;

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
	 * @ORM\Column(name="cumple_reglamento", type="boolean", nullable=true)
	 */
	private $cumple_reglamento = false;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="cumple_tarjetas", type="boolean", nullable=true)
	 */
	private $cumple_tarjetas = false;

	/**
	 * En las listas de buena fe se separan (no siempre) a los jugadores en diferentes equipos. 
	 * Jugadores de diferentes equipos_intraclub no pueden presentarse en un mismo equipo. 
	 * 
	 * @var string
	 *
	 * @#ORM\Column(name="equipo_intraclub", type="string", length="50", nullable=true)
	 */
	private $equipo_intraclub;


	// relaciones
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="TemporadaClub", inversedBy="club_jugadores", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_temporada_club", referencedColumnName="id")
	 */
	private $temporada_club;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Jugador", inversedBy="temporada_club_jugadores")
	 * @ORM\JoinColumn(name="id_jugador", referencedColumnName="id")
	 */
	private $jugador;
	
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
     * Set id_temporada_club
     *
     * @param integer $idTemporadaClub
     * @return TemporadaClubJugador
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
     * Set id_jugador
     *
     * @param integer $idJugador
     * @return TemporadaClubJugador
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
     * Set cumple_reglamento
     *
     * @param boolean $cumpleReglamento
     * @return TemporadaClubJugador
     */
    public function setCumpleReglamento($cumpleReglamento)
    {
        $this->cumple_reglamento = $cumpleReglamento;
    
        return $this;
    }

    /**
     * Get cumple_reglamento
     *
     * @return boolean 
     */
    public function getCumpleReglamento()
    {
        return $this->cumple_reglamento;
    }

    /**
     * Set cumple_tarjetas
     *
     * @param boolean $cumpleTarjetas
     * @return TemporadaClubJugador
     */
    public function setCumpleTarjetas($cumpleTarjetas)
    {
        $this->cumple_tarjetas = $cumpleTarjetas;
    
        return $this;
    }

    /**
     * Get cumple_tarjetas
     *
     * @return boolean 
     */
    public function getCumpleTarjetas()
    {
        return $this->cumple_tarjetas;
    }

    /**
     * Set temporada_club
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClub
     * @return TemporadaClubJugador
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
     * Set jugador
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador
     * @return TemporadaClubJugador
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
}