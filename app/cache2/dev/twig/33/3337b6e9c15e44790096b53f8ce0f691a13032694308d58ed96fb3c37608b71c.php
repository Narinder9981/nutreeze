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

/* AdminBundle:Socialmedia:index.html.twig */
class __TwigTemplate_23bf3a4f6c897306e0a30fd0566d9378eed5001ff192e0557feacf485554b1c6 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Socialmedia:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Socialmedia:index.html.twig", 1);
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
\t\t  Social Media Listing
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_socialmedia_addmedia");
        echo "\" class=\"btn btn-sm btn-primary btn-flat pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Social Media Item</a>
\t</div>
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
\t\t\t
          \t<div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Title</th>
\t\t\t\t<th>Link</th>
\t\t\t\t
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
\t\t\t  ";
        // line 51
        if (( !twig_test_empty(($context["medias"] ?? $this->getContext($context, "medias"))) && (isset($context["medias"]) || array_key_exists("medias", $context)))) {
            // line 52
            echo "\t\t\t    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["medias"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["medias"]) {
                // line 53
                echo "                <tr>
\t\t\t\t\t<td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["medias"], "title", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["medias"], "link", []), "html", null, true);
                echo "</td>
\t\t\t\t\t
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_socialmedia_addmedia", ["social_media_id" => $this->getAttribute($context["medias"], "social_media_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t<a href=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_socialmedia_deletemedia", ["media_id" => $this->getAttribute($context["medias"], "social_media_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t
\t\t\t\t\t</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['medias'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "\t\t\t  ";
        }
        // line 65
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Title</th>
\t\t\t\t<th>Link</th>
\t\t\t\t
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

    // line 86
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 87
        echo "  <script>
  
\tfunction change_status(main_coupon_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 91
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
        return "AdminBundle:Socialmedia:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  233 => 91,  227 => 87,  221 => 86,  195 => 65,  192 => 64,  174 => 60,  170 => 59,  164 => 56,  160 => 55,  156 => 54,  153 => 53,  135 => 52,  133 => 51,  114 => 35,  110 => 33,  101 => 30,  97 => 28,  92 => 27,  83 => 24,  79 => 22,  75 => 21,  68 => 17,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Social Media Listing
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
\t\t<a href=\"{{path('admin_socialmedia_addmedia')}}\" class=\"btn btn-sm btn-primary btn-flat pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Social Media Item</a>
\t</div>
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
\t\t\t
          \t<div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Title</th>
\t\t\t\t<th>Link</th>
\t\t\t\t
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
\t\t\t  {%if medias is not empty and medias is defined%}
\t\t\t    {%for medias in medias%}
                <tr>
\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t<td>{{medias.title}}</td>
\t\t\t\t\t<td>{{medias.link}}</td>
\t\t\t\t\t
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{path('admin_socialmedia_addmedia',{'social_media_id':medias.social_media_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t<a href=\"{{path('admin_socialmedia_deletemedia',{'media_id':medias.social_media_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t{%endfor%}
\t\t\t  {%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Title</th>
\t\t\t\t<th>Link</th>
\t\t\t\t
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

", "AdminBundle:Socialmedia:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Socialmedia/index.html.twig");
    }
}
