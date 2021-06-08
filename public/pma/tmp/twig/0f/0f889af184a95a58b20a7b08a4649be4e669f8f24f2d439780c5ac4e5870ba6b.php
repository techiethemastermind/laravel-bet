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

/* columns_definitions/column_indexes.twig */
class __TwigTemplate_a5246d746a65b00c37783cefb8878239afe4c0039d2da2a5a7ae480dcc8cc7d6 extends \Twig\Template
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
        echo "<select name=\"field_key[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    id=\"field_";
        // line 2
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\" data-index=\"\">
    <option value=\"none_";
        // line 3
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\">---</option>
    <option value=\"primary_";
        // line 4
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo _gettext("Primary");
        echo "\"";
        // line 5
        echo (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Key", [], "array", true, true, false, 5) && ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["column_meta"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["Key"] ?? null) : null) == "PRI"))) ? (" selected=\"selected\"") : (""));
        echo ">
        PRIMARY
    </option>
    <option value=\"unique_";
        // line 8
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo _gettext("Unique");
        echo "\"";
        // line 9
        echo (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Key", [], "array", true, true, false, 9) && ((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["column_meta"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["Key"] ?? null) : null) == "UNI"))) ? (" selected=\"selected\"") : (""));
        echo ">
        UNIQUE
    </option>
    <option value=\"index_";
        // line 12
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo _gettext("Index");
        echo "\"";
        // line 13
        echo (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Key", [], "array", true, true, false, 13) && ((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["column_meta"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["Key"] ?? null) : null) == "MUL"))) ? (" selected=\"selected\"") : (""));
        echo ">
        INDEX
    </option>
    <option value=\"fulltext_";
        // line 16
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo _gettext("Fulltext");
        echo "\"";
        // line 17
        echo (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Key", [], "array", true, true, false, 17) && ((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["column_meta"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["Key"] ?? null) : null) == "FULLTEXT"))) ? (" selected=\"selected\"") : (""));
        echo ">
        FULLTEXT
    </option>
    <option value=\"spatial_";
        // line 20
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "\" title=\"";
        echo _gettext("Spatial");
        echo "\"";
        // line 21
        echo (((twig_get_attribute($this->env, $this->source, ($context["column_meta"] ?? null), "Key", [], "array", true, true, false, 21) && ((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["column_meta"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["Key"] ?? null) : null) == "SPATIAL"))) ? (" selected=\"selected\"") : (""));
        echo ">
        SPATIAL
    </option>
</select>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_indexes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 21,  96 => 20,  90 => 17,  85 => 16,  79 => 13,  74 => 12,  68 => 9,  63 => 8,  57 => 5,  52 => 4,  48 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_indexes.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\columns_definitions\\column_indexes.twig");
    }
}
