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

/* AdminBundle:Package:adddefaultvaluesubpackage.html.twig */
class __TwigTemplate_cfc7d1db8a1f11d40a159d0d98f9de2dfb679433ca9b3884c65c1ba8557e51c0 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Package:adddefaultvaluesubpackage.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Package:adddefaultvaluesubpackage.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_css($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        echo "<style>

.hr-text {
  line-height: 1em;
  position: relative;
  outline: 0;
  border: 1;
  color: black;
  text-align: center;
  height: 1.5em;
  opacity: .5;
  &:before {
    content: '';   
    background: linear-gradient(to right, transparent, #818078, transparent);
    position: absolute;
    left: 0;
    top: 50%;
    width: 100%;
    height: 1px;
  }
  &:after {
    content: attr(data-content);
    position: relative;
    display: inline-block;
    color: black;

    padding: 0 .5em;
    line-height: 1.5em;
   
    color: #818078;
    background-color: #fcfcfa;
  }
}    
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 37
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 38
        echo "    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Default Values [ Package name : ";
        // line 41
        echo twig_escape_filter($this->env, ($context["package_name"] ?? $this->getContext($context, "package_name")), "html", null, true);
        echo " ] 
            <small></small>
        </h1>
        <!------- BREADCUMB --------------------->
        <ol class=\"breadcrumb\">
            <li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        </ol>
    </section>
    <section class=\"content\">
        ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 51
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 53
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 57
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 59
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "
        <div class=\"row\">
            <form class=\"form-horizontal\" method=\"post\" action=\"";
        // line 64
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_package_savedefaultmealsubpackage");
        echo "\" enctype=\"multipart/form-data\">
                <div class=\"col-md-12\">
                    <div class=\"box box-primary\">
                        <div class=\"box-body\">
                            <input type = \"hidden\" name=\"main_package_id\" value= \"";
        // line 68
        echo twig_escape_filter($this->env, ($context["main_package_id"] ?? $this->getContext($context, "main_package_id")), "html", null, true);
        echo "\" />
                            <input type = \"hidden\" name=\"sub_package_id\" value= \"";
        // line 69
        echo twig_escape_filter($this->env, ($context["sub_package_id"] ?? $this->getContext($context, "sub_package_id")), "html", null, true);
        echo "\" />
                            ";
        // line 70
        if (((isset($context["days"]) || array_key_exists("days", $context)) &&  !twig_test_empty(($context["days"] ?? $this->getContext($context, "days"))))) {
            // line 71
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["days"] ?? $this->getContext($context, "days")));
            foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
                // line 72
                echo "                                    ";
                if (($this->getAttribute($context["day"], "days_master_id", []) != "5")) {
                    // line 73
                    echo "                                     <div class=\"panel panel-default\" >
                                         <div class=\"panel-heading\"> Day Name : ";
                    // line 74
                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_name", []), "html", null, true);
                    echo " </div>
                                         <div class=\"panel-body\">
                                             <br><label >Week 1</label><br>
                                             <div class=\"row\">
                                            ";
                    // line 78
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 79
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 80
                            echo "
                                                    ";
                            // line 81
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 82
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 83
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 84
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 85
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 86
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 87
                                echo "                                                        
                                                       
                                                        ";
                                // line 89
                                if ((($this->getAttribute($context["day"], "w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 90
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 91
$context["day"], "w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 92
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_2", []));
                                    echo "  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 93
                                    if (($this->getAttribute($context["day"], "w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_1", [])))) {
                                        echo " \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 94
                                        $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                        echo "   
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 95
                                    echo " \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 96
$context["day"], "w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], 3, []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 97
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 98
$context["day"], "w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 99
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], 11, []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 100
                                echo " 
                                                        ";
                                // line 101
                                if ((($this->getAttribute($context["day"], "selected_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 102
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 103
$context["day"], "selected_w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 104
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_2", []));
                                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 105
                                    if (($this->getAttribute($context["day"], "selected_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_1", [])))) {
                                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 106
                                        $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_1", []));
                                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 107
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 108
$context["day"], "selected_w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 109
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 110
$context["day"], "selected_w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 111
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 112
                                echo " 
                                                        ";
                                // line 113
                                $context["selectedValue"] = "";
                                // line 114
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                               ";
                                // line 116
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, ($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value"))));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 117
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValue"]) || array_key_exists("selectArrayValue", $context)) &&  !twig_test_empty(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue"))))) {
                                        // line 118
                                        echo "                                                                        ";
                                        if ($this->getAttribute(($context["selectArrayValue"] ?? null), ($context["i"] - 1), [], "array", true, true)) {
                                            // line 119
                                            echo "                                                                            ";
                                            $context["selectedValue"] = $this->getAttribute(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), ($context["i"] - 1), [], "array");
                                            echo " 
                                                                         ";
                                        }
                                        // line 121
                                        echo "                                                                   ";
                                    }
                                    // line 122
                                    echo "                                                                    <select name=\"w1_days_";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 124
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 125
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 126
                                            echo "                                                                                <option value=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "main_product_id", []), "html", null, true);
                                            echo "\" 
                                                                                ";
                                            // line 127
                                            if ((($context["selectedValue"] ?? $this->getContext($context, "selectedValue")) == $this->getAttribute($context["selectArray"], "main_product_id", []))) {
                                                echo " selected ";
                                            }
                                            echo " 
                                                                                >";
                                            // line 128
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "product_name", []), "html", null, true);
                                            echo "</option>
                                                                            ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectArray'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 130
                                        echo "                                                                        ";
                                    }
                                    // line 131
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 132
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 135
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 136
                        echo "                                            ";
                    }
                    // line 137
                    echo "                                             </div>
                                              <table><tr>
                                                <td style=\"border-bottom: 1px solid gray; width: 43%\">&nbsp;</td>
                                                <td style=\"vertical-align:middle;text-align:center\" rowspan=\"2\">Upgrade Meal Values</td>
                                                <td style=\"border-bottom: 1px solid gray; width: 45%\">&nbsp;</td>
                                                </tr><tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                </tr></table>
                                             <div class=\"row\">
                                            ";
                    // line 147
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 148
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 149
                            echo "
                                                    ";
                            // line 150
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 151
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 152
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 153
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 154
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 155
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 156
                                echo "                                                        ";
                                $context["selectArrayValueUpgarde"] = [];
                                // line 157
                                echo "                                                        
                                                        ";
                                // line 158
                                if ((($this->getAttribute($context["day"], "w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 159
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 160
$context["day"], "w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 161
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_2", []));
                                    echo "  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 162
                                    if (($this->getAttribute($context["day"], "w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_1", [])))) {
                                        echo " \t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 163
                                        $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                        echo "    
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 164
                                    echo "\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 165
$context["day"], "w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 166
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 167
$context["day"], "w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 168
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 169
                                echo " 
                                                        ";
                                // line 170
                                if ((($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 171
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 172
$context["day"], "selected_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 173
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_2", []));
                                    // line 174
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", [])))) {
                                        echo "  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 175
                                        $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 176
                                    echo "\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 177
$context["day"], "selected_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 178
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 179
$context["day"], "selected_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 180
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 181
                                echo " 
                                                       
                                                        ";
                                // line 183
                                if ((($this->getAttribute($context["day"], "selected_upgrade_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 184
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 185
$context["day"], "selected_upgrade_w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 186
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_2", []));
                                    // line 187
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($context["day"], "selected_upgrade_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_1", [])))) {
                                        echo " \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 188
                                        $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_1", []));
                                        echo "  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 190
                                    echo "                                                        ";
                                } elseif ((($this->getAttribute($context["day"], "selected_upgrade_w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 191
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 192
$context["day"], "selected_upgrade_w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 193
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 194
                                echo " 
                                                        ";
                                // line 195
                                $context["selectedValue"] = "";
                                // line 196
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                                ";
                                // line 198
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, 3));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 199
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValueUpgarde"]) || array_key_exists("selectArrayValueUpgarde", $context)) &&  !twig_test_empty(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde"))))) {
                                        // line 200
                                        echo "                                                                        ";
                                        $context["selectedValue"] = $this->getAttribute(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), ($context["i"] - 1), [], "array");
                                        // line 201
                                        echo "                                                                   ";
                                    }
                                    // line 202
                                    echo "                                                                   
                                                                    <select name=\"w1_up_days_";
                                    // line 203
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 205
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 206
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 207
                                            echo "                                                                                <option value=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "main_product_id", []), "html", null, true);
                                            echo "\" ";
                                            if ((($context["selectedValue"] ?? $this->getContext($context, "selectedValue")) == $this->getAttribute($context["selectArray"], "main_product_id", []))) {
                                                echo " selected ";
                                            }
                                            echo " >";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "product_name", []), "html", null, true);
                                            echo "</option>
                                                                            ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectArray'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 209
                                        echo "                                                                        ";
                                    }
                                    // line 210
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 211
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 214
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 215
                        echo "                                            ";
                    }
                    // line 216
                    echo "                                             </div>

                                             <br><label >Week 2</label><br>
                                             <div class=\"row\">
                                            ";
                    // line 220
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 221
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 222
                            echo "
                                                    ";
                            // line 223
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 224
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 225
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 226
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 227
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 228
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 229
                                echo "                                                        
                                                        ";
                                // line 230
                                if ((($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 231
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 232
$context["day"], "w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], 2, []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 233
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_2", []));
                                    // line 234
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", [])))) {
                                        echo " \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 235
                                        $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                        // line 236
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    echo " \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 237
$context["day"], "w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 238
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 239
$context["day"], "w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 240
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 241
                                echo " 
                                                        ";
                                // line 242
                                if ((($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 243
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 244
$context["day"], "selected_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 245
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_2", []));
                                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 246
                                    if (($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", [])))) {
                                        // line 247
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 248
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 249
$context["day"], "selected_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 250
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 251
$context["day"], "selected_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 252
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 253
                                echo " 
                                                        ";
                                // line 254
                                $context["selectedValue"] = "";
                                // line 255
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                               ";
                                // line 257
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, ($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value"))));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 258
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValue"]) || array_key_exists("selectArrayValue", $context)) &&  !twig_test_empty(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue"))))) {
                                        // line 259
                                        echo "                                                                        ";
                                        if ($this->getAttribute(($context["selectArrayValue"] ?? null), ($context["i"] - 1), [], "array", true, true)) {
                                            // line 260
                                            echo "                                                                            ";
                                            $context["selectedValue"] = $this->getAttribute(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), ($context["i"] - 1), [], "array");
                                            echo " 
                                                                         ";
                                        }
                                        // line 262
                                        echo "                                                                   ";
                                    }
                                    // line 263
                                    echo "                                                                    <select name=\"w2_days_";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 265
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 266
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 267
                                            echo "                                                                                <option value=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "main_product_id", []), "html", null, true);
                                            echo "\" ";
                                            if ((($context["selectedValue"] ?? $this->getContext($context, "selectedValue")) == $this->getAttribute($context["selectArray"], "main_product_id", []))) {
                                                echo " selected ";
                                            }
                                            echo " >";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "product_name", []), "html", null, true);
                                            echo "</option>
                                                                            ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectArray'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 269
                                        echo "                                                                        ";
                                    }
                                    // line 270
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 271
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 274
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 275
                        echo "                                            ";
                    }
                    // line 276
                    echo "                                             </div>
                                              <table><tr>
                                                <td style=\"border-bottom: 1px solid gray; width: 43%\">&nbsp;</td>
                                                <td style=\"vertical-align:middle;text-align:center\" rowspan=\"2\">Upgrade Meal Values</td>
                                                <td style=\"border-bottom: 1px solid gray; width: 45%\">&nbsp;</td>
                                                </tr><tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                </tr></table>
                                             <div class=\"row\">
                                            ";
                    // line 286
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 287
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 288
                            echo "
                                                    ";
                            // line 289
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 290
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 291
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 292
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 293
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 294
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 295
                                echo "                                                        ";
                                $context["selectArrayValueUpgarde"] = [];
                                // line 296
                                echo "                                                        
                                                        ";
                                // line 297
                                if ((($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 298
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 299
$context["day"], "w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 300
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_2", []));
                                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 301
                                    if (($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", [])))) {
                                        echo " \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 302
                                        $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                        echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 303
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 304
$context["day"], "w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 305
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 306
$context["day"], "w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 307
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 308
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 321
                                echo "                                                       
                                                        ";
                                // line 322
                                if ((($this->getAttribute($context["day"], "selected_upgrade_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                           ";
                                    // line 323
                                    echo "                                                  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 324
$context["day"], "selected_upgrade_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 325
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_2", []));
                                    echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 326
                                    if (($this->getAttribute($context["day"], "selected_upgrade_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_1", [])))) {
                                        echo "   \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 327
                                        $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_1", []));
                                        echo "\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 328
                                    echo "\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 329
$context["day"], "selected_upgrade_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 330
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 331
$context["day"], "selected_upgrade_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 332
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 333
                                echo " 
                                                        ";
                                // line 334
                                $context["selectedValue"] = "";
                                // line 335
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                                ";
                                // line 337
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, 3));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 338
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValueUpgarde"]) || array_key_exists("selectArrayValueUpgarde", $context)) &&  !twig_test_empty(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde"))))) {
                                        // line 339
                                        echo "                                                                        ";
                                        $context["selectedValue"] = $this->getAttribute(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), ($context["i"] - 1), [], "array");
                                        // line 340
                                        echo "                                                                   ";
                                    }
                                    // line 341
                                    echo "                                                                   
                                                                    <select name=\"w2_up_days_";
                                    // line 342
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 344
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 345
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 346
                                            echo "                                                                                <option value=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "main_product_id", []), "html", null, true);
                                            echo "\" ";
                                            if ((($context["selectedValue"] ?? $this->getContext($context, "selectedValue")) == $this->getAttribute($context["selectArray"], "main_product_id", []))) {
                                                echo " selected ";
                                            }
                                            echo " >";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "product_name", []), "html", null, true);
                                            echo "</option>
                                                                            ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectArray'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 348
                                        echo "                                                                        ";
                                    }
                                    // line 349
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 350
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 353
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 354
                        echo "                                            ";
                    }
                    // line 355
                    echo "                                             </div>
                                         </div>
                                     </div>
                                    ";
                }
                // line 359
                echo "                                 ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 360
            echo "                            ";
        }
        // line 361
        echo "                        </div>
                         <div class=\"box-footer\">
                             <input type=\"submit\" name=\"save\" value=\"Save Default Menu\" class=\"btn btn-success\" />
                             <input type=\"button\" name=\"back\" value=\"Back\" class=\"btn btn-default\" />
                         </div>

                    </div>
                </div>
            </form>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 378
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 379
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/plugins/"), "html", null, true);
        echo "ckeditor/ckeditor.js\"></script>

    <script>

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
        }else{
            element.parent().parent().remove();
        }
    }
    
    function defaultsubpackagecombo(package_id,subpackage_id){
        
    }
   
    function add_combo(element,lang_id) {
        var elemnt_last;
       // console.log(\$(\".first_one\").length);
        langwise_cnt = ( (\$(\".first_one_\"+lang_id).length) )  ;
        langwise_cnt_minus = langwise_cnt - 1 ;
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
        CloneData.find('input').each(function() {
            this.name= this.name.replace('_'+langwise_cnt_minus, '_'+ langwise_cnt);
        });
       
        console.log(CloneData.find('input[name=\"sub_'+langwise_cnt+'\"]').val(0));
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
        return "AdminBundle:Package:adddefaultvaluesubpackage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1141 => 379,  1135 => 378,  1113 => 361,  1110 => 360,  1104 => 359,  1098 => 355,  1095 => 354,  1089 => 353,  1084 => 350,  1077 => 349,  1074 => 348,  1059 => 346,  1054 => 345,  1052 => 344,  1045 => 342,  1042 => 341,  1039 => 340,  1036 => 339,  1033 => 338,  1029 => 337,  1023 => 335,  1021 => 334,  1018 => 333,  1013 => 332,  1009 => 331,  1005 => 330,  1001 => 329,  998 => 328,  993 => 327,  989 => 326,  985 => 325,  981 => 324,  978 => 323,  974 => 322,  971 => 321,  968 => 308,  963 => 307,  959 => 306,  955 => 305,  951 => 304,  948 => 303,  943 => 302,  939 => 301,  935 => 300,  931 => 299,  927 => 298,  923 => 297,  920 => 296,  917 => 295,  914 => 294,  911 => 293,  908 => 292,  905 => 291,  902 => 290,  900 => 289,  897 => 288,  892 => 287,  890 => 286,  878 => 276,  875 => 275,  869 => 274,  864 => 271,  857 => 270,  854 => 269,  839 => 267,  834 => 266,  832 => 265,  824 => 263,  821 => 262,  815 => 260,  812 => 259,  809 => 258,  805 => 257,  799 => 255,  797 => 254,  794 => 253,  789 => 252,  785 => 251,  781 => 250,  777 => 249,  774 => 248,  768 => 247,  766 => 246,  762 => 245,  758 => 244,  754 => 243,  750 => 242,  747 => 241,  742 => 240,  738 => 239,  734 => 238,  730 => 237,  725 => 236,  723 => 235,  718 => 234,  716 => 233,  712 => 232,  708 => 231,  704 => 230,  701 => 229,  698 => 228,  695 => 227,  692 => 226,  689 => 225,  686 => 224,  684 => 223,  681 => 222,  676 => 221,  674 => 220,  668 => 216,  665 => 215,  659 => 214,  654 => 211,  647 => 210,  644 => 209,  629 => 207,  624 => 206,  622 => 205,  615 => 203,  612 => 202,  609 => 201,  606 => 200,  603 => 199,  599 => 198,  593 => 196,  591 => 195,  588 => 194,  583 => 193,  579 => 192,  575 => 191,  570 => 190,  565 => 188,  560 => 187,  558 => 186,  554 => 185,  550 => 184,  546 => 183,  542 => 181,  537 => 180,  533 => 179,  529 => 178,  525 => 177,  522 => 176,  517 => 175,  512 => 174,  510 => 173,  506 => 172,  502 => 171,  498 => 170,  495 => 169,  490 => 168,  486 => 167,  482 => 166,  478 => 165,  475 => 164,  470 => 163,  466 => 162,  462 => 161,  458 => 160,  454 => 159,  450 => 158,  447 => 157,  444 => 156,  441 => 155,  438 => 154,  435 => 153,  432 => 152,  429 => 151,  427 => 150,  424 => 149,  419 => 148,  417 => 147,  405 => 137,  402 => 136,  396 => 135,  391 => 132,  384 => 131,  381 => 130,  373 => 128,  367 => 127,  362 => 126,  357 => 125,  355 => 124,  347 => 122,  344 => 121,  338 => 119,  335 => 118,  332 => 117,  328 => 116,  322 => 114,  320 => 113,  317 => 112,  312 => 111,  308 => 110,  304 => 109,  300 => 108,  297 => 107,  292 => 106,  288 => 105,  284 => 104,  280 => 103,  276 => 102,  272 => 101,  269 => 100,  264 => 99,  260 => 98,  256 => 97,  252 => 96,  249 => 95,  244 => 94,  240 => 93,  236 => 92,  232 => 91,  228 => 90,  224 => 89,  220 => 87,  217 => 86,  214 => 85,  211 => 84,  208 => 83,  205 => 82,  203 => 81,  200 => 80,  195 => 79,  193 => 78,  186 => 74,  183 => 73,  180 => 72,  175 => 71,  173 => 70,  169 => 69,  165 => 68,  158 => 64,  154 => 62,  145 => 59,  141 => 57,  136 => 56,  127 => 53,  123 => 51,  119 => 50,  112 => 46,  104 => 41,  99 => 38,  93 => 37,  47 => 2,  31 => 1,);
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
   {% block css %}<style>

.hr-text {
  line-height: 1em;
  position: relative;
  outline: 0;
  border: 1;
  color: black;
  text-align: center;
  height: 1.5em;
  opacity: .5;
  &:before {
    content: '';   
    background: linear-gradient(to right, transparent, #818078, transparent);
    position: absolute;
    left: 0;
    top: 50%;
    width: 100%;
    height: 1px;
  }
  &:after {
    content: attr(data-content);
    position: relative;
    display: inline-block;
    color: black;

    padding: 0 .5em;
    line-height: 1.5em;
   
    color: #818078;
    background-color: #fcfcfa;
  }
}    
</style>
{%endblock%}
{% block content %}
    <section class=\"content-header\">
        <!-------- PAGE TITLE --------------->
        <h1>
            Default Values [ Package name : {{package_name}} ] 
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
            <form class=\"form-horizontal\" method=\"post\" action=\"{{path('admin_package_savedefaultmealsubpackage')}}\" enctype=\"multipart/form-data\">
                <div class=\"col-md-12\">
                    <div class=\"box box-primary\">
                        <div class=\"box-body\">
                            <input type = \"hidden\" name=\"main_package_id\" value= \"{{main_package_id}}\" />
                            <input type = \"hidden\" name=\"sub_package_id\" value= \"{{sub_package_id}}\" />
                            {%if days is defined and days is not empty %}
                                {%for day in days %}
                                    {%if day.days_master_id != '5' %}
                                     <div class=\"panel panel-default\" >
                                         <div class=\"panel-heading\"> Day Name : {{day.days_name}} </div>
                                         <div class=\"panel-body\">
                                             <br><label >Week 1</label><br>
                                             <div class=\"row\">
                                            {%if sub_package_meal_config is defined and sub_package_meal_config  is not empty %}
                                                {%for sub_package_meal_config  in sub_package_meal_config  %}

                                                    {% set meal_type_id = sub_package_meal_config.meal_type_id %}
                                                    {% set  meal_type_name = sub_package_meal_config.product_category_name %}
                                                    {% set meal_type_value = sub_package_meal_config.meal_value %}
                                                    {% if meal_type_value != 0 %}
                                                        {%set selectArray = [] %}
                                                        {%set selectArrayValue = [] %}
                                                        
                                                       
                                                        {%if day.w1_1 is defined and day.w1_1 is not empty and meal_type_id == \"1\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_1 ) %}                                                     
                                                        {%elseif day.w1_2 is defined and day.w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_2 ) %}  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.w1_1 is defined and day.w1_1 is not empty  %} \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArray = selectArray|merge(day.w1_1 ) %}   
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%} \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        {%elseif  day.w1_3 is defined and day.3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_3 ) %}                                                     
                                                        {%elseif  day.w1_11 is defined and day.w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.11 ) %}                                                     
                                                        {%endif%} 
                                                        {%if day.selected_w1_1 is defined and day.selected_w1_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_1 ) %}                                                     
                                                        {%elseif day.selected_w1_2 is defined and day.selected_w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_2 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.selected_w1_1 is defined and day.selected_w1_1 is not empty %}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArrayValue = selectArrayValue|merge(day.selected_w1_1 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        {%elseif  day.selected_w1_3 is defined and day.selected_w1_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_3 ) %}  
                                                        {%elseif  day.selected_w1_11 is defined and day.selected_w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_11 ) %}  
                                                        {%endif%} 
                                                        {%set selectedValue= ''%}
                                                        <div class=\"col-md-2\">{{meal_type_name}}  </div>
                                                        <div class=\"col-md-4\">
                                                               {% for i in 1..meal_type_value %}
                                                                    {%if selectArrayValue is defined and selectArrayValue is not empty %}
                                                                        {%if  selectArrayValue[i-1] is defined %}
                                                                            {%set selectedValue= selectArrayValue[i-1]%} 
                                                                         {%endif%}
                                                                   {%endif%}
                                                                    <select name=\"w1_days_{{day.days_master_id}}_{{meal_type_id}}[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        {%if selectArray is defined and selectArray is not empty %}
                                                                            {%for selectArray in selectArray %}
                                                                                <option value=\"{{selectArray.main_product_id}}\" 
                                                                                {%if selectedValue == selectArray.main_product_id%} selected {%endif%} 
                                                                                >{{selectArray.product_name}}</option>
                                                                            {%endfor%}
                                                                        {%endif%}
                                                                    </select>
                                                                {% endfor %} 
                                                            </div>
                                                    {%endif%}
                                                {%endfor%}
                                            {%endif%}
                                             </div>
                                              <table><tr>
                                                <td style=\"border-bottom: 1px solid gray; width: 43%\">&nbsp;</td>
                                                <td style=\"vertical-align:middle;text-align:center\" rowspan=\"2\">Upgrade Meal Values</td>
                                                <td style=\"border-bottom: 1px solid gray; width: 45%\">&nbsp;</td>
                                                </tr><tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                </tr></table>
                                             <div class=\"row\">
                                            {%if sub_package_meal_config is defined and sub_package_meal_config  is not empty %}
                                                {%for sub_package_meal_config  in sub_package_meal_config  %}

                                                    {% set meal_type_id = sub_package_meal_config.meal_type_id %}
                                                    {% set  meal_type_name = sub_package_meal_config.product_category_name %}
                                                    {% set meal_type_value = sub_package_meal_config.meal_value %}
                                                    {% if meal_type_value != 0 %}
                                                        {%set selectArray = [] %}
                                                        {%set selectArrayValue = [] %}
                                                        {%set selectArrayValueUpgarde = [] %}
                                                        
                                                        {%if day.w1_1 is defined and day.w1_1 is not empty and meal_type_id == \"1\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_1 ) %}                                                     
                                                        {%elseif day.w1_2 is defined and day.w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_2 ) %}  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.w1_1 is defined and day.w1_1 is not empty  %} \t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArray = selectArray|merge(day.w1_1 ) %}    
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t
                                                        {%elseif  day.w1_3 is defined and day.w1_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_3 ) %}                                                     
                                                        {%elseif  day.w1_11 is defined and day.w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_11 ) %}                                                     
                                                        {%endif%} 
                                                        {%if day.selected_w2_1 is defined and day.selected_w2_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %}                                                     
                                                        {%elseif day.selected_w2_2 is defined and day.selected_w2_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_2 ) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.selected_w2_1 is defined and day.selected_w2_1 is not empty  %}  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t
                                                        {%elseif  day.selected_w2_3 is defined and day.selected_w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_3 ) %}  
                                                        {%elseif  day.selected_w2_11 is defined and day.selected_w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_11 ) %}  
                                                        {%endif%} 
                                                       
                                                        {%if day.selected_upgrade_w1_1 is defined and day.selected_upgrade_w1_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_1 ) %}                                                     
                                                        {%elseif day.selected_upgrade_w1_2 is defined and day.selected_upgrade_w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_2 ) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.selected_upgrade_w1_1 is defined and day.selected_upgrade_w1_1 is not empty  %} \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_1 ) %}  
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}
                                                        {%elseif  day.selected_upgrade_w1_3 is defined and day.selected_upgrade_w1_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_3 ) %}  
                                                        {%elseif  day.selected_upgrade_w1_11 is defined and day.selected_upgrade_w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_11 ) %}  
                                                        {%endif%} 
                                                        {%set selectedValue= ''%}
                                                        <div class=\"col-md-2\">{{meal_type_name}}  </div>
                                                        <div class=\"col-md-4\">
                                                                {% for i in 1..3 %}
                                                                    {%if selectArrayValueUpgarde is defined and selectArrayValueUpgarde is not empty %}
                                                                        {%set selectedValue= selectArrayValueUpgarde[i-1]%}
                                                                   {%endif%}
                                                                   
                                                                    <select name=\"w1_up_days_{{day.days_master_id}}_{{meal_type_id}}[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        {%if selectArray is defined and selectArray is not empty %}
                                                                            {%for selectArray in selectArray %}
                                                                                <option value=\"{{selectArray.main_product_id}}\" {%if selectedValue == selectArray.main_product_id%} selected {%endif%} >{{selectArray.product_name}}</option>
                                                                            {%endfor%}
                                                                        {%endif%}
                                                                    </select>
                                                                {% endfor %} 
                                                            </div>
                                                    {%endif%}
                                                {%endfor%}
                                            {%endif%}
                                             </div>

                                             <br><label >Week 2</label><br>
                                             <div class=\"row\">
                                            {%if sub_package_meal_config is defined and sub_package_meal_config  is not empty %}
                                                {%for sub_package_meal_config  in sub_package_meal_config  %}

                                                    {% set meal_type_id = sub_package_meal_config.meal_type_id %}
                                                    {% set  meal_type_name = sub_package_meal_config.product_category_name %}
                                                    {% set meal_type_value = sub_package_meal_config.meal_value %}
                                                    {% if meal_type_value != 0 %}
                                                        {%set selectArray = [] %}
                                                        {%set selectArrayValue = [] %}
                                                        
                                                        {%if day.w2_1 is defined and day.w2_1 is not empty and meal_type_id == \"1\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_1 ) %}                                                     
                                                        {%elseif day.w2_2 is defined and day.2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_2 ) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.w2_1 is defined and day.w2_1 is not empty %} \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArray = selectArray|merge(day.w2_1 ) %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%} \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        {%elseif  day.w2_3 is defined and day.w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_3 ) %}                                                     
                                                        {%elseif  day.w2_11 is defined and day.w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_11 ) %}                                                     
                                                        {%endif%} 
                                                        {%if day.selected_w2_1 is defined and day.selected_w2_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %}                                                     
                                                        {%elseif day.selected_w2_2 is defined and day.selected_w2_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_2 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.selected_w2_1 is defined and day.selected_w2_1 is not empty  %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        {%elseif  day.selected_w2_3 is defined and day.selected_w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_3 ) %}  
                                                        {%elseif  day.selected_w2_11 is defined and day.selected_w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_11 ) %}  
                                                        {%endif%} 
                                                        {%set selectedValue= ''%}
                                                        <div class=\"col-md-2\">{{meal_type_name}}  </div>
                                                        <div class=\"col-md-4\">
                                                               {% for i in 1..meal_type_value %}
                                                                    {%if selectArrayValue is defined and selectArrayValue is not empty %}
                                                                        {%if  selectArrayValue[i-1] is defined %}
                                                                            {%set selectedValue= selectArrayValue[i-1]%} 
                                                                         {%endif%}
                                                                   {%endif%}
                                                                    <select name=\"w2_days_{{day.days_master_id}}_{{meal_type_id}}[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        {%if selectArray is defined and selectArray is not empty %}
                                                                            {%for selectArray in selectArray %}
                                                                                <option value=\"{{selectArray.main_product_id}}\" {%if selectedValue == selectArray.main_product_id%} selected {%endif%} >{{selectArray.product_name}}</option>
                                                                            {%endfor%}
                                                                        {%endif%}
                                                                    </select>
                                                                {% endfor %} 
                                                            </div>
                                                    {%endif%}
                                                {%endfor%}
                                            {%endif%}
                                             </div>
                                              <table><tr>
                                                <td style=\"border-bottom: 1px solid gray; width: 43%\">&nbsp;</td>
                                                <td style=\"vertical-align:middle;text-align:center\" rowspan=\"2\">Upgrade Meal Values</td>
                                                <td style=\"border-bottom: 1px solid gray; width: 45%\">&nbsp;</td>
                                                </tr><tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                </tr></table>
                                             <div class=\"row\">
                                            {%if sub_package_meal_config is defined and sub_package_meal_config  is not empty %}
                                                {%for sub_package_meal_config  in sub_package_meal_config  %}

                                                    {% set meal_type_id = sub_package_meal_config.meal_type_id %}
                                                    {% set  meal_type_name = sub_package_meal_config.product_category_name %}
                                                    {% set meal_type_value = sub_package_meal_config.meal_value %}
                                                    {% if meal_type_value != 0 %}
                                                        {%set selectArray = [] %}
                                                        {%set selectArrayValue = [] %}
                                                        {%set selectArrayValueUpgarde = [] %}
                                                        
                                                        {%if day.w2_1 is defined and day.w2_1 is not empty and meal_type_id == \"1\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_1 ) %}                                                     
                                                        {%elseif day.w2_2 is defined and day.w2_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_2 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.w2_1 is defined and day.w2_1 is not empty  %} \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArray = selectArray|merge(day.w2_1 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        {%elseif  day.w2_3 is defined and day.w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_3 ) %}                                                     
                                                        {%elseif  day.w2_11 is defined and day.w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_11 ) %}                                                     
                                                        {%endif%} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{#
                                                        {%if day.selected_w2_1 is defined and day.selected_w2_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %}                                                     
                                                        {%elseif day.selected_w2_2 is defined and day.selected_w2_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_2 ) %}  
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_1 ) %}  
                                                        {%elseif  day.selected_w2_3 is defined and day.selected_w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_3 ) %}  
                                                        {%elseif  day.selected_w2_11 is defined and day.selected_w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w2_11 ) %}  
                                                        {%endif%} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t#}
                                                       
                                                        {%if day.selected_upgrade_w2_1 is defined and day.selected_upgrade_w2_1 is not empty and meal_type_id == \"1\" %}   
                                                           {# {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_1 ) %}   #}                                                  
                                                        {%elseif day.selected_upgrade_w2_2 is defined and day.selected_upgrade_w2_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_2 ) %} 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%if day.selected_upgrade_w2_1 is defined and day.selected_upgrade_w2_1 is not empty %}   \t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_1 ) %}\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{%endif%}\t\t
                                                        {%elseif  day.selected_upgrade_w2_3 is defined and day.selected_upgrade_w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_3 ) %}  
                                                        {%elseif  day.selected_upgrade_w2_11 is defined and day.selected_upgrade_w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_11 ) %}  
                                                        {%endif%} 
                                                        {%set selectedValue= ''%}
                                                        <div class=\"col-md-2\">{{meal_type_name}}  </div>
                                                        <div class=\"col-md-4\">
                                                                {% for i in 1..3 %}
                                                                    {%if selectArrayValueUpgarde is defined and selectArrayValueUpgarde is not empty %}
                                                                        {%set selectedValue= selectArrayValueUpgarde[i-1]%}
                                                                   {%endif%}
                                                                   
                                                                    <select name=\"w2_up_days_{{day.days_master_id}}_{{meal_type_id}}[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        {%if selectArray is defined and selectArray is not empty %}
                                                                            {%for selectArray in selectArray %}
                                                                                <option value=\"{{selectArray.main_product_id}}\" {%if selectedValue == selectArray.main_product_id%} selected {%endif%} >{{selectArray.product_name}}</option>
                                                                            {%endfor%}
                                                                        {%endif%}
                                                                    </select>
                                                                {% endfor %} 
                                                            </div>
                                                    {%endif%}
                                                {%endfor%}
                                            {%endif%}
                                             </div>
                                         </div>
                                     </div>
                                    {%endif%}
                                 {%endfor%}
                            {%endif%}
                        </div>
                         <div class=\"box-footer\">
                             <input type=\"submit\" name=\"save\" value=\"Save Default Menu\" class=\"btn btn-success\" />
                             <input type=\"button\" name=\"back\" value=\"Back\" class=\"btn btn-default\" />
                         </div>

                    </div>
                </div>
            </form>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script src=\"{{asset('bundles/design/plugins/')}}ckeditor/ckeditor.js\"></script>

    <script>

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
        }else{
            element.parent().parent().remove();
        }
    }
    
    function defaultsubpackagecombo(package_id,subpackage_id){
        
    }
   
    function add_combo(element,lang_id) {
        var elemnt_last;
       // console.log(\$(\".first_one\").length);
        langwise_cnt = ( (\$(\".first_one_\"+lang_id).length) )  ;
        langwise_cnt_minus = langwise_cnt - 1 ;
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
        CloneData.find('input').each(function() {
            this.name= this.name.replace('_'+langwise_cnt_minus, '_'+ langwise_cnt);
        });
       
        console.log(CloneData.find('input[name=\"sub_'+langwise_cnt+'\"]').val(0));
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
{% endblock %}", "AdminBundle:Package:adddefaultvaluesubpackage.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Package/adddefaultvaluesubpackage.html.twig");
    }
}
