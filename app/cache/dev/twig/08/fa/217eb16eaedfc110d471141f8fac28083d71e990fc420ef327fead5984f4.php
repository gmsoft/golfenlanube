<?php

/* GolfEnLaNubeBundle:Temporada:showClubs.html.twig */
class __TwigTemplate_08fa217eb16eaedfc110d471141f8fac28083d71e990fc420ef327fead5984f4 extends Twig_Template
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
        echo "\t<h3>Clubs participantes</h3>
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
        echo twig_include($this->env, $context, "GolfEnLaNubeBundle:Temporada:admin_temporada_show_tabs.html.twig", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"), "active_path" => "admin_temporada_show_clubs"));
        echo "


\t<div class='row'>
\t\t<div class='col-xs-12'>
\t\t\t<nav class=\"navbar navbar-default\" role=\"navigation\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
\t\t\t\t    \t<ul class=\"nav navbar-nav\">
\t\t\t\t    \t\t<li>
\t\t\t\t    \t\t\t";
        // line 20
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_AGREGAR_CLUB_A_TEMPORADA")) {
            // line 21
            echo "\t\t\t\t\t    \t\t\t<button data-button-link='";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporadaclub_new", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"))), "html", null, true);
            echo "' class='btn btn-default navbar-btn btn-primary' >
\t\t\t\t\t    \t\t\t\tIncluir club en la temporada
\t\t\t\t\t    \t\t\t</button>
\t\t\t\t    \t\t\t";
        }
        // line 25
        echo "\t\t\t    \t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t</div>
\t</div>

\t<div class='row'>
\t\t<div class='col-xs-8'>
\t\t\t<table class=\"records_list table table-striped table-condensed \">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Nombre</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["temporada_clubs"]) ? $context["temporada_clubs"] : $this->getContext($context, "temporada_clubs")));
        foreach ($context['_seq'] as $context["_key"] => $context["tc"]) {
            // line 44
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["tc"]) ? $context["tc"] : $this->getContext($context, "tc")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
            // line 47
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_ELIMINAR_TEMPORADA_CLUB")) {
                // line 48
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporadaclub_delete", array("id" => $this->getAttribute((isset($context["tc"]) ? $context["tc"] : $this->getContext($context, "tc")), "id"))), "html", null, true);
                echo "\" class='btn btn-default  btn-sm'>
\t\t\t\t\t\t\t\t";
                // line 49
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("remove");
                echo " Eliminar
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
            }
            // line 52
            echo "\t\t\t\t\t\t\t";
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_DESIGNAR_CAPITANES")) {
                // line 53
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporadaclub_lista_capitanes", array("id" => $this->getAttribute((isset($context["tc"]) ? $context["tc"] : $this->getContext($context, "tc")), "id"))), "html", null, true);
                echo "\" class='btn btn-default  btn-sm'>
\t\t\t\t\t\t\t\t";
                // line 54
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("bookmark");
                echo " Capitanes
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t\t\t\t";
            if (($this->env->getExtension('security')->isGranted("ROLE_VER_LISTA_BUENA_FE") && $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "escapitandetemporadaclub", array(0 => $this->getAttribute((isset($context["tc"]) ? $context["tc"] : $this->getContext($context, "tc")), "id")), "method"))) {
                // line 58
                echo "\t\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_show_lista_buena_fe_por_temporada_club", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"), "id_temporada_club" => $this->getAttribute((isset($context["tc"]) ? $context["tc"] : $this->getContext($context, "tc")), "id"))), "html", null, true);
                echo "\" class='btn btn-default  btn-sm'>
\t\t\t\t\t\t\t\t\t";
                // line 59
                echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("list");
                echo " Ver lista de buena fe
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t";
            }
            // line 62
            echo "\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
\t
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada:showClubs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 65,  146 => 62,  140 => 59,  135 => 58,  132 => 57,  126 => 54,  121 => 53,  118 => 52,  112 => 49,  107 => 48,  105 => 47,  100 => 45,  97 => 44,  93 => 43,  73 => 25,  65 => 21,  63 => 20,  50 => 10,  47 => 8,  35 => 5,  32 => 4,  29 => 3,);
    }
}
