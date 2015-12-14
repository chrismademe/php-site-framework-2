<?php

/* 404.twig */
class __TwigTemplate_33c18e1da1a265b53d739c89ac8ccc3075f2dac2c289c9b5659bb5efc9a89b46 extends Twig_Template
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

    <h1>404.</h1>
    <p>We couldn't find what you're looking for.</p>
    <p>Check you've spelt the address correctly, you came to: <br><code><i class=\"link icon space left\"></i> ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "domain", array()), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "path", array()), "html", null, true);
        echo "</code></p>
    <p>
        <a class=\"positive button\" href=\"/\"><i class=\"home icon space left\"></i> Homepage</a>
    </p>

";
        // line 10
        echo twig_include($this->env, $context, "partials/footer.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 10,  26 => 5,  19 => 1,);
    }
}
/* {{ include('partials/header.twig') }}*/
/* */
/*     <h1>404.</h1>*/
/*     <p>We couldn't find what you're looking for.</p>*/
/*     <p>Check you've spelt the address correctly, you came to: <br><code><i class="link icon space left"></i> {{ site.domain }}/{{ page.path }}</code></p>*/
/*     <p>*/
/*         <a class="positive button" href="/"><i class="home icon space left"></i> Homepage</a>*/
/*     </p>*/
/* */
/* {{ include('partials/footer.twig') }}*/
/* */
