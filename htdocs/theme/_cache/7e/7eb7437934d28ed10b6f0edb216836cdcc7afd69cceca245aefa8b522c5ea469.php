<?php

/* partials/footer.twig */
class __TwigTemplate_b18faa3c3a296ece5c7d03a55c94214161b58e7624f34f60e6a18e86e038f326 extends Twig_Template
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

";
        // line 17
        if ($this->getAttribute((isset($context["dev"]) ? $context["dev"] : null), "localhost", array())) {
            // line 18
            echo "<script>document.write('<script src=\"http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1\"></' + 'script>')</script>
";
        }
        // line 20
        echo "
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
        return array (  75 => 20,  71 => 18,  69 => 17,  64 => 14,  50 => 11,  45 => 10,  43 => 9,  40 => 7,  26 => 4,  21 => 3,  19 => 2,);
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
/* {% if dev.localhost %}*/
/* <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>*/
/* {% endif %}*/
/* */
/* </body>*/
/* </html>*/
/* */
