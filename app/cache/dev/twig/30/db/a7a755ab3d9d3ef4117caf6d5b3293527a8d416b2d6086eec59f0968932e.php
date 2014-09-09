<?php

/* GolfEnLaNubeBundle:TorneoFecha:showJugadores.html.twig */
class __TwigTemplate_30dba7a755ab3d9d3ef4117caf6d5b3293527a8d416b2d6086eec59f0968932e extends Twig_Template
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
        echo "\t<div class=\"panel panel-default\">
\t\t<!-- Default panel contents -->
\t\t<!-- List group -->
\t\t<div class='table-responsive'>
\t\t\t<table class=\"table table-condensed table-striped\" style='font-size:0.9em'>
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Club</th>
\t\t\t\t\t\t<th class=\"text-center\">Titular o <br/>Suplente</th>
\t\t\t\t\t\t<th class=\"text-center\">Matr&iacute;cula</th>
\t\t\t\t\t\t<th class=\"text-center\">Apellido y nombre</th>
\t\t\t\t\t\t<th class=\"text-center\">HCP Par 3</th>
\t\t\t\t\t\t<th class=\"text-center\">Tarjetas Par3</th>
\t\t\t\t\t\t<th class=\"text-center\">HCP Std</th>
\t\t\t\t\t\t<th class=\"text-center\">Tarjetas Std</th>
\t\t\t\t\t\t<th class=\"text-center\">Juega con</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "equipos"));
        foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
            // line 21
            echo "\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "torneofechajugadores"));
            foreach ($context['_seq'] as $context["_key"] => $context["tfj"]) {
                if ((!(null === $this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador")))) {
                    // line 22
                    echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "temporadaclub"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 24
                    if (($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "titular") == true)) {
                        echo "T";
                    } else {
                        echo "S";
                    }
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 25
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "idjugador"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\"><small>";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador"), "persona"), "nombrecompleto"), "html", null, true);
                    echo "</small></td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "handicappar3"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador"), "totalPar3NMesesAnterioresAFecha", array(0 => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fecha"), 1 => 12), "method"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "handicapestandar"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 30
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador"), "totalEstandarNMesesAnterioresAFecha", array(0 => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fecha"), 1 => 12), "method"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 31
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "handicapdejuego"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tfj'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showJugadores.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 35,  99 => 34,  89 => 31,  85 => 30,  81 => 29,  77 => 28,  73 => 27,  69 => 26,  65 => 25,  57 => 24,  53 => 23,  50 => 22,  44 => 21,  40 => 20,  19 => 1,);
    }
}
