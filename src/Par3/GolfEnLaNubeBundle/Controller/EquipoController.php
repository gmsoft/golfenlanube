<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Par3\GolfEnLaNubeBundle\Form\EquipoType;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Doctrine\Common\Util\Debug;
use Par3\GolfEnLaNubeBundle\Entity\Club;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Equipo controller.
 *
 */
class EquipoController extends Controller
{

    /**
     * Lists all Equipo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Equipo')->findAll();

        return $this->render('GolfEnLaNubeBundle:Equipo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Equipo entity.
     *
     */
    public function createAction(Request $request)
    {

    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_EQUIPO'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
    	$em = $this->getDoctrine()->getManager();
    	$campos_enviados = $this->getRequest()->get('par3_golfenlanubebundle_equipo');

    	$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($campos_enviados['torneo_fecha']);
    	
    	if ( is_null($torneo_fecha))
    	{
    		throw $this->createNotFoundException('Fecha de torneo no valida.');
    	}

        $entity = new Equipo();
        $form = $this->createCreateForm($entity, $campos_enviados['club'], $torneo_fecha->getTorneo()->getIdTemporada());

        $form->handleRequest($request);

        if ($form->isValid()) {
        	
        	if ( $this->usuarioActualAutorizadoCrearEquipoEnTorneoFecha( $entity->getClub(), $entity->getTorneoFecha()))
        	{
        		throw new HttpException(401, "Su usuario no está autorizado a configurar este equipo");
        	}

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_equipo_show', array('id' => $entity->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:Equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Equipo entity.
    *
    * @param Equipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Equipo $entity, $id_club, $id_temporada = null)
    {
    	
        $form = $this->createForm(	new EquipoType(	$this->getDoctrine()->getManager(), 
        											array('id_temporada' => $id_temporada, 'id_club' => $id_club)), 
        							$entity, 
        							array(	'action' => $this->generateUrl('admin_equipo_create'),
 									        'method' => 'POST', ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    private function usuarioActualAutorizadoCrearEquipoEnTorneoFecha(Club $club, TorneoFecha $torneo_fecha)
    {
    	return $this->getUser()->autorizadoCrearEquipoEnTorneoFecha($club, $torneo_fecha);
    }
    
    /**
     * Displays a form to create a new Equipo entity.
     *
     */

    public function newAction($id_torneo_fecha, $id_club)
    {

    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_EQUIPO'))
    	{
    		throw new AccessDeniedException();
    	}
    	
    	$em = $this->getDoctrine()->getManager();

    	$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);

    	if (!$torneo_fecha) {
    		throw $this->createNotFoundException('Fecha de torneo invalida.');
    	}

    	$club = $em->getRepository('GolfEnLaNubeBundle:Club')->find($id_club);
    	
    	if (!$club) {
    		throw $this->createNotFoundException('Club invalido.');
    	}

    	if ( $this->usuarioActualAutorizadoCrearEquipoEnTorneoFecha( $club, $torneo_fecha))
    	{
    		throw new HttpException(401, "Su usuario no está autorizado a configurar este equipo");
    	}

        $entity = new Equipo();
        $entity->setClub($club);
        $entity->setTorneoFecha($torneo_fecha);

        $this->configurarJugadoresNuevoEquipo($entity, $club, $torneo_fecha);
        
        $form   = $this->createCreateForm($entity, $entity->getClub()->getId(), $torneo_fecha->getTorneo()->getTemporada()->getId() );

        return $this->render('GolfEnLaNubeBundle:Equipo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function configurarJugadoresNuevoEquipo(Equipo $entity, Club $club, TorneoFecha $torneo_fecha)
    {
    	for ( $i = 0 ; $i < $torneo_fecha->getTorneo()->getTitularesPorClub() ; ++ $i)
    	{
    		$torneo_fecha_jugador = new TorneoFechaJugador();
    		$torneo_fecha_jugador->setEquipo($entity);
    		$torneo_fecha_jugador->setCapitanEquipo(false);
    		$torneo_fecha_jugador->setTitular(true);
    		$torneo_fecha_jugador->setTorneoFecha($torneo_fecha);
    		$torneo_fecha_jugador->setClub($club);
    		$entity->addTorneoFechaJugadore($torneo_fecha_jugador);
    	}

    	$entity->getTorneoFechaJugadores()->first()->setCapitanEquipo(true);

    	for ( $i = 0 ; $i < $torneo_fecha->getTorneo()->getSuplentesPorClub() ; ++ $i)
    	{
    		$torneo_fecha_jugador = new TorneoFechaJugador();
    		$torneo_fecha_jugador->setEquipo($entity);
    		$torneo_fecha_jugador->setCapitanEquipo(false);
    		$torneo_fecha_jugador->setTitular(false);
    		$torneo_fecha_jugador->setTorneoFecha($torneo_fecha);
    		$torneo_fecha_jugador->setClub($club);
    		$entity->addTorneoFechaJugadore($torneo_fecha_jugador);
    	}
    }

    /**
     * Finds and displays a Equipo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Equipo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Equipo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Equipo entity.
    *
    * @param Equipo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Equipo $entity)
    {
    	$id_torneo_fecha = $entity->getIdTorneoFecha();
        $form = $this->createForm(new EquipoType($em, array('id_torneo_fecha' => $id_torneo_fecha)), $entity, array(
            'action' => $this->generateUrl('admin_equipo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Equipo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Equipo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_equipo_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:Equipo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Equipo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Equipo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_equipo'));
    }

    /**
     * Creates a form to delete a Equipo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_equipo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
