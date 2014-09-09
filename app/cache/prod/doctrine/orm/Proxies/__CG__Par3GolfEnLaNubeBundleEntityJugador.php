<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Jugador extends \Par3\GolfEnLaNubeBundle\Entity\Jugador implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function totalTarjetasPar3()
    {
        $this->__load();
        return parent::totalTarjetasPar3();
    }

    public function totalTarjetasEstandar()
    {
        $this->__load();
        return parent::totalTarjetasEstandar();
    }

    public function totalPar3Ultimos12Meses()
    {
        $this->__load();
        return parent::totalPar3Ultimos12Meses();
    }

    public function totalEstandarUltimos12Meses()
    {
        $this->__load();
        return parent::totalEstandarUltimos12Meses();
    }

    public function cumpleTarjetas()
    {
        $this->__load();
        return parent::cumpleTarjetas();
    }

    public function cumpleTarjetasPar3()
    {
        $this->__load();
        return parent::cumpleTarjetasPar3();
    }

    public function handicapDeJuego()
    {
        $this->__load();
        return parent::handicapDeJuego();
    }

    public function hayActualizacionEnMesDeFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::hayActualizacionEnMesDeFecha($fecha);
    }

    public function actualizacionEnMesDeFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::actualizacionEnMesDeFecha($fecha);
    }

    public function actualizacionesNMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
    {
        $this->__load();
        return parent::actualizacionesNMesesAnterioresAFecha($fecha, $n);
    }

    public function totalPar3NMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
    {
        $this->__load();
        return parent::totalPar3NMesesAnterioresAFecha($fecha, $n);
    }

    public function totalEstandarNMesesAnterioresAFecha(\DateTime $fecha, $n = 12)
    {
        $this->__load();
        return parent::totalEstandarNMesesAnterioresAFecha($fecha, $n);
    }

    public function cumpleTarjetasPar3ParaFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::cumpleTarjetasPar3ParaFecha($fecha);
    }

    public function cumpleTarjetasParaFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::cumpleTarjetasParaFecha($fecha);
    }

    public function actualizacionMasProximaAFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::actualizacionMasProximaAFecha($fecha);
    }

    public function handicapDeJuegoParaFechaActual()
    {
        $this->__load();
        return parent::handicapDeJuegoParaFechaActual();
    }

    public function handicapDeJuegoParaFecha(\DateTime $fecha)
    {
        $this->__load();
        return parent::handicapDeJuegoParaFecha($fecha);
    }

    public function actualizarHandicapsAUltimoVigente()
    {
        $this->__load();
        return parent::actualizarHandicapsAUltimoVigente();
    }

    public function getActualizacionesOrderByVigenciaDesc()
    {
        $this->__load();
        return parent::getActualizacionesOrderByVigenciaDesc();
    }

    public function getUsuario()
    {
        $this->__load();
        return parent::getUsuario();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setIdPersona($idPersona)
    {
        $this->__load();
        return parent::setIdPersona($idPersona);
    }

    public function getIdPersona()
    {
        $this->__load();
        return parent::getIdPersona();
    }

    public function setIdClub($idClub)
    {
        $this->__load();
        return parent::setIdClub($idClub);
    }

    public function getIdClub()
    {
        $this->__load();
        return parent::getIdClub();
    }

    public function setMatriculaAag($matriculaAag)
    {
        $this->__load();
        return parent::setMatriculaAag($matriculaAag);
    }

    public function getMatriculaAag()
    {
        $this->__load();
        return parent::getMatriculaAag();
    }

    public function setHandicapPar3($handicapPar3)
    {
        $this->__load();
        return parent::setHandicapPar3($handicapPar3);
    }

    public function getHandicapPar3()
    {
        $this->__load();
        return parent::getHandicapPar3();
    }

    public function setHandicapEstandar($handicapEstandar)
    {
        $this->__load();
        return parent::setHandicapEstandar($handicapEstandar);
    }

    public function getHandicapEstandar()
    {
        $this->__load();
        return parent::getHandicapEstandar();
    }

    public function setPersona(\Par3\GolfEnLaNubeBundle\Entity\Persona $persona = NULL)
    {
        $this->__load();
        return parent::setPersona($persona);
    }

    public function getPersona()
    {
        $this->__load();
        return parent::getPersona();
    }

    public function setClub(\Par3\GolfEnLaNubeBundle\Entity\Club $club = NULL)
    {
        $this->__load();
        return parent::setClub($club);
    }

    public function getClub()
    {
        $this->__load();
        return parent::getClub();
    }

    public function addTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas)
    {
        $this->__load();
        return parent::addTorneoFecha($torneoFechas);
    }

    public function removeTorneoFecha(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechas)
    {
        $this->__load();
        return parent::removeTorneoFecha($torneoFechas);
    }

    public function getTorneoFechas()
    {
        $this->__load();
        return parent::getTorneoFechas();
    }

    public function addActualizacione(\Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones)
    {
        $this->__load();
        return parent::addActualizacione($actualizaciones);
    }

    public function removeActualizacione(\Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion $actualizaciones)
    {
        $this->__load();
        return parent::removeActualizacione($actualizaciones);
    }

    public function getActualizaciones()
    {
        $this->__load();
        return parent::getActualizaciones();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function addTemporadaClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores)
    {
        $this->__load();
        return parent::addTemporadaClubJugadore($temporadaClubJugadores);
    }

    public function removeTemporadaClubJugadore(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador $temporadaClubJugadores)
    {
        $this->__load();
        return parent::removeTemporadaClubJugadore($temporadaClubJugadores);
    }

    public function getTemporadaClubJugadores()
    {
        $this->__load();
        return parent::getTemporadaClubJugadores();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_persona', 'id_club', 'handicap_par3', 'handicap_estandar', 'persona', 'club', 'torneo_fechas', 'temporada_club_jugadores', 'actualizaciones');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}