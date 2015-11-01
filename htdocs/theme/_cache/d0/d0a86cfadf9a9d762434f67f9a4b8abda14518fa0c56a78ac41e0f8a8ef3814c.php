<?php

/* partials/footer.twig */
class __TwigTemplate_a39ae71f0cc77aa119e2d68fc1ece67cf9143bce0763b130384e0c1caec722b6 extends Twig_Template
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
        if ($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "scripts", array())) {
            // line 3
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["site"]) ? $context["site"] : null), "scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 4
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
        // line 7
        echo "
";
        // line 9
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "scripts", array())) {
            // line 10
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "scripts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
                // line 11
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
        // line 14
        echo "
<script>document.addEventListener(\"DOMContentLoaded\",function(){cookieChoices.showCookieConsentBar(\"This website use cookies to give you the best experience.\",\"OK\",\"Learn more\",\"http://www.allaboutcookies.org\")});</script>

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
        return array (  64 => 14,  50 => 11,  45 => 10,  43 => 9,  40 => 7,  26 => 4,  21 => 3,  19 => 2,);
    }
}
/* {# Site wide javascript #}*/
/* {% if site.scripts %}*/
/*     {% for script in site.scripts %}*/
/*     <script src="{{ script.src }}"{% if script.async %} async{% endif %}></script>*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* {# Page specific javascript #}*/
/* {% if page.scripts %}*/
/*     {% for script in page.scripts %}*/
/*     <script src="{{ script.src }}"{% if script.async %} async{% endif %}></script>*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* <script>document.addEventListener("DOMContentLoaded",function(){cookieChoices.showCookieConsentBar("This website use cookies to give you the best experience.","OK","Learn more","http://www.allaboutcookies.org")});</script>*/
/* */
/* </body>*/
/* </html>*/
/* */
