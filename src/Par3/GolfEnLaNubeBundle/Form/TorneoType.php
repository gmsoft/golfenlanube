<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class TorneoType extends AbstractType
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
            ->add('inicio', 'date', array('widget' => 'single_text'))
            
/*            ->add('inicio', 'genemu_jquerydate', array('widget' =>  'single_text',
        															'format' => 'dd-MM-yyyy'))
*/
            ->add('dias', 'hidden')
            // ->add('hoyos_por_dia', 'hidden')
            
            ->add('apertura_inscripcion', 'date', array('widget' => 'single_text'))
           /* ->add('apertura_inscripcion', 'genemu_jquerydate', array(	'widget' => 'single_text',
        																'format' => 'dd-MM-yyyy',
            															'label' => 'Apertura de inscripción'))
            															*/
            ->add('cierre_inscripcion', 'date', array('widget' => 'single_text'))
            /*
             * por algún motivo el genemu_jquerydate no me qejaba modificar los minDate así que hice el datepicker a mano
            ->add('cierre_inscripcion', 'genemu_jquerydate', array( 'widget' => 'single_text',
        															'format' => 'dd-MM-yyyy',
            															'label' => 'Cierre de inscripción'))
            */

      		->add('titulares_por_club')
      		->add('suplentes_por_club')
            ->add('institucion', 'entity_hidden', array('class'=> 'GolfEnLaNubeBundle:Institucion'))

            ->add('formato_juego', 'entity', array(	'class'=> 'GolfEnLaNubeBundle:FormatoJuego',
            										'empty_value' => false ))
            ->add('total_hoyos', 'choice', array('mapped'=> false,
            									 'label' => 'Torneo a',
            									'choices' => array ('9;1' =>  '9 hoyos en 1 dia',
            														'18;1' => '18 hoyos en 1 dia', 
            														'36;1' => '36 hoyos en 1 dia', 
            														'18;2' => '36 hoyos en 2 dias', 
            														'18;3' => '54 hoyos en 3 dias', 
            														'18;4' => '72 hoyos en 4 dias'),
        										))
            ->add('fechas', 'bootstrap_collection', array('type' => new TorneoFechaType( $this->_em, $this->_opciones ), 
            											'allow_add' => true, 
            											'by_reference' => false,
            											) )
        ;
            
        if ( ! is_null($this->_opciones['id_temporada']))
        {
           	$builder->add('temporada', 'entity_hidden', array('class'=> 'GolfEnLaNubeBundle:Temporada'));
        }
            
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
