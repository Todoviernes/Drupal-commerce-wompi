<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__64c16072c528912b3fea2c161b1d1e087cff56c39a962b6dbc7b36e31620111e */
class __TwigTemplate_f487c9cac594923765ee5438111dce6ab882498da98f4fbb29b8b6f5a1071d96 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<script
          src=\"https://checkout.wompi.co/widget.js\"
          data-render=\"button\"
          data-public-key=\"pub_test_VE9GtDqwbw3BFSttqjWa5J58aHHgpCX3\"
          data-currency=\"COP\"
          data-amount-in-cents=\"1500000\"
          data-reference=\"1\"
          data-redirect-url=\"http://localhost:8000/checkout/1/payment/return\"
          >
        </script>";
    }

    public function getTemplateName()
    {
        return "__string_template__64c16072c528912b3fea2c161b1d1e087cff56c39a962b6dbc7b36e31620111e";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__64c16072c528912b3fea2c161b1d1e087cff56c39a962b6dbc7b36e31620111e", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
