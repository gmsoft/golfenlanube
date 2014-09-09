<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Tests\Models\Generic\BooleanModel;

/**
 * @ORM\Table(name="persona")
 * @ORM\Entity
 *
 */
class Persona
{

	/**
	 * Devuelve un array con los tipos de documento validos, para usar como choices en un form field
	 * @return multitype:string
	 */
	public static function getTiposDocumento()
	{
		return array(	
			'DI' => 'DNI',
			'LE' => 'LE',
			'LC' => 'LC',
			'CI' => 'CI',
			'PA' => 'PA',
			'PE' => 'PE');
	}

	const SEXO_MASCULINO = 'M';
	const SEXO_FEMENINO = 'F';
	
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
	 * @ORM\Column(name="id_usuario", type="integer", nullable=true)
	 */
	private $id_usuario; 
	
	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="nombre_completo", type="string", length=70, nullable=true)
	 */
	protected $nombre_completo;
	
	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="nombre", type="string", length=35, nullable=true)
	 */
	protected $nombre;
	
	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="apellido", type="string", length=35, nullable=true)
	 */
	protected $apellido;

	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
	 */
	protected $sexo = 'M';

	/**
	 *
	 * @var date
	 *
	 * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
	 */
	protected $fecha_nacimiento;

	/**
	 *
	 * @var string
	 *
	 * @ORM\Column(name="tipo_documento", type="string", length=4, nullable=true)
	 */
	protected $tipo_documento;
	
	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="numero_documento", type="integer", nullable=true)
	 */
	protected $numero_documento;
	
	
	/**
	 *
	 * @var array
	 *
	 * @ORM\Column(name="telefonos", type="json_array", nullable=true)
	 */
	protected $telefonos ;
	
	/**
	 * 
	 * @var boolean
	 * 
	 * @ORM\Column(name="pendiente_actualizacion", type="boolean", nullable=true)
	 */
	protected $pendiente_actualizacion ; 
	
	/**
	 *
	 * @ORM\OneToOne(targetEntity="User", inversedBy="persona", cascade={"persist"})
	 * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
	 */
	private $usuario;


	/**
	 *
	 * @ORM\OneToOne(targetEntity="Jugador", mappedBy="persona", cascade={"persist"})
	 */
	private $jugador;
	
	public function __toString()
	{
		return (string) $this->getNombreCompleto();
	}

	public function __construct()
	{
		$this->telefonos = array();
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
     * Set id_usuario
     *
     * @param integer $idUsuario
     * @return Persona
     */
    public function setIdUsuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get id_usuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set nombre_completo
     *
     * @param string $nombreCompleto
     * @return Persona
     */
    public function setNombreCompleto($nombreCompleto)
    {
        $this->nombre_completo = strtoupper($nombreCompleto);
    
        return $this;
    }

    /**
     * Get nombre_completo
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set apellido
     *
     * @param string $apellido
     * @return Persona
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Persona
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Persona
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set usuario
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\User $usuario
     * @return Persona
     */
    public function setUsuario(\Par3\GolfEnLaNubeBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set jugador
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador
     * @return Persona
     */
    public function setJugador(\Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador = null)
    {
    	$jugador->setPersona($this);
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

    /**
     * Set telefonos
     *
     * @param array $telefonos
     * @return Persona
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;
    
        return $this;
    }

    /**
     * Get telefonos
     *
     * @return array 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    public function addTelefono($telefono)
    {
    	foreach ($this->getTelefonos() as $t)
    	{
    		$telefonos[] = preg_replace('/[^\d]/', '', $t);
    	}
    	if ( ! in_array(preg_replace('/[^\d]/', '', $telefono), $telefonos, true)) {
    		$this->telefonos[] = $telefono;
    	}

    	return $this;
    }

    public function removeTelefono($telefono)
    {
    	if (false !== $key = array_search($telefono, $this->telefonos, true)) {
    		unset($this->telefonos[$key]);
    		$this->telefonos = array_values($this->telefonos);
    	}
    
    	return $this;
    }

    /**
     * Set tipo_documento
     *
     * @param string $tipoDocumento
     * @return Persona
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipo_documento = $tipoDocumento;
    
        return $this;
    }

    /**
     * Get tipo_documento
     *
     * @return string 
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set numero_documento
     *
     * @param integer $numeroDocumento
     * @return Persona
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numero_documento = $numeroDocumento;
    
        return $this;
    }

    /**
     * Get numero_documento
     *
     * @return integer 
     */
    public function getNumeroDocumento()
    {
        return $this->numero_documento;
    }
    
    /**
     * Set pendiente_actualizacion
     *
     * @param boolean $pendienteActualizacion
     * @return Persona
     */
    public function setPendienteActualizacion($pendienteActualizacion)
    {
        $this->pendiente_actualizacion = $pendienteActualizacion;
    
        return $this;
    }

    /**
     * Get pendiente_actualizacion
     *
     * @return boolean 
     */
    public function getPendienteActualizacion()
    {
        return $this->pendiente_actualizacion;
    }
}