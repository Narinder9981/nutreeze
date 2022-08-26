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

/* AdminBundle:Faqs:index.html.twig */
class __TwigTemplate_0240be6970bb4b6af2bc6f6c6b3d7f1e496cd58f547a0ede801adea6241e1021 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Faqs:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Faqs:index.html.twig", 1);
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
\t\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t\tFAQs List
\t\t</h1>
\t\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t\t<li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_dashboard_index", ["domain" => $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", []), "get", [0 => "domain"], "method")]), "html", null, true);
        echo "\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t<div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box-header\">
                    <a href=\"";
        // line 17
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_faqs_addfaqs");
        echo "\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Package</a>\t\t
                </div>
                <div class=\"box box-primary\">
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
                                ";
        // line 24
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 25
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 26
                echo "\t\t\t\t\t\t\t\t\t<th>Question : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo " </th> 
\t\t\t\t\t\t\t\t\t<th>Answer : ";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>  
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "\t
\t\t\t\t\t\t\t\t";
        }
        // line 30
        echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t  <th>Operation</th>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
        // line 34
        if (((isset($context["faqs"]) || array_key_exists("faqs", $context)) &&  !twig_test_empty(($context["faqs"] ?? $this->getContext($context, "faqs"))))) {
            // line 35
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["faqs"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["faqs"]) {
                // line 36
                echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>

\t\t\t\t\t\t\t\t\t\t";
                // line 39
                if (($this->getAttribute($context["faqs"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["faqs"], "lang_wise", [])))) {
                    // line 40
                    echo "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["faqs"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                        // line 41
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "faq_question", []), "html", null, true);
                        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                        // line 42
                        echo twig_escape_filter($this->env, $this->getAttribute($context["question"], "faq_answer", []), "html", null, true);
                        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t\t\t\t<td>
                                    \t<a href=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_faqs_updatefaqs", ["main_faq_master_id" => $this->getAttribute($context["faqs"], "main_faq_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
                                        <a href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_faqs_deletefaqs", ["main_faq_master_id" => $this->getAttribute($context["faqs"], "main_faq_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-danger\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
                                    </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['faqs'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "\t\t\t\t\t\t\t\t";
        }
        // line 53
        echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
                                ";
        // line 56
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 57
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 58
                echo "\t\t\t\t\t\t\t\t\t<th>Question : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "\t
\t\t\t\t\t\t\t\t";
        }
        // line 61
        echo "\t\t\t\t\t\t\t\t";
        if (((isset($context["languages"]) || array_key_exists("languages", $context)) &&  !twig_test_empty(($context["languages"] ?? $this->getContext($context, "languages"))))) {
            // line 62
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? $this->getContext($context, "languages")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 63
                echo "\t\t\t\t\t\t\t\t\t<th>Answer : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "\t
\t\t\t\t\t\t\t\t";
        }
        // line 66
        echo "\t\t\t\t\t\t\t  <th>Operation</th>
\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t  </table>
                    </div>
                </div>
            </div>
        </div>
\t</section>
\t
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Faqs:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 66,  232 => 64,  223 => 63,  218 => 62,  215 => 61,  211 => 59,  202 => 58,  197 => 57,  195 => 56,  190 => 53,  187 => 52,  169 => 48,  165 => 47,  162 => 46,  158 => 44,  150 => 42,  145 => 41,  140 => 40,  138 => 39,  133 => 37,  130 => 36,  112 => 35,  110 => 34,  104 => 30,  100 => 28,  92 => 27,  87 => 26,  82 => 25,  80 => 24,  70 => 17,  60 => 10,  51 => 3,  45 => 2,  29 => 1,);
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
\t\t<!-------- PAGE TITLE --------------->
\t\t<h1>
\t\t\tFAQs List
\t\t</h1>
\t\t<!------- BREADCUMB --------------------->
\t\t<ol class=\"breadcrumb\">
\t\t\t<li><a href=\"{{path('admin_dashboard_index',{'domain':app.session.get('domain')})}}\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
\t\t</ol>
\t</section>
\t<section class=\"content\">
\t\t<div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box-header\">
                    <a href=\"{{ path('admin_faqs_addfaqs') }}\" class=\"btn btn-xs btn-primary pull-right\"><i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Add Package</a>\t\t
                </div>
                <div class=\"box box-primary\">
                    <div class=\"box-body table-responsive\">
                        <table id=\"list\" class=\"table display table-striped table-bordered scroll-horizontal\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<th>No</th>
                                {% if languages is defined and languages is not empty%}
\t\t\t\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t\t\t\t<th>Question : {{language.language_name}} </th> 
\t\t\t\t\t\t\t\t\t<th>Answer : {{language.language_name}}</th>  
                                    {%endfor%}\t
\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t  <th>Operation</th>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t{%if faqs is defined and faqs is not empty%}
\t\t\t\t\t\t\t\t{%for faqs in faqs %}
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td>{{loop.index}}</td>

\t\t\t\t\t\t\t\t\t\t{%if faqs.lang_wise is defined and faqs.lang_wise is not empty %}
                                            {%for question in faqs.lang_wise %}
\t\t\t\t\t\t\t\t\t\t\t\t<td>{{question.faq_question}}</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td>{{question.faq_answer}}</td>
\t\t\t\t\t\t\t\t\t\t\t\t{%endfor%}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t{%endif%}
\t\t\t\t\t\t\t\t\t<td>
                                    \t<a href=\"{{path('admin_faqs_updatefaqs',{'main_faq_master_id':faqs.main_faq_master_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\"></i></a>
                                        <a href=\"{{ path('admin_faqs_deletefaqs',{'main_faq_master_id':faqs.main_faq_master_id}) }}\" class=\"btn btn-xs btn-danger\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t
                                    </td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t<tfoot>
\t\t\t\t\t\t\t\t<th>No</th>
                                {% if languages is defined and languages is not empty%}
                                    {%for language in languages%}
\t\t\t\t\t\t\t\t\t<th>Question : {{language.language_name}}</th>
                                    {%endfor%}\t
\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t\t{% if languages is defined and languages is not empty%}
\t\t\t\t\t\t\t\t\t{%for language in languages%}
\t\t\t\t\t\t\t\t\t<th>Answer : {{language.language_name}}</th>
\t\t\t\t\t\t\t\t\t{%endfor%}\t
\t\t\t\t\t\t\t\t{% endif%}
\t\t\t\t\t\t\t  <th>Operation</th>
\t\t\t\t\t\t\t</tfoot>
\t\t\t\t\t\t  </table>
                    </div>
                </div>
            </div>
        </div>
\t</section>
\t
{% endblock %}", "AdminBundle:Faqs:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Faqs/index.html.twig");
    }
}
