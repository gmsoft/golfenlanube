<?php
namespace Par3\GolfEnLaNubeBundle\Menu;

use Knp\Menu\FactoryInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Doctrine\ORM\EntityManager;


class MenuBuilder 
{
	protected $factory; 
	protected $router; 
	protected $security;
	/**
	 * 
	 * @var EntityManager
	 */
	protected $em;

	public function __construct(FactoryInterface $factory, Router $router, SecurityContextInterface $security, EntityManager $em)
	{
		$this->factory = $factory; 
		$this->router = $router; 
		$this->security = $security ; 
		$this->em = $em;
	}

	public function mainMenu(Request $request)
	{
		$circuito = $this->em->getRepository('GolfEnLaNubeBundle:Circuito')->findOneBy(array('subdominio' => 'circuitopar3'));
		$id_circuito = $circuito->getId();

		$temporada_actual = $this->em->getRepository('GolfEnLaNubeBundle:Temporada')->findTemporadaActualDeCircuito($id_circuito);
		$id_temporada_actual = $temporada_actual->getId(); 

		$factory = $this->factory;
		$menu = $factory->createItem('root');

		$menu->addChild('Inicio', array('route' => '_home'));

		/*
		$clubes_participantes = $menu->addChild('Clubes participantes', array('uri' => '#'));

		foreach ($this->em->getRepository('GolfEnLaNubeBundle:TemporadaClub')->findTemporadaClubsDeTemporadaOrderByNombreClubAsc($id_temporada_actual) as $tc)
		{
			$clubes_participantes->addChild($tc->getClub()->getNombre(), array('uri' => '#'));
		}
		*/

		$torneos = $menu->addChild('Torneos ' . $temporada_actual->getNombre() , array('uri' => '#'));

		foreach ($this->em->getRepository('GolfEnLaNubeBundle:Torneo')->findTorneosDeTemporadaOrderByFechasAsc($id_temporada_actual) as $t)
		{
			if ($t->getCampeonatos()->count() > 0 ) {
				$torneos->addChild(strtoupper( $t->getCampeonatos()->first()->getNombre() ) . ' >> ', array('uri' => '#'))->setAttribute('data-item-menu-sin-link', '1');
                        }
			
			
			foreach ($t->getFechas() as $i => $tf)
			{
                                $nombre_torneo_fecha = $t->getNombre();
				$torneos->addChild( $nombre_torneo_fecha, array('route'=>'torneofecha_show_fecha', 'routeParameters' => array('id' => $tf->getId())));
			}
		}

		$tablasPosiciones = $menu->addChild('Tablas de Posiciones '  . $temporada_actual->getNombre() , array('uri' => '#'));
		
		foreach ($this->em->getRepository('GolfEnLaNubeBundle:Campeonato')->findBy(array('id_temporada' => $id_temporada_actual) ) as $c )
		{
			$tablasPosiciones->addChild( $c->getNombre(), array('route' => 'campeonato_tabla_de_posiciones', 'routeParameters' => array('id' => $c->getId() )));
		}
		
		
		$mis_opciones = $menu->addChild('Mis opciones');
		$mis_opciones->setAttribute('class', 'has-dropdown');
		
		$jugador = $this->security->getToken()->getUser()->getPersona()->getJugador();
		if ( !is_null($jugador))
		{
			$mis_opciones->addChild('Mis tarjetas', array(	'route' => 'jugador_lista_tarjetas_en_circuito', 
															'routeParameters' => array('id' => $jugador->getId(), 'id_circuito' => $id_circuito)));
			$mis_opciones->addChild('Mis reservas', array(	'route' => 'jugador_lista_tarjetas_en_circuito', 
															'routeParameters' => array('id' => $jugador->getId(), 'id_circuito' => $id_circuito)));
		} 
		
		// $mis_opciones->addChild('Estadisticas', array('uri' => '#'));
		$mis_opciones->addChild('Modificar datos personales', array(	'route' => 'user_edit_datos_personales', 
															'routeParameters' => array('id' => $this->security->getToken()->getUser()->getId() )
								));

		if ($this->security->isGranted('ROLE_ADMIN'))
		{
			$admin = $mis_opciones->addChild('Herramientas Administrativas', array('uri' => '#'))->setAttribute('data-item-menu-sin-link', '1');;

			if ($this->security->isGranted('ROLE_VER_LISTA_BUENA_FE'))
			{
				$admin->addChild(' - Torneos y jugadores de la temporada', array(
											'route' => 'admin_temporada_show', 
											'routeParameters' => array('id' => $id_temporada_actual)) );
			}
			
			if ($this->security->isGranted('ROLE_VER_LISTA_TEMPORADAS'))
			{
				$admin->addChild(' - Temporadas anteriores', array('route' => 'admin_lista_temporada_por_circuito' ,
																'routeParameters' => array('id_circuito' => $id_circuito )));
			}

			if ($this->security->isGranted('ROLE_ADMIN_HABILITAR_CARGA_TARJETAS') || $this->security->isGranted('ROLE_ADMIN_CARGAR_TARJETA'))
			{
				$admin->addChild(' - Carga de tarjetas', array('route' => 'admin_temporada_lista_torneo_fechas_concluidas', 
															'routeParameters' => array('id_temporada' => $id_temporada_actual )));
			}
			
			if ($this->security->isGranted('ROLE_ADMIN_CREAR_EQUIPO'))
			{
				
				if ($this->security->getToken()->getUser()->esCapitanDeAlgunTemporadaClub($id_temporada_actual))
				{
					$admin->addChild(' - Presentación de equipos', array(	'route' => 'admin_temporada_lista_torneo_fechas_configurar_equipo', 
																			'routeParameters' => array('id_temporada' => $id_temporada_actual)));
				}
			}


			if  ($this->security->isGranted('ROLE_ADMIN_VER_LISTA_JUGADORES'))
			{
				$admin->addChild(' - Lista de Jugadores AAG', array('route' => 'admin_jugador')); //,
			}
			
			if ($this->security->isGranted('ROLE_ADMIN_VER_LISTA_USUARIOS'))
			{
				$admin->addChild(' - Lista de Usuarios - ABM', array('route' => 'admin_user'));
			}

			if  ($this->security->isGranted('ROLE_ADMIN_VER_LISTA_CLUBS'))
			{
				$admin->addChild(' - Lista de Clubs', array('route' => 'admin_club')); //,
			}
		}

		return $menu;
	}
}
