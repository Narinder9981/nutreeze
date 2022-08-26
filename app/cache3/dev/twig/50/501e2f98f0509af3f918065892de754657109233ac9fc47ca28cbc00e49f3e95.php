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

/* AdminBundle:Package:addPackage.html.twig */
class __TwigTemplate_15e57afda7bcc4ff4c24cd7d06a877fd6400af4ffe27ab50d3c1a8be88bf16cb extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Package:addPackage.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Package:addPackage.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 3
        echo "    <style>
        .separator {
    display: flex;
    align-items: center;
    text-align: center;
    margin-bottom: 10px;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .50em;
}
    </style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 23
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 24
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Package
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 37
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 39
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 43
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 45
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Package</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 61
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 62
            echo "                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 64
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 65
                echo "                                        ";
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
                    echo "                                            <li class=\"";
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
                    // line 67
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
                // line 70
                echo "                                    ";
            }
            // line 71
            echo "                                </ul>
                            </div>

                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                ";
            // line 76
            $context["main_package_master_id"] = 0;
            // line 77
            echo "                                ";
            $context["package_meals"] = 0;
            // line 78
            echo "                                ";
            $context["sort_order"] = 0;
            // line 79
            echo "                                ";
            $context["gram_label"] = "Gram";
            // line 80
            echo "                                ";
            $context["off_days_allowed"] = 0;
            // line 81
            echo "                                ";
            $context["package_gram"] = 0;
            // line 82
            echo "                                ";
            $context["package_max_grams_limit"] = 0;
            // line 83
            echo "                                ";
            $context["package_snakes"] = "";
            // line 84
            echo "                                ";
            $context["loyality_point"] = "";
            // line 85
            echo "                                ";
            $context["price_starting_from"] = "";
            // line 86
            echo "                                ";
            $context["sub_packages"] = null;
            // line 87
            echo "                                ";
            $context["img"] = "";
            // line 88
            echo "
                                ";
            // line 89
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
                // line 90
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 92
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_savepackage");
                // line 93
                echo "                                        ";
                $context["package_name"] = "";
                // line 94
                echo "                                        ";
                $context["description"] = "";
                // line 95
                echo "                                        ";
                $context["festival_affect"] = "no";
                // line 96
                echo "                                        ";
                $context["package_type"] = "normal";
                // line 97
                echo "
                                        ";
                // line 98
                if (((isset($context["main_package"]) || array_key_exists("main_package", $context)) &&  !twig_test_empty(($context["main_package"] ?? $this->getContext($context, "main_package"))))) {
                    // line 99
                    echo "

                                            ";
                    // line 101
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["main_package"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["main_package"]) {
                        // line 102
                        echo "                                                ";
                        $context["img"] = $this->getAttribute($context["main_package"], "img_url", []);
                        // line 103
                        echo "
                                                ";
                        // line 104
                        $context["main_package_master_id"] = $this->getAttribute($context["main_package"], "main_package_master_id", []);
                        // line 105
                        echo "
                                                ";
                        // line 106
                        if (($this->getAttribute($context["main_package"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 107
                            echo "                                                    ";
                            $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_updatepackage");
                            // line 108
                            echo "

                                                    ";
                            // line 110
                            $context["package_meals"] = $this->getAttribute($context["main_package"], "package_meals", []);
                            // line 111
                            echo "                                                    ";
                            $context["package_snakes"] = $this->getAttribute($context["main_package"], "package_snakes", []);
                            // line 112
                            echo "                                                    ";
                            $context["price_starting_from"] = $this->getAttribute($context["main_package"], "price_starting_from", []);
                            // line 113
                            echo "                                                    ";
                            $context["package_name"] = $this->getAttribute($context["main_package"], "package_name", []);
                            // line 114
                            echo "                                                    ";
                            $context["sub_packages"] = $this->getAttribute($context["main_package"], "sub_package", []);
                            // line 115
                            echo "                                                    ";
                            $context["description"] = $this->getAttribute($context["main_package"], "description", []);
                            // line 116
                            echo "                                                    ";
                            $context["gram_label"] = $this->getAttribute($context["main_package"], "gram_label", []);
                            // line 117
                            echo "                                                    ";
                            $context["sort_order"] = $this->getAttribute($context["main_package"], "sort_order", []);
                            // line 118
                            echo "                                                    ";
                            $context["off_days_allowed"] = $this->getAttribute($context["main_package"], "off_days_allowed", []);
                            // line 119
                            echo "                                                    ";
                            $context["package_gram"] = $this->getAttribute($context["main_package"], "package_grams", []);
                            // line 120
                            echo "                                                    ";
                            $context["package_max_grams_limit"] = $this->getAttribute($context["main_package"], "package_max_grams_limit", []);
                            // line 121
                            echo "                                                    ";
                            $context["loyality_point"] = $this->getAttribute($context["main_package"], "loyality_point", []);
                            // line 122
                            echo "                                                    ";
                            $context["festival_affect"] = $this->getAttribute($context["main_package"], "festival_affect", []);
                            // line 123
                            echo "                                                    ";
                            $context["package_type"] = $this->getAttribute($context["main_package"], "package_type", []);
                            // line 124
                            echo "                                                ";
                        }
                        // line 125
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['main_package'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 126
                    echo "                                        ";
                }
                // line 127
                echo "
                                        <form id=\"form-";
                // line 128
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_package_master_id\" value=\"";
                // line 130
                echo twig_escape_filter($this->env, ($context["main_package_master_id"] ?? $this->getContext($context, "main_package_master_id")), "html", null, true);
                echo "\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 131
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Name</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input class=\"form-control\" name=\"package_name\" value=\"";
                // line 139
                echo twig_escape_filter($this->env, ($context["package_name"] ?? $this->getContext($context, "package_name")), "html", null, true);
                echo "\" />
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Package Type</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"package_type\" value=\"normal\" checked  ";
                // line 146
                if (((isset($context["package_type"]) || array_key_exists("package_type", $context)) && (($context["package_type"] ?? $this->getContext($context, "package_type")) == "normal"))) {
                    echo "checked ";
                }
                echo " /> Normal
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"package_type\" value=\"festival\" ";
                // line 149
                echo " /> Festival
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Description</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <textarea id=\"editor1\" class=\"ckeditor\" name=\"description\">";
                // line 162
                echo twig_escape_filter($this->env, ($context["description"] ?? $this->getContext($context, "description")), "html", null, true);
                echo "</textarea>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Affect Festival</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"affect_festival\" value=\"no\" checked  ";
                // line 169
                if (((isset($context["festival_affect"]) || array_key_exists("festival_affect", $context)) && (($context["festival_affect"] ?? $this->getContext($context, "festival_affect")) == "no"))) {
                    echo "checked ";
                }
                echo " /> No
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"affect_festival\" value=\"yes\" ";
                // line 172
                echo "  />Yes
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            </br>                                           
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Meal</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"number\" class=\"form-control\" name=\"package_meals\" value=\"";
                // line 186
                echo twig_escape_filter($this->env, ($context["package_meals"] ?? $this->getContext($context, "package_meals")), "html", null, true);
                echo "\" />
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Package Snacks</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"number\" class=\"form-control\" name=\"package_snakes\" value=\"";
                // line 192
                echo twig_escape_filter($this->env, ($context["package_snakes"] ?? $this->getContext($context, "package_snakes")), "html", null, true);
                echo "\" />
                                                    </div>
                                                </div>

                                            </div>

                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Loyality Point</label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input class=\"form-control\" name=\"point\" value=\"";
                // line 205
                echo twig_escape_filter($this->env, ($context["loyality_point"] ?? $this->getContext($context, "loyality_point")), "html", null, true);
                echo "\" />
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Gram Label</label>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <input class=\"form-control\" name=\"gram_label\" value=\"";
                // line 211
                echo twig_escape_filter($this->env, ($context["gram_label"] ?? $this->getContext($context, "gram_label")), "html", null, true);
                echo "\" />
                                                    </div>
                                                    <div class=\"col-md-1\">
                                                        <label>Priority</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <input class=\"form-control\" name=\"sort_order\" value=\"";
                // line 217
                echo twig_escape_filter($this->env, ($context["sort_order"] ?? $this->getContext($context, "sort_order")), "html", null, true);
                echo "\" />
                                                    </div>

                                                    <div class=\"col-md-1\">
                                                        <label>Off Days</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <input type=\"number\" class=\"form-control\" name=\"off_days_allowed\" value=\"";
                // line 224
                echo twig_escape_filter($this->env, ($context["off_days_allowed"] ?? $this->getContext($context, "off_days_allowed")), "html", null, true);
                echo "\" />
                                                    </div>

                                                </div>

                                            </div>
                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Image </br></label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='file' class=\"form-control about_img\" name=\"about_img\" required=\"required\"/>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Gram </br></label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input type='number' placeholder=\"Enter Package Grams\" class=\"form-control \" value=\"";
                // line 243
                echo twig_escape_filter($this->env, ($context["package_gram"] ?? $this->getContext($context, "package_gram")), "html", null, true);
                echo "\" name=\"package_gram\" required=\"required\"/>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Max. Gram </br></label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input type='number' placeholder=\"Enter Maximum Gram Limit\" class=\"form-control\" value=\"";
                // line 249
                echo twig_escape_filter($this->env, ($context["package_max_grams_limit"] ?? $this->getContext($context, "package_max_grams_limit")), "html", null, true);
                echo "\" name=\"package_gram_limit\" required=\"required\"/>
                                                    </div>
                                                </div>

                                            </div>
                                            ";
                // line 254
                if (((isset($context["img"]) || array_key_exists("img", $context)) && (($context["img"] ?? $this->getContext($context, "img")) != ""))) {
                    echo " 
                                                <script>
                                                    \$('.about_img').removeAttr('required');
                                                </script>
                                                <div class=\"row col-md-offset-2\">
                                                    <a data-fancybox='gallery' href=\"";
                    // line 259
                    echo twig_escape_filter($this->env, ($context["img"] ?? $this->getContext($context, "img")), "html", null, true);
                    echo "\">
                                                        <img src=\"";
                    // line 260
                    echo twig_escape_filter($this->env, ($context["img"] ?? $this->getContext($context, "img")), "html", null, true);
                    echo "\" class=\"img-responsive img-thumbnail\" style=\"height:50px;width:50px\">
                                                    </a>
                                                </div>  
                                                </br>
                                            ";
                }
                // line 264
                echo " 

                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Duration</label>
                                                    </div>
                                                    <div class=\"col-md-8\">
                                                        ";
                // line 272
                if (((isset($context["product_for"]) || array_key_exists("product_for", $context)) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                    // line 273
                    echo "                                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["product_for"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["product_for"]) {
                        // line 274
                        echo "                                                                ";
                        if (($this->getAttribute($context["product_for"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 275
                            echo "                                                                    ";
                            $context["this_check"] = "";
                            // line 276
                            echo "                                                                    ";
                            $context["this_price"] = "";
                            // line 277
                            echo "
                                                                    ";
                            // line 278
                            if (($this->getAttribute($context["product_for"], "package_for_relation_id", []) != null)) {
                                // line 279
                                echo "                                                                        ";
                                $context["this_check"] = "checked";
                                // line 280
                                echo "                                                                        ";
                                $context["this_price"] = $this->getAttribute($context["product_for"], "price_selected", []);
                                // line 281
                                echo "
                                                                    ";
                            }
                            // line 283
                            echo "
                                                                    ";
                            // line 284
                            if (($this->getAttribute($context["product_for"], "type", []) == "package_for")) {
                                // line 285
                                echo "                                                                        <div class=\"col-md-4\">
                                                                            <label class=\"checkbox-inline\">
                                                                                <input type=\"checkbox\" name=\"package_for[]\" value=\"";
                                // line 287
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "main_package_for_master_id", []), "html", null, true);
                                echo "\" ";
                                echo twig_escape_filter($this->env, ($context["this_check"] ?? $this->getContext($context, "this_check")), "html", null, true);
                                echo ">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name", []), "html", null, true);
                                echo "
                                                                            </label>
                                                                            <input type=\"text\" name=\"price[";
                                // line 289
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "main_package_for_master_id", []), "html", null, true);
                                echo "]\" class=\"form-control\" placeholder=\"Price\" value=\"";
                                echo twig_escape_filter($this->env, ($context["this_price"] ?? $this->getContext($context, "this_price")), "html", null, true);
                                echo "\"/>
                                                                        </div>
                                                                    ";
                            }
                            // line 292
                            echo "                                                                ";
                        }
                        // line 293
                        echo "                                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_for'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 294
                    echo "                                                        ";
                }
                echo "   
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=\"hide\">
                                            <hr><h5><label>Price Consider while upgarding package. &nbsp;&nbsp;</label><input type=\"button\" class=\"btn btn-info btn-xs\" value=\"Add Gram\" onclick=\"addGramPrice();\" /></h5> 
                                            <div class=\"row gramsetdiv\">
                                                ";
                // line 302
                if (((isset($context["upgrade_gram_Price"]) || array_key_exists("upgrade_gram_Price", $context)) &&  !twig_test_empty(($context["upgrade_gram_Price"] ?? $this->getContext($context, "upgrade_gram_Price"))))) {
                    // line 303
                    echo "                                                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["upgrade_gram_Price"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["upgrade_gram_Price"]) {
                        // line 304
                        echo "                                                        <div class=\"col-md-12 gramset\">                                                   
                                                            <div class=\"col-md-2\">
                                                                <label>Gram</label>
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <input type=\"number\" class=\"form-control\" name=\"upgrade_gram[]\" value=\"";
                        // line 309
                        echo twig_escape_filter($this->env, $this->getAttribute($context["upgrade_gram_Price"], "gram", []), "html", null, true);
                        echo "\" required />
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <label>Gram Price</label>
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <input type=\"text\" class=\"form-control\" name=\"upgrade_gram_price[]\" value=\"";
                        // line 315
                        echo twig_escape_filter($this->env, $this->getAttribute($context["upgrade_gram_Price"], "gram_price", []), "html", null, true);
                        echo "\" required />
                                                            </div>  
                                                        </div>
                                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upgrade_gram_Price'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 318
                    echo "                                                
                                                ";
                } else {
                    // line 320
                    echo "                                                    <div class=\"col-md-12 gramset\">                                                   
                                                        <div class=\"col-md-2\">
                                                            <label>Gram</label>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <input type=\"number\" class=\"form-control\" name=\"upgrade_gram[]\" value=\"0\" required/>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <label>Gram Price</label>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <input type=\"text\" class=\"form-control\" name=\"upgrade_gram_price[]\" value=\"0\" required />
                                                        </div>  
                                                    </div>
                                                ";
                }
                // line 335
                echo "
                                            </div><hr>
                                        </div>
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    ";
                // line 340
                if (((isset($context["categories"]) || array_key_exists("categories", $context)) &&  !twig_test_empty(($context["categories"] ?? $this->getContext($context, "categories"))))) {
                    // line 341
                    echo "                                                        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["categories"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                        // line 342
                        echo "                                                            ";
                        $context["existedUnitPrice"] = 0;
                        // line 343
                        echo "                                                            ";
                        if (((isset($context["unitPrice"]) || array_key_exists("unitPrice", $context)) &&  !twig_test_empty(($context["unitPrice"] ?? $this->getContext($context, "unitPrice"))))) {
                            // line 344
                            echo "                                                                ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["unitPrice"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["unitPrice"]) {
                                // line 345
                                echo "                                                                    ";
                                if (($this->getAttribute($context["categories"], "main_product_category_master_id", []) == $this->getAttribute($context["unitPrice"], "meal_type_id", []))) {
                                    // line 346
                                    echo "                                                                        ";
                                    $context["existedUnitPrice"] = $this->getAttribute($context["unitPrice"], "unit_price", []);
                                    echo "                                                                
                                                                    ";
                                }
                                // line 348
                                echo "                                                                ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['unitPrice'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 349
                            echo "                                                            ";
                        }
                        // line 350
                        echo "
                                                            ";
                        // line 351
                        if (($this->getAttribute($context["categories"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 352
                            echo "                                                                <div class=\"col-md-3\">
                                                                    <label>";
                            // line 353
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "product_category_name", []), "html", null, true);
                            echo "</label>
                                                                    <input class=\"form-control\" name=\"per_category_price[";
                            // line 354
                            echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "main_product_category_master_id", []), "html", null, true);
                            echo "]\" value=\"";
                            echo twig_escape_filter($this->env, ($context["existedUnitPrice"] ?? $this->getContext($context, "existedUnitPrice")), "html", null, true);
                            echo "\" />
                                                                </div>
                                                            ";
                        }
                        // line 357
                        echo "                                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 358
                    echo "                                                    ";
                }
                echo "  
                                                </div>
                                            </div>
                                              ";
                // line 361
                if (((isset($context["product_for"]) || array_key_exists("product_for", $context)) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                    echo " 
                                            <hr><h4><label>Sub Packages : </label></h4> 
                                            <div class=\"row col-md-offset-1\">
                                                ";
                    // line 364
                    if (((isset($context["sub_packages"]) || array_key_exists("sub_packages", $context)) &&  !twig_test_empty(($context["sub_packages"] ?? $this->getContext($context, "sub_packages"))))) {
                        // line 365
                        echo "                                                    ";
                        $context["loopno"] = 0;
                        // line 366
                        echo "                                                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_packages"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_packages"]) {
                            // line 367
                            echo "
                                                        ";
                            // line 368
                            $context["clas1"] = "panel-default";
                            echo " 

                                                        ";
                            // line 370
                            if (((($this->getAttribute($context["language"], "language_master_id", []) == $this->getAttribute($context["sub_packages"], "language_id", [])) && (isset($context["product_for"]) || array_key_exists("product_for", $context))) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                                echo " 
                                                            ";
                                // line 372
                                echo "
                                                            <div class=\"first_one panel panel-default ";
                                // line 373
                                echo twig_escape_filter($this->env, ($context["clas1"] ?? $this->getContext($context, "clas1")), "html", null, true);
                                echo " first_one_";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                                echo "\">
                                                                <div class=\"panel-heading\">
                                                                    Subpackage <input type=\"hidden\" value=\"";
                                // line 375
                                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "main_sub_package_id", []), "html", null, true);
                                echo "\" name=\"sub_";
                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                echo "\" /> 
                                                                    <div class=\"pull-right\">
                                                                         <input type=\"number\"  required class=\"input-sm\" name=\"min_limit_";
                                // line 377
                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                echo "\" placeholder=\"Min Calories\" value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "min_limit", []), "html", null, true);
                                echo "\"/>
                                                                          <input type=\"number\" required class=\"input-sm\" name=\"max_limit_";
                                // line 378
                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                echo "\" placeholder=\"Max Calories\" value=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "max_limit", []), "html", null, true);
                                echo "\"/>
                                                                        <a target=\"_blank\" href=\"";
                                // line 379
                                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_adddefaultvaluesubpackage", ["main_package_id" => ($context["main_package_master_id"] ?? $this->getContext($context, "main_package_master_id")), "sub_package_id" => $this->getAttribute($context["sub_packages"], "main_sub_package_id", []), "language_id" => $this->getAttribute($context["language"], "language_master_id", [])]), "html", null, true);
                                echo "\" id=\"addsubpackagedefaultvalue\" onclick=\"defaultsubpackagecombo(";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "main_package_id", []), "html", null, true);
                                echo ",";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["sub_packages"], "main_sub_package_id", []), "html", null, true);
                                echo " )\"  class=\"  btn btn-xs btn-warning\">Default Values</a> &nbsp;&nbsp;
                                                                        <a href=\"javascript:void(0)\" id=\"removesubpackage\" onclick=\"remove_subpackagecombo(\$(this))\"  class=\" btn btn-xs btn-danger\">Remove</a>

                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class=\"panel-body first_one_panelbody\">


                                                                    ";
                                // line 388
                                if (((isset($context["categories"]) || array_key_exists("categories", $context)) &&  !twig_test_empty(($context["categories"] ?? $this->getContext($context, "categories"))))) {
                                    // line 389
                                    echo "                                                                        <div class=\"row\" >
                                                                            ";
                                    // line 390
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable($context["categories"]);
                                    foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                        // line 391
                                        echo "                                                                                ";
                                        if (($this->getAttribute($context["categories"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                                            // line 392
                                            echo "                                                                                    <div class=\"col-md-1\">
                                                                                        <label>";
                                            // line 393
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "product_category_name", []), "html", null, true);
                                            echo " </label>
                                                                                    </div>
                                                                                    <div class=\"col-md-2\">
                                                                                        ";
                                            // line 396
                                            if (( !twig_test_empty($this->getAttribute($context["sub_packages"], "meal_type", [])) && twig_in_filter($this->getAttribute($context["categories"], "main_product_category_master_id", []), $this->getAttribute($context["sub_packages"], "meal_type_ID", [])))) {
                                                // line 397
                                                echo "                                                                                            ";
                                                $context['_parent'] = $context;
                                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["sub_packages"], "meal_type", []));
                                                foreach ($context['_seq'] as $context["_key"] => $context["mealAray"]) {
                                                    // line 398
                                                    echo "                                                                                                ";
                                                    if (($this->getAttribute($context["mealAray"], "meal_type_id", []) == $this->getAttribute($context["categories"], "main_product_category_master_id", []))) {
                                                        // line 399
                                                        echo "
                                                                                                    <input type='number' class=\"form-control\" name=\"category_amount_value_";
                                                        // line 400
                                                        echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                        echo "[]\" value=\"";
                                                        echo twig_escape_filter($this->env, $this->getAttribute($context["mealAray"], "meal_value", []), "html", null, true);
                                                        echo "\" required=\"required\"/>
                                                                                                    <input type='hidden' class=\"form-control\" name=\"category_type_";
                                                        // line 401
                                                        echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                        echo "[]\" value=\"";
                                                        echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "main_product_category_master_id", []), "html", null, true);
                                                        echo "\" required=\"required\"/>
                                                                                                ";
                                                    }
                                                    // line 403
                                                    echo "                                                                                            ";
                                                }
                                                $_parent = $context['_parent'];
                                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mealAray'], $context['_parent'], $context['loop']);
                                                $context = array_intersect_key($context, $_parent) + $_parent;
                                                // line 404
                                                echo "                                                                                        ";
                                            } else {
                                                // line 405
                                                echo "                                                                                            <input type='number' class=\"form-control\" name=\"category_amount_value_";
                                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                echo "[]\" value=\"\" required=\"required\"/>
                                                                                            <input type='hidden' class=\"form-control\" name=\"category_type_";
                                                // line 406
                                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                echo "[]\" value=\"";
                                                echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "main_product_category_master_id", []), "html", null, true);
                                                echo "\" required=\"required\"/>
                                                                                        ";
                                            }
                                            // line 408
                                            echo "
                                                                                    </div>
                                                                                ";
                                        }
                                        // line 411
                                        echo "                                                                            ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 412
                                    echo "                                                                        </div>
                                                                    ";
                                }
                                // line 414
                                echo "                                                                    <div class=\"separator\">Price</div>
                                                                     <div class=\"row\" >
                                                                    ";
                                // line 416
                                if (((isset($context["product_for"]) || array_key_exists("product_for", $context)) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                                    // line 417
                                    echo "                                                                        ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable($context["product_for"]);
                                    foreach ($context['_seq'] as $context["_key"] => $context["product_for"]) {
                                        // line 418
                                        echo "                                                                            ";
                                        if (($this->getAttribute($context["product_for"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                                            // line 419
                                            echo "
                                                                                <div class=\"col-md-1\">
                                                                                    <label> ";
                                            // line 421
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name", []), "html", null, true);
                                            echo " ";
                                            if (($this->getAttribute($context["product_for"], "friday_offday", []) == "no")) {
                                                echo " <font color=\"red\" style=\"font-size: 10px;\">Firday: On</font> ";
                                            }
                                            echo "</label>
                                                                                </div>

                                                                                ";
                                            // line 424
                                            $context["input_text_displayed"] = false;
                                            // line 425
                                            echo "
                                                                                ";
                                            // line 426
                                            if ( !twig_test_empty($this->getAttribute($context["sub_packages"], "price_array", []))) {
                                                // line 427
                                                echo "                                                                                    ";
                                                $context['_parent'] = $context;
                                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["sub_packages"], "price_array", []));
                                                foreach ($context['_seq'] as $context["_key"] => $context["priceAray"]) {
                                                    // line 428
                                                    echo "                                                                                        ";
                                                    if (($this->getAttribute($context["priceAray"], "duration", []) == $this->getAttribute($context["product_for"], "name_db", []))) {
                                                        // line 429
                                                        echo "
                                                                                            ";
                                                        // line 430
                                                        $context["input_text_displayed"] = true;
                                                        // line 431
                                                        echo "
                                                                                            <div class=\"col-md-2\">
                                                                                                <input type='number' class=\"form-control\" name=\"price_sub_of_";
                                                        // line 433
                                                        echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                        echo "[";
                                                        echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name_db", []), "html", null, true);
                                                        echo "]\" value=\"";
                                                        echo twig_escape_filter($this->env, $this->getAttribute($context["priceAray"], "price", []), "html", null, true);
                                                        echo "\" required=\"required\"/>

                                                                                            </div>
                                                                                        ";
                                                    }
                                                    // line 437
                                                    echo "                                                                                    ";
                                                }
                                                $_parent = $context['_parent'];
                                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['priceAray'], $context['_parent'], $context['loop']);
                                                $context = array_intersect_key($context, $_parent) + $_parent;
                                                // line 438
                                                echo "
                                                                                    ";
                                                // line 439
                                                if ((($context["input_text_displayed"] ?? $this->getContext($context, "input_text_displayed")) == false)) {
                                                    // line 440
                                                    echo "                                                                                        <div class=\"col-md-2\">
                                                                                            <input type='number' class=\"form-control\" name=\"price_sub_of_";
                                                    // line 441
                                                    echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                    echo "[";
                                                    echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name_db", []), "html", null, true);
                                                    echo "]\" value=\"0\" required=\"required\"/>

                                                                                        </div>
                                                                                    ";
                                                }
                                                // line 445
                                                echo "                                                                                ";
                                            } else {
                                                // line 446
                                                echo "

                                                                                    <div class=\"col-md-2\">
                                                                                        <input type='number' class=\"form-control\" name=\"price_sub_of_";
                                                // line 449
                                                echo twig_escape_filter($this->env, ($context["loopno"] ?? $this->getContext($context, "loopno")), "html", null, true);
                                                echo "[";
                                                echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name_db", []), "html", null, true);
                                                echo "]\" value=\"0\" required=\"required\"/>

                                                                                    </div>

                                                                                ";
                                            }
                                            // line 454
                                            echo "
                                                                            ";
                                        }
                                        // line 456
                                        echo "                                                                        ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_for'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    echo "    
                                                                    ";
                                } else {
                                    // line 458
                                    echo "                                                                        <label class=\"label-control\">Please Select this Package in 'Package For Types'</label>
                                                                    ";
                                }
                                // line 460
                                echo "</div>
                                                                </div>
                                                            </div>  
                                                            ";
                                // line 463
                                $context["loopno"] = (($context["loopno"] ?? $this->getContext($context, "loopno")) + 1);
                                // line 464
                                echo "                                                        ";
                            }
                            // line 465
                            echo "
                                                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_packages'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 467
                        echo "                                                ";
                    } else {
                        // line 468
                        echo "                                                    <div class=\"first_one panel panel-default first_one_";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                        echo "\">
                                                        <div class=\"panel-heading\">

                                                            Subpackage <input type=\"hidden\" value=\"0\" class=\"sub\" name=\"sub_0\" />

                                                        </div>
                                                        <div class=\"panel-body first_one_panelbody\">

                                                            ";
                        // line 476
                        if (((isset($context["categories"]) || array_key_exists("categories", $context)) &&  !twig_test_empty(($context["categories"] ?? $this->getContext($context, "categories"))))) {
                            // line 477
                            echo "                                                                <div class=\"row\">";
                            // line 478
                            echo "                                                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["categories"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["categories"]) {
                                // line 479
                                echo "                                                                        ";
                                if (($this->getAttribute($context["categories"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                                    // line 480
                                    echo "                                                                            <div class=\"col-md-1\">
                                                                                <label>";
                                    // line 481
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "product_category_name", []), "html", null, true);
                                    echo "</label>
                                                                            </div>
                                                                            <div class=\"col-md-2\">
                                                                                <input type='hidden' class=\"form-control\" name=\"category_type_0[]\" value=\"";
                                    // line 484
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["categories"], "main_product_category_master_id", []), "html", null, true);
                                    echo "\" required=\"required\"/>
                                                                                <input type='number' class=\"form-control\" name=\"category_amount_value_0[]\" value=\"\" required=\"required\"/>

                                                                            </div>
                                                                        ";
                                }
                                // line 489
                                echo "                                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categories'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 490
                            echo "                                                                </div>  
                                                            ";
                        }
                        // line 492
                        echo "                                                            <div class=\"separator\">Price</div>

                                                            ";
                        // line 494
                        if (((isset($context["product_for"]) || array_key_exists("product_for", $context)) &&  !twig_test_empty(($context["product_for"] ?? $this->getContext($context, "product_for"))))) {
                            // line 495
                            echo "                                                                <div class=\"row\" > ";
                            // line 496
                            echo "                                                                    ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($context["product_for"]);
                            foreach ($context['_seq'] as $context["_key"] => $context["product_for"]) {
                                // line 497
                                echo "                                                                        ";
                                if (($this->getAttribute($context["product_for"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                                    // line 498
                                    echo "
                                                                            <div class=\"col-md-1\">
                                                                                <label>";
                                    // line 500
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name", []), "html", null, true);
                                    echo " ";
                                    if (($this->getAttribute($context["product_for"], "friday_offday", []) == "no")) {
                                        echo " <font color=\"red\" style=\"font-size: 10px;\">Firday: On</font> ";
                                    }
                                    echo "</label>
                                                                            </div>
                                                                            <div class=\"col-md-2\">
                                                                                <input type='number' class=\"form-control\" name=\"price_sub_of_0[";
                                    // line 503
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["product_for"], "name_db", []), "html", null, true);
                                    echo "]\" value=\"\" required=\"required\"/>

                                                                            </div>
                                                                        ";
                                }
                                // line 507
                                echo "                                                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_for'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 508
                            echo "                                                                 </div>
                                                            ";
                        } else {
                            // line 510
                            echo "                                                                <label class=\"label-control\">Please Select this Package in 'Package For Types'</label>
                                                            ";
                        }
                        // line 512
                        echo "

                                                           
                                                        </div>
                                                    </div>      
                                                ";
                    }
                    // line 518
                    echo "
                                                <div class=\"col-md-12 form-group\">
                                                    <a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
                                                    <a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this),";
                    // line 521
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                    echo " )\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
                                                </div>
                                            </div>
                                            ";
                } else {
                    // line 525
                    echo "                                                <br><label class=\"label-control\"> Please Select 'Package for type' to Add Sub Packages in this Package</label>
                                            ";
                }
                // line 527
                echo "                                            </br>
                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"";
                // line 531
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                ";
                // line 533
                if (((isset($context["about_us"]) || array_key_exists("about_us", $context)) &&  !twig_test_empty(($context["about_us"] ?? $this->getContext($context, "about_us"))))) {
                    echo "Update";
                } else {
                    echo "Save";
                }
                echo "   
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
            // line 544
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 549
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

    // line 562
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 563
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>

                                                        function addGramPrice() {
                                                            \$(\".gramset:first\").clone().appendTo(\".gramsetdiv\").find('input').val('');
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

                                                        function remove_subpackagecombo(element) {
                                                            if (element.parents('div').siblings(\".first_one\").length == 0) {
                                                                alert(\"You can not delete all sub packages\");
                                                            } else {
                                                                element.parent().parent().remove();
                                                            }
                                                        }

                                                        function defaultsubpackagecombo(package_id, subpackage_id) {

                                                        }

                                                        function add_combo(element, lang_id) {
                                                            var elemnt_last;
                                                            // console.log(\$(\".first_one\").length);
                                                            langwise_cnt = ((\$(\".first_one_\" + lang_id).length));
                                                            langwise_cnt_minus = langwise_cnt - 1;
                                                            // alert('current cnt : '+langwise_cnt);
                                                            if (\$(\".first_one\").length > 1) {
                                                                \$('#remove_combo_btn').show();
                                                            } else {
                                                                \$('#remove_combo_btn').hide();
                                                            }
                                                            // console.log(langwise_cnt);
                                                            // console.log(element.parents('div').prev(\".first_one:last\").html());
                                                            // console.log((element).find('input'));
                                                            var CloneData = element.parents('div').siblings(\".first_one:last\").clone();
                                                            CloneData.find('input').each(function () {
                                                                this.name = this.name.replace('_' + langwise_cnt_minus, '_' + langwise_cnt);
                                                            });

                                                            console.log(CloneData.find('input[name=\"sub_' + langwise_cnt + '\"]').val(0));
                                                            // console.log
                                                            CloneData.insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

                                                            /*      elemnt_last = element.parents('div').prev(\".first_one\");
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

    </script>   
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Package:addPackage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1301 => 563,  1295 => 562,  1277 => 549,  1270 => 544,  1241 => 533,  1236 => 531,  1230 => 527,  1226 => 525,  1219 => 521,  1214 => 518,  1206 => 512,  1202 => 510,  1198 => 508,  1192 => 507,  1185 => 503,  1175 => 500,  1171 => 498,  1168 => 497,  1163 => 496,  1161 => 495,  1159 => 494,  1155 => 492,  1151 => 490,  1145 => 489,  1137 => 484,  1131 => 481,  1128 => 480,  1125 => 479,  1120 => 478,  1118 => 477,  1116 => 476,  1104 => 468,  1101 => 467,  1094 => 465,  1091 => 464,  1089 => 463,  1084 => 460,  1080 => 458,  1071 => 456,  1067 => 454,  1057 => 449,  1052 => 446,  1049 => 445,  1040 => 441,  1037 => 440,  1035 => 439,  1032 => 438,  1026 => 437,  1015 => 433,  1011 => 431,  1009 => 430,  1006 => 429,  1003 => 428,  998 => 427,  996 => 426,  993 => 425,  991 => 424,  981 => 421,  977 => 419,  974 => 418,  969 => 417,  967 => 416,  963 => 414,  959 => 412,  953 => 411,  948 => 408,  941 => 406,  936 => 405,  933 => 404,  927 => 403,  920 => 401,  914 => 400,  911 => 399,  908 => 398,  903 => 397,  901 => 396,  895 => 393,  892 => 392,  889 => 391,  885 => 390,  882 => 389,  880 => 388,  864 => 379,  858 => 378,  852 => 377,  845 => 375,  838 => 373,  835 => 372,  831 => 370,  826 => 368,  823 => 367,  818 => 366,  815 => 365,  813 => 364,  807 => 361,  800 => 358,  794 => 357,  786 => 354,  782 => 353,  779 => 352,  777 => 351,  774 => 350,  771 => 349,  765 => 348,  759 => 346,  756 => 345,  751 => 344,  748 => 343,  745 => 342,  740 => 341,  738 => 340,  731 => 335,  714 => 320,  710 => 318,  700 => 315,  691 => 309,  684 => 304,  679 => 303,  677 => 302,  665 => 294,  659 => 293,  656 => 292,  648 => 289,  639 => 287,  635 => 285,  633 => 284,  630 => 283,  626 => 281,  623 => 280,  620 => 279,  618 => 278,  615 => 277,  612 => 276,  609 => 275,  606 => 274,  601 => 273,  599 => 272,  589 => 264,  581 => 260,  577 => 259,  569 => 254,  561 => 249,  552 => 243,  530 => 224,  520 => 217,  511 => 211,  502 => 205,  486 => 192,  477 => 186,  461 => 172,  453 => 169,  443 => 162,  428 => 149,  420 => 146,  410 => 139,  399 => 131,  395 => 130,  388 => 128,  385 => 127,  382 => 126,  376 => 125,  373 => 124,  370 => 123,  367 => 122,  364 => 121,  361 => 120,  358 => 119,  355 => 118,  352 => 117,  349 => 116,  346 => 115,  343 => 114,  340 => 113,  337 => 112,  334 => 111,  332 => 110,  328 => 108,  325 => 107,  323 => 106,  320 => 105,  318 => 104,  315 => 103,  312 => 102,  308 => 101,  304 => 99,  302 => 98,  299 => 97,  296 => 96,  293 => 95,  290 => 94,  287 => 93,  285 => 92,  275 => 90,  258 => 89,  255 => 88,  252 => 87,  249 => 86,  246 => 85,  243 => 84,  240 => 83,  237 => 82,  234 => 81,  231 => 80,  228 => 79,  225 => 78,  222 => 77,  220 => 76,  213 => 71,  210 => 70,  191 => 67,  178 => 66,  160 => 65,  158 => 64,  154 => 62,  152 => 61,  137 => 48,  128 => 45,  124 => 43,  119 => 42,  110 => 39,  106 => 37,  102 => 36,  95 => 32,  85 => 24,  79 => 23,  53 => 3,  47 => 2,  31 => 1,);
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
{% block css %}
    <style>
        .separator {
    display: flex;
    align-items: center;
    text-align: center;
    margin-bottom: 10px;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .50em;
}
    </style>
{% endblock %}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Add Package
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
                        <h3 class=\"box-title\">Add / Update Package</h3>
                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        {% if language_list is defined  and language_list is not empty%}
                            <div class=\"nav-tabs-custom\">
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

                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                {% set main_package_master_id = 0 %}
                                {% set package_meals = 0 %}
                                {% set sort_order = 0 %}
                                {% set gram_label = 'Gram' %}
                                {% set off_days_allowed = 0 %}
                                {% set package_gram = 0 %}
                                {% set package_max_grams_limit = 0 %}
                                {% set package_snakes = '' %}
                                {% set loyality_point = '' %}
                                {% set price_starting_from = '' %}
                                {% set sub_packages = null %}
                                {% set img = '' %}

                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_package_savepackage') %}
                                        {% set package_name = '' %}
                                        {% set description = '' %}
                                        {% set festival_affect = 'no' %}
                                        {% set package_type = 'normal' %}

                                        {% if main_package is defined and main_package is not empty %}


                                            {% for main_package in main_package %}
                                                {%set img = main_package.img_url%}

                                                {% set main_package_master_id = main_package.main_package_master_id %}

                                                {% if main_package.language_id == language.language_master_id %}
                                                    {% set action = path('admin_package_updatepackage') %}


                                                    {% set package_meals = main_package.package_meals %}
                                                    {% set package_snakes = main_package.package_snakes %}
                                                    {% set price_starting_from = main_package.price_starting_from %}
                                                    {% set package_name = main_package.package_name %}
                                                    {% set sub_packages = main_package.sub_package %}
                                                    {% set description = main_package.description %}
                                                    {% set gram_label = main_package.gram_label %}
                                                    {% set sort_order = main_package.sort_order %}
                                                    {% set off_days_allowed = main_package.off_days_allowed %}
                                                    {% set package_gram = main_package.package_grams %}
                                                    {% set package_max_grams_limit = main_package.package_max_grams_limit %}
                                                    {% set loyality_point = main_package.loyality_point %}
                                                    {% set festival_affect = main_package.festival_affect %}
                                                    {% set package_type = main_package.package_type %}
                                                {% endif %}
                                            {% endfor %}
                                        {% endif %}

                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\" enctype=\"multipart/form-data\">

                                            <input type=\"hidden\" name=\"main_package_master_id\" value=\"{{ main_package_master_id }}\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">

                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Name</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input class=\"form-control\" name=\"package_name\" value=\"{{package_name}}\" />
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Package Type</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"package_type\" value=\"normal\" checked  {%if package_type is defined and package_type == \"normal\" %}checked {%endif%} /> Normal
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"package_type\" value=\"festival\" {# {%if package_type is defined and package_type == \"festival\" %}checked {%endif%}  #} /> Festival
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </br>   
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Description</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <textarea id=\"editor1\" class=\"ckeditor\" name=\"description\">{{ description }}</textarea>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Affect Festival</label>
                                                    </div>
                                                    <div class=\"col-md-4 hide\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"affect_festival\" value=\"no\" checked  {%if festival_affect is defined and festival_affect == \"no\" %}checked {%endif%} /> No
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"affect_festival\" value=\"yes\" {# {%if festival_affect is defined and festival_affect == \"yes\" %}checked {%endif%} #}  />Yes
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            </br>                                           
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Meal</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"number\" class=\"form-control\" name=\"package_meals\" value=\"{{package_meals}}\" />
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <label>Package Snacks</label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type=\"number\" class=\"form-control\" name=\"package_snakes\" value=\"{{package_snakes}}\" />
                                                    </div>
                                                </div>

                                            </div>

                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2 hide\">
                                                        <label>Loyality Point</label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input class=\"form-control\" name=\"point\" value=\"{{loyality_point}}\" />
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Gram Label</label>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <input class=\"form-control\" name=\"gram_label\" value=\"{{gram_label}}\" />
                                                    </div>
                                                    <div class=\"col-md-1\">
                                                        <label>Priority</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <input class=\"form-control\" name=\"sort_order\" value=\"{{sort_order}}\" />
                                                    </div>

                                                    <div class=\"col-md-1\">
                                                        <label>Off Days</label>
                                                    </div>
                                                    <div class=\"col-md-2\">
                                                        <input type=\"number\" class=\"form-control\" name=\"off_days_allowed\" value=\"{{off_days_allowed}}\" />
                                                    </div>

                                                </div>

                                            </div>
                                            </br>
                                            <div class=\"row\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Image </br></label>
                                                    </div>
                                                    <div class=\"col-md-4\">
                                                        <input type='file' class=\"form-control about_img\" name=\"about_img\" required=\"required\"/>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Gram </br></label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input type='number' placeholder=\"Enter Package Grams\" class=\"form-control \" value=\"{{package_gram}}\" name=\"package_gram\" required=\"required\"/>
                                                    </div>
                                                    <div class=\"col-md-1 hide\">
                                                        <label>Max. Gram </br></label>
                                                    </div>
                                                    <div class=\"col-md-2 hide\">
                                                        <input type='number' placeholder=\"Enter Maximum Gram Limit\" class=\"form-control\" value=\"{{package_max_grams_limit}}\" name=\"package_gram_limit\" required=\"required\"/>
                                                    </div>
                                                </div>

                                            </div>
                                            {%if img is defined and img != ''%} 
                                                <script>
                                                    \$('.about_img').removeAttr('required');
                                                </script>
                                                <div class=\"row col-md-offset-2\">
                                                    <a data-fancybox='gallery' href=\"{{img}}\">
                                                        <img src=\"{{img}}\" class=\"img-responsive img-thumbnail\" style=\"height:50px;width:50px\">
                                                    </a>
                                                </div>  
                                                </br>
                                            {%endif%} 

                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-2\">
                                                        <label>Package Duration</label>
                                                    </div>
                                                    <div class=\"col-md-8\">
                                                        {% if product_for is defined and product_for is not empty%}
                                                            {%for product_for in product_for%}
                                                                {% if product_for.language_id == language.language_master_id %}
                                                                    {% set this_check = '' %}
                                                                    {% set this_price = '' %}

                                                                    {%if product_for.package_for_relation_id != null%}
                                                                        {% set this_check = 'checked' %}
                                                                        {% set this_price = product_for.price_selected %}

                                                                    {%endif%}

                                                                    {%if product_for.type == 'package_for'%}
                                                                        <div class=\"col-md-4\">
                                                                            <label class=\"checkbox-inline\">
                                                                                <input type=\"checkbox\" name=\"package_for[]\" value=\"{{product_for.main_package_for_master_id}}\" {{this_check}}>{{product_for.name}}
                                                                            </label>
                                                                            <input type=\"text\" name=\"price[{{product_for.main_package_for_master_id}}]\" class=\"form-control\" placeholder=\"Price\" value=\"{{this_price}}\"/>
                                                                        </div>
                                                                    {%endif%}
                                                                {% endif %}
                                                            {%endfor%}
                                                        {%endif%}   
                                                    </div>
                                                </div>

                                            </div>
                                            <div class=\"hide\">
                                            <hr><h5><label>Price Consider while upgarding package. &nbsp;&nbsp;</label><input type=\"button\" class=\"btn btn-info btn-xs\" value=\"Add Gram\" onclick=\"addGramPrice();\" /></h5> 
                                            <div class=\"row gramsetdiv\">
                                                {%if upgrade_gram_Price is defined and upgrade_gram_Price is not empty %}
                                                    {%for upgrade_gram_Price in upgrade_gram_Price %}
                                                        <div class=\"col-md-12 gramset\">                                                   
                                                            <div class=\"col-md-2\">
                                                                <label>Gram</label>
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <input type=\"number\" class=\"form-control\" name=\"upgrade_gram[]\" value=\"{{upgrade_gram_Price.gram}}\" required />
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <label>Gram Price</label>
                                                            </div>
                                                            <div class=\"col-md-2\">
                                                                <input type=\"text\" class=\"form-control\" name=\"upgrade_gram_price[]\" value=\"{{upgrade_gram_Price.gram_price}}\" required />
                                                            </div>  
                                                        </div>
                                                    {%endfor%}                                                
                                                {%else%}
                                                    <div class=\"col-md-12 gramset\">                                                   
                                                        <div class=\"col-md-2\">
                                                            <label>Gram</label>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <input type=\"number\" class=\"form-control\" name=\"upgrade_gram[]\" value=\"0\" required/>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <label>Gram Price</label>
                                                        </div>
                                                        <div class=\"col-md-2\">
                                                            <input type=\"text\" class=\"form-control\" name=\"upgrade_gram_price[]\" value=\"0\" required />
                                                        </div>  
                                                    </div>
                                                {%endif%}

                                            </div><hr>
                                        </div>
                                            <div class=\"row hide\">
                                                <div class=\"col-md-12\">
                                                    {% if categories is defined and categories is not empty %}
                                                        {% for categories in categories %}
                                                            {% set  existedUnitPrice = 0 %}
                                                            {% if unitPrice is defined and unitPrice is not empty %}
                                                                {% for unitPrice in unitPrice %}
                                                                    {% if categories.main_product_category_master_id == unitPrice.meal_type_id %}
                                                                        {% set existedUnitPrice = unitPrice.unit_price %}                                                                
                                                                    {% endif %}
                                                                {% endfor %}
                                                            {% endif %}

                                                            {% if categories.language_id == language.language_master_id %}
                                                                <div class=\"col-md-3\">
                                                                    <label>{{categories.product_category_name}}</label>
                                                                    <input class=\"form-control\" name=\"per_category_price[{{categories.main_product_category_master_id}}]\" value=\"{{existedUnitPrice}}\" />
                                                                </div>
                                                            {% endif %}
                                                        {% endfor %}
                                                    {% endif %}  
                                                </div>
                                            </div>
                                              {%if  product_for is defined and product_for is not empty%} 
                                            <hr><h4><label>Sub Packages : </label></h4> 
                                            <div class=\"row col-md-offset-1\">
                                                {%if sub_packages is defined and sub_packages is not empty%}
                                                    {% set loopno = 0 %}
                                                    {%for sub_packages in sub_packages %}

                                                        {%set clas1 = 'panel-default' %} 

                                                        {%if language.language_master_id == sub_packages.language_id and product_for is defined and product_for is not empty%} 
                                                            {#{%set clas1 = 'panel-warning' %} #}

                                                            <div class=\"first_one panel panel-default {{clas1}} first_one_{{language.language_master_id}}\">
                                                                <div class=\"panel-heading\">
                                                                    Subpackage <input type=\"hidden\" value=\"{{sub_packages.main_sub_package_id}}\" name=\"sub_{{loopno}}\" /> 
                                                                    <div class=\"pull-right\">
                                                                         <input type=\"number\"  required class=\"input-sm\" name=\"min_limit_{{loopno}}\" placeholder=\"Min Calories\" value=\"{{sub_packages.min_limit}}\"/>
                                                                          <input type=\"number\" required class=\"input-sm\" name=\"max_limit_{{loopno}}\" placeholder=\"Max Calories\" value=\"{{sub_packages.max_limit}}\"/>
                                                                        <a target=\"_blank\" href=\"{{path('admin_package_adddefaultvaluesubpackage',{'main_package_id':main_package_master_id,'sub_package_id':sub_packages.main_sub_package_id,'language_id':language.language_master_id})}}\" id=\"addsubpackagedefaultvalue\" onclick=\"defaultsubpackagecombo({{sub_packages.main_package_id}},{{sub_packages.main_sub_package_id}} )\"  class=\"  btn btn-xs btn-warning\">Default Values</a> &nbsp;&nbsp;
                                                                        <a href=\"javascript:void(0)\" id=\"removesubpackage\" onclick=\"remove_subpackagecombo(\$(this))\"  class=\" btn btn-xs btn-danger\">Remove</a>

                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class=\"panel-body first_one_panelbody\">


                                                                    {% if categories is defined and categories is not empty %}
                                                                        <div class=\"row\" >
                                                                            {% for categories in categories %}
                                                                                {% if categories.language_id == language.language_master_id %}
                                                                                    <div class=\"col-md-1\">
                                                                                        <label>{{categories.product_category_name}} </label>
                                                                                    </div>
                                                                                    <div class=\"col-md-2\">
                                                                                        {% if sub_packages.meal_type is not empty and categories.main_product_category_master_id in sub_packages.meal_type_ID %}
                                                                                            {% for mealAray in sub_packages.meal_type  %}
                                                                                                {% if mealAray.meal_type_id == categories.main_product_category_master_id %}

                                                                                                    <input type='number' class=\"form-control\" name=\"category_amount_value_{{loopno}}[]\" value=\"{{mealAray.meal_value}}\" required=\"required\"/>
                                                                                                    <input type='hidden' class=\"form-control\" name=\"category_type_{{loopno}}[]\" value=\"{{categories.main_product_category_master_id}}\" required=\"required\"/>
                                                                                                {% endif %}
                                                                                            {% endfor %}
                                                                                        {% else %}
                                                                                            <input type='number' class=\"form-control\" name=\"category_amount_value_{{loopno}}[]\" value=\"\" required=\"required\"/>
                                                                                            <input type='hidden' class=\"form-control\" name=\"category_type_{{loopno}}[]\" value=\"{{categories.main_product_category_master_id}}\" required=\"required\"/>
                                                                                        {% endif %}

                                                                                    </div>
                                                                                {% endif %}
                                                                            {% endfor %}
                                                                        </div>
                                                                    {% endif %}
                                                                    <div class=\"separator\">Price</div>
                                                                     <div class=\"row\" >
                                                                    {% if product_for is defined and product_for is not empty%}
                                                                        {%for product_for in product_for%}
                                                                            {% if product_for.language_id == language.language_master_id %}

                                                                                <div class=\"col-md-1\">
                                                                                    <label> {{product_for.name}} {%if product_for.friday_offday == 'no' %} <font color=\"red\" style=\"font-size: 10px;\">Firday: On</font> {%endif%}</label>
                                                                                </div>

                                                                                {% set input_text_displayed = false %}

                                                                                {% if sub_packages.price_array is not empty %}
                                                                                    {% for priceAray in sub_packages.price_array %}
                                                                                        {% if priceAray.duration == product_for.name_db %}

                                                                                            {% set input_text_displayed = true %}

                                                                                            <div class=\"col-md-2\">
                                                                                                <input type='number' class=\"form-control\" name=\"price_sub_of_{{loopno}}[{{product_for.name_db}}]\" value=\"{{priceAray.price}}\" required=\"required\"/>

                                                                                            </div>
                                                                                        {% endif %}
                                                                                    {% endfor %}

                                                                                    {% if input_text_displayed == false %}
                                                                                        <div class=\"col-md-2\">
                                                                                            <input type='number' class=\"form-control\" name=\"price_sub_of_{{loopno}}[{{product_for.name_db}}]\" value=\"0\" required=\"required\"/>

                                                                                        </div>
                                                                                    {% endif %}
                                                                                {% else %}


                                                                                    <div class=\"col-md-2\">
                                                                                        <input type='number' class=\"form-control\" name=\"price_sub_of_{{loopno}}[{{product_for.name_db}}]\" value=\"0\" required=\"required\"/>

                                                                                    </div>

                                                                                {% endif %}

                                                                            {% endif %}
                                                                        {% endfor %}    
                                                                    {%else%}
                                                                        <label class=\"label-control\">Please Select this Package in 'Package For Types'</label>
                                                                    {% endif %}
</div>
                                                                </div>
                                                            </div>  
                                                            {% set loopno = loopno + 1 %}
                                                        {%endif%}

                                                    {%endfor%}
                                                {%else%}
                                                    <div class=\"first_one panel panel-default first_one_{{language.language_master_id}}\">
                                                        <div class=\"panel-heading\">

                                                            Subpackage <input type=\"hidden\" value=\"0\" class=\"sub\" name=\"sub_0\" />

                                                        </div>
                                                        <div class=\"panel-body first_one_panelbody\">

                                                            {% if categories is defined and categories is not empty %}
                                                                <div class=\"row\">{#col-md-12 form-group\">#}
                                                                    {% for categories in categories %}
                                                                        {% if categories.language_id == language.language_master_id %}
                                                                            <div class=\"col-md-1\">
                                                                                <label>{{categories.product_category_name}}</label>
                                                                            </div>
                                                                            <div class=\"col-md-2\">
                                                                                <input type='hidden' class=\"form-control\" name=\"category_type_0[]\" value=\"{{categories.main_product_category_master_id}}\" required=\"required\"/>
                                                                                <input type='number' class=\"form-control\" name=\"category_amount_value_0[]\" value=\"\" required=\"required\"/>

                                                                            </div>
                                                                        {% endif %}
                                                                    {% endfor %}
                                                                </div>  
                                                            {% endif %}
                                                            <div class=\"separator\">Price</div>

                                                            {% if product_for is defined and product_for is not empty%}
                                                                <div class=\"row\" > {#col-md-12 form-group\">#}
                                                                    {%for product_for in product_for%}
                                                                        {% if product_for.language_id == language.language_master_id %}

                                                                            <div class=\"col-md-1\">
                                                                                <label>{{product_for.name}} {%if product_for.friday_offday == 'no' %} <font color=\"red\" style=\"font-size: 10px;\">Firday: On</font> {%endif%}</label>
                                                                            </div>
                                                                            <div class=\"col-md-2\">
                                                                                <input type='number' class=\"form-control\" name=\"price_sub_of_0[{{product_for.name_db}}]\" value=\"\" required=\"required\"/>

                                                                            </div>
                                                                        {% endif %}
                                                                    {% endfor %}
                                                                 </div>
                                                            {%else%}
                                                                <label class=\"label-control\">Please Select this Package in 'Package For Types'</label>
                                                            {% endif %}


                                                           
                                                        </div>
                                                    </div>      
                                                {%endif%}

                                                <div class=\"col-md-12 form-group\">
                                                    <a href=\"javascript:void(0)\" id=\"remove_combo_btn\" onclick=\"remove_combo(\$(this))\" class=\"pull-right btn btn-sm btn-default\">Remove</a>
                                                    <a href=\"javascript:void(0)\" onclick=\"add_combo(\$(this),{{language.language_master_id}} )\" class=\"pull-right btn btn-sm btn-primary\">Add More</a>
                                                </div>
                                            </div>
                                            {%else%}
                                                <br><label class=\"label-control\"> Please Select 'Package for type' to Add Sub Packages in this Package</label>
                                            {%endif%}
                                            </br>
                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\" value=\"{{ language.language_master_id }}\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;
                                                                {% if about_us is defined and about_us is not empty %}Update{%else%}Save{%endif%}   
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

                                                        function addGramPrice() {
                                                            \$(\".gramset:first\").clone().appendTo(\".gramsetdiv\").find('input').val('');
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

                                                        function remove_subpackagecombo(element) {
                                                            if (element.parents('div').siblings(\".first_one\").length == 0) {
                                                                alert(\"You can not delete all sub packages\");
                                                            } else {
                                                                element.parent().parent().remove();
                                                            }
                                                        }

                                                        function defaultsubpackagecombo(package_id, subpackage_id) {

                                                        }

                                                        function add_combo(element, lang_id) {
                                                            var elemnt_last;
                                                            // console.log(\$(\".first_one\").length);
                                                            langwise_cnt = ((\$(\".first_one_\" + lang_id).length));
                                                            langwise_cnt_minus = langwise_cnt - 1;
                                                            // alert('current cnt : '+langwise_cnt);
                                                            if (\$(\".first_one\").length > 1) {
                                                                \$('#remove_combo_btn').show();
                                                            } else {
                                                                \$('#remove_combo_btn').hide();
                                                            }
                                                            // console.log(langwise_cnt);
                                                            // console.log(element.parents('div').prev(\".first_one:last\").html());
                                                            // console.log((element).find('input'));
                                                            var CloneData = element.parents('div').siblings(\".first_one:last\").clone();
                                                            CloneData.find('input').each(function () {
                                                                this.name = this.name.replace('_' + langwise_cnt_minus, '_' + langwise_cnt);
                                                            });

                                                            console.log(CloneData.find('input[name=\"sub_' + langwise_cnt + '\"]').val(0));
                                                            // console.log
                                                            CloneData.insertAfter(element.parents('div').siblings(\".first_one:last\")).find(\"input[type='number']\").val(\"\");

                                                            /*      elemnt_last = element.parents('div').prev(\".first_one\");
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

    </script>   
{% endblock %}
", "AdminBundle:Package:addPackage.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Package/addPackage.html.twig");
    }
}
