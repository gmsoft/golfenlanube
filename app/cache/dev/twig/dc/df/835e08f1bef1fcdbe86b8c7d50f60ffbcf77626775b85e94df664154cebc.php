<?php

/* GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub.html.twig */
class __TwigTemplate_dcdf835e08f1bef1fcdbe86b8c7d50f60ffbcf77626775b85e94df664154cebc extends Twig_Template
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
\t\t\t\t\t\t<th class=\"text-center\">Golpes</th>
\t \t\t\t\t\t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "titularesporclub")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 13
            echo "\t \t\t\t\t\t\t<th class=\"text-center\">Jugador ";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), "html", null, true);
            echo "</th>
\t \t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "\t\t\t\t\t\t<th class=\"text-center\">Total<br /> Desempate</th>
 \t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 19
        if ((twig_length_filter($this->env, (isset($context["resultados_por_club"]) ? $context["resultados_por_club"] : $this->getContext($context, "resultados_por_club"))) > 0)) {
            // line 20
            echo "\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "getEquiposOrderByPosicion"));
            foreach ($context['_seq'] as $context["_key"] => $context["equipo"]) {
                if ((!(null === $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "posicion")))) {
                    // line 21
                    echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "posicion"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t<td>";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "temporadaclub"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    // line 24
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : null), "scoreposicionante", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : null), "scoreposicionante"), "-")) : ("-")), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t";
                    // line 25
                    $context["scoresnetos"] = $this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : $this->getContext($context, "equipo")), "getscoresnetos");
                    // line 26
                    echo "\t\t\t\t\t\t\t\t";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "titularesporclub")));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 27
                        echo "\t\t\t \t\t\t\t\t\t<td class=\"text-center\">";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["scoresnetos"]) ? $context["scoresnetos"] : null), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1), array(), "any", true, true)) ? ($this->getAttribute((isset($context["scoresnetos"]) ? $context["scoresnetos"] : $this->getContext($context, "scoresnetos")), ((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) - 1))) : ("-")), "html", null, true);
                        echo "</td>
\t\t\t\t \t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 29
                    echo "\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                    echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : null), "scoredesempate", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["equipo"]) ? $context["equipo"] : null), "scoredesempate"), "-")) : ("-")), "html", null, true);
                    echo "</td>
\t\t\t \t\t\t\t</tr>
\t\t\t\t\t\t";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['equipo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "\t\t\t\t\t";
        }
        // line 33
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showResultadosPorClub.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 33,  101 => 32,  90 => 29,  74 => 25,  66 => 23,  62 => 22,  51 => 19,  32 => 12,  238 => 90,  224 => 81,  220 => 80,  211 => 78,  207 => 77,  203 => 75,  201 => 74,  197 => 72,  188 => 70,  184 => 69,  178 => 65,  175 => 64,  172 => 63,  169 => 62,  166 => 61,  164 => 60,  156 => 59,  151 => 57,  148 => 56,  143 => 54,  138 => 53,  136 => 52,  131 => 51,  125 => 49,  123 => 48,  119 => 47,  116 => 46,  111 => 43,  103 => 41,  98 => 39,  94 => 38,  91 => 37,  82 => 34,  76 => 26,  70 => 24,  67 => 29,  59 => 21,  55 => 25,  45 => 15,  43 => 18,  36 => 13,  34 => 14,  105 => 42,  99 => 34,  89 => 31,  85 => 35,  81 => 27,  77 => 28,  73 => 27,  69 => 26,  65 => 28,  57 => 24,  53 => 20,  50 => 22,  44 => 21,  40 => 17,  19 => 1,);
    }
}
