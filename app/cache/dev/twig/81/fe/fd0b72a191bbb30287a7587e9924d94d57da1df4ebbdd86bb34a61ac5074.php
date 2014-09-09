<?php

/* GolfEnLaNubeBundle:TorneoFecha:edit.html.twig */
class __TwigTemplate_81fefd0b72a191bbb30287a7587e9924d94d57da1df4ebbdd86bb34a61ac5074 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GolfEnLaNubeBundle::layout.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'page_header' => array($this, 'block_page_header'),
            'body' => array($this, 'block_body'),
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
        echo "\t<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/jquery-ui-1.10.4.custom.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t<link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/select2/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t<link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/css/select2/select2-bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
\t";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'stylesheet');
        echo "
";
    }

    // line 10
    public function block_javascripts($context, array $blocks = array())
    {
        // line 11
        echo "\t<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/jquery-ui-1.10.4.custom.min.js"), "html", null, true);
        echo "\" ></script>
\t<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/golfenlanube/js/select2/select2.min.js"), "html", null, true);
        echo "\" ></script>
\t";
        // line 13
        echo $this->env->getExtension('genemu.twig.extension.form')->renderJavascript((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")));
        echo "
";
    }

    // line 16
    public function block_page_header($context, array $blocks = array())
    {
        // line 17
        echo "<h3>Modificar datos de jornada</h3>
";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "
\t<div class='row'>
\t\t<div class='col-md-12'>
\t\t    ";
        // line 24
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form_start', array("style" => "horizontal"));
        echo "
\t\t\t    ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "fecha"), 'row');
        echo "
\t\t\t    ";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "hoyos"), 'row');
        echo "
\t\t\t    ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "cancha"), 'row');
        echo "
\t\t\t    ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "jugadores_por_linea"), 'row');
        echo "
\t\t\t    
\t\t    \t<div class='form-group'>
\t\t\t\t\t<label class=\"control-label col-md-2 required\" >Salidas simult&aacute;neas</label>
\t\t\t\t\t<div class='col-md-10'>
\t\t\t\t\t\t";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "salidas_simultaneas"), 'widget');
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'row');
        echo "
\t\t\t\t
\t\t\t\t";
        // line 38
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "submit"), 'row');
        echo "
\t\t\t</form>\t    
\t\t</div>
\t</div>

\t<div class='row'>
\t\t<div class='col-md-12'>
\t\t\t<ul class=\"list-inline record_actions\">
\t\t\t\t<li>
\t\t\t        <a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_torneo_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "torneo"), "id"))), "html", null, true);
        echo "\">
\t\t\t            Volver
\t\t\t        </a>
\t\t\t    </li>
   \t\t\t    ";
        // line 51
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_ELIMINAR_TORNEO")) {
            echo "<li>";
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
            echo "</li>";
        }
        // line 52
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:TorneoFecha:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 52,  141 => 51,  134 => 47,  122 => 38,  117 => 36,  111 => 33,  103 => 28,  99 => 27,  95 => 26,  91 => 25,  87 => 24,  82 => 21,  79 => 20,  74 => 17,  71 => 16,  65 => 13,  61 => 12,  56 => 11,  53 => 10,  47 => 7,  43 => 6,  39 => 5,  34 => 4,  31 => 3,);
    }
}
