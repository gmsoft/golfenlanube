<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @ORM\Table(name="campeonato")
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\CampeonatoRepository")
 * 
 */
class Campeonato
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
	 * @var string
	 *
	 * @ORM\Column(name="id_temporada", type="integer", nullable=false)
	 */
	private $id_temporada;

	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="id_padre", type="integer", nullable=true)
	 */
	private $id_padre;
	
	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Temporada")
	 * @ORM\JoinColumn(name="id_temporada", referencedColumnName="id")
	 */
	private $temporada; 

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Campeonato", inversedBy="campeonatos", cascade={"persist", "detach"})
	 * @ORM\JoinColumn(name="id_padre", referencedColumnName="id")
	 */
	private $padre;
	
	
	/**
	 *
	 * @ORM\OneToMany(targetEntity="Campeonato", mappedBy="padre", cascade={"persist", "detach"})
	 */
	private $campeonatos;
	
	/**
	 * 
	 * @ORM\ManyToMany(targetEntity="Torneo", mappedBy="campeonatos", cascade={"persist", "detach"})
	 */
	private $torneos;

	/**
	 *
	 * @return \Par3\GolfEnLaNubeBundle\ReglamentoCircuito\reglamentoGenerico
	 */
	public function getInstanciaReglamentoJuego()
	{
		// TODO: Implementar posibilidad de que cada campeonato pueda tener (opcionalmente) su propio reglamento que extienda al del circuito
		return $this->getTemporada()->getCircuito()->getInstanciaReglamentoJuego();
	}
	

	public function getPadreMasLejano()
	{
		return $this->getPadreMasLejanoAux($this);
	}
	
	private function getPadreMasLejanoAux($campeonato_original)
	{
		if ( is_null($this->getPadre()) )
		{
			if ($campeonato_original === $this) return null;
			else return $this;
		} else {
			return $this->getPadre()->getPadreMasLejanoAux($campeonato_original);
		}
	}
	
	public function puedeAdjuntarTorneo( Torneo $torneo)
	{
		if ($this->tieneTorneo($torneo)) return true; 
		if ( is_null($this->getPadreMasLejano())) return true; 
		foreach ($this->getPadreMasLejano()->getTodosTorneos() as  $t) 
		{
			if ($t->getId() == $torneo->getId()) return false ; 
		}
		return true; 
	}

	public function limpiarTorneos()
	{
		foreach ($this->getTorneos() as $torneo)
		{
			$this->removeTorneo($torneo);
		}
	}
	
	public function limpiarCampeonatos()
	{
		foreach ($this->getCampeonatos() as $c)
		{
			$this->removeCampeonato($c);
		}
	}

	public function tieneCampeonato(Campeonato $campeonato)
	{
		foreach ($this->getCampeonatos() as $c)
		{
			if ($c->getId() == $campeonato->getId()) return true;
		}
		return false; 
	}
	
	public function tieneTorneo(Torneo $torneo)
	{
		foreach ($this->getTorneos() as $t )
		{
			if ($t->getId() == $torneo->getId()) return true; 
		}
		return false; 
	}
	
	public function getTodosTorneos()
	{
		if ( $this->getCampeonatos()->isEmpty())
		{
			return $this->getTorneos()->toArray();
		} else {
			$torneos = $this->getTorneos()->toArray();
			foreach ($this->getCampeonatos() as $campeonato) 
			{
				$torneos = array_merge($torneos, $campeonato->getTodosTorneos());
			}
			return $torneos;
		} 		
	}

	public function getTodosCampeonatos()
	{
		if ( $this->getCampeonatos()->isEmpty())
		{
			return array();
		} else {
			$campeonatos = $this->getCampeonatos()->toArray();
			foreach ($this->getCampeonatos() as $campeonato)
			{
				$campeonatos = array_merge($campeonatos, $campeonato->getTodosCampeonatos());
			}
			return $campeonatos;
		}
	}

	
    public function __toString()
    {
    	return $this->getNombre();
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->torneos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->campeonatos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Campeonato
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
     * Set nombre
     *
     * @param string $nombre
     * @return Campeonato
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
     * Set temporada
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Temporada $temporada
     * @return Campeonato
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
     * Add torneos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos
     * @return Campeonato
     */
    public function addTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos)
    {
    	$torneos->addCampeonato($this);
        $this->torneos[] = $torneos;
    
        return $this;
    }

    /**
     * Remove torneos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos
     */
    public function removeTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos)
    {
    	$torneos->removeCampeonato($this);
        $this->torneos->removeElement($torneos);
    }

    /**
     * Get torneos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTorneos()
    {
        return $this->torneos;
    }

    /**
     * Set id_padre
     *
     * @param integer $idPadre
     * @return Campeonato
     */
    public function setIdPadre($idPadre)
    {
        $this->id_padre = $idPadre;
    
        return $this;
    }

    /**
     * Get id_padre
     *
     * @return integer 
     */
    public function getIdPadre()
    {
        return $this->id_padre;
    }

    /**
     * Set padre
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Campeonato $padre
     * @return Campeonato
     */
    public function setPadre(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $padre = null)
    {
        $this->padre = $padre;
    
        return $this;
    }

    /**
     * Get padre
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Campeonato 
     */
    public function getPadre()
    {
        return $this->padre;
    }

    /**
     * Add campeonatos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos
     * @return Campeonato
     */
    public function addCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos)
    {
    	$campeonatos->setPadre($this);
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
    	$campeonatos->setPadre(null);
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