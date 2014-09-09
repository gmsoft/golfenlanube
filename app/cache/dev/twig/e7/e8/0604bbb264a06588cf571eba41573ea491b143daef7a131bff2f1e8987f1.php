<?php

/* GolfEnLaNubeBundle:Temporada/equipo:listaEquiposPorTorneoFecha.html.twig */
class __TwigTemplate_e7e80604bbb264a06588cf571eba41573ea491b143daef7a131bff2f1e8987f1 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "temporada"), "nombre"), "html", null, true);
        echo " </h3>
\t<h4>Equipos para para torneo ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "nombre"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fecha"), "d-m-Y"), "html", null, true);
        echo "
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "<div class='row'>
\t\t<div class='col-md-12'>
\t\t\t<div class='table-responsive'>
\t\t\t\t<table class=\"records_list table table-striped table-condensed \">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t
\t\t\t                <th class=\"text-center\">Nombre</th>
\t\t\t                <th class=\"text-center\">Club</th>
\t\t\t                <th class=\"text-center\"># Jugadores</th>
\t\t\t                <th>&nbsp;</th>
\t\t\t            </tr>
\t\t\t        </thead>
\t\t\t        <tbody>
\t\t\t        ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["equipos"]) ? $context["equipos"] : $this->getContext($context, "equipos")));
        foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
            // line 24
            echo "\t\t\t            <tr>
\t\t\t                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "temporadaclub"), "html", null, true);
            echo "</td>
\t\t\t                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "club"), "nombre"), "html", null, true);
            echo "</td>
\t\t\t                <td class=\"text-center\">";
            // line 27
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "getTorneoFechaJugadoresConJugadorInformado")), "html", null, true);
            echo "</td>
\t\t\t                <td>
\t\t\t                \t<a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_equipo_show", array("id" => $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "id"))), "html", null, true);
            echo "\" class='btn btn-default btn-sm'>";
            echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("list");
            echo " Ver</a>
\t\t\t                \t";
            // line 30
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "torneofechajugadorescontarjeta")) == 0)) {
                // line 31
                echo "\t\t\t                \t
\t\t\t\t                \t<a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_equipo_edit", array("id" => $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "id"))), "html", null, true);
                echo "\" class='btn btn-default btn-sm'>";
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("edit");
                echo " Modificar</a>
\t\t\t                        <a href=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_equipo_delete", array("id" => $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "id"))), "html", null, true);
                echo "\" class='btn btn-default btn-sm'>";
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("remove");
                echo " Eliminar</a>
\t\t                        ";
            }
            // line 35
            echo "\t\t\t                </td>
\t\t\t            </tr>
\t\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "\t\t\t        </tbody>
\t\t\t    </table>
\t\t    </div>
\t\t</div>
\t</div>

\t<div class='row'>
\t\t<div class='col-md-12'>
\t        <ul class='list-inline'>
\t\t        <li>
\t\t            <a href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_equipo_new", array("id_torneo_fecha" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-default btn-primary\">
\t\t                Configurar nuevo equipo
\t\t            </a>
\t\t        </li>
\t\t        <li>
\t\t            <a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_lista_torneo_fechas_configurar_equipo", array("id_temporada" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "temporada"), "id"))), "html", null, true);
        echo "\" >
\t\t                Volver
\t\t            </a>
\t\t        </li>
\t\t    </ul>
\t\t</div>
\t</div>
    ";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada/equipo:listaEquiposPorTorneoFecha.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 53,  128 => 48,  116 => 38,  108 => 35,  101 => 33,  95 => 32,  92 => 31,  90 => 30,  84 => 29,  79 => 27,  75 => 26,  71 => 25,  68 => 24,  64 => 23,  48 => 9,  45 => 8,  37 => 5,  32 => 4,  29 => 3,);
    }
}
