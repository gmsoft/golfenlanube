<?php

namespace Par3\GolfEnLaNubeBundle\Entity; 

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="tarjeta")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\TarjetaRepository")
 */
class Tarjeta
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
	 * @ORM\Column(name="id_torneo_fecha_jugador", type="integer", nullable=false)
	 */
	private $id_torneo_fecha_jugador;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="estado", type="string", length=5, nullable=false)
	 */
	 private $estado = 'OK';

	 /**
	  *
	  * @var integer
	  *
	  * @ORM\Column(name="comentario", type="string", length=255, nullable=true)
	  */
	 private $comentario;
	 
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_gross", type="smallint", nullable=true)
	 */
	private $score_gross = 0 ;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="score_neto", type="smallint", nullable=true)
	 */
	private $score_neto = 0 ;

	// relaciones 

	/**
	 *
	 * @ORM\OneToOne(targetEntity="TorneoFechaJugador", inversedBy="tarjeta", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_torneo_fecha_jugador", referencedColumnName="id")
	 */
	private $torneo_fecha_jugador;

	/**
	 *
	 * @ORM\OneToMany(targetEntity="TarjetaHoyo", mappedBy="tarjeta", cascade={"persist", "remove"})
	 */
	private $hoyos; 

	public function actualizarScoresTotales()
	{
		$formatoJuegoHandler = $this->getTorneoFechaJugador()->getTorneoFecha()->getTorneo()->getFormatoJuego()->getInstanciaFormatoJuegoHandler();
		$formatoJuegoHandler->actualizarScoresTotalesTarjeta($this);
	}

	public function totalIda()
	{
		$mitad = (count($this->getHoyos()) > 9) ? count($this->getHoyos())/2 : 9;

		$total = 0 ; 
		foreach ($this->getHoyos() as $hoyo)
		{
			if ($hoyo->getHoyo() <= $mitad)
			{
				$total += $hoyo->getGolpes();
			}
		}
		return $total;
	}

	public function totalVuelta()
	{
		$mitad = (count($this->getHoyos()) > 9) ? count($this->getHoyos())/2 : 9;
		
		$total = 0 ;
		foreach ($this->getHoyos() as $hoyo)
		{
			if ($hoyo->getHoyo() > $mitad)
			{
				$total += $hoyo->getGolpes();
			}
		}
		return $total;
	}

	public function getSumaUltimosNHoyosNeto($n)
	{
		return ($this->getSumaUltimosNHoyos($n) - $this->getHandicapProporcionalNHoyos($n)) ;
	}
	
	public function getSumaUltimosNHoyos($n)
	{
		$suma = 0;
		foreach ($this->getUltimosNHoyos($n) as $hoyo)
		{
			$suma += $hoyo->getGolpes(); 
		}
		return $suma;
	}

	private function getHandicapProporcionalNHoyos($n)
	{
		return (($this->getTorneoFechaJugador()->getHandicapDeJuego() * $n) / $this->getTorneoFechaJugador()->getTorneoFecha()->getHoyos());
	}
	
	
	private function getUltimosNHoyos($n)
	{
		$hoyos = $this->getHoyosOrderByHoyoDesc();
		return array_slice($hoyos,0,$n);
	} 

	private function getHoyosOrderByHoyoDesc()
	{
		$hoyos = $this->getHoyos()->toArray();
		usort($hoyos, array($this, 'hoyosOrderByHoyoDesc'));
		return $hoyos;
	}

	private function hoyosOrderByHoyoDesc(TarjetaHoyo $a, TarjetaHoyo $b)
	{
		return ($a->getHoyo() > $b->getHoyo()) ? -1 : 1;
	}
	
	public function __construct()
	{
		$this->hoyos = new ArrayCollection();
	}

	public static function getListaEstados()
	{
		return (
			array(
				'OK' 	=> 'Ok', 
				'DESC' 	=> 'Descalificado', 
				'NPT' 	=> 'No presenta tarjeta', 
				'LP'	=> 'Levanta pelota',
			)
		);
	}

	public function getDescripcionEstado($estado)
	{
		$e = self::getListaEstados();
		return $e[$estado]; 
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
     * @return Tarjeta
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
     * Add hoyos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos
     * @return Tarjeta
     */
    public function addHoyo(\Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos)
    {
    	$hoyos->setTarjeta($this);
        $this->hoyos[] = $hoyos;
    
        return $this;
    }

    /**
     * Remove hoyos
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos
     */
    public function removeHoyo(\Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos)
    {
        $this->hoyos->removeElement($hoyos);
    }

    /**
     * Get hoyos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHoyos()
    {
        return $this->hoyos;
    }

    /**
     * Set score_gross
     *
     * @param integer $scoreGross
     * @return Tarjeta
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
     * @return Tarjeta
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
     * Set id_torneo_fecha_jugador
     *
     * @param integer $idTorneoFechaJugador
     * @return Tarjeta
     */
    public function setIdTorneoFechaJugador($idTorneoFechaJugador)
    {
        $this->id_torneo_fecha_jugador = $idTorneoFechaJugador;
    
        return $this;
    }

    /**
     * Get id_torneo_fecha_jugador
     *
     * @return integer 
     */
    public function getIdTorneoFechaJugador()
    {
        return $this->id_torneo_fecha_jugador;
    }

    /**
     * Set torneo_fecha_jugador
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugador
     * @return Tarjeta
     */
    public function setTorneoFechaJugador(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugador = null)
    {
    	if (!is_null($torneoFechaJugador))	$torneoFechaJugador->setTarjeta($this);
        $this->torneo_fecha_jugador = $torneoFechaJugador;
    
        return $this;
    }

    /**
     * Get torneo_fecha_jugador
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador 
     */
    public function getTorneoFechaJugador()
    {
        return $this->torneo_fecha_jugador;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Tarjeta
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Tarjeta
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    
        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }
}