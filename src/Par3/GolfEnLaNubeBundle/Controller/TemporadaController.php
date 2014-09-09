<?php

namespace Par3\GolfEnLaNubeBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;

use Par3\GolfEnLaNubeBundle\Entity\Documento;
use Par3\GolfEnLaNubeBundle\Entity\Temporada;
use Par3\GolfEnLaNubeBundle\Form\TemporadaType;
use Par3\GolfEnLaNubeBundle\Entity\Club;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFecha;
use Par3\GolfEnLaNubeBundle\Entity\Equipo;
use Par3\GolfEnLaNubeBundle\Entity\Jugador;
use Par3\GolfEnLaNubeBundle\Entity\TemporadaClub;
use Par3\GolfEnLaNubeBundle\Entity\TemporadaClubJugador;
use Par3\GolfEnLaNubeBundle\Entity\User;
use Par3\GolfEnLaNubeBundle\Entity\TorneoFechaJugador;
use Par3\GolfEnLaNubeBundle\Form\EquipoType;
use Doctrine\Common\Util\Debug;
use Par3\GolfEnLaNubeBundle\Helpers\ArchivoListaBuenaFe;
use Par3\GolfEnLaNubeBundle\Form\DocumentoType;

/**
 * Temporada controller.
 *
 * @Route("/temporada")
 */
class TemporadaController extends Controller
{

	/**
	 * Lists all Temporada entities.
	 *
	 * @Route("/", name="temporada")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$entities = $em->getRepository('GolfEnLaNubeBundle:Temporada')->findAll();

		return array(
			'entities' => $entities,
		);
	}

	/**
	 * Lists all Temporada entities.
	 *
	 * @Route("/{id_circuito}", name="temporada_lista_por_circuito")
	 * @Method("GET")
	 * @Template()
	 */
	public function listaPorCircuitoAction($id_circuito)
	{
		if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_LISTA_TEMPORADAS'))
		{
			throw new AccessDeniedException();
		}
		
		$em = $this->getDoctrine()->getManager();
	
		$circuito = $em->getRepository('GolfEnLaNubeBundle:Circuito')->find($id_circuito);

		if (!$circuito) {
			throw $this->createNotFoundException('Circuito no valido.');
		}

		$entities = $em->getRepository('GolfEnLaNubeBundle:Temporada')->findBy(array('id_circuito' => $id_circuito));
	
		return array(
				'entities' => $entities,
				'circuito' => $circuito,
		);
	}

	/**
	 * Creates a new Temporada entity.
	 *
	 * @Route("/", name="temporada_create")
	 * @Method("POST")
	 * @Template("GolfEnLaNubeBundle:Temporada:new.html.twig")
	 */
	public function createAction(Request $request)
	{
		$entity = new Temporada();
		$form = $this->createCreateForm($entity);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('admin_temporada_show', array('id' => $entity->getId())));
		}

		return array(
			'entity' => $entity,
			'form'	=> $form->createView(),
		);
	}

	/**
	* Creates a form to create a Temporada entity.
	*
	* @param Temporada $entity The entity
	*
	* @return \Symfony\Component\Form\Form The form
	*/
	private function createCreateForm(Temporada $entity)
	{
		$form = $this->createForm(new TemporadaType(), $entity, array(
			'action' => $this->generateUrl('admin_temporada_create'),
			'method' => 'POST',
		));

		$form->add('submit', 'submit', array('label' => 'Crear'));

		return $form;
	}

	/**
	 * Displays a form to create a new Temporada entity.
	 *
	 * @Route("/new", name="temporada_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction($id_circuito)
	{ 	
		$em = $this->getDoctrine()->getManager();
		
		$circuito = $em->getRepository('GolfEnLaNubeBundle:Circuito')->find($id_circuito);
		 
		if ( ! $circuito) {
			throw $this->createNotFoundException('Circuito no valido.');
		}
		$entity = new Temporada();
		$entity->setCircuito($circuito);
		$form	= $this->createCreateForm($entity);

		return array(
			'entity' => $entity,
			'form'	=> $form->createView(),
		);
	}

	/**
	 * Finds and displays a Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction($id)
	{
		if (true === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_CAMPEONATOS'))
		{
			return $this->forward('GolfEnLaNubeBundle:Campeonato:listaPorTemporada', array('id_temporada' =>  $id));
		} else if (true === $this->get('security.context')->isGranted('ROLE_VER_LISTA_BUENA_FE'))
		{
			return $this->forward('GolfEnLaNubeBundle:Temporada:showClubs', array('id' =>  $id));
		}
	}

	/**
	 * Displays a form to edit an existing Temporada entity.
	 *
	 * @Route("/{id}/edit", name="temporada_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Temporada entity.');
		}

		$editForm = $this->createEditForm($entity);
		$deleteForm = $this->createDeleteForm($id);

		return array(
			'entity'		=> $entity,
			'edit_form'	=> $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}

	/**
	* Creates a form to edit a Temporada entity.
	*
	* @param Temporada $entity The entity
	*
	* @return \Symfony\Component\Form\Form The form
	*/
	private function createEditForm(Temporada $entity)
	{
		$form = $this->createForm(new TemporadaType(), $entity, array(
			'action' => $this->generateUrl('admin_temporada_update', array('id' => $entity->getId())),
			'method' => 'PUT',
		));

		$form->add('submit', 'submit', array('label' => 'Aplicar cambios'));

		return $form;
	}
	/**
	 * Edits an existing Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_update")
	 * @Method("PUT")
	 * @Template("GolfEnLaNubeBundle:Temporada:edit.html.twig")
	 */
	public function updateAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Temporada entity.');
		}

		$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$em->flush();

			return $this->redirect($this->generateUrl('admin_temporada_edit', array('id' => $id)));
		}

		return array(
			'entity'		=> $entity,
			'edit_form'	=> $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		);
	}
	/**
	 * Deletes a Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, $id)
	{
		$form = $this->createDeleteForm($id);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Temporada entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('admin_temporada'));
	}

	/**
	 * Creates a form to delete a Temporada entity by id.
	 *
	 * @param mixed $id The entity id
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('admin_temporada_delete', array('id' => $id)))
			->setMethod('DELETE')
			->add('submit', 'submit', array('label' => 'Delete'))
			->getForm()
		;
	}

	
	/**
	 * Finds and displays a Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_show_torneos")
	 * @Method("GET")
	 * @Template()
	 */
	public function showTorneosAction($id)
	{
		
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Temporada no valida.');
		}

		$torneos = $em->getRepository('GolfEnLaNubeBundle:Torneo')->findBy(array('id_temporada' => $id));

		return array(
				'temporada'		=> $entity,
				'entities'		=> $torneos,
		);
	}
	
	public function listaTorneoFechasConfigurarEquipoAction($id_temporada)
	{
		if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_EQUIPO'))
		{
			throw new AccessDeniedException();
		}
		$em = $this->getDoctrine()->getManager();
	
		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
	
		if (!$entity) {
			throw $this->createNotFoundException('Temporada no valida.');
		}
	
		$fechas = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->findFechasEnTemporadaParaConfigurarEquipo($id_temporada);
	
		return $this->render('GolfEnLaNubeBundle:Temporada:equipo/listaTorneoFechasConfigurarEquipo.html.twig' , array(
				'temporada'		=> $entity,
				'fechas'		=> $fechas,
		));
	
	}
	

	public function listaTorneoFechasConcluidasAction($id_temporada)
	{
		$em = $this->getDoctrine()->getManager();
		
		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
		
		if (!$entity) {
			throw $this->createNotFoundException('Temporada no valida.');
		}
		
		$fechas = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->getFechasEnTemporadaHastaFechaActualQuery($id_temporada);
		
		return $this->render('GolfEnLaNubeBundle:Temporada:listaTorneoFechasConcluidas.html.twig' , array(
				'temporada'		=> $entity,
				'fechas'		=> $fechas->getQuery()->execute(),
		));
		
	}
	
	/**
	 * Finds and displays a Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_show_clubs")
	 * @Method("GET")
	 * @Template()
	 */
	public function showClubsAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		 
		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id);
	
		if (!$entity) {
	
			throw $this->createNotFoundException('Temporada no valida.');
		}

		$clubs = $em->createQuery('SELECT tc,c FROM GolfEnLaNubeBundle:TemporadaClub tc	
												INNER JOIN tc.club c 
												WHERE tc.id_temporada = :id_temporada 
												ORDER BY c.nombre ASC')
					->setParameter('id_temporada', $id)
					->execute();
	
		return array(
				'temporada'		=> $entity,
				'temporada_clubs'		=> $clubs,
		);
	}

	/**
	 * Finds and displays a Temporada entity.
	 *
	 * @Route("/{id}", name="temporada_show_jugadores")
	 * @Method("GET")
	 * @Template()
	 * 
	 */
	// public function showListaBuenaFeAction($id_temporada, $id_club = null)
	public function showListaBuenaFeAction($id_temporada, $id_temporada_club = null ) //  $id_club = null)
	{

		if (false === $this->get('security.context')->isGranted('ROLE_VER_LISTA_BUENA_FE')) 
		{
			throw new AccessDeniedException();
		}

		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);

		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_LISTA_BUENA_FE_COMPLETA'))
		{
			$query = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->getQueryBuilderListasDeBuenaFeDeTemporadaYCapitan($id_temporada, $this->getUser());
		} else 
		{
			$query = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->getQueryBuilderListasDeBuenaFeDeTemporada($id_temporada);
		}
		
		if ( $buscar = $this->getRequest()->get('buscar') )
		{
			$query = $this->buscarEnListaBuenaFe($query, $buscar);
		}
		/* 
		if ( !is_null($id_club))
		{
			$query = $query->andWhere('tc.id_club = :club')
				->setParameter('club', $id_club);

			$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->findOneBy(array("id_temporada"=> $id_temporada, 'id_club' => $id_club));
			
		} else { $temporada_club = null; }
		*/

		if (!is_null($id_temporada_club))
		{
			$query = $query->andWhere('tc.id = :temporada_club' )
				->setParameter('temporada_club', $id_temporada_club);

			$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($id_temporada_club);
		} else { $temporada_club = null; }

		$paginator = $this->get('knp_paginator');
		//$entities = $em->getRepository('GolfEnLaNubeBundle:Jugador');

		$jugadores = $paginator->paginate(
						$query->getQuery(),
						$this->get('request')->query->get('page', 1),
						15);

		return array(
				'temporada' => $entity,
				'temporada_club' => $temporada_club, 
				'quitar_form' => $this->createPrototypeDeleteTemporadaClubJugadorForm()->createView(),
				'entities'	=> $jugadores,
				'id_club'	=> (!is_null($temporada_club)) ? $temporada_club->getClub() : null,
		);
	}

	/**
	 * 
	 * @param QueryBuilder $query
	 * @param integer|string $buscar
	 * @return QueryBuilder
	 */
	private function buscarEnListaBuenaFe(QueryBuilder $query, $buscar)
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

	public function quitarJugadorDeListaBuenaFeAction(Request $request, $id_temporada_club_jugador)
	{
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_QUITAR_JUGADOR_DE_LISTA_BUENA_FE'))
		{
			throw new AccessDeniedException();
		}

		$form = $this->createDeleteForm($id_temporada_club_jugador);
		$form->handleRequest($request);
	
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('GolfEnLaNubeBundle:TemporadaClubJugador')->find($id_temporada_club_jugador);
	
			if ( !$this->getUser()->esCapitanDeTemporadaClub($entity->getTemporadaClub()->getId()) && false === $this->get('security.context')->isGranted('ROLE_ADMIN_QUITAR_CUALQUIER_JUGADOR_DE_LISTA_BUENA_FE'))
			{
				throw new HttpException(401, "Su usuario no esta autorizado a quitar al jugador " . $entity->getJugador()->getId() . " de la lista de buena fe.");
			}

			if (!$entity) {
				throw $this->createNotFoundException('TemporadaClubJugador no valido.');
			}
	
			$id_temporada = $entity->getTemporadaClub()->getTemporada()->getId();
			
			$em->remove($entity);
			$em->flush();
		}
	
		return $this->redirect( $this->generateUrl('admin_temporada_show_lista_buena_fe', array('id_temporada' => $id_temporada)) );
	}
	
    private function createPrototypeDeleteTemporadaClubJugadorForm()
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_temporada_quitar_jugador_de_lista_buena_fe', array('id_temporada_club_jugador' => '__NAME__')))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////// IMPORTACION ARCHIVOS DE BUENA FE
	
	/**
	 * Crea el formulario para subir un archivo 
	 * @param Documento $entity
	 * @param unknown $tipo
	 * @return \Symfony\Component\Form\Form
	 */
	private function createUploadArchivoListaBuenaFeForm(Documento $entity)
	{
		$form = $this->createForm(new DocumentoType(), $entity, array(
				'action' => $this->generateUrl('admin_temporada_upload_archivo_lista_buena_fe'),
				'method' => 'POST',
		));
		 
		$form->remove('name')->add('name', 'hidden', array('data' => 'Archivo lista de buena fe'));
		$form->add('id_documento', 'hidden', array('mapped' => false));
		$form->add('submit', 'submit', array('label' => 'Subir', 'attr' => array('data-loading-text'=>'Subiendo')));
	
		return $form;
	}
	

	/**
	 * Muestra el formulario para subir los archivos INI_JUGA_HCP y JUGADORES que envia la AAG del Modulo Club mensualmente para luego
	 * importar los datos de los nuevos jugadores y actualizar los handicaps de los existentes.
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function newArchivoListaBuenaFeAction($id_temporada)
	{
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_IMPORTAR_LISTA_BUENA_FE'))
		{
			throw new AccessDeniedException();
		}

		$em  = $this->getDoctrine()->getManager();
		
		$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);

		if (!$temporada) {
			throw $this->createNotFoundException('Archivo invalido.');
		}
		
		$form  = $this->createUploadArchivoListaBuenaFeForm(new Documento());
	
		return $this->render('GolfEnLaNubeBundle:Temporada:newArchivoListaBuenaFe.html.twig', array(
				'form' => $form->createView(),
				'temporada' => $temporada

		));
	}

	/**
	 * Se encarga de guardar en el servidor el archivo submiteado por el formulario y devuelve un response en texto plano que indica el id del documento
	 * en la DB
	 * @param Request $request
	 * @throws UploadException
	 * @return Ambigous <\Symfony\Component\HttpFoundation\Response, \Symfony\Component\HttpFoundation\Response>
	 */
	public function uploadArchivoListaBuenaFeAction(Request $request)
	{
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_IMPORTAR_LISTA_BUENA_FE'))
		{
			throw new AccessDeniedException();
		}

		$entity = new Documento();
		$form = $this->createUploadArchivoListaBuenaFeForm($entity);
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

	public function importarListaBuenaFeDeArchivoAction($id_temporada)
	{
		if (false === $this->get('security.context')->isGranted('ROLE_ADMIN_IMPORTAR_LISTA_BUENA_FE'))
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
		$temporada = $em->getRepository('GolfEnLaNubeBundle:Temporada')->find($id_temporada);
		
		if (!$temporada ) {
			throw $this->createNotFoundException('Temporada no valida.');
		}
 		$importados = $this->procesarArchivoListaBuenaFe($doc,$temporada);

		 
		return Response::create($importados, 200);
	}

	private function procesarArchivoListaBuenaFe(Documento $doc, Temporada $temporada)
	{
		$em = $this->getDoctrine()->getManager();
		$parser = new ArchivoListaBuenaFe( ArchivoListaBuenaFe::CON_EQUIPOS );

		$clubs_jugadores = array();

		$f = fopen($doc->getAbsolutePath(), 'r');
		while ( $linea = fgets($f))
		{
			$linea = utf8_encode(trim($linea, "\r\n\0"));
			if ( $parser->esLineaArchivoValida($linea))
			{
				$campos = $parser->parseLineaArchivo($linea);
				if ( !isset($campos['equipo']) ) $campos ['equipo'] = '';
				$clubs_jugadores[ $campos['codigoClub'] ] [ $campos['equipo'] ] [] = $campos['matricula']; 
			} 
		}
		fclose($f);
		
		$em->persist($temporada);
		
		$contador = 0;
		foreach ($clubs_jugadores as $id_club => $equipos)
		{	
			foreach ($equipos as  $equipo => $jugadores)
			{
				$club 	 = $em->getRepository('GolfEnLaNubeBundle:Club')->find( $id_club );
				if ( is_null($club)) continue;

				$find_temporada_club_by = array ('id_temporada' => $temporada->getId(), 'id_club' => $id_club );
				if ( ! empty($equipo)) $find_temporada_club_by['equipo_intraclub'] = $equipo;

				$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')
										->findOneBy( $find_temporada_club_by);
	
				if ( is_null($temporada_club)) 
				{
					$temporada_club = new TemporadaClub();
					$temporada_club->setClub($club);
					$temporada_club->setEquipoIntraclub($equipo);

					$temporada->addTemporadaClub($temporada_club);
					$em->persist($temporada_club);
				}

				foreach ($jugadores as $id_jugador) 
				{
					$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $id_jugador );
					if ( is_null($jugador) ) continue; 
					if ( $temporada_club->tieneJugadorConMatricula($id_jugador)) continue;
					
					$temporada_club_jugador = new TemporadaClubJugador();
					$temporada_club_jugador->setJugador($jugador);
					$temporada_club->addClubJugadore($temporada_club_jugador); 
					++$contador;
					$em->persist($temporada_club_jugador);
				}
			}
		}
		$em->flush();
		return $contador;
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////
	////////// EQUIPOS

	public function obtenerHandicapDeJuegoAction($id_torneo_fecha)
	{
		$em = $this->getDoctrine()->getManager();
		
		$jugador = $em->getRepository('GolfEnLaNubeBundle:Jugador')->find( $this->getRequest()->get('id_jugador') );
		
		if (!$jugador) {
			throw $this->createNotFoundException('Jugador no valido.');
		}

		$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);
		
		if (!$torneo_fecha) {
			throw $this->createNotFoundException('Jugador no valido.');
		}
		
		return JsonResponse::create($jugador->handicapDeJuegoParaFecha( $torneo_fecha->getFecha() ), 200);
	}
	
	/**
	 * Displays a form to edit an existing Equipo entity.
	 *
	 */
	public function editEquipoAction($id)
	{
		$em = $this->getDoctrine()->getManager();
	
		$entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);
	
		if (!$entity) {
			throw $this->createNotFoundException('Equipo no valido.');
		}
	
		$editForm = $this->createEditEquipoForm($entity);
		// $deleteForm = $this->createDeleteForm($id);
	
		return $this->render('GolfEnLaNubeBundle:Temporada:equipo/new.html.twig', array(
				'entity'      => $entity,
				'form'   => $editForm->createView(),
				// 'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Creates a form to edit a Equipo entity.
	 *
	 * @param Equipo $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditEquipoForm(Equipo $entity)
	{

		$em = $this->getDoctrine()->getManager();
		$opciones_equipo = array(); 
		$opciones_equipo['clubs'][] = $entity->getTemporadaClub();
		
		if ( !is_null($entity->getClub()) )
		{
			// opciones para seleccionar los jugadores habilitados en la temporada
			$opciones_equipo['id_temporada_club'] = $entity->getTemporadaClub()->getId();
			$opciones_equipo['id_club'] = $entity->getClub()->getId();
			$opciones_equipo['id_temporada'] = $entity->getTorneoFecha()->getTorneo()->getTemporada()->getId();
			$opciones_equipo['fecha'] = $entity->getTorneoFecha()->getFecha();
		}

		$id_torneo_fecha = $entity->getIdTorneoFecha();
		$form = $this->createForm(new EquipoType($em, $opciones_equipo), $entity, array(
				'action' => $this->generateUrl('admin_temporada_equipo_update', array('id' => $entity->getId())),
				'method' => 'PUT',
		));
	
		$form->add('submit', 'submit', array('label' => 'Aplicar cambios'));
	
		return $form;
	}
	/**
	 * Edits an existing Equipo entity.
	 *
	 */
	public function updateEquipoAction(Request $request, $id)
	{
		$em = $this->getDoctrine()->getManager();
	
		$entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);
	
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Equipo entity.');
		}
	
		//$deleteForm = $this->createDeleteForm($id);
		$editForm = $this->createEditEquipoForm($entity);
		$editForm->handleRequest($request);

		if ($editForm->isValid()) {
			$this->actualizarHcpsJugadoresParaTorneoFecha($entity);
				
			$em->flush();
	
			return $this->redirect($this->generateUrl('admin_temporada_equipo_show', array('id' => $id)));
		}
	
		return $this->render('GolfEnLaNubeBundle:Temporada:equipo/new.html.twig', array(
				'entity'      => $entity,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
		));
	}

	public function deleteEquipoAction($id)
	{
	
		if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_CREAR_EQUIPO'))
		{
			throw new AccessDeniedException();
		}
	
		$em = $this->getDoctrine()->getManager();
	
		$campos_enviados = $this->getRequest()->get('par3_golfenlanubebundle_equipo');
	
		$equipo = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);
	
		if ( is_null($equipo))
		{
			throw $this->createNotFoundException('Equipo no valido.');
		}
		
		if ($equipo->getTorneoFechaJugadoresConTarjeta()->count() > 0 )
		{
			$this->get('braincrafted_bootstrap.flash')
				->alert('No se puede eliminar este equipo ya que se han cargado tarjetas para el mismo');
		} else {
		
			$em->remove($equipo);
			$em->flush();
		}
		return $this->redirect($this->generateUrl('admin_temporada_lista_equipos_por_torneo_fecha',
				array( 'id_torneo_fecha' => $equipo->getTorneoFecha()->getId() )), 301);
	}
	
	/**
	 * Creates a new Equipo entity.
	 *
	 */
	public function createEquipoAction(Request $request)
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

		$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($campos_enviados['temporada_club']);
		
		if ( is_null($temporada_club))
		{
			throw $this->createNotFoundException('Club no valido.');
		}
		
		$entity = new Equipo();
		$entity->setTorneoFecha($torneo_fecha);
		$entity->setTemporadaClub($temporada_club);
		$entity->setClub($temporada_club->getClub());
		$form = $this->createCreateEquipoForm($entity);
	
		$form->handleRequest($request);

		if ( !$this->usuarioActualAutorizadoCrearEquipoEnTorneoFecha( $entity->getClub(), $entity->getTorneoFecha()))
		{
			throw new HttpException(401, "Su usuario no está autorizado a configurar este equipo");
		}

		if ($form->isValid()) 
		{

			$this->actualizarHcpsJugadoresParaTorneoFecha($entity);
			
			$em = $this->getDoctrine()->getManager();
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('admin_temporada_equipo_show', array('id' => $entity->getId())));
		}
	
		return $this->render('GolfEnLaNubeBundle:Temporada/equipo:new.html.twig', array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}
	
	
	private function actualizarHcpsJugadoresParaTorneoFecha(Equipo $equipo)
	{
		$torneo_fecha = $equipo->getTorneoFecha();
		foreach ($equipo->getTorneoFechaJugadores() as $tfj)
		{
			if (!is_null ($tfj->getJugador()))
			{
				$tfj->setHandicapPar3( $tfj->getJugador()->actualizacionMasProximaAFecha($torneo_fecha->getFecha())->getHandicapPar3() );
				$tfj->setHandicapEstandar( $tfj->getJugador()->actualizacionMasProximaAFecha($torneo_fecha->getFecha())->getHandicapEstandar() );

				if ( is_null($tfj->getHandicapDeJuego())) 
					$tfj->setHandicapDeJuego( $tfj->getJugador()->handicapDeJuegoParaFecha( $torneo_fecha->getFecha() ));
			}
		}
	}
	
	private function getClubsSinEquipoEnTorneoFechaParaUsuarioActual(TorneoFecha $tf)
	{
		$res = array(); 
		$clubs = $this->getUser()->getCapitanTemporadaClubsEnTemporada( $tf->getTorneo()->getTemporada()->getId());
		
		foreach ($clubs as $tc)
		{
			if (! $tf->tieneEquipoDeTemporadaClub($tc)) $res[] = $tc; 
		}
		return $res;
	}
	
	
	/**
	 * Creates a form to create a Equipo entity.
	 *
	 * @param Equipo $entity The entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateEquipoForm(Equipo $entity)
	{
		 
		//$opciones_equipo['clubs'] = $this->getUser()->getClubsCapitaneadosEnTemporada( $entity->getTorneoFecha()->getTorneo()->getTemporada()->getId() );
		$opciones_equipo['clubs'] = $this->getClubsSinEquipoEnTorneoFechaParaUsuarioActual($entity->getTorneoFecha());
		
		if ( !is_null($entity->getClub()) )
		{
			// opciones para seleccionar los jugadores habilitados en la temporada 
			$opciones_equipo['id_temporada_club'] = $entity->getTemporadaClub()->getId();
			$opciones_equipo['id_club'] = $entity->getClub()->getId();
			$opciones_equipo['id_temporada'] = $entity->getTorneoFecha()->getTorneo()->getTemporada()->getId();
			$opciones_equipo['fecha'] = $entity->getTorneoFecha()->getFecha();
		}

		$form = $this->createForm(	new EquipoType(	$this->getDoctrine()->getManager(),	$opciones_equipo),
									$entity,
									array(	'action' => $this->generateUrl('admin_temporada_equipo_create'),
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
	
	public function newEquipoAction($id_torneo_fecha)
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
	
		$entity = new Equipo();
		$entity->setTorneoFecha($torneo_fecha);
		
		$this->configurarJugadoresNuevoEquipo($entity);
	
		$form   = $this->createCreateEquipoForm($entity );
	
		return $this->render('GolfEnLaNubeBundle:Temporada/equipo:new.html.twig', array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}
	
	public function formularioJugadoresParaEquipoAction($id_torneo_fecha)
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

			$temporada_club = $em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->find($this->getRequest()->get('id_club'));
			
			if (!$temporada_club) {
				throw $this->createNotFoundException('Temporada Club invalido.');
			}
			
			$entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->findOneBy(array( 'id_temporada_club' => $temporada_club->getId() , 'id_torneo_fecha' => $id_torneo_fecha ));
			if ( is_null($entity))
			{
				$entity = new Equipo();
				$entity->setTorneoFecha($torneo_fecha);
				$entity->setTemporadaClub($temporada_club);
				$entity->setClub($temporada_club->getClub());
	
				$this->configurarJugadoresNuevoEquipo($entity);
			}
			$form   = $this->createCreateEquipoForm($entity);
		
			$form_jugadores = $form->get('torneo_fecha_jugadores');

			return $this->render('GolfEnLaNubeBundle:Temporada/equipo:form_jugadores_de_club.html.twig', array(
					'entity' => $entity,
					'form_jugadores'   => $form_jugadores->createView(),
			));
	}
	
	private function configurarJugadoresNuevoEquipo(Equipo $entity)
	{
		
		for ( $i = 0 ; $i < $entity->getTorneoFecha()->getTorneo()->getTitularesPorClub() ; ++ $i)
		{
			$torneo_fecha_jugador = new TorneoFechaJugador();
			$torneo_fecha_jugador->setEquipo($entity);
			$torneo_fecha_jugador->setCapitanEquipo(false);
			$torneo_fecha_jugador->setTitular(true);
			$torneo_fecha_jugador->setTorneoFecha($entity->getTorneoFecha());
			$torneo_fecha_jugador->setClub($entity->getClub());
			$entity->addTorneoFechaJugadore($torneo_fecha_jugador);

		}

		$entity->getTorneoFechaJugadores()->first()->setCapitanEquipo(true);

		for ( $i = 0 ; $i < $entity->getTorneoFecha()->getTorneo()->getSuplentesPorClub() ; ++ $i)
		{
			$torneo_fecha_jugador = new TorneoFechaJugador();
			$torneo_fecha_jugador->setEquipo($entity);
			$torneo_fecha_jugador->setCapitanEquipo(false);
			$torneo_fecha_jugador->setTitular(false);
			$torneo_fecha_jugador->setTorneoFecha($entity->getTorneoFecha());
			$entity->addTorneoFechaJugadore($torneo_fecha_jugador);
		}
	}

	/**
	 * Finds and displays a Equipo entity.
	 *
	 */
	public function showEquipoAction($id)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('GolfEnLaNubeBundle:Equipo')->find($id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Equipo entity.');
		}

		$deleteForm = $this->createDeleteForm($id);

		return $this->render('GolfEnLaNubeBundle:Temporada/equipo:show.html.twig', array(
				'entity'      => $entity,
				'delete_form' => $deleteForm->createView(),        ));
	}

	/**
	 * Lists all Temporada entities.
	 *
	 * @Route("/{id_torneo_fecha}", name="temporada_lista_equipos_por_torneo_fecha")
	 * @Method("GET")
	 */
	public function listaEquiposPorTorneoFechaAction($id_torneo_fecha)
	{
		$em = $this->getDoctrine()->getManager();
	
		$torneo_fecha = $em->getRepository('GolfEnLaNubeBundle:TorneoFecha')->find($id_torneo_fecha);

		if ( !$torneo_fecha) {
			throw $this->createNotFoundException('Fecha de torneo no valida.');
		}

		if ( false === $this->get('security.context')->isGranted('ROLE_ADMIN_VER_LISTA_EQUIPOS_COMPLETA'))
		{
			$equipos = $em->getRepository('GolfEnLaNubeBundle:Equipo')->equiposDeCapitanEnTorneoFecha($this->getUser(), $torneo_fecha);
		} else {
			$equipos = $torneo_fecha->getEquipos();
		}

		return $this->render('GolfEnLaNubeBundle:Temporada/equipo:listaEquiposPorTorneoFecha.html.twig', array(
				'entity'      => $torneo_fecha,      
				'equipos' 	=> $equipos));
	}


	
	
}
