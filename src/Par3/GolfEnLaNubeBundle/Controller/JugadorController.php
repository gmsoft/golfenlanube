<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Par3\GolfEnLaNubeBundle\Entity\Jugador;
use Par3\GolfEnLaNubeBundle\Form\JugadorType;
use Par3\GolfEnLaNubeBundle\Entity\Documento;
use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Tests\DBAL\Types\DateTest;
use Par3\GolfEnLaNubeBundle\Helpers\ArchivoModuloClubAAG;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Par3\GolfEnLaNubeBundle\Form\DocumentoType;
use Doctrine\Common\Util\Debug;
use Par3\GolfEnLaNubeBundle\Entity\JugadorActualizacion;
use Par3\GolfEnLaNubeBundle\Helpers\ArchivoActualizacionHcpYTarjetas;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Doctrine\ORM\QueryBuilder;

/**
 * Jugador controller.
 *
 */
class JugadorController extends Controller
{
	private function buscarEnListaJugadores(QueryBuilder $query, $buscar)
	{
		$qb = $this->getDoctrine()->getManager()->createQueryBuilder();
		if ( (int)$buscar > 0)
		{
			$query->andWhere($qb->expr()->eq('j.id', $buscar));
		} else {
			$query->andWhere($qb->expr()->orX(
					$qb->expr()->like('p.nombre_completo', $qb->expr()->literal("%$buscar%")),
					$qb->expr()->like('c.nombre',  $qb->expr()->literal("%$buscar%"))
			));
		}
		return $query;
	
	}

    /**
     * Lists all Jugador entities.
     *
     */
    public function indexAction()
    {
    	if  (false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_LISTA_JUGADORES'))
    	{
    		throw new AccessDeniedException();
    	}

    	$em = $this->getDoctrine()->getManager();

    	$query = $em->createQueryBuilder()
    			->select('j, p, c')
    			->from('GolfEnLaNubeBundle:Jugador', 'j')
    			->innerJoin('j.persona', 'p') 
    			->innerJoin('j.club', 'c')
    			->orderBy('p.nombre_completo', 'ASC');
    	
    	if ( $buscar = $this->getRequest()->get('buscar') )
    	{
    		$query = $this->buscarEnListaJugadores($query, $buscar);
    	}
    	
        $paginator = $this->get('knp_paginator'); 
        $entities = $paginator->paginate(
        			$query, 
        			$this->get('request')->query->get('page', 1),
        			15);

        return $this->render('GolfEnLaNubeBundle:Jugador:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Jugador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Jugador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_jugador_show', array('id' => $entity->getId())));
        }

        return $this->render('GolfEnLaNubeBundle:Jugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Jugador entity.
    *
    * @param Jugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Jugador $entity)
    {
        $form = $this->createForm(new JugadorType(), $entity, array(
            'action' => $this->generateUrl('admin_jugador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new Jugador entity.
     *
     */
    public function newAction()
    {
        $entity = new Jugador();
        $form   = $this->createCreateForm($entity);

        return $this->render('GolfEnLaNubeBundle:Jugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jugador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Jugador:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Jugador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('GolfEnLaNubeBundle:Jugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Jugador entity.
    *
    * @param Jugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Jugador $entity)
    {
        $form = $this->createForm(new JugadorType(), $entity, array(
            'action' => $this->generateUrl('admin_jugador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

        return $form;
    }
    /**
     * Edits an existing Jugador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_jugador_edit', array('id' => $id)));
        }

        return $this->render('GolfEnLaNubeBundle:Jugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Jugador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jugador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_jugador'));
    }

    /**
     * Creates a form to delete a Jugador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_jugador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
     * Muestra el formulario para subir los archivos INI_JUGA_HCP y JUGADORES que envia la AAG del Modulo Club mensualmente para luego 
     * importar los datos de los nuevos jugadores y actualizar los handicaps de los existentes.
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newArchivoAagAction()
    {
    	$form_jugadores  = $this->createUploadArchivosIniAagForm(new Documento(), ArchivoModuloClubAAG::JUGADORES);
    	$form_juga_hcp   = $this->createUploadArchivosIniAagForm(new Documento(), ArchivoModuloClubAAG::JUGA_HCP);

    	return $this->render('GolfEnLaNubeBundle:Jugador:newArchivoAag.html.twig', array(
    			'form_jugadores' => $form_jugadores->createView(),
    			'form_juga_hcp' => $form_juga_hcp->createView(),
    	));
    }

    /**
     * Crea el formulario para subir un archivo de los que envía la AAG del Modulo Club
     * @param Documento $entity
     * @param unknown $tipo
     * @return \Symfony\Component\Form\Form
     */
    private function createUploadArchivosIniAagForm(Documento $entity, $tipo)
    {
    	$form = $this->createForm(new DocumentoType(), $entity, array(
    			'action' => $this->generateUrl('admin_jugador_upload_archivo_aag'),
    			'method' => 'POST',
    	));
    	
    	$form->remove('name')->add('name', 'hidden', array('data' => $tipo));
    	$form->add('tipo', 'hidden', array('mapped' => false, 'data' => $tipo));
    	$form->add('id_documento', 'hidden', array('mapped' => false));

    	$form->add('submit', 'submit', array('label' => 'Subir', 'attr' => array('data-loading-text'=>'Subiendo')));
   	
    	return $form;
    }
    
    
    /**
     * Se encarga de guardar en el servidor el archivo submiteado por el formulario y devuelve un response en texto plano que indica el id del documento
     * en la DB
     * @param Request $request
     * @throws UploadException
     * @return Ambigous <\Symfony\Component\HttpFoundation\Response, \Symfony\Component\HttpFoundation\Response>
     */
    public function uploadArchivoAagAction(Request $request)
    {
    	$entity = new Documento();
    	$form = $this->createUploadArchivosIniAagForm($entity, $request->get('tipo'));
    	$form->handleRequest($request);
    
    	$entity->setIdUsuarioUploader($this->getUser()->getId());
    	$entity->setUploadedDate(new \DateTime());

    	if ($form->isValid()) {
    		$em = $this->getDoctrine()->getManager();
    
    		$em->persist($entity);
    		$em->flush();
    
    		return (Response::create($entity->getId(), 200));
    		// return $this->redirect($this->generateUrl('documento_show', array('id' => $entity->getId())));
    	}

    	throw new UploadException('Ocurrió un error al subir el archivo. Vuelva a intentarlo o comuniquese con el administrador del sistema.');
    }
    
    
    // Importación de archivo de Jugadores a partir de archivo inicial del Modulo Club de AAG
    
    public function importarArchivoAagAction()
    {
    	$id_documento_juga_hcp= $this->getRequest()->get('id_documento_juga_hcp');
    	$id_documento_jugadores = $this->getRequest()->get('id_documento_jugadores');
    	 
    	$em = $this->getDoctrine()->getManager();
    	$em->getConnection()->getConfiguration()->setSQLLogger(null);

    	$doc_juga_hcp = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id_documento_juga_hcp);
    
    	if (!$doc_juga_hcp) {
    		throw $this->createNotFoundException('Archivo invalido.');
    	}

    	$doc_jugadores = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id_documento_jugadores);
    	
    	if (!$doc_jugadores) {
    		throw $this->createNotFoundException('Archivo invalido.');
    	}
    	
    	$creados = $this->procesarArchivoIniJugaHcp($doc_juga_hcp);
    	$this->procesarArchivoIniJugadores($doc_jugadores);
   		
    	return Response::create($creados, 200);
    }
    
    private function procesarArchivoIniJugadores(Documento $doc)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$parser = new ArchivoModuloClubAAG(ArchivoModuloClubAAG::JUGADORES);
    		
    	$contador = 0;
    	$lineas_por_porcion = 200;
    	$f = fopen($doc->getAbsolutePath(), 'r');
    	
    	while ( $linea = fgets($f))
    	{
    		$linea = utf8_encode(str_replace("´", "'", $linea));
    		if ( $parser->esLineaArchivoValida($linea))
    		{
    			$campos = $parser->parseLineaArchivo($linea);
    	
    			$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $campos['matricula'] );
    			if ( ! is_null($jugador) )
    			{
	    			if ($this->actualizarDatosPersonalesJugadorPorArchivoModuloClubAag($jugador, $campos))
	    			{
	    				$em->persist($jugador);
	    				$contador += 1;
	    				if (($contador % $lineas_por_porcion) == 0)
	    				{
	    					$em->flush();
	    					$em->clear();
	    				}
	    				unset($jugador);
	    			}
    			}
    		}
    	}
    	$em->flush();
    	$em->clear();
    	
    	fclose($f);

    	return $contador;
    	 
    }
    
    private function actualizarDatosPersonalesJugadorPorArchivoModuloClubAag(Jugador $jugador, $campos)
    {
    	$persistir = false; 
    	if (trim( (string) $jugador->getPersona()->getSexo() ) == '' ) 
    	{
    		$jugador->getPersona()->setSexo($campos['sexo']);
    		$persistir = true; 
    	}
    	if (trim( (string) $jugador->getPersona()->getNombreCompleto() ) == '' ) 
    	{
    		$jugador->getPersona()->setNombreCompleto($campos['nombreCompleto']);
    		$persistir = true;
    	}
    	
    	return ($persistir);
    	
    }
    
	private function procesarArchivoIniJugaHcp(Documento $doc)
	{
		mb_internal_encoding('UTF-8');
		$em = $this->getDoctrine()->getManager();

		$parser = new ArchivoModuloClubAAG(ArchivoModuloClubAAG::JUGA_HCP);
		 
		$contador_nuevos_jugadores = 0 ; 
		$contador = 0;
		$lineas_por_porcion = 200;
		$f = fopen($doc->getAbsolutePath(), 'r');
		
		while ( $linea = fgets($f))
		{
			$linea = utf8_encode(str_replace("´", "'", $linea));
			if ( $parser->esLineaArchivoValida($linea) && $parser->obtenerCampoDeLinea($linea, 'estado') != 'B')
			{
				$campos = $parser->parseLineaArchivo($linea);
		
				$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $campos['matricula'] );
				if ( is_null($jugador) )
				{
					$jugador = $this->crearJugadorDeArchivoModuloClubAag($campos);
					++ $contador_nuevos_jugadores;

					$persistir = true;
				} else {
					$persistir = $this->actualizarJugadorPorArchivoModuloClubAag($em, $jugador, $campos);
					// if (! $persistir) { $em->detach($jugador);}
					$persistir = true;
				}
				if (isset ($persistir) && $persistir === true)
				{
					$em->persist($jugador);

					++ $contador;
					if (($contador % $lineas_por_porcion) == 0)
					{
						$em->flush();
						$em->clear();
					}
				}
				unset($jugador);
		
			}
		}
		$em->flush();
		$em->clear();
		
		fclose($f);
		 
		return $contador;
	}

    private function crearJugadorDeArchivoModuloClubAag($campos)
    {
    	$em = $this->getDoctrine()->getManager();

    	$club = $em->getRepository('GolfEnLaNubeBundle:Club')->find($campos['codigoClub']);

    	$jugador = Jugador::crearUsuarioJugador($campos['matricula'], $club, $campos['nombreCompleto'], $campos['sexo']);

    	$this->actualizarJugadorPorArchivoModuloClubAag($em, $jugador, $campos);
    	
    	$jugador->setHandicapEstandar($campos['handicapStd']);
    	$jugador->setHandicapPar3( $campos['handicapPar3']);

    	return $jugador;
    }

    private function actualizarJugadorPorArchivoModuloClubAag($em, Jugador $jugador, $campos)
    {
    	if ( ! $jugador->hayActualizacionEnMesDeFecha( \DateTime::createFromFormat('dmY', $campos['fechaVigencia']) ))
    	{
    		$actualizacion = new JugadorActualizacion();
    		$em->persist($actualizacion);
    		$actualizacion->setHandicapEstandar($campos['handicapStd']);
    		$actualizacion->setHandicapPar3($campos['handicapPar3']);
    		$actualizacion->setVigencia(\DateTime::createFromFormat('dmY', $campos['fechaVigencia']));

    		$jugador->addActualizacione($actualizacion);
    		$jugador->actualizarHandicapsAUltimoVigente();

    		return true;
    	}

    	return false;
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////// IMPORTACION ARCHIVOS DE BUENA FE
    
    
    /**
     * Muestra el formulario para subir los archivos de ActualizacionHcpYTarjetas para luego
     * importar los datos de los nuevos jugadores y actualizar los handicaps de los existentes.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newArchivoActualizacionHcpYTarjetasAction()
    {
    	
    	/*if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ACTUALIZAR_HCPS_Y_TARJETAS'))
    	{
    		throw new AccessDeniedException();
    	}*/

    	$doc_controller = $this->get('golf_en_la_nube.documentos');
    	$form  = $doc_controller->createUploadPorAjaxForm(new Documento());
    	$form->get('name')->setData('Archivo de actualizacion de hcp y tarjetas. ');
    
    	return $this->render('GolfEnLaNubeBundle:Jugador:newArchivoActualizacionHcpYTarjetas.html.twig', array(
    			'form' => $form->createView()
    
    	));
    }
    
    /**
     * Se encarga de guardar en el servidor el archivo submiteado por el formulario y devuelve un response en texto plano que indica el id del documento
     * en la DB
     * @param Request $request
     * @throws UploadException
     * @return Ambigous <\Symfony\Component\HttpFoundation\Response, \Symfony\Component\HttpFoundation\Response>
     */
    
    public function importarHcpYTarjetasDeArchivoAction()
    {
    	
    	if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_ACTUALIZAR_HCPS_Y_TARJETAS'))
    	{
    		throw new AccessDeniedException();
    	}
    
    	$id_documento = $this->getRequest()->get('id_documento');
    
    	$em = $this->getDoctrine()->getManager();
    	$em->getConnection()->getConfiguration()->setSQLLogger(null);
    
    	$doc = $em->getRepository('GolfEnLaNubeBundle:Documento')->find($id_documento);
    
    	if (!$doc) {
    		throw $this->createNotFoundException('Archivo invalido.');
    	}
    	$importados = $this->procesarArchivoActualizacionHcpYTarjetas($doc);
    	
    	try {
	    	$conn = $em->getConnection()->getWrappedConnection();
	    	//$conn = $this->getDoctrine()->getConnection(); 
	    	$stmt = $conn->prepare("CALL actualizar_hcps_a_maximos_vigentes");
	    	$stmt->execute();
    	}  catch (\Exception $e) 
    	{

    	}
    	
    
    		
    	return Response::create($importados, 200);
    }

    private function procesarArchivoActualizacionHcpYTarjetas(Documento $doc)
    {
    	$em = $this->getDoctrine()->getManager();
    	$parser = new ArchivoActualizacionHcpYTarjetas(ArchivoActualizacionHcpYTarjetas::SIMPLE);

    	$f = fopen($doc->getAbsolutePath(), 'r');
		$contador_nuevos_jugadores = 0 ; 
		$contador_jugadores_actualizados = 0 ; 
		$contador = 0;
		$lineas_por_porcion = 200;
    	while ( $linea = fgets($f))
    	{
	    	$linea = utf8_encode(trim($linea, "\r\n\0"));
	    	if ( $parser->esLineaArchivoValida($linea))
	    	{
	    		$campos = $parser->parseLineaArchivo($linea);

	    		$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $campos['matricula'] );
				if ( is_null($jugador)) continue; 

				$club 	 = ( trim($campos['codigoClub']) == '' ) ? null : $em->getRepository('GolfEnLaNubeBundle:Club')->find( $campos['codigoClub'] );
				$vigencia = \DateTime::createFromFormat('Y-m-d', $campos['fechaVigencia']);

				if ( ! $jugador->hayActualizacionEnMesDeFecha( $vigencia ))
				{
					$actualizacion = new JugadorActualizacion();
					$actualizacion->setVigencia($vigencia);
					$jugador->addActualizacione( $actualizacion );

					++ $contador_nuevos_jugadores;
					++ $contador;

					$em->persist($actualizacion);

				} else {
					$actualizacion = $jugador->actualizacionEnMesDeFecha( $vigencia );
					++ $contador_jugadores_actualizados;
					++ $contador; 
				}

				if ( ! is_null ($campos['handicapStd']) &&  trim( $campos['handicapStd']  ) != '' ) $actualizacion->setHandicapEstandar( $campos['handicapStd'] );
				if ( ! is_null ($campos['handicapPar3']) &&  trim( $campos['handicapPar3']  ) != '') $actualizacion->setHandicapPar3( $campos['handicapPar3'] );
				if ( ! is_null ($campos['tarjetasStd']) && trim( $campos['tarjetasStd']  ) != '') $actualizacion->setTarjetasEstandar( $campos['tarjetasStd'] );
				if ( ! is_null ($campos['tarjetasPar3']) && trim( $campos['tarjetasPar3']  ) != '') $actualizacion->setTarjetasPar3( $campos['tarjetasPar3'] );
				if ( !is_null( $club ) ) $actualizacion->setClubOpcion( $club );

				$jugadores[] = $campos['matricula'];

				if (($contador % $lineas_por_porcion) == 0)
				{
					$em->flush();
					$em->clear();
				}

				unset($jugador);
				unset($actualizacion);
	    	} 
    	}

    	fclose($f);

		$em->flush();
		$em->clear();

		$contador = count(array_unique($jugadores)) ;
		/*
		foreach (array_unique($jugadores) as $id_jugadores)
		{
			$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $campos['matricula'] );
			$jugador->actualizarHandicapsAUltimoVigente();
			$contador++; 
			if (($contador % $lineas_por_porcion) == 0)
			{
				$em->flush();
				$em->clear();
			}
			unset($jugador); 
		}
		$em->flush();
		$em->clear();
		*/
    	return $contador;
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////    
    private function algoritmoOrderTorneoFechasByFechaDesc(TorneoFechaJugador $a, TorneoFechaJugador $b)
    {
    	if ($a->getTorneoFecha()->getFecha() == $b->getTorneoFecha()->getFecha()) return 0;
    	return ($a->getTorneoFecha()->getFecha() > $b->getTorneoFecha()->getFecha()) ?  -1 : 1;
    }
    
    private function getTarjetasJugadorGroupByTemporada(Jugador $jugador)
    {
    	$temporada_tarjeta = array();

    	$torneo_fechas = $jugador->getTorneoFechas()->toArray();
    	usort($torneo_fechas, array($this, 'algoritmoOrderTorneoFechasByFechaDesc'));
    	
    	foreach ($torneo_fechas as $torneo_fecha_jugador)
    	{
    		$temporada_tarjeta[$torneo_fecha_jugador->getTorneoFecha()->getTorneo()->getIdTemporada()][] = $torneo_fecha_jugador->getTarjeta();
    	}

    	return $temporada_tarjeta;
    }
    
    public function listaTarjetasEnCircuitoAction($id, $id_circuito)
    {
    	$em = $this->getDoctrine()->getManager();

    	$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find($id);
    	if (!$jugador) {
    		throw $this->createNotFoundException('Jugador no valido.');
    	}

    	$circuito = $em->getRepository('GolfEnLaNubeBundle:Circuito')->find($id_circuito);
    	if (!$circuito) {
    		throw $this->createNotFoundException('Circuito no valido.');
    	}

    	return $this->render('GolfEnLaNubeBundle:Jugador:listaTarjetasEnCircuito.html.twig', array(
    		'circuito' => $circuito, 
    		'jugador'  => $jugador, 
    		'tarjetas' => $this->getTarjetasJugadorGroupByTemporada($jugador),
    	));
    }
    
}
