<?php

/* GolfEnLaNubeBundle:Temporada/equipo:form_jugadores_de_club.html.twig */
class __TwigTemplate_83819d5dd52ef810d224fdaf5987774a0091116e2a4756ba9ce865efcb2f24da extends Twig_Template
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
        echo "<table class='table'>
\t<tbody>
\t\t<tr>
\t\t\t<th colspan='3'><h4>Titulares</h4></th>
\t\t</tr>
\t\t";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form_jugadores"]) ? $context["form_jugadores"] : $this->getContext($context, "form_jugadores")));
        foreach ($context['_seq'] as $context["_key"] => $context["tfj"]) {
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "titular"), "vars"), "value") == true)) {
                // line 7
                echo "\t\t\t<tr>
\t\t\t\t<td class='col-lg-10'>
\t\t\t\t\t";
                // line 9
                if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "capitan_equipo"), "vars"), "value") == true)) {
                    echo "<strong><small>Capitan del equipo</small></strong>";
                }
                echo "\t
\t\t\t\t\t";
                // line 10
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador"), 'widget', array("attr" => array("class" => "jugador")));
                echo "
\t\t\t\t</td>
\t\t\t\t<td  class='col-sm-2' style='vertical-align: bottom'>
\t\t\t\t\t";
                // line 13
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "handicap_de_juego"), 'widget', array("attr" => array("placeholder" => "HCP", "class" => "handicap hcp_titular")));
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
                // line 16
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "capitan_equipo"), 'widget');
                echo "
\t\t\t";
                // line 17
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "titular"), 'widget');
                echo "
\t\t\t";
                // line 18
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "torneo_fecha"), 'widget');
                echo "
\t\t\t";
                // line 19
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "club"), 'widget');
                echo "
\t\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tfj'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "\t\t<tr>
\t\t\t<th colspan='3'><h4>Suplentes</h4></th>
\t\t</tr>
\t\t";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form_jugadores"]) ? $context["form_jugadores"] : $this->getContext($context, "form_jugadores")));
        foreach ($context['_seq'] as $context["_key"] => $context["tfj"]) {
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "titular"), "vars"), "value") == false)) {
                // line 25
                echo "\t\t\t<tr>
\t\t\t\t<td  class='col-lg-10'>
\t\t\t\t\t";
                // line 27
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "jugador"), 'widget', array("attr" => array("class" => "jugador suplente")));
                echo "
\t\t\t\t</td>
\t\t\t\t<td  class='col-sm-1'>
\t\t\t\t\t";
                // line 30
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "handicap_de_juego"), 'widget', array("attr" => array("placeholder" => "HCP", "class" => "handicap hcp_suplente")));
                echo "
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t";
                // line 33
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "capitan_equipo"), 'widget');
                echo "
\t\t\t";
                // line 34
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "titular"), 'widget');
                echo "
\t\t\t";
                // line 35
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "torneo_fecha"), 'widget');
                echo "
\t\t\t";
                // line 36
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["tfj"]) ? $context["tfj"] : $this->getContext($context, "tfj")), "club"), 'widget');
                echo "
\t\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tfj'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "
\t</tbody>
</table>

";
        // line 42
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form_jugadores"]) ? $context["form_jugadores"] : $this->getContext($context, "form_jugadores")));
        echo "

<script type=\"text/javascript\">

\t\$('select.jugador').on('change', function () {

\t\tvar input_handicap = \$(this).parent().parent().find('.handicap');

\t\tsetearHandicapDeJuego(input_handicap, this);
\t\t
\t\tif (jugadorYaFueSeleccionado(this))
\t\t{
\t\t\talert(\"No puede seleccionar 2 veces al mismo jugador\");
\t\t\t\$(this).select2(\"val\", \"\");
\t\t\t\$(this).select2(\"open\");
\t\t}

\t\tif ( alMenosUnJugadorSeleccionado() )
\t\t{
\t\t\t\$('button:submit').removeClass('disabled');
\t\t} else {
\t\t\tif ( ! \$('button:submit').hasClass('disabled')) \$('button:submit').addClass('disabled');
\t\t}
\t\t
\t});


\tif ( alMenosUnJugadorSeleccionado() )
\t{
\t\t\$('button:submit').removeClass('disabled');
\t} else {
\t\tif ( ! \$('button:submit').hasClass('disabled')) \$('button:submit').addClass('disabled');
\t}
\t

\tfunction setearHandicapDeJuego(input_handicap, jugador)
\t{
\t\tvar id_jugador = \$(jugador).find('option:selected').val() ;

\t\tif ( id_jugador == '' ) 
\t\t{
\t\t\t\$(input_handicap).val('');
\t\t} else {
\t\t\t\$.ajax ({
\t\t\t\turl: '";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_obtener_handicap_de_juego", array("id_torneo_fecha" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofecha"), "id"))), "html", null, true);
        echo "',
\t\t\t\tdata: { 'id_jugador': id_jugador },
\t\t\t\tsuccess: function (response) {
\t\t\t\t\t\$(input_handicap).val(response);
\t\t\t\t\t}\t
\t\t\t});
\t\t}
\t}
\t
\tfunction todosJugadoresSeleccionados()
\t{
\t\tvar ret = true; 
\t\t\$('select.jugador').each(function () {
\t\t\tif ( ! \$(this).hasClass('suplente')) ret = ret && \$.isNumeric(\$(this).find(\"option:selected\").val()) ;
\t\t});
\t\treturn ret; 
\t}

\tfunction alMenosUnJugadorSeleccionado()
\t{
\t\tvar ret = false; 
\t\t\$('select.jugador').each(function () {
\t\t\tif ( \$.isNumeric(\$(this).find(\"option:selected\").val())) ret = true ;
\t\t});
\t\treturn ret; 
\t}

\tfunction jugadorYaFueSeleccionado(select_jugador)
\t{
\t\tvar ret = false ; 
\t\t\$('select.jugador').each(function () {
\t\t\tif ( \$(this).attr('id') != \$(select_jugador).attr('id') 
\t\t\t\t\t && \$(select_jugador).find('option:selected').val() == \$(this).find('option:selected').val() && \$(this).find('option:selected').val() != '') 
\t\t\t{
\t\t\t\tret = true;
\t\t\t}
\t\t});
\t\treturn ret; 
\t}

</script>";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada/equipo:form_jugadores_de_club.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 86,  127 => 42,  121 => 38,  112 => 36,  108 => 35,  104 => 34,  100 => 33,  94 => 30,  88 => 27,  84 => 25,  79 => 24,  74 => 21,  65 => 19,  61 => 18,  57 => 17,  53 => 16,  47 => 13,  41 => 10,  35 => 9,  31 => 7,  26 => 6,  19 => 1,);
    }
}
