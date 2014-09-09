<?php

/* GolfEnLaNubeBundle:Temporada/equipo:form.html.twig */
class __TwigTemplate_966c7349be5ef79e40f792519f9ecb54b95feb66d8d6abeb9c19d81458c659d0 extends Twig_Template
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
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("style" => "horizontal"));
        echo "

\t";
        // line 3
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
\t";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('braincrafted_bootstrap_form')->setLabelCol(2), "html", null, true);
        echo "
\t";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('braincrafted_bootstrap_form')->setWidgetCol(10), "html", null, true);
        echo "  

\t";
        // line 8
        echo "\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "temporada_club"), 'row');
        echo "
\t
\t<ul id='lista_jugadores' class=\"list-group\">
\t</ul>
\t
\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "submit"), 'widget', array("attr" => array("class" => "disabled")));
        echo "
\t";
        // line 15
        echo "\t";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "torneo_fecha"), 'widget');
        echo "
\t<!-- hidden -->
\t";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token"), 'widget');
        echo "
</form>
";
    }

    public function getTemplateName()
    {
        return "GolfEnLaNubeBundle:Temporada/equipo:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 17,  50 => 15,  46 => 13,  37 => 8,  28 => 4,  24 => 3,  19 => 1,  197 => 116,  144 => 66,  135 => 60,  130 => 59,  127 => 58,  117 => 51,  104 => 42,  100 => 39,  97 => 37,  89 => 34,  86 => 33,  83 => 32,  77 => 29,  73 => 28,  69 => 27,  64 => 26,  61 => 25,  41 => 8,  35 => 4,  32 => 5,);
    }
}
