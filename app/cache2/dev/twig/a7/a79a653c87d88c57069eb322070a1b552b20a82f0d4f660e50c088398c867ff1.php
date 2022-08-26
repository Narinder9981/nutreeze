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

/* AdminBundle:Adminstatus:updateshopstatus.html.twig */
class __TwigTemplate_6580e3333fb89147d43ee7c4bf0fde5868c44e20b3b1dba323237417ad80c1d2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Adminstatus:updateshopstatus.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Adminstatus:updateshopstatus.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Manage Anano Shop Status
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 17
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 21
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 23
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Update Staus</h3>
                        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 38
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 39
            echo "                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 41
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 42
                echo "                                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
                    // line 43
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
                    // line 44
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
                // line 47
                echo "                                    ";
            }
            // line 48
            echo "                                </ul>
                            </div>

                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                ";
            // line 53
            $context["main_area_id"] = 0;
            // line 54
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
                // line 55
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 57
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_adminstatus_updatesettings", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]);
                // line 58
                echo "                                       
                                        <form id=\"form-";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\">
                                           <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">


                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    ";
                // line 65
                $context["status"] = "";
                echo " 
                                                    ";
                // line 66
                if (((isset($context["langWise_data"]) || array_key_exists("langWise_data", $context)) &&  !twig_test_empty(($context["langWise_data"] ?? $this->getContext($context, "langWise_data"))))) {
                    // line 67
                    echo "                                                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["langWise_data"] ?? $this->getContext($context, "langWise_data")));
                    foreach ($context['_seq'] as $context["_key"] => $context["langWise"]) {
                        // line 68
                        echo "                                                            ";
                        if (($this->getAttribute($context["langWise"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 69
                            echo "                                                                ";
                            $context["status"] = $this->getAttribute($context["langWise"], "status", []);
                            echo " 
                                                            ";
                        }
                        // line 71
                        echo "                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['langWise'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 72
                    echo "                                                    ";
                }
                // line 73
                echo "                                                    <div class=\"col-lg-2\">
                                                        <label>Shop Status</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                       <div class=\"radio-inline\">
                                                           <input type=\"radio\" name=\"shop_status\" value=\"busy\" ";
                // line 78
                if ((($context["status"] ?? $this->getContext($context, "status")) == "busy")) {
                    echo " checked ";
                }
                echo " required />Busy
                                                       </div>
                                                       <div class=\"radio-inline\">
                                                           <input type=\"radio\" name=\"shop_status\" value=\"free\"  ";
                // line 81
                if ((($context["status"] ?? $this->getContext($context, "status")) == "free")) {
                    echo " checked ";
                }
                echo " required />Free
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>\t

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    ";
                // line 89
                $context["busytext"] = "";
                echo " 
                                                    ";
                // line 90
                if (((isset($context["langWise_data"]) || array_key_exists("langWise_data", $context)) &&  !twig_test_empty(($context["langWise_data"] ?? $this->getContext($context, "langWise_data"))))) {
                    // line 91
                    echo "                                                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["langWise_data"] ?? $this->getContext($context, "langWise_data")));
                    foreach ($context['_seq'] as $context["_key"] => $context["langWise"]) {
                        // line 92
                        echo "                                                            ";
                        if (($this->getAttribute($context["langWise"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 93
                            echo "                                                                ";
                            $context["busytext"] = $this->getAttribute($context["langWise"], "busy_text", []);
                            echo " 
                                                            ";
                        }
                        // line 95
                        echo "                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['langWise'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 96
                    echo "                                                    ";
                }
                // line 97
                echo "                                                    <div class=\"col-lg-2\">
                                                        <label>Busy Text</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <textarea class=\"form-control\" name=\"busy_text\" placeholder=\"Enter Busy Text , Will appear in App when Shop is Busy\" required >";
                // line 101
                echo twig_escape_filter($this->env, ($context["busytext"] ?? $this->getContext($context, "busytext")), "html", null, true);
                echo "</textarea>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                ";
                // line 112
                if (((isset($context["area"]) || array_key_exists("area", $context)) &&  !twig_test_empty(($context["area"] ?? $this->getContext($context, "area"))))) {
                    echo "Update";
                } else {
                    echo "Save";
                }
                echo "\t
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

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
            // line 123
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 128
        echo "
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 141
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 142
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        })
    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Adminstatus:updateshopstatus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 142,  400 => 141,  382 => 128,  375 => 123,  346 => 112,  341 => 110,  329 => 101,  323 => 97,  320 => 96,  314 => 95,  308 => 93,  305 => 92,  300 => 91,  298 => 90,  294 => 89,  281 => 81,  273 => 78,  266 => 73,  263 => 72,  257 => 71,  251 => 69,  248 => 68,  243 => 67,  241 => 66,  237 => 65,  229 => 60,  223 => 59,  220 => 58,  218 => 57,  208 => 55,  190 => 54,  188 => 53,  181 => 48,  178 => 47,  159 => 44,  146 => 43,  128 => 42,  126 => 41,  122 => 39,  120 => 38,  111 => 32,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Manage Anano Shop Status
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        {% for flashMessage in app.session.flashbag.get('success_msg') %}
            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}
        {% for flashMessage in app.session.flashbag.get('error_msg') %}
            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>{{ flashMessage }}
            </div>
        {% endfor %}

        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Update Staus</h3>
                        <a href=\"{{ path('admin_dashboard_index', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        {% if language_list is defined  and language_list is not empty%}
                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    {% if language_list is defined %}
                                        {% for language in language_list %}
                                            <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                                <a href=\"#lan_{{loop.index}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                            </li>
                                        {% endfor %}
                                    {% endif %}
                                </ul>
                            </div>

                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                {% set main_area_id = 0 %}
                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_adminstatus_updatesettings',{'domain':app.session.get('domain')}) %}
                                       
                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\">
                                           <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">


                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    {%set status = '' %} 
                                                    {% if langWise_data is defined and langWise_data is not empty %}
                                                        {%for langWise in langWise_data %}
                                                            {%if langWise.language_id == language.language_master_id %}
                                                                {%set status = langWise.status %} 
                                                            {%endif%}
                                                        {%endfor%}
                                                    {%endif%}
                                                    <div class=\"col-lg-2\">
                                                        <label>Shop Status</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                       <div class=\"radio-inline\">
                                                           <input type=\"radio\" name=\"shop_status\" value=\"busy\" {%if status == 'busy' %} checked {%endif%} required />Busy
                                                       </div>
                                                       <div class=\"radio-inline\">
                                                           <input type=\"radio\" name=\"shop_status\" value=\"free\"  {%if status == 'free' %} checked {%endif%} required />Free
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>\t

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    {%set busytext = '' %} 
                                                    {% if langWise_data is defined and langWise_data is not empty %}
                                                        {%for langWise in langWise_data %}
                                                            {%if langWise.language_id == language.language_master_id %}
                                                                {%set busytext = langWise.busy_text %} 
                                                            {%endif%}
                                                        {%endfor%}
                                                    {%endif%}
                                                    <div class=\"col-lg-2\">
                                                        <label>Busy Text</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <textarea class=\"form-control\" name=\"busy_text\" placeholder=\"Enter Busy Text , Will appear in App when Shop is Busy\" required >{{busytext}}</textarea>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                {% if area is defined and area is not empty %}Update{%else%}Save{%endif%}\t
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                {% endfor %}

                            </div>
                            <!-- end: tab-content -->

                        {% endif %}

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js%}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>
        \$(function () {
            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        })
    </script>\t
{%endblock%}", "AdminBundle:Adminstatus:updateshopstatus.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Adminstatus/updateshopstatus.html.twig");
    }
}
