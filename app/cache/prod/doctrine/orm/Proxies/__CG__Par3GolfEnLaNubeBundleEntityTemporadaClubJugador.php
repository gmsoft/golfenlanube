<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class TemporadaClubJugador extends \Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setIdTemporadaClub($idTemporadaClub)
    {
        $this->__load();
        return parent::setIdTemporadaClub($idTemporadaClub);
    }

    public function getIdTemporadaClub()
    {
        $this->__load();
        return parent::getIdTemporadaClub();
    }

    public function setIdJugador($idJugador)
    {
        $this->__load();
        return parent::setIdJugador($idJugador);
    }

    public function getIdJugador()
    {
        $this->__load();
        return parent::getIdJugador();
    }

    public function setCumpleReglamento($cumpleReglamento)
    {
        $this->__load();
        return parent::setCumpleReglamento($cumpleReglamento);
    }

    public function getCumpleReglamento()
    {
        $this->__load();
        return parent::getCumpleReglamento();
    }

    public function setCumpleTarjetas($cumpleTarjetas)
    {
        $this->__load();
        return parent::setCumpleTarjetas($cumpleTarjetas);
    }

    public function getCumpleTarjetas()
    {
        $this->__load();
        return parent::getCumpleTarjetas();
    }

    public function setTemporadaClub(\Par3\GolfEnLaNubeBundle\Entity\TemporadaClub $temporadaClub = NULL)
    {
        $this->__load();
        return parent::setTemporadaClub($temporadaClub);
    }

    public function getTemporadaClub()
    {
        $this->__load();
        return parent::getTemporadaClub();
    }

    public function setJugador(\Par3\GolfEnLaNubeBundle\Entity\Jugador $jugador = NULL)
    {
        $this->__load();
        return parent::setJugador($jugador);
    }

    public function getJugador()
    {
        $this->__load();
        return parent::getJugador();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_temporada_club', 'id_jugador', 'cumple_reglamento', 'cumple_tarjetas', 'temporada_club', 'jugador');
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