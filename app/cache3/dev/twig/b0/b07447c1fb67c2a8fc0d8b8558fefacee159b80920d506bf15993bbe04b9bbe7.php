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

/* AdminBundle:Packagefor:index.html.twig */
class __TwigTemplate_8005f12708d8cbb64c7cb648635b1de37bfcf41d58910120c546073849cb9934 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "AdminBundle:Packagefor:index.html.twig"));

        $this->parent = $this->loadTemplate("@Admin/Layout/adminlayout.html.twig", "AdminBundle:Packagefor:index.html.twig", 1);
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
            Package for Listing
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

                    <!-- box header 
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Package For</h3>
                        <a href=\"";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_addpackagefor");
        echo "\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Package For Type</b></a>
                    </div>-->
                    <!-- end: box header -->

                    <div class=\"box-body\">
                        <table id=\"datatable\" class=\"table display table-striped table-bordered scroll-horizontal\">
                            <thead>
                            <th>No</th>
                                ";
        // line 42
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 43
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 44
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                                ";
        }
        // line 47
        echo "                            <th>Type</th>
                            <th>Friday Off Day</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                ";
        // line 52
        if (((isset($context["pk_for_details_all"]) || array_key_exists("pk_for_details_all", $context)) &&  !twig_test_empty(($context["pk_for_details_all"] ?? $this->getContext($context, "pk_for_details_all"))))) {
            // line 53
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["pk_for_details_all"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["pk_for_details_all"]) {
                // line 54
                echo "                                        <tr>
                                            <td>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", []), "html", null, true);
                echo "</td>
                                            ";
                // line 56
                if (($this->getAttribute($context["pk_for_details_all"], "lang_wise", [], "any", true, true) &&  !twig_test_empty($this->getAttribute($context["pk_for_details_all"], "lang_wise", [])))) {
                    // line 57
                    echo "                                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["pk_for_details_all"], "lang_wise", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                        // line 58
                        echo "                                                    <td>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["name"], "pk_for_name", []), "html", null, true);
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
                echo "                                            <td>";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter($this->getAttribute($context["pk_for_details_all"], "type", []), "_", " ")), "html", null, true);
                echo "</td>
                                            <td>";
                // line 62
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["pk_for_details_all"], "friday_offday", [])), "html", null, true);
                echo "</td>
                                            <td>
                                                <a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_addpackagefor", ["pk_for_id" => $this->getAttribute($context["pk_for_details_all"], "main_package_for_master_id", [])]), "html", null, true);
                echo "\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Package For\"></i></a>

                                                <!-- <a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"";
                // line 66
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_packagefor_deletepackagefor", ["pk_for_id" => $this->getAttribute($context["pk_for_details_all"], "main_package_for_master_id", [])]), "html", null, true);
                echo "\" data-toggle=\"tooltip\" data-title=\"Delete Package For\"><i class=\"fa fa-trash\"></i></a>\t
                                                -->\t\t\t\t\t\t\t\t\t\t

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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pk_for_details_all'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "                                ";
        }
        // line 73
        echo "                            </tbody>
                            <tfoot>
                            <th>No</th>
                                ";
        // line 76
        if (((isset($context["language_list"]) || array_key_exists("language_list", $context)) &&  !twig_test_empty(($context["language_list"] ?? $this->getContext($context, "language_list"))))) {
            // line 77
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["language_list"] ?? $this->getContext($context, "language_list")));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 78
                echo "                                    <th>Name : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
                echo "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            echo "                                ";
        }
        // line 81
        echo "                            <th>Type</th>
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

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 97
    public function block_js($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 98
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
        return "AdminBundle:Packagefor:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 98,  280 => 97,  259 => 81,  256 => 80,  247 => 78,  242 => 77,  240 => 76,  235 => 73,  232 => 72,  212 => 66,  207 => 64,  202 => 62,  197 => 61,  193 => 59,  184 => 58,  179 => 57,  177 => 56,  173 => 55,  170 => 54,  152 => 53,  150 => 52,  143 => 47,  140 => 46,  131 => 44,  126 => 43,  124 => 42,  113 => 34,  103 => 26,  94 => 23,  90 => 21,  85 => 20,  76 => 17,  72 => 15,  68 => 14,  61 => 10,  52 => 3,  46 => 2,  30 => 1,);
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
            Package for Listing
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

                    <!-- box header 
                    <div class=\"box-header with-border\">
                        <h3 class=\"box-title\">Package For</h3>
                        <a href=\"{{ path('admin_packagefor_addpackagefor') }}\" class=\"btn btn-primary btn-flat pull-right\"><i class=\"glyphicon glyphicon-plus\"></i><b>&nbsp;&nbsp;Add Package For Type</b></a>
                    </div>-->
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
                            <th>Type</th>
                            <th>Friday Off Day</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                                {% if pk_for_details_all is defined and pk_for_details_all is not empty %}
                                    {% for pk_for_details_all in pk_for_details_all %}
                                        <tr>
                                            <td>{{ loop.index }}</td>
                                            {% if pk_for_details_all.lang_wise is defined and pk_for_details_all.lang_wise is not empty %}
                                                {%for name in pk_for_details_all.lang_wise%}
                                                    <td>{{name.pk_for_name}}</td>
                                                {%endfor%}\t
                                            {% endif %}
                                            <td>{{(pk_for_details_all.type | replace('_',' ')) | capitalize}}</td>
                                            <td>{{pk_for_details_all.friday_offday | capitalize }}</td>
                                            <td>
                                                <a onclick=\"return confirm('Are you sure want to edit ?');\" href=\"{{ path('admin_packagefor_addpackagefor', {'pk_for_id':pk_for_details_all.main_package_for_master_id}) }}\" class=\"btn btn-xs btn-primary\"><i class=\"fa fa-pencil\" data-toggle=\"tooltip\" data-title=\"Edit Package For\"></i></a>

                                                <!-- <a class=\"btn btn-xs btn-danger\" onclick=\"return confirm('Are you sure want to delete ?');\" href=\"{{path('admin_packagefor_deletepackagefor',{'pk_for_id':pk_for_details_all.main_package_for_master_id})}}\" data-toggle=\"tooltip\" data-title=\"Delete Package For\"><i class=\"fa fa-trash\"></i></a>\t
                                                -->\t\t\t\t\t\t\t\t\t\t

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
                            <th>Type</th>
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
", "AdminBundle:Packagefor:index.html.twig", "/var/www/admin/src/AdminBundle/Resources/views/Packagefor/index.html.twig");
    }
}
