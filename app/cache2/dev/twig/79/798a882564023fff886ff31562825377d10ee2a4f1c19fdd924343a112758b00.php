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

/* AdminBundle:Advertise:index.html.twig */
class __TwigTemplate_21ca8c3c39384de6321dd1f36033a7e43d620a2f791eef709fd62f2b9bcbfb04 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Advertise:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Advertise:index.html.twig", 1);
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
\t\t  Advertise / Offer Listing
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_addadvertise");
        echo "\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Advertise</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t\t";
        // line 37
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 38
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 39
                echo "\t\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t\t\t\t\t";
        }
        // line 42
        echo "\t\t\t\t\t";
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 43
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 44
                echo "\t\t\t\t\t\t\t<th>Image : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "\t\t\t\t\t";
        }
        echo "\t\t\t\t\t
\t\t\t\t<th>Start Date</th>
\t\t\t\t<th>End Date</th>
\t\t\t\t<th>Sort Order</th>
\t\t\t\t<th>Type</th>
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Opertation</th>
              </thead>
              <tbody>
                ";
        // line 55
        if (((isset($context["ad_details_all"]) || array_key_exists("ad_details_all", $context)) &&  !twig_test_empty(($context["ad_details_all"] ?? $this->getContext($context, "ad_details_all"))))) {
            // line 56
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["ad_details_all"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["ad_details_all"]) {
                // line 57
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
                // line 59
                if (($this->getAttribute($context["ad_details_all"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["ad_details_all"], "lang_wise", [])))) {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["ad_details_all"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["lang_data"]) {
                        // line 61
                        echo "\t\t\t\t\t\t\t\t\t<td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["lang_data"], "ad_name", []), "html", null, true);
                        echo "</td>
\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang_data'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 63
                    echo "\t\t\t\t\t\t\t";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                // line 65
                if (($this->getAttribute($context["ad_details_all"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["ad_details_all"], "lang_wise", [])))) {
                    // line 66
                    echo "\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["ad_details_all"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["lang_data"]) {
                        echo "\t
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t";
                        // line 68
                        if (($this->getAttribute($context["lang_data"], "media_url", []) != "")) {
                            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                            // line 69
                            echo twig_escape_filter($this->env, $this->getAttribute($context["lang_data"], "media_url", []), "html", null, true);
                            echo "\">\t\t\t
\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            // line 70
                            echo twig_escape_filter($this->env, $this->getAttribute($context["lang_data"], "media_url", []), "html", null, true);
                            echo "\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>\t
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t";
                        } else {
                            // line 73
                            echo "\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 75
                        echo "\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang_data'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "\t\t\t\t\t\t\t";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>";
                // line 79
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["ad_details_all"], "start_date", []), "d-m-Y"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 80
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["ad_details_all"], "end_date", []), "d-m-Y"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad_details_all"], "sort_order", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 82
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter($this->getAttribute($context["ad_details_all"], "advertise_type", []), "_", " ")), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                // line 85
                $context["checked"] = "";
                // line 86
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["ad_details_all"], "status", []) == "active")) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["checked"] = "checked";
                    // line 88
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 89
                echo "\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad_details_all"], "main_advertise_id", []), "html", null, true);
                echo ",\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 93
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_addadvertise", ["ad_id" => $this->getAttribute($context["ad_details_all"], "main_advertise_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 94
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_deleteadvertise", ["ad_id" => $this->getAttribute($context["ad_details_all"], "main_advertise_id", [])]), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ad_details_all'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "\t\t\t\t";
        }
        // line 99
        echo "              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t\t";
        // line 102
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 103
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 104
                echo "\t\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            echo "\t\t\t\t\t";
        }
        // line 107
        echo "\t\t\t\t\t";
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 108
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 109
                echo "\t\t\t\t\t\t\t<th>Image : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "\t\t\t\t\t";
        }
        echo "\t\t\t\t\t
\t\t\t\t<th>Start Date</th>
\t\t\t\t<th>End Date</th>
\t\t\t\t<th>Sort Order</th>
\t\t\t\t<th>Type</th>
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Opertation</th>
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

    // line 132
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 133
        echo "  <script>
  
\tfunction change_status(main_ad_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 137
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_changeadstatus");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_ad_id':main_ad_id,'status':status},
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
        return "AdminBundle:Advertise:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  403 => 137,  397 => 133,  391 => 132,  363 => 111,  354 => 109,  349 => 108,  346 => 107,  343 => 106,  334 => 104,  329 => 103,  327 => 102,  322 => 99,  319 => 98,  301 => 94,  297 => 93,  287 => 89,  284 => 88,  281 => 87,  278 => 86,  276 => 85,  270 => 82,  266 => 81,  262 => 80,  258 => 79,  252 => 77,  245 => 75,  241 => 73,  235 => 70,  231 => 69,  227 => 68,  219 => 66,  217 => 65,  211 => 63,  202 => 61,  197 => 60,  195 => 59,  191 => 58,  188 => 57,  170 => 56,  168 => 55,  155 => 46,  146 => 44,  141 => 43,  138 => 42,  135 => 41,  126 => 39,  121 => 38,  119 => 37,  109 => 30,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Advertise / Offer Listing
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
\t\t\t<a href=\"{{path('admin_advertise_addadvertise')}}\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Advertise</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t<th>Name : {{ language.language_name }}</th>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t<th>Image : {{ language.language_name }}</th>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% endif %}\t\t\t\t\t
\t\t\t\t<th>Start Date</th>
\t\t\t\t<th>End Date</th>
\t\t\t\t<th>Sort Order</th>
\t\t\t\t<th>Type</th>
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Opertation</th>
              </thead>
              <tbody>
                {%if ad_details_all is defined and ad_details_all is not empty%}
\t\t\t\t\t{%for ad_details_all in ad_details_all%}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t{% if ad_details_all.lang_wise is defined and ad_details_all.lang_wise is not empty %}
\t\t\t\t\t\t\t\t{% for lang_data in ad_details_all.lang_wise %}
\t\t\t\t\t\t\t\t\t<td>{{ lang_data.ad_name }}</td>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t{% if ad_details_all.lang_wise is defined and ad_details_all.lang_wise is not empty %}
\t\t\t\t\t\t\t\t{% for lang_data in ad_details_all.lang_wise %}\t
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t{%if lang_data.media_url != ''%}\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{lang_data.media_url}}\">\t\t\t
\t\t\t\t\t\t\t\t\t\t<img src=\"{{lang_data.media_url}}\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>\t
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>{{ad_details_all.start_date | date('d-m-Y')}}</td>
\t\t\t\t\t\t\t<td>{{ad_details_all.end_date | date('d-m-Y')}}</td>
\t\t\t\t\t\t\t<td>{{ad_details_all.sort_order }}</td>
\t\t\t\t\t\t\t<td>{{(ad_details_all.advertise_type | replace('_',' ') ) | capitalize }}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% set checked = ''%}
\t\t\t\t\t\t\t\t{% if ad_details_all.status == 'active'%}
\t\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status({{ad_details_all.main_advertise_id}},\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_advertise_addadvertise',{'ad_id':ad_details_all.main_advertise_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_advertise_deleteadvertise',{'ad_id':ad_details_all.main_advertise_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                 <th>No</th>
\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t<th>Name : {{ language.language_name }}</th>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if language_list is defined and language_list is not empty %}
\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t<th>Image : {{ language.language_name }}</th>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t{% endif %}\t\t\t\t\t
\t\t\t\t<th>Start Date</th>
\t\t\t\t<th>End Date</th>
\t\t\t\t<th>Sort Order</th>
\t\t\t\t<th>Type</th>
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Opertation</th>
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
  
\tfunction change_status(main_ad_id,status){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_advertise_changeadstatus')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_ad_id':main_ad_id,'status':status},
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
", "AdminBundle:Advertise:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Advertise/index.html.twig");
    }
}
