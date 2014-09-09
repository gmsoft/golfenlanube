<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="cancha_tee")
 * @ORM\Entity
 *
 */
class CanchaTee
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
	 * @ORM\Column(name="id_cancha", type="integer", nullable=false)
	 */
	private $id_cancha;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="numero", type="integer", nullable=false)
	 */
	private $numero;

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="calificacion", type="decimal", precision=5, scale=2, nullable=true)
	 */
	private $calificacion;

	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Cancha", inversedBy="tees", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_cancha", referencedColumnName="id")
	 */
	private $cancha;

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
     * Set id_cancha
     *
     * @param integer $idCancha
     * @return CanchaTee
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
     * Set numero
     *
     * @param integer $numero
     * @return CanchaTee
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set calificacion
     *
     * @param float $calificacion
     * @return CanchaTee
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    
        return $this;
    }

    /**
     * Get calificacion
     *
     * @return float 
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set cancha
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Cancha $cancha
     * @return CanchaTee
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
}