<?php

/* partials/footer.twig */
class __TwigTemplate_32270de4f3f55822820417c83043e2ba8d441400a6586e8ee34ce025c087f6ba extends Twig_Template
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
        // line 2
        echo twig_include($this->env, $context, "partials/analytics.twig", array(), true, true);
        echo "

<!--[if lt IE 9]>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js\"></script>
<script src=\"//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js\"></script>
<![endif]-->

";
        // line 10
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "scripts", array())) {
            // line 11
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 12
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["script"], "src", array()), "html", null, true);
                echo "\"";
                if ($this->getAttribute($context["script"], "async", array())) {
                    echo " async";
                }
                echo "></script>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 15
        echo "
";
        // line 17
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "scripts", array())) {
            // line 18
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 19
                echo "    <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["script"], "src", array()), "html", null, true);
                echo "\"";
                if ($this->getAttribute($context["script"], "async", array())) {
                    echo " async";
                }
                echo "></script>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 22
        echo "
";
        // line 24
        echo "<script>document.addEventListener(\"DOMContentLoaded\",function(){cookieChoices.showCookieConsentBar(\"This website use cookies to give you the best experience.\",\"OK\",\"Learn more\",\"http://www.allaboutcookies.org\")});</script>

</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "partials/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 24,  74 => 22,  60 => 19,  55 => 18,  53 => 17,  50 => 15,  36 => 12,  31 => 11,  29 => 10,  19 => 2,);
    }
}
/* {# Google Analytics #}*/
/* {{ include('partials/analytics.twig', ignore_missing = true) }}*/
/* */
/* <!--[if lt IE 9]>*/
/* <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/* <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>*/
/* <![endif]-->*/
/* */
/* {# Site wide Javascript #}*/
/* {% if site.scripts %}*/
/*     {% for script in site.scripts %}*/
/*     <script src="{{ script.src }}"{% if script.async %} async{% endif %}></script>*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* {# Page specific Javascript #}*/
/* {% if page.scripts %}*/
/*     {% for script in page.scripts %}*/
/*     <script src="{{ script.src }}"{% if script.async %} async{% endif %}></script>*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* {# Cookie Choices #}*/
/* <script>document.addEventListener("DOMContentLoaded",function(){cookieChoices.showCookieConsentBar("This website use cookies to give you the best experience.","OK","Learn more","http://www.allaboutcookies.org")});</script>*/
/* */
/* </body>*/
/* </html>*/
/* */
