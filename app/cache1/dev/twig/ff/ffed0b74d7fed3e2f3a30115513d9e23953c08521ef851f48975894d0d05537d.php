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

/* AdminBundle:DriverOrders:printDriversticker.html.twig */
class __TwigTemplate_5c8ebc21fcd2e2b7134415296a7a6d15042f7536f9d24029e4df70281ab83850 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:DriverOrders:printDriversticker.html.twig"));

        // line 1
        echo "<html>
    <head>
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
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
    body \t\t\t{}
\t

    @page\t\t\t{size: 50mm 25mm; margin: 5mm 5mm 5mm 5mm;}
    @page  \t\t\t{size : landscape;}\t

    @media print {

            @page  \t\t\t{size : landscape;}

            .mainDiv\t\t{width: 70mm; height: 25mm; text-align: center;padding-left: 10px;display: block;}

            .rowA\t\t\t{margin-bottom: .5rem; font-size: 1.8rem; font-weight: bold; padding-top: 0.4rem; text-align:center;}
            .rowB\t\t\t{margin-bottom: .5rem; font-size: 1.0rem; font-weight: 600; text-align:center;}
            .rowC\t\t\t{font-size: 1.1 rem; text-align:center;}
    }
    .no-print, .no-print *
    {
        display: none !important;
    }
}
    </style>
    
    <style type=\"text/css\" media=\"print\">
       ";
        // line 45
        echo "    </style>
    
    </head>
    <body>
       <page size=\"\">
            ";
        // line 50
        $context["tdcls"] = "";
        echo "            
            ";
        // line 51
        if (((isset($context["pass_driverStickerArray"]) || array_key_exists("pass_driverStickerArray", $context)) &&  !twig_test_empty(($context["pass_driverStickerArray"] ?? $this->getContext($context, "pass_driverStickerArray"))))) {
            // line 52
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["pass_driverStickerArray"]);
            foreach ($context['_seq'] as $context["_key"] => $context["pass_driverStickerArray"]) {
                // line 53
                echo "
                  
                    <div class=\"mainDiv\">
                        <div class=\"rowA\"><strong>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute($context["pass_driverStickerArray"], "driver_sticker_code1", []), "html", null, true);
                echo " </strong></div>
                        <div class=\"rowB\">";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["pass_driverStickerArray"], "driver_sticker_code2", []), "html", null, true);
                echo "</div>
                        <div class=\"rowB\">
                           ";
                // line 59
                echo twig_escape_filter($this->env, $this->getAttribute($context["pass_driverStickerArray"], "driver_sticker_code3", []), "html", null, true);
                echo "
                        </div>

                </div>



                   
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pass_driverStickerArray'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "            ";
        }
        echo "   
            <div class=\"row\">
                <button class=\"no-print btn btn-primary btn-block printBtn\" onclick=\"window.print();\">Print</button>
            </div>
       </page>
    </body>
</html>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:DriverOrders:printDriversticker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 68,  109 => 59,  104 => 57,  100 => 56,  95 => 53,  90 => 52,  88 => 51,  84 => 50,  77 => 45,  48 => 8,  44 => 7,  39 => 5,  33 => 1,);
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
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">
        <!-- jQuery 2.1.4 -->
        <script src=\"{{asset('bundles/design/')}}js/jQuery-2.1.4.min.js\"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src=\"{{asset('bundles/design/')}}js/bootstrap.min.js\" type=\"text/javascript\"></script>
        <link rel=\"stylesheet\" type=\"text/css\" media=\"print\" href=\"{{asset('bundles/design/')}}css/print.css\">
    <style>
    body \t\t\t{}
\t

    @page\t\t\t{size: 50mm 25mm; margin: 5mm 5mm 5mm 5mm;}
    @page  \t\t\t{size : landscape;}\t

    @media print {

            @page  \t\t\t{size : landscape;}

            .mainDiv\t\t{width: 70mm; height: 25mm; text-align: center;padding-left: 10px;display: block;}

            .rowA\t\t\t{margin-bottom: .5rem; font-size: 1.8rem; font-weight: bold; padding-top: 0.4rem; text-align:center;}
            .rowB\t\t\t{margin-bottom: .5rem; font-size: 1.0rem; font-weight: 600; text-align:center;}
            .rowC\t\t\t{font-size: 1.1 rem; text-align:center;}
    }
    .no-print, .no-print *
    {
        display: none !important;
    }
}
    </style>
    
    <style type=\"text/css\" media=\"print\">
       {# @page {
            size: A4 portrait;   /* auto is the initial value */
            margin: 0.85cm 0 0.85cm 0;
        }
        .no-print, .no-print *
        {
            display: none !important;
        }
        .paragraphCustom{
            font-size : 16px;
        }#}
    </style>
    
    </head>
    <body>
       <page size=\"\">
            {% set tdcls = '' %}            
            {% if pass_driverStickerArray is defined and pass_driverStickerArray is not empty %}
                {% for pass_driverStickerArray in pass_driverStickerArray %}

                  
                    <div class=\"mainDiv\">
                        <div class=\"rowA\"><strong>{{pass_driverStickerArray.driver_sticker_code1}} </strong></div>
                        <div class=\"rowB\">{{pass_driverStickerArray.driver_sticker_code2}}</div>
                        <div class=\"rowB\">
                           {{pass_driverStickerArray.driver_sticker_code3}}
                        </div>

                </div>



                   
                {% endfor %}
            {% endif %}   
            <div class=\"row\">
                <button class=\"no-print btn btn-primary btn-block printBtn\" onclick=\"window.print();\">Print</button>
            </div>
       </page>
    </body>
</html>", "AdminBundle:DriverOrders:printDriversticker.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/DriverOrders/printDriversticker.html.twig");
    }
}
