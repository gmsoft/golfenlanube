<?php

/* GolfEnLaNubeBundle:Default:home.html.twig */
class __TwigTemplate_345bb6be8e3c7ee5fd0791ba4a5c56f60cad495876d12df87a4a57a427b81845 extends Twig_Template
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
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        $context["esJugador"] = (!(null === $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "persona"), "jugador")));
        // line 9
        if ((isset($context["esJugador"]) ? $context["esJugador"] : $this->getContext($context, "esJugador"))) {
            echo " 
\t";
            // line 10
            $context["jug"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "persona"), "jugador");
            // line 11
            echo "\t";
            $context["actualizacion"] = $this->getAttribute($this->getAttribute((isset($context["jug"]) ? $context["jug"] : $this->getContext($context, "jug")), "getActualizacionesOrderByVigenciaDesc"), "first");
            echo " 
";
        }
        // line 13
        echo "\t<div class='row'>
\t\t<div class='col-md-3 text-center' ></div>
\t\t<div class='col-md-6 text-center' >
\t\t\t<img src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/images/inicio_circuitopar3.jpg"), "html", null, true);
        echo "\" alt=\"Bienvenido al sistema\"/>
\t\t\t<h4><strong>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "persona"), "nombrecompleto"), "html", null, true);
        echo " ";
        if ((isset($context["esJugador"]) ? $context["esJugador"] : $this->getContext($context, "esJugador"))) {
            echo "- Matr&iacute;cula: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["jug"]) ? $context["jug"] : $this->getContext($context, "jug")), "id"), "html", null, true);
            echo "  ";
        }
        echo "</strong></h4>
\t\t\t";
        // line 18
        if ((isset($context["esJugador"]) ? $context["esJugador"] : $this->getContext($context, "esJugador"))) {
            // line 19
            echo "\t\t\t\t<h4>HCP Par3: <strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["actualizacion"]) ? $context["actualizacion"] : $this->getContext($context, "actualizacion")), "handicappar3"), "html", null, true);
            echo " </strong> - Tarjetas: <strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["jug"]) ? $context["jug"] : $this->getContext($context, "jug")), "totalPar3Ultimos12Meses"), "html", null, true);
            echo " </strong></h4>
\t\t\t\t<h4>HCP Std: <strong> ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["actualizacion"]) ? $context["actualizacion"] : $this->getContext($context, "actualizacion")), "handicapestandar"), "html", null, true);
            echo " </strong> - Tarjetas: <strong> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["jug"]) ? $context["jug"] : $this->getContext($context, "jug")), "totalEstandarUltimos12Meses"), "html", null, true);
            echo " </strong> </h4>
\t\t\t\t<h4>Juega con:  <strong>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["jug"]) ? $context["jug"] : $this->getContext($context, "jug")), "handicapDeJuegoParaFechaActual"), "html", null, true);
            echo "</h4>
\t\t\t\t<h4>Vigencia de <strong>";
            // line 22
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["actualizacion"]) ? $context["actualizacion"] : $this->getContext($context, "actualizacion")), "vigencia"), "d-m-Y"), "html", null, true);
            echo "</strong> a <strong>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["actualizacion"]) ? $context["actualizacion"] : $this->getContext($context, "actualizacion")), "vigenciaHasta", array(), "method"), "d-m-Y"), "html", null, true);
            echo "</strong></h4>
\t\t\t";
        }
        // line 24
        echo "\t\t</div>
\t\t<div class='col-md-3 text-center' ></div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Default:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 24,  89 => 22,  85 => 21,  79 => 20,  72 => 19,  70 => 18,  60 => 17,  56 => 16,  51 => 13,  45 => 11,  43 => 10,  39 => 9,  37 => 8,  34 => 7,  29 => 3,);
    }
}
