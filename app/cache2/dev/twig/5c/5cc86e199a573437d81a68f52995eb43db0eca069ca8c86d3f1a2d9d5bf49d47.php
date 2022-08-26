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

/* AdminBundle:Product:addProduct.html.twig */
class __TwigTemplate_f0488812519d74205ce14a9a0f74801f2ecd6b54749fb9a501bd48bb595524f3 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Product:addProduct.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Product:addProduct.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Product
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
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
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Product</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 40
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 41
            echo "                           
                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                ";
            // line 44
            $context["main_product_master_id"] = 0;
            // line 45
            echo "                                ";
            $context["main_product_category_id"] = 0;
            // line 46
            echo "                                ";
            $context["product_image"] = "";
            // line 47
            echo "                                ";
            $context["product_status"] = "";
            // line 48
            echo "                                ";
            $context["product_combo"] = null;
            // line 49
            echo "                                ";
            $context["product_combo1"] = null;
            // line 50
            echo "                                ";
            $context["package_ids"] = null;
            // line 51
            echo "                                ";
            $context["product_nutrition"] = "";
            // line 52
            echo "                                ";
            $context["product_fat"] = "";
            // line 53
            echo "                                ";
            $context["product_calory"] = "";
            // line 54
            echo "                                ";
            $context["product_prot"] = "";
            // line 55
            echo "                                ";
            $context["product_carb"] = "";
            // line 56
            echo "                                ";
            $context["product_fiber"] = "";
            // line 57
            echo "                                ";
            $context["new_combo"] = null;
            // line 58
            echo "                                ";
            $context["style_dis"] = "";
            // line 59
            echo "
                                ";
            // line 60
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
                // line 61
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 63
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_saveproduct");
                // line 64
                echo "                                        ";
                $context["product_name"] = "";
                // line 65
                echo "                                        ";
                $context["product_name_ar"] = "";
                // line 66
                echo "                                        ";
                $context["product_description"] = "";
                // line 67
                echo "                                        ";
                $context["product_max_meal_value"] = 1;
                // line 68
                echo "                                        ";
                $context["package_id"] = "";
                // line 69
                echo "                                        ";
                if (((isset($context["main_product"]) || array_key_exists("main_product", $context)) &&  !twig_test_empty(($context["main_product"] ?? $this->getContext($context, "main_product"))))) {
                    // line 70
                    echo "
                                            ";
                    // line 71
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_product"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_product"]) {
                        // line 72
                        echo "                                                ";
                        $context["new_combo"] = $this->getAttribute($context["main_product"], "combo_array_detail", []);
                        echo "\t

                                                ";
                        // line 74
                        if (($this->getAttribute($context["main_product"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 75
                            echo "
                                                    ";
                            // line 76
                            $context["main_product_master_id"] = $this->getAttribute($context["main_product"], "main_product_master_id", []);
                            // line 77
                            echo "                                                    ";
                            $context["main_product_category_id"] = $this->getAttribute($context["main_product"], "main_product_category_id", []);
                            // line 78
                            echo "                                                    ";
                            $context["product_image"] = $this->getAttribute($context["main_product"], "img_url", []);
                            // line 79
                            echo "                                                    ";
                            $context["product_status"] = $this->getAttribute($context["main_product"], "product_status", []);
                            // line 80
                            echo "                                                    ";
                            $context["product_name"] = $this->getAttribute($context["main_product"], "product_name", []);
                            // line 81
                            echo "                                                    ";
                            $context["product_name_ar"] = $this->getAttribute($context["main_product"], "product_name_ar", []);
                            // line 82
                            echo "                                                    ";
                            $context["product_combo"] = $this->getAttribute($context["main_product"], "new_combo", []);
                            // line 83
                            echo "                                                    ";
                            $context["product_combo1"] = $this->getAttribute($context["main_product"], "product_combo1", []);
                            // line 84
                            echo "                                                    ";
                            $context["package_id"] = $this->getAttribute($context["main_product"], "package_id", []);
                            // line 85
                            echo "                                                    ";
                            $context["product_description"] = $this->getAttribute($context["main_product"], "product_description", []);
                            // line 86
                            echo "                                                    ";
                            $context["product_fat"] = $this->getAttribute($context["main_product"], "fat", []);
                            // line 87
                            echo "                                                    ";
                            $context["product_calory"] = $this->getAttribute($context["main_product"], "calory", []);
                            // line 88
                            echo "                                                    ";
                            $context["product_fiber"] = $this->getAttribute($context["main_product"], "fiber", []);
                            // line 89
                            echo "                                                    ";
                            $context["product_prot"] = $this->getAttribute($context["main_product"], "prot", []);
                            // line 90
                            echo "                                                    ";
                            $context["product_carb"] = $this->getAttribute($context["main_product"], "carb", []);
                            // line 91
                            echo "                                                    ";
                            $context["product_nutrition"] = $this->getAttribute($context["main_product"], "product_nutrition", []);
                            // line 92
                            echo "                                                    ";
                            $context["product_max_meal_value"] = $this->getAttribute($context["main_product"], "max_meal_value", []);
                            // line 93
                            echo "                                                    ";
                            $context["package_ids"] = $this->getAttribute($context["main_product"], "package_ids", []);
                            // line 94
                            echo "                                                ";
                        }
                        // line 95
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 96
                    echo "                                        ";
                }
                // line 97
                echo "
                                        <form id=\"form-";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_product_master_id\" value=\"";
                // line 100
                echo twig_escape_filter($this->env, ($context["main_product_master_id"] ?? $this->getContext($context, "main_product_master_id")), "html", null, true);
                echo "\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Name</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input class=\"form-control\" name=\"product_name\" value=\"";
                // line 109
                echo twig_escape_filter($this->env, ($context["product_name"] ?? $this->getContext($context, "product_name")), "html", null, true);
                echo "\" />
                                                    </div>
                                                </div>

                                            </div>
                                             </br> 
                                             <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Name(Ar)</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input class=\"form-control text-right\" name=\"product_name_ar\" value=\"";
                // line 121
                echo twig_escape_filter($this->env, ($context["product_name_ar"] ?? $this->getContext($context, "product_name_ar")), "html", null, true);
                echo "\" />
                                                    </div>
                                                </div>

                                            </div>
                                               
                                            ";
                // line 139
                echo "                                            <input type=\"hidden\" name=\"product_description\" value=\"\"/>
                                            </br>\t\t
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Nutrition Value</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <textarea id=\"editor1\" class=\"ckeditor\" name=\"product_nutrition\">";
                // line 147
                echo twig_escape_filter($this->env, ($context["product_nutrition"] ?? $this->getContext($context, "product_nutrition")), "html", null, true);
                echo "</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>\t
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Fat</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_fat\" value=\"";
                // line 159
                echo twig_escape_filter($this->env, ($context["product_fat"] ?? $this->getContext($context, "product_fat")), "html", null, true);
                echo "\" />
                                                    </div>
                                                
                                                    <div class=\"col-md-2\">
                                                        <label>Calorie</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_calory\" value=\"";
                // line 166
                echo twig_escape_filter($this->env, ($context["product_calory"] ?? $this->getContext($context, "product_calory")), "html", null, true);
                echo "\" />
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                             <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Prot</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_prot\" value=\"";
                // line 178
                echo twig_escape_filter($this->env, ($context["product_prot"] ?? $this->getContext($context, "product_prot")), "html", null, true);
                echo "\" />
                                                    </div>
                                                
                                                    <div class=\"col-md-2\">
                                                        <label>Carb</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_carb\" value=\"";
                // line 185
                echo twig_escape_filter($this->env, ($context["product_carb"] ?? $this->getContext($context, "product_carb")), "html", null, true);
                echo "\" />
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                              <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Fiber</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_fiber\" value=\"";
                // line 197
                echo twig_escape_filter($this->env, ($context["product_fiber"] ?? $this->getContext($context, "product_fiber")), "html", null, true);
                echo "\" />
                                                    </div>
                                                
                                                   
                                                </div>

                                            </div>
                                            </br>   

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Package</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select id=\"product_package\"  name=\"product_package[]\" class=\"form-control\" multiple required onchange=\"getSubpackage(\$(this).val)\">
                                                            <option value=\"0\">--select package--</option>
                                                            ";
                // line 214
                if ( !twig_test_empty(($context["package"] ?? $this->getContext($context, "package")))) {
                    // line 215
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["package"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["package"]) {
                        // line 216
                        echo "                                                                    ";
                        if (($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["package"], "language_id", []))) {
                            // line 217
                            echo "                                                                        <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (twig_in_filter($this->getAttribute($context["package"], "main_package_master_id", []), ($context["package_ids"] ?? $this->getContext($context, "package_ids")))) {
                                echo "selected";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "package_name", []), "html", null, true);
                            echo "</option>
                                                                    ";
                        }
                        // line 219
                        echo "                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 220
                    echo "                                                            ";
                }
                // line 221
                echo "                                                        </select>
                                                    </div>
                                               
                                                    <div class=\"col-md-2\">
                                                        <label>Product Meal Type</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name=\"main_product_category_id\" class=\"form-control\" id=\"meal_type\" required>
                                                            <option value=\"\">Select Meal type</option>
                                                            ";
                // line 230
                if (((isset($context["product_cat"]) || array_key_exists("product_cat", $context)) &&  !twig_test_empty(($context["product_cat"] ?? $this->getContext($context, "product_cat"))))) {
                    // line 231
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["product_cat"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["product_cat"]) {
                        // line 232
                        echo "                                                                    ";
                        if (($this->getAttribute($context["product_cat"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 233
                            echo "                                                                        <option value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_cat"], "main_product_category_master_id", []), "html", null, true);
                            echo "\" ";
                            if (($this->getAttribute($context["product_cat"], "main_product_category_master_id", []) == ($context["main_product_category_id"] ?? $this->getContext($context, "main_product_category_id")))) {
                                echo " selected";
                            }
                            echo ">
                                                                            ";
                            // line 234
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_cat"], "product_category_name", []), "html", null, true);
                            echo "\t\t\t\t
                                                                        </option>
                                                                    ";
                        }
                        // line 236
                        echo "\t
                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_cat'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 238
                    echo "                                                            ";
                }
                // line 239
                echo "                                                        </select>
                                                    </div>
                                                     <div class=\"col-md-2 hide \">
                                                        <label>Meal Max Value</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                       <input type=\"text\" name=\"meal_max_value\" class=\"form-control\" placeholder=\"Meal Max Value\" value=\"";
                // line 245
                echo twig_escape_filter($this->env, ($context["product_max_meal_value"] ?? $this->getContext($context, "product_max_meal_value")), "html", null, true);
                echo "\" /> 
                                                    </div>
                                                </div>
                                            </div>

                                            ";
                // line 250
                $context["display_eggs"] = "";
                // line 251
                echo "                                            ";
                $context["display_none"] = "checked";
                // line 252
                echo "
                                            ";
                // line 253
                $context["display_prot_carb"] = "";
                // line 254
                echo "
                                            ";
                // line 255
                if (((isset($context["combo_display"]) || array_key_exists("combo_display", $context)) &&  !twig_test_empty(($context["combo_display"] ?? $this->getContext($context, "combo_display"))))) {
                    // line 256
                    echo "                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["combo_display"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["combo_display"]) {
                        // line 257
                        echo "                                                    ";
                        if (($this->getAttribute($context["combo_display"], "combo_type", []) == "eggs")) {
                            // line 258
                            echo "                                                        ";
                            $context["display_eggs"] = "checked";
                            // line 259
                            echo "                                                        ";
                            $context["display_none"] = "";
                            // line 260
                            echo "
                                                    ";
                        }
                        // line 262
                        echo "
                                                    ";
                        // line 263
                        if (($this->getAttribute($context["combo_display"], "combo_type", []) == "prot_carb")) {
                            // line 264
                            echo "                                                        ";
                            $context["display_prot_carb"] = "checked";
                            // line 265
                            echo "                                                        ";
                            $context["display_none"] = "";
                            // line 266
                            echo "                                                    ";
                        }
                        // line 267
                        echo "
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['combo_display'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 269
                    echo "                                            ";
                }
                // line 270
                echo "                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Include with Product</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <label class=\"radio-inline\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='prot_carb' ";
                // line 277
                echo twig_escape_filter($this->env, ($context["display_prot_carb"] ?? $this->getContext($context, "display_prot_carb")), "html", null, true);
                echo " onchange=\"call_another_function();\" >
                                                            ";
                // line 278
                echo "  Calorie 
                                                        </label>
                                                        <label class=\"radio-inline hide\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='eggs' ";
                // line 281
                echo twig_escape_filter($this->env, ($context["display_eggs"] ?? $this->getContext($context, "display_eggs")), "html", null, true);
                echo " onchange=\"call_another_function();\" >
                                                            Eggs
                                                        </label>
                                                        
                                                        <label class=\"radio-inline\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='none' ";
                // line 286
                echo twig_escape_filter($this->env, ($context["display_none"] ?? $this->getContext($context, "display_none")), "html", null, true);
                echo " selected  onchange=\"call_another_function();\" >
                                                            None
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t

                                            <div class=\"row\">
                                                <div id=\"b_combo\" style=\"display:block;\">
                                                    ";
                // line 304
                echo "
                                                    ";
                // line 305
                if ((($context["display_none"] ?? $this->getContext($context, "display_none")) == "")) {
                    // line 306
                    echo "                                                        ";
                    if (((isset($context["new_combo"]) || array_key_exists("new_combo", $context)) &&  !twig_test_empty(($context["new_combo"] ?? $this->getContext($context, "new_combo"))))) {
                        // line 307
                        echo "                                                            ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["new_combo"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["new_combo"]) {
                            // line 308
                            echo "                                                                <div class='col-md-12 form-group'>
                                                                    <div class=\"col-md-2\"></div>
                                                                    <div class=\"col-md-2\">
                                                                        <label data-toggle=\"tooltip\" data-original-title=\"";
                            // line 311
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "combo_str", [], "array"), "html", null, true);
                            echo "\" >";
                            echo twig_escape_filter($this->env, ((($this->getAttribute($context["new_combo"], "package_name", [], "array") . "-( Grams :  ") . $this->getAttribute($context["new_combo"], "grams", [], "array")) . " )"), "html", null, true);
                            echo "</label>
                                                                    </div>

                                                                    ";
                            // line 314
                            $context["raw_eggs_selected"] = "";
                            // line 315
                            echo "                                                                    ";
                            $context["prot_selected"] = "";
                            // line 316
                            echo "                                                                    ";
                            $context["carb_selected"] = "";
                            // line 317
                            echo "                                                                    ";
                            $context["white_eggs_selected"] = "";
                            // line 318
                            echo "                                                                    ";
                            $context["raw_eggs_count"] = 0;
                            // line 319
                            echo "                                                                    ";
                            $context["white_eggs_count"] = 0;
                            // line 320
                            echo "                                                                    ";
                            $context["prot_count"] = "";
                            // line 321
                            echo "                                                                    ";
                            $context["carb_count"] = "";
                            // line 322
                            echo "
                                                                    ";
                            // line 323
                            if (($this->getAttribute($context["new_combo"], "combo_array", [], "any", true, true) && $this->getAttribute($context["new_combo"], "combo_array", []))) {
                                // line 324
                                echo "
                                                                        ";
                                // line 325
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["new_combo"], "combo_array", []));
                                foreach ($context['_seq'] as $context["_key"] => $context["comboDetail"]) {
                                    // line 326
                                    echo "
                                                                            ";
                                    // line 327
                                    if (($this->getAttribute($context["comboDetail"], "prot_type", []) == "prot")) {
                                        // line 328
                                        echo "
                                                                                ";
                                        // line 329
                                        $context["prot_selected"] = "checked";
                                        // line 330
                                        echo "                                                                                ";
                                        $context["prot_count"] = $this->getAttribute($context["new_combo"], "grams", [], "array");
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            ";
                                    }
                                    // line 332
                                    echo "
                                                                            ";
                                    // line 333
                                    if (($this->getAttribute($context["comboDetail"], "prot_type", []) == "carb")) {
                                        // line 334
                                        echo "
                                                                                ";
                                        // line 335
                                        $context["carb_selected"] = "checked";
                                        // line 336
                                        echo "                                                                                ";
                                        $context["carb_count"] = $this->getAttribute($context["new_combo"], "grams", [], "array");
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            ";
                                    }
                                    // line 338
                                    echo "

                                                                            ";
                                    // line 340
                                    if (($this->getAttribute($context["comboDetail"], "prot_type", []) == "raw_eggs")) {
                                        // line 341
                                        echo "
                                                                                ";
                                        // line 342
                                        $context["raw_eggs_selected"] = "checked";
                                        // line 343
                                        echo "                                                                                ";
                                        $context["raw_eggs_count"] = $this->getAttribute($context["comboDetail"], "prot_crab", []);
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            ";
                                    }
                                    // line 345
                                    echo "
                                                                            ";
                                    // line 346
                                    if (($this->getAttribute($context["comboDetail"], "prot_type", []) == "white_eggs")) {
                                        // line 347
                                        echo "                                                                                ";
                                        $context["white_eggs_selected"] = "checked";
                                        echo "\t
                                                                                ";
                                        // line 348
                                        $context["white_eggs_count"] = $this->getAttribute($context["comboDetail"], "prot_crab", []);
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            ";
                                    }
                                    // line 350
                                    echo "                                                                        ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comboDetail'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 351
                                echo "                                                                    ";
                            }
                            // line 352
                            echo "
                                                                    <div class=\"col-md-2\">
                                                                        ";
                            // line 360
                            echo "                                                                        <label>Proteins</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"number\" name=\"proteins[";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "]\" id=\"prot_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\" placeholder=\"Enter Proteins\" value=\"";
                            echo twig_escape_filter($this->env, ($context["prot_count"] ?? $this->getContext($context, "prot_count")), "html", null, true);
                            echo "\" readonly>

                                                                    </div>

                                                                    <div class=\"col-md-2\">
                                                                        ";
                            // line 366
                            echo "                                                                        <label>Carbs</label>

                                                                        <input class=\"form-control\" type=\"number\" name=\"carbs[";
                            // line 368
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "]\" id=\"carb_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\" placeholder=\"Enter Carbs\" value=\"";
                            echo twig_escape_filter($this->env, ($context["carb_count"] ?? $this->getContext($context, "carb_count")), "html", null, true);
                            echo "\" readonly>

                                                                    </div>


                                                                    <div class=\"col-md-2\">
                                                                        ";
                            // line 379
                            echo "                                                                        <label>Raw Eggs</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t

                                                                        <input class=\"form-control eggs_input\" type=\"number\" name=\"raw_eggs[";
                            // line 381
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "]\" id=\"raw_eggs_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\" placeholder=\"Enter Raw Eggs\" value=\"";
                            echo twig_escape_filter($this->env, ($context["raw_eggs_count"] ?? $this->getContext($context, "raw_eggs_count")), "html", null, true);
                            echo "\" ";
                            if ((($context["display_prot_carb"] ?? $this->getContext($context, "display_prot_carb")) == "checked")) {
                                echo " readonly ";
                            }
                            echo ">

                                                                    </div>

                                                                     <div class=\"col-md-2\">
                                                                        ";
                            // line 391
                            echo "                                                                        <label>Calorie</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t

                                                                        <input class=\"form-control eggs_input\" type=\"number\" name=\"calory[";
                            // line 393
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "]\" id=\"calory_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\" placeholder=\"Enter Calorie\" value=\"";
                            echo twig_escape_filter($this->env, ($context["raw_eggs_count"] ?? $this->getContext($context, "raw_eggs_count")), "html", null, true);
                            echo "\">

                                                                    </div>

                                                                    <div class=\"col-md-2\">
                                                                        
                                                                        <label class=\"checkbox-inline\" for=\"id2-";
                            // line 399
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\">
                                                                                <input id='id2-";
                            // line 400
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "' type='checkbox' name='radio-";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "main_combination_id", [], "array"), "html", null, true);
                            echo "' value='white_eggs' ";
                            echo twig_escape_filter($this->env, ($context["white_eggs_selected"] ?? $this->getContext($context, "white_eggs_selected")), "html", null, true);
                            echo " onchange=\"toogleEggValue(\$(this),";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo ",'white')\" >
                                                                                White Eggs
                                                                        </label>
                                                                        
                                                                        <label>White Eggs</label>
                                                                        <input type=\"number\" class=\"form-control eggs_input\" name=\"white_eggs[";
                            // line 405
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "]\" placeholder=\"Enter White Eggs\" id=\"white_eggs_";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\" value=\"";
                            echo twig_escape_filter($this->env, ($context["white_eggs_count"] ?? $this->getContext($context, "white_eggs_count")), "html", null, true);
                            echo "\" ";
                            if ((($context["display_prot_carb"] ?? $this->getContext($context, "display_prot_carb")) == "checked")) {
                                echo " readonly ";
                            }
                            echo " >

                                                                    </div>

                                                                    <input id='' type='hidden' name='grams[]' value=\"";
                            // line 409
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "grams", [], "array"), "html", null, true);
                            echo "\">

                                                                    <input id='' type='hidden' name='subpackid[]' value=\"";
                            // line 411
                            echo twig_escape_filter($this->env, $this->getAttribute($context["new_combo"], "sub_package_id", [], "array"), "html", null, true);
                            echo "\">

                                                                </div>\t
                                                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['new_combo'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 415
                        echo "                                                        ";
                    } else {
                        // line 416
                        echo "
                                                        ";
                    }
                    // line 418
                    echo "                                                    ";
                }
                // line 419
                echo "
                                                    ";
                // line 424
                echo "                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Image </br></label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input type='file' class=\"form-control product_image\" name=\"product_image\" required=\"required\"/>
                                                    </div>
                                                </div>
                                            </div>

                                            ";
                // line 439
                if (((isset($context["product_image"]) || array_key_exists("product_image", $context)) && (($context["product_image"] ?? $this->getContext($context, "product_image")) != ""))) {
                    echo "\t
                                                <script>
                                                    \$('.product_image').removeAttr('required');
                                                </script>
                                                <div class=\"row col-md-offset-2\">
                                                    <a data-fancybox='gallery' href=\"";
                    // line 444
                    echo twig_escape_filter($this->env, ($context["product_image"] ?? $this->getContext($context, "product_image")), "html", null, true);
                    echo "\">
                                                        <img src=\"";
                    // line 445
                    echo twig_escape_filter($this->env, ($context["product_image"] ?? $this->getContext($context, "product_image")), "html", null, true);
                    echo "\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
                                                    </a>
                                                </div>

                                            ";
                }
                // line 449
                echo "\t\t\t\t\t\t\t\t\t\t

                                            </br>

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">

                                                    <div class=\"col-md-2\">
                                                        <label>Product Availability </br></label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <div class=\"row\">
                                                            <div>
                                                                 <input type='checkbox' class='parentweek1 week1' name=\"product_availability_week[]\" value=\"week1\" onchange=\"selectalldays('week1')\" /> Week 1
                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div ";
                // line 466
                if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                    echo "class=\"col-md-6\"  style=\"direction: rtl;\"";
                } else {
                    echo "class=\"col-md-7\"";
                }
                echo ">
                                                                ";
                // line 467
                if ( !twig_test_empty(($context["days"] ?? $this->getContext($context, "days")))) {
                    // line 468
                    echo "                                                                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["days"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["days"]) {
                        // line 469
                        echo "                                                                        ";
                        if (($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["days"], "language_id", []))) {
                            // line 470
                            echo "                                                                            ";
                            $context["checked"] = "";
                            // line 471
                            echo "                                                                            ";
                            if ( !twig_test_empty(($context["avail"] ?? $this->getContext($context, "avail")))) {
                                // line 472
                                echo "                                                                                ";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($context["avail"]);
                                foreach ($context['_seq'] as $context["_key"] => $context["avail"]) {
                                    // line 473
                                    echo "                                                                                    ";
                                    if ((($this->getAttribute($context["avail"], "main_days_id", []) == $this->getAttribute($context["days"], "main_days_master_id", [])) && twig_in_filter("week1", $this->getAttribute($context["avail"], "week_id", [])))) {
                                        // line 474
                                        echo "                                                                                        ";
                                        $context["checked"] = "checked=\"checked\"";
                                        // line 475
                                        echo "                                                                                    ";
                                    }
                                    // line 476
                                    echo "                                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avail'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 477
                                echo "                                                                            ";
                            }
                            // line 478
                            echo "
                                                                            <input type='checkbox' class='week1'  name=\"product_availability_week1[]\" value=\"";
                            // line 479
                            echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "main_days_master_id", []), "html", null, true);
                            echo "\" ";
                            echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                            echo "  onchange=\"selectweekname(this,'parentweek1')\" />";
                            if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                                echo "&nbsp;&nbsp;";
                            } else {
                                echo "&nbsp;";
                            }
                            echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "days_name", []), "html", null, true);
                            if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                                echo "&nbsp;&nbsp;&nbsp;";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                            // line 480
                            echo "                                                                        ";
                        }
                        // line 481
                        echo "                                                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['days'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 482
                    echo "                                                                ";
                }
                // line 483
                echo "                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div>
                                                                 <input type='checkbox' class='parentweek2 week2'  name=\"product_availability_week[]\" value=\"week2\"  onchange=\"selectalldays('week2')\" /> Week 2

                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div ";
                // line 492
                if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                    echo "class=\"col-md-6\"  style=\"direction: rtl;\"";
                } else {
                    echo "class=\"col-md-7\"";
                }
                echo ">
                                                                ";
                // line 493
                if ( !twig_test_empty(($context["days"] ?? $this->getContext($context, "days")))) {
                    // line 494
                    echo "                                                                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["days"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["days"]) {
                        // line 495
                        echo "                                                                        ";
                        if (($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["days"], "language_id", []))) {
                            // line 496
                            echo "                                                                            ";
                            $context["checked"] = "";
                            // line 497
                            echo "                                                                            ";
                            if ( !twig_test_empty(($context["avail"] ?? $this->getContext($context, "avail")))) {
                                // line 498
                                echo "                                                                                ";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable($context["avail"]);
                                foreach ($context['_seq'] as $context["_key"] => $context["avail"]) {
                                    // line 499
                                    echo "                                                                                    ";
                                    if ((($this->getAttribute($context["avail"], "main_days_id", []) == $this->getAttribute($context["days"], "main_days_master_id", [])) && twig_in_filter("week2", $this->getAttribute($context["avail"], "week_id", [])))) {
                                        // line 500
                                        echo "                                                                                        ";
                                        $context["checked"] = "checked=\"checked\"";
                                        // line 501
                                        echo "                                                                                    ";
                                    }
                                    // line 502
                                    echo "                                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avail'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 503
                                echo "                                                                            ";
                            }
                            // line 504
                            echo "
                                                                            <input type='checkbox' class='week2'  name=\"product_availability_week2[]\" value=\"";
                            // line 505
                            echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "main_days_master_id", []), "html", null, true);
                            echo "\" ";
                            echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                            echo " onchange=\"selectweekname(this,'parentweek2')\" />";
                            if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                                echo "&nbsp;&nbsp;";
                            } else {
                                echo "&nbsp;";
                            }
                            echo twig_escape_filter($this->env, $this->getAttribute($context["days"], "days_name", []), "html", null, true);
                            if (($this->getAttribute($context["language"], "language_master_id", []) != 1)) {
                                echo "&nbsp;&nbsp;&nbsp;";
                            } else {
                                echo "&nbsp;&nbsp;";
                            }
                            // line 506
                            echo "                                                                        ";
                        }
                        // line 507
                        echo "                                                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['days'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 508
                    echo "                                                                ";
                }
                // line 509
                echo "                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t\t\t\t\t\t\t


                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Status</label>
                                                    </div>
                                                    ";
                // line 522
                $context["active_check"] = "";
                // line 523
                echo "                                                    ";
                $context["inactive_check"] = "";
                // line 524
                echo "                                                    ";
                if ((($context["product_status"] ?? $this->getContext($context, "product_status")) == "active")) {
                    // line 525
                    echo "                                                        ";
                    $context["active_check"] = "checked";
                    // line 526
                    echo "                                                    ";
                }
                // line 527
                echo "                                                    ";
                if ((($context["product_status"] ?? $this->getContext($context, "product_status")) == "inactive")) {
                    // line 528
                    echo "                                                        ";
                    $context["inactive_check"] = "checked";
                    // line 529
                    echo "                                                    ";
                }
                echo "\t\t\t\t\t\t\t\t\t\t\t\t
                                                    <div class=\"col-lg-8\">
                                                        <label class=\"radio-inline\">
                                                            <input required type=\"radio\" name=\"product_status\" value=\"active\" ";
                // line 532
                echo twig_escape_filter($this->env, ($context["active_check"] ?? $this->getContext($context, "active_check")), "html", null, true);
                echo ">Active
                                                        </label>
                                                        <label class=\"radio-inline\">
                                                            <input required type=\"radio\" name=\"product_status\" value=\"inactive\" ";
                // line 535
                echo twig_escape_filter($this->env, ($context["inactive_check"] ?? $this->getContext($context, "inactive_check")), "html", null, true);
                echo ">Inactive
                                                        </label>
                                                    </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                </div>
                                            </div>
                                            </br>
                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 544
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                ";
                // line 546
                if (((isset($context["about_us"]) || array_key_exists("about_us", $context)) &&  !twig_test_empty(($context["about_us"] ?? $this->getContext($context, "about_us"))))) {
                    echo "Update";
                } else {
                    echo "Save";
                }
                echo "\t
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
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
            // line 557
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 562
        echo "
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 575
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 576
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>

        

        function toogleEggValue(element, sub_pk_id, type) {

            if (element.is(':checked') == false) {

                if (type == 'raw') {
                    \$(\"#raw_eggs_\" + sub_pk_id).val('');
                }
                if (type == 'white') {
                    \$(\"#white_eggs_\" + sub_pk_id).val('');
                }

                if (type == 'prot') {
                    \$(\"#prot_\" + sub_pk_id).val('');
                }

                if (type == 'carb') {
                    \$(\"#carb_\" + sub_pk_id).val('');
                }

            } else {

            }
        }
        function selectalldays(weekname){
            var currentweekvalue = \$('.'+weekname).prop(\"checked\");
            if(currentweekvalue){           
                \$('.'+ weekname).prop('checked', true);
            }
            else{
                \$('.'+ weekname).prop('checked', false);
            }
        }
        function selectweekname(weekname,parentweekname){

            var currentweekvalue = \$(weekname).prop(\"checked\");
            //alert(currentweekvalue);
            if(currentweekvalue){           
                \$('.'+ parentweekname).prop('checked', true);
            }
        }
        \$(document).ready(function (weekname) {


            \$('[data-toggle=\"tooltip\"]').tooltip();
            getSubpackage(\$('#product_package').val());
            \$('#product_package').change(function () {
                /*
                 if(\$('#product_package').val() != '0'){
                 \$('#b_combo').css({'display': 'block'});
                 getSubpackage(\$('#product_package').val());
                 } else {
                 \$('#b_combo').css({'display': 'none'});
                 }
                 */

                getSubpackage(\$('#product_package').val());

            });

            \$('.display_in_app').change(function () {
                if (\$(this).is(':checked')) {
                    if (\$(this).val() == 'prot_carb') {
                        \$('#b_combo').css({'display': 'block'});
                        \$('.eggs_input').val(0);
                        \$('.eggs_input').attr(\"readonly\", \"readonly\");

                    }

                    if (\$(this).val() == 'eggs') {
                        \$('.eggs_input').removeAttr(\"readonly\");

                        \$('#b_combo').css({'display': 'block'});
                    }

                    if (\$(this).val() == 'none') {
                        \$('#b_combo').css({'display': 'none'});
                    }
                }
            });
        });
        function call_another_function() {
            getSubpackage(\$('#product_package').val());
        }
        function getSubpackage(main_pk_id) {    

            var product_master_id = \"";
        // line 667
        echo twig_escape_filter($this->env, ($context["main_product_id"] ?? $this->getContext($context, "main_product_id")), "html", null, true);
        echo "\";
            /*
             if(\$('#meal_type').val() != '1'){
             \$('#b_combo').css({'display': 'none'});
             return false;
             }
             */
            var pk_ids = []
            \$(\"#product_package option:selected\").each(function () {
                pk_id_single = {'pk_id': \$(this).val()};
                pk_ids.push(pk_id_single);

            });

        \$.ajax    ({
                url: \"";
        // line 682
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_getsubpackages");
        echo "\",
                data: {'pk_ids': JSON.stringify(pk_ids), 'product_master_id': product_master_id},
                method: \"POST\",
                success: function (data) {
                    var res = JSON.parse(data);
                    if (res['success'] == true) {
                        \$('#b_combo').html(res['html']);

                        if (\$(\"input[name='display_in_app']:checked\").val() == 'prot_carb') {
                            \$('.eggs_input').val(0);
                            \$('.eggs_input').attr(\"readonly\", \"readonly\");
                        }

                        //alert(\$(\"input[name='display_in_app']:checked\").val());
                        if (\$(\"input[name='display_in_app']:checked\").val() == 'eggs') {
                            \$('.eggs_input').removeAttr(\"readonly\");
                        }

                        if (\$(\"input[name='display_in_app']:checked\").val() == 'none') {
                            \$('#b_combo').css({'display': 'none'});
                        }

                        \$('[data-toggle=\"tooltip\"]').tooltip();


                    }
                    //\$('.sub_pk').html(data);
                }
            });
        }

        function remove_combo(element) {

            if (element.parents('div').siblings(\".first_one\").length > 1) {
                var elemnt_first = element.parents('div').prev(\".first_one:last\");
                elemnt_first.remove();
            }

            if (element.parents('div').siblings(\".first_one\").length == 1) {
                \$('#remove_combo_btn').hide();
            }
        }

        function add_combo(element) {
            var elemnt_last;
            if (\$(\".first_one\").length > 1) {
                \$('#remove_combo_btn').show();
            } else {
                \$('#remove_combo_btn').hide();
            }
            console.log(element.parents('div').prev(\".first_one:last\").html());

            element.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

            /*\t\telemnt_last = element.parents('div').prev(\".first_one\");
             console.log(elemnt_last.html());
             var html = element.parents('div').prev(\".first_one\").html(); 
             html = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"

             elemnt_last.after(html).find(\"input[type='number']\").val(\"\");
             //.find(\"input[type='number']\").val(\"\") */
        }
        function remove_combo1(element) {

            if (element.parents('div').siblings(\".first_one\").length > 1) {
                var elemnt_first = element.parents('div').prev(\".first_one:last\");
                elemnt_first.remove();
            }

            if (element.parents('div').siblings(\".first_one\").length == 1) {
                \$('#remove_combo_btn1').hide();
            }
        }

        function add_combo1(element) {
            var elemnt_last;
            if (\$(\".first_one\").length > 1) {
                \$('#remove_combo_btn1').show();
            } else {
                \$('#remove_combo_btn1').hide();
            }
            console.log(element.parents('div').prev(\".first_one:last\").html());

            element.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

            /*\t\telemnt_last = element.parents('div').prev(\".first_one\");
             console.log(elemnt_last.html());
             var html = element.parents('div').prev(\".first_one\").html(); 
             html = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"

             elemnt_last.after(html).find(\"input[type='number']\").val(\"\");
             //.find(\"input[type='number']\").val(\"\") */
        }
        \$(function () {

            if (\$('.first_one').length <= 2) {
                \$('#remove_combo_btn').hide();
            }

            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

        /* function toggleEggsFields(type_meal){
         //breakfast
         if(type_meal == \"1\"){
         \$('.eggs_field').show();
         }else{
         \$('.eggs_field').hide();\t\t
         } 
         } */

    </script>\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Product:addProduct.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1363 => 682,  1345 => 667,  1250 => 576,  1244 => 575,  1226 => 562,  1219 => 557,  1190 => 546,  1185 => 544,  1173 => 535,  1167 => 532,  1160 => 529,  1157 => 528,  1154 => 527,  1151 => 526,  1148 => 525,  1145 => 524,  1142 => 523,  1140 => 522,  1125 => 509,  1122 => 508,  1116 => 507,  1113 => 506,  1097 => 505,  1094 => 504,  1091 => 503,  1085 => 502,  1082 => 501,  1079 => 500,  1076 => 499,  1071 => 498,  1068 => 497,  1065 => 496,  1062 => 495,  1057 => 494,  1055 => 493,  1047 => 492,  1036 => 483,  1033 => 482,  1027 => 481,  1024 => 480,  1008 => 479,  1005 => 478,  1002 => 477,  996 => 476,  993 => 475,  990 => 474,  987 => 473,  982 => 472,  979 => 471,  976 => 470,  973 => 469,  968 => 468,  966 => 467,  958 => 466,  939 => 449,  931 => 445,  927 => 444,  919 => 439,  902 => 424,  899 => 419,  896 => 418,  892 => 416,  889 => 415,  879 => 411,  874 => 409,  859 => 405,  845 => 400,  841 => 399,  828 => 393,  824 => 391,  808 => 381,  804 => 379,  791 => 368,  787 => 366,  774 => 360,  770 => 352,  767 => 351,  761 => 350,  756 => 348,  751 => 347,  749 => 346,  746 => 345,  740 => 343,  738 => 342,  735 => 341,  733 => 340,  729 => 338,  723 => 336,  721 => 335,  718 => 334,  716 => 333,  713 => 332,  707 => 330,  705 => 329,  702 => 328,  700 => 327,  697 => 326,  693 => 325,  690 => 324,  688 => 323,  685 => 322,  682 => 321,  679 => 320,  676 => 319,  673 => 318,  670 => 317,  667 => 316,  664 => 315,  662 => 314,  654 => 311,  649 => 308,  644 => 307,  641 => 306,  639 => 305,  636 => 304,  623 => 286,  615 => 281,  610 => 278,  606 => 277,  597 => 270,  594 => 269,  587 => 267,  584 => 266,  581 => 265,  578 => 264,  576 => 263,  573 => 262,  569 => 260,  566 => 259,  563 => 258,  560 => 257,  555 => 256,  553 => 255,  550 => 254,  548 => 253,  545 => 252,  542 => 251,  540 => 250,  532 => 245,  524 => 239,  521 => 238,  514 => 236,  508 => 234,  499 => 233,  496 => 232,  491 => 231,  489 => 230,  478 => 221,  475 => 220,  469 => 219,  457 => 217,  454 => 216,  449 => 215,  447 => 214,  427 => 197,  412 => 185,  402 => 178,  387 => 166,  377 => 159,  362 => 147,  352 => 139,  343 => 121,  328 => 109,  317 => 101,  313 => 100,  306 => 98,  303 => 97,  300 => 96,  294 => 95,  291 => 94,  288 => 93,  285 => 92,  282 => 91,  279 => 90,  276 => 89,  273 => 88,  270 => 87,  267 => 86,  264 => 85,  261 => 84,  258 => 83,  255 => 82,  252 => 81,  249 => 80,  246 => 79,  243 => 78,  240 => 77,  238 => 76,  235 => 75,  233 => 74,  227 => 72,  223 => 71,  220 => 70,  217 => 69,  214 => 68,  211 => 67,  208 => 66,  205 => 65,  202 => 64,  200 => 63,  190 => 61,  173 => 60,  170 => 59,  167 => 58,  164 => 57,  161 => 56,  158 => 55,  155 => 54,  152 => 53,  149 => 52,  146 => 51,  143 => 50,  140 => 49,  137 => 48,  134 => 47,  131 => 46,  128 => 45,  126 => 44,  121 => 41,  119 => 40,  104 => 27,  95 => 24,  91 => 22,  86 => 21,  77 => 18,  73 => 16,  69 => 15,  62 => 11,  52 => 3,  46 => 2,  30 => 1,);
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
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Product
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        {% for flashMessage in app.session.flashbag.get('success_msg') %}
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

        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Product</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        {% if language_list is defined  and language_list is not empty%}
                           
                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                {% set main_product_master_id = 0 %}
                                {% set main_product_category_id = 0 %}
                                {% set product_image = '' %}
                                {% set product_status = '' %}
                                {% set product_combo = null %}
                                {% set product_combo1 = null %}
                                {% set package_ids = null %}
                                {% set product_nutrition = '' %}
                                {% set product_fat = '' %}
                                {% set product_calory = '' %}
                                {% set product_prot = '' %}
                                {% set product_carb = '' %}
                                {% set product_fiber = '' %}
                                {% set new_combo = null %}
                                {%set style_dis = ''%}

                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_product_saveproduct') %}
                                        {% set product_name = '' %}
                                        {% set product_name_ar = '' %}
                                        {% set product_description = '' %}
                                        {% set product_max_meal_value = 1 %}
                                        {% set package_id = '' %}
                                        {% if main_product is defined and main_product is not empty %}

                                            {% for main_product in main_product %}
                                                {% set new_combo = main_product.combo_array_detail %}\t

                                                {% if main_product.language_id == language.language_master_id %}

                                                    {% set main_product_master_id = main_product.main_product_master_id %}
                                                    {% set main_product_category_id = main_product.main_product_category_id %}
                                                    {% set product_image = main_product.img_url %}
                                                    {% set product_status = main_product.product_status %}
                                                    {% set product_name = main_product.product_name %}
                                                    {% set product_name_ar = main_product.product_name_ar %}
                                                    {% set product_combo = main_product.new_combo %}
                                                    {% set product_combo1 = main_product.product_combo1 %}
                                                    {% set package_id = main_product.package_id %}
                                                    {% set product_description = main_product.product_description %}
                                                    {% set product_fat = main_product.fat %}
                                                    {% set product_calory = main_product.calory %}
                                                    {% set product_fiber = main_product.fiber %}
                                                    {% set product_prot = main_product.prot %}
                                                    {% set product_carb= main_product.carb %}
                                                    {% set product_nutrition = main_product.product_nutrition %}
                                                    {% set product_max_meal_value = main_product.max_meal_value %}
                                                    {% set package_ids = main_product.package_ids %}
                                                {% endif %}
                                            {% endfor %}
                                        {% endif %}

                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_product_master_id\" value=\"{{ main_product_master_id }}\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Name</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input class=\"form-control\" name=\"product_name\" value=\"{{product_name}}\" />
                                                    </div>
                                                </div>

                                            </div>
                                             </br> 
                                             <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Name(Ar)</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input class=\"form-control text-right\" name=\"product_name_ar\" value=\"{{product_name_ar}}\" />
                                                    </div>
                                                </div>

                                            </div>
                                               
                                            {#\t</br>\t
                                            <div class=\"row\">
                                                    <div class=\"col-md-12\">
                                                            <div class=\"col-md-2\">
                                                                    <label>Product Description</label>
                                                            </div>
                                                            <div class=\"col-md-10\">
                                                                    <textarea id=\"editor1\" class=\"ckeditor\" name=\"product_description\">{{ product_description }}</textarea>
                                                            </div>
                                                    </div>
                                                    
                                            </div> #}
                                            <input type=\"hidden\" name=\"product_description\" value=\"\"/>
                                            </br>\t\t
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Nutrition Value</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <textarea id=\"editor1\" class=\"ckeditor\" name=\"product_nutrition\">{{ product_nutrition }}</textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>\t
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Fat</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_fat\" value=\"{{ product_fat }}\" />
                                                    </div>
                                                
                                                    <div class=\"col-md-2\">
                                                        <label>Calorie</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_calory\" value=\"{{ product_calory }}\" />
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                             <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Prot</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_prot\" value=\"{{ product_prot }}\" />
                                                    </div>
                                                
                                                    <div class=\"col-md-2\">
                                                        <label>Carb</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_carb\" value=\"{{ product_carb }}\" />
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                              <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Fiber</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"textbox\" class=\"form-control\" name=\"product_fiber\" value=\"{{ product_fiber }}\" />
                                                    </div>
                                                
                                                   
                                                </div>

                                            </div>
                                            </br>   

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Package</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select id=\"product_package\"  name=\"product_package[]\" class=\"form-control\" multiple required onchange=\"getSubpackage(\$(this).val)\">
                                                            <option value=\"0\">--select package--</option>
                                                            {%if package is not empty%}
                                                                {%for package in package %}
                                                                    {%if language.language_master_id == package.language_id%}
                                                                        <option value=\"{{package.main_package_master_id}}\" {%if package.main_package_master_id in package_ids%}selected{%endif%}>{{package.package_name}}</option>
                                                                    {%endif%}
                                                                {%endfor%}
                                                            {%endif%}
                                                        </select>
                                                    </div>
                                               
                                                    <div class=\"col-md-2\">
                                                        <label>Product Meal Type</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <select name=\"main_product_category_id\" class=\"form-control\" id=\"meal_type\" required>
                                                            <option value=\"\">Select Meal type</option>
                                                            {% if product_cat is defined and product_cat is not empty %}
                                                                {%for product_cat in product_cat%}
                                                                    {% if product_cat.language_id == language.language_master_id %}
                                                                        <option value=\"{{product_cat.main_product_category_master_id}}\" {%if product_cat.main_product_category_master_id == main_product_category_id%} selected{%endif%}>
                                                                            {{product_cat.product_category_name}}\t\t\t\t
                                                                        </option>
                                                                    {%endif%}\t
                                                                {%endfor%}
                                                            {% endif%}
                                                        </select>
                                                    </div>
                                                     <div class=\"col-md-2 hide \">
                                                        <label>Meal Max Value</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                       <input type=\"text\" name=\"meal_max_value\" class=\"form-control\" placeholder=\"Meal Max Value\" value=\"{{product_max_meal_value}}\" /> 
                                                    </div>
                                                </div>
                                            </div>

                                            {% set display_eggs = '' %}
                                            {% set display_none = 'checked' %}

                                            {% set display_prot_carb = '' %}

                                            {% if combo_display is defined and combo_display is not empty %}
                                                {% for combo_display in combo_display %}
                                                    {% if combo_display.combo_type == 'eggs' %}
                                                        {% set display_eggs = 'checked' %}
                                                        {% set display_none = '' %}

                                                    {% endif %}

                                                    {% if combo_display.combo_type == 'prot_carb' %}
                                                        {% set display_prot_carb = 'checked' %}
                                                        {% set display_none = '' %}
                                                    {% endif %}

                                                {% endfor %}
                                            {% endif %}
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Include with Product</label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <label class=\"radio-inline\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='prot_carb' {{display_prot_carb}} onchange=\"call_another_function();\" >
                                                            {# Protein / Carb / #}  Calorie 
                                                        </label>
                                                        <label class=\"radio-inline hide\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='eggs' {{display_eggs}} onchange=\"call_another_function();\" >
                                                            Eggs
                                                        </label>
                                                        
                                                        <label class=\"radio-inline\" >
                                                            <input type='radio' class=\"display_in_app\" name='display_in_app' value='none' {{display_none}} selected  onchange=\"call_another_function();\" >
                                                            None
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t

                                            <div class=\"row\">
                                                <div id=\"b_combo\" style=\"display:block;\">
                                                    {#
                                                    <div class=\"col-md-2\">
                                                            <label></label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                            <em>*</em><label>Leave below details blank if doesnt want to show in App.</label>
                                                    </div>
                                                    #}

                                                    {% if display_none == '' %}
                                                        {% if new_combo is defined and new_combo is not empty %}
                                                            {% for new_combo in new_combo %}
                                                                <div class='col-md-12 form-group'>
                                                                    <div class=\"col-md-2\"></div>
                                                                    <div class=\"col-md-2\">
                                                                        <label data-toggle=\"tooltip\" data-original-title=\"{{new_combo['combo_str']}}\" >{{ new_combo['package_name'] ~ \"-( Grams :  \"~ new_combo['grams'] ~ \" )\"}}</label>
                                                                    </div>

                                                                    {% set raw_eggs_selected = '' %}
                                                                    {% set prot_selected = '' %}
                                                                    {% set carb_selected = '' %}
                                                                    {% set white_eggs_selected = '' %}
                                                                    {% set raw_eggs_count = 0 %}
                                                                    {% set white_eggs_count  = 0 %}
                                                                    {% set prot_count  = '' %}
                                                                    {% set carb_count  = '' %}

                                                                    {% if new_combo.combo_array is defined and new_combo.combo_array %}

                                                                        {% for comboDetail in new_combo.combo_array %}

                                                                            {% if comboDetail.prot_type == 'prot'%}

                                                                                {% set prot_selected = 'checked' %}
                                                                                {% set prot_count = new_combo['grams'] %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            {% endif %}

                                                                            {% if comboDetail.prot_type == 'carb'%}

                                                                                {% set carb_selected = 'checked' %}
                                                                                {% set carb_count = new_combo['grams'] %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            {% endif %}


                                                                            {% if comboDetail.prot_type == 'raw_eggs'%}

                                                                                {% set raw_eggs_selected = 'checked' %}
                                                                                {% set raw_eggs_count = comboDetail.prot_crab %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            {% endif %}

                                                                            {% if comboDetail.prot_type == 'white_eggs'%}
                                                                                {% set white_eggs_selected = 'checked' %}\t
                                                                                {% set white_eggs_count = comboDetail.prot_crab %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                                            {% endif %}
                                                                        {% endfor %}
                                                                    {% endif %}

                                                                    <div class=\"col-md-2\">
                                                                        {#
                                                                                        <label class=\"checkbox-inline\" for=\"id3-{{ new_combo['sub_package_id'] }}\">
                                                                                                <input id='id3-{{ new_combo['sub_package_id'] }}' type='checkbox' name='radio-{{ new_combo['main_combination_id'] }}' value='prot' {{ prot_selected }} onchange=\"toogleEggValue(\$(this),{{ new_combo['sub_package_id'] }},'prot')\" >
                                                                                                Protein
                                                                                        </label>
                                                                        #}
                                                                        <label>Proteins</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" type=\"number\" name=\"proteins[{{ new_combo['sub_package_id'] }}]\" id=\"prot_{{ new_combo['sub_package_id'] }}\" placeholder=\"Enter Proteins\" value=\"{{prot_count}}\" readonly>

                                                                    </div>

                                                                    <div class=\"col-md-2\">
                                                                        {#   <label class=\"checkbox-inline\" for=\"id4-{{ new_combo['sub_package_id'] }}\">  <input id='id4-{{ new_combo['sub_package_id'] }}' type='checkbox' name='radio-{{ new_combo['main_combination_id'] }}' value='carb' {{ carb_selected }} onchange=\"toogleEggValue(\$(this),{{ new_combo['sub_package_id'] }},'carb')\" Carbs </label> #}
                                                                        <label>Carbs</label>

                                                                        <input class=\"form-control\" type=\"number\" name=\"carbs[{{ new_combo['sub_package_id'] }}]\" id=\"carb_{{ new_combo['sub_package_id'] }}\" placeholder=\"Enter Carbs\" value=\"{{carb_count}}\" readonly>

                                                                    </div>


                                                                    <div class=\"col-md-2\">
                                                                        {#
                                                                                <label class=\"checkbox-inline\" for=\"id1-{{ new_combo['sub_package_id'] }}\">
                                                                                        <input id='id1-{{ new_combo['sub_package_id'] }}' type='checkbox' name='radio-{{ new_combo['main_combination_id'] }}' value='raw_eggs' {{ raw_eggs_selected }} onchange=\"toogleEggValue(\$(this),{{ new_combo['sub_package_id'] }},'raw')\" >
                                                                                        Raw Eggs
                                                                                </label>  #}
                                                                        <label>Raw Eggs</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t

                                                                        <input class=\"form-control eggs_input\" type=\"number\" name=\"raw_eggs[{{ new_combo['sub_package_id'] }}]\" id=\"raw_eggs_{{ new_combo['sub_package_id'] }}\" placeholder=\"Enter Raw Eggs\" value=\"{{raw_eggs_count}}\" {% if display_prot_carb == 'checked' %} readonly {% endif %}>

                                                                    </div>

                                                                     <div class=\"col-md-2\">
                                                                        {#
                                                                                <label class=\"checkbox-inline\" for=\"id1-{{ new_combo['sub_package_id'] }}\">
                                                                                        <input id='id1-{{ new_combo['sub_package_id'] }}' type='checkbox' name='radio-{{ new_combo['main_combination_id'] }}' value='raw_eggs' {{ raw_eggs_selected }} onchange=\"toogleEggValue(\$(this),{{ new_combo['sub_package_id'] }},'raw')\" >
                                                                                        Raw Eggs
                                                                                </label>  #}
                                                                        <label>Calorie</label>\t\t\t\t\t\t\t\t\t\t\t\t\t\t

                                                                        <input class=\"form-control eggs_input\" type=\"number\" name=\"calory[{{ new_combo['sub_package_id'] }}]\" id=\"calory_{{ new_combo['sub_package_id'] }}\" placeholder=\"Enter Calorie\" value=\"{{raw_eggs_count}}\">

                                                                    </div>

                                                                    <div class=\"col-md-2\">
                                                                        
                                                                        <label class=\"checkbox-inline\" for=\"id2-{{ new_combo['sub_package_id'] }}\">
                                                                                <input id='id2-{{ new_combo['sub_package_id'] }}' type='checkbox' name='radio-{{ new_combo['main_combination_id'] }}' value='white_eggs' {{ white_eggs_selected }} onchange=\"toogleEggValue(\$(this),{{ new_combo['sub_package_id'] }},'white')\" >
                                                                                White Eggs
                                                                        </label>
                                                                        
                                                                        <label>White Eggs</label>
                                                                        <input type=\"number\" class=\"form-control eggs_input\" name=\"white_eggs[{{ new_combo['sub_package_id'] }}]\" placeholder=\"Enter White Eggs\" id=\"white_eggs_{{ new_combo['sub_package_id'] }}\" value=\"{{white_eggs_count}}\" {% if display_prot_carb == 'checked' %} readonly {% endif %} >

                                                                    </div>

                                                                    <input id='' type='hidden' name='grams[]' value=\"{{ new_combo['grams'] }}\">

                                                                    <input id='' type='hidden' name='subpackid[]' value=\"{{ new_combo['sub_package_id'] }}\">

                                                                </div>\t
                                                            {% endfor %}
                                                        {% else %}

                                                        {% endif %}
                                                    {% endif %}

                                                    {# <div class=\"col-md-12 form-group eggs_field\" style=\"{{style_dis}}\">
                                                            <a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
                                                            <a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this))\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
                                                    </div> #}
                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Product Image </br></label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <input type='file' class=\"form-control product_image\" name=\"product_image\" required=\"required\"/>
                                                    </div>
                                                </div>
                                            </div>

                                            {%if product_image is defined and product_image != ''%}\t
                                                <script>
                                                    \$('.product_image').removeAttr('required');
                                                </script>
                                                <div class=\"row col-md-offset-2\">
                                                    <a data-fancybox='gallery' href=\"{{product_image}}\">
                                                        <img src=\"{{product_image}}\" class=\"img-responsive img-thumbnail\" style=\"height:100px;width:100px\">
                                                    </a>
                                                </div>

                                            {%endif%}\t\t\t\t\t\t\t\t\t\t

                                            </br>

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">

                                                    <div class=\"col-md-2\">
                                                        <label>Product Availability </br></label>
                                                    </div>
                                                    <div class=\"col-md-10\">
                                                        <div class=\"row\">
                                                            <div>
                                                                 <input type='checkbox' class='parentweek1 week1' name=\"product_availability_week[]\" value=\"week1\" onchange=\"selectalldays('week1')\" /> Week 1
                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div {% if language.language_master_id !=1 %}class=\"col-md-6\"  style=\"direction: rtl;\"{% else %}class=\"col-md-7\"{% endif %}>
                                                                {%if days is not empty%}
                                                                    {%for days in days%}
                                                                        {% if language.language_master_id == days.language_id %}
                                                                            {%set checked = ''%}
                                                                            {%if avail is not empty%}
                                                                                {%for avail in avail%}
                                                                                    {%if avail.main_days_id == days.main_days_master_id and 'week1' in avail.week_id %}
                                                                                        {%set checked ='checked=\"checked\"'%}
                                                                                    {%endif%}
                                                                                {%endfor%}
                                                                            {%endif%}

                                                                            <input type='checkbox' class='week1'  name=\"product_availability_week1[]\" value=\"{{days.main_days_master_id}}\" {{checked}}  onchange=\"selectweekname(this,'parentweek1')\" />{% if language.language_master_id !=1 %}&nbsp;&nbsp;{% else %}&nbsp;{% endif %}{{days.days_name}}{% if language.language_master_id !=1 %}&nbsp;&nbsp;&nbsp;{% else %}&nbsp;&nbsp;{% endif %}
                                                                        {%endif%}
                                                                    {%endfor%}
                                                                {%endif%}
                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div>
                                                                 <input type='checkbox' class='parentweek2 week2'  name=\"product_availability_week[]\" value=\"week2\"  onchange=\"selectalldays('week2')\" /> Week 2

                                                            </div>
                                                        </div>
                                                        <div class=\"row\">
                                                            <div {% if language.language_master_id !=1 %}class=\"col-md-6\"  style=\"direction: rtl;\"{% else %}class=\"col-md-7\"{% endif %}>
                                                                {%if days is not empty%}
                                                                    {%for days in days%}
                                                                        {% if language.language_master_id == days.language_id %}
                                                                            {%set checked = ''%}
                                                                            {%if avail is not empty%}
                                                                                {%for avail in avail%}
                                                                                    {%if avail.main_days_id == days.main_days_master_id  and 'week2' in avail.week_id %}
                                                                                        {%set checked ='checked=\"checked\"'%}
                                                                                    {%endif%}
                                                                                {%endfor%}
                                                                            {%endif%}

                                                                            <input type='checkbox' class='week2'  name=\"product_availability_week2[]\" value=\"{{days.main_days_master_id}}\" {{checked}} onchange=\"selectweekname(this,'parentweek2')\" />{% if language.language_master_id !=1 %}&nbsp;&nbsp;{% else %}&nbsp;{% endif %}{{days.days_name}}{% if language.language_master_id !=1 %}&nbsp;&nbsp;&nbsp;{% else %}&nbsp;&nbsp;{% endif %}
                                                                        {%endif%}
                                                                    {%endfor%}
                                                                {%endif%}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>\t\t\t\t\t\t\t\t\t\t\t


                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Status</label>
                                                    </div>
                                                    {%set active_check = ''%}
                                                    {%set inactive_check = ''%}
                                                    {%if product_status == 'active'%}
                                                        {%set active_check = 'checked'%}
                                                    {%endif%}
                                                    {%if product_status == 'inactive'%}
                                                        {%set inactive_check = 'checked'%}
                                                    {%endif%}\t\t\t\t\t\t\t\t\t\t\t\t
                                                    <div class=\"col-lg-8\">
                                                        <label class=\"radio-inline\">
                                                            <input required type=\"radio\" name=\"product_status\" value=\"active\" {{active_check}}>Active
                                                        </label>
                                                        <label class=\"radio-inline\">
                                                            <input required type=\"radio\" name=\"product_status\" value=\"inactive\" {{inactive_check}}>Inactive
                                                        </label>
                                                    </div>\t\t\t\t\t\t\t\t\t\t\t\t
                                                </div>
                                            </div>
                                            </br>
                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                {% if about_us is defined and about_us is not empty %}Update{%else%}Save{%endif%}\t
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                {% endfor %}

                            </div>
                            <!-- end: tab-content -->

                        {% endif %}

                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>

        

        function toogleEggValue(element, sub_pk_id, type) {

            if (element.is(':checked') == false) {

                if (type == 'raw') {
                    \$(\"#raw_eggs_\" + sub_pk_id).val('');
                }
                if (type == 'white') {
                    \$(\"#white_eggs_\" + sub_pk_id).val('');
                }

                if (type == 'prot') {
                    \$(\"#prot_\" + sub_pk_id).val('');
                }

                if (type == 'carb') {
                    \$(\"#carb_\" + sub_pk_id).val('');
                }

            } else {

            }
        }
        function selectalldays(weekname){
            var currentweekvalue = \$('.'+weekname).prop(\"checked\");
            if(currentweekvalue){           
                \$('.'+ weekname).prop('checked', true);
            }
            else{
                \$('.'+ weekname).prop('checked', false);
            }
        }
        function selectweekname(weekname,parentweekname){

            var currentweekvalue = \$(weekname).prop(\"checked\");
            //alert(currentweekvalue);
            if(currentweekvalue){           
                \$('.'+ parentweekname).prop('checked', true);
            }
        }
        \$(document).ready(function (weekname) {


            \$('[data-toggle=\"tooltip\"]').tooltip();
            getSubpackage(\$('#product_package').val());
            \$('#product_package').change(function () {
                /*
                 if(\$('#product_package').val() != '0'){
                 \$('#b_combo').css({'display': 'block'});
                 getSubpackage(\$('#product_package').val());
                 } else {
                 \$('#b_combo').css({'display': 'none'});
                 }
                 */

                getSubpackage(\$('#product_package').val());

            });

            \$('.display_in_app').change(function () {
                if (\$(this).is(':checked')) {
                    if (\$(this).val() == 'prot_carb') {
                        \$('#b_combo').css({'display': 'block'});
                        \$('.eggs_input').val(0);
                        \$('.eggs_input').attr(\"readonly\", \"readonly\");

                    }

                    if (\$(this).val() == 'eggs') {
                        \$('.eggs_input').removeAttr(\"readonly\");

                        \$('#b_combo').css({'display': 'block'});
                    }

                    if (\$(this).val() == 'none') {
                        \$('#b_combo').css({'display': 'none'});
                    }
                }
            });
        });
        function call_another_function() {
            getSubpackage(\$('#product_package').val());
        }
        function getSubpackage(main_pk_id) {    

            var product_master_id = \"{{main_product_id}}\";
            /*
             if(\$('#meal_type').val() != '1'){
             \$('#b_combo').css({'display': 'none'});
             return false;
             }
             */
            var pk_ids = []
            \$(\"#product_package option:selected\").each(function () {
                pk_id_single = {'pk_id': \$(this).val()};
                pk_ids.push(pk_id_single);

            });

        \$.ajax    ({
                url: \"{{path('admin_product_getsubpackages')}}\",
                data: {'pk_ids': JSON.stringify(pk_ids), 'product_master_id': product_master_id},
                method: \"POST\",
                success: function (data) {
                    var res = JSON.parse(data);
                    if (res['success'] == true) {
                        \$('#b_combo').html(res['html']);

                        if (\$(\"input[name='display_in_app']:checked\").val() == 'prot_carb') {
                            \$('.eggs_input').val(0);
                            \$('.eggs_input').attr(\"readonly\", \"readonly\");
                        }

                        //alert(\$(\"input[name='display_in_app']:checked\").val());
                        if (\$(\"input[name='display_in_app']:checked\").val() == 'eggs') {
                            \$('.eggs_input').removeAttr(\"readonly\");
                        }

                        if (\$(\"input[name='display_in_app']:checked\").val() == 'none') {
                            \$('#b_combo').css({'display': 'none'});
                        }

                        \$('[data-toggle=\"tooltip\"]').tooltip();


                    }
                    //\$('.sub_pk').html(data);
                }
            });
        }

        function remove_combo(element) {

            if (element.parents('div').siblings(\".first_one\").length > 1) {
                var elemnt_first = element.parents('div').prev(\".first_one:last\");
                elemnt_first.remove();
            }

            if (element.parents('div').siblings(\".first_one\").length == 1) {
                \$('#remove_combo_btn').hide();
            }
        }

        function add_combo(element) {
            var elemnt_last;
            if (\$(\".first_one\").length > 1) {
                \$('#remove_combo_btn').show();
            } else {
                \$('#remove_combo_btn').hide();
            }
            console.log(element.parents('div').prev(\".first_one:last\").html());

            element.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

            /*\t\telemnt_last = element.parents('div').prev(\".first_one\");
             console.log(elemnt_last.html());
             var html = element.parents('div').prev(\".first_one\").html(); 
             html = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"

             elemnt_last.after(html).find(\"input[type='number']\").val(\"\");
             //.find(\"input[type='number']\").val(\"\") */
        }
        function remove_combo1(element) {

            if (element.parents('div').siblings(\".first_one\").length > 1) {
                var elemnt_first = element.parents('div').prev(\".first_one:last\");
                elemnt_first.remove();
            }

            if (element.parents('div').siblings(\".first_one\").length == 1) {
                \$('#remove_combo_btn1').hide();
            }
        }

        function add_combo1(element) {
            var elemnt_last;
            if (\$(\".first_one\").length > 1) {
                \$('#remove_combo_btn1').show();
            } else {
                \$('#remove_combo_btn1').hide();
            }
            console.log(element.parents('div').prev(\".first_one:last\").html());

            element.parents('div').siblings(\".first_one:last\").clone().insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

            /*\t\telemnt_last = element.parents('div').prev(\".first_one\");
             console.log(elemnt_last.html());
             var html = element.parents('div').prev(\".first_one\").html(); 
             html = \"<div class='col-md-12 first_one form-group'>\"+html+\"</div>\"

             elemnt_last.after(html).find(\"input[type='number']\").val(\"\");
             //.find(\"input[type='number']\").val(\"\") */
        }
        \$(function () {

            if (\$('.first_one').length <= 2) {
                \$('#remove_combo_btn').hide();
            }

            \$('.editor1cls').each(function (e) {
                CKEDITOR.replace(this.id);
            });
        });

        \$(document).ready(function () {

            \$('[data-fancybox=\"gallery\"]').fancybox({
                // Options will go here
            });

        });

        /* function toggleEggsFields(type_meal){
         //breakfast
         if(type_meal == \"1\"){
         \$('.eggs_field').show();
         }else{
         \$('.eggs_field').hide();\t\t
         } 
         } */

    </script>\t
{% endblock %}", "AdminBundle:Product:addProduct.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Product/addProduct.html.twig");
    }
}
