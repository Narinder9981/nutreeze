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

/* AdminBundle:Salesreports:salesreportv2.html.twig */
class __TwigTemplate_b87579d54663e382f5632b76f723f4f81e04ecb5cf5fdb710fb68fcae391c69f extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Salesreports:salesreportv2.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Salesreports:salesreportv2.html.twig", 1);
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
           Sales Report
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
            <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_index");
        echo "\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Select Year</label></div>
                                <div class=\"col-md-2\">
                                    <select name=\"year_filter\" class=\"form form-control\" value=\"\" >
                                        ";
        // line 36
        if (((isset($context["years"]) || array_key_exists("years", $context)) &&  !twig_test_empty(($context["years"] ?? $this->getContext($context, "years"))))) {
            // line 37
            echo "                                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["years"] ?? $this->getContext($context, "years")));
            foreach ($context['_seq'] as $context["_key"] => $context["yearskey"]) {
                // line 38
                echo "                                                <option name=\"";
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
            // line 40
            echo "                                        ";
        }
        // line 41
        echo "                                    </select>
                                </div>
                               
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table class=\"table \">
                    <thead>
                        <th>No</th>
                        <th>Month , ";
        // line 57
        echo twig_escape_filter($this->env, ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year")), "html", null, true);
        echo " </th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        <th>Total Sales Cost</th>
                        <th>View</th>
                        
                    </thead>
                    <tbody>
                        ";
        // line 65
        if (((isset($context["month_array"]) || array_key_exists("month_array", $context)) &&  !twig_test_empty(($context["month_array"] ?? $this->getContext($context, "month_array"))))) {
            // line 66
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
                // line 67
                echo "                                <tr>
                                    <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "month", []), "html", null, true);
                echo " , ";
                echo twig_escape_filter($this->env, ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year")), "html", null, true);
                echo "</td>
                                    <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "total_orders", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($context["month_array"], "sales_value", []), "html", null, true);
                echo "</td>
                                    <td></td>
                                    <td><a href=\"";
                // line 73
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_salesreports_detailssalesreport", ["month" => $this->getAttribute($context["month_array"], "month", []), "selected_year" => ($context["selected_filter_year"] ?? $this->getContext($context, "selected_filter_year"))]), "html", null, true);
                echo "\" target=\"_blank\"><input type=\"button\" class=\"btn btn-success btn-xs\" value=\"View\"/> </a></td>
                                   
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
            // line 77
            echo "                        ";
        } else {
            // line 78
            echo "                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        ";
        }
        // line 80
        echo "                        
                    </tbody>
                    <tfooter>
                        <th>No</th>
                        <th>Month</th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                         <th>Total Sales Cost</th>
                        <th>View</th>
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

    // line 101
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 102
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
    \$(document).ready(function() {
        \$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
    //\t\$('#example').DataTable();
    });
    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Salesreports:salesreportv2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 102,  265 => 101,  239 => 80,  235 => 78,  232 => 77,  214 => 73,  209 => 71,  205 => 70,  199 => 69,  195 => 68,  192 => 67,  174 => 66,  172 => 65,  161 => 57,  143 => 41,  140 => 40,  125 => 38,  120 => 37,  118 => 36,  107 => 28,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
           Sales Report
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
            <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_salesreports_index')}}\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Select Year</label></div>
                                <div class=\"col-md-2\">
                                    <select name=\"year_filter\" class=\"form form-control\" value=\"\" >
                                        {%if years is defined and years is not empty %}
                                            {%for yearskey in years %}
                                                <option name=\"{{yearskey}}\" {%if selected_filter_year == yearskey %} selected {%endif%}>{{yearskey}}</option>
                                            {%endfor%}
                                        {%endif%}
                                    </select>
                                </div>
                               
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table class=\"table \">
                    <thead>
                        <th>No</th>
                        <th>Month , {{selected_filter_year}} </th>
                        <th>Total Purchase</th>
                        <th>Total Purchase Value</th>
                        <th>Total Sales Cost</th>
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
                                    <td></td>
                                    <td><a href=\"{{path('admin_salesreports_detailssalesreport',{'month':month_array.month,'selected_year':selected_filter_year})}}\" target=\"_blank\"><input type=\"button\" class=\"btn btn-success btn-xs\" value=\"View\"/> </a></td>
                                   
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
                         <th>Total Sales Cost</th>
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
    //\t\$('#example').DataTable();
    });
    </script>\t
{% endblock %}", "AdminBundle:Salesreports:salesreportv2.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Salesreports/salesreportv2.html.twig");
    }
}
