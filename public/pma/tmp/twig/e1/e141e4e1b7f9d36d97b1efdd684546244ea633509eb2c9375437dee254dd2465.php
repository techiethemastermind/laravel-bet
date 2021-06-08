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

/* columns_definitions/column_definitions_form.twig */
class __TwigTemplate_5a4b3b703a1ddbffaed759db1b7629d37762f4375fd1f9e7f20d7d87f142d4eb extends \Twig\Template
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
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" class=\"";
        // line 2
        echo (((($context["action"] ?? null) == "tbl_create.php")) ? ("create_table") : ("append_fields"));
        // line 3
        echo "_form ajax lock-page\">
    ";
        // line 4
        echo PhpMyAdmin\Url::getHiddenInputs(($context["form_params"] ?? null));
        echo "
    ";
        // line 6
        echo "    ";
        // line 7
        echo "    ";
        // line 8
        echo "    <input type=\"hidden\" name=\"primary_indexes\" value=\"";
        // line 9
        (( !twig_test_empty(($context["primary_indexes"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["primary_indexes"] ?? null), "html", null, true))) : (print ("[]")));
        echo "\">
    <input type=\"hidden\" name=\"unique_indexes\" value=\"";
        // line 11
        (( !twig_test_empty(($context["unique_indexes"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["unique_indexes"] ?? null), "html", null, true))) : (print ("[]")));
        echo "\">
    <input type=\"hidden\" name=\"indexes\" value=\"";
        // line 13
        (( !twig_test_empty(($context["indexes"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["indexes"] ?? null), "html", null, true))) : (print ("[]")));
        echo "\">
    <input type=\"hidden\" name=\"fulltext_indexes\" value=\"";
        // line 15
        (( !twig_test_empty(($context["fulltext_indexes"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["fulltext_indexes"] ?? null), "html", null, true))) : (print ("[]")));
        echo "\">
    <input type=\"hidden\" name=\"spatial_indexes\" value=\"";
        // line 17
        (( !twig_test_empty(($context["spatial_indexes"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["spatial_indexes"] ?? null), "html", null, true))) : (print ("[]")));
        echo "\">

    ";
        // line 19
        if ((($context["action"] ?? null) == "tbl_create.php")) {
            // line 20
            echo "        <div id=\"table_name_col_no_outer\">
            <table id=\"table_name_col_no\" class=\"tdblock\">
                <tr class=\"vmiddle floatleft\">
                    <td>";
            // line 23
            echo _gettext("Table name");
            echo ":
                    <input type=\"text\"
                        name=\"table\"
                        size=\"40\"
                        maxlength=\"64\"
                        value=\"";
            // line 28
            (((isset($context["table"]) || array_key_exists("table", $context))) ? (print (twig_escape_filter($this->env, ($context["table"] ?? null), "html", null, true))) : (print ("")));
            echo "\"
                        class=\"textfield\" autofocus required>
                    </td>
                    <td>
                        ";
            // line 32
            echo _gettext("Add");
            // line 33
            echo "                        <input type=\"number\"
                            id=\"added_fields\"
                            name=\"added_fields\"
                            size=\"2\"
                            value=\"1\"
                            min=\"1\"
                            onfocus=\"this.select()\">
                        ";
            // line 40
            echo _gettext("column(s)");
            // line 41
            echo "                        <input class=\"btn btn-secondary\" type=\"button\"
                            name=\"submit_num_fields\"
                            value=\"";
            // line 43
            echo _gettext("Go");
            echo "\">
                    </td>
                </tr>
            </table>
        </div>
    ";
        }
        // line 49
        echo "    ";
        if (twig_test_iterable(($context["content_cells"] ?? null))) {
            // line 50
            echo "        ";
            $this->loadTemplate("columns_definitions/table_fields_definitions.twig", "columns_definitions/column_definitions_form.twig", 50)->display(twig_to_array(["is_backup" =>             // line 51
($context["is_backup"] ?? null), "fields_meta" =>             // line 52
($context["fields_meta"] ?? null), "mimework" =>             // line 53
($context["mimework"] ?? null), "content_cells" =>             // line 54
($context["content_cells"] ?? null), "change_column" =>             // line 55
($context["change_column"] ?? null), "is_virtual_columns_supported" =>             // line 56
($context["is_virtual_columns_supported"] ?? null), "browse_mime" =>             // line 57
($context["browse_mime"] ?? null), "server_type" =>             // line 58
($context["server_type"] ?? null), "max_rows" =>             // line 59
($context["max_rows"] ?? null), "char_editing" =>             // line 60
($context["char_editing"] ?? null), "attribute_types" =>             // line 61
($context["attribute_types"] ?? null), "privs_available" =>             // line 62
($context["privs_available"] ?? null), "max_length" =>             // line 63
($context["max_length"] ?? null), "charsets" =>             // line 64
($context["charsets"] ?? null)]));
            // line 66
            echo "    ";
        }
        // line 67
        echo "    ";
        if ((($context["action"] ?? null) == "tbl_create.php")) {
            // line 68
            echo "        <div class=\"responsivetable\">
        <table>
            <tr class=\"vtop\">
                <th>";
            // line 71
            echo _gettext("Table comments:");
            echo "</th>
                <td width=\"25\">&nbsp;</td>
                <th>";
            // line 73
            echo _gettext("Collation:");
            echo "</th>
                <td width=\"25\">&nbsp;</td>
                <th>
                    ";
            // line 76
            echo _gettext("Storage Engine:");
            // line 77
            echo "                    ";
            echo PhpMyAdmin\Util::showMySQLDocu("Storage_engines");
            echo "
                </th>
                <td width=\"25\">&nbsp;</td>
                <th>
                    ";
            // line 81
            echo _gettext("Connection:");
            // line 82
            echo "                    ";
            echo PhpMyAdmin\Util::showMySQLDocu("federated-create-connection");
            echo "
                </th>
            </tr>
            <tr>
                <td>
                    <input type=\"text\"
                        name=\"comment\"
                        size=\"40\"
                        maxlength=\"60\"
                        value=\"";
            // line 91
            (((isset($context["comment"]) || array_key_exists("comment", $context))) ? (print (twig_escape_filter($this->env, ($context["comment"] ?? null), "html", null, true))) : (print ("")));
            echo "\"
                        class=\"textfield\">
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>
                  <select lang=\"en\" dir=\"ltr\" name=\"tbl_collation\">
                    <option value=\"\"></option>
                    ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 99
                echo "                      <optgroup label=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 99), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 99), "html", null, true);
                echo "\">
                        ";
                // line 100
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 100));
                foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                    // line 101
                    echo "                          <option value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 101), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 101), "html", null, true);
                    echo "\"";
                    // line 102
                    echo (((twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 102) == ($context["tbl_collation"] ?? null))) ? (" selected") : (""));
                    echo ">";
                    // line 103
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 103), "html", null, true);
                    // line 104
                    echo "</option>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 106
                echo "                      </optgroup>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "                  </select>
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>
                    ";
            // line 112
            echo PhpMyAdmin\StorageEngine::getHtmlSelect("tbl_storage_engine", null,             // line 115
($context["tbl_storage_engine"] ?? null));
            // line 116
            echo "
                </td>
                <td width=\"25\">&nbsp;</td>
                <td>
                    <input type=\"text\"
                        name=\"connection\"
                        size=\"40\"
                        value=\"";
            // line 123
            (((isset($context["connection"]) || array_key_exists("connection", $context))) ? (print (twig_escape_filter($this->env, ($context["connection"] ?? null), "html", null, true))) : (print ("")));
            echo "\"
                        placeholder=\"scheme://user_name[:password]@host_name[:port_num]/db_name/tbl_name\"
                        class=\"textfield\"
                        required=\"required\">
                </td>
            </tr>
            ";
            // line 129
            if (($context["have_partitioning"] ?? null)) {
                // line 130
                echo "                <tr class=\"vtop\">
                    <th colspan=\"5\">
                        ";
                // line 132
                echo _gettext("PARTITION definition:");
                // line 133
                echo "                        ";
                echo PhpMyAdmin\Util::showMySQLDocu("Partitioning");
                echo "
                    </th>
                </tr>
                <tr>
                    <td colspan=\"5\">
                        ";
                // line 138
                $this->loadTemplate("columns_definitions/partitions.twig", "columns_definitions/column_definitions_form.twig", 138)->display(twig_to_array(["partition_details" =>                 // line 139
($context["partition_details"] ?? null)]));
                // line 141
                echo "                    </td>
                </tr>
            ";
            }
            // line 144
            echo "        </table>
        </div>
    ";
        }
        // line 147
        echo "    <fieldset class=\"tblFooters\">
        <input class=\"btn btn-secondary preview_sql\" type=\"button\"
            value=\"";
        // line 149
        echo _gettext("Preview SQL");
        echo "\">
        <input class=\"btn btn-primary\" type=\"submit\"
            name=\"do_save_data\"
            value=\"";
        // line 152
        echo _gettext("Save");
        echo "\">
    </fieldset>
    <div id=\"properties_message\"></div>
</form>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_definitions_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 152,  303 => 149,  299 => 147,  294 => 144,  289 => 141,  287 => 139,  286 => 138,  277 => 133,  275 => 132,  271 => 130,  269 => 129,  260 => 123,  251 => 116,  249 => 115,  248 => 112,  242 => 108,  235 => 106,  228 => 104,  226 => 103,  223 => 102,  217 => 101,  213 => 100,  206 => 99,  202 => 98,  192 => 91,  179 => 82,  177 => 81,  169 => 77,  167 => 76,  161 => 73,  156 => 71,  151 => 68,  148 => 67,  145 => 66,  143 => 64,  142 => 63,  141 => 62,  140 => 61,  139 => 60,  138 => 59,  137 => 58,  136 => 57,  135 => 56,  134 => 55,  133 => 54,  132 => 53,  131 => 52,  130 => 51,  128 => 50,  125 => 49,  116 => 43,  112 => 41,  110 => 40,  101 => 33,  99 => 32,  92 => 28,  84 => 23,  79 => 20,  77 => 19,  72 => 17,  68 => 15,  64 => 13,  60 => 11,  56 => 9,  54 => 8,  52 => 7,  50 => 6,  46 => 4,  43 => 3,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "columns_definitions/column_definitions_form.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\columns_definitions\\column_definitions_form.twig");
    }
}
