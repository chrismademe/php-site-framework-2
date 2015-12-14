<?php

/* partials/header.twig */
class __TwigTemplate_338f25ab664810a9ad2f27e0a60c75a8ee745dc85a39346fa3831bb18d1b6e81 extends Twig_Template
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
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "description", array())) {
            // line 11
            echo "        <meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "description", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 13
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "keywords", array())) {
            // line 14
            echo "        <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "keywords", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 16
        echo "    ";
        if ($this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "canonical", array())) {
            // line 17
            echo "        <link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "meta", array()), "canonical", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 19
        echo "
    ";
        // line 21
        echo "    ";
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "styles", array())) {
            // line 22
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "styles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["stylesheet"]) {
                // line 23
                echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["stylesheet"], "src", array()), "html", null, true);
                echo "\">
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stylesheet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        }
        // line 26
        echo "
    ";
        // line 28
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "styles", array())) {
            // line 29
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "styles", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["stylesheet"]) {
                // line 30
                echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["stylesheet"], "src", array()), "html", null, true);
                echo "\">
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stylesheet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "    ";
        }
        // line 33
        echo "
    ";
        // line 35
        echo "    <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-57x57.png\">
    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-76x76.png\">
    <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-120x120.png\">
    <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-152x152.png\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/apple-touch-icon-180x180.png\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["site"]) ? $context["site"] : null), "assets", array()), "html", null, true);
        echo "/images/icons/favicon.ico\">

    ";
        // line 43
        echo "    ";
        echo twig_include($this->env, $context, "partials/meta-facebook.twig", array(), true, true);
        echo "
    ";
        // line 44
        echo twig_include($this->env, $context, "partials/meta-twitter.twig", array(), true, true);
        echo "

</head>
<body class=\"page-";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slug", array()), "html", null, true);
        echo "\">

    ";
        // line 49
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
        return array (  150 => 49,  145 => 47,  139 => 44,  134 => 43,  129 => 40,  125 => 39,  121 => 38,  117 => 37,  113 => 36,  108 => 35,  105 => 33,  102 => 32,  93 => 30,  88 => 29,  85 => 28,  82 => 26,  79 => 25,  70 => 23,  65 => 22,  62 => 21,  59 => 19,  53 => 17,  50 => 16,  44 => 14,  41 => 13,  35 => 11,  33 => 10,  29 => 9,  19 => 1,);
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
/*     {% if page.meta.description %}*/
/*         <meta name="description" content="{{ page.meta.description }}">*/
/*     {% endif %}*/
/*     {% if page.meta.keywords %}*/
/*         <meta name="keywords" content="{{ page.meta.keywords }}">*/
/*     {% endif %}*/
/*     {% if page.meta.canonical %}*/
/*         <link rel="canonical" href="{{ page.meta.canonical }}">*/
/*     {% endif %}*/
/* */
/*     {# Site wide stylesheets #}*/
/*     {% if site.styles %}*/
/*         {% for stylesheet in site.styles %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ stylesheet.src }}">*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/*     {# Page specific stylesheets #}*/
/*     {% if page.styles %}*/
/*         {% for stylesheet in page.styles %}*/
/*         <link rel="stylesheet" type="text/css" href="{{ stylesheet.src }}">*/
/*         {% endfor %}*/
/*     {% endif %}*/
/* */
/*     {# Touch icons & Favicon #}*/
/*     <link rel="apple-touch-icon" sizes="57x57" href="{{ site.assets }}/images/icons/apple-touch-icon-57x57.png">*/
/*     <link rel="apple-touch-icon" sizes="76x76" href="{{ site.assets }}/images/icons/apple-touch-icon-76x76.png">*/
/*     <link rel="apple-touch-icon" sizes="120x120" href="{{ site.assets }}/images/icons/apple-touch-icon-120x120.png">*/
/*     <link rel="apple-touch-icon" sizes="152x152" href="{{ site.assets }}/images/icons/apple-touch-icon-152x152.png">*/
/*     <link rel="apple-touch-icon" sizes="180x180" href="{{ site.assets }}/images/icons/apple-touch-icon-180x180.png">*/
/*     <link rel="icon" type="image/x-icon" href="{{ site.assets }}/images/icons/favicon.ico">*/
/* */
/*     {# Facebook & Twitter Open Graph tags #}*/
/*     {{ include('partials/meta-facebook.twig', ignore_missing = true) }}*/
/*     {{ include('partials/meta-twitter.twig', ignore_missing = true) }}*/
/* */
/* </head>*/
/* <body class="page-{{ page.slug }}">*/
/* */
/*     {{ include('partials/browser-update.twig', ignore_missing = true) }}*/
/* */
