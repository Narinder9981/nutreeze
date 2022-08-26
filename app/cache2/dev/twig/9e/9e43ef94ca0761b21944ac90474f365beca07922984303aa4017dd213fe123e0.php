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

/* AdminBundle:UserVideoCategory:index.html.twig */
class __TwigTemplate_97494ce2bf774cf5e63068610577a4c437741032c95d9d253192da97b93d09fb extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:UserVideoCategory:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:UserVideoCategory:index.html.twig", 1);
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
\t\t  Video Category Listing
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
\t\t<div class=\"box-header\">
\t\t\t<a href=\"";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideocategory_add");
        echo "\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Video Category</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t\t\t\t<th>Image</th>
\t\t\t\t\t\t\t";
        // line 38
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 39
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t
\t\t\t\t\t\t\t";
        }
        // line 43
        echo "\t\t\t\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 46
        if (((isset($context["video_category"]) || array_key_exists("video_category", $context)) &&  !twig_test_empty(($context["video_category"] ?? $this->getContext($context, "video_category"))))) {
            // line 47
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["video_category"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["video_category"]) {
                // line 48
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<img src=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["video_category"], "image", []), "html", null, true);
                echo "\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                // line 53
                if (($this->getAttribute($context["video_category"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["video_category"], "lang_wise", [])))) {
                    // line 54
                    echo "\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["video_category"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                        // line 55
                        echo "\t\t\t\t\t\t\t\t\t<td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["name"], "name", []), "html", null, true);
                        echo "</td>
\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 57
                    echo "\t\t\t\t\t\t\t";
                }
                // line 58
                echo "\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideocategory_add", ["main_id" => $this->getAttribute($context["video_category"], "main_user_video_category_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_uservideocategory_delete", ["main_id" => $this->getAttribute($context["video_category"], "main_user_video_category_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video_category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "\t\t\t\t";
        }
        // line 65
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t";
        // line 69
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 70
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 71
                echo "\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "\t
\t\t\t\t";
        }
        // line 74
        echo "\t\t\t\t<th>Operation</th>\t\t\t\t
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

    // line 89
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 90
        echo "  <script>
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:UserVideoCategory:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 90,  271 => 89,  251 => 74,  247 => 72,  238 => 71,  233 => 70,  231 => 69,  225 => 65,  222 => 64,  204 => 60,  200 => 59,  197 => 58,  194 => 57,  185 => 55,  180 => 54,  178 => 53,  173 => 51,  168 => 49,  165 => 48,  147 => 47,  145 => 46,  140 => 43,  136 => 41,  127 => 40,  122 => 39,  120 => 38,  109 => 30,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Video Category Listing
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
\t\t<div class=\"box-header\">
\t\t\t<a href=\"{{path('admin_uservideocategory_add')}}\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Video Category</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t\t\t\t<th>Image</th>
\t\t\t\t\t\t\t{% if languages is defined and languages is not empty%}
\t\t\t\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t\t\t\t<th>Name : {{language.language_name}}</th>
\t\t\t\t\t\t\t\t{%endfor%}\t
\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                {%if video_category is defined and video_category is not empty%}
\t\t\t\t\t{%for video_category in video_category %}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<img src=\"{{video_category.image}}\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t{%if video_category.lang_wise is defined and video_category.lang_wise is not empty %}
\t\t\t\t\t\t\t\t{%for name in video_category.lang_wise %}
\t\t\t\t\t\t\t\t\t<td>{{name.name}}</td>
\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_uservideocategory_add',{'main_id':video_category.main_user_video_category_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_uservideocategory_delete',{'main_id':video_category.main_user_video_category_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t{% if languages is defined and languages is not empty%}
\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t<th>Name : {{language.language_name}}</th>
\t\t\t\t\t{%endfor%}\t
\t\t\t\t{% endif%}
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
    \$(document).ready(function() {
      \$('#list').DataTable();
    });
  </script>
{% endblock %}
", "AdminBundle:UserVideoCategory:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/UserVideoCategory/index.html.twig");
    }
}
