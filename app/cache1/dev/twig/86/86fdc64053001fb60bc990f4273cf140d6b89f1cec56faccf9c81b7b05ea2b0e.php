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

/* AdminBundle:Salesreports:index.html.twig */
class __TwigTemplate_33904fa5a8337b94fd4200dbb88c7ff7026efcbdaec6d36fbd461652849495ea extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Salesreports:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Salesreports:index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Anona : Monthly Sales Report";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <style>
        .bg-444{
            background-color: #444 !important;
            color: #e2e2e2;
        }
    </style>
    <section class=\"content-header\">
        <!-- PAGE TITLE -->
        <h1>
           Monthly Sales report
        </h1>
        <!-- BREADCUMB -->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 24
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 30
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "
        <div class=\"row\">
            <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
        echo "\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row form-group\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-1\"></div>
                                    <div class=\"col-md-2 text-center\"><label>Select Year</label></div>
                                    <div class=\"col-md-2\">
                                        <select name=\"year_filter\" class=\"form form-control\" value=\"\" >
                                            ";
        // line 45
        if (((isset($context["years"]) || array_key_exists("years", $context)) &&  !twig_test_empty(($context["years"] ?? $this->getContext($context, "years"))))) {
            // line 46
            echo "                                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["years"] ?? $this->getContext($context, "years")));
            foreach ($context['_seq'] as $context["_key"] => $context["yearskey"]) {
                // line 47
                echo "                                                    <option name=\"";
                echo twig_escape_filter($this->env, $context["yearskey"], "html", null, true);
                echo "\" ";
                if ((($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year")) == $context["yearskey"])) {
                    echo " selected ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $context["yearskey"], "html", null, true);
                echo "</option>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['yearskey'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "                                            ";
        }
        // line 50
        echo "                                        </select>
                                    </div>
                                    <div class=\"col-md-1\"></div>

                                    <!-- DATE filter -->
                                    <div class=\"col-md-2 text-center\"><label>Select Date</label></div>
                                    <div class=\"col-md-2\">
                                        <input type=\"text\" name=\"date_filter\" value=\"";
        // line 57
        if (((isset($context["selected_filter_date"]) || array_key_exists("selected_filter_date", $context)) &&  !twig_test_empty(($context["selected_filter_date"] ?? $this->getContext($context, "selected_filter_date"))))) {
            echo twig_escape_filter($this->env, ($context["selected_filter_date"] ?? $this->getContext($context, "selected_filter_date")), "html", null, true);
        }
        echo "\" class=\"form-control datepicker\" />
                                    </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-12 text-center\">
                                    <div class=\"col-md-5\"></div>
                                    <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                                    <div class=\"col-md-5\"></div>
                                </div>        
                            </div>        
                        </div>
                    </div>
                </section>
            </form>
        </div>

        ";
        // line 75
        if (((isset($context["selected_filter_date_obj"]) || array_key_exists("selected_filter_date_obj", $context)) &&  !twig_test_empty(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj"))))) {
            // line 76
            echo "        <div class=\"row\">
            <div class=\"col-md-12\">
                ";
            // line 78
            if ($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "on_same_day", [])) {
                // line 79
                echo "                <div class=\"col-lg-1 col-xs-6\"></div>
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-444\">
                        <div class=\"inner\">
                            <p class=\"text-center\">";
                // line 84
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["selected_filter_date"] ?? $this->getContext($context, "selected_filter_date")), "d-m-Y"), "html", null, true);
                echo "</p>
                            <h4>Total Purchase : <b>";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "on_same_day", []), "total_orders", []), "html", null, true);
                echo "</b></h4>
                            <h4>Total Amount : <b>";
                // line 86
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "on_same_day", []), "total_value", []), 2), "html", null, true);
                echo "</b></h4>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-1 col-xs-6\"></div>
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-444\">
                        <div class=\"inner\">
                            <p class=\"text-center\">";
                // line 98
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "of_that_month", []), "first_date_of_month", []), "d-m-Y"), "html", null, true);
                echo "&nbsp; To &nbsp;";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["selected_filter_date"] ?? $this->getContext($context, "selected_filter_date")), "d-m-Y"), "html", null, true);
                echo "</p>
                            <h4>Total Purchase : <b>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "of_that_month", []), "total_orders", []), "html", null, true);
                echo "</b></h4>
                            <h4>Total Amount : <b>";
                // line 100
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute(($context["selected_filter_date_obj"] ?? $this->getContext($context, "selected_filter_date_obj")), "of_that_month", []), "total_value", []), 2), "html", null, true);
                echo "</b></h4>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                    </div>
                </div>
                ";
            }
            // line 108
            echo "            </div>
        </div>
        ";
        }
        // line 111
        echo "        
        <div class=\"form-group\">
            <div class=\"table table-responsive \">
                <table class=\"table example\">
                    <thead>
                        <th>No</th>
                        <th>Month , ";
        // line 117
        echo twig_escape_filter($this->env, ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year")), "html", null, true);
        echo " </th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        ";
        // line 121
        echo "                        <th>View</th>
                        
                    </thead>
                    <tbody>
                        ";
        // line 125
        if (((isset($context["month_array"]) || array_key_exists("month_array", $context)) &&  !twig_test_empty(($context["month_array"] ?? $this->getContext($context, "month_array"))))) {
            // line 126
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["month_array"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["month_array"]) {
                // line 127
                echo "                                <tr>
                                    <td>";
                // line 128
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "month", []), "html", null, true);
                echo " , ";
                echo twig_escape_filter($this->env, ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year")), "html", null, true);
                echo "</td>
                                    <td>";
                // line 130
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "total_orders", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 131
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "sales_value", []), "html", null, true);
                echo "</td>
                                    ";
                // line 133
                echo "                                    <td><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_detailssalesreport", ["month" => $this->getAttribute($context["month_array"], "month", []), "selected_year" => ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year"))]), "html", null, true);
                echo "\" target=\"_blank\"><input type=\"button\" class=\"btn btn-success btn-xs\" value=\"Month-wise Revenue report\"/> </a></td>
                                   
                                </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month_array'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            echo "                        ";
        } else {
            // line 138
            echo "                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        ";
        }
        // line 140
        echo "                        
                    </tbody>
                    <tfooter>
                        <th>No</th>
                        <th>Month</th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        ";
        // line 148
        echo "                        <th>View</th>
                    </tfooter>
                </table>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 161
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 162
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
    \$(document).ready(function() {
        \$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
   \t\$('.example').DataTable( {
             dom: 'Bfrtip',

            buttons: [
                'copy', 'excel', 'pdf'
            ],
             paging: false
        } );
    });
    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Salesreports:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  380 => 162,  374 => 161,  356 => 148,  347 => 140,  343 => 138,  340 => 137,  321 => 133,  317 => 131,  313 => 130,  307 => 129,  303 => 128,  300 => 127,  282 => 126,  280 => 125,  274 => 121,  268 => 117,  260 => 111,  255 => 108,  244 => 100,  240 => 99,  234 => 98,  219 => 86,  215 => 85,  211 => 84,  204 => 79,  202 => 78,  198 => 76,  196 => 75,  173 => 57,  164 => 50,  161 => 49,  146 => 47,  141 => 46,  139 => 45,  126 => 35,  122 => 33,  113 => 30,  109 => 28,  104 => 27,  95 => 24,  91 => 22,  87 => 21,  80 => 17,  65 => 4,  59 => 3,  47 => 2,  31 => 1,);
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
{% block title %}Anona : Monthly Sales Report{% endblock %}
{% block content %}
    <style>
        .bg-444{
            background-color: #444 !important;
            color: #e2e2e2;
        }
    </style>
    <section class=\"content-header\">
        <!-- PAGE TITLE -->
        <h1>
           Monthly Sales report
        </h1>
        <!-- BREADCUMB -->
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
            <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_salesreports_index')}}\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row form-group\">
                                <div class=\"col-md-12\">
                                    <div class=\"col-md-1\"></div>
                                    <div class=\"col-md-2 text-center\"><label>Select Year</label></div>
                                    <div class=\"col-md-2\">
                                        <select name=\"year_filter\" class=\"form form-control\" value=\"\" >
                                            {%if years is defined and years is not empty %}
                                                {%for yearskey in years %}
                                                    <option name=\"{{yearskey}}\" {%if selected_filter_year == yearskey %} selected {%endif%}>{{yearskey}}</option>
                                                {%endfor%}
                                            {%endif%}
                                        </select>
                                    </div>
                                    <div class=\"col-md-1\"></div>

                                    <!-- DATE filter -->
                                    <div class=\"col-md-2 text-center\"><label>Select Date</label></div>
                                    <div class=\"col-md-2\">
                                        <input type=\"text\" name=\"date_filter\" value=\"{% if selected_filter_date is defined and selected_filter_date is not empty %}{{ selected_filter_date }}{% endif %}\" class=\"form-control datepicker\" />
                                    </div>
                                </div>
                            </div>

                            <div class=\"row\">
                                <div class=\"col-md-12 text-center\">
                                    <div class=\"col-md-5\"></div>
                                    <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                                    <div class=\"col-md-5\"></div>
                                </div>        
                            </div>        
                        </div>
                    </div>
                </section>
            </form>
        </div>

        {% if selected_filter_date_obj is defined and selected_filter_date_obj is not empty %}
        <div class=\"row\">
            <div class=\"col-md-12\">
                {% if selected_filter_date_obj.on_same_day %}
                <div class=\"col-lg-1 col-xs-6\"></div>
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-444\">
                        <div class=\"inner\">
                            <p class=\"text-center\">{{ selected_filter_date | date('d-m-Y') }}</p>
                            <h4>Total Purchase : <b>{{ selected_filter_date_obj.on_same_day.total_orders }}</b></h4>
                            <h4>Total Amount : <b>{{ selected_filter_date_obj.on_same_day.total_value | number_format(2) }}</b></h4>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-1 col-xs-6\"></div>
                <div class=\"col-lg-4 col-xs-6\">
                    <!-- small box -->
                    <div class=\"small-box bg-444\">
                        <div class=\"inner\">
                            <p class=\"text-center\">{{ selected_filter_date_obj.of_that_month.first_date_of_month | date('d-m-Y') }}&nbsp; To &nbsp;{{ selected_filter_date | date('d-m-Y') }}</p>
                            <h4>Total Purchase : <b>{{ selected_filter_date_obj.of_that_month.total_orders }}</b></h4>
                            <h4>Total Amount : <b>{{ selected_filter_date_obj.of_that_month.total_value | number_format(2) }}</b></h4>
                        </div>
                        <div class=\"icon\">
                            <i class=\"ion ion-bag\"></i>
                        </div>
                    </div>
                </div>
                {% endif %}
            </div>
        </div>
        {% endif %}
        
        <div class=\"form-group\">
            <div class=\"table table-responsive \">
                <table class=\"table example\">
                    <thead>
                        <th>No</th>
                        <th>Month , {{selected_filter_year}} </th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        {#<th>Total Sales Cost</th>#}
                        <th>View</th>
                        
                    </thead>
                    <tbody>
                        {%if month_array is defined and month_array is not empty %}
                            {%for month_array in month_array %}
                                <tr>
                                    <td>{{loop.index}}</td>
                                    <td>{{month_array.month}} , {{selected_filter_year}}</td>
                                    <td>{{month_array.total_orders}}</td>
                                    <td>{{month_array.sales_value}}</td>
                                    {#<td></td>#}
                                    <td><a href=\"{{path('admin_salesreports_detailssalesreport',{'month':month_array.month,'selected_year':selected_filter_year})}}\" target=\"_blank\"><input type=\"button\" class=\"btn btn-success btn-xs\" value=\"Month-wise Revenue report\"/> </a></td>
                                   
                                </tr>
                            {%endfor%}
                        {%else%}
                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        {%endif%}
                        
                    </tbody>
                    <tfooter>
                        <th>No</th>
                        <th>Month</th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        {# <th>Total Sales Cost</th>#}
                        <th>View</th>
                    </tfooter>
                </table>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>
    \$(document).ready(function() {
        \$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
   \t\$('.example').DataTable( {
             dom: 'Bfrtip',

            buttons: [
                'copy', 'excel', 'pdf'
            ],
             paging: false
        } );
    });
    </script>\t
{% endblock %}", "AdminBundle:Salesreports:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Salesreports/index.html.twig");
    }
}
