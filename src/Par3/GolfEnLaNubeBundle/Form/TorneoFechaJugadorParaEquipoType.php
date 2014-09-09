<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;

class TorneoFechaJugadorParaEquipoType extends AbstractType
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
    	$opciones_jugador['class'] = 'GolfEnLaNubeBundle:Jugador';
		$opciones_jugador['empty_value'] = 'Jugador no informado';
		$opciones_jugador['required'] = false;
    	$opciones_jugador['choices'] = $this->_opciones['jugador_choices']; 
    	$opciones_jugador['attr'] = array('allowClear' => true);

        $builder
            ->add('capitan_equipo', 'hidden', array('required' => false))
            ->add('titular', 'hidden', array('required' => false))
            ->add('torneo_fecha', 'entity_hidden', array( 'class' => 'GolfEnLaNubeBundle:TorneoFecha'))
            ->add('jugador', 'genemu_jqueryselect2_entity', $opciones_jugador )
            ->add('club', 'entity_hidden', array( 'class' => 'GolfEnLaNubeBundle:Club'))
            ->add('handicap_de_juego', null, array('attr' => array('min' => -5, 'max' => 24), 'required' => false))
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
