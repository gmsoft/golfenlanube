<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\Campeonato;
use Par3\GolfEnLaNubeBundle\Form\CampeonatoType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Doctrine\Common\Util\Debug;

/**
 * Campeonato controller.
 *
 */
class CampeonatoController extends Controller
{

    /**
     * Lists all Campeonato entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->findAll();

        return $this->render('GolfEnLaNubeBundle:Campeonato:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Lists all Campeonato entities.
     *
     */
    public function listaPorTemporadaAction($id_temporada)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_CAMPEONATOS'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	
    	$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
    	
    	if (!$temporada) {
    		throw $this->createNotFoundException('Temporada no valida.');
    	}
    	
    	 
    	$entities = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->findBy(array('id_temporada' => $id_temporada));
    
    	return $this->render('GolfEnLaNubeBundle:Campeonato:index.html.twig', array(
    			'temporada' => $temporada,
    			'entities' => $entities,
    	));
    }
    
    /**
     * Creates a new Campeonato entity.
     *
     */
    public function createAction(Request $request)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_CAMPEONATO'))
    	{
    		throw new AccessDeniedException();
    	}

        $entity = new Campeonato();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_campeonato_show', array('id' => $entity->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:Campeonato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Campeonato entity.
    *
    * @param Campeonato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Campeonato $entity)
    {
        $form = $this->createForm(new CampeonatoType(), $entity, array(
            'action' => $this->generateUrl('admin_campeonato_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Campeonato entity.
     *
     */
    public function newAction($id_temporada)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_CAMPEONATO'))
    	{
    		throw new AccessDeniedException();
    	}
    	
    	$em = $this->getDoctrine()->getManager();
    	
    	$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
    	 
    	if (!$temporada) {
    		throw $this->createNotFoundException('Temporada no valida.');
    	}

        $entity = new Campeonato();
        $entity->setTemporada($temporada);
        $form   = $this->createCreateForm($entity);

        return $this->render('GolfEnLaNubeBundle:Campeonato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * 
     *
     */
    public function seleccionarCampeonatosAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Campeonato no valido.');
    	}
    
    	$campeonatos = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->findBy(array('id_temporada' => $entity->getTemporada()->getId()));
    
    	return $this->render('GolfEnLaNubeBundle:Campeonato:seleccionarCampeonatos.html.twig', array(
    			'entity'      => $entity,
    			'campeonatos' => $campeonatos,
    			));
    }

    public function adjuntarCampeonatosAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$campeonatos = $this->getRequest()->get('campeonatos', array());

    	$em = $this->getDoctrine()->getManager();
    
    	$campeonato = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);
    
    	if ( !$campeonato) {
    		throw $this->createNotFoundException('Campeonato no valido.');
    	}
    	$campeonato->limpiarCampeonatos();
    	foreach ($campeonatos as $id_campeonato)
    	{
    		$c = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find( $id_campeonato );
    		$campeonato->addCampeonato($c);
    	}
    	$em->flush();

    	return $this->redirect($this->generateUrl('admin_campeonato_show', array('id' => $id)));
    }
    
    /**
     *
     *
     */
    public function seleccionarTorneosAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Campeonato no valido.');
    	}
    
    	$torneos = $em->getRepository('GolfEnLaNubeBundle:Torneo')->findBy(array('id_temporada' => $entity->getTemporada()->getId()));
    
    	return $this->render('GolfEnLaNubeBundle:Campeonato:seleccionarTorneos.html.twig', array(
    			'entity'      => $entity,
    			'torneos' => $torneos,
    	));
    }
    
    public function adjuntarTorneosAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$torneos = $this->getRequest()->get('torneos', array());
    
    	$em = $this->getDoctrine()->getManager();
    
    	$campeonato = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);
    
    	if ( !$campeonato) {
    		throw $this->createNotFoundException('Campeonato no valido.');
    	}
    	$campeonato->limpiarTorneos();
    	 
    	foreach ($torneos as $id_torneo)
    	{
    		$t = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find( $id_torneo );
    		$campeonato->addTorneo($t);
    	}
    	 
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('admin_campeonato_show', array('id' => $id)));
    }
    
    
    /**
     * Finds and displays a Campeonato entity.
     *
     */
    public function showAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_CAMPEONATOS'))
    	{
    		throw new AccessDeniedException();
    	}

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campeonato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Campeonato:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Campeonato entity.
     *
     */
    public function editAction($id)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_CAMPEONATO'))
    	{
    		throw new AccessDeniedException();
    	}
    	
    	$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campeonato entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Campeonato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Campeonato entity.
    *
    * @param Campeonato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Campeonato $entity)
    {
        $form = $this->createForm(new CampeonatoType(), $entity, array(
            'action' => $this->generateUrl('admin_campeonato_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Campeonato entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_CAMPEONATO'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Campeonato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_campeonato_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:Campeonato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Campeonato entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ELIMINAR_CAMPEONATO'))
    	{
    		throw new AccessDeniedException();
    	}

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Campeonato entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_campeonato'));
    }

    /**
     * Creates a form to delete a Campeonato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_campeonato_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function getTodasFechasDeCamepeonato( Campeonato $campeonato)
    {
    	$fechas = array();
    	foreach ($campeonato->getTodosTorneos() as $t)
    	{
    		$fechas = array_merge($fechas, $t->getFechas()->toArray());
    	}
    	return $fechas;
    }
    
    public function getTodosEquiposDeCamepeonato( Campeonato $campeonato)
    {
    	$equipos = array();
    	foreach ($campeonato->getTodosTorneos() as $t)
    	{
    		foreach ($t->getFechas() as $f)
    		{
    			$equipos = array_merge($equipos, $f->getEquipos()->toArray());
    		}
    	}
    	return $equipos;
    }
    
    public function algoritmoOrderResultadosPorCampeonatoByPuntajeDesc($a, $b)
    {
    	if (current($a) == current($b)) return 0 ;
    	return (current($a) > current($b)) ? -1 : 1;
    }
    
    public function algoritmoOrderTotalesPorFechaByPuntajeDesc($a, $b)
    {
    	if (current($a) == current($b)) return 0 ;
    	return (current($a) > current($b)) ? -1 : 1;
    }
    
    public function tablaDePosicionesAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$campeonato = $em->getRepository('GolfEnLaNubeBundle:Campeonato')->find($id);

    	if (!$campeonato) {
    		throw $this->createNotFoundException('Campeonato no valido.');
    	}

    	// $this->getDoctrine()->getManager()->getRepository('GolfEnLaNubeBundle:Campeonato')->tablaDeResultadosPorTemporadaClub($campeonato->getId()) ;
    	$totales_por_fecha = $resultados_por_campeonato = array() ; 
    	
    	if ( ! $campeonato->getCampeonatos()->isEmpty())
    	{

    		foreach ($this->getTodosEquiposDeCamepeonato($campeonato) as $e) 
    		{
    			$equipo_nombre = $e->getTemporadaClub()->getClub()->getNombre() ;
    			if ($e->getTemporadaClub()->getEquipoIntraclub()) $equipo_nombre .= ' "' . $e->getTemporadaClub()->getEquipoIntraclub() . '"';
    			
    			$resultados_por_campeonato[ $equipo_nombre ] [ $campeonato->getNombre() ] = 0 ;
    			foreach ($campeonato->getCampeonatos() as $c)		$resultados_por_campeonato[ $equipo_nombre ] [ $c->getNombre() ] = 0 ; 
    		}
    		
	    	foreach ($campeonato->getCampeonatos() as $c)
	    	{
	    		foreach ( $em->getRepository('GolfEnLaNubeBundle:Campeonato')->resultadosPorTemporadaClub( $c->getId() ) as $tc )
	    		{
	    			$equipo_nombre = str_replace(' ""', '', $tc['equipo_nombre']);
	    			// resultados TOTAL
	    			if (! isset ($resultados_por_campeonato[ $equipo_nombre ][ $campeonato->getNombre() ] ))
	    				$resultados_por_campeonato[ $equipo_nombre  ][ $campeonato->getNombre() ] = 0 ;
	    			$resultados_por_campeonato[ $equipo_nombre  ][ $campeonato->getNombre() ] += $tc['cc_puntaje'];

	    			// resultados parciales POR CAMPEONATO
	    			$resultados_por_campeonato[ $equipo_nombre ] [$c->getNombre()] = ( is_null($tc['cc_puntaje'])) ? 0 : $tc['cc_puntaje'] ;
	    		} 
	    	}
    	} else {
    		
    		
    		foreach ($this->getTodosEquiposDeCamepeonato($campeonato) as $e)
    		{
    			
    			$equipo_nombre = $e->getTemporadaClub()->getClub()->getNombre() ;
    			if ($e->getTemporadaClub()->getEquipoIntraclub()) $equipo_nombre .= ' "' . $e->getTemporadaClub()->getEquipoIntraclub() . '"';

    			$totales_por_fecha[ $equipo_nombre ] [ $campeonato->getNombre()] = 0 ;
    			foreach ($campeonato->getTorneos() as $t)
    			{
    				$totales_por_fecha[ $equipo_nombre ] [ $t->getNombre() ] = 0 ;
    			}
    		}
    		
    		foreach ( $em->getRepository('GolfEnLaNubeBundle:Campeonato')->resultadosPorTemporadaClubYFecha( $campeonato->getId() ) as $tc )
    		{
    			$equipo_nombre = str_replace(' ""', '', $tc['equipo_nombre']);
    			// resultados TOTALES del campeonato
    			if (! isset ($totales_por_fecha[ $equipo_nombre ] [ $campeonato->getNombre() ] ))
    				$totales_por_fecha[ $equipo_nombre ] [ $campeonato->getNombre() ] = 0 ;
    			$totales_por_fecha[ $equipo_nombre ] [ $campeonato->getNombre() ] += $tc['puntaje_total'];

    			// resultados parciales POR FECHA
    			$totales_por_fecha[ $equipo_nombre  ] [ $tc['nombre_torneo' ] ] = ( is_null($tc['puntaje_total'])) ? 0 : $tc['puntaje_total'] ;
    		}
    	}

		uasort($resultados_por_campeonato, array($this, 'algoritmoOrderResultadosPorCampeonatoByPuntajeDesc' ));
		uasort($totales_por_fecha, array($this, 'algoritmoOrderTotalesPorFechaByPuntajeDesc' ));
    	
    	return $this->render('GolfEnLaNubeBundle:Campeonato:tablaDePosiciones.html.twig', array(
    			'entity'      => $campeonato,
    			'totales_por_fecha' 			=> $totales_por_fecha,
    			'totales_por_campeonato'		=> $resultados_por_campeonato,
    	));
    }
}
