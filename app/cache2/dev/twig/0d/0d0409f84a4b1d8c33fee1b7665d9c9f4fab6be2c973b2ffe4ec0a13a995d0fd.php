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

/* AdminBundle:Coupon:couponusage.html.twig */
class __TwigTemplate_340cd129e2dcc0922234a50f7bf884b79ad76174bfa416cb85282d2325549b26 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Coupon:couponusage.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Coupon:couponusage.html.twig", 1);
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
.coupon-usage-div {
    padding: 10px;
    border: 1px solid #e2e2e2;
    margin-top: 18px;
    border-radius: 8px;
}
</style>
\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Coupon Usage
\t\t</h1>
\t<!-- BREADCUMB -->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 23
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 25
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 29
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 31
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t\t
    <div class=\"row\">
      <div class=\"col-md-12\">
\t\t<div class=\"box box-primary\">
          <div class=\"box-header\">
\t\t  \t<div class=\"col-md-12\">
\t\t\t  \t<a href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_coupon_couponreport", ["main_coupon_id" => ($context["main_coupon_id"] ?? $this->getContext($context, "main_coupon_id"))]), "html", null, true);
        echo "\" class=\"btn btn-primary pull-right\"><i class=\"fa fa-arrow-left\"></i>&nbsp;Back</a>
\t\t\t</div>
\t\t  \t<div class=\"col-md-12 coupon-usage-div\">
\t\t\t  \t<div class=\"col-md-8\">
\t\t\t\t\t";
        // line 44
        if (((isset($context["coupon"]) || array_key_exists("coupon", $context)) &&  !twig_test_empty(($context["coupon"] ?? $this->getContext($context, "coupon"))))) {
            // line 45
            echo "\t\t\t\t\t\t<h4><b>Coupon Name :</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_name", []), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_code", []), "html", null, true);
            echo ")</h4>
\t\t\t\t\t\t<h4><b>Coupon Category :</b> ";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["coupon"] ?? $this->getContext($context, "coupon")), 0, [], "array"), "coupon_category_name", []), "html", null, true);
            echo "</h4>
\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t";
        // line 50
        if (((isset($context["user"]) || array_key_exists("user", $context)) &&  !twig_test_empty(($context["user"] ?? $this->getContext($context, "user"))))) {
            // line 51
            echo "\t\t\t\t\t\t<h4><b>User Name :</b> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user"] ?? $this->getContext($context, "user")), 0, [], "array"), "user_firstname", []), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user"] ?? $this->getContext($context, "user")), 0, [], "array"), "user_lastname", []), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t<h4><b>Email :</b> ";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user"] ?? $this->getContext($context, "user")), 0, [], "array"), "email", []), "html", null, true);
            echo "</h4>
\t\t\t\t\t\t<h4><b>Mobile No :</b> ";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["user"] ?? $this->getContext($context, "user")), 0, [], "array"), "user_mobile", []), "html", null, true);
            echo "</h4>
\t\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Order No</th>
\t\t\t\t<th>Package Amount</th>
\t\t\t\t<th>Payment Amount</th>
\t\t\t\t<th>Discount</th>
\t\t\t\t<th>Date Of Use</th>
              </thead>
              <tbody>
\t\t\t  ";
        // line 69
        if (( !twig_test_empty(($context["coupon_usage"] ?? $this->getContext($context, "coupon_usage"))) && (isset($context["coupon_usage"]) || array_key_exists("coupon_usage", $context)))) {
            // line 70
            echo "\t\t\t    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_usage"] ?? $this->getContext($context, "coupon_usage")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["usage"]) {
                // line 71
                echo "                <tr>
\t\t\t\t\t<td>";
                // line 72
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_vieworder", ["order_master_id" => $this->getAttribute($context["usage"], "order_master_id", [])]), "html", null, true);
                echo "\" target=\"_blank\" data-toggle=\"tooltip\" title=\"View Order\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["usage"], "unique_no", []), "html", null, true);
                echo "</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($context["usage"], "package_amount", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 77
                echo twig_escape_filter($this->env, $this->getAttribute($context["usage"], "payment_amount", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute($context["usage"], "promo_code_discount", []), "html", null, true);
                echo "</td>
\t\t\t\t\t<td>";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["usage"], "date_of_use", []), "html", null, true);
                echo "</td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "\t\t\t  ";
        }
        // line 83
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Order No</th>
\t\t\t\t<th>Package Amount</th>
\t\t\t\t<th>Payment Amount</th>
\t\t\t\t<th>Discount</th>
\t\t\t\t<th>Date Of Use</th>
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

    // line 105
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 106
        echo "  <script>
  
\tfunction change_status(main_coupon_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 110
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
        return "AdminBundle:Coupon:couponusage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 110,  278 => 106,  272 => 105,  245 => 83,  242 => 82,  225 => 79,  221 => 78,  217 => 77,  213 => 76,  206 => 74,  201 => 72,  198 => 71,  180 => 70,  178 => 69,  162 => 55,  157 => 53,  153 => 52,  146 => 51,  144 => 50,  140 => 48,  135 => 46,  128 => 45,  126 => 44,  119 => 40,  111 => 34,  102 => 31,  98 => 29,  93 => 28,  84 => 25,  80 => 23,  76 => 22,  69 => 18,  52 => 3,  46 => 2,  30 => 1,);
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
.coupon-usage-div {
    padding: 10px;
    border: 1px solid #e2e2e2;
    margin-top: 18px;
    border-radius: 8px;
}
</style>
\t<section class=\"content-header\">
\t<!-- PAGE TITLE -->
\t\t<h1>
\t\t  Coupon Usage
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
\t\t  \t<div class=\"col-md-12\">
\t\t\t  \t<a href=\"{{ path('admin_coupon_couponreport', {'main_coupon_id':main_coupon_id}) }}\" class=\"btn btn-primary pull-right\"><i class=\"fa fa-arrow-left\"></i>&nbsp;Back</a>
\t\t\t</div>
\t\t  \t<div class=\"col-md-12 coupon-usage-div\">
\t\t\t  \t<div class=\"col-md-8\">
\t\t\t\t\t{% if coupon is defined and coupon is not empty %}
\t\t\t\t\t\t<h4><b>Coupon Name :</b> {{ coupon[0].coupon_name }} ({{ coupon[0].coupon_code }})</h4>
\t\t\t\t\t\t<h4><b>Coupon Category :</b> {{ coupon[0].coupon_category_name }}</h4>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t{% if user is defined and user is not empty %}
\t\t\t\t\t\t<h4><b>User Name :</b> {{ user[0].user_firstname }} {{ user[0].user_lastname }}</h4>
\t\t\t\t\t\t<h4><b>Email :</b> {{ user[0].email }}</h4>
\t\t\t\t\t\t<h4><b>Mobile No :</b> {{ user[0].user_mobile }}</h4>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t</div>
\t\t  </div>
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Order No</th>
\t\t\t\t<th>Package Amount</th>
\t\t\t\t<th>Payment Amount</th>
\t\t\t\t<th>Discount</th>
\t\t\t\t<th>Date Of Use</th>
              </thead>
              <tbody>
\t\t\t  {%if coupon_usage is not empty and coupon_usage is defined%}
\t\t\t    {%for usage in coupon_usage %}
                <tr>
\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"{{path('admin_orders_vieworder',{'order_master_id':usage.order_master_id})}}\" target=\"_blank\" data-toggle=\"tooltip\" title=\"View Order\">{{usage.unique_no}}</a>
\t\t\t\t\t</td>
\t\t\t\t\t<td>{{usage.package_amount}}</td>
\t\t\t\t\t<td>{{usage.payment_amount}}</td>
\t\t\t\t\t<td>{{usage.promo_code_discount}}</td>
\t\t\t\t\t<td>{{usage.date_of_use}}</td>
\t\t\t\t</tr>
\t\t\t\t{%endfor%}
\t\t\t  {%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Order No</th>
\t\t\t\t<th>Package Amount</th>
\t\t\t\t<th>Payment Amount</th>
\t\t\t\t<th>Discount</th>
\t\t\t\t<th>Date Of Use</th>
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
", "AdminBundle:Coupon:couponusage.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Coupon/couponusage.html.twig");
    }
}
