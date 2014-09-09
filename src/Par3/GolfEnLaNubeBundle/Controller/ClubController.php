<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Par3\GolfEnLaNubeBundle\Entity\Institucion;
use Par3\GolfEnLaNubeBundle\Entity\Club;
use Par3\GolfEnLaNubeBundle\Entity\Cancha;
use Par3\GolfEnLaNubeBundle\Form\ClubType;
use Par3\GolfEnLaNubeBundle\Entity\Documento;
use Par3\GolfEnLaNubeBundle\Entity\CanchaTee;

/**
 * Club controller.
 *
 * @Route("/club")
 */
class ClubController extends Controller
{

    /**
     * Lists all Club entities.
     *
     * @Route("/", name="club")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GolfEnLaNubeBundle:Club')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Club entity.
     *
     * @Route("/", name="club_create")
     * @Method("POST")
     * @Template("GolfEnLaNubeBundle:Club:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Club();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $institucion = new Institucion();
        $institucion->setNombre($entity->getNombre());
        $entity->setInstitucion($institucion);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_club_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Club entity.
    *
    * @param Club $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Club $entity)
    {
        $form = $this->createForm(new ClubType(), $entity, array(
            'action' => $this->generateUrl('admin_club_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Club entity.
     *
     * @Route("/new", name="club_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Club();
        $entity->getCanchas()->add(new Cancha());
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Club entity.
     *
     * @Route("/{id}", name="club_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Club')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Club entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Club entity.
     *
     * @Route("/{id}/edit", name="club_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Club')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Club entity.');
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
    * Creates a form to edit a Club entity.
    *
    * @param Club $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Club $entity)
    {
        $form = $this->createForm(new ClubType(), $entity, array(
            'action' => $this->generateUrl('admin_club_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modificar'));

        return $form;
    }
    /**
     * Edits an existing Club entity.
     *
     * @Route("/{id}", name="club_update")
     * @Method("PUT")
     * @Template("GolfEnLaNubeBundle:Club:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Club')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Club entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_club_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Club entity.
     *
     * @Route("/{id}", name="club_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Club')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Club entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_club'));
    }

    /**
     * Creates a form to delete a Club entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_club_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }

    
    // Importaci�n de archivo de Clubes
    
    public function importarArchivoAagAction()
    {
    	$id_documento = $this->getRequest()->get('id_documento');

    	$em = $this->getDoctrine()->getManager();
    
    	$documento = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id_documento);
    
    	if (!$documento) {
    		throw $this->createNotFoundException('Archivo invalido.');
    	}

    	$this->performImportArchivoAag($documento);

    	
    	return $this->redirect($this->generateUrl('admin_club'));
    }
    
    private function esFormatoClubAagValido($linea)
    {
    	return (strlen(trim($linea, "\r\n\0")) == 33 &&  ((int) substr($linea, 0,3)) != 0 && is_string(substr($linea, 3,30)));
    }
    
    private function performImportArchivoAag(Documento $documento)
    {
    	$em = $this->getDoctrine()->getManager();

    	$f = fopen($documento->getAbsolutePath(), 'r');
    	
    	while ( $buffer = fgets($f))
    	{
			if ($this->esFormatoClubAagValido($buffer))
			{				
	    		$club = Club::crearDeFormatoAag($buffer);
	    		if ( is_null($em->getRepository('GolfEnLaNubeBundle:Club')->find($club->getCodigoAag()) ) )
	    		{
		    		$em->persist($club);
		    		$em->flush();
	    		}
	    		 
			}    		
    		unset($club); 
    	}
    	
    	fclose($f);
    }

    
    ////////////////////////////////////////////
    // Importaci�n de archivo de Canchas y Tees

    public function importarCanchasArchivoAagAction()
    {
    	$id_documento = $this->getRequest()->get('id_documento');
    
    	$em = $this->getDoctrine()->getManager();
    
    	$documento = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id_documento);
    
    	if (!$documento) {
    		throw $this->createNotFoundException('Archivo invalido.');
    	}
    
    	$this->performImportArchivoCanchasYTeesAag($this->generarArrayCanchasYTeesDeDocumento($documento));
    
    	 
    	return $this->redirect($this->generateUrl('admin_club'));
    }
    
    private function esFormatoCanchasYTeesAagValido($linea)
    {
    	return (strlen(trim($linea, "\r\n\0")) == 9 );
    }
    
    private function generarArrayCanchasYTeesDeDocumento($documento)
    {
    	$ret = array(); 
    	$f = fopen($documento->getAbsolutePath(), 'r');
    	while ( $buffer = fgets($f))
    	{
	    	if ($this->esFormatoCanchasYTeesAagValido($buffer))
	    	{
	    		$club_codigo_aag = substr($buffer, 0, 3);
	    		$cancha_numero = substr($buffer, 3,1);
	    		$tee_numero = substr($buffer, 4,1);
	    		$tee_calificacion = str_replace(',', '.', substr($buffer, 5, 4));
	    		
	    		$ret[$club_codigo_aag][$cancha_numero][$tee_numero] =  $tee_calificacion;
	    	}
    	}
    	fclose($f);
    	
    	return $ret; 
    }
    
    private function performImportArchivoCanchasYTeesAag($club_cancha_tee = array())
    {
    	$em = $this->getDoctrine()->getManager();
 
    	foreach ($club_cancha_tee as $club_codigo_aag => $canchas_y_tees)
    	{
    		if ( $club = $em->getRepository('GolfEnLaNubeBundle:Club')->find( $club_codigo_aag) )
    		{
    			foreach ($canchas_y_tees as $numero_cancha => $tees)
    			{
	    			if ( ! $club->tieneCanchaNumero($numero_cancha)) 
	    			{
	    				$cancha = new Cancha();
    					$cancha->setNumero($numero_cancha); 

	    				$club->addCancha($cancha);
	    			} else {
	    				$cancha = $club->getCanchaNumero($numero_cancha);
	    			}
	    			
	    			foreach ($tees as $tee_numero => $tee_calificacion )
	    			{
		    			if ( ! $cancha->tieneTeeNumero($tee_numero) )
		    			{
		    				$tee = new CanchaTee();
		    				$tee->setNumero($tee_numero);
		    				$tee->setCalificacion($tee_calificacion);

		    				$cancha->addTee($tee);
		    			}
	    			}
    			}
    			$em->persist($club);
    			$em->flush();
    			unset($club);
    		}
    	}
    }


}
