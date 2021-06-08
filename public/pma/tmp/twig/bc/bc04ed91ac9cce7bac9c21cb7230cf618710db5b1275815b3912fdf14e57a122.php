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

/* error/generic.twig */
class __TwigTemplate_7e24323354312a84026d3b6b3cf09735eccbd702e2403c4aed62e12873d0e79f extends \Twig\Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE HTML>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "\" dir=\"";
        echo twig_escape_filter($this->env, ($context["dir"] ?? null), "html", null, true);
        echo "\">
<head>
    <link rel=\"icon\" href=\"favicon.ico\" type=\"image/x-icon\">
    <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">
    <title>phpMyAdmin</title>
    <meta charset=\"utf-8\">
    <style type=\"text/css\">
        html {
            padding: 0;
            margin: 0;
        }
        body  {
            font-family: sans-serif;
            font-size: small;
            color: #000000;
            background-color: #F5F5F5;
            margin: 1em;
        }
        h1 {
            margin: 0;
            padding: 0.3em;
            font-size: 1.4em;
            font-weight: bold;
            color: #ffffff;
            background-color: #ff0000;
        }
        p {
            margin: 0;
            padding: 0.5em;
            border: 0.1em solid red;
            background-color: #ffeeee;
        }
    </style>
</head>
<body>
<h1>phpMyAdmin - ";
        // line 37
        echo twig_escape_filter($this->env, ($context["error_header"] ?? null), "html", null, true);
        echo "</h1>
<p>";
        // line 38
        echo ($context["error_message"] ?? null);
        echo "</p>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "error/generic.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 38,  80 => 37,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "error/generic.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\error\\generic.twig");
    }
}
