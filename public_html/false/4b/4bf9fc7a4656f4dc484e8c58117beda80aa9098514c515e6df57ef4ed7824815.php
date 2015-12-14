<?php

/* partials/meta-twitter.twig */
class __TwigTemplate_ae8d4031daaa4cf8a5ad43105ffc841b6b3f149ae4adb6630dbfa6c7e25a6201 extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "twitter", array())) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "twitter", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 3
                echo "    <meta name=\"twitter:";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], "name", array()), "html", null, true);
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
        return "partials/meta-twitter.twig";
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
/* {% if page.meta.twitter %}*/
/*     {% for tag in page.meta.twitter %}*/
/*     <meta name="twitter:{{ tag.name }}" content="{{ tag.content }}">*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
