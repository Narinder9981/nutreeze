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

/* AdminBundle:Product:index.html.twig */
class __TwigTemplate_cb01fbc1b7706c5be76fa9fd43281d209c3b051a33f8427a8c827fde081af032 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Product:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Product:index.html.twig", 1);
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
\t\t  Product Listing
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_addproduct");
        echo "\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Product</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
\t\t\t<!-- filter -->
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t<form method=\"post\" action=\"\" id=\"fiter_form\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"><b>Package:</b></div>
\t\t\t\t\t\t\t\t\t\t<select id=\"package\" name=\"package_id\" class=\"col-md-5\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 44
        if (((isset($context["packageList"]) || array_key_exists("packageList", $context)) &&  !twig_test_empty(($context["packageList"] ?? $this->getContext($context, "packageList"))))) {
            // line 45
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["packageList"] ?? $this->getContext($context, "packageList")));
            foreach ($context['_seq'] as $context["_key"] => $context["package"]) {
                // line 46
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "main_package_master_id", []), "html", null, true);
                echo "\" ";
                if (((isset($context["package_id"]) || array_key_exists("package_id", $context)) && (($context["package_id"] ?? $this->getContext($context, "package_id")) == $this->getAttribute($context["package"], "main_package_master_id", [])))) {
                    echo " selected ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["package"], "lang_package_name", []), "html", null, true);
                echo " </option>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 49
        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"><b>Category:</b></div>
\t\t\t\t\t\t\t\t\t\t<select id=\"category\" name=\"category\" class=\"col-md-5\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Select Category</option>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 55
        if (((isset($context["categoryList"]) || array_key_exists("categoryList", $context)) &&  !twig_test_empty(($context["categoryList"] ?? $this->getContext($context, "categoryList"))))) {
            // line 56
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categoryList"] ?? $this->getContext($context, "categoryList")));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 57
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "main_product_category_master_id", []), "html", null, true);
                echo "\" ";
                if (((isset($context["category_id"]) || array_key_exists("category_id", $context)) && (($context["category_id"] ?? $this->getContext($context, "category_id")) == $this->getAttribute($context["category"], "main_product_category_master_id", [])))) {
                    echo " selected ";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "lang_category_name", []), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 60
        echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4 text-center\">
\t\t\t\t\t\t\t\t\t\t<input type=\"submit\" name=\"filter\" id=\"filter\" value=\"Seacrh\" class=\"btn btn-success\">
\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default cancel-btn\" href=\"";
        // line 70
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_index");
        echo "\" >Clear</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- end: filter -->
\t\t\t
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t";
        // line 86
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 87
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 88
                echo "\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "\t
\t\t\t\t";
        }
        // line 91
        echo "\t\t\t\t<th>Category</th>
\t\t\t\t<th>Associate Packages</th>
\t\t\t\t";
        // line 94
        echo "\t\t\t\t<th>Status</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                ";
        // line 98
        if (((isset($context["products"]) || array_key_exists("products", $context)) &&  !twig_test_empty(($context["products"] ?? $this->getContext($context, "products"))))) {
            // line 99
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["products"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["products"]) {
                // line 100
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "image", []), "html", null, true);
                echo "\">\t\t\t
\t\t\t\t\t\t\t\t<img src=\"";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "image", []), "html", null, true);
                echo "\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 108
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "name_ar", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 109
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "product_category_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
                // line 112
                if (($this->getAttribute($context["products"], "package_name_list", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["products"], "package_name_list", [])))) {
                    // line 113
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["products"], "package_name_list", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["package_name"]) {
                        // line 114
                        echo "\t\t\t\t\t\t\t\t\t\t\t<li>";
                        echo twig_escape_filter($this->env, $context["package_name"], "html", null, true);
                        echo "</li>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package_name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 116
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 117
                echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t";
                // line 120
                echo "\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
                // line 122
                $context["checked"] = "";
                // line 123
                echo "\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($context["products"], "product_status", []) == "active")) {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["checked"] = "checked";
                    // line 125
                    echo "\t\t\t\t\t\t\t\t";
                }
                // line 126
                echo "\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status(";
                echo twig_escape_filter($this->env, $this->getAttribute($context["products"], "main_product_master_id", []), "html", null, true);
                echo ",\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" ";
                echo twig_escape_filter($this->env, ($context["checked"] ?? $this->getContext($context, "checked")), "html", null, true);
                echo "/>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 130
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_addproduct", ["main_product_id" => $this->getAttribute($context["products"], "main_product_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"";
                // line 131
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ratings_index", ["product_id" => $this->getAttribute($context["products"], "main_product_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-warning\" data-toggle=\"tooltip\" data-title=\"View Ratings\"><i class=\"fa fa-book\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<a href=\"";
                // line 132
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_deleteproduct", ["main_product_id" => $this->getAttribute($context["products"], "main_product_master_id", [])]), "html", null, true);
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['products'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            echo "\t\t\t\t";
        }
        // line 137
        echo "              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t";
        // line 141
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 142
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 143
                echo "\t\t\t\t\t\t<th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "\t
\t\t\t\t";
        }
        // line 146
        echo "\t\t\t\t<th>Category</th>
\t\t\t\t<th>Associate Packages</th>
\t\t\t\t";
        // line 149
        echo "\t\t\t\t<th>Status</th>\t\t\t\t
\t\t\t\t<th>Operation</th>\t\t\t\t
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

    // line 165
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 166
        echo "  <script>
\t
\tfunction clearing(){
\t\t
\t\t\$(\"#package\").val('');
\t\t\$(\"#category\").val('');


\t}
\t
\tfunction change_status(main_product_id,status){
\t\t\$.ajax({
\t\t\turl : \"";
        // line 178
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_changeproductstatus");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_product_id':main_product_id,'status':status},
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
\t});\t
\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Product:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  445 => 178,  431 => 166,  425 => 165,  404 => 149,  400 => 146,  396 => 144,  387 => 143,  382 => 142,  380 => 141,  374 => 137,  371 => 136,  353 => 132,  349 => 131,  345 => 130,  335 => 126,  332 => 125,  329 => 124,  326 => 123,  324 => 122,  320 => 120,  316 => 117,  313 => 116,  304 => 114,  299 => 113,  297 => 112,  291 => 109,  287 => 108,  283 => 107,  277 => 104,  273 => 103,  268 => 101,  265 => 100,  247 => 99,  245 => 98,  239 => 94,  235 => 91,  231 => 89,  222 => 88,  217 => 87,  215 => 86,  196 => 70,  184 => 60,  181 => 59,  166 => 57,  161 => 56,  159 => 55,  151 => 49,  148 => 48,  133 => 46,  128 => 45,  126 => 44,  109 => 30,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
\t\t  Product Listing
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
\t\t\t<a href=\"{{path('admin_product_addproduct')}}\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Product</a>\t\t
\t\t</div>
        <div class=\"box box-primary\">
\t\t\t<!-- filter -->
\t\t\t<div class=\"box-header with-border\">
\t\t\t\t<div class=\"panel panel-default\">
\t\t\t\t\t<div class=\"panel-body\">
\t\t\t\t\t\t<form method=\"post\" action=\"\" id=\"fiter_form\">
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12 form-group\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"><b>Package:</b></div>
\t\t\t\t\t\t\t\t\t\t<select id=\"package\" name=\"package_id\" class=\"col-md-5\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Select Package</option>
\t\t\t\t\t\t\t\t\t\t\t{% if packageList is defined and packageList is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t{% for package in packageList %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ package.main_package_master_id }}\" {% if package_id is defined and package_id == package.main_package_master_id %} selected {% endif %}>{{ package.lang_package_name }} </option>
\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-md-2\"><b>Category:</b></div>
\t\t\t\t\t\t\t\t\t\t<select id=\"category\" name=\"category\" class=\"col-md-5\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">Select Category</option>
\t\t\t\t\t\t\t\t\t\t\t{% if categoryList is defined and categoryList is not empty %}
\t\t\t\t\t\t\t\t\t\t\t\t{% for category in categoryList %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ category.main_product_category_master_id }}\" {% if category_id is defined and category_id == category.main_product_category_master_id %} selected {% endif %}>{{ category.lang_category_name }}</option>
\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4 text-center\">
\t\t\t\t\t\t\t\t\t\t<input type=\"submit\" name=\"filter\" id=\"filter\" value=\"Seacrh\" class=\"btn btn-success\">
\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-default cancel-btn\" href=\"{{path('admin_product_index')}}\" >Clear</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-md-4\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<!-- end: filter -->
\t\t\t
          <div class=\"box-body table-responsive\">
            <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
              <thead>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t{% if languages is defined and languages is not empty%}
\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t<th>Name : {{language.language_name}}</th>
\t\t\t\t\t{%endfor%}\t
\t\t\t\t{% endif%}
\t\t\t\t<th>Category</th>
\t\t\t\t<th>Associate Packages</th>
\t\t\t\t{#<th>Average Rating</th>#}
\t\t\t\t<th>Status</th>
\t\t\t\t<th>Operation</th>
              </thead>
              <tbody>
                {%if products is defined and products is not empty%}
\t\t\t\t\t{%for products in products%}
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>{{loop.index}}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t<a data-fancybox='gallery' href=\"{{products.image}}\">\t\t\t
\t\t\t\t\t\t\t\t<img src=\"{{products.image}}\" style=\"height:50px;width:50px\" class=\"img-responsive img-thumbnail\"/>
\t\t\t\t\t\t\t</a>\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td>{{products.name}}</td>
\t\t\t\t\t\t\t<td>{{products.name_ar}}</td>
\t\t\t\t\t\t\t<td>{{ products.product_category_name }}</td>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t{% if products.package_name_list is defined and products.package_name_list is not empty %}
\t\t\t\t\t\t\t\t\t\t{% for package_name in products.package_name_list %}
\t\t\t\t\t\t\t\t\t\t\t<li>{{ package_name }}</li>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t{#<td>{{products.ratings}}</td>#}
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% set checked = ''%}
\t\t\t\t\t\t\t\t{% if products.product_status == 'active'%}
\t\t\t\t\t\t\t\t\t{% set checked = 'checked'%}
\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t<input data-on=\"active\" class=\"status status_1\" data-off=\"inactive\" onchange=\"change_status({{products.main_product_master_id}},\$(this).is(':checked'))\" type=\"checkbox\" data-toggle=\"toggle\" data-size=\"mini\" data-onstyle=\"success\" {{checked}}/>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_product_addproduct',{'main_product_id':products.main_product_master_id})}}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_ratings_index',{'product_id':products.main_product_master_id})}}\" class=\"btn btn-xs btn-warning\" data-toggle=\"tooltip\" data-title=\"View Ratings\"><i class=\"fa fa-book\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<a href=\"{{path('admin_product_deleteproduct',{'main_product_id':products.main_product_master_id})}}\" class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure wwant to delete ? ')\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{%endfor%}
\t\t\t\t{%endif%}
              </tbody>
              <tfoot>
                <th>No</th>
\t\t\t\t<th>Image</th>
\t\t\t\t{% if languages is defined and languages is not empty%}
\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t<th>Name : {{language.language_name}}</th>
\t\t\t\t\t{%endfor%}\t
\t\t\t\t{% endif%}
\t\t\t\t<th>Category</th>
\t\t\t\t<th>Associate Packages</th>
\t\t\t\t{#<th>Average Rating</th>#}
\t\t\t\t<th>Status</th>\t\t\t\t
\t\t\t\t<th>Operation</th>\t\t\t\t
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
\t
\tfunction clearing(){
\t\t
\t\t\$(\"#package\").val('');
\t\t\$(\"#category\").val('');


\t}
\t
\tfunction change_status(main_product_id,status){
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_product_changeproductstatus')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'main_product_id':main_product_id,'status':status},
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
\t});\t
\t
  </script>
{% endblock %}
", "AdminBundle:Product:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Product/index.html.twig");
    }
}
