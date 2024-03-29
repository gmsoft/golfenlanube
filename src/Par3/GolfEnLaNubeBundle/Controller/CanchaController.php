<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\Cancha;
use Par3\GolfEnLaNubeBundle\Form\CanchaType;

/**
 * Cancha controller.
 *
 * @Route("/cancha")
 */
class CanchaController extends Controller
{

    /**
     * Lists all Cancha entities.
     *
     * @Route("/", name="cancha")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Cancha')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Cancha entity.
     *
     * @Route("/", name="cancha_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:Cancha:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Cancha();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_cancha_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Cancha entity.
    *
    * @param Cancha $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Cancha $entity)
    {
        $form = $this->createForm(new CanchaType(), $entity, array(
            'action' => $this->generateUrl('admin_cancha_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Cancha entity.
     *
     * @Route("/new", name="cancha_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cancha();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Cancha entity.
     *
     * @Route("/{id}", name="cancha_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Cancha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cancha entity.
     *
     * @Route("/{id}/edit", name="cancha_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Cancha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancha entity.');
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
    * Creates a form to edit a Cancha entity.
    *
    * @param Cancha $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cancha $entity)
    {
        $form = $this->createForm(new CanchaType(), $entity, array(
            'action' => $this->generateUrl('admin_cancha_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Cancha entity.
     *
     * @Route("/{id}", name="cancha_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:Cancha:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Cancha')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cancha entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_cancha_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Cancha entity.
     *
     * @Route("/{id}", name="cancha_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Cancha')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cancha entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_cancha'));
    }

    /**
     * Creates a form to delete a Cancha entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_cancha_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
