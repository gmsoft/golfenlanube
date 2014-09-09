<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Par3\GolfEnLaNubeBundle\Entity\User;

class UserCreateType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label'=>'Usuario'))
            ->add('email', 'email')
            ->add('enabled', 'choice', array('choices' => array( 1 => 'Si', 0 => 'No'),
        									'label' => 'Habilitado'))
            ->add('plainPassword', 'repeated', array(	'type' => 'password', 
            											'invalid_message' => 'Las contraseñas no coinciden.',
														'options' => array('attr' => array('class' => 'password-field')),
														'required' => true,
														'first_options' => array('label' => 'Contraseña'),
														'second_options' => array('label' => 'Repetir contraseña'),))
            // ->add('expiresAt', null, '')
            //->add('roles')
            // ->add('id_institucion')
            //->add('institucion')
            ->add('persona' , new PersonaType())
            //->add('groups')
            //->add('capitan_temporada_clubs')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_user';
    }
}
