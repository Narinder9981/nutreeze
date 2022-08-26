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

/* AdminBundle:Coupon:addcoupon.html.twig */
class __TwigTemplate_e44f231a3907f955b2476d67a9b3d084fa9fbf2f3fcb3879c4321432fb8d9d83 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'css' => [$this, 'block_css'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:addcoupon.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:addcoupon.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Add Coupon
\t\t  <small></small>
\t\t</h1>
\t<!-- BREADCUMB -->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 19
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 21
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 25
            echo "            <div class=\"alert alert-danger alert-dismissable\">
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
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Coupon</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t";
        // line 45
        $context["coupon_master_id"] = 0;
        // line 46
        echo "\t\t\t\t\t\t";
        $context["coupon_name"] = "";
        // line 47
        echo "\t\t\t\t\t\t";
        $context["coupon_code"] = "";
        // line 48
        echo "\t\t\t\t\t\t";
        $context["no_of_users_use"] = "";
        // line 49
        echo "\t\t\t\t\t\t";
        $context["no_of_times_use"] = "";
        // line 50
        echo "\t\t\t\t\t\t";
        $context["start_date"] = "";
        // line 51
        echo "\t\t\t\t\t\t";
        $context["end_date"] = "";
        // line 52
        echo "\t\t\t\t\t\t";
        $context["discount_type"] = "";
        // line 53
        echo "\t\t\t\t\t\t";
        $context["discount_amount"] = "";
        // line 54
        echo "\t\t\t\t\t\t";
        $context["coupon_category_id"] = 0;
        // line 55
        echo "\t\t\t\t\t\t";
        $context["minimum_amount"] = 0;
        // line 56
        echo "\t\t\t\t\t\t";
        $context["status"] = "";
        // line 57
        echo "\t\t\t\t\t\t";
        $context["loyalty_points"] = 0;
        // line 58
        echo "\t\t\t\t\t\t";
        $context["media_url"] = "";
        // line 59
        echo "\t\t\t\t\t\t\t\t\t";
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_savecoupon");
        // line 60
        echo "\t\t\t\t\t\t\t\t\t";
        $context["product_name"] = "";
        // line 61
        echo "\t\t\t\t\t\t\t\t\t";
        $context["product_description"] = "";
        // line 62
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 63
        if (((isset($context["main_coupon"]) || array_key_exists("main_coupon", $context)) &&  !twig_test_empty(($context["main_coupon"] ?? $this->getContext($context, "main_coupon"))))) {
            // line 64
            echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["main_coupon"]);
            foreach ($context['_seq'] as $context["_key"] => $context["main_coupon"]) {
                // line 66
                echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 67
                $context["coupon_master_id"] = $this->getAttribute($context["main_coupon"], "coupon_master_id", []);
                // line 68
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["coupon_name"] = $this->getAttribute($context["main_coupon"], "coupon_name", []);
                // line 69
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["coupon_code"] = $this->getAttribute($context["main_coupon"], "coupon_code", []);
                // line 70
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["no_of_users_use"] = $this->getAttribute($context["main_coupon"], "no_of_users_use", []);
                // line 71
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["no_of_times_use"] = $this->getAttribute($context["main_coupon"], "no_of_times_use", []);
                // line 72
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["start_date"] = $this->getAttribute($context["main_coupon"], "start_date", []);
                // line 73
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["end_date"] = $this->getAttribute($context["main_coupon"], "end_date", []);
                // line 74
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["media_url"] = $this->getAttribute($context["main_coupon"], "media_url", []);
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["discount_type"] = $this->getAttribute($context["main_coupon"], "discount_type", []);
                // line 76
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["minimum_amount"] = $this->getAttribute($context["main_coupon"], "minimum_amount", []);
                // line 77
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["discount_amount"] = $this->getAttribute($context["main_coupon"], "discount_value", []);
                // line 78
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["coupon_category_id"] = $this->getAttribute($context["main_coupon"], "coupon_category_id", []);
                // line 79
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["loyalty_points"] = $this->getAttribute($context["main_coupon"], "loyalty_points", []);
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["status"] = $this->getAttribute($context["main_coupon"], "status", []);
                // line 81
                echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_coupon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "\t\t\t\t\t\t\t\t\t";
        }
        // line 84
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form\" class=\"form-horizontal\" method=\"post\" action=\"";
        // line 85
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"coupon_master_id\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, ($context["coupon_master_id"] ?? $this->getContext($context, "coupon_master_id")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"coupon_name\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, ($context["coupon_name"] ?? $this->getContext($context, "coupon_name")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Code</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"coupon_code\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, ($context["coupon_code"] ?? $this->getContext($context, "coupon_code")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>No of users use</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"no_of_users_use\" value=\"";
        // line 116
        echo twig_escape_filter($this->env, ($context["no_of_users_use"] ?? $this->getContext($context, "no_of_users_use")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>No of times use</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"no_of_times_use\" value=\"";
        // line 125
        echo twig_escape_filter($this->env, ($context["no_of_times_use"] ?? $this->getContext($context, "no_of_times_use")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"start_date\" value=\"";
        // line 137
        echo twig_escape_filter($this->env, ($context["start_date"] ?? $this->getContext($context, "start_date")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>End Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"end_date\" value=\"";
        // line 146
        echo twig_escape_filter($this->env, ($context["end_date"] ?? $this->getContext($context, "end_date")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Discount Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"discount_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">--select discount type--</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"amount\" ";
        // line 160
        if ((($context["discount_type"] ?? $this->getContext($context, "discount_type")) == "amount")) {
            echo "selected=\"selected\"";
        }
        echo ">Amount</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"percentage\" ";
        // line 161
        if ((($context["discount_type"] ?? $this->getContext($context, "discount_type")) == "percentage")) {
            echo "selected=\"selected\"";
        }
        echo ">Percentage</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Discount Amount</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"discount_amount\" value=\"";
        // line 171
        echo twig_escape_filter($this->env, ($context["discount_amount"] ?? $this->getContext($context, "discount_amount")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Category</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"coupon_category_id\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Coupon Category</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 185
        if (((isset($context["coupon_category"]) || array_key_exists("coupon_category", $context)) &&  !twig_test_empty(($context["coupon_category"] ?? $this->getContext($context, "coupon_category"))))) {
            // line 186
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_category"] ?? $this->getContext($context, "coupon_category")));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 187
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "main_coupon_category_id", []), "html", null, true);
                echo "\" ";
                if (($this->getAttribute($context["category"], "main_coupon_category_id", []) == ($context["coupon_category_id"] ?? $this->getContext($context, "coupon_category_id")))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "coupon_category_name", []), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 190
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Mininum Amount</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"minimum_amount\" value=\"";
        // line 199
        echo twig_escape_filter($this->env, ($context["minimum_amount"] ?? $this->getContext($context, "minimum_amount")), "html", null, true);
        echo "\" required />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 hide\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Loyalty Points</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"loyalty_points\" value=\"";
        // line 210
        echo twig_escape_filter($this->env, ($context["loyalty_points"] ?? $this->getContext($context, "loyalty_points")), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 218
        $context["active_check"] = "";
        // line 219
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        $context["inactive_check"] = "";
        // line 220
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        if ((($context["status"] ?? $this->getContext($context, "status")) == "active")) {
            // line 221
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context["active_check"] = "checked";
            // line 222
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 223
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        if ((($context["status"] ?? $this->getContext($context, "status")) == "inactive")) {
            // line 224
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context["inactive_check"] = "checked";
            // line 225
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"active\" ";
        // line 228
        echo twig_escape_filter($this->env, ($context["active_check"] ?? $this->getContext($context, "active_check")), "html", null, true);
        echo ">Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"inactive\" ";
        // line 231
        echo twig_escape_filter($this->env, ($context["inactive_check"] ?? $this->getContext($context, "inactive_check")), "html", null, true);
        echo ">Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t

\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 243
        if (((isset($context["coupon_master_id"]) || array_key_exists("coupon_master_id", $context)) &&  !twig_test_empty(($context["coupon_master_id"] ?? $this->getContext($context, "coupon_master_id"))))) {
            echo "Update";
        } else {
            echo "Save";
        }
        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t\t\t\t\t
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

    // line 266
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 267
        echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js\"></script>
<script src=\"";
        // line 268
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>

\tfunction remove_combo(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t}
\t
\tfunction add_combo(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\tconsole.log(element.parents('div').prev(\".first_one:last\").html());

\t\telement.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");
\t\t
/*\t\telemnt_last = element.parents('div').prev(\".first_one\");
\t\tconsole.log(elemnt_last.html());
\t\tvar html = element.parents('div').prev(\".first_one\").html(); 
\t\thtml = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"
\t\t
\t\telemnt_last.after(html).find(\"input[type='number']\").val(\"\");
\t\t//.find(\"input[type='number']\").val(\"\") */
\t}
\t
\t\$(function () {

\t\tif(\$('.first_one').length <= 2 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\t
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t\t
\t\t\$('.datepicker').datepicker({
\t\t\tformat : 'yyyy-mm-dd'
\t\t});
\t});\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Coupon:addcoupon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  543 => 268,  540 => 267,  534 => 266,  501 => 243,  486 => 231,  480 => 228,  473 => 225,  470 => 224,  467 => 223,  464 => 222,  461 => 221,  458 => 220,  455 => 219,  453 => 218,  442 => 210,  428 => 199,  417 => 190,  414 => 189,  399 => 187,  394 => 186,  392 => 185,  375 => 171,  360 => 161,  354 => 160,  337 => 146,  325 => 137,  310 => 125,  298 => 116,  283 => 104,  271 => 95,  260 => 87,  255 => 85,  252 => 84,  249 => 83,  242 => 81,  239 => 80,  236 => 79,  233 => 78,  230 => 77,  227 => 76,  224 => 75,  221 => 74,  218 => 73,  215 => 72,  212 => 71,  209 => 70,  206 => 69,  203 => 68,  201 => 67,  198 => 66,  194 => 65,  191 => 64,  189 => 63,  186 => 62,  183 => 61,  180 => 60,  177 => 59,  174 => 58,  171 => 57,  168 => 56,  165 => 55,  162 => 54,  159 => 53,  156 => 52,  153 => 51,  150 => 50,  147 => 49,  144 => 48,  141 => 47,  138 => 46,  136 => 45,  119 => 30,  110 => 27,  106 => 25,  101 => 24,  92 => 21,  88 => 19,  84 => 18,  77 => 14,  67 => 6,  61 => 5,  53 => 3,  47 => 2,  31 => 1,);
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
{%block css%}
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\">
{%endblock%}
{% block content %}
\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Add Coupon
\t\t  <small></small>
\t\t</h1>
\t<!-- BREADCUMB -->
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
                        <h3 class=\"box-title\">Add / Update Coupon</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t{% set coupon_master_id = 0 %}
\t\t\t\t\t\t{% set coupon_name = '' %}
\t\t\t\t\t\t{% set coupon_code = '' %}
\t\t\t\t\t\t{% set no_of_users_use = '' %}
\t\t\t\t\t\t{% set no_of_times_use = '' %}
\t\t\t\t\t\t{% set start_date = '' %}
\t\t\t\t\t\t{% set end_date = '' %}
\t\t\t\t\t\t{% set discount_type = '' %}
\t\t\t\t\t\t{% set discount_amount = '' %}
\t\t\t\t\t\t{% set coupon_category_id = 0 %}
\t\t\t\t\t\t{% set minimum_amount = 0 %}
\t\t\t\t\t\t{% set status = '' %}
\t\t\t\t\t\t{% set loyalty_points = 0 %}
\t\t\t\t\t\t{% set media_url = '' %}
\t\t\t\t\t\t\t\t\t{% set action = path('admin_coupon_savecoupon') %}
\t\t\t\t\t\t\t\t\t{% set product_name = '' %}
\t\t\t\t\t\t\t\t\t{% set product_description = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if main_coupon is defined and main_coupon is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for main_coupon in main_coupon %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set coupon_master_id = main_coupon.coupon_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set coupon_name = main_coupon.coupon_name %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set coupon_code = main_coupon.coupon_code %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set no_of_users_use = main_coupon.no_of_users_use %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set no_of_times_use = main_coupon.no_of_times_use %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set start_date = main_coupon.start_date %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set end_date = main_coupon.end_date %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set media_url = main_coupon.media_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set discount_type = main_coupon.discount_type %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set minimum_amount = main_coupon.minimum_amount %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set discount_amount = main_coupon.discount_value %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set coupon_category_id = main_coupon.coupon_category_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set loyalty_points = main_coupon.loyalty_points %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set status = main_coupon.status %}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"coupon_master_id\" value=\"{{ coupon_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"coupon_name\" value=\"{{coupon_name}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Code</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"coupon_code\" value=\"{{coupon_code}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>No of users use</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"no_of_users_use\" value=\"{{no_of_users_use}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>No of times use</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"no_of_times_use\" value=\"{{no_of_times_use}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"start_date\" value=\"{{start_date}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>End Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"end_date\" value=\"{{end_date}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Discount Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"discount_type\" class=\"form-control\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">--select discount type--</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"amount\" {%if discount_type == 'amount'%}selected=\"selected\"{%endif%}>Amount</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"percentage\" {%if discount_type == 'percentage'%}selected=\"selected\"{%endif%}>Percentage</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Discount Amount</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"discount_amount\" value=\"{{discount_amount}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Category</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"coupon_category_id\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Coupon Category</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if coupon_category is defined and coupon_category is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for category in coupon_category %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ category.main_coupon_category_id }}\" {% if category.main_coupon_category_id == coupon_category_id %}selected{% endif %}>{{ category.coupon_category_name }}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Mininum Amount</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"minimum_amount\" value=\"{{minimum_amount}}\" required />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6 hide\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Loyalty Points</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"loyalty_points\" value=\"{{loyalty_points}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{% set active_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{% set inactive_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{% if status == 'active'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set active_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t{% if status == 'inactive'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set inactive_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"active\" {{active_check}}>Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"inactive\" {{inactive_check}}>Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t

\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if coupon_master_id is defined and coupon_master_id is not empty %}Update{%else%}Save{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t\t\t\t\t
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
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js\"></script>
<script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

<script>

\tfunction remove_combo(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t}
\t
\tfunction add_combo(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\tconsole.log(element.parents('div').prev(\".first_one:last\").html());

\t\telement.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");
\t\t
/*\t\telemnt_last = element.parents('div').prev(\".first_one\");
\t\tconsole.log(elemnt_last.html());
\t\tvar html = element.parents('div').prev(\".first_one\").html(); 
\t\thtml = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"
\t\t
\t\telemnt_last.after(html).find(\"input[type='number']\").val(\"\");
\t\t//.find(\"input[type='number']\").val(\"\") */
\t}
\t
\t\$(function () {

\t\tif(\$('.first_one').length <= 2 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\t
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t\t
\t\t\$('.datepicker').datepicker({
\t\t\tformat : 'yyyy-mm-dd'
\t\t});
\t});\t
\t
</script>\t
{% endblock %}", "AdminBundle:Coupon:addcoupon.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/addcoupon.html.twig");
    }
}
