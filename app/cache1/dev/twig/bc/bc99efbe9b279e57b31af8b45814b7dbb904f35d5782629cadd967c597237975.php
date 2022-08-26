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

/* AdminBundle:Festival:addfestival.html.twig */
class __TwigTemplate_b5fe954563271f8e15b707fc8cb6ba02fd230237ef2790dfbca103518b499dec extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Festival:addfestival.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Festival:addfestival.html.twig", 1);
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
\t\t\tAdd - Update Festival
\t\t</h1>
\t<!------- BREADCUMB --------------------->
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
                        <h3 class=\"box-title\">Add / Update Festival</h3>
                        <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 41
        echo "\t\t\t\t\t\t";
        // line 45
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t";
        // line 48
        echo "\t\t\t\t\t\t";
        $context["festival_master_id"] = 0;
        // line 49
        echo "\t\t\t\t\t\t\t";
        // line 50
        echo "\t\t\t\t\t\t\t\t";
        // line 51
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 52
        $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_savefestival", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]);
        // line 53
        echo "\t\t\t\t\t\t\t\t\t";
        $context["festival_name_english"] = "";
        // line 54
        echo "\t\t\t\t\t\t\t\t\t";
        $context["festival_name_arabic"] = "";
        // line 55
        echo "\t\t\t\t\t\t\t\t\t";
        $context["start_date"] = "";
        // line 56
        echo "\t\t\t\t\t\t\t\t\t";
        $context["end_date"] = "";
        // line 57
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
        // line 58
        if (((isset($context["festival"]) || array_key_exists("festival", $context)) &&  !twig_test_empty(($context["festival"] ?? $this->getContext($context, "festival"))))) {
            // line 59
            echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
            // line 60
            $context["festival_master_id"] = $this->getAttribute($this->getAttribute(($context["festival"] ?? $this->getContext($context, "festival")), 0, [], "array"), "festival_master_id", []);
            // line 61
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context["festival_name_english"] = $this->getAttribute($this->getAttribute(($context["festival"] ?? $this->getContext($context, "festival")), 0, [], "array"), "festival_name_english", []);
            // line 62
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context["festival_name_arabic"] = $this->getAttribute($this->getAttribute(($context["festival"] ?? $this->getContext($context, "festival")), 0, [], "array"), "festival_name_arabic", []);
            // line 63
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context["start_date"] = $this->getAttribute($this->getAttribute(($context["festival"] ?? $this->getContext($context, "festival")), 0, [], "array"), "start_date", []);
            // line 64
            echo "\t\t\t\t\t\t\t\t\t\t";
            $context["end_date"] = $this->getAttribute($this->getAttribute(($context["festival"] ?? $this->getContext($context, "festival")), 0, [], "array"), "end_date", []);
            // line 65
            echo "
\t\t\t\t\t\t\t\t\t";
        }
        // line 67
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-festival\" class=\"form-horizontal\" method=\"post\" action=\"";
        // line 68
        echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"festival_master_id\" value=\"";
        // line 70
        echo twig_escape_filter($this->env, ($context["festival_master_id"] ?? $this->getContext($context, "festival_master_id")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Festival Name English</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"festival_name_english\" name=\"festival_name_english\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, ($context["festival_name_english"] ?? $this->getContext($context, "festival_name_english")), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Festival Name Arabic</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"festival_name_arabic\" name=\"festival_name_arabic\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, ($context["festival_name_arabic"] ?? $this->getContext($context, "festival_name_arabic")), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"date\" class=\"form-control\" id=\"start_date\" name=\"start_date\" value=\"";
        // line 100
        echo twig_escape_filter($this->env, ($context["start_date"] ?? $this->getContext($context, "start_date")), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>End Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"date\" class=\"form-control\" id=\"end_date\" name=\"end_date\" value=\"";
        // line 111
        echo twig_escape_filter($this->env, ($context["end_date"] ?? $this->getContext($context, "end_date")), "html", null, true);
        echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"submit-festival\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 121
        if (((isset($context["festival"]) || array_key_exists("festival", $context)) &&  !twig_test_empty(($context["festival"] ?? $this->getContext($context, "festival"))))) {
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
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 131
        echo "\t\t\t\t\t\t\t";
        // line 132
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t";
        // line 134
        echo "\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        // line 137
        echo "\t\t\t\t\t\t\t\t\t\t\t\t
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

    // line 150
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 151
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t})
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Festival:addfestival.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  301 => 151,  295 => 150,  277 => 137,  273 => 134,  270 => 132,  268 => 131,  252 => 121,  239 => 111,  225 => 100,  211 => 89,  197 => 78,  186 => 70,  181 => 68,  178 => 67,  174 => 65,  171 => 64,  168 => 63,  165 => 62,  162 => 61,  160 => 60,  157 => 59,  155 => 58,  152 => 57,  149 => 56,  146 => 55,  143 => 54,  140 => 53,  138 => 52,  135 => 51,  133 => 50,  131 => 49,  128 => 48,  124 => 45,  122 => 41,  113 => 34,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t\tAdd - Update Festival
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
                        <h3 class=\"box-title\">Add / Update Festival</h3>
                        <a href=\"{{ path('admin_festival_index', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t{# {% if language_list is defined  and language_list is not empty%} #}
\t\t\t\t\t\t{# <div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                            </ul>
                        </div> #}
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t{# <div class=\"tab-content\"> #}
\t\t\t\t\t\t{% set festival_master_id = 0 %}
\t\t\t\t\t\t\t{# {% for language in language_list %} #}
\t\t\t\t\t\t\t\t{# <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\"> #}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_festival_savefestival',{'domain':app.session.get('domain')}) %}
\t\t\t\t\t\t\t\t\t{% set festival_name_english = '' %}
\t\t\t\t\t\t\t\t\t{% set festival_name_arabic = '' %}
\t\t\t\t\t\t\t\t\t{% set start_date = '' %}
\t\t\t\t\t\t\t\t\t{% set end_date = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if festival is defined and festival is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% set festival_master_id = festival[0].festival_master_id %}
\t\t\t\t\t\t\t\t\t\t{% set festival_name_english = festival[0].festival_name_english %}
\t\t\t\t\t\t\t\t\t\t{% set festival_name_arabic = festival[0].festival_name_arabic %}
\t\t\t\t\t\t\t\t\t\t{% set start_date = festival[0].start_date %}
\t\t\t\t\t\t\t\t\t\t{% set end_date = festival[0].end_date %}

\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-festival\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"festival_master_id\" value=\"{{ festival_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Festival Name English</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"festival_name_english\" name=\"festival_name_english\" value=\"{{festival_name_english}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Festival Name Arabic</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"festival_name_arabic\" name=\"festival_name_arabic\" value=\"{{festival_name_arabic}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"date\" class=\"form-control\" id=\"start_date\" name=\"start_date\" value=\"{{start_date}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>End Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"date\" class=\"form-control\" id=\"end_date\" name=\"end_date\" value=\"{{end_date}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"submit-festival\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if festival is defined and festival is not empty %}Update{%else%}Save{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{# </div> #}
\t\t\t\t\t\t\t{# {% endfor %} #}
\t\t\t\t\t\t\t
\t\t\t\t\t\t{# </div> #}
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t{# {% endif %} #}
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

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t})
</script>\t
{%endblock%}", "AdminBundle:Festival:addfestival.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Festival/addfestival.html.twig");
    }
}
