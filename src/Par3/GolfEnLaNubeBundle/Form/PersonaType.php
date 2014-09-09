<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Par3\GolfEnLaNubeBundle\Entity\Persona;

class PersonaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$hoy = new \DateTime();
        $builder
            // ->add('id_usuario')
            ->add('nombre_completo', null, array('label' => "APELLIDO Y NOMBRE"))
            ->add('sexo', 'choice', array('choices' => array(
            										Persona::SEXO_MASCULINO => 'Masculino',
            										Persona::SEXO_FEMENINO => 'Femenino')))
			->add('fecha_nacimiento','date', array(	'widget' => 'single_text',
            										'format' => 'dd-MM-yyyy',
            										))
            										
/*
 * 
            ->add('fecha_nacimiento','genemu_jquerydate', array(	'widget' => 'single_text',
        															'format' => 'dd-MM-yyyy', 
            															))
            															*/
            ->add('tipo_documento', 'choice', array('choices' => Persona::getTiposDocumento()))
            ->add('numero_documento')
            //->add('telefonos')
            // ->add('pendiente_actualizacion')
            ->add('usuario', 'entity_hidden')
            // ->add('jugador', new JugadorType());
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Persona'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_persona';
    }
}
