<?php

/* homepage.twig */
class __TwigTemplate_1b7767d5cd70f2089f43e6c413ca3e68d68c5c9699c476aef076960d82b0196d extends Twig_Template
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
        return array (  24 => 3,  19 => 1,);
    }
}
/* {{ include('partials/header.twig') }}*/
/* */
/* {{ include('partials/footer.twig') }}*/
/* */
