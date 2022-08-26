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

/* AdminBundle:Festival:index.html.twig */
class __TwigTemplate_c43b39588c140329c5854da00ea42fd968380a0b2dd8df711d565416d5fd358e extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Festival:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Festival:index.html.twig", 1);
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
\t\t  Festival Listing
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
                        <h3 class=\"box-title\">Festival</h3>
                        <a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_addfestival", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Festival</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Festival Name English</th>
\t\t\t\t\t\t\t\t<th>Festival Name Arabic</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Operation</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 49
        if (((isset($context["festival_list"]) || array_key_exists("festival_list", $context)) &&  !twig_test_empty(($context["festival_list"] ?? $this->getContext($context, "festival_list"))))) {
            // line 50
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["festival_list"] ?? $this->getContext($context, "festival_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["festival"]) {
                // line 51
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute($context["festival"], "festival_name_english", []), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["festival"], "festival_name_arabic", []), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 57
                $context["checked"] = "";
                // line 58
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["festival"], "status", []) == "active")) {
                    // line 59
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["checked"] = "checked";
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 61
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["festival"], "festival_master_id", []), "html", null, true);
                echo ",\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_addfestival", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method"), "festival_master_id" => $this->getAttribute($context["festival"], "festival_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Festival\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_deletefestival", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method"), "festival_master_id" => $this->getAttribute($context["festival"], "festival_master_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-title=\"Delete Festival\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['festival'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 73
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Festival Name English</th>
\t\t\t\t\t\t\t\t<th>Festival Name Arabic</th>
\t\t\t\t\t\t\t\t<th>Status</th>\t\t\t\t\t\t\t\t
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

    // line 94
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 95
        echo "  <script>
  
\tfunction change_status(festival_master_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_festival_changefestivalstatus", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'festival_master_id':festival_master_id,'status':status},
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
        return "AdminBundle:Festival:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 99,  248 => 95,  242 => 94,  216 => 73,  213 => 72,  194 => 67,  189 => 65,  179 => 61,  176 => 60,  173 => 59,  170 => 58,  168 => 57,  162 => 54,  158 => 53,  154 => 52,  151 => 51,  133 => 50,  131 => 49,  114 => 35,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Festival Listing
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
                        <h3 class=\"box-title\">Festival</h3>
                        <a href=\"{{ path('admin_festival_addfestival', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Festival</b></a>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t\t<table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Festival Name English</th>
\t\t\t\t\t\t\t\t<th>Festival Name Arabic</th>
\t\t\t\t\t\t\t\t<th>Status</th>
\t\t\t\t\t\t\t\t<th>Operation</th>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{% if festival_list is defined and festival_list is not empty %}
\t\t\t\t\t\t\t\t\t{% for festival in festival_list %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ loop.index }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td>{{ festival.festival_name_english }}
\t\t\t\t\t\t\t\t\t\t\t<td>{{ festival.festival_name_arabic }}
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{% if festival.status == 'active'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status({{festival.festival_master_id}},\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"{{ path('admin_festival_addfestival', {'domain': app.session.get('domain'),'festival_master_id':festival.festival_master_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Festival\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"{{path('admin_festival_deletefestival',{'domain':app.session.get('domain'),'festival_master_id':festival.festival_master_id})}}\" data-toggle=\"tooltip\" data-title=\"Delete Festival\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
\t\t\t\t\t\t\t\t<th>Festival Name English</th>
\t\t\t\t\t\t\t\t<th>Festival Name Arabic</th>
\t\t\t\t\t\t\t\t<th>Status</th>\t\t\t\t\t\t\t\t
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
  
\tfunction change_status(festival_master_id,status){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_festival_changefestivalstatus',{domain:app.session.get('domain')})}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'festival_master_id':festival_master_id,'status':status},
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
", "AdminBundle:Festival:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Festival/index.html.twig");
    }
}
