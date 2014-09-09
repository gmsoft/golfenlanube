<?php

namespace Par3\GolfEnLaNubeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Util\Debug;

class TemporadaClubJugadorType extends AbstractType
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
            ->add('temporada_club', 'entity_hidden', array(	'class' => 'GolfEnLaNubeBundle:TemporadaClub'))
            ->add('id_jugador', 'genemu_jqueryselect2_choice', 
            							array(	'choices' => $this->_em->getRepository('GolfEnLaNubeBundle:Jugador')
            												->jugadoresDeClubNoEnTemporadaClubParaChoices($this->_opciones['temporada_club'])
            									, 'label' => 'Jugador' 
            							));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'par3_golfenlanubebundle_temporadaclubjugador';
    }
}
