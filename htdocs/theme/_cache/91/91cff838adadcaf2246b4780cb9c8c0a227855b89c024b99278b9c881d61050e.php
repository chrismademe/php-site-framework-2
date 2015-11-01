<?php

/* partials/browser-update.twig */
class __TwigTemplate_ce5b15a13f4517bd9ff5f52d631daa327b657af2f72d96a4b9b068fed0ac504e extends Twig_Template
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
        echo "<!--[if lt IE ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ie"]) ? $context["ie"] : null), "min", array()), "html", null, true);
        echo "]>
<div id=\"browser-warning\">
\t<h1>Your browser is out of date</h1>
\t<p>This website has been built for modern browsers, yours is many years out of date and as a result, your experience of this website will be poor.</p>
\t<p>Please <a href=\"http://browsehappy.com/\" target=\"_blank\">upgrade your browser</a> and pop back.</p>
\t<p>Thanks.</p>
</div>
<![endif]-->
";
        // line 9
        if ($this->getAttribute((isset($context["ie"]) ? $context["ie"] : null), "strict", array())) {
            echo "<!--[if gt IE 8]><!-->";
        }
    }

    public function getTemplateName()
    {
        return "partials/browser-update.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 9,  19 => 1,);
    }
}
/* <!--[if lt IE {{ ie.min }}]>*/
/* <div id="browser-warning">*/
/* 	<h1>Your browser is out of date</h1>*/
/* 	<p>This website has been built for modern browsers, yours is many years out of date and as a result, your experience of this website will be poor.</p>*/
/* 	<p>Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> and pop back.</p>*/
/* 	<p>Thanks.</p>*/
/* </div>*/
/* <![endif]-->*/
/* {% if ie.strict %}<!--[if gt IE 8]><!-->{% endif %}*/
/* */
