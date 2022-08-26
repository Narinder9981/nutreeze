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

/* AdminBundle:Reports:summary.html.twig */
class __TwigTemplate_9657d0f95ad9fab2cf0c36bc066aeb919ef1e8d2b048c5fa9738ea0046cff1c0 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Reports:summary.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Reports:summary.html.twig", 1);
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
            Report Summary
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
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "pause_day")) {
            // line 17
            echo "                 <small><label>Users whose Package pause on this day</label></small>                
            ";
        } elseif ((        // line 18
($context["flag_type"] ?? $this->getContext($context, "flag_type")) == "0")) {
            // line 19
            echo "                 <small><label>Users allowed to add meals on that day based on their package if they are eligible</label></small>
            ";
        }
        // line 21
        echo "            
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 30
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 32
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 36
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 38
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
        <div class=\"row\">
            <form name=\"filterdatewise\" method=\"Post\" action = \"";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Date</label></div>
                                <div class=\"col-md-4\">
                                    <input type=\"text\" name=\"date_filter\" value=\"";
        // line 50
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
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-aqua\" style=\"    background-color: #34480270 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 64
        echo twig_escape_filter($this->env, ($context["alloted_to_add_meal_count"] ?? $this->getContext($context, "alloted_to_add_meal_count")), "html", null, true);
        echo "</h3>

                        <p>Alloted to add Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-bag\"></i>
                    </div>
                    <a href=\"";
        // line 71
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/0/";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["filter_date"] ?? $this->getContext($context, "filter_date"))), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-green \" style=\"background-color: #537788 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 79
        echo twig_escape_filter($this->env, ($context["off_day_count"] ?? $this->getContext($context, "off_day_count")), "html", null, true);
        echo "</h3>

                        <p>Off Day Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-stats-bars\"></i>
                    </div>
                    <a href=\"";
        // line 86
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/off_day/";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["filter_date"] ?? $this->getContext($context, "filter_date"))), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-yellow\" style=\"    background-color: #c39750 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 94
        echo twig_escape_filter($this->env, ($context["meal_not_added_count"] ?? $this->getContext($context, "meal_not_added_count")), "html", null, true);
        echo "</h3>

                        <p>Not added Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-person-add\"></i>
                    </div>
                    <a href=\"";
        // line 101
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/meal_not_added/";
        echo twig_escape_filter($this->env, twig_trim_filter(($context["filter_date"] ?? $this->getContext($context, "filter_date"))), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #7d4f49 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 109
        echo twig_escape_filter($this->env, ($context["meal_added_count"] ?? $this->getContext($context, "meal_added_count")), "html", null, true);
        echo "</h3>

                        <p>Added Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                    <a href=\"";
        // line 116
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/meal_added/";
        echo twig_escape_filter($this->env, ($context["filter_date"] ?? $this->getContext($context, "filter_date")), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #51ad98 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 124
        echo twig_escape_filter($this->env, ($context["suspend_count"] ?? $this->getContext($context, "suspend_count")), "html", null, true);
        echo "</h3>

                        <p>Freeze Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                    <a href=\"";
        // line 131
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/suspend_day/";
        echo twig_escape_filter($this->env, ($context["filter_date"] ?? $this->getContext($context, "filter_date")), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div> 
            <div class=\"col-lg-2 col-xs-6 hide\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #0044cc63 !important;\">
                    <div class=\"inner\">
                        <h3>";
        // line 138
        echo twig_escape_filter($this->env, ($context["pauseorder_count"] ?? $this->getContext($context, "pauseorder_count")), "html", null, true);
        echo "</h3>

                        <p>Pause Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                     <a href=\"";
        // line 145
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_reports_summary");
        echo "/pause_day/";
        echo twig_escape_filter($this->env, ($context["filter_date"] ?? $this->getContext($context, "filter_date")), "html", null, true);
        echo "\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a> 
                </div>
            </div>
        </div>\t
        <div class=\"form-group\">
            <div class=\"table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                        ";
        // line 157
        if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
            // line 158
            echo "                        <th>Days Left</th>
                        ";
        }
        // line 160
        echo "                        <th class=\"text-center\">Meal</th>                       
                        <th class=\"text-center\">Notification</th>
                      ";
        // line 162
        if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
            // line 163
            echo "                        <th>Driver</th>
                        ";
        }
        // line 164
        echo "                             
                    </thead>
                    <tbody>
                        ";
        // line 167
        if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
            // line 168
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["order_data"]);
            foreach ($context['_seq'] as $context["_key"] => $context["order_data"]) {
                // line 169
                echo "                                <tr>
                                    <td>";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_id", []), "html", null, true);
                echo "</td>
                                    <td title=\"Plan end on ";
                // line 171
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "plan_end_on", []), "html", null, true);
                echo " \">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_no", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 172
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_name", []), "html", null, true);
                echo "</td>
                                    <td>";
                // line 173
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "user_contact_no", []), "html", null, true);
                echo "</td>
                                    ";
                // line 174
                if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
                    echo " <td title=\"Plan end on ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "plan_end_on", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "days_left", []), "html", null, true);
                    echo "</td>  ";
                }
                echo "      
                                    <td class=\"text-center\"><a target=\"_blank\" href=\"";
                // line 175
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsdatewisefilter", ["order_id" => $this->getAttribute($context["order_data"], "order_master_id", []), "quick_access" => ($context["filter_date"] ?? $this->getContext($context, "filter_date"))]), "html", null, true);
                echo "\" ><i class=\"fa fa-eye\"></i></a></td>

                                    <td class=\"text-center\"><a target=\"_blank\" href=\"";
                // line 177
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pushnotification_addpushnotification", ["user_id" => $this->getAttribute($context["order_data"], "user_id", [])]), "html", null, true);
                echo "\" ><i class=\"fa fa-send-o \"></i></a></td>

                                     ";
                // line 179
                if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
                    echo " <td>";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "driver_name", []), "html", null, true);
                    echo "</td> ";
                }
                echo "      
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 182
            echo "                        ";
        } else {
            // line 183
            echo "                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        ";
        }
        // line 185
        echo "                        
                    </tbody>
                    <tfooter>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        ";
        // line 191
        if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
            // line 192
            echo "                        <th>Days Left</th>
                        ";
        }
        // line 194
        echo "                        <th class=\"text-center\">Meal</th>                       
                        <th class=\"text-center\">Notification</th>
                      ";
        // line 196
        if ((($context["flag_type"] ?? $this->getContext($context, "flag_type")) != "pause_day")) {
            // line 197
            echo "                        <th>Driver</th>
                        ";
        }
        // line 198
        echo "                               
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

    // line 211
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 212
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
        return "AdminBundle:Reports:summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  467 => 212,  461 => 211,  443 => 198,  439 => 197,  437 => 196,  433 => 194,  429 => 192,  427 => 191,  419 => 185,  415 => 183,  412 => 182,  399 => 179,  394 => 177,  389 => 175,  379 => 174,  375 => 173,  371 => 172,  365 => 171,  361 => 170,  358 => 169,  353 => 168,  351 => 167,  346 => 164,  342 => 163,  340 => 162,  336 => 160,  332 => 158,  330 => 157,  313 => 145,  303 => 138,  291 => 131,  281 => 124,  268 => 116,  258 => 109,  245 => 101,  235 => 94,  222 => 86,  212 => 79,  199 => 71,  189 => 64,  164 => 50,  154 => 43,  150 => 41,  141 => 38,  137 => 36,  132 => 35,  123 => 32,  119 => 30,  115 => 29,  108 => 25,  102 => 21,  98 => 19,  96 => 18,  93 => 17,  91 => 16,  88 => 15,  86 => 14,  83 => 13,  81 => 12,  78 => 11,  76 => 10,  73 => 9,  71 => 8,  65 => 4,  59 => 3,  47 => 2,  31 => 1,);
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
            Report Summary
            {%if flag_type == 'off_day' %}
                <small><label>Users who have the off day</label></small>
            {%elseif flag_type == 'meal_not_added' %}
                <small><label>Users who are eligible but have not added their meals yet</label></small>
            {%elseif flag_type == 'meal_added' %}
                <small><label>Users who are eligible and have added their meals</label></small>
            {%elseif flag_type == 'suspend_day' %}
                 <small><label>Users who have freeze Package on this day</label></small>    
            {%elseif flag_type == 'pause_day' %}
                 <small><label>Users whose Package pause on this day</label></small>                
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
            <form name=\"filterdatewise\" method=\"Post\" action = \"{{path('admin_reports_summary')}}\">
                <section class=\"col-lg-12 \">
                    <div class=\"box box-success\">
                        <div class=\"box-body\">
                            <div class=\"row\">
                                <div class=\"col-md-2\"><label>Selected Date</label></div>
                                <div class=\"col-md-4\">
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
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-aqua\" style=\"    background-color: #34480270 !important;\">
                    <div class=\"inner\">
                        <h3>{{alloted_to_add_meal_count}}</h3>

                        <p>Alloted to add Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-bag\"></i>
                    </div>
                    <a href=\"{{path('admin_reports_summary')}}/0/{{filter_date |trim }}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-green \" style=\"background-color: #537788 !important;\">
                    <div class=\"inner\">
                        <h3>{{off_day_count}}</h3>

                        <p>Off Day Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-stats-bars\"></i>
                    </div>
                    <a href=\"{{path('admin_reports_summary')}}/off_day/{{filter_date |trim}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-yellow\" style=\"    background-color: #c39750 !important;\">
                    <div class=\"inner\">
                        <h3>{{meal_not_added_count}}</h3>

                        <p>Not added Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-person-add\"></i>
                    </div>
                    <a href=\"{{path('admin_reports_summary')}}/meal_not_added/{{filter_date |trim}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #7d4f49 !important;\">
                    <div class=\"inner\">
                        <h3>{{meal_added_count}}</h3>

                        <p>Added Meals</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                    <a href=\"{{path('admin_reports_summary')}}/meal_added/{{filter_date}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class=\"col-lg-2 col-xs-6\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #51ad98 !important;\">
                    <div class=\"inner\">
                        <h3>{{suspend_count}}</h3>

                        <p>Freeze Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                    <a href=\"{{path('admin_reports_summary')}}/suspend_day/{{filter_date}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a>
                </div>
            </div> 
            <div class=\"col-lg-2 col-xs-6 hide\">
                <!-- small box -->
                <div class=\"small-box bg-red\" style=\"    background-color: #0044cc63 !important;\">
                    <div class=\"inner\">
                        <h3>{{pauseorder_count}}</h3>

                        <p>Pause Users</p>
                    </div>
                    <div class=\"icon\">
                        <i class=\"ion ion-pie-graph\"></i>
                    </div>
                     <a href=\"{{path('admin_reports_summary')}}/pause_day/{{filter_date}}\" class=\"small-box-footer\">More info <i class=\"fa fa-arrow-circle-right\"></i></a> 
                </div>
            </div>
        </div>\t
        <div class=\"form-group\">
            <div class=\"table-responsive\">
                <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal \">
                    <thead>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        <th>Phone No</th>
                        {% if flag_type != 'pause_day' %}
                        <th>Days Left</th>
                        {%endif%}
                        <th class=\"text-center\">Meal</th>                       
                        <th class=\"text-center\">Notification</th>
                      {% if flag_type != 'pause_day' %}
                        <th>Driver</th>
                        {%endif%}                             
                    </thead>
                    <tbody>
                        {%if order_data is defined and order_data is not empty %}
                            {%for order_data in order_data %}
                                <tr>
                                    <td>{{order_data.user_id}}</td>
                                    <td title=\"Plan end on {{order_data.plan_end_on}} \">{{order_data.order_no}}</td>
                                    <td>{{order_data.user_name}}</td>
                                    <td>{{order_data.user_contact_no}}</td>
                                    {% if flag_type != 'pause_day' %} <td title=\"Plan end on {{order_data.plan_end_on}}\">{{order_data.days_left}}</td>  {%endif%}      
                                    <td class=\"text-center\"><a target=\"_blank\" href=\"{{path('admin_orders_getmealsdatewisefilter',{\"order_id\":order_data.order_master_id,\"quick_access\":filter_date})}}\" ><i class=\"fa fa-eye\"></i></a></td>

                                    <td class=\"text-center\"><a target=\"_blank\" href=\"{{path('admin_pushnotification_addpushnotification',{\"user_id\":order_data.user_id})}}\" ><i class=\"fa fa-send-o \"></i></a></td>

                                     {% if flag_type != 'pause_day' %} <td>{{order_data.driver_name}}</td> {%endif%}      
                                </tr>
                            {%endfor%}
                        {%else%}
                            <tr><td colspan=\"8\" class=\"text-center\">No Records Found </td></tr>
                        {%endif%}
                        
                    </tbody>
                    <tfooter>
                        <th>UserID</th>
                        <th>Order</th>
                        <th>User name</th>
                        {% if flag_type != 'pause_day' %}
                        <th>Days Left</th>
                        {%endif%}
                        <th class=\"text-center\">Meal</th>                       
                        <th class=\"text-center\">Notification</th>
                      {% if flag_type != 'pause_day' %}
                        <th>Driver</th>
                        {%endif%}                               
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
{% endblock %}", "AdminBundle:Reports:summary.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Reports/summary.html.twig");
    }
}
