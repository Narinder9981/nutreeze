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

/* AdminBundle:Salesreports:detailssalesreport.html.twig */
class __TwigTemplate_b5b27d475c07f2bd196e4cf389bd8b125601131600e32973642e0a01257f080b extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Salesreports:detailssalesreport.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Salesreports:detailssalesreport.html.twig", 1);
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
           Month-wise Revenue report
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
           
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Month</label></div>
                                <div class=\"col-md-2\">
                                    ";
        // line 35
        echo twig_escape_filter($this->env, ($context["month"] ?? $this->getContext($context, "month")), "html", null, true);
        echo " , ";
        echo twig_escape_filter($this->env, ($context["selected_year"] ?? $this->getContext($context, "selected_year")), "html", null, true);
        echo "
                                </div>
                                <div class=\"col-md-4\">
                                    <label>Total Revenue : </label> ";
        // line 38
        echo twig_escape_filter($this->env, ($context["total_sales_cost"] ?? $this->getContext($context, "total_sales_cost")), "html", null, true);
        echo "
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                </section>
            
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table class=\"table example\">
                    <thead>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Package Date Range</th>
                        <th>Month Active Days</th>
                        <th>Package Amt</th>
                        <th>Revenue</th>
                        <th>Purchased at</th>
                        
                    </thead>
                    <tbody>
                        ";
        // line 64
        if (((isset($context["result_array"]) || array_key_exists("result_array", $context)) &&  !twig_test_empty(($context["result_array"] ?? $this->getContext($context, "result_array"))))) {
            // line 65
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["result_array"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["result_array"]) {
                // line 66
                echo "                                <tr>
                                <td>";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "user_name", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "package_name", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "package_start_date", []), "html", null, true);
                echo " to ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "package_end_date", []), "html", null, true);
                echo "</td>
                                <td class=\"text-center\">";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "active_days", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "package_value", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "sales_cost", []), "html", null, true);
                echo "</td>
                                <td>";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["result_array"], "created_at", []), "html", null, true);
                echo "</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result_array'], $context['_parent'], $context['loop']);
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
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Month Active Days</th>
                        <th>Package Amt</th>
                        <th>Value</th>
                        <th>Purchased at</th>
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

    // line 102
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 103
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
        return "AdminBundle:Salesreports:detailssalesreport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 103,  255 => 102,  228 => 80,  224 => 78,  221 => 77,  204 => 74,  200 => 73,  196 => 72,  192 => 71,  186 => 70,  182 => 69,  178 => 68,  174 => 67,  171 => 66,  153 => 65,  151 => 64,  122 => 38,  114 => 35,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
           Month-wise Revenue report
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
           
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Month</label></div>
                                <div class=\"col-md-2\">
                                    {{month}} , {{selected_year}}
                                </div>
                                <div class=\"col-md-4\">
                                    <label>Total Revenue : </label> {{total_sales_cost}}
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                </section>
            
        </div>
        
        <div class=\"form-group\">
            <div class=\"table table-responsive\">
                <table class=\"table example\">
                    <thead>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Package Date Range</th>
                        <th>Month Active Days</th>
                        <th>Package Amt</th>
                        <th>Revenue</th>
                        <th>Purchased at</th>
                        
                    </thead>
                    <tbody>
                        {%if result_array is defined and result_array is not empty %}
                            {%for result_array in result_array %}
                                <tr>
                                <td>{{loop.index}}</td>
                                <td>{{result_array.user_name}}</td>
                                <td>{{result_array.package_name}}</td>
                                <td>{{result_array.package_start_date}} to {{result_array.package_end_date}}</td>
                                <td class=\"text-center\">{{result_array.active_days}}</td>
                                <td>{{result_array.package_value}}</td>
                                <td>{{result_array.sales_cost}}</td>
                                <td>{{result_array.created_at}}</td>
                                </tr>
                            {%endfor%}
                        {%else%}
                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        {%endif%}
                        
                    </tbody>
                    <tfooter>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Package</th>
                        <th>Month Active Days</th>
                        <th>Package Amt</th>
                        <th>Value</th>
                        <th>Purchased at</th>
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
{% endblock %}", "AdminBundle:Salesreports:detailssalesreport.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Salesreports/detailssalesreport.html.twig");
    }
}
