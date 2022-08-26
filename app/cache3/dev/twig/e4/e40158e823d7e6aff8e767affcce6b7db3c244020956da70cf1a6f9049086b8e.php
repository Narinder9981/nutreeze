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

/* AdminBundle:Advertise:addAdvertise.html.twig */
class __TwigTemplate_2e880a4786ae97c56bb226f97261da27072fcbbc2c0af61db0d952a3db23354c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'css' => [$this, 'block_css'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Advertise:addAdvertise.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Advertise:addAdvertise.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        echo "\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t\tAdd - Update Advertise / Offer
\t\t</h1>
\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 18
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 20
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 24
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 26
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t\t
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Advertise</h3>
                        <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
                    </div>
\t\t\t\t\t<!-- end: box header -->
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t<div class=\"box-body\">
\t\t\t\t\t";
        // line 43
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 44
            echo "\t\t\t\t\t\t<div class=\"nav-tabs-custom\">
                            <ul class=\"nav nav-tabs\">
                                ";
            // line 46
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 47
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
                    // line 48
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
                    // line 49
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
                // line 52
                echo "                                ";
            }
            // line 53
            echo "                            </ul>
                        </div>
\t\t\t\t\t\t
\t\t\t\t\t\t<!-- tab-content -->
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t";
            // line 58
            $context["main_advertise_id"] = 0;
            // line 59
            echo "\t\t\t\t\t\t\t";
            $context["start_date"] = "";
            // line 60
            echo "\t\t\t\t\t\t\t";
            $context["end_date"] = "";
            // line 61
            echo "\t\t\t\t\t\t\t";
            $context["status"] = "";
            // line 62
            echo "\t\t\t\t\t\t\t";
            $context["sort_order"] = 0;
            // line 63
            echo "\t\t\t\t\t\t\t";
            $context["advertise_name"] = "";
            // line 64
            echo "\t\t\t\t\t\t\t";
            $context["advertise_type"] = "advertise";
            // line 65
            echo "\t\t\t\t\t\t\t";
            $context["image"] = "";
            // line 66
            echo "\t\t\t\t\t\t\t";
            $context["advertise_type_ar"] = [0 => "advertise", 1 => "offer"];
            // line 67
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 68
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
                // line 69
                echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 71
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_advertise_saveadvertise");
                // line 72
                echo "\t\t\t\t\t\t\t\t\t";
                $context["advertise_name"] = "";
                // line 73
                echo "\t\t\t\t\t\t\t\t\t";
                $context["image"] = "";
                // line 74
                echo "\t\t\t\t\t\t\t\t\t";
                $context["advertisement_link"] = "";
                // line 75
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 76
                if (((isset($context["ad_details"]) || array_key_exists("ad_details", $context)) &&  !twig_test_empty(($context["ad_details"] ?? $this->getContext($context, "ad_details"))))) {
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                    // line 78
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["ad_details"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["ad_details"]) {
                        // line 79
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["main_advertise_id"] = $this->getAttribute($context["ad_details"], "main_advertise_id", []);
                        echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 80
                        if (($this->getAttribute($context["ad_details"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 82
                            $context["advertise_name"] = $this->getAttribute($context["ad_details"], "advertise_name", []);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["image"] = $this->getAttribute($context["ad_details"], "media_url", []);
                            // line 84
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["status"] = $this->getAttribute($context["ad_details"], "status", []);
                            // line 85
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["sort_order"] = $this->getAttribute($context["ad_details"], "sort_order", []);
                            // line 86
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["advertisement_link"] = $this->getAttribute($context["ad_details"], "advertisement_link", []);
                            // line 87
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["advertise_type"] = $this->getAttribute($context["ad_details"], "advertise_type", []);
                            // line 88
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["start_date"] = twig_date_format_filter($this->env, $this->getAttribute($context["ad_details"], "start_date", []), "d-m-Y");
                            // line 89
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["end_date"] = twig_date_format_filter($this->env, $this->getAttribute($context["ad_details"], "end_date", []), "d-m-Y");
                            // line 90
                            echo "\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 92
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ad_details'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 93
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 94
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-";
                // line 95
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_advertise_id\" value=\"";
                // line 97
                echo twig_escape_filter($this->env, ($context["main_advertise_id"] ?? $this->getContext($context, "main_advertise_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"advertise_name";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"advertise_name\" value=\"";
                echo twig_escape_filter($this->env, ($context["advertise_name"] ?? $this->getContext($context, "advertise_name")), "html", null, true);
                echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Link</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"advertisement_link";
                // line 118
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"advertisement_link\" value=\"";
                echo twig_escape_filter($this->env, ($context["advertisement_link"] ?? $this->getContext($context, "advertisement_link")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Image</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"ad_image\" class=\"form-control\" id=\"img_";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                // line 134
                if (((isset($context["image"]) || array_key_exists("image", $context)) && (($context["image"] ?? $this->getContext($context, "image")) != ""))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('#img_";
                    // line 136
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                    echo "').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                    // line 139
                    echo twig_escape_filter($this->env, ($context["image"] ?? $this->getContext($context, "image")), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 140
                    echo twig_escape_filter($this->env, ($context["image"] ?? $this->getContext($context, "image")), "html", null, true);
                    echo "\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 144
                echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"advertise_type\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 153
                if (((isset($context["advertise_type_ar"]) || array_key_exists("advertise_type_ar", $context)) &&  !twig_test_empty(($context["advertise_type_ar"] ?? $this->getContext($context, "advertise_type_ar"))))) {
                    // line 154
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["advertise_type_ar"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["advertise_type_ar"]) {
                        // line 155
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_escape_filter($this->env, $context["advertise_type_ar"], "html", null, true);
                        echo "\" ";
                        if ((($context["advertise_type"] ?? $this->getContext($context, "advertise_type")) == $context["advertise_type_ar"])) {
                            echo " selected";
                        }
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 156
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter($context["advertise_type_ar"], "_", " ")), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['advertise_type_ar'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 159
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 160
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control date-picker\" id=\"img_";
                // line 171
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, ($context["start_date"] ?? $this->getContext($context, "start_date")), "html", null, true);
                echo "\" name=\"start_date\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control date-picker\" id=\"img_";
                // line 177
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, ($context["end_date"] ?? $this->getContext($context, "end_date")), "html", null, true);
                echo "\" name=\"end_date\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Sort order</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" id=\"img_";
                // line 188
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, ($context["sort_order"] ?? $this->getContext($context, "sort_order")), "html", null, true);
                echo "\" name=\"sort_order\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 193
                $context["active_check"] = "";
                // line 194
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["inactive_check"] = "";
                // line 195
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((($context["status"] ?? $this->getContext($context, "status")) == "active")) {
                    // line 196
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["active_check"] = "checked";
                    // line 197
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 198
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((($context["status"] ?? $this->getContext($context, "status")) == "inactive")) {
                    // line 199
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["inactive_check"] = "checked";
                    // line 200
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"active\" ";
                // line 203
                echo twig_escape_filter($this->env, ($context["active_check"] ?? $this->getContext($context, "active_check")), "html", null, true);
                echo ">Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"inactive\" ";
                // line 206
                echo twig_escape_filter($this->env, ($context["inactive_check"] ?? $this->getContext($context, "inactive_check")), "html", null, true);
                echo ">Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 215
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 217
                if (((isset($context["area"]) || array_key_exists("area", $context)) &&  !twig_test_empty(($context["area"] ?? $this->getContext($context, "area"))))) {
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
            // line 228
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 233
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

    // line 246
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 247
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js\"></script>

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t\t
\t\t\$('.date-picker').datepicker();
\t\t
\t})
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Advertise:addAdvertise.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  618 => 247,  612 => 246,  594 => 233,  587 => 228,  558 => 217,  553 => 215,  541 => 206,  535 => 203,  528 => 200,  525 => 199,  522 => 198,  519 => 197,  516 => 196,  513 => 195,  510 => 194,  508 => 193,  498 => 188,  482 => 177,  471 => 171,  458 => 160,  455 => 159,  446 => 156,  437 => 155,  432 => 154,  430 => 153,  419 => 144,  411 => 140,  407 => 139,  401 => 136,  396 => 134,  388 => 129,  372 => 118,  356 => 107,  344 => 98,  340 => 97,  333 => 95,  330 => 94,  327 => 93,  321 => 92,  317 => 90,  314 => 89,  311 => 88,  308 => 87,  305 => 86,  302 => 85,  299 => 84,  296 => 83,  294 => 82,  291 => 81,  289 => 80,  284 => 79,  280 => 78,  277 => 77,  275 => 76,  272 => 75,  269 => 74,  266 => 73,  263 => 72,  261 => 71,  251 => 69,  234 => 68,  231 => 67,  228 => 66,  225 => 65,  222 => 64,  219 => 63,  216 => 62,  213 => 61,  210 => 60,  207 => 59,  205 => 58,  198 => 53,  195 => 52,  176 => 49,  163 => 48,  145 => 47,  143 => 46,  139 => 44,  137 => 43,  128 => 37,  118 => 29,  109 => 26,  105 => 24,  100 => 23,  91 => 20,  87 => 18,  83 => 17,  76 => 13,  67 => 6,  61 => 5,  53 => 3,  47 => 2,  31 => 1,);
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
{% block css%}
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css\">
{% endblock%}
{% block content %}
\t<section class=\"content-header\">
\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t\tAdd - Update Advertise / Offer
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
                        <h3 class=\"box-title\">Add / Update Advertise</h3>
                        <a href=\"{{ path('admin_advertise_index', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
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
\t\t\t\t\t\t\t{% set main_advertise_id = 0 %}
\t\t\t\t\t\t\t{% set start_date = '' %}
\t\t\t\t\t\t\t{% set end_date = '' %}
\t\t\t\t\t\t\t{% set status = '' %}
\t\t\t\t\t\t\t{% set sort_order = 0 %}
\t\t\t\t\t\t\t{% set advertise_name = '' %}
\t\t\t\t\t\t\t{% set advertise_type = 'advertise' %}
\t\t\t\t\t\t\t{% set image = '' %}
\t\t\t\t\t\t\t{% set advertise_type_ar = ['advertise','offer'] %}
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_advertise_saveadvertise') %}
\t\t\t\t\t\t\t\t\t{% set advertise_name = '' %}
\t\t\t\t\t\t\t\t\t{% set image = '' %}
\t\t\t\t\t\t\t\t\t{% set advertisement_link = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if ad_details is defined and ad_details is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for ad_details in ad_details %}
\t\t\t\t\t\t\t\t\t\t\t{% set main_advertise_id = ad_details.main_advertise_id %}\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% if ad_details.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set advertise_name = ad_details.advertise_name %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set image = ad_details.media_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set status = ad_details.status %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set sort_order = ad_details.sort_order %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set advertisement_link = ad_details.advertisement_link %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set advertise_type = ad_details.advertise_type %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set start_date = ad_details.start_date | date('d-m-Y') %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set end_date = ad_details.end_date | date('d-m-Y') %}
\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_advertise_id\" value=\"{{ main_advertise_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"advertise_name{{language.language_master_id}}\" name=\"advertise_name\" value=\"{{advertise_name}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Link</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"advertisement_link{{language.language_master_id}}\" name=\"advertisement_link\" value=\"{{advertisement_link}}\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Advertise Image</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"ad_image\" class=\"form-control\" id=\"img_{{language.language_master_id}}\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{%if image is defined and image != ''%}\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('#img_{{language.language_master_id}}').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{image}}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{image}}\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{%endif%} 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Select Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"advertise_type\" class=\"form-control\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if advertise_type_ar is defined and advertise_type_ar is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for advertise_type_ar in advertise_type_ar%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{advertise_type_ar}}\" {%if advertise_type == advertise_type_ar %} selected{%endif%}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{(advertise_type_ar | replace('_',' ')) | capitalize}}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control date-picker\" id=\"img_{{language.language_master_id}}\" value=\"{{start_date}}\" name=\"start_date\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Start Date</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control date-picker\" id=\"img_{{language.language_master_id}}\" value=\"{{end_date}}\" name=\"end_date\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Sort order</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" id=\"img_{{language.language_master_id}}\" value=\"{{sort_order}}\" name=\"sort_order\" required=\"required\">
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{%set active_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{%set inactive_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if status == 'active'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%set active_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if status == 'inactive'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%set inactive_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"active\" {{active_check}}>Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"status\" value=\"inactive\" {{inactive_check}}>Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if area is defined and area is not empty %}Update{%else%}Save{%endif%}\t
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
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js\"></script>

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t\t
\t\t\$('.date-picker').datepicker();
\t\t
\t})
</script>\t
{%endblock%}", "AdminBundle:Advertise:addAdvertise.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Advertise/addAdvertise.html.twig");
    }
}
