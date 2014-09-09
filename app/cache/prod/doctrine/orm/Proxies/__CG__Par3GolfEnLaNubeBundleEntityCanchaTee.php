<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CanchaTee extends \Par3\GolfEnLaNubeBundle\Entity\CanchaTee implements \Doctrine\ORM\Proxy\Proxy
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

    public function setIdCancha($idCancha)
    {
        $this->__load();
        return parent::setIdCancha($idCancha);
    }

    public function getIdCancha()
    {
        $this->__load();
        return parent::getIdCancha();
    }

    public function setNumero($numero)
    {
        $this->__load();
        return parent::setNumero($numero);
    }

    public function getNumero()
    {
        $this->__load();
        return parent::getNumero();
    }

    public function setCalificacion($calificacion)
    {
        $this->__load();
        return parent::setCalificacion($calificacion);
    }

    public function getCalificacion()
    {
        $this->__load();
        return parent::getCalificacion();
    }

    public function setCancha(\Par3\GolfEnLaNubeBundle\Entity\Cancha $cancha = NULL)
    {
        $this->__load();
        return parent::setCancha($cancha);
    }

    public function getCancha()
    {
        $this->__load();
        return parent::getCancha();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_cancha', 'numero', 'calificacion', 'cancha');
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