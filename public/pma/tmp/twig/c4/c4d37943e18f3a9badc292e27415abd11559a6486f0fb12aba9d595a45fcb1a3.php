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

/* columns_definitions/column_attributes.twig */
class __TwigTemplate_b422045fe74d622908b9f865e047c07ff3eea58a565e2e71cb1f3fb0dc86eacb extends \Twig\Template
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
        // line 2
        $context["ci"] = 0;
        // line 3
        echo "
";
        // line 6
        $context["ci_offset"] =  -1;
        // line 7
        echo "
<td class=\"center\">
    ";
        // line 10
        echo "    ";
        $this->loadTemplate("columns_definitions/column_name.twig", "columns_definitions/column_attributes.twig", 10)->display(twig_to_array(["column_number" =>         // line 11
($context["column_number"] ?? null), "ci" =>         // line 12
($context["ci"] ?? null), "ci_offset" =>         // line 13
($context["ci_offset"] ?? null), "column_meta" =>         // line 14
($context["column_meta"] ?? null), "cfg_relation" =>         // line 15
($context["cfg_relation"] ?? null), "max_rows" =>         // line 16
($context["max_rows"] ?? null)]));
        // line 18
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 19
        echo "</td>
<td class=\"center\">
    ";
        // line 22
        echo "    ";
        $this->loadTemplate("columns_definitions/column_type.twig", "columns_definitions/column_attributes.twig", 22)->display(twig_to_array(["column_number" =>         // line 23
($context["column_number"] ?? null), "ci" =>         // line 24
($context["ci"] ?? null), "ci_offset" =>         // line 25
($context["ci_offset"] ?? null), "column_meta" =>         // line 26
($context["column_meta"] ?? null), "type_upper" =>         // line 27
($context["type_upper"] ?? null)]));
        // line 29
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 30
        echo "</td>
<td class=\"center\">
    ";
        // line 33
        echo "    ";
        $this->loadTemplate("columns_definitions/column_length.twig", "columns_definitions/column_attributes.twig", 33)->display(twig_to_array(["column_number" =>         // line 34
($context["column_number"] ?? null), "ci" =>         // line 35
($context["ci"] ?? null), "ci_offset" =>         // line 36
($context["ci_offset"] ?? null), "length_values_input_size" =>         // line 37
($context["length_values_input_size"] ?? null), "length_to_display" =>         // line 38
($context["length"] ?? null)]));
        // line 40
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 41
        echo "</td>
<td class=\"center\">
    ";
        // line 44
        echo "    ";
        $this->loadTemplate("columns_definitions/column_default.twig", "columns_definitions/column_attributes.twig", 44)->display(twig_to_array(["column_number" =>         // line 45
($context["column_number"] ?? null), "ci" =>         // line 46
($context["ci"] ?? null), "ci_offset" =>         // line 47
($context["ci_offset"] ?? null), "column_meta" =>         // line 48
($context["column_meta"] ?? null), "default_value" =>         // line 49
($context["default_value"] ?? null), "char_editing" =>         // line 50
($context["char_editing"] ?? null)]));
        // line 52
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 53
        echo "</td>
<td class=\"center\">
  ";
        // line 56
        echo "  <select lang=\"en\" dir=\"ltr\" name=\"field_collation[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\" id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\">
    <option value=\"\"></option>
    ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 59
            echo "      <optgroup label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 59), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 59), "html", null, true);
            echo "\">
        ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 61
                echo "          <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 61), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 61), "html", null, true);
                echo "\"";
                // line 62
                echo (((twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 62) == (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["column_meta"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["Collation"] ?? null) : null))) ? (" selected") : (""));
                echo ">";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 63), "html", null, true);
                // line 64
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "      </optgroup>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "  </select>
  ";
        // line 69
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 70
        echo "</td>
<td class=\"center\">
    ";
        // line 73
        echo "    ";
        $this->loadTemplate("columns_definitions/column_attribute.twig", "columns_definitions/column_attributes.twig", 73)->display(twig_to_array(["column_number" =>         // line 74
($context["column_number"] ?? null), "ci" =>         // line 75
($context["ci"] ?? null), "ci_offset" =>         // line 76
($context["ci_offset"] ?? null), "column_meta" =>         // line 77
($context["column_meta"] ?? null), "extracted_columnspec" =>         // line 78
($context["extracted_columnspec"] ?? null), "submit_attribute" =>         // line 79
($context["submit_attribute"] ?? null), "attribute_types" =>         // line 80
($context["attribute_types"] ?? null)]));
        // line 82
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 83
        echo "</td>
<td class=\"center\">
    ";
        // line 86
        echo "    ";
        $this->loadTemplate("columns_definitions/column_null.twig", "columns_definitions/column_attributes.twig", 86)->display(twig_to_array(["column_number" =>         // line 87
($context["column_number"] ?? null), "ci" =>         // line 88
($context["ci"] ?? null), "ci_offset" =>         // line 89
($context["ci_offset"] ?? null), "column_meta" =>         // line 90
($context["column_meta"] ?? null)]));
        // line 92
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 93
        echo "</td>
";
        // line 94
        if (((isset($context["change_column"]) || array_key_exists("change_column", $context)) &&  !twig_test_empty(($context["change_column"] ?? null)))) {
            // line 95
            echo "    ";
            // line 96
            echo "    <td class=\"center\">
        ";
            // line 97
            $this->loadTemplate("columns_definitions/column_adjust_privileges.twig", "columns_definitions/column_attributes.twig", 97)->display(twig_to_array(["column_number" =>             // line 98
($context["column_number"] ?? null), "ci" =>             // line 99
($context["ci"] ?? null), "ci_offset" =>             // line 100
($context["ci_offset"] ?? null), "privs_available" =>             // line 101
($context["privs_available"] ?? null)]));
            // line 103
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 104
            echo "    </td>
";
        }
        // line 106
        if ( !($context["is_backup"] ?? null)) {
            // line 107
            echo "    ";
            // line 108
            echo "    <td class=\"center\">
        ";
            // line 109
            $this->loadTemplate("columns_definitions/column_indexes.twig", "columns_definitions/column_attributes.twig", 109)->display(twig_to_array(["column_number" =>             // line 110
($context["column_number"] ?? null), "ci" =>             // line 111
($context["ci"] ?? null), "ci_offset" =>             // line 112
($context["ci_offset"] ?? null), "column_meta" =>             // line 113
($context["column_meta"] ?? null)]));
            // line 115
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 116
            echo "    </td>
";
        }
        // line 118
        echo "<td class=\"center\">
    ";
        // line 120
        echo "    ";
        $this->loadTemplate("columns_definitions/column_auto_increment.twig", "columns_definitions/column_attributes.twig", 120)->display(twig_to_array(["column_number" =>         // line 121
($context["column_number"] ?? null), "ci" =>         // line 122
($context["ci"] ?? null), "ci_offset" =>         // line 123
($context["ci_offset"] ?? null), "column_meta" =>         // line 124
($context["column_meta"] ?? null)]));
        // line 126
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 127
        echo "</td>
<td class=\"center\">
    ";
        // line 130
        echo "    ";
        $this->loadTemplate("columns_definitions/column_comment.twig", "columns_definitions/column_attributes.twig", 130)->display(twig_to_array(["column_number" =>         // line 131
($context["column_number"] ?? null), "ci" =>         // line 132
($context["ci"] ?? null), "ci_offset" =>         // line 133
($context["ci_offset"] ?? null), "max_length" =>         // line 134
($context["max_length"] ?? null), "value" => ((((twig_get_attribute($this->env, $this->source,         // line 135
($context["column_meta"] ?? null), "Field", [], "array", true, true, false, 135) && twig_test_iterable(        // line 136
($context["comments_map"] ?? null))) && twig_get_attribute($this->env, $this->source,         // line 137
($context["comments_map"] ?? null), (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["column_meta"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["Field"] ?? null) : null), [], "array", true, true, false, 137))) ? (twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b =         // line 138
($context["comments_map"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[(($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["column_meta"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["Field"] ?? null) : null)] ?? null) : null))) : (""))]));
        // line 140
        echo "    ";
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 141
        echo "</td>
 ";
        // line 143
        if (($context["is_virtual_columns_supported"] ?? null)) {
            // line 144
            echo "    <td class=\"center\">
        ";
            // line 145
            $this->loadTemplate("columns_definitions/column_virtuality.twig", "columns_definitions/column_attributes.twig", 145)->display(twig_to_array(["column_number" =>             // line 146
($context["column_number"] ?? null), "ci" =>             // line 147
($context["ci"] ?? null), "ci_offset" =>             // line 148
($context["ci_offset"] ?? null), "column_meta" =>             // line 149
($context["column_meta"] ?? null), "char_editing" =>             // line 150
($context["char_editing"] ?? null), "expression" => ((twig_get_attribute($this->env, $this->source,             // line 151
($context["column_meta"] ?? null), "Expression", [], "array", true, true, false, 151)) ? ((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["column_meta"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["Expression"] ?? null) : null)) : ("")), "options" =>             // line 152
($context["options"] ?? null)]));
            // line 154
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 155
            echo "    </td>
";
        }
        // line 158
        if ((isset($context["fields_meta"]) || array_key_exists("fields_meta", $context))) {
            // line 159
            echo "    ";
            $context["current_index"] = 0;
            // line 160
            echo "    ";
            $context["cols"] = (twig_length_filter($this->env, ($context["move_columns"] ?? null)) - 1);
            // line 161
            echo "    ";
            $context["break"] = false;
            // line 162
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ($context["cols"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["mi"]) {
                // line 163
                echo "      ";
                if (((twig_get_attribute($this->env, $this->source, (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["move_columns"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666[$context["mi"]] ?? null) : null), "name", [], "any", false, false, false, 163) == (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["column_meta"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["Field"] ?? null) : null)) &&  !($context["break"] ?? null))) {
                    // line 164
                    echo "        ";
                    $context["current_index"] = $context["mi"];
                    // line 165
                    echo "        ";
                    $context["break"] = true;
                    // line 166
                    echo "      ";
                }
                // line 167
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mi'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 168
            echo "
    <td class=\"center\">
        ";
            // line 170
            $this->loadTemplate("columns_definitions/move_column.twig", "columns_definitions/column_attributes.twig", 170)->display(twig_to_array(["column_number" =>             // line 171
($context["column_number"] ?? null), "ci" =>             // line 172
($context["ci"] ?? null), "ci_offset" =>             // line 173
($context["ci_offset"] ?? null), "column_meta" =>             // line 174
($context["column_meta"] ?? null), "move_columns" =>             // line 175
($context["move_columns"] ?? null), "current_index" =>             // line 176
($context["current_index"] ?? null)]));
            // line 178
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 179
            echo "    </td>
";
        }
        // line 181
        echo "
";
        // line 182
        if ((((($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["cfg_relation"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["mimework"] ?? null) : null) && ($context["browse_mime"] ?? null)) && (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["cfg_relation"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["commwork"] ?? null) : null))) {
            // line 183
            echo "    <td class=\"center\">
        ";
            // line 185
            echo "        ";
            $this->loadTemplate("columns_definitions/mime_type.twig", "columns_definitions/column_attributes.twig", 185)->display(twig_to_array(["column_number" =>             // line 186
($context["column_number"] ?? null), "ci" =>             // line 187
($context["ci"] ?? null), "ci_offset" =>             // line 188
($context["ci_offset"] ?? null), "column_meta" =>             // line 189
($context["column_meta"] ?? null), "available_mime" =>             // line 190
($context["available_mime"] ?? null), "mime_map" =>             // line 191
($context["mime_map"] ?? null)]));
            // line 193
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 194
            echo "    </td>
    <td class=\"center\">
        ";
            // line 197
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 197)->display(twig_to_array(["column_number" =>             // line 198
($context["column_number"] ?? null), "ci" =>             // line 199
($context["ci"] ?? null), "ci_offset" =>             // line 200
($context["ci_offset"] ?? null), "column_meta" =>             // line 201
($context["column_meta"] ?? null), "available_mime" =>             // line 202
($context["available_mime"] ?? null), "mime_map" =>             // line 203
($context["mime_map"] ?? null), "type" => "transformation"]));
            // line 206
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 207
            echo "    </td>
    <td class=\"center\">
        ";
            // line 210
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 210)->display(twig_to_array(["column_number" =>             // line 211
($context["column_number"] ?? null), "ci" =>             // line 212
($context["ci"] ?? null), "ci_offset" =>             // line 213
($context["ci_offset"] ?? null), "column_meta" =>             // line 214
($context["column_meta"] ?? null), "mime_map" =>             // line 215
($context["mime_map"] ?? null), "type_prefix" => ""]));
            // line 218
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 219
            echo "    </td>
    <td class=\"center\">
        ";
            // line 222
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 222)->display(twig_to_array(["column_number" =>             // line 223
($context["column_number"] ?? null), "ci" =>             // line 224
($context["ci"] ?? null), "ci_offset" =>             // line 225
($context["ci_offset"] ?? null), "column_meta" =>             // line 226
($context["column_meta"] ?? null), "available_mime" =>             // line 227
($context["available_mime"] ?? null), "mime_map" =>             // line 228
($context["mime_map"] ?? null), "type" => "input_transformation"]));
            // line 231
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 232
            echo "    </td>
    <td class=\"center\">
        ";
            // line 235
            echo "        ";
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 235)->display(twig_to_array(["column_number" =>             // line 236
($context["column_number"] ?? null), "ci" =>             // line 237
($context["ci"] ?? null), "ci_offset" =>             // line 238
($context["ci_offset"] ?? null), "column_meta" =>             // line 239
($context["column_meta"] ?? null), "mime_map" =>             // line 240
($context["mime_map"] ?? null), "type_prefix" => "input_"]));
            // line 243
            echo "        ";
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 244
            echo "    </td>
";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_attributes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  429 => 244,  426 => 243,  424 => 240,  423 => 239,  422 => 238,  421 => 237,  420 => 236,  418 => 235,  414 => 232,  411 => 231,  409 => 228,  408 => 227,  407 => 226,  406 => 225,  405 => 224,  404 => 223,  402 => 222,  398 => 219,  395 => 218,  393 => 215,  392 => 214,  391 => 213,  390 => 212,  389 => 211,  387 => 210,  383 => 207,  380 => 206,  378 => 203,  377 => 202,  376 => 201,  375 => 200,  374 => 199,  373 => 198,  371 => 197,  367 => 194,  364 => 193,  362 => 191,  361 => 190,  360 => 189,  359 => 188,  358 => 187,  357 => 186,  355 => 185,  352 => 183,  350 => 182,  347 => 181,  343 => 179,  340 => 178,  338 => 176,  337 => 175,  336 => 174,  335 => 173,  334 => 172,  333 => 171,  332 => 170,  328 => 168,  322 => 167,  319 => 166,  316 => 165,  313 => 164,  310 => 163,  305 => 162,  302 => 161,  299 => 160,  296 => 159,  294 => 158,  290 => 155,  287 => 154,  285 => 152,  284 => 151,  283 => 150,  282 => 149,  281 => 148,  280 => 147,  279 => 146,  278 => 145,  275 => 144,  273 => 143,  270 => 141,  267 => 140,  265 => 138,  264 => 137,  263 => 136,  262 => 135,  261 => 134,  260 => 133,  259 => 132,  258 => 131,  256 => 130,  252 => 127,  249 => 126,  247 => 124,  246 => 123,  245 => 122,  244 => 121,  242 => 120,  239 => 118,  235 => 116,  232 => 115,  230 => 113,  229 => 112,  228 => 111,  227 => 110,  226 => 109,  223 => 108,  221 => 107,  219 => 106,  215 => 104,  212 => 103,  210 => 101,  209 => 100,  208 => 99,  207 => 98,  206 => 97,  203 => 96,  201 => 95,  199 => 94,  196 => 93,  193 => 92,  191 => 90,  190 => 89,  189 => 88,  188 => 87,  186 => 86,  182 => 83,  179 => 82,  177 => 80,  176 => 79,  175 => 78,  174 => 77,  173 => 76,  172 => 75,  171 => 74,  169 => 73,  165 => 70,  163 => 69,  160 => 68,  153 => 66,  146 => 64,  144 => 63,  141 => 62,  135 => 61,  131 => 60,  124 => 59,  120 => 58,  110 => 56,  106 => 53,  103 => 52,  101 => 50,  100 => 49,  99 => 48,  98 => 47,  97 => 46,  96 => 45,  94 => 44,  90 => 41,  87 => 40,  85 => 38,  84 => 37,  83 => 36,  82 => 35,  81 => 34,  79 => 33,  75 => 30,  72 => 29,  70 => 27,  69 => 26,  68 => 25,  67 => 24,  66 => 23,  64 => 22,  60 => 19,  57 => 18,  55 => 16,  54 => 15,  53 => 14,  52 => 13,  51 => 12,  50 => 11,  48 => 10,  44 => 7,  42 => 6,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_attributes.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\columns_definitions\\column_attributes.twig");
    }
}
