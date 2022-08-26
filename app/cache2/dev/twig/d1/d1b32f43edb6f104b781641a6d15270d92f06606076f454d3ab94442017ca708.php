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

/* AdminBundle:Coupon:index.html.twig */
class __TwigTemplate_2536e8899764fb7211131b97471e615e9ef545a7ce041dad9e98cf28cdbc25c8 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:index.html.twig", 1);
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
.filter-category {
    padding: 10px;
    border: 1px solid #e2e2e2;
    border-radius: 4px;
}
</style>
\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Coupon Listing
\t\t</h1>
\t<!-- BREADCUMB -->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "            <div class=\"alert alert-success alert-dismissable\">
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
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 28
            echo "            <div class=\"alert alert-danger alert-dismissable\">
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
        echo "\t\t
\t<div class=\"box-header\">
\t\t<a href=\"";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_addcoupon");
        echo "\" class=\"btn btn-sm btn-primary btn-flat pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Coupon</a>
\t</div>
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
\t\t\t<div class=\"box-header hide \">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-12 \">
\t\t\t\t\t\t<form class=\"\" method=\"post\">
\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"main_coupon_category_id\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Select Coupon Category</option>
\t\t\t\t\t\t\t\t\t";
        // line 47
        if (((isset($context["coupon_category"]) || array_key_exists("coupon_category", $context)) &&  !twig_test_empty(($context["coupon_category"] ?? $this->getContext($context, "coupon_category"))))) {
            // line 48
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_category"] ?? $this->getContext($context, "coupon_category")));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                echo "\t
\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "main_coupon_category_id", []), "html", null, true);
                echo "\" ";
                if ((($context["main_coupon_category_id"] ?? $this->getContext($context, "main_coupon_category_id")) == $this->getAttribute($context["category"], "main_coupon_category_id", []))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "coupon_category_name", []), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "\t\t\t\t\t\t\t\t\t";
        }
        // line 52
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" class=\"btn btn-primary btn-flat\" value=\"Filter\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<hr />
          \t<div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Coupon Name</th>
\t\t\t\t<th>Coupon Code</th>
\t\t\t\t";
        // line 69
        echo "\t\t\t\t<th>No Of users use</th>
\t\t\t\t<th>No Of times use</th>
\t\t\t\t";
        // line 72
        echo "\t\t\t\t<th>Status</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
\t\t\t  ";
        // line 76
        if (( !twig_test_empty(($context["coupon_details"] ?? $this->getContext($context, "coupon_details"))) && (isset($context["coupon_details"]) || array_key_exists("coupon_details", $context)))) {
            // line 77
            echo "\t\t\t    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["coupon_details"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["coupon_details"]) {
                // line 78
                echo "                <tr>
\t\t\t\t\t<td>";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_details"], "coupon_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_details"], "coupon_code", []), "html", null, true);
                echo "</td>
\t\t\t\t\t";
                // line 83
                echo "\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_details"], "no_of_users_use", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_details"], "no_of_times_use", []), "html", null, true);
                echo "</td>
\t\t\t\t\t";
                // line 88
                echo "\t\t\t\t\t<td>
\t\t\t\t\t\t";
                // line 89
                $context["checked"] = "";
                // line 90
                echo "\t\t\t\t\t\t";
                if (($this->getAttribute($context["coupon_details"], "status", []) == "active")) {
                    // line 91
                    echo "\t\t\t\t\t\t\t\t";
                    $context["checked"] = "checked";
                    // line 92
                    echo "\t\t\t\t\t\t";
                }
                // line 93
                echo "\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_details"], "coupon_master_id", []), "html", null, true);
                echo ",\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/>

\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_addcoupon", ["main_coupon_id" => $this->getAttribute($context["coupon_details"], "coupon_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t<a href=\"";
                // line 98
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_deletecoupon", ["main_coupon_id" => $this->getAttribute($context["coupon_details"], "coupon_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t
\t\t\t\t\t\t<a href=\"";
                // line 99
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_couponreport", ["main_coupon_id" => $this->getAttribute($context["coupon_details"], "coupon_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-bitbucket\"><i class=\"fa fa-bar-chart\"></i>&nbsp;Report</a>\t\t\t\t\t\t\t
\t\t\t\t\t\t";
                // line 105
                echo "\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coupon_details'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "\t\t\t  ";
        }
        // line 109
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Coupon Name</th>
\t\t\t\t<th>Coupon Code</th>
\t\t\t\t";
        // line 115
        echo "\t\t\t\t<th>No Of users use</th>
\t\t\t\t<th>No Of times use</th>
\t\t\t\t";
        // line 118
        echo "\t\t\t\t<th>Status</th>\t\t\t\t
\t\t\t\t<th>Operation</th>\t\t\t\t
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
\t
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 134
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 135
        echo "  <script>
  
\tfunction change_status(main_coupon_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 139
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_changecouponstatus");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_coupon_id':main_coupon_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('done');
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Coupon:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  326 => 139,  320 => 135,  314 => 134,  293 => 118,  289 => 115,  282 => 109,  279 => 108,  263 => 105,  259 => 99,  255 => 98,  251 => 97,  241 => 93,  238 => 92,  235 => 91,  232 => 90,  230 => 89,  227 => 88,  223 => 84,  218 => 83,  214 => 81,  210 => 80,  206 => 79,  203 => 78,  185 => 77,  183 => 76,  177 => 72,  173 => 69,  155 => 52,  152 => 51,  138 => 49,  131 => 48,  129 => 47,  114 => 35,  110 => 33,  101 => 30,  97 => 28,  92 => 27,  83 => 24,  79 => 22,  75 => 21,  68 => 17,  52 => 3,  46 => 2,  30 => 1,);
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
.filter-category {
    padding: 10px;
    border: 1px solid #e2e2e2;
    border-radius: 4px;
}
</style>
\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Coupon Listing
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
\t<div class=\"box-header\">
\t\t<a href=\"{{path('admin_coupon_addcoupon')}}\" class=\"btn btn-sm btn-primary btn-flat pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Coupon</a>
\t</div>
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
\t\t\t<div class=\"box-header hide \">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-12 \">
\t\t\t\t\t\t<form class=\"\" method=\"post\">
\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"main_coupon_category_id\">
\t\t\t\t\t\t\t\t\t<option value=\"\">Select Coupon Category</option>
\t\t\t\t\t\t\t\t\t{% if coupon_category is defined and coupon_category is not empty %}
\t\t\t\t\t\t\t\t\t\t{% for category in coupon_category %}\t
\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ category.main_coupon_category_id }}\" {% if main_coupon_category_id == category.main_coupon_category_id %}selected{% endif %}>{{ category.coupon_category_name }}</option>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t<input type=\"submit\" name=\"submit\" class=\"btn btn-primary btn-flat\" value=\"Filter\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<hr />
          \t<div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Coupon Name</th>
\t\t\t\t<th>Coupon Code</th>
\t\t\t\t{#<th>Loyalty points</th>#}
\t\t\t\t<th>No Of users use</th>
\t\t\t\t<th>No Of times use</th>
\t\t\t\t{# <th>Category Name</th> #}
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
\t\t\t  {%if coupon_details is not empty and coupon_details is defined%}
\t\t\t    {%for coupon_details in coupon_details%}
                <tr>
\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t<td>{{coupon_details.coupon_name}}</td>
\t\t\t\t\t<td>{{coupon_details.coupon_code}}</td>
\t\t\t\t\t{#<td>{{coupon_details.loyalty_points}}</td>#}
\t\t\t\t\t<td>{{coupon_details.no_of_users_use}}</td>
\t\t\t\t\t<td>{{coupon_details.no_of_times_use}}</td>
\t\t\t\t\t{#<td>
\t\t\t\t\t\t<label class=\"btn btn-xs btn-bitbucket btn-flat\">{{coupon_details.coupon_category_name}}</label>
\t\t\t\t\t</td>#}
\t\t\t\t\t<td>
\t\t\t\t\t\t{% set checked = ''%}
\t\t\t\t\t\t{% if coupon_details.status == 'active'%}
\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status({{coupon_details.coupon_master_id}},\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>

\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{path('admin_coupon_addcoupon',{'main_coupon_id':coupon_details.coupon_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t<a href=\"{{path('admin_coupon_deletecoupon',{'main_coupon_id':coupon_details.coupon_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t
\t\t\t\t\t\t<a href=\"{{path('admin_coupon_couponreport',{'main_coupon_id':coupon_details.coupon_master_id})}}\" class=\"btn btn-xs btn-bitbucket\"><i class=\"fa fa-bar-chart\"></i>&nbsp;Report</a>\t\t\t\t\t\t\t
\t\t\t\t\t\t{# 
\t\t\t\t\t\t\t<a href=\"{{path('admin_coupon_sendmailtousers',{'main_coupon_id':coupon_details.coupon_master_id})}}\" class=\"btn btn-xs btn-warning\" onclick=\"return confirm('Are you sure want to send Mail ? ')\"><i class=\"fa fa-email\">Send Mail</i></a>

\t\t\t\t\t\t\t
\t\t\t\t\t\t#}
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t{%endfor%}
\t\t\t  {%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Coupon Name</th>
\t\t\t\t<th>Coupon Code</th>
\t\t\t\t{#<th>Loyalty points</th>#}
\t\t\t\t<th>No Of users use</th>
\t\t\t\t<th>No Of times use</th>
\t\t\t\t{# <th>Category Name</th> #}
\t\t\t\t<th>Status</th>\t\t\t\t
\t\t\t\t<th>Operation</th>\t\t\t\t
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
\t
\t\t
\t</section>
<!----------- PAGE HEADER : END ----------------------------------------------------------->
<!----------- Main content : START ----------------------------------------------------------->
\t
{% endblock %}

{% block js %}
  <script>
  
\tfunction change_status(main_coupon_id,status){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_coupon_changecouponstatus')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_coupon_id':main_coupon_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('done');
\t\t\t}
\t\t});
\t}
\t
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
  </script>
{% endblock %}
", "AdminBundle:Coupon:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/index.html.twig");
    }
}
