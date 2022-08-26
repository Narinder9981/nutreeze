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

/* AdminBundle:Pause:pausepackage.html.twig */
class __TwigTemplate_bf75aad66c39e8aaf4f68145e69b36de2488071161c096d421f55d4df2e0b938 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Pause:pausepackage.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Pause:pausepackage.html.twig", 1);
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
\t\t  Pause Package and Orders
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
                        <h3 class=\"box-title\">Pause Package  [ Package name :  ";
        // line 34
        echo twig_escape_filter($this->env, ($context["package_name"] ?? $this->getContext($context, "package_name")), "html", null, true);
        echo " ] </h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<form id=\"form-\" class=\"form-horizontal\" method=\"post\" action=\"";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pause_savepausepackage");
        echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, ($context["main_package_master_id"] ?? $this->getContext($context, "main_package_master_id")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Pause Start Date</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control datepicker\" type=\"textbox\" name=\"pause_start_date\" value=\"\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2 hide\">
\t\t\t\t\t\t\t\t\t\t\t<label>Pause End Date</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2 hide\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control datepicker\" type=\"textbox\" name=\"pause_end_date\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t<label>Resume Choice</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" name=\"resume_choice\" value=\"admin\"  required / >Admin Selection
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" name=\"resume_choice\" value=\"customer\" required  / >Customer Choice
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-success\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tPause Package
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 87
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_index");
        echo "\" ><button type=\"button\" name=\"cancel\" class=\"btn btn-danger\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-backward\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tBack
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button></a>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t <div class=\"box-body table-responsive\">
                         <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>                              
                            <th>Pause start date</th>
                            <th>Pause end date</th>
                            <th>Resume Choice</th>
                            <th>Pause at</th>
                            <th>Orders</th>
                            <th>View Pause Orders</th>
                            </thead>
                            <tbody>
                                ";
        // line 116
        if (((isset($context["pause_package_history"]) || array_key_exists("pause_package_history", $context)) &&  !twig_test_empty(($context["pause_package_history"] ?? $this->getContext($context, "pause_package_history"))))) {
            // line 117
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pause_package_history"] ?? $this->getContext($context, "pause_package_history")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["packages"]) {
                // line 118
                echo "                                        <tr>
                                            <td>";
                // line 119
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>                                            
                                            <td>";
                // line 120
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "pause_start_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 121
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "pause_end_date", []), "html", null, true);
                echo "</td>
                                            <td>By ";
                // line 122
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "resume_choice", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 123
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "pause_updated_date", []), "html", null, true);
                echo "</td>
                                            <td>";
                // line 124
                echo twig_escape_filter($this->env, $this->getAttribute($context["packages"], "affected_orders", []), "html", null, true);
                echo "</td>
                                            <td><a target=\"_blank\" href=\"";
                // line 125
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_pause_pausepackageorders", ["main_package_id" => ($context["main_package_master_id"] ?? $this->getContext($context, "main_package_master_id")), "pause_package_history_id" => $this->getAttribute($context["packages"], "pause_package_history_id", [])]), "html", null, true);
                echo "\"><button type=\"button\" name=\"getorders\" class=\"btn btn-info btn-xs\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-shopping-cart\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tView Pause Orders
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button></a></td>
                                        </tr>
                                       
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['packages'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "                                ";
        }
        // line 134
        echo "                            </tbody>
                            <tfoot>
                           <th>No</th>                              
                                                     
                            <th>Pause start date</th>
                            <th>Pause end date</th>
                            <th>Resume Choice</th>
                            <th>Pause at</th>
                            <th>Orders</th>
                            <th>View Pause Orders</th>
                            </tfoot>
                        </table>
                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t
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

    // line 160
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 161
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>
\t\$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
\t  \$('#list').DataTable();
\t\$(document).ready(function() {
      \$('#list').DataTable();
//\t\t\t\$('.datepicker').datepicker();
    });\t
\t
\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Pause:pausepackage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  316 => 161,  310 => 160,  279 => 134,  276 => 133,  254 => 125,  250 => 124,  246 => 123,  242 => 122,  238 => 121,  234 => 120,  230 => 119,  227 => 118,  209 => 117,  207 => 116,  175 => 87,  128 => 43,  123 => 41,  113 => 34,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Pause Package and Orders
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
                        <h3 class=\"box-title\">Pause Package  [ Package name :  {{package_name}} ] </h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<form id=\"form-\" class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_pause_savepausepackage')}}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"{{ main_package_master_id }}\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t<label>Pause Start Date</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control datepicker\" type=\"textbox\" name=\"pause_start_date\" value=\"\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2 hide\">
\t\t\t\t\t\t\t\t\t\t\t<label>Pause End Date</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2 hide\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control datepicker\" type=\"textbox\" name=\"pause_end_date\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t<label>Resume Choice</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" name=\"resume_choice\" value=\"admin\"  required / >Admin Selection
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" class=\"radio-inline\" name=\"resume_choice\" value=\"customer\" required  / >Customer Choice
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-success\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tPause Package
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{path('admin_package_index')}}\" ><button type=\"button\" name=\"cancel\" class=\"btn btn-danger\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-backward\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tBack
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button></a>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t\t<hr>
\t\t\t\t\t\t <div class=\"box-body table-responsive\">
                         <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>                              
                            <th>Pause start date</th>
                            <th>Pause end date</th>
                            <th>Resume Choice</th>
                            <th>Pause at</th>
                            <th>Orders</th>
                            <th>View Pause Orders</th>
                            </thead>
                            <tbody>
                                {%if pause_package_history is defined and pause_package_history is not empty%}
                                    {%for packages in pause_package_history%}
                                        <tr>
                                            <td>{{loop.index}}</td>                                            
                                            <td>{{packages.pause_start_date}}</td>
                                            <td>{{packages.pause_end_date}}</td>
                                            <td>By {{packages.resume_choice}}</td>
                                            <td>{{packages.pause_updated_date}}</td>
                                            <td>{{packages.affected_orders}}</td>
                                            <td><a target=\"_blank\" href=\"{{path('admin_pause_pausepackageorders',{'main_package_id':main_package_master_id,'pause_package_history_id':packages.pause_package_history_id})}}\"><button type=\"button\" name=\"getorders\" class=\"btn btn-info btn-xs\" value=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-shopping-cart\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\tView Pause Orders
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</button></a></td>
                                        </tr>
                                       
                                    {%endfor%}
                                {%endif%}
                            </tbody>
                            <tfoot>
                           <th>No</th>                              
                                                     
                            <th>Pause start date</th>
                            <th>Pause end date</th>
                            <th>Resume Choice</th>
                            <th>Pause at</th>
                            <th>Orders</th>
                            <th>View Pause Orders</th>
                            </tfoot>
                        </table>
                    </div>
\t\t\t\t\t\t\t\t\t\t\t\t
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
<script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

<script>
\t\$('.datepicker').datepicker({  format: 'yyyy-mm-dd', });
\t  \$('#list').DataTable();
\t\$(document).ready(function() {
      \$('#list').DataTable();
//\t\t\t\$('.datepicker').datepicker();
    });\t
\t
\t
\t
</script>\t
{% endblock %}", "AdminBundle:Pause:pausepackage.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Pause/pausepackage.html.twig");
    }
}
