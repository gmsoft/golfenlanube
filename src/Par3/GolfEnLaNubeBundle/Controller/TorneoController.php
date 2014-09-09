<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\Torneo;
use Par3\GolfEnLaNubeBundle\Form\TorneoType;
use Par3\GolfEnLaNubeBundle\Form\TorneoEditType;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Torneo controller.
 *
 */
class TorneoController extends Controller
{

    /**
     * Lists all Torneo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Torneo')->findAll();
        
        return $this->render('GolfEnLaNubeBundle:Torneo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Torneo entity.
     *
     */
    public function createAction(Request $request)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    		
    	$campos_enviados = $this->getRequest()->get('par3_golfenlanubebundle_torneo');
    	
    	$id_temporada = $campos_enviados['temporada']; 
    	
        $entity = new Torneo();
        $form = $this->createCreateForm($entity, $id_temporada); 
        $form->handleRequest($request);

        $this->crearFechasSubsiguientes($entity, $id_temporada);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_torneo_show', array('id' => $entity->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:Torneo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function crearFechasSubsiguientes( Torneo $entity, $id_temporada)
    {
    	$torneo_fecha = $entity->getFechas()->first();
    	$torneo_fecha->setNumeroFecha(1);
    	$torneo_fecha->setFecha(clone $entity->getInicio()); // como las fechas son objetos y se pasan por referencia hay que clonarlas para uno no modifique al siguiente

    	// si el torneo es a más de un dia seteo la fecha de los días subsiguientes al primero
    	$d = 1;
    	while ($entity->getFechas()->count() < $entity->getDias() )
    	{
    		$siguiente_torneo_fecha = clone $torneo_fecha;
    		$siguiente_fecha = clone $siguiente_torneo_fecha->getFecha(); 
    		$siguiente_fecha->add(new \DateInterval('P' . $d . 'D'));
    		$siguiente_torneo_fecha->setFecha($siguiente_fecha);
    		$siguiente_torneo_fecha->setNumeroFecha($d+1);
    	
    		$entity->addFecha($siguiente_torneo_fecha);
    		++$d;
    	}
    }

    /**
    * Creates a form to create a Torneo entity.
    *
    * @param Torneo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Torneo $entity, $id_temporada = null)
    {
        $form = $this->createForm(new TorneoType($this->getDoctrine()->getManager(), array('id_temporada' => $id_temporada)) , $entity, array(
            'action' => $this->generateUrl('admin_torneo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Torneo entity.
     *
     */
    public function newAction($id_temporada)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

        $em = $this->getDoctrine()->getManager();
    	
        $entity = new Torneo(); 
        $fecha = new TorneoFecha();
        $entity->getFechas()->add($fecha);

        if ( ! is_null($id_temporada))
        {
        	$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
        	if ( ! $temporada )
        	{
        		throw $this->createNotFoundException('Temporada no valida.');
        	}
        	$entity->setInstitucion($temporada->getCircuito()->getInstitucion());
        	$entity->setTemporada($temporada);
        }
        
        $form = $this->createCreateForm($entity, $id_temporada);

        return $this->render('GolfEnLaNubeBundle:Torneo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Torneo entity.
     *
     */
    public function showAction($id)
    {

    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Torneo entity.');
        }

        $deleteFormView = ($entity->getInicio() > new \DateTime()) ? 
				        	$this->createDeleteForm($id)->createView() : 
				        	null ;

        return $this->render('GolfEnLaNubeBundle:Torneo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteFormView,));
    }

    /**
     * Displays a form to edit an existing Torneo entity.
     *
     */
    public function editAction($id)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    	
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Torneo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Torneo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Torneo entity.
    *
    * @param Torneo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Torneo $entity)
    {
        $form = $this->createForm(new TorneoEditType($this->getDoctrine()->getManager()), $entity, array(
            'action' => $this->generateUrl('admin_torneo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Torneo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_EDITAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}
    	 
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Torneo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
			$this->get('braincrafted_bootstrap.flash')->success("El torneo fue modificado con éxito");
            return $this->redirect($this->generateUrl('admin_torneo_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:Torneo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Torneo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
    	if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_ELIMINAR_TORNEO'))
    	{
    		throw new AccessDeniedException();
    	}

        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Torneo')->find($id);
          
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Torneo entity.');
            }
           	$id_temporada = $entity->getTemporada()->getId();
            
            $em->remove($entity);
            $em->flush();
        }

        $url = $this->generateUrl('admin_temporada_show_torneos', array('id' => $id_temporada )) ;
        return $this->redirect($url);
    }

    /**
     * Creates a form to delete a Torneo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_torneo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }

    
}
