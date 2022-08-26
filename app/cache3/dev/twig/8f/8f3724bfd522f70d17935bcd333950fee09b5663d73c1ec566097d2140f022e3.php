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

/* AdminBundle:Ordernote:index.html.twig */
class __TwigTemplate_aca5f723c7756824ce2c7c6b5871dc6bc166ebd1cb2e57c4d4a5451c386ac23c extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Ordernote:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Ordernote:index.html.twig", 1);
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
            Meal types Listing
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
                        <h3 class=\"box-title\">Order Notes</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ordernote_addordernote");
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Order Note</b></a>
                    </div>
                    <!-- end: box header -->

                    <div class=\"box-body\">
                        <table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                            
                                ";
        // line 43
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 44
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 45
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "                                ";
        }
        // line 48
        echo "                            <th>Action</th>
                            </thead>
                            <tbody>
                                ";
        // line 51
        if (((isset($context["order_notes_list"]) || array_key_exists("order_notes_list", $context)) &&  !twig_test_empty(($context["order_notes_list"] ?? $this->getContext($context, "order_notes_list"))))) {
            // line 52
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["order_notes_list"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["order_notes_list"]) {
                // line 53
                echo "                                        <tr>
                                            <td>";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                            
                                            ";
                // line 56
                if (($this->getAttribute($context["order_notes_list"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["order_notes_list"], "lang_wise", [])))) {
                    // line 57
                    echo "                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["order_notes_list"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                        // line 58
                        echo "                                                    <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["name"], "order_note_text", []), "html", null, true);
                        echo "</td>
                                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 59
                    echo "\t
                                            ";
                }
                // line 61
                echo "                                            <td>
                                                <a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ordernote_addordernote", ["ordernote_id" => $this->getAttribute($context["order_notes_list"], "main_order_note_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Order Note\"></i></a>

                                                <a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_ordernote_deleteordernote", ["ordernote_id" => $this->getAttribute($context["order_notes_list"], "main_order_note_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-title=\"Delete Order note\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t

                                            </td>
                                        </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_notes_list'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "                                ";
        }
        // line 70
        echo "                            </tbody>
                            <tfoot>
                            <th>No</th>
                                ";
        // line 73
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 74
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 75
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "                                ";
        }
        // line 78
        echo "                            <th>Action</th>
                            </tfoot>
                        </table>
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

    // line 93
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 94
        echo "    <script>
        \$(document).ready(function () {
            \$('#datatable').DataTable();
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AdminBundle:Ordernote:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  277 => 94,  271 => 93,  251 => 78,  248 => 77,  239 => 75,  234 => 74,  232 => 73,  227 => 70,  224 => 69,  205 => 64,  200 => 62,  197 => 61,  193 => 59,  184 => 58,  179 => 57,  177 => 56,  172 => 54,  169 => 53,  151 => 52,  149 => 51,  144 => 48,  141 => 47,  132 => 45,  127 => 44,  125 => 43,  113 => 34,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
            Meal types Listing
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
                        <h3 class=\"box-title\">Order Notes</h3>
                        <a href=\"{{ path('admin_ordernote_addordernote') }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Order Note</b></a>
                    </div>
                    <!-- end: box header -->

                    <div class=\"box-body\">
                        <table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                            
                                {% if language_list is defined and language_list is not empty %}
                                    {% for language in language_list %}
                                    <th>Name : {{ language.language_name }}</th>
                                    {% endfor %}
                                {% endif %}
                            <th>Action</th>
                            </thead>
                            <tbody>
                                {% if order_notes_list is defined and order_notes_list is not empty %}
                                    {% for order_notes_list in order_notes_list %}
                                        <tr>
                                            <td>{{ loop.index }}</td>
                                            
                                            {% if order_notes_list.lang_wise is defined and order_notes_list.lang_wise is not empty %}
                                                {%for name in order_notes_list.lang_wise%}
                                                    <td>{{name.order_note_text}}</td>
                                                {%endfor%}\t
                                            {% endif %}
                                            <td>
                                                <a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"{{ path('admin_ordernote_addordernote', {'ordernote_id':order_notes_list.main_order_note_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Order Note\"></i></a>

                                                <a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"{{path('admin_ordernote_deleteordernote',{'ordernote_id':order_notes_list.main_order_note_id})}}\" data-toggle=\"tooltip\" data-title=\"Delete Order note\"><i class=\"fa fa-trash\"></i></a>\t\t\t\t\t\t\t\t\t\t\t

                                            </td>
                                        </tr>
                                    {% endfor %}
                                {% endif %}
                            </tbody>
                            <tfoot>
                            <th>No</th>
                                {% if language_list is defined and language_list is not empty %}
                                    {% for language in language_list %}
                                    <th>Name : {{ language.language_name }}</th>
                                    {% endfor %}
                                {% endif %}
                            <th>Action</th>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!----------- PAGE HEADER : END ----------------------------------------------------------->
    <!----------- Main content : START ----------------------------------------------------------->

{% endblock %}

{% block js %}
    <script>
        \$(document).ready(function () {
            \$('#datatable').DataTable();
        });
    </script>
{% endblock %}

", "AdminBundle:Ordernote:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Ordernote/index.html.twig");
    }
}
