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

/* AdminBundle:Package:addPackage.html - Copy.twig */
class __TwigTemplate_3ea3ded8bd6fbbb8d09b6f9e4fc18b49f64e5d7b9264b25b42536d4badaa8390 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Package:addPackage.html - Copy.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Package:addPackage.html - Copy.twig", 1);
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
\t\t  Add Package
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
                        <h3 class=\"box-title\">Add / Update Package</h3>
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
            $context["main_package_master_id"] = 0;
            // line 56
            echo "\t\t\t\t\t\t";
            $context["package_meals"] = 0;
            // line 57
            echo "\t\t\t\t\t\t";
            $context["sort_order"] = 0;
            // line 58
            echo "\t\t\t\t\t\t";
            $context["package_snakes"] = "";
            // line 59
            echo "\t\t\t\t\t\t";
            $context["loyality_point"] = "";
            // line 60
            echo "\t\t\t\t\t\t";
            $context["price_starting_from"] = "";
            // line 61
            echo "\t\t\t\t\t\t";
            $context["sub_packages"] = null;
            // line 62
            echo "\t\t\t\t\t\t";
            $context["img"] = "";
            // line 63
            echo "
\t\t\t\t\t\t\t";
            // line 64
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
                // line 65
                echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 67
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_savepackage");
                // line 68
                echo "\t\t\t\t\t\t\t\t\t";
                $context["package_name"] = "";
                // line 69
                echo "\t\t\t\t\t\t\t\t\t";
                $context["description"] = "";
                // line 70
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 71
                if (((isset($context["main_package"]) || array_key_exists("main_package", $context)) &&  !twig_test_empty(($context["main_package"] ?? $this->getContext($context, "main_package"))))) {
                    // line 72
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                    // line 74
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_package"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_package"]) {
                        // line 75
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        $context["img"] = $this->getAttribute($context["main_package"], "img_url", []);
                        // line 76
                        echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                        // line 77
                        $context["main_package_master_id"] = $this->getAttribute($context["main_package"], "main_package_master_id", []);
                        // line 78
                        echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 79
                        if (($this->getAttribute($context["main_package"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 80
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 82
                            $context["package_meals"] = $this->getAttribute($context["main_package"], "package_meals", []);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_snakes"] = $this->getAttribute($context["main_package"], "package_snakes", []);
                            // line 84
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["price_starting_from"] = $this->getAttribute($context["main_package"], "price_starting_from", []);
                            // line 85
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_name"] = $this->getAttribute($context["main_package"], "package_name", []);
                            // line 86
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["sub_packages"] = $this->getAttribute($context["main_package"], "sub_package", []);
                            // line 87
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["description"] = $this->getAttribute($context["main_package"], "description", []);
                            // line 88
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["sort_order"] = $this->getAttribute($context["main_package"], "sort_order", []);
                            // line 89
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["loyality_point"] = $this->getAttribute($context["main_package"], "loyality_point", []);
                            // line 90
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 91
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_package'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 93
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"";
                // line 96
                echo twig_escape_filter($this->env, ($context["main_package_master_id"] ?? $this->getContext($context, "main_package_master_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"package_name\" value=\"";
                // line 105
                echo twig_escape_filter($this->env, ($context["package_name"] ?? $this->getContext($context, "package_name")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Description</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea id=\"editor1\" class=\"ckeditor\" name=\"description\">";
                // line 117
                echo twig_escape_filter($this->env, ($context["description"] ?? $this->getContext($context, "description")), "html", null, true);
                echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Meal</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" name=\"package_meals\" value=\"";
                // line 130
                echo twig_escape_filter($this->env, ($context["package_meals"] ?? $this->getContext($context, "package_meals")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Snakes</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" name=\"package_snakes\" value=\"";
                // line 136
                echo twig_escape_filter($this->env, ($context["package_snakes"] ?? $this->getContext($context, "package_snakes")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Loyality Point</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"point\" value=\"";
                // line 149
                echo twig_escape_filter($this->env, ($context["loyality_point"] ?? $this->getContext($context, "loyality_point")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Priority</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"sort_order\" value=\"";
                // line 161
                echo twig_escape_filter($this->env, ($context["sort_order"] ?? $this->getContext($context, "sort_order")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' class=\"form-control about_img\" name=\"about_img\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                // line 178
                if (((isset($context["img"]) || array_key_exists("img", $context)) && (($context["img"] ?? $this->getContext($context, "img")) != ""))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.about_img').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                    // line 183
                    echo twig_escape_filter($this->env, ($context["img"] ?? $this->getContext($context, "img")), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 184
                    echo twig_escape_filter($this->env, ($context["img"] ?? $this->getContext($context, "img")), "html", null, true);
                    echo "\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 188
                echo " 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Duration</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 197
                if (((isset($context["product_for"]) || array_key_exists("product_for", $context)) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                    // line 198
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["product_for"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["product_for"]) {
                        // line 199
                        echo "                                                    ";
                        if (($this->getAttribute($context["product_for"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 200
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["this_check"] = "";
                            // line 201
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["this_price"] = "";
                            // line 202
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 203
                            if (($this->getAttribute($context["product_for"], "package_for_relation_id", []) != null)) {
                                // line 204
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["this_check"] = "checked";
                                // line 205
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["this_price"] = $this->getAttribute($context["product_for"], "price_selected", []);
                                // line 206
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 208
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 209
                            if (($this->getAttribute($context["product_for"], "type", []) == "package_for")) {
                                // line 210
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"checkbox-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"checkbox\" name=\"package_for[]\" value=\"";
                                // line 212
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "main_package_for_master_id", []), "html", null, true);
                                echo "\" ";
                                echo twig_escape_filter($this->env, ($context["this_check"] ?? $this->getContext($context, "this_check")), "html", null, true);
                                echo ">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name", []), "html", null, true);
                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"price[";
                                // line 214
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "main_package_for_master_id", []), "html", null, true);
                                echo "]\" class=\"form-control\" placeholder=\"Price\" value=\"";
                                echo twig_escape_filter($this->env, ($context["this_price"] ?? $this->getContext($context, "this_price")), "html", null, true);
                                echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 217
                            echo "                                                        ";
                        }
                        // line 218
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_for'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 219
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
                                       ";
                // line 261
                echo "\t\t\t\t\t\t\t\t\t\t<h4>Sub Packages : </h4>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-1\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 263
                if (((isset($context["sub_packages"]) || array_key_exists("sub_packages", $context)) &&  !twig_test_empty(($context["sub_packages"] ?? $this->getContext($context, "sub_packages"))))) {
                    // line 264
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["sub_packages"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["sub_packages"]) {
                        // line 265
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"first_one\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Grams </label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"grams[]\" value=\"";
                        // line 271
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "grams", []), "html", null, true);
                        echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Monthly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_month[]\" value=\"";
                        // line 278
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "monthly", []), "html", null, true);
                        echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Weekly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_week[]\" value=\"";
                        // line 286
                        echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "weekly", []), "html", null, true);
                        echo "\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_packages'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 292
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 293
                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"first_one\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Grams </label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"grams[]\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Monthly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_month[]\" value=\"\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Weekly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_week[]\" value=\"\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 319
                echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this))\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 330
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 332
                if (((isset($context["about_us"]) || array_key_exists("about_us", $context)) &&  !twig_test_empty(($context["about_us"] ?? $this->getContext($context, "about_us"))))) {
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
            // line 343
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 348
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

    // line 361
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 362
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
        return "AdminBundle:Package:addPackage.html - Copy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  698 => 362,  692 => 361,  674 => 348,  667 => 343,  638 => 332,  633 => 330,  620 => 319,  592 => 293,  589 => 292,  577 => 286,  566 => 278,  556 => 271,  548 => 265,  543 => 264,  541 => 263,  537 => 261,  526 => 219,  520 => 218,  517 => 217,  509 => 214,  500 => 212,  496 => 210,  494 => 209,  491 => 208,  487 => 206,  484 => 205,  481 => 204,  479 => 203,  476 => 202,  473 => 201,  470 => 200,  467 => 199,  462 => 198,  460 => 197,  449 => 188,  441 => 184,  437 => 183,  429 => 178,  409 => 161,  394 => 149,  378 => 136,  369 => 130,  353 => 117,  338 => 105,  327 => 97,  323 => 96,  316 => 94,  313 => 93,  310 => 92,  304 => 91,  301 => 90,  298 => 89,  295 => 88,  292 => 87,  289 => 86,  286 => 85,  283 => 84,  280 => 83,  278 => 82,  274 => 80,  272 => 79,  269 => 78,  267 => 77,  264 => 76,  261 => 75,  257 => 74,  253 => 72,  251 => 71,  248 => 70,  245 => 69,  242 => 68,  240 => 67,  230 => 65,  213 => 64,  210 => 63,  207 => 62,  204 => 61,  201 => 60,  198 => 59,  195 => 58,  192 => 57,  189 => 56,  187 => 55,  180 => 50,  177 => 49,  158 => 46,  145 => 45,  127 => 44,  125 => 43,  121 => 41,  119 => 40,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Add Package
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
                        <h3 class=\"box-title\">Add / Update Package</h3>
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
\t\t\t\t\t\t{% set main_package_master_id = 0 %}
\t\t\t\t\t\t{% set package_meals = 0 %}
\t\t\t\t\t\t{% set sort_order = 0 %}
\t\t\t\t\t\t{% set package_snakes = '' %}
\t\t\t\t\t\t{% set loyality_point = '' %}
\t\t\t\t\t\t{% set price_starting_from = '' %}
\t\t\t\t\t\t{% set sub_packages = null %}
\t\t\t\t\t\t{% set img = '' %}

\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_package_savepackage') %}
\t\t\t\t\t\t\t\t\t{% set package_name = '' %}
\t\t\t\t\t\t\t\t\t{% set description = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% if main_package is defined and main_package is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for main_package in main_package %}
\t\t\t\t\t\t\t\t\t\t{%set img = main_package.img_url%}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% set main_package_master_id = main_package.main_package_master_id %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% if main_package.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_meals = main_package.package_meals %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_snakes = main_package.package_snakes %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set price_starting_from = main_package.price_starting_from %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_name = main_package.package_name %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set sub_packages = main_package.sub_package %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set description = main_package.description %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set sort_order = main_package.sort_order %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set loyality_point = main_package.loyality_point%}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_package_master_id\" value=\"{{ main_package_master_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"package_name\" value=\"{{package_name}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Description</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea id=\"editor1\" class=\"ckeditor\" name=\"description\">{{ description }}</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Meal</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" name=\"package_meals\" value=\"{{package_meals}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Snakes</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"number\" class=\"form-control\" name=\"package_snakes\" value=\"{{package_snakes}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Loyality Point</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"point\" value=\"{{loyality_point}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Priority</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"sort_order\" value=\"{{sort_order}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' class=\"form-control about_img\" name=\"about_img\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{%if img is defined and img != ''%}\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.about_img').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{img}}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{img}}\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t{%endif%} 
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Duration</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t{% if product_for is defined and product_for is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%for product_for in product_for%}
                                                    {% if product_for.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_check = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_price = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if product_for.package_for_relation_id != null%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_check = 'checked' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_price = product_for.price_selected %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if product_for.type == 'package_for'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"checkbox-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"checkbox\" name=\"package_for[]\" value=\"{{product_for.main_package_for_master_id}}\" {{this_check}}>{{product_for.name}}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"price[{{product_for.main_package_for_master_id}}]\" class=\"form-control\" placeholder=\"Price\" value=\"{{this_price}}\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
                                                        {% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t
                                       {#                                                
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Package Consultancy</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t\t{% if product_for is defined and product_for is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%for product_for in product_for%}
                                                    {% if product_for.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_check = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_price = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if product_for.type == 'consultant_fee'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if product_for.package_for_relation_id != null%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_check = 'checked' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set this_price = product_for.price_selected %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"checkbox-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"checkbox\" name=\"package_for[]\" value=\"{{product_for.main_package_for_master_id}}\" {{this_check}}>{{product_for.name}}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\"  name=\"price[{{product_for.main_package_for_master_id}}]\" value=\"{{this_price}}\" placeholder=\"Price\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
                                                        {% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>\t#}
\t\t\t\t\t\t\t\t\t\t<h4>Sub Packages : </h4>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-1\">
\t\t\t\t\t\t\t\t\t\t\t{%if sub_packages is defined and sub_packages is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t{%for sub_packages in sub_packages %}
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"first_one\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Grams </label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"grams[]\" value=\"{{sub_packages.grams}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Monthly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_month[]\" value=\"{{sub_packages.monthly}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Weekly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_week[]\" value=\"{{sub_packages.weekly}}\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t{%else%}
\t\t\t\t\t\t\t\t\t\t\t<div class=\"first_one\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Grams </label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"grams[]\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Monthly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_month[]\" value=\"\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Price Weekly</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='number' class=\"form-control\" name=\"price_sub_week[]\" value=\"\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>\t\t
\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this))\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if about_us is defined and about_us is not empty %}Update{%else%}Save{%endif%}\t
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
{% endblock %}", "AdminBundle:Package:addPackage.html - Copy.twig", "/var/www/admin/src/AdminBundle/Resources/views/Package/addPackage.html - Copy.twig");
    }
}
