<?php

/* GolfEnLaNubeBundle:TorneoFecha:showFechaResultados.html.twig */
class __TwigTemplate_65912c138054e1f7a110eb33376e9c26bf2ad1c35c092edac19dcc2a8113f3ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GolfEnLaNubeBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "<style> 
\ttr.totales_jugador:hover {
\t\tcursor:pointer;
\t\tcolor: #428BCA; 
\t}
</style>
";
    }

    // line 12
    public function block_page_header($context, array $blocks = array())
    {
        // line 13
        echo "<h3>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "nombre"), "html", null, true);
        echo ", (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cancha"), "club"), "nombre"), "html", null, true);
        echo ")</h3>
\t<h4>Circuito ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "temporada"), "circuito"), "nombre"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fecha"), "d/m/Y"), "html", null, true);
        echo ") <small> - </small>Temporada ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "temporada"), "nombre"), "html", null, true);
        echo "</h4>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        if (($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "dias") > 1)) {
            echo " 
        <div class='row '>
\t\t<div class='col-lg-12'>
\t\t
\t\t\t<ul id='resultados' class=\"nav nav-tabs\">
\t\t\t  <li class=\"active\"><a href=\"#jugadores\" data-toggle=\"tab\">Jugadores</a></li>
                          ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "dias")));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 25
                echo "                            <li><a href=\"#dia";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "\" data-toggle=\"tab\">Dia ";
                echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                echo "</a></li>
\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "  \t\t\t  <li><a href=\"#resultados-finales\" data-toggle=\"tab\">Resultados Finales</a></li>
  \t\t\t  <li><a href=\"#puntajes\" data-toggle=\"tab\">Distribuci&oacute;n de puntos</a></li>
\t\t\t</ul>

\t\t\t<!-- Tab panes -->
\t\t\t<div class=\"tab-content\">
\t\t\t\t";
            // line 33
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofechajugadores")) > 0)) {
                // line 34
                echo "\t\t\t  <div class=\"tab-pane active\" id=\"jugadores\">";
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showJugadores", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
                          ";
                // line 35
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "dias")));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 36
                    echo "                            <div class=\"tab-pane\" id=\"dia";
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">
                                <ul id='resultados-multidia-dia";
                    // line 37
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "' class=\"nav nav-tabs\">
                                  <li class=\"active\"><a href=\"#resultados-netos-individuales-dia";
                    // line 38
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\" data-toggle=\"tab\">Netos Individuales</a></li>
                                  <li><a href=\"#resultados-club-neto-dia";
                    // line 39
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\" data-toggle=\"tab\">Resultados por Club Neto</a></li>
                                  <li><a href=\"#resultados-gross-individuales-dia";
                    // line 40
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\" data-toggle=\"tab\">Gross Individuales</a></li>
                                  <li><a href=\"#resultados-club-gross-dia";
                    // line 41
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\" data-toggle=\"tab\">Resultados por Club Gross</a></li>
                                </ul>
                                <div class=\"tab-content\">
                                  <div class=\"tab-pane active\" id=\"resultados-netos-individuales-dia";
                    // line 44
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorNetoJugador", array("id" => $this->getAttribute((isset($context["ids_torneo_fecha"]) ? $context["ids_torneo_fecha"] : $this->getContext($context, "ids_torneo_fecha")), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1), array(), "array"))));
                    echo "</div>
                                  <div class=\"tab-pane\" id=\"resultados-club-neto-dia";
                    // line 45
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub", array("id" => $this->getAttribute((isset($context["ids_torneo_fecha"]) ? $context["ids_torneo_fecha"] : $this->getContext($context, "ids_torneo_fecha")), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1), array(), "array"))));
                    echo "</div>
                                  <div class=\"tab-pane\" id=\"resultados-gross-individuales-dia";
                    // line 46
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorGrossJugador", array("id" => $this->getAttribute((isset($context["ids_torneo_fecha"]) ? $context["ids_torneo_fecha"] : $this->getContext($context, "ids_torneo_fecha")), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1), array(), "array"))));
                    echo "</div>
                                  <div class=\"tab-pane\" id=\"resultados-club-gross-dia";
                    // line 47
                    echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub", array("id" => $this->getAttribute((isset($context["ids_torneo_fecha"]) ? $context["ids_torneo_fecha"] : $this->getContext($context, "ids_torneo_fecha")), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1), array(), "array"))));
                    echo "</div>
                                </div>

                            </div>
\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                echo "\t\t\t  <div class=\"tab-pane\" id=\"resultados-finales\">
                                <ul id='resultados-finales-multidia' class=\"nav nav-tabs\">
                                  <li class=\"active\"><a href=\"#resultados-netos-individuales\" data-toggle=\"tab\">Netos Individuales</a></li>
                                  <li><a href=\"#resultados-club-neto\" data-toggle=\"tab\">Resultados por Club Neto</a></li>
                                  <li><a href=\"#resultados-gross-individuales\" data-toggle=\"tab\">Gross Individuales</a></li>
                                  <li><a href=\"#resultados-club-gross\" data-toggle=\"tab\">Resultados por Club Gross</a></li>
                                </ul>
                              
                              <div class=\"tab-content\">
                                  <div class=\"tab-pane active\" id=\"resultados-netos-individuales\">";
                // line 61
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorNetoJugador", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
                                  <div class=\"tab-pane\" id=\"resultados-club-neto\"></div>
                                  <div class=\"tab-pane\" id=\"resultados-gross-individuales\">";
                // line 63
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorGrossJugador", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
                                  <div class=\"tab-pane\" id=\"resultados-club-gross\"></div>
                              </div>
                          </div>
                          

\t\t\t  <div class=\"tab-pane\" id=\"puntajes\">";
                // line 69
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showDistribucionDePuntos", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  \t";
            } else {
                // line 71
                echo "\t\t\t  \t <h4>No se han cargado datos para este torneo aún</h4>
\t\t\t\t";
            }
            // line 73
            echo "\t\t\t</div>
\t\t</div>
\t</div>
        ";
        } else {
            // line 76
            echo " 
\t<div class='row '>
\t\t<div class='col-lg-12'>
\t\t
\t\t\t<ul id='resultados' class=\"nav nav-tabs\">
\t\t\t  <li class=\"active\"><a href=\"#jugadores\" data-toggle=\"tab\">Jugadores</a></li>
\t\t\t  <li><a href=\"#neto\" data-toggle=\"tab\">Netos Individuales</a></li>
\t\t\t  <li><a href=\"#gross\" data-toggle=\"tab\">Gross Individuales</a></li>
  \t\t\t  <li><a href=\"#club\" data-toggle=\"tab\">Resultados por Club</a></li>
  \t\t\t  <li><a href=\"#puntajes\" data-toggle=\"tab\">Distribuci&oacute;n de puntos</a></li>
\t\t\t</ul>

\t\t\t<!-- Tab panes -->
\t\t\t<div class=\"tab-content\">
\t\t\t\t";
            // line 90
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofechajugadores")) > 0)) {
                // line 91
                echo "\t\t\t  <div class=\"tab-pane active\" id=\"jugadores\">";
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showJugadores", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  <div class=\"tab-pane\" id=\"neto\">";
                // line 92
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorNetoJugador", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  <div class=\"tab-pane\" id=\"gross\">";
                // line 93
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorGrossJugador", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  <div class=\"tab-pane\" id=\"club\">";
                // line 94
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  <div class=\"tab-pane\" id=\"puntajes\">";
                // line 95
                echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("GolfEnLaNubeBundle:TorneoFecha:showDistribucionDePuntos", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))));
                echo "</div>
\t\t\t  \t";
            } else {
                // line 97
                echo "\t\t\t  \t <h4>No se han cargado datos para este torneo aún</h4>
\t\t\t\t";
            }
            // line 99
            echo "\t\t\t</div>
\t\t</div>
\t</div>

\t\t
\t<div class=\"modal fade \" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\">
\t  <div class=\"modal-dialog\">
\t    <div class=\"modal-content\">

\t    </div>
\t  </div>
\t</div>
\t";
        }
    }

    // line 114
    public function block_javascripts($context, array $blocks = array())
    {
        // line 115
        echo "<script type=\"text/javascript\">

\t\$('#resultados a').click(function (e) {
\t  e.preventDefault()
\t  \$(this).tab('show')
\t});

\tfunction toggleDetallesHoyoxhoyo(id_tarjeta)
\t{
\t\tvar tr_detalles = \$('.detalles_hoyoxhoyo[data-id-tarjeta=' + id_tarjeta + ']');

\t\t\$(tr_detalles).toggle();
\t\t//if ( \$(tr_detalles).hasClass('hidden') ) \$(tr_detalles).removeClass('hidden');
\t\t//else \$(tr_detalles).addClass('hidden'); 
\t}
\t
\t\$(document).on('click', '.totales_jugador',  function () {
\t\t\tvar id_tarjeta = \$(this).attr('data-id-tarjeta');
\t\t\ttoggleDetallesHoyoxhoyo(id_tarjeta);
\t});
\t\t
</script>


";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showFechaResultados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 115,  269 => 114,  252 => 99,  248 => 97,  243 => 95,  239 => 94,  235 => 93,  231 => 92,  226 => 91,  224 => 90,  208 => 76,  202 => 73,  198 => 71,  193 => 69,  184 => 63,  179 => 61,  168 => 52,  155 => 47,  149 => 46,  143 => 45,  137 => 44,  131 => 41,  127 => 40,  123 => 39,  119 => 38,  115 => 37,  110 => 36,  106 => 35,  101 => 34,  99 => 33,  91 => 27,  80 => 25,  76 => 24,  67 => 18,  64 => 17,  54 => 14,  47 => 13,  44 => 12,  34 => 4,  31 => 3,);
    }
}
