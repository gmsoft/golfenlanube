<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Par3\GolfEnLaNubeBundle\Form\TorneoFechaJugadorType;

/**
 * TorneoFechaJugador controller.
 *
 */
class TorneoFechaJugadorController extends Controller
{

    /**
     * Lists all TorneoFechaJugador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->findAll();

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TorneoFechaJugador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TorneoFechaJugador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('torneofechajugador_show', array('id' => $entity->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TorneoFechaJugador entity.
    *
    * @param TorneoFechaJugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TorneoFechaJugador $entity)
    {
        $form = $this->createForm(new TorneoFechaJugadorType(), $entity, array(
            'action' => $this->generateUrl('torneofechajugador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TorneoFechaJugador entity.
     *
     */
    public function newAction()
    {
        $entity = new TorneoFechaJugador();
        $form   = $this->createCreateForm($entity);

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TorneoFechaJugador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TorneoFechaJugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TorneoFechaJugador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TorneoFechaJugador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TorneoFechaJugador entity.
    *
    * @param TorneoFechaJugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TorneoFechaJugador $entity)
    {
        $form = $this->createForm(new TorneoFechaJugadorType(), $entity, array(
            'action' => $this->generateUrl('torneofechajugador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing TorneoFechaJugador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TorneoFechaJugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('torneofechajugador_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:TorneoFechaJugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TorneoFechaJugador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:TorneoFechaJugador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TorneoFechaJugador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('torneofechajugador'));
    }

    /**
     * Creates a form to delete a TorneoFechaJugador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('torneofechajugador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
