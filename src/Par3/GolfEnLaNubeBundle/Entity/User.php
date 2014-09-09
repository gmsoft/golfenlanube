<?php

namespace Par3\GolfEnLaNubeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Par3\GolfEnLaNubeBundle\Entity\UserRepository")
 */
class User extends BaseUser
{

	/**
	 *
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id; 

	
	/**
	 * 
	 * @ORM\Column(name="id_institucion", type="integer", nullable=true);
	 */
	protected $id_institucion; 
	
	// relaciones

	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="Institucion")
	 * @ORM\JoinColumn(name="id_institucion", referencedColumnName="id")
	 */
	protected $institucion; 
	
	/**
	 *
	 * @ORM\OneToOne(targetEntity="Persona", mappedBy="usuario", cascade={"persist"})
	 */
	private $persona;

	/**
	 * @ORM\ManyToMany(targetEntity="Par3\GolfEnLaNubeBundle\Entity\Group")
	 * @ORM\JoinTable(name="usuario_perfil",
	 *      joinColumns={@ORM\JoinColumn(name="id_usuario", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="id_perfil", referencedColumnName="id")}
	 * )
	 */
	protected $groups;

	/**
	 * @ORM\ManyToMany(targetEntity="TemporadaClub", inversedBy="capitanes", cascade={"persist"})
	 * @ORM\JoinTable(name="temporada_club_usuario_capitan",
     *      joinColumns={@ORM\JoinColumn(name="id_usuario", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_temporada_club", referencedColumnName="id")}
     *      )
	 */
	protected $capitan_temporada_clubs;

	public function limpiarPerfiles()
	{
		foreach ($this->getGroups() as $group)
		{
			$this->removeGroup($group);
		}
	}
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->capitan_temporada_clubs  = new ArrayCollection();
		$this->groups = new ArrayCollection();
		parent::__construct();
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
     * Set persona
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\Persona $persona
     * @return User
     */
    public function setPersona(\Par3\GolfEnLaNubeBundle\Entity\Persona $persona = null)
    {
    	$persona->setUsuario($this);
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \Par3\GolfEnLaNubeBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set id_institucion
     *
     * @param integer $idInstitucion
     * @return User
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
     * @return User
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
     * Add capitan_temporada_clubs
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $capitanTemporadaClubs
     * @return User
     */
    public function addCapitanTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $capitanTemporadaClubs)
    {
        $this->capitan_temporada_clubs[] = $capitanTemporadaClubs;
    
        return $this;
    }

    /**
     * Remove capitan_temporada_clubs
     *
     * @param \Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $capitanTemporadaClubs
     */
    public function removeCapitanTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $capitanTemporadaClubs)
    {
        $this->capitan_temporada_clubs->removeElement($capitanTemporadaClubs);
    }

    public function esCapitanDeAlgunTemporadaClub($temporada)
    {
    	foreach ($this->getCapitanTemporadaClubs() as $tc)
    	{
    		if ($tc->getIdTemporada() == $temporada) return true;  
    	}
    	return false ;
    }
    
    /**
     * Get capitan_temporada_clubs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCapitanTemporadaClubs()
    {
        return $this->capitan_temporada_clubs;
    }

    public function getCapitanTemporadaClubsEnTemporada($id_temporada)
    {
    	$res = array();
    	foreach ($this->getCapitanTemporadaClubs() as $tc)
    	{
    		if ($tc->getIdTemporada() == $id_temporada) $res[] = $tc; 
    	}
    	return $res;
    }
    
    /**
     * 
     * @param integer $id_temporada
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getClubsCapitaneadosEnTemporada($id_temporada)
    {
    	$clubs = new ArrayCollection();

    	foreach ($this->getCapitanTemporadaClubs() as $tc)
    	{
    		if ($tc->getIdTemporada() == $id_temporada)
    			$clubs->add($tc->getClub());
    	}

    	return $clubs;
    }
    
    /**
     *
     * @param integer $id_temporada
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getIdClubsCapitaneadosEnTemporada($id_temporada)
    {
    	$ids = array();
    
    	foreach ($this->getClubsCapitaneadosEnTemporada($id_temporada) as $c)
    	{
   			$ids[] = $c->getId();
    	}
    
    	return $ids;
    }
    
    public function esCapitanDeTemporadaClub($id_temporada_club)
    {
    	foreach ($this->capitan_temporada_clubs as $tc)
    	{
    		if ($tc->getId() == $id_temporada_club) return true;
    	}
    	return false; 
    }
    public function esCapitanDeClubEnTemporada($id_club, $id_temporada)
    {
    	foreach ($this->capitan_temporada_clubs as $tc)
    	{
    		if ($tc->getIdTemporada() == $id_temporada && $tc->getIdClub() == $id_club) return true;
    	}
    	return false;
    }
    
    /**
     * TODO: contemplar torneos fuera de temporada del circuito
     * @param Club $club
     * @param TorneoFecha $torneo_fecha
     */
    public function autorizadoCrearEquipoEnTorneoFecha(Club $club, TorneoFecha $torneo_fecha)
    { 
    	return ( $this->esCapitanDeClubEnTemporada($club->getId(), $torneo_fecha->getTorneo()->getIdTemporada()) );
    }

}