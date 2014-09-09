<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="cancha")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\CanchaRepository")
 *
 */
class Cancha
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
	 * @ORM\Column(name="numero", type="integer", nullable=true)
	 */
	private $numero;


	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Club", inversedBy="canchas", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
	 */
	private $club; 

	/**
	 *
	 * @ORM\OneToMany(targetEntity="CanchaTee", mappedBy="cancha", cascade={"persist"})
	 */
	private $tees; 
	
    public function __toString()
    {
    	return 'Club: ' . $this->getClub()->getNombre() . ' - Cancha:' . $this->getNumero();
    }
    
    public function tieneTeeNumero($numero)
    {
    	foreach ($this->getTees() as $tee)
    	{
    		if ($tee->getNumero() == $numero) return true; 
    	}
    	return false; 
    }

	public function __construct()
	{
		$this->tees = new ArrayCollection();
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
     * @return Cancha
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
     * @return Cancha
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
     * Set numero
     *
     * @param integer $numero
     * @return Cancha
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
     * Add tees
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\CanchaTee $tees
     * @return Cancha
     */
    public function addTee(\Par3\GolfEnLaNubeBundle\Entity\CanchaTee $tees)
    {
    	$tees->setCancha($this);
        $this->tees[] = $tees;
    
        return $this;
    }

    /**
     * Remove tees
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\CanchaTee $tees
     */
    public function removeTee(\Par3\GolfEnLaNubeBundle\Entity\CanchaTee $tees)
    {
        $this->tees->removeElement($tees);
    }

    /**
     * Get tees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTees()
    {
        return $this->tees;
    }
}