<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TemporadaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('id_circuito')
            ->add('circuito', 'entity_hidden', array('class' => 'Par3\GolfEnLaNubeBundle\Entity\Circuito'))
        	->add('nombre')
            ->add('inicio', 'genemu_jquerydate', array('widget' =>  'single_text',
        															'format' => 'dd-MM-yyyy'))
            ->add('fin', 'genemu_jquerydate', array('widget' =>  'single_text',
        															'format' => 'dd-MM-yyyy'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Temporada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_temporada';
    }
}
