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

/* AdminBundle:Mealtypes:addmeal.html.twig */
class __TwigTemplate_b80f3503146a5b47a5289cb8870a499b71d519e0a744ed9c24249ce959175ed4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Mealtypes:addmeal.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Mealtypes:addmeal.html.twig", 1);
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
            Add Meal Types
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

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Meal Types</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mealtypes_index");
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 41
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 42
            echo "                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 44
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 45
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
                    // line 46
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
                    // line 47
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
                // line 50
                echo "                                    ";
            }
            // line 51
            echo "                                </ul>
                            </div>

                            <!-- tab-content -->
                            ";
            // line 55
            $context["count_in_ar"] = [0 => "meal", 1 => "snacks", 2 => "soup"];
            // line 56
            echo "                            <div class=\"tab-content\">
                                ";
            // line 57
            $context["main_product_category_master_id"] = 0;
            // line 58
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
                // line 59
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 61
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_mealtypes_savemeal");
                // line 62
                echo "
                                        ";
                // line 63
                $context["product_category_name"] = "";
                // line 64
                echo "                                        ";
                $context["package_id"] = "";
                // line 65
                echo "                                        ";
                $context["count_in"] = "";
                // line 66
                echo "                                        ";
                if (((isset($context["meal"]) || array_key_exists("meal", $context)) &&  !twig_test_empty(($context["meal"] ?? $this->getContext($context, "meal"))))) {
                    // line 67
                    echo "
                                            ";
                    // line 68
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["meal"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["meal"]) {
                        // line 69
                        echo "                                                ";
                        if (($this->getAttribute($context["meal"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 70
                            echo "
                                                    ";
                            // line 71
                            $context["main_product_category_master_id"] = $this->getAttribute($context["meal"], "main_product_category_master_id", []);
                            // line 72
                            echo "                                                    ";
                            $context["product_category_name"] = $this->getAttribute($context["meal"], "product_category_name", []);
                            // line 73
                            echo "                                                    ";
                            $context["package_id"] = $this->getAttribute($context["meal"], "package_id", []);
                            // line 74
                            echo "                                                    ";
                            $context["count_in"] = $this->getAttribute($context["meal"], "count_in", []);
                            // line 75
                            echo "                                                ";
                        }
                        // line 76
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "                                        ";
                }
                // line 78
                echo "
                                        <form id=\"form-";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_product_category_master_id\" value=\"";
                // line 81
                echo twig_escape_filter($this->env, ($context["main_product_category_master_id"] ?? $this->getContext($context, "main_product_category_master_id")), "html", null, true);
                echo "\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Meal Type Name</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <input type=\"text\" class=\"form-control\" id=\"product_category_name";
                // line 90
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"product_category_name\" value=\"";
                echo twig_escape_filter($this->env, ($context["product_category_name"] ?? $this->getContext($context, "product_category_name")), "html", null, true);
                echo "\" required>
                                                    </div>
                                                </div>
                                            </div>\t
                                            </br>\t
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Package</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <select name=\"product_package[]\" class=\"form-control\" required multiple>
                                                            <option value=\"0\">--select package--</option>
                                                            ";
                // line 103
                if ( !twig_test_empty(($context["package"] ?? $this->getContext($context, "package")))) {
                    // line 104
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["package"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["package"]) {
                        // line 105
                        echo "                                                                    ";
                        if (($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["package"], "language_id", []))) {
                            // line 106
                            echo "                                                                        <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (((isset($context["package_cat_selected_arr"]) || array_key_exists("package_cat_selected_arr", $context)) && twig_in_filter($this->getAttribute($context["package"], "main_package_master_id", []), ($context["package_cat_selected_arr"] ?? $this->getContext($context, "package_cat_selected_arr"))))) {
                                echo "selected";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "package_name", []), "html", null, true);
                            echo "</option>
                                                                    ";
                        }
                        // line 108
                        echo "                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 109
                    echo "                                                            ";
                }
                // line 110
                echo "                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Count In</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name=\"count_in\" class=\"form-control\" required>
                                                            ";
                // line 123
                if ( !twig_test_empty(($context["count_in_ar"] ?? $this->getContext($context, "count_in_ar")))) {
                    // line 124
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["count_in_ar"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["count_in_ar"]) {
                        // line 125
                        echo "                                                                    <option value=\"";
                        echo twig_escape_filter($this->env, $context["count_in_ar"], "html", null, true);
                        echo "\" ";
                        if (($context["count_in_ar"] == ($context["count_in"] ?? $this->getContext($context, "count_in")))) {
                            echo "selected";
                        }
                        echo ">";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["count_in_ar"]), "html", null, true);
                        echo "</option>

                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['count_in_ar'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 128
                    echo "                                                            ";
                }
                // line 129
                echo "                                                        </select>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Image</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                       <input type=\"file\" name=\"meal_image\" class=\"form-control\" /> 
                                                    </div>
                                                </div>

                                            </div>

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
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
            // line 155
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 160
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

    public function getTemplateName()
    {
        return "AdminBundle:Mealtypes:addmeal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  437 => 160,  430 => 155,  391 => 129,  388 => 128,  372 => 125,  367 => 124,  365 => 123,  350 => 110,  347 => 109,  341 => 108,  329 => 106,  326 => 105,  321 => 104,  319 => 103,  301 => 90,  290 => 82,  286 => 81,  279 => 79,  276 => 78,  273 => 77,  267 => 76,  264 => 75,  261 => 74,  258 => 73,  255 => 72,  253 => 71,  250 => 70,  247 => 69,  243 => 68,  240 => 67,  237 => 66,  234 => 65,  231 => 64,  229 => 63,  226 => 62,  224 => 61,  214 => 59,  196 => 58,  194 => 57,  191 => 56,  189 => 55,  183 => 51,  180 => 50,  161 => 47,  148 => 46,  130 => 45,  128 => 44,  124 => 42,  122 => 41,  112 => 34,  102 => 26,  93 => 23,  89 => 21,  84 => 20,  75 => 17,  71 => 15,  67 => 14,  60 => 10,  51 => 3,  45 => 2,  29 => 1,);
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
            Add Meal Types
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

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Meal Types</h3>
                        <a href=\"{{ path('admin_mealtypes_index') }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

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
                            {% set count_in_ar = ['meal','snacks','soup']%}
                            <div class=\"tab-content\">
                                {% set main_product_category_master_id = 0 %}
                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_mealtypes_savemeal') %}

                                        {% set product_category_name = '' %}
                                        {% set package_id = '' %}
                                        {% set count_in  = '' %}
                                        {% if meal is defined and meal is not empty %}

                                            {% for meal in meal %}
                                                {% if meal.language_id == language.language_master_id %}

                                                    {% set main_product_category_master_id = meal.main_product_category_master_id %}
                                                    {% set product_category_name = meal.product_category_name %}
                                                    {% set package_id = meal.package_id %}
                                                    {% set count_in = meal.count_in %}
                                                {% endif %}
                                            {% endfor %}
                                        {% endif %}

                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_product_category_master_id\" value=\"{{ main_product_category_master_id }}\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Meal Type Name</label>
                                                    </div>
                                                    <div class=\"col-lg-10\">
                                                        <input type=\"text\" class=\"form-control\" id=\"product_category_name{{language.language_master_id}}\" name=\"product_category_name\" value=\"{{product_category_name}}\" required>
                                                    </div>
                                                </div>
                                            </div>\t
                                            </br>\t
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Package</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <select name=\"product_package[]\" class=\"form-control\" required multiple>
                                                            <option value=\"0\">--select package--</option>
                                                            {%if package is not empty%}
                                                                {%for package in package %}
                                                                    {%if language.language_master_id == package.language_id%}
                                                                        <option value=\"{{package.main_package_master_id}}\" {%if package_cat_selected_arr is defined and package.main_package_master_id in package_cat_selected_arr %}selected{%endif%}>{{package.package_name}}</option>
                                                                    {%endif%}
                                                                {%endfor%}
                                                            {%endif%}
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Count In</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name=\"count_in\" class=\"form-control\" required>
                                                            {%if count_in_ar is not empty%}
                                                                {%for count_in_ar in count_in_ar %}
                                                                    <option value=\"{{count_in_ar}}\" {%if count_in_ar == count_in %}selected{%endif%}>{{count_in_ar | capitalize }}</option>

                                                                {%endfor%}
                                                            {%endif%}
                                                        </select>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Image</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                       <input type=\"file\" name=\"meal_image\" class=\"form-control\" /> 
                                                    </div>
                                                </div>

                                            </div>

                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
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

{% endblock %}", "AdminBundle:Mealtypes:addmeal.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Mealtypes/addmeal.html.twig");
    }
}
