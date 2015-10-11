<?php

/* 404.twig */
class __TwigTemplate_2e12b9ab3b8ea4670fa57bee3a3a87e1dcab17802125e4f71efb12eae120b5e7 extends Twig_Template
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
        echo "<?php

\$this->page = array(
    'title' => '404. Page Not Found | '. SITE_NAME,
    'description' => 'The page you were looking for could not be found.',
    'keywords' => 'not found',
    'canonical' => \$this->path
);

\$this->get_header();

?>

    <h1><i class=\"frown-o icon space left\"></i> 404.</h1>
    <p>We couldn't find what you're looking for.</p>
    <p>Check you've spelt the address correctly, you came to: <br><code><i class=\"link icon space left\"></i> <?php echo \$this->domain .'/'. \$this->slug ?></code></p>
    <?php if ( template_exists('contact') ): ?><p>If you believe you're seeing this page in error, please contact the owner of the website, <a href=\"/contact\">here</a>.</p><?php endif; ?>
    <p>
        <a class=\"positive button\" href=\"/\"><i class=\"home icon space left\"></i> Homepage</a>
        <?php if ( template_exists('contact') ): ?>
        <a class=\"button\" href=\"/contact\"><i class=\"envelope icon space left\"></i> Contact Us</a>
        <?php endif; ?>
    </p>

<?php \$this->get_footer(); ?>
";
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* <?php*/
/* */
/* $this->page = array(*/
/*     'title' => '404. Page Not Found | '. SITE_NAME,*/
/*     'description' => 'The page you were looking for could not be found.',*/
/*     'keywords' => 'not found',*/
/*     'canonical' => $this->path*/
/* );*/
/* */
/* $this->get_header();*/
/* */
/* ?>*/
/* */
/*     <h1><i class="frown-o icon space left"></i> 404.</h1>*/
/*     <p>We couldn't find what you're looking for.</p>*/
/*     <p>Check you've spelt the address correctly, you came to: <br><code><i class="link icon space left"></i> <?php echo $this->domain .'/'. $this->slug ?></code></p>*/
/*     <?php if ( template_exists('contact') ): ?><p>If you believe you're seeing this page in error, please contact the owner of the website, <a href="/contact">here</a>.</p><?php endif; ?>*/
/*     <p>*/
/*         <a class="positive button" href="/"><i class="home icon space left"></i> Homepage</a>*/
/*         <?php if ( template_exists('contact') ): ?>*/
/*         <a class="button" href="/contact"><i class="envelope icon space left"></i> Contact Us</a>*/
/*         <?php endif; ?>*/
/*     </p>*/
/* */
/* <?php $this->get_footer(); ?>*/
/* */
