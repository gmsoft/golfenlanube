<?php

/* GolfEnLaNubeBundle:Temporada:listaTorneoFechasConcluidas.html.twig */
class __TwigTemplate_eee50c19e6fb3d773b94a45b83aada56821e3151a8ee8814e8684418f01b928d extends Twig_Template
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

    // line 4
    public function block_page_header($context, array $blocks = array())
    {
        // line 5
        echo "<h3>Torneos jugados a la fecha</h3>
\t<h4>\t
\t\tCircuito ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "circuito"), "nombre"), "html", null, true);
        echo "<small> - </small>Temporada ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["temporada"]) ? $context["temporada"] : $this->getContext($context, "temporada")), "nombre"), "html", null, true);
        echo " 
\t</h4>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "<div class='hidden'>
\t\t";
        // line 15
        echo "\t</div>
\t
\t<div class='row '>
\t\t<div class='col-lg-12'>

\t\t\t<div class='table-responsive'>
\t\t\t\t<table class='table table-condensed'>

\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"text-center\">Torneo</th>
\t\t\t\t\t\t<th class=\"text-center\">Fecha</th>
\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>

\t\t\t\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fechas"]) ? $context["fechas"] : $this->getContext($context, "fechas")));
        foreach ($context['_seq'] as $context["_key"] => $context["fecha"]) {
            // line 33
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "torneo"), "nombre"), "html", null, true);
            echo "
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "fecha"), "d-m-Y"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
            // line 39
            if (($this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "habilitarcargaresultados") == true)) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t";
                if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_HABILITAR_CARGA_TARJETAS")) {
                    // line 41
                    echo "\t\t\t\t\t\t\t\t\t\t<a href='";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneofecha_habilitar_carga_tarjetas", array("id_torneo_fecha" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"), "habilitar" => "deshabilitar")), "html", null, true);
                    echo "' class='btn btn-default' > 
\t\t\t\t\t\t\t\t\t\t\tDeshabilitar carga
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 45
                echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 46
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "torneofechajugadores")) > 0)) {
                    // line 47
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_CARGAR_TARJETA")) {
                        // line 48
                        echo "\t\t\t\t\t\t\t\t\t\t\t<a href='";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneofecha_lista_jugadores_cargar_tarjetas", array("id_torneo_fecha" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"))), "html", null, true);
                        echo "' class='btn btn-default' > 
\t\t\t\t\t\t\t\t\t\t\t\tCargar tarjetas
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 52
                    echo "\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 53
                    echo "\t\t\t\t\t\t\t\t\t\t- No se registran jugadores inscriptos - 
\t\t\t\t\t\t\t\t\t";
                }
                // line 55
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 56
                echo "\t\t\t\t\t\t\t\t\t";
                if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_HABILITAR_CARGA_TARJETAS")) {
                    // line 57
                    echo "\t\t\t\t\t\t\t\t\t\t<a href='";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneofecha_habilitar_carga_tarjetas", array("id_torneo_fecha" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"), "habilitar" => "habilitar")), "html", null, true);
                    echo "' class='btn btn-default' > 
\t\t\t\t\t\t\t\t\t\t\tHabilitar carga
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 61
                echo "\t\t\t\t\t\t\t\t\t";
                if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                    echo " ";
                    // line 62
                    echo "\t\t\t\t\t\t\t\t\t\t<a href='";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneofecha_comunicar_resultados_por_mail", array("id_torneo_fecha" => $this->getAttribute((isset($context["fecha"]) ? $context["fecha"] : $this->getContext($context, "fecha")), "id"))), "html", null, true);
                    echo "' class='btn btn-default' > 
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 63
                    echo $this->env->getExtension('braincrafted_bootstrap_icon')->iconFunction("envelope");
                    echo " &nbsp; Comunicar por mail
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                // line 67
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 68
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fecha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t
\t\t</div>
\t</div>


\t<div class='row '>
\t\t<div class='col-lg-12'>
\t\t\t<ul class=\"list-inline record_actions\">
\t\t\t\t<li>
\t\t\t\t\t<!-- a href=\"#\">Volver</a -->
\t\t\t    </li>
\t\t\t</ul>
\t\t</div>
\t</div>
";
    }

    // line 90
    public function block_javascripts($context, array $blocks = array())
    {
        // line 91
        echo "
\t<script type=\"text/javascript\">

\t\t\$('.eliminarTarjeta').on('click', function () {
\t\t\tif (confirm('Esta seguro que quiere Eliminar esta tarjeta?'))
\t\t\t\tsubmitEliminarTarjeta(\$(this).data('id-tarjeta'));
\t\t});

\t\tfunction submitEliminarTarjeta(id)
\t\t{
\t\t\tvar _form = \$('form[id=form_delete_tarjeta]')
\t\t\tvar _action = \$(_form).attr('action');
\t\t\t_action = _action.replace(/__NAME__/, id);
\t\t\t\$(_form).attr('action', _action);
\t\t\t\$(_form).submit();
\t\t}

\t</script>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada:listaTorneoFechasConcluidas.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 91,  187 => 90,  166 => 71,  158 => 68,  155 => 67,  148 => 63,  143 => 62,  139 => 61,  131 => 57,  128 => 56,  125 => 55,  121 => 53,  118 => 52,  110 => 48,  107 => 47,  105 => 46,  102 => 45,  94 => 41,  91 => 40,  89 => 39,  84 => 37,  79 => 35,  75 => 33,  71 => 32,  52 => 15,  49 => 13,  46 => 11,  37 => 7,  33 => 5,  30 => 4,);
    }
}
