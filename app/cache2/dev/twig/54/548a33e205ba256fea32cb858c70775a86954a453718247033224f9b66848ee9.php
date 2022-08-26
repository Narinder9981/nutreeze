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

/* AdminBundle:Orders:orderMeals.html.twig */
class __TwigTemplate_ddd2e0a15325be76e4ef41c66afd11b806c0a60cf6c5baf3e100282fdb3a7ca5 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:orderMeals.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:orderMeals.html.twig", 1);
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
\t\t\tOrder Meals
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
                        <h3 class=\"box-title\">Order Meals</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 40
        if (((isset($context["days"]) || array_key_exists("days", $context)) &&  !twig_test_empty(($context["days"] ?? $this->getContext($context, "days"))))) {
            // line 41
            echo "\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                ";
            // line 43
            if ((isset($context["days"]) || array_key_exists("days", $context))) {
                // line 44
                echo "                                   ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["days"] ?? $this->getContext($context, "days")));
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
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 45
                    echo "                                        <li class=\"";
                    if (($this->getAttribute($context["loop"], "first", []) == true)) {
                        echo "active";
                    }
                    echo "\">
                                            <a href=\"#tab_data\" data-toggle=\"tab\" onclick=\"getMealDayWise('";
                    // line 46
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "','";
                    echo twig_escape_filter($this->env, ($context["order_master_id"] ?? $this->getContext($context, "order_master_id")), "html", null, true);
                    echo "')\">";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "</a>
                                        </li>
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
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 49
                echo "                                ";
            }
            // line 50
            echo "                            </ul>
                        </div> 
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t";
            // line 55
            $context["main_gallery_id"] = 0;
            // line 56
            echo "\t\t\t\t\t\t";
            $context["media_type"] = 0;
            // line 57
            echo "\t\t\t\t\t\t";
            $context["img_url"] = "";
            // line 58
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 59
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["days"] ?? $this->getContext($context, "days")));
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
            foreach ($context['_seq'] as $context["key"] => $context["value_1"]) {
                echo " 
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" id=\"tab_data\" class=\"tab-pane ";
                // line 60
                if (($this->getAttribute($context["loop"], "first", []) == true)) {
                    echo "active";
                }
                echo "\">
\t\t\t\t\t\t\t\t\t<div id=\"main_content\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value_1'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 70
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

    // line 83
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 84
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>\t
\tvar global_day = '';
\tvar global_order_id = 0;
\tfunction getMealDayWise(day,order_id){
\t\t\$('#status_tag').html('');
\t\t\$('#driver').children('option').each(function(){
\t\t\t\$(this).removeAttr('selected');\t
\t\t});
\t\t
\t\tglobal_day = day;
\t\tglobal_order_id = order_id;
\t\t
\t\t\$.ajax({
\t\t\turl : \"";
        // line 99
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_getmealsdaywise");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day':day,'order_id':order_id},
\t\t\tsuccess : function(data){
\t\t\t\tdata = JSON.parse(data);
\t\t\t\tdriver_id = data.driver_id;
\t\t\t\tstatus = data.status;
\t\t\t\tdate_time = data.date_time;
\t\t\t\tdata_found = data.data_found;
\t\t\t\tnot_delivered_reason = data.not_delivered_reason;
\t\t\t\t
\t\t\t\tif(driver_id != 0 ){
\t\t\t\t\tmake_select(driver_id);
\t\t\t\t}
\t\t\t\tif(data.error = 'NRF'){
\t\t\t\t\t\$('#main_content').html('<h3>No Meal Found</h3>');
\t\t\t\t}
\t\t\t\t
\t\t\t\t\$('#main_content').html(data.table_html);
\t\t\t//\t\$('#status_tag').html(data.status);
\t\t\t\t

\t\t\t\tif(data_found == false){
\t\t\t\t\t\$('#row_panel').slideUp();
\t\t\t\t}
\t\t\t\tif(data_found == true){
\t\t\t\t\t\$('#row_panel').slideDown();
\t\t\t\t}\t\t\t\t
\t\t\t},
\t\t\terror : function (){
\t\t\t\talert('Something went wrong');
\t\t\t}
\t\t});
\t}
\t
\tfunction make_select(driver_id){
\t\t\$('#driver').children('option').each(function(){
//\t\t\talert(\$(this).val());
\t\t\tif(\$(this).val() == driver_id){
\t\t\t\t\$('#driver').val(driver_id);
\t\t\t}\t
\t\t});\t
\t
\t}
\tfunction assign_driver(element,meal_id){

\t\tif(global_order_id != 0 && global_day != ''){
\t\t\t\$.ajax({
\t\t\t\turl : \"";
        // line 147
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assigndriver");
        echo "\",
\t\t\t\tmethod : \"POST\",
\t\t\t\tdata : {'order_id':global_order_id,'day':global_day,'driver_id':element.val(),'meal_id':meal_id},
\t\t\t\tsuccess : function(data){
\t\t\t\t\tgetMealDayWise(global_day,global_order_id);
\t\t\t\t\t
\t\t\t\t\talert(data);\t\t\t\t\t

\t\t\t\t},
\t\t\t\terror : function(){
\t\t\t\t\talert('Something went wrong');
\t\t\t\t}\t\t\t\t
\t\t\t});
\t\t}
\t}
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){
\t\tgetMealDayWise('mon','";
        // line 169
        echo twig_escape_filter($this->env, ($context["order_master_id"] ?? $this->getContext($context, "order_master_id")), "html", null, true);
        echo "');
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
\$(document).ready(function() {

//\t\$('#example').DataTable();
} );\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:orderMeals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  360 => 169,  335 => 147,  284 => 99,  265 => 84,  259 => 83,  241 => 70,  234 => 65,  213 => 60,  194 => 59,  191 => 58,  188 => 57,  185 => 56,  183 => 55,  176 => 50,  173 => 49,  152 => 46,  145 => 45,  127 => 44,  125 => 43,  121 => 41,  119 => 40,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t\tOrder Meals
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
                        <h3 class=\"box-title\">Order Meals</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t{% if days is defined  and days is not empty%}
\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                {% if days is defined %}
                                   {% for key,value in days %}
                                        <li class=\"{% if loop.first == true %}active{% endif %}\">
                                            <a href=\"#tab_data\" data-toggle=\"tab\" onclick=\"getMealDayWise('{{key}}','{{order_master_id}}')\">{{value}}</a>
                                        </li>
                                    {% endfor %}
                                {% endif %}
                            </ul>
                        </div> 
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t{% set main_gallery_id = 0 %}
\t\t\t\t\t\t{% set media_type = 0 %}
\t\t\t\t\t\t{% set img_url = '' %}
\t\t\t\t\t\t
\t\t\t\t\t\t\t{% for key,value_1 in days %} 
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" id=\"tab_data\" class=\"tab-pane {% if loop.first == true %}active{% endif %}\">
\t\t\t\t\t\t\t\t\t<div id=\"main_content\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t{% endif %}
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
\tvar global_day = '';
\tvar global_order_id = 0;
\tfunction getMealDayWise(day,order_id){
\t\t\$('#status_tag').html('');
\t\t\$('#driver').children('option').each(function(){
\t\t\t\$(this).removeAttr('selected');\t
\t\t});
\t\t
\t\tglobal_day = day;
\t\tglobal_order_id = order_id;
\t\t
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_getmealsdaywise')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'day':day,'order_id':order_id},
\t\t\tsuccess : function(data){
\t\t\t\tdata = JSON.parse(data);
\t\t\t\tdriver_id = data.driver_id;
\t\t\t\tstatus = data.status;
\t\t\t\tdate_time = data.date_time;
\t\t\t\tdata_found = data.data_found;
\t\t\t\tnot_delivered_reason = data.not_delivered_reason;
\t\t\t\t
\t\t\t\tif(driver_id != 0 ){
\t\t\t\t\tmake_select(driver_id);
\t\t\t\t}
\t\t\t\tif(data.error = 'NRF'){
\t\t\t\t\t\$('#main_content').html('<h3>No Meal Found</h3>');
\t\t\t\t}
\t\t\t\t
\t\t\t\t\$('#main_content').html(data.table_html);
\t\t\t//\t\$('#status_tag').html(data.status);
\t\t\t\t

\t\t\t\tif(data_found == false){
\t\t\t\t\t\$('#row_panel').slideUp();
\t\t\t\t}
\t\t\t\tif(data_found == true){
\t\t\t\t\t\$('#row_panel').slideDown();
\t\t\t\t}\t\t\t\t
\t\t\t},
\t\t\terror : function (){
\t\t\t\talert('Something went wrong');
\t\t\t}
\t\t});
\t}
\t
\tfunction make_select(driver_id){
\t\t\$('#driver').children('option').each(function(){
//\t\t\talert(\$(this).val());
\t\t\tif(\$(this).val() == driver_id){
\t\t\t\t\$('#driver').val(driver_id);
\t\t\t}\t
\t\t});\t
\t
\t}
\tfunction assign_driver(element,meal_id){

\t\tif(global_order_id != 0 && global_day != ''){
\t\t\t\$.ajax({
\t\t\t\turl : \"{{path('admin_orders_assigndriver')}}\",
\t\t\t\tmethod : \"POST\",
\t\t\t\tdata : {'order_id':global_order_id,'day':global_day,'driver_id':element.val(),'meal_id':meal_id},
\t\t\t\tsuccess : function(data){
\t\t\t\t\tgetMealDayWise(global_day,global_order_id);
\t\t\t\t\t
\t\t\t\t\talert(data);\t\t\t\t\t

\t\t\t\t},
\t\t\t\terror : function(){
\t\t\t\t\talert('Something went wrong');
\t\t\t\t}\t\t\t\t
\t\t\t});
\t\t}
\t}
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){
\t\tgetMealDayWise('mon','{{order_master_id}}');
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
\$(document).ready(function() {

//\t\$('#example').DataTable();
} );\t
</script>\t
{% endblock %}", "AdminBundle:Orders:orderMeals.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/orderMeals.html.twig");
    }
}
