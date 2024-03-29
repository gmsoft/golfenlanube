<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Campeonato extends \Par3\GolfEnLaNubeBundle\Entity\Campeonato implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getInstanciaReglamentoJuego()
    {
        $this->__load();
        return parent::getInstanciaReglamentoJuego();
    }

    public function getPadreMasLejano()
    {
        $this->__load();
        return parent::getPadreMasLejano();
    }

    public function puedeAdjuntarTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneo)
    {
        $this->__load();
        return parent::puedeAdjuntarTorneo($torneo);
    }

    public function limpiarTorneos()
    {
        $this->__load();
        return parent::limpiarTorneos();
    }

    public function limpiarCampeonatos()
    {
        $this->__load();
        return parent::limpiarCampeonatos();
    }

    public function tieneCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonato)
    {
        $this->__load();
        return parent::tieneCampeonato($campeonato);
    }

    public function tieneTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneo)
    {
        $this->__load();
        return parent::tieneTorneo($torneo);
    }

    public function getTodosTorneos()
    {
        $this->__load();
        return parent::getTodosTorneos();
    }

    public function getTodosCampeonatos()
    {
        $this->__load();
        return parent::getTodosCampeonatos();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setIdTemporada($idTemporada)
    {
        $this->__load();
        return parent::setIdTemporada($idTemporada);
    }

    public function getIdTemporada()
    {
        $this->__load();
        return parent::getIdTemporada();
    }

    public function setNombre($nombre)
    {
        $this->__load();
        return parent::setNombre($nombre);
    }

    public function getNombre()
    {
        $this->__load();
        return parent::getNombre();
    }

    public function setTemporada(\Par3\GolfEnLaNubeBundle\Entity\Temporada $temporada = NULL)
    {
        $this->__load();
        return parent::setTemporada($temporada);
    }

    public function getTemporada()
    {
        $this->__load();
        return parent::getTemporada();
    }

    public function addTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos)
    {
        $this->__load();
        return parent::addTorneo($torneos);
    }

    public function removeTorneo(\Par3\GolfEnLaNubeBundle\Entity\Torneo $torneos)
    {
        $this->__load();
        return parent::removeTorneo($torneos);
    }

    public function getTorneos()
    {
        $this->__load();
        return parent::getTorneos();
    }

    public function setIdPadre($idPadre)
    {
        $this->__load();
        return parent::setIdPadre($idPadre);
    }

    public function getIdPadre()
    {
        $this->__load();
        return parent::getIdPadre();
    }

    public function setPadre(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $padre = NULL)
    {
        $this->__load();
        return parent::setPadre($padre);
    }

    public function getPadre()
    {
        $this->__load();
        return parent::getPadre();
    }

    public function addCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos)
    {
        $this->__load();
        return parent::addCampeonato($campeonatos);
    }

    public function removeCampeonato(\Par3\GolfEnLaNubeBundle\Entity\Campeonato $campeonatos)
    {
        $this->__load();
        return parent::removeCampeonato($campeonatos);
    }

    public function getCampeonatos()
    {
        $this->__load();
        return parent::getCampeonatos();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_temporada', 'id_padre', 'nombre', 'temporada', 'padre', 'campeonatos', 'torneos');
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