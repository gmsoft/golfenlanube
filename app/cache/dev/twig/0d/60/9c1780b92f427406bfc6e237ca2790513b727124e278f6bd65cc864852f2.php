<?php

/* GolfEnLaNubeBundle:Temporada:showTorneos.html.twig */
class __TwigTemplate_0d609c1780b92f427406bfc6e237ca2790513b727124e278f6bd65cc864852f2 extends Twig_Template
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

    // line 3
    public function block_page_header($context, array $blocks = array())
    {
        // line 4
        echo "\t<h3>Torneos</h3>
\t<h4>Cicuito: ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "circuito"), "nombre"), "html", null, true);
        echo " <small>|</small> Temporada: ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "nombre"), "html", null, true);
        echo " &nbsp;<small>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "inicio"), "m/Y"), "html", null, true);
        echo " &nbsp; a &nbsp; ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "fin"), "m/Y"), "html", null, true);
        echo "</small></h4>
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo twig_include($this->env, $context, "GolfEnLaNubeBundle:Temporada:admin_temporada_show_tabs.html.twig", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"), "active_path" => "admin_temporada_show_torneos"));
        echo "

\t<div class='row'>
\t\t<div class='col-xs-12'>
\t\t\t<nav class=\"navbar navbar-default\" role=\"navigation\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
\t\t\t\t    \t<ul class=\"nav navbar-nav\">
\t\t\t\t\t    \t";
        // line 18
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_CREAR_TORNEO")) {
            // line 19
            echo "\t\t\t\t\t    \t\t<li>
\t\t\t\t\t    \t\t\t<button id=\"agregarTemporadaTorneo\" class='btn btn-default navbar-btn btn-primary' >
\t\t\t\t\t    \t\t\t\tNuevo torneo
\t\t\t\t\t    \t\t\t</button>
\t\t\t\t    \t\t\t</li>
\t\t\t\t    \t\t";
        }
        // line 25
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t</div>
\t</div>

\t<div class='row'>
\t\t<div class='col-xs-12'>
\t\t\t<table class=\"records_list table table-striped table-condensed \">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Nombre</th>
\t\t\t\t\t\t<th class=\"text-center\">Inicio</th>
\t\t\t\t\t\t<th class=\"text-center\">Organiza</th>
\t\t\t\t\t\t<th class=\"text-center\">D&iacute;as</th>
\t\t\t\t\t\t<th class=\"text-center\">Formato juego</th>
\t\t\t\t\t\t<!-- th>Apertura inscripci&oacute;n</th -->
\t\t\t\t\t\t<!-- th>Cierre inscripci&oacute;n</th-->
\t\t\t\t\t\t<th class=\"text-center\">Tipo torneo</th>
\t\t\t\t\t\t<!-- th>Hoyos</th-->
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 51
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 53
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "inicio")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "inicio"), "d-m-Y"), "html", null, true);
            }
            echo "</td>
\t\t\t\t\t\t\t<td  class=\"text-center\">";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "institucion"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 55
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechas")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "formatojuego"), "html", null, true);
            echo "</td>
\t\t\t
\t\t\t\t\t\t\t<!-- td>";
            // line 58
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "aperturainscripcion")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "aperturainscripcion"), "d-m-Y"), "html", null, true);
            }
            echo "</td -->
\t\t\t\t\t\t\t<!-- td>";
            // line 59
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cierreinscripcion")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cierreinscripcion"), "d-m-Y"), "html", null, true);
            }
            echo "</td -->
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('form')->humanize($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tipotorneo")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<!-- td>";
            // line 61
            echo "</td -->
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<ul  class='list-inline'>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneo_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" class='btn btn-default  btn-sm'>";
            echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("edit");
            echo " Fechas</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 70
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fechas"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["fecha"]) {
                // line 71
                echo "\t\t\t\t\t\t<tr >
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
                echo "&deg; d&iacute;a</td>
\t\t\t\t\t\t\t<td colspan=\"8\"> 
\t\t\t\t\t\t\t\tjuega el <strong>";
                // line 75
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "fecha"), "d-m-Y"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\ten <strong>";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "cancha"), "club"), "html", null, true);
                echo "</strong>, cancha <strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "cancha"), "numero"), "html", null, true);
                echo "</strong> 
\t\t\t\t\t\t\t\t";
                // line 77
                if (($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "salidassimultaneas") == 1)) {
                    echo "con salidas simult&aacute;neas";
                } else {
                    echo "No";
                }
                // line 78
                echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fecha'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>

";
    }

    // line 89
    public function block_javascripts($context, array $blocks = array())
    {
        // line 90
        echo "
\t<script type=\"text/javascript\">
\t\t\$('button#agregarTemporadaTorneo').on('click', function () { 
\t\t\tdocument.location.href='";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneo_new", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"))), "html", null, true);
        echo "';
\t\t});
\t</script>

";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada:showTorneos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 93,  237 => 90,  234 => 89,  225 => 82,  219 => 81,  203 => 78,  197 => 77,  191 => 76,  187 => 75,  182 => 73,  178 => 71,  161 => 70,  151 => 65,  145 => 61,  141 => 60,  135 => 59,  129 => 58,  124 => 56,  120 => 55,  116 => 54,  110 => 53,  106 => 52,  103 => 51,  99 => 50,  72 => 25,  64 => 19,  62 => 18,  51 => 10,  48 => 8,  36 => 5,  33 => 4,  30 => 3,);
    }
}
