<?php

/* homepage.twig */
class __TwigTemplate_6d5e5b833cb5f95514fd19923c94b765c7fe3276f69db1bb7295c026b01e8d56 extends Twig_Template
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
