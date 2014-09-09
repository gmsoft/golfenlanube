<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Par3\GolfEnLaNubeBundle\Entity\User;

class UserEditDatosPersonalesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array(	'type' => 'password', 
            											'invalid_message' => 'Las contraseñas no coinciden.',
														'options' => array('attr' => array('class' => 'password-field')),
														'required' => false,
														'first_options' => array('label' => 'Contraseña'),
														'second_options' => array('label' => 'Repetir contraseña'),))
            ->add('persona' , new PersonaType())
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
