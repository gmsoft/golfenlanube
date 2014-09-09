<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JugadorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('id_persona')
            // ->add('id_club')
            ->add('id', null, array('label'=>'Matricula AAG'))
            //->add('handicap_par3')
            //->add('handicap_estandar')
            ->add('persona', 'entity_hidden')
            ->add('club', 'genemu_jqueryselect2_entity', array(
									            'class' => 'Par3\GolfEnLaNubeBundle\Entity\Club', 
            									'required' => false
            		
            									))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Jugador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_jugador';
    }
}
