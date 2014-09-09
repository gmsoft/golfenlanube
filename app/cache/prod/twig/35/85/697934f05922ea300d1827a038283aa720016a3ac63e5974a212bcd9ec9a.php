<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_3585697934f05922ea300d1827a038283aa720016a3ac63e5974a212bcd9ec9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
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
        echo "\" rel=\"stylesheet\" media=\"screen\">
\t    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/signin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
\t    
\t    <!-- link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Lato:400,700,300,600\" type=\"text/css\" />
  \t\t<link rel=\"stylesheet\" href=\"//fonts.googleapis.com/css?family=Comfortaa:400,700,300\" type=\"text/css\" / -->
\t    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/ajustes.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\"/>
\t    ";
        // line 18
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 19
        echo "
\t\t<!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
\t    ";
        // line 21
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 22
        echo "\t</head>
\t<body>
\t
\t\t<nav class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\" style=\"background-color: white\">
\t\t    <div class='container'>
\t\t\t\t<!-- Brand and toggle get grouped for better mobile display -->

\t
\t\t\t    <!-- Collect the nav links, forms, and other content for toggling -->
\t\t\t    <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
             ";
        // line 32
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 33
            echo "                Usuario: ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "username"), "html", null, true);
            echo " |
                <a href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\">
                    Salir
                </a>
            ";
        }
        // line 38
        echo "\t\t\t    
\t\t\t    </div><!-- /.navbar-collapse -->
\t\t    </div>
\t\t</nav>
\t\t\t


\t\t<div class='container' style='padding-bottom: 70px;'>
\t\t\t<div class='row'>
\t\t\t\t<div class='col-lg-12'>
\t\t\t\t\t
\t\t\t\t\t<div class='row'>
\t\t\t\t\t\t<div class='col-md-12'>
\t\t\t\t\t        ";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 52
            echo "\t\t\t\t\t            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 53
                echo "\t\t\t\t\t                <div class=\"flash-";
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
                echo "\">
\t\t\t\t\t                    ";
                // line 54
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : null), "html", null, true);
                echo "
\t\t\t\t\t                </div>
\t\t\t\t\t            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "\t\t\t\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 60
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

        \t\t\t";
        // line 63
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 65
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Bienvenido!";
    }

    // line 18
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 63
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 64
        echo "\t\t            ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 64,  164 => 63,  159 => 18,  153 => 7,  144 => 65,  142 => 63,  137 => 60,  134 => 58,  128 => 57,  119 => 54,  114 => 53,  109 => 52,  105 => 51,  90 => 38,  83 => 34,  78 => 33,  76 => 32,  64 => 22,  62 => 21,  58 => 19,  56 => 18,  52 => 17,  45 => 13,  41 => 12,  35 => 9,  30 => 7,  22 => 1,  54 => 16,  48 => 13,  44 => 12,  39 => 9,  33 => 7,  31 => 6,  28 => 5,);
    }
}
