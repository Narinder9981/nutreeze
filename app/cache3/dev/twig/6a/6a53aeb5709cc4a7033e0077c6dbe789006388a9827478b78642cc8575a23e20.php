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

/* AdminBundle:Coupon:couponreport.html.twig */
class __TwigTemplate_7f92c22bcc43c5ac44f1b694617876ab1ceee97bc140fe8ff24dd5b0153dfbbb extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:couponreport.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:couponreport.html.twig", 1);
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
\t\t  Coupon Report
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
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
          <div class=\"box-header\">
\t\t  \t";
        // line 31
        if (((isset($context["coupon"]) || array_key_exists("coupon", $context)) &&  !twig_test_empty(($context["coupon"] ?? $this->getContext($context, "coupon"))))) {
            // line 32
            echo "\t\t\t  \t<div class=\"col-md-11\">
\t\t\t\t\t<h4><b>Coupon Name :</b> ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_name", []), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_code", []), "html", null, true);
            echo ")</h4>
\t\t\t\t\t<h4><b>Coupon Category :</b> ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_category_name", []), "html", null, true);
            echo "</h4>
\t\t\t\t</div>
\t\t\t";
        }
        // line 37
        echo "\t\t\t<div class=\"col-md-1 pull-right\">
\t\t\t\t<a href=\"";
        // line 38
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_index");
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-arrow-left\"></i>&nbsp;Back</a>
\t\t\t</div>
\t\t  </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Customer Name</th>
\t\t\t\t<th>Mobile No</th>
\t\t\t\t<th>Email</th>
\t\t\t\t<th>Number Of Use</th>
\t\t\t\t<th>Action</th>
              </thead>
              <tbody>
\t\t\t  ";
        // line 52
        if (( !twig_test_empty(($context["coupon_report"] ?? $this->getContext($context, "coupon_report"))) && (isset($context["coupon_report"]) || array_key_exists("coupon_report", $context)))) {
            // line 53
            echo "\t\t\t    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_report"] ?? $this->getContext($context, "coupon_report")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                // line 54
                echo "                <tr>
\t\t\t\t\t<td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["report"], "user_full_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["report"], "user_mobile", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["report"], "email", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["report"], "total_usage", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 61
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_couponusage", ["main_coupon_id" => $this->getAttribute($context["report"], "coupon_id", []), "user_master_id" => $this->getAttribute($context["report"], "user_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-bitbucket\">Usage&nbsp;&nbsp;<i class=\"fa fa-line-chart\"></i></a>\t
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "\t\t\t  ";
        }
        // line 66
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Customer Name</th>
\t\t\t\t<th>Mobile No</th>
\t\t\t\t<th>Email</th>
\t\t\t\t<th>Number Of Use</th>
\t\t\t\t<th>Action</th>
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

    // line 88
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 89
        echo "  <script>
  
\tfunction change_status(main_coupon_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 93
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
        return "AdminBundle:Coupon:couponreport.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 93,  245 => 89,  239 => 88,  212 => 66,  209 => 65,  191 => 61,  186 => 59,  182 => 58,  178 => 57,  174 => 56,  170 => 55,  167 => 54,  149 => 53,  147 => 52,  130 => 38,  127 => 37,  121 => 34,  115 => 33,  112 => 32,  110 => 31,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Coupon Report
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
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
          <div class=\"box-header\">
\t\t  \t{% if coupon is defined and coupon is not empty %}
\t\t\t  \t<div class=\"col-md-11\">
\t\t\t\t\t<h4><b>Coupon Name :</b> {{ coupon[0].coupon_name }} ({{ coupon[0].coupon_code }})</h4>
\t\t\t\t\t<h4><b>Coupon Category :</b> {{ coupon[0].coupon_category_name }}</h4>
\t\t\t\t</div>
\t\t\t{% endif %}
\t\t\t<div class=\"col-md-1 pull-right\">
\t\t\t\t<a href=\"{{ path('admin_coupon_index') }}\" class=\"btn btn-primary\"><i class=\"fa fa-arrow-left\"></i>&nbsp;Back</a>
\t\t\t</div>
\t\t  </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Customer Name</th>
\t\t\t\t<th>Mobile No</th>
\t\t\t\t<th>Email</th>
\t\t\t\t<th>Number Of Use</th>
\t\t\t\t<th>Action</th>
              </thead>
              <tbody>
\t\t\t  {%if coupon_report is not empty and coupon_report is defined%}
\t\t\t    {%for report in coupon_report %}
                <tr>
\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t<td>{{report.user_full_name}}</td>
\t\t\t\t\t<td>{{report.user_mobile}}</td>
\t\t\t\t\t<td>{{report.email}}</td>
\t\t\t\t\t<td>{{report.total_usage}}</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{path('admin_coupon_couponusage',{'main_coupon_id': report.coupon_id, 'user_master_id': report.user_master_id})}}\" class=\"btn btn-xs btn-bitbucket\">Usage&nbsp;&nbsp;<i class=\"fa fa-line-chart\"></i></a>\t
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t{%endfor%}
\t\t\t  {%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Customer Name</th>
\t\t\t\t<th>Mobile No</th>
\t\t\t\t<th>Email</th>
\t\t\t\t<th>Number Of Use</th>
\t\t\t\t<th>Action</th>
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
", "AdminBundle:Coupon:couponreport.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/couponreport.html.twig");
    }
}
