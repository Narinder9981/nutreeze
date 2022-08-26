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

/* AdminBundle:Orders:gettotalorders.html.twig */
class __TwigTemplate_bd542a119e8da030f39170628b7051874a60f2fadfc9756af7a2b63c227a71ea extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:gettotalorders.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:gettotalorders.html.twig", 1);
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
            Orders Total of ";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["date"] ?? $this->getContext($context, "date")), "d-m-Y"), "html", null, true);
        echo "
        </h1>
          <form class=\"form-inline\" action=\"\" method=\"POST\">
            <div class=\"form-group\">
                <label for=\"email\">Date:</label>
                <input type=\"text\" class=\"form-control datepicker\" name=\"order_date\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["date"] ?? $this->getContext($context, "date")), "html", null, true);
        echo "\">
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Go</button> 
            ";
        // line 14
        if (((isset($context["total_order_of_day"]) || array_key_exists("total_order_of_day", $context)) &&  !twig_test_empty(($context["total_order_of_day"] ?? $this->getContext($context, "total_order_of_day"))))) {
            // line 15
            echo "               ";
            // line 16
            echo "             ";
        }
        // line 17
        echo "        </form>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 25
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 27
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 31
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 33
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>No. Normal Users</th>
                            ";
        // line 47
        if (((isset($context["notes"]) || array_key_exists("notes", $context)) &&  !twig_test_empty(($context["notes"] ?? $this->getContext($context, "notes"))))) {
            // line 48
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["notes"] ?? $this->getContext($context, "notes")));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 49
                echo "                                        <th>No. ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["note"], "order_note_text", [], "array"), "html", null, true);
                echo "</th>
                                     ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "                                ";
        }
        // line 52
        echo "                                <th>Total</th>

                            </thead>
                            <tbody>
                                ";
        // line 56
        if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
            // line 57
            echo "
                                    ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["order_data"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["order_data"]) {
                // line 59
                echo "                                    ";
                $context["total"] = $this->getAttribute($context["order_data"], "normal", []);
                // line 60
                echo "                                        <tr>
                                            <td>";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "product_name", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 63
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_meal_type_name", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "normal", []), "html", null, true);
                echo "</td>
                                             ";
                // line 65
                if (((isset($context["notes"]) || array_key_exists("notes", $context)) &&  !twig_test_empty(($context["notes"] ?? $this->getContext($context, "notes"))))) {
                    // line 66
                    echo "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["notes"] ?? $this->getContext($context, "notes")));
                    foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                        // line 67
                        echo "                                            ";
                        $context["fieldName"] = ("note_" . $this->getAttribute($context["note"], "main_order_note_id", [], "array"));
                        // line 68
                        echo "                                                <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], ($context["fieldName"] ?? $this->getContext($context, "fieldName"))), "html", null, true);
                        echo "</td>
                                                ";
                        // line 69
                        $context["total"] = (($context["total"] ?? $this->getContext($context, "total")) + $this->getAttribute($context["order_data"], ($context["fieldName"] ?? $this->getContext($context, "fieldName"))));
                        // line 70
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 71
                    echo "                                        ";
                }
                // line 72
                echo "                                        <th>";
                echo twig_escape_filter($this->env, ($context["total"] ?? $this->getContext($context, "total")), "html", null, true);
                echo "</th>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "                                        ";
        }
        // line 76
        echo "                            </tbody>
                        </table>  
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

    // line 90
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 91
        echo "    <script>
        \$(document).ready(function () {
            \$('#list').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
             \$('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
        });
        
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:gettotalorders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  279 => 91,  273 => 90,  254 => 76,  251 => 75,  233 => 72,  230 => 71,  224 => 70,  222 => 69,  217 => 68,  214 => 67,  209 => 66,  207 => 65,  203 => 64,  199 => 63,  195 => 62,  191 => 61,  188 => 60,  185 => 59,  168 => 58,  165 => 57,  163 => 56,  157 => 52,  154 => 51,  145 => 49,  140 => 48,  138 => 47,  125 => 36,  116 => 33,  112 => 31,  107 => 30,  98 => 27,  94 => 25,  90 => 24,  83 => 20,  78 => 17,  75 => 16,  73 => 15,  71 => 14,  65 => 11,  57 => 6,  52 => 3,  46 => 2,  30 => 1,);
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
            Orders Total of {{ date | date('d-m-Y') }}
        </h1>
          <form class=\"form-inline\" action=\"\" method=\"POST\">
            <div class=\"form-group\">
                <label for=\"email\">Date:</label>
                <input type=\"text\" class=\"form-control datepicker\" name=\"order_date\" value=\"{{date}}\">
            </div>
            <button type=\"submit\" class=\"btn btn-primary\">Go</button> 
            {%if total_order_of_day is defined and total_order_of_day is not empty %}
               {# Total Order Of Day : {{total_order_of_day}}#}
             {%endif%}
        </form>
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
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>No. Normal Users</th>
                            {% if notes is defined and notes is not empty %}
                                    {% for note in notes %}
                                        <th>No. {{note['order_note_text']}}</th>
                                     {% endfor %}
                                {% endif %}
                                <th>Total</th>

                            </thead>
                            <tbody>
                                {% if order_data is defined and order_data is not empty %}

                                    {% for order_data in order_data %}
                                    {%set total = order_data.normal %}
                                        <tr>
                                            <td>{{ loop.index }}</td>
                                            <td>{{ order_data.product_name }}</td>
                                            <td>{{ order_data.order_meal_type_name }}</td>
                                            <td>{{ order_data.normal }}</td>
                                             {% if notes is defined and notes is not empty %}
                                            {% for note in notes %}
                                            {% set fieldName = \"note_\" ~ note['main_order_note_id'] %}
                                                <td>{{ attribute(order_data, fieldName) }}</td>
                                                {% set total = total+attribute(order_data, fieldName) %}
                                            {% endfor %}
                                        {% endif %}
                                        <th>{{total}}</th>
                                 </tr>
                                  {% endfor %}
                                        {% endif %}
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script>
        \$(document).ready(function () {
            \$('#list').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
             \$('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
        });
        
    </script>
{% endblock %}
", "AdminBundle:Orders:gettotalorders.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/gettotalorders.html.twig");
    }
}
