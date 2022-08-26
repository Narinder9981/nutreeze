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

/* AdminBundle:Schedule:index.html.twig */
class __TwigTemplate_f8827550f5f15a7b817da16ff4952b3192e5e2c481030ff3b9dfe2e3b20129e5 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Schedule:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Schedule:index.html.twig", 1);
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
\t\t Schedule Listing
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
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"box box-primary\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<h3 class=\"box-title\">User Schedule</h3>
\t\t\t\t<a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_schedule_addschedule", ["user_id" => ($context["user_id"] ?? $this->getContext($context, "user_id"))]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Schedule</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Package</th>
\t\t\t\t";
        // line 40
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 41
            echo "\t\t\t\t\t<th>Assign</th>
\t\t\t\t";
        }
        // line 43
        echo "\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 46
        if (((isset($context["gallery"]) || array_key_exists("gallery", $context)) &&  !twig_test_empty(($context["gallery"] ?? $this->getContext($context, "gallery"))))) {
            // line 47
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["gallery"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["gallery"]) {
                // line 48
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                echo "\" target=\"_blank\">\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\tView Doc
\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "package_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 57
                if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
                    // line 58
                    echo "\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t";
                    // line 59
                    $context["checked"] = "";
                    // line 60
                    echo "\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($context["gallery"], "schedule_user_relation_id", [], "any", true, true) && ($this->getAttribute($context["gallery"], "schedule_user_relation_id", []) != null))) {
                        // line 61
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["checked"] = "checked";
                        // line 62
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 63
                    echo "\t\t\t\t\t\t\t\t<input data-on=\"Yes\" class=\"status status_1\" data-off=\"No\" onchange=\"change_assign('";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "main_schedule_id_", []), "html", null, true);
                    echo "','";
                    echo twig_escape_filter($this->env, ($context["user_id"] ?? $this->getContext($context, "user_id")), "html", null, true);
                    echo "',\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                    echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                    echo "/>
\t\t\t\t\t\t\t</td>\t
\t\t\t\t\t\t\t";
                }
                // line 65
                echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_schedule_addschedule", ["schedule_id" => $this->getAttribute($context["gallery"], "main_schedule_id_", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_schedule_deleteschedule", ["schedule_id" => $this->getAttribute($context["gallery"], "main_schedule_id_", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gallery'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "\t\t\t\t";
        }
        // line 73
        echo "              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Package</th>
\t\t\t\t";
        // line 78
        if (((isset($context["user_id"]) || array_key_exists("user_id", $context)) && (($context["user_id"] ?? $this->getContext($context, "user_id")) != 0))) {
            // line 79
            echo "\t\t\t\t\t<th>Assign</th>
\t\t\t\t";
        }
        // line 80
        echo "\t\t\t\t
\t\t\t\t<th>Operation</th>
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

    // line 96
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 97
        echo "  <script>
  
\tfunction change_assign(schedule_id,user_id,status){
//\talert(schedule_id);return;
\t\t\$.ajax({
\t\t\turl : \"";
        // line 102
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_schedule_assignschedule");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'schedule_id':schedule_id,'user_id':user_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('Assign');
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert('Something went wrong');
\t\t\t}
\t\t});
\t}
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
        return "AdminBundle:Schedule:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  276 => 102,  269 => 97,  263 => 96,  242 => 80,  238 => 79,  236 => 78,  229 => 73,  226 => 72,  208 => 68,  204 => 67,  200 => 65,  189 => 63,  186 => 62,  183 => 61,  180 => 60,  178 => 59,  175 => 58,  173 => 57,  169 => 56,  161 => 51,  156 => 49,  153 => 48,  135 => 47,  133 => 46,  128 => 43,  124 => 41,  122 => 40,  111 => 32,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t Schedule Listing
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
    <div class=\"row\">
      <div class=\"col-md-12\">
        <div class=\"box box-primary\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<h3 class=\"box-title\">User Schedule</h3>
\t\t\t\t<a href=\"{{ path('admin_schedule_addschedule', {'user_id': user_id}) }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Schedule</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Package</th>
\t\t\t\t{% if user_id is defined and user_id !=0 %}
\t\t\t\t\t<th>Assign</th>
\t\t\t\t{% endif%}
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                {%if gallery is defined and gallery is not empty%}
\t\t\t\t\t{%for gallery in gallery%}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{gallery.media_url}}\" target=\"_blank\">\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\tView Doc
\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>{{gallery.package_name}}</td>
\t\t\t\t\t\t\t{% if user_id is defined and user_id !=0 %}
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t{% set checked = '' %}
\t\t\t\t\t\t\t\t{% if gallery.schedule_user_relation_id is defined and gallery.schedule_user_relation_id != null %}
\t\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t<input data-on=\"Yes\" class=\"status status_1\" data-off=\"No\" onchange=\"change_assign('{{gallery.main_schedule_id_}}','{{user_id}}',\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
\t\t\t\t\t\t\t</td>\t
\t\t\t\t\t\t\t{% endif%}\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_schedule_addschedule',{'schedule_id':gallery.main_schedule_id_})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_schedule_deleteschedule',{'schedule_id':gallery.main_schedule_id_})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Package</th>
\t\t\t\t{% if user_id is defined and user_id != 0%}
\t\t\t\t\t<th>Assign</th>
\t\t\t\t{% endif%}\t\t\t\t
\t\t\t\t<th>Operation</th>
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
  
\tfunction change_assign(schedule_id,user_id,status){
//\talert(schedule_id);return;
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_schedule_assignschedule')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'schedule_id':schedule_id,'user_id':user_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tconsole.log('Assign');
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert('Something went wrong');
\t\t\t}
\t\t});
\t}
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
", "AdminBundle:Schedule:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Schedule/index.html.twig");
    }
}
