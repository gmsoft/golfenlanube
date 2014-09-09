<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\Tarjeta;
use Par3\GolfEnLaNubeBundle\Form\TarjetaType;
use Par3\GolfEnLaNubeBundle\Entity\TarjetaHoyo;
use Doctrine\Common\Util\Debug;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;

/**
 * Tarjeta controller.
 *
 * @Route("/tarjeta")
 */
class TarjetaController extends Controller
{

    /**
     * Lists all Tarjeta entities.
     *
     * @Route("/", name="tarjeta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tarjeta entity.
     *
     * @Route("/", name="tarjeta_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:Tarjeta:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
    	{
    		throw new AccessDeniedException();
    	}

        $entity = new Tarjeta();
		$form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
        	
        	$em = $this->getDoctrine()->getManager();

        	
        	/*
        	$entity->actualizarScoresTotales();
        	$this->actualizarPosicionesEquipoYTorneoFechaJugadores($entity->getTorneoFechaJugador()->getEquipo(), $entity->getTorneoFechaJugador()->getTorneoFecha());
        	*/
        	$this->actualizarPosicionesEquipoYTorneoFechaJugadores($entity->getTorneoFechaJugador()->getTorneoFecha());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tarjeta_show', array('id' => $entity->getId())));
        }
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    private function actualizarPosicionesEquipoYTorneoFechaJugadores(TorneoFecha $torneo_fecha)
    {
    	$em = $this->getDoctrine()->getManager();
    	 
    	$torneo_fecha->actualizarScoresPosicionesYPuntajes();
    	$em->persist($torneo_fecha);
		
    }

    /**
    * Creates a form to create a Tarjeta entity.
    *
    * @param Tarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tarjeta $entity)
    {
        $form = $this->createForm(new TarjetaType(), $entity, array(
            'action' => $this->generateUrl('admin_tarjeta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Tarjeta entity.
     *
     * @Route("/new", name="tarjeta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id_torneo_fecha_jugador)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
    	$em = $this->getDoctrine()->getManager();

    	$torneo_fecha_jugador = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->find($id_torneo_fecha_jugador);
    	
    	if (!$torneo_fecha_jugador) {
    		throw $this->createNotFoundException('Jugador no valido.');
    	}

        $entity = new Tarjeta();
	        $entity->setTorneoFechaJugador($torneo_fecha_jugador);
	        
        for ($h = 1 ; $h <= $torneo_fecha_jugador->getTorneoFecha()->getHoyos() ; ++$h)
        {
        	$tarjeta_hoyo = new TarjetaHoyo();
        		$tarjeta_hoyo->setHoyo($h);
        	$entity->addHoyo($tarjeta_hoyo);
        }

        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tarjeta entity.
     *
     * @Route("/{id}", name="tarjeta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tarjeta entity.
     *
     * @Route("/{id}/edit", name="tarjeta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Tarjeta entity.
    *
    * @param Tarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tarjeta $entity)
    {
        $form = $this->createForm(new TarjetaType(), $entity, array(
            'action' => $this->generateUrl('admin_tarjeta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Tarjeta entity.
     *
     * @Route("/{id}", name="tarjeta_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:Tarjeta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

        	// $entity->actualizarScoresTotales();
        	$this->actualizarPosicionesEquipoYTorneoFechaJugadores($entity->getTorneoFechaJugador()->getTorneoFecha());
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tarjeta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tarjeta entity.
     *
     * @Route("/{id}", name="tarjeta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Tarjeta')->find($id);
            if (!$entity) {
                throw $this->createNotFoundException('Tarjeta no valida.');
            }

            $torneo_fecha_jugador = $entity->getTorneoFechaJugador();
            $torneo_fecha_jugador->setTarjeta(null);
            $em->persist($torneo_fecha_jugador);

            $entity->setTorneoFechaJugador(null);

            $em->remove($entity);
            $em->flush();

            $this->actualizarPosicionesEquipoYTorneoFechaJugadores($torneo_fecha_jugador->getTorneoFecha());
            
            $em->flush();
            
        }

        return $this->redirect($this->generateUrl('admin_torneofecha_lista_jugadores_cargar_tarjetas', array('id_torneo_fecha'=> $torneo_fecha_jugador->getIdTorneoFecha() )) );
    }

    /**
     * Creates a form to delete a Tarjeta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tarjeta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    

}
