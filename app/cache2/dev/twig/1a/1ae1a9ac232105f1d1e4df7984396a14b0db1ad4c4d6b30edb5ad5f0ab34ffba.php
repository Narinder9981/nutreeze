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

/* AdminBundle:Pauseuserreports:pausereports.html.twig */
class __TwigTemplate_3e3f33499be2db1cc14d3173f9f5cd3c1269b58993efc8e1cde5b98160b49f93 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Pauseuserreports:pausereports.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Pauseuserreports:pausereports.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Anona : Report Summary";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Pause User Summary
            ";
        // line 8
        if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "off_day")) {
            // line 9
            echo "                <small><label>Users who have the off day</label></small>
            ";
        } elseif ((        // line 10
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "meal_not_added")) {
            // line 11
            echo "                <small><label>Users who are eligible but have not added their meals yet</label></small>
            ";
        } elseif ((        // line 12
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "meal_added")) {
            // line 13
            echo "                <small><label>Users who are eligible and have added their meals</label></small>
            ";
        } elseif ((        // line 14
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "suspend_day")) {
            // line 15
            echo "                 <small><label>Users who have freeze Package on this day</label></small>            
            ";
        } elseif ((        // line 16
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "0")) {
            // line 17
            echo "                 <small><label>Users allowed to add meals on that day based on their package if they are eligible</label></small>
            ";
        }
        // line 19
        echo "            
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "            <div class=\"alert alert-success alert-dismissable\">
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
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 34
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 36
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
        <div class=\"row\">
            <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pauseuserreports_pausereports");
        echo "/";
        echo twig_escape_filter($this->env, ($context["flag_type"] ?? $this->getContext($context, "flag_type")), "html", null, true);
        echo "\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Date</label></div>
                                <div class=\"col-md-4\">
                                    <input type=\"hide\" name=\"flag_type\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, ($context["flag_type"] ?? $this->getContext($context, "flag_type")), "html", null, true);
        echo "\" class=\"form-control datepicker\" />
                                    <input type=\"text\" name=\"date_filter\" value=\"";
        // line 49
        if ((($context["filter_date"] ?? $this->getContext($context, "filter_date")) == "")) {
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
            echo " ";
        } else {
            echo " ";
            echo twig_escape_filter($this->env, ($context["filter_date"] ?? $this->getContext($context, "filter_date")), "html", null, true);
            echo " ";
        }
        echo "\" class=\"form-control datepicker\" />
                                </div>
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-4 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-aqua\" style=\"    background-color: #34480270 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 63
        echo twig_escape_filter($this->env, ($context["pause_user_count"] ?? $this->getContext($context, "pause_user_count")), "html", null, true);
        echo "</h3>

                        <p>Paused Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-bag\"></i>
                    </div>
                    <a href=\"";
        // line 70
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pauseuserreports_pausereports");
        echo "/pause_users/";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["filter_date"] ?? $this->getContext($context, "filter_date"))), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-4 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-green \" style=\"background-color: #537788 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 78
        echo twig_escape_filter($this->env, ($context["pause_user_package_nt_start_count"] ?? $this->getContext($context, "pause_user_package_nt_start_count")), "html", null, true);
        echo "</h3>

                        <p>Active but package not start user</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-stats-bars\"></i>
                    </div>
                    <a href=\"";
        // line 85
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pauseuserreports_pausereports");
        echo "/active_not_start_users/";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["filter_date"] ?? $this->getContext($context, "filter_date"))), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
          
        </div>\t
        <div class=\"form-group\">
            <div class=\"table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                                         
                        <th class=\"text-center\">Notification</th>
                      
                                       
                    </thead>
                    <tbody>
                        ";
        // line 105
        if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
            // line 106
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["order_data"]);
            foreach ($context['_seq'] as $context["_key"] => $context["order_data"]) {
                // line 107
                echo "                                <tr>
                                    <td>";
                // line 108
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "unique_user_id", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 109
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "unique_no", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_firstname", []), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_lastname", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_mobile", []), "html", null, true);
                echo "</td>
                                   
                                    <td class=\"text-center\"><a target=\"_blank\" href=\"";
                // line 113
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_addpushnotification", ["user_id" => $this->getAttribute($context["order_data"], "user_id", [])]), "html", null, true);
                echo "\" ><i class=\"fa fa-send-o \"></i></a></td>

                                    
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 118
            echo "                        ";
        } else {
            // line 119
            echo "                            <tr><td colspan=\"5\" class=\"text-center\">No Records Found </td></tr>
                        ";
        }
        // line 121
        echo "                        
                    </tbody>
                    <tfooter>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                                        
                        <th class=\"text-center\">Notification</th>
                      
                                                
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

    // line 144
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 145
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>
    \$(document).ready(function() {
        \$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
    //\t\$('#example').DataTable();
     //\$('#list').DataTable();
     \$('#list').DataTable( {
             dom: 'Bfrtip',

    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
    });
         </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Pauseuserreports:pausereports.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 145,  323 => 144,  295 => 121,  291 => 119,  288 => 118,  277 => 113,  272 => 111,  266 => 110,  262 => 109,  258 => 108,  255 => 107,  250 => 106,  248 => 105,  223 => 85,  213 => 78,  200 => 70,  190 => 63,  165 => 49,  161 => 48,  149 => 41,  145 => 39,  136 => 36,  132 => 34,  127 => 33,  118 => 30,  114 => 28,  110 => 27,  103 => 23,  97 => 19,  93 => 17,  91 => 16,  88 => 15,  86 => 14,  83 => 13,  81 => 12,  78 => 11,  76 => 10,  73 => 9,  71 => 8,  65 => 4,  59 => 3,  47 => 2,  31 => 1,);
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
{% block title %}Anona : Report Summary{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Pause User Summary
            {%if flag_type == 'off_day' %}
                <small><label>Users who have the off day</label></small>
            {%elseif flag_type == 'meal_not_added' %}
                <small><label>Users who are eligible but have not added their meals yet</label></small>
            {%elseif flag_type == 'meal_added' %}
                <small><label>Users who are eligible and have added their meals</label></small>
            {%elseif flag_type == 'suspend_day' %}
                 <small><label>Users who have freeze Package on this day</label></small>            
            {%elseif flag_type == '0' %}
                 <small><label>Users allowed to add meals on that day based on their package if they are eligible</label></small>
            {%endif%}
            
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
            <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_pauseuserreports_pausereports')}}/{{flag_type}}\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Date</label></div>
                                <div class=\"col-md-4\">
                                    <input type=\"hide\" name=\"flag_type\" value=\"{{flag_type}}\" class=\"form-control datepicker\" />
                                    <input type=\"text\" name=\"date_filter\" value=\"{%if filter_date == '' %} {{ \"now\"|date(\"Y-m-d\") }} {%else%} {{filter_date}} {%endif%}\" class=\"form-control datepicker\" />
                                </div>
                                <div class=\"col-md-2\"><input type=\"submit\" name=\"submit\" value=\"Filter\" class=\"btn btn-success\"/></div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-4 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-aqua\" style=\"    background-color: #34480270 !important;\">
                    <div class=\"inner\">
                        <h3>{{pause_user_count}}</h3>

                        <p>Paused Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-bag\"></i>
                    </div>
                    <a href=\"{{path('admin_pauseuserreports_pausereports')}}/pause_users/{{filter_date |trim}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-4 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-green \" style=\"background-color: #537788 !important;\">
                    <div class=\"inner\">
                        <h3>{{pause_user_package_nt_start_count}}</h3>

                        <p>Active but package not start user</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-stats-bars\"></i>
                    </div>
                    <a href=\"{{path('admin_pauseuserreports_pausereports')}}/active_not_start_users/{{filter_date |trim}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
          
        </div>\t
        <div class=\"form-group\">
            <div class=\"table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                                         
                        <th class=\"text-center\">Notification</th>
                      
                                       
                    </thead>
                    <tbody>
                        {%if order_data is defined and order_data is not empty %}
                            {%for order_data in order_data %}
                                <tr>
                                    <td>{{order_data.unique_user_id}}</td>
                                    <td>{{order_data.unique_no}}</td>
                                    <td>{{order_data.user_firstname}} {{order_data.user_lastname}}</td>
                                    <td>{{order_data.user_mobile}}</td>
                                   
                                    <td class=\"text-center\"><a target=\"_blank\" href=\"{{path('admin_pushnotification_addpushnotification',{\"user_id\":order_data.user_id})}}\" ><i class=\"fa fa-send-o \"></i></a></td>

                                    
                                </tr>
                            {%endfor%}
                        {%else%}
                            <tr><td colspan=\"5\" class=\"text-center\">No Records Found </td></tr>
                        {%endif%}
                        
                    </tbody>
                    <tfooter>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                                        
                        <th class=\"text-center\">Notification</th>
                      
                                                
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
     //\$('#list').DataTable();
     \$('#list').DataTable( {
             dom: 'Bfrtip',

    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
    });
         </script>\t
{% endblock %}", "AdminBundle:Pauseuserreports:pausereports.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Pauseuserreports/pausereports.html.twig");
    }
}
