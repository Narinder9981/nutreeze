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

/* AdminBundle:Area:index.html.twig */
class __TwigTemplate_c6d9e421e6673a052864b383542c5bf2e84db6dce5b142a5e9012ed670b93f4b extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Area:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Area:index.html.twig", 1);
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
\t\t  Area Listing
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
                        <h3 class=\"box-title\">Area</h3>
                        <a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_addarea", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Area</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t";
        // line 43
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 44
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 45
                echo "\t\t\t\t\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t\t\t<th>Delivery Charge</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th hidden></th>
\t\t\t\t\t\t\t\t<th>Operation</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 54
        if (((isset($context["area_list"]) || array_key_exists("area_list", $context)) &&  !twig_test_empty(($context["area_list"] ?? $this->getContext($context, "area_list"))))) {
            // line 55
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["area_list"] ?? $this->getContext($context, "area_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
                // line 56
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                // line 59
                if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["lan_index"] = 0;
                    // line 61
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 62
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 63
                        if (($this->getAttribute($context["area"], "lang_array", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["area"], "lang_array", [])))) {
                            // line 64
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 65
                            if (($this->getAttribute($this->getAttribute($context["area"], "lang_array", [], "any", false, true), ($context["lan_index"] ?? $this->getContext($context, "lan_index")), [], "array", true, true) && ($this->getAttribute($this->getAttribute($this->getAttribute($context["area"], "lang_array", []), ($context["lan_index"] ?? $this->getContext($context, "lan_index")), [], "array"), "language_id", []) == $this->getAttribute($context["language"], "language_master_id", [])))) {
                                // line 66
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["area"], "lang_array", []), ($context["lan_index"] ?? $this->getContext($context, "lan_index")), [], "array"), "area_name", []), "html", null, true);
                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 68
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 69
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["lan_index"] = (($context["lan_index"] ?? $this->getContext($context, "lan_index")) + 1);
                        // line 70
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 72
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 73
                echo "\t\t\t\t\t\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "delivery_charge", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 76
                $context["checked"] = "";
                // line 77
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["area"], "status", []) == "active")) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["checked"] = "checked";
                    // line 79
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "main_area_id", []), "html", null, true);
                echo ",\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td hidden>";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute($context["area"], "city_id", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_addarea", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method"), "main_area_id" => $this->getAttribute($context["area"], "main_area_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Area\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"";
                // line 87
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_deletearea", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method"), "main_area_id" => $this->getAttribute($context["area"], "main_area_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-title=\"Delete Area\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 92
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 93
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t";
        // line 96
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 97
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 98
                echo "\t\t\t\t\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 101
        echo "\t\t\t\t\t\t\t\t<th>Delivery Charge</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th hidden></th>
\t\t\t\t\t\t\t\t<th>Operation</th>
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

    // line 119
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 120
        echo "  <script>
  
\tfunction change_status(main_area_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_changeareastatus", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_area_id':main_area_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('done');
\t\t\t}
\t\t});
\t}
\t
\t
    \$(document).ready(function() {
      var dtable = \$('#datatable').DataTable();
\t  
    });
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Area:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 124,  334 => 120,  328 => 119,  305 => 101,  302 => 100,  293 => 98,  288 => 97,  286 => 96,  281 => 93,  278 => 92,  259 => 87,  254 => 85,  249 => 83,  240 => 80,  237 => 79,  234 => 78,  231 => 77,  229 => 76,  222 => 73,  219 => 72,  212 => 70,  209 => 69,  206 => 68,  200 => 66,  198 => 65,  195 => 64,  193 => 63,  190 => 62,  185 => 61,  182 => 60,  180 => 59,  175 => 57,  172 => 56,  154 => 55,  152 => 54,  144 => 48,  141 => 47,  132 => 45,  127 => 44,  125 => 43,  114 => 35,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Area Listing
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
                        <h3 class=\"box-title\">Area</h3>
                        <a href=\"{{ path('admin_area_addarea', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Area</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t\t\t<th>Name : {{ language.language_name }}</th>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t<th>Delivery Charge</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th hidden></th>
\t\t\t\t\t\t\t\t<th>Operation</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% if area_list is defined and area_list is not empty %}
\t\t\t\t\t\t\t\t\t{% for area in area_list %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ loop.index }}</td>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set lan_index = 0 %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if area.lang_array is defined and area.lang_array is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if area.lang_array[lan_index] is defined and area.lang_array[lan_index].language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ area.lang_array[lan_index].area_name }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set lan_index = lan_index+1 %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t<td>{{ area.delivery_charge }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{% if area.status == 'active'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status({{area.main_area_id}},\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td hidden>{{area.city_id}}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"{{ path('admin_area_addarea', {'domain': app.session.get('domain'),'main_area_id':area.main_area_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Area\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"{{path('admin_area_deletearea',{'domain':app.session.get('domain'),'main_area_id':area.main_area_id})}}\" data-toggle=\"tooltip\" data-title=\"Delete Area\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t\t\t<th>Name : {{ language.language_name }}</th>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t<th>Delivery Charge</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th hidden></th>
\t\t\t\t\t\t\t\t<th>Operation</th>
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
  
\tfunction change_status(main_area_id,status){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_area_changeareastatus',{domain:app.session.get('domain')})}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_area_id':main_area_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('done');
\t\t\t}
\t\t});
\t}
\t
\t
    \$(document).ready(function() {
      var dtable = \$('#datatable').DataTable();
\t  
    });
  </script>
{% endblock %}
", "AdminBundle:Area:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Area/index.html.twig");
    }
}
