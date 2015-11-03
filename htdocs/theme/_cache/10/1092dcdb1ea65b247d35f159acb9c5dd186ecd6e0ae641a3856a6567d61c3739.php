<?php

/* partials/meta-facebook.twig */
class __TwigTemplate_34ae655c4806ef49c8093bb9853dd12fa3137f9c4ba9ee2ed59c5a758ed90b67 extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "facebook", array())) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "facebook", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 3
                echo "    <meta property=\"og:";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "property", array()), "html", null, true);
                echo "\" content=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "content", array()), "html", null, true);
                echo "\">
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "partials/meta-facebook.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if page.meta.facebook %}*/
/*     {% for tag in page.meta.facebook %}*/
/*     <meta property="og:{{ tag.property }}" content="{{ tag.content }}">*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
