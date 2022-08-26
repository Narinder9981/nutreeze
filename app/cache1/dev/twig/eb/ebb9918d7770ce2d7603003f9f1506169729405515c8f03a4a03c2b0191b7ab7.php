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

/* AdminBundle:Faqs:addfaqs.html.twig */
class __TwigTemplate_ea1b0374fa6de682a70624ce88cf777bfa7bf4d9e6f0b060f4de71355a006b0a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Admin/Layout/adminlayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Faqs:addfaqs.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Faqs:addfaqs.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "<style>
    .tmargin{
        margin-top: 5%;
    }
    .rmargin{
        margin-right: 5%;
        margin-left: 5%;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 13
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 14
        echo "    <section class=\"content-header\">
        <!--------- PAGE TITLE ---------->
        <h1>
            Add FAQs
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add FAQs</h3>
                    </div>

                <div class=\"box-body\">
                    ";
        // line 32
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 33
            echo "                            <div class=\"nav-tabs-custom\">
                                <!-- select languages -->
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 36
            if ((isset($context["languages"]) || array_key_exists("languages", $context))) {
                // line 37
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 38
                    echo "                                            <li class=\"";
                    if ((isset($context["selected"]) || array_key_exists("selected", $context))) {
                        if ((($context["selected"] ?? $this->getContext($context, "selected")) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            echo "active";
                        }
                    } else {
                        if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                            echo "active";
                        }
                    }
                    echo "\">
                                                <a href=\"#lan_";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "\" data-toggle=\"tab\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                    echo "</a>
                                            </li>
                                        ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 42
                echo "                                    ";
            }
            // line 43
            echo "                                </ul>
                                <!-- end  -->
                            </div>

                            <div class=\"tab-content\">
                                ";
            // line 48
            $context["main_faq_master_id"] = 0;
            // line 49
            echo "                                ";
            $context["faq_question"] = "";
            // line 50
            echo "                                ";
            $context["faq_answer"] = "";
            // line 51
            echo "
                                ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 53
                echo "                                <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
                                    <!-- ";
                // line 54
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_faqs_savefaqs");
                echo " -->
                                    ";
                // line 55
                $context["faq_question"] = "";
                // line 56
                echo "                                    ";
                $context["faq_answer"] = "";
                // line 57
                echo "
                                    <form id=\"form-";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" method=\"post\">
                                        <div class=\"form-group\">
                                        <label>FAQs Question</label>
                                        <input type=\"text\" class=\"form-control\" placeholder=\"Question\" name=\"faq_question\">
                                        </div>
                                        <div class=\"form-group\">
                                        <label >Answer</label>
                                        <input type=\"text\" class=\"form-control\" placeholder=\"Answer\" name=\"faq_answer\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"main_id\" value=\"\" >
                                        </div>
                                        <button type=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"submit\">
                                            <i class=\"fa fa-check-square-o\"></i>
                                        Save</button>
                                    </form>
                                </div>
                                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                            </div>
                    ";
        }
        // line 76
        echo "                </div>
                </div>
            </div>
        </div>
    </section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Faqs:addfaqs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 76,  250 => 74,  230 => 68,  215 => 58,  212 => 57,  209 => 56,  207 => 55,  203 => 54,  194 => 53,  177 => 52,  174 => 51,  171 => 50,  168 => 49,  166 => 48,  159 => 43,  156 => 42,  137 => 39,  124 => 38,  106 => 37,  104 => 36,  99 => 33,  97 => 32,  82 => 20,  74 => 14,  68 => 13,  52 => 3,  46 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@Admin/Layout/adminlayout.html.twig\" %}
{% block css %}
<style>
    .tmargin{
        margin-top: 5%;
    }
    .rmargin{
        margin-right: 5%;
        margin-left: 5%;
    }
</style>
{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <!--------- PAGE TITLE ---------->
        <h1>
            Add FAQs
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add FAQs</h3>
                    </div>

                <div class=\"box-body\">
                    {% if languages is defined  and languages is not empty%}
                            <div class=\"nav-tabs-custom\">
                                <!-- select languages -->
                                <ul class=\"nav nav-tabs\">
                                    {% if languages is defined %}
                                        {% for language in languages %}
                                            <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                                <a href=\"#lan_{{loop.index}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                            </li>
                                        {% endfor %}
                                    {% endif %}
                                </ul>
                                <!-- end  -->
                            </div>

                            <div class=\"tab-content\">
                                {% set main_faq_master_id = 0 %}
                                {% set faq_question = '' %}
                                {% set faq_answer = '' %}

                                {% for language in languages %}
                                <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
                                    <!-- {% set action = path('admin_faqs_savefaqs') %} -->
                                    {% set faq_question = '' %}
                                    {% set faq_answer = '' %}

                                    <form id=\"form-{{ language.language_master_id }}\" action=\"{{ action }}\" method=\"post\">
                                        <div class=\"form-group\">
                                        <label>FAQs Question</label>
                                        <input type=\"text\" class=\"form-control\" placeholder=\"Question\" name=\"faq_question\">
                                        </div>
                                        <div class=\"form-group\">
                                        <label >Answer</label>
                                        <input type=\"text\" class=\"form-control\" placeholder=\"Answer\" name=\"faq_answer\">
                                        <input type=\"hidden\" class=\"form-control\" name=\"main_id\" value=\"\" >
                                        </div>
                                        <button type=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\" name=\"submit\">
                                            <i class=\"fa fa-check-square-o\"></i>
                                        Save</button>
                                    </form>
                                </div>
                                {% endfor %}
                            </div>
                    {% endif %}
                </div>
                </div>
            </div>
        </div>
    </section>
{% endblock %}", "AdminBundle:Faqs:addfaqs.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Faqs/addfaqs.html.twig");
    }
}
