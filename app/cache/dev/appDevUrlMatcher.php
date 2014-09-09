<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/css/bootstrap')) {
            // _assetic_bootstrap_css
            if ($pathinfo === '/css/bootstrap.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css',);
            }

            if (0 === strpos($pathinfo, '/css/bootstrap_')) {
                // _assetic_bootstrap_css_0
                if ($pathinfo === '/css/bootstrap_bootstrap_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css_0',);
                }

                // _assetic_bootstrap_css_1
                if ($pathinfo === '/css/bootstrap_form_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_bootstrap_css_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/bootstrap')) {
                // _assetic_bootstrap_js
                if ($pathinfo === '/js/bootstrap.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js',);
                }

                if (0 === strpos($pathinfo, '/js/bootstrap_')) {
                    // _assetic_bootstrap_js_0
                    if ($pathinfo === '/js/bootstrap_transition_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_0',);
                    }

                    // _assetic_bootstrap_js_1
                    if ($pathinfo === '/js/bootstrap_alert_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_1',);
                    }

                    // _assetic_bootstrap_js_2
                    if ($pathinfo === '/js/bootstrap_button_3.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_2',);
                    }

                    if (0 === strpos($pathinfo, '/js/bootstrap_c')) {
                        // _assetic_bootstrap_js_3
                        if ($pathinfo === '/js/bootstrap_carousel_4.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_3',);
                        }

                        // _assetic_bootstrap_js_4
                        if ($pathinfo === '/js/bootstrap_collapse_5.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_4',);
                        }

                    }

                    // _assetic_bootstrap_js_5
                    if ($pathinfo === '/js/bootstrap_dropdown_6.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_5',);
                    }

                    // _assetic_bootstrap_js_6
                    if ($pathinfo === '/js/bootstrap_modal_7.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_6',);
                    }

                    // _assetic_bootstrap_js_7
                    if ($pathinfo === '/js/bootstrap_tooltip_8.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 7,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_7',);
                    }

                    // _assetic_bootstrap_js_8
                    if ($pathinfo === '/js/bootstrap_popover_9.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 8,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_8',);
                    }

                    // _assetic_bootstrap_js_9
                    if ($pathinfo === '/js/bootstrap_scrollspy_10.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 9,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_9',);
                    }

                    // _assetic_bootstrap_js_10
                    if ($pathinfo === '/js/bootstrap_tab_11.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 10,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_10',);
                    }

                    // _assetic_bootstrap_js_11
                    if ($pathinfo === '/js/bootstrap_affix_12.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 11,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_11',);
                    }

                    // _assetic_bootstrap_js_12
                    if ($pathinfo === '/js/bootstrap_bc-bootstrap-collection_13.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_js',  'pos' => 12,  '_format' => 'js',  '_route' => '_assetic_bootstrap_js_12',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/js/jquery')) {
                // _assetic_jquery
                if ($pathinfo === '/js/jquery.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_jquery',);
                }

                // _assetic_jquery_0
                if ($pathinfo === '/js/jquery_jquery-1.10.2_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'jquery',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_jquery_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // admin_en_la_nube_homepage
            if ($pathinfo === '/admin/golf') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_en_la_nube_homepage',);
            }

            if (0 === strpos($pathinfo, '/admin/institucion')) {
                // admin_institucion
                if (rtrim($pathinfo, '/') === '/admin/institucion') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_institucion');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::indexAction',  '_route' => 'admin_institucion',);
                }

                // admin_institucion_show
                if (preg_match('#^/admin/institucion/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_institucion_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::showAction',));
                }

                // admin_institucion_new
                if ($pathinfo === '/admin/institucion/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::newAction',  '_route' => 'admin_institucion_new',);
                }

                // admin_institucion_create
                if ($pathinfo === '/admin/institucion/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_institucion_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::createAction',  '_route' => 'admin_institucion_create',);
                }
                not_admin_institucion_create:

                // admin_institucion_edit
                if (preg_match('#^/admin/institucion/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_institucion_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::editAction',));
                }

                // admin_institucion_update
                if (preg_match('#^/admin/institucion/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_institucion_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_institucion_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::updateAction',));
                }
                not_admin_institucion_update:

                // admin_institucion_delete
                if (preg_match('#^/admin/institucion/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_institucion_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_institucion_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::deleteAction',));
                }
                not_admin_institucion_delete:

            }

            if (0 === strpos($pathinfo, '/admin/formatojuego')) {
                // admin_formatojuego
                if (rtrim($pathinfo, '/') === '/admin/formatojuego') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_formatojuego');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::indexAction',  '_route' => 'admin_formatojuego',);
                }

                // admin_formatojuego_show
                if (preg_match('#^/admin/formatojuego/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_formatojuego_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::showAction',));
                }

                // admin_formatojuego_new
                if ($pathinfo === '/admin/formatojuego/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::newAction',  '_route' => 'admin_formatojuego_new',);
                }

                // admin_formatojuego_create
                if ($pathinfo === '/admin/formatojuego/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_formatojuego_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::createAction',  '_route' => 'admin_formatojuego_create',);
                }
                not_admin_formatojuego_create:

                // admin_formatojuego_edit
                if (preg_match('#^/admin/formatojuego/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_formatojuego_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::editAction',));
                }

                // admin_formatojuego_update
                if (preg_match('#^/admin/formatojuego/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_formatojuego_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_formatojuego_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::updateAction',));
                }
                not_admin_formatojuego_update:

                // admin_formatojuego_delete
                if (preg_match('#^/admin/formatojuego/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_formatojuego_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_formatojuego_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::deleteAction',));
                }
                not_admin_formatojuego_delete:

            }

            if (0 === strpos($pathinfo, '/admin/c')) {
                if (0 === strpos($pathinfo, '/admin/club')) {
                    // admin_club
                    if (rtrim($pathinfo, '/') === '/admin/club') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_club');
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::indexAction',  '_route' => 'admin_club',);
                    }

                    // admin_club_show
                    if (preg_match('#^/admin/club/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_club_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::showAction',));
                    }

                    // admin_club_new
                    if ($pathinfo === '/admin/club/new') {
                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::newAction',  '_route' => 'admin_club_new',);
                    }

                    // admin_club_create
                    if ($pathinfo === '/admin/club/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_club_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::createAction',  '_route' => 'admin_club_create',);
                    }
                    not_admin_club_create:

                    // admin_club_edit
                    if (preg_match('#^/admin/club/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_club_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::editAction',));
                    }

                    // admin_club_update
                    if (preg_match('#^/admin/club/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_club_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_club_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::updateAction',));
                    }
                    not_admin_club_update:

                    // admin_club_delete
                    if (preg_match('#^/admin/club/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_admin_club_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_club_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::deleteAction',));
                    }
                    not_admin_club_delete:

                    if (0 === strpos($pathinfo, '/admin/club/importar_')) {
                        // admin_club_importar_de_archivo_aag
                        if ($pathinfo === '/admin/club/importar_archivo_aag') {
                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::importarArchivoAagAction',  '_route' => 'admin_club_importar_de_archivo_aag',);
                        }

                        // admin_club_importar_canchas_de_archivo_aag
                        if ($pathinfo === '/admin/club/importar_canchas_archivo_aag') {
                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::importarCanchasArchivoAagAction',  '_route' => 'admin_club_importar_canchas_de_archivo_aag',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/cancha')) {
                    // admin_cancha
                    if (rtrim($pathinfo, '/') === '/admin/cancha') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_cancha');
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::indexAction',  '_route' => 'admin_cancha',);
                    }

                    // admin_cancha_show
                    if (preg_match('#^/admin/cancha/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cancha_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::showAction',));
                    }

                    // admin_cancha_new
                    if ($pathinfo === '/admin/cancha/new') {
                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::newAction',  '_route' => 'admin_cancha_new',);
                    }

                    // admin_cancha_create
                    if ($pathinfo === '/admin/cancha/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_cancha_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::createAction',  '_route' => 'admin_cancha_create',);
                    }
                    not_admin_cancha_create:

                    // admin_cancha_edit
                    if (preg_match('#^/admin/cancha/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cancha_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::editAction',));
                    }

                    // admin_cancha_update
                    if (preg_match('#^/admin/cancha/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_cancha_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cancha_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::updateAction',));
                    }
                    not_admin_cancha_update:

                    // admin_cancha_delete
                    if (preg_match('#^/admin/cancha/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_admin_cancha_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_cancha_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::deleteAction',));
                    }
                    not_admin_cancha_delete:

                }

            }

            if (0 === strpos($pathinfo, '/admin/t')) {
                if (0 === strpos($pathinfo, '/admin/torneo')) {
                    // admin_torneo
                    if (rtrim($pathinfo, '/') === '/admin/torneo') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_torneo');
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::indexAction',  '_route' => 'admin_torneo',);
                    }

                    // admin_torneo_show
                    if (preg_match('#^/admin/torneo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneo_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::showAction',));
                    }

                    // admin_torneo_new
                    if (0 === strpos($pathinfo, '/admin/torneo/new/temporada') && preg_match('#^/admin/torneo/new/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneo_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::newAction',));
                    }

                    // admin_torneo_create
                    if ($pathinfo === '/admin/torneo/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_torneo_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::createAction',  '_route' => 'admin_torneo_create',);
                    }
                    not_admin_torneo_create:

                    // admin_torneo_edit
                    if (preg_match('#^/admin/torneo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneo_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::editAction',));
                    }

                    // admin_torneo_update
                    if (preg_match('#^/admin/torneo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_torneo_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneo_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::updateAction',));
                    }
                    not_admin_torneo_update:

                    // admin_torneo_delete
                    if (preg_match('#^/admin/torneo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_admin_torneo_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneo_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::deleteAction',));
                    }
                    not_admin_torneo_delete:

                    if (0 === strpos($pathinfo, '/admin/torneofecha')) {
                        // admin_torneofecha
                        if (rtrim($pathinfo, '/') === '/admin/torneofecha') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_torneofecha');
                            }

                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::indexAction',  '_route' => 'admin_torneofecha',);
                        }

                        // admin_torneofecha_lista_jugadores_cargar_tarjetas
                        if (preg_match('#^/admin/torneofecha/(?P<id_torneo_fecha>[^/]++)/listaJugadoresCargarTarjetas$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_lista_jugadores_cargar_tarjetas')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::listaJugadoresCargarTarjetasAction',));
                        }

                        // admin_torneofecha_show
                        if (preg_match('#^/admin/torneofecha/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::showAction',));
                        }

                        // admin_torneofecha_new
                        if (0 === strpos($pathinfo, '/admin/torneofecha/new/torneo') && preg_match('#^/admin/torneofecha/new/torneo/(?P<id_torneo>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::newAction',));
                        }

                        // admin_torneofecha_create
                        if ($pathinfo === '/admin/torneofecha/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_admin_torneofecha_create;
                            }

                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::createAction',  '_route' => 'admin_torneofecha_create',);
                        }
                        not_admin_torneofecha_create:

                        // admin_torneofecha_edit
                        if (preg_match('#^/admin/torneofecha/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::editAction',));
                        }

                        // admin_torneofecha_update
                        if (preg_match('#^/admin/torneofecha/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_admin_torneofecha_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::updateAction',));
                        }
                        not_admin_torneofecha_update:

                        // admin_torneofecha_delete
                        if (preg_match('#^/admin/torneofecha/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                                $allow = array_merge($allow, array('POST', 'DELETE'));
                                goto not_admin_torneofecha_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::deleteAction',));
                        }
                        not_admin_torneofecha_delete:

                        // admin_torneofecha_habilitar_carga_tarjetas
                        if (preg_match('#^/admin/torneofecha/(?P<id_torneo_fecha>[^/]++)/habilitarCarga/(?P<habilitar>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_habilitar_carga_tarjetas')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::habilitarCargaTarjetasAction',));
                        }

                        // admin_torneofecha_comunicar_resultados_por_mail
                        if (preg_match('#^/admin/torneofecha/(?P<id_torneo_fecha>[^/]++)/comunicarResultadosPorMail$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_torneofecha_comunicar_resultados_por_mail')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::comunicarResultadosPorMailAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/tarjeta')) {
                    // admin_tarjeta
                    if (rtrim($pathinfo, '/') === '/admin/tarjeta') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_tarjeta');
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::indexAction',  '_route' => 'admin_tarjeta',);
                    }

                    // admin_tarjeta_show
                    if (preg_match('#^/admin/tarjeta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tarjeta_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::showAction',));
                    }

                    // admin_tarjeta_new
                    if (0 === strpos($pathinfo, '/admin/tarjeta/new/torneofechajugador') && preg_match('#^/admin/tarjeta/new/torneofechajugador/(?P<id_torneo_fecha_jugador>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tarjeta_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::newAction',));
                    }

                    // admin_tarjeta_create
                    if ($pathinfo === '/admin/tarjeta/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_tarjeta_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::createAction',  '_route' => 'admin_tarjeta_create',);
                    }
                    not_admin_tarjeta_create:

                    // admin_tarjeta_edit
                    if (preg_match('#^/admin/tarjeta/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tarjeta_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::editAction',));
                    }

                    // admin_tarjeta_update
                    if (preg_match('#^/admin/tarjeta/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_tarjeta_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tarjeta_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::updateAction',));
                    }
                    not_admin_tarjeta_update:

                    // admin_tarjeta_delete
                    if (preg_match('#^/admin/tarjeta/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_admin_tarjeta_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_tarjeta_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::deleteAction',));
                    }
                    not_admin_tarjeta_delete:

                }

            }

            if (0 === strpos($pathinfo, '/admin/circuito')) {
                // admin_circuito
                if (rtrim($pathinfo, '/') === '/admin/circuito') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_circuito');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::indexAction',  '_route' => 'admin_circuito',);
                }

                // admin_circuito_show
                if (preg_match('#^/admin/circuito/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_circuito_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::showAction',));
                }

                // admin_circuito_new
                if (0 === strpos($pathinfo, '/admin/circuito/new') && preg_match('#^/admin/circuito/new/(?P<id_institucion>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_circuito_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::newAction',));
                }

                // admin_circuito_create
                if ($pathinfo === '/admin/circuito/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_circuito_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::createAction',  '_route' => 'admin_circuito_create',);
                }
                not_admin_circuito_create:

                // admin_circuito_edit
                if (preg_match('#^/admin/circuito/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_circuito_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::editAction',));
                }

                // admin_circuito_update
                if (preg_match('#^/admin/circuito/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_circuito_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_circuito_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::updateAction',));
                }
                not_admin_circuito_update:

                // admin_circuito_delete
                if (preg_match('#^/admin/circuito/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_circuito_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_circuito_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::deleteAction',));
                }
                not_admin_circuito_delete:

            }

            if (0 === strpos($pathinfo, '/admin/temporada')) {
                // admin_temporada
                if (rtrim($pathinfo, '/') === '/admin/temporada') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_temporada');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::indexAction',  '_route' => 'admin_temporada',);
                }

                // admin_lista_temporada_por_circuito
                if (0 === strpos($pathinfo, '/admin/temporada/circuito') && preg_match('#^/admin/temporada/circuito/(?P<id_circuito>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_lista_temporada_por_circuito')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaPorCircuitoAction',));
                }

                // admin_temporada_show
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showAction',));
                }

                // admin_temporada_show_campeonatos
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/show/campeonatos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_campeonatos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showTorneosAction',));
                }

                // admin_temporada_show_torneos
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/show/torneos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_torneos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showTorneosAction',));
                }

                // admin_temporada_show_clubs
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/show/clubs$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_clubs')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showClubsAction',));
                }

                // admin_temporada_lista_torneo_fechas_en_inscripcion
                if (preg_match('#^/admin/temporada/(?P<id_temporada>[^/]++)/listaTorneoFechasEnInscripcion$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_lista_torneo_fechas_en_inscripcion')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaTorneoFechasEnInscripcionAction',));
                }

                // admin_temporada_lista_torneo_fechas_concluidas
                if (preg_match('#^/admin/temporada/(?P<id_temporada>[^/]++)/listaTorneoFechasConcluidas$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_lista_torneo_fechas_concluidas')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaTorneoFechasConcluidasAction',));
                }

                // admin_temporada_show_lista_buena_fe
                if (preg_match('#^/admin/temporada/(?P<id_temporada>[^/]++)/show/listaBuenaFe$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_lista_buena_fe')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showListaBuenaFeAction',));
                }

                // admin_temporada_show_lista_buena_fe_por_temporada_club
                if (preg_match('#^/admin/temporada/(?P<id_temporada>[^/]++)/show/listaBuenaFe/temporadaclub/(?P<id_temporada_club>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_lista_buena_fe_por_temporada_club')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showListaBuenaFeAction',));
                }

                // admin_temporada_show_lista_buena_fe_por_club
                if (preg_match('#^/admin/temporada/(?P<id_temporada>[^/]++)/show/listaBuenaFe/club/(?P<id_club>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_show_lista_buena_fe_por_club')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showListaBuenaFeAction',));
                }

                // admin_temporada_quitar_jugador_de_lista_buena_fe
                if (preg_match('#^/admin/temporada/(?P<id_temporada_club_jugador>[^/]++)/quitarJugadorDeListaBuenaFe$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_temporada_quitar_jugador_de_lista_buena_fe;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_quitar_jugador_de_lista_buena_fe')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::quitarJugadorDeListaBuenaFeAction',));
                }
                not_admin_temporada_quitar_jugador_de_lista_buena_fe:

                // admin_lista_buena_fe_new
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/listabuenafe/new/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_lista_buena_fe_new');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_lista_buena_fe_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::newListaBuenaFeAction',));
                }

                // admin_lista_buena_fe_importar
                if (preg_match('#^/admin/temporada/(?P<id>[^/]++)/listabuenafe/importar/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_lista_buena_fe_importar');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_lista_buena_fe_importar')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::importarListaBuenaFeAction',));
                }

                // admin_temporada_new_archivo_lista_buena_fe
                if (0 === strpos($pathinfo, '/admin/temporada/new_archivo_lista_buena_fe/temporada') && preg_match('#^/admin/temporada/new_archivo_lista_buena_fe/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_new_archivo_lista_buena_fe')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::newArchivoListaBuenaFeAction',));
                }

                // admin_temporada_upload_archivo_lista_buena_fe
                if ($pathinfo === '/admin/temporada/upload_archivo_lista_buena_fe') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::uploadArchivoListaBuenaFeAction',  '_route' => 'admin_temporada_upload_archivo_lista_buena_fe',);
                }

                // admin_temporada_importar_lista_buena_fe_de_archivo
                if (0 === strpos($pathinfo, '/admin/temporada/importar_archivo_lista_buena_fe/temporada') && preg_match('#^/admin/temporada/importar_archivo_lista_buena_fe/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_importar_lista_buena_fe_de_archivo')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::importarListaBuenaFeDeArchivoAction',));
                }

                // admin_temporada_new
                if (0 === strpos($pathinfo, '/admin/temporada/new/circuito') && preg_match('#^/admin/temporada/new/circuito/(?P<id_circuito>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::newAction',));
                }

                // admin_temporada_create
                if ($pathinfo === '/admin/temporada/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_temporada_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::createAction',  '_route' => 'admin_temporada_create',);
                }
                not_admin_temporada_create:

                // admin_temporada_edit
                if (preg_match('#^/admin/temporada/(?P<id>\\d+)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::editAction',));
                }

                // admin_temporada_update
                if (preg_match('#^/admin/temporada/(?P<id>\\d+)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_temporada_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::updateAction',));
                }
                not_admin_temporada_update:

                // admin_temporada_delete
                if (preg_match('#^/admin/temporada/(?P<id>\\d+)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_temporada_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::deleteAction',));
                }
                not_admin_temporada_delete:

                if (0 === strpos($pathinfo, '/admin/temporada/equipo')) {
                    // admin_temporada_formulario_jugadores_para_equipo
                    if (0 === strpos($pathinfo, '/admin/temporada/equipo/form_jugadores_equipo/torneofecha') && preg_match('#^/admin/temporada/equipo/form_jugadores_equipo/torneofecha/(?P<id_torneo_fecha>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_formulario_jugadores_para_equipo')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::formularioJugadoresParaEquipoAction',));
                    }

                    // admin_temporada_equipo_new
                    if (0 === strpos($pathinfo, '/admin/temporada/equipo/new/torneofecha') && preg_match('#^/admin/temporada/equipo/new/torneofecha/(?P<id_torneo_fecha>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_equipo_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::newEquipoAction',));
                    }

                    // admin_temporada_equipo_create
                    if ($pathinfo === '/admin/temporada/equipo/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_temporada_equipo_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::createEquipoAction',  '_route' => 'admin_temporada_equipo_create',);
                    }
                    not_admin_temporada_equipo_create:

                }

                // admin_temporada_lista_torneo_fechas_configurar_equipo
                if (preg_match('#^/admin/temporada/(?P<id_temporada>\\d+)/listaTorneoFechasConfigurarEquipo$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_lista_torneo_fechas_configurar_equipo')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaTorneoFechasConfigurarEquipoAction',));
                }

                if (0 === strpos($pathinfo, '/admin/temporada/equipo')) {
                    // admin_temporada_lista_equipos_por_torneo_fecha
                    if (0 === strpos($pathinfo, '/admin/temporada/equipo/listaPorTorneoFecha') && preg_match('#^/admin/temporada/equipo/listaPorTorneoFecha/(?P<id_torneo_fecha>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_lista_equipos_por_torneo_fecha')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaEquiposPorTorneoFechaAction',));
                    }

                    // admin_temporada_equipo_show
                    if (preg_match('#^/admin/temporada/equipo/(?P<id>\\d+)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_equipo_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showEquipoAction',));
                    }

                    // admin_temporada_equipo_edit
                    if (preg_match('#^/admin/temporada/equipo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_equipo_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::editEquipoAction',));
                    }

                    // admin_temporada_equipo_update
                    if (preg_match('#^/admin/temporada/equipo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_temporada_equipo_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_equipo_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::updateEquipoAction',));
                    }
                    not_admin_temporada_equipo_update:

                    // admin_temporada_equipo_delete
                    if (preg_match('#^/admin/temporada/equipo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_equipo_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::deleteEquipoAction',));
                    }

                }

                // admin_temporada_obtener_handicap_de_juego
                if (0 === strpos($pathinfo, '/admin/temporada/obtenerHandicapDeJuego') && preg_match('#^/admin/temporada/obtenerHandicapDeJuego/(?P<id_torneo_fecha>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporada_obtener_handicap_de_juego')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::obtenerHandicapDeJuegoAction',));
                }

                if (0 === strpos($pathinfo, '/admin/temporadaclub')) {
                    // admin_temporadaclub
                    if (rtrim($pathinfo, '/') === '/admin/temporadaclub') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'admin_temporadaclub');
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::indexAction',  '_route' => 'admin_temporadaclub',);
                    }

                    // admin_temporadaclub_show
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::showAction',));
                    }

                    // admin_temporadaclub_new
                    if (0 === strpos($pathinfo, '/admin/temporadaclub/new/temporada') && preg_match('#^/admin/temporadaclub/new/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::newAction',));
                    }

                    // admin_temporadaclub_create
                    if ($pathinfo === '/admin/temporadaclub/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_admin_temporadaclub_create;
                        }

                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::createAction',  '_route' => 'admin_temporadaclub_create',);
                    }
                    not_admin_temporadaclub_create:

                    // admin_temporadaclub_edit
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::editAction',));
                    }

                    // admin_temporadaclub_update
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_temporadaclub_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::updateAction',));
                    }
                    not_admin_temporadaclub_update:

                    // admin_temporadaclub_delete
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::deleteAction',));
                    }

                    // admin_temporadaclub_lista_capitanes
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/listaCapitanes$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_lista_capitanes')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::listaCapitanesAction',));
                    }

                    // admin_temporadaclub_quitar_capitan
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/quitarCapitan/capitan/(?P<id_usuario_capitan>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_quitar_capitan')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::quitarCapitanAction',));
                    }

                    // admin_temporadaclub_agregar_capitan
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/agregarCapitan$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_admin_temporadaclub_agregar_capitan;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_agregar_capitan')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::agregarCapitanAction',));
                    }
                    not_admin_temporadaclub_agregar_capitan:

                    // admin_temporadaclub_elegir_nuevo_capitan
                    if (preg_match('#^/admin/temporadaclub/(?P<id>[^/]++)/elegirNuevoCapitan$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclub_elegir_nuevo_capitan')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubController::elegirNuevoCapitanAction',));
                    }

                    if (0 === strpos($pathinfo, '/admin/temporadaclubjugador')) {
                        // admin_temporadaclubjugador
                        if (rtrim($pathinfo, '/') === '/admin/temporadaclubjugador') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'admin_temporadaclubjugador');
                            }

                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::indexAction',  '_route' => 'admin_temporadaclubjugador',);
                        }

                        // admin_temporadaclubjugador_show
                        if (preg_match('#^/admin/temporadaclubjugador/(?P<id>\\d+)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclubjugador_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::showAction',));
                        }

                        // admin_temporadaclubjugador_new
                        if (0 === strpos($pathinfo, '/admin/temporadaclubjugador/new/temporadaclub') && preg_match('#^/admin/temporadaclubjugador/new/temporadaclub/(?P<id_temporada_club>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclubjugador_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::newAction',));
                        }

                        // admin_temporadaclubjugador_create
                        if ($pathinfo === '/admin/temporadaclubjugador/create') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_admin_temporadaclubjugador_create;
                            }

                            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::createAction',  '_route' => 'admin_temporadaclubjugador_create',);
                        }
                        not_admin_temporadaclubjugador_create:

                        // admin_temporadaclubjugador_edit
                        if (preg_match('#^/admin/temporadaclubjugador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclubjugador_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::editAction',));
                        }

                        // admin_temporadaclubjugador_update
                        if (preg_match('#^/admin/temporadaclubjugador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                                $allow = array_merge($allow, array('POST', 'PUT'));
                                goto not_admin_temporadaclubjugador_update;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclubjugador_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::updateAction',));
                        }
                        not_admin_temporadaclubjugador_update:

                        // admin_temporadaclubjugador_delete
                        if (preg_match('#^/admin/temporadaclubjugador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                                $allow = array_merge($allow, array('POST', 'DELETE'));
                                goto not_admin_temporadaclubjugador_delete;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_temporadaclubjugador_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaClubJugadorController::deleteAction',));
                        }
                        not_admin_temporadaclubjugador_delete:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/documento')) {
                // admin_documento
                if (rtrim($pathinfo, '/') === '/admin/documento') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_documento');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::indexAction',  '_route' => 'admin_documento',);
                }

                // admin_documento_show
                if (preg_match('#^/admin/documento/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_documento_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::showAction',));
                }

                // admin_documento_new
                if ($pathinfo === '/admin/documento/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::newAction',  '_route' => 'admin_documento_new',);
                }

                // admin_documento_create
                if ($pathinfo === '/admin/documento/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_documento_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::createAction',  '_route' => 'admin_documento_create',);
                }
                not_admin_documento_create:

                // admin_documento_edit
                if (preg_match('#^/admin/documento/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_documento_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::editAction',));
                }

                // admin_documento_update
                if (preg_match('#^/admin/documento/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_documento_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_documento_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::updateAction',));
                }
                not_admin_documento_update:

                // admin_documento_delete
                if (preg_match('#^/admin/documento/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_documento_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_documento_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::deleteAction',));
                }
                not_admin_documento_delete:

                // admin_documento_upload_por_ajax
                if ($pathinfo === '/admin/documento/upload_por_ajax') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::uploadPorAjaxAction',  '_route' => 'admin_documento_upload_por_ajax',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/jugador')) {
                // admin_jugador
                if (rtrim($pathinfo, '/') === '/admin/jugador') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_jugador');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::indexAction',  '_route' => 'admin_jugador',);
                }

                // admin_jugador_show
                if (preg_match('#^/admin/jugador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_jugador_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::showAction',));
                }

                // admin_jugador_new
                if ($pathinfo === '/admin/jugador/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::newAction',  '_route' => 'admin_jugador_new',);
                }

                // admin_jugador_create
                if ($pathinfo === '/admin/jugador/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_jugador_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::createAction',  '_route' => 'admin_jugador_create',);
                }
                not_admin_jugador_create:

                // admin_jugador_edit
                if (preg_match('#^/admin/jugador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_jugador_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::editAction',));
                }

                // admin_jugador_update
                if (preg_match('#^/admin/jugador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_jugador_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_jugador_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::updateAction',));
                }
                not_admin_jugador_update:

                // admin_jugador_delete
                if (preg_match('#^/admin/jugador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_jugador_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_jugador_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::deleteAction',));
                }
                not_admin_jugador_delete:

                // admin_jugador_new_archivo_aag
                if ($pathinfo === '/admin/jugador/new_archivo_aag') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::newArchivoAagAction',  '_route' => 'admin_jugador_new_archivo_aag',);
                }

                // admin_jugador_upload_archivo_aag
                if ($pathinfo === '/admin/jugador/upload_archivo_aag') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::uploadArchivoAagAction',  '_route' => 'admin_jugador_upload_archivo_aag',);
                }

                // admin_jugador_importar_de_archivo_aag
                if ($pathinfo === '/admin/jugador/importar_archivo_aag') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::importarArchivoAagAction',  '_route' => 'admin_jugador_importar_de_archivo_aag',);
                }

                // admin_jugador_new_archivo_actualizacion_hcp_y_tarjetas
                if ($pathinfo === '/admin/jugador/newArchivoActualizacionHcpYTarjetas') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::newArchivoActualizacionHcpYTarjetasAction',  '_route' => 'admin_jugador_new_archivo_actualizacion_hcp_y_tarjetas',);
                }

                // admin_jugador_importar_hcp_y_tarjetas_de_archivo
                if ($pathinfo === '/admin/jugador/importarHcpYTarjetasDeArchivo') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::importarHcpYTarjetasDeArchivoAction',  '_route' => 'admin_jugador_importar_hcp_y_tarjetas_de_archivo',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/equipo')) {
                // admin_equipo
                if (rtrim($pathinfo, '/') === '/admin/equipo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_equipo');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::indexAction',  '_route' => 'admin_equipo',);
                }

                // admin_equipo_show
                if (preg_match('#^/admin/equipo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_equipo_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::showAction',));
                }

                // admin_equipo_new
                if (0 === strpos($pathinfo, '/admin/equipo/new/torneofecha') && preg_match('#^/admin/equipo/new/torneofecha/(?P<id_torneo_fecha>[^/]++)/club/(?P<id_club>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_equipo_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::newAction',));
                }

                // admin_equipo_create
                if ($pathinfo === '/admin/equipo/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_equipo_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::createAction',  '_route' => 'admin_equipo_create',);
                }
                not_admin_equipo_create:

                // admin_equipo_edit
                if (preg_match('#^/admin/equipo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_equipo_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::editAction',));
                }

                // admin_equipo_update
                if (preg_match('#^/admin/equipo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_equipo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_equipo_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::updateAction',));
                }
                not_admin_equipo_update:

                // admin_equipo_delete
                if (preg_match('#^/admin/equipo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_equipo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_equipo_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\EquipoController::deleteAction',));
                }
                not_admin_equipo_delete:

            }

            if (0 === strpos($pathinfo, '/admin/campeonato')) {
                // admin_campeonato
                if (rtrim($pathinfo, '/') === '/admin/campeonato') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_campeonato');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::indexAction',  '_route' => 'admin_campeonato',);
                }

                // admin_campeonatos_por_temporada
                if (0 === strpos($pathinfo, '/admin/campeonato/temporada') && preg_match('#^/admin/campeonato/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonatos_por_temporada')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::listaPorTemporadaAction',));
                }

                // admin_campeonato_show
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::showAction',));
                }

                // admin_campeonato_new
                if (0 === strpos($pathinfo, '/admin/campeonato/new/temporada') && preg_match('#^/admin/campeonato/new/temporada/(?P<id_temporada>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::newAction',));
                }

                // admin_campeonato_create
                if ($pathinfo === '/admin/campeonato/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_campeonato_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::createAction',  '_route' => 'admin_campeonato_create',);
                }
                not_admin_campeonato_create:

                // admin_campeonato_edit
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::editAction',));
                }

                // admin_campeonato_update
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_campeonato_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::updateAction',));
                }
                not_admin_campeonato_update:

                // admin_campeonato_delete
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_campeonato_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::deleteAction',));
                }
                not_admin_campeonato_delete:

                // admin_campeonato_seleccionar_campeonatos
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/seleccionarCampeonatos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_seleccionar_campeonatos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::seleccionarCampeonatosAction',));
                }

                // admin_campeonato_seleccionar_torneos
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/seleccionarTorneos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_seleccionar_torneos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::seleccionarTorneosAction',));
                }

                // admin_campeonato_adjuntar_campeonatos
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/adjuntarCampeonatos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_adjuntar_campeonatos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::adjuntarCampeonatosAction',));
                }

                // admin_campeonato_adjuntar_torneos
                if (preg_match('#^/admin/campeonato/(?P<id>[^/]++)/adjuntarTorneos$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_campeonato_adjuntar_torneos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::adjuntarTorneosAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/user')) {
                // admin_user
                if (rtrim($pathinfo, '/') === '/admin/user') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'admin_user');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::indexAction',  '_route' => 'admin_user',);
                }

                // admin_user_show
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::showAction',));
                }

                // admin_user_new
                if ($pathinfo === '/admin/user/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::newAction',  '_route' => 'admin_user_new',);
                }

                // admin_user_create
                if ($pathinfo === '/admin/user/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_admin_user_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::createAction',  '_route' => 'admin_user_create',);
                }
                not_admin_user_create:

                // admin_user_edit
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::editAction',));
                }

                // admin_user_update
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_admin_user_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::updateAction',));
                }
                not_admin_user_update:

                // admin_user_delete
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_admin_user_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::deleteAction',));
                }
                not_admin_user_delete:

                // admin_user_elegir_perfiles
                if (preg_match('#^/admin/user/(?P<id>[^/]++)/elegirPerfiles$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_user_elegir_perfiles')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::elegirPerfilesAction',));
                }

                // admin_user_asignar_perfiles
                if ($pathinfo === '/admin/user/asignarPerfiles') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::asignarPerfilesAction',  '_route' => 'admin_user_asignar_perfiles',);
                }

            }

            // crear_perfiles
            if ($pathinfo === '/admin/crear/perfiles') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DefaultController::crearPerfilesAction',  '_route' => 'crear_perfiles',);
            }

        }

        // golf_en_la_nube_homepage
        if ($pathinfo === '/golf') {
            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DefaultController::indexAction',  '_route' => 'golf_en_la_nube_homepage',);
        }

        if (0 === strpos($pathinfo, '/institucion')) {
            // institucion
            if (rtrim($pathinfo, '/') === '/institucion') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'institucion');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::indexAction',  '_route' => 'institucion',);
            }

            // institucion_show
            if (preg_match('#^/institucion/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::showAction',));
            }

            // institucion_new
            if ($pathinfo === '/institucion/new') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::newAction',  '_route' => 'institucion_new',);
            }

            // institucion_create
            if ($pathinfo === '/institucion/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_institucion_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::createAction',  '_route' => 'institucion_create',);
            }
            not_institucion_create:

            // institucion_edit
            if (preg_match('#^/institucion/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::editAction',));
            }

            // institucion_update
            if (preg_match('#^/institucion/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_institucion_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::updateAction',));
            }
            not_institucion_update:

            // institucion_delete
            if (preg_match('#^/institucion/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_institucion_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'institucion_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\InstitucionController::deleteAction',));
            }
            not_institucion_delete:

        }

        if (0 === strpos($pathinfo, '/formatojuego')) {
            // formatojuego
            if (rtrim($pathinfo, '/') === '/formatojuego') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'formatojuego');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::indexAction',  '_route' => 'formatojuego',);
            }

            // formatojuego_show
            if (preg_match('#^/formatojuego/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'formatojuego_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::showAction',));
            }

            // formatojuego_new
            if ($pathinfo === '/formatojuego/new') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::newAction',  '_route' => 'formatojuego_new',);
            }

            // formatojuego_create
            if ($pathinfo === '/formatojuego/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_formatojuego_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::createAction',  '_route' => 'formatojuego_create',);
            }
            not_formatojuego_create:

            // formatojuego_edit
            if (preg_match('#^/formatojuego/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'formatojuego_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::editAction',));
            }

            // formatojuego_update
            if (preg_match('#^/formatojuego/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_formatojuego_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'formatojuego_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::updateAction',));
            }
            not_formatojuego_update:

            // formatojuego_delete
            if (preg_match('#^/formatojuego/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_formatojuego_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'formatojuego_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\FormatoJuegoController::deleteAction',));
            }
            not_formatojuego_delete:

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/club')) {
                // club
                if (rtrim($pathinfo, '/') === '/club') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'club');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::indexAction',  '_route' => 'club',);
                }

                // club_show
                if (preg_match('#^/club/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'club_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::showAction',));
                }

                // club_new
                if ($pathinfo === '/club/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::newAction',  '_route' => 'club_new',);
                }

                // club_create
                if ($pathinfo === '/club/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_club_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::createAction',  '_route' => 'club_create',);
                }
                not_club_create:

                // club_edit
                if (preg_match('#^/club/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'club_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::editAction',));
                }

                // club_update
                if (preg_match('#^/club/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_club_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'club_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::updateAction',));
                }
                not_club_update:

                // club_delete
                if (preg_match('#^/club/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_club_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'club_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::deleteAction',));
                }
                not_club_delete:

                if (0 === strpos($pathinfo, '/club/importar_')) {
                    // club_importar_de_archivo_aag
                    if ($pathinfo === '/club/importar_archivo_aag') {
                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::importarArchivoAagAction',  '_route' => 'club_importar_de_archivo_aag',);
                    }

                    // club_importar_canchas_de_archivo_aag
                    if ($pathinfo === '/club/importar_canchas_archivo_aag') {
                        return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\ClubController::importarCanchasArchivoAagAction',  '_route' => 'club_importar_canchas_de_archivo_aag',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/cancha')) {
                // cancha
                if (rtrim($pathinfo, '/') === '/cancha') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'cancha');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::indexAction',  '_route' => 'cancha',);
                }

                // cancha_show
                if (preg_match('#^/cancha/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cancha_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::showAction',));
                }

                // cancha_new
                if ($pathinfo === '/cancha/new') {
                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::newAction',  '_route' => 'cancha_new',);
                }

                // cancha_create
                if ($pathinfo === '/cancha/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_cancha_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::createAction',  '_route' => 'cancha_create',);
                }
                not_cancha_create:

                // cancha_edit
                if (preg_match('#^/cancha/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cancha_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::editAction',));
                }

                // cancha_update
                if (preg_match('#^/cancha/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_cancha_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cancha_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::updateAction',));
                }
                not_cancha_update:

                // cancha_delete
                if (preg_match('#^/cancha/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_cancha_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cancha_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CanchaController::deleteAction',));
                }
                not_cancha_delete:

            }

        }

        if (0 === strpos($pathinfo, '/t')) {
            if (0 === strpos($pathinfo, '/torneo')) {
                // torneo_show
                if (preg_match('#^/torneo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneo_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoController::showAction',));
                }

                if (0 === strpos($pathinfo, '/torneofecha')) {
                    // torneofecha
                    if (0 === strpos($pathinfo, '/torneofecha/torneo') && preg_match('#^/torneofecha/torneo/(?P<id_torneo>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneofecha')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::listaPorTorneoAction',));
                    }

                    // torneofecha_show_fecha
                    if (preg_match('#^/torneofecha/(?P<id>[^/]++)/show/fechaResultados$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneofecha_show_fecha')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::showFechaResultadosAction',));
                    }

                    // torneofecha_show_resultados_por_club
                    if (preg_match('#^/torneofecha/(?P<id>[^/]++)/show/resultadosPorClub$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneofecha_show_resultados_por_club')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::showResultadosPorClubAction',));
                    }

                    // torneofecha_show_resultados_por_neto_jugador
                    if (preg_match('#^/torneofecha/(?P<id>[^/]++)/show/resultadosPorNetoJugador$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneofecha_show_resultados_por_neto_jugador')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::showResultadosPorNetoJugadorAction',));
                    }

                    // torneofecha_show_juadores
                    if (preg_match('#^/torneofecha/(?P<id>[^/]++)/show/jugadores$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'torneofecha_show_juadores')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TorneoFechaController::showJugadoresAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/tarjeta')) {
                // tarjeta
                if (rtrim($pathinfo, '/') === '/tarjeta') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'tarjeta');
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::indexAction',  '_route' => 'tarjeta',);
                }

                // tarjeta_show
                if (preg_match('#^/tarjeta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarjeta_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::showAction',));
                }

                // tarjeta_new
                if (0 === strpos($pathinfo, '/tarjeta/new') && preg_match('#^/tarjeta/new/(?P<id_torneo_fecha>[^/]++)/(?P<id_jugador>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarjeta_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::newAction',));
                }

                // tarjeta_create
                if ($pathinfo === '/tarjeta/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_tarjeta_create;
                    }

                    return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::createAction',  '_route' => 'tarjeta_create',);
                }
                not_tarjeta_create:

                // tarjeta_edit
                if (preg_match('#^/tarjeta/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarjeta_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::editAction',));
                }

                // tarjeta_update
                if (preg_match('#^/tarjeta/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_tarjeta_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarjeta_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::updateAction',));
                }
                not_tarjeta_update:

                // tarjeta_delete
                if (preg_match('#^/tarjeta/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_tarjeta_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'tarjeta_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TarjetaController::deleteAction',));
                }
                not_tarjeta_delete:

            }

        }

        if (0 === strpos($pathinfo, '/circuito')) {
            // circuito
            if (rtrim($pathinfo, '/') === '/circuito') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'circuito');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::indexAction',  '_route' => 'circuito',);
            }

            // circuito_show
            if (preg_match('#^/circuito/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'circuito_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::showAction',));
            }

            // circuito_new
            if (0 === strpos($pathinfo, '/circuito/new') && preg_match('#^/circuito/new/(?P<id_institucion>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'circuito_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::newAction',));
            }

            // circuito_create
            if ($pathinfo === '/circuito/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_circuito_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::createAction',  '_route' => 'circuito_create',);
            }
            not_circuito_create:

            // circuito_edit
            if (preg_match('#^/circuito/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'circuito_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::editAction',));
            }

            // circuito_update
            if (preg_match('#^/circuito/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_circuito_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'circuito_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::updateAction',));
            }
            not_circuito_update:

            // circuito_delete
            if (preg_match('#^/circuito/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_circuito_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'circuito_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CircuitoController::deleteAction',));
            }
            not_circuito_delete:

        }

        if (0 === strpos($pathinfo, '/temporada')) {
            // temporada
            if (rtrim($pathinfo, '/') === '/temporada') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'temporada');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::indexAction',  '_route' => 'temporada',);
            }

            // temporada_lista_por_circuito
            if (preg_match('#^/temporada/(?P<id_circuito>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_lista_por_circuito')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::listaPorCircuitoAction',));
            }

            // temporada_show
            if (preg_match('#^/temporada/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showAction',));
            }

            // temporada_show_torneos
            if (preg_match('#^/temporada/(?P<id>[^/]++)/show/torneos$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_show_torneos')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showTorneosAction',));
            }

            // temporada_show_clubs
            if (preg_match('#^/temporada/(?P<id>[^/]++)/show/clubs$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_show_clubs')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showClubsAction',));
            }

            // temporada_show_jugadores
            if (preg_match('#^/temporada/(?P<id>[^/]++)/show/jugadores$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_show_jugadores')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::showJugadoresAction',));
            }

            // temporada_new
            if (0 === strpos($pathinfo, '/temporada/new') && preg_match('#^/temporada/new/(?P<id_circuito>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_new')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::newAction',));
            }

            // temporada_create
            if ($pathinfo === '/temporada/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_temporada_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::createAction',  '_route' => 'temporada_create',);
            }
            not_temporada_create:

            // temporada_edit
            if (preg_match('#^/temporada/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::editAction',));
            }

            // temporada_update
            if (preg_match('#^/temporada/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_temporada_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::updateAction',));
            }
            not_temporada_update:

            // temporada_delete
            if (preg_match('#^/temporada/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_temporada_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'temporada_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\TemporadaController::deleteAction',));
            }
            not_temporada_delete:

        }

        if (0 === strpos($pathinfo, '/documento')) {
            // documento
            if (rtrim($pathinfo, '/') === '/documento') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'documento');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::indexAction',  '_route' => 'documento',);
            }

            // documento_show
            if (preg_match('#^/documento/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'documento_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::showAction',));
            }

            // documento_new
            if ($pathinfo === '/documento/new') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::newAction',  '_route' => 'documento_new',);
            }

            // documento_create
            if ($pathinfo === '/documento/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_documento_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::createAction',  '_route' => 'documento_create',);
            }
            not_documento_create:

            // documento_edit
            if (preg_match('#^/documento/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'documento_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::editAction',));
            }

            // documento_update
            if (preg_match('#^/documento/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_documento_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'documento_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::updateAction',));
            }
            not_documento_update:

            // documento_delete
            if (preg_match('#^/documento/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_documento_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'documento_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DocumentoController::deleteAction',));
            }
            not_documento_delete:

        }

        if (0 === strpos($pathinfo, '/jugador')) {
            // jugador
            if (rtrim($pathinfo, '/') === '/jugador') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'jugador');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::indexAction',  '_route' => 'jugador',);
            }

            // jugador_show
            if (preg_match('#^/jugador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::showAction',));
            }

            // jugador_new
            if ($pathinfo === '/jugador/new') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::newAction',  '_route' => 'jugador_new',);
            }

            // jugador_create
            if ($pathinfo === '/jugador/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_jugador_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::createAction',  '_route' => 'jugador_create',);
            }
            not_jugador_create:

            // jugador_edit
            if (preg_match('#^/jugador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::editAction',));
            }

            // jugador_update
            if (preg_match('#^/jugador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_jugador_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::updateAction',));
            }
            not_jugador_update:

            // jugador_delete
            if (preg_match('#^/jugador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_jugador_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::deleteAction',));
            }
            not_jugador_delete:

            // jugador_importar_de_archivo_aag
            if ($pathinfo === '/jugador/importar_archivo_aag') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::importarArchivoAagAction',  '_route' => 'jugador_importar_de_archivo_aag',);
            }

            // jugador_lista_tarjetas_en_circuito
            if (preg_match('#^/jugador/(?P<id>[^/]++)/listaTarjetasEnCircuito/circuito/(?P<id_circuito>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_lista_tarjetas_en_circuito')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\JugadorController::listaTarjetasEnCircuitoAction',));
            }

        }

        if (0 === strpos($pathinfo, '/campeonato')) {
            // campeonato
            if (rtrim($pathinfo, '/') === '/campeonato') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'campeonato');
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::indexAction',  '_route' => 'campeonato',);
            }

            // campeonato_show
            if (preg_match('#^/campeonato/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campeonato_show')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::showAction',));
            }

            // campeonato_new
            if ($pathinfo === '/campeonato/new') {
                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::newAction',  '_route' => 'campeonato_new',);
            }

            // campeonato_create
            if ($pathinfo === '/campeonato/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_campeonato_create;
                }

                return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::createAction',  '_route' => 'campeonato_create',);
            }
            not_campeonato_create:

            // campeonato_edit
            if (preg_match('#^/campeonato/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campeonato_edit')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::editAction',));
            }

            // campeonato_update
            if (preg_match('#^/campeonato/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_campeonato_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campeonato_update')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::updateAction',));
            }
            not_campeonato_update:

            // campeonato_delete
            if (preg_match('#^/campeonato/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_campeonato_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campeonato_delete')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::deleteAction',));
            }
            not_campeonato_delete:

            // campeonato_tabla_de_posiciones
            if (preg_match('#^/campeonato/(?P<id>[^/]++)/tablaDePosiciones$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'campeonato_tabla_de_posiciones')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\CampeonatoController::tablaDePosicionesAction',));
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_edit_datos_personales
            if (preg_match('#^/user/(?P<id>[^/]++)/editDatosPersonales$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit_datos_personales')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::editDatosPersonalesAction',));
            }

            // user_update_datos_personales
            if (preg_match('#^/user/(?P<id>[^/]++)/updateDatosPersonales$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update_datos_personales')), array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::updateDatosPersonalesAction',));
            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\UserController::homeAction',  '_route' => '_welcome',);
        }

        // _home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DefaultController::homeAction',  '_route' => '_home',);
        }

        // _test
        if ($pathinfo === '/test') {
            return array (  '_controller' => 'Par3\\GolfEnLaNubeBundle\\Controller\\DefaultController::testAction',  '_route' => '_test',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/group')) {
            // fos_user_group_list
            if ($pathinfo === '/group/list') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_list;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
            }
            not_fos_user_group_list:

            // fos_user_group_new
            if ($pathinfo === '/group/new') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
            }

            // fos_user_group_show
            if (preg_match('#^/group/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
            }
            not_fos_user_group_show:

            // fos_user_group_edit
            if (preg_match('#^/group/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
            }

            // fos_user_group_delete
            if (preg_match('#^/group/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_group_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
            }
            not_fos_user_group_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
