<?php

/* dashboard_main.html.twig */
class __TwigTemplate_a3d45839293e07203a224e528e79d08f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 7
        echo "
<div id=\"cookillian_new_cookies_dash\">
    <h4>";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("New Cookies"), "html", null, true);
        echo "</h4>
    ";
        // line 10
        if ((!twig_test_empty((isset($context["new_cookies"]) ? $context["new_cookies"] : null)))) {
            // line 11
            echo "        <p>
            ";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("The following new cookie(s) were detected:"), "html", null, true);
            echo "
            <em>
                ";
            // line 14
            echo twig_escape_filter($this->env, (isset($context["new_cookies"]) ? $context["new_cookies"] : null), "html", null, true);
            echo "
            </em>
            &ndash;
            <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, (isset($context["cookie_url"]) ? $context["cookie_url"] : null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Edit the cookies"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Edit"), "html", null, true);
            echo "</a>
        </p>


    ";
        } else {
            // line 22
            echo "        <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("No new cookies detected"), "html", null, true);
            echo "</p>
    ";
        }
        // line 24
        echo "</div>

<div id=\"cookillian_stats_dash\">
    <h4>";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter((("Top " . (isset($context["max_stats"]) ? $context["max_stats"] : null)) . " Statistics for")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["month"]) ? $context["month"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["year"]) ? $context["year"] : null), "html", null, true);
        echo "</h4>
    ";
        // line 28
        if ((!twig_test_empty((isset($context["stats"]) ? $context["stats"] : null)))) {
            // line 29
            echo "        <br />
        <table class=\"widefat\">
            <thead>
                <tr>
                    <th scope=\"col\">";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Country"), "html", null, true);
            echo "</th>
                    <th scope=\"col\">Alerts Displayed</th>
                    <th scope=\"col\">Opted In</th>
                    <th scope=\"col\">Opted Out</th>
                    <th scope=\"col\">Ignored</th>
                </tr>
            </thead>
            <tbody>
                ";
            // line 41
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["stats"]) ? $context["stats"] : null));
            foreach ($context['_seq'] as $context["country_abbr"] => $context["country_stat"]) {
                // line 42
                echo "                    ";
                if (twig_test_empty((isset($context["country_abbr"]) ? $context["country_abbr"] : null))) {
                    // line 43
                    echo "                        ";
                    $context["country_name"] = "Unknown";
                    // line 44
                    echo "                    ";
                } elseif (((isset($context["country_abbr"]) ? $context["country_abbr"] : null) == "EU")) {
                    // line 45
                    echo "                        ";
                    $context["country_name"] = "Europe (country unknown)";
                    // line 46
                    echo "                    ";
                } elseif (((isset($context["country_abbr"]) ? $context["country_abbr"] : null) == "AP")) {
                    // line 47
                    echo "                        ";
                    $context["country_name"] = "Asia/Pacific (country unknown)";
                    // line 48
                    echo "                    ";
                } else {
                    // line 49
                    echo "                        ";
                    $context["country_name"] = $this->getAttribute($this->getAttribute((isset($context["countries"]) ? $context["countries"] : null), (isset($context["country_abbr"]) ? $context["country_abbr"] : null), array(), "array"), "country");
                    // line 50
                    echo "                    ";
                }
                // line 51
                echo "
                    <tr>
                        <td>";
                // line 53
                echo twig_escape_filter($this->env, (isset($context["country_name"]) ? $context["country_name"] : null), "html", null, true);
                echo "</td>
                        <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 0), "html", null, true);
                echo "</td>
                        <td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 1), "html", null, true);
                echo "</td>
                        <td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 2), "html", null, true);
                echo "</td>
                        <td>";
                // line 57
                echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 0) - ($this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 1) + $this->getAttribute((isset($context["country_stat"]) ? $context["country_stat"] : null), 2))), "html", null, true);
                echo "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['country_abbr'], $context['country_stat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "            </tbody>
        </table>

        ";
            // line 63
            if ((((isset($context["max_stats"]) ? $context["max_stats"] : null) > 0) && ((isset($context["stats_count"]) ? $context["stats_count"] : null) > (isset($context["max_stats"]) ? $context["max_stats"] : null)))) {
                echo "<p><a href=\"";
                echo twig_escape_filter($this->env, (isset($context["stats_url"]) ? $context["stats_url"] : null), "html", null, true);
                echo "\" title=\"See more statistics\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("See more"), "html", null, true);
                echo " &hellip;</a></p>";
            }
            // line 64
            echo "    ";
        } else {
            // line 65
            echo "        <p>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("No statistics reported yet. Not to worry, they'll come soon."), "html", null, true);
            echo "</p>
    ";
        }
        // line 67
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "dashboard_main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 67,  169 => 65,  166 => 64,  158 => 63,  153 => 60,  144 => 57,  140 => 56,  136 => 55,  132 => 54,  128 => 53,  124 => 51,  121 => 50,  118 => 49,  115 => 48,  112 => 47,  109 => 46,  106 => 45,  103 => 44,  100 => 43,  97 => 42,  93 => 41,  82 => 33,  76 => 29,  74 => 28,  66 => 27,  61 => 24,  55 => 22,  43 => 17,  37 => 14,  32 => 12,  29 => 11,  27 => 10,  23 => 9,  19 => 7,);
    }
}
