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

/* AdminBundle:Orders:vieworder.html.twig */
class __TwigTemplate_62c2d5b3800b3f4fc9a61e6cdca307b6ba72839bd0d17fb6a73e98194f8a0bef extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:vieworder.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:vieworder.html.twig", 1);
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
            echo "\t\t\t<section class=\"invoice\" id=\"invoice\"> 
\t\t\t  <!-- title row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t  <h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-globe\"></i> Anona
\t\t\t\t\t<small class=\"pull-right\">Date: ";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "created_date", []), "d-m-Y"), "html", null, true);
            echo "</small>
\t\t\t\t  </h2>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- info row -->
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Customer Details</b> </br>
\t\t\t\t\t";
            // line 54
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_image", []) != "")) {
                // line 55
                echo "
\t\t\t\t\t\t<img src=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_image", []), "html", null, true);
                echo "\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
";
                // line 61
                echo "\t\t\t\t\t";
            } else {
                // line 63
                echo "\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/images/no_img.png"), "html", null, true);
                echo "\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />\t
";
                // line 65
                echo "\t\t\t\t\t";
            }
            // line 66
            echo "\t\t\t\t\t</br>
\t\t\t\t\t<b>Name</b> : ";
            // line 67
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_firstname", []) . " ") . $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_lastname", [])), "html", null, true);
            echo "\t</br>
\t\t\t\t\t<b>Unique Id </b> : ";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "unique_user_id", []), "html", null, true);
            echo "\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Delivery Address Details</b></br>
\t\t\t\t\t<address>
\t\t\t\t\t";
            // line 74
            if (($this->getAttribute(($context["main_order"] ?? null), "order_address_details", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_address_details", [])))) {
                // line 75
                echo "\t\t\t\t\t\t";
                $context["del_addr"] = $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_address_details", []);
                // line 76
                echo "\t\t\t\t\t\t\tArea : ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "area_name", []), "html", null, true);
                echo "</br>
\t\t\t\t\t\t\tBlock : ";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "address_name", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\t\tStreet : ";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "street", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\t\tAvenue : ";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "address_name2", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\t\tHouse No : ";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "flate_house_number", []), "html", null, true);
                echo "</br>
\t\t\t\t\t\t\t";
                // line 81
                if (($this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "flat_no", []) != 0)) {
                    // line 82
                    echo "\t\t\t\t\t\t\tFlat No : ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "flat_no", []), "html", null, true);
                    echo "</br>
\t\t\t\t\t\t\t";
                }
                // line 84
                echo "\t\t\t\t\t\t\t";
                if (($this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "landmark", []) != 0)) {
                    // line 85
                    echo "\t\t\t\t\t\t\tFloor No : ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "landmark", []), "html", null, true);
                    echo "</br>
\t\t\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t\t\tDirections : ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["del_addr"] ?? $this->getContext($context, "del_addr")), "society_building_name", []), "html", null, true);
                echo ",</br>
\t\t\t\t\t\t\tContact no : ";
                // line 88
                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "user_mobile", []), "html", null, true);
                echo "</br>
\t\t\t\t\t\t";
            }
            // line 90
            echo "
\t\t\t\t\t";
            // line 91
            if (($this->getAttribute(($context["main_order"] ?? null), "time_title", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "time_title", [])))) {
                // line 92
                echo "\t\t\t\t\tDelivery Time : ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "time_title", []), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "delivery_start", []), "h:i a"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "delivery_end", []), "h:i a"), "html", null, true);
                echo " ) </br>
\t\t\t\t\t";
            }
            // line 94
            echo "\t\t\t\t\t";
            if (($this->getAttribute(($context["main_order"] ?? null), "delivery_method_name", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "delivery_method_name", [])))) {
                // line 95
                echo "\t\t\t\t\tDelivery Method : ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "delivery_method_name", []), "html", null, true);
                echo "</br>
\t\t\t\t\t";
            }
            // line 97
            echo "</address>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col no-print\">
\t\t\t\t\t<b>Order No : ";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "unique_no", []), "html", null, true);
            echo "</b></br></br>
\t\t\t\t\t";
            // line 102
            if (((isset($context["drivers"]) || array_key_exists("drivers", $context)) && twig_test_empty(($context["drivers"] ?? $this->getContext($context, "drivers"))))) {
                echo " *Note : There is no Driver belongs to this order's Area</br>";
            }
            // line 103
            echo "\t\t\t\t\tAssign Driver :
\t\t\t\t\t<select class=\"form-control\" onchange=\"assign_driver(\$(this),'";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
            echo "')\">
\t\t\t\t\t\t<option>
\t\t\t\t\t\t\tSelect Driver
\t\t\t\t\t\t</option>
\t\t\t\t\t\t";
            // line 108
            if (((isset($context["drivers"]) || array_key_exists("drivers", $context)) &&  !twig_test_empty(($context["drivers"] ?? $this->getContext($context, "drivers"))))) {
                // line 109
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["drivers"] ?? $this->getContext($context, "drivers")));
                foreach ($context['_seq'] as $context["_key"] => $context["driver"]) {
                    // line 110
                    echo "\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["driver"], "user_master_id", []), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "driver_id", []) == $this->getAttribute($context["driver"], "user_master_id", []))) {
                        echo " selected ";
                    }
                    echo " >
\t\t\t\t\t\t\t\t\t";
                    // line 111
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["driver"], "user_firstname", []) . " ") . $this->getAttribute($context["driver"], "user_lastname", [])), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['driver'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 114
                echo "\t\t\t\t\t\t";
            }
            // line 115
            echo "\t\t\t\t\t</select>
\t\t\t\t\t<br>
\t\t\t\t\t<b>Order Note : </b><br> 
\t\t\t\t\t<select class=\"form-control\" onchange=\"assign_note(\$(this),'";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
            echo "')\">
\t\t\t\t\t\t<option>
\t\t\t\t\t\t\tChange Order Note
\t\t\t\t\t\t</option>
\t\t\t\t\t\t";
            // line 122
            if (((isset($context["order_notes"]) || array_key_exists("order_notes", $context)) &&  !twig_test_empty(($context["order_notes"] ?? $this->getContext($context, "order_notes"))))) {
                // line 123
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["order_notes"] ?? $this->getContext($context, "order_notes")));
                foreach ($context['_seq'] as $context["_key"] => $context["order_note"]) {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_note"], "main_order_note_id", []), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_note_id", []) == $this->getAttribute($context["order_note"], "main_order_note_id", []))) {
                        echo " selected ";
                    }
                    echo " >
\t\t\t\t\t\t\t\t\t";
                    // line 125
                    echo twig_escape_filter($this->env, $this->getAttribute($context["order_note"], "order_note_text", []), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_note'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "\t\t\t\t\t\t";
            }
            // line 129
            echo "\t\t\t\t\t</select>
\t\t\t\t\t<br>
\t\t\t\t\t<b>Delivery Time : </b><br> 
\t\t\t\t\t<select class=\"form-control\" onchange=\"change_delivery_time(\$(this),'";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
            echo "')\">
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 134
            if (((isset($context["delivery_time_list"]) || array_key_exists("delivery_time_list", $context)) &&  !twig_test_empty(($context["delivery_time_list"] ?? $this->getContext($context, "delivery_time_list"))))) {
                // line 135
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["delivery_time_list"] ?? $this->getContext($context, "delivery_time_list")));
                foreach ($context['_seq'] as $context["_key"] => $context["delivery_time"]) {
                    // line 136
                    echo "\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["delivery_time"], "main_time_slot_master_id", []), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "delivery_time_id", []) == $this->getAttribute($context["delivery_time"], "main_time_slot_master_id", []))) {
                        echo " selected ";
                    }
                    echo " >
\t\t\t\t\t\t\t\t\t";
                    // line 137
                    echo twig_escape_filter($this->env, $this->getAttribute($context["delivery_time"], "title", []), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["delivery_time"], "start_time", []), "h:i a"), "html", null, true);
                    echo " - ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["delivery_time"], "end_time", []), "h:i a"), "html", null, true);
                    echo " )
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['delivery_time'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 140
                echo "\t\t\t\t\t\t";
            }
            // line 141
            echo "\t\t\t\t\t</select>

\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t  </br>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<b>Off Days in Package : </b>
\t\t\t\t\t\t";
            // line 151
            if (((isset($context["offDays"]) || array_key_exists("offDays", $context)) &&  !twig_test_empty(($context["offDays"] ?? $this->getContext($context, "offDays"))))) {
                // line 152
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["offDays"]);
                foreach ($context['_seq'] as $context["_key"] => $context["offDays"]) {
                    // line 153
                    echo "\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["offDays"], "days_name", []), "html", null, true);
                    echo " , 
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['offDays'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 155
                echo "\t\t\t\t\t\t";
            } else {
                // line 156
                echo "\t\t\t\t\t\t\tN/A
\t\t\t\t\t\t";
            }
            // line 158
            echo "\t\t\t\t\t\t</br>
\t\t\t\t\t\t<b>Remaining Days : </b>
\t\t\t\t\t\t";
            // line 160
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "remaining_days", []), "html", null, true);
            echo " 
\t\t\t\t\t\t</br>
\t\t\t\t\t\t<b>Remaining Days from daily event [ testing purpose display ] : </b>
\t\t\t\t\t\t";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "remaining_days_from_function", []), "html", null, true);
            echo " 
\t\t\t\t\t\t\t
\t\t\t\t\t</div>
";
            // line 176
            echo "
\t\t\t\t</div>
</br>
\t\t\t  <!-- Table row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">
\t\t\t\t  <table class=\"table table-striped\">
\t\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>Package Name [ Sub Package ]</th>
\t\t\t\t\t  <th>Calories</th>
\t\t\t\t\t  <th>Order start date</th>
\t\t\t\t\t  <th>Order end date</th>
\t\t\t\t\t  <th class=\"no-print\">Payment Status</th>
\t\t\t\t\t  <th class=\"no-print\" >Transaction Id</th>
\t\t\t\t\t  <th class=\"no-print\" >Order Status</th>
\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t<tr>

\t\t\t\t\t\t\t\t";
            // line 197
            $context["label_class1"] = "";
            // line 198
            echo "                ";
            $context["payment_status"] = "";
            // line 199
            echo "\t\t\t\t\t\t\t\t";
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "payment_status", []) == "success")) {
                // line 200
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-success";
                // line 201
                echo "                      ";
                $context["payment_status"] = "success";
                // line 202
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 203
            echo "\t\t\t\t\t\t\t\t";
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "payment_status", []) == "pending")) {
                // line 204
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-warning";
                // line 205
                echo "                    ";
                $context["payment_status"] = "pending";
                // line 206
                echo "\t\t\t\t\t\t\t\t";
            }
            echo "\t

\t\t\t\t\t\t\t\t";
            // line 208
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_status", []) == "cancel")) {
                // line 209
                echo "\t\t\t\t\t\t\t\t\t";
                $context["label_class1"] = "label-danger";
                // line 210
                echo "\t\t\t\t\t\t\t\t\t";
                $context["payment_status"] = "Transaction Cancel";
                // line 211
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 212
            echo "
                      <td>";
            // line 213
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "package_name", []), "html", null, true);
            echo " <i> [ ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "sub_package_name", []), "html", null, true);
            echo " ] </i></td>
\t\t\t\t\t  <td>";
            // line 214
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "sub_package_calories", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td>";
            // line 215
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "start_date", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td>";
            // line 216
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "end_date", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td class=\"no-print\" ><label class=\"label ";
            // line 217
            echo twig_escape_filter($this->env, ($context["label_class1"] ?? $this->getContext($context, "label_class1")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["payment_status"] ?? $this->getContext($context, "payment_status")), "html", null, true);
            echo "</label>\t</td>
\t\t\t\t\t  <td class=\"no-print\" >";
            // line 218
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "transaction_code", []), "html", null, true);
            echo "</td>
\t\t\t\t\t  <td class=\"no-print\" >
\t\t\t\t\t\t<select id=\"order_status\" class=\"form-control\" onchange=\"change_status('";
            // line 220
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
            echo "',\$(this))\" disabled>
\t\t\t\t\t\t";
            // line 221
            if (((isset($context["status_name"]) || array_key_exists("status_name", $context)) &&  !twig_test_empty(($context["status_name"] ?? $this->getContext($context, "status_name"))))) {
                // line 222
                echo "\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["status_name"]);
                foreach ($context['_seq'] as $context["_key"] => $context["status_name"]) {
                    // line 223
                    echo "\t\t\t\t\t\t\t\t<option value=\"";
                    echo twig_escape_filter($this->env, $context["status_name"], "html", null, true);
                    echo "\" ";
                    if (($context["status_name"] == $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_status", []))) {
                        echo " selected";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["status_name"]), "html", null, true);
                    echo "</option>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 225
                echo "\t\t\t\t\t\t";
            }
            // line 226
            echo "\t\t\t\t\t\t</select>\t\t\t\t\t  
\t\t\t\t\t  </td>
\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t  </table>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t\t";
            // line 235
            $context["upgradePriceTotal"] = 0;
            // line 236
            echo "\t\t\t  ";
            if (((isset($context["upgradeDetails"]) || array_key_exists("upgradeDetails", $context)) &&  !twig_test_empty(($context["upgradeDetails"] ?? $this->getContext($context, "upgradeDetails"))))) {
                // line 237
                echo "\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Upgrade History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade From</th>
\t\t\t\t\t\t\t\t\t\t<th>Created Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Total Price</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade Details</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
                // line 251
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["upgradeDetails"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["upgradeDetails"]) {
                    // line 252
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["upgradePriceTotal"] = (($context["upgradePriceTotal"] ?? $this->getContext($context, "upgradePriceTotal")) + $this->getAttribute($context["upgradeDetails"], "upgradePrice", []));
                    // line 253
                    echo "
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 255
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 256
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["upgradeDetails"], "start_date_from", []), "d-m-Y"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 257
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["upgradeDetails"], "created_on", []), "d-m-Y"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 258
                    echo twig_escape_filter($this->env, $this->getAttribute($context["upgradeDetails"], "upgradePrice", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t";
                    // line 260
                    if (($this->getAttribute($context["upgradeDetails"], "meal_types_added", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["upgradeDetails"], "meal_types_added", [])))) {
                        // line 261
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["upgradeDetails"], "meal_types_added", []));
                        foreach ($context['_seq'] as $context["_key"] => $context["meal_type"]) {
                            // line 262
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<b>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "product_category_name", []), "html", null, true);
                            echo " : </b> ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "total_meal_type", []), "html", null, true);
                            echo " * ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "price", []), "html", null, true);
                            echo " (Unit * Price) for ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "days", []), "html", null, true);
                            echo " Days 
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_type'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 264
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 265
                    echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upgradeDetails'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 268
                echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 273
            echo "                                ";
            if (((isset($context["upgradeGramArray"]) || array_key_exists("upgradeGramArray", $context)) &&  !twig_test_empty(($context["upgradeGramArray"] ?? $this->getContext($context, "upgradeGramArray"))))) {
                // line 274
                echo "                                    <div class=\"row\">
\t\t\t\t\t<h4>Package Gram Upgrade History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade From</th>
\t\t\t\t\t\t\t\t\t\t<th>Created Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgraded Gram</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgraded Gram Price</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
                // line 288
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["upgradeGramArray"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["upgradeGramArray"]) {
                    // line 289
                    echo "\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 292
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 293
                    echo twig_escape_filter($this->env, $this->getAttribute($context["upgradeGramArray"], "start_from_date", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 294
                    echo twig_escape_filter($this->env, $this->getAttribute($context["upgradeGramArray"], "created_datetime", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 295
                    echo twig_escape_filter($this->env, $this->getAttribute($context["upgradeGramArray"], "package_gram", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 296
                    echo twig_escape_filter($this->env, $this->getAttribute($context["upgradeGramArray"], "package_gram_price", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upgradeGramArray'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 302
                echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                                ";
            }
            // line 307
            echo "\t\t\t\t
\t\t\t  ";
            // line 308
            if (((isset($context["suspendHistory"]) || array_key_exists("suspendHistory", $context)) &&  !twig_test_empty(($context["suspendHistory"] ?? $this->getContext($context, "suspendHistory"))))) {
                // line 309
                echo "\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Suspension History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th>Crated Datetime</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
                // line 322
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["suspendHistory"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["suspendHistory"]) {
                    // line 323
                    echo "
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 325
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 326
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["suspendHistory"], "start_date", []), "d-m-Y"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 327
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["suspendHistory"], "end_date", []), "d-m-Y"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 328
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["suspendHistory"], "created_datetime", []), "d-m-Y H:i:s"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t";
                    // line 331
                    if (($this->getAttribute(($context["upgradeDetails"] ?? null), "meal_types_added", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["upgradeDetails"] ?? $this->getContext($context, "upgradeDetails")), "meal_types_added", [])))) {
                        // line 332
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["upgradeDetails"] ?? $this->getContext($context, "upgradeDetails")), "meal_types_added", []));
                        foreach ($context['_seq'] as $context["_key"] => $context["meal_type"]) {
                            // line 333
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t<b>";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "product_category_name", []), "html", null, true);
                            echo " : </b> ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "total_meal_type", []), "html", null, true);
                            echo " * ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "price", []), "html", null, true);
                            echo " (Unit * Price) for ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["meal_type"], "days", []), "html", null, true);
                            echo " Days 
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_type'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 335
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 336
                    echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['suspendHistory'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 339
                echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 344
            echo "
\t\t\t\t";
            // line 345
            if (((isset($context["pauseHistory"]) || array_key_exists("pauseHistory", $context)) &&  !twig_test_empty(($context["pauseHistory"] ?? $this->getContext($context, "pauseHistory"))))) {
                // line 346
                echo "\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Pause History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th>Resume Choice</th>
\t\t\t\t\t\t\t\t\t\t<th>Crated Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Notes</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
                // line 361
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["pauseHistory"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["pauseHistory"]) {
                    // line 362
                    echo "
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 364
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 365
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["pauseHistory"], "pause_start_date", []), "d-m-Y"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 366
                    if ((null === $this->getAttribute($context["pauseHistory"], "pause_end_date", []))) {
                        echo " - ";
                    } else {
                        echo " ";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["pauseHistory"], "pause_end_date", []), "d-m-Y"), "html", null, true);
                        echo " ";
                    }
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>By ";
                    // line 367
                    echo twig_escape_filter($this->env, $this->getAttribute($context["pauseHistory"], "resume_choice", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
                    // line 368
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["pauseHistory"], "pause_created_datetime", []), "d-m-Y H:i:s"), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td>";
                    // line 370
                    echo twig_escape_filter($this->env, $this->getAttribute($context["pauseHistory"], "comment_log", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pauseHistory'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 374
                echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 379
            echo "\t\t\t\t
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t";
            // line 388
            echo "\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col text-right\">
\t\t\t\t\t<h3>Order Payment Details</h3></br>
\t\t\t\t\t<b>Package  : </b>";
            // line 395
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "package_amount", []), "html", null, true);
            echo "</br>
\t\t\t\t\t<b>Promo Discount : </b>";
            // line 396
            echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "promo_code_discount", []), "html", null, true);
            echo "</br>
\t\t\t\t\t";
            // line 397
            if ((($context["upgradePriceTotal"] ?? $this->getContext($context, "upgradePriceTotal")) != 0)) {
                // line 398
                echo "\t\t\t\t\t<b>Total Upgrade Price : </b> ";
                echo twig_escape_filter($this->env, ($context["upgradePriceTotal"] ?? $this->getContext($context, "upgradePriceTotal")), "html", null, true);
                echo " </br>
\t\t\t\t\t";
            }
            // line 400
            echo "
\t\t\t\t\t<b>Total amount : </b>";
            // line 401
            echo twig_escape_filter($this->env, ($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "payment_amount", []) + ($context["upgradePriceTotal"] ?? $this->getContext($context, "upgradePriceTotal"))), "html", null, true);
            echo "</br>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>\t\t\t  

";
            // line 457
            echo "\t\t\t <div class=\"row  no-print\">
\t\t\t \t<button class=\"btn btn-info\" onclick=\"window.print()\" ><i class=\"fa fa-print\"></i>Print</button>
\t\t\t
\t\t\t \t";
            // line 460
            if (($this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_status", []) != "cancel")) {
                echo " <button class=\"btn btn-danger\" onclick=\"cancel_order(";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["main_order"] ?? $this->getContext($context, "main_order")), "order_master_id", []), "html", null, true);
                echo ");\" ><i class=\"fa fa-cancel\"></i>Cancel Order</button> ";
            }
            // line 461
            echo "\t\t\t </div>
\t\t\t</section>
\t\t\t
\t\t";
        }
        // line 465
        echo "</section>\t\t
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 471
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 472
        echo "  <script>
\t\t  

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
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
function cancel_order(order_master_id){\t\t
   var r=confirm(\"Are you sure?\")
   if (r==true)
   {
    \$.ajax({
            url : \"";
        // line 500
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_cancelorderupdate");
        echo "\",
            method : \"POST\",
            data : {'order_master_id':order_master_id},
            success : function(data){
                    if(\$.trim(data) == 'true'){
                            alert('Status updated successfully');
                            location.reload();
                    }else{
                            alert('Somehing went wrong');\t\t\t\t
                    }
            },
            error : function(){
                    alert(\"Somehing went wrong\");
            }
    });
    }
}        

function assign_driver(element,order_master_id){
\t\t
\t\tvar driver = element.val();
\t\t\$.ajax({
\t\t\turl : \"";
        // line 522
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assigndrivertoallorder");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'driver_id':driver},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Driver Assigned successfully');
\t\t\t\t}else{
\t\t\t\t\t//alert('Somehing went wrong');\t\t\t\t
\t\t\t\t\talert('User has not added any meal for any date , Please add it first , then you can assign driver from here');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\tfunction assign_note(element,order_master_id){
\t\t
\t\tvar note = element.val();
\t\t\$.ajax({
\t\t\turl : \"";
        // line 542
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assignnote");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'note_id':note},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Note Added successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t} //
\tfunction change_delivery_time(element,order_master_id){
\t\t
\t\tvar time = element.val();
\t\t\$.ajax({
\t\t\turl : \"";
        // line 561
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_changedeliverytime");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'time_id':time},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Delivery Time Updated successfully');
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
        return "AdminBundle:Orders:vieworder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1149 => 561,  1127 => 542,  1104 => 522,  1079 => 500,  1049 => 472,  1043 => 471,  1032 => 465,  1026 => 461,  1020 => 460,  1015 => 457,  1007 => 401,  1004 => 400,  998 => 398,  996 => 397,  992 => 396,  988 => 395,  979 => 388,  974 => 379,  967 => 374,  949 => 370,  944 => 368,  940 => 367,  930 => 366,  926 => 365,  922 => 364,  918 => 362,  901 => 361,  884 => 346,  882 => 345,  879 => 344,  872 => 339,  856 => 336,  853 => 335,  838 => 333,  833 => 332,  831 => 331,  825 => 328,  821 => 327,  817 => 326,  813 => 325,  809 => 323,  792 => 322,  777 => 309,  775 => 308,  772 => 307,  765 => 302,  745 => 296,  741 => 295,  737 => 294,  733 => 293,  729 => 292,  724 => 289,  707 => 288,  691 => 274,  688 => 273,  681 => 268,  665 => 265,  662 => 264,  647 => 262,  642 => 261,  640 => 260,  635 => 258,  631 => 257,  627 => 256,  623 => 255,  619 => 253,  616 => 252,  599 => 251,  583 => 237,  580 => 236,  578 => 235,  567 => 226,  564 => 225,  549 => 223,  544 => 222,  542 => 221,  538 => 220,  533 => 218,  527 => 217,  523 => 216,  519 => 215,  515 => 214,  509 => 213,  506 => 212,  503 => 211,  500 => 210,  497 => 209,  495 => 208,  489 => 206,  486 => 205,  483 => 204,  480 => 203,  477 => 202,  474 => 201,  471 => 200,  468 => 199,  465 => 198,  463 => 197,  440 => 176,  434 => 163,  428 => 160,  424 => 158,  420 => 156,  417 => 155,  408 => 153,  403 => 152,  401 => 151,  389 => 141,  386 => 140,  373 => 137,  364 => 136,  359 => 135,  357 => 134,  352 => 132,  347 => 129,  344 => 128,  335 => 125,  326 => 124,  321 => 123,  319 => 122,  312 => 118,  307 => 115,  304 => 114,  295 => 111,  286 => 110,  281 => 109,  279 => 108,  272 => 104,  269 => 103,  265 => 102,  261 => 101,  255 => 97,  249 => 95,  246 => 94,  236 => 92,  234 => 91,  231 => 90,  226 => 88,  221 => 87,  215 => 85,  212 => 84,  206 => 82,  204 => 81,  200 => 80,  196 => 79,  192 => 78,  188 => 77,  183 => 76,  180 => 75,  178 => 74,  169 => 68,  165 => 67,  162 => 66,  159 => 65,  154 => 63,  151 => 61,  147 => 56,  144 => 55,  142 => 54,  130 => 45,  122 => 39,  120 => 38,  117 => 37,  115 => 36,  112 => 35,  103 => 32,  99 => 30,  94 => 29,  85 => 26,  81 => 24,  77 => 23,  70 => 19,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t\t  <!-- title row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t  <h2 class=\"page-header\">
\t\t\t\t\t<i class=\"fa fa-globe\"></i> Anona
\t\t\t\t\t<small class=\"pull-right\">Date: {{main_order.created_date | date('d-m-Y')}}</small>
\t\t\t\t  </h2>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- info row -->
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Customer Details</b> </br>
\t\t\t\t\t{%if main_order.user_image != ''%}

\t\t\t\t\t\t<img src=\"{{main_order.user_image}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
{#}
\t\t\t\t\t\t<a href=\"{{main_order.user_image}}\" data-fancybox=\"gallery\">\t
\t\t\t\t\t\t\t<img src=\"{{main_order.user_image}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />
\t\t\t\t\t\t</a> #}
\t\t\t\t\t{%else%}
{#\t\t\t\t\t\t<a href=\"{{asset('bundles/design/images/no_img.png')}}\" data-fancybox=\"gallery\"\">
#}\t\t\t\t\t\t\t<img src=\"{{asset('bundles/design/images/no_img.png')}}\" class='img-thumbnail img-responsive' style=\"height:50px;width:50px\" />\t
{#}\t\t\t\t\t\t</a>\t#}
\t\t\t\t\t{%endif%}
\t\t\t\t\t</br>
\t\t\t\t\t<b>Name</b> : {{main_order.user_firstname ~' '~ main_order.user_lastname}}\t</br>
\t\t\t\t\t<b>Unique Id </b> : {{main_order.unique_user_id}}\t
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t  <b>Delivery Address Details</b></br>
\t\t\t\t\t<address>
\t\t\t\t\t{%if main_order.order_address_details is defined and main_order.order_address_details is not empty%}
\t\t\t\t\t\t{% set del_addr = main_order.order_address_details%}
\t\t\t\t\t\t\tArea : {{del_addr.area_name}}</br>
\t\t\t\t\t\t\tBlock : {{del_addr.address_name}},</br>
\t\t\t\t\t\t\tStreet : {{del_addr.street}},</br>
\t\t\t\t\t\t\tAvenue : {{del_addr.address_name2}},</br>
\t\t\t\t\t\t\tHouse No : {{del_addr.flate_house_number}}</br>
\t\t\t\t\t\t\t{% if del_addr.flat_no != 0 %}
\t\t\t\t\t\t\tFlat No : {{del_addr.flat_no}}</br>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% if del_addr.landmark != 0 %}
\t\t\t\t\t\t\tFloor No : {{del_addr.landmark}}</br>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\tDirections : {{del_addr.society_building_name}},</br>
\t\t\t\t\t\t\tContact no : {{main_order.user_mobile}}</br>
\t\t\t\t\t\t{% endif %}

\t\t\t\t\t{% if main_order.time_title is defined and main_order.time_title is not empty %}
\t\t\t\t\tDelivery Time : {{main_order.time_title}} ({{ main_order.delivery_start | date ('h:i a') }} - {{ main_order.delivery_end | date ('h:i a')}} ) </br>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if main_order.delivery_method_name is defined and main_order.delivery_method_name is not empty %}
\t\t\t\t\tDelivery Method : {{main_order.delivery_method_name}}</br>
\t\t\t\t\t{% endif %}
</address>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col no-print\">
\t\t\t\t\t<b>Order No : {{main_order.unique_no}}</b></br></br>
\t\t\t\t\t{%if drivers is defined and drivers is empty%} *Note : There is no Driver belongs to this order's Area</br>{% endif %}
\t\t\t\t\tAssign Driver :
\t\t\t\t\t<select class=\"form-control\" onchange=\"assign_driver(\$(this),'{{main_order.order_master_id}}')\">
\t\t\t\t\t\t<option>
\t\t\t\t\t\t\tSelect Driver
\t\t\t\t\t\t</option>
\t\t\t\t\t\t{%if drivers is defined and drivers is not empty%}
\t\t\t\t\t\t\t{%for driver in drivers%}
\t\t\t\t\t\t\t\t<option value=\"{{driver.user_master_id}}\" {% if main_order.driver_id == driver.user_master_id %} selected {% endif %} >
\t\t\t\t\t\t\t\t\t{{driver.user_firstname ~' '~ driver.user_lastname}}
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t{%endif%}
\t\t\t\t\t</select>
\t\t\t\t\t<br>
\t\t\t\t\t<b>Order Note : </b><br> 
\t\t\t\t\t<select class=\"form-control\" onchange=\"assign_note(\$(this),'{{main_order.order_master_id}}')\">
\t\t\t\t\t\t<option>
\t\t\t\t\t\t\tChange Order Note
\t\t\t\t\t\t</option>
\t\t\t\t\t\t{%if order_notes is defined and order_notes is not empty%}
\t\t\t\t\t\t\t{%for order_note in order_notes%}
\t\t\t\t\t\t\t\t<option value=\"{{order_note.main_order_note_id}}\" {% if main_order.order_note_id == order_note.main_order_note_id %} selected {% endif %} >
\t\t\t\t\t\t\t\t\t{{order_note.order_note_text}}
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t{%endif%}
\t\t\t\t\t</select>
\t\t\t\t\t<br>
\t\t\t\t\t<b>Delivery Time : </b><br> 
\t\t\t\t\t<select class=\"form-control\" onchange=\"change_delivery_time(\$(this),'{{main_order.order_master_id}}')\">
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t{%if delivery_time_list is defined and delivery_time_list is not empty%}
\t\t\t\t\t\t\t{%for delivery_time in delivery_time_list%}
\t\t\t\t\t\t\t\t<option value=\"{{delivery_time.main_time_slot_master_id}}\" {% if main_order.delivery_time_id == delivery_time.main_time_slot_master_id %} selected {% endif %} >
\t\t\t\t\t\t\t\t\t{{delivery_time.title}} ({{ delivery_time.start_time | date ('h:i a') }} - {{ delivery_time.end_time | date ('h:i a')}} )
\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t{%endif%}
\t\t\t\t\t</select>

\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t  </br>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<b>Off Days in Package : </b>
\t\t\t\t\t\t{% if offDays is defined and offDays is not empty %}
\t\t\t\t\t\t\t{% for offDays  in offDays %}
\t\t\t\t\t\t\t\t{{offDays.days_name}} , 
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\tN/A
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</br>
\t\t\t\t\t\t<b>Remaining Days : </b>
\t\t\t\t\t\t{{main_order.remaining_days}} 
\t\t\t\t\t\t</br>
\t\t\t\t\t\t<b>Remaining Days from daily event [ testing purpose display ] : </b>
\t\t\t\t\t\t{{main_order.remaining_days_from_function}} 
\t\t\t\t\t\t\t
\t\t\t\t\t</div>
{#\t\t\t\t\t
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<b>Delivery Time Notes</b></br>
\t\t\t\t\t\t{{ main_order.delivery_time_notes }}
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<b>Delivery Method Notes</b></br>
\t\t\t\t\t\t{{ main_order.delivery_method_notes }}
\t\t\t\t\t</div>
#}

\t\t\t\t</div>
</br>
\t\t\t  <!-- Table row -->
\t\t\t  <div class=\"row\">
\t\t\t\t<div class=\"col-xs-12 table-responsive\">
\t\t\t\t  <table class=\"table table-striped\">
\t\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t  <th>Package Name [ Sub Package ]</th>
\t\t\t\t\t  <th>Calories</th>
\t\t\t\t\t  <th>Order start date</th>
\t\t\t\t\t  <th>Order end date</th>
\t\t\t\t\t  <th class=\"no-print\">Payment Status</th>
\t\t\t\t\t  <th class=\"no-print\" >Transaction Id</th>
\t\t\t\t\t  <th class=\"no-print\" >Order Status</th>
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

                      <td>{{main_order.package_name}} <i> [ {{main_order.sub_package_name}} ] </i></td>
\t\t\t\t\t  <td>{{main_order.sub_package_calories}}</td>
\t\t\t\t\t  <td>{{main_order.start_date}}</td>
\t\t\t\t\t  <td>{{main_order.end_date}}</td>
\t\t\t\t\t  <td class=\"no-print\" ><label class=\"label {{label_class1}}\">{{payment_status}}</label>\t</td>
\t\t\t\t\t  <td class=\"no-print\" >{{main_order.transaction_code}}</td>
\t\t\t\t\t  <td class=\"no-print\" >
\t\t\t\t\t\t<select id=\"order_status\" class=\"form-control\" onchange=\"change_status('{{main_order.order_master_id}}',\$(this))\" disabled>
\t\t\t\t\t\t{% if status_name is defined and status_name is not empty %}
\t\t\t\t\t\t\t{% for status_name in status_name %}
\t\t\t\t\t\t\t\t<option value=\"{{status_name}}\" {% if status_name == main_order.order_status %} selected{%endif%}>{{status_name | capitalize}}</option>
\t\t\t\t\t\t\t{% endfor%}
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</select>\t\t\t\t\t  
\t\t\t\t\t  </td>
\t\t\t\t\t</tr>
\t\t\t\t\t</tbody>
\t\t\t\t  </table>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>
\t\t\t  <!-- /.row -->
\t\t\t\t{% set upgradePriceTotal = 0 %}
\t\t\t  {% if upgradeDetails is defined and upgradeDetails is not empty %}
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Upgrade History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade From</th>
\t\t\t\t\t\t\t\t\t\t<th>Created Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Total Price</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade Details</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% for upgradeDetails in upgradeDetails %}
\t\t\t\t\t\t\t\t\t{% set upgradePriceTotal = upgradePriceTotal + upgradeDetails.upgradePrice %}

\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeDetails.start_date_from | date('d-m-Y') }}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeDetails.created_on | date('d-m-Y') }}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeDetails.upgradePrice}}</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t{% if upgradeDetails.meal_types_added is defined and upgradeDetails.meal_types_added is not empty %}
\t\t\t\t\t\t\t\t\t\t\t{% for meal_type in upgradeDetails.meal_types_added %}
\t\t\t\t\t\t\t\t\t\t\t\t<b>{{meal_type.product_category_name}} : </b> {{meal_type.total_meal_type}} * {{meal_type.price}} (Unit * Price) for {{meal_type.days}} Days 
\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
                                {%if upgradeGramArray is defined and upgradeGramArray is not empty %}
                                    <div class=\"row\">
\t\t\t\t\t<h4>Package Gram Upgrade History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgrade From</th>
\t\t\t\t\t\t\t\t\t\t<th>Created Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgraded Gram</th>
\t\t\t\t\t\t\t\t\t\t<th>Upgraded Gram Price</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% for upgradeGramArray in upgradeGramArray %}
\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeGramArray.start_from_date }}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeGramArray.created_datetime }}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeGramArray.package_gram }}</td>
\t\t\t\t\t\t\t\t\t<td>{{upgradeGramArray.package_gram_price}}</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                                {%endif%}
\t\t\t\t
\t\t\t  {% if suspendHistory is defined and suspendHistory is not empty %}
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Suspension History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th>Crated Datetime</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% for suspendHistory in suspendHistory %}

\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t\t\t<td>{{suspendHistory.start_date | date('d-m-Y') }}</td>
\t\t\t\t\t\t\t\t\t<td>{{suspendHistory.end_date | date('d-m-Y') }}</td>
\t\t\t\t\t\t\t\t\t<td>{{suspendHistory.created_datetime | date('d-m-Y H:i:s') }}</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t{% if upgradeDetails.meal_types_added is defined and upgradeDetails.meal_types_added is not empty %}
\t\t\t\t\t\t\t\t\t\t\t{% for meal_type in upgradeDetails.meal_types_added %}
\t\t\t\t\t\t\t\t\t\t\t\t<b>{{meal_type.product_category_name}} : </b> {{meal_type.total_meal_type}} * {{meal_type.price}} (Unit * Price) for {{meal_type.days}} Days 
\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t{% endif %}

\t\t\t\t{% if pauseHistory is defined and pauseHistory is not empty %}
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h4>Package Pause History</h4>
\t\t\t\t\t\t<div class=\"col-md-12 table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-striped\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t\t\t<th>From</th>
\t\t\t\t\t\t\t\t\t\t<th>To</th>
\t\t\t\t\t\t\t\t\t\t<th>Resume Choice</th>
\t\t\t\t\t\t\t\t\t\t<th>Crated Datetime</th>
\t\t\t\t\t\t\t\t\t\t<th>Notes</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% for pauseHistory in pauseHistory %}

\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t\t\t<td>{{pauseHistory.pause_start_date | date('d-m-Y') }}</td>
\t\t\t\t\t\t\t\t\t<td>{%if pauseHistory.pause_end_date is null %} - {%else%} {{pauseHistory.pause_end_date | date('d-m-Y') }} {%endif%}</td>
\t\t\t\t\t\t\t\t\t<td>By {{pauseHistory.resume_choice}}</td>
\t\t\t\t\t\t\t\t\t<td>{{pauseHistory.pause_created_datetime | date('d-m-Y H:i:s') }}</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td>{{pauseHistory.comment_log}}</td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t\t
\t\t\t  <div class=\"row invoice-info\">
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t{#\t<h3>Order Includes</h3>
\t\t\t\t\t{%if main_order.order_include is defined and main_order.order_include is not empty %}
\t\t\t\t\t\t{%for includes_data in main_order.order_include%}
\t\t\t\t\t\t\t{{loop.index}} : {{includes_data.name}}</br>
\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t{%endif%} #}
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col\">
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t\t<div class=\"col-sm-4 invoice-col text-right\">
\t\t\t\t\t<h3>Order Payment Details</h3></br>
\t\t\t\t\t<b>Package  : </b>{{main_order.package_amount}}</br>
\t\t\t\t\t<b>Promo Discount : </b>{{main_order.promo_code_discount}}</br>
\t\t\t\t\t{% if upgradePriceTotal != 0 %}
\t\t\t\t\t<b>Total Upgrade Price : </b> {{upgradePriceTotal}} </br>
\t\t\t\t\t{% endif %}

\t\t\t\t\t<b>Total amount : </b>{{main_order.payment_amount + upgradePriceTotal}}</br>
\t\t\t\t</div>
\t\t\t\t<!-- /.col -->
\t\t\t  </div>\t\t\t  

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
\t\t\t
\t\t\t \t{%if main_order.order_status != 'cancel' %} <button class=\"btn btn-danger\" onclick=\"cancel_order({{main_order.order_master_id}});\" ><i class=\"fa fa-cancel\"></i>Cancel Order</button> {%endif%}
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

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
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
function cancel_order(order_master_id){\t\t
   var r=confirm(\"Are you sure?\")
   if (r==true)
   {
    \$.ajax({
            url : \"{{path('admin_orders_cancelorderupdate')}}\",
            method : \"POST\",
            data : {'order_master_id':order_master_id},
            success : function(data){
                    if(\$.trim(data) == 'true'){
                            alert('Status updated successfully');
                            location.reload();
                    }else{
                            alert('Somehing went wrong');\t\t\t\t
                    }
            },
            error : function(){
                    alert(\"Somehing went wrong\");
            }
    });
    }
}        

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
\t\t\t\t\t//alert('Somehing went wrong');\t\t\t\t
\t\t\t\t\talert('User has not added any meal for any date , Please add it first , then you can assign driver from here');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}
\tfunction assign_note(element,order_master_id){
\t\t
\t\tvar note = element.val();
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_assignnote')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'note_id':note},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Note Added successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t} //
\tfunction change_delivery_time(element,order_master_id){
\t\t
\t\tvar time = element.val();
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_changedeliverytime')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'time_id':time},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Delivery Time Updated successfully');
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
{% endblock %}", "AdminBundle:Orders:vieworder.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/vieworder.html.twig");
    }
}
