<?php

/* GolfEnLaNubeBundle:TorneoFecha:showDistribucionDePuntos.html.twig */
class __TwigTemplate_65e9c37c499f182beb109ed8f2083dfbdccc9bc5c60c2429e2a617a07f67c704 extends Twig_Template
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
\t\t\t<table class=\"table table-condensed table-striped\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Posici&oacute;n</th>
\t\t\t\t\t\t<th class=\"text-center\">Club</th>
\t\t\t\t\t\t<th class=\"text-center\">Totales</th>
\t\t\t\t\t\t<th class=\"text-center\">Participaci&oacute;n</th>
\t\t\t\t\t\t<th class=\"text-center\">Scores<br/>individuales</th>
\t\t\t\t\t\t<th class=\"text-center\">Resultados por Club</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getEquiposOrderByPuntosPorPuntajeTotal"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
            // line 18
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "temporadaclub"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "puntajetotal"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "puntosporparticipacion"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "puntosporgrossindividuales"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "puntosporposicion"), "html", null, true);
            echo "</td>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showDistribucionDePuntos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 20,  54 => 18,  37 => 17,  104 => 33,  101 => 32,  90 => 29,  74 => 25,  66 => 23,  62 => 22,  51 => 19,  32 => 12,  238 => 90,  224 => 81,  220 => 80,  211 => 78,  207 => 77,  203 => 75,  201 => 74,  197 => 72,  188 => 70,  184 => 69,  178 => 65,  175 => 64,  172 => 63,  169 => 62,  166 => 61,  164 => 60,  156 => 59,  151 => 57,  148 => 56,  143 => 54,  138 => 53,  136 => 52,  131 => 51,  125 => 49,  123 => 48,  119 => 47,  116 => 46,  111 => 43,  103 => 41,  98 => 39,  94 => 27,  91 => 37,  82 => 34,  76 => 26,  70 => 24,  67 => 29,  59 => 21,  55 => 25,  45 => 15,  43 => 18,  36 => 13,  34 => 14,  105 => 42,  99 => 34,  89 => 31,  85 => 35,  81 => 27,  77 => 24,  73 => 23,  69 => 22,  65 => 21,  57 => 19,  53 => 20,  50 => 22,  44 => 21,  40 => 17,  19 => 1,);
    }
}
