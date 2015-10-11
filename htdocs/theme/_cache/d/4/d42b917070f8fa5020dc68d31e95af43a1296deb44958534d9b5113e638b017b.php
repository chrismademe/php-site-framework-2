<?php

/* partials/header.twig */
class __TwigTemplate_55ad82ce424710860d7e58a138e316860e295e2b9140b4d3debbd6c2a79da615 extends Twig_Template
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
        echo "<!doctype html>
<html>
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"x-ua-compatible\" content=\"ie=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "title", array()), "html", null, true);
        echo "</title>
    ";
        // line 10
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description", array())) {
            echo "<meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "description", array()), "html", null, true);
            echo "\">";
        }
        // line 11
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords", array())) {
            echo "<meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "keywords", array()), "html", null, true);
            echo "\">";
        }
        // line 12
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "canonical", array())) {
            echo "<link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "canonical", array()), "html", null, true);
            echo "\">";
        }
        // line 13
        echo "
    ";
        // line 15
        echo "    ";
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "styles", array())) {
            // line 16
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "styles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["stylesheet"]) {
                // line 17
                echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
                echo twig_escape_filter($this->env, $context["stylesheet"], "html", null, true);
                echo "\">
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stylesheet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    ";
        }
        // line 20
        echo "
    ";
        // line 22
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "styles", array())) {
            // line 23
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "styles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["stylesheet"]) {
                // line 24
                echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
                echo twig_escape_filter($this->env, $context["stylesheet"], "html", null, true);
                echo "\">
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stylesheet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "    ";
        }
        // line 27
        echo "
    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-57x57.png\">
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-76x76.png\">
    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-120x120.png\">
    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-152x152.png\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-180x180.png\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">

    ";
        // line 35
        echo twig_include($this->env, $context, "partials/meta-facebook.twig", array(), true, true);
        echo "
    ";
        // line 36
        echo twig_include($this->env, $context, "partials/meta-twitter.twig", array(), true, true);
        echo "
    ";
        // line 37
        echo twig_include($this->env, $context, "partials/analytics.twig", array(), true, true);
        echo "

    <!--[if lt IE 9]>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js\"></script>
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->

</head>
<body class=\"page-";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug", array()), "html", null, true);
        echo "\">

    ";
        // line 47
        echo twig_include($this->env, $context, "partials/browser-update.twig", array(), true, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "partials/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 47,  143 => 45,  132 => 37,  128 => 36,  124 => 35,  118 => 32,  114 => 31,  110 => 30,  106 => 29,  102 => 28,  99 => 27,  96 => 26,  87 => 24,  82 => 23,  79 => 22,  76 => 20,  73 => 19,  64 => 17,  59 => 16,  56 => 15,  53 => 13,  46 => 12,  39 => 11,  33 => 10,  29 => 9,  19 => 1,);
    }
}
/* <!doctype html>*/
/* <html>*/
/* <head>*/
/* */
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="x-ua-compatible" content="ie=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* */
/*     <title>{{ page.meta.title }}</title>*/
/*     {% if page.description %}<meta name="description" content="{{ page.description }}">{% endif %}*/
/*     {% if page.keywords %}<meta name="keywords" content="{{ page.keywords }}">{% endif %}*/
/*     {% if page.canonical %}<link rel="canonical" href="{{ page.canonical }}">{% endif %}*/
/* */
/*     {# Site wide stylesheets #}*/
/*     {% if site.styles %}*/
/*         {% for stylesheet in site.styles %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ stylesheet }}">*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/*     {# Page specific stylesheets #}*/
/*     {% if page.styles %}*/
/*         {% for stylesheet in page.styles %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ stylesheet }}">*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/*     <link rel="apple-touch-icon" sizes="57x57" href="{{ site.assets }}/images/icons/apple-touch-icon-57x57.png">*/
/*     <link rel="apple-touch-icon" sizes="76x76" href="{{ site.assets }}/images/icons/apple-touch-icon-76x76.png">*/
/*     <link rel="apple-touch-icon" sizes="120x120" href="{{ site.assets }}/images/icons/apple-touch-icon-120x120.png">*/
/*     <link rel="apple-touch-icon" sizes="152x152" href="{{ site.assets }}/images/icons/apple-touch-icon-152x152.png">*/
/*     <link rel="apple-touch-icon" sizes="180x180" href="{{ site.assets }}/images/icons/apple-touch-icon-180x180.png">*/
/*     <link rel="icon" type="image/x-icon" href="/favicon.ico">*/
/* */
/*     {{ include('partials/meta-facebook.twig', ignore_missing = true) }}*/
/*     {{ include('partials/meta-twitter.twig', ignore_missing = true) }}*/
/*     {{ include('partials/analytics.twig', ignore_missing = true) }}*/
/* */
/*     <!--[if lt IE 9]>*/
/*     <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/*     <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* </head>*/
/* <body class="page-{{ page.slug }}">*/
/* */
/*     {{ include('partials/browser-update.twig', ignore_missing = true) }}*/
/* */
