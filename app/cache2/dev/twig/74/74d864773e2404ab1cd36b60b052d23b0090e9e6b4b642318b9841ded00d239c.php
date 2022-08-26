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

/* AdminBundle:Orders:getMealsDateWiseFilter.html.twig */
class __TwigTemplate_50b8d5dd367e21f0db159985879f1f947eeaf8f215402a24a02118805c451c7c extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:getMealsDateWiseFilter.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:getMealsDateWiseFilter.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>

    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Order Meals
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 26
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 28
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 32
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 34
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Order Meals </h3></br>
                        <div class=\"row\">
                            ";
        // line 46
        if (((isset($context["orderMaster"]) || array_key_exists("orderMaster", $context)) &&  !twig_test_empty(($context["orderMaster"] ?? $this->getContext($context, "orderMaster"))))) {
            // line 47
            echo "                                <div class=\"col-md-2\">
                                    <b>Order Id : </b> ";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "unique_no", []), "html", null, true);
            echo " 
                                </div>\t
                                <div class=\"col-md-3\">
                                    <b>Start Date : </b> ";
            // line 51
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "start_date", []), "d-m-Y"), "html", null, true);
            echo " 
                                </div>\t
                                <div class=\"col-md-3\">
                                    <b>End Date : </b> ";
            // line 54
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "end_date", []), "d-m-Y"), "html", null, true);
            echo " 
                                </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                <div class=\"col-md-3\">
                                    <b>Customer : </b> ";
            // line 57
            if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["order_data"] ?? $this->getContext($context, "order_data")), 0, [], "array"), "customer_name", []), "html", null, true);
                echo " ";
            }
            echo " 
                                </div>\t\t\t\t\t\t\t\t\t\t\t\t
                            ";
        }
        // line 60
        echo "                        </div>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        <div class=\"row col-md-4 form-group no-print\">
                            <form class=\"form-inline\" action=\"\" method=\"POST\">
                                <div class=\"form-group\">
                                    <label for=\"email\">Date:</label>
                                    <input type=\"text\" class=\"form-control datepicker\" name=\"order_date\"  id=\"order_date\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["date"] ?? $this->getContext($context, "date")), "html", null, true);
        echo "\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Go</button> 

";
        // line 74
        echo "\t
                            </form>
                        </div>
                        ";
        // line 77
        if (((isset($context["orderMaster"]) || array_key_exists("orderMaster", $context)) &&  !twig_test_empty(($context["orderMaster"] ?? $this->getContext($context, "orderMaster"))))) {
            // line 78
            echo "                        <button type=\"button\" class=\"btn btn-warning btn-xs no-print pull-right\" data-toggle=\"modal\" data-target=\"#myModal_";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\">Add Meal With new Date</button> 
                        ";
        }
        // line 79
        echo "  
                        
                        <table class=\"table table-responsive table-stripped\">

                            <tbody>
";
        // line 84
        if (((isset($context["orderMaster"]) || array_key_exists("orderMaster", $context)) &&  !twig_test_empty(($context["orderMaster"] ?? $this->getContext($context, "orderMaster"))))) {
            // line 85
            echo "                                 <div id=\"myModal_";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Add Meal</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <form method=\"POST\" action=\"";
            // line 95
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_addmealbyadmin");
            echo "\">

                                            <input type=\"hidden\" name=\"order_id\" value=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\"/>
                                            <input type=\"hidden\" name=\"meal_id\" value=\"0\"/>

                                            <div class=\"form-group col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Date</label>
                                                    <input type='text' name=\"meal_date\" id=\"datepciker_";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\" class=\"form-control datepicker_";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\" onchange=\"resetmealtype('datepciker_";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "',";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo ")\" />
                                                </div>
                                                
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal Type</label>
                                                    <select class=\"form-control\" name=\"meal_type\" onchange=\"getMeals(\$(this), \$('#datepciker_' +";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo " ).val(), ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "sub_package_id", []), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo " );\" required >
                                                        <option value=\"\">-- Select Meal Type --</option>
                                                        ";
            // line 110
            if (((isset($context["meal_cat_all"]) || array_key_exists("meal_cat_all", $context)) &&  !twig_test_empty(($context["meal_cat_all"] ?? $this->getContext($context, "meal_cat_all"))))) {
                // line 111
                echo "                                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["meal_cat_all"]);
                foreach ($context['_seq'] as $context["_key"] => $context["meal_cat_all"]) {
                    // line 112
                    echo "                                                                <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_cat_all"], "main_product_category_master_id", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_cat_all"], "product_category_name", []), "html", null, true);
                    echo "</option>
                                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_cat_all'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 114
                echo "                                                        ";
            }
            // line 115
            echo "                                                    </select>
                                                </div>
                                            </div>

                                            <div class=\"form-group\">
                                                
                                            </div>
                                            <script>
                                                order_id = \"";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\";
                                                pickDate = \"";
            // line 124
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "start_date", []), "Y-m-d"), "html", null, true);
            echo "\";
                                                pickDate1 = \"";
            // line 125
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "end_date", []), "Y-m-d"), "html", null, true);
            echo "\";
                                                \$(\"#datepciker_\" + order_id).datepicker('setStartDate', new Date());
                                            </script>   
                                            <div class=\"form-group  col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal</label>
                                                    <select class=\"form-control\" name=\"meal\" id=\"meal_select_";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\" onchange=\"getMealEggs(\$(this), ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "sub_package_id", []), "html", null, true);
            echo " );\" required>
                                                        <option value=\"\">-- Select Meal --</option>
                                                    </select>
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal Qty</label>
                                                    ";
            // line 138
            echo "                                                    <select class=\"form-control\" name=\"meal_qty\" id=\"meal_qty_";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\" required>
                                                        <option value=\"\">-- Select Meal --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class=\"form-group col-md-12 hide\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Protiens</label>
                                                    <select class=\"form-control\" name=\"prot\" id=\"prot_";
            // line 147
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\">

                                                        <option value=\"0\">-- Select Protiens --</option>
                                                        ";
            // line 150
            if (((isset($context["sub_package_details_grams"]) || array_key_exists("sub_package_details_grams", $context)) &&  !twig_test_empty(($context["sub_package_details_grams"] ?? $this->getContext($context, "sub_package_details_grams"))))) {
                // line 151
                echo "                                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, ($context["sub_package_details_grams"] ?? $this->getContext($context, "sub_package_details_grams")), 50));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 152
                    echo "                                                                <option value=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</option>
                                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 154
                echo "                                                        ";
            }
            // line 155
            echo "                                                    </select>                                               
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Carbs</label>
                                                    <select name=\"carb\" class=\"form-control\" id=\"carb_";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\">>
                                                        <option value=\"0\">-- Select Carbs --</option>
                                                        ";
            // line 161
            if (((isset($context["sub_package_details_grams"]) || array_key_exists("sub_package_details_grams", $context)) &&  !twig_test_empty(($context["sub_package_details_grams"] ?? $this->getContext($context, "sub_package_details_grams"))))) {
                // line 162
                echo "                                                            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, ($context["sub_package_details_grams"] ?? $this->getContext($context, "sub_package_details_grams")), 50));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 163
                    echo "                                                                <option value=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</option>
                                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 165
                echo "                                                        ";
            }
            echo "                                                     
                                                    </select>
                                                </div>                                              
                                            </div>  

                                            <div class=\"form-group breakfast col-md-12 hide\" style=\"display:none\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Raw Eggs</label>
                                                    <select name=\"raw_eggs\" class=\"form-control\" id=\"raw_eggs_";
            // line 173
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\">
                                                        <option value=\"0\">-- Select Raw Eggs --</option>
                                                    </select>
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">White Eggs</label>
                                                    <select name=\"white_eggs\" class=\"form-control\" id=\"white_eggs_";
            // line 179
            echo twig_escape_filter($this->env, $this->getAttribute(($context["orderMaster"] ?? $this->getContext($context, "orderMaster")), "order_master_id", []), "html", null, true);
            echo "\">
                                                        <option value=\"0\">-- Select White Eggs --</option>
                                                    </select>
                                                </div>                                              
                                            </div>  

                                            <div class=\"modal-footer\">                                          
                                                <button class=\"btn btn-block btn-primary no-print \">Add Meal </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        ";
        }
        // line 198
        echo "                                ";
        if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
            // line 199
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["order_data"]);
            foreach ($context['_seq'] as $context["_key"] => $context["order_data"]) {
                // line 200
                echo "                                        <tr style=\"background:lightblue\">
                                            <td>
                                                Order No : ";
                // line 202
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_unique_no", []), "html", null, true);
                echo "
                                            </td>
                                            <td>
                                                Req Date : ";
                // line 205
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "date_time", []), "html", null, true);
                echo "
                                            </td>
                                            <td>
                                                Customer : ";
                // line 208
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "customer_name", []), "html", null, true);
                echo "
                                            </td>
                                            <td class=\"no-print\">Status : ";
                // line 210
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "status_name", []), "html", null, true);
                echo "</td>
                                            <td>Last Modified Date time : ";
                // line 211
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "last_modified_datetime", []), "html", null, true);
                echo "</td>
                                            <td class=\"no-print\">
                                                Assign Driver :
                                                <select class=\"form-control\" onchange=\"assign_driver(\$(this), '";
                // line 214
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "', '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                echo "')\">
                                                    <option>
                                                        Select Driver
                                                    </option>
                                                    ";
                // line 218
                if (($this->getAttribute($context["order_data"], "drivers", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["order_data"], "drivers", [])))) {
                    // line 219
                    echo "                                                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["order_data"], "drivers", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["driver"]) {
                        // line 220
                        echo "                                                            <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["driver"], "user_master_id", []), "html", null, true);
                        echo "\" 
                                                                    ";
                        // line 221
                        if (($this->getAttribute($context["order_data"], "driver_id", []) == $this->getAttribute($context["driver"], "user_master_id", []))) {
                            echo " selected ";
                        }
                        echo ">
                                                                ";
                        // line 222
                        echo twig_escape_filter($this->env, (($this->getAttribute($context["driver"], "user_firstname", []) . " ") . $this->getAttribute($context["driver"], "user_lastname", [])), "html", null, true);
                        echo "
                                                            </option>
                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['driver'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 225
                    echo "                                                    ";
                }
                // line 226
                echo "                                                </select>
                                            </td>
                                            <td>
                                                ";
                // line 229
                if (($this->getAttribute($context["order_data"], "req_date_pause", []) == "false")) {
                    // line 230
                    echo "                                                    <button type=\"button\" class=\"btn btn-warning btn-xs no-print\" data-toggle=\"modal\" data-target=\"#myModal_";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                    echo "_";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "date_time", []), "html", null, true);
                    echo "\">Add Meal</button>\t\t\t\t\t\t\t\t\t
                                                    <button type=\"button\" class=\"btn btn-danger btn-xs no-print\" onclick=\"deletewholedaymeal(";
                    // line 231
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                    echo ",";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                    echo ",\$(this))\">Delete Meal</button>\t
                                                ";
                } else {
                    // line 233
                    echo "                                                    <font color='red'><b>Package Paused</b></font>
                                                ";
                }
                // line 234
                echo "\t\t\t\t\t\t\t\t
                                            </td>
                                        </tr>\t
                                        <tr>
                                            <td colspan=\"7\">
                                                <table class=\"table table-responsive table-stripped\">
                                                    <thead>
                                                    <th>
                                                        Product
                                                    </th>
                                                    <th>
                                                        Meal Type 
                                                    </th>
                                                    <th>
                                                        Meal Quantity 
                                                    </th>
                                                   ";
                // line 262
                echo "                                                    </thead>
                                                    <tbody>
                                                        ";
                // line 264
                if (($this->getAttribute($context["order_data"], "products_array", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["order_data"], "products_array", [])))) {
                    // line 265
                    echo "                                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["order_data"], "products_array", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 266
                        echo "                                                               
                                                                <tr>
                                                                    <td>
                                                                        <span id =\"display_product_";
                        // line 269
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "\" >";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "product_name", []), "html", null, true);
                        echo "</span>

                                                                        <select class=\"form-control\" id=\"change_product_";
                        // line 271
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "\" style=\"display:none;\" onchange=\"getQtyLimit('change_product_";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "' ,'change_qty_";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "');\">
                                                                            ";
                        // line 272
                        if (((isset($context["products_all"]) || array_key_exists("products_all", $context)) &&  !twig_test_empty(($context["products_all"] ?? $this->getContext($context, "products_all"))))) {
                            // line 273
                            echo "                                                                                <option value=\"0\" max_qty_limit = \"0\">--Select Meal Quantity--</option>
                                                                                ";
                            // line 274
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["products_all"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["products_all"]) {
                                // line 275
                                echo "                                                                                    ";
                                if (((($this->getAttribute($context["product"], "meal_type", []) == $this->getAttribute($context["products_all"], "meal_type_id", [])) && twig_in_filter($this->getAttribute($context["order_data"], "package_id", []), $this->getAttribute($context["products_all"], "product_packageArray", []))) && twig_in_filter($this->getAttribute($context["order_data"], "day_id", []), $this->getAttribute($context["products_all"], "product_daysArray", [])))) {
                                    // line 276
                                    echo "                                                                                        <option value=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["products_all"], "main_product_master_id", []), "html", null, true);
                                    echo "\" max_qty_limit = \"";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["products_all"], "product_max_meal_value", []), "html", null, true);
                                    echo "\">
                                                                                            ";
                                    // line 277
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["products_all"], "lang_name", []), "html", null, true);
                                    echo " - ";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["products_all"], "meal_type_id", []), "html", null, true);
                                    echo "
                                                                                        </option>
                                                                                    ";
                                }
                                // line 280
                                echo "                                                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['products_all'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 281
                            echo "                                                                            ";
                        }
                        echo "\t
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        ";
                        // line 285
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "order_meal_type_name", []), "html", null, true);
                        echo "
                                                                    </td>
                                                                    <td>
                                                                        <span id =\"display_qty_";
                        // line 288
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "\" >";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_qty", []), "html", null, true);
                        echo "</span></br>
                                                                     ";
                        // line 290
                        echo "                                                                        <select class=\"form-control\" id=\"change_qty_";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                        echo "\" style=\"display:none;width: 74px;\">
                                                                            <option value=\"0\">Select</option>
                                                                            ";
                        // line 292
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(0, $this->getAttribute($context["product"], "product_max_meal_value", [])));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 293
                            echo "                                                                                <option value=\"";
                            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                            echo "</option>
                                                                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 295
                        echo "                                                                                   
                                                                        </select>
                                                                    </td>
                                                                   ";
                        // line 324
                        echo "                                                                    <td >
                                                                        ";
                        // line 325
                        if (($this->getAttribute($context["order_data"], "req_date_pause", []) == "false")) {
                            // line 326
                            echo "                                                                            <label class=\"btn btn-info btn-xs\" id=\"edit_btn_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "\" onclick=\"show_Edit('";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "', \$(this))\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-danger btn-xs\" id=\"delete_btn_";
                            // line 327
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "\" onclick=\"deleteproductmeal('";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "', \$(this))\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-success btn-xs\" id=\"update_btn_";
                            // line 328
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "\"  onclick=\"update_Edit('";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "', \$(this))\" style=\"display:none\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-default btn-xs\" id=\"cancle_btn_";
                            // line 329
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "\"  onclick=\"hide_Edit('";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "meal_product_relation_id", []), "html", null, true);
                            echo "', \$(this))\" style=\"display:none\"><i class=\"fa fa-ban\" aria-hidden=\"true\"></i></label>
                                                                        ";
                        } else {
                            // line 331
                            echo "                                                                            N/A
                                                                        ";
                        }
                        // line 333
                        echo "                                                                    </td>
                                                                </tr>\t
                                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 336
                    echo "                                                        ";
                }
                // line 337
                echo "                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>\t

                                    <div id=\"myModal_";
                // line 342
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "date_time", []), "html", null, true);
                echo "\" class=\"modal fade\" role=\"dialog\">
                                        <div class=\"modal-dialog\">

                                            <!-- Modal content-->
                                            <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                    <h4 class=\"modal-title\">Add Meal</h4>
                                                </div>
                                                <div class=\"modal-body\">
                                                    <form method=\"POST\" action=\"";
                // line 352
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_addmealbyadmin");
                echo "\">

                                                        <input type=\"hidden\" name=\"order_id\" value=\"";
                // line 354
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                echo "\"/>
                                                        <input type=\"hidden\" name=\"meal_id\" value=\"";
                // line 355
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\"/>
                                                        <input type=\"hidden\" name=\"order_date_id\" value=\"";
                // line 356
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "date_time", []), "html", null, true);
                echo "\"/>

                                                        <div class=\"form-group\">
                                                            <label class=\"\">Meal Type</label>
                                                            ";
                // line 361
                echo "                                                            <select class=\"form-control\" name=\"meal_type\" onchange=\"getMeals(\$(this), '";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "date_time", []), "html", null, true);
                echo "', ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "sub_package_id", []), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "order_id", []), "html", null, true);
                echo " );\" required >
                                                                <option value=\"\">-- Select Meal Type --</option>
                                                                ";
                // line 363
                if (((isset($context["meal_cat_all"]) || array_key_exists("meal_cat_all", $context)) &&  !twig_test_empty(($context["meal_cat_all"] ?? $this->getContext($context, "meal_cat_all"))))) {
                    // line 364
                    echo "                                                                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["meal_cat_all"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["meal_cat_all"]) {
                        // line 365
                        echo "                                                                        <option value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_cat_all"], "main_product_category_master_id", []), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_cat_all"], "product_category_name", []), "html", null, true);
                        echo "</option>
                                                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_cat_all'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 367
                    echo "                                                                ";
                }
                // line 368
                echo "                                                            </select>
                                                        </div>
                                                        <div class=\"form-group col-md-12\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Meal</label>
                                                                <select class=\"form-control\" name=\"meal\" id=\"meal_select_";
                // line 373
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\" onchange=\"getMealEggs(\$(this), ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo ");\" required>
                                                                    <option value=\"\">-- Select Meal --</option>
                                                                </select>
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                 <label class=\"\">Qty</label>
                                                               ";
                // line 380
                echo "                                                                      <select class=\"form-control\" name=\"meal_qty\" id=\"meal_qty_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\"  required>
                                                                    <option value=\"\">-- Select Qty --</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class=\"form-group col-md-12 hide\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Protiens</label>
                                                                <select class=\"form-control\" name=\"prot\" id=\"prot_";
                // line 389
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\">

                                                                    <option value=\"0\">-- Select Protiens --</option>

                                                                    ";
                // line 393
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, $this->getAttribute($context["order_data"], "grams_of_package", []), 50));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 394
                    echo "                                                                        <option value=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</option>
                                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 396
                echo "
                                                                </select>\t\t\t\t\t\t\t\t\t\t\t\t
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Carbs</label>
                                                                <select name=\"carb\" class=\"form-control\" id=\"carb_";
                // line 401
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\">
                                                                    <option value=\"0\">-- Select Carbs --</option>

                                                                    ";
                // line 404
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(0, $this->getAttribute($context["order_data"], "grams_of_package", []), 50));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 405
                    echo "                                                                        <option value=\"";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                    echo "</option>
                                                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 407
                echo "
                                                                </select>
                                                            </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                        </div>\t

                                                        <div class=\"form-group breakfast col-md-12 hide\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Raw Eggs</label>
                                                                <select name=\"raw_eggs\" class=\"form-control\" id=\"raw_eggs_";
                // line 415
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\">
                                                                    <option value=\"0\">-- Select Raw Eggs --</option>
                                                                </select>
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">White Eggs</label>
                                                                <select name=\"white_eggs\" class=\"form-control\" id=\"white_eggs_";
                // line 421
                echo twig_escape_filter($this->env, $this->getAttribute($context["order_data"], "meal_id", []), "html", null, true);
                echo "\">
                                                                    <option value=\"0\">-- Select White Eggs --</option>
                                                                </select>
                                                            </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                        </div>\t

                                                        <div class=\"modal-footer\">\t\t\t\t\t\t\t\t\t\t\t
                                                            <button class=\"btn btn-block btn-primary no-print\">Add Meal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class=\"modal-footer\">
                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 441
            echo "                            ";
        } else {
            // line 442
            echo "                                <tr>
                                    <td>
                                        No meal Found
                                    </td>
                                </tr>
                            ";
        }
        // line 447
        echo "\t

                            </tbody>
                        </table>
                        ";
        // line 451
        if (((isset($context["order_data"]) || array_key_exists("order_data", $context)) &&  !twig_test_empty(($context["order_data"] ?? $this->getContext($context, "order_data"))))) {
            // line 452
            echo "                            <div class=\"row col-md-12 no-print\">
                                <button class=\"btn btn-default\" onclick=\"window.print()\">
                                    Print
                                </button>
                            </div>
                        ";
        }
        // line 458
        echo "                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 470
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 471
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>


<script>\t

    function update_Edit(meal_rel, element){
        var cnf = confirm('Are you sure want to edit Meal ? ');
        if (!cnf){
            return false;
        }
        var product = \$('#change_product_' + meal_rel).val();
        var product_name = \$('#change_product_' + meal_rel).text();
        var product_qty = \$('#change_qty_' + meal_rel).val();
        var pro = \$('#change_pro_' + meal_rel).val();
        var carbs = \$('#change_carbs_' + meal_rel).val();
        var eggs = \$('#change_egs_' + meal_rel).val();
        var white_eggs = \$('#change_white_egs_' + meal_rel).val();
        if (eggs == undefined){
            eggs = 0;
        }

        if (white_eggs == undefined){
            white_eggs = 0;
        }

        \$.ajax({
            url : \"";
        // line 497
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_editmeal");
        echo "\",
            method : \"POST\",
            data : {'meal_rel':meal_rel, 'product':product, 'pro':pro, 'carbs':carbs, 'eggs':eggs, 'white_eggs':white_eggs,'meal_qty':product_qty},
            success : function(data){
               
                if (\$.trim(data) != 'not_done'){
                    alert('Meal has been Updated');
                    data = JSON.parse(data);
                    \$('#display_product_' + meal_rel).text('');
                    \$('#display_product_' + meal_rel).text(data.product_name);
                    \$('#display_pro_' + meal_rel).text('');
                    \$('#display_pro_' + meal_rel).text(data.pro);
                    \$('#display_carbs_' + meal_rel).text('');
                    \$('#display_carbs_' + meal_rel).text(data.carbs);
                    \$('#display_egs_' + meal_rel).text('');
                    \$('#display_egs_' + meal_rel).text(data.eggs);
                    \$('#display_qty_' + meal_rel).text('');
                    \$('#display_qty_' + meal_rel).text(data.product_qty);
                    \$('#display_white_egs_' + meal_rel).text('');
                    \$('#display_white_egs_' + meal_rel).text(data.white_eggs);
                }
                else{
                     alert('Meal has not been Updated , Limit Exceeds');
                }

            },
                error : function(){
                alert('Something went wrong');
            }

        });
    }
    function deletewholedaymeal(order_id, day_meal_id,element){
    
         \$.ajax({
            url : \"";
        // line 532
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_deletemeal");
        echo "\",
            method : \"POST\",
            data : {'meal_id':day_meal_id, 'order_id':order_id},
            success : function(data){
                if(data == 'true'){
                    alert('Meal successfully deleted');
                     location.reload(true);                    
                }
                else{
                  alert('Something went wrong..');
                 }  
            },
                error : function(){
                alert('Something went wrong');
            }

        });
    }

    function show_Edit(meal_rel, element){

    \$('#display_product_' + meal_rel).hide();
    \$('#display_pro_' + meal_rel).hide();
    \$('#display_qty_' + meal_rel).hide();
    \$('#display_carbs_' + meal_rel).hide();
    \$('#display_egs_' + meal_rel).hide();
    \$('#display_white_egs_' + meal_rel).hide();
    \$('#change_product_' + meal_rel).slideDown();
    \$('#change_pro_' + meal_rel).slideDown();
    \$('#change_qty_' + meal_rel).slideDown();
    \$('#change_carbs_' + meal_rel).slideDown();
    \$('#change_egs_' + meal_rel).slideDown();
    \$('#change_white_egs_' + meal_rel).slideDown();
    element.hide();
    \$('#delete_btn_' + meal_rel).hide();
    \$('#update_btn_' + meal_rel).show();
    \$('#cancle_btn_' + meal_rel).show();
    }

    function hide_Edit(meal_rel, element){


    \$('#change_product_' + meal_rel).slideUp();
    \$('#change_pro_' + meal_rel).slideUp();
    \$('#change_qty_' + meal_rel).slideUp();
    \$('#change_carbs_' + meal_rel).slideUp();
    \$('#change_egs_' + meal_rel).slideUp();
    \$('#change_white_egs_' + meal_rel).slideUp();
    element.hide();
    \$('#update_btn_' + meal_rel).hide();
    \$('#cancle_btn_' + meal_rel).hide();
    \$('#edit_btn_' + meal_rel).show();
    \$('#delete_btn_' + meal_rel).show();
    \$('#display_product_' + meal_rel).show();
    \$('#display_pro_' + meal_rel).show();
    \$('#display_qty_' + meal_rel).show();
    \$('#display_carbs_' + meal_rel).show();
    \$('#display_egs_' + meal_rel).show();
    \$('#display_white_egs_' + meal_rel).show();
    }


    function assign_driver(element, meal_id, global_order_id){
        if (global_order_id != 0){
            \$.ajax({
                url : \"";
        // line 597
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assigndriver");
        echo "\",
                method : \"POST\",
                data : {'order_id':global_order_id, 'driver_id':element.val(), 'meal_id':meal_id},
                success : function(data){
                    alert(data);
                },
                error : function(){
                    alert('Something went wrong');
                }
            });
        }
    }
     function resetmealtype(ele,order_id){         
            \$('#'+ele).parent().next().find('select').val('');  
            // get package Gram Value
            var selected_date = \$('#'+ele).val();
            \$.ajax({
                url : \"";
        // line 614
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getupgradegramvaluebydate");
        echo "\",
                method : \"POST\",
                data : {'order_id':order_id , 'selected_date' : selected_date },
                success : function(data){
                   // console.log(data);                    
                    \$(\"#prot_\"+order_id).html(data);
                    \$(\"#carb_\"+order_id).html(data);
                }
            });
            
        }
    function getMeals(elem,dateval,order_meal_id,main_sub_package_id,order_id){
        console.log(elem);
        meal_type_id = elem.val();
        if (meal_type_id != 0){
            \$.ajax({
                url : \"";
        // line 630
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsbytype");
        echo "\",
                method : \"POST\",
                    data : {'meal_type_id': meal_type_id ,'main_sub_package_id' : main_sub_package_id ,'req_date' : dateval},
                    success : function(data){
                    console.log(data);
                        \$(\"#meal_select_\" + order_meal_id).html(data);
                        
                        \$.ajax({
                            url : \"";
        // line 638
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getupgradegramvaluebydate");
        echo "\",
                            method : \"POST\",
                            data : {'order_id':order_id , 'selected_date' : dateval },
                            success : function(data){
                               // console.log(data);                    
                                \$(\"#prot_\"+order_meal_id).html(data);
                                \$(\"#carb_\"+order_meal_id).html(data);
                            }
                        });
                    },
                    error : function(){
                        alert('Something went Wrong.')
                    }
                });
            }
            if (meal_type_id == 1 || true){
                //snakes
                \$('.breakfast').show();
            } 
            else{
                    \$('.breakfast').hide();
            }
        }
    function deleteproductmeal(productmeal_id,element){        
        \$.ajax({
            url : \"";
        // line 663
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_deletemealproduct");
        echo "\",
            method : \"POST\",
            data : {'meal_product_relation_id':productmeal_id},
            success : function(data){
                console.log(data);
                data = JSON.parse(data);
                if (data == true){
                    alert(\"Successfully deleted\");
                }
                else{
                     alert('Something went Wrong.')
                     }
            },
            error : function(){
                alert('Something went Wrong.')
            }
        });
        element.parent().parent().remove();
    }
    function getQtyLimit(selectedID,QtyId){
        qtyMax_limit = \$('#'+selectedID).find(':selected').attr('max_qty_limit') ;
        //change_qty_213349
        alert(qtyMax_limit);
        htmlop = ''; 
        for (i = 0 ; i<= qtyMax_limit ; i++ ){
            htmlop += '<option value=' + i + '> '+ i + '</option>';
        }
        console.log(QtyId);
        console.log(htmlop);
        \$('#'+QtyId).find('option').remove() ;
        \$('#'+QtyId).append(htmlop); 
    }
    function getMealEggs(elem, order_id){
        product_id = elem.val();
        if (meal_type_id != 0){
            \$.ajax({
                url : \"";
        // line 699
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsegssbyproduct");
        echo "\",
                    method : \"POST\",
                        data : {'main_product_id':product_id, 'main_sub_package_id' : ";
        // line 701
        echo twig_escape_filter($this->env, ($context["main_sub_package_id"] ?? $this->getContext($context, "main_sub_package_id")), "html", null, true);
        echo " },
                        success : function(data){
                        console.log(data);
                        data = JSON.parse(data);
                        if (data.white_eggs_html != ''){
                            \$(\"#white_eggs_\" + order_id).html(data.white_eggs_html);
                        }
                        
                        if (data.pro_carb_flag == 'false'){
                            \$(\"#prot_\" + order_id).find('option').remove() ;
                            \$(\"#prot_\" + order_id).append('<option value=\"0\" >Select</option>'); 
                            \$(\"#carb_\" + order_id).find('option').remove() ;
                            \$(\"#carb_\" + order_id).append('<option value=\"0\" >Select</option>'); 
                        }
                        if (data.raw_eggs_html != ''){
                            \$(\"#raw_eggs_\" + order_id).html(data.raw_eggs_html);
                        }
                        if (data.product_max_value_html != ''){
                            \$(\"#meal_qty_\" + order_id).html(data.product_max_value_html);
                        }

                        },
                        error : function(){
                        alert('Something went Wrong.')
                        }
                });
        }
    }


    \$(document).ready(function() {
    \$('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
//\t\$('#example').DataTable();
    });
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:getMealsDateWiseFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1214 => 701,  1209 => 699,  1170 => 663,  1142 => 638,  1131 => 630,  1112 => 614,  1092 => 597,  1024 => 532,  986 => 497,  956 => 471,  950 => 470,  933 => 458,  925 => 452,  923 => 451,  917 => 447,  909 => 442,  906 => 441,  880 => 421,  871 => 415,  861 => 407,  850 => 405,  846 => 404,  840 => 401,  833 => 396,  822 => 394,  818 => 393,  811 => 389,  798 => 380,  787 => 373,  780 => 368,  777 => 367,  766 => 365,  761 => 364,  759 => 363,  747 => 361,  740 => 356,  736 => 355,  732 => 354,  727 => 352,  710 => 342,  703 => 337,  700 => 336,  692 => 333,  688 => 331,  681 => 329,  675 => 328,  669 => 327,  662 => 326,  660 => 325,  657 => 324,  652 => 295,  641 => 293,  637 => 292,  631 => 290,  625 => 288,  619 => 285,  611 => 281,  605 => 280,  597 => 277,  590 => 276,  587 => 275,  583 => 274,  580 => 273,  578 => 272,  570 => 271,  563 => 269,  558 => 266,  553 => 265,  551 => 264,  547 => 262,  529 => 234,  525 => 233,  518 => 231,  509 => 230,  507 => 229,  502 => 226,  499 => 225,  490 => 222,  484 => 221,  479 => 220,  474 => 219,  472 => 218,  463 => 214,  457 => 211,  453 => 210,  448 => 208,  442 => 205,  436 => 202,  432 => 200,  427 => 199,  424 => 198,  402 => 179,  393 => 173,  381 => 165,  370 => 163,  365 => 162,  363 => 161,  358 => 159,  352 => 155,  349 => 154,  338 => 152,  333 => 151,  331 => 150,  325 => 147,  312 => 138,  299 => 131,  290 => 125,  286 => 124,  282 => 123,  272 => 115,  269 => 114,  258 => 112,  253 => 111,  251 => 110,  240 => 108,  226 => 103,  217 => 97,  212 => 95,  198 => 85,  196 => 84,  189 => 79,  183 => 78,  181 => 77,  176 => 74,  169 => 70,  157 => 60,  148 => 57,  142 => 54,  136 => 51,  130 => 48,  127 => 47,  125 => 46,  114 => 37,  105 => 34,  101 => 32,  96 => 31,  87 => 28,  83 => 26,  79 => 25,  72 => 21,  52 => 3,  46 => 2,  30 => 1,);
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
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
    </style>

    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Order Meals
            <small></small>
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
                        <h3 class=\"box-title\">Order Meals </h3></br>
                        <div class=\"row\">
                            {% if orderMaster is defined and orderMaster is not empty %}
                                <div class=\"col-md-2\">
                                    <b>Order Id : </b> {{ orderMaster.unique_no }} 
                                </div>\t
                                <div class=\"col-md-3\">
                                    <b>Start Date : </b> {{ orderMaster.start_date | date('d-m-Y') }} 
                                </div>\t
                                <div class=\"col-md-3\">
                                    <b>End Date : </b> {{ orderMaster.end_date | date('d-m-Y') }} 
                                </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                <div class=\"col-md-3\">
                                    <b>Customer : </b> {% if order_data is defined and order_data is not empty %}{{order_data[0].customer_name}} {% endif %} 
                                </div>\t\t\t\t\t\t\t\t\t\t\t\t
                            {% endif %}
                        </div>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        <div class=\"row col-md-4 form-group no-print\">
                            <form class=\"form-inline\" action=\"\" method=\"POST\">
                                <div class=\"form-group\">
                                    <label for=\"email\">Date:</label>
                                    <input type=\"text\" class=\"form-control datepicker\" name=\"order_date\"  id=\"order_date\" value=\"{{date}}\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Go</button> 

{#<button onclick=\"location.reload()\" class=\"btn btn-default\">Reset</button>#}\t
                            </form>
                        </div>
                        {% if orderMaster is defined and orderMaster is not empty %}
                        <button type=\"button\" class=\"btn btn-warning btn-xs no-print pull-right\" data-toggle=\"modal\" data-target=\"#myModal_{{orderMaster.order_master_id}}\">Add Meal With new Date</button> 
                        {% endif %}  
                        
                        <table class=\"table table-responsive table-stripped\">

                            <tbody>
{% if orderMaster is defined and orderMaster is not empty %}
                                 <div id=\"myModal_{{orderMaster.order_master_id}}\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Add Meal</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <form method=\"POST\" action=\"{{path('admin_orders_addmealbyadmin')}}\">

                                            <input type=\"hidden\" name=\"order_id\" value=\"{{orderMaster.order_master_id}}\"/>
                                            <input type=\"hidden\" name=\"meal_id\" value=\"0\"/>

                                            <div class=\"form-group col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Date</label>
                                                    <input type='text' name=\"meal_date\" id=\"datepciker_{{orderMaster.order_master_id}}\" class=\"form-control datepicker_{{orderMaster.order_master_id}}\" onchange=\"resetmealtype('datepciker_{{orderMaster.order_master_id}}',{{orderMaster.order_master_id}})\" />
                                                </div>
                                                
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal Type</label>
                                                    <select class=\"form-control\" name=\"meal_type\" onchange=\"getMeals(\$(this), \$('#datepciker_' +{{orderMaster.order_master_id}} ).val(), {{orderMaster.order_master_id}},{{orderMaster.sub_package_id}},{{orderMaster.order_master_id}} );\" required >
                                                        <option value=\"\">-- Select Meal Type --</option>
                                                        {% if meal_cat_all is defined and meal_cat_all is not empty %}
                                                            {% for meal_cat_all in meal_cat_all %}
                                                                <option value=\"{{meal_cat_all.main_product_category_master_id}}\">{{meal_cat_all.product_category_name}}</option>
                                                            {% endfor %}
                                                        {% endif %}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class=\"form-group\">
                                                
                                            </div>
                                            <script>
                                                order_id = \"{{orderMaster.order_master_id}}\";
                                                pickDate = \"{{orderMaster.start_date | date('Y-m-d')}}\";
                                                pickDate1 = \"{{orderMaster.end_date | date('Y-m-d')}}\";
                                                \$(\"#datepciker_\" + order_id).datepicker('setStartDate', new Date());
                                            </script>   
                                            <div class=\"form-group  col-md-12\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal</label>
                                                    <select class=\"form-control\" name=\"meal\" id=\"meal_select_{{orderMaster.order_master_id}}\" onchange=\"getMealEggs(\$(this), {{orderMaster.order_master_id}},{{orderMaster.sub_package_id}} );\" required>
                                                        <option value=\"\">-- Select Meal --</option>
                                                    </select>
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Meal Qty</label>
                                                    {#<input type=\"number\" class=\"form-control\" name=\"meal_qty\" id=\"meal_qty_{{orderMaster.order_master_id}}\" placeholder=\"Enter Meal Qty \" required /> #}
                                                    <select class=\"form-control\" name=\"meal_qty\" id=\"meal_qty_{{orderMaster.order_master_id}}\" required>
                                                        <option value=\"\">-- Select Meal --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class=\"form-group col-md-12 hide\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Protiens</label>
                                                    <select class=\"form-control\" name=\"prot\" id=\"prot_{{orderMaster.order_master_id}}\">

                                                        <option value=\"0\">-- Select Protiens --</option>
                                                        {% if sub_package_details_grams is defined and sub_package_details_grams is not empty %}
                                                            {% for i in range(0, sub_package_details_grams, 50) %}
                                                                <option value=\"{{ i }}\">{{ i }}</option>
                                                            {% endfor %}
                                                        {% endif %}
                                                    </select>                                               
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Carbs</label>
                                                    <select name=\"carb\" class=\"form-control\" id=\"carb_{{orderMaster.order_master_id}}\">>
                                                        <option value=\"0\">-- Select Carbs --</option>
                                                        {% if sub_package_details_grams is defined and sub_package_details_grams is not empty %}
                                                            {% for i in range(0, sub_package_details_grams, 50) %}
                                                                <option value=\"{{ i }}\">{{ i }}</option>
                                                            {% endfor %}
                                                        {% endif %}                                                     
                                                    </select>
                                                </div>                                              
                                            </div>  

                                            <div class=\"form-group breakfast col-md-12 hide\" style=\"display:none\">
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">Raw Eggs</label>
                                                    <select name=\"raw_eggs\" class=\"form-control\" id=\"raw_eggs_{{orderMaster.order_master_id}}\">
                                                        <option value=\"0\">-- Select Raw Eggs --</option>
                                                    </select>
                                                </div>
                                                <div class=\"col-md-6\">
                                                    <label class=\"\">White Eggs</label>
                                                    <select name=\"white_eggs\" class=\"form-control\" id=\"white_eggs_{{orderMaster.order_master_id}}\">
                                                        <option value=\"0\">-- Select White Eggs --</option>
                                                    </select>
                                                </div>                                              
                                            </div>  

                                            <div class=\"modal-footer\">                                          
                                                <button class=\"btn btn-block btn-primary no-print \">Add Meal </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {% endif %}
                                {%if order_data is defined and order_data is not empty%}
                                    {%for order_data in order_data %}
                                        <tr style=\"background:lightblue\">
                                            <td>
                                                Order No : {{order_data.order_unique_no}}
                                            </td>
                                            <td>
                                                Req Date : {{order_data.date_time}}
                                            </td>
                                            <td>
                                                Customer : {{order_data.customer_name}}
                                            </td>
                                            <td class=\"no-print\">Status : {{ order_data.status_name }}</td>
                                            <td>Last Modified Date time : {{ order_data.last_modified_datetime }}</td>
                                            <td class=\"no-print\">
                                                Assign Driver :
                                                <select class=\"form-control\" onchange=\"assign_driver(\$(this), '{{order_data.meal_id}}', '{{order_data.order_id}}')\">
                                                    <option>
                                                        Select Driver
                                                    </option>
                                                    {%if order_data.drivers is defined and order_data.drivers is not empty%}
                                                        {%for driver in order_data.drivers %}
                                                            <option value=\"{{driver.user_master_id}}\" 
                                                                    {%if order_data.driver_id == driver.user_master_id %} selected {%endif%}>
                                                                {{driver.user_firstname ~' '~ driver.user_lastname}}
                                                            </option>
                                                        {%endfor%}
                                                    {%endif%}
                                                </select>
                                            </td>
                                            <td>
                                                {% if order_data.req_date_pause == 'false' %}
                                                    <button type=\"button\" class=\"btn btn-warning btn-xs no-print\" data-toggle=\"modal\" data-target=\"#myModal_{{order_data.order_id}}_{{order_data.meal_id}}_{{order_data.date_time}}\">Add Meal</button>\t\t\t\t\t\t\t\t\t
                                                    <button type=\"button\" class=\"btn btn-danger btn-xs no-print\" onclick=\"deletewholedaymeal({{order_data.order_id}},{{order_data.meal_id}},\$(this))\">Delete Meal</button>\t
                                                {%else%}
                                                    <font color='red'><b>Package Paused</b></font>
                                                {%endif%}\t\t\t\t\t\t\t\t
                                            </td>
                                        </tr>\t
                                        <tr>
                                            <td colspan=\"7\">
                                                <table class=\"table table-responsive table-stripped\">
                                                    <thead>
                                                    <th>
                                                        Product
                                                    </th>
                                                    <th>
                                                        Meal Type 
                                                    </th>
                                                    <th>
                                                        Meal Quantity 
                                                    </th>
                                                   {# <th>
                                                        Protiens
                                                    </th>
                                                    <th>
                                                        Carbs
                                                    </th>
                                                    <th>
                                                        Raw Eggs
                                                    </th>
                                                    <th>
                                                        White Eggs
                                                    </th>#}
                                                    </thead>
                                                    <tbody>
                                                        {%if order_data.products_array is defined and order_data.products_array is not empty%}
                                                            {%for product in order_data.products_array%}
                                                               
                                                                <tr>
                                                                    <td>
                                                                        <span id =\"display_product_{{product.meal_product_relation_id}}\" >{{product.product_name}}</span>

                                                                        <select class=\"form-control\" id=\"change_product_{{product.meal_product_relation_id}}\" style=\"display:none;\" onchange=\"getQtyLimit('change_product_{{product.meal_product_relation_id}}' ,'change_qty_{{product.meal_product_relation_id}}');\">
                                                                            {% if products_all is defined and products_all is not empty %}
                                                                                <option value=\"0\" max_qty_limit = \"0\">--Select Meal Quantity--</option>
                                                                                {% for products_all in products_all %}
                                                                                    {% if product.meal_type == products_all.meal_type_id and order_data.package_id in products_all.product_packageArray and order_data.day_id in products_all.product_daysArray %}
                                                                                        <option value=\"{{products_all.main_product_master_id}}\" max_qty_limit = \"{{products_all.product_max_meal_value}}\">
                                                                                            {{products_all.lang_name}} - {{ products_all.meal_type_id}}
                                                                                        </option>
                                                                                    {%endif%}
                                                                                {% endfor %}
                                                                            {% endif %}\t
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        {{product.order_meal_type_name}}
                                                                    </td>
                                                                    <td>
                                                                        <span id =\"display_qty_{{product.meal_product_relation_id}}\" >{{product.meal_qty}}</span></br>
                                                                     {#   <input class=\"form-control\"  type=\"number\" id=\"change_qty_{{product.meal_product_relation_id}}\" value=\"{{product.meal_qty}}\" style=\"display:none\" />#}
                                                                        <select class=\"form-control\" id=\"change_qty_{{product.meal_product_relation_id}}\" style=\"display:none;width: 74px;\">
                                                                            <option value=\"0\">Select</option>
                                                                            {% for i in range(0, product.product_max_meal_value) %}
                                                                                <option value=\"{{ i }}\">{{ i }}</option>
                                                                            {% endfor %}
                                                                                   
                                                                        </select>
                                                                    </td>
                                                                   {# <td>
                                                                        <span id =\"display_pro_{{product.meal_product_relation_id}}\" >{{product.proteins_amount}}</span></br>
                                                                        <input class=\"form-control\"  type=\"text\" id=\"change_pro_{{product.meal_product_relation_id}}\" value=\"{{product.proteins_amount}}\" style=\"display:none\" />
                                                                    </td>
                                                                    <td>
                                                                        <span id =\"display_carbs_{{product.meal_product_relation_id}}\" >{{product.carbs_amount}}</span></br>
                                                                        <input class=\"form-control\" type=\"text\" id=\"change_carbs_{{product.meal_product_relation_id}}\" value=\"{{product.carbs_amount}}\" style=\"display:none\" />
                                                                    </td>
                                                                    <td>
                                                                        {% if product.meal_type == 1 or true %}
                                                                            <span id =\"display_egs_{{product.meal_product_relation_id}}\" >{{product.raw_eggs}}</span></br>
                                                                            <input class=\"form-control\"type=\"text\" id=\"change_egs_{{product.meal_product_relation_id}}\" value=\"{{product.raw_eggs}}\" style=\"display:none\" />
                                                                        {%else%}
                                                                            N/A
                                                                        {%endif%}\t
                                                                    </td>
                                                                    <td>
                                                                        {% if product.meal_type == 1  or true %}
                                                                            <span id =\"display_white_egs_{{product.meal_product_relation_id}}\" >{{product.white_eggs}}</span></br>
                                                                            <input class=\"form-control\" type=\"text\" id=\"change_white_egs_{{product.meal_product_relation_id}}\" value=\"{{product.white_eggs}}\" style=\"display:none\" />

                                                                        {%else%}
                                                                            N/A
                                                                        {%endif%}\t

                                                                    </td> #}
                                                                    <td >
                                                                        {% if order_data.req_date_pause == 'false' %}
                                                                            <label class=\"btn btn-info btn-xs\" id=\"edit_btn_{{product.meal_product_relation_id}}\" onclick=\"show_Edit('{{product.meal_product_relation_id}}', \$(this))\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-danger btn-xs\" id=\"delete_btn_{{product.meal_product_relation_id}}\" onclick=\"deleteproductmeal('{{product.meal_product_relation_id}}', \$(this))\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-success btn-xs\" id=\"update_btn_{{product.meal_product_relation_id}}\"  onclick=\"update_Edit('{{product.meal_product_relation_id}}', \$(this))\" style=\"display:none\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></label>
                                                                            <label class=\"btn btn-default btn-xs\" id=\"cancle_btn_{{product.meal_product_relation_id}}\"  onclick=\"hide_Edit('{{product.meal_product_relation_id}}', \$(this))\" style=\"display:none\"><i class=\"fa fa-ban\" aria-hidden=\"true\"></i></label>
                                                                        {%else%}
                                                                            N/A
                                                                        {%endif%}
                                                                    </td>
                                                                </tr>\t
                                                            {%endfor%}
                                                        {%endif%}
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>\t

                                    <div id=\"myModal_{{order_data.order_id}}_{{order_data.meal_id}}_{{order_data.date_time}}\" class=\"modal fade\" role=\"dialog\">
                                        <div class=\"modal-dialog\">

                                            <!-- Modal content-->
                                            <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                                    <h4 class=\"modal-title\">Add Meal</h4>
                                                </div>
                                                <div class=\"modal-body\">
                                                    <form method=\"POST\" action=\"{{path('admin_orders_addmealbyadmin')}}\">

                                                        <input type=\"hidden\" name=\"order_id\" value=\"{{order_data.order_id}}\"/>
                                                        <input type=\"hidden\" name=\"meal_id\" value=\"{{order_data.meal_id}}\"/>
                                                        <input type=\"hidden\" name=\"order_date_id\" value=\"{{order_data.date_time}}\"/>

                                                        <div class=\"form-group\">
                                                            <label class=\"\">Meal Type</label>
                                                            {#<select class=\"form-control\" name=\"meal_type\" onchange=\"getMeals(\$(this), \$('#order_date').val(), {{order_data.meal_id}},{{order_data.sub_package_id}} );\" required >#}
                                                            <select class=\"form-control\" name=\"meal_type\" onchange=\"getMeals(\$(this), '{{order_data.date_time}}', {{order_data.meal_id}},{{order_data.sub_package_id}},{{order_data.order_id}} );\" required >
                                                                <option value=\"\">-- Select Meal Type --</option>
                                                                {% if meal_cat_all is defined and meal_cat_all is not empty %}
                                                                    {% for meal_cat_all in meal_cat_all %}
                                                                        <option value=\"{{meal_cat_all.main_product_category_master_id}}\">{{meal_cat_all.product_category_name}}</option>
                                                                    {% endfor %}
                                                                {% endif %}
                                                            </select>
                                                        </div>
                                                        <div class=\"form-group col-md-12\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Meal</label>
                                                                <select class=\"form-control\" name=\"meal\" id=\"meal_select_{{order_data.meal_id}}\" onchange=\"getMealEggs(\$(this), {{order_data.meal_id}});\" required>
                                                                    <option value=\"\">-- Select Meal --</option>
                                                                </select>
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                 <label class=\"\">Qty</label>
                                                               {# <input type=\"number\" name=\"meal_qty\" Placeholder=\"Enter Meal Qty\" class=\"form-control\" required />#}
                                                                      <select class=\"form-control\" name=\"meal_qty\" id=\"meal_qty_{{order_data.meal_id}}\"  required>
                                                                    <option value=\"\">-- Select Qty --</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class=\"form-group col-md-12 hide\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Protiens</label>
                                                                <select class=\"form-control\" name=\"prot\" id=\"prot_{{order_data.meal_id}}\">

                                                                    <option value=\"0\">-- Select Protiens --</option>

                                                                    {% for i in range(0, order_data.grams_of_package, 50) %}
                                                                        <option value=\"{{ i }}\">{{ i }}</option>
                                                                    {% endfor %}

                                                                </select>\t\t\t\t\t\t\t\t\t\t\t\t
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Carbs</label>
                                                                <select name=\"carb\" class=\"form-control\" id=\"carb_{{order_data.meal_id}}\">
                                                                    <option value=\"0\">-- Select Carbs --</option>

                                                                    {% for i in range(0, order_data.grams_of_package, 50) %}
                                                                        <option value=\"{{ i }}\">{{ i }}</option>
                                                                    {% endfor %}

                                                                </select>
                                                            </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                        </div>\t

                                                        <div class=\"form-group breakfast col-md-12 hide\">
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">Raw Eggs</label>
                                                                <select name=\"raw_eggs\" class=\"form-control\" id=\"raw_eggs_{{order_data.meal_id}}\">
                                                                    <option value=\"0\">-- Select Raw Eggs --</option>
                                                                </select>
                                                            </div>
                                                            <div class=\"col-md-6\">
                                                                <label class=\"\">White Eggs</label>
                                                                <select name=\"white_eggs\" class=\"form-control\" id=\"white_eggs_{{order_data.meal_id}}\">
                                                                    <option value=\"0\">-- Select White Eggs --</option>
                                                                </select>
                                                            </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                        </div>\t

                                                        <div class=\"modal-footer\">\t\t\t\t\t\t\t\t\t\t\t
                                                            <button class=\"btn btn-block btn-primary no-print\">Add Meal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class=\"modal-footer\">
                                                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                {%endfor%}
                            {%else%}
                                <tr>
                                    <td>
                                        No meal Found
                                    </td>
                                </tr>
                            {%endif%}\t

                            </tbody>
                        </table>
                        {%if order_data is defined and order_data is not empty%}
                            <div class=\"row col-md-12 no-print\">
                                <button class=\"btn btn-default\" onclick=\"window.print()\">
                                    Print
                                </button>
                            </div>
                        {%endif%}
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- PAGE HEADER : END -->
    <!-- Main content : START -->

{% endblock %}

{% block js %}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>


<script>\t

    function update_Edit(meal_rel, element){
        var cnf = confirm('Are you sure want to edit Meal ? ');
        if (!cnf){
            return false;
        }
        var product = \$('#change_product_' + meal_rel).val();
        var product_name = \$('#change_product_' + meal_rel).text();
        var product_qty = \$('#change_qty_' + meal_rel).val();
        var pro = \$('#change_pro_' + meal_rel).val();
        var carbs = \$('#change_carbs_' + meal_rel).val();
        var eggs = \$('#change_egs_' + meal_rel).val();
        var white_eggs = \$('#change_white_egs_' + meal_rel).val();
        if (eggs == undefined){
            eggs = 0;
        }

        if (white_eggs == undefined){
            white_eggs = 0;
        }

        \$.ajax({
            url : \"{{path('admin_orders_editmeal')}}\",
            method : \"POST\",
            data : {'meal_rel':meal_rel, 'product':product, 'pro':pro, 'carbs':carbs, 'eggs':eggs, 'white_eggs':white_eggs,'meal_qty':product_qty},
            success : function(data){
               
                if (\$.trim(data) != 'not_done'){
                    alert('Meal has been Updated');
                    data = JSON.parse(data);
                    \$('#display_product_' + meal_rel).text('');
                    \$('#display_product_' + meal_rel).text(data.product_name);
                    \$('#display_pro_' + meal_rel).text('');
                    \$('#display_pro_' + meal_rel).text(data.pro);
                    \$('#display_carbs_' + meal_rel).text('');
                    \$('#display_carbs_' + meal_rel).text(data.carbs);
                    \$('#display_egs_' + meal_rel).text('');
                    \$('#display_egs_' + meal_rel).text(data.eggs);
                    \$('#display_qty_' + meal_rel).text('');
                    \$('#display_qty_' + meal_rel).text(data.product_qty);
                    \$('#display_white_egs_' + meal_rel).text('');
                    \$('#display_white_egs_' + meal_rel).text(data.white_eggs);
                }
                else{
                     alert('Meal has not been Updated , Limit Exceeds');
                }

            },
                error : function(){
                alert('Something went wrong');
            }

        });
    }
    function deletewholedaymeal(order_id, day_meal_id,element){
    
         \$.ajax({
            url : \"{{path('admin_orders_deletemeal')}}\",
            method : \"POST\",
            data : {'meal_id':day_meal_id, 'order_id':order_id},
            success : function(data){
                if(data == 'true'){
                    alert('Meal successfully deleted');
                     location.reload(true);                    
                }
                else{
                  alert('Something went wrong..');
                 }  
            },
                error : function(){
                alert('Something went wrong');
            }

        });
    }

    function show_Edit(meal_rel, element){

    \$('#display_product_' + meal_rel).hide();
    \$('#display_pro_' + meal_rel).hide();
    \$('#display_qty_' + meal_rel).hide();
    \$('#display_carbs_' + meal_rel).hide();
    \$('#display_egs_' + meal_rel).hide();
    \$('#display_white_egs_' + meal_rel).hide();
    \$('#change_product_' + meal_rel).slideDown();
    \$('#change_pro_' + meal_rel).slideDown();
    \$('#change_qty_' + meal_rel).slideDown();
    \$('#change_carbs_' + meal_rel).slideDown();
    \$('#change_egs_' + meal_rel).slideDown();
    \$('#change_white_egs_' + meal_rel).slideDown();
    element.hide();
    \$('#delete_btn_' + meal_rel).hide();
    \$('#update_btn_' + meal_rel).show();
    \$('#cancle_btn_' + meal_rel).show();
    }

    function hide_Edit(meal_rel, element){


    \$('#change_product_' + meal_rel).slideUp();
    \$('#change_pro_' + meal_rel).slideUp();
    \$('#change_qty_' + meal_rel).slideUp();
    \$('#change_carbs_' + meal_rel).slideUp();
    \$('#change_egs_' + meal_rel).slideUp();
    \$('#change_white_egs_' + meal_rel).slideUp();
    element.hide();
    \$('#update_btn_' + meal_rel).hide();
    \$('#cancle_btn_' + meal_rel).hide();
    \$('#edit_btn_' + meal_rel).show();
    \$('#delete_btn_' + meal_rel).show();
    \$('#display_product_' + meal_rel).show();
    \$('#display_pro_' + meal_rel).show();
    \$('#display_qty_' + meal_rel).show();
    \$('#display_carbs_' + meal_rel).show();
    \$('#display_egs_' + meal_rel).show();
    \$('#display_white_egs_' + meal_rel).show();
    }


    function assign_driver(element, meal_id, global_order_id){
        if (global_order_id != 0){
            \$.ajax({
                url : \"{{path('admin_orders_assigndriver')}}\",
                method : \"POST\",
                data : {'order_id':global_order_id, 'driver_id':element.val(), 'meal_id':meal_id},
                success : function(data){
                    alert(data);
                },
                error : function(){
                    alert('Something went wrong');
                }
            });
        }
    }
     function resetmealtype(ele,order_id){         
            \$('#'+ele).parent().next().find('select').val('');  
            // get package Gram Value
            var selected_date = \$('#'+ele).val();
            \$.ajax({
                url : \"{{path('admin_orders_getupgradegramvaluebydate')}}\",
                method : \"POST\",
                data : {'order_id':order_id , 'selected_date' : selected_date },
                success : function(data){
                   // console.log(data);                    
                    \$(\"#prot_\"+order_id).html(data);
                    \$(\"#carb_\"+order_id).html(data);
                }
            });
            
        }
    function getMeals(elem,dateval,order_meal_id,main_sub_package_id,order_id){
        console.log(elem);
        meal_type_id = elem.val();
        if (meal_type_id != 0){
            \$.ajax({
                url : \"{{path('admin_orders_getmealsbytype')}}\",
                method : \"POST\",
                    data : {'meal_type_id': meal_type_id ,'main_sub_package_id' : main_sub_package_id ,'req_date' : dateval},
                    success : function(data){
                    console.log(data);
                        \$(\"#meal_select_\" + order_meal_id).html(data);
                        
                        \$.ajax({
                            url : \"{{path('admin_orders_getupgradegramvaluebydate')}}\",
                            method : \"POST\",
                            data : {'order_id':order_id , 'selected_date' : dateval },
                            success : function(data){
                               // console.log(data);                    
                                \$(\"#prot_\"+order_meal_id).html(data);
                                \$(\"#carb_\"+order_meal_id).html(data);
                            }
                        });
                    },
                    error : function(){
                        alert('Something went Wrong.')
                    }
                });
            }
            if (meal_type_id == 1 || true){
                //snakes
                \$('.breakfast').show();
            } 
            else{
                    \$('.breakfast').hide();
            }
        }
    function deleteproductmeal(productmeal_id,element){        
        \$.ajax({
            url : \"{{path('admin_orders_deletemealproduct')}}\",
            method : \"POST\",
            data : {'meal_product_relation_id':productmeal_id},
            success : function(data){
                console.log(data);
                data = JSON.parse(data);
                if (data == true){
                    alert(\"Successfully deleted\");
                }
                else{
                     alert('Something went Wrong.')
                     }
            },
            error : function(){
                alert('Something went Wrong.')
            }
        });
        element.parent().parent().remove();
    }
    function getQtyLimit(selectedID,QtyId){
        qtyMax_limit = \$('#'+selectedID).find(':selected').attr('max_qty_limit') ;
        //change_qty_213349
        alert(qtyMax_limit);
        htmlop = ''; 
        for (i = 0 ; i<= qtyMax_limit ; i++ ){
            htmlop += '<option value=' + i + '> '+ i + '</option>';
        }
        console.log(QtyId);
        console.log(htmlop);
        \$('#'+QtyId).find('option').remove() ;
        \$('#'+QtyId).append(htmlop); 
    }
    function getMealEggs(elem, order_id){
        product_id = elem.val();
        if (meal_type_id != 0){
            \$.ajax({
                url : \"{{path('admin_orders_getmealsegssbyproduct')}}\",
                    method : \"POST\",
                        data : {'main_product_id':product_id, 'main_sub_package_id' : {{main_sub_package_id}} },
                        success : function(data){
                        console.log(data);
                        data = JSON.parse(data);
                        if (data.white_eggs_html != ''){
                            \$(\"#white_eggs_\" + order_id).html(data.white_eggs_html);
                        }
                        
                        if (data.pro_carb_flag == 'false'){
                            \$(\"#prot_\" + order_id).find('option').remove() ;
                            \$(\"#prot_\" + order_id).append('<option value=\"0\" >Select</option>'); 
                            \$(\"#carb_\" + order_id).find('option').remove() ;
                            \$(\"#carb_\" + order_id).append('<option value=\"0\" >Select</option>'); 
                        }
                        if (data.raw_eggs_html != ''){
                            \$(\"#raw_eggs_\" + order_id).html(data.raw_eggs_html);
                        }
                        if (data.product_max_value_html != ''){
                            \$(\"#meal_qty_\" + order_id).html(data.product_max_value_html);
                        }

                        },
                        error : function(){
                        alert('Something went Wrong.')
                        }
                });
        }
    }


    \$(document).ready(function() {
    \$('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
//\t\$('#example').DataTable();
    });
</script>\t
{% endblock %}", "AdminBundle:Orders:getMealsDateWiseFilter.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/getMealsDateWiseFilter.html.twig");
    }
}
