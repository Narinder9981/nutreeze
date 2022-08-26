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
                                                            ";
                                    // line 93
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 94
$context["day"], "w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], 3, []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 95
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 96
$context["day"], "w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 97
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], 11, []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 98
                                echo " 
                                                        ";
                                // line 99
                                if ((($this->getAttribute($context["day"], "selected_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 100
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 101
$context["day"], "selected_w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 102
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_2", []));
                                    echo "  
                                                            ";
                                    // line 103
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_1", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 104
$context["day"], "selected_w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 105
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 106
$context["day"], "selected_w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 107
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w1_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 108
                                echo " 
                                                        ";
                                // line 109
                                $context["selectedValue"] = "";
                                // line 110
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                               ";
                                // line 112
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, ($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value"))));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 113
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValue"]) || array_key_exists("selectArrayValue", $context)) &&  !twig_test_empty(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue"))))) {
                                        // line 114
                                        echo "                                                                        ";
                                        if ($this->getAttribute(($context["selectArrayValue"] ?? null), ($context["i"] - 1), [], "array", true, true)) {
                                            // line 115
                                            echo "                                                                            ";
                                            $context["selectedValue"] = $this->getAttribute(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), ($context["i"] - 1), [], "array");
                                            echo " 
                                                                         ";
                                        }
                                        // line 117
                                        echo "                                                                   ";
                                    }
                                    // line 118
                                    echo "                                                                    <select name=\"w1_days_";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 120
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 121
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 122
                                            echo "                                                                                <option value=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "main_product_id", []), "html", null, true);
                                            echo "\" 
                                                                                ";
                                            // line 123
                                            if ((($context["selectedValue"] ?? $this->getContext($context, "selectedValue")) == $this->getAttribute($context["selectArray"], "main_product_id", []))) {
                                                echo " selected ";
                                            }
                                            echo " 
                                                                                >";
                                            // line 124
                                            echo twig_escape_filter($this->env, $this->getAttribute($context["selectArray"], "product_name", []), "html", null, true);
                                            echo "</option>
                                                                            ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectArray'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 126
                                        echo "                                                                        ";
                                    }
                                    // line 127
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 128
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 131
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 132
                        echo "                                            ";
                    }
                    // line 133
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
                    // line 143
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 144
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 145
                            echo "
                                                    ";
                            // line 146
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 147
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 148
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 149
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 150
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 151
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 152
                                echo "                                                        ";
                                $context["selectArrayValueUpgarde"] = [];
                                // line 153
                                echo "                                                        
                                                        ";
                                // line 154
                                if ((($this->getAttribute($context["day"], "w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 155
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 156
$context["day"], "w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 157
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_2", []));
                                    echo "                                                     
                                                            ";
                                    // line 158
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 159
$context["day"], "w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 160
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 161
$context["day"], "w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 162
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w1_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 163
                                echo " 
                                                        ";
                                // line 164
                                if ((($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 165
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 166
$context["day"], "selected_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 167
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_2", []));
                                    echo "  
                                                            ";
                                    // line 168
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 169
$context["day"], "selected_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 170
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 171
$context["day"], "selected_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 172
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 173
                                echo " 
                                                       
                                                        ";
                                // line 175
                                if ((($this->getAttribute($context["day"], "selected_upgrade_w1_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 176
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 177
$context["day"], "selected_upgrade_w1_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 178
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_2", []));
                                    echo "  
                                                            ";
                                    // line 179
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_1", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 180
$context["day"], "selected_upgrade_w1_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 181
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 182
$context["day"], "selected_upgrade_w1_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w1_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 183
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w1_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 184
                                echo " 
                                                        ";
                                // line 185
                                $context["selectedValue"] = "";
                                // line 186
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                                ";
                                // line 188
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, 3));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 189
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValueUpgarde"]) || array_key_exists("selectArrayValueUpgarde", $context)) &&  !twig_test_empty(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde"))))) {
                                        // line 190
                                        echo "                                                                        ";
                                        $context["selectedValue"] = $this->getAttribute(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), ($context["i"] - 1), [], "array");
                                        // line 191
                                        echo "                                                                   ";
                                    }
                                    // line 192
                                    echo "                                                                   
                                                                    <select name=\"w1_up_days_";
                                    // line 193
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 195
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 196
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 197
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
                                        // line 199
                                        echo "                                                                        ";
                                    }
                                    // line 200
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 201
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 204
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 205
                        echo "                                            ";
                    }
                    // line 206
                    echo "                                             </div>

                                             <br><label >Week 2</label><br>
                                             <div class=\"row\">
                                            ";
                    // line 210
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 211
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 212
                            echo "
                                                    ";
                            // line 213
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 214
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 215
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 216
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 217
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 218
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 219
                                echo "                                                        
                                                        ";
                                // line 220
                                if ((($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 221
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 222
$context["day"], "w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], 2, []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 223
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_2", []));
                                    echo "                                                     
                                                            ";
                                    // line 224
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 225
$context["day"], "w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 226
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 227
$context["day"], "w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 228
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 229
                                echo " 
                                                        ";
                                // line 230
                                if ((($this->getAttribute($context["day"], "selected_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                            ";
                                    // line 231
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 232
$context["day"], "selected_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 233
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_2", []));
                                    echo "  
                                                            ";
                                    // line 234
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_1", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 235
$context["day"], "selected_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 236
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 237
$context["day"], "selected_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 238
                                    $context["selectArrayValue"] = twig_array_merge(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), $this->getAttribute($context["day"], "selected_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 239
                                echo " 
                                                        ";
                                // line 240
                                $context["selectedValue"] = "";
                                // line 241
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                               ";
                                // line 243
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, ($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value"))));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 244
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValue"]) || array_key_exists("selectArrayValue", $context)) &&  !twig_test_empty(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue"))))) {
                                        // line 245
                                        echo "                                                                        ";
                                        if ($this->getAttribute(($context["selectArrayValue"] ?? null), ($context["i"] - 1), [], "array", true, true)) {
                                            // line 246
                                            echo "                                                                            ";
                                            $context["selectedValue"] = $this->getAttribute(($context["selectArrayValue"] ?? $this->getContext($context, "selectArrayValue")), ($context["i"] - 1), [], "array");
                                            echo " 
                                                                         ";
                                        }
                                        // line 248
                                        echo "                                                                   ";
                                    }
                                    // line 249
                                    echo "                                                                    <select name=\"w2_days_";
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 251
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 252
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 253
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
                                        // line 255
                                        echo "                                                                        ";
                                    }
                                    // line 256
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 257
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 260
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 261
                        echo "                                            ";
                    }
                    // line 262
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
                    // line 272
                    if (((isset($context["sub_package_meal_config"]) || array_key_exists("sub_package_meal_config", $context)) &&  !twig_test_empty(($context["sub_package_meal_config"] ?? $this->getContext($context, "sub_package_meal_config"))))) {
                        // line 273
                        echo "                                                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["sub_package_meal_config"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["sub_package_meal_config"]) {
                            // line 274
                            echo "
                                                    ";
                            // line 275
                            $context["meal_type_id"] = $this->getAttribute($context["sub_package_meal_config"], "meal_type_id", []);
                            // line 276
                            echo "                                                    ";
                            $context["meal_type_name"] = $this->getAttribute($context["sub_package_meal_config"], "product_category_name", []);
                            // line 277
                            echo "                                                    ";
                            $context["meal_type_value"] = $this->getAttribute($context["sub_package_meal_config"], "meal_value", []);
                            // line 278
                            echo "                                                    ";
                            if ((($context["meal_type_value"] ?? $this->getContext($context, "meal_type_value")) != 0)) {
                                // line 279
                                echo "                                                        ";
                                $context["selectArray"] = [];
                                // line 280
                                echo "                                                        ";
                                $context["selectArrayValue"] = [];
                                // line 281
                                echo "                                                        ";
                                $context["selectArrayValueUpgarde"] = [];
                                // line 282
                                echo "                                                        
                                                        ";
                                // line 283
                                if ((($this->getAttribute($context["day"], "w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo " 
                                                            ";
                                    // line 284
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 285
$context["day"], "w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 286
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_2", []));
                                    echo "                                                     
                                                            ";
                                    // line 287
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_1", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 288
$context["day"], "w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 289
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_3", []));
                                    echo "                                                     
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 290
$context["day"], "w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 291
                                    $context["selectArray"] = twig_array_merge(($context["selectArray"] ?? $this->getContext($context, "selectArray")), $this->getAttribute($context["day"], "w2_11", []));
                                    echo "                                                     
                                                        ";
                                }
                                // line 292
                                echo " 
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 305
                                echo "                                                       
                                                        ";
                                // line 306
                                if ((($this->getAttribute($context["day"], "selected_upgrade_w2_1", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_1", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "1"))) {
                                    echo "   
                                                           ";
                                    // line 307
                                    echo "                                                  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 308
$context["day"], "selected_upgrade_w2_2", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_2", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "2"))) {
                                    echo " 
                                                            ";
                                    // line 309
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_2", []));
                                    echo "  
                                                            ";
                                    // line 310
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_1", []));
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 311
$context["day"], "selected_upgrade_w2_3", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_3", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "3"))) {
                                    echo " 
                                                            ";
                                    // line 312
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_3", []));
                                    echo "  
                                                        ";
                                } elseif ((($this->getAttribute(                                // line 313
$context["day"], "selected_upgrade_w2_11", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["day"], "selected_upgrade_w2_11", []))) && (($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")) == "11"))) {
                                    echo " 
                                                            ";
                                    // line 314
                                    $context["selectArrayValueUpgarde"] = twig_array_merge(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), $this->getAttribute($context["day"], "selected_upgrade_w2_11", []));
                                    echo "  
                                                        ";
                                }
                                // line 315
                                echo " 
                                                        ";
                                // line 316
                                $context["selectedValue"] = "";
                                // line 317
                                echo "                                                        <div class=\"col-md-2\">";
                                echo twig_escape_filter($this->env, ($context["meal_type_name"] ?? $this->getContext($context, "meal_type_name")), "html", null, true);
                                echo "  </div>
                                                        <div class=\"col-md-4\">
                                                                ";
                                // line 319
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(range(1, 3));
                                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                                    // line 320
                                    echo "                                                                    ";
                                    if (((isset($context["selectArrayValueUpgarde"]) || array_key_exists("selectArrayValueUpgarde", $context)) &&  !twig_test_empty(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde"))))) {
                                        // line 321
                                        echo "                                                                        ";
                                        $context["selectedValue"] = $this->getAttribute(($context["selectArrayValueUpgarde"] ?? $this->getContext($context, "selectArrayValueUpgarde")), ($context["i"] - 1), [], "array");
                                        // line 322
                                        echo "                                                                   ";
                                    }
                                    // line 323
                                    echo "                                                                   
                                                                    <select name=\"w2_up_days_";
                                    // line 324
                                    echo twig_escape_filter($this->env, $this->getAttribute($context["day"], "days_master_id", []), "html", null, true);
                                    echo "_";
                                    echo twig_escape_filter($this->env, ($context["meal_type_id"] ?? $this->getContext($context, "meal_type_id")), "html", null, true);
                                    echo "[]\" class=\"form-control\" required >
                                                                        <option value=\"\"> Select Product</option>
                                                                        ";
                                    // line 326
                                    if (((isset($context["selectArray"]) || array_key_exists("selectArray", $context)) &&  !twig_test_empty(($context["selectArray"] ?? $this->getContext($context, "selectArray"))))) {
                                        // line 327
                                        echo "                                                                            ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable($context["selectArray"]);
                                        foreach ($context['_seq'] as $context["_key"] => $context["selectArray"]) {
                                            // line 328
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
                                        // line 330
                                        echo "                                                                        ";
                                    }
                                    // line 331
                                    echo "                                                                    </select>
                                                                ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 332
                                echo " 
                                                            </div>
                                                    ";
                            }
                            // line 335
                            echo "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_package_meal_config'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 336
                        echo "                                            ";
                    }
                    // line 337
                    echo "                                             </div>
                                         </div>
                                     </div>
                                    ";
                }
                // line 341
                echo "                                 ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 342
            echo "                            ";
        }
        // line 343
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

    // line 360
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 361
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
        return array (  1076 => 361,  1070 => 360,  1048 => 343,  1045 => 342,  1039 => 341,  1033 => 337,  1030 => 336,  1024 => 335,  1019 => 332,  1012 => 331,  1009 => 330,  994 => 328,  989 => 327,  987 => 326,  980 => 324,  977 => 323,  974 => 322,  971 => 321,  968 => 320,  964 => 319,  958 => 317,  956 => 316,  953 => 315,  948 => 314,  944 => 313,  940 => 312,  936 => 311,  932 => 310,  928 => 309,  924 => 308,  921 => 307,  917 => 306,  914 => 305,  911 => 292,  906 => 291,  902 => 290,  898 => 289,  894 => 288,  890 => 287,  886 => 286,  882 => 285,  878 => 284,  874 => 283,  871 => 282,  868 => 281,  865 => 280,  862 => 279,  859 => 278,  856 => 277,  853 => 276,  851 => 275,  848 => 274,  843 => 273,  841 => 272,  829 => 262,  826 => 261,  820 => 260,  815 => 257,  808 => 256,  805 => 255,  790 => 253,  785 => 252,  783 => 251,  775 => 249,  772 => 248,  766 => 246,  763 => 245,  760 => 244,  756 => 243,  750 => 241,  748 => 240,  745 => 239,  740 => 238,  736 => 237,  732 => 236,  728 => 235,  724 => 234,  720 => 233,  716 => 232,  712 => 231,  708 => 230,  705 => 229,  700 => 228,  696 => 227,  692 => 226,  688 => 225,  684 => 224,  680 => 223,  676 => 222,  672 => 221,  668 => 220,  665 => 219,  662 => 218,  659 => 217,  656 => 216,  653 => 215,  650 => 214,  648 => 213,  645 => 212,  640 => 211,  638 => 210,  632 => 206,  629 => 205,  623 => 204,  618 => 201,  611 => 200,  608 => 199,  593 => 197,  588 => 196,  586 => 195,  579 => 193,  576 => 192,  573 => 191,  570 => 190,  567 => 189,  563 => 188,  557 => 186,  555 => 185,  552 => 184,  547 => 183,  543 => 182,  539 => 181,  535 => 180,  531 => 179,  527 => 178,  523 => 177,  519 => 176,  515 => 175,  511 => 173,  506 => 172,  502 => 171,  498 => 170,  494 => 169,  490 => 168,  486 => 167,  482 => 166,  478 => 165,  474 => 164,  471 => 163,  466 => 162,  462 => 161,  458 => 160,  454 => 159,  450 => 158,  446 => 157,  442 => 156,  438 => 155,  434 => 154,  431 => 153,  428 => 152,  425 => 151,  422 => 150,  419 => 149,  416 => 148,  413 => 147,  411 => 146,  408 => 145,  403 => 144,  401 => 143,  389 => 133,  386 => 132,  380 => 131,  375 => 128,  368 => 127,  365 => 126,  357 => 124,  351 => 123,  346 => 122,  341 => 121,  339 => 120,  331 => 118,  328 => 117,  322 => 115,  319 => 114,  316 => 113,  312 => 112,  306 => 110,  304 => 109,  301 => 108,  296 => 107,  292 => 106,  288 => 105,  284 => 104,  280 => 103,  276 => 102,  272 => 101,  268 => 100,  264 => 99,  261 => 98,  256 => 97,  252 => 96,  248 => 95,  244 => 94,  240 => 93,  236 => 92,  232 => 91,  228 => 90,  224 => 89,  220 => 87,  217 => 86,  214 => 85,  211 => 84,  208 => 83,  205 => 82,  203 => 81,  200 => 80,  195 => 79,  193 => 78,  186 => 74,  183 => 73,  180 => 72,  175 => 71,  173 => 70,  169 => 69,  165 => 68,  158 => 64,  154 => 62,  145 => 59,  141 => 57,  136 => 56,  127 => 53,  123 => 51,  119 => 50,  112 => 46,  104 => 41,  99 => 38,  93 => 37,  47 => 2,  31 => 1,);
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
                                                            {% set selectArray = selectArray|merge(day.w1_1 ) %}                                                     
                                                        {%elseif  day.w1_3 is defined and day.3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_3 ) %}                                                     
                                                        {%elseif  day.w1_11 is defined and day.w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.11 ) %}                                                     
                                                        {%endif%} 
                                                        {%if day.selected_w1_1 is defined and day.selected_w1_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_1 ) %}                                                     
                                                        {%elseif day.selected_w1_2 is defined and day.selected_w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_2 ) %}  
                                                            {% set selectArrayValue = selectArrayValue|merge(day.selected_w1_1 ) %}  
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
                                                            {% set selectArray = selectArray|merge(day.w1_1 ) %}                                                     
                                                        {%elseif  day.w1_3 is defined and day.w1_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_3 ) %}                                                     
                                                        {%elseif  day.w1_11 is defined and day.w1_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.w1_11 ) %}                                                     
                                                        {%endif%} 
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
                                                       
                                                        {%if day.selected_upgrade_w1_1 is defined and day.selected_upgrade_w1_1 is not empty and meal_type_id == \"1\" %}   
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_1 ) %}                                                     
                                                        {%elseif day.selected_upgrade_w1_2 is defined and day.selected_upgrade_w1_2 is not empty and meal_type_id == \"2\" %} 
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_2 ) %}  
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w1_1 ) %}  
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
                                                            {% set selectArray = selectArray|merge(day.w2_1 ) %}                                                     
                                                        {%elseif  day.w2_3 is defined and day.w2_3 is not empty and meal_type_id == \"3\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_3 ) %}                                                     
                                                        {%elseif  day.w2_11 is defined and day.w2_11 is not empty and meal_type_id == \"11\" %} 
                                                            {% set selectArray = selectArray|merge(day.w2_11 ) %}                                                     
                                                        {%endif%} 
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
                                                            {% set selectArray = selectArray|merge(day.w2_1 ) %}                                                     
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
                                                            {% set selectArrayValueUpgarde = selectArrayValueUpgarde|merge(day.selected_upgrade_w2_1 ) %}\t\t\t\t\t\t\t\t\t\t\t\t\t\t
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
