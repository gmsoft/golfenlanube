<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class TorneoEditType extends AbstractType
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
        	->add('temporada', 'entity_hidden', array("class" => "GolfEnLaNubeBundle:Temporada"))
            ->add('nombre')

            ->add('inicio', 'genemu_jquerydate', array('widget' =>  'single_text',
        															'format' => 'dd-MM-yyyy'))

            ->add('apertura_inscripcion', 'genemu_jquerydate', array(	'widget' => 'single_text',
        																'format' => 'dd-MM-yyyy',
            															'label' => 'Apertura de inscripción'))
            ->add('cierre_inscripcion', 'genemu_jquerydate', array( 'widget' => 'single_text',
        															'format' => 'dd-MM-yyyy',
            															'label' => 'Cierre de inscripción'))

      		->add('titulares_por_club')
      		->add('suplentes_por_club')
            ->add('institucion', 'entity_hidden', array('class'=> 'GolfEnLaNubeBundle:Institucion'))

            ->add('formato_juego', 'entity', array(	'class'=> 'GolfEnLaNubeBundle:FormatoJuego',
            										'empty_value' => false ))
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Torneo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_torneo';
    }
}
