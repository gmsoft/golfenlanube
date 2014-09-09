<?php

/* BraincraftedBootstrapBundle::flash.html.twig */
class __TwigTemplate_8f5956f132f5cb312298e284898e07059fdcdb30848c193c69df93567f02403d extends Twig_Template
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
        if ((!array_key_exists("translation_domain", $context))) {
            // line 2
            echo "    ";
            $context["translation_domain"] = null;
        }
        // line 4
        if ((!array_key_exists("close", $context))) {
            // line 5
            echo "    ";
            $context["close"] = false;
        }
        // line 7
        echo "
";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 9
            echo "    <div class=\"alert alert-warning\">
        ";
            // line 10
            if ((isset($context["close"]) ? $context["close"] : $this->getContext($context, "close"))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
            }
            // line 11
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "    <div class=\"alert alert-danger\">
        ";
            // line 17
            if ((isset($context["close"]) ? $context["close"] : $this->getContext($context, "close"))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
            }
            // line 18
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 23
            echo "    <div class=\"alert alert-info\">
        ";
            // line 24
            if ((isset($context["close"]) ? $context["close"] : $this->getContext($context, "close"))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
            }
            // line 25
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "
";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 30
            echo "    <div class=\"alert alert-success\">
        ";
            // line 31
            if ((isset($context["close"]) ? $context["close"] : $this->getContext($context, "close"))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
            }
            // line 32
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), array(), (isset($context["translation_domain"]) ? $context["translation_domain"] : $this->getContext($context, "translation_domain"))), "html", null, true);
            echo "
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "BraincraftedBootstrapBundle::flash.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 30,  106 => 29,  103 => 28,  86 => 23,  69 => 18,  62 => 16,  55 => 14,  41 => 10,  38 => 9,  31 => 7,  27 => 5,  25 => 4,  21 => 2,  19 => 1,  461 => 6,  459 => 5,  455 => 4,  444 => 3,  434 => 187,  424 => 185,  419 => 181,  416 => 180,  406 => 176,  403 => 175,  400 => 174,  397 => 173,  395 => 172,  392 => 171,  380 => 169,  374 => 165,  370 => 163,  366 => 161,  362 => 159,  360 => 158,  358 => 157,  356 => 156,  354 => 155,  350 => 152,  346 => 150,  342 => 148,  338 => 146,  334 => 144,  331 => 142,  327 => 141,  324 => 138,  322 => 137,  319 => 134,  316 => 132,  314 => 131,  312 => 129,  309 => 126,  306 => 124,  304 => 123,  301 => 121,  299 => 120,  296 => 118,  294 => 117,  291 => 115,  288 => 113,  286 => 112,  284 => 111,  282 => 109,  279 => 108,  275 => 105,  273 => 104,  256 => 101,  239 => 100,  237 => 99,  234 => 97,  232 => 96,  230 => 94,  228 => 93,  225 => 91,  216 => 86,  213 => 85,  211 => 84,  208 => 83,  199 => 77,  194 => 76,  191 => 75,  188 => 74,  186 => 73,  183 => 72,  175 => 67,  171 => 66,  168 => 65,  163 => 63,  161 => 62,  158 => 61,  155 => 60,  149 => 58,  146 => 57,  141 => 55,  135 => 53,  129 => 51,  126 => 50,  120 => 48,  117 => 32,  114 => 46,  111 => 45,  108 => 44,  105 => 43,  102 => 42,  99 => 41,  93 => 25,  90 => 38,  87 => 37,  84 => 36,  82 => 22,  76 => 33,  74 => 32,  71 => 31,  67 => 28,  61 => 25,  54 => 22,  44 => 13,  42 => 12,  187 => 82,  182 => 70,  177 => 59,  172 => 19,  166 => 64,  159 => 83,  157 => 82,  152 => 59,  148 => 79,  144 => 56,  138 => 54,  136 => 73,  132 => 52,  130 => 70,  125 => 67,  123 => 49,  115 => 60,  113 => 31,  95 => 44,  81 => 36,  65 => 17,  63 => 21,  58 => 15,  53 => 17,  47 => 13,  32 => 7,  24 => 1,  96 => 40,  89 => 24,  85 => 21,  79 => 21,  72 => 19,  70 => 18,  60 => 20,  56 => 23,  51 => 17,  45 => 11,  43 => 12,  39 => 11,  37 => 9,  34 => 8,  29 => 3,);
    }
}
