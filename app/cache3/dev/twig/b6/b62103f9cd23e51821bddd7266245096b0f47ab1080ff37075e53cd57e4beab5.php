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

/* AdminBundle:Orders:vieworderwiseoffdays.html.twig */
class __TwigTemplate_b4d4c2a28d45a01138edd6b252a2d9d238a430bacad35dc4bd59f549802e7d35 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:vieworderwiseoffdays.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:vieworderwiseoffdays.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "<style>
\t@media print
\t{    
\t\t\t.no-print, .no-print *
\t\t\t{
\t\t\t\t\tdisplay: none !important;
\t\t\t}
\t}
</style>
\t<section class=\"content-header\">

\t\t<h1>
\t\t  Order
\t\t</h1>

\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 26
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 30
            echo "            <div class=\"alert alert-danger alert-dismissable\">
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
        echo "\t\t
\t\t";
        // line 36
        $context["status_name"] = [0 => "pending", 1 => "accept", 2 => "reject", 3 => "cancel", 4 => "success", 5 => "ongoing"];
        // line 37
        echo "\t\t\t\t\t
\t\t";
        // line 38
        if (((isset($context["main_order"]) || array_key_exists("main_order", $context)) &&  !twig_test_empty(($context["main_order"] ?? $this->getContext($context, "main_order"))))) {
            // line 39
            echo "
\t\t\t<section class=\"invoice\" id=\"invoice\"> 
\t\t\t 
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Customer Details</b> </br>
\t\t\t\t\t
\t\t\t\t\t<b>Name</b> : ";
            // line 46
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_firstname", []) . " ") . $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_lastname", [])), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Unique Id </b> : ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "unique_user_id", []), "html", null, true);
            echo "\t
\t\t\t\t</div>
                                <div class=\"col-sm-4 invoice-col no-print\">
\t\t\t\t\t<b>Order No : ";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "unique_no", []), "html", null, true);
            echo "</b>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
                                      
\t\t\t  <!-- Table row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">


\t\t\t\t  <table class=\"table table-striped\">
\t\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>Package Name</th>
\t\t\t\t\t  <th>Grams</th>
\t\t\t\t\t  <th>Order start date</th>
\t\t\t\t\t  <th>Order end date</th>
\t\t\t\t\t  <th class=\"no-print\">Payment Status</th>
\t\t\t\t\t  <th class=\"no-print\" >Transaction Id</th>
\t\t\t\t\t  ";
            // line 71
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t<tr>

\t\t\t\t\t\t\t\t";
            // line 76
            $context["label_class1"] = "";
            // line 77
            echo "                ";
            $context["payment_status"] = "";
            // line 78
            echo "\t\t\t\t\t\t\t\t";
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "payment_status", []) == "success")) {
                // line 79
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-success";
                // line 80
                echo "                      ";
                $context["payment_status"] = "success";
                // line 81
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 82
            echo "\t\t\t\t\t\t\t\t";
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "payment_status", []) == "pending")) {
                // line 83
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-warning";
                // line 84
                echo "                    ";
                $context["payment_status"] = "pending";
                // line 85
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t

\t\t\t\t\t\t\t\t";
            // line 87
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_status", []) == "cancel")) {
                // line 88
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-danger";
                // line 89
                echo "\t\t\t\t\t\t\t\t\t";
                $context["payment_status"] = "Transaction Cancel";
                // line 90
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 91
            echo "
\t\t\t\t\t  <td>";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "package_name", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td>";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "grams", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td>";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "start_date", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td>";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "end_date", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td class=\"no-print\" ><label class=\"label ";
            // line 96
            echo twig_escape_filter($this->env, ($context["label_class1"] ?? $this->getContext($context, "label_class1")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["payment_status"] ?? $this->getContext($context, "payment_status")), "html", null, true);
            echo "</label>\t</td>
\t\t\t\t\t  <td class=\"no-print\" >";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "transaction_code", []), "html", null, true);
            echo "
\t\t

\t\t\t\t\t  </td>
\t\t\t\t\t ";
            // line 110
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t  </table>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
                        <hr>

                        ";
            // line 118
            if ((($context["payment_status"] ?? $this->getContext($context, "payment_status")) != "Transaction Cancel")) {
                // line 119
                echo "                           ";
                if ((($context["action_perform_flag"] ?? $this->getContext($context, "action_perform_flag")) == true)) {
                    // line 120
                    echo "\t                        <div class=\"row \">
\t                            <div class=\"col-md-2\"><label>Add Number Of days</label></div>
\t                            <div class=\"col-md-3\"><input type=\"number\" name=\"add_number_days\" id=\"add_number_days\" value=\"\" class=\"form-control\" placeholder=\"Add Number of days\"/></div>
\t                            <div class=\"col-md-1\"><input type=\"button\" name=\"Add\" value=\"Add Days\" class=\"btn btn-sm btn-warning\" onclick=\"add_days_to_order(";
                    // line 123
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
                    echo ");\" /></div>
\t                           ";
                    // line 128
                    echo " </div>
\t                        <hr>

\t                        <div class=\"row hide\">
\t                           <div class=\"col-md-2\"><label>Pause Package on Date</label></div>
\t                            <div class=\"col-md-3\"><input type=\"text\" name=\"pause_package_on\" id=\"pause_package_on\" value=\"\" class=\"form-control datepickerpause\" placeholder=\"Select Pause Package on Date\"/></div>
\t                            <div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t<label>Resume Choice</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" id=\"resume_choice\" name=\"resume_choice\" value=\"admin\" / >Admin Selection
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" id=\"resume_choice\" name=\"resume_choice\" value=\"customer\" / >Customer Choice
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t                            <div class=\"col-md-1\"><input type=\"button\" name=\"Add\" value=\"Pause Package\" readonly class=\"btn btn-sm bg-purple\" onclick=\"pause_package_order(";
                    // line 143
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
                    echo ");\" /></div>
\t                        </div>
\t                        ";
                } else {
                    // line 146
                    echo "\t                           Order End date Passed , so can not perform any Days Operation
\t                        ";
                }
                // line 148
                echo "\t                        <hr>
\t                        ";
                // line 149
                if (((isset($context["add_days_list"]) || array_key_exists("add_days_list", $context)) &&  !twig_test_empty(($context["add_days_list"] ?? $this->getContext($context, "add_days_list"))))) {
                    // line 150
                    echo "\t                        <div class=\"row hide\">
\t                            <table class=\"table\">
\t                                <thead>
\t                                    <tr> 
\t                                        <th>No</th>
\t                                        <th>Order Old End date</th>
\t                                        <th>Order New End date</th>
\t                                        <th>Days Added</th>
\t                                        <th>Added Datetime</th>
\t                                    </tr>
\t                                </thead>
\t                                <tbody>
\t                                    ";
                    // line 162
                    if (((isset($context["add_days_list"]) || array_key_exists("add_days_list", $context)) &&  !twig_test_empty(($context["add_days_list"] ?? $this->getContext($context, "add_days_list"))))) {
                        // line 163
                        echo "\t                                        ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["add_days_list"]);
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
                        foreach ($context['_seq'] as $context["_key"] => $context["add_days_list"]) {
                            // line 164
                            echo "\t                                            <tr>
\t                                                <td>";
                            // line 165
                            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                            echo "</td>
\t                                                <td>";
                            // line 166
                            echo twig_escape_filter($this->env, $this->getAttribute($context["add_days_list"], "old_order_end_date", []), "html", null, true);
                            echo "</td>
\t                                                <td>";
                            // line 167
                            echo twig_escape_filter($this->env, $this->getAttribute($context["add_days_list"], "new_order_end_date", []), "html", null, true);
                            echo "</td>
\t                                                <td>";
                            // line 168
                            echo twig_escape_filter($this->env, $this->getAttribute($context["add_days_list"], "added_days", []), "html", null, true);
                            echo "</td>
\t                                                <td>";
                            // line 169
                            echo twig_escape_filter($this->env, $this->getAttribute($context["add_days_list"], "added_datetime", []), "html", null, true);
                            echo "</td>
\t                                            </tr>
\t                                        ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['add_days_list'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 172
                        echo "\t                                    ";
                    }
                    // line 173
                    echo "\t                                </tbody>
\t                            </table>
\t                        </div>
\t                        </hr>
\t                        ";
                }
                // line 178
                echo "                        
                        <!-- /.row -->
                      <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">
                            
                            <b>Off Days in Package</b></br>
                            ";
                // line 184
                if (((isset($context["date_array"]) || array_key_exists("date_array", $context)) &&  !twig_test_empty(($context["date_array"] ?? $this->getContext($context, "date_array"))))) {
                    // line 185
                    echo "                                <table class=\"table\">
                                    <thead>
\t\t\t\t\t<tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Off Day</th>
                                            <th>Freeze Day</th>
                                           ";
                    // line 194
                    echo "                                           
                                        </tr>   
                                    </thead>
                                    ";
                    // line 197
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["date_array"]);
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
                    foreach ($context['_seq'] as $context["_key"] => $context["date_array"]) {
                        // line 198
                        echo "                                        <tbody>
                                        <tr>
                                            <td>";
                        // line 200
                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                        echo "</td>
                                            <td>  ";
                        // line 201
                        echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "date", []), "html", null, true);
                        echo " </td>
                                            <td>  ";
                        // line 202
                        echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "day", []), "html", null, true);
                        echo " </td>
                                            <td>
                                                ";
                        // line 205
                        echo "                                                ";
                        $context["checked"] = "";
                        // line 206
                        echo "                                                ";
                        if (($this->getAttribute($context["date_array"], "off_day_flag", []) == "1")) {
                            // line 207
                            echo "                                                        ";
                            $context["checked"] = "checked";
                            // line 208
                            echo "                                                ";
                        }
                        // line 209
                        echo "                                                ";
                        if (($this->getAttribute($context["date_array"], "day_id", []) == 5)) {
                            // line 210
                            echo "                                                    <button type=\"button\" class=\"btn btn-xs bg-green-gradient\" style=\"cursor: not-allowed;\" value=\"Enable\" >Enable</button>  
                                                ";
                        } else {
                            // line 212
                            echo "                                                    ";
                            if (($this->getAttribute($context["date_array"], "suspend_flagdisable", []) == true)) {
                                // line 213
                                echo "                                                        <input data-on=\"Enable\" class=\"status status_1\" style=\"cursor: not-allowed;\"  type=\"checkbox\" onchange=\"alert('day passed');\"data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                                echo "/>
                                                    ";
                            } else {
                                // line 215
                                echo "                                                        <input data-on=\"Enable\" class=\"status status_1\" style=\"cursor: not-allowed;\"  data-off=\"Disable\" onchange=\"change_off_day('";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "day", []), "html", null, true);
                                echo "',";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "day_id", []), "html", null, true);
                                echo ",\$(this).is(':checked'),";
                                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
                                echo ")\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                                echo "/>
                                                    ";
                            }
                            // line 217
                            echo "                                                    
                                                ";
                        }
                        // line 219
                        echo "                                                
                                                   
                                                
                                            </td>
                                            <td>
                                              ";
                        // line 224
                        if ((($context["checked"] ?? $this->getContext($context, "checked")) != "checked")) {
                            // line 225
                            echo "                                                ";
                            if (($this->getAttribute($context["date_array"], "suspend_flagdisable", []) == false)) {
                                // line 226
                                echo "                                                    ";
                                $context["checked"] = "";
                                // line 227
                                echo "                                                    ";
                                if (($this->getAttribute($context["date_array"], "suspend_flag", []) == "1")) {
                                    // line 228
                                    echo "                                                            ";
                                    $context["checked"] = "checked";
                                    // line 229
                                    echo "                                                    ";
                                }
                                // line 230
                                echo "                                                    <input data-on=\"Enable\" class=\"status status_1\" data-off=\"Disable\" onchange=\"change_subscription_status('";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "day", []), "html", null, true);
                                echo "',";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "day_id", []), "html", null, true);
                                echo ",\$(this).is(':checked'),";
                                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
                                echo ",'";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["date_array"], "date", []), "html", null, true);
                                echo "')\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"warning\" ";
                                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                                echo "/>
                                                  ";
                                // line 232
                                echo "                                                ";
                            } else {
                                // line 233
                                echo "                                                    -
                                                ";
                            }
                            // line 235
                            echo "                                            ";
                        } else {
                            // line 236
                            echo "                                                    -
                                            ";
                        }
                        // line 238
                        echo "                                            </td>
                                           ";
                        // line 252
                        echo "                                        </tr>
                                        </tbody>
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date_array'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 255
                    echo "                                </table>
                            ";
                } else {
                    // line 257
                    echo "                                    N/A
                            ";
                }
                // line 259
                echo "                            </div>
                        </div>
\t\t\t\t
\t\t\t ";
            }
            // line 263
            echo "\t\t\t
";
            // line 315
            echo "\t\t\t <div class=\"row  no-print\">
\t\t\t \t<button class=\"btn btn-info\" onclick=\"window.print()\" ><i class=\"fa fa-print\"></i>Print</button>
\t\t\t </div>
\t\t\t</section>
\t\t\t
\t\t";
        }
        // line 321
        echo "</section>\t\t
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 327
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 328
        echo "  <script>
\t\t  
        function add_days_to_order(order_id){
          var added_days = \$('#add_number_days').val();  
          \$.ajax({
                url : \"";
        // line 333
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_adddaystoorder");
        echo "\",
                method : \"POST\",
                data : {'no_of_days_add':added_days,'order_master_id':order_id},
                success : function(data){
                        if(\$.trim(data) == 'done'){
                                alert('Days updated successfully');
                        }else{
                                alert('Somehing went wrong');\t\t\t\t
                        }
                },
                error : function(){
                        alert(\"Somehing went wrong\");
                }
        \t});

        }

        function expire_package_order(order_id){
          var expire_on_date = \$('#expire_package_on').val();  
          if(expire_on_date == '' || expire_on_date == null ){
          \talert(\"Please select proper Expire Package Date\");
          }
          else{
\t          \$.ajax({
\t                url : \"";
        // line 357
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_expireorderbeforedate");
        echo "\",
\t                method : \"POST\",
\t                data : {'expire_on_date':expire_on_date,'order_master_id':order_id},
\t                success : function(data){
\t                        if(\$.trim(data) == 'done'){
\t                                alert('Package Expire , Please Refressh page ');
\t                        }else{
\t                                alert('Somehing went wrong');\t\t\t\t
\t                        }
\t                },
\t                error : function(){
\t                        alert(\"Somehing went wrong with error\");
\t                }
\t        \t});
\t      }

        }
\t   function pause_package_order(order_id){
\t          var pause_package_date = \$('#pause_package_on').val();  
\t          var resume_choice =  \$(\"input[name='resume_choice']:checked\").val() ; 
\t         
\t          if(pause_package_date == '' || pause_package_date == null ){
\t          \talert(\"Please select proper Expire Package Date\");
\t          }
\t          else{
\t\t          \$.ajax({
\t\t                url : \"";
        // line 383
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pause_singlepauseorder");
        echo "\",
\t\t                method : \"POST\",
\t\t                data : {'pause_package_date':pause_package_date,'order_master_id':order_id,'resume_choice':resume_choice},
\t\t                success : function(data){
\t\t                        if(\$.trim(data) == 'Done'){
\t\t                                alert('Package Paused , Please Refressh page ');
\t\t                        }else if( \$.trim(data)  == 'pause_already'){
\t                                alert('Package already paused Earlier , First unpause it');\t\t\t\t
\t\t                        }else{
\t\t                                alert('Somehing went wrong');\t\t\t\t
\t\t                        }
\t\t                },
\t\t                error : function(){
\t\t                        alert(\"Somehing went wrong with error\");
\t\t                }
\t\t        \t});
\t\t      }

\t        }
\t  
\tfunction change_off_day(day_name,day_id,status,order_id){
\t\t
\t\t
\t\t\$.ajax({
\t\t\turl : \"";
        // line 407
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_changedayoffstatus");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day_master_id':day_id,'order_master_id':order_id,'status':status },
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\tfunction change_subscription_status(day_name,day_id,status,order_id,req_date){
\t\t
\t\t
\t\t\$.ajax({
\t\t\turl : \"";
        // line 426
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_changeordersubscription");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day_master_id':day_id,'order_master_id':order_id,'status':status,'req_date':req_date },
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

function assign_driver(element,order_master_id){
\t\t
\t\tvar driver = element.val();
\t\t\$.ajax({
\t\t\turl : \"";
        // line 446
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assigndrivertoallorder");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'driver_id':driver},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Driver Assigned successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t
    \$(document).ready(function() {
\t\t\$('#datatable').DataTable();
\t\t
\t\t \$('.datepicker').datepicker({  
\t\t \tformat: 'yyyy-mm-dd',
\t\t \tstartDate: \"";
        // line 468
        echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "passeddate", []), "html", null, true);
        echo "\",
\t\t \tendDate: \"";
        // line 469
        echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "end_date", []), "html", null, true);
        echo "-1\",

\t\t \t });
\t\t \$('.datepickerpause').datepicker({  
\t\t \tformat: 'yyyy-mm-dd',
\t\t \tstartDate: \"";
        // line 474
        echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "passeddate", []), "html", null, true);
        echo "\"
\t\t \t });
\t  
\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t  var divToPrint=document.getElementById('invoice');

\t  var newWin=window.open('','Print-Window');

\t  newWin.document.open();

\t  newWin.document.write(\"<html><body onload='window.print()'>\"+divToPrint.innerHTML);

\t  newWin.document.close();

\t  setTimeout(function(){newWin.close();},10);

\t}
\t\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:vieworderwiseoffdays.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  769 => 474,  761 => 469,  757 => 468,  732 => 446,  709 => 426,  687 => 407,  660 => 383,  631 => 357,  604 => 333,  597 => 328,  591 => 327,  580 => 321,  572 => 315,  569 => 263,  563 => 259,  559 => 257,  555 => 255,  539 => 252,  536 => 238,  532 => 236,  529 => 235,  525 => 233,  522 => 232,  509 => 230,  506 => 229,  503 => 228,  500 => 227,  497 => 226,  494 => 225,  492 => 224,  485 => 219,  481 => 217,  469 => 215,  463 => 213,  460 => 212,  456 => 210,  453 => 209,  450 => 208,  447 => 207,  444 => 206,  441 => 205,  436 => 202,  432 => 201,  428 => 200,  424 => 198,  407 => 197,  402 => 194,  392 => 185,  390 => 184,  382 => 178,  375 => 173,  372 => 172,  355 => 169,  351 => 168,  347 => 167,  343 => 166,  339 => 165,  336 => 164,  318 => 163,  316 => 162,  302 => 150,  300 => 149,  297 => 148,  293 => 146,  287 => 143,  270 => 128,  266 => 123,  261 => 120,  258 => 119,  256 => 118,  246 => 110,  239 => 97,  233 => 96,  229 => 95,  225 => 94,  221 => 93,  217 => 92,  214 => 91,  211 => 90,  208 => 89,  205 => 88,  203 => 87,  197 => 85,  194 => 84,  191 => 83,  188 => 82,  185 => 81,  182 => 80,  179 => 79,  176 => 78,  173 => 77,  171 => 76,  164 => 71,  141 => 50,  135 => 47,  131 => 46,  122 => 39,  120 => 38,  117 => 37,  115 => 36,  112 => 35,  103 => 32,  99 => 30,  94 => 29,  85 => 26,  81 => 24,  77 => 23,  70 => 19,  52 => 3,  46 => 2,  30 => 1,);
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
\t@media print
\t{    
\t\t\t.no-print, .no-print *
\t\t\t{
\t\t\t\t\tdisplay: none !important;
\t\t\t}
\t}
</style>
\t<section class=\"content-header\">

\t\t<h1>
\t\t  Order
\t\t</h1>

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
\t\t{%set status_name = ['pending','accept','reject','cancel','success','ongoing'] %}
\t\t\t\t\t
\t\t{%if main_order is defined and main_order is not empty%}

\t\t\t<section class=\"invoice\" id=\"invoice\"> 
\t\t\t 
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Customer Details</b> </br>
\t\t\t\t\t
\t\t\t\t\t<b>Name</b> : {{main_order.user_firstname ~' '~ main_order.user_lastname}}\t</br>
\t\t\t\t\t<b>Unique Id </b> : {{main_order.unique_user_id}}\t
\t\t\t\t</div>
                                <div class=\"col-sm-4 invoice-col no-print\">
\t\t\t\t\t<b>Order No : {{main_order.unique_no}}</b>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
                                      
\t\t\t  <!-- Table row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">


\t\t\t\t  <table class=\"table table-striped\">
\t\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>Package Name</th>
\t\t\t\t\t  <th>Grams</th>
\t\t\t\t\t  <th>Order start date</th>
\t\t\t\t\t  <th>Order end date</th>
\t\t\t\t\t  <th class=\"no-print\">Payment Status</th>
\t\t\t\t\t  <th class=\"no-print\" >Transaction Id</th>
\t\t\t\t\t  {#<th class=\"no-print\" >Order Status</th>#}
\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t<tr>

\t\t\t\t\t\t\t\t{% set label_class1 = ''%}
                {% set payment_status = '' %}
\t\t\t\t\t\t\t\t{% if main_order.payment_status == 'success'%}
\t\t\t\t\t\t\t\t\t{% set label_class1 = 'label-success'%}
                      {% set payment_status = 'success' %}
\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t{% if main_order.payment_status == 'pending'%}
\t\t\t\t\t\t\t\t\t{% set label_class1 = 'label-warning'%}
                    {% set payment_status = 'pending' %}
\t\t\t\t\t\t\t\t{% endif%}\t

\t\t\t\t\t\t\t\t{% if main_order.order_status == 'cancel'%}
\t\t\t\t\t\t\t\t\t{% set label_class1 = 'label-danger'%}
\t\t\t\t\t\t\t\t\t{% set payment_status  = 'Transaction Cancel' %}
\t\t\t\t\t\t\t\t{% endif%}

\t\t\t\t\t  <td>{{main_order.package_name}}</td>
\t\t\t\t\t  <td>{{main_order.grams}}</td>
\t\t\t\t\t  <td>{{main_order.start_date}}</td>
\t\t\t\t\t  <td>{{main_order.end_date}}</td>
\t\t\t\t\t  <td class=\"no-print\" ><label class=\"label {{label_class1}}\">{{payment_status}}</label>\t</td>
\t\t\t\t\t  <td class=\"no-print\" >{{main_order.transaction_code}}
\t\t

\t\t\t\t\t  </td>
\t\t\t\t\t {# <td class=\"no-print\" >
\t\t\t\t\t\t<select id=\"order_status\" class=\"form-control\" onchange=\"change_status('{{main_order.order_master_id}}',\$(this))\" disabled>
\t\t\t\t\t\t{% if status_name is defined and status_name is not empty %}
\t\t\t\t\t\t\t{% for status_name in status_name %}
\t\t\t\t\t\t\t\t<option value=\"{{status_name}}\" {% if status_name == main_order.order_status %} selected{%endif%}>{{status_name | capitalize}}</option>
\t\t\t\t\t\t\t{% endfor%}
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</select>\t\t\t\t\t  
\t\t\t\t\t  </td>#}
\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t  </table>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
                        <hr>

                        {%if payment_status != 'Transaction Cancel'  %}
                           {%if  action_perform_flag == true  %}
\t                        <div class=\"row \">
\t                            <div class=\"col-md-2\"><label>Add Number Of days</label></div>
\t                            <div class=\"col-md-3\"><input type=\"number\" name=\"add_number_days\" id=\"add_number_days\" value=\"\" class=\"form-control\" placeholder=\"Add Number of days\"/></div>
\t                            <div class=\"col-md-1\"><input type=\"button\" name=\"Add\" value=\"Add Days\" class=\"btn btn-sm btn-warning\" onclick=\"add_days_to_order({{main_order.order_master_id}});\" /></div>
\t                           {# <div class=\"col-md-2\"><label>Expire Package on Date</label></div>
\t                            <div class=\"col-md-3\"><input type=\"text\" name=\"expire_package_on\" id=\"expire_package_on\" value=\"\" class=\"form-control datepicker\" placeholder=\"Select Expire Package on Date\"/></div>

\t                            <div class=\"col-md-1\"><input type=\"button\" name=\"Add\" value=\"Expire Package\" readonly class=\"btn btn-sm btn-danger\" onclick=\"expire_package_order({{main_order.order_master_id}});\" /></div>
\t                       #} </div>
\t                        <hr>

\t                        <div class=\"row hide\">
\t                           <div class=\"col-md-2\"><label>Pause Package on Date</label></div>
\t                            <div class=\"col-md-3\"><input type=\"text\" name=\"pause_package_on\" id=\"pause_package_on\" value=\"\" class=\"form-control datepickerpause\" placeholder=\"Select Pause Package on Date\"/></div>
\t                            <div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t<label>Resume Choice</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" id=\"resume_choice\" name=\"resume_choice\" value=\"admin\" / >Admin Selection
\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" id=\"resume_choice\" name=\"resume_choice\" value=\"customer\" / >Customer Choice
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t                            <div class=\"col-md-1\"><input type=\"button\" name=\"Add\" value=\"Pause Package\" readonly class=\"btn btn-sm bg-purple\" onclick=\"pause_package_order({{main_order.order_master_id}});\" /></div>
\t                        </div>
\t                        {%else%}
\t                           Order End date Passed , so can not perform any Days Operation
\t                        {% endif %}
\t                        <hr>
\t                        {%if add_days_list is defined and add_days_list is not empty %}
\t                        <div class=\"row hide\">
\t                            <table class=\"table\">
\t                                <thead>
\t                                    <tr> 
\t                                        <th>No</th>
\t                                        <th>Order Old End date</th>
\t                                        <th>Order New End date</th>
\t                                        <th>Days Added</th>
\t                                        <th>Added Datetime</th>
\t                                    </tr>
\t                                </thead>
\t                                <tbody>
\t                                    {%if add_days_list is defined and add_days_list is not empty %}
\t                                        {%for add_days_list in add_days_list %}
\t                                            <tr>
\t                                                <td>{{loop.index}}</td>
\t                                                <td>{{add_days_list.old_order_end_date}}</td>
\t                                                <td>{{add_days_list.new_order_end_date}}</td>
\t                                                <td>{{add_days_list.added_days}}</td>
\t                                                <td>{{add_days_list.added_datetime}}</td>
\t                                            </tr>
\t                                        {%endfor%}
\t                                    {%endif%}
\t                                </tbody>
\t                            </table>
\t                        </div>
\t                        </hr>
\t                        {%endif%}
                        
                        <!-- /.row -->
                      <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">
                            
                            <b>Off Days in Package</b></br>
                            {% if date_array is defined and date_array is not empty %}
                                <table class=\"table\">
                                    <thead>
\t\t\t\t\t<tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Off Day</th>
                                            <th>Freeze Day</th>
                                           {# <th>Pause Day</th> #}
                                           
                                        </tr>   
                                    </thead>
                                    {% for date_array  in date_array %}
                                        <tbody>
                                        <tr>
                                            <td>{{loop.index}}</td>
                                            <td>  {{date_array.date}} </td>
                                            <td>  {{date_array.day}} </td>
                                            <td>
                                                {#{% if date_array.off_day_flag == \"1\" %} Off Day <b>ON</b> {%endif%} #}
                                                {% set checked = ''%}
                                                {% if date_array.off_day_flag == \"1\" %}
                                                        {% set checked = 'checked'%}
                                                {%endif%}
                                                {%if date_array.day_id == 5 %}
                                                    <button type=\"button\" class=\"btn btn-xs bg-green-gradient\" style=\"cursor: not-allowed;\" value=\"Enable\" >Enable</button>  
                                                {%else%}
                                                    {% if date_array.suspend_flagdisable == true %}
                                                        <input data-on=\"Enable\" class=\"status status_1\" style=\"cursor: not-allowed;\"  type=\"checkbox\" onchange=\"alert('day passed');\"data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
                                                    {%else%}
                                                        <input data-on=\"Enable\" class=\"status status_1\" style=\"cursor: not-allowed;\"  data-off=\"Disable\" onchange=\"change_off_day('{{date_array.day}}',{{date_array.day_id}},\$(this).is(':checked'),{{main_order.order_master_id}})\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
                                                    {%endif%}
                                                    
                                                {%endif%}
                                                
                                                   
                                                
                                            </td>
                                            <td>
                                              {% if checked != 'checked' %}
                                                {% if date_array.suspend_flagdisable == false %}
                                                    {% set checked = ''%}
                                                    {% if date_array.suspend_flag == \"1\" %}
                                                            {% set checked = 'checked'%}
                                                    {%endif%}
                                                    <input data-on=\"Enable\" class=\"status status_1\" data-off=\"Disable\" onchange=\"change_subscription_status('{{date_array.day }}',{{date_array.day_id}},\$(this).is(':checked'),{{main_order.order_master_id}},'{{date_array.date}}')\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"warning\" {{checked}}/>
                                                  {#  {% if date_array.suspend_flag == \"1\" %} Freeze Day <b>ON</b> {%endif%} #}
                                                {%else%}
                                                    -
                                                {%endif%}
                                            {%else%}
                                                    -
                                            {%endif%}
                                            </td>
                                           {# <td>
                                            \t {% if date_array.pasue_flagdisable == false %}
                                                    {% set checked = ''%}
                                                    {% if date_array.pasue_flag == \"1\" %}
                                                            {% set checked = 'checked'%}
                                                            <input class=\" btn btn-xs btn-info\"  type=\"button\"   value=\"Paused\">
                                                    {%endif%}
                                                    
                                                 
                                                {%else%}
                                                    -
                                                {%endif%}
                                            </td> #}
                                        </tr>
                                        </tbody>
                                    {% endfor %}
                                </table>
                            {% else %}
                                    N/A
                            {% endif %}
                            </div>
                        </div>
\t\t\t\t
\t\t\t {%endif%}
\t\t\t
{#
\t\t\t  <div class=\"row\">
\t\t\t\t<!-- accepted payments column -->
\t\t\t\t<div class=\"col-xs-6\">
\t\t\t\t  <p class=\"lead\">Payment Methods:</p>
\t\t\t\t  <img src=\"../../dist/img/credit/visa.png\" alt=\"Visa\">
\t\t\t\t  <img src=\"../../dist/img/credit/mastercard.png\" alt=\"Mastercard\">
\t\t\t\t  <img src=\"../../dist/img/credit/american-express.png\" alt=\"American Express\">
\t\t\t\t  <img src=\"../../dist/img/credit/paypal2.png\" alt=\"Paypal\">

\t\t\t\t  <p class=\"text-muted well well-sm no-shadow\" style=\"margin-top: 10px;\">
\t\t\t\t\tEtsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
\t\t\t\t\tdopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
\t\t\t\t  </p>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-xs-6\">
\t\t\t\t  <p class=\"lead\">Amount Due 2/22/2014</p>

\t\t\t\t  <div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table\">
\t\t\t\t\t  <tbody><tr>
\t\t\t\t\t\t<th style=\"width:50%\">Subtotal:</th>
\t\t\t\t\t\t<td>\$250.30</td>
\t\t\t\t\t  </tr>
\t\t\t\t\t  <tr>
\t\t\t\t\t\t<th>Tax (9.3%)</th>
\t\t\t\t\t\t<td>\$10.34</td>
\t\t\t\t\t  </tr>
\t\t\t\t\t  <tr>
\t\t\t\t\t\t<th>Shipping:</th>
\t\t\t\t\t\t<td>\$5.80</td>
\t\t\t\t\t  </tr>
\t\t\t\t\t  <tr>
\t\t\t\t\t\t<th>Total:</th>
\t\t\t\t\t\t<td>\$265.24</td>
\t\t\t\t\t  </tr>
\t\t\t\t\t</tbody></table>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t
\t\t\t  <!-- this row will not appear when printing -->
\t\t\t  <div class=\"row no-print\">
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t  <a href=\"#\" onclick=\"printDivInvoice();\" class=\"btn btn-default\"><i class=\"fa fa-print\"></i> Print</a>
\t\t\t\t</div>
\t\t\t  </div> 
\t\t\t #}
\t\t\t <div class=\"row  no-print\">
\t\t\t \t<button class=\"btn btn-info\" onclick=\"window.print()\" ><i class=\"fa fa-print\"></i>Print</button>
\t\t\t </div>
\t\t\t</section>
\t\t\t
\t\t{%endif%}
</section>\t\t
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js %}
  <script>
\t\t  
        function add_days_to_order(order_id){
          var added_days = \$('#add_number_days').val();  
          \$.ajax({
                url : \"{{path('admin_orders_adddaystoorder')}}\",
                method : \"POST\",
                data : {'no_of_days_add':added_days,'order_master_id':order_id},
                success : function(data){
                        if(\$.trim(data) == 'done'){
                                alert('Days updated successfully');
                        }else{
                                alert('Somehing went wrong');\t\t\t\t
                        }
                },
                error : function(){
                        alert(\"Somehing went wrong\");
                }
        \t});

        }

        function expire_package_order(order_id){
          var expire_on_date = \$('#expire_package_on').val();  
          if(expire_on_date == '' || expire_on_date == null ){
          \talert(\"Please select proper Expire Package Date\");
          }
          else{
\t          \$.ajax({
\t                url : \"{{path('admin_orders_expireorderbeforedate')}}\",
\t                method : \"POST\",
\t                data : {'expire_on_date':expire_on_date,'order_master_id':order_id},
\t                success : function(data){
\t                        if(\$.trim(data) == 'done'){
\t                                alert('Package Expire , Please Refressh page ');
\t                        }else{
\t                                alert('Somehing went wrong');\t\t\t\t
\t                        }
\t                },
\t                error : function(){
\t                        alert(\"Somehing went wrong with error\");
\t                }
\t        \t});
\t      }

        }
\t   function pause_package_order(order_id){
\t          var pause_package_date = \$('#pause_package_on').val();  
\t          var resume_choice =  \$(\"input[name='resume_choice']:checked\").val() ; 
\t         
\t          if(pause_package_date == '' || pause_package_date == null ){
\t          \talert(\"Please select proper Expire Package Date\");
\t          }
\t          else{
\t\t          \$.ajax({
\t\t                url : \"{{path('admin_pause_singlepauseorder')}}\",
\t\t                method : \"POST\",
\t\t                data : {'pause_package_date':pause_package_date,'order_master_id':order_id,'resume_choice':resume_choice},
\t\t                success : function(data){
\t\t                        if(\$.trim(data) == 'Done'){
\t\t                                alert('Package Paused , Please Refressh page ');
\t\t                        }else if( \$.trim(data)  == 'pause_already'){
\t                                alert('Package already paused Earlier , First unpause it');\t\t\t\t
\t\t                        }else{
\t\t                                alert('Somehing went wrong');\t\t\t\t
\t\t                        }
\t\t                },
\t\t                error : function(){
\t\t                        alert(\"Somehing went wrong with error\");
\t\t                }
\t\t        \t});
\t\t      }

\t        }
\t  
\tfunction change_off_day(day_name,day_id,status,order_id){
\t\t
\t\t
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_changedayoffstatus')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day_master_id':day_id,'order_master_id':order_id,'status':status },
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\tfunction change_subscription_status(day_name,day_id,status,order_id,req_date){
\t\t
\t\t
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_changeordersubscription')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day_master_id':day_id,'order_master_id':order_id,'status':status,'req_date':req_date },
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

function assign_driver(element,order_master_id){
\t\t
\t\tvar driver = element.val();
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_assigndrivertoallorder')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'driver_id':driver},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Driver Assigned successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t
    \$(document).ready(function() {
\t\t\$('#datatable').DataTable();
\t\t
\t\t \$('.datepicker').datepicker({  
\t\t \tformat: 'yyyy-mm-dd',
\t\t \tstartDate: \"{{main_order.passeddate}}\",
\t\t \tendDate: \"{{main_order.end_date}}-1\",

\t\t \t });
\t\t \$('.datepickerpause').datepicker({  
\t\t \tformat: 'yyyy-mm-dd',
\t\t \tstartDate: \"{{main_order.passeddate}}\"
\t\t \t });
\t  
\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t  var divToPrint=document.getElementById('invoice');

\t  var newWin=window.open('','Print-Window');

\t  newWin.document.open();

\t  newWin.document.write(\"<html><body onload='window.print()'>\"+divToPrint.innerHTML);

\t  newWin.document.close();

\t  setTimeout(function(){newWin.close();},10);

\t}
\t\t
  </script>
{% endblock %}", "AdminBundle:Orders:vieworderwiseoffdays.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/vieworderwiseoffdays.html.twig");
    }
}
