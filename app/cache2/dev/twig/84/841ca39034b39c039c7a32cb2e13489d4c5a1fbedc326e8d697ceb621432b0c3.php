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

/* AdminBundle:DeliveryReason:addReason.html.twig */
class __TwigTemplate_f44b7f759df617a3fda3d39b8db4e7109d6b149f7dc86a8bfb6b21935c0114b4 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DeliveryReason:addReason.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:DeliveryReason:addReason.html.twig", 1);
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
\t\t  Add Delivery Reason
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
                        <h3 class=\"box-title\">Add / Update Delivery Reason</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 40
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 41
            echo "\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                ";
            // line 43
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 44
                echo "                                   ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 45
                    echo "                                        <li class=\"";
                    if ((isset($context["selected"]) || array_key_exists("selected", $context))) {
                        if ((($context["selected"] ?? $this->getContext($context, "selected")) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            echo "active";
                        }
                    } else {
                        if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                            echo "active";
                        }
                    }
                    echo "\">
                                            <a href=\"#lan_";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "\" data-toggle=\"tab\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
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
            $context["main_reason_id"] = 0;
            // line 56
            echo "\t\t\t\t\t\t";
            $context["reason_name"] = 0;
            // line 57
            echo "\t\t\t\t\t\t";
            $context["package_snakes"] = "";
            // line 58
            echo "\t\t\t\t\t\t";
            $context["price_starting_from"] = "";
            // line 59
            echo "\t\t\t\t\t\t";
            $context["sub_packages"] = null;
            // line 60
            echo "
\t\t\t\t\t\t\t";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 62
                echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 64
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_deliveryreason_savereason");
                // line 65
                echo "\t\t\t\t\t\t\t\t\t";
                $context["reason"] = "";
                // line 66
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 67
                if (((isset($context["main_reason"]) || array_key_exists("main_reason", $context)) &&  !twig_test_empty(($context["main_reason"] ?? $this->getContext($context, "main_reason"))))) {
                    // line 68
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                    // line 69
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_reason"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_reason"]) {
                        // line 70
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["main_reason"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 71
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 72
                            $context["main_reason_id"] = $this->getAttribute($context["main_reason"], "main_reason_id", []);
                            // line 73
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["reason"] = $this->getAttribute($context["main_reason"], "reason", []);
                            // line 74
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 75
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_reason'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 77
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-";
                // line 78
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_reason_id\" value=\"";
                // line 80
                echo twig_escape_filter($this->env, ($context["main_reason_id"] ?? $this->getContext($context, "main_reason_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Reason Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"reason_name\" value=\"";
                // line 89
                echo twig_escape_filter($this->env, ($context["reason"] ?? $this->getContext($context, "reason")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 102
                if (((isset($context["main_reason"]) || array_key_exists("main_reason", $context)) &&  !twig_test_empty(($context["main_reason"] ?? $this->getContext($context, "main_reason"))))) {
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 118
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

    // line 131
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 132
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>

\tfunction remove_combo(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t}
\t
\tfunction add_combo(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\tconsole.log(element.parents('div').prev(\".first_one:last\").html());

\t\telement.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");
\t\t
/*\t\telemnt_last = element.parents('div').prev(\".first_one\");
\t\tconsole.log(elemnt_last.html());
\t\tvar html = element.parents('div').prev(\".first_one\").html(); 
\t\thtml = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"
\t\t
\t\telemnt_last.after(html).find(\"input[type='number']\").val(\"\");
\t\t//.find(\"input[type='number']\").val(\"\") */
\t}
\t
\t\$(function () {

\t\tif(\$('.first_one').length <= 2 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\t
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DeliveryReason:addReason.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  375 => 132,  369 => 131,  351 => 118,  344 => 113,  315 => 102,  310 => 100,  296 => 89,  285 => 81,  281 => 80,  274 => 78,  271 => 77,  268 => 76,  262 => 75,  259 => 74,  256 => 73,  254 => 72,  251 => 71,  248 => 70,  244 => 69,  241 => 68,  239 => 67,  236 => 66,  233 => 65,  231 => 64,  221 => 62,  204 => 61,  201 => 60,  198 => 59,  195 => 58,  192 => 57,  189 => 56,  187 => 55,  180 => 50,  177 => 49,  158 => 46,  145 => 45,  127 => 44,  125 => 43,  121 => 41,  119 => 40,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Add Delivery Reason
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
                        <h3 class=\"box-title\">Add / Update Delivery Reason</h3>
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t{% if language_list is defined  and language_list is not empty%}
\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                {% if language_list is defined %}
                                   {% for language in language_list %}
                                        <li class=\"{% if selected is defined %}{% if selected == language.language_master_id%}active{% endif %}{% else %}{% if loop.index == 1 %}active{% endif %}{% endif %}\">
                                            <a href=\"#lan_{{loop.index}}\" data-toggle=\"tab\">{{language.language_name}}</a>
                                        </li>
                                    {% endfor %}
                                {% endif %}
                            </ul>
                        </div>
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t{% set main_reason_id = 0 %}
\t\t\t\t\t\t{% set reason_name = 0 %}
\t\t\t\t\t\t{% set package_snakes = '' %}
\t\t\t\t\t\t{% set price_starting_from = '' %}
\t\t\t\t\t\t{% set sub_packages = null %}

\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_deliveryreason_savereason') %}
\t\t\t\t\t\t\t\t\t{% set reason = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if main_reason is defined and main_reason is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for main_reason in main_reason %}
\t\t\t\t\t\t\t\t\t\t\t{% if main_reason.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_reason_id = main_reason.main_reason_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set reason = main_reason.reason %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_reason_id\" value=\"{{ main_reason_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Reason Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"reason_name\" value=\"{{reason}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if main_reason is defined and main_reason is not empty %}Update{%else%}Save{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t
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

<script>

\tfunction remove_combo(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t}
\t
\tfunction add_combo(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\tconsole.log(element.parents('div').prev(\".first_one:last\").html());

\t\telement.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");
\t\t
/*\t\telemnt_last = element.parents('div').prev(\".first_one\");
\t\tconsole.log(elemnt_last.html());
\t\tvar html = element.parents('div').prev(\".first_one\").html(); 
\t\thtml = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"
\t\t
\t\telemnt_last.after(html).find(\"input[type='number']\").val(\"\");
\t\t//.find(\"input[type='number']\").val(\"\") */
\t}
\t
\t\$(function () {

\t\tif(\$('.first_one').length <= 2 ){
\t\t\t\$('#remove_combo_btn').hide();
\t\t}
\t\t
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t});
\t
\t\$(document).ready(function(){

\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});
\t
\t});\t
\t
</script>\t
{% endblock %}", "AdminBundle:DeliveryReason:addReason.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DeliveryReason/addReason.html.twig");
    }
}
