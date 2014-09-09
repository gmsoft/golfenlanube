<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Par3\GolfEnLaNubeBundle\Entity\User;
use Par3\GolfEnLaNubeBundle\Form\UserCreateType;
use Par3\GolfEnLaNubeBundle\Form\UserEditDatosPersonalesType;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Util\Debug;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
	private function buscarEnListaUsuarios(QueryBuilder $query, $buscar)
	{
		$buscar = strtolower($buscar);
		$qb = $this->getDoctrine()->getManager()->createQueryBuilder();
			$query->where($qb->expr()->orX(
				$qb->expr()->like('lower(p.nombre_completo)', $qb->expr()->literal("%$buscar%")),
				$qb->expr()->like('lower(u.username)',  $qb->expr()->literal("%$buscar%")),
					$qb->expr()->like('lower(u.email)',  $qb->expr()->literal("%$buscar%"))
		));
		return $query;
	
	}
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_LISTA_USUARIOS'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
    	$em = $this->getDoctrine()->getManager();

    	$query = $em->createQueryBuilder()
    			->select('u, p')
    			->from('GolfEnLaNubeBundle:User', 'u')
    			->innerJoin('u.persona', 'p') 
    			->orderBy('p.nombre_completo', 'ASC');
    	
    	if ( $buscar = $this->getRequest()->get('buscar') )
    	{
    		$query = $this->buscarEnListaUsuarios($query, $buscar);
    	}

        $paginator = $this->get('knp_paginator'); 
        $entities = $paginator->paginate(
        			$query, 
        			$this->get('request')->query->get('page', 1),
        			15);
    	
	        return $this->render('GolfEnLaNubeBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_USUARIO'))
    	{
    		throw new AccessDeniedException();
    	}
    	$em = $this->getDoctrine()->getManager();

    	$entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $existe_usuario = $em->getRepository('GolfEnLaNubeBundle:User')->existeUsuario($entity);
        if ($existe_usuario) {
        	$flash = $this->get('braincrafted_bootstrap.flash');
        	$flash->alert('El usuario o email ya existe en la base de datos.');
        } else {
	        if ( ! $em->getRepository('GolfEnLaNubeBundle:User')->existeUsuario($entity) && $form->isValid()) {
	            $em = $this->getDoctrine()->getManager();
	            $em->persist($entity);
	            $em->flush();
	
	            return $this->redirect($this->generateUrl('admin_user_show', array('id' => $entity->getId())));
	        }
        }

        return $this->render('GolfEnLaNubeBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserCreateType(), $entity, array(
            'action' => $this->generateUrl('admin_user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_USUARIO'))
    	{
    		throw new AccessDeniedException();
    	}
    	$entity = new User();
        $entity->setEnabled(true);
        $form   = $this->createCreateForm($entity);

        return $this->render('GolfEnLaNubeBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_USUARIO'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserCreateType(), $entity, array(
            'action' => $this->generateUrl('admin_user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->remove('plainPassword');
        
        $form->add('submit', 'submit', array('label' => 'Enviar'));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_USUARIO'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_user_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ELIMINAR_USUARIO'))
    	{
    		throw new AccessDeniedException();
    	}

    	$form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }

    public function elegirPerfilesAction($id)
    {
       	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ASIGNAR_PERFILES'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	
    	$entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);
    	
    	if (!$entity) {
    		throw $this->createNotFoundException('Usuario no valido.');
    	}

    	$perfiles = $em->getRepository('GolfEnLaNubeBundle:Group')->findAll();
    	
    	$deleteForm = $this->createDeleteForm($id);
    	
    	return $this->render('GolfEnLaNubeBundle:User:elegirPerfiles.html.twig', array(
    			'entity'      => $entity,
    			'perfiles' => $perfiles));
    	 
    }
    
    public function asignarPerfilesAction()
    {
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ASIGNAR_PERFILES'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$id = $this->getRequest()->get('user');
    	$perfiles = $this->getRequest()->get('perfiles', array());

    	$em = $this->getDoctrine()->getManager();

    	$user = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);

    	if (!$user) {
    		throw $this->createNotFoundException('Usuario no valido.');
    	}

    	$user->limpiarPerfiles();
    	foreach ($perfiles as $nombre_perfil => $id_perfil)
    	{
    		// El perfil CAPITAN solo se asigna mediante la la pantalla de asignacion de capitanes (path('admin_temporadaclub_lista_capitanes'))
    		if ($nombre_perfil == 'CAPITAN') continue; 
    		if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_ASIGNAR_PERFIL_' . $nombre_perfil) 
    				&& false === $this->get('security.context')->isGranted('ROLE_ADMIN_ASIGNAR_CUALQUIER_PERFIL')) continue; 
    		$perfil = $em->getRepository('GolfEnLaNubeBundle:Group')->find($id_perfil);
    		$user->addGroup($perfil);
    	}

    	$em->flush();

    	return $this->redirect($this->generateUrl('admin_user_show', array('id' => $id)));
    }

    /////////////////////////////////////////////////////////////////////////////////
    ////////////////////////// PARA EL FRONT END
    
    public function editDatosPersonalesAction($id)
    {
    	if ($this->getUser()->getId() != $id)
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    	
    	$entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);
    	
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find User entity.');
    	}
    	
    	$editForm = $this->createEditDatosPersonalesForm($entity);
    	
    	return $this->render('GolfEnLaNubeBundle:User:editDatosPersonales.html.twig', array(
    			'entity'      => $entity,
    			'edit_form'   => $editForm->createView(),
    	));
    	 
    }

    /**
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditDatosPersonalesForm(User $entity)
    {
    	$form = $this->createForm(new UserEditDatosPersonalesType(), $entity, array(
    			'action' => $this->generateUrl('user_update_datos_personales', array('id' => $entity->getId())),
    			'method' => 'PUT',
    	));

    	$form->get( 'persona')->remove('usuario');
    	$form->add('submit', 'submit', array('label' => 'Enviar'));
    
    	return $form;
    }

    public function updateDatosPersonalesAction(Request $request, $id)
    {
    	if ($this->getUser()->getId() != $id)
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('GolfEnLaNubeBundle:User')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find User entity.');
    	}

    	$editForm = $this->createEditDatosPersonalesForm($entity);
    	$editForm->handleRequest($request);

    	if ($editForm->isValid()) {
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('admin_user_edit', array('id' => $id)));
    	}
    
    	return $this->render('GolfEnLaNubeBundle:User:editDatosPersonales.html.twig', array(
    			'entity'      => $entity,
    			'edit_form'   => $editForm->createView(),
    	));
    }
    
}
