<?php

/* GolfEnLaNubeBundle:Temporada:equipo/listaTorneoFechasConfigurarEquipo.html.twig */
class __TwigTemplate_c99cc93dacee6c775538bbe15acc56e573638df4ad17d6b6043fedf79fb11af3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
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

    // line 4
    public function block_page_header($context, array $blocks = array())
    {
        // line 5
        echo "<h3>Torneos por jugar - Configuración equipos</h3>
\t<h4>\t
\t\tCircuito ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "circuito"), "nombre"), "html", null, true);
        echo "<small> - </small>Temporada ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "nombre"), "html", null, true);
        echo " 
\t</h4>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "<div class='hidden'>
\t\t";
        // line 15
        echo "\t</div>
\t
\t<div class='row '>
\t\t<div class='col-lg-12'>

\t\t\t<div class='table-responsive'>
\t\t\t\t<table class='table table-condensed'>

\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Torneo</th>
\t\t\t\t\t\t<th class=\"text-center\">Fecha</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>

\t\t\t\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fechas"]) ? $context["fechas"] : $this->getContext($context, "fechas")));
        foreach ($context['_seq'] as $context["_key"] => $context["fecha"]) {
            // line 33
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "torneo"), "nombre"), "html", null, true);
            echo "
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "fecha"), "d-m-Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
            // line 39
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_CREAR_EQUIPO")) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t<a href='";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_lista_equipos_por_torneo_fecha", array("id_torneo_fecha" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"))), "html", null, true);
                echo "' class='btn btn-default' > 
\t\t\t\t\t\t\t\t\t\tConfigurar equipos
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t";
            }
            // line 44
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fecha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t
\t\t</div>
\t</div>


\t<div class='row '>
\t\t<div class='col-lg-12'>
\t\t\t<ul class=\"list-inline record_actions\">
\t\t\t\t<li>
\t\t\t\t\t<!-- a href=\"#\">Volver</a -->
\t\t\t    </li>
\t\t\t</ul>
\t\t</div>
\t</div>
";
    }

    // line 66
    public function block_javascripts($context, array $blocks = array())
    {
        // line 67
        echo "
\t<script type=\"text/javascript\">

\t</script>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada:equipo/listaTorneoFechasConfigurarEquipo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 67,  128 => 66,  107 => 47,  99 => 44,  91 => 40,  89 => 39,  84 => 37,  79 => 35,  75 => 33,  71 => 32,  52 => 15,  49 => 13,  46 => 11,  37 => 7,  33 => 5,  30 => 4,);
    }
}
