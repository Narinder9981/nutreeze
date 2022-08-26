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

/* AdminBundle:DriverOrders:printmealsticker.html.twig */
class __TwigTemplate_2eb808b4f4680fac52993985136190dd6a7e971657c622abe56692d9e1088cb7 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DriverOrders:printmealsticker.html.twig"));

        // line 1
        echo "<html>
<head>
<meta charset=\"utf-8\">
<title>Anona Takeaway Box Label</title>
<meta name=\"viewport\" content=\"width=device-width, maximum-scale=1.0, minimum-scale=1.0\" />

        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
        <!-- jQuery 2.1.4 -->
        ";
        // line 14
        echo " 
    <style>
  body      {}
  

@page     {size: 50mm 25mm; margin: 5mm 5mm 5mm 5mm;}
@page       {size : landscape;} 
 
@media print {
  
@page       {size : landscape;}   
.printBtn {display:none;}

.mainDiv {width: 70mm; height: 1mm; text-align: center; border: }

.rowA     {/*margin-bottom: .5rem; font-size: 1.5rem; font-weight: bold;*/height:70px;}
.rowB     {margin-bottom: .1rem; font-size: .9375rem;height:70px;}
.rowC     {font-size: .900rem;text-align:center;padding-top:0.2rem;}
.rowD     {font-size: 1rem;font-weight:bold;text-align:center;padding-top:0.2rem;}
.rowAC      {font-size: .700rem;text-align:center;padding-top:0.2rem;}
.rowAD      {font-size: .700rem;text-align:center;padding-top:0.2rem;}  
.page-divide    {
        page-break-after: always;}

}
}

    </style>

    
   
    </head>
    <body>

       
        ";
        // line 49
        if (((isset($context["meal_of_orders"]) || array_key_exists("meal_of_orders", $context)) &&  !twig_test_empty(($context["meal_of_orders"] ?? $this->getContext($context, "meal_of_orders"))))) {
            // line 50
            echo "           ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["meal_of_orders"]);
            foreach ($context['_seq'] as $context["_key"] => $context["meal_of_orders"]) {
                // line 51
                echo "
              <page size=\"\">
              <div class=\"mainDiv\">
              
                <div class=\"rowD\">";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "product_name", []), "html", null, true);
                echo "</div>
                <div class=\"rowAC\">";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "date_given", []), "html", null, true);
                echo "</div>
                <div class=\"rowB\">Note:";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["meal_of_orders"], "order_note_text", []), "html", null, true);
                echo " </div>  
\t\t\t\t";
                // line 72
                echo "            </div>
            </page>

            <div class=\"page-divide\"></div>


          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal_of_orders'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "
        ";
        }
        // line 81
        echo "   


       
    <div class=\"container-fluid\">
      <div class=\"row justify-content-center\">
          <div class=\"col-sm-6\" ></div>
          <div class=\"col-sm-1 \" > <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button></div>
      </div>
    </div>
   
    </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DriverOrders:printmealsticker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 81,  117 => 79,  105 => 72,  101 => 57,  97 => 56,  93 => 55,  87 => 51,  82 => 50,  80 => 49,  43 => 14,  33 => 1,);
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
        <!-- jQuery 2.1.4 -->
        {# <script src=\"{{asset('bundles/design/')}}js/jQuery-2.1.4.min.js\"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src=\"{{asset('bundles/design/')}}js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"{{asset('bundles/design/')}}css/print.css\">
        <link href=\"{{asset('bundles/design/')}}css/bootstrap.min.v4.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />  
<link href=\"{{asset('bundles/design/')}}css/style.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" /> #} 
    <style>
  body      {}
  

@page     {size: 50mm 25mm; margin: 5mm 5mm 5mm 5mm;}
@page       {size : landscape;} 
 
@media print {
  
@page       {size : landscape;}   
.printBtn {display:none;}

.mainDiv {width: 70mm; height: 1mm; text-align: center; border: }

.rowA     {/*margin-bottom: .5rem; font-size: 1.5rem; font-weight: bold;*/height:70px;}
.rowB     {margin-bottom: .1rem; font-size: .9375rem;height:70px;}
.rowC     {font-size: .900rem;text-align:center;padding-top:0.2rem;}
.rowD     {font-size: 1rem;font-weight:bold;text-align:center;padding-top:0.2rem;}
.rowAC      {font-size: .700rem;text-align:center;padding-top:0.2rem;}
.rowAD      {font-size: .700rem;text-align:center;padding-top:0.2rem;}  
.page-divide    {
        page-break-after: always;}

}
}

    </style>

    
   
    </head>
    <body>

       
        {% if meal_of_orders is defined and meal_of_orders is not empty %}
           {% for meal_of_orders in meal_of_orders %}

              <page size=\"\">
              <div class=\"mainDiv\">
              
                <div class=\"rowD\">{{meal_of_orders.product_name}}</div>
                <div class=\"rowAC\">{{meal_of_orders.date_given}}</div>
                <div class=\"rowB\">Note:{{meal_of_orders.order_note_text}} </div>  
\t\t\t\t{#<div class=\"rowC\">
\t\t\t\t\t{% if meal_of_orders.proteins_amount != 0 %}
\t\t\t\t\t\tPro - <strong>{{meal_of_orders.proteins_amount}}</strong> / 
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if meal_of_orders.carbs_amount != 0 %}
\t\t\t\t\t\tCarb - <strong>{{meal_of_orders.carbs_amount}}</strong> /
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if meal_of_orders.fat != 0 %}
\t\t\t\t\t\tFat - <strong>{{meal_of_orders.fat}} </strong> / 
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if meal_of_orders.calory != 0 %}
\t\t\t\t\t\tCalory - <strong> {{meal_of_orders.calory}}</strong>
\t\t\t\t\t{% endif %}  
                </div>#}
            </div>
            </page>

            <div class=\"page-divide\"></div>


          {% endfor %}

        {% endif %}
   


       
    <div class=\"container-fluid\">
      <div class=\"row justify-content-center\">
          <div class=\"col-sm-6\" ></div>
          <div class=\"col-sm-1 \" > <button class=\"no-print btn btn-secondary btn-block printBtn\" onclick=\"window.print();\">Print</button></div>
      </div>
    </div>
   
    </body>
</html>", "AdminBundle:DriverOrders:printmealsticker.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DriverOrders/printmealsticker.html.twig");
    }
}
