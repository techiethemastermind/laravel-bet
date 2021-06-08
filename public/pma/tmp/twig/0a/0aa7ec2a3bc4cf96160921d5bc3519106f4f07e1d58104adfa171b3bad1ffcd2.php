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

/* server/databases/index.twig */
class __TwigTemplate_34cdb93df61fa8b580398db7ca938491d8f49f9dee513d0334ac92737f8c15d0 extends \Twig\Template
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
        echo "<h2>
  ";
        // line 2
        echo PhpMyAdmin\Util::getImage("s_db");
        echo "
  ";
        // line 3
        if (($context["has_statistics"] ?? null)) {
            // line 4
            echo "    ";
            echo _gettext("Databases statistics");
            // line 5
            echo "  ";
        } else {
            // line 6
            echo "    ";
            echo _gettext("Databases");
            // line 7
            echo "  ";
        }
        // line 8
        echo "</h2>

";
        // line 10
        if (($context["is_create_database_shown"] ?? null)) {
            // line 11
            echo "  <ul>
    <li id=\"li_create_database\" class=\"no_bullets\">
      ";
            // line 13
            if (($context["has_create_database_privileges"] ?? null)) {
                // line 14
                echo "        <form method=\"post\" action=\"server_databases.php\" id=\"create_database_form\" class=\"ajax\">
          <p>
            <strong>
              <label for=\"text_create_db\">
                ";
                // line 18
                echo PhpMyAdmin\Util::getImage("b_newdb");
                echo "
                ";
                // line 19
                echo _gettext("Create database");
                // line 20
                echo "              </label>
              ";
                // line 21
                echo PhpMyAdmin\Util::showMySQLDocu("CREATE_DATABASE");
                echo "
            </strong>
          </p>

          ";
                // line 25
                echo PhpMyAdmin\Url::getHiddenInputs("", "", 5);
                echo "
          <input type=\"hidden\" name=\"reload\" value=\"1\">
          ";
                // line 27
                if (($context["has_statistics"] ?? null)) {
                    // line 28
                    echo "            <input type=\"hidden\" name=\"statistics\" value=\"1\">
          ";
                }
                // line 30
                echo "
          <input type=\"text\" name=\"new_db\" maxlength=\"64\" class=\"textfield\" value=\"";
                // line 32
                echo twig_escape_filter($this->env, ($context["database_to_create"] ?? null), "html", null, true);
                echo "\" id=\"text_create_db\" placeholder=\"";
                // line 33
                echo _gettext("Database name");
                echo "\" required>

          ";
                // line 35
                if ( !twig_test_empty(($context["charsets"] ?? null))) {
                    // line 36
                    echo "            <select lang=\"en\" dir=\"ltr\" name=\"db_collation\">
              <option value=\"\">";
                    // line 37
                    echo _gettext("Collation");
                    echo "</option>
              <option value=\"\"></option>
              ";
                    // line 39
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                        // line 40
                        echo "                <optgroup label=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 40), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 40), "html", null, true);
                        echo "\">
                  ";
                        // line 41
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 41));
                        foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                            // line 42
                            echo "                    <option value=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 42), "html", null, true);
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 42), "html", null, true);
                            echo "\"";
                            echo ((twig_get_attribute($this->env, $this->source, $context["collation"], "is_selected", [], "any", false, false, false, 42)) ? (" selected") : (""));
                            echo ">";
                            // line 43
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 43), "html", null, true);
                            // line 44
                            echo "</option>
                  ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 46
                        echo "                </optgroup>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 48
                    echo "            </select>
          ";
                }
                // line 50
                echo "
          <input id=\"buttonGo\" class=\"btn btn-primary\" type=\"submit\" value=\"";
                // line 51
                echo _gettext("Create");
                echo "\">
        </form>
      ";
            } else {
                // line 54
                echo "        <p>
          <strong>
            ";
                // line 56
                echo PhpMyAdmin\Util::getImage("b_newdb");
                echo "
            ";
                // line 57
                echo _gettext("Create database");
                // line 58
                echo "            ";
                echo PhpMyAdmin\Util::showMySQLDocu("CREATE_DATABASE");
                echo "
          </strong>
        </p>

        <span class=\"noPrivileges\">
          ";
                // line 63
                echo PhpMyAdmin\Util::getImage("s_error", "", ["hspace" => 2, "border" => 0, "align" => "middle"]);
                // line 67
                echo "
          ";
                // line 68
                echo _gettext("No privileges to create databases");
                // line 69
                echo "        </span>
      ";
            }
            // line 71
            echo "    </li>
  </ul>
";
        }
        // line 74
        echo "
";
        // line 75
        if ((($context["database_count"] ?? null) > 0)) {
            // line 76
            echo "  ";
            $this->loadTemplate("filter.twig", "server/databases/index.twig", 76)->display(twig_to_array(["filter_value" => ""]));
            // line 77
            echo "
  <div id=\"tableslistcontainer\">
    ";
            // line 79
            echo PhpMyAdmin\Util::getListNavigator(            // line 80
($context["database_count"] ?? null),             // line 81
($context["pos"] ?? null),             // line 82
($context["url_params"] ?? null), "server_databases.php", "frame_content",             // line 85
($context["max_db_list"] ?? null));
            // line 86
            echo "

    <form class=\"ajax\" action=\"server_databases.php\" method=\"post\" name=\"dbStatsForm\" id=\"dbStatsForm\">
      ";
            // line 89
            echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
            echo "
      <div class=\"responsivetable\">
        <table id=\"tabledatabases\" class=\"data\">
          <thead>
            <tr>
              ";
            // line 94
            if (($context["is_drop_allowed"] ?? null)) {
                // line 95
                echo "                <th></th>
              ";
            }
            // line 97
            echo "              <th>
                <a href=\"server_databases.php";
            // line 98
            echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["sort_by" => "SCHEMA_NAME", "sort_order" => ((((twig_get_attribute($this->env, $this->source,             // line 100
($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 100) == "SCHEMA_NAME") && (twig_get_attribute($this->env, $this->source,             // line 101
($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 101) == "asc"))) ? ("desc") : ("asc"))]));
            // line 102
            echo "\">
                  ";
            // line 103
            echo _gettext("Database");
            // line 104
            echo "                  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 104) == "SCHEMA_NAME")) {
                // line 105
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 105) == "asc")) {
                    // line 106
                    echo "                      ";
                    echo PhpMyAdmin\Util::getImage("s_asc", _gettext("Ascending"));
                    echo "
                    ";
                } else {
                    // line 108
                    echo "                      ";
                    echo PhpMyAdmin\Util::getImage("s_desc", _gettext("Descending"));
                    echo "
                    ";
                }
                // line 110
                echo "                  ";
            }
            // line 111
            echo "                </a>
              </th>

              <th>
                <a href=\"server_databases.php";
            // line 115
            echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["sort_by" => "DEFAULT_COLLATION_NAME", "sort_order" => ((((twig_get_attribute($this->env, $this->source,             // line 117
($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 117) == "DEFAULT_COLLATION_NAME") && (twig_get_attribute($this->env, $this->source,             // line 118
($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 118) == "asc"))) ? ("desc") : ("asc"))]));
            // line 119
            echo "\">
                  ";
            // line 120
            echo _gettext("Collation");
            // line 121
            echo "                  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 121) == "DEFAULT_COLLATION_NAME")) {
                // line 122
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 122) == "asc")) {
                    // line 123
                    echo "                      ";
                    echo PhpMyAdmin\Util::getImage("s_asc", _gettext("Ascending"));
                    echo "
                    ";
                } else {
                    // line 125
                    echo "                      ";
                    echo PhpMyAdmin\Util::getImage("s_desc", _gettext("Descending"));
                    echo "
                    ";
                }
                // line 127
                echo "                  ";
            }
            // line 128
            echo "                </a>
              </th>

              ";
            // line 131
            if (($context["has_statistics"] ?? null)) {
                // line 132
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["header_statistics"] ?? null));
                foreach ($context['_seq'] as $context["name"] => $context["statistic"]) {
                    // line 133
                    echo "                  <th";
                    echo (((twig_get_attribute($this->env, $this->source, $context["statistic"], "format", [], "any", false, false, false, 133) == "byte")) ? (" colspan=\"2\"") : (""));
                    echo ">
                    <a href=\"server_databases.php";
                    // line 134
                    echo PhpMyAdmin\Url::getCommon(twig_array_merge(($context["url_params"] ?? null), ["sort_by" =>                     // line 135
$context["name"], "sort_order" => ((((twig_get_attribute($this->env, $this->source,                     // line 136
($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 136) == $context["name"]) && (twig_get_attribute($this->env, $this->source,                     // line 137
($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 137) == "asc"))) ? ("desc") : ("asc"))]));
                    // line 138
                    echo "\">
                      ";
                    // line 139
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "title", [], "any", false, false, false, 139), "html", null, true);
                    echo "
                      ";
                    // line 140
                    if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_by", [], "any", false, false, false, 140) == $context["name"])) {
                        // line 141
                        echo "                        ";
                        if ((twig_get_attribute($this->env, $this->source, ($context["url_params"] ?? null), "sort_order", [], "any", false, false, false, 141) == "asc")) {
                            // line 142
                            echo "                          ";
                            echo PhpMyAdmin\Util::getImage("s_asc", _gettext("Ascending"));
                            echo "
                        ";
                        } else {
                            // line 144
                            echo "                          ";
                            echo PhpMyAdmin\Util::getImage("s_desc", _gettext("Descending"));
                            echo "
                        ";
                        }
                        // line 146
                        echo "                      ";
                    }
                    // line 147
                    echo "                    </a>
                  </th>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['name'], $context['statistic'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 150
                echo "              ";
            }
            // line 151
            echo "
              ";
            // line 152
            if (($context["has_master_replication"] ?? null)) {
                // line 153
                echo "                <th>";
                echo _gettext("Master replication");
                echo "</th>
              ";
            }
            // line 155
            echo "
              ";
            // line 156
            if (($context["has_slave_replication"] ?? null)) {
                // line 157
                echo "                <th>";
                echo _gettext("Slave replication");
                echo "</th>
              ";
            }
            // line 159
            echo "
              <th>";
            // line 160
            echo _gettext("Action");
            echo "</th>
            </tr>
          </thead>

          <tbody>
            ";
            // line 165
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["databases"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["database"]) {
                // line 166
                echo "              <tr class=\"db-row";
                echo ((twig_get_attribute($this->env, $this->source, $context["database"], "is_system_schema", [], "any", false, false, false, 166)) ? (" noclick") : (""));
                echo "\" data-filter-row=\"";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 166)), "html", null, true);
                echo "\">
                ";
                // line 167
                if (($context["is_drop_allowed"] ?? null)) {
                    // line 168
                    echo "                  <td class=\"tool\">
                    <input type=\"checkbox\" name=\"selected_dbs[]\" class=\"checkall\" title=\"";
                    // line 170
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 170), "html", null, true);
                    echo "\" value=\"";
                    // line 171
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 171), "html", null, true);
                    echo "\"";
                    // line 172
                    echo ((twig_get_attribute($this->env, $this->source, $context["database"], "is_system_schema", [], "any", false, false, false, 172)) ? (" disabled") : (""));
                    echo ">
                  </td>
                ";
                }
                // line 175
                echo "
                <td class=\"name\">
                  <a href=\"";
                // line 177
                echo PhpMyAdmin\Util::getScriptNameForOption(($context["default_tab_database"] ?? null), "database");
                // line 178
                echo PhpMyAdmin\Url::getCommon(["db" => twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 178)]);
                echo "\" title=\"";
                // line 179
                echo twig_escape_filter($this->env, sprintf(_gettext("Jump to database '%s'"), twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 179)), "html", null, true);
                echo "\">
                    ";
                // line 180
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 180), "html", null, true);
                echo "
                  </a>
                </td>

                <td class=\"value\">
                  <dfn title=\"";
                // line 185
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "collation", [], "any", false, false, false, 185), "description", [], "any", false, false, false, 185), "html", null, true);
                echo "\">
                    ";
                // line 186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "collation", [], "any", false, false, false, 186), "name", [], "any", false, false, false, 186), "html", null, true);
                echo "
                  </dfn>
                </td>

                ";
                // line 190
                if (($context["has_statistics"] ?? null)) {
                    // line 191
                    echo "                  ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["database"], "statistics", [], "any", false, false, false, 191));
                    foreach ($context['_seq'] as $context["_key"] => $context["statistic"]) {
                        // line 192
                        echo "                    ";
                        if ((twig_get_attribute($this->env, $this->source, $context["statistic"], "format", [], "any", false, false, false, 192) === "byte")) {
                            // line 193
                            echo "                      ";
                            $context["value"] = PhpMyAdmin\Util::formatByteDown(twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 193), 3, 1);
                            // line 194
                            echo "                      <td class=\"value\">
                        <data value=\"";
                            // line 195
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 195), "html", null, true);
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 195), "html", null, true);
                            echo "\">
                          ";
                            // line 196
                            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["value"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[0] ?? null) : null), "html", null, true);
                            echo "
                        </data>
                      </td>
                      <td class=\"unit\">";
                            // line 199
                            echo twig_escape_filter($this->env, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["value"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[1] ?? null) : null), "html", null, true);
                            echo "</td>
                    ";
                        } else {
                            // line 201
                            echo "                      <td class=\"value\">
                        <data value=\"";
                            // line 202
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 202), "html", null, true);
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 202), "html", null, true);
                            echo "\">
                          ";
                            // line 203
                            echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 203), 0), "html", null, true);
                            echo "
                        </data>
                      </td>
                    ";
                        }
                        // line 207
                        echo "                  ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statistic'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 208
                    echo "                ";
                }
                // line 209
                echo "
                ";
                // line 210
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "replication", [], "any", false, false, false, 210), "master", [], "any", false, false, false, 210), "status", [], "any", false, false, false, 210)) {
                    // line 211
                    echo "                  ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "replication", [], "any", false, false, false, 211), "master", [], "any", false, false, false, 211), "is_replicated", [], "any", false, false, false, 211)) {
                        // line 212
                        echo "                    <td class=\"tool center\">
                      ";
                        // line 213
                        echo PhpMyAdmin\Util::getIcon("s_success", _gettext("Replicated"));
                        echo "
                    </td>
                  ";
                    } else {
                        // line 216
                        echo "                    <td class=\"tool center\">
                      ";
                        // line 217
                        echo PhpMyAdmin\Util::getIcon("s_cancel", _gettext("Not replicated"));
                        echo "
                    </td>
                  ";
                    }
                    // line 220
                    echo "                ";
                }
                // line 221
                echo "
                ";
                // line 222
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "replication", [], "any", false, false, false, 222), "slave", [], "any", false, false, false, 222), "status", [], "any", false, false, false, 222)) {
                    // line 223
                    echo "                  ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["database"], "replication", [], "any", false, false, false, 223), "slave", [], "any", false, false, false, 223), "is_replicated", [], "any", false, false, false, 223)) {
                        // line 224
                        echo "                    <td class=\"tool center\">
                      ";
                        // line 225
                        echo PhpMyAdmin\Util::getIcon("s_success", _gettext("Replicated"));
                        echo "
                    </td>
                  ";
                    } else {
                        // line 228
                        echo "                    <td class=\"tool center\">
                      ";
                        // line 229
                        echo PhpMyAdmin\Util::getIcon("s_cancel", _gettext("Not replicated"));
                        echo "
                    </td>
                  ";
                    }
                    // line 232
                    echo "                ";
                }
                // line 233
                echo "
                <td class=\"tool\">
                  <a class=\"server_databases\" data=\"";
                // line 236
                echo PhpMyAdmin\Sanitize::jsFormat(twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 236));
                echo "\" href=\"server_privileges.php";
                // line 237
                echo PhpMyAdmin\Url::getCommon(["db" => twig_get_attribute($this->env, $this->source,                 // line 238
$context["database"], "name", [], "any", false, false, false, 238), "checkprivsdb" => twig_get_attribute($this->env, $this->source,                 // line 239
$context["database"], "name", [], "any", false, false, false, 239)]);
                // line 240
                echo "\" title=\"";
                // line 241
                echo twig_escape_filter($this->env, sprintf(_gettext("Check privileges for database \"%s\"."), twig_get_attribute($this->env, $this->source, $context["database"], "name", [], "any", false, false, false, 241)), "html", null, true);
                echo "\">
                    ";
                // line 242
                echo PhpMyAdmin\Util::getIcon("s_rights", _gettext("Check privileges"));
                echo "
                  </a>
                </td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['database'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 247
            echo "          </tbody>

          <tfoot>
            <tr>
              <th colspan=\"";
            // line 251
            echo ((($context["is_drop_allowed"] ?? null)) ? ("3") : ("2"));
            echo "\">
                ";
            // line 252
            echo _gettext("Total:");
            // line 253
            echo "                <span id=\"filter-rows-count\">";
            // line 254
            echo twig_escape_filter($this->env, ($context["database_count"] ?? null), "html", null, true);
            // line 255
            echo "</span>
              </th>

              ";
            // line 258
            if (($context["has_statistics"] ?? null)) {
                // line 259
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["total_statistics"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["statistic"]) {
                    // line 260
                    echo "                  ";
                    if ((twig_get_attribute($this->env, $this->source, $context["statistic"], "format", [], "any", false, false, false, 260) === "byte")) {
                        // line 261
                        echo "                    ";
                        $context["value"] = PhpMyAdmin\Util::formatByteDown(twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 261), 3, 1);
                        // line 262
                        echo "                    <th class=\"value\">
                      <data value=\"";
                        // line 263
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 263), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 263), "html", null, true);
                        echo "\">
                        ";
                        // line 264
                        echo twig_escape_filter($this->env, (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["value"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[0] ?? null) : null), "html", null, true);
                        echo "
                      </data>
                    </th>
                    <th class=\"unit\">";
                        // line 267
                        echo twig_escape_filter($this->env, (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["value"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002[1] ?? null) : null), "html", null, true);
                        echo "</th>
                  ";
                    } else {
                        // line 269
                        echo "                    <th class=\"value\">
                      <data value=\"";
                        // line 270
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 270), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 270), "html", null, true);
                        echo "\">
                        ";
                        // line 271
                        echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber(twig_get_attribute($this->env, $this->source, $context["statistic"], "raw", [], "any", false, false, false, 271), 0), "html", null, true);
                        echo "
                      </data>
                    </th>
                  ";
                    }
                    // line 275
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statistic'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 276
                echo "              ";
            }
            // line 277
            echo "
              ";
            // line 278
            if (($context["has_master_replication"] ?? null)) {
                // line 279
                echo "                <th></th>
              ";
            }
            // line 281
            echo "
              ";
            // line 282
            if (($context["has_slave_replication"] ?? null)) {
                // line 283
                echo "                <th></th>
              ";
            }
            // line 285
            echo "
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>

      ";
            // line 293
            echo "      ";
            if (($context["is_drop_allowed"] ?? null)) {
                // line 294
                echo "        ";
                $this->loadTemplate("select_all.twig", "server/databases/index.twig", 294)->display(twig_to_array(["pma_theme_image" =>                 // line 295
($context["pma_theme_image"] ?? null), "text_dir" =>                 // line 296
($context["text_dir"] ?? null), "form_name" => "dbStatsForm"]));
                // line 299
                echo "
        ";
                // line 300
                echo PhpMyAdmin\Util::getButtonOrImage("", "mult_submit ajax", _gettext("Drop"), "b_deltbl");
                // line 305
                echo "
      ";
            }
            // line 307
            echo "
      ";
            // line 309
            echo "      ";
            if ( !($context["has_statistics"] ?? null)) {
                // line 310
                echo "        ";
                echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("Note: Enabling the database statistics here might cause heavy traffic between the web server and the MySQL server.")]);
                echo "
        <ul>
          <li class=\"li_switch_dbstats\">
            <a href=\"server_databases.php\" data-post=\"";
                // line 313
                echo PhpMyAdmin\Url::getCommon(["statistics" => "1"], "");
                echo "\" title=\"";
                echo _gettext("Enable statistics");
                echo "\">
              <strong>";
                // line 314
                echo _gettext("Enable statistics");
                echo "</strong>
            </a>
          </li>
        </ul>
      ";
            }
            // line 319
            echo "    </form>
  </div>
";
        } else {
            // line 322
            echo "  <p>";
            echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("No databases")]);
            echo "</p>
";
        }
    }

    public function getTemplateName()
    {
        return "server/databases/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  769 => 322,  764 => 319,  756 => 314,  750 => 313,  743 => 310,  740 => 309,  737 => 307,  733 => 305,  731 => 300,  728 => 299,  726 => 296,  725 => 295,  723 => 294,  720 => 293,  711 => 285,  707 => 283,  705 => 282,  702 => 281,  698 => 279,  696 => 278,  693 => 277,  690 => 276,  684 => 275,  677 => 271,  671 => 270,  668 => 269,  663 => 267,  657 => 264,  651 => 263,  648 => 262,  645 => 261,  642 => 260,  637 => 259,  635 => 258,  630 => 255,  628 => 254,  626 => 253,  624 => 252,  620 => 251,  614 => 247,  603 => 242,  599 => 241,  597 => 240,  595 => 239,  594 => 238,  593 => 237,  590 => 236,  586 => 233,  583 => 232,  577 => 229,  574 => 228,  568 => 225,  565 => 224,  562 => 223,  560 => 222,  557 => 221,  554 => 220,  548 => 217,  545 => 216,  539 => 213,  536 => 212,  533 => 211,  531 => 210,  528 => 209,  525 => 208,  519 => 207,  512 => 203,  506 => 202,  503 => 201,  498 => 199,  492 => 196,  486 => 195,  483 => 194,  480 => 193,  477 => 192,  472 => 191,  470 => 190,  463 => 186,  459 => 185,  451 => 180,  447 => 179,  444 => 178,  442 => 177,  438 => 175,  432 => 172,  429 => 171,  426 => 170,  423 => 168,  421 => 167,  414 => 166,  410 => 165,  402 => 160,  399 => 159,  393 => 157,  391 => 156,  388 => 155,  382 => 153,  380 => 152,  377 => 151,  374 => 150,  366 => 147,  363 => 146,  357 => 144,  351 => 142,  348 => 141,  346 => 140,  342 => 139,  339 => 138,  337 => 137,  336 => 136,  335 => 135,  334 => 134,  329 => 133,  324 => 132,  322 => 131,  317 => 128,  314 => 127,  308 => 125,  302 => 123,  299 => 122,  296 => 121,  294 => 120,  291 => 119,  289 => 118,  288 => 117,  287 => 115,  281 => 111,  278 => 110,  272 => 108,  266 => 106,  263 => 105,  260 => 104,  258 => 103,  255 => 102,  253 => 101,  252 => 100,  251 => 98,  248 => 97,  244 => 95,  242 => 94,  234 => 89,  229 => 86,  227 => 85,  226 => 82,  225 => 81,  224 => 80,  223 => 79,  219 => 77,  216 => 76,  214 => 75,  211 => 74,  206 => 71,  202 => 69,  200 => 68,  197 => 67,  195 => 63,  186 => 58,  184 => 57,  180 => 56,  176 => 54,  170 => 51,  167 => 50,  163 => 48,  156 => 46,  149 => 44,  147 => 43,  139 => 42,  135 => 41,  128 => 40,  124 => 39,  119 => 37,  116 => 36,  114 => 35,  109 => 33,  106 => 32,  103 => 30,  99 => 28,  97 => 27,  92 => 25,  85 => 21,  82 => 20,  80 => 19,  76 => 18,  70 => 14,  68 => 13,  64 => 11,  62 => 10,  58 => 8,  55 => 7,  52 => 6,  49 => 5,  46 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/databases/index.twig", "C:\\365SPORT.com\\pma\\templates\\server\\databases\\index.twig");
    }
}
