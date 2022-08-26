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

/* AdminBundle:Pause:pausepackageorders.html.twig */
class __TwigTemplate_d784f6694ccf9cf3e094eec65e09fdc4bc2595ec60a1654ffd57193032f0abdb extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Pause:pausepackageorders.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Pause:pausepackageorders.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  Pause Package Orders
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 16
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 18
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "            <div class=\"alert alert-danger alert-dismissable\">
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
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\"><b>Pause Package </b> [ Package name :  ";
        // line 34
        echo twig_escape_filter($this->env, ($context["package_name"] ?? $this->getContext($context, "package_name")), "html", null, true);
        echo " ] </h3>
                        <h3 class=\"box-title\"> &nbsp;<b>Pause Date</b>  [ ";
        // line 35
        echo twig_escape_filter($this->env, ($context["pause_start_date"] ?? $this->getContext($context, "pause_start_date")), "html", null, true);
        echo " to ";
        echo twig_escape_filter($this->env, ($context["pause_end_date"] ?? $this->getContext($context, "pause_end_date")), "html", null, true);
        echo " ] </h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t<div class=\"box-body\">
                        ";
        // line 39
        if (((isset($context["pause_package_history"]) || array_key_exists("pause_package_history", $context)) &&  !twig_test_empty(($context["pause_package_history"] ?? $this->getContext($context, "pause_package_history"))))) {
            // line 40
            echo "                            ";
            if (($this->getAttribute(($context["pause_package_history"] ?? $this->getContext($context, "pause_package_history")), "resume_flag", []) == "pending")) {
                // line 41
                echo "                                <form id=\"form-\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pause_updatepausepackage");
                echo "\" enctype=\"multipart/form-data\">
                                        
                                        <input type=\"hidden\" name=\"pause_package_history_id\" value=\"";
                // line 43
                echo twig_escape_filter($this->env, ($context["pause_package_history_id"] ?? $this->getContext($context, "pause_package_history_id")), "html", null, true);
                echo "\">
        \t\t\t\t\t\t<div class=\"row\">
                                    <div class=\"col-md-12\">
                                        <div class=\"col-md-2\">
                                            <label>Resume Date</label>
                                        </div>
                                        <div class=\"col-md-2\">
                                            <input class=\"form-control datepicker\" type=\"textbox\" name=\"resume_date\" value=\"\"  required />
                                        </div>
                                       
                                       
                                    </div>
                                    
                                </div>
                                <div class=\"row paddTop\">
                                            <div class=\"col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <button type=\"submit\" name=\"submit\" class=\"btn btn-success\" value=\"\">
                                                        <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                        Resume Package
                                                        </span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                 </form  >   
                            ";
            } else {
                // line 72
                echo "                               <h4> <i>Order/Package Resumed , Pause End Date is ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["pause_package_history"] ?? $this->getContext($context, "pause_package_history")), "pause_end_date", []), "html", null, true);
                echo " </i></h4>
                            ";
            }
            // line 73
            echo "  
                         ";
        }
        // line 74
        echo "  
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>                              
                            <th>Order U.No</th>
                            <th>Order Pasued</th>
                            <th>Customer name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Pause Start date</th>
                            <th>Pause End date</th>
                            <th>Pause End date by Customer</th>
                            <th>Comment Logs</th>
                            <th>View Days</th>
                            </thead>
                            <tbody>
                                ";
        // line 92
        if (((isset($context["order_list"]) || array_key_exists("order_list", $context)) &&  !twig_test_empty(($context["order_list"] ?? $this->getContext($context, "order_list"))))) {
            // line 93
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["order_list"] ?? $this->getContext($context, "order_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["orders"]) {
                // line 94
                echo "                                        <tr>
                                            <td>";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>                                            
                                            <td>";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "unique_no", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 97
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["orders"], "pause_status", [])), "html", null, true);
                echo "</td>
                                            <td>";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "user_firstname", []), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "user_lastname", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 99
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "start_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "end_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "pause_start_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "pause_end_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "pause_end_date_by_update", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($context["orders"], "comment_log", []), "html", null, true);
                echo "
                                            <td> <a taget=\"_blank\" href=\"";
                // line 105
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_vieworderwiseoffdays", ["order_master_id" => $this->getAttribute($context["orders"], "order_master_id", [])]), "html", null, true);
                echo "\" ><button type=\"button\" class=\"btn bg-navy btn-xs no-print\" >Days Operation</button></a></td>
                                            
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['orders'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 109
            echo "                                ";
        }
        // line 110
        echo "                            </tbody>
                            <tfoot>
                           <th>No</th>                              
                            <th>Order U.No</th>
                            <th>Order Pasued</th>
                            <th>Customer name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Pause Start date</th>
                            <th>Pause End date</th>
                            <th>Pause End date by Customer</th>
                            <th>Comment Logs</th>
                            <th>View</th>
                            </tfoot>
                        </table>
                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 139
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 140
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>
     \$('#list').DataTable();
\t\$('.datepicker').datepicker({ 
     format: 'yyyy-mm-dd',
     startDate: \"";
        // line 146
        echo twig_escape_filter($this->env, ($context["resume_date_would_be_pass"] ?? $this->getContext($context, "resume_date_would_be_pass")), "html", null, true);
        echo "\",
          

      });
\t
\t\t
\t
\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Pause:pausepackageorders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  335 => 146,  325 => 140,  319 => 139,  285 => 110,  282 => 109,  264 => 105,  260 => 104,  256 => 103,  252 => 102,  248 => 101,  244 => 100,  240 => 99,  234 => 98,  230 => 97,  226 => 96,  222 => 95,  219 => 94,  201 => 93,  199 => 92,  179 => 74,  175 => 73,  169 => 72,  137 => 43,  131 => 41,  128 => 40,  126 => 39,  117 => 35,  113 => 34,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t  Pause Package Orders
\t\t  <small></small>
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t{% for flashMessage in app.session.flashbag.get('success_msg') %}
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
\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\"><b>Pause Package </b> [ Package name :  {{package_name}} ] </h3>
                        <h3 class=\"box-title\"> &nbsp;<b>Pause Date</b>  [ {{pause_start_date}} to {{pause_end_date}} ] </h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t<div class=\"box-body\">
                        {% if pause_package_history is defined and pause_package_history is not empty %}
                            {% if pause_package_history.resume_flag == 'pending' %}
                                <form id=\"form-\" class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_pause_updatepausepackage')}}\" enctype=\"multipart/form-data\">
                                        
                                        <input type=\"hidden\" name=\"pause_package_history_id\" value=\"{{ pause_package_history_id }}\">
        \t\t\t\t\t\t<div class=\"row\">
                                    <div class=\"col-md-12\">
                                        <div class=\"col-md-2\">
                                            <label>Resume Date</label>
                                        </div>
                                        <div class=\"col-md-2\">
                                            <input class=\"form-control datepicker\" type=\"textbox\" name=\"resume_date\" value=\"\"  required />
                                        </div>
                                       
                                       
                                    </div>
                                    
                                </div>
                                <div class=\"row paddTop\">
                                            <div class=\"col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <button type=\"submit\" name=\"submit\" class=\"btn btn-success\" value=\"\">
                                                        <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                        Resume Package
                                                        </span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                 </form  >   
                            {%else%}
                               <h4> <i>Order/Package Resumed , Pause End Date is {{pause_package_history.pause_end_date}} </i></h4>
                            {%endif%}  
                         {%endif%}  
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>                              
                            <th>Order U.No</th>
                            <th>Order Pasued</th>
                            <th>Customer name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Pause Start date</th>
                            <th>Pause End date</th>
                            <th>Pause End date by Customer</th>
                            <th>Comment Logs</th>
                            <th>View Days</th>
                            </thead>
                            <tbody>
                                {%if order_list is defined and order_list is not empty%}
                                    {%for orders in order_list%}
                                        <tr>
                                            <td>{{loop.index}}</td>                                            
                                            <td>{{orders.unique_no}}</td>
                                            <td>{{orders.pause_status | capitalize }}</td>
                                            <td>{{orders.user_firstname}} {{orders.user_lastname}}</td>
                                            <td>{{orders.start_date}}</td>
                                            <td>{{orders.end_date}}</td>
                                            <td>{{orders.pause_start_date}}</td>
                                            <td>{{orders.pause_end_date}}</td>
                                            <td>{{orders.pause_end_date_by_update}}</td>
                                            <td>{{orders.comment_log}}
                                            <td> <a taget=\"_blank\" href=\"{{path('admin_orders_vieworderwiseoffdays',{'order_master_id':orders.order_master_id})}}\" ><button type=\"button\" class=\"btn bg-navy btn-xs no-print\" >Days Operation</button></a></td>
                                            
                                        </tr>
                                    {%endfor%}
                                {%endif%}
                            </tbody>
                            <tfoot>
                           <th>No</th>                              
                            <th>Order U.No</th>
                            <th>Order Pasued</th>
                            <th>Customer name</th>
                            <th>Start date</th>
                            <th>End date</th>
                            <th>Pause Start date</th>
                            <th>Pause End date</th>
                            <th>Pause End date by Customer</th>
                            <th>Comment Logs</th>
                            <th>View</th>
                            </tfoot>
                        </table>
                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js%}
<script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

<script>
     \$('#list').DataTable();
\t\$('.datepicker').datepicker({ 
     format: 'yyyy-mm-dd',
     startDate: \"{{resume_date_would_be_pass}}\",
          

      });
\t
\t\t
\t
\t
\t
</script>\t
{% endblock %}", "AdminBundle:Pause:pausepackageorders.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Pause/pausepackageorders.html.twig");
    }
}
