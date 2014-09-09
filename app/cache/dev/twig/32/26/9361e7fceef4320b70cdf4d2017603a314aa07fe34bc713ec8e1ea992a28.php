<?php

/* GolfEnLaNubeBundle:Torneo:show.html.twig */
class __TwigTemplate_32269361e7fceef4320b70cdf4d2017603a314aa07fe34bc713ec8e1ea992a28 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
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
    public function block_page_header($context, array $blocks = array())
    {
        // line 4
        echo "<h3>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
        echo " <small>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "formatojuego"), "html", null, true);
        echo "</small></h3>
\t<h4>\t
\t\tCircuito ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "temporada"), "circuito"), "nombre"), "html", null, true);
        echo "<small> - </small>Temporada ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "temporada"), "nombre"), "html", null, true);
        echo "
\t</h4>
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "<div class='row '>
\t\t<div class='col-lg-6'>
\t\t\t<ul class=\"list-group record_properties\">
\t\t\t\t<!-- li class=\"list-group-item\"><strong>";
        // line 15
        echo "</strong> hoyos por fecha</li -->
\t\t\t\t<li class=\"list-group-item\">Apertura de inscripci&oacute;n: <strong>";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "aperturainscripcion"), "d-m-Y"), "html", null, true);
        echo "</strong></li>
\t\t\t\t<li class=\"list-group-item\">Cierre de inscripci&oacute;n: <strong>";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cierreinscripcion"), "d-m-Y"), "html", null, true);
        echo "</strong> </li>
\t\t\t\t<li class=\"list-group-item\">Inicio: <strong>";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "inicio"), "d-m-Y"), "html", null, true);
        echo "</strong> </li>
\t\t\t</ul>
\t\t</div>
\t\t<div class='col-lg-6'>
\t\t\t<ul class=\"list-group record_properties\">
\t\t\t\t<!-- li class=\"list-group-item\"><strong>";
        // line 23
        echo "</strong> hoyos por fecha</li -->
\t\t\t\t<li class=\"list-group-item\">Titulares por club: <strong>";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "titularesporclub"), "html", null, true);
        echo "</strong> </li>
\t\t\t\t<li class=\"list-group-item\">Suplentes por club: <strong>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "suplentesporclub"), "html", null, true);
        echo "</strong> </li>
\t\t\t</ul>
\t\t</div>
\t\t
\t</div>
\t<div class='row '>
\t\t<div class='col-lg-12'>
\t\t\t<ul class=\"list-inline record_actions\">
\t\t\t\t";
        // line 33
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_CREAR_TORNEO")) {
            // line 34
            echo "\t\t            <li><a href='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneo_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "' class='btn btn-default' >";
            echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("edit");
            echo " Editar </a></li>
\t            ";
        }
        // line 36
        echo "\t\t\t\t";
        if (((!(null === (isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")))) && $this->env->getExtension('security')->isGranted("ROLE_ADMIN_ELIMINAR_TORNEO"))) {
            // line 37
            echo "\t            <li>";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "</li>
\t            ";
        }
        // line 39
        echo "\t\t\t</ul>
\t\t</div>
\t</div>

\t
\t<div class=\"panel panel-default\">
\t\t<!-- Default panel contents -->
\t\t<div class=\"panel-heading\">D&iacute;as</div>
\t\t
\t\t<!-- List group -->
\t\t<div class='table-responsive'>
\t\t\t<table class=\"table table-condensed table-striped\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th> # </th>
\t\t\t\t\t\t<th class=\"text-center\">Fecha</th>
\t\t\t\t\t\t<th class=\"text-center\">Hoyos</th>
\t\t\t\t\t\t<!-- th class=\"text-center\">Jugadores<br/> por linea</th>
\t\t\t\t\t\t<th class=\"text-center\">Salidas<br/>simult.</th --->
\t\t\t\t\t\t<th class=\"text-center\">Club</th>
\t\t\t\t\t\t<th class=\"text-center\">Cancha</th>
\t\t\t\t\t\t<th>&nbsp;</th> 
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 64
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechas"));
        foreach ($context['_seq'] as $context["_key"] => $context["fecha"]) {
            // line 65
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "numerofecha"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 67
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "fecha"), "d-m-Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "hoyos"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<!-- td>";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "jugadoresporlinea"), "html", null, true);
            echo "</td -->
\t\t\t\t\t\t\t<!-- td>";
            // line 70
            echo "Si";
            echo "No";
            echo "</td -->
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "cancha"), "club"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "cancha"), "numero"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
            // line 74
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_EDITAR_TORNEO")) {
                // line 75
                echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneofecha_edit", array("id" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"))), "html", null, true);
                echo "\" class='btn btn-default btn-sm'>";
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("edit");
                echo " Modificar</a>
\t\t\t\t\t\t\t\t";
            }
            // line 77
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fecha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "\t\t\t\t\t<!-- Para Circuito Par3 no hay posibilidad de jugar a más de un día (siempre se hacen torneos de un día a 18 hoyos) 
\t\t\t\t\t\tpero pra otros clubes y circuitos habrá que agregar esta opcion que ya está armada. Solo habría que agregar el condicional correcto -->
\t\t\t\t\t<!--  tr>
\t\t\t\t\t\t<td colspan='8'>
\t\t\t\t\t\t\t<a href=\"";
        // line 84
        echo "\" class='btn btn-default btn-primary btn-sm'>Nueva fecha</a>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr -->
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>

\t<div class='row '>
\t\t<div class='col-lg-12'>
\t\t\t<ul class=\"list-inline record_actions\">
\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_show_torneos", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "temporada"), "id"))), "html", null, true);
        echo "\">
\t\t\t\t\t\tVolver
\t\t\t\t\t</a>
\t\t\t    </li>
\t\t\t</ul>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Torneo:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 96,  201 => 84,  195 => 80,  187 => 77,  179 => 75,  177 => 74,  172 => 72,  168 => 71,  163 => 70,  159 => 69,  155 => 68,  151 => 67,  147 => 66,  144 => 65,  140 => 64,  113 => 39,  107 => 37,  104 => 36,  96 => 34,  94 => 33,  83 => 25,  79 => 24,  76 => 23,  68 => 18,  64 => 17,  60 => 16,  57 => 15,  52 => 12,  49 => 10,  40 => 6,  32 => 4,  29 => 3,);
    }
}
