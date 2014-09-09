<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Form\TorneoFechaType;

/**
 * TorneoFecha controller.
 *
 */
class TorneoFechaController extends Controller
{

    /**
     * Lists all TorneoFecha entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->findAll();

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    private function createDeleteTarjetaForm($id)
    {
    	return $this->createFormBuilder()
    	->setAction($this->generateUrl('admin_tarjeta_delete', array('id' => $id)))
    	->setMethod('DELETE')
    	->add('submit', 'submit', array('label' => 'Delete'))
    	->getForm()
    	;
    }

    public function listaJugadoresCargarTarjetasAction($id_torneo_fecha)
    {
     	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
    	$em = $this->getDoctrine()->getManager();
    	
    	$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);

    	if (!$torneo_fecha) {
    		throw $this->createNotFoundException('Torneo no valido.');
    	}
    	
    	$deleteForm = $this->createDeleteTarjetaForm('__NAME__');
    	 
    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:listaJugadoresCargarTarjetas.html.twig', array(
    			'torneo_fecha' => $torneo_fecha,
    			'delete_tarjeta_form' => $deleteForm->createView(), 
    	));
    }

    public function habilitarCargaTarjetasAction($id_torneo_fecha, $habilitar)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_HABILITAR_CARGA_TARJETAS'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);

    	if (!$torneo_fecha) {
    		throw $this->createNotFoundException('Torneo no valido.');
    	}

    	$valor = ($habilitar == 'habilitar' ) ? true : false; 
    	$torneo_fecha->setHabilitarCargaResultados($valor);

    	$em->flush();

    	return $this->redirect($this->generateUrl('admin_temporada_lista_torneo_fechas_concluidas', array( 'id_temporada' => $torneo_fecha->getTorneo()->getIdTemporada()) ));
    }

    public function comunicarResultadosPorMailAction($id_torneo_fecha)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN')) // _COMUNICAR_RESULTADOS_POR_MAIL
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);

    	if (!$torneo_fecha) {
    		throw $this->createNotFoundException('Torneo no valido.');
    	}
    	$resultados = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->resultadoDeTorneoFechaOrdenadosPor($id_torneo_fecha, 'tfj.posicion_por_neto');
    	
    	foreach ( $torneo_fecha->getTorneoFechaJugadoresConTarjeta() as $tfj)
    	{ 
    	
    		$to = $tfj->getJugador()->getPersona()->getUsuario()->getEmail();
    		$from = 'golfenlanube@gmail.com';
    		

	    	$message = \Swift_Message::newInstance()
	    	->setCharset('UTF-8')
	    	->setContentType('text/html')
	    	->setSubject('Resultados ' . $torneo_fecha->getTorneo()->getNombre() )
	    	->setFrom( $from )
	    	->setTo( $to )
	    	->setBody(
	    			$this->renderView(
	    					'GolfEnLaNubeBundle:TorneoFecha:emailResultadosPorJugador.html.twig',
	    					array(    			
	    							'entity'      => $torneo_fecha,
					    			'orden_por'		=> 'neto',
					    			'tarjetas'      => $resultados,
	    							'tarjetaJugador' => $tfj->getTarjeta(), 
	    							)
	    						)
	    	);
	    	$this->get('mailer')->send($message);
    	}

    	$this->get('braincrafted_bootstrap.flash')
    		->success('Se han enviado los mails a los participantes. ');
    	 
    	return $this->forward('GolfEnLaNubeBundle:Temporada:listaTorneoFechasConcluidas', array('id_temporada' => $torneo_fecha->getTorneo()->getIdTemporada()));
    	 
    }
    
    /**
     * Creates a new TorneoFecha entity.
     *
     */
    public function createAction(Request $request)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	$campos_enviados = $this->getRequest()->get('par3_golfenlanubebundle_torneofecha');

    	$torneo = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($campos_enviados['torneo']);

    	if (!$torneo) {
    		throw $this->createNotFoundException('Torneo no valido.');
    	}
    	
        $entity = new TorneoFecha();
        $entity->setNumeroFecha( $torneo->getFechas()->count()+1 );
        $entity->setTorneo($torneo);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_torneo_show', array('id' => $entity->getTorneo()->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TorneoFecha entity.
    *
    * @param TorneoFecha $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TorneoFecha $entity)
    {
        $form = $this->createForm(	new TorneoFechaType($this->getDoctrine()->getManager(), array('id_temporada' => $entity->getTorneo()->getIdTemporada())),
        							$entity, 
        							array(
            							'action' => $this->generateUrl('admin_torneofecha_create'),
            							'method' => 'POST', )
        						);

        $form	->add('fecha', 'genemu_jquerydate', array('widget' =>  'single_text',
        			'format' => 'dd-MM-yyyy'))
		        ->add('torneo', 'entity_hidden', array('class' => 'GolfEnLaNubeBundle:Torneo'))
        		->add('hoyos', 'choice', array('choices' => array(9 => 9, 18 => 18, 36 => 36, 54 => 54)))
        		->add('submit', 'submit', array('label' => 'Guardar'))
        		;
        
        return $form;
    }

    /**
     * Displays a form to create a new TorneoFecha entity.
     *
     */
    public function newAction($id_torneo)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	
    	$torneo = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($id_torneo);
    	if (!$torneo) {
    		throw $this->createNotFoundException('Torneo no valido.');
    	}
    	 
        $entity = new TorneoFecha();
        $entity->setFecha( clone $torneo->getInicio() );
        $entity->setTorneo($torneo);
        $form   = $this->createCreateForm($entity);

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TorneoFecha entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Torneofecha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TorneoFecha entity.
     *
     */
    public function editAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TorneoFecha entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TorneoFecha entity.
    *
    * @param TorneoFecha $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TorneoFecha $entity)
    {
        $form = $this->createForm(
        				new TorneoFechaType($this->getDoctrine()->getManager(), array('id_temporada' => $entity->getTorneo()->getIdTemporada())), 
        				$entity, 
        				array(
				            'action' => $this->generateUrl('admin_torneofecha_update', array('id' => $entity->getId())),
				            'method' => 'PUT',
				        ));
        
        $form	->remove('hoyos')
        		->add('hoyos', 'choice', array('choices' => array(9 => 9, 18 => 18, 36 => 36, 54 => 54)))
        		->add('fecha', 'genemu_jquerydate', array('widget' =>  'single_text',
        															'format' => 'dd-MM-yyyy'));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }
    /**
     * Edits an existing TorneoFecha entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
    	
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

    	
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TorneoFecha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_torneo_show', array('id' => $entity->getTorneo()->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TorneoFecha entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ELIMINAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TorneoFecha entity.');
            }
            
            $id_torneo = $entity->getTorneo()->getId();

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_torneo_show', array('id' => $id_torneo)));
    }

    /**
     * Creates a form to delete a TorneoFecha entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_torneofecha_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }

    /**
     *
     *
     */
    public function showFechaResultadosAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);
               
    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}

        $torneoFechaRepository = new \Par3\GolfEnLaNubeBundle\Entity\TorneoFechaRepository(
                $em, new \Doctrine\ORM\Mapping\ClassMetadata('TorneoFecha'));
    	$stringIdsTorneoFecha = $torneoFechaRepository->getIdsTorneoFechasParaTorneo($entity->getIdTorneo());
        $idsTorneoFecha = explode(',', $stringIdsTorneoFecha);

        return $this->render('GolfEnLaNubeBundle:TorneoFecha:showFechaResultados.html.twig', array(
    			'entity' 		=> $entity,
                        'ids_torneo_fecha'      => $idsTorneoFecha ));
    }
    
    public function showJugadoresAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        
        $entity = $em
    					->createQuery("SELECT tf, e, tc, c, tfj FROM GolfEnLaNubeBundle:TorneoFecha tf 
    										INNER JOIN tf.equipos e 
    										INNER JOIN e.temporada_club tc 
    										INNER JOIN tc.club c
    										INNER JOIN e.torneo_fecha_jugadores tfj
    										INNER JOIN tfj.jugador j
    										INNER JOIN j.persona p
    										WHERE tf.id = :id_torneo_fecha
    										ORDER BY c.nombre , tc.equipo_intraclub, tfj.titular DESC, p.nombre_completo")
    					->setParameter('id_torneo_fecha' , $id)
    					->execute();
        
    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}

    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:showJugadores.html.twig', array(
    			'entity'      => $entity[0],));
    }

    public function showDistribucionDePuntosAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);
    	    	
    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}
    	
    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:showDistribucionDePuntos.html.twig', array(
    			'entity'      => $entity,));
    }

    /**
     * Finds and displays a TorneoFecha entity.
     *
     */
    public function showResultadosPorClubAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}
    
    	$resultadosPorClub = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->resultadosOrdenadosPorScoreEquipo($id);

    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub.html.twig', array(
    			'entity'	=> $entity,
    			'resultados_por_club' 			=> $resultadosPorClub));
    }
    
    /**
     * 
     *
     */
    public function showResultadosPorNetoJugadorAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}

    	$resultados = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->resultadoDeTorneoFechaOrdenadosPor($id, 'tfj.posicion_por_neto');
    
    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:showResultadosPorJugador.html.twig', array(
    			'entity'      => $entity,
    			'orden_por'		=> 'neto',
    			'tarjetas'      => $resultados,));
    }

    /**
     * 
     *
     */
    public function showResultadosPorGrossJugadorAction($id)
    {
    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id);

    	if (!$entity) {
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}

    	$resultados = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->resultadoDeTorneoFechaOrdenadosPor($id, 'tfj.posicion_por_gross');

    	return $this->render('GolfEnLaNubeBundle:TorneoFecha:showResultadosPorJugador.html.twig', array(
    			'entity'      => $entity,
    			'orden_por'		=> 'gross',
    			'tarjetas'      => $resultados,));
    }

}
