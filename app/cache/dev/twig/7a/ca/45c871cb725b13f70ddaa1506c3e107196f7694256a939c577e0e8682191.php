<?php

/* GolfEnLaNubeBundle:Campeonato:index.html.twig */
class __TwigTemplate_7aca45c871cb725b13f70ddaa1506c3e107196f7694256a939c577e0e8682191 extends Twig_Template
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
        echo "<h3>Campeonatos en esta temporada</h3>
\t<h4>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "circuito"), "nombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "nombre"), "html", null, true);
        echo "</h4>
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo twig_include($this->env, $context, "GolfEnLaNubeBundle:Temporada:admin_temporada_show_tabs.html.twig", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"), "active_path" => "admin_campeonatos_por_temporada"));
        echo "

\t<div class='row'>
\t\t<div class='col-lg-12'>
\t\t\t<nav class=\"navbar navbar-default\" role=\"navigation\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
\t\t\t\t    \t<ul class=\"nav navbar-nav\">
\t\t\t\t    \t\t";
        // line 18
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_CREAR_CAMPEONATO")) {
            // line 19
            echo "\t\t\t\t    \t\t<li>
\t\t\t\t    \t\t\t<button id=\"agregarCampeonatoTorneo\" class='btn btn-default navbar-btn btn-primary' >
\t\t\t\t    \t\t\t\tNuevo campeonato
\t\t\t\t    \t\t\t</button>
\t\t\t    \t\t\t</li>
\t\t\t    \t\t\t";
        }
        // line 25
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t</div>
\t</div>

\t<div class='row'>
\t\t<div class='col-lg-8'>
\t\t\t<div class='table-responsive'>
\t\t\t\t<table class=\"records_list table table-condensed \">
\t
\t\t\t        <thead>
\t\t\t            <tr>
\t\t\t                <th class=\"text-center\">Nombre</th>
\t\t\t                <th class=\"text-center\">Campeonatos</th>
\t\t\t                <th class=\"text-center\">Torneos</th>
\t\t\t                <th>Forma parte de</th>
\t\t\t                <th>&nbsp;</th>
\t\t\t            </tr>
\t\t\t        </thead>
\t\t\t        <tbody>
\t\t\t        ";
        // line 47
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 48
            echo "\t\t\t            <tr class='active'>
\t\t\t                <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "nombre"), "html", null, true);
            echo "</td>
\t\t\t                <td class=\"text-center\">";
            // line 50
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "campeonatos")), "html", null, true);
            echo "</td>
\t\t\t                <td class=\"text-center\">";
            // line 51
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneos")), "html", null, true);
            echo "</td>
\t\t\t                <td>";
            // line 52
            if ((!(null === $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "padre")))) {
                echo "Campeonato ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "padre"), "nombre"), "html", null, true);
            }
            echo "</td>
\t\t\t                <td >
\t\t                        <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_campeonato_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\" class='btn btn-default '>";
            echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("list");
            echo " Detalles</a>
\t\t\t                </td>
\t\t\t            </tr>
\t\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "\t\t\t        </tbody>
\t\t\t    </table>
\t\t    </div>
\t\t</div>
\t</div>
\t
";
    }

    // line 67
    public function block_javascripts($context, array $blocks = array())
    {
        // line 68
        echo "
\t<script type=\"text/javascript\">
\t\t\$('button#agregarCampeonatoTorneo').on('click', function () { 
\t\t\tdocument.location.href='";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_campeonato_new", array("id_temporada" => $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "id"))), "html", null, true);
        echo "';
\t\t});
\t</script>

";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Campeonato:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 71,  144 => 68,  141 => 67,  131 => 58,  119 => 54,  111 => 52,  107 => 51,  103 => 50,  99 => 49,  96 => 48,  92 => 47,  68 => 25,  60 => 19,  58 => 18,  47 => 10,  44 => 8,  36 => 5,  33 => 4,  30 => 3,);
    }
}
