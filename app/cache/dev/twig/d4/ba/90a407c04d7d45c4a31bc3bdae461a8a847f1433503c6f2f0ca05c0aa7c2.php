<?php

/* GolfEnLaNubeBundle:TorneoFecha:showDetalleDiaTab.html.twig */
class __TwigTemplate_d4ba90a407c04d7d45c4a31bc3bdae461a8a847f1433503c6f2f0ca05c0aa7c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "<style> 
\ttr.totales_jugador:hover {
\t\tcursor:pointer;
\t\tcolor: #428BCA; 
\t}
</style>
";
    }

    // line 12
    public function block_page_header($context, array $blocks = array())
    {
        // line 13
        echo "<h4>Dia 1 - Circuito Par 3 (07/09/2014) - Temporada 2014</h4>
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "<div class='row '>
\t\t<div class='col-lg-12'>
\t\t
\t\t\t<ul id='resultados' class=\"nav nav-tabs\">
\t\t\t  <li><a href=\"#neto\" data-toggle=\"tab\">Netos Individuales</a></li>
                          <li><a href=\"#neto-club\" data-toggle=\"tab\">Resultados por Club Neto</a></li>
                          <li><a href=\"#gross\" data-toggle=\"tab\">Gross Individuales</a></li>
                          <li><a href=\"#gross-club\" data-toggle=\"tab\">Resultados por Club Gross</a></li>
\t\t\t</ul>

\t\t\t<!-- Tab panes -->
\t\t\t<div class=\"tab-content\">
\t\t\t  <div class=\"tab-pane active\" id=\"neto\"></div>
\t\t\t  <div class=\"tab-pane\" id=\"neto-club\"></div>
\t\t\t</div>
\t\t</div>
\t</div>

\t\t
\t<div class=\"modal fade \" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\">
\t  <div class=\"modal-dialog\">
\t    <div class=\"modal-content\">

\t    </div>
\t  </div>
\t</div>
\t
";
    }

    // line 46
    public function block_javascripts($context, array $blocks = array())
    {
        // line 47
        echo "<script type=\"text/javascript\">

\t\$('#resultados a').click(function (e) {
\t  e.preventDefault()
\t  \$(this).tab('show')
\t});

\tfunction toggleDetallesHoyoxhoyo(id_tarjeta)
\t{
\t\tvar tr_detalles = \$('.detalles_hoyoxhoyo[data-id-tarjeta=' + id_tarjeta + ']');

\t\t\$(tr_detalles).toggle();
\t\t//if ( \$(tr_detalles).hasClass('hidden') ) \$(tr_detalles).removeClass('hidden');
\t\t//else \$(tr_detalles).addClass('hidden'); 
\t}
\t
\t\$(document).on('click', '.totales_jugador',  function () {
\t\t\tvar id_tarjeta = \$(this).attr('data-id-tarjeta');
\t\t\ttoggleDetallesHoyoxhoyo(id_tarjeta);
\t});
\t\t
</script>


";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:showDetalleDiaTab.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 47,  86 => 46,  55 => 17,  52 => 16,  47 => 13,  44 => 12,  34 => 4,  31 => 3,);
    }
}
