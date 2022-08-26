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

/* AdminBundle:Area:addarea.html.twig */
class __TwigTemplate_d0195ca3f8d428e30410e9cc3ba65a851ba59d3fa94b6012f2473ee29638f0b4 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Area:addarea.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Area:addarea.html.twig", 1);
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
\t\t\tAdd - Update Area
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
\t\t<div class=\"row\">
\t\t\t<div class=\"col-md-12\">
\t\t\t\t<div class=\"box box-primary\">
\t\t\t\t\t
\t\t\t\t\t<!-- box header -->
\t\t\t\t\t<div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Area</h3>
                        <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
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
            $context["main_area_id"] = 0;
            // line 56
            echo "\t\t\t\t\t\t\t";
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
                // line 57
                echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 59
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_area_savearea", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]);
                // line 60
                echo "\t\t\t\t\t\t\t\t\t";
                $context["area_name"] = "";
                // line 61
                echo "\t\t\t\t\t\t\t\t\t";
                $context["city_selected"] = "";
                // line 62
                echo "\t\t\t\t\t\t\t\t\t";
                $context["pincode"] = "";
                // line 63
                echo "\t\t\t\t\t\t\t\t\t";
                $context["delivery_charge"] = "";
                // line 64
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 65
                if (((isset($context["area"]) || array_key_exists("area", $context)) &&  !twig_test_empty(($context["area"] ?? $this->getContext($context, "area"))))) {
                    // line 66
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                    // line 67
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["area"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["area"]) {
                        // line 68
                        echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 69
                        if (($this->getAttribute($context["area"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 70
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["main_area_id"] = $this->getAttribute($context["area"], "main_area_id", []);
                            // line 71
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["area_name"] = $this->getAttribute($context["area"], "area_name", []);
                            // line 72
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["city_selected"] = $this->getAttribute($context["area"], "city_id", []);
                            // line 73
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 74
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["pincode"] = $this->getAttribute($context["area"], "pincode", []);
                        // line 75
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["delivery_charge"] = $this->getAttribute($context["area"], "delivery_charge", []);
                        // line 76
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['area'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 78
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_area_id\" value=\"";
                // line 81
                echo twig_escape_filter($this->env, ($context["main_area_id"] ?? $this->getContext($context, "main_area_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Area Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"area_name";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"area_name\" value=\"";
                echo twig_escape_filter($this->env, ($context["area_name"] ?? $this->getContext($context, "area_name")), "html", null, true);
                echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Governorate</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"city_";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"city\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Governorate</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 105
                if (((isset($context["city_list"]) || array_key_exists("city_list", $context)) &&  !twig_test_empty(($context["city_list"] ?? $this->getContext($context, "city_list"))))) {
                    // line 106
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["city_list"] ?? $this->getContext($context, "city_list")));
                    foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
                        // line 107
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["city"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 108
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["city"], "main_city_master_id", []), "html", null, true);
                            echo "\" ";
                            if ((($context["city_selected"] ?? $this->getContext($context, "city_selected")) == $this->getAttribute($context["city"], "main_city_master_id", []))) {
                                echo "selected";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["city"], "city_name", []), "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 110
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 111
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Pincode</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" id=\"pincode";
                // line 125
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"pincode\" value=\"";
                echo twig_escape_filter($this->env, ($context["pincode"] ?? $this->getContext($context, "pincode")), "html", null, true);
                echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Delivery Charge</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"delivery_charge";
                // line 136
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"delivery_charge\" value=\"";
                echo twig_escape_filter($this->env, ($context["delivery_charge"] ?? $this->getContext($context, "delivery_charge")), "html", null, true);
                echo "\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 144
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 146
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
            // line 157
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 162
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

    // line 175
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 176
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t})
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Area:addarea.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  466 => 176,  460 => 175,  442 => 162,  435 => 157,  406 => 146,  401 => 144,  388 => 136,  372 => 125,  354 => 111,  348 => 110,  336 => 108,  333 => 107,  328 => 106,  326 => 105,  321 => 103,  304 => 91,  292 => 82,  288 => 81,  281 => 79,  278 => 78,  275 => 77,  269 => 76,  266 => 75,  263 => 74,  260 => 73,  257 => 72,  254 => 71,  251 => 70,  249 => 69,  246 => 68,  242 => 67,  239 => 66,  237 => 65,  234 => 64,  231 => 63,  228 => 62,  225 => 61,  222 => 60,  220 => 59,  210 => 57,  192 => 56,  190 => 55,  183 => 50,  180 => 49,  161 => 46,  148 => 45,  130 => 44,  128 => 43,  124 => 41,  122 => 40,  113 => 34,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t\tAdd - Update Area
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
                        <h3 class=\"box-title\">Add / Update Area</h3>
                        <a href=\"{{ path('admin_area_index', {'domain': app.session.get('domain')}) }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>\t\t\t\t\t\t
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
\t\t\t\t\t\t{% set main_area_id = 0 %}
\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_area_savearea',{'domain':app.session.get('domain')}) %}
\t\t\t\t\t\t\t\t\t{% set area_name = '' %}
\t\t\t\t\t\t\t\t\t{% set city_selected = '' %}
\t\t\t\t\t\t\t\t\t{% set pincode = '' %}
\t\t\t\t\t\t\t\t\t{% set delivery_charge = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if area is defined and area is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for area in area %}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% if area.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_area_id = area.main_area_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set area_name = area.area_name %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set city_selected = area.city_id %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t{% set pincode = area.pincode %}
\t\t\t\t\t\t\t\t\t\t\t{% set delivery_charge = area.delivery_charge %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_area_id\" value=\"{{ main_area_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Area Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"area_name{{language.language_master_id}}\" name=\"area_name\" value=\"{{area_name}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Governorate</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" id=\"city_{{language.language_master_id}}\" name=\"city\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Governorate</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if city_list is defined and city_list is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for city in city_list %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if city.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ city.main_city_master_id }}\" {%if city_selected == city.main_city_master_id%}selected{%endif%}>{{ city.city_name }}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Pincode</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" id=\"pincode{{language.language_master_id}}\" name=\"pincode\" value=\"{{pincode}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t

\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Delivery Charge</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" id=\"delivery_charge{{language.language_master_id}}\" name=\"delivery_charge\" value=\"{{delivery_charge}}\" required>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
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

<script>\t
\t\$(function () {
\t\t\$('.editor1cls').each(function(e){
\t\t\tCKEDITOR.replace( this.id);
\t\t});
\t})
</script>\t
{%endblock%}", "AdminBundle:Area:addarea.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Area/addarea.html.twig");
    }
}
