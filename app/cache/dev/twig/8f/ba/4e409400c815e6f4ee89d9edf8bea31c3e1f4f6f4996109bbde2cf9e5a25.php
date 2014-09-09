<?php

/* GolfEnLaNubeBundle::layout.html.twig */
class __TwigTemplate_8fba4e409400c815e6f4ee89d9edf8bea31c3e1f4f6f4996109bbde2cf9e5a25 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
\t    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

\t    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

\t    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t
\t\t<!-- Bootstrap -->
\t    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t    <!-- link href=\"";
        // line 13
        echo "\" rel=\"stylesheet\" media=\"screen\" -->

\t    <!-- link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Lato:400,700,300,600\" type=\"text/css\" />
  \t\t<link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Comfortaa:400,700,300\" type=\"text/css\" / -->
\t    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/ajustes.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\"/>

\t\t";
        // line 19
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 20
        echo "\t\t<!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
\t    ";
        // line 21
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 22
        echo "\t</head>
\t<body>
\t\t<nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\" id=\"menuUsuario\">
\t\t    <div class='container'>
\t\t\t\t<!-- Brand and toggle get grouped for better mobile display -->
\t\t\t    <div class=\"navbar-header\">
\t\t\t        <button type=\"button\" class=\"navbar-toggle\"
\t\t\t                data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
\t\t\t            <span class=\"sr-only\">Toggle navigation</span>
\t\t\t            <span class=\"icon-bar\"></span>
\t\t\t            <span class=\"icon-bar\"></span>
\t\t\t            <span class=\"icon-bar\"></span>
\t\t\t        </button>
\t\t\t        <!-- a class=\"navbar-brand\" href=\"#\">Inicio</a -->
\t\t\t        <!-- a class=\"navbar-brand\" href=\"#\"><img width=\"101\" height=\"87\" src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/golfenlanube/images/logo-web.png"), "html", null, true);
        echo " \"></a -->
\t\t\t    </div>
\t
\t\t\t    <!-- Collect the nav links, forms, and other content for toggling -->
\t\t\t    <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
\t\t\t        ";
        // line 41
        echo $this->env->getExtension('knp_menu')->render("main", array("style" => "navbar"));
        echo "
\t\t\t\t    <ul class=\"nav navbar-nav navbar-right\">
\t\t\t\t    \t<li>
\t\t\t\t    \t\t<a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">Salir</a>
\t\t\t\t    \t</li>
\t\t\t\t    </ul>
\t\t\t        
\t\t\t    </div><!-- /.navbar-collapse -->
\t\t    </div>
\t\t</nav>

\t\t<div class='container' style='padding-bottom: 70px;'>
\t\t\t<div class='row'>
\t\t\t\t<div class='col-lg-12'>
\t\t\t\t\t
\t\t\t\t\t<div class='row '>
\t\t\t\t\t\t<div class='col-md-12 '>
\t\t\t\t\t\t\t<div class=\"page-header\">
\t\t\t\t\t\t\t\t";
        // line 59
        $this->displayBlock('page_header', $context, $blocks);
        // line 60
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class='row'>
\t\t\t\t\t\t<div class='col-md-12'>
\t\t\t\t\t\t";
        // line 66
        $this->env->loadTemplate("BraincraftedBootstrapBundle::flash.html.twig")->display(array_merge($context, array("close" => true)));
        // line 67
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

        \t\t\t";
        // line 70
        $this->displayBlock('body', $context, $blocks);
        // line 71
        echo "        \t\t</div>
        \t\t<!-- div id='publicidad' class='col-lg-4'>
        \t\t\t";
        // line 73
        echo "&nbsp; ";
        // line 74
        echo "        \t\t</div-->
        \t</div>
        </div>
        
\t\t<script src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/jquery-1.10.2.js"), "html", null, true);
        echo "\" ></script>
\t\t<script src=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/bootstrap.js"), "html", null, true);
        echo "\" ></script>
\t\t<script src=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/general.js"), "html", null, true);
        echo "\" ></script>
\t\t
\t\t";
        // line 82
        $this->displayBlock('javascripts', $context, $blocks);
        // line 83
        echo "\t\t
    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Bienvenido!";
    }

    // line 19
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 59
    public function block_page_header($context, array $blocks = array())
    {
    }

    // line 70
    public function block_body($context, array $blocks = array())
    {
    }

    // line 82
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 82,  182 => 70,  177 => 59,  172 => 19,  166 => 7,  159 => 83,  157 => 82,  152 => 80,  148 => 79,  144 => 78,  138 => 74,  136 => 73,  132 => 71,  130 => 70,  125 => 67,  123 => 66,  115 => 60,  113 => 59,  95 => 44,  81 => 36,  65 => 22,  63 => 21,  58 => 19,  53 => 17,  47 => 13,  32 => 7,  24 => 1,  96 => 24,  89 => 41,  85 => 21,  79 => 20,  72 => 19,  70 => 18,  60 => 20,  56 => 16,  51 => 13,  45 => 11,  43 => 12,  39 => 9,  37 => 9,  34 => 7,  29 => 3,);
    }
}
