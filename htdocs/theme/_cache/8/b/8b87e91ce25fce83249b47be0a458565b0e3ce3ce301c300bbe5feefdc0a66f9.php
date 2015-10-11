<?php

/* partials/footer.twig */
class __TwigTemplate_fcf68a1e6ad5b908ec49e15a975ff3084b429e52afded770465a4bdc323a4204 extends Twig_Template
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
                echo twig_escape_filter($this->env, $context["script"], "html", null, true);
                echo "\"></script>
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
                echo twig_escape_filter($this->env, $context["script"], "html", null, true);
                echo "\"></script>
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
        return array (  67 => 20,  63 => 18,  61 => 17,  56 => 14,  46 => 11,  41 => 10,  39 => 9,  36 => 7,  26 => 4,  21 => 3,  19 => 2,);
    }
}
/* {# Site wide javascript #}*/
/* {% if site.scripts %}*/
/*     {% for script in site.scripts %}*/
/*     <script src="{{ script }}"></script>*/
/*     {% endfor %}*/
/* {% endif %}*/
/* */
/* {# Page specific javascript #}*/
/* {% if page.scripts %}*/
/*     {% for script in page.scripts %}*/
/*     <script src="{{ script }}"></script>*/
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
