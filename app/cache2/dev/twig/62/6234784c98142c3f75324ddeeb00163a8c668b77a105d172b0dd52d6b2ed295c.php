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

/* AdminBundle:Coupon:categorylist.html.twig */
class __TwigTemplate_691772b693b15001d5e207685e4807db41ada361284275e10f117b57818e1a39 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:categorylist.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:categorylist.html.twig", 1);
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
\t\t  Coupon Category List
\t\t</h1>
\t<!-- BREADCUMB -->
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
                        <h3 class=\"box-title\">Coupon Category</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_addcouponcategory");
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Category</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Coupon Category Name</th>
\t\t\t\t\t\t\t\t<th>Description</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Action</th>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 48
        if (((isset($context["coupon_category"]) || array_key_exists("coupon_category", $context)) &&  !twig_test_empty(($context["coupon_category"] ?? $this->getContext($context, "coupon_category"))))) {
            // line 49
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["coupon_category"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["coupon_category"]) {
                // line 50
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_category"], "coupon_category_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($context["coupon_category"], "description", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 54
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["coupon_category"], "status", [])), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_addcouponcategory", ["main_coupon_category_id" => $this->getAttribute($context["coupon_category"], "main_coupon_category_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Category\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 59
                echo "\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coupon_category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 63
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Coupon Category Name</th>
\t\t\t\t\t\t\t\t<th>Description</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Action</th>
\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t</table>
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

    // line 84
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 85
        echo "  <script>
    \$(document).ready(function() {
      \$('#datatable').DataTable();
    });
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Coupon:categorylist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 85,  220 => 84,  194 => 63,  191 => 62,  175 => 59,  170 => 56,  165 => 54,  161 => 53,  157 => 52,  153 => 51,  150 => 50,  132 => 49,  130 => 48,  113 => 34,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Coupon Category List
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
                        <h3 class=\"box-title\">Coupon Category</h3>
                        <a href=\"{{ path('admin_coupon_addcouponcategory') }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Category</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Coupon Category Name</th>
\t\t\t\t\t\t\t\t<th>Description</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Action</th>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% if coupon_category is defined and coupon_category is not empty %}
\t\t\t\t\t\t\t\t\t{% for coupon_category in coupon_category %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ loop.index }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ coupon_category.coupon_category_name }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ coupon_category.description }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ coupon_category.status | capitalize }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"{{ path('admin_coupon_addcouponcategory', {'main_coupon_category_id':coupon_category.main_coupon_category_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Category\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{# <a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"{{path('admin_country_deletecountry',{'country_id':country_details.main_country_id})}}\" data-toggle=\"tooltip\" data-title=\"Delete Country\"><i class=\"fa fa-trash\"></i></a> #}
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Coupon Category Name</th>
\t\t\t\t\t\t\t\t<th>Description</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Action</th>
\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t</table>
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

{% block js %}
  <script>
    \$(document).ready(function() {
      \$('#datatable').DataTable();
    });
  </script>
{% endblock %}
", "AdminBundle:Coupon:categorylist.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/categorylist.html.twig");
    }
}
