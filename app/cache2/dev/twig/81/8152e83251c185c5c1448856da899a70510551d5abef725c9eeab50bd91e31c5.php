<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* WebProfilerBundle:Router:panel.html.twig */
class __TwigTemplate_63b2d36f1ae2e13dbd488c23f7bf588da968381729764de328b1fe1d455ba7d8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "WebProfilerBundle:Router:panel.html.twig"));

        // line 1
        echo "<h2>Routing for \"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["request"] ?? $this->getContext($context, "request")), "pathinfo", []), "html", null, true);
        echo "\"</h2>

<ul>
    <li>
        <strong>Route:&nbsp;</strong>
        ";
        // line 6
        if ($this->getAttribute(($context["request"] ?? $this->getContext($context, "request")), "route", [])) {
            // line 7
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["request"] ?? $this->getContext($context, "request")), "route", []), "html", null, true);
            echo "
        ";
        } else {
            // line 9
            echo "            <em>No matching route</em>
        ";
        }
        // line 11
        echo "    </li>
    <li>
        <strong>Route parameters:&nbsp;</strong>
        ";
        // line 14
        if (twig_length_filter($this->env, $this->getAttribute(($context["request"] ?? $this->getContext($context, "request")), "routeParams", []))) {
            // line 15
            echo "            ";
            $this->loadTemplate("@WebProfiler/Profiler/table.html.twig", "WebProfilerBundle:Router:panel.html.twig", 15)->display(twig_to_array(["data" => $this->getAttribute(($context["request"] ?? $this->getContext($context, "request")), "routeParams", []), "class" => "inline"]));
            // line 16
            echo "        ";
        } else {
            // line 17
            echo "            <em>No parameters</em>
        ";
        }
        // line 19
        echo "    </li>
    ";
        // line 20
        if ($this->getAttribute(($context["router"] ?? $this->getContext($context, "router")), "redirect", [])) {
            // line 21
            echo "    <li>
        <strong>Redirecting to:&nbsp;</strong> \"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute(($context["router"] ?? $this->getContext($context, "router")), "targetUrl", []), "html", null, true);
            echo "\" ";
            if ($this->getAttribute(($context["router"] ?? $this->getContext($context, "router")), "targetRoute", [])) {
                echo "(route: \"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["router"] ?? $this->getContext($context, "router")), "targetRoute", []), "html", null, true);
                echo "\")";
            }
            // line 23
            echo "    <li>
    ";
        }
        // line 25
        echo "    <li>
        <strong>Route matching logs</strong>
        <table class=\"routing inline\">
            <tr>
                <th>Route name</th>
                <th>Pattern</th>
                <th>Log</th>
            </tr>
            ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["traces"] ?? $this->getContext($context, "traces")));
        foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
            // line 34
            echo "                <tr class=\"";
            echo (((1 == $this->getAttribute($context["trace"], "level", []))) ? ("almost") : ((((2 == $this->getAttribute($context["trace"], "level", []))) ? ("matches") : (""))));
            echo "\">
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["trace"], "name", []), "html", null, true);
            echo "</td>
                    <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["trace"], "path", []), "html", null, true);
            echo "</td>
                    <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["trace"], "log", []), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "        </table>
        <em><small>Note: The above matching is based on the configuration for the current router which might differ from
        the configuration used while routing this request.</small></em>
    </li>
</ul>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Router:panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 40,  118 => 37,  114 => 36,  110 => 35,  105 => 34,  101 => 33,  91 => 25,  87 => 23,  79 => 22,  76 => 21,  74 => 20,  71 => 19,  67 => 17,  64 => 16,  61 => 15,  59 => 14,  54 => 11,  50 => 9,  44 => 7,  42 => 6,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<h2>Routing for \"{{ request.pathinfo }}\"</h2>

<ul>
    <li>
        <strong>Route:&nbsp;</strong>
        {% if request.route %}
            {{ request.route }}
        {% else %}
            <em>No matching route</em>
        {% endif %}
    </li>
    <li>
        <strong>Route parameters:&nbsp;</strong>
        {% if request.routeParams|length %}
            {% include '@WebProfiler/Profiler/table.html.twig' with { 'data': request.routeParams, 'class': 'inline' } only %}
        {% else %}
            <em>No parameters</em>
        {% endif %}
    </li>
    {% if router.redirect %}
    <li>
        <strong>Redirecting to:&nbsp;</strong> \"{{ router.targetUrl }}\" {% if router.targetRoute %}(route: \"{{ router.targetRoute }}\"){% endif %}
    <li>
    {% endif %}
    <li>
        <strong>Route matching logs</strong>
        <table class=\"routing inline\">
            <tr>
                <th>Route name</th>
                <th>Pattern</th>
                <th>Log</th>
            </tr>
            {% for trace in traces %}
                <tr class=\"{{ 1 == trace.level ? 'almost' : 2 == trace.level ? 'matches' : '' }}\">
                    <td>{{ trace.name }}</td>
                    <td>{{ trace.path }}</td>
                    <td>{{ trace.log }}</td>
                </tr>
            {% endfor %}
        </table>
        <em><small>Note: The above matching is based on the configuration for the current router which might differ from
        the configuration used while routing this request.</small></em>
    </li>
</ul>
", "WebProfilerBundle:Router:panel.html.twig", "/var/www/admin/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Router/panel.html.twig");
    }
}
