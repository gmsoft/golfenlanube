<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM; 

/**
 * @ORM\Table(name="tarjeta_hoyo")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 *
 */
class TarjetaHoyo
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
	 * @ORM\Column(name="id_tarjeta", type="integer", nullable=false)
	 */
	private $id_tarjeta; 
	
	/**
	 * Denota el numero de hoyo (1ero, 2do, ..., Navo)
	 * @var integer
	 *
	 * @ORM\Column(name="hoyo", type="smallint", nullable=false)
	 */
	private $hoyo; 
	
	/**
	 * Denota el numero de golpes hasta acertar al hoyo
	 * @var integer
	 *
	 * @ORM\Column(name="golpes", type="smallint", nullable=true)
	 */
	private $golpes; 
	
	
	// relaciones
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Tarjeta", inversedBy="hoyos")
	 * @ORM\JoinColumn(name="id_tarjeta", referencedColumnName="id")
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
     * Set id_tarjeta
     *
     * @param integer $idTarjeta
     * @return TarjetaHoyo
     */
    public function setIdTarjeta($idTarjeta)
    {
        $this->id_tarjeta = $idTarjeta;
    
        return $this;
    }

    /**
     * Get id_tarjeta
     *
     * @return integer 
     */
    public function getIdTarjeta()
    {
        return $this->id_tarjeta;
    }

    /**
     * Set hoyo
     *
     * @param integer $hoyo
     * @return TarjetaHoyo
     */
    public function setHoyo($hoyo)
    {
        $this->hoyo = $hoyo;
    
        return $this;
    }

    /**
     * Get hoyo
     *
     * @return integer 
     */
    public function getHoyo()
    {
        return $this->hoyo;
    }

    /**
     * Set golpes
     *
     * @param integer $golpes
     * @return TarjetaHoyo
     */
    public function setGolpes($golpes)
    {
        $this->golpes = $golpes;
    
        return $this;
    }

    /**
     * Get golpes
     *
     * @return integer 
     */
    public function getGolpes()
    {
        return $this->golpes;
    }

    /**
     * Set tarjeta
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Tarjeta $tarjeta
     * @return TarjetaHoyo
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
}