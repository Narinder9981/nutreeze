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

/* AdminBundle:Product:addProduct.html - Copy.twig */
class __TwigTemplate_57d7df76cbe16e28397148b506f78a874cf17d376d0d0f4b40b466b366f7f56e extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Product:addProduct.html - Copy.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Product:addProduct.html - Copy.twig", 1);
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
\t\t  Add Product
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
                        <h3 class=\"box-title\">Add / Update Product</h3>
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
            $context["main_product_master_id"] = 0;
            // line 56
            echo "\t\t\t\t\t\t";
            $context["main_product_category_id"] = 0;
            // line 57
            echo "\t\t\t\t\t\t";
            $context["product_image"] = "";
            // line 58
            echo "\t\t\t\t\t\t";
            $context["product_status"] = "";
            // line 59
            echo "\t\t\t\t\t\t";
            $context["product_combo"] = null;
            // line 60
            echo "\t\t\t\t\t\t";
            $context["product_combo1"] = null;
            // line 61
            echo "\t\t\t\t\t\t";
            $context["package_ids"] = null;
            // line 62
            echo "\t\t\t\t\t\t";
            $context["product_nutrition"] = "";
            // line 63
            echo "\t\t\t\t\t\t";
            $context["style_dis"] = "";
            // line 64
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t\t";
            // line 65
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
                // line 66
                echo "\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 68
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_saveproduct");
                // line 69
                echo "\t\t\t\t\t\t\t\t\t";
                $context["product_name"] = "";
                // line 70
                echo "\t\t\t\t\t\t\t\t\t";
                $context["product_description"] = "";
                // line 71
                echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 72
                $context["package_id"] = "";
                // line 73
                echo "\t\t\t\t\t\t\t\t\t";
                if (((isset($context["main_product"]) || array_key_exists("main_product", $context)) &&  !twig_test_empty(($context["main_product"] ?? $this->getContext($context, "main_product"))))) {
                    // line 74
                    echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                    // line 75
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_product"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_product"]) {
                        // line 76
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["main_product"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 77
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 78
                            $context["main_product_master_id"] = $this->getAttribute($context["main_product"], "main_product_master_id", []);
                            // line 79
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["main_product_category_id"] = $this->getAttribute($context["main_product"], "main_product_category_id", []);
                            // line 80
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_image"] = $this->getAttribute($context["main_product"], "img_url", []);
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_status"] = $this->getAttribute($context["main_product"], "product_status", []);
                            // line 82
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_name"] = $this->getAttribute($context["main_product"], "product_name", []);
                            // line 83
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_combo"] = $this->getAttribute($context["main_product"], "new_combo", []);
                            // line 84
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_combo1"] = $this->getAttribute($context["main_product"], "product_combo1", []);
                            // line 85
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_id"] = $this->getAttribute($context["main_product"], "package_id", []);
                            // line 86
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_description"] = $this->getAttribute($context["main_product"], "product_description", []);
                            // line 87
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["product_nutrition"] = $this->getAttribute($context["main_product"], "product_nutrition", []);
                            // line 88
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["package_ids"] = $this->getAttribute($context["main_product"], "package_ids", []);
                            // line 89
                            echo "\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 91
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 93
                echo "
\t\t\t\t\t\t\t\t\t<form id=\"form-";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_product_master_id\" value=\"";
                // line 96
                echo twig_escape_filter($this->env, ($context["main_product_master_id"] ?? $this->getContext($context, "main_product_master_id")), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"product_name\" value=\"";
                // line 105
                echo twig_escape_filter($this->env, ($context["product_name"] ?? $this->getContext($context, "product_name")), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
";
                // line 122
                echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"product_description\" value=\"\"/>
\t\t\t\t\t\t\t\t\t\t</br>\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Nutrition Value</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea id=\"editor1\" class=\"ckeditor\" name=\"product_nutrition\">";
                // line 130
                echo twig_escape_filter($this->env, ($context["product_nutrition"] ?? $this->getContext($context, "product_nutrition")), "html", null, true);
                echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"product_package\"  name=\"product_package[]\" class=\"form-control\" multiple required onchange=\"getSubpackage(\$(this).val)\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">--select package--</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 145
                if ( !twig_test_empty(($context["package"] ?? $this->getContext($context, "package")))) {
                    // line 146
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t   ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["package"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["package"]) {
                        // line 147
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t   ";
                        if (($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["package"], "language_id", []))) {
                            // line 148
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (twig_in_filter($this->getAttribute($context["package"], "main_package_master_id", []), ($context["package_ids"] ?? $this->getContext($context, "package_ids")))) {
                                echo "selected";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "package_name", []), "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 150
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 151
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 152
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Meal Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"main_product_category_id\" class=\"form-control\" id=\"meal_type\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Meal type</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 166
                if (((isset($context["product_cat"]) || array_key_exists("product_cat", $context)) &&  !twig_test_empty(($context["product_cat"] ?? $this->getContext($context, "product_cat"))))) {
                    // line 167
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["product_cat"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["product_cat"]) {
                        // line 168
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($context["product_cat"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 169
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_cat"], "main_product_category_master_id", []), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute($context["product_cat"], "main_product_category_master_id", []) == ($context["main_product_category_id"] ?? $this->getContext($context, "main_product_category_id")))) {
                                echo " selected";
                            }
                            echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 170
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_cat"], "product_category_name", []), "html", null, true);
                            echo "\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 172
                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_cat'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 174
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 175
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<em>*</em><label>Select Meal type breakfast for Raw Egg and Egg white</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div id=\"b_combo\" ";
                // line 193
                if ((($context["main_product_category_id"] ?? $this->getContext($context, "main_product_category_id")) == 1)) {
                    echo "style=\"display:block;\"";
                }
                echo ">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                // line 195
                if ((($context["main_product_category_id"] ?? $this->getContext($context, "main_product_category_id")) == 1)) {
                    // line 196
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (((isset($context["product_combo"]) || array_key_exists("product_combo", $context)) &&  !twig_test_empty(($context["product_combo"] ?? $this->getContext($context, "product_combo"))))) {
                        // line 197
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 198
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["product_combo"] ?? $this->getContext($context, "product_combo")));
                        foreach ($context['_seq'] as $context["_key"] => $context["product_combo1"]) {
                            // line 199
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class='col-md-12 form-group'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>";
                            // line 202
                            echo twig_escape_filter($this->env, (($this->getAttribute($context["product_combo1"], "package_name", [], "array") . "-") . $this->getAttribute($context["product_combo1"], "grams", [], "array")), "html", null, true);
                            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 205
                            $context["raw_eggs_selected"] = "";
                            // line 206
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["white_eggs_selected"] = "";
                            // line 207
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($context["product_combo1"], "prot_type", [], "array") == "raw_eggs")) {
                                // line 208
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["raw_eggs_selected"] = "checked";
                                // line 209
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            } else {
                                // line 210
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["white_eggs_selected"] = "checked";
                                // line 211
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 212
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='id1-";
                            // line 214
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "sub_pakage_id", [], "array"), "html", null, true);
                            echo "' type='radio' name='radio-";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "idList", [], "array"), "html", null, true);
                            echo "' value='raw_eggs' ";
                            echo twig_escape_filter($this->env, ($context["raw_eggs_selected"] ?? $this->getContext($context, "raw_eggs_selected")), "html", null, true);
                            echo ">&nbsp;&nbsp;

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"id1-";
                            // line 216
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "sub_pakage_id", [], "array"), "html", null, true);
                            echo "\">Raw Eggs</label> &nbsp;&nbsp;&nbsp;

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='id2-";
                            // line 218
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "sub_pakage_id", [], "array"), "html", null, true);
                            echo "' type='radio' name='radio-";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "idList", [], "array"), "html", null, true);
                            echo "' value='white_eggs' ";
                            echo twig_escape_filter($this->env, ($context["white_eggs_selected"] ?? $this->getContext($context, "white_eggs_selected")), "html", null, true);
                            echo ">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"id2-";
                            // line 220
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "sub_pakage_id", [], "array"), "html", null, true);
                            echo "\">Egg Whites</label>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='grams[]' value='";
                            // line 222
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "grams", [], "array"), "html", null, true);
                            echo "'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='idList[]' value='";
                            // line 223
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "idList", [], "array"), "html", null, true);
                            echo "'>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='subpackid[]' value='";
                            // line 225
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "sub_pakage_id", [], "array"), "html", null, true);
                            echo "'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class='col-md-2'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' name='breakfast_eggs[]' placeholder='Enter Number of Eggs' value=\"";
                            // line 229
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_combo1"], "prot_crab", [], "array"), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_combo1'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 233
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 234
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 236
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 237
                echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
                // line 242
                echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' class=\"form-control product_image\" name=\"product_image\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                // line 257
                if (((isset($context["product_image"]) || array_key_exists("product_image", $context)) && (($context["product_image"] ?? $this->getContext($context, "product_image")) != ""))) {
                    echo "\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.product_image').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                    // line 262
                    echo twig_escape_filter($this->env, ($context["product_image"] ?? $this->getContext($context, "product_image")), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 263
                    echo twig_escape_filter($this->env, ($context["product_image"] ?? $this->getContext($context, "product_image")), "html", null, true);
                    echo "\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 267
                echo "\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Availability </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t    ";
                // line 277
                if ( !twig_test_empty(($context["days"] ?? $this->getContext($context, "days")))) {
                    // line 278
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["days"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["days"]) {
                        // line 279
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["checked"] = "";
                        // line 280
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ( !twig_test_empty(($context["avail"] ?? $this->getContext($context, "avail")))) {
                            // line 281
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["avail"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["avail"]) {
                                // line 282
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                if (($this->getAttribute($context["avail"], "main_days_id", []) == $this->getAttribute($context["days"], "days_master_id", []))) {
                                    // line 283
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["checked"] = "checked=\"checked\"";
                                    // line 284
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 285
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avail'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 286
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 287
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='checkbox' name=\"product_availability[]\" value=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "days_master_id", []), "html", null, true);
                        echo "\" ";
                        echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                        echo "/>&nbsp;";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "days_name", []), "html", null, true);
                        echo "&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['days'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 289
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 290
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 302
                $context["active_check"] = "";
                // line 303
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["inactive_check"] = "";
                // line 304
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((($context["product_status"] ?? $this->getContext($context, "product_status")) == "active")) {
                    // line 305
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["active_check"] = "checked";
                    // line 306
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 307
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if ((($context["product_status"] ?? $this->getContext($context, "product_status")) == "inactive")) {
                    // line 308
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["inactive_check"] = "checked";
                    // line 309
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"product_status\" value=\"active\" ";
                // line 312
                echo twig_escape_filter($this->env, ($context["active_check"] ?? $this->getContext($context, "active_check")), "html", null, true);
                echo ">Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"product_status\" value=\"inactive\" ";
                // line 315
                echo twig_escape_filter($this->env, ($context["inactive_check"] ?? $this->getContext($context, "inactive_check")), "html", null, true);
                echo ">Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
\t\t\t\t\t\t\t\t\t\t<div class=\"row paddTop\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 324
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fa fa-check-square-o\"></i>&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 326
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
            // line 337
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- end: tab-content -->
\t\t\t\t\t\t\t
\t\t\t\t\t";
        }
        // line 342
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

    // line 355
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 356
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

<script>

\t\$(document).ready(function(){
\t\t\$('#meal_type').change(function(){
\t\t\tif(\$('#product_package').val() != '0'){
\t\t\t\t\$('#b_combo').css({'display': 'block'});
\t\t\t\tgetSubpackage(\$('#product_package').val());
\t\t\t} else {
\t\t\t\t\$('#b_combo').css({'display': 'none'});
\t\t\t}
\t\t});
\t});

\tfunction getSubpackage(main_pk_id){


\t\tif(\$('#meal_type').val() != '1'){
\t\t\t\$('#b_combo').css({'display': 'none'});
\t\t\treturn false;
\t\t}

\t\tvar pk_ids = []
\t\t\$( \"#product_package option:selected\" ).each(function () {
\t\t\tpk_id_single = {'pk_id':\$(this).val()};
\t\t\tpk_ids.push(pk_id_single);

\t\t});

\t\t\$.ajax({
\t\t\turl : \"";
        // line 387
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_getsubpackages");
        echo "\",
\t\t\tdata : {'pk_ids':JSON.stringify(pk_ids)},
\t\t\tmethod : \"POST\",
\t\t\tsuccess : function (data){
\t\t\t\tvar res= JSON.parse(data);
\t\t\t\tif(res['success'] == true){
\t\t\t\t\t\$('#b_combo').html(res['html']);
\t\t\t\t}
\t\t\t\t//\$('.sub_pk').html(data);
\t\t\t}
\t\t});
\t}

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
\tfunction remove_combo1(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn1').hide();
\t\t}
\t}
\t
\tfunction add_combo1(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn1').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn1').hide();
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
\t/* function toggleEggsFields(type_meal){
\t\t//breakfast
\t\tif(type_meal == \"1\"){
\t\t\t\$('.eggs_field').show();
\t\t}else{
\t\t\t\$('.eggs_field').hide();\t\t
\t\t} 
\t} */
\t
</script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Product:addProduct.html - Copy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  861 => 387,  826 => 356,  820 => 355,  802 => 342,  795 => 337,  766 => 326,  761 => 324,  749 => 315,  743 => 312,  736 => 309,  733 => 308,  730 => 307,  727 => 306,  724 => 305,  721 => 304,  718 => 303,  716 => 302,  702 => 290,  699 => 289,  686 => 287,  683 => 286,  677 => 285,  674 => 284,  671 => 283,  668 => 282,  663 => 281,  660 => 280,  657 => 279,  652 => 278,  650 => 277,  638 => 267,  630 => 263,  626 => 262,  618 => 257,  601 => 242,  598 => 237,  595 => 236,  591 => 234,  588 => 233,  578 => 229,  571 => 225,  566 => 223,  562 => 222,  557 => 220,  548 => 218,  543 => 216,  534 => 214,  530 => 212,  527 => 211,  524 => 210,  521 => 209,  518 => 208,  515 => 207,  512 => 206,  510 => 205,  504 => 202,  499 => 199,  495 => 198,  492 => 197,  489 => 196,  487 => 195,  480 => 193,  460 => 175,  457 => 174,  450 => 172,  444 => 170,  435 => 169,  432 => 168,  427 => 167,  425 => 166,  409 => 152,  406 => 151,  400 => 150,  388 => 148,  385 => 147,  380 => 146,  378 => 145,  360 => 130,  350 => 122,  342 => 105,  331 => 97,  327 => 96,  320 => 94,  317 => 93,  314 => 92,  308 => 91,  304 => 89,  301 => 88,  298 => 87,  295 => 86,  292 => 85,  289 => 84,  286 => 83,  283 => 82,  280 => 81,  277 => 80,  274 => 79,  272 => 78,  269 => 77,  266 => 76,  262 => 75,  259 => 74,  256 => 73,  254 => 72,  251 => 71,  248 => 70,  245 => 69,  243 => 68,  233 => 66,  216 => 65,  213 => 64,  210 => 63,  207 => 62,  204 => 61,  201 => 60,  198 => 59,  195 => 58,  192 => 57,  189 => 56,  187 => 55,  180 => 50,  177 => 49,  158 => 46,  145 => 45,  127 => 44,  125 => 43,  121 => 41,  119 => 40,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Add Product
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
                        <h3 class=\"box-title\">Add / Update Product</h3>
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
\t\t\t\t\t\t{% set main_product_master_id = 0 %}
\t\t\t\t\t\t{% set main_product_category_id = 0 %}
\t\t\t\t\t\t{% set product_image = '' %}
\t\t\t\t\t\t{% set product_status = '' %}
\t\t\t\t\t\t{% set product_combo = null %}
\t\t\t\t\t\t{% set product_combo1 = null %}
\t\t\t\t\t\t{% set package_ids = null %}
\t\t\t\t\t\t{% set product_nutrition = '' %}
\t\t\t\t\t\t{%set style_dis = ''%}
\t\t\t\t\t\t
\t\t\t\t\t\t\t{% for language in language_list %}
\t\t\t\t\t\t\t\t<div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set action = path('admin_product_saveproduct') %}
\t\t\t\t\t\t\t\t\t{% set product_name = '' %}
\t\t\t\t\t\t\t\t\t{% set product_description = '' %}
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set package_id = '' %}
\t\t\t\t\t\t\t\t\t{% if main_product is defined and main_product is not empty %}
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{% for main_product in main_product %}
\t\t\t\t\t\t\t\t\t\t\t{% if main_product.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_product_master_id = main_product.main_product_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set main_product_category_id = main_product.main_product_category_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_image = main_product.img_url %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_status = main_product.product_status %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_name = main_product.product_name %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_combo = main_product.new_combo %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_combo1 = main_product.product_combo1 %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_id = main_product.package_id %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_description = main_product.product_description %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set product_nutrition = main_product.product_nutrition %}
\t\t\t\t\t\t\t\t\t\t\t\t{% set package_ids = main_product.package_ids %}
\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t\t\t<form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"main_product_master_id\" value=\"{{ main_product_master_id }}\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Name</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" name=\"product_name\" value=\"{{product_name}}\" />
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
{#\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Description</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea id=\"editor1\" class=\"ckeditor\" name=\"product_description\">{{ product_description }}</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div> #}
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"product_description\" value=\"\"/>
\t\t\t\t\t\t\t\t\t\t</br>\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Nutrition Value</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea id=\"editor1\" class=\"ckeditor\" name=\"product_nutrition\">{{ product_nutrition }}</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Package</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"product_package\"  name=\"product_package[]\" class=\"form-control\" multiple required onchange=\"getSubpackage(\$(this).val)\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">--select package--</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if package is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   {%for package in package %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t   {%if language.language_master_id == package.language_id%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{package.main_package_master_id}}\" {%if package.main_package_master_id in package_ids%}selected{%endif%}>{{package.package_name}}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Meal Type</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"main_product_category_id\" class=\"form-control\" id=\"meal_type\" required>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">Select Meal type</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if product_cat is defined and product_cat is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for product_cat in product_cat%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if product_cat.language_id == language.language_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{product_cat.main_product_category_master_id}}\" {%if product_cat.main_product_category_master_id == main_product_category_id%} selected{%endif%}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{product_cat.product_category_name}}\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<em>*</em><label>Select Meal type breakfast for Raw Egg and Egg white</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div id=\"b_combo\" {% if main_product_category_id == 1 %}style=\"display:block;\"{% endif %}>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{% if main_product_category_id == 1 %}
\t\t\t\t\t\t\t\t\t\t\t\t{% if product_combo is defined and product_combo is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t{% for product_combo1 in product_combo %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class='col-md-12 form-group'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label>{{ product_combo1['package_name'] ~ \"-\" ~ product_combo1['grams'] }}</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set raw_eggs_selected = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set white_eggs_selected = '' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if product_combo1['prot_type'] == 'raw_eggs' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set raw_eggs_selected = 'checked' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set white_eggs_selected = 'checked' %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='id1-{{ product_combo1['sub_pakage_id'] }}' type='radio' name='radio-{{ product_combo1['idList'] }}' value='raw_eggs' {{ raw_eggs_selected }}>&nbsp;&nbsp;

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"id1-{{ product_combo1['sub_pakage_id'] }}\">Raw Eggs</label> &nbsp;&nbsp;&nbsp;

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='id2-{{ product_combo1['sub_pakage_id'] }}' type='radio' name='radio-{{ product_combo1['idList'] }}' value='white_eggs' {{ white_eggs_selected }}>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"id2-{{ product_combo1['sub_pakage_id'] }}\">Egg Whites</label>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='grams[]' value='{{ product_combo1['grams'] }}'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='idList[]' value='{{ product_combo1['idList'] }}'>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id='' type='hidden' name='subpackid[]' value='{{ product_combo1['sub_pakage_id'] }}'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class='col-md-2'>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='text' name='breakfast_eggs[]' placeholder='Enter Number of Eggs' value=\"{{ product_combo1['prot_crab'] }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t{# <div class=\"col-md-12 form-group eggs_field\" style=\"{{style_dis}}\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this))\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
\t\t\t\t\t\t\t\t\t\t\t</div> #}
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Image </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='file' class=\"form-control product_image\" name=\"product_image\" required=\"required\"/>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%if product_image is defined and product_image != ''%}\t
\t\t\t\t\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\$('.product_image').removeAttr('required');
\t\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row col-md-offset-2\">
\t\t\t\t\t\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{product_image}}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"{{product_image}}\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Product Availability </br></label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-10\">
\t\t\t\t\t\t\t\t\t\t\t\t    {%if days is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%for days in days%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%set checked = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if avail is not empty%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   {%for avail in avail%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if avail.main_days_id == days.days_master_id %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%set checked ='checked=\"checked\"'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   {%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type='checkbox' name=\"product_availability[]\" value=\"{{days.days_master_id}}\" {{checked}}/>&nbsp;{{days.days_name}}&nbsp;&nbsp;
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"row form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label>Status</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{%set active_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{%set inactive_check = ''%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if product_status == 'active'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%set active_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t\t\t\t{%if product_status == 'inactive'%}
\t\t\t\t\t\t\t\t\t\t\t\t\t{%set inactive_check = 'checked'%}
\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-8\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"product_status\" value=\"active\" {{active_check}}>Active
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"radio-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t  <input type=\"radio\" name=\"product_status\" value=\"inactive\" {{inactive_check}}>Inactive
\t\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</br>
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

{% block js %}
<script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

<script>

\t\$(document).ready(function(){
\t\t\$('#meal_type').change(function(){
\t\t\tif(\$('#product_package').val() != '0'){
\t\t\t\t\$('#b_combo').css({'display': 'block'});
\t\t\t\tgetSubpackage(\$('#product_package').val());
\t\t\t} else {
\t\t\t\t\$('#b_combo').css({'display': 'none'});
\t\t\t}
\t\t});
\t});

\tfunction getSubpackage(main_pk_id){


\t\tif(\$('#meal_type').val() != '1'){
\t\t\t\$('#b_combo').css({'display': 'none'});
\t\t\treturn false;
\t\t}

\t\tvar pk_ids = []
\t\t\$( \"#product_package option:selected\" ).each(function () {
\t\t\tpk_id_single = {'pk_id':\$(this).val()};
\t\t\tpk_ids.push(pk_id_single);

\t\t});

\t\t\$.ajax({
\t\t\turl : \"{{path('admin_product_getsubpackages')}}\",
\t\t\tdata : {'pk_ids':JSON.stringify(pk_ids)},
\t\t\tmethod : \"POST\",
\t\t\tsuccess : function (data){
\t\t\t\tvar res= JSON.parse(data);
\t\t\t\tif(res['success'] == true){
\t\t\t\t\t\$('#b_combo').html(res['html']);
\t\t\t\t}
\t\t\t\t//\$('.sub_pk').html(data);
\t\t\t}
\t\t});
\t}

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
\tfunction remove_combo1(element){

\t\tif (element.parents('div').siblings(\".first_one\").length > 1 ){
\t\t\tvar elemnt_first = element.parents('div').prev(\".first_one:last\");
\t\t\telemnt_first.remove();
\t\t}

\t\tif (element.parents('div').siblings(\".first_one\").length == 1 ){
\t\t\t\$('#remove_combo_btn1').hide();
\t\t}
\t}
\t
\tfunction add_combo1(element){
\t\tvar elemnt_last ;
\t\tif(\$(\".first_one\").length > 1 ){
\t\t\t\$('#remove_combo_btn1').show();
\t\t}else{
\t\t\t\$('#remove_combo_btn1').hide();
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
\t/* function toggleEggsFields(type_meal){
\t\t//breakfast
\t\tif(type_meal == \"1\"){
\t\t\t\$('.eggs_field').show();
\t\t}else{
\t\t\t\$('.eggs_field').hide();\t\t
\t\t} 
\t} */
\t
</script>\t
{% endblock %}", "AdminBundle:Product:addProduct.html - Copy.twig", "/var/www/admin/src/AdminBundle/Resources/views/Product/addProduct.html - Copy.twig");
    }
}
