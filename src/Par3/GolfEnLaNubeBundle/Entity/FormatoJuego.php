<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Par3\GolfEnLaNubeBundle\FormatoJuego\ReglasFormatoJuegoInterface;

/**
 * 
 * @ORM\Table(name="formato_juego")
 * @ORM\Entity
 * 
 */
class FormatoJuego
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
	 * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
	 */
	private $nombre; 

	/**
	 * Uso interno del sistema. Cada formato de juego necesita calculos diferentes para determinar los resultados. 
	 * De estos calculos se encargan las clases que implementan la interfaz Par3\GolfEnLaNubeBundle\FormatoJuego\FormatoJuegoHandlerInterface. 
	 *
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="clase_formato_juego_handler", type="string", length=60, nullable=true)
	 */
	private $clase_formato_juego_handler;
	
	/**
	 * 
	 * @return FormatoJuegoHandlerInterface
	 */
	public function getInstanciaFormatoJuegoHandler()
	{
		if ( !class_exists($this->getClaseFormatoJuegoHandlerConNamespace())) throw new \Exception('La modalidad de juego ' . $this->getNombre() . ' no está implementada aún. Contacte al administrador del sistema.');
		$clase = $this->getClaseFormatoJuegoHandlerConNamespace();
		return new $clase ;
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
     * @return FormatoJuego
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
     * Set clase_formato_juego_handler
     *
     * @param string $clase_formato_juego_handler
     * @return FormatoJuego
     */
    public function setClaseFormatoJuegoHandler($clase_formato_juego_handler)
    {
        $this->clase_formato_juego_handler = $clase_formato_juego_handler;
    
        return $this;
    }

    /**
     * Get clase_formato_juego_handler
     *
     * @return string 
     */
    public function getClaseFormatoJuegoHandler()
    {
        return $this->clase_formato_juego_handler ;
    }
    
    private function getClaseFormatoJuegoHandlerConNamespace()
    {
    	return '\\Par3\\GolfEnLaNubeBundle\\FormatoJuego\\' . $this->getClaseFormatoJuegoHandler();
    }
    
}