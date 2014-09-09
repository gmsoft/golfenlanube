<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Par3;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;

class TarjetaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('estado', 'choice', array('choices' => Tarjeta::getListaEstados()))
        	->add('comentario', 'textarea', array('max_length' => 255, 'required' => false))
            ->add('torneo_fecha_jugador', 'entity_hidden', array('class' => 'Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador' ))
            ->add('hoyos', 'bootstrap_collection', array('type' => new TarjetaHoyoType(), 
            											 'allow_add'=> true, 
            											 'by_reference' => false))
        ; 
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Tarjeta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_tarjeta';
    }
}
