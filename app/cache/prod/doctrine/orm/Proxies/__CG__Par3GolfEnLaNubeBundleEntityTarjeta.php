<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Tarjeta extends \Par3\GolfEnLaNubeBundle\Entity\Tarjeta implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function actualizarScoresTotales()
    {
        $this->__load();
        return parent::actualizarScoresTotales();
    }

    public function totalIda()
    {
        $this->__load();
        return parent::totalIda();
    }

    public function totalVuelta()
    {
        $this->__load();
        return parent::totalVuelta();
    }

    public function getSumaUltimosNHoyosNeto($n)
    {
        $this->__load();
        return parent::getSumaUltimosNHoyosNeto($n);
    }

    public function getSumaUltimosNHoyos($n)
    {
        $this->__load();
        return parent::getSumaUltimosNHoyos($n);
    }

    public function getDescripcionEstado($estado)
    {
        $this->__load();
        return parent::getDescripcionEstado($estado);
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
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

    public function addHoyo(\Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos)
    {
        $this->__load();
        return parent::addHoyo($hoyos);
    }

    public function removeHoyo(\Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo $hoyos)
    {
        $this->__load();
        return parent::removeHoyo($hoyos);
    }

    public function getHoyos()
    {
        $this->__load();
        return parent::getHoyos();
    }

    public function setScoreGross($scoreGross)
    {
        $this->__load();
        return parent::setScoreGross($scoreGross);
    }

    public function getScoreGross()
    {
        $this->__load();
        return parent::getScoreGross();
    }

    public function setScoreNeto($scoreNeto)
    {
        $this->__load();
        return parent::setScoreNeto($scoreNeto);
    }

    public function getScoreNeto()
    {
        $this->__load();
        return parent::getScoreNeto();
    }

    public function setIdTorneoFechaJugador($idTorneoFechaJugador)
    {
        $this->__load();
        return parent::setIdTorneoFechaJugador($idTorneoFechaJugador);
    }

    public function getIdTorneoFechaJugador()
    {
        $this->__load();
        return parent::getIdTorneoFechaJugador();
    }

    public function setTorneoFechaJugador(\Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador $torneoFechaJugador = NULL)
    {
        $this->__load();
        return parent::setTorneoFechaJugador($torneoFechaJugador);
    }

    public function getTorneoFechaJugador()
    {
        $this->__load();
        return parent::getTorneoFechaJugador();
    }

    public function setEstado($estado)
    {
        $this->__load();
        return parent::setEstado($estado);
    }

    public function getEstado()
    {
        $this->__load();
        return parent::getEstado();
    }

    public function setComentario($comentario)
    {
        $this->__load();
        return parent::setComentario($comentario);
    }

    public function getComentario()
    {
        $this->__load();
        return parent::getComentario();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_torneo_fecha_jugador', 'estado', 'comentario', 'score_gross', 'score_neto', 'torneo_fecha_jugador', 'hoyos');
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