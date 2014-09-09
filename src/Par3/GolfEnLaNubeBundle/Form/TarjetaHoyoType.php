<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TarjetaHoyoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('id_tarjeta')
            ->add('hoyo', 'hidden')
            ->add('golpes', null, array("attr" => array('class' => 'input-sm')))
            // ->add('tarjeta')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_tarjetahoyo';
    }
}
