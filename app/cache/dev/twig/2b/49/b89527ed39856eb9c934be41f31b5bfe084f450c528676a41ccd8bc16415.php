<?php

/* GolfEnLaNubeBundle:Temporada/equipo:new.html.twig */
class __TwigTemplate_2b49b89527ed39856eb9c934be41f31b5bfe084f450c528676a41ccd8bc16415 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
            'genemu_jqueryselect2_javascript' => array($this, 'block_genemu_jqueryselect2_javascript'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
    public function block_genemu_jqueryselect2_javascript($context, array $blocks = array())
    {
        // line 4
        echo "
    <script type=\"text/javascript\">
        \$field = \$('input.jugador');

        var \$configs = ";
        // line 8
        echo twig_jsonencode_filter((isset($context["configs"]) ? $context["configs"] : $this->getContext($context, "configs")));
        echo ";

        // custom configs
        
        \$configs = \$.extend(\$configs, {
            query: function (query) {
                query.callback(data);
            }
        });
        // end of custom configs

        \$field.each(function (){ 
\t\t\t\$(this).select2(\$configs); });
    </script>

";
    }

    // line 25
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 26
        echo "\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/jquery-ui-1.10.4.custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t<link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/select2/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t<link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/select2/select2-bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'stylesheet');
        echo "
";
    }

    // line 32
    public function block_page_header($context, array $blocks = array())
    {
        // line 33
        echo "<h3>Configurar Equipo</h3>
\t<h4>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofecha"), "torneo"), "nombre"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofecha"), "fecha"), "d-m-Y"), "html", null, true);
        echo "  </h4>
";
    }

    // line 37
    public function block_body($context, array $blocks = array())
    {
        // line 39
        echo "<div class='row'>
\t\t<div class='col-md-12'>
\t\t\t";
        // line 42
        echo "\t\t\t";
        echo twig_include($this->env, $context, "GolfEnLaNubeBundle:Temporada/equipo:form.html.twig", array("form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))));
        echo "
\t\t</div>
\t</div>
    
\t<div class='row'>
\t\t<div class='col-md-12'>
\t
\t        <ul class=\"record_actions list-inline\">
\t\t\t    <li>
\t\t\t        <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_lista_equipos_por_torneo_fecha", array("id_torneo_fecha" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofecha"), "id"))), "html", null, true);
        echo "\">
\t\t\t            Volver
\t\t\t        </a>
\t\t\t    </li>
\t\t\t</ul>
";
    }

    // line 58
    public function block_javascripts($context, array $blocks = array())
    {
        // line 59
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/jquery-ui-1.10.4.custom.min.js"), "html", null, true);
        echo "\" ></script>
\t<script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/select2/select2.min.js"), "html", null, true);
        echo "\" ></script>

\t<script type=\"text/javascript\">

\t\tfunction cargarListaJugadoresPorClub(id_club)
\t\t{
\t\t\tvar _url = '";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_temporada_formulario_jugadores_para_equipo", array("id_torneo_fecha" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneofecha"), "id"))), "html", null, true);
        echo "?id_club=' + id_club; 
\t\t\t\$('#lista_jugadores').load(_url);
\t\t}
\t
\t\t\$('#par3_golfenlanubebundle_equipo_temporada_club').on('change', function () {
\t\t\tcargarListaJugadoresPorClub(\$(this).find('option:selected').val());
\t\t});

\t\t\$(document).ready(function () {
\t\t\tcargarListaJugadoresPorClub( \$('#par3_golfenlanubebundle_equipo_temporada_club option:selected').val() );
\t\t});

\t\tfunction soloUnJugadorHcpMayorA( limite )
\t\t{
\t\t\tvar cant = 0 ;
\t\t\t\$('input.handicap.hcp_titular').each(function () {
\t\t\t\t if (\$(this).val() >= limite)

\t\t\t\t\t ++ cant; 
\t\t\t\t
\t\t\t\t});
\t\t\treturn (cant <= 1); 
\t\t}

\t\tfunction handicapsDentroDeLimitesPermitidos( min, max )
\t\t{
\t\t\tvar ret = true; 
\t\t\t\$('input.handicap').each(function () {
\t\t\t\tvar valor = \$.trim(\$(this).val());
\t\t\t\tif ( valor != '' && (parseInt(valor) < min || parseInt(valor) > max) ) ret = false;
\t\t\t});
\t\t\treturn ret; 
\t\t\t
\t\t}
\t\t
\t\t\$('form').on('submit' , function(e) 
\t\t{
\t\t\tif (!soloUnJugadorHcpMayorA(21))
\t\t\t{ 
\t\t\t\te.preventDefault();
\t\t\t\talert('Solo un jugador puede tener jugar con handicap mayor a 21');
\t\t\t}

\t\t\tif (!handicapsDentroDeLimitesPermitidos( -5, 24 ))
\t\t\t{
\t\t\t\te.preventDefault();
\t\t\t\talert('Los handicaps estan fuera de los límites permitidos. El handicap máximo disponible es 24'); 
\t\t\t} 
\t\t});
\t</script>
\t";
        // line 116
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        echo "
\t
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada/equipo:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 116,  144 => 66,  135 => 60,  130 => 59,  127 => 58,  117 => 51,  104 => 42,  100 => 39,  97 => 37,  89 => 34,  86 => 33,  83 => 32,  77 => 29,  73 => 28,  69 => 27,  64 => 26,  61 => 25,  41 => 8,  35 => 4,  32 => 3,);
    }
}
