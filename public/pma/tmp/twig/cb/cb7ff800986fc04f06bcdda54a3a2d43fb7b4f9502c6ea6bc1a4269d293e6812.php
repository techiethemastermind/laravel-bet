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

/* columns_definitions/column_default.twig */
class __TwigTemplate_5b6c248a5d4c06179617909cd8617bdcea53b1c1895126ebaf6a21de4899ffc7 extends \Twig\Template
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
        // line 3
        ob_start(function () { return ''; });
        echo _pgettext(        "for default", "None");
        $context["translation"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 4
        $context["default_options"] = ["NONE" =>         // line 5
($context["translation"] ?? null), "USER_DEFINED" => _gettext("As defined:"), "NULL" => "NULL", "CURRENT_TIMESTAMP" => "CURRENT_TIMESTAMP"];
        // line 10
        echo "
<select name=\"field_default_type[";
        // line 11
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    id=\"field_";
        // line 12
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    class=\"default_type\">
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["default_options"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 15
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\"";
            // line 16
            if ((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "DefaultType", [], "array", true, true, false, 16) && ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =             // line 17
($context["column_meta"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["DefaultType"] ?? null) : null) == $context["key"]))) {
                // line 18
                echo "                selected=\"selected\"";
            }
            // line 19
            echo ">
            ";
            // line 20
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
        </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "</select>
";
        // line 24
        if ((($context["char_editing"] ?? null) == "textarea")) {
            // line 25
            echo "    <textarea name=\"field_default_value[";
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        cols=\"15\"
        class=\"textfield
        default_value\">";
            // line 28
            echo twig_escape_filter($this->env, ($context["default_value"] ?? null), "html", null, true);
            echo "</textarea>
";
        } else {
            // line 30
            echo "    <input type=\"text\"
        name=\"field_default_value[";
            // line 31
            echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
            echo "]\"
        size=\"12\"
        value=\"";
            // line 33
            echo twig_escape_filter($this->env, ($context["default_value"] ?? null), "html", null, true);
            echo "\"
        class=\"textfield default_value\">
";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 33,  104 => 31,  101 => 30,  96 => 28,  89 => 25,  87 => 24,  84 => 23,  75 => 20,  72 => 19,  69 => 18,  67 => 17,  66 => 16,  62 => 15,  58 => 14,  51 => 12,  47 => 11,  44 => 10,  42 => 5,  41 => 4,  37 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_default.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\columns_definitions\\column_default.twig");
    }
}
