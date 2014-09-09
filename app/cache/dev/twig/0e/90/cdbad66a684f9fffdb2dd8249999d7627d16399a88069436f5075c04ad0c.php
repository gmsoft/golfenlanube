<?php

/* GolfEnLaNubeBundle:Temporada:admin_temporada_show_tabs.html.twig */
class __TwigTemplate_0e90cdbad66a684f9fffdb2dd8249999d7627d16399a88069436f5075c04ad0c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class='row'>
\t<div class='col-xs-12'>
\t\t<ul class=\"nav nav-tabs\">
\t\t\t";
        // line 4
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_VER_CAMPEONATOS")) {
            // line 5
            echo "\t   \t\t<li ";
            if (("admin_campeonatos_por_temporada" == (isset($context["active_path"]) ? $context["active_path"] : $this->getContext($context, "active_path")))) {
                echo "class='active'";
            }
            echo ">
\t   \t\t\t<a href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_campeonatos_por_temporada", array("id_temporada" => (isset($context["id_temporada"]) ? $context["id_temporada"] : $this->getContext($context, "id_temporada")))), "html", null, true);
            echo "\">Campeonatos</a>
   \t\t\t</li>
   \t\t\t";
        }
        // line 9
        echo "   \t\t\t";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_VER_CAMPEONATOS")) {
            // line 10
            echo "       \t\t<li ";
            if (("admin_temporada_show_torneos" == (isset($context["active_path"]) ? $context["active_path"] : $this->getContext($context, "active_path")))) {
                echo "class='active'";
            }
            echo ">
       \t\t\t<a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_show_torneos", array("id" => (isset($context["id_temporada"]) ? $context["id_temporada"] : $this->getContext($context, "id_temporada")))), "html", null, true);
            echo "\" >Torneos</a>
       \t\t</li>
       \t\t";
        }
        // line 14
        echo "       \t\t";
        if ($this->env->getExtension('security')->isGranted("ROLE_VER_LISTA_BUENA_FE")) {
            // line 15
            echo "\t\t\t<li ";
            if (("admin_temporada_show_clubs" == (isset($context["active_path"]) ? $context["active_path"] : $this->getContext($context, "active_path")))) {
                echo "class='active'";
            }
            echo ">
\t\t\t\t<a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_show_clubs", array("id" => (isset($context["id_temporada"]) ? $context["id_temporada"] : $this->getContext($context, "id_temporada")))), "html", null, true);
            echo "\" >Clubs</a>
\t\t\t</li>
            <li ";
            // line 18
            if (("admin_temporada_show_lista_buena_fe" == (isset($context["active_path"]) ? $context["active_path"] : $this->getContext($context, "active_path")))) {
                echo "class='active'";
            }
            echo ">
            \t<a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_show_lista_buena_fe", array("id_temporada" => (isset($context["id_temporada"]) ? $context["id_temporada"] : $this->getContext($context, "id_temporada")))), "html", null, true);
            echo "\" >Lista de Buena fe</a>
            </li>
            ";
        }
        // line 22
        echo "\t\t</ul>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada:admin_temporada_show_tabs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 22,  76 => 19,  70 => 18,  65 => 16,  55 => 14,  49 => 11,  42 => 10,  39 => 9,  26 => 5,  24 => 4,  19 => 1,  149 => 71,  144 => 68,  141 => 67,  131 => 58,  119 => 54,  111 => 52,  107 => 51,  103 => 50,  99 => 49,  96 => 48,  92 => 47,  68 => 25,  60 => 19,  58 => 15,  47 => 10,  44 => 8,  36 => 5,  33 => 6,  30 => 3,);
    }
}
