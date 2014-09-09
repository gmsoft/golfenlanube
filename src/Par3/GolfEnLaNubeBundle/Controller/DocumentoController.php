<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\Documento;
use Par3\GolfEnLaNubeBundle\Form\DocumentoType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

/**
 * Documento controller.
 *
 * @Route("/documento")
 */
class DocumentoController extends Controller
{

    /**
     * Lists all Documento entities.
     *
     * @Route("/", name="documento")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Documento')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Documento entity.
     *
     * @Route("/", name="documento_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:Documento:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	$redirect = $this->getRequest()->get('redirect'); 
    	
        $entity = new Documento();
        $form = $this->createCreateForm($entity, $redirect );
        $form->handleRequest($request);
        
        $entity->setIdUsuarioUploader($this->getUser()->getId());
        $entity->setUploadedDate(new \DateTime());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($entity);
            $em->flush();

            $redirect .= '?id_documento=' . $entity->getId();

            return $this->redirect($redirect);
            // return $this->redirect($this->generateUrl('documento_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Documento entity.
    *
    * @param Documento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Documento $entity, $redirect = null)
    {
        $form = $this->createForm(new DocumentoType(), $entity, array(
            'action' => $this->generateUrl('admin_documento_create', array('redirect' => $redirect)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Documento entity.
     * 
     *
     * @Route("/new", name="documento_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
    	$redirect = $this->getRequest()->get('redirect');
        $entity = new Documento();
        $form   = $this->createCreateForm($entity, $redirect);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Documento entity.
     *
     * @Route("/{id}", name="documento_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Documento entity.
     *
     * @Route("/{id}/edit", name="documento_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
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
    * Creates a form to edit a Documento entity.
    *
    * @param Documento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Documento $entity)
    {
        $form = $this->createForm(new DocumentoType(), $entity, array(
            'action' => $this->generateUrl('admin_documento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Documento entity.
     *
     * @Route("/{id}", name="documento_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:Documento:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_documento_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Documento entity.
     *
     * @Route("/{id}", name="documento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Documento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_documento'));
    }

    /**
     * Creates a form to delete a Documento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_documento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
    /////////////////////////////////////////////////////////////////
    ////////////// AJAX UPLOADS
    
    /**
     * Crea el formulario para subir un archivo
     * @param Documento $entity
     * @param unknown $tipo
     * @return \Symfony\Component\Form\Form
     */
    public function createUploadPorAjaxForm(Documento $entity)
    {
    	$form = $this->createForm(new DocumentoType(), $entity, array(
    			'action' => $this->generateUrl('admin_documento_upload_por_ajax'),
    			'method' => 'POST',
    	));

    	$form->remove('name')->add('name', 'hidden'); 
    	$form->add('id_documento', 'hidden', array('mapped' => false));
    	$form->add('submit', 'submit', array('label' => 'Subir', 'attr' => array('data-loading-text'=>'Subiendo')));

    	return $form;
    }
    
    public function uploadPorAjaxAction(Request $request)
    {
    	$entity = new Documento();
    	$form = $this->createUploadPorAjaxForm($entity);
    	$form->handleRequest($request);
    
    	$entity->setIdUsuarioUploader($this->getUser()->getId());
    	$entity->setUploadedDate(new \DateTime());
    
    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    
    		$em->persist($entity);
    		$em->flush();

    		return (Response::create($entity->getId(), 200));
    	}

    	throw new UploadException($form->getErrorsAsString() . 'Ocurrió un error al subir el archivo. Vuelva a intentarlo o comuniquese con el administrador del sistema.');
    }
    
}
