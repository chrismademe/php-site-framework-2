<?php

/* homepage.twig */
class __TwigTemplate_09f8d37d2718710e894f536f71c06931e0afb778b63f708afec2ef7f7b7d545a extends Twig_Template
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
        echo twig_include($this->env, $context, "partials/header.twig");
        echo "

";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["hello_world"]) ? $context["hello_world"] : null), "html", null, true);
        echo "

";
        // line 5
        echo twig_include($this->env, $context, "partials/footer.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "homepage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  24 => 3,  19 => 1,);
    }
}
/* {{ include('partials/header.twig') }}*/
/* */
/* {{ hello_world }}*/
/* */
/* {{ include('partials/footer.twig') }}*/
/* */
