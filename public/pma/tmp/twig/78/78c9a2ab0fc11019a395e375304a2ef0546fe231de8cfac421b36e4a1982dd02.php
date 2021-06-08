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

/* display/import/import.twig */
class __TwigTemplate_cdf1b16de267a869a7ca660a34e4718c0466cb7a8140b479a77cd7e3ac33ea9d extends \Twig\Template
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
        echo "<iframe id=\"import_upload_iframe\" name=\"import_upload_iframe\" width=\"1\" height=\"1\" class=\"hide\"></iframe>
<div id=\"import_form_status\" class=\"hide\"></div>
<div id=\"importmain\">
    <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["pma_theme_image"] ?? null), "html", null, true);
        echo "ajax_clock_small.gif\" width=\"16\" height=\"16\" alt=\"ajax clock\" class=\"hide\">

    <script type=\"text/javascript\">
        //<![CDATA[
        ";
        // line 8
        $this->loadTemplate("display/import/javascript.twig", "display/import/import.twig", 8)->display(twig_to_array(["upload_id" =>         // line 9
($context["upload_id"] ?? null), "handler" =>         // line 10
($context["handler"] ?? null), "pma_theme_image" =>         // line 11
($context["pma_theme_image"] ?? null)]));
        // line 13
        echo "        //]]>
    </script>

    <form id=\"import_file_form\"
        action=\"import.php\"
        method=\"post\"
        enctype=\"multipart/form-data\"
        name=\"import\"
        class=\"ajax\"";
        // line 22
        if ((($context["handler"] ?? null) != "PhpMyAdmin\\Plugins\\Import\\Upload\\UploadNoplugin")) {
            // line 23
            echo "            target=\"import_upload_iframe\"";
        }
        // line 24
        echo ">

        <input type=\"hidden\" name=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["id_key"] ?? null), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, ($context["upload_id"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 27
        if ((($context["import_type"] ?? null) == "server")) {
            // line 28
            echo "            ";
            echo PhpMyAdmin\Url::getHiddenInputs("", "", 1);
            echo "
        ";
        } elseif ((        // line 29
($context["import_type"] ?? null) == "database")) {
            // line 30
            echo "            ";
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), "", 1);
            echo "
        ";
        } else {
            // line 32
            echo "            ";
            echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null), 1);
            echo "
        ";
        }
        // line 34
        echo "        <input type=\"hidden\" name=\"import_type\" value=\"";
        echo twig_escape_filter($this->env, ($context["import_type"] ?? null), "html", null, true);
        echo "\">

        <div class=\"exportoptions\" id=\"header\">
            <h2>
                ";
        // line 38
        echo PhpMyAdmin\Util::getImage("b_import", _gettext("Import"));
        echo "
                ";
        // line 39
        if ((($context["import_type"] ?? null) == "server")) {
            // line 40
            echo "                    ";
            echo _gettext("Importing into the current server");
            // line 41
            echo "                ";
        } elseif ((($context["import_type"] ?? null) == "database")) {
            // line 42
            echo "                    ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Importing into the database \"%s\""), ($context["db"] ?? null)), "html", null, true);
            echo "
                ";
        } else {
            // line 44
            echo "                    ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Importing into the table \"%s\""), ($context["table"] ?? null)), "html", null, true);
            echo "
                ";
        }
        // line 46
        echo "            </h2>
        </div>

        <div class=\"importoptions\">
            <h3>";
        // line 50
        echo _gettext("File to import:");
        echo "</h3>

            ";
        // line 53
        echo "            ";
        if ( !twig_test_empty(($context["compressions"] ?? null))) {
            // line 54
            echo "                <div class=\"formelementrow\" id=\"compression_info\">
                    <p>
                        ";
            // line 56
            echo twig_escape_filter($this->env, sprintf(_gettext("File may be compressed (%s) or uncompressed."), twig_join_filter(($context["compressions"] ?? null), ", ")), "html", null, true);
            echo "
                        <br>
                        ";
            // line 58
            echo _gettext("A compressed file's name must end in <strong>.[format].[compression]</strong>. Example: <strong>.sql.zip</strong>");
            // line 59
            echo "                    </p>
                </div>
            ";
        }
        // line 62
        echo "
            <div class=\"formelementrow\" id=\"upload_form\">
                ";
        // line 64
        if ((($context["is_upload"] ?? null) &&  !twig_test_empty(($context["upload_dir"] ?? null)))) {
            // line 65
            echo "                    <ul>
                        <li>
                            <input type=\"radio\" name=\"file_location\" id=\"radio_import_file\" required=\"required\">
                            ";
            // line 68
            echo PhpMyAdmin\Util::getBrowseUploadFileBlock(($context["max_upload_size"] ?? null));
            echo "
                            ";
            // line 69
            echo _gettext("You may also drag and drop a file on any page.");
            // line 70
            echo "                        </li>
                        <li>
                            <input type=\"radio\" name=\"file_location\" id=\"radio_local_import_file\"";
            // line 73
            if (( !twig_test_empty(($context["timeout_passed_global"] ?? null)) &&  !twig_test_empty(($context["local_import_file"] ?? null)))) {
                // line 74
                echo "                                    checked=\"checked\"";
            }
            // line 75
            echo ">
                            ";
            // line 76
            echo PhpMyAdmin\Util::getSelectUploadFileBlock(            // line 77
($context["import_list"] ?? null),             // line 78
($context["upload_dir"] ?? null));
            // line 79
            echo "
                        </li>
                    </ul>
                ";
        } elseif (        // line 82
($context["is_upload"] ?? null)) {
            // line 83
            echo "                    ";
            echo PhpMyAdmin\Util::getBrowseUploadFileBlock(($context["max_upload_size"] ?? null));
            echo "
                    <p>";
            // line 84
            echo _gettext("You may also drag and drop a file on any page.");
            echo "</p>
                ";
        } elseif ( !twig_test_empty(        // line 85
($context["upload_dir"] ?? null))) {
            // line 86
            echo "                    ";
            echo PhpMyAdmin\Util::getSelectUploadFileBlock(            // line 87
($context["import_list"] ?? null),             // line 88
($context["upload_dir"] ?? null));
            // line 89
            echo "
                ";
        } else {
            // line 91
            echo "                    ";
            echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("File uploads are not allowed on this server.")]);
            echo "
                ";
        }
        // line 93
        echo "            </div>

            <div class=\"formelementrow\" id=\"charaset_of_file\">
                ";
        // line 97
        echo "                <label for=\"charset_of_file\">";
        echo _gettext("Character set of the file:");
        echo "</label>
                ";
        // line 98
        if (($context["is_encoding_supported"] ?? null)) {
            // line 99
            echo "                    <select id=\"charset_of_file\" name=\"charset_of_file\" size=\"1\">
                        ";
            // line 100
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["encodings"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 101
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                echo "\"
                                ";
                // line 102
                if (((twig_test_empty(($context["import_charset"] ?? null)) && ($context["charset"] == "utf-8")) || (                // line 103
$context["charset"] == ($context["import_charset"] ?? null)))) {
                    // line 104
                    echo "                                    selected=\"selected\"
                                ";
                }
                // line 105
                echo ">
                                ";
                // line 106
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                echo "
                            </option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "                    </select>
                ";
        } else {
            // line 111
            echo "                  <select lang=\"en\" dir=\"ltr\" name=\"charset_of_file\" id=\"charset_of_file\">
                    <option value=\"\"></option>
                    ";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 114
                echo "                      <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 114), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 114), "html", null, true);
                echo "\"";
                // line 115
                echo (((twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 115) == "utf8")) ? (" selected") : (""));
                echo ">";
                // line 116
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 116), "html", null, true);
                // line 117
                echo "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "                  </select>
                ";
        }
        // line 121
        echo "            </div>
        </div>

        <div class=\"importoptions\">
            <h3>";
        // line 125
        echo _gettext("Partial import:");
        echo "</h3>

            ";
        // line 127
        if (((isset($context["timeout_passed"]) || array_key_exists("timeout_passed", $context)) && ($context["timeout_passed"] ?? null))) {
            // line 128
            echo "                <div class=\"formelementrow\">
                    <input type=\"hidden\" name=\"skip\" value=\"";
            // line 129
            echo twig_escape_filter($this->env, ($context["offset"] ?? null), "html", null, true);
            echo "\">
                    ";
            // line 130
            echo twig_escape_filter($this->env, sprintf(_gettext("Previous import timed out, after resubmitting will continue from position %d."), ($context["offset"] ?? null)), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 133
        echo "
            <div class=\"formelementrow\">
                <input type=\"checkbox\" name=\"allow_interrupt\" value=\"yes\" id=\"checkbox_allow_interrupt\"
                    ";
        // line 136
        echo PhpMyAdmin\Plugins::checkboxCheck("Import", "allow_interrupt");
        echo ">
                <label for=\"checkbox_allow_interrupt\">
                    ";
        // line 138
        echo _gettext("Allow the interruption of an import in case the script detects it is close to the PHP timeout limit. <em>(This might be a good way to import large files, however it can break transactions.)</em>");
        // line 139
        echo "                </label>
            </div>

            ";
        // line 142
        if ( !((isset($context["timeout_passed"]) || array_key_exists("timeout_passed", $context)) && ($context["timeout_passed"] ?? null))) {
            // line 143
            echo "                <div class=\"formelementrow\">
                    <label for=\"text_skip_queries\">
                        ";
            // line 145
            echo _gettext("Skip this number of queries (for SQL) starting from the first one:");
            // line 146
            echo "                    </label>
                    <input type=\"number\" name=\"skip_queries\" value=\"";
            // line 148
            echo PhpMyAdmin\Plugins::getDefault("Import", "skip_queries");
            // line 149
            echo "\" id=\"text_skip_queries\" min=\"0\">
                </div>
            ";
        } else {
            // line 152
            echo "                ";
            // line 155
            echo "                <input type=\"hidden\" name=\"skip_queries\" value=\"";
            // line 156
            echo PhpMyAdmin\Plugins::getDefault("Import", "skip_queries");
            // line 157
            echo "\" id=\"text_skip_queries\">
            ";
        }
        // line 159
        echo "        </div>

        <div class=\"importoptions\">
            <h3>";
        // line 162
        echo _gettext("Other options:");
        echo "</h3>
            <div class=\"formelementrow\">
                ";
        // line 164
        echo PhpMyAdmin\Util::getFKCheckbox();
        echo "
            </div>
        </div>

        <div class=\"importoptions\">
            <h3>";
        // line 169
        echo _gettext("Format:");
        echo "</h3>
            ";
        // line 170
        echo PhpMyAdmin\Plugins::getChoice("Import", "format", ($context["import_list"] ?? null));
        echo "
            <div id=\"import_notification\"></div>
        </div>

        <div class=\"importoptions\" id=\"format_specific_opts\">
            <h3>";
        // line 175
        echo _gettext("Format-specific options:");
        echo "</h3>
            <p class=\"no_js_msg\" id=\"scroll_to_options_msg\">
                ";
        // line 177
        echo _gettext("Scroll down to fill in the options for the selected format and ignore the options for other formats.");
        // line 178
        echo "            </p>
            ";
        // line 179
        echo PhpMyAdmin\Plugins::getOptions("Import", ($context["import_list"] ?? null));
        echo "
        </div>
        <div class=\"clearfloat\"></div>

        ";
        // line 184
        echo "        ";
        if (($context["can_convert_kanji"] ?? null)) {
            // line 185
            echo "            <div class=\"importoptions\" id=\"kanji_encoding\">
                <h3>";
            // line 186
            echo _gettext("Encoding Conversion:");
            echo "</h3>
                ";
            // line 187
            $this->loadTemplate("encoding/kanji_encoding_form.twig", "display/import/import.twig", 187)->display($context);
            // line 188
            echo "            </div>
        ";
        }
        // line 190
        echo "
        <div class=\"importoptions\" id=\"submit\">
            <input id=\"buttonGo\" class=\"btn btn-primary\" type=\"submit\" value=\"";
        // line 192
        echo _gettext("Go");
        echo "\">
        </div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "display/import/import.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  443 => 192,  439 => 190,  435 => 188,  433 => 187,  429 => 186,  426 => 185,  423 => 184,  416 => 179,  413 => 178,  411 => 177,  406 => 175,  398 => 170,  394 => 169,  386 => 164,  381 => 162,  376 => 159,  372 => 157,  370 => 156,  368 => 155,  366 => 152,  361 => 149,  359 => 148,  356 => 146,  354 => 145,  350 => 143,  348 => 142,  343 => 139,  341 => 138,  336 => 136,  331 => 133,  325 => 130,  321 => 129,  318 => 128,  316 => 127,  311 => 125,  305 => 121,  301 => 119,  294 => 117,  292 => 116,  289 => 115,  283 => 114,  279 => 113,  275 => 111,  271 => 109,  262 => 106,  259 => 105,  255 => 104,  253 => 103,  252 => 102,  247 => 101,  243 => 100,  240 => 99,  238 => 98,  233 => 97,  228 => 93,  222 => 91,  218 => 89,  216 => 88,  215 => 87,  213 => 86,  211 => 85,  207 => 84,  202 => 83,  200 => 82,  195 => 79,  193 => 78,  192 => 77,  191 => 76,  188 => 75,  185 => 74,  183 => 73,  179 => 70,  177 => 69,  173 => 68,  168 => 65,  166 => 64,  162 => 62,  157 => 59,  155 => 58,  150 => 56,  146 => 54,  143 => 53,  138 => 50,  132 => 46,  126 => 44,  120 => 42,  117 => 41,  114 => 40,  112 => 39,  108 => 38,  100 => 34,  94 => 32,  88 => 30,  86 => 29,  81 => 28,  79 => 27,  73 => 26,  69 => 24,  66 => 23,  64 => 22,  54 => 13,  52 => 11,  51 => 10,  50 => 9,  49 => 8,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "display/import/import.twig", "C:\\365SPORT.com\\domains\\win-365.org\\public\\pma\\templates\\display\\import\\import.twig");
    }
}
