<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\TemporadaClub;
use Par3\GolfEnLaNubeBundle\Form\TemporadaClubType;
use Par3\GolfEnLaNubeBundle\Entity\User;
use Par3\GolfEnLaNubeBundle\Entity\Group;
use Doctrine\Common\Util\Debug;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * TemporadaClub controller.
 *
 * @Route("/temporadaclub")
 */
class TemporadaClubController extends Controller
{

    /**
     * Lists all TemporadaClub entities.
     *
     * @Route("/", name="temporadaclub")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TemporadaClub entity.
     *
     * @Route("/", name="temporadaclub_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:TemporadaClub:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TemporadaClub();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_temporada_show_clubs', array('id' => $entity->getTemporada()->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TemporadaClub entity.
    *
    * @param TemporadaClub $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TemporadaClub $entity)
    {
        $form = $this->createForm(new TemporadaClubType(), $entity, array(
            'action' => $this->generateUrl('admin_temporadaclub_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TemporadaClub entity.
     *
     * @Route("/new", name="temporadaclub_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id_temporada)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
    	
    	if (!$temporada) {
    		throw $this->createNotFoundException('Temporada no valida.');
    	}
    	
        $entity = new TemporadaClub();
        $entity->setTemporada($temporada);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TemporadaClub entity.
     *
     * @Route("/{id}", name="temporadaclub_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClub entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TemporadaClub entity.
     *
     * @Route("/{id}/edit", name="temporadaclub_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClub entity.');
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
    * Creates a form to edit a TemporadaClub entity.
    *
    * @param TemporadaClub $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TemporadaClub $entity)
    {
        $form = $this->createForm(new TemporadaClubType(), $entity, array(
            'action' => $this->generateUrl('admin_temporadaclub_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing TemporadaClub entity.
     *
     * @Route("/{id}", name="temporadaclub_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:TemporadaClub:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClub entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_temporadaclub_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TemporadaClub entity.
     *
     * @Route("/{id}", name="temporadaclub_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);

        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Temporada club invalido.');
            }
            $id_temporada = $entity->getTemporada()->getId();
            
            if ($entity->getEquipos()->count() > 0) 
            	$this->get('braincrafted_bootstrap.flash')
            			->alert('No se puede eliminar a este club. Ya se han presentado equipos para el mismo en algún torneo');

            else {
            
            $em->remove($entity);
            $em->flush();
            }
        //}
        return $this->redirect($this->generateUrl('admin_temporada_show_clubs', array('id' => $id_temporada)));
    }

    /**
     * Creates a form to delete a TemporadaClub entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_temporadaclub_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    public function listaCapitanesAction($id)
    {

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find TemporadaClub entity.');
    	}

    	$deleteForm = $this->createDeleteForm($id);

    	return $this->render('GolfEnLaNubeBundle:TemporadaClub:listaCapitanes.html.twig' ,array(
    			'temporada_club'      => $entity,
    	));
    }

    public function elegirNuevoCapitanAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_DESIGNAR_CAPITANES'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);

    	if (!$entity) {
    		throw $this->createNotFoundException('TemporadaClub no valido.');
	   	}

	   	$jugadores_candidatos = $em->getRepository('GolfEnLaNubeBundle:User')->getCandidatosACapitan($entity->getIdClub());
	   	
	   	$form = $this->createFormBuilder()
	   				->setAction($this->generateUrl('admin_temporadaclub_agregar_capitan', array('id' => $id)))
		   			->add('id_usuario_capitan', 'genemu_jqueryselect2_choice', array('choices' => $jugadores_candidatos,
	   																				'label' => 'Usuario') )
		   			->add('Agregar', 'submit')
		   			->getForm();
	   	;
	   	
	   	
    	return $this->render('GolfEnLaNubeBundle:TemporadaClub:elegirNuevoCapitan.html.twig' ,array(
    			'form'				=> $form->createView(),
    			'temporada_club'    => $entity,
    	));
	}

    public function agregarCapitanAction($id)
    {
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_DESIGNAR_CAPITANES'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('TemporadaClub no valido.');
    	}
    	
    	$campos_enviados = $this->getRequest()->get('form');
    	$usuario_capitan = $em->getRepository('GolfEnLaNubeBundle:User')->findOneBy( array('id' => $campos_enviados['id_usuario_capitan'] ) );

    	if (!$usuario_capitan) {
    		throw $this->createNotFoundException('Usuario no valido.');
    	}

    	$perfil = $em->getRepository('GolfEnLaNubeBundle:Group')->findOneBy( array('name' => 'CAPITAN') );

    	$usuario_capitan->addGroup($perfil);
    	$usuario_capitan->addCapitanTemporadaClub($entity);

    	$em->flush();

    	return $this->redirect(  $this->generateUrl('admin_temporadaclub_lista_capitanes', array('id' => $entity->getId()))  );
    }

    public function quitarCapitanAction($id, $id_usuario_capitan)
    {
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_DESIGNAR_CAPITANES'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('TemporadaClub no valido.');
    	}
    
    	$usuario_capitan = $em->getRepository('GolfEnLaNubeBundle:User')->find($id_usuario_capitan);
    	 
    	if (!$usuario_capitan) {
    		throw $this->createNotFoundException('Usuario no valido.');
    	}

    	$usuario_capitan->removeCapitanTemporadaClub($entity);

    	if ( $usuario_capitan->getCapitanTemporadaClubs()->count() == 0 )
    	{
    		$perfil = $em->getRepository('GolfEnLaNubeBundle:Group')->findOneBy( array('name' => 'CAPITAN') );
    		$usuario_capitan->removeGroup($perfil);
    	}
    	
    	$em->flush();

    	return $this->redirect(  $this->generateUrl('admin_temporadaclub_lista_capitanes', array('id' => $entity->getId()))  );
    }
    
    
}
