<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\ReglamentoCircuito\reglamentoGenerico;

/**
 * 
 * Representa Una Institución (club o de otro tipo) que organiza torneos y se asocian a este las temporadas (anuales o semaestrales) en las que se 
 * juegan los torneos.  
 * 
 * 
 * FIXME: Por un error de entendimiento en el proceso de análisis inicial esta clase terminó llamándose Circuito, cuando el nombre que debería haber tomado 
 * 			es otro. Dado que no afecta al funcionamiento del sistema realmente y las incumbencias del cambio son estructurales y grandes no se arregló.  
 * 
 * 
 * @ORM\Table(name="circuito")
 * @ORM\Entity
 * 
 */
class Circuito
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
	 * @ORM\Column(name="id_institucion", type="integer", nullable=true)
	 */
	private $id_institucion;

	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre; 

	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="subdominio", type="string", length=30, nullable=true)
	 */
	private $subdominio; 
	
	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Institucion")
	 * @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
	 */
	private $institucion; 
	
	/**
	 * 
	 * @return \Par3\GolfEnLaNubeBundle\ReglamentoCircuito\reglamentoGenerico
	 */
	public function getInstanciaReglamentoJuego()
	{
		if ( !class_exists($this->getClaseReglamentoJuegoConNamespace())) return new reglamentoGenerico();
		$clase = $this->getClaseReglamentoJuegoConNamespace();
		return new $clase ;
	}
	
	
	public function getClaseReglamentoJuego()
	{
		return 'reglamento' . ucfirst( $this->getSubdominio() );
	}
	
	private function getClaseReglamentoJuegoConNamespace()
	{
		return '\\Par3\\GolfEnLaNubeBundle\\ReglamentoCircuito\\' . $this->getClaseReglamentoJuego();
	}
	
	
    public function __toString()
    {
    	return $this->getNombre();
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
     * @return Circuito
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
     * Set id_institucion
     *
     * @param integer $idInstitucion
     * @return Circuito
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
     * Set institucion
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Institucion $institucion
     * @return Circuito
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
     * Set subdominio
     *
     * @param string $subdominio
     * @return Circuito
     */
    public function setSubdominio($subdominio)
    {
        $this->subdominio = $subdominio;
    
        return $this;
    }

    /**
     * Get subdominio
     *
     * @return string 
     */
    public function getSubdominio()
    {
        return $this->subdominio;
    }
}