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

/* home/index.twig */
class __TwigTemplate_21b639ca9176709a31bcb6c75bf6cc01249bcfe9c26836cc341b02ed2acdcbc0 extends \Twig\Template
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
        if (($context["is_git_revision"] ?? null)) {
            // line 2
            echo "  <div id=\"is_git_revision\"></div>
";
        }
        // line 4
        echo "
";
        // line 5
        echo ($context["message"] ?? null);
        echo "

";
        // line 7
        echo ($context["partial_logout"] ?? null);
        echo "

<div id=\"maincontainer\">
  ";
        // line 10
        echo ($context["sync_favorite_tables"] ?? null);
        echo "

  <div id=\"main_pane_left\">
    ";
        // line 13
        if (($context["has_server"] ?? null)) {
            // line 14
            echo "      ";
            if (($context["is_demo"] ?? null)) {
                // line 15
                echo "        <div class=\"group\">
          <h2>";
                // line 16
                echo _gettext("phpMyAdmin Demo Server");
                echo "</h2>
          <p class=\"cfg_dbg_demo\">
            ";
                // line 18
                ob_start(function () { return ''; });
                // line 19
                echo "              ";
                echo _gettext("You are using the demo server. You can do anything here, but please do not change root, debian-sys-maint and pma users. More information is available at %s.");
                // line 22
                echo "            ";
                $___internal_822eda2ebf7c8dc187712475ee651ba07654d4cea3764bf10f6a2e647a2adce3_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 18
                echo sprintf($___internal_822eda2ebf7c8dc187712475ee651ba07654d4cea3764bf10f6a2e647a2adce3_, "<a href=\"url.php?url=https://demo.phpmyadmin.net/\" target=\"_blank\" rel=\"noopener noreferrer\">demo.phpmyadmin.net</a>");
                // line 23
                echo "          </p>
        </div>
      ";
            }
            // line 26
            echo "
      <div class=\"group\">
        <h2>";
            // line 28
            echo _gettext("General settings");
            echo "</h2>
        <ul>
          ";
            // line 30
            if (($context["has_server_selection"] ?? null)) {
                // line 31
                echo "            <li id=\"li_select_server\" class=\"no_bullets\">
              ";
                // line 32
                echo PhpMyAdmin\Util::getImage("s_host");
                echo "
              ";
                // line 33
                echo ($context["server_selection"] ?? null);
                echo "
            </li>
          ";
            }
            // line 36
            echo "
          ";
            // line 37
            if ((($context["server"] ?? null) > 0)) {
                // line 38
                echo "            ";
                echo (( !twig_test_empty(($context["change_password"] ?? null))) ? (($context["change_password"] ?? null)) : (""));
                echo "

            <li id=\"li_select_mysql_collation\" class=\"no_bullets\">
              <form class=\"disableAjax\" method=\"post\" action=\"index.php\">
                ";
                // line 42
                echo PhpMyAdmin\Url::getHiddenInputs(null, null, 4, "collation_connection");
                echo "
                <label for=\"select_collation_connection\">
                  ";
                // line 44
                echo PhpMyAdmin\Util::getImage("s_asci");
                echo "
                  ";
                // line 45
                echo _gettext("Server connection collation:");
                // line 46
                echo "                  ";
                echo PhpMyAdmin\Util::showMySQLDocu("charset-connection");
                echo "
                </label>
                ";
                // line 48
                if ( !twig_test_empty(($context["charsets"] ?? null))) {
                    // line 49
                    echo "                  <select lang=\"en\" dir=\"ltr\" name=\"collation_connection\" id=\"select_collation_connection\" class=\"autosubmit\">
                    <option value=\"\">";
                    // line 50
                    echo _gettext("Collation");
                    echo "</option>
                    <option value=\"\"></option>
                    ";
                    // line 52
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                        // line 53
                        echo "                      <optgroup label=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 53), "html", null, true);
                        echo "\">
                        ";
                        // line 54
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 54));
                        foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                            // line 55
                            echo "                          <option value=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 55), "html", null, true);
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 55), "html", null, true);
                            echo "\"";
                            echo ((twig_get_attribute($this->env, $this->source, $context["collation"], "is_selected", [], "any", false, false, false, 55)) ? (" selected") : (""));
                            echo ">";
                            // line 56
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 56), "html", null, true);
                            // line 57
                            echo "</option>
                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 59
                        echo "                      </optgroup>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 61
                    echo "                  </select>
                ";
                }
                // line 63
                echo "              </form>
            </li>
          ";
            }
            // line 66
            echo "          ";
            echo (( !twig_test_empty(($context["user_preferences"] ?? null))) ? (($context["user_preferences"] ?? null)) : (""));
            echo "
        </ul>
      </div>
    ";
        }
        // line 70
        echo "
    <div class=\"group\">
      <h2>";
        // line 72
        echo _gettext("Appearance settings");
        echo "</h2>
      <ul>
        ";
        // line 74
        if ( !twig_test_empty(($context["language_selector"] ?? null))) {
            // line 75
            echo "          <li id=\"li_select_lang\" class=\"no_bullets\">
            ";
            // line 76
            echo PhpMyAdmin\Util::getImage("s_lang");
            echo "
            ";
            // line 77
            echo ($context["language_selector"] ?? null);
            echo "
          </li>
        ";
        }
        // line 80
        echo "
        ";
        // line 81
        if ( !twig_test_empty(($context["theme_selection"] ?? null))) {
            // line 82
            echo "          <li id=\"li_select_theme\" class=\"no_bullets\">
            ";
            // line 83
            echo PhpMyAdmin\Util::getImage("s_theme");
            echo "
            ";
            // line 84
            echo ($context["theme_selection"] ?? null);
            echo "
          </li>
        ";
        }
        // line 87
        echo "      </ul>
    </div>
  </div>

  <div id=\"main_pane_right\">
    ";
        // line 92
        if ( !twig_test_empty(($context["database_server"] ?? null))) {
            // line 93
            echo "      <div class=\"group\">
        <h2>";
            // line 94
            echo _gettext("Database server");
            echo "</h2>
        <ul>
          <li id=\"li_server_info\">
            ";
            // line 97
            echo _gettext("Server:");
            // line 98
            echo "            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "host", [], "any", false, false, false, 98), "html", null, true);
            echo "
          </li>
          <li id=\"li_server_type\">
            ";
            // line 101
            echo _gettext("Server type:");
            // line 102
            echo "            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "type", [], "any", false, false, false, 102), "html", null, true);
            echo "
          </li>
          <li id=\"li_server_connection\">
            ";
            // line 105
            echo _gettext("Server connection:");
            // line 106
            echo "            ";
            echo twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "connection", [], "any", false, false, false, 106);
            echo "
          </li>
          <li id=\"li_server_version\">
            ";
            // line 109
            echo _gettext("Server version:");
            // line 110
            echo "            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "version", [], "any", false, false, false, 110), "html", null, true);
            echo "
          </li>
          <li id=\"li_mysql_proto\">
            ";
            // line 113
            echo _gettext("Protocol version:");
            // line 114
            echo "            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "protocol", [], "any", false, false, false, 114), "html", null, true);
            echo "
          </li>
          <li id=\"li_user_info\">
            ";
            // line 117
            echo _gettext("User:");
            // line 118
            echo "            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "user", [], "any", false, false, false, 118), "html", null, true);
            echo "
          </li>
          <li id=\"li_mysql_charset\">
            ";
            // line 121
            echo _gettext("Server charset:");
            // line 122
            echo "            <span lang=\"en\" dir=\"ltr\">
              ";
            // line 123
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["database_server"] ?? null), "charset", [], "any", false, false, false, 123), "html", null, true);
            echo "
            </span>
          </li>
        </ul>
      </div>
    ";
        }
        // line 129
        echo "
    ";
        // line 130
        if (( !twig_test_empty(($context["web_server"] ?? null)) ||  !twig_test_empty(($context["php_info"] ?? null)))) {
            // line 131
            echo "      <div class=\"group\">
        <h2>";
            // line 132
            echo _gettext("Web server");
            echo "</h2>
        <ul>
          ";
            // line 134
            if ( !twig_test_empty(($context["web_server"] ?? null))) {
                // line 135
                echo "            <li id=\"li_web_server_software\">
              ";
                // line 136
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["web_server"] ?? null), "software", [], "any", false, false, false, 136), "html", null, true);
                echo "
            </li>
            <li id=\"li_mysql_client_version\">
              ";
                // line 139
                echo _gettext("Database client version:");
                // line 140
                echo "              ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["web_server"] ?? null), "database", [], "any", false, false, false, 140), "html", null, true);
                echo "
            </li>
            <li id=\"li_used_php_extension\">
              ";
                // line 143
                echo _gettext("PHP extension:");
                // line 144
                echo "              ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["web_server"] ?? null), "php_extensions", [], "any", false, false, false, 144));
                foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
                    // line 145
                    echo "                ";
                    echo twig_escape_filter($this->env, $context["extension"], "html", null, true);
                    echo "
                ";
                    // line 146
                    echo PhpMyAdmin\Util::showPHPDocu((("book." . $context["extension"]) . ".php"));
                    echo "
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 148
                echo "            </li>
            <li id=\"li_used_php_version\">
              ";
                // line 150
                echo _gettext("PHP version:");
                // line 151
                echo "              ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["web_server"] ?? null), "php_version", [], "any", false, false, false, 151), "html", null, true);
                echo "
            </li>
          ";
            }
            // line 154
            echo "          ";
            if ( !twig_test_empty(($context["php_info"] ?? null))) {
                // line 155
                echo "            ";
                echo ($context["php_info"] ?? null);
                echo "
          ";
            }
            // line 157
            echo "        </ul>
      </div>
    ";
        }
        // line 160
        echo "
    <div class=\"group pmagroup\">
      <h2>phpMyAdmin</h2>
      <ul>
        <li id=\"li_pma_version\"";
        // line 164
        echo ((($context["is_version_checked"] ?? null)) ? (" class=\"jsversioncheck\"") : (""));
        echo ">
          ";
        // line 165
        echo _gettext("Version information:");
        // line 166
        echo "          <span class=\"version\">";
        echo twig_escape_filter($this->env, ($context["phpmyadmin_version"] ?? null), "html", null, true);
        echo "</span>
        </li>
        <li id=\"li_pma_docs\">
          <a href=\"";
        // line 169
        echo PhpMyAdmin\Util::getDocuLink("index");
        echo "\" target=\"_blank\" rel=\"noopener noreferrer\">
            ";
        // line 170
        echo _gettext("Documentation");
        // line 171
        echo "          </a>
        </li>
        <li id=\"li_pma_homepage\">
          <a href=\"";
        // line 174
        echo twig_escape_filter($this->env, PhpMyAdmin\Core::linkURL("https://www.phpmyadmin.net/"), "html", null, true);
        echo "\" target=\"_blank\" rel=\"noopener noreferrer\">
            ";
        // line 175
        echo _gettext("Official Homepage");
        // line 176
        echo "          </a>
        </li>
        <li id=\"li_pma_contribute\">
          <a href=\"";
        // line 179
        echo twig_escape_filter($this->env, PhpMyAdmin\Core::linkURL("https://www.phpmyadmin.net/contribute/"), "html", null, true);
        echo "\" target=\"_blank\" rel=\"noopener noreferrer\">
            ";
        // line 180
        echo _gettext("Contribute");
        // line 181
        echo "          </a>
        </li>
        <li id=\"li_pma_support\">
          <a href=\"";
        // line 184
        echo twig_escape_filter($this->env, PhpMyAdmin\Core::linkURL("https://www.phpmyadmin.net/support/"), "html", null, true);
        echo "\" target=\"_blank\" rel=\"noopener noreferrer\">
            ";
        // line 185
        echo _gettext("Get support");
        // line 186
        echo "          </a>
        </li>
        <li id=\"li_pma_changes\">
          <a href=\"changelog.php";
        // line 189
        echo PhpMyAdmin\Url::getCommon();
        echo "\" target=\"_blank\">
            ";
        // line 190
        echo _gettext("List of changes");
        // line 191
        echo "          </a>
        </li>
        <li id=\"li_pma_license\">
          <a href=\"license.php";
        // line 194
        echo PhpMyAdmin\Url::getCommon();
        echo "\" target=\"_blank\">
            ";
        // line 195
        echo _gettext("License");
        // line 196
        echo "          </a>
        </li>
      </ul>
    </div>
  </div>
</div>

";
        // line 203
        echo ($context["config_storage_message"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "home/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  508 => 203,  499 => 196,  497 => 195,  493 => 194,  488 => 191,  486 => 190,  482 => 189,  477 => 186,  475 => 185,  471 => 184,  466 => 181,  464 => 180,  460 => 179,  455 => 176,  453 => 175,  449 => 174,  444 => 171,  442 => 170,  438 => 169,  431 => 166,  429 => 165,  425 => 164,  419 => 160,  414 => 157,  408 => 155,  405 => 154,  398 => 151,  396 => 150,  392 => 148,  384 => 146,  379 => 145,  374 => 144,  372 => 143,  365 => 140,  363 => 139,  357 => 136,  354 => 135,  352 => 134,  347 => 132,  344 => 131,  342 => 130,  339 => 129,  330 => 123,  327 => 122,  325 => 121,  318 => 118,  316 => 117,  309 => 114,  307 => 113,  300 => 110,  298 => 109,  291 => 106,  289 => 105,  282 => 102,  280 => 101,  273 => 98,  271 => 97,  265 => 94,  262 => 93,  260 => 92,  253 => 87,  247 => 84,  243 => 83,  240 => 82,  238 => 81,  235 => 80,  229 => 77,  225 => 76,  222 => 75,  220 => 74,  215 => 72,  211 => 70,  203 => 66,  198 => 63,  194 => 61,  187 => 59,  180 => 57,  178 => 56,  170 => 55,  166 => 54,  159 => 53,  155 => 52,  150 => 50,  147 => 49,  145 => 48,  139 => 46,  137 => 45,  133 => 44,  128 => 42,  120 => 38,  118 => 37,  115 => 36,  109 => 33,  105 => 32,  102 => 31,  100 => 30,  95 => 28,  91 => 26,  86 => 23,  84 => 18,  81 => 22,  78 => 19,  76 => 18,  71 => 16,  68 => 15,  65 => 14,  63 => 13,  57 => 10,  51 => 7,  46 => 5,  43 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home/index.twig", "C:\\365SPORT.com\\pma\\templates\\home\\index.twig");
    }
}
