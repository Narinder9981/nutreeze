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

/* AdminBundle:Orders:deliverynote.html.twig */
class __TwigTemplate_1cf10ab77e3161c053b879a4157e63eb7d92b2e9715476743a23b23df0d17c67 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Orders:deliverynote.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Orders:deliverynote.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 3
        echo "<style>

@media print
{    
\t.no-print, .no-print *
\t{
\t\t\tdisplay: none !important;
\t}
}

.del-info {
    margin-top: 15px;
}
.del-info td{
    width: 50px;
\theight: 50px;
\ttext-align: center;
}
.del-info td.odd {
    background: #ddd;
}
.td-bg-gray{
\tbackground: #ddd;
}
.del-info .odd span {
    font-weight: 700;
}
.sub-info {
    margin-top: 15px;
    text-align: center;
}
.sub-info td.odd {
    font-weight: 700;
\tpadding: 8px;
}
.meal-info {
    margin-top: 30px;
\tmargin-bottom: 20px;
}
.meal-info td {
    width: 220px;
\tpadding: 8px;
\ttext-align: center;
}
</style>
\t<section class=\"content-header\">
\t\t<h1>
\t\t  Order
\t\t</h1>
\t\t<ol class=\"breadcrumb\">
\t\t  <li><a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "success_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 58
            echo "            <div class=\"alert alert-success alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 60
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "flashbag", []), "get", [0 => "error_msg"], "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 64
            echo "            <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>";
            // line 66
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "
\t\t";
        // line 70
        if (((twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "meal", [])) && twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "breakfast", []))) && twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "snacks", [])))) {
            // line 71
            echo "\t\t    <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>No meals are added for given date.
            </div>
\t\t";
        }
        // line 76
        echo "
\t\t";
        // line 77
        $context["status_name"] = [0 => "pending", 1 => "accept", 2 => "reject", 3 => "cancel", 4 => "success", 5 => "ongoing"];
        // line 78
        echo "\t\t";
        $context["endDate"] = "";
        echo "\t\t\t\t
\t\t";
        // line 79
        if (((isset($context["delivery_note"]) || array_key_exists("delivery_note", $context)) &&  !twig_test_empty(($context["delivery_note"] ?? $this->getContext($context, "delivery_note"))))) {
            // line 80
            echo "\t\t\t<section class=\"invoice\"> 
\t\t\t\t<!-- title row -->
\t\t\t\t<div class=\"col-md-12 no-print\">
\t\t\t\t\t<div class=\"row col-md-4 form-group no-print\">
\t\t\t\t\t\t<form class=\"form-inline\" action=\"\" method=\"POST\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"email\">Date:</label>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"order_date\" value=\"";
            // line 87
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "_today", []), "d-m-Y"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Go</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div id=\"invoice\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-xs-12 text-center\">
\t\t\t\t\t\t\t<h1>DELIVERY NOTE</h1>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<h2 class=\"\">
\t\t\t\t\t\t\t\t<small class=\"pull-right\">
\t\t\t\t\t\t\t\t\tDate: ";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "today", []), "html", null, true);
            echo "<br>
\t\t\t\t\t\t\t\t\tDay: ";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "day", []), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t";
            // line 109
            if (($this->getAttribute(($context["delivery_note"] ?? null), "order_info", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "order_info", [])))) {
                // line 110
                echo "\t\t\t\t\t\t\t";
                $context["order_info"] = $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "order_info", []);
                // line 111
                echo "\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 del-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Name</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 115
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Mobile No.</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 117
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "mobile", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Subscription No.</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 121
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "unique_no", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Address</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 123
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "address", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Package</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "package_name", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>";
                // line 128
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "plan", []), "html", null, true);
                echo "</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 129
                echo twig_escape_filter($this->env, $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "diff", []), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 sub-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\"><span>Subscription starts</span></td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                // line 137
                $context["endDate"] = $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "end_date", []);
                echo "\t\t\t\t

\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                // line 139
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "start_date", []) . "  till  ") . $this->getAttribute(($context["order_info"] ?? $this->getContext($context, "order_info")), "end_date", [])), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 145
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 meal-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\" style=\"font-weight:700;\">Protein</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\" style=\"font-weight:700;\">Carb</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
            // line 154
            if (($this->getAttribute(($context["delivery_note"] ?? null), "breakfast", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "breakfast", [])))) {
                // line 155
                echo "\t\t\t\t\t\t\t\t\t";
                $context["breakfast"] = $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "breakfast", []);
                // line 156
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["breakfast"] ?? $this->getContext($context, "breakfast")));
                foreach ($context['_seq'] as $context["_key"] => $context["breakfast1"]) {
                    // line 157
                    echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd ";
                    // line 158
                    if (($this->getAttribute($context["breakfast1"], "type", []) != "")) {
                        echo "td-bg-gray";
                    }
                    echo "\" style=\"font-weight:700;\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breakfast1"], "type", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                    // line 159
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breakfast1"], "product_name", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">";
                    // line 160
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breakfast1"], "proteins_amount", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                    // line 161
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breakfast1"], "carbs_amount", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breakfast1'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 165
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 166
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 167
            if (($this->getAttribute(($context["delivery_note"] ?? null), "meal", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "meal", [])))) {
                // line 168
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                // line 174
                $context["meal"] = $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "meal", []);
                // line 175
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["meal"] ?? $this->getContext($context, "meal")));
                foreach ($context['_seq'] as $context["_key"] => $context["meal1"]) {
                    // line 176
                    echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd ";
                    // line 177
                    if (($this->getAttribute($context["meal1"], "type", []) != "")) {
                        echo "td-bg-gray";
                    }
                    echo "\" style=\"font-weight:700;\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal1"], "type", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                    // line 178
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal1"], "product_name", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">";
                    // line 179
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal1"], "proteins_amount", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                    // line 180
                    echo twig_escape_filter($this->env, $this->getAttribute($context["meal1"], "carbs_amount", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['meal1'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 184
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 185
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 186
            if (($this->getAttribute(($context["delivery_note"] ?? null), "snacks", [], "any", true, true) &&  !twig_test_empty($this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "snacks", [])))) {
                // line 187
                echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                // line 193
                $context["snacks"] = $this->getAttribute(($context["delivery_note"] ?? $this->getContext($context, "delivery_note")), "snacks", []);
                // line 194
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["snacks"] ?? $this->getContext($context, "snacks")));
                foreach ($context['_seq'] as $context["_key"] => $context["snacks1"]) {
                    // line 195
                    echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd ";
                    // line 196
                    if (($this->getAttribute($context["snacks1"], "type", []) != "")) {
                        echo "td-bg-gray";
                    }
                    echo "\" style=\"font-weight:700;\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["snacks1"], "type", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">";
                    // line 197
                    echo twig_escape_filter($this->env, $this->getAttribute($context["snacks1"], "product_name", []), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">N/A</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">N/A</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['snacks1'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 203
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 204
            echo "\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- info row -->
\t\t\t\t
\t\t\t\t<div class=\"row no-print\">
\t\t\t\t\t<button class=\"btn btn-info print-btn\" onclick=\"window.print()\" ><i class=\"fa fa-print\"></i>Print</button>
\t\t\t\t</div>
\t\t\t</section>
\t\t\t
\t\t";
        }
        // line 217
        echo "\t</section>\t\t
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 221
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 222
        echo "  <script>
\t\t  

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

function assign_driver(element,order_master_id){
\t\t
\t\tvar driver = element.val();
\t\t\$.ajax({
\t\t\turl : \"";
        // line 250
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_orders_assigndrivertoallorder");
        echo "\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'driver_id':driver},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Driver Assigned successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t
    \$(document).ready(function() {

\t\t";
        // line 269
        if (((isset($context["endDate"]) || array_key_exists("endDate", $context)) &&  !twig_test_empty(($context["endDate"] ?? $this->getContext($context, "endDate"))))) {
            // line 270
            echo "\t\t\tlet endDate = new Date('";
            echo twig_escape_filter($this->env, ($context["endDate"] ?? $this->getContext($context, "endDate")), "html", null, true);
            echo "');
\t\t\tconsole.log({endDate});
\t\t\t\$('.datepicker').datepicker({ format: 'dd-mm-yyyy' ,startDate : new Date() , endDate : endDate });
\t\t";
        } else {
            // line 274
            echo "\t\t\t\$('.datepicker').datepicker({ format: 'dd-mm-yyyy' ,startDate : new Date() });
\t\t";
        }
        // line 275
        echo "\t\t

\t\t\$('#datatable').DataTable();

\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t}
\t\t
  </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Orders:deliverynote.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  525 => 275,  521 => 274,  513 => 270,  511 => 269,  489 => 250,  459 => 222,  453 => 221,  444 => 217,  429 => 204,  426 => 203,  414 => 197,  406 => 196,  403 => 195,  398 => 194,  396 => 193,  388 => 187,  386 => 186,  383 => 185,  380 => 184,  370 => 180,  366 => 179,  362 => 178,  354 => 177,  351 => 176,  346 => 175,  344 => 174,  336 => 168,  334 => 167,  331 => 166,  328 => 165,  318 => 161,  314 => 160,  310 => 159,  302 => 158,  299 => 157,  294 => 156,  291 => 155,  289 => 154,  278 => 145,  269 => 139,  264 => 137,  253 => 129,  249 => 128,  245 => 127,  238 => 123,  233 => 121,  226 => 117,  221 => 115,  215 => 111,  212 => 110,  210 => 109,  202 => 104,  198 => 103,  179 => 87,  170 => 80,  168 => 79,  163 => 78,  161 => 77,  158 => 76,  151 => 71,  149 => 70,  146 => 69,  137 => 66,  133 => 64,  128 => 63,  119 => 60,  115 => 58,  111 => 57,  104 => 53,  52 => 3,  46 => 2,  30 => 1,);
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
<style>

@media print
{    
\t.no-print, .no-print *
\t{
\t\t\tdisplay: none !important;
\t}
}

.del-info {
    margin-top: 15px;
}
.del-info td{
    width: 50px;
\theight: 50px;
\ttext-align: center;
}
.del-info td.odd {
    background: #ddd;
}
.td-bg-gray{
\tbackground: #ddd;
}
.del-info .odd span {
    font-weight: 700;
}
.sub-info {
    margin-top: 15px;
    text-align: center;
}
.sub-info td.odd {
    font-weight: 700;
\tpadding: 8px;
}
.meal-info {
    margin-top: 30px;
\tmargin-bottom: 20px;
}
.meal-info td {
    width: 220px;
\tpadding: 8px;
\ttext-align: center;
}
</style>
\t<section class=\"content-header\">
\t\t<h1>
\t\t  Order
\t\t</h1>
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

\t\t{% if delivery_note.meal is empty  and delivery_note.breakfast is empty and delivery_note.snacks is empty %}
\t\t    <div class=\"alert alert-danger alert-dismissable\">
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                <h4><i class=\"icon fa fa-check\"></i> Alert!</h4>No meals are added for given date.
            </div>
\t\t{% endif %}

\t\t{%set status_name = ['pending','accept','reject','cancel','success','ongoing'] %}
\t\t{% set endDate = '' %}\t\t\t\t
\t\t{%if delivery_note is defined and delivery_note is not empty%}
\t\t\t<section class=\"invoice\"> 
\t\t\t\t<!-- title row -->
\t\t\t\t<div class=\"col-md-12 no-print\">
\t\t\t\t\t<div class=\"row col-md-4 form-group no-print\">
\t\t\t\t\t\t<form class=\"form-inline\" action=\"\" method=\"POST\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label for=\"email\">Date:</label>
\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control datepicker\" name=\"order_date\" value=\"{{delivery_note._today | date('d-m-Y') }}\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Go</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div id=\"invoice\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-xs-12 text-center\">
\t\t\t\t\t\t\t<h1>DELIVERY NOTE</h1>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<h2 class=\"\">
\t\t\t\t\t\t\t\t<small class=\"pull-right\">
\t\t\t\t\t\t\t\t\tDate: {{delivery_note.today}}<br>
\t\t\t\t\t\t\t\t\tDay: {{delivery_note.day}}
\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t\t{% if delivery_note.order_info is defined and delivery_note.order_info is not empty %}
\t\t\t\t\t\t\t{% set order_info = delivery_note.order_info %}
\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 del-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Name</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.name }}</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Mobile No.</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.mobile }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Subscription No.</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.unique_no }}</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Address</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.address }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>Package</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.package_name }}</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"><span>{{ order_info.plan }}</span></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.diff }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 sub-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\"><span>Subscription starts</span></td>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% set endDate = order_info.end_date %}\t\t\t\t

\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ order_info.start_date ~ '  till  ' ~ order_info.end_date }}</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t\t\t<table border=\"1\" class=\"col-xs-12 meal-info\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\" style=\"font-weight:700;\">Protein</td>
\t\t\t\t\t\t\t\t\t<td class=\"odd td-bg-gray\" style=\"font-weight:700;\">Carb</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% if delivery_note.breakfast is defined and delivery_note.breakfast is not empty %}
\t\t\t\t\t\t\t\t\t{% set breakfast = delivery_note.breakfast %}
\t\t\t\t\t\t\t\t\t{% for breakfast1 in breakfast %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd {% if breakfast1.type != '' %}td-bg-gray{% endif %}\" style=\"font-weight:700;\">{{ breakfast1.type }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ breakfast1.product_name }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">{{ breakfast1.proteins_amount }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ breakfast1.carbs_amount }}</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if delivery_note.meal is defined and delivery_note.meal is not empty %}
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t{% set meal = delivery_note.meal %}
\t\t\t\t\t\t\t\t\t{% for meal1 in meal %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd {% if meal1.type != '' %}td-bg-gray{% endif %}\" style=\"font-weight:700;\">{{ meal1.type }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ meal1.product_name }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">{{ meal1.proteins_amount }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ meal1.carbs_amount }}</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t{% if delivery_note.snacks is defined and delivery_note.snacks is not empty %}
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"odd\"></td>
\t\t\t\t\t\t\t\t\t\t<td class=\"even\"></td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t{% set snacks = delivery_note.snacks %}
\t\t\t\t\t\t\t\t\t{% for snacks1 in snacks %}
\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd {% if snacks1.type != '' %}td-bg-gray{% endif %}\" style=\"font-weight:700;\">{{ snacks1.type }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">{{ snacks1.product_name }}</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"odd\">N/A</td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"even\">N/A</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<!-- info row -->
\t\t\t\t
\t\t\t\t<div class=\"row no-print\">
\t\t\t\t\t<button class=\"btn btn-info print-btn\" onclick=\"window.print()\" ><i class=\"fa fa-print\"></i>Print</button>
\t\t\t\t</div>
\t\t\t</section>
\t\t\t
\t\t{%endif%}
\t</section>\t\t
\t
{% endblock %}

{% block js %}
  <script>
\t\t  

  
\tfunction change_status(order_master_id,element){
\t\t
\t\tvar status = element.val();
\t\t\$.ajax({
\t\t\turl : \"\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'status':status},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Status updated successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

function assign_driver(element,order_master_id){
\t\t
\t\tvar driver = element.val();
\t\t\$.ajax({
\t\t\turl : \"{{path('admin_orders_assigndrivertoallorder')}}\",
\t\t\tmethod : \"POST\",
\t\t\tdata : {'order_master_id':order_master_id,'driver_id':driver},
\t\t\tsuccess : function(data){
\t\t\t\tif(\$.trim(data) == 'done'){
\t\t\t\t\talert('Driver Assigned successfully');
\t\t\t\t}else{
\t\t\t\t\talert('Somehing went wrong');\t\t\t\t
\t\t\t\t}
\t\t\t},
\t\t\terror : function(){
\t\t\t\talert(\"Somehing went wrong\");
\t\t\t}
\t\t});
\t}

\t
    \$(document).ready(function() {

\t\t{% if endDate is defined and endDate is not empty %}
\t\t\tlet endDate = new Date('{{endDate}}');
\t\t\tconsole.log({endDate});
\t\t\t\$('.datepicker').datepicker({ format: 'dd-mm-yyyy' ,startDate : new Date() , endDate : endDate });
\t\t{% else %}
\t\t\t\$('.datepicker').datepicker({ format: 'dd-mm-yyyy' ,startDate : new Date() });
\t\t{% endif %}\t\t

\t\t\$('#datatable').DataTable();

\t  
\t\t\$('[data-fancybox=\"gallery\"]').fancybox({
\t\t\t// Options will go here
\t\t});\t  
    });
\t
\tfunction printDivInvoice() 
\t{

\t}
\t\t
  </script>
{% endblock %}", "AdminBundle:Orders:deliverynote.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Orders/deliverynote.html.twig");
    }
}
