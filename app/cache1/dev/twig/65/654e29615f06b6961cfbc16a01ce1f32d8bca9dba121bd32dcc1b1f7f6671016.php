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

/* AdminBundle:Gallery:index.html.twig */
class __TwigTemplate_f6d9bff641ab187332c18ee5317aef9ce96e9c2f17dd32d503c43d9a5982ca00 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Gallery:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Gallery:index.html.twig", 1);
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
\t\t  Gallery Listing
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
\t\t\t\t<h3 class=\"box-title\">Gallery</h3>
\t\t\t\t<a href=\"";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_gallery_addgallery");
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Gallery</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Media Type</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 43
        if (((isset($context["gallery"]) || array_key_exists("gallery", $context)) &&  !twig_test_empty(($context["gallery"] ?? $this->getContext($context, "gallery"))))) {
            // line 44
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
                // line 45
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                echo "\">\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 49
                if (($this->getAttribute($context["gallery"], "media_type", []) == "img")) {
                    // line 50
                    echo "\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                    echo "\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t";
                }
                // line 52
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 53
                if (($this->getAttribute($context["gallery"], "media_type", []) == "video")) {
                    // line 54
                    echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<video width=\"50px\" height=\"50px\">
\t\t\t\t\t\t\t\t\t\t  <source src=\"";
                    // line 56
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                    echo "\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t\t  <source src=\"";
                    // line 57
                    echo twig_escape_filter($this->env, $this->getAttribute($context["gallery"], "media_url", []), "html", null, true);
                    echo "\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t\t";
                }
                // line 61
                echo "\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>";
                // line 64
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["gallery"], "media_type", [])), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 66
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_gallery_addgallery", ["gallery_id" => $this->getAttribute($context["gallery"], "common_gallery_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_gallery_deletegallery", ["gallery_id" => $this->getAttribute($context["gallery"], "common_gallery_master_id", [])]), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gallery'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "\t\t\t\t";
        }
        // line 72
        echo "              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Media Type</th>
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

    // line 92
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 93
        echo "  <script>
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
        return "AdminBundle:Gallery:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 93,  245 => 92,  220 => 72,  217 => 71,  199 => 67,  195 => 66,  190 => 64,  185 => 61,  178 => 57,  174 => 56,  170 => 54,  168 => 53,  165 => 52,  159 => 50,  157 => 49,  153 => 48,  148 => 46,  145 => 45,  127 => 44,  125 => 43,  111 => 32,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Gallery Listing
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
\t\t\t\t<h3 class=\"box-title\">Gallery</h3>
\t\t\t\t<a href=\"{{ path('admin_gallery_addgallery') }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Gallery</b></a>
\t\t\t</div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Media Type</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                {%if gallery is defined and gallery is not empty%}
\t\t\t\t\t{%for gallery in gallery%}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{gallery.media_url}}\">\t\t\t
\t\t\t\t\t\t\t\t\t{%if gallery.media_type == 'img'%}
\t\t\t\t\t\t\t\t\t\t<img src=\"{{gallery.media_url}}\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{%if gallery.media_type == 'video'%}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<video width=\"50px\" height=\"50px\">
\t\t\t\t\t\t\t\t\t\t  <source src=\"{{gallery.media_url}}\" type=\"video/mp4\">
\t\t\t\t\t\t\t\t\t\t  <source src=\"{{gallery.media_url}}\" type=\"video/ogg\">
\t\t\t\t\t\t\t\t\t\tYour browser does not support the video tag.
\t\t\t\t\t\t\t\t\t\t</video>
\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>{{gallery.media_type | capitalize}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_gallery_addgallery',{'gallery_id':gallery.common_gallery_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_gallery_deletegallery',{'gallery_id':gallery.common_gallery_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t<th>Media</th>
\t\t\t\t<th>Media Type</th>
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
", "AdminBundle:Gallery:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Gallery/index.html.twig");
    }
}
