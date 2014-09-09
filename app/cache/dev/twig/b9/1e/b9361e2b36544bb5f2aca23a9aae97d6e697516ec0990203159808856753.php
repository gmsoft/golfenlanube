<?php

/* GolfEnLaNubeBundle:TorneoFecha:showResultadosPorJugador.html.twig */
class __TwigTemplate_b91eb9361e2b36544bb5f2aca23a9aae97d6e697516ec0990203159808856753 extends Twig_Template
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
\t\t
\t\t<!-- List group -->
\t\t<div class='table-responsive'>
\t\t\t<table class=\"table table-condensed table-striped\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Posicion</th>
\t\t\t\t\t\t<th class=\"text-center\">Jugador</th>
\t\t\t\t\t\t<th class=\"text-center\">Club</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t\t<th class=\"text-center\">Ida</th>
\t\t\t\t\t\t";
        // line 14
        if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "hoyos") > 9)) {
            // line 15
            echo "\t\t\t\t\t\t\t<th class=\"text-center\">Vuelta</th>
\t\t\t\t\t\t";
        }
        // line 17
        echo "\t\t\t\t\t\t<th class=\"text-center\">Gross</th>
\t\t\t\t\t\t";
        // line 18
        if (((isset($context["orden_por"]) ? $context["orden_por"] : $this->getContext($context, "orden_por")) == "neto")) {
            // line 19
            echo "\t\t\t\t\t\t\t<th class=\"text-center\">Handicap</th>
\t\t\t\t\t\t\t<th class=\"text-center\">Neto</th>
\t\t\t\t\t\t";
        }
        // line 22
        echo "\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tarjetas"]) ? $context["tarjetas"] : $this->getContext($context, "tarjetas")));
        foreach ($context['_seq'] as $context["_key"] => $context["tarjeta"]) {
            // line 26
            echo "\t\t\t\t\t\t<tr class='totales_jugador' data-id-tarjeta='";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "id"), "html", null, true);
            echo "'>
\t\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t\t";
            // line 28
            if (($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "estado") == "OK")) {
                // line 29
                echo "\t\t\t\t\t\t\t\t\t";
                if (((isset($context["orden_por"]) ? $context["orden_por"] : $this->getContext($context, "orden_por")) == "neto")) {
                    // line 30
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "torneofechajugador"), "posicionporneto"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                } elseif (((isset($context["orden_por"]) ? $context["orden_por"] : $this->getContext($context, "orden_por")) == "gross")) {
                    // line 32
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "torneofechajugador"), "posicionporgross"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                }
                // line 34
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 35
                echo "\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "estado"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 37
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>";
            // line 38
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "torneofechajugador", array(), "any", false, true), "jugador", array(), "any", false, true), "persona", array(), "any", false, true), "nombrecompleto", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "torneofechajugador", array(), "any", false, true), "jugador", array(), "any", false, true), "persona", array(), "any", false, true), "nombrecompleto"), " - Nombre no disponible")) : (" - Nombre no disponible")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "torneofechajugador"), "equipo"), "temporadaclub"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td class=\"text-center\">
\t\t\t\t\t\t\t\t";
            // line 41
            if (($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "estado") != "OK")) {
                // line 42
                echo "\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "comentario"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            } else {
                // line 43
                echo " 
\t\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t\t";
            }
            // line 46
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "totalida"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t";
            // line 48
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "hoyos") > 9)) {
                // line 49
                echo "\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "totalvuelta"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
            }
            // line 51
            echo "\t\t\t\t\t\t\t<td class=\"text-center\">";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "scoregross", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "scoregross"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t";
            // line 52
            if (((isset($context["orden_por"]) ? $context["orden_por"] : $this->getContext($context, "orden_por")) == "neto")) {
                // line 53
                echo "\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "torneofechajugador", array(), "any", false, true), "handicapdejuego", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "torneofechajugador", array(), "any", false, true), "handicapdejuego"), $this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "torneofechajugador"), "handicappar3"))) : ($this->getAttribute($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "torneofechajugador"), "handicappar3"))), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"text-center\">";
                // line 54
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "scoreneto", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : null), "scoreneto"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
            }
            // line 56
            echo "\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr style='display:none' class='detalles_hoyoxhoyo' data-id-tarjeta='";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "id"), "html", null, true);
            echo "' >
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td colspan='";
            // line 59
            if (((isset($context["orden_por"]) ? $context["orden_por"] : $this->getContext($context, "orden_por")) == "neto")) {
                echo "6";
            } else {
                echo "4";
            }
            echo "'>
\t\t\t\t\t\t\t\t";
            // line 60
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "hoyos")) > 9)) {
                // line 61
                echo "\t\t\t\t\t\t\t\t\t";
                $context["cols"] = (twig_length_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "hoyos")) / 2);
                // line 62
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 63
                echo "\t\t\t\t\t\t\t\t\t";
                $context["cols"] = 9;
                // line 64
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 65
            echo "\t
\t\t\t\t\t\t\t\t\t<table class='table table-condensed table-bordered'>
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<th class='text-center info'>Ida</th>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 69
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "hoyos"), 0, (isset($context["cols"]) ? $context["cols"] : $this->getContext($context, "cols"))));
            foreach ($context['_seq'] as $context["_key"] => $context["hoyo"]) {
                // line 70
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<th class='text-center'> ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hoyo"]) ? $context["hoyo"] : $this->getContext($context, "hoyo")), "golpes"), "html", null, true);
                echo " </th> 
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hoyo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            // line 74
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "hoyos")) > 9)) {
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<th class='text-center info'>Vuelta</th>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 77
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, $this->getAttribute((isset($context["tarjeta"]) ? $context["tarjeta"] : $this->getContext($context, "tarjeta")), "hoyos"), (isset($context["cols"]) ? $context["cols"] : $this->getContext($context, "cols")), (isset($context["cols"]) ? $context["cols"] : $this->getContext($context, "cols"))));
                foreach ($context['_seq'] as $context["_key"] => $context["hoyo"]) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<th class='text-center'> ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hoyo"]) ? $context["hoyo"] : $this->getContext($context, "hoyo")), "golpes"), "html", null, true);
                    echo " </th> 
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hoyo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t\t</tr>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 81
            echo " 

\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td colspan='2'>&nbsp;</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t<tr class='hidden' ></tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tarjeta'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showResultadosPorJugador.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 90,  224 => 81,  220 => 80,  211 => 78,  207 => 77,  203 => 75,  201 => 74,  197 => 72,  188 => 70,  184 => 69,  178 => 65,  175 => 64,  172 => 63,  169 => 62,  166 => 61,  164 => 60,  156 => 59,  151 => 57,  148 => 56,  143 => 54,  138 => 53,  136 => 52,  131 => 51,  125 => 49,  123 => 48,  119 => 47,  116 => 46,  111 => 43,  103 => 41,  98 => 39,  94 => 38,  91 => 37,  82 => 34,  76 => 32,  70 => 30,  67 => 29,  59 => 26,  55 => 25,  45 => 19,  43 => 18,  36 => 15,  34 => 14,  105 => 42,  99 => 34,  89 => 31,  85 => 35,  81 => 29,  77 => 28,  73 => 27,  69 => 26,  65 => 28,  57 => 24,  53 => 23,  50 => 22,  44 => 21,  40 => 17,  19 => 1,);
    }
}
