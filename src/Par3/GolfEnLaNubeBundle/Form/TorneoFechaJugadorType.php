<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TorneoFechaJugadorType extends AbstractType
{
	/**
	 * @var EntityManager
	 */
	private $_em ; 

	/**
	 * 
	 * @var array
	 */
	private $_opciones = array();

	/**
	 * 
	 * @param $em
	 * @param unknown $opciones
	 */
	public function __construct( EntityManager $em, $opciones = array())
	{
		$this->_em = $em;
		$this->_opciones = array_merge($this->_opciones, $opciones);
	} 

	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capitan_equipo')
            ->add('titular')
            ->add('id_club')
            ->add('handicap_par3')
            ->add('handicap_estandar')
            ->add('torneo_fecha', 'entity_hidden')
            ->add('jugador')
            ->add('equipo')
            ->add('club')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_torneofechajugador';
    }
}
