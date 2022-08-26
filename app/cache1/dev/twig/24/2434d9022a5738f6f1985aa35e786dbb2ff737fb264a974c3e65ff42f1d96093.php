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

/* AdminBundle:Packagefor:addpackageFor.html.twig */
class __TwigTemplate_57cf1083b5ace5fc05b4a43b78d183874c080f384edc57d9625f6eecd5af8456 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Packagefor:addpackageFor.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Packagefor:addpackageFor.html.twig", 1);
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
            Add Package for Types
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
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
        echo "
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box box-primary\">

                    <!-- box header -->
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Add / Update Package For</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_index");
        echo "\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

                    </div>
                    <!-- end: box header -->


                    <div class=\"box-body\">
                        ";
        // line 41
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 42
            echo "                            <div class=\"nav-tabs-custom\">
                                <ul class=\"nav nav-tabs\">
                                    ";
            // line 44
            if ((isset($context["language_list"]) || array_key_exists("language_list", $context))) {
                // line 45
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
                    // line 46
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
                    // line 47
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
                // line 50
                echo "                                    ";
            }
            // line 51
            echo "                                </ul>
                            </div>

                            <!-- tab-content -->
                            <div class=\"tab-content\">
                                ";
            // line 56
            $context["main_package_for_master_id"] = 0;
            // line 57
            echo "                                ";
            $context["package_for_type"] = [0 => "package_for"];
            // line 58
            echo "                                ";
            $context["type"] = "";
            // line 59
            echo "                                ";
            $context["description"] = "";
            // line 60
            echo "                                ";
            $context["price"] = 0;
            echo "\t\t\t\t\t\t
                                ";
            // line 61
            $context["days"] = 1;
            // line 62
            echo "
                                ";
            // line 63
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
                // line 64
                echo "                                    <div role=\"tabpanel\" class=\"tab-pane ";
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    echo "active";
                }
                echo "\" id=\"lan_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                        ";
                // line 66
                $context["action"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_savepackagefor");
                // line 67
                echo "
                                        ";
                // line 68
                $context["name"] = "";
                // line 69
                echo "
                                        ";
                // line 70
                if (((isset($context["pk_for"]) || array_key_exists("pk_for", $context)) &&  !twig_test_empty(($context["pk_for"] ?? $this->getContext($context, "pk_for"))))) {
                    // line 71
                    echo "
                                            ";
                    // line 72
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["pk_for"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["pk_for"]) {
                        // line 73
                        echo "                                                ";
                        if (($this->getAttribute($context["pk_for"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            // line 74
                            echo "
                                                    ";
                            // line 75
                            $context["main_package_for_master_id"] = $this->getAttribute($context["pk_for"], "main_package_for_master_id", []);
                            // line 76
                            echo "                                                    ";
                            $context["name"] = $this->getAttribute($context["pk_for"], "name", []);
                            // line 77
                            echo "                                                    ";
                            $context["description"] = $this->getAttribute($context["pk_for"], "description", []);
                            // line 78
                            echo "                                                    ";
                            $context["type"] = $this->getAttribute($context["pk_for"], "type", []);
                            // line 79
                            echo "                                                    ";
                            $context["price"] = $this->getAttribute($context["pk_for"], "price", []);
                            // line 80
                            echo "                                                    ";
                            $context["days"] = $this->getAttribute($context["pk_for"], "days", []);
                            // line 81
                            echo "
                                                ";
                        }
                        // line 83
                        echo "                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pk_for'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 84
                    echo "                                        ";
                }
                // line 85
                echo "
                                        <form id=\"form-";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" class=\"form-horizontal\" method=\"post\" action=\"";
                echo twig_escape_filter($this->env, ($context["action"] ?? $this->getContext($context, "action")), "html", null, true);
                echo "\">

                                            <input type=\"hidden\" name=\"main_package_for_master_id\" value=\"";
                // line 88
                echo twig_escape_filter($this->env, ($context["main_package_for_master_id"] ?? $this->getContext($context, "main_package_for_master_id")), "html", null, true);
                echo "\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"";
                // line 89
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Package For Name</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"text\" class=\"form-control\" id=\"name";
                // line 97
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"name\" value=\"";
                echo twig_escape_filter($this->env, ($context["name"] ?? $this->getContext($context, "name")), "html", null, true);
                echo "\" required>
                                                    </div>
                                               
                                                    <div class=\"col-lg-2\">
                                                        <label>Description</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"text\" class=\"form-control\" id=\"name";
                // line 104
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"description\" value=\"";
                echo twig_escape_filter($this->env, ($context["description"] ?? $this->getContext($context, "description")), "html", null, true);
                echo "\" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <select name=\"type\" class=\"form-control\" required>
                                                            ";
                // line 116
                if (((isset($context["package_for_type"]) || array_key_exists("package_for_type", $context)) &&  !twig_test_empty(($context["package_for_type"] ?? $this->getContext($context, "package_for_type"))))) {
                    // line 117
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["package_for_type"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["package_for_type"]) {
                        // line 118
                        echo "                                                                    <option value=\"";
                        echo twig_escape_filter($this->env, $context["package_for_type"], "html", null, true);
                        echo "\" ";
                        if ((($context["type"] ?? $this->getContext($context, "type")) == $context["package_for_type"])) {
                            echo " selected";
                        }
                        echo ">
                                                                        ";
                        // line 119
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter($context["package_for_type"], "_", " ")), "html", null, true);
                        echo "
                                                                    </option>
                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package_for_type'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 122
                    echo "                                                            ";
                }
                // line 123
                echo "                                                        </select>
                                                    </div>
                                               
                                                    <div class=\"col-lg-2 hide \">
                                                        <label>Price</label>
                                                    </div>
                                                    <div class=\"col-lg-4 hide\">
                                                        <input type=\"number\" class=\"form-control\" id=\"price";
                // line 130
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"price\" value=\"";
                echo twig_escape_filter($this->env, ($context["price"] ?? $this->getContext($context, "price")), "html", null, true);
                echo "\" required>
                                                    </div>
                                                </div>
                                            </div>\t

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Days</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"number\" min = \"1\" class=\"form-control\" id=\"price";
                // line 141
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_master_id", []), "html", null, true);
                echo "\" name=\"days\" value=\"";
                echo twig_escape_filter($this->env, ($context["days"] ?? $this->getContext($context, "days")), "html", null, true);
                echo "\" required>
                                                    </div>
                                                    <div class=\"col-lg-2\">
                                                        <label>Friday Off Day</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"friday_off_day\" value=\"yes\"> Yes
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"friday_off_day\"  value=\"no\"> No
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>\t
                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Packages</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <select class=\"form-control select\" multiple required name=\"package_ids[]\">
                                                            <option value=\"0\" >Select Package</option>
                                                            ";
                // line 164
                if (((isset($context["package_list"]) || array_key_exists("package_list", $context)) &&  !twig_test_empty(($context["package_list"] ?? $this->getContext($context, "package_list"))))) {
                    // line 165
                    echo "                                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["package_list"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["package_list"]) {
                        // line 166
                        echo "                                                                    ";
                        if (($this->getAttribute($context["package_list"], "language_id", []) == $this->getAttribute($context["language"], "language_master_id", []))) {
                            echo " 
                                                                    <option value=\"";
                            // line 167
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package_list"], "main_package_master_id", []), "html", null, true);
                            echo "\" ";
                            if (twig_in_filter($this->getAttribute($context["package_list"], "main_package_master_id", []), ($context["selected_packages"] ?? $this->getContext($context, "selected_packages")))) {
                                echo " selected ";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["package_list"], "package_name", []), "html", null, true);
                            echo " </option>
                                                                    ";
                        }
                        // line 169
                        echo "                                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['package_list'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 170
                    echo "                                                            ";
                }
                // line 171
                echo "                                                                
                                                                
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>\t



                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
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
            // line 195
            echo "
                            </div>
                            <!-- end: tab-content -->

                        ";
        }
        // line 200
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

    public function getTemplateName()
    {
        return "AdminBundle:Packagefor:addpackageFor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  504 => 200,  497 => 195,  460 => 171,  457 => 170,  451 => 169,  440 => 167,  435 => 166,  430 => 165,  428 => 164,  400 => 141,  384 => 130,  375 => 123,  372 => 122,  363 => 119,  354 => 118,  349 => 117,  347 => 116,  330 => 104,  318 => 97,  307 => 89,  303 => 88,  296 => 86,  293 => 85,  290 => 84,  284 => 83,  280 => 81,  277 => 80,  274 => 79,  271 => 78,  268 => 77,  265 => 76,  263 => 75,  260 => 74,  257 => 73,  253 => 72,  250 => 71,  248 => 70,  245 => 69,  243 => 68,  240 => 67,  238 => 66,  228 => 64,  211 => 63,  208 => 62,  206 => 61,  201 => 60,  198 => 59,  195 => 58,  192 => 57,  190 => 56,  183 => 51,  180 => 50,  161 => 47,  148 => 46,  130 => 45,  128 => 44,  124 => 42,  122 => 41,  112 => 34,  102 => 26,  93 => 23,  89 => 21,  84 => 20,  75 => 17,  71 => 15,  67 => 14,  60 => 10,  51 => 3,  45 => 2,  29 => 1,);
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
            Add Package for Types
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
                        <h3 class=\"box-title\">Add / Update Package For</h3>
                        <a href=\"{{ path('admin_packagefor_index') }}\" class=\"btn btn-primary btn-flat pull-right\">Back</a>

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
                                {% set main_package_for_master_id = 0 %}
                                {% set package_for_type = ['package_for'] %}
                                {% set type = ''%}
                                {% set description = ''%}
                                {% set price = 0%}\t\t\t\t\t\t
                                {% set days = 1%}

                                {% for language in language_list %}
                                    <div role=\"tabpanel\" class=\"tab-pane {% if loop.index == 1 %}active{% endif %}\" id=\"lan_{{ language.language_master_id }}\">

                                        {% set action = path('admin_packagefor_savepackagefor') %}

                                        {% set name = '' %}

                                        {% if pk_for is defined and pk_for is not empty %}

                                            {% for pk_for in pk_for %}
                                                {% if pk_for.language_id == language.language_master_id %}

                                                    {% set main_package_for_master_id = pk_for.main_package_for_master_id %}
                                                    {% set name = pk_for.name %}
                                                    {% set description = pk_for.description %}
                                                    {% set type = pk_for.type %}
                                                    {% set price = pk_for.price %}
                                                    {% set days = pk_for.days %}

                                                {% endif %}
                                            {% endfor %}
                                        {% endif %}

                                        <form id=\"form-{{ language.language_master_id }}\" class=\"form-horizontal\" method=\"post\" action=\"{{ action }}\">

                                            <input type=\"hidden\" name=\"main_package_for_master_id\" value=\"{{ main_package_for_master_id }}\">
                                            <input type=\"hidden\" name=\"language_id\" value=\"{{ language.language_master_id }}\">

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Package For Name</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"text\" class=\"form-control\" id=\"name{{language.language_master_id}}\" name=\"name\" value=\"{{name}}\" required>
                                                    </div>
                                               
                                                    <div class=\"col-lg-2\">
                                                        <label>Description</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"text\" class=\"form-control\" id=\"name{{language.language_master_id}}\" name=\"description\" value=\"{{description}}\" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <select name=\"type\" class=\"form-control\" required>
                                                            {%if package_for_type is defined and package_for_type is not empty %}
                                                                {%for package_for_type in package_for_type%}
                                                                    <option value=\"{{package_for_type}}\" {%if type == package_for_type %} selected{%endif%}>
                                                                        {{(package_for_type | replace('_',' ')) | capitalize}}
                                                                    </option>
                                                                {%endfor%}
                                                            {% endif%}
                                                        </select>
                                                    </div>
                                               
                                                    <div class=\"col-lg-2 hide \">
                                                        <label>Price</label>
                                                    </div>
                                                    <div class=\"col-lg-4 hide\">
                                                        <input type=\"number\" class=\"form-control\" id=\"price{{language.language_master_id}}\" name=\"price\" value=\"{{price}}\" required>
                                                    </div>
                                                </div>
                                            </div>\t

                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Days</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <input type=\"number\" min = \"1\" class=\"form-control\" id=\"price{{language.language_master_id}}\" name=\"days\" value=\"{{days}}\" required>
                                                    </div>
                                                    <div class=\"col-lg-2\">
                                                        <label>Friday Off Day</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"friday_off_day\" value=\"yes\"> Yes
                                                        </div>
                                                        <div class=\"radio-inline\">
                                                            <input type=\"radio\" name=\"friday_off_day\"  value=\"no\"> No
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>\t
                                            <div class=\"row form-group\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-lg-2\">
                                                        <label>Packages</label>
                                                    </div>
                                                    <div class=\"col-lg-4\">
                                                        <select class=\"form-control select\" multiple required name=\"package_ids[]\">
                                                            <option value=\"0\" >Select Package</option>
                                                            {%if package_list is defined and package_list is not empty %}
                                                                {%for package_list in package_list %}
                                                                    {%if package_list.language_id == language.language_master_id %} 
                                                                    <option value=\"{{package_list.main_package_master_id}}\" {%if package_list.main_package_master_id in selected_packages %} selected {%endif%}>{{package_list.package_name}} </option>
                                                                    {%endif%}
                                                                {%endfor%}
                                                            {%endif%}
                                                                
                                                                
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>\t



                                            <div class=\"row paddTop\">
                                                <div class=\"col-md-12\">
                                                    <div class=\"col-md-6\">
                                                        <button type=\"submit\" name=\"submit\" value=\"submit\" class=\"btn btn-primary\">
                                                            <span><i class=\"fa fa-check-square-o\"></i>&nbsp;Submit</span>
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

{% endblock %}", "AdminBundle:Packagefor:addpackageFor.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Packagefor/addpackageFor.html.twig");
    }
}
