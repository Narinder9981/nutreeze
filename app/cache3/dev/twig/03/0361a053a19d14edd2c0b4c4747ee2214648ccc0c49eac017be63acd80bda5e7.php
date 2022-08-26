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

/* AdminBundle:DriverOrders:printmealsticker.html_1.twig */
class __TwigTemplate_545df124a4a53e2aae777f21b3efc99ed87c31fc7d662b34160235e75ec72634 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DriverOrders:printmealsticker.html_1.twig"));

        // line 1
        echo "<html>
    <head>
        <link href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- jQuery 2.1.4 -->
        <script src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/jQuery-2.1.4.min.js\"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/print.css\">
    <style>
     .paddingcls{
            /* padding-top : 20px !important; */
        }
    .tableRaw{
        /* height : 12.5%; */
        width:100%;
    }
    .mealSticker{
        /* width : 30%; */
        width : 33.33%;
        height : 3.5cm;
        float : left;
        /* margin : 5px */
    }
    .subscriptionNo{
        margin-top :0;
        /* margin-bottom : 2px; */
        font-size : 25px
    }
    .tableCustom{
        width : 100%
    }
    .printBtn {
        position: fixed;
        bottom: 0;
        z-index : 1000;
        /* margin : 5px */
    }
    .productName{
        min-height : 50px;
        max-height : 50px;
        /* padding-top : 15px */
    }

    .mealAddons{
        min-height : 20px;
        max-height : 20px;
    }
    .paragraphCustom{
        font-size : 16px;
    }
    </style>
    
    <style type=\"text/css\" media=\"print\">
        @page {
            size: A4 portrait;   /* auto is the initial value */
            margin: 0.85cm 0 0.85cm 0;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
        .paragraphCustom{
            font-size : 16px;
        }
    </style>
    
    </head>
    <body>
        <div class=\"container-fluid\">

            ";
        // line 71
        $context["tdcls"] = "";
        // line 72
        echo "            <table class=\"tableCustom\">
                ";
        // line 73
        if (((isset($context["meal_of_orders"]) || array_key_exists("meal_of_orders", $context)) &&  !twig_test_empty(($context["meal_of_orders"] ?? $this->getContext($context, "meal_of_orders"))))) {
            // line 79
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["meal_of_orders"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["meal_of_orders"]) {
                // line 80
                echo "
                        ";
                // line 81
                $context["addOnCount"] = 0;
                // line 82
                echo "                        ";
                if (($this->getAttribute($context["meal_of_orders"], "raw_eggs", []) != 0)) {
                    // line 83
                    echo "                            ";
                    $context["addOnCount"] = (($context["addOnCount"] ?? $this->getContext($context, "addOnCount")) + 1);
                    // line 84
                    echo "                        ";
                }
                // line 85
                echo "                        ";
                if (($this->getAttribute($context["meal_of_orders"], "white_eggs", []) != 0)) {
                    // line 86
                    echo "                            ";
                    $context["addOnCount"] = (($context["addOnCount"] ?? $this->getContext($context, "addOnCount")) + 1);
                    // line 87
                    echo "                        ";
                }
                // line 88
                echo "
                        ";
                // line 89
                if (($this->getAttribute($context["meal_of_orders"], "carbs_amount", []) != 0)) {
                    // line 90
                    echo "                            ";
                    $context["addOnCount"] = (($context["addOnCount"] ?? $this->getContext($context, "addOnCount")) + 1);
                    // line 91
                    echo "                        ";
                }
                // line 92
                echo "                        
                        ";
                // line 93
                if (($this->getAttribute($context["meal_of_orders"], "proteins_amount", []) != 0)) {
                    // line 94
                    echo "                            ";
                    $context["addOnCount"] = (($context["addOnCount"] ?? $this->getContext($context, "addOnCount")) + 1);
                    // line 95
                    echo "                        ";
                }
                // line 96
                echo "                        
                        ";
                // line 97
                if (($this->getAttribute($context["loop"], "index", []) == 1)) {
                    // line 98
                    echo "                            ";
                    $context["tdcls"] = "paddingcls";
                    // line 99
                    echo "                            <tr class=\"tableRaw\">
                        ";
                }
                // line 101
                echo "                            <td class=\"mealSticker text-center ";
                echo twig_escape_filter($this->env, ($context["tdcls"] ?? $this->getContext($context, "tdcls")), "html", null, true);
                echo "\">
                                <span class=\"subscriptionNo\">";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "unique_no", []), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "firstCharacter", []), "html", null, true);
                echo "</span>
                                <p class=\"productName paragraphCustom\">";
                // line 103
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_name", []), "html", null, true);
                echo "</p>
                                <p class=\"paragraphCustom mealAddons\">
                                ";
                // line 105
                if (($this->getAttribute($context["meal_of_orders"], "proteins_amount", []) != 0)) {
                    // line 106
                    echo "                                    Pro - ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "proteins_amount", []), "html", null, true);
                    echo " / 
                                ";
                }
                // line 108
                echo "                                ";
                if (($this->getAttribute($context["meal_of_orders"], "carbs_amount", []) != 0)) {
                    // line 109
                    echo "                                    Carb - ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "carbs_amount", []), "html", null, true);
                    echo "
                                ";
                }
                // line 111
                echo "                                ";
                if (($this->getAttribute($context["meal_of_orders"], "raw_eggs", []) != 0)) {
                    // line 112
                    echo "                                    Raw Egg - ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "raw_eggs", []), "html", null, true);
                    echo " / 
                                ";
                }
                // line 114
                echo "                                ";
                if (($this->getAttribute($context["meal_of_orders"], "raw_eggs", []) != 0)) {
                    // line 115
                    echo "                                    White Egg - ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "white_eggs", []), "html", null, true);
                    echo "
                                ";
                }
                // line 116
                echo "                                 
                                </p>
                            </td>                        
                        ";
                // line 119
                if (((0 == $this->getAttribute($context["loop"], "index", []) % 18) && ($this->getAttribute($context["loop"], "index", []) != 1))) {
                    // line 120
                    echo "                            ";
                    $context["tdcls"] = "paddingcls";
                    // line 121
                    echo "                        </tr><tr class=\"tableRaw ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                    echo "\">
                        ";
                } else {
                    // line 123
                    echo "                            
                            ";
                    // line 124
                    if (((0 == $this->getAttribute($context["loop"], "index", []) % 3) && ($this->getAttribute($context["loop"], "index", []) != 1))) {
                        // line 125
                        echo "                                ";
                        $context["tdcls"] = "";
                        // line 126
                        echo "                                </tr><tr class=\"tableRaw ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                        echo "\">
                            ";
                    }
                    // line 128
                    echo "                        ";
                }
                // line 129
                echo "                        
                        ";
                // line 137
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_of_orders'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "                
                ";
        }
        // line 140
        echo "            </table>
            
            <div class=\"row\">
                <button class=\"no-print btn btn-primary btn-block printBtn\" onclick=\"window.print();\">Print</button>
            </div>
            
        </div>    
    </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DriverOrders:printmealsticker.html_1.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  304 => 140,  300 => 138,  286 => 137,  283 => 129,  280 => 128,  274 => 126,  271 => 125,  269 => 124,  266 => 123,  260 => 121,  257 => 120,  255 => 119,  250 => 116,  244 => 115,  241 => 114,  235 => 112,  232 => 111,  226 => 109,  223 => 108,  217 => 106,  215 => 105,  210 => 103,  204 => 102,  199 => 101,  195 => 99,  192 => 98,  190 => 97,  187 => 96,  184 => 95,  181 => 94,  179 => 93,  176 => 92,  173 => 91,  170 => 90,  168 => 89,  165 => 88,  162 => 87,  159 => 86,  156 => 85,  153 => 84,  150 => 83,  147 => 82,  145 => 81,  142 => 80,  124 => 79,  122 => 73,  119 => 72,  117 => 71,  51 => 8,  47 => 7,  42 => 5,  37 => 3,  33 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<html>
    <head>
        <link href=\"{{asset('bundles/design/')}}css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
        <!-- jQuery 2.1.4 -->
        <script src=\"{{asset('bundles/design/')}}js/jQuery-2.1.4.min.js\"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src=\"{{asset('bundles/design/')}}js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"{{asset('bundles/design/')}}css/print.css\">
    <style>
     .paddingcls{
            /* padding-top : 20px !important; */
        }
    .tableRaw{
        /* height : 12.5%; */
        width:100%;
    }
    .mealSticker{
        /* width : 30%; */
        width : 33.33%;
        height : 3.5cm;
        float : left;
        /* margin : 5px */
    }
    .subscriptionNo{
        margin-top :0;
        /* margin-bottom : 2px; */
        font-size : 25px
    }
    .tableCustom{
        width : 100%
    }
    .printBtn {
        position: fixed;
        bottom: 0;
        z-index : 1000;
        /* margin : 5px */
    }
    .productName{
        min-height : 50px;
        max-height : 50px;
        /* padding-top : 15px */
    }

    .mealAddons{
        min-height : 20px;
        max-height : 20px;
    }
    .paragraphCustom{
        font-size : 16px;
    }
    </style>
    
    <style type=\"text/css\" media=\"print\">
        @page {
            size: A4 portrait;   /* auto is the initial value */
            margin: 0.85cm 0 0.85cm 0;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
        .paragraphCustom{
            font-size : 16px;
        }
    </style>
    
    </head>
    <body>
        <div class=\"container-fluid\">

            {% set tdcls = '' %}
            <table class=\"tableCustom\">
                {% if meal_of_orders is defined and meal_of_orders is not empty %}
{#                    {% for i in 1..60 %}
                        <div class=\"mealSticker\">
                                {{i}}
                        </div>
                    {% endfor %} #}
                    {% for meal_of_orders in meal_of_orders %}

                        {% set addOnCount = 0 %}
                        {% if meal_of_orders.raw_eggs != 0 %}
                            {% set addOnCount = addOnCount + 1 %}
                        {% endif %}
                        {% if meal_of_orders.white_eggs != 0 %}
                            {% set addOnCount = addOnCount + 1 %}
                        {% endif %}

                        {% if meal_of_orders.carbs_amount != 0 %}
                            {% set addOnCount = addOnCount + 1 %}
                        {% endif %}
                        
                        {% if meal_of_orders.proteins_amount != 0 %}
                            {% set addOnCount = addOnCount + 1 %}
                        {% endif %}
                        
                        {% if loop.index == 1 %}
                            {%set tdcls = 'paddingcls' %}
                            <tr class=\"tableRaw\">
                        {% endif %}
                            <td class=\"mealSticker text-center {{tdcls}}\">
                                <span class=\"subscriptionNo\">{{meal_of_orders.unique_no}} {{meal_of_orders.firstCharacter}}</span>
                                <p class=\"productName paragraphCustom\">{{meal_of_orders.product_name}}</p>
                                <p class=\"paragraphCustom mealAddons\">
                                {% if meal_of_orders.proteins_amount != 0 %}
                                    Pro - {{meal_of_orders.proteins_amount}} / 
                                {% endif %}
                                {% if meal_of_orders.carbs_amount != 0 %}
                                    Carb - {{meal_of_orders.carbs_amount}}
                                {% endif %}
                                {% if meal_of_orders.raw_eggs != 0 %}
                                    Raw Egg - {{meal_of_orders.raw_eggs}} / 
                                {% endif %}
                                {% if meal_of_orders.raw_eggs != 0 %}
                                    White Egg - {{meal_of_orders.white_eggs}}
                                {% endif %}                                 
                                </p>
                            </td>                        
                        {% if loop.index is divisible by(18) and loop.index != 1 %}
                            {%set tdcls = 'paddingcls' %}
                        </tr><tr class=\"tableRaw {{loop.index}}\">
                        {%else%}
                            
                            {%if loop.index is divisible by(3) and loop.index != 1%}
                                {%set tdcls = '' %}
                                </tr><tr class=\"tableRaw {{loop.index}}\">
                            {% endif %}
                        {% endif %}
                        
                        {#
                        <div class=\"mealSticker text-center\">
                            <span class=\"subscriptionNo\">{{meal_of_orders.unique_no}}</span>
                            <p>Chicken Chilly with fried rice and sauce</p>
                            <p>Pro - {{meal_of_orders.proteins_amount}} / Carb - {{meal_of_orders.proteins_amount}} Raw Egg - {{meal_of_orders.raw_eggs}} / White Egg - {{meal_of_orders.white_eggs}}</p>
                        </div>
                        #}
                    {% endfor %}
                
                {% endif %}
            </table>
            
            <div class=\"row\">
                <button class=\"no-print btn btn-primary btn-block printBtn\" onclick=\"window.print();\">Print</button>
            </div>
            
        </div>    
    </body>
</html>", "AdminBundle:DriverOrders:printmealsticker.html_1.twig", "/var/www/admin/src/AdminBundle/Resources/views/DriverOrders/printmealsticker.html_1.twig");
    }
}
