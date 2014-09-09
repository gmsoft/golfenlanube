<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;

class EquipoType extends AbstractType
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
    	
    	/* TODO : FIXME: El listado de jugadores que se presenta en este form asume solo el caso para socios circuito Par3 donde los jugadores que pueden 
    	 				 anotarse a un equipo son solo aquellos que fueron presentados en una lista de buena fe. Para la etapa 2 hay que posibilitar también
    	 				 que se anoten otros jugadores, según sea el caso de un torneo de un club particular, de otro circuito, o en el caso detorneos abiertos
    	 				 o semi-abiertos, jugadores que no pertenecen a la misma institución que organiza el torneo   
    	*/ 
    	$opciones_torneo_fecha_jugador_type['jugador_choices' ] = array (); 
    	if (isset($this->_opciones['id_temporada']) && !is_null($this->_opciones['id_temporada']) ) 
    	{
    		$opciones_torneo_fecha_jugador_type['jugador_choices' ] = $this->_em
	    		->getRepository('GolfEnLaNubeBundle:Jugador')
    			->todosJugadoresDeTemporadaClubHabilitadosParaFecha( $this->_opciones['id_temporada_club'], $this->_opciones['fecha']) ;
	    		//->todosJugadoresDeClubHabilitadosParaFechaEnTemporada( $this->_opciones['id_club'], $this->_opciones['id_temporada'], $this->_opciones['fecha']) ;
    	}

    	$this->_opciones = array_merge($this->_opciones, $opciones_torneo_fecha_jugador_type);
    
        $builder
            // ->add('nombre')
            // ->add('club', 'genemu_jqueryselect2_entity', array('class' => 'GolfEnLaNubeBundle:Club', 'choices' => $this->_opciones['clubs']))
        	->add('temporada_club', 'genemu_jqueryselect2_entity', array('class' => 'GolfEnLaNubeBundle:TemporadaClub', 'choices' => $this->_opciones['clubs']))
            ->add('torneo_fecha', 'entity_hidden', array('class' => 'GolfEnLaNubeBundle:TorneoFecha'))
            ->add('torneo_fecha_jugadores', 'bootstrap_collection', array(
            												'type' => new TorneoFechaJugadorParaEquipoType($this->_em, $this->_opciones),
        													'allow_add' => true,
            												'by_reference' => false, 
            		
        		))
        ;
    }
   
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\Equipo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_equipo';
    }
}
