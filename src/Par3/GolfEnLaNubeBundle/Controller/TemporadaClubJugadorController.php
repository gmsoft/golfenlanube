<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador;
use Par3\GolfEnLaNubeBundle\Form\TemporadaClubJugadorType;
use Par3\GolfEnLaNubeBundle\Entity\User;
use Doctrine\Common\Util\Debug;

/**
 * TemporadaClubJugador controller.
 *
 * @Route("/temporadaclubjugador")
 */
class TemporadaClubJugadorController extends Controller
{

    /**
     * Lists all TemporadaClubJugador entities.
     *
     * @Route("/", name="temporadaclubjugador")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TemporadaClubJugador entity.
     *
     * @Route("/", name="temporadaclubjugador_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:TemporadaClubJugador:new.html.twig")
     */
    public function createAction(Request $request)
    {
    	$campos_enviados = $this->getRequest()->get('par3_golfenlanubebundle_temporadaclubjugador');
    	
    	$em = $this->getDoctrine()->getManager();
    	
    	$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($campos_enviados['id_jugador']);
    	

    	if (!$jugador) {
    		throw $this->createNotFoundException('Jugador no valido.');
    	}
    	 
    	$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find(array( 'id' => $campos_enviados['temporada_club'] ) );

    	if (!$temporada_club) {
    		throw $this->createNotFoundException('TemporadaClub no valida.');
    	}

        $entity = new TemporadaClubJugador();
        $entity->setTemporadaClub($temporada_club);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $entity->setTemporadaClub($temporada_club);
        $entity->setJugador($jugador);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_temporada_show_lista_buena_fe_por_club', array('id_temporada' => $temporada_club->getIdTemporada(), 'id_club' => $temporada_club->getIdClub() ) ));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
      * Creates a form to create a TemporadaClubJugador entity.
      *
      * @param TemporadaClubJugador $entity The entity
      *
      * @return \Symfony\Component\Form\Form The form
      */
    private function createCreateForm(TemporadaClubJugador $entity)
    {
        $form = $this->createForm(	new TemporadaClubJugadorType(
        									$this->getDoctrine()->getManager(), array(	'temporada_club' => $entity->getTemporadaClub() ) ), $entity, 
        							array(
							            'action' => $this->generateUrl('admin_temporadaclubjugador_create') ,
							            'method' => 'POST',
							        ));
       
        $form	->add('submit', 'submit', array('label' => 'Agregar'))
        ;

        return $form;
    }

    /**
     * Displays a form to create a new TemporadaClubJugador entity.
     *
     * @Route("/new", name="temporadaclubjugador_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id_temporada_club)
    {
            $em = $this->getDoctrine()->getManager();

        $temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id_temporada_club);

        if (!$temporada_club) {
            throw $this->createNotFoundException('TemporadaClub no valido.');
        }
    	
        $entity = new TemporadaClubJugador();
        $entity->setTemporadaClub($temporada_club);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TemporadaClubJugador entity.
     *
     * @Route("/{id}", name="temporadaclubjugador_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClubJugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TemporadaClubJugador entity.
     *
     * @Route("/{id}/edit", name="temporadaclubjugador_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClubJugador entity.');
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
    * Creates a form to edit a TemporadaClubJugador entity.
    *
    * @param TemporadaClubJugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TemporadaClubJugador $entity)
    {
        $form = $this->createForm(new TemporadaClubJugadorType(), $entity, array(
            'action' => $this->generateUrl('admin_temporadaclubjugador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing TemporadaClubJugador entity.
     *
     * @Route("/{id}", name="temporadaclubjugador_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:TemporadaClubJugador:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TemporadaClubJugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_temporadaclubjugador_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TemporadaClubJugador entity.
     *
     * @Route("/{id}", name="temporadaclubjugador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
    	
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('TemporadaClubJugador no valido.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect( $this->generateUrl('admin_temporadaclubjugador') );
    }

    /**
     * Creates a form to delete a TemporadaClubJugador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_temporadaclubjugador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
