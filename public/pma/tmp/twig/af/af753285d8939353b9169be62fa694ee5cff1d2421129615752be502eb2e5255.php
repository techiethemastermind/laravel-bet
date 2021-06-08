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

/* database/multi_table_query/form.twig */
class __TwigTemplate_54484f08b819b507ed1ca7aafb88d29c88f66b86d936acf92bb00d13a11abe55 extends \Twig\Template
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
        $this->loadTemplate("secondary_tabs.twig", "database/multi_table_query/form.twig", 1)->display(twig_to_array(["url_params" => ["db" =>         // line 3
($context["db"] ?? null)], "sub_tabs" => [0 => ["link" => "db_multi_table_query.php", "text" => _gettext("Multi-table query")], 1 => ["link" => "db_qbe.php", "text" => _gettext("Query by example")]]]));
        // line 16
        $this->loadTemplate("div_for_slider_effect.twig", "database/multi_table_query/form.twig", 16)->display(twig_to_array(["id" => "query_div", "message" => _gettext("Query window"), "initial_sliders_state" => "open"]));
        // line 21
        echo "<form action=\"\" id=\"query_form\">
    <input type=\"hidden\" id=\"db_name\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["db"] ?? null), "html", null, true);
        echo "\">
    <fieldset>
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
            // line 25
            echo "            <div style=\"display:none\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["table"], "hash", [], "any", false, false, false, 25), "html", null, true);
            echo "\">
                <option value=\"*\">*</option>
                ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["table"], "columns", [], "any", false, false, false, 27));
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 28
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                echo "</option>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "
        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, ($context["default_no_of_columns"] ?? null)));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["id"]) {
            // line 34
            echo "            ";
            if (($context["id"] == 0)) {
                echo "<div style=\"display:none\" id=\"new_column_layout\">";
            }
            // line 35
            echo "            <fieldset style=\"display:inline\" class=\"column_details\">
                <select style=\"display:inline\" class=\"tableNameSelect\">
                    <option value=\"\">";
            // line 37
            echo _gettext("select table");
            echo "</option>
                    ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter(($context["tables"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
                // line 39
                echo "                        <option value=\"";
                echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "                </select>
                <span>.</span>
                <select style=\"display:inline\" class=\"columnNameSelect\">
                    <option value=\"\">";
            // line 44
            echo _gettext("select column");
            echo "</option>
                </select>
                <br>
                <input type=\"checkbox\" checked=\"checked\" class=\"show_col\">
                <span>";
            // line 48
            echo _gettext("Show");
            echo "</span>
                <br>
                <input type=\"text\" placeholder=\"";
            // line 50
            echo _gettext("Table alias");
            echo "\" class=\"table_alias\">
                <input type=\"text\" placeholder=\"";
            // line 51
            echo _gettext("Column alias");
            echo "\" class=\"col_alias\">
                <br>
                <input type=\"checkbox\"
                    title=\"";
            // line 54
            echo _gettext("Use this column in criteria");
            echo "\"
                    class=\"criteria_col\">
                ";
            // line 56
            $this->loadTemplate("div_for_slider_effect.twig", "database/multi_table_query/form.twig", 56)->display(twig_array_merge($context, ["id" => ("criteria_div" .             // line 57
$context["id"]), "initial_sliders_state" => "closed", "message" => _gettext("criteria")]));
            // line 61
            echo "                <div>
                    <table>

                        <tr class=\"sort_order\" style=\"background:none\">
                            <td>";
            // line 65
            echo _gettext("Sort");
            echo "</td>
                            <td><input type=\"radio\" name=\"sort[";
            // line 66
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "]\">";
            echo _gettext("Ascending");
            echo "</td>
                            <td><input type=\"radio\" name=\"sort[";
            // line 67
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "]\">";
            echo _gettext("Descending");
            echo "</td>
                        </tr>

                        <tr class=\"logical_operator\" style=\"background:none;display:none\">
                            <td>";
            // line 71
            echo _gettext("Add as");
            echo "</td>
                            <td>
                                <input type=\"radio\"
                                    name=\"logical_op[";
            // line 74
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "]\"
                                    value=\"AND\"
                                    class=\"logical_op\"
                                    checked=\"checked\">
                                AND
                            </td>
                            <td>
                                <input type=\"radio\"
                                    name=\"logical_op[";
            // line 82
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "]\"
                                    value=\"OR\"
                                    class=\"logical_op\">
                                OR
                            </td>
                        </tr>

                        <tr style=\"background:none\">
                            <td>Op </td>
                            <td>
                                <select class=\"criteria_op\">
                                    <option value=\"=\">=</option>
                                    <option value=\">\">&gt;</option>
                                    <option value=\">=\">&gt;=</option>
                                    <option value=\"<\">&lt;</option>
                                    <option value=\"<=\">&lt;=</option>
                                    <option value=\"!=\">!=</option>
                                    <option value=\"LIKE\">LIKE</option>
                                    <option value=\"LIKE %...%\">LIKE %...%</option>
                                    <option value=\"NOT LIKE\">NOT LIKE</option>
                                    <option value=\"IN (...)\">IN (...)</option>
                                    <option value=\"NOT IN (...)\">NOT IN (...)</option>
                                    <option value=\"BETWEEN\">BETWEEN</option>
                                    <option value=\"NOT BETWEEN\">NOT BETWEEN</option>
                                    <option value=\"IS NULL\">IS NULL</option>
                                    <option value=\"IS NOT NULL\">IS NOT NULL</option>
                                    <option value=\"REGEXP\">REGEXP</option>
                                    <option value=\"REGEXP ^...\$\">REGEXP ^...\$</option>
                                    <option value=\"NOT REGEXP\">NOT REGEXP</option>
                                </select>
                            </td>
                            <td>
                                <select class=\"criteria_rhs\">
                                    <option value=\"text\">";
            // line 115
            echo _gettext("Text");
            echo "</option>
                                    <option value=\"anotherColumn\">";
            // line 116
            echo _gettext("Another column");
            echo "</option>
                                </select>
                            </td>
                        </tr>

                        <tr class=\"rhs_table\" style=\"display:none;background:none\">
                            <td></td>
                            <td>
                                <select  class=\"tableNameSelect\">
                                    <option value=\"\">";
            // line 125
            echo _gettext("select table");
            echo "</option>
                                    ";
            // line 126
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter(($context["tables"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["table"]) {
                // line 127
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                echo "</option>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['table'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "                                </select><span>.</span>
                            </td>
                            <td>
                                <select style=\"display:inline\" class=\"columnNameSelect\">
                                    <option value=\"\">";
            // line 133
            echo _gettext("select column");
            echo "</option>
                                </select>
                            </td>
                        </tr>

                        <tr style=\"background:none\" class=\"rhs_text\">
                            <td></td>
                            <td colspan=\"2\">
                                <input type=\"text\"
                                    style=\"width:91%\"
                                    class=\"rhs_text_val\"
                                    placeholder=\"";
            // line 144
            echo _gettext("Enter criteria as free text");
            echo "\">
                            </td>
                        </tr>

                        </table>
                    </div>
                </div>
                <a href=\"#\"
                    title=\"";
            // line 152
            echo _gettext("Remove this column");
            echo "\"
                    style=\"float:right;color:red\"
                    class=\"removeColumn\">
                    X
                </a>
            </fieldset>
            ";
            // line 158
            if (($context["id"] == 0)) {
                echo "</div>";
            }
            // line 159
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['id'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 160
        echo "
        <fieldset style=\"display:inline\">
            <input class=\"btn btn-secondary\" type=\"button\" value=\"";
        // line 162
        echo _gettext("+ Add column");
        echo "\" id=\"add_column_button\">
        </fieldset>

        <fieldset>
              ";
        // line 167
        echo "              <textarea id=\"MultiSqlquery\"
                  cols=\"80\"
                  rows=\"4\"
                  style=\"float: left;\"
                  name=\"sql_query\"
                  dir=\"ltr\"></textarea>
        </fieldset>
    </fieldset>

    <fieldset class=\"tblFooters\">
        <input class=\"btn btn-secondary\" type=\"button\" id=\"update_query_button\" value=\"";
        // line 177
        echo _gettext("Update query");
        echo "\">
        <input class=\"btn btn-primary\" type=\"button\" id=\"submit_query\" value=\"";
        // line 178
        echo _gettext("Submit query");
        echo "\">
    </fieldset>
</form>
</div>";
        // line 182
        echo "<div id=\"sql_results\"></div>
";
    }

    public function getTemplateName()
    {
        return "database/multi_table_query/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  369 => 182,  363 => 178,  359 => 177,  347 => 167,  340 => 162,  336 => 160,  322 => 159,  318 => 158,  309 => 152,  298 => 144,  284 => 133,  278 => 129,  267 => 127,  263 => 126,  259 => 125,  247 => 116,  243 => 115,  207 => 82,  196 => 74,  190 => 71,  181 => 67,  175 => 66,  171 => 65,  165 => 61,  163 => 57,  162 => 56,  157 => 54,  151 => 51,  147 => 50,  142 => 48,  135 => 44,  130 => 41,  119 => 39,  115 => 38,  111 => 37,  107 => 35,  102 => 34,  85 => 33,  82 => 32,  75 => 30,  64 => 28,  60 => 27,  54 => 25,  50 => 24,  45 => 22,  42 => 21,  40 => 16,  38 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/multi_table_query/form.twig", "C:\\365SPORT.com\\domains\\igameprovider\\public\\pma\\templates\\database\\multi_table_query\\form.twig");
    }
}
