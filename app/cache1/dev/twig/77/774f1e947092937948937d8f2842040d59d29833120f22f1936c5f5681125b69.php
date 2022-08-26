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

/* AdminBundle:Coupon:addcouponcategory.html.twig */
class __TwigTemplate_3d33cc1ad349f0652cca3a5698c4f0c82a76e16b054fcc2c6cd408ee4d7e8c29 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:addcouponcategory.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:addcouponcategory.html.twig", 1);
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
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Add/Edit Coupon Category
\t\t</h1>
\t<!-- BREADCMB -->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
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
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Coupon Category</h3>
\t\t\t\t\t\t<a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_country_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t";
        // line 41
        $context["main_coupon_category_id"] = 0;
        // line 42
        echo "\t\t\t\t\t\t\t";
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_savecouponcategory");
        // line 43
        echo "\t\t\t\t\t\t\t";
        $context["coupon_category_name"] = "";
        // line 44
        echo "\t\t\t\t\t\t\t";
        $context["description"] = "";
        // line 45
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
        // line 46
        if (((isset($context["coupon_category"]) || array_key_exists("coupon_category", $context)) &&  !twig_test_empty(($context["coupon_category"] ?? $this->getContext($context, "coupon_category"))))) {
            // line 47
            echo "\t\t\t\t\t\t\t\t";
            $context["main_coupon_category_id"] = $this->getAttribute(($context["coupon_category"] ?? $this->getContext($context, "coupon_category")), "main_coupon_category_id", []);
            // line 48
            echo "\t\t\t\t\t\t\t\t";
            $context["coupon_category_name"] = $this->getAttribute(($context["coupon_category"] ?? $this->getContext($context, "coupon_category")), "coupon_category_name", []);
            // line 49
            echo "\t\t\t\t\t\t\t\t";
            $context["description"] = $this->getAttribute(($context["coupon_category"] ?? $this->getContext($context, "coupon_category")), "description", []);
            // line 50
            echo "\t\t\t\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<form id=\"form-1\" class=\"form-horizontal\" method=\"post\" action=\"";
        // line 52
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_coupon_category_id\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, ($context["main_coupon_category_id"] ?? $this->getContext($context, "main_coupon_category_id")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Category Name</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"coupon_category_name\" name=\"coupon_category_name\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["coupon_category_name"] ?? $this->getContext($context, "coupon_category_name")), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Description</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control\" id=\"description\" name=\"description\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, ($context["description"] ?? $this->getContext($context, "description")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["description"] ?? $this->getContext($context, "description")), "html", null, true);
        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Coupon:addcouponcategory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 73,  169 => 62,  158 => 54,  153 => 52,  150 => 51,  147 => 50,  144 => 49,  141 => 48,  138 => 47,  136 => 46,  133 => 45,  130 => 44,  127 => 43,  124 => 42,  122 => 41,  112 => 34,  102 => 26,  93 => 23,  89 => 21,  84 => 20,  75 => 17,  71 => 15,  67 => 14,  60 => 10,  51 => 3,  45 => 2,  29 => 1,);
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
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Add/Edit Coupon Category
\t\t</h1>
\t<!-- BREADCMB -->
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
                        <h3 class=\"box-title\">Add / Update Coupon Category</h3>
\t\t\t\t\t\t<a href=\"{{ path('admin_country_index', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t{% set main_coupon_category_id = 0 %}
\t\t\t\t\t\t\t{% set action = path('admin_coupon_savecouponcategory') %}
\t\t\t\t\t\t\t{% set coupon_category_name = '' %}
\t\t\t\t\t\t\t{% set description = '' %}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t{% if coupon_category is defined and coupon_category is not empty %}
\t\t\t\t\t\t\t\t{% set main_coupon_category_id = coupon_category.main_coupon_category_id %}
\t\t\t\t\t\t\t\t{% set coupon_category_name = coupon_category.coupon_category_name %}
\t\t\t\t\t\t\t\t{% set description = coupon_category.description %}
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<form id=\"form-1\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_coupon_category_id\" value=\"{{ main_coupon_category_id }}\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Coupon Category Name</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"coupon_category_name\" name=\"coupon_category_name\" value=\"{{ coupon_category_name }}\" required>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Description</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control\" id=\"description\" name=\"description\" value=\"{{description}}\">{{ description }}</textarea>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>
{% endblock %}", "AdminBundle:Coupon:addcouponcategory.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/addcouponcategory.html.twig");
    }
}
