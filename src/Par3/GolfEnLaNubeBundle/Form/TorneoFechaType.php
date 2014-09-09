<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;

class TorneoFechaType extends AbstractType
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
	 * @param EntityManager $em 
	 * @param array $opciones
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
    	$opciones_cancha['class'] = 'GolfEnLaNubeBundle:Cancha';
    	if (isset($this->_opciones['id_temporada']))
    	{
    		$opciones_cancha['choices'] = $this->_em
    						->getRepository('GolfEnLaNubeBundle:Cancha')->findAll();
    	}

        $builder
        /*
      		->add('apertura_inscripcion', 'genemu_jquerydate', array(	'widget' => 'single_text',
        		'format' => 'dd-MM-yyyy',
        		'label' => 'Apertura de inscripción'))
        	->add('cierre_inscripcion', 'genemu_jquerydate', array( 'widget' => 'single_text',
        				'format' => 'dd-MM-yyyy',
        				'label' => 'Cierre de inscripción'))
		*/
        	->add('hoyos', 'hidden')
            ->add('jugadores_por_linea')
            ->add('salidas_simultaneas')
        	->add('cancha', 'genemu_jqueryselect2_entity', $opciones_cancha)
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\TorneoFecha'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_torneofecha';
    }
}
