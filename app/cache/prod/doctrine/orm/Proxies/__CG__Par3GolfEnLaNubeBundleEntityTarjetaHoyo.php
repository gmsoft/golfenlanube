<?php

namespace Proxies\__CG__\Par3\GolfEnLaNubeBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class TarjetaHoyo extends \Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo implements \Doctrine\ORM\Proxy\Proxy
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

    public function setIdTarjeta($idTarjeta)
    {
        $this->__load();
        return parent::setIdTarjeta($idTarjeta);
    }

    public function getIdTarjeta()
    {
        $this->__load();
        return parent::getIdTarjeta();
    }

    public function setHoyo($hoyo)
    {
        $this->__load();
        return parent::setHoyo($hoyo);
    }

    public function getHoyo()
    {
        $this->__load();
        return parent::getHoyo();
    }

    public function setGolpes($golpes)
    {
        $this->__load();
        return parent::setGolpes($golpes);
    }

    public function getGolpes()
    {
        $this->__load();
        return parent::getGolpes();
    }

    public function setTarjeta(\Par3\GolfEnLaNubeBundle\Entity\Tarjeta $tarjeta = NULL)
    {
        $this->__load();
        return parent::setTarjeta($tarjeta);
    }

    public function getTarjeta()
    {
        $this->__load();
        return parent::getTarjeta();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'id_tarjeta', 'hoyo', 'golpes', 'tarjeta');
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