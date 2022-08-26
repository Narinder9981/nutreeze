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

/* AdminBundle:DriverOrders:printdeliverysticker.html.twig */
class __TwigTemplate_60aff4ed6252002d1337aff874b10b72d9310d49e6d249eef127a4562f29793e extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DriverOrders:printdeliverysticker.html.twig"));

        // line 1
        echo "<html>
<head>
<meta charset=\"utf-8\">
<title>Anona Takeaway Box Label</title>
<meta name=\"viewport\" content=\"width=device-width, maximum-scale=1.0, minimum-scale=1.0\" />

        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
      
<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
        echo "css/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <style>

    @media print {

@page {size:landscape;}
          
            .no-print, .no-print *
\t\t\t{
\t\t\t\tdisplay: none !important;
\t\t\t}
\t\t\t.page-divide    {
\t\t\t\tpage-break-after: always;}

\t\t\t}
    
\t}
\t
    </style>
    
   
    </head>

    <body>
      
         <div class=\"container-fluid\">
    <div class=\"row justify-content-center\">
        <div class=\"col-sm-6\" ></div>
        <div class=\"col-sm-1 \" >
         <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button>
     </div>
    </div>
</div>

        ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["driverOrdersData1"] ?? $this->getContext($context, "driverOrdersData1")));
        foreach ($context['_seq'] as $context["_key"] => $context["driverOrdersData"]) {
            // line 44
            echo "         <div class=\"container\">
        <div class=\"order-anona d-flex justify-content-between\">
            <div class=\"order-id\"><small>order id:</small><span>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "unique_no", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"anona-logo\"><img src=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
            echo "images/anona-logo.svg\" alt=\"anona\"></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>full name:</small><span class=\"text-uppercase\">";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "customer_name", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>phone: </small><span class=\"text-uppercase\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "mobile_no", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>date: </small><span class=\"text-uppercase\">";
            // line 52
            (($this->getAttribute($context["driverOrdersData"], "date_given", [], "array")) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["driverOrdersData"], "date_given", [], "array"), "l jS F Y"), "html", null, true))) : (print ("")));
            echo "</span></div>
            <div class=\"order-id\"><small>time: </small><span class=\"text-uppercase\">";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "title", [], "array"), "html", null, true);
            echo "</span></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>adress:</small></div>
            <div class=\"order-id\"><small>governorate:</small><span class=\"text-uppercase\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "city_name", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>area:</small><span class=\"text-uppercase\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "area_name", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>block:</small><span>";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "address_name", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>street:</small><span class=\"text-uppercase\">";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "street", [], "array"), "html", null, true);
            echo "</span></div>
            <div class=\"order-id\"><small>building:</small><span class=\"text-uppercase\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "flate_house_number", [], "array"), "html", null, true);
            echo "</span></div>
            ";
            // line 63
            echo "            <div class=\"order-id\"><small>flat:</small><span class=\"text-uppercase\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "flat_no", [], "array"), "html", null, true);
            echo "</span></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>delivery note:</small><span class=\"text-uppercase\">";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "name", [], "array"), "html", null, true);
            echo "</span></div>
\t\t\t<div class=\"order-id\"><small>Direction:</small><span class=\"text-uppercase\">";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "landmark", [], "array"), "html", null, true);
            echo "</span></div>
        </div>
          ";
            // line 69
            if (($this->getAttribute($context["driverOrdersData"], "meal_of_orders", [], "array", true, true) &&  !twig_test_empty($this->getAttribute($context["driverOrdersData"], "meal_of_orders", [], "array")))) {
                // line 70
                echo "        <table class=\"table-data-main\" width=\"100%\">
            <tr>
                <td class=\"table-td-left\" width=\"50%\">
                    <table class=\"table-data\" width=\"100%\">
                        <tr>
                            <td><small>meal:</small><span class=\"text-uppercase\">ITEMS</span></td>
                            <td><small>portion(s):</small></td>
                            <td><small>cal.:</small></td>
                        </tr>
                      
                          ";
                // line 80
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["driverOrdersData"], "meal_of_orders", [], "array"));
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
                    // line 81
                    echo "                          ";
                    if (($this->getAttribute($context["loop"], "index", []) % 2 == 1)) {
                        // line 82
                        echo "
                        <tr>
                            <td>
                                <small >";
                        // line 85
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_category_name", []), "html", null, true);
                        echo ":</small>
                                <div style=\"text-transform: uppercase;\">";
                        // line 86
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_name", []), "html", null, true);
                        echo "</div>
                                <div>PRO - ";
                        // line 87
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "prot", []), "html", null, true);
                        echo "G | CARB - ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "carb", []), "html", null, true);
                        echo "G | FAT ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "fat", []), "html", null, true);
                        echo "G</div>
                            </td>
                            <td>1.0</td>
                            <td>";
                        // line 90
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "calory", []), "html", null, true);
                        echo "</td>
                        </tr>
                        ";
                    }
                    // line 93
                    echo "                        ";
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
                // line 94
                echo "                    </table>
                </td>
                <td class=\"table-td-right\" width=\"50%\">
                    <table class=\"table-data\" width=\"100%\">
                        <tr>
                            <td><small>meal:</small><span class=\"text-uppercase\">ITEMS</span></td>
                            <td><small>portion(s):</small></td>
                            <td><small>cal.:</small></td>
                        </tr>
                  
                          ";
                // line 104
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["driverOrdersData"], "meal_of_orders", [], "array"));
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
                    // line 105
                    echo "                          ";
                    if (($this->getAttribute($context["loop"], "index", []) % 2 == 0)) {
                        // line 106
                        echo "
                        <tr>
                            <td>
                                <small >";
                        // line 109
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_category_name", []), "html", null, true);
                        echo ":</small>
                                <div style=\"text-transform: uppercase;\">";
                        // line 110
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_name", []), "html", null, true);
                        echo "</div>
                                <div>PRO - ";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "prot", []), "html", null, true);
                        echo "G | CARB - ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "carb", []), "html", null, true);
                        echo "G | FAT ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "fat", []), "html", null, true);
                        echo "G</div>
                            </td>
                            <td>1.0</td>
                            <td>";
                        // line 114
                        echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "calory", []), "html", null, true);
                        echo "</td>
                        </tr>
                       
                        ";
                    }
                    // line 118
                    echo "                        ";
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
                // line 119
                echo "                    </table>
                </td>
            </tr>
        </table>
         ";
            }
            // line 124
            echo "        <div class=\"footer-anona d-flex justify-content-between\">
            <div class=\"anona-foot\">
                <img src=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/design/"), "html", null, true);
            echo "images/anona.svg\" alt=\"anona\">
                <div class=\"order-id\"><small>note:</small><span class=\"text-uppercase\">";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "order_note_text", [], "array"), "html", null, true);
            echo "</span></div>
            </div>
            <div class=\"foot-right\">
                <div class=\"order-id\"><small>total calorie:</small><span class=\"text-uppercase\">";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "total_calorie", [], "array"), "html", null, true);
            echo " KCAL</span></div>
                <div class=\"order-id\"><small>target calorie:</small><span class=\"text-uppercase\">
                  
             ";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($context["driverOrdersData"], "calorie_count", [], "array"), "html", null, true);
            echo "
               KCAL</span></div>
            </div>
        </div>
    </div>
<div class=\"page-divide\"></div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['driverOrdersData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 140
        echo "    <br>
            <div class=\"container-fluid\">
    <div class=\"row justify-content-center\">
        <div class=\"col-sm-6\" ></div>
        <div class=\"col-sm-1 \" >
         <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button>
     </div>
    </div>
</div>
         
   
    </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DriverOrders:printdeliverysticker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  346 => 140,  333 => 133,  327 => 130,  321 => 127,  317 => 126,  313 => 124,  306 => 119,  292 => 118,  285 => 114,  275 => 111,  271 => 110,  267 => 109,  262 => 106,  259 => 105,  242 => 104,  230 => 94,  216 => 93,  210 => 90,  200 => 87,  196 => 86,  192 => 85,  187 => 82,  184 => 81,  167 => 80,  155 => 70,  153 => 69,  148 => 67,  144 => 66,  137 => 63,  133 => 61,  129 => 60,  125 => 59,  121 => 58,  117 => 57,  110 => 53,  106 => 52,  102 => 51,  98 => 50,  92 => 47,  88 => 46,  84 => 44,  80 => 43,  43 => 9,  33 => 1,);
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
<meta charset=\"utf-8\">
<title>Anona Takeaway Box Label</title>
<meta name=\"viewport\" content=\"width=device-width, maximum-scale=1.0, minimum-scale=1.0\" />

        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
      
<link href=\"{{asset('bundles/design/')}}css/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    <style>

    @media print {

@page {size:landscape;}
          
            .no-print, .no-print *
\t\t\t{
\t\t\t\tdisplay: none !important;
\t\t\t}
\t\t\t.page-divide    {
\t\t\t\tpage-break-after: always;}

\t\t\t}
    
\t}
\t
    </style>
    
   
    </head>

    <body>
      
         <div class=\"container-fluid\">
    <div class=\"row justify-content-center\">
        <div class=\"col-sm-6\" ></div>
        <div class=\"col-sm-1 \" >
         <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button>
     </div>
    </div>
</div>

        {% for driverOrdersData in driverOrdersData1 %}
         <div class=\"container\">
        <div class=\"order-anona d-flex justify-content-between\">
            <div class=\"order-id\"><small>order id:</small><span>{{driverOrdersData['unique_no']}}</span></div>
            <div class=\"anona-logo\"><img src=\"{{asset('bundles/design/')}}images/anona-logo.svg\" alt=\"anona\"></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>full name:</small><span class=\"text-uppercase\">{{driverOrdersData['customer_name']}}</span></div>
            <div class=\"order-id\"><small>phone: </small><span class=\"text-uppercase\">{{driverOrdersData['mobile_no']}}</span></div>
            <div class=\"order-id\"><small>date: </small><span class=\"text-uppercase\">{{ driverOrdersData['date_given']  ? driverOrdersData['date_given']|date(\"l jS F Y\") :\"\" }}</span></div>
            <div class=\"order-id\"><small>time: </small><span class=\"text-uppercase\">{{driverOrdersData['title']}}</span></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>adress:</small></div>
            <div class=\"order-id\"><small>governorate:</small><span class=\"text-uppercase\">{{driverOrdersData['city_name']}}</span></div>
            <div class=\"order-id\"><small>area:</small><span class=\"text-uppercase\">{{driverOrdersData['area_name']}}</span></div>
            <div class=\"order-id\"><small>block:</small><span>{{driverOrdersData['address_name']}}</span></div>
            <div class=\"order-id\"><small>street:</small><span class=\"text-uppercase\">{{driverOrdersData['street']}}</span></div>
            <div class=\"order-id\"><small>building:</small><span class=\"text-uppercase\">{{driverOrdersData['flate_house_number']}}</span></div>
            {#<div class=\"order-id\"><small>Direction:</small><span class=\"text-uppercase\">{{driverOrdersData['landmark']}}</span></div>#}
            <div class=\"order-id\"><small>flat:</small><span class=\"text-uppercase\">{{driverOrdersData['flat_no']}}</span></div>
        </div>
        <div class=\"order-row d-flex justify-content-between\">
            <div class=\"order-id\"><small>delivery note:</small><span class=\"text-uppercase\">{{driverOrdersData['name']}}</span></div>
\t\t\t<div class=\"order-id\"><small>Direction:</small><span class=\"text-uppercase\">{{driverOrdersData['landmark']}}</span></div>
        </div>
          {% if driverOrdersData['meal_of_orders'] is defined and driverOrdersData['meal_of_orders'] is not empty %}
        <table class=\"table-data-main\" width=\"100%\">
            <tr>
                <td class=\"table-td-left\" width=\"50%\">
                    <table class=\"table-data\" width=\"100%\">
                        <tr>
                            <td><small>meal:</small><span class=\"text-uppercase\">ITEMS</span></td>
                            <td><small>portion(s):</small></td>
                            <td><small>cal.:</small></td>
                        </tr>
                      
                          {% for meal_of_orders in driverOrdersData['meal_of_orders']  %}
                          {% if (loop.index is odd) %}

                        <tr>
                            <td>
                                <small >{{meal_of_orders.product_category_name}}:</small>
                                <div style=\"text-transform: uppercase;\">{{meal_of_orders.product_name}}</div>
                                <div>PRO - {{meal_of_orders.prot}}G | CARB - {{meal_of_orders.carb}}G | FAT {{meal_of_orders.fat}}G</div>
                            </td>
                            <td>1.0</td>
                            <td>{{meal_of_orders.calory}}</td>
                        </tr>
                        {% endif %}
                        {% endfor %}
                    </table>
                </td>
                <td class=\"table-td-right\" width=\"50%\">
                    <table class=\"table-data\" width=\"100%\">
                        <tr>
                            <td><small>meal:</small><span class=\"text-uppercase\">ITEMS</span></td>
                            <td><small>portion(s):</small></td>
                            <td><small>cal.:</small></td>
                        </tr>
                  
                          {% for meal_of_orders in driverOrdersData['meal_of_orders'] %}
                          {% if (loop.index is even) %}

                        <tr>
                            <td>
                                <small >{{meal_of_orders.product_category_name}}:</small>
                                <div style=\"text-transform: uppercase;\">{{meal_of_orders.product_name}}</div>
                                <div>PRO - {{meal_of_orders.prot}}G | CARB - {{meal_of_orders.carb}}G | FAT {{meal_of_orders.fat}}G</div>
                            </td>
                            <td>1.0</td>
                            <td>{{meal_of_orders.calory}}</td>
                        </tr>
                       
                        {% endif %}
                        {% endfor %}
                    </table>
                </td>
            </tr>
        </table>
         {% endif %}
        <div class=\"footer-anona d-flex justify-content-between\">
            <div class=\"anona-foot\">
                <img src=\"{{asset('bundles/design/')}}images/anona.svg\" alt=\"anona\">
                <div class=\"order-id\"><small>note:</small><span class=\"text-uppercase\">{{driverOrdersData['order_note_text']}}</span></div>
            </div>
            <div class=\"foot-right\">
                <div class=\"order-id\"><small>total calorie:</small><span class=\"text-uppercase\">{{driverOrdersData['total_calorie']}} KCAL</span></div>
                <div class=\"order-id\"><small>target calorie:</small><span class=\"text-uppercase\">
                  
             {{driverOrdersData['calorie_count']}}
               KCAL</span></div>
            </div>
        </div>
    </div>
<div class=\"page-divide\"></div>
    {% endfor %}
    <br>
            <div class=\"container-fluid\">
    <div class=\"row justify-content-center\">
        <div class=\"col-sm-6\" ></div>
        <div class=\"col-sm-1 \" >
         <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button>
     </div>
    </div>
</div>
         
   
    </body>
</html>", "AdminBundle:DriverOrders:printdeliverysticker.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DriverOrders/printdeliverysticker.html.twig");
    }
}
