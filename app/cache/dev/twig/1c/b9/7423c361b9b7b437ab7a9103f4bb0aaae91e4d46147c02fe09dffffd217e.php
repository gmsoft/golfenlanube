<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_1cb97423c361b9b7b437ab7a9103f4bb0aaae91e4d46147c02fe09dffffd217e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 6
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 7
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
";
        }
        // line 9
        echo "
\t    <div class=\"container\">
\t
\t      <form  action=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\" method=\"post\"  class=\"form-signin\" role=\"form\">
\t          <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />
\t      
\t        <h2 class=\"form-signin-heading\">Ingresar</h2>
\t        <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" class=\"form-control\" placeholder=\"Usuario\" autofocus>
\t        <input type=\"password\" class=\"form-control\" placeholder=\"Password\"  id=\"password\" name=\"_password\" required=\"required\" >
\t        <label class=\"checkbox\">
\t          <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" > Recordarme </label>
\t        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"Ingresar\" >Iniciar sesión</button>
\t      </form>
\t
\t    </div> <!-- /container -->



";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 16,  48 => 13,  44 => 12,  39 => 9,  33 => 7,  31 => 6,  28 => 5,);
    }
}
